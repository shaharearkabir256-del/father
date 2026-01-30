'use client';

import { useState } from 'react';
import { useRouter } from 'next/navigation';
import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { useAuth } from '@/lib/auth-context';
import { Mail, Lock, AlertCircle } from 'lucide-react';

export default function LoginPage() {
  const router = useRouter();
  const { login, loading } = useAuth();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setError('');
    try {
      await login(email, password);
      router.push('/');
    } catch (err: any) {
      setError(err.message || 'লগইন ব্যর্থ হয়েছে');
    }
  };

  return (
    <main className="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">
      <div className="max-w-md mx-auto">
        <div className="text-center mb-8">
          <Link href="/" className="text-2xl font-bold text-blue-600">Daily Income Bazar</Link>
        </div>
        <div className="bg-white rounded-lg shadow-lg p-8">
          <div className="text-center mb-8">
            <h1 className="text-3xl font-bold text-slate-900">লগইন করুন</h1>
            <p className="text-slate-600 mt-2">আপনার অ্যাকাউন্টে প্রবেশ করুন</p>
          </div>
          {error && (
            <div className="bg-red-50 border border-red-200 rounded-lg p-4 mb-6 flex gap-3">
              <AlertCircle className="h-5 w-5 text-red-600 flex-shrink-0" />
              <p className="text-red-800 text-sm">{error}</p>
            </div>
          )}
          <form onSubmit={handleSubmit} className="space-y-4">
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">ইমেইল</label>
              <div className="relative">
                <Mail className="absolute left-3 top-3 h-5 w-5 text-slate-400" />
                <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="আপনার ইমেইল" required />
              </div>
            </div>
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">পাসওয়ার্ড</label>
              <div className="relative">
                <Lock className="absolute left-3 top-3 h-5 w-5 text-slate-400" />
                <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="পাসওয়ার্ড" required />
              </div>
            </div>
            <Button type="submit" size="lg" className="w-full" disabled={loading}>{loading ? 'লগইন হচ্ছে...' : 'লগইন করুন'}</Button>
          </form>
          <div className="mt-6 text-center text-sm text-slate-600">
            <p>এখনো সদস্য নন?{' '}<Link href="/auth/register" className="text-blue-600 hover:text-blue-700 font-semibold">রেজিস্টার করুন</Link></p>
          </div>
          <div className="mt-6 pt-6 border-t border-slate-200">
            <Link href="/" className="text-blue-600 hover:text-blue-700 text-sm font-semibold text-center block">&#8592; হোম পেজে ফিরুন</Link>
          </div>
        </div>
      </div>
    </main>
  );
}
