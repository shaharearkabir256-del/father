'use client';

import { useState } from 'react';
import Link from 'next/link';
import { ArrowLeft, AlertCircle, ShoppingBag } from 'lucide-react';

export default function CheckoutPage() {
  return (
    <main className="min-h-screen bg-slate-50 py-12">
      <div className="container mx-auto px-4">
        <div className="text-center mb-8">
          <Link href="/" className="text-2xl font-bold text-blue-600">Daily Income Bazar</Link>
        </div>
        <Link href="/cart" className="flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-8">
          <ArrowLeft className="h-4 w-4" /> কার্টে ফিরুন
        </Link>
        <div className="text-center py-16">
          <ShoppingBag className="h-16 w-16 mx-auto text-slate-400 mb-4" />
          <h1 className="text-2xl font-bold text-slate-900 mb-2">কার্ট খালি</h1>
          <p className="text-slate-600 mb-8">চেকআউটের আগে আপনার কার্টে পণ্য যোগ করুন</p>
          <Link href="/" className="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">কেনাকাটা করুন</Link>
        </div>
      </div>
    </main>
  );
}
