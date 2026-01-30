'use client';

import { useContext } from 'react';
import useSWR from 'swr';
import { AuthContext } from '@/lib/auth-context';
import MemberLayout from '@/components/member-layout';
import { TrendingUp, Users, Target, Award } from 'lucide-react';

const fetcher = (url: string) => fetch(url).then(r => r.json());

export default function IncomePage() {
  const { user } = useContext(AuthContext);
  const { data: balance } = useSWR(
    user ? `/api/member/${user.uid}/balance` : null,
    fetcher
  );

  const incomeTypes = [
    { label: 'সরাসরি আয়', value: balance?.directIncome || 0, icon: TrendingUp, color: 'blue' },
    { label: 'দৈনিক আয়', value: balance?.dailyIncome || 0, icon: Target, color: 'green' },
    { label: 'জেনারেশন আয়', value: balance?.generationIncome || 0, icon: Users, color: 'purple' },
    { label: 'ম্যাচিং আয়', value: balance?.matchingIncome || 0, icon: Award, color: 'orange' },
  ];

  const totalIncome = (balance?.directIncome || 0) + (balance?.dailyIncome || 0) + 
                     (balance?.generationIncome || 0) + (balance?.matchingIncome || 0);

  return (
    <MemberLayout>
      <div>
        <h1 className="text-3xl font-bold text-slate-900 mb-8">আয়ের বিবরণ</h1>

        {/* Total Income */}
        <div className="bg-gradient-to-br from-green-600 to-green-700 text-white rounded-lg p-8 mb-8">
          <p className="text-green-100 text-sm mb-2">মোট আয়</p>
          <p className="text-5xl font-bold">৳{totalIncome.toLocaleString()}</p>
        </div>

        {/* Income Types */}
        <div className="grid md:grid-cols-2 gap-6 mb-8">
          {incomeTypes.map((type, i) => {
            const Icon = type.icon;
            const colorMap: { [key: string]: string } = {
              'blue': 'from-blue-500 to-blue-600',
              'green': 'from-green-500 to-green-600',
              'purple': 'from-purple-500 to-purple-600',
              'orange': 'from-orange-500 to-orange-600',
            };

            return (
              <div key={i} className={`bg-gradient-to-br ${colorMap[type.color]} text-white rounded-lg p-6`}>
                <div className="flex justify-between items-start mb-4">
                  <h3 className="text-lg font-semibold">{type.label}</h3>
                  <Icon className="h-6 w-6 opacity-80" />
                </div>
                <p className="text-3xl font-bold">৳{type.value.toLocaleString()}</p>
              </div>
            );
          })}
        </div>

        {/* Income Details */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden">
          <div className="bg-slate-50 px-6 py-4 border-b border-slate-200">
            <h2 className="text-xl font-bold text-slate-900">আয়ের বিস্তারিত</h2>
          </div>
          
          <div className="p-6">
            <div className="space-y-4">
              {incomeTypes.map((type, i) => (
                <div key={i} className="flex justify-between items-center p-4 bg-slate-50 rounded-lg">
                  <span className="text-slate-700 font-medium">{type.label}</span>
                  <span className="text-lg font-bold text-slate-900">৳{type.value.toLocaleString()}</span>
                </div>
              ))}
              
              <div className="flex justify-between items-center p-4 bg-blue-50 rounded-lg border border-blue-200 font-bold">
                <span className="text-blue-900">মোট আয়</span>
                <span className="text-lg text-blue-900">৳{totalIncome.toLocaleString()}</span>
              </div>
            </div>
          </div>
        </div>

        {/* Info Box */}
        <div className="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
          <h3 className="font-bold text-blue-900 mb-3">আয়ের কাঠামো</h3>
          <ul className="space-y-2 text-blue-900 text-sm">
            <li>• <strong>সরাসরি আয়:</strong> যাদের রেফার করলেন তাদের ক্রয় থেকে</li>
            <li>• <strong>দৈনিক আয়:</strong> আপনার দৈনিক কার্যকলাপের উপর ভিত্তি করে</li>
            <li>• <strong>জেনারেশন আয়:</strong> আপনার টিমের সবার ক্রয় থেকে</li>
            <li>• <strong>ম্যাচিং আয়:</strong> আপনার বাম ও দক্ষিণ দিকের টিম ম্যাচিং থেকে</li>
          </ul>
        </div>
      </div>
    </MemberLayout>
  );
}
