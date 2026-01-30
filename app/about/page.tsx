'use client';

import { useState } from 'react';
import Link from 'next/link';
import { Award, Users, Zap, TrendingUp, ShoppingCart, Menu, X, Phone, Mail, Facebook, Youtube } from 'lucide-react';

function Header() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  return (
    <header className="bg-white shadow-md sticky top-0 z-50">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          <Link href="/" className="text-xl font-bold text-blue-600">Daily Income Bazar</Link>
          <nav className="hidden md:flex items-center gap-6">
            <Link href="/" className="text-slate-700 hover:text-blue-600">হোম</Link>
            <Link href="/about" className="text-blue-600 font-medium">আমাদের সম্পর্কে</Link>
            <Link href="/contact" className="text-slate-700 hover:text-blue-600">যোগাযোগ</Link>
          </nav>
          <div className="flex items-center gap-4">
            <Link href="/cart"><ShoppingCart className="h-6 w-6 text-slate-700" /></Link>
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

export default function AboutPage() {
  return (
    <>
      <Header />
      <main className="min-h-screen bg-white">
        <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl font-bold mb-4">আমাদের সম্পর্কে</h1>
            <p className="text-blue-100 text-lg">Daily Income Bazar - আপনার বিশ্বস্ত শপিং ও আয়ের সঙ্গী</p>
          </div>
        </section>

        <section className="py-16">
          <div className="container mx-auto px-4">
            <div className="max-w-3xl mx-auto text-center mb-12">
              <h2 className="text-3xl font-bold mb-4">আমাদের মিশন</h2>
              <p className="text-gray-600 text-lg">আমরা বাংলাদেশের মানুষদের জন্য সেরা মানের পণ্য এবং আয়ের সুযোগ প্রদান করতে প্রতিশ্রুতিবদ্ধ। আমাদের MLM সিস্টেম আপনাকে আপনার নেটওয়ার্ক থেকে আয় করার সুযোগ দেয়।</p>
            </div>

            <div className="grid md:grid-cols-4 gap-8">
              {[
                { icon: Award, title: 'প্রিমিয়াম পণ্য', desc: 'সর্বোচ্চ মানের পণ্য' },
                { icon: Users, title: '১০,০০০+ সদস্য', desc: 'সক্রিয় নেটওয়ার্ক' },
                { icon: Zap, title: 'দ্রুত ডেলিভারি', desc: '২৪ ঘন্টার মধ্যে' },
                { icon: TrendingUp, title: 'স্থায়ী আয়', desc: 'MLM সিস্টেম' },
              ].map((item, i) => (
                <div key={i} className="text-center p-6 rounded-lg bg-gray-50">
                  <item.icon className="h-12 w-12 text-blue-600 mx-auto mb-4" />
                  <h3 className="text-xl font-semibold mb-2">{item.title}</h3>
                  <p className="text-gray-600">{item.desc}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        <section className="bg-gray-50 py-16">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold text-center mb-12">কেন Daily Income Bazar?</h2>
            <div className="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
              {[
                'সেরা মানের পণ্য সরাসরি প্রস্তুতকারক থেকে',
                '৫ ধরনের আয়ের সুযোগ - সরাসরি, দৈনিক, জেনারেশন, ম্যাচিং',
                'সম্পূর্ণ স্বচ্ছ লেনদেন ও আয় ব্যবস্থা',
                '২৪/৭ গ্রাহক সেবা',
                'মোবাইল ব্যাংকিং সমর্থন - বিকাশ, নগদ',
                'সহজ এবং নিরাপদ উইথড্র ব্যবস্থা',
              ].map((item, i) => (
                <div key={i} className="flex items-start gap-3">
                  <span className="text-green-500 text-xl">&#10003;</span>
                  <p className="text-gray-700">{item}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        <section className="py-16">
          <div className="container mx-auto px-4 text-center">
            <h2 className="text-3xl font-bold mb-4">আজই যোগ দিন!</h2>
            <p className="text-gray-600 mb-8">আমাদের পরিবারের অংশ হয়ে শুরু করুন আয়ের নতুন যাত্রা</p>
            <Link href="/auth/register" className="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">রেজিস্ট্রেশন করুন</Link>
          </div>
        </section>
      </main>
      <Footer />
    </>
  );
}
