'use client';

import { useState } from 'react';
import Link from 'next/link';
import { Mail, Phone, MapPin, Clock, ShoppingCart, Menu, X, Facebook, Youtube, CheckCircle, AlertCircle } from 'lucide-react';

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
            <Link href="/contact" className="text-blue-600 font-medium">যোগাযোগ</Link>
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

export default function ContactPage() {
  const [formData, setFormData] = useState({ name: '', email: '', phone: '', message: '' });
  const [status, setStatus] = useState<'idle' | 'loading' | 'success' | 'error'>('idle');

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setStatus('loading');
    try {
      const res = await fetch('/api/contact', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(formData) });
      if (res.ok) { setStatus('success'); setFormData({ name: '', email: '', phone: '', message: '' }); }
      else setStatus('error');
    } catch { setStatus('error'); }
  };

  return (
    <>
      <Header />
      <main className="min-h-screen bg-white">
        <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl font-bold mb-4">যোগাযোগ করুন</h1>
            <p className="text-blue-100 text-lg">আমরা আপনার সেবায় সর্বদা প্রস্তুত</p>
          </div>
        </section>

        <section className="py-16">
          <div className="container mx-auto px-4">
            <div className="grid md:grid-cols-2 gap-12">
              <div>
                <h2 className="text-2xl font-bold mb-6">যোগাযোগের তথ্য</h2>
                <div className="space-y-6">
                  {[
                    { icon: Phone, title: 'ফোন', info: '+880 1700-000000' },
                    { icon: Mail, title: 'ইমেইল', info: 'support@dailyincomebazar.com' },
                    { icon: MapPin, title: 'ঠিকানা', info: 'ঢাকা, বাংলাদেশ' },
                    { icon: Clock, title: 'সময়', info: 'সকাল ১০টা - রাত ১০টা' },
                  ].map((item, i) => (
                    <div key={i} className="flex items-start gap-4">
                      <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <item.icon className="h-6 w-6 text-blue-600" />
                      </div>
                      <div>
                        <h3 className="font-semibold">{item.title}</h3>
                        <p className="text-gray-600">{item.info}</p>
                      </div>
                    </div>
                  ))}
                </div>
              </div>

              <div>
                <h2 className="text-2xl font-bold mb-6">মেসেজ পাঠান</h2>
                {status === 'success' && (
                  <div className="mb-4 p-4 bg-green-50 text-green-700 rounded-lg flex items-center gap-2">
                    <CheckCircle className="h-5 w-5" /> মেসেজ পাঠানো হয়েছে!
                  </div>
                )}
                {status === 'error' && (
                  <div className="mb-4 p-4 bg-red-50 text-red-700 rounded-lg flex items-center gap-2">
                    <AlertCircle className="h-5 w-5" /> কিছু সমস্যা হয়েছে
                  </div>
                )}
                <form onSubmit={handleSubmit} className="space-y-4">
                  <input type="text" placeholder="আপনার নাম" value={formData.name} onChange={(e) => setFormData({...formData, name: e.target.value})} className="w-full px-4 py-3 border border-gray-300 rounded-lg" required />
                  <input type="email" placeholder="ইমেইল" value={formData.email} onChange={(e) => setFormData({...formData, email: e.target.value})} className="w-full px-4 py-3 border border-gray-300 rounded-lg" required />
                  <input type="tel" placeholder="ফোন নম্বর" value={formData.phone} onChange={(e) => setFormData({...formData, phone: e.target.value})} className="w-full px-4 py-3 border border-gray-300 rounded-lg" />
                  <textarea placeholder="আপনার মেসেজ" value={formData.message} onChange={(e) => setFormData({...formData, message: e.target.value})} rows={5} className="w-full px-4 py-3 border border-gray-300 rounded-lg" required />
                  <button type="submit" disabled={status === 'loading'} className="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 disabled:opacity-50">
                    {status === 'loading' ? 'পাঠানো হচ্ছে...' : 'মেসেজ পাঠান'}
                  </button>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      <Footer />
    </>
  );
}
