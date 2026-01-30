'use client';

import { useState } from 'react';
import useSWR from 'swr';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Search, CheckCircle, XCircle } from 'lucide-react';

const fetcher = (url: string) => fetch(url).then(r => r.json());

interface Withdrawal {
  id: string;
  userId: string;
  amount: number;
  method: string;
  status: string;
  createdAt: any;
  memberName?: string;
}

export default function AdminWithdrawalsPage() {
  const [searchTerm, setSearchTerm] = useState('');
  const [filterStatus, setFilterStatus] = useState('pending');
  const { data: withdrawals = [], isLoading, mutate } = useSWR('/api/admin/withdrawals', fetcher);

  const filteredWithdrawals = withdrawals.filter((withdrawal: Withdrawal) => {
    const matchesSearch = withdrawal.userId?.toLowerCase().includes(searchTerm.toLowerCase());
    const matchesStatus = filterStatus === 'all' || withdrawal.status === filterStatus;
    return matchesSearch && matchesStatus;
  });

  const handleApprove = async (withdrawalId: string) => {
    try {
      const response = await fetch(`/api/admin/withdrawals/${withdrawalId}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ status: 'approved' })
      });
      if (response.ok) {
        mutate();
      }
    } catch (error) {
      console.error('Error approving withdrawal:', error);
    }
  };

  const handleReject = async (withdrawalId: string) => {
    try {
      const response = await fetch(`/api/admin/withdrawals/${withdrawalId}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ status: 'rejected' })
      });
      if (response.ok) {
        mutate();
      }
    } catch (error) {
      console.error('Error rejecting withdrawal:', error);
    }
  };

  return (
    <AdminLayout>
      <div>
        <h1 className="text-3xl font-bold text-slate-900 mb-8">উইথড্র ম্যানেজমেন্ট</h1>

        {/* Stats */}
        <div className="grid md:grid-cols-3 gap-6 mb-8">
          {[
            { label: 'পেন্ডিং', value: withdrawals.filter((w: Withdrawal) => w.status === 'pending').length, color: 'yellow' },
            { label: 'অনুমোদিত', value: withdrawals.filter((w: Withdrawal) => w.status === 'approved').length, color: 'green' },
            { label: 'প্রত্যাখ্যাত', value: withdrawals.filter((w: Withdrawal) => w.status === 'rejected').length, color: 'red' },
          ].map((stat, i) => (
            <div key={i} className={`bg-gradient-to-br from-${stat.color}-500 to-${stat.color}-600 text-white rounded-lg p-6`}>
              <p className={`text-${stat.color}-100 text-sm mb-2`}>{stat.label}</p>
              <p className="text-4xl font-bold">{stat.value}</p>
            </div>
          ))}
        </div>

        {/* Filters */}
        <div className="mb-6 flex flex-col sm:flex-row gap-4">
          <div className="relative flex-1">
            <input
              type="text"
              placeholder="সদস্য খুঁজুন..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full px-4 py-2 pl-10 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <Search className="absolute left-3 top-2.5 h-5 w-5 text-slate-400" />
          </div>

          <select
            value={filterStatus}
            onChange={(e) => setFilterStatus(e.target.value)}
            className="px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="pending">পেন্ডিং</option>
            <option value="approved">অনুমোদিত</option>
            <option value="rejected">প্রত্যাখ্যাত</option>
            <option value="all">সব</option>
          </select>
        </div>

        {/* Withdrawals Table */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden">
          {isLoading ? (
            <div className="p-8 text-center">
              <div className="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            </div>
          ) : filteredWithdrawals.length === 0 ? (
            <div className="p-8 text-center text-slate-600">
              কোনো উইথড্র পাওয়া যায়নি
            </div>
          ) : (
            <div className="overflow-x-auto">
              <table className="w-full">
                <thead className="bg-slate-50 border-b border-slate-200">
                  <tr>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">সদস্য আইডি</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">পরিমাণ</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">পদ্ধতি</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">তারিখ</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অবস্থা</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অ্যাকশন</th>
                  </tr>
                </thead>
                <tbody>
                  {filteredWithdrawals.map((withdrawal: Withdrawal, i: number) => (
                    <tr key={withdrawal.id || i} className="border-b border-slate-200 hover:bg-slate-50">
                      <td className="px-6 py-3 text-sm text-slate-900 font-mono">{withdrawal.userId}</td>
                      <td className="px-6 py-3 text-sm text-slate-900 font-semibold">৳{withdrawal.amount}</td>
                      <td className="px-6 py-3 text-sm text-slate-600">{withdrawal.method}</td>
                      <td className="px-6 py-3 text-sm text-slate-600">
                        {withdrawal.createdAt?.seconds ? 
                          new Date(withdrawal.createdAt.seconds * 1000).toLocaleDateString('bn-BD') : 
                          'N/A'}
                      </td>
                      <td className="px-6 py-3 text-sm">
                        <span className={`px-3 py-1 rounded-full text-xs font-semibold ${
                          withdrawal.status === 'approved' ? 'bg-green-100 text-green-800' :
                          withdrawal.status === 'rejected' ? 'bg-red-100 text-red-800' :
                          'bg-yellow-100 text-yellow-800'
                        }`}>
                          {withdrawal.status === 'pending' ? 'পেন্ডিং' :
                           withdrawal.status === 'approved' ? 'অনুমোদিত' :
                           'প্রত্যাখ্যাত'}
                        </span>
                      </td>
                      <td className="px-6 py-3 text-sm">
                        {withdrawal.status === 'pending' && (
                          <div className="flex gap-2">
                            <button
                              onClick={() => handleApprove(withdrawal.id)}
                              className="text-green-600 hover:text-green-700 p-1"
                              title="অনুমোদন করুন"
                            >
                              <CheckCircle className="h-4 w-4" />
                            </button>
                            <button
                              onClick={() => handleReject(withdrawal.id)}
                              className="text-red-600 hover:text-red-700 p-1"
                              title="প্রত্যাখ্যান করুন"
                            >
                              <XCircle className="h-4 w-4" />
                            </button>
                          </div>
                        )}
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          )}
        </div>
      </div>
    </AdminLayout>
  );
}
