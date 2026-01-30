'use client';

import { useContext } from 'react';
import Link from 'next/link';
import SiteHeader from '@/components/site-header';
import SiteFooter from '@/components/site-footer';
import { CartContext } from '@/lib/cart-context';
import { Button } from '@/components/ui/button';
import { Trash2, Plus, Minus, ArrowLeft, ShoppingBag } from 'lucide-react';
import Image from 'next/image';

export default function CartPage() {
  const { cart, removeFromCart, updateQuantity } = useContext(CartContext);

  const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
  const tax = subtotal * 0.15; // 15% tax
  const total = subtotal + tax;

  if (cart.length === 0) {
    return (
      <>
        <SiteHeader />
        <main className="min-h-screen bg-slate-50 py-12">
          <div className="container mx-auto px-4 text-center">
            <ShoppingBag className="h-16 w-16 mx-auto text-slate-400 mb-4" />
            <h1 className="text-2xl font-bold text-slate-900 mb-2">কার্ট খালি</h1>
            <p className="text-slate-600 mb-8">আপনার কার্টে কোনো পণ্য নেই</p>
            <Link href="/">
              <Button size="lg">কেনাকাটা শুরু করুন</Button>
            </Link>
          </div>
        </main>
        <SiteFooter />
      </>
    );
  }

  return (
    <>
      <SiteHeader />
      <main className="min-h-screen bg-slate-50 py-8">
        <div className="container mx-auto px-4">
          <Link href="/" className="flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-8">
            <ArrowLeft className="h-4 w-4" />
            কেনাকাটা চালিয়ে যান
          </Link>

          <div className="grid lg:grid-cols-3 gap-8">
            {/* Cart Items */}
            <div className="lg:col-span-2">
              <div className="bg-white rounded-lg shadow-md overflow-hidden">
                <div className="bg-blue-600 text-white px-6 py-4">
                  <h1 className="text-2xl font-bold">শপিং কার্ট</h1>
                  <p className="text-blue-100 text-sm">{cart.length} আইটেম</p>
                </div>

                <div className="divide-y">
                  {cart.map(item => (
                    <div key={item.id} className="p-6 flex gap-4 hover:bg-slate-50 transition-colors">
                      <div className="w-20 h-20 bg-slate-100 rounded-lg overflow-hidden flex-shrink-0">
                        {item.img ? (
                          <Image
                            src={item.img}
                            alt={item.name}
                            width={80}
                            height={80}
                            className="object-cover"
                          />
                        ) : (
                          <div className="w-full h-full flex items-center justify-center text-slate-400">
                            No Img
                          </div>
                        )}
                      </div>

                      <div className="flex-1">
                        <h3 className="font-semibold text-slate-900 mb-1">{item.name}</h3>
                        <p className="text-blue-600 font-semibold">৳{item.price}</p>
                      </div>

                      <div className="flex flex-col items-end justify-between">
                        <button
                          onClick={() => removeFromCart(item.id)}
                          className="text-red-600 hover:text-red-700"
                        >
                          <Trash2 className="h-5 w-5" />
                        </button>

                        <div className="flex items-center border border-slate-300 rounded">
                          <button
                            onClick={() => updateQuantity(item.id, item.quantity - 1)}
                            className="px-2 py-1 text-slate-600"
                          >
                            <Minus className="h-4 w-4" />
                          </button>
                          <span className="px-3 py-1 font-semibold text-sm">{item.quantity}</span>
                          <button
                            onClick={() => updateQuantity(item.id, item.quantity + 1)}
                            className="px-2 py-1 text-slate-600"
                          >
                            <Plus className="h-4 w-4" />
                          </button>
                        </div>

                        <p className="text-slate-900 font-semibold">
                          ৳{(item.price * item.quantity).toFixed(2)}
                        </p>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            </div>

            {/* Order Summary */}
            <div>
              <div className="bg-white rounded-lg shadow-md p-6 sticky top-20">
                <h2 className="text-xl font-bold text-slate-900 mb-6">অর্ডার সারসংক্ষেপ</h2>
                
                <div className="space-y-3 pb-4 border-b border-slate-200">
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
                    <span className="text-green-600 font-semibold">বিনামূল্যে</span>
                  </div>
                </div>

                <div className="flex justify-between text-lg font-bold text-slate-900 py-4">
                  <span>মোট</span>
                  <span>৳{total.toFixed(2)}</span>
                </div>

                <Link href="/checkout">
                  <Button size="lg" className="w-full mb-3">
                    চেকআউটে যান
                  </Button>
                </Link>

                <Link href="/">
                  <Button variant="outline" className="w-full">
                    কেনাকাটা চালিয়ে যান
                  </Button>
                </Link>

                <div className="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                  <p className="text-sm text-blue-900">
                    💰 <strong>প্রতিটি ক্রয়ে</strong> রিওয়ার্ড পয়েন্ট অর্জন করুন এবং পরবর্তী ক্রয়ে ব্যবহার করুন।
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
