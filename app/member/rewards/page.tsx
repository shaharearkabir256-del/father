'use client';

import { useContext } from 'react';
import useSWR from 'swr';
import { AuthContext } from '@/lib/auth-context';
import MemberLayout from '@/components/member-layout';
import { Star, Gift, Zap } from 'lucide-react';
import { Button } from '@/components/ui/button';

const fetcher = (url: string) => fetch(url).then(r => r.json());

export default function RewardsPage() {
  const { user } = useContext(AuthContext);
  const { data: balance } = useSWR(
    user ? `/api/member/${user.uid}/balance` : null,
    fetcher
  );

  const rewardPoints = balance?.rewardPoints || 0;
  const purchasePoints = balance?.purchasePoints || 0;

  const rewardItems = [
    { points: 100, item: 'স্মার্ট ফোন স্ক্রিন প্রোটেক্টর', discount: '50% ছাড়' },
    { points: 250, item: 'ওয়্যারলেস ইয়ারবাড', discount: '৳ 1000 মূল্য' },
    { points: 500, item: 'হাই-স্পিড পাওয়ার ব্যাংক', discount: '৳ 2000 মূল্য' },
    { points: 1000, item: 'প্রিমিয়াম হেডফোন', discount: '৳ 5000 মূল্য' },
  ];

  return (
    <MemberLayout>
      <div>
        <h1 className="text-3xl font-bold text-slate-900 mb-8">রিওয়ার্ড পয়েন্ট</h1>

        {/* Points Overview */}
        <div className="grid md:grid-cols-2 gap-6 mb-8">
          <div className="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white rounded-lg p-8">
            <div className="flex justify-between items-start mb-4">
              <h3 className="text-lg font-semibold">মোট পয়েন্ট</h3>
              <Star className="h-6 w-6 opacity-80" />
            </div>
            <p className="text-5xl font-bold">{rewardPoints}</p>
            <p className="text-yellow-100 text-sm mt-2">রিডিম করার জন্য প্রস্তুত</p>
          </div>

          <div className="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-8">
            <div className="flex justify-between items-start mb-4">
              <h3 className="text-lg font-semibold">ক্রয় পয়েন্ট</h3>
              <Zap className="h-6 w-6 opacity-80" />
            </div>
            <p className="text-5xl font-bold">{purchasePoints}</p>
            <p className="text-blue-100 text-sm mt-2">পরবর্তী ক্রয়ে ব্যবহার করুন</p>
          </div>
        </div>

        {/* How to Earn */}
        <div className="bg-white rounded-lg shadow-md p-6 mb-8">
          <h2 className="text-xl font-bold text-slate-900 mb-4">পয়েন্ট কিভাবে অর্জন করবেন</h2>
          <div className="grid md:grid-cols-2 gap-4">
            {[
              { activity: 'পণ্য ক্রয়', points: 'প্রতি ৳100 এ 10 পয়েন্ট' },
              { activity: 'নতুন সদস্য যুক্ত করুন', points: 'প্রতি ৳1000 এ 50 পয়েন্ট' },
              { activity: 'দৈনিক লগইন', points: 'প্রতিদিন 1 পয়েন্ট' },
              { activity: 'প্রোডাক্ট রিভিউ', points: 'প্রতি রিভিউ 5 পয়েন্ট' },
            ].map((item, i) => (
              <div key={i} className="p-4 bg-slate-50 rounded-lg border border-slate-200">
                <p className="font-semibold text-slate-900">{item.activity}</p>
                <p className="text-sm text-slate-600 mt-1">{item.points}</p>
              </div>
            ))}
          </div>
        </div>

        {/* Reward Items */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden">
          <div className="bg-slate-50 px-6 py-4 border-b border-slate-200 flex items-center gap-2">
            <Gift className="h-5 w-5 text-blue-600" />
            <h2 className="text-xl font-bold text-slate-900">রিওয়ার্ড ক্যাটালগ</h2>
          </div>
          
          <div className="grid md:grid-cols-2 gap-6 p-6">
            {rewardItems.map((reward, i) => (
              <div key={i} className="border border-slate-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                <div className="flex justify-between items-start mb-3">
                  <div className="flex-1">
                    <p className="font-semibold text-slate-900">{reward.item}</p>
                    <p className="text-sm text-blue-600 font-semibold mt-1">মূল্য: {reward.discount}</p>
                  </div>
                </div>
                
                <div className="flex items-center justify-between pt-4 border-t border-slate-200">
                  <div className="flex items-center gap-1">
                    <Star className="h-4 w-4 text-yellow-500 fill-current" />
                    <span className="font-bold text-slate-900">{reward.points}</span>
                  </div>
                  <Button
                    variant={rewardPoints >= reward.points ? 'default' : 'outline'}
                    size="sm"
                    disabled={rewardPoints < reward.points}
                  >
                    রিডিম করুন
                  </Button>
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* Info */}
        <div className="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
          <h3 className="font-bold text-blue-900 mb-3">গুরুত্বপূর্ণ</h3>
          <ul className="space-y-2 text-blue-900 text-sm">
            <li>• পয়েন্ট 365 দিন পর ম্যাদ উত্তীর্ণ হয়</li>
            <li>• রিডিম করা পয়েন্ট 5-7 দিনে আপনার কাছে পৌঁছাবে</li>
            <li>• রিডিম করা আইটেম ক্যাশ ফেরত নীতির আওতায় নয়</li>
          </ul>
        </div>
      </div>
    </MemberLayout>
  );
}
