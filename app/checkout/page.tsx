'use client';

import { useContext, useState } from 'react';
import { useRouter } from 'next/navigation';
import Link from 'next/link';
import SiteHeader from '@/components/site-header';
import SiteFooter from '@/components/site-footer';
import { CartContext } from '@/lib/cart-context';
import { AuthContext } from '@/lib/auth-context';
import { Button } from '@/components/ui/button';
import { ArrowLeft, AlertCircle } from 'lucide-react';

export default function CheckoutPage() {
  const router = useRouter();
  const { cart, total } = useContext(CartContext);
  const { user } = useContext(AuthContext);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');
  const [shippingData, setShippingData] = useState({
    fullName: '',
    phone: '',
    address: '',
    city: '',
    district: '',
    postalCode: ''
  });

  if (cart.length === 0) {
    return (
      <>
        <SiteHeader />
        <main className="container mx-auto px-4 py-12 text-center">
          <p className="text-xl text-slate-600 mb-4">কার্ট খালি</p>
          <Link href="/">
            <Button>কেনাকাটা করুন</Button>
          </Link>
        </main>
        <SiteFooter />
      </>
    );
  }

  const handleShippingChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    const { name, value } = e.target;
    setShippingData(prev => ({ ...prev, [name]: value }));
  };

  const handlePlaceOrder = async (e: React.FormEvent) => {
    e.preventDefault();
    setError('');
    setLoading(true);

    try {
      if (!user) {
        router.push('/auth/login');
        return;
      }

      // Create order
      const response = await fetch('/api/orders', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          userId: user.uid,
          items: cart,
          shippingData,
          paymentMethod: 'cash_on_delivery',
          totalAmount: total
        })
      });

      if (response.ok) {
        const data = await response.json();
        // Clear cart and redirect
        router.push(`/order-confirmation/${data.orderId}`);
      } else {
        setError('অর্ডার তৈরিতে ব্যর্থ হয়েছে');
      }
    } catch (err) {
      setError('একটি ত্রুটি ঘটেছে, আবার চেষ্টা করুন');
    } finally {
      setLoading(false);
    }
  };

  const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
  const tax = subtotal * 0.15;
  const finalTotal = subtotal + tax;

  return (
    <>
      <SiteHeader />
      <main className="bg-slate-50 min-h-screen py-8">
        <div className="container mx-auto px-4">
          <Link href="/cart" className="flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-8">
            <ArrowLeft className="h-4 w-4" />
            কার্টে ফিরুন
          </Link>

          <div className="grid lg:grid-cols-3 gap-8">
            {/* Shipping Form */}
            <div className="lg:col-span-2">
              <div className="bg-white rounded-lg shadow-md p-6 md:p-8">
                <h1 className="text-2xl font-bold text-slate-900 mb-6">চেকআউট</h1>

                {error && (
                  <div className="bg-red-50 border border-red-200 rounded-lg p-4 mb-6 flex gap-3">
                    <AlertCircle className="h-5 w-5 text-red-600 flex-shrink-0 mt-0.5" />
                    <p className="text-red-800 text-sm">{error}</p>
                  </div>
                )}

                <form onSubmit={handlePlaceOrder} className="space-y-4">
                  {/* Shipping Address */}
                  <div>
                    <h2 className="text-lg font-bold text-slate-900 mb-4">শিপিং তথ্য</h2>
                    
                    <div className="mb-4">
                      <label className="block text-sm font-semibold text-slate-700 mb-2">
                        সম্পূর্ণ নাম
                      </label>
                      <input
                        type="text"
                        name="fullName"
                        value={shippingData.fullName}
                        onChange={handleShippingChange}
                        className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                      />
                    </div>

                    <div className="mb-4">
                      <label className="block text-sm font-semibold text-slate-700 mb-2">
                        ফোন নম্বর
                      </label>
                      <input
                        type="tel"
                        name="phone"
                        value={shippingData.phone}
                        onChange={handleShippingChange}
                        className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                      />
                    </div>

                    <div className="mb-4">
                      <label className="block text-sm font-semibold text-slate-700 mb-2">
                        ঠিকানা
                      </label>
                      <input
                        type="text"
                        name="address"
                        value={shippingData.address}
                        onChange={handleShippingChange}
                        className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                      />
                    </div>

                    <div className="grid sm:grid-cols-2 gap-4 mb-4">
                      <div>
                        <label className="block text-sm font-semibold text-slate-700 mb-2">
                          জেলা
                        </label>
                        <select
                          name="district"
                          value={shippingData.district}
                          onChange={handleShippingChange}
                          className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                          required
                        >
                          <option value="">নির্বাচন করুন</option>
                          <option value="dhaka">ঢাকা</option>
                          <option value="chittagong">চট্টগ্রাম</option>
                          <option value="khulna">খুলনা</option>
                          <option value="rajshahi">রাজশাহী</option>
                        </select>
                      </div>
                      <div>
                        <label className="block text-sm font-semibold text-slate-700 mb-2">
                          শহর
                        </label>
                        <input
                          type="text"
                          name="city"
                          value={shippingData.city}
                          onChange={handleShippingChange}
                          className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                          required
                        />
                      </div>
                    </div>

                    <div className="mb-6">
                      <label className="block text-sm font-semibold text-slate-700 mb-2">
                        পোস্টাল কোড
                      </label>
                      <input
                        type="text"
                        name="postalCode"
                        value={shippingData.postalCode}
                        onChange={handleShippingChange}
                        className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      />
                    </div>
                  </div>

                  {/* Payment Method */}
                  <div>
                    <h2 className="text-lg font-bold text-slate-900 mb-4">পেমেন্ট পদ্ধতি</h2>
                    <div className="bg-slate-50 rounded-lg p-4 border-2 border-blue-500">
                      <input type="radio" id="cod" name="payment" value="cod" defaultChecked />
                      <label htmlFor="cod" className="ml-2 font-semibold text-slate-900">
                        ক্যাশ অন ডেলিভারি
                      </label>
                      <p className="text-sm text-slate-600 mt-1">ডেলিভারির সময় টাকা পরিশোধ করুন</p>
                    </div>
                  </div>

                  <Button
                    type="submit"
                    size="lg"
                    className="w-full"
                    disabled={loading}
                  >
                    {loading ? 'প্রক্রিয়াজাত হচ্ছে...' : 'অর্ডার নিশ্চিত করুন'}
                  </Button>
                </form>
              </div>
            </div>

            {/* Order Summary */}
            <div>
              <div className="bg-white rounded-lg shadow-md p-6 sticky top-20">
                <h2 className="text-xl font-bold text-slate-900 mb-4">অর্ডার সারসংক্ষেপ</h2>
                
                <div className="space-y-3 mb-4 pb-4 border-b border-slate-200">
                  {cart.map(item => (
                    <div key={item.id} className="flex justify-between text-sm text-slate-600">
                      <span>{item.name} x{item.quantity}</span>
                      <span>৳{(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                  ))}
                </div>

                <div className="space-y-2 text-sm mb-4 pb-4 border-b border-slate-200">
                  <div className="flex justify-between text-slate-600">
                    <span>সাবটোটাল</span>
                    <span>৳{subtotal.toFixed(2)}</span>
                  </div>
                  <div className="flex justify-between text-slate-600">
                    <span>ট্যাক্স (15%)</span>
                    <span>৳{tax.toFixed(2)}</span>
                  </div>
                  <div className="flex justify-between text-slate-600">
                    <span>ডেলিভারি</span>
                    <span className="text-green-600">বিনামূল্যে</span>
                  </div>
                </div>

                <div className="flex justify-between text-lg font-bold text-slate-900 mb-6">
                  <span>মোট</span>
                  <span>৳{finalTotal.toFixed(2)}</span>
                </div>

                <div className="bg-blue-50 rounded-lg p-4 border border-blue-200">
                  <p className="text-sm text-blue-900">
                    <strong>নোট:</strong> আপনার অর্ডার সফলভাবে প্রক্রিয়া করা হলে আমরা আপনাকে কনফার্মেশন এসএমএস পাঠাব।
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <SiteFooter />
    </>
  );
}
