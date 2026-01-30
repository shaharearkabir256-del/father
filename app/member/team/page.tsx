'use client';

import { useContext } from 'react';
import useSWR from 'swr';
import { AuthContext } from '@/lib/auth-context';
import MemberLayout from '@/components/member-layout';
import { Users, Copy, Zap } from 'lucide-react';
import { Button } from '@/components/ui/button';

interface TeamMember {
  id: string;
  displayName: string;
  joinDate: any;
  status: string;
}

const fetcher = (url: string) => fetch(url).then(r => r.json());

export default function TeamPage() {
  const { user } = useContext(AuthContext);
  const { data: teamData } = useSWR(
    user ? `/api/member/${user.uid}/team` : null,
    fetcher
  );

  const referralLink = `${typeof window !== 'undefined' ? window.location.origin : ''}/auth/register?sponsor=${user?.uid}`;

  const copyToClipboard = () => {
    if (navigator.clipboard) {
      navigator.clipboard.writeText(referralLink);
    }
  };

  const mockTeamMembers: TeamMember[] = [
    { id: '1', displayName: 'রহিম আহমেদ', joinDate: new Date(), status: 'active' },
    { id: '2', displayName: 'ফাতেমা বেগম', joinDate: new Date(), status: 'active' },
    { id: '3', displayName: 'করিম খান', joinDate: new Date(), status: 'active' },
  ];

  const stats = {
    totalMembers: mockTeamMembers.length,
    activeMembers: mockTeamMembers.filter(m => m.status === 'active').length,
    thisMonth: 2
  };

  return (
    <MemberLayout>
      <div>
        <h1 className="text-3xl font-bold text-slate-900 mb-8">মাই টিম</h1>

        {/* Stats */}
        <div className="grid md:grid-cols-3 gap-6 mb-8">
          {[
            { label: 'মোট সদস্য', value: stats.totalMembers, icon: Users, color: 'blue' },
            { label: 'সক্রিয় সদস্য', value: stats.activeMembers, icon: Zap, color: 'green' },
            { label: 'এই মাসে নতুন', value: stats.thisMonth, icon: Users, color: 'purple' },
          ].map((stat, i) => {
            const Icon = stat.icon;
            const colorMap: { [key: string]: string } = {
              'blue': 'from-blue-500 to-blue-600',
              'green': 'from-green-500 to-green-600',
              'purple': 'from-purple-500 to-purple-600',
            };

            return (
              <div key={i} className={`bg-gradient-to-br ${colorMap[stat.color]} text-white rounded-lg p-6`}>
                <div className="flex justify-between items-start">
                  <div>
                    <p className="opacity-90 text-sm mb-1">{stat.label}</p>
                    <p className="text-3xl font-bold">{stat.value}</p>
                  </div>
                  <Icon className="h-8 w-8 opacity-80" />
                </div>
              </div>
            );
          })}
        </div>

        {/* Referral Link */}
        <div className="bg-white rounded-lg shadow-md p-6 mb-8">
          <h2 className="text-xl font-bold text-slate-900 mb-4">আপনার রেফারেল লিংক</h2>
          <div className="flex gap-2 flex-col sm:flex-row">
            <input
              type="text"
              value={referralLink}
              readOnly
              className="flex-1 px-4 py-2 border border-slate-300 rounded-lg bg-slate-50 font-mono text-sm"
            />
            <Button
              onClick={copyToClipboard}
              variant="outline"
              className="flex items-center gap-2"
            >
              <Copy className="h-4 w-4" />
              কপি করুন
            </Button>
          </div>
          <p className="text-sm text-slate-600 mt-2">
            এই লিংক শেয়ার করুন এবং আপনার নেটওয়ার্ক বাড়ান
          </p>
        </div>

        {/* Team Members */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden">
          <div className="bg-slate-50 px-6 py-4 border-b border-slate-200">
            <h2 className="text-xl font-bold text-slate-900">টিম সদস্যরা</h2>
          </div>
          
          {mockTeamMembers.length === 0 ? (
            <div className="p-8 text-center">
              <Users className="h-12 w-12 text-slate-400 mx-auto mb-4" />
              <p className="text-slate-600">এখনো কোনো টিম সদস্য নেই</p>
              <p className="text-slate-500 text-sm mt-2">আপনার রেফারেল লিংক শেয়ার করে শুরু করুন</p>
            </div>
          ) : (
            <div className="divide-y">
              {mockTeamMembers.map(member => (
                <div key={member.id} className="p-4 md:p-6 flex justify-between items-center hover:bg-slate-50">
                  <div>
                    <p className="font-semibold text-slate-900">{member.displayName}</p>
                    <p className="text-sm text-slate-600">
                      যোগ দিয়েছেন {new Date(member.joinDate).toLocaleDateString('bn-BD')}
                    </p>
                  </div>
                  <span className={`px-3 py-1 rounded-full text-xs font-semibold ${
                    member.status === 'active' 
                      ? 'bg-green-100 text-green-800' 
                      : 'bg-slate-100 text-slate-800'
                  }`}>
                    {member.status === 'active' ? 'সক্রিয়' : 'নিষ্ক্রিয়'}
                  </span>
                </div>
              ))}
            </div>
          )}
        </div>
      </div>
    </MemberLayout>
  );
}
