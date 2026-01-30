'use client';

import { useState } from 'react';
import useSWR from 'swr';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Search } from 'lucide-react';

const fetcher = (url: string) => fetch(url).then(r => r.json());

interface Order {
  id: string;
  orderNumber: string;
  userId: string;
  totalAmount: number;
  status: string;
  createdAt: any;
}

export default function AdminOrdersPage() {
  const [searchTerm, setSearchTerm] = useState('');
  const [filterStatus, setFilterStatus] = useState('all');
  const { data: orders = [], isLoading } = useSWR('/api/admin/orders', fetcher);

  const filteredOrders = orders.filter((order: Order) => {
    const matchesSearch = order.orderNumber?.toLowerCase().includes(searchTerm.toLowerCase());
    const matchesStatus = filterStatus === 'all' || order.status === filterStatus;
    return matchesSearch && matchesStatus;
  });

  const handleStatusChange = async (orderId: string, newStatus: string) => {
    try {
      await fetch(`/api/admin/orders/${orderId}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ status: newStatus })
      });
    } catch (error) {
      console.error('Error updating order:', error);
    }
  };

  return (
    <AdminLayout>
      <div>
        <h1 className="text-3xl font-bold text-slate-900 mb-8">অর্ডার ম্যানেজমেন্ট</h1>

        {/* Filters */}
        <div className="mb-6 flex flex-col sm:flex-row gap-4">
          <div className="relative flex-1">
            <input
              type="text"
              placeholder="অর্ডার নম্বর খুঁজুন..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full px-4 py-2 pl-10 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <Search className="absolute left-3 top-2.5 h-5 w-5 text-slate-400" />
          </div>

          <select
            value={filterStatus}
            onChange={(e) => setFilterStatus(e.target.value)}
            className="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="all">সব অবস্থা</option>
            <option value="pending">পেন্ডিং</option>
            <option value="processing">প্রক্রিয়াধীন</option>
            <option value="shipped">শিপ করা হয়েছে</option>
            <option value="delivered">ডেলিভার করা হয়েছে</option>
            <option value="cancelled">বাতিল করা হয়েছে</option>
          </select>
        </div>

        {/* Orders Table */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden">
          {isLoading ? (
            <div className="p-8 text-center">
              <div className="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            </div>
          ) : filteredOrders.length === 0 ? (
            <div className="p-8 text-center text-slate-600">
              কোনো অর্ডার পাওয়া যায়নি
            </div>
          ) : (
            <div className="overflow-x-auto">
              <table className="w-full">
                <thead className="bg-slate-50 border-b border-slate-200">
                  <tr>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অর্ডার নং</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">পরিমাণ</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">তারিখ</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অবস্থা</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অ্যাকশন</th>
                  </tr>
                </thead>
                <tbody>
                  {filteredOrders.map((order: Order, i: number) => (
                    <tr key={order.id || i} className="border-b border-slate-200 hover:bg-slate-50">
                      <td className="px-6 py-3 text-sm text-slate-900 font-mono">{order.orderNumber}</td>
                      <td className="px-6 py-3 text-sm text-slate-900 font-semibold">৳{order.totalAmount}</td>
                      <td className="px-6 py-3 text-sm text-slate-600">
                        {order.createdAt?.seconds ? 
                          new Date(order.createdAt.seconds * 1000).toLocaleDateString('bn-BD') : 
                          'N/A'}
                      </td>
                      <td className="px-6 py-3 text-sm">
                        <select
                          value={order.status}
                          onChange={(e) => handleStatusChange(order.id, e.target.value)}
                          className={`px-3 py-1 rounded-full text-xs font-semibold border-0 focus:outline-none cursor-pointer ${
                            order.status === 'delivered' ? 'bg-green-100 text-green-800' :
                            order.status === 'shipped' ? 'bg-blue-100 text-blue-800' :
                            order.status === 'cancelled' ? 'bg-red-100 text-red-800' :
                            'bg-yellow-100 text-yellow-800'
                          }`}
                        >
                          <option value="pending">পেন্ডিং</option>
                          <option value="processing">প্রক্রিয়াধীন</option>
                          <option value="shipped">শিপ করা</option>
                          <option value="delivered">ডেলিভার করা</option>
                          <option value="cancelled">বাতিল</option>
                        </select>
                      </td>
                      <td className="px-6 py-3 text-sm">
                        <Button variant="outline" size="sm">
                          বিস্তারিত
                        </Button>
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
