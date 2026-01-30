'use client';

import Link from 'next/link';
import Image from 'next/image';
import { useState } from 'react';
import { useCart } from '@/lib/cart-context';
import { useAuth } from '@/lib/auth-context';
import { Button } from '@/components/ui/button';
import { Trash2, Plus, Minus, ArrowLeft, ShoppingBag, ShoppingCart, Menu, X, Phone, Mail, Facebook, Youtube } from 'lucide-react';

function Header() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const { cart } = useCart();
  const { user, logout } = useAuth();
  const cartCount = cart.reduce((sum, item) => sum.quantity + item.quantity, 0);

  return (
    <header className="bg-white shadow-md sticky top-0 z-50">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          <Link href="/" className="text-xl font-bold text-blue-600">Daily Income Bazar</Link>
          <nav className="hidden md:flex items-center gap-6">
            <Link href="/" className="text-slate-700 hover:text-blue-600">হোম</Link>
            <Link href="/about" className="text-slate-700 hover:text-blue-600">আমাদের সম্পর্কে</Link>
            <Link href="/contact" className="text-slate-700 hover:text-blue-600">যোগাযোগ</Link>
          </nav>
          <div className="flex items-center gap-4">
            <Link href="/cart" className="relative">
              <ShoppingCart className="h-6 w-6 text-blue-600" />
              {cartCount > 0 && <span className="absolute -top-2 -right-2 bg-blue-600 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">{cartCount}</span>}
            </Link>
            {user ? (
              <div className="flex items-center gap-2">
                <Link href="/member/dashboard"><Button variant="outline" size="sm">ড্যাশবোর্ড</Button></Link>
                <Button variant="ghost" size="sm" onClick={logout}>লগআউট</Button>
              </div>
            ) : (
              <Link href="/auth/login"><Button size="sm">লগইন</Button></Link>
            )}
            <button className="md:hidden" onClick={() => setMobileMenuOpen(!mobileMenuOpen)}>
              {mobileMenuOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
            </button>
          </div>
        </div>
      </div>
    </header>
  );
}

function Footer() {
  return (
    <footer className="bg-slate-900 text-white py-12">
      <div className="container mx-auto px-4">
        <div className="grid md:grid-cols-4 gap-8 mb-8">
          <div><h3 className="text-xl font-bold mb-4">Daily Income Bazar</h3><p className="text-slate-400">প্রিমিয়াম পণ্য</p></div>
          <div><h4 className="font-semibold mb-4">লিঙ্ক</h4><div className="flex flex-col gap-2"><Link href="/about" className="text-slate-400 hover:text-white">আমাদের সম্পর্কে</Link><Link href="/contact" className="text-slate-400 hover:text-white">যোগাযোগ</Link></div></div>
          <div><h4 className="font-semibold mb-4">যোগাযোগ</h4><div className="flex flex-col gap-2 text-slate-400"><span className="flex items-center gap-2"><Phone className="h-4 w-4" /> +880 1700-000000</span><span className="flex items-center gap-2"><Mail className="h-4 w-4" /> support@dib.com</span></div></div>
          <div><h4 className="font-semibold mb-4">সামাজিক</h4><div className="flex gap-4"><a href="#" className="text-slate-400 hover:text-white"><Facebook className="h-6 w-6" /></a><a href="#" className="text-slate-400 hover:text-white"><Youtube className="h-6 w-6" /></a></div></div>
        </div>
        <div className="border-t border-slate-800 pt-8 text-center text-slate-400"><p>&copy; {new Date().getFullYear()} Daily Income Bazar</p></div>
      </div>
    </footer>
  );
}

export default function CartPage() {
  const { cart, removeItem, updateQuantity } = useCart();
  const subtotal = cart.reduce((sum, item) => sum + (item.salePrice || item.price) * item.quantity, 0);
  const tax = subtotal * 0.15;
  const total = subtotal + tax;

  if (cart.length === 0) {
    return (
      <>
        <Header />
        <main className="min-h-screen bg-slate-50 py-12">
          <div className="container mx-auto px-4 text-center">
            <ShoppingBag className="h-16 w-16 mx-auto text-slate-400 mb-4" />
            <h1 className="text-2xl font-bold text-slate-900 mb-2">কার্ট খালি</h1>
            <p className="text-slate-600 mb-8">আপনার কার্টে কোনো পণ্য নেই</p>
            <Link href="/"><Button size="lg">কেনাকাটা শুরু করুন</Button></Link>
          </div>
        </main>
        <Footer />
      </>
    );
  }

  return (
    <>
      <Header />
      <main className="min-h-screen bg-slate-50 py-8">
        <div className="container mx-auto px-4">
          <Link href="/" className="flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-8">
            <ArrowLeft className="h-4 w-4" /> কেনাকাটা চালিয়ে যান
          </Link>
          <div className="grid lg:grid-cols-3 gap-8">
            <div className="lg:col-span-2">
              <div className="bg-white rounded-lg shadow-md overflow-hidden">
                <div className="bg-blue-600 text-white px-6 py-4">
                  <h1 className="text-2xl font-bold">শপিং কার্ট</h1>
                  <p className="text-blue-100 text-sm">{cart.length} আইটেম</p>
                </div>
                <div className="divide-y">
                  {cart.map(item => (
                    <div key={item.id} className="p-6 flex gap-4">
                      <div className="w-20 h-20 bg-slate-100 rounded-lg overflow-hidden flex-shrink-0">
                        {item.image ? <Image src={item.image} alt={item.name} width={80} height={80} className="object-cover" /> : <div className="w-full h-full flex items-center justify-center text-slate-400">No Img</div>}
                      </div>
                      <div className="flex-1">
                        <h3 className="font-semibold text-slate-900 mb-1">{item.name}</h3>
                        <p className="text-blue-600 font-semibold">&#2547;{item.salePrice || item.price}</p>
                      </div>
                      <div className="flex flex-col items-end justify-between">
                        <button onClick={() => removeItem(item.id)} className="text-red-600 hover:text-red-700"><Trash2 className="h-5 w-5" /></button>
                        <div className="flex items-center border border-slate-300 rounded">
                          <button onClick={() => updateQuantity(item.id, item.quantity - 1)} className="px-2 py-1"><Minus className="h-4 w-4" /></button>
                          <span className="px-3 py-1 font-semibold text-sm">{item.quantity}</span>
                          <button onClick={() => updateQuantity(item.id, item.quantity + 1)} className="px-2 py-1"><Plus className="h-4 w-4" /></button>
                        </div>
                        <p className="text-slate-900 font-semibold">&#2547;{((item.salePrice || item.price) * item.quantity).toFixed(2)}</p>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            </div>
            <div>
              <div className="bg-white rounded-lg shadow-md p-6 sticky top-20">
                <h2 className="text-xl font-bold text-slate-900 mb-6">অর্ডার সারসংক্ষেপ</h2>
                <div className="space-y-3 pb-4 border-b border-slate-200">
                  <div className="flex justify-between text-slate-600"><span>সাবটোটাল</span><span>&#2547;{subtotal.toFixed(2)}</span></div>
                  <div className="flex justify-between text-slate-600"><span>ট্যাক্স (15%)</span><span>&#2547;{tax.toFixed(2)}</span></div>
                  <div className="flex justify-between text-slate-600"><span>ডেলিভারি</span><span className="text-green-600 font-semibold">বিনামূল্যে</span></div>
                </div>
                <div className="flex justify-between text-lg font-bold text-slate-900 py-4"><span>মোট</span><span>&#2547;{total.toFixed(2)}</span></div>
                <Link href="/checkout"><Button size="lg" className="w-full mb-3">চেকআউটে যান</Button></Link>
                <Link href="/"><Button variant="outline" className="w-full">কেনাকাটা চালিয়ে যান</Button></Link>
              </div>
            </div>
          </div>
        </div>
      </main>
      <Footer />
    </>
  );
}
