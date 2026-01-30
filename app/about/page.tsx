'use client';

import Link from 'next/link';
import { useState } from 'react';
import { Button } from '@/components/ui/button';
import { Award, Users, Zap, TrendingUp, ShoppingCart, Menu, X, Phone, Mail, Facebook, Youtube } from 'lucide-react';
import { useCart } from '@/lib/cart-context';
import { useAuth } from '@/lib/auth-context';

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
            <Link href="/about" className="text-blue-600 font-semibold">আমাদের সম্পর্কে</Link>
            <Link href="/contact" className="text-slate-700 hover:text-blue-600">যোগাযোগ</Link>
          </nav>
          <div className="flex items-center gap-4">
            <Link href="/cart" className="relative">
              <ShoppingCart className="h-6 w-6 text-slate-700" />
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

export default function AboutPage() {
  return (
    <>
      <Header />
      <main className="bg-white">
        <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-24">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">আমাদের সম্পর্কে</h1>
            <p className="text-lg md:text-xl text-blue-100">Daily Income Bazar - আপনার আয়ের নতুন দিগন্ত</p>
          </div>
        </section>

        <section className="py-16 md:py-24">
          <div className="container mx-auto px-4">
            <div className="grid md:grid-cols-2 gap-12">
              <div>
                <h2 className="text-3xl font-bold text-slate-900 mb-4">আমাদের মিশন</h2>
                <p className="text-slate-600 text-lg mb-4">Daily Income Bazar-এর লক্ষ্য হল প্রতিটি বাঙালিকে মানসম্মত পণ্য সাশ্রয়ী মূল্যে সরবরাহ করা।</p>
              </div>
              <div>
                <h2 className="text-3xl font-bold text-slate-900 mb-4">আমাদের ভিশন</h2>
                <p className="text-slate-600 text-lg mb-4">আমরা স্বপ্ন দেখি একটি ন্যায্য বাণিজ্যিক পরিবেশ তৈরি করার।</p>
              </div>
            </div>
          </div>
        </section>

        <section className="bg-slate-50 py-16 md:py-24">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold text-slate-900 text-center mb-12">আমাদের মূল্যবোধ</h2>
            <div className="grid md:grid-cols-4 gap-8">
              {[
                { icon: Award, title: 'সততা', desc: 'সৎ এবং স্বচ্ছ ব্যবসায়িক অনুশীলন' },
                { icon: Users, title: 'সম্প্রদায়', desc: 'সদস্যরা আমাদের সবচেয়ে বড় সম্পদ' },
                { icon: TrendingUp, title: 'বৃদ্ধি', desc: 'ক্রমাগত উন্নতি এবং উদ্ভাবন' },
                { icon: Zap, title: 'শক্তি', desc: 'আপনার স্বপ্ন পূরণে কাজ করি' }
              ].map((value, i) => (
                <div key={i} className="bg-white rounded-lg p-6 text-center shadow-md">
                  <value.icon className="h-12 w-12 text-blue-600 mx-auto mb-4" />
                  <h3 className="text-xl font-bold text-slate-900 mb-2">{value.title}</h3>
                  <p className="text-slate-600">{value.desc}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        <section className="py-16 md:py-24">
          <div className="container mx-auto px-4">
            <div className="grid md:grid-cols-4 gap-8 text-center">
              {[
                { number: '৫০,০০০+', label: 'সক্রিয় সদস্য' },
                { number: '২০০+', label: 'পণ্য ক্যাটালগ' },
                { number: '৫০০০+', label: 'সফল ক্রয়' },
                { number: '৫০ বিলিয়ন+', label: 'বিতরণ করা আয়' }
              ].map((stat, i) => (
                <div key={i} className="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-lg">
                  <p className="text-4xl font-bold text-blue-600 mb-2">{stat.number}</p>
                  <p className="text-slate-700 font-medium">{stat.label}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        <section className="bg-blue-600 text-white py-16 md:py-24">
          <div className="container mx-auto px-4 text-center">
            <h2 className="text-3xl md:text-4xl font-bold mb-6">আপনার যাত্রা শুরু করুন আজই</h2>
            <p className="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">লক্ষ হাজার সফল সদস্যদের সাথে যোগ দিন।</p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Link href="/auth/register"><Button size="lg" variant="secondary">এখনই রেজিস্টার করুন</Button></Link>
              <Link href="/contact"><Button size="lg" variant="outline" className="text-white border-white hover:bg-blue-700">যোগাযোগ করুন</Button></Link>
            </div>
          </div>
        </section>
      </main>
      <Footer />
    </>
  );
}
