'use client';

import { useState } from 'react';
import useSWR from 'swr';
import Link from 'next/link';
import Image from 'next/image';
import { Button } from '@/components/ui/button';
import { Search, ShoppingCart, Menu, X, Star, Facebook, Youtube, Phone, Mail, MapPin, User } from 'lucide-react';
import { useCart } from '@/lib/cart-context';
import { useAuth } from '@/lib/auth-context';

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

// Inline Header Component
function Header() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const { cart } = useCart();
  const { user, logout } = useAuth();
  const cartCount = cart.reduce((sum, item) => sum.quantity + item.quantity, 0);

  return (
    <header className="bg-white shadow-md sticky top-0 z-50">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          <Link href="/" className="text-xl font-bold text-blue-600">
            Daily Income Bazar
          </Link>

          <nav className="hidden md:flex items-center gap-6">
            <Link href="/" className="text-slate-700 hover:text-blue-600">হোম</Link>
            <Link href="/about" className="text-slate-700 hover:text-blue-600">আমাদের সম্পর্কে</Link>
            <Link href="/contact" className="text-slate-700 hover:text-blue-600">যোগাযোগ</Link>
          </nav>

          <div className="flex items-center gap-4">
            <Link href="/cart" className="relative">
              <ShoppingCart className="h-6 w-6 text-slate-700" />
              {cartCount > 0 && (
                <span className="absolute -top-2 -right-2 bg-blue-600 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">
                  {cartCount}
                </span>
              )}
            </Link>

            {user ? (
              <div className="flex items-center gap-2">
                <Link href="/member/dashboard">
                  <Button variant="outline" size="sm">ড্যাশবোর্ড</Button>
                </Link>
                <Button variant="ghost" size="sm" onClick={logout}>লগআউট</Button>
              </div>
            ) : (
              <Link href="/auth/login">
                <Button size="sm">লগইন</Button>
              </Link>
            )}

            <button className="md:hidden" onClick={() => setMobileMenuOpen(!mobileMenuOpen)}>
              {mobileMenuOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
            </button>
          </div>
        </div>

        {mobileMenuOpen && (
          <nav className="md:hidden py-4 border-t">
            <div className="flex flex-col gap-4">
              <Link href="/" className="text-slate-700">হোম</Link>
              <Link href="/about" className="text-slate-700">আমাদের সম্পর্কে</Link>
              <Link href="/contact" className="text-slate-700">যোগাযোগ</Link>
            </div>
          </nav>
        )}
      </div>
    </header>
  );
}

// Inline Footer Component
function Footer() {
  return (
    <footer className="bg-slate-900 text-white py-12">
      <div className="container mx-auto px-4">
        <div className="grid md:grid-cols-4 gap-8 mb-8">
          <div>
            <h3 className="text-xl font-bold mb-4">Daily Income Bazar</h3>
            <p className="text-slate-400">প্রিমিয়াম পণ্য এবং আজীবন আয়ের সুযোগ</p>
          </div>
          <div>
            <h4 className="font-semibold mb-4">লিঙ্ক</h4>
            <div className="flex flex-col gap-2">
              <Link href="/about" className="text-slate-400 hover:text-white">আমাদের সম্পর্কে</Link>
              <Link href="/contact" className="text-slate-400 hover:text-white">যোগাযোগ</Link>
            </div>
          </div>
          <div>
            <h4 className="font-semibold mb-4">যোগাযোগ</h4>
            <div className="flex flex-col gap-2 text-slate-400">
              <span className="flex items-center gap-2"><Phone className="h-4 w-4" /> +880 1700-000000</span>
              <span className="flex items-center gap-2"><Mail className="h-4 w-4" /> support@dib.com</span>
            </div>
          </div>
          <div>
            <h4 className="font-semibold mb-4">সামাজিক মাধ্যম</h4>
            <div className="flex gap-4">
              <a href="#" className="text-slate-400 hover:text-white"><Facebook className="h-6 w-6" /></a>
              <a href="#" className="text-slate-400 hover:text-white"><Youtube className="h-6 w-6" /></a>
            </div>
          </div>
        </div>
        <div className="border-t border-slate-800 pt-8 text-center text-slate-400">
          <p>&copy; {new Date().getFullYear()} Daily Income Bazar. All rights reserved.</p>
        </div>
      </div>
    </footer>
  );
}

// Inline ProductCard Component
function ProductCard({ product }: { product: Product }) {
  const { addItem } = useCart();
  const displayPrice = product.salePrice || product.price;
  const discount = product.price > displayPrice 
    ? Math.round(((product.price - displayPrice) / product.price) * 100)
    : 0;

  return (
    <div className="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow overflow-hidden">
      <div className="relative bg-slate-100 h-48">
        {product.img ? (
          <Image src={product.img} alt={product.name} fill className="object-cover" />
        ) : (
          <div className="w-full h-full flex items-center justify-center text-slate-400">No Image</div>
        )}
        {discount > 0 && (
          <div className="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm">-{discount}%</div>
        )}
      </div>
      <div className="p-4">
        <Link href={`/products/${product.id}`}>
          <h3 className="font-semibold text-slate-900 hover:text-blue-600 line-clamp-2 mb-2">{product.name}</h3>
        </Link>
        <div className="flex text-yellow-400 mb-2">
          {[...Array(5)].map((_, i) => <Star key={i} className="h-4 w-4 fill-current" />)}
        </div>
        <div className="flex items-baseline gap-2 mb-2">
          <span className="text-xl font-bold">&#2547;{displayPrice}</span>
          {discount > 0 && <span className="text-sm text-slate-500 line-through">&#2547;{product.price}</span>}
        </div>
        <p className="text-sm text-green-600 mb-3">{product.rp} পয়েন্ট</p>
        <Button size="sm" className="w-full" onClick={() => addItem({ 
          id: product.id, 
          name: product.name, 
          price: product.price, 
          salePrice: displayPrice, 
          image: product.img || '', 
          points: product.rp 
        })}>
          <ShoppingCart className="h-4 w-4 mr-2" /> কার্টে যোগ করুন
        </Button>
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
      <main className="min-h-screen bg-white">
        <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-24">
          <div className="container mx-auto px-4">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">Daily Income Bazar</h1>
            <p className="text-lg md:text-xl text-blue-100 mb-8">প্রিমিয়াম পণ্য এবং আজীবন আয়ের সুযোগ</p>
            <div className="flex gap-4">
              <Link href="#products"><Button size="lg" className="bg-white text-blue-600 hover:bg-blue-50">কেনাকাটা করুন</Button></Link>
              <Link href="/about"><Button size="lg" variant="outline" className="text-white border-white hover:bg-blue-700">আমাদের সম্পর্কে</Button></Link>
            </div>
          </div>
        </section>

        <section className="bg-white py-8 sticky top-16 z-10 shadow-sm">
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
                <Button variant={selectedCategory === 'all' ? 'default' : 'outline'} onClick={() => setSelectedCategory('all')} size="sm">সব</Button>
                {categories.map((cat: any) => (
                  <Button key={cat.id} variant={selectedCategory === cat.id ? 'default' : 'outline'} onClick={() => setSelectedCategory(cat.id)} size="sm">{cat.name}</Button>
                ))}
              </div>
            </div>
          </div>
        </section>

        <section id="products" className="py-12 md:py-16 bg-white">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold mb-8">আমাদের পণ্য</h2>
            {isLoading ? (
              <div className="text-center py-12"><div className="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div></div>
            ) : filteredProducts.length > 0 ? (
              <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                {filteredProducts.map((product: Product) => <ProductCard key={product.id} product={product} />)}
              </div>
            ) : (
              <div className="text-center py-12"><p className="text-gray-600 text-lg">কোনো পণ্য পাওয়া যায়নি</p></div>
            )}
          </div>
        </section>

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
                  <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4"><div className="text-2xl text-blue-600">&#10003;</div></div>
                  <h3 className="text-xl font-semibold mb-2">{feature.title}</h3>
                  <p className="text-gray-600">{feature.desc}</p>
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
