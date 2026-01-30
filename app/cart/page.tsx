'use client';

import { useState } from 'react';
import Link from 'next/link';
import { ShoppingBag, ShoppingCart, Menu, X, ArrowLeft } from 'lucide-react';

function Header() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
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
            <Link href="/cart"><ShoppingCart className="h-6 w-6 text-blue-600" /></Link>
            <Link href="/auth/login" className="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">লগইন</Link>
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
      <div className="container mx-auto px-4 text-center">
        <p className="text-slate-400">&copy; {new Date().getFullYear()} Daily Income Bazar. All rights reserved.</p>
      </div>
    </footer>
  );
}

export default function CartPage() {
  return (
    <>
      <Header />
      <main className="min-h-screen bg-slate-50 py-12">
        <div className="container mx-auto px-4">
          <Link href="/" className="flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-8">
            <ArrowLeft className="h-4 w-4" /> কেনাকাটা চালিয়ে যান
          </Link>
          <div className="text-center py-16">
            <ShoppingBag className="h-16 w-16 mx-auto text-slate-400 mb-4" />
            <h1 className="text-2xl font-bold text-slate-900 mb-2">কার্ট খালি</h1>
            <p className="text-slate-600 mb-8">আপনার কার্টে কোনো পণ্য নেই</p>
            <Link href="/" className="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">কেনাকাটা শুরু করুন</Link>
          </div>
        </div>
      </main>
      <Footer />
    </>
  );
}
