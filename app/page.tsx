'use client';

import { useState } from 'react';
import useSWR from 'swr';
import Link from 'next/link';
import Image from 'next/image';
import { Search, ShoppingCart, Menu, X, Star, Facebook, Youtube, Phone, Mail, Sparkles, TrendingUp } from 'lucide-react';

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

function Header() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  return (
    <header className="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 shadow-lg sticky top-0 z-50 border-b border-cyan-500/20">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          <Link href="/" className="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent flex items-center gap-2">
            <Sparkles className="h-6 w-6 text-cyan-400" />
            Daily Income Bazar
          </Link>
          <nav className="hidden md:flex items-center gap-8">
            <Link href="/" className="text-slate-300 hover:text-cyan-400 transition-colors">হোম</Link>
            <Link href="/about" className="text-slate-300 hover:text-cyan-400 transition-colors">আমাদের সম্পর্কে</Link>
            <Link href="/contact" className="text-slate-300 hover:text-cyan-400 transition-colors">যোগাযোগ</Link>
          </nav>
          <div className="flex items-center gap-4">
            <Link href="/cart" className="relative group">
              <ShoppingCart className="h-6 w-6 text-slate-300 group-hover:text-cyan-400 transition-colors" />
            </Link>
            <Link href="/auth/login" className="bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:shadow-lg hover:shadow-cyan-500/50 transition-all">লগইন</Link>
            <button className="md:hidden" onClick={() => setMobileMenuOpen(!mobileMenuOpen)}>
              {mobileMenuOpen ? <X className="h-6 w-6 text-cyan-400" /> : <Menu className="h-6 w-6 text-cyan-400" />}
            </button>
          </div>
        </div>
        {mobileMenuOpen && (
          <nav className="md:hidden py-4 border-t border-cyan-500/20 flex flex-col gap-4">
            <Link href="/" className="text-slate-300 hover:text-cyan-400">হোম</Link>
            <Link href="/about" className="text-slate-300 hover:text-cyan-400">আমাদের সম্পর্কে</Link>
            <Link href="/contact" className="text-slate-300 hover:text-cyan-400">যোগাযোগ</Link>
          </nav>
        )}
      </div>
    </header>
  );
}

function Footer() {
  return (
    <footer className="bg-gradient-to-b from-slate-900 to-slate-950 text-white py-12 border-t border-cyan-500/20">
      <div className="container mx-auto px-4">
        <div className="grid md:grid-cols-4 gap-8 mb-8">
          <div>
            <h3 className="text-xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent mb-4">Daily Income Bazar</h3>
            <p className="text-slate-400">প্রিমিয়াম পণ্য এবং আজীবন আয়ের সুযোগ</p>
          </div>
          <div>
            <h4 className="font-semibold text-cyan-400 mb-4">লিঙ্ক</h4>
            <div className="flex flex-col gap-2">
              <Link href="/about" className="text-slate-400 hover:text-cyan-300 transition-colors">আমাদের সম্পর্কে</Link>
              <Link href="/contact" className="text-slate-400 hover:text-cyan-300 transition-colors">যোগাযোগ</Link>
            </div>
          </div>
          <div>
            <h4 className="font-semibold text-cyan-400 mb-4">যোগাযোগ</h4>
            <div className="flex flex-col gap-2 text-slate-400">
              <span className="flex items-center gap-2"><Phone className="h-4 w-4 text-cyan-400" /> +880 1700-000000</span>
              <span className="flex items-center gap-2"><Mail className="h-4 w-4 text-cyan-400" /> support@dib.com</span>
            </div>
          </div>
          <div>
            <h4 className="font-semibold text-cyan-400 mb-4">সামাজিক মাধ্যম</h4>
            <div className="flex gap-4">
              <a href="#" className="text-slate-400 hover:text-cyan-400 transition-colors"><Facebook className="h-6 w-6" /></a>
              <a href="#" className="text-slate-400 hover:text-cyan-400 transition-colors"><Youtube className="h-6 w-6" /></a>
            </div>
          </div>
        </div>
        <div className="border-t border-slate-800 pt-8 text-center text-slate-500">
          <p>&copy; {new Date().getFullYear()} Daily Income Bazar. সকল অধিকার সংরক্ষিত।</p>
        </div>
      </div>
    </footer>
  );
}

function ProductCard({ product }: { product: Product }) {
  const displayPrice = product.salePrice || product.price;
  const discount = product.price > displayPrice ? Math.round(((product.price - displayPrice) / product.price) * 100) : 0;

  return (
    <div className="bg-gradient-to-br from-slate-800 to-slate-900 rounded-xl shadow-lg hover:shadow-cyan-500/30 hover:shadow-2xl transition-all duration-300 overflow-hidden group border border-slate-700 hover:border-cyan-500/50">
      <div className="relative bg-slate-950 h-48 overflow-hidden">
        {product.img ? (
          <Image src={product.img} alt={product.name} fill className="object-cover group-hover:scale-110 transition-transform duration-300" />
        ) : (
          <div className="w-full h-full flex items-center justify-center text-slate-600">কোনো ছবি নেই</div>
        )}
        {discount > 0 && (
          <div className="absolute top-3 right-3 bg-gradient-to-r from-red-500 to-pink-600 text-white px-3 py-1 rounded-full text-sm font-semibold">-{discount}%</div>
        )}
      </div>
      <div className="p-4">
        <Link href={`/products/${product.id}`}>
          <h3 className="font-semibold text-slate-100 group-hover:text-cyan-400 transition-colors line-clamp-2 mb-2">{product.name}</h3>
        </Link>
        <div className="flex text-amber-400 mb-2">
          {[...Array(5)].map((_, i) => <Star key={i} className="h-4 w-4 fill-current" />)}
        </div>
        <div className="flex items-baseline gap-2 mb-2">
          <span className="text-xl font-bold text-cyan-400">৳{displayPrice}</span>
          {discount > 0 && <span className="text-sm text-slate-500 line-through">৳{product.price}</span>}
        </div>
        <p className="text-sm text-emerald-400 mb-3 flex items-center gap-1"><TrendingUp className="h-3 w-3" /> {product.rp} পয়েন্ট</p>
        <Link href={`/products/${product.id}`} className="block w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-center py-2 rounded-lg hover:shadow-lg hover:shadow-cyan-500/50 transition-all font-semibold">
          <ShoppingCart className="h-4 w-4 inline mr-2" /> বিস্তারিত দেখুন
        </Link>
      </div>
    </div>
  );
}

export default function HomePage() {
  const [selectedCategory, setSelectedCategory] = useState('all');
  const [searchTerm, setSearchTerm] = useState('');
  
  const { data: products = [], isLoading } = useSWR('/api/products', fetcher);
  const { data: categories = [] } = useSWR('/api/categories', fetcher);

  const filteredProducts = products.filter((product: Product) => {
    const matchesCategory = selectedCategory === 'all' || product.category === selectedCategory;
    const matchesSearch = product.name.toLowerCase().includes(searchTerm.toLowerCase());
    return matchesCategory && matchesSearch;
  });

  return (
    <>
      <Header />
      <main className="min-h-screen bg-gradient-to-b from-slate-900 via-slate-950 to-slate-900">
        <section className="bg-gradient-to-br from-slate-800 via-slate-900 to-slate-950 text-white py-20 md:py-32 relative overflow-hidden border-b border-cyan-500/20">
          <div className="absolute inset-0 opacity-10">
            <div className="absolute top-0 left-1/4 w-96 h-96 bg-cyan-500 rounded-full blur-3xl"></div>
            <div className="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
          </div>
          <div className="container mx-auto px-4 relative z-10">
            <h1 className="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-cyan-400 via-blue-400 to-cyan-300 bg-clip-text text-transparent">Daily Income Bazar</h1>
            <p className="text-lg md:text-2xl text-slate-300 mb-8 max-w-2xl">প্রিমিয়াম পণ্য এবং আজীবন আয়ের সুযোগ একসাথে পান</p>
            <div className="flex flex-col sm:flex-row gap-4">
              <a href="#products" className="bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg hover:shadow-cyan-500/50 transition-all">কেনাকাটা শুরু করুন</a>
              <Link href="/about" className="border-2 border-cyan-400 text-cyan-400 px-8 py-3 rounded-lg font-semibold hover:bg-cyan-400/10 transition-all">আমাদের সম্পর্কে জানুন</Link>
            </div>
          </div>
        </section>

        <section className="bg-slate-900 py-6 sticky top-16 z-20 shadow-lg border-b border-cyan-500/20">
          <div className="container mx-auto px-4">
            <div className="flex flex-col md:flex-row gap-4 items-center justify-between">
              <div className="w-full md:flex-1 relative">
                <input
                  type="text"
                  placeholder="পণ্য খুঁজুন..."
                  value={searchTerm}
                  onChange={(e) => setSearchTerm(e.target.value)}
                  className="w-full px-4 py-3 pl-12 bg-slate-800 border border-slate-700 rounded-lg text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent"
                />
                <Search className="absolute left-4 top-3.5 h-5 w-5 text-slate-500" />
              </div>
              <div className="flex gap-2 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto">
                <button onClick={() => setSelectedCategory('all')} className={`px-4 py-2 rounded-lg text-sm whitespace-nowrap transition-all ${selectedCategory === 'all' ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white shadow-lg shadow-cyan-500/50' : 'bg-slate-800 text-slate-300 hover:bg-slate-700 border border-slate-700'}`}>সব</button>
                {categories.map((cat: any) => (
                  <button key={cat.id} onClick={() => setSelectedCategory(cat.id)} className={`px-4 py-2 rounded-lg text-sm whitespace-nowrap transition-all ${selectedCategory === cat.id ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white shadow-lg shadow-cyan-500/50' : 'bg-slate-800 text-slate-300 hover:bg-slate-700 border border-slate-700'}`}>{cat.name}</button>
                ))}
              </div>
            </div>
          </div>
        </section>

        <section id="products" className="py-16 md:py-20">
          <div className="container mx-auto px-4">
            <h2 className="text-4xl font-bold mb-12 bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">আমাদের পণ্য সংগ্রহ</h2>
            {isLoading ? (
              <div className="text-center py-20"><div className="inline-block animate-spin rounded-full h-12 w-12 border-4 border-slate-700 border-t-cyan-500"></div></div>
            ) : filteredProducts.length > 0 ? (
              <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                {filteredProducts.map((product: Product) => <ProductCard key={product.id} product={product} />)}
              </div>
            ) : (
              <div className="text-center py-20"><p className="text-slate-400 text-lg">কোনো পণ্য পাওয়া যায়নি</p></div>
            )}
          </div>
        </section>

        <section className="bg-gradient-to-r from-slate-800 to-slate-900 py-16 md:py-20 border-y border-cyan-500/20">
          <div className="container mx-auto px-4">
            <h2 className="text-4xl font-bold mb-16 text-center bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">কেন আমাদের বেছে নিবেন?</h2>
            <div className="grid md:grid-cols-3 gap-8">
              {[
                { title: '✨ সর্বোচ্চ মানের পণ্য', desc: 'প্রিমিয়াম এবং প্রমাণিত পণ্য সরাসরি আপনার দোরগোড়ায়' },
                { title: '💰 স্থায়ী আয়', desc: 'MLM সিস্টেমের মাধ্যমে আপনার নেটওয়ার্ক থেকে আয় করুন' },
                { title: '🔒 নিরাপদ লেনদেন', desc: 'সম্পূর্ণ সুরক্ষিত পেমেন্ট এবং ক্যাশ সিস্টেম' },
              ].map((feature, i) => (
                <div key={i} className="bg-slate-900 border border-slate-700 hover:border-cyan-500/50 p-8 rounded-xl transition-all hover:shadow-lg hover:shadow-cyan-500/20">
                  <h3 className="text-xl font-semibold mb-3 text-cyan-400">{feature.title}</h3>
                  <p className="text-slate-400">{feature.desc}</p>
                </div>
              ))}
            </div>
          </div>
        </section>
      </main>
      <Footer />
    </>
  );
}
