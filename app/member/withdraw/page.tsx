'use client';

import { useContext, useState } from 'react';
import useSWR from 'swr';
import { AuthContext } from '@/lib/auth-context';
import MemberLayout from '@/components/member-layout';
import { Button } from '@/components/ui/button';
import { AlertCircle, CheckCircle } from 'lucide-react';

const fetcher = (url: string) => fetch(url).then(r => r.json());

export default function WithdrawPage() {
  const { user } = useContext(AuthContext);
  const { data: balance } = useSWR(
    user ? `/api/member/${user.uid}/balance` : null,
    fetcher
  );

  const [amount, setAmount] = useState('');
  const [method, setMethod] = useState('bkash');
  const [accountNumber, setAccountNumber] = useState('');
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');
  const [success, setSuccess] = useState(false);

  const cashWallet = balance?.cashWallet || 0;
  const minWithdraw = 500;

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setError('');
    setSuccess(false);
    setLoading(true);

    const withdrawAmount = parseFloat(amount);

    if (withdrawAmount < minWithdraw) {
      setError(`ন্যূনতম ৳${minWithdraw} উইথড্র করতে পারবেন`);
      setLoading(false);
      return;
    }

    if (withdrawAmount > cashWallet) {
      setError('অপর্যাপ্ত ব্যালেন্স');
      setLoading(false);
      return;
    }

    try {
      const response = await fetch('/api/member/withdraw', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          userId: user?.uid,
          amount: withdrawAmount,
          method,
          accountNumber
        })
      });

      if (response.ok) {
        setSuccess(true);
        setAmount('');
        setAccountNumber('');
        setTimeout(() => setSuccess(false), 5000);
      } else {
        setError('উইথড্র অনুরোধ ব্যর্থ হয়েছে');
      }
    } catch (err) {
      setError('একটি ত্রুটি ঘটেছে');
    } finally {
      setLoading(false);
    }
  };

  return (
    <MemberLayout>
      <div className="max-w-2xl">
        <h1 className="text-3xl font-bold text-slate-900 mb-8">উইথড্র করুন</h1>

        {/* Balance */}
        <div className="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-8 mb-8">
          <p className="text-green-100 mb-2">ক্যাশ ওয়ালেট ব্যালেন্স</p>
          <p className="text-5xl font-bold">৳{cashWallet.toLocaleString()}</p>
          <p className="text-green-100 text-sm mt-2">ন্যূনতম উইথড্র: ৳{minWithdraw}</p>
        </div>

        {/* Form */}
        <div className="bg-white rounded-lg shadow-md p-6 md:p-8 mb-8">
          <h2 className="text-xl font-bold text-slate-900 mb-6">উইথড্র অনুরোধ</h2>

          {error && (
            <div className="bg-red-50 border border-red-200 rounded-lg p-4 mb-6 flex gap-3">
              <AlertCircle className="h-5 w-5 text-red-600 flex-shrink-0 mt-0.5" />
              <p className="text-red-800">{error}</p>
            </div>
          )}

          {success && (
            <div className="bg-green-50 border border-green-200 rounded-lg p-4 mb-6 flex gap-3">
              <CheckCircle className="h-5 w-5 text-green-600 flex-shrink-0 mt-0.5" />
              <div>
                <p className="text-green-800 font-semibold">অনুরোধ সফল!</p>
                <p className="text-green-700 text-sm">আপনার উইথড্র অনুরোধ প্রসেস করা হচ্ছে</p>
              </div>
            </div>
          )}

          <form onSubmit={handleSubmit} className="space-y-4">
            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">
                পেমেন্ট পদ্ধতি
              </label>
              <select
                value={method}
                onChange={(e) => setMethod(e.target.value)}
                className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                <option value="bkash">bKash</option>
                <option value="nagad">Nagad</option>
                <option value="rocket">Rocket</option>
                <option value="bank">ব্যাংক ট্রান্সফার</option>
              </select>
            </div>

            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">
                অ্যাকাউন্ট নম্বর
              </label>
              <input
                type="text"
                value={accountNumber}
                onChange={(e) => setAccountNumber(e.target.value)}
                placeholder="আপনার মোবাইল/ব্যাংক নম্বর"
                className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
              />
            </div>

            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">
                টাকার পরিমাণ
              </label>
              <div className="relative">
                <span className="absolute left-4 top-2.5 text-slate-600 font-semibold">৳</span>
                <input
                  type="number"
                  value={amount}
                  onChange={(e) => setAmount(e.target.value)}
                  placeholder={`ন্যূনতম ৳${minWithdraw}`}
                  min={minWithdraw}
                  max={cashWallet}
                  className="w-full pl-8 pr-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                />
              </div>
              <p className="text-xs text-slate-600 mt-1">
                সর্বোচ্চ: ৳{cashWallet}
              </p>
            </div>

            <Button
              type="submit"
              size="lg"
              className="w-full"
              disabled={loading || !amount}
            >
              {loading ? 'প্রক্রিয়াজাত হচ্ছে...' : 'উইথড্র করুন'}
            </Button>
          </form>
        </div>

        {/* Info */}
        <div className="bg-blue-50 border border-blue-200 rounded-lg p-6">
          <h3 className="font-bold text-blue-900 mb-3">গুরুত্বপূর্ণ তথ্য</h3>
          <ul className="space-y-2 text-blue-900 text-sm">
            <li>• উইথড্র অনুরোধ 24-48 ঘণ্টায় প্রক্রিয়া করা হয়</li>
            <li>• ব্যাংক ট্রান্সফার 3-5 কর্মদিবস সময় নিতে পারে</li>
            <li>• মোবাইল ওয়ালেটে তাৎক্ষণিক টাকা পাবেন</li>
            <li>• প্রতিটি উইথড্রে ৳50 চার্জ কাটা হবে</li>
          </ul>
        </div>
      </div>
    </MemberLayout>
  );
}
