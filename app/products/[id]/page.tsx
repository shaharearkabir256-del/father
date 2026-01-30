'use client';

import { useContext, useEffect, useState } from 'react';
import useSWR from 'swr';
import Link from 'next/link';
import Image from 'next/image';
import SiteHeader from '@/components/site-header';
import SiteFooter from '@/components/site-footer';
import { Button } from '@/components/ui/button';
import { CartContext } from '@/lib/cart-context';
import { ShoppingCart, ArrowLeft, Star, Truck, Shield } from 'lucide-react';

interface Product {
  id: string;
  name: string;
  price: number;
  salePrice?: number;
  discount_price?: number;
  img?: string;
  rp: number;
  description?: string;
  stock?: number;
}

const fetcher = (url: string) => fetch(url).then(r => r.json());

export default function ProductDetail({ params }: { params: { id: string } }) {
  const [quantity, setQuantity] = useState(1);
  const { addToCart } = useContext(CartContext);
  
  const { data: product, isLoading } = useSWR(`/api/products/${params.id}`, fetcher);

  if (isLoading) {
    return (
      <>
        <SiteHeader />
        <div className="flex items-center justify-center min-h-screen">
          <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
        </div>
        <SiteFooter />
      </>
    );
  }

  if (!product) {
    return (
      <>
        <SiteHeader />
        <div className="container mx-auto px-4 py-12 text-center">
          <p className="text-xl text-slate-600 mb-4">পণ্য পাওয়া যায়নি</p>
          <Link href="/">
            <Button>হোম পেজে ফিরুন</Button>
          </Link>
        </div>
        <SiteFooter />
      </>
    );
  }

  const displayPrice = product.discount_price || product.salePrice || product.price;
  const discount = product.price > displayPrice 
    ? Math.round(((product.price - displayPrice) / product.price) * 100)
    : 0;

  const handleAddToCart = () => {
    addToCart({
      id: product.id,
      name: product.name,
      price: displayPrice,
      quantity: quantity,
      img: product.img
    });
  };

  return (
    <>
      <SiteHeader />
      <main className="min-h-screen bg-slate-50 py-8">
        <div className="container mx-auto px-4">
          <Link href="/" className="flex items-center gap-2 text-blue-600 hover:text-blue-700 mb-8">
            <ArrowLeft className="h-4 w-4" />
            পিছনে ফিরুন
          </Link>

          <div className="bg-white rounded-lg shadow-md overflow-hidden">
            <div className="grid md:grid-cols-2 gap-8 p-6 md:p-10">
              {/* Image Section */}
              <div className="bg-slate-100 rounded-lg flex items-center justify-center overflow-hidden h-96 md:h-auto">
                {product.img ? (
                  <Image
                    src={product.img}
                    alt={product.name}
                    width={400}
                    height={400}
                    className="object-contain"
                  />
                ) : (
                  <div className="text-slate-400 text-center">
                    <p>ছবি উপলব্ধ নয়</p>
                  </div>
                )}
              </div>

              {/* Details Section */}
              <div className="flex flex-col justify-between">
                <div>
                  <h1 className="text-3xl md:text-4xl font-bold mb-4 text-slate-900">
                    {product.name}
                  </h1>

                  {/* Rating */}
                  <div className="flex items-center gap-4 mb-6">
                    <div className="flex text-yellow-400">
                      {[...Array(5)].map((_, i) => (
                        <Star key={i} className="h-5 w-5 fill-current" />
                      ))}
                    </div>
                    <span className="text-slate-600">(152 রিভিউ)</span>
                  </div>

                  {/* Price Section */}
                  <div className="mb-6">
                    <div className="flex items-baseline gap-3 mb-2">
                      <span className="text-4xl font-bold text-slate-900">৳{displayPrice}</span>
                      {discount > 0 && (
                        <>
                          <span className="text-xl text-slate-500 line-through">৳{product.price}</span>
                          <span className="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            -{discount}%
                          </span>
                        </>
                      )}
                    </div>
                    <p className="text-green-600 text-lg font-semibold">
                      💰 {product.rp} রিওয়ার্ড পয়েন্ট অর্জন করুন
                    </p>
                  </div>

                  {/* Description */}
                  {product.description && (
                    <div className="mb-6 p-4 bg-slate-50 rounded-lg">
                      <h3 className="font-semibold mb-2">পণ্য বিবরণ:</h3>
                      <p className="text-slate-700">{product.description}</p>
                    </div>
                  )}

                  {/* Stock Status */}
                  <div className="mb-6 text-sm">
                    {product.stock ? (
                      <p className="text-green-600 font-semibold">✓ স্টকে আছে ({product.stock} পণ্য)</p>
                    ) : (
                      <p className="text-red-600 font-semibold">✗ স্টক শেষ</p>
                    )}
                  </div>

                  {/* Features */}
                  <div className="grid md:grid-cols-2 gap-4 mb-8">
                    <div className="flex gap-3">
                      <Truck className="h-5 w-5 text-blue-600 flex-shrink-0 mt-1" />
                      <div>
                        <p className="font-semibold text-sm">বিনামূল্যে ডেলিভারি</p>
                        <p className="text-sm text-slate-600">সারাদেশে ডেলিভারি</p>
                      </div>
                    </div>
                    <div className="flex gap-3">
                      <Shield className="h-5 w-5 text-blue-600 flex-shrink-0 mt-1" />
                      <div>
                        <p className="font-semibold text-sm">নিরাপদ পেমেন্ট</p>
                        <p className="text-sm text-slate-600">সম্পূর্ণ সুরক্ষিত</p>
                      </div>
                    </div>
                  </div>
                </div>

                {/* Add to Cart Section */}
                <div>
                  <div className="flex gap-4 mb-4">
                    <div className="flex items-center border border-slate-300 rounded-lg">
                      <button
                        onClick={() => setQuantity(Math.max(1, quantity - 1))}
                        className="px-4 py-2 text-slate-600 hover:text-slate-900"
                      >
                        −
                      </button>
                      <span className="px-4 py-2 font-semibold">{quantity}</span>
                      <button
                        onClick={() => setQuantity(quantity + 1)}
                        className="px-4 py-2 text-slate-600 hover:text-slate-900"
                      >
                        +
                      </button>
                    </div>
                  </div>
                  <Button
                    onClick={handleAddToCart}
                    size="lg"
                    className="w-full"
                    disabled={!product.stock}
                  >
                    <ShoppingCart className="h-5 w-5 mr-2" />
                    কার্টে যোগ করুন
                  </Button>
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
