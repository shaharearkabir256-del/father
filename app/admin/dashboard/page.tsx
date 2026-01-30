'use client';

import { useContext } from 'react';
import { AuthContext } from '@/lib/auth-context';
import AdminLayout from '@/components/admin-layout';
import { Package, Users, ShoppingCart, TrendingUp, CreditCard } from 'lucide-react';

export default function AdminDashboard() {
  const { user } = useContext(AuthContext);

  const stats = [
    { label: 'মোট পণ্য', value: '245', icon: Package, color: 'blue' },
    { label: 'মোট সদস্য', value: '5,432', icon: Users, color: 'green' },
    { label: 'মোট অর্ডার', value: '1,234', icon: ShoppingCart, color: 'purple' },
    { label: 'মোট আয়', value: '৳45,67,890', icon: TrendingUp, color: 'orange' },
  ];

  const recentOrders = [
    { id: 'ORD-001', member: 'রহিম আহমেদ', amount: 5000, status: 'pending' },
    { id: 'ORD-002', member: 'ফাতেমা বেগম', amount: 3500, status: 'delivered' },
    { id: 'ORD-003', member: 'করিম খান', amount: 8000, status: 'shipped' },
  ];

  return (
    <AdminLayout>
      <div>
        <h1 className="text-3xl font-bold text-slate-900 mb-8">ড্যাশবোর্ড</h1>

        {/* Stats Cards */}
        <div className="grid md:grid-cols-4 gap-6 mb-8">
          {stats.map((stat, i) => {
            const Icon = stat.icon;
            const colorMap: { [key: string]: string } = {
              'blue': 'from-blue-600 to-blue-700',
              'green': 'from-green-600 to-green-700',
              'purple': 'from-purple-600 to-purple-700',
              'orange': 'from-orange-600 to-orange-700',
            };

            return (
              <div key={i} className={`bg-gradient-to-br ${colorMap[stat.color]} text-white rounded-lg p-6`}>
                <div className="flex justify-between items-start">
                  <div>
                    <p className="opacity-90 text-sm mb-2">{stat.label}</p>
                    <p className="text-3xl font-bold">{stat.value}</p>
                  </div>
                  <Icon className="h-8 w-8 opacity-80" />
                </div>
              </div>
            );
          })}
        </div>

        {/* Recent Orders */}
        <div className="bg-white rounded-lg shadow-md overflow-hidden mb-8">
          <div className="bg-slate-50 px-6 py-4 border-b border-slate-200">
            <h2 className="text-xl font-bold text-slate-900">সাম্প্রতিক অর্ডার</h2>
          </div>
          
          <div className="overflow-x-auto">
            <table className="w-full">
              <thead className="bg-slate-50 border-b border-slate-200">
                <tr>
                  <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অর্ডার নং</th>
                  <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">সদস্য</th>
                  <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">পরিমাণ</th>
                  <th className="px-6 py-3 text-left text-sm font-semibold text-slate-900">অবস্থা</th>
                </tr>
              </thead>
              <tbody>
                {recentOrders.map((order, i) => (
                  <tr key={i} className="border-b border-slate-200 hover:bg-slate-50">
                    <td className="px-6 py-3 text-sm text-slate-900 font-mono">{order.id}</td>
                    <td className="px-6 py-3 text-sm text-slate-900">{order.member}</td>
                    <td className="px-6 py-3 text-sm font-semibold text-slate-900">৳{order.amount}</td>
                    <td className="px-6 py-3 text-sm">
                      <span className={`px-3 py-1 rounded-full text-xs font-semibold ${
                        order.status === 'delivered' ? 'bg-green-100 text-green-800' :
                        order.status === 'shipped' ? 'bg-blue-100 text-blue-800' :
                        'bg-yellow-100 text-yellow-800'
                      }`}>
                        {order.status === 'pending' ? 'পেন্ডিং' :
                         order.status === 'shipped' ? 'শিপ করা' :
                         'ডেলিভার করা'}
                      </span>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>

        {/* Quick Stats */}
        <div className="grid md:grid-cols-2 gap-6">
          <div className="bg-white rounded-lg shadow-md p-6">
            <h3 className="text-lg font-bold text-slate-900 mb-4">এই মাসের পরিসংখ্যান</h3>
            <div className="space-y-3">
              {[
                { label: 'নতুন সদস্য', value: 234 },
                { label: 'নতুন অর্ডার', value: 456 },
                { label: 'উইথড্র অনুরোধ', value: 89 },
                { label: 'মোট বিক্রয়', value: '৳23,45,000' },
              ].map((item, i) => (
                <div key={i} className="flex justify-between text-slate-700 p-2 border-b border-slate-200">
                  <span>{item.label}</span>
                  <span className="font-semibold">{item.value}</span>
                </div>
              ))}
            </div>
          </div>

          <div className="bg-white rounded-lg shadow-md p-6">
            <h3 className="text-lg font-bold text-slate-900 mb-4">দ্রুত অ্যাকশন</h3>
            <div className="space-y-2">
              {[
                { label: 'পণ্য যোগ করুন', href: '/admin/products/add' },
                { label: 'সদস্য দেখুন', href: '/admin/members' },
                { label: 'অর্ডার ম্যানেজ করুন', href: '/admin/orders' },
                { label: 'উইথড্র প্রসেস করুন', href: '/admin/withdrawals' },
              ].map((action, i) => (
                <button key={i} className="w-full px-4 py-2 text-left text-slate-700 hover:bg-slate-50 rounded-lg border border-slate-200">
                  {action.label} →
                </button>
              ))}
            </div>
          </div>
        </div>
      </div>
    </AdminLayout>
  );
}
