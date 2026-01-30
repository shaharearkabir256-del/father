'use client';

import SiteHeader from '@/components/site-header';
import SiteFooter from '@/components/site-footer';
import { Button } from '@/components/ui/button';
import Link from 'next/link';
import { Award, Users, Zap, TrendingUp } from 'lucide-react';

export default function AboutPage() {
  return (
    <>
      <SiteHeader />
      <main className="bg-white">
        {/* Hero */}
        <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-24">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">আমাদের সম্পর্কে</h1>
            <p className="text-lg md:text-xl text-blue-100">
              Daily Income Bazar - আপনার আয়ের নতুন দিগন্ত
            </p>
          </div>
        </section>

        {/* Mission & Vision */}
        <section className="py-16 md:py-24">
          <div className="container mx-auto px-4">
            <div className="grid md:grid-cols-2 gap-12">
              <div>
                <h2 className="text-3xl font-bold text-slate-900 mb-4">আমাদের মিশন</h2>
                <p className="text-slate-600 text-lg mb-4">
                  Daily Income Bazar-এর লক্ষ্য হল প্রতিটি বাঙালিকে মানসম্মত পণ্য সাশ্রয়ী মূল্যে সরবরাহ করা এবং একই সাথে তাদের জন্য আজীবন আয়ের সুযোগ সৃষ্টি করা।
                </p>
                <p className="text-slate-600 text-lg">
                  আমরা বিশ্বাস করি যে সঠিক পণ্য এবং সঠিক সিস্টেমের মাধ্যমে যে কেউ তাদের অর্থনৈতিক লক্ষ্য অর্জন করতে পারে।
                </p>
              </div>

              <div>
                <h2 className="text-3xl font-bold text-slate-900 mb-4">আমাদের ভিশন</h2>
                <p className="text-slate-600 text-lg mb-4">
                  আমরা স্বপ্ন দেখি একটি ন্যায্য বাণিজ্যিক পরিবেশ তৈরি করার যেখানে প্রতিটি সদস্য অংশীদার হিসেবে কাজ করে এবং একে অপরের সাফল্যে অবদান রাখে।
                </p>
                <p className="text-slate-600 text-lg">
                  প্রতিটি পরিবারে আনন্দ এবং সমৃদ্ধি নিয়ে আসাই আমাদের চূড়ান্ত লক্ষ্য।
                </p>
              </div>
            </div>
          </div>
        </section>

        {/* Values */}
        <section className="bg-slate-50 py-16 md:py-24">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold text-slate-900 text-center mb-12">আমাদের মূল্যবোধ</h2>
            <div className="grid md:grid-cols-4 gap-8">
              {[
                {
                  icon: Award,
                  title: 'সততা',
                  desc: 'আমরা সর্বদা সৎ এবং স্বচ্ছ ব্যবসায়িক অনুশীলনে বিশ্বাসী'
                },
                {
                  icon: Users,
                  title: 'সম্প্রদায়',
                  desc: 'আমাদের সদস্যরা আমাদের সবচেয়ে বড় সম্পদ এবং অনুপ্রেরণা'
                },
                {
                  icon: TrendingUp,
                  title: 'বৃদ্ধি',
                  desc: 'আমরা ক্রমাগত উন্নতি এবং উদ্ভাবনে বিশ্বাস করি'
                },
                {
                  icon: Zap,
                  title: 'শক্তি',
                  desc: 'আমাদের দল প্রতিদিন আপনার স্বপ্ন পূরণে কাজ করে'
                }
              ].map((value, i) => (
                <div key={i} className="bg-white rounded-lg p-6 text-center shadow-md">
                  <value.icon className="h-12 w-12 text-blue-600 mx-auto mb-4" />
                  <h3 className="text-xl font-bold text-slate-900 mb-2">{value.title}</h3>
                  <p className="text-slate-600">{value.desc}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* Statistics */}
        <section className="py-16 md:py-24">
          <div className="container mx-auto px-4">
            <div className="grid md:grid-cols-4 gap-8 text-center">
              {[
                { number: '৫০,০০০+', label: 'সক্রিয় সদস্য' },
                { number: '২০০+', label: 'পণ্য ক্যাটালগ' },
                { number: '৫০০০+', label: 'সফল ক্রয়' },
                { number: '৫০ বিলিয়ন+', label: 'বিতরণ করা আয়' }
              ].map((stat, i) => (
                <div key={i} className="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-lg">
                  <p className="text-4xl font-bold text-blue-600 mb-2">{stat.number}</p>
                  <p className="text-slate-700 font-medium">{stat.label}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* Why Choose Us */}
        <section className="bg-slate-50 py-16 md:py-24">
          <div className="container mx-auto px-4">
            <h2 className="text-3xl font-bold text-slate-900 text-center mb-12">কেন আমাদের বেছে নিবেন?</h2>
            <div className="grid md:grid-cols-2 gap-12 max-w-4xl mx-auto">
              {[
                'সর্বোচ্চ মানের পণ্য',
                'ন্যায্য মূল্য নির্ধারণ',
                'নিরাপদ লেনদেন',
                'বিনামূল্যে ডেলিভারি',
                'আজীবন আয়ের সুযোগ',
                '২৪/৭ গ্রাহক সেবা',
                'নমনীয় পেমেন্ট পদ্ধতি',
                'স্বচ্ছ কমিশন কাঠামো'
              ].map((feature, i) => (
                <div key={i} className="flex items-center gap-4">
                  <div className="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center flex-shrink-0">
                    ✓
                  </div>
                  <span className="text-slate-700 text-lg font-medium">{feature}</span>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* CTA */}
        <section className="bg-blue-600 text-white py-16 md:py-24">
          <div className="container mx-auto px-4 text-center">
            <h2 className="text-3xl md:text-4xl font-bold mb-6">আপনার যাত্রা শুরু করুন আজই</h2>
            <p className="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
              লক্ষ হাজার সফল সদস্যদের সাথে যোগ দিন এবং আপনার স্বপ্নের জীবন শুরু করুন।
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Link href="/auth/register">
                <Button size="lg" variant="secondary">
                  এখনই রেজিস্টার করুন
                </Button>
              </Link>
              <Link href="/contact">
                <Button size="lg" variant="outline" className="text-white border-white hover:bg-blue-700">
                  আমাদের সাথে যোগাযোগ করুন
                </Button>
              </Link>
            </div>
          </div>
        </section>
      </main>
      <SiteFooter />
    </>
  );
}
