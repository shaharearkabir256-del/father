'use client';

import { useState } from 'react';
import useSWR from 'swr';
import Link from 'next/link';
import SiteHeader from '@/components/site-header';
import SiteFooter from '@/components/site-footer';
import ProductCard from '@/components/product-card';
import { Button } from '@/components/ui/button';
import { Search } from 'lucide-react';

interface Product {
  id: string;
  name: string;
  price: number;
  salePrice?: number;
  img?: string;
  category: string;
  rp: number;
}

const fetcher = (url: string) => fetch(url).then(r => r.json());

export default function HomePage() {
  const [selectedCategory, setSelectedCategory] = useState('all');
  const [searchTerm, setSearchTerm] = useState('');
  
  const { data: products = [], isLoading: productsLoading } = useSWR('/api/products', fetcher);
  const { data: categories = [] } = useSWR('/api/categories', fetcher);

  const filteredProducts = products.filter((product: Product) => {
    const matchesCategory = selectedCategory === 'all' || product.category === selectedCategory;
    const matchesSearch = product.name.toLowerCase().includes(searchTerm.toLowerCase());
    return matchesCategory && matchesSearch;
  });

  return (
    <>
      <SiteHeader />
      <main className="min-h-screen bg-white">
        {/* Hero Section */}
        <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-24">
          <div className="container mx-auto px-4">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">Daily Income Bazar</h1>
            <p className="text-lg md:text-xl text-blue-100 mb-8">
              প্রিমিয়াম পণ্য এবং আজীবন আয়ের সুযোগ
            </p>
            <div className="flex gap-4">
              <Link href="#products">
                <Button size="lg" className="bg-white text-blue-600 hover:bg-blue-50">
                  কেনাকাটা করুন
                </Button>
              </Link>
              <Link href="/about">
                <Button size="lg" variant="outline" className="text-white border-white hover:bg-blue-700">
                  আমাদের সম্পর্কে
                </Button>
              </Link>
            </div>
          </div>
        </section>

        {/* Search and Filter */}
        <section className="bg-white py-8 sticky top-0 z-10 shadow-sm">
          <div className="container mx-auto px-4">
            <div className="flex flex-col md:flex-row gap-4 items-center justify-between">
              <div className="w-full md:flex-1 relative">
                <input
                  type="text"
                  placeholder="পণ্য খুঁজুন..."
                  value={searchTerm}
                  onChange={(e) => setSearchTerm(e.target.value)}
                  className="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <Search className="absolute left-4 top-3.5 h-5 w-5 text-gray-400" />
              </div>
              
              <div className="flex gap-2 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto">
                <Button
                  variant={selectedCategory === 'all' ? 'default' : 'outline'}
                  onClick={() => setSelectedCategory('all')}
                  size="sm"
                >
                  সব
                </Button>
                {categories.map((cat: any) => (
                  <Button
                    key={cat.id}
                    variant={selectedCategory === cat.id ? 'default' : 'outline'}
                    onClick={() => setSelectedCategory(cat.id)}
                    size="sm"
                  >
                    {cat.name}
                  </Button>
                ))}
              </div>
            </div>
          </div>
        </section>

        {/* Products Grid */}
        <section id="products" className="py-12 md:py-16 bg-white">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold mb-8">আমাদের পণ্য</h2>
            
            {productsLoading ? (
              <div className="text-center py-12">
                <div className="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
              </div>
            ) : filteredProducts.length > 0 ? (
              <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                {filteredProducts.map((product: Product) => (
                  <ProductCard key={product.id} product={product} />
                ))}
              </div>
            ) : (
              <div className="text-center py-12">
                <p className="text-gray-600 text-lg">কোনো পণ্য পাওয়া যায়নি</p>
              </div>
            )}
          </div>
        </section>

        {/* Features Section */}
        <section className="bg-gray-50 py-12 md:py-16">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold mb-12 text-center">কেন আমাদের বেছে নিবেন?</h2>
            <div className="grid md:grid-cols-3 gap-8">
              {[
                { title: 'সর্বোচ্চ মানের পণ্য', desc: 'প্রিমিয়াম এবং প্রমাণিত পণ্য সরাসরি আপনার দোরগোড়ায়' },
                { title: 'স্থায়ী আয়', desc: 'MLM সিস্টেমের মাধ্যমে আপনার নেটওয়ার্ক থেকে আয় করুন' },
                { title: 'নিরাপদ লেনদেন', desc: 'সম্পূর্ণ সুরক্ষিত পেমেন্ট এবং ক্যাশ সিস্টেম' },
              ].map((feature, i) => (
                <div key={i} className="text-center">
                  <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <div className="text-2xl">✓</div>
                  </div>
                  <h3 className="text-xl font-semibold mb-2">{feature.title}</h3>
                  <p className="text-gray-600">{feature.desc}</p>
                </div>
              ))}
            </div>
          </div>
        </section>
      </main>
      <SiteFooter />
    </>
  );
}
