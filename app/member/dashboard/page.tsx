'use client';

import { useContext, useEffect, useState } from 'react';
import { useRouter } from 'next/navigation';
import useSWR from 'swr';
import { AuthContext } from '@/lib/auth-context';
import { Wallet, TrendingUp, Users, ShoppingCart, LogOut, Menu, X } from 'lucide-react';
import { Button } from '@/components/ui/button';
import Link from 'next/link';

interface UserData {
  id: string;
  displayName: string;
  email: string;
  phone: string;
  sponsorId?: string;
}

interface Balance {
  totalBalance: number;
  cashWallet: number;
  upgradeWallet: number;
  shoppingWallet: number;
  directIncome: number;
  dailyIncome: number;
  generationIncome: number;
  matchingIncome: number;
  rewardPoints: number;
}

const fetcher = (url: string) => fetch(url).then(r => r.json());

export default function MemberDashboard() {
  const router = useRouter();
  const { user, loading: authLoading, logout } = useContext(AuthContext);
  const [sidebarOpen, setSidebarOpen] = useState(false);
  
  const { data: userData } = useSWR(user ? `/api/member/${user.uid}` : null, fetcher);
  const { data: balance } = useSWR(user ? `/api/member/${user.uid}/balance` : null, fetcher);

  useEffect(() => {
    if (!authLoading && !user) {
      router.push('/auth/login');
    }
  }, [authLoading, user, router]);

  const handleLogout = async () => {
    await logout();
    router.push('/');
  };

  if (authLoading || !user) {
    return (
      <div className="flex items-center justify-center min-h-screen">
        <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
      </div>
    );
  }

  const mockBalance: Balance = {
    totalBalance: 45000,
    cashWallet: 25000,
    upgradeWallet: 10000,
    shoppingWallet: 5000,
    directIncome: 5000,
    dailyIncome: 1500,
    generationIncome: 8000,
    matchingIncome: 3500,
    rewardPoints: 2500
  };

  return (
    <div className="flex h-screen bg-slate-100">
      {/* Sidebar */}
      <div className={`
        fixed md:relative md:w-64 w-64 bg-slate-900 text-white h-full transition-transform z-50
        ${sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'}
      `}>
        <div className="p-6 border-b border-slate-700">
          <h1 className="text-2xl font-bold">DIB</h1>
          <p className="text-slate-400 text-sm">Daily Income Bazar</p>
        </div>

        <nav className="mt-8 space-y-2 px-4">
          {[
            { label: 'ড্যাশবোর্ড', href: '/member/dashboard', icon: '📊' },
            { label: 'প্রোফাইল', href: '/member/profile', icon: '👤' },
            { label: 'আয়ের বিবরণ', href: '/member/income', icon: '💰' },
            { label: 'মাই টিম', href: '/member/team', icon: '👥' },
            { label: 'অর্ডার ইতিহাস', href: '/member/orders', icon: '📦' },
            { label: 'রিওয়ার্ড পয়েন্ট', href: '/member/rewards', icon: '⭐' },
            { label: 'উইথড্র', href: '/member/withdraw', icon: '💸' },
          ].map(item => (
            <Link key={item.href} href={item.href}>
              <div className="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors cursor-pointer">
                <span className="text-xl">{item.icon}</span>
                <span className="text-sm font-medium">{item.label}</span>
              </div>
            </Link>
          ))}
        </nav>

        <div className="absolute bottom-4 left-4 right-4">
          <Button
            onClick={handleLogout}
            variant="outline"
            className="w-full text-slate-400"
          >
            <LogOut className="h-4 w-4 mr-2" />
            লগআউট
          </Button>
        </div>
      </div>

      {/* Main Content */}
      <div className="flex-1 overflow-auto">
        {/* Header */}
        <div className="bg-white shadow-md p-4 flex items-center justify-between md:justify-end sticky top-0 z-40">
          <button
            onClick={() => setSidebarOpen(!sidebarOpen)}
            className="md:hidden text-slate-600"
          >
            {sidebarOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
          </button>
          <div className="flex items-center gap-4">
            <div className="text-right">
              <p className="font-semibold text-slate-900">স্বাগতম</p>
              <p className="text-sm text-slate-600">{user?.displayName || user?.email}</p>
            </div>
          </div>
        </div>

        {/* Dashboard Content */}
        <div className="p-6 max-w-7xl mx-auto">
          <h1 className="text-3xl font-bold text-slate-900 mb-8">ড্যাশবোর্ড</h1>

          {/* Balance Cards */}
          <div className="grid md:grid-cols-4 gap-6 mb-8">
            <div className="bg-gradient-to-br from-blue-600 to-blue-700 text-white rounded-lg p-6">
              <div className="flex justify-between items-start">
                <div>
                  <p className="text-blue-100 text-sm mb-1">মোট ব্যালেন্স</p>
                  <p className="text-3xl font-bold">৳{mockBalance.totalBalance}</p>
                </div>
                <Wallet className="h-8 w-8 text-blue-300" />
              </div>
            </div>

            <div className="bg-gradient-to-br from-green-600 to-green-700 text-white rounded-lg p-6">
              <div className="flex justify-between items-start">
                <div>
                  <p className="text-green-100 text-sm mb-1">আয় (এই মাস)</p>
                  <p className="text-3xl font-bold">৳{mockBalance.dailyIncome + mockBalance.directIncome}</p>
                </div>
                <TrendingUp className="h-8 w-8 text-green-300" />
              </div>
            </div>

            <div className="bg-gradient-to-br from-purple-600 to-purple-700 text-white rounded-lg p-6">
              <div className="flex justify-between items-start">
                <div>
                  <p className="text-purple-100 text-sm mb-1">টিম সদস্য</p>
                  <p className="text-3xl font-bold">24</p>
                </div>
                <Users className="h-8 w-8 text-purple-300" />
              </div>
            </div>

            <div className="bg-gradient-to-br from-orange-600 to-orange-700 text-white rounded-lg p-6">
              <div className="flex justify-between items-start">
                <div>
                  <p className="text-orange-100 text-sm mb-1">রিওয়ার্ড পয়েন্ট</p>
                  <p className="text-3xl font-bold">{mockBalance.rewardPoints}</p>
                </div>
                <ShoppingCart className="h-8 w-8 text-orange-300" />
              </div>
            </div>
          </div>

          {/* Wallet Details */}
          <div className="grid md:grid-cols-2 gap-6 mb-8">
            <div className="bg-white rounded-lg shadow-md p-6">
              <h2 className="text-xl font-bold text-slate-900 mb-4">ওয়ালেট বিশদ</h2>
              <div className="space-y-3">
                {[
                  { label: 'ক্যাশ ওয়ালেট', value: mockBalance.cashWallet, color: 'blue' },
                  { label: 'আপগ্রেড ওয়ালেট', value: mockBalance.upgradeWallet, color: 'green' },
                  { label: 'শপিং ওয়ালেট', value: mockBalance.shoppingWallet, color: 'purple' },
                ].map((wallet, i) => (
                  <div key={i} className="flex justify-between items-center p-3 bg-slate-50 rounded">
                    <span className="text-slate-700 font-medium">{wallet.label}</span>
                    <span className={`text-lg font-bold text-${wallet.color}-600`}>
                      ৳{wallet.value}
                    </span>
                  </div>
                ))}
              </div>
            </div>

            <div className="bg-white rounded-lg shadow-md p-6">
              <h2 className="text-xl font-bold text-slate-900 mb-4">আয়ের বিশ্লেষণ</h2>
              <div className="space-y-3">
                {[
                  { label: 'সরাসরি আয়', value: mockBalance.directIncome },
                  { label: 'দৈনিক আয়', value: mockBalance.dailyIncome },
                  { label: 'জেনারেশন আয়', value: mockBalance.generationIncome },
                  { label: 'ম্যাচিং আয়', value: mockBalance.matchingIncome },
                ].map((income, i) => (
                  <div key={i} className="flex justify-between items-center p-3 bg-slate-50 rounded">
                    <span className="text-slate-700 font-medium">{income.label}</span>
                    <span className="text-lg font-bold text-green-600">
                      ৳{income.value}
                    </span>
                  </div>
                ))}
              </div>
            </div>
          </div>

          {/* Quick Actions */}
          <div className="bg-white rounded-lg shadow-md p-6">
            <h2 className="text-xl font-bold text-slate-900 mb-4">দ্রুত অ্যাকশন</h2>
            <div className="grid md:grid-cols-4 gap-4">
              <Link href="/cart">
                <Button className="w-full">🛒 কেনাকাটা করুন</Button>
              </Link>
              <Link href="/member/withdraw">
                <Button variant="outline" className="w-full">💸 উইথড্র করুন</Button>
              </Link>
              <Link href="/member/team">
                <Button variant="outline" className="w-full">👥 টিম দেখুন</Button>
              </Link>
              <Link href="/member/profile">
                <Button variant="outline" className="w-full">✏️ প্রোফাইল সম্পাদনা</Button>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
