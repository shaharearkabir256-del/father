'use client';

import { useState } from 'react';
import useSWR from 'swr';
import AdminLayout from '@/components/admin-layout';
import { Search, Eye } from 'lucide-react';

const fetcher = (url: string) => fetch(url).then(r => r.json());

interface Member {
  id: string;
  displayName: string;
  email: string;
  phone: string;
  status: string;
  createdAt: any;
}

export default function AdminMembersPage() {
  const [searchTerm, setSearchTerm] = useState('');
  const { data: members = [], isLoading } = useSWR('/api/admin/members', fetcher);

  const filteredMembers = members.filter((member: Member) =>
    member.displayName?.toLowerCase().includes(searchTerm.toLowerCase()) ||
    member.email?.toLowerCase().includes(searchTerm.toLowerCase())
  );

  return (
    <AdminLayout>
      <div>
        <h1 className="text-3xl font-bold text-slate-900 mb-8">সদস্য ম্যানেজমেন্ট</h1>

        {/* Search */}
        <div className="mb-6 relative">
          <input
            type="text"
            placeholder="সদস্য খুঁজুন..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            className="w-full px-4 py-2 pl-10 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
          <Search className="absolute left-3 top-2.5 h-5 w-5 text-slate-400" />
        </div>

        {/* Members Table */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden">
          {isLoading ? (
            <div className="p-8 text-center">
              <div className="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            </div>
          ) : filteredMembers.length === 0 ? (
            <div className="p-8 text-center text-slate-600">
              কোনো সদস্য পাওয়া যায়নি
            </div>
          ) : (
            <div className="overflow-x-auto">
              <table className="w-full">
                <thead className="bg-slate-50 border-b border-slate-200">
                  <tr>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">নাম</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">ইমেইল</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">ফোন</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">যোগ দিয়েছেন</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অবস্থা</th>
                    <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অ্যাকশন</th>
                  </tr>
                </thead>
                <tbody>
                  {filteredMembers.map((member: Member, i: number) => (
                    <tr key={member.id || i} className="border-b border-slate-200 hover:bg-slate-50">
                      <td className="px-6 py-3 text-sm text-slate-900 font-semibold">{member.displayName}</td>
                      <td className="px-6 py-3 text-sm text-slate-600">{member.email}</td>
                      <td className="px-6 py-3 text-sm text-slate-600">{member.phone}</td>
                      <td className="px-6 py-3 text-sm text-slate-600">
                        {member.createdAt?.seconds ? 
                          new Date(member.createdAt.seconds * 1000).toLocaleDateString('bn-BD') : 
                          'N/A'}
                      </td>
                      <td className="px-6 py-3 text-sm">
                        <span className={`px-3 py-1 rounded-full text-xs font-semibold ${
                          member.status === 'active' ? 'bg-green-100 text-green-800' : 'bg-slate-100 text-slate-800'
                        }`}>
                          {member.status === 'active' ? 'সক্রিয়' : 'নিষ্ক্রিয়'}
                        </span>
                      </td>
                      <td className="px-6 py-3 text-sm">
                        <button className="text-blue-600 hover:text-blue-700 p-1">
                          <Eye className="h-4 w-4" />
                        </button>
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
