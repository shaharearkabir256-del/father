'use client';

import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { ShoppingCart, Star } from 'lucide-react';
import { useCart } from '@/lib/cart-context';
import Image from 'next/image';

interface Product {
  id: string;
  name: string;
  price: number;
  salePrice?: number;
  discount_price?: number;
  img?: string;
  rp: number;
}

export default function ProductCard({ product }: { product: Product }) {
  const { addItem } = useCart();
  
  const displayPrice = product.discount_price || product.salePrice || product.price;
  const discount = product.price > displayPrice 
    ? Math.round(((product.price - displayPrice) / product.price) * 100)
    : 0;

  const handleAddToCart = () => {
    addItem({
      id: product.id,
      name: product.name,
      price: product.price,
      salePrice: displayPrice,
      image: product.img || '',
      points: product.rp
    });
  };

  return (
    <div className="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow overflow-hidden h-full flex flex-col">
      <div className="relative bg-slate-100 h-48 overflow-hidden">
        {product.img ? (
          <Image
            src={product.img}
            alt={product.name}
            fill
            className="object-cover hover:scale-105 transition-transform"
          />
        ) : (
          <div className="w-full h-full flex items-center justify-center text-slate-400">
            No Image
          </div>
        )}
        {discount > 0 && (
          <div className="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm font-semibold">
            -{discount}%
          </div>
        )}
      </div>
      
      <div className="p-4 flex-1 flex flex-col">
        <Link href={`/products/${product.id}`}>
          <h3 className="font-semibold text-slate-900 hover:text-blue-600 transition-colors line-clamp-2 mb-2">
            {product.name}
          </h3>
        </Link>
        
        <div className="flex items-center gap-2 mb-3">
          <div className="flex text-yellow-400">
            {[...Array(5)].map((_, i) => (
              <Star key={i} className="h-4 w-4 fill-current" />
            ))}
          </div>
          <span className="text-sm text-slate-600">(42 রিভিউ)</span>
        </div>

        <div className="mb-4 flex-1">
          <div className="flex items-baseline gap-2">
            <span className="text-xl font-bold text-slate-900">৳{displayPrice}</span>
            {discount > 0 && (
              <span className="text-sm text-slate-500 line-through">৳{product.price}</span>
            )}
          </div>
          <div className="text-sm text-green-600 mt-1">
            💰 {product.rp} পয়েন্ট অর্জন করুন
          </div>
        </div>

        <Button
          onClick={handleAddToCart}
          size="sm"
          className="w-full"
        >
          <ShoppingCart className="h-4 w-4 mr-2" />
          কার্টে যোগ করুন
        </Button>
      </div>
    </div>
  );
}
