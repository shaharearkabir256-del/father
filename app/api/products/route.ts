import { db } from '@/lib/firebase';
import { collection, getDocs, query, where, limit, addDoc, serverTimestamp } from 'firebase/firestore';
import { NextResponse } from 'next/server';

// Sample products - will be replaced with Firebase in production
const sampleProducts = [
  {
    id: '1',
    name: 'স্মার্টফোন X-Pro',
    price: 35000,
    salePrice: 28999,
    category: 'electronics',
    img: 'https://images.unsplash.com/photo-1511707267537-b85faf00021e?w=500&h=500&fit=crop',
    rp: 500,
  },
  {
    id: '2',
    name: 'ওয়্যারলেস ইয়ারবাডস',
    price: 5000,
    salePrice: 3999,
    category: 'electronics',
    img: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&h=500&fit=crop',
    rp: 100,
  },
  {
    id: '3',
    name: 'প্রিমিয়াম ওয়াচ',
    price: 15000,
    salePrice: 11999,
    category: 'accessories',
    img: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&h=500&fit=crop',
    rp: 250,
  },
  {
    id: '4',
    name: 'ফিটনেস ট্র্যাকার',
    price: 8000,
    salePrice: 6499,
    category: 'health',
    img: 'https://images.unsplash.com/photo-1575311373937-040b8e1fd5b6?w=500&h=500&fit=crop',
    rp: 150,
  },
  {
    id: '5',
    name: 'পোর্টেবল চার্জার',
    price: 3000,
    salePrice: 2299,
    category: 'electronics',
    img: 'https://images.unsplash.com/photo-1609091839311-d5365f9ff1c5?w=500&h=500&fit=crop',
    rp: 50,
  },
  {
    id: '6',
    name: 'ব্লুটুথ স্পিকার',
    price: 6000,
    salePrice: 4799,
    category: 'electronics',
    img: 'https://images.unsplash.com/photo-1589003077984-894e133814c9?w=500&h=500&fit=crop',
    rp: 120,
  },
];

export async function GET(request: Request) {
  try {
    const { searchParams } = new URL(request.url);
    const category = searchParams.get('category');

    // For now, return sample products
    let filtered = sampleProducts;
    
    if (category && category !== 'all') {
      filtered = filtered.filter(p => p.category === category);
    }

    return NextResponse.json(filtered);
  } catch (error) {
    console.error('Error fetching products:', error);
    return NextResponse.json({ error: 'Failed to fetch products' }, { status: 500 });
  }
}
