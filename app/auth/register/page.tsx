'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import Link from 'next/link';
import { Mail, Lock, User, AlertCircle, Phone } from 'lucide-react';

export default function RegisterPage() {
  const router = useRouter();
  const [formData, setFormData] = useState({ fullName: '', email: '', phone: '', password: '', confirmPassword: '', sponsorId: '' });
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setFormData(prev => ({ ...prev, [e.target.name]: e.target.value }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setError('');
    if (formData.password !== formData.confirmPassword) { setError('পাসওয়ার্ড মিলছে না'); return; }
    setLoading(true);
    try {
      const res = await fetch('/api/auth/register', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
      });
      if (res.ok) {
        router.push('/auth/login');
      } else {
        const data = await res.json();
        setError(data.error || 'রেজিস্ট্রেশন ব্যর্থ হয়েছে');
      }
    } catch { setError('রেজিস্ট্রেশন ব্যর্থ হয়েছে'); }
    finally { setLoading(false); }
  };

  return (
    <main className="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">
      <div className="max-w-md mx-auto">
        <div className="text-center mb-8">
          <Link href="/" className="text-2xl font-bold text-blue-600">Daily Income Bazar</Link>
        </div>
        <div className="bg-white rounded-lg shadow-lg p-8">
          <div className="text-center mb-8">
            <h1 className="text-3xl font-bold text-slate-900">রেজিস্টার করুন</h1>
            <p className="text-slate-600 mt-2">নতুন অ্যাকাউন্ট তৈরি করুন</p>
          </div>
          {error && (
            <div className="bg-red-50 border border-red-200 rounded-lg p-4 mb-6 flex gap-3">
              <AlertCircle className="h-5 w-5 text-red-600 flex-shrink-0" />
              <p className="text-red-800 text-sm">{error}</p>
            </div>
          )}
          <form onSubmit={handleSubmit} className="space-y-4">
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">সম্পূর্ণ নাম</label>
              <div className="relative">
                <User className="absolute left-3 top-3 h-5 w-5 text-slate-400" />
                <input type="text" name="fullName" value={formData.fullName} onChange={handleChange} className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg" placeholder="আপনার নাম" required />
              </div>
            </div>
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">ইমেইল</label>
              <div className="relative">
                <Mail className="absolute left-3 top-3 h-5 w-5 text-slate-400" />
                <input type="email" name="email" value={formData.email} onChange={handleChange} className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg" placeholder="আপনার ইমেইল" required />
              </div>
            </div>
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">ফোন নম্বর</label>
              <div className="relative">
                <Phone className="absolute left-3 top-3 h-5 w-5 text-slate-400" />
                <input type="tel" name="phone" value={formData.phone} onChange={handleChange} className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg" placeholder="আপনার ফোন" required />
              </div>
            </div>
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">স্পন্সর আইডি</label>
              <input type="text" name="sponsorId" value={formData.sponsorId} onChange={handleChange} className="w-full px-4 py-2 border border-slate-300 rounded-lg" placeholder="স্পন্সরের আইডি (ঐচ্ছিক)" />
            </div>
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">পাসওয়ার্ড</label>
              <div className="relative">
                <Lock className="absolute left-3 top-3 h-5 w-5 text-slate-400" />
                <input type="password" name="password" value={formData.password} onChange={handleChange} className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg" placeholder="পাসওয়ার্ড" required />
              </div>
            </div>
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">পাসওয়ার্ড নিশ্চিত করুন</label>
              <div className="relative">
                <Lock className="absolute left-3 top-3 h-5 w-5 text-slate-400" />
                <input type="password" name="confirmPassword" value={formData.confirmPassword} onChange={handleChange} className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg" placeholder="পাসওয়ার্ড নিশ্চিত করুন" required />
              </div>
            </div>
            <button type="submit" disabled={loading} className="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 disabled:opacity-50">
              {loading ? 'রেজিস্টার হচ্ছে...' : 'রেজিস্টার করুন'}
            </button>
          </form>
          <div className="mt-6 text-center text-sm text-slate-600">
            <p>ইতিমধ্যে সদস্য? <Link href="/auth/login" className="text-blue-600 hover:text-blue-700 font-semibold">লগইন করুন</Link></p>
          </div>
          <div className="mt-6 pt-6 border-t border-slate-200">
            <Link href="/" className="text-blue-600 hover:text-blue-700 text-sm font-semibold text-center block">&#8592; হোম পেজে ফিরুন</Link>
          </div>
        </div>
      </div>
    </main>
  );
}
