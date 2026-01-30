'use client';

import { useContext, useState } from 'react';
import { AuthContext } from '@/lib/auth-context';
import { Button } from '@/components/ui/button';
import MemberLayout from '@/components/member-layout';
import { AlertCircle, CheckCircle } from 'lucide-react';

export default function ProfilePage() {
  const { user } = useContext(AuthContext);
  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  const [error, setError] = useState('');
  const [formData, setFormData] = useState({
    fullName: user?.displayName || '',
    email: user?.email || '',
    phone: '',
    sponsorId: '',
    address: '',
    city: '',
    district: ''
  });

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError('');
    setSuccess(false);

    try {
      const response = await fetch(`/api/member/${user?.uid}/profile`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
      });

      if (response.ok) {
        setSuccess(true);
        setTimeout(() => setSuccess(false), 3000);
      } else {
        setError('প্রোফাইল আপডেট ব্যর্থ হয়েছে');
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
        <h1 className="text-3xl font-bold text-slate-900 mb-8">আমার প্রোফাইল</h1>

        {success && (
          <div className="bg-green-50 border border-green-200 rounded-lg p-4 mb-6 flex gap-3">
            <CheckCircle className="h-5 w-5 text-green-600 flex-shrink-0 mt-0.5" />
            <p className="text-green-800">প্রোফাইল সফলভাবে আপডেট হয়েছে</p>
          </div>
        )}

        {error && (
          <div className="bg-red-50 border border-red-200 rounded-lg p-4 mb-6 flex gap-3">
            <AlertCircle className="h-5 w-5 text-red-600 flex-shrink-0 mt-0.5" />
            <p className="text-red-800">{error}</p>
          </div>
        )}

        <div className="bg-white rounded-lg shadow-md p-6">
          <form onSubmit={handleSubmit} className="space-y-4">
            <div className="grid sm:grid-cols-2 gap-4">
              <div>
                <label className="block text-sm font-semibold text-slate-700 mb-2">
                  সম্পূর্ণ নাম
                </label>
                <input
                  type="text"
                  name="fullName"
                  value={formData.fullName}
                  onChange={handleChange}
                  className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                />
              </div>
              <div>
                <label className="block text-sm font-semibold text-slate-700 mb-2">
                  ফোন নম্বর
                </label>
                <input
                  type="tel"
                  name="phone"
                  value={formData.phone}
                  onChange={handleChange}
                  className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
              </div>
            </div>

            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">
                ইমেইল (পরিবর্তনযোগ্য নয়)
              </label>
              <input
                type="email"
                value={formData.email}
                disabled
                className="w-full px-4 py-2 border border-slate-300 rounded-lg bg-slate-50 cursor-not-allowed"
              />
            </div>

            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">
                স্পন্সর আইডি (পরিবর্তনযোগ্য নয়)
              </label>
              <input
                type="text"
                value={formData.sponsorId}
                disabled
                className="w-full px-4 py-2 border border-slate-300 rounded-lg bg-slate-50 cursor-not-allowed"
                placeholder="কোনো স্পন্সর নেই"
              />
            </div>

            <div>
              <label className="block text-sm font-semibold text-slate-700 mb-2">
                ঠিকানা
              </label>
              <input
                type="text"
                name="address"
                value={formData.address}
                onChange={handleChange}
                className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>

            <div className="grid sm:grid-cols-2 gap-4">
              <div>
                <label className="block text-sm font-semibold text-slate-700 mb-2">
                  শহর
                </label>
                <input
                  type="text"
                  name="city"
                  value={formData.city}
                  onChange={handleChange}
                  className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
              </div>
              <div>
                <label className="block text-sm font-semibold text-slate-700 mb-2">
                  জেলা
                </label>
                <input
                  type="text"
                  name="district"
                  value={formData.district}
                  onChange={handleChange}
                  className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
              </div>
            </div>

            <Button
              type="submit"
              size="lg"
              className="w-full"
              disabled={loading}
            >
              {loading ? 'আপডেট হচ্ছে...' : 'প্রোফাইল আপডেট করুন'}
            </Button>
          </form>
        </div>
      </div>
    </MemberLayout>
  );
}
