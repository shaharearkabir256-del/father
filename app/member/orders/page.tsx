'use client';

import { useContext } from 'react';
import useSWR from 'swr';
import { AuthContext } from '@/lib/auth-context';
import MemberLayout from '@/components/member-layout';
import { Package, Calendar, DollarSign, Truck } from 'lucide-react';

interface Order {
  id: string;
  items: any[];
  totalAmount: number;
  status: string;
  createdAt: any;
}

const fetcher = (url: string) => fetch(url).then(r => r.json());

export default function OrdersPage() {
  const { user } = useContext(AuthContext);
  const { data: orders = [], isLoading } = useSWR(
    user ? `/api/member/${user.uid}/orders` : null,
    fetcher
  );

  const getStatusColor = (status: string) => {
    switch (status) {
      case 'delivered': return 'bg-green-100 text-green-800';
      case 'pending': return 'bg-yellow-100 text-yellow-800';
      case 'cancelled': return 'bg-red-100 text-red-800';
      default: return 'bg-blue-100 text-blue-800';
    }
  };

  const getStatusText = (status: string) => {
    const statusMap: { [key: string]: string } = {
      'pending': 'পেন্ডিং',
      'processing': 'প্রক্রিয়াধীন',
      'shipped': 'শিপ করা হয়েছে',
      'delivered': 'ডেলিভার করা হয়েছে',
      'cancelled': 'বাতিল করা হয়েছে'
    };
    return statusMap[status] || status;
  };

  return (
    <MemberLayout>
      <div>
        <h1 className="text-3xl font-bold text-slate-900 mb-8">আমার অর্ডার</h1>

        {isLoading ? (
          <div className="text-center py-12">
            <div className="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
          </div>
        ) : orders.length === 0 ? (
          <div className="bg-white rounded-lg shadow-md p-8 text-center">
            <Package className="h-12 w-12 text-slate-400 mx-auto mb-4" />
            <p className="text-slate-600 text-lg">কোনো অর্ডার নেই</p>
          </div>
        ) : (
          <div className="space-y-4">
            {orders.map((order: Order) => (
              <div key={order.id} className="bg-white rounded-lg shadow-md overflow-hidden">
                <div className="p-6">
                  <div className="grid md:grid-cols-4 gap-4 mb-4">
                    <div>
                      <p className="text-slate-600 text-sm">অর্ডার নং</p>
                      <p className="font-mono text-slate-900 font-semibold">{order.id}</p>
                    </div>
                    <div>
                      <p className="text-slate-600 text-sm">তারিখ</p>
                      <p className="text-slate-900 font-semibold">
                        {new Date(order.createdAt?.seconds * 1000).toLocaleDateString('bn-BD')}
                      </p>
                    </div>
                    <div>
                      <p className="text-slate-600 text-sm">মোট টাকা</p>
                      <p className="text-slate-900 font-semibold text-lg">৳{order.totalAmount}</p>
                    </div>
                    <div>
                      <p className="text-slate-600 text-sm">অবস্থা</p>
                      <span className={`inline-block px-3 py-1 rounded-full text-sm font-semibold ${getStatusColor(order.status)}`}>
                        {getStatusText(order.status)}
                      </span>
                    </div>
                  </div>

                  <div className="border-t border-slate-200 pt-4">
                    <p className="font-semibold text-slate-900 mb-3">পণ্য ({order.items.length})</p>
                    <div className="space-y-2">
                      {order.items.map((item: any, i: number) => (
                        <div key={i} className="text-slate-600 flex justify-between">
                          <span>{item.name} x{item.quantity}</span>
                          <span>৳{(item.price * item.quantity).toFixed(2)}</span>
                        </div>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        )}
      </div>
    </MemberLayout>
  );
}
