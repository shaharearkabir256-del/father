'use client';

import { useState } from 'react';
import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { Mail, Phone, MapPin, Clock, AlertCircle, CheckCircle, ShoppingCart, Menu, X, Facebook, Youtube } from 'lucide-react';
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
            <Link href="/about" className="text-slate-700 hover:text-blue-600">আমাদের সম্পর্কে</Link>
            <Link href="/contact" className="text-blue-600 font-semibold">যোগাযোগ</Link>
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

export default function ContactPage() {
  const [formData, setFormData] = useState({ name: '', email: '', phone: '', subject: '', message: '' });
  const [submitted, setSubmitted] = useState(false);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>) => {
    setFormData(prev => ({ ...prev, [e.target.name]: e.target.value }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError('');
    try {
      const response = await fetch('/api/contact', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(formData) });
      if (response.ok) {
        setSubmitted(true);
        setFormData({ name: '', email: '', phone: '', subject: '', message: '' });
        setTimeout(() => setSubmitted(false), 5000);
      } else setError('বার্তা পাঠাতে ব্যর্থ হয়েছে');
    } catch { setError('একটি ত্রুটি ঘটেছে'); }
    finally { setLoading(false); }
  };

  return (
    <>
      <Header />
      <main className="bg-white">
        <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-24">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">আমাদের সাথে যোগাযোগ করুন</h1>
            <p className="text-lg md:text-xl text-blue-100">আমরা আপনার প্রতিটি প্রশ্ন শুনতে আগ্রহী</p>
          </div>
        </section>

        <div className="container mx-auto px-4 py-16">
          <div className="grid md:grid-cols-3 gap-8 mb-16">
            {[
              { icon: Phone, title: 'ফোন', content: '+880 1700-000000', desc: 'সোমবার - শুক্রবার' },
              { icon: Mail, title: 'ইমেইল', content: 'support@dib.com', desc: '২৪ ঘন্টায় উত্তর' },
              { icon: MapPin, title: 'ঠিকানা', content: 'ঢাকা, বাংলাদেশ', desc: 'গাউছিয়া এভিনিউ' }
            ].map((info, i) => (
              <div key={i} className="bg-slate-50 rounded-lg p-8 text-center">
                <info.icon className="h-12 w-12 text-blue-600 mx-auto mb-4" />
                <h3 className="text-xl font-bold text-slate-900 mb-2">{info.title}</h3>
                <p className="text-lg font-semibold text-slate-900 mb-2">{info.content}</p>
                <p className="text-slate-600 text-sm">{info.desc}</p>
              </div>
            ))}
          </div>

          <div className="max-w-2xl mx-auto">
            <h2 className="text-2xl font-bold text-slate-900 mb-6">আমাদের কাছে বার্তা পাঠান</h2>
            {submitted && (
              <div className="bg-green-50 border border-green-200 rounded-lg p-4 mb-6 flex gap-3">
                <CheckCircle className="h-5 w-5 text-green-600 flex-shrink-0" />
                <p className="text-green-800">বার্তা পাঠানো হয়েছে!</p>
              </div>
            )}
            {error && (
              <div className="bg-red-50 border border-red-200 rounded-lg p-4 mb-6 flex gap-3">
                <AlertCircle className="h-5 w-5 text-red-600 flex-shrink-0" />
                <p className="text-red-800 text-sm">{error}</p>
              </div>
            )}
            <form onSubmit={handleSubmit} className="space-y-4">
              <input type="text" name="name" value={formData.name} onChange={handleChange} className="w-full px-4 py-2 border border-slate-300 rounded-lg" placeholder="নাম" required />
              <div className="grid sm:grid-cols-2 gap-4">
                <input type="email" name="email" value={formData.email} onChange={handleChange} className="w-full px-4 py-2 border border-slate-300 rounded-lg" placeholder="ইমেইল" required />
                <input type="tel" name="phone" value={formData.phone} onChange={handleChange} className="w-full px-4 py-2 border border-slate-300 rounded-lg" placeholder="ফোন" />
              </div>
              <select name="subject" value={formData.subject} onChange={handleChange} className="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                <option value="">বিষয় নির্বাচন করুন</option>
                <option value="membership">সদস্যপদ</option>
                <option value="product">পণ্য</option>
                <option value="payment">পেমেন্ট</option>
                <option value="other">অন্যান্য</option>
              </select>
              <textarea name="message" value={formData.message} onChange={handleChange} className="w-full px-4 py-2 border border-slate-300 rounded-lg h-32" placeholder="বার্তা" required></textarea>
              <Button type="submit" size="lg" className="w-full" disabled={loading}>{loading ? 'পাঠাচ্ছে...' : 'বার্তা পাঠান'}</Button>
            </form>
          </div>
        </div>
      </main>
      <Footer />
    </>
  );
}
