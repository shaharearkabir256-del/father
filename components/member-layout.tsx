'use client';

import { useContext, useEffect, useState } from 'react';
import { useRouter } from 'next/navigation';
import Link from 'next/link';
import { AuthContext } from '@/lib/auth-context';
import { Button } from '@/components/ui/button';
import { LogOut, Menu, X } from 'lucide-react';

const memberMenuItems = [
  { label: 'ড্যাশবোর্ড', href: '/member/dashboard', icon: '📊' },
  { label: 'প্রোফাইল', href: '/member/profile', icon: '👤' },
  { label: 'আয়ের বিবরণ', href: '/member/income', icon: '💰' },
  { label: 'মাই টিম', href: '/member/team', icon: '👥' },
  { label: 'অর্ডার ইতিহাস', href: '/member/orders', icon: '📦' },
  { label: 'রিওয়ার্ড পয়েন্ট', href: '/member/rewards', icon: '⭐' },
  { label: 'উইথড্র', href: '/member/withdraw', icon: '💸' },
];

export default function MemberLayout({ children }: { children: React.ReactNode }) {
  const router = useRouter();
  const { user, loading } = useContext(AuthContext);
  const [sidebarOpen, setSidebarOpen] = useState(false);

  useEffect(() => {
    if (!loading && !user) {
      router.push('/auth/login');
    }
  }, [loading, user, router]);

  if (loading || !user) {
    return (
      <div className="flex items-center justify-center min-h-screen">
        <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
      </div>
    );
  }

  return (
    <div className="flex h-screen bg-slate-100">
      {/* Sidebar */}
      <div
        className={`
        fixed md:relative md:w-64 w-64 bg-slate-900 text-white h-full transition-transform z-50
        ${sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'}
      `}
      >
        <div className="p-6 border-b border-slate-700">
          <h1 className="text-2xl font-bold">DIB</h1>
          <p className="text-slate-400 text-sm">Daily Income Bazar</p>
        </div>

        <nav className="mt-8 space-y-2 px-4 overflow-y-auto h-[calc(100vh-180px)]">
          {memberMenuItems.map((item) => (
            <Link key={item.href} href={item.href}>
              <div className="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors cursor-pointer">
                <span className="text-xl">{item.icon}</span>
                <span className="text-sm font-medium">{item.label}</span>
              </div>
            </Link>
          ))}
        </nav>

        <div className="absolute bottom-4 left-4 right-4">
          <Button variant="outline" className="w-full text-slate-400">
            <LogOut className="h-4 w-4 mr-2" />
            লগআউট
          </Button>
        </div>
      </div>

      {/* Main Content */}
      <div className="flex-1 overflow-auto">
        {/* Header */}
        <div className="bg-white shadow-md p-4 flex items-center justify-between md:justify-end sticky top-0 z-40">
          <button onClick={() => setSidebarOpen(!sidebarOpen)} className="md:hidden text-slate-600">
            {sidebarOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
          </button>
          <div className="flex items-center gap-4">
            <div className="text-right hidden sm:block">
              <p className="font-semibold text-slate-900">স্বাগতম</p>
              <p className="text-sm text-slate-600">{user?.email}</p>
            </div>
          </div>
        </div>

        {/* Content */}
        <div className="p-6 max-w-7xl mx-auto">{children}</div>
      </div>
    </div>
  );
}
