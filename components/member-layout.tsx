'use client';

import { useContext, useEffect, useState } from 'react';
import { useRouter } from 'next/navigation';
import Link from 'next/link';
import { AuthContext } from '@/lib/auth-context';
import { Button } from '@/components/ui/button';
import { LogOut, Menu, X, LayoutDashboard, User, TrendingUp, Users, Package, Star, CreditCard } from 'lucide-react';

const memberMenuItems = [
  { label: 'Dashboard', href: '/member/dashboard', icon: LayoutDashboard },
  { label: 'Profile', href: '/member/profile', icon: User },
  { label: 'Income', href: '/member/income', icon: TrendingUp },
  { label: 'My Team', href: '/member/team', icon: Users },
  { label: 'Orders', href: '/member/orders', icon: Package },
  { label: 'Rewards', href: '/member/rewards', icon: Star },
  { label: 'Withdraw', href: '/member/withdraw', icon: CreditCard },
];

export default function MemberLayout({ children }: { children: React.ReactNode }) {
  const router = useRouter();
  const { user, loading, signOut } = useContext(AuthContext);
  const [sidebarOpen, setSidebarOpen] = useState(false);

  useEffect(() => {
    if (!loading && !user) {
      router.push('/auth/login');
    }
  }, [loading, user, router]);

  if (loading || !user) {
    return (
      <div className="flex items-center justify-center min-h-screen">
        <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
      </div>
    );
  }

  return (
    <div className="flex h-screen bg-muted">
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
          {memberMenuItems.map((item) => {
            const Icon = item.icon;
            return (
              <Link key={item.href} href={item.href}>
                <div className="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors cursor-pointer">
                  <Icon className="h-5 w-5" />
                  <span className="text-sm font-medium">{item.label}</span>
                </div>
              </Link>
            );
          })}
        </nav>

        <div className="absolute bottom-4 left-4 right-4">
          <Button variant="outline" className="w-full text-slate-400" onClick={() => signOut()}>
            <LogOut className="h-4 w-4 mr-2" />
            Logout
          </Button>
        </div>
      </div>

      <div className="flex-1 overflow-auto">
        <div className="bg-background shadow-md p-4 flex items-center justify-between md:justify-end sticky top-0 z-40">
          <button onClick={() => setSidebarOpen(!sidebarOpen)} className="md:hidden text-muted-foreground">
            {sidebarOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
          </button>
          <div className="flex items-center gap-4">
            <div className="text-right hidden sm:block">
              <p className="font-semibold text-foreground">Welcome</p>
              <p className="text-sm text-muted-foreground">{user?.email}</p>
            </div>
          </div>
        </div>

        <div className="p-6 max-w-7xl mx-auto">{children}</div>
      </div>
    </div>
  );
}
