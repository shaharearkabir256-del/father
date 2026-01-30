'use client';

import { useState } from 'react';
import Link from 'next/link';
import useSWR from 'swr';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Plus, Edit2, Trash2, Search } from 'lucide-react';

const fetcher = (url: string) => fetch(url).then(r => r.json());

interface Product {
  id: string;
  name: string;
  price: number;
  salePrice?: number;
  stock?: number;
  category: string;
}

export default function AdminProductsPage() {
  const [searchTerm, setSearchTerm] = useState('');
  const { data: products = [], isLoading } = useSWR('/api/products?limit=100', fetcher);

  const filteredProducts = products.filter((product: Product) =>
    product.name.toLowerCase().includes(searchTerm.toLowerCase())
  );

  return (
    <AdminLayout>
      <div>
        <div className="flex justify-between items-center mb-8">
          <h1 className="text-3xl font-bold text-slate-900">পণ্য ম্যানেজমেন্ট</h1>
          <Link href="/admin/products/add">
            <Button className="flex items-center gap-2">
              <Plus className="h-4 w-4" />
              নতুন পণ্য
            </Button>
          </Link>
        </div>

        {/* Search */}
        <div className="mb-6 relative">
          <input
            type="text"
            placeholder="পণ্য খুঁজুন..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            className="w-full px-4 py-2 pl-10 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
          <Search className="absolute left-3 top-2.5 h-5 w-5 text-slate-400" />
        </div>

        {/* Products Table */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden">
          {isLoading ? (
            <div className="p-8 text-center">
              <div className="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            </div>
          ) : filteredProducts.length === 0 ? (
            <div className="p-8 text-center text-slate-600">
              কোনো পণ্য পাওয়া যায়নি
            </div>
          ) : (
            <div className="overflow-x-auto">
              <table className="w-full">
                <thead className="bg-slate-50 border-b border-slate-200">
                  <tr>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">পণ্যের নাম</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">ক্যাটাগরি</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">দাম</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">স্টক</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অ্যাকশন</th>
                  </tr>
                </thead>
                <tbody>
                  {filteredProducts.map((product: Product, i: number) => (
                    <tr key={product.id || i} className="border-b border-slate-200 hover:bg-slate-50">
                      <td className="px-6 py-3 text-sm text-slate-900 font-semibold">{product.name}</td>
                      <td className="px-6 py-3 text-sm text-slate-600">{product.category}</td>
                      <td className="px-6 py-3 text-sm text-slate-900">৳{product.price}</td>
                      <td className="px-6 py-3 text-sm">
                        <span className={`px-3 py-1 rounded-full text-xs font-semibold ${
                          product.stock && product.stock > 10 ? 'bg-green-100 text-green-800' :
                          product.stock && product.stock > 0 ? 'bg-yellow-100 text-yellow-800' :
                          'bg-red-100 text-red-800'
                        }`}>
                          {product.stock || 0}
                        </span>
                      </td>
                      <td className="px-6 py-3 text-sm">
                        <div className="flex gap-2">
                          <Link href={`/admin/products/${product.id}/edit`}>
                            <button className="text-blue-600 hover:text-blue-700 p-1">
                              <Edit2 className="h-4 w-4" />
                            </button>
                          </Link>
                          <button className="text-red-600 hover:text-red-700 p-1">
                            <Trash2 className="h-4 w-4" />
                          </button>
                        </div>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          )}
        </div>
      </div>
    </AdminLayout>
  );
}
