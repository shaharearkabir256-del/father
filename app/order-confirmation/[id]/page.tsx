'use client';

import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { CheckCircle, Package, Clock, MapPin } from 'lucide-react';
import { use } from 'react';

export default function OrderConfirmationPage({ params }: { params: Promise<{ id: string }> }) {
  const { id } = use(params);
  
  return (
    <main className="min-h-screen bg-slate-50 py-12">
      <div className="container mx-auto px-4">
        <div className="text-center mb-8">
          <Link href="/" className="text-2xl font-bold text-blue-600">Daily Income Bazar</Link>
        </div>
        <div className="max-w-2xl mx-auto">
          <div className="text-center mb-8">
            <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <CheckCircle className="h-10 w-10 text-green-600" />
            </div>
            <h1 className="text-3xl md:text-4xl font-bold text-slate-900 mb-2">অর্ডার সফলভাবে নিশ্চিত হয়েছে!</h1>
            <p className="text-slate-600 text-lg">আপনার অর্ডার আমরা পেয়েছি এবং শীঘ্রই প্রক্রিয়া করা হবে।</p>
          </div>
          <div className="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 className="text-xl font-bold text-slate-900 mb-6">অর্ডার বিবরণ</h2>
            <div className="grid md:grid-cols-2 gap-8 mb-8">
              <div><p className="text-slate-600 text-sm mb-1">অর্ডার আইডি</p><p className="text-xl font-bold text-slate-900 font-mono">{id}</p></div>
              <div><p className="text-slate-600 text-sm mb-1">অর্ডার তারিখ</p><p className="text-xl font-bold text-slate-900">{new Date().toLocaleDateString('bn-BD')}</p></div>
            </div>
            <div className="bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg p-6 mb-8 border border-blue-200">
              <div className="flex items-center gap-4">
                <div className="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center flex-shrink-0"><Clock className="h-6 w-6" /></div>
                <div><p className="text-sm text-blue-700">বর্তমান অবস্থা</p><p className="text-xl font-bold text-blue-900">পেন্ডিং - অপেক্ষায়</p></div>
              </div>
            </div>
            <h3 className="text-lg font-bold text-slate-900 mb-4">পরবর্তী ধাপ</h3>
            <div className="space-y-4">
              {[
                { icon: Package, title: 'অর্ডার নিশ্চিতকরণ', desc: '১-২ ঘন্টার মধ্যে' },
                { icon: Package, title: 'পণ্য প্যাকেজিং', desc: '২-৪ ঘন্টার মধ্যে' },
                { icon: MapPin, title: 'ডেলিভারি শুরু', desc: '১-২ দিনের মধ্যে' },
              ].map((step, i) => (
                <div key={i} className="flex gap-4 p-4 bg-slate-50 rounded-lg">
                  <step.icon className="h-6 w-6 text-blue-600 flex-shrink-0 mt-1" />
                  <div><p className="font-semibold text-slate-900">{step.title}</p><p className="text-sm text-slate-600">{step.desc}</p></div>
                </div>
              ))}
            </div>
          </div>
          <div className="bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-8">
            <h3 className="text-lg font-bold text-yellow-900 mb-3">গুরুত্বপূর্ণ তথ্য</h3>
            <ul className="space-y-2 text-yellow-900 text-sm">
              <li>&#10003; আমরা আপনার ফোন নম্বরে ডেলিভারি আপডেট পাঠাব</li>
              <li>&#10003; ডেলিভারি চার্জ সম্পূর্ণ বিনামূল্যে</li>
              <li>&#10003; ক্যাশ অন ডেলিভারি - ডেলিভারির সময় অর্থ প্রদান করুন</li>
            </ul>
          </div>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Link href="/"><Button size="lg" className="w-full sm:w-auto">কেনাকাটা চালিয়ে যান</Button></Link>
          </div>
        </div>
      </div>
    </main>
  );
}
