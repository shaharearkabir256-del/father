import { db } from '@/lib/firebase';
import { collection, getDocs, query, where, limit } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function GET(request: Request) {
  try {
    const { searchParams } = new URL(request.url);
    const category = searchParams.get('category');
    const limitCount = parseInt(searchParams.get('limit') || '50');

    let q;
    if (category && category !== 'all') {
      q = query(collection(db, 'products'), where('category', '==', category), limit(limitCount));
    } else {
      q = query(collection(db, 'products'), limit(limitCount));
    }

    const querySnapshot = await getDocs(q);
    const products = querySnapshot.docs.map(doc => ({
      id: doc.id,
      ...doc.data()
    }));

    return NextResponse.json(products);
  } catch (error) {
    console.error('Error fetching products:', error);
    return NextResponse.json({ error: 'Failed to fetch products' }, { status: 500 });
  }
}

export async function POST(request: Request) {
  try {
    const body = await request.json();
    
    // Only admin can add products - implement proper auth check
    const { 
      name, 
      price, 
      salePrice, 
      discount_price, 
      img, 
      category, 
      rp,
      description,
      stock 
    } = body;

    if (!name || !price || !category) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    const docRef = await db.collection('products').add({
      name,
      price: parseFloat(price),
      salePrice: salePrice ? parseFloat(salePrice) : null,
      discount_price: discount_price ? parseFloat(discount_price) : null,
      img: img || null,
      category,
      rp: parseInt(rp) || 0,
      description: description || '',
      stock: parseInt(stock) || 0,
      createdAt: new Date(),
      updatedAt: new Date()
    });

    return NextResponse.json({ id: docRef.id, success: true });
  } catch (error) {
    console.error('Error creating product:', error);
    return NextResponse.json({ error: 'Failed to create product' }, { status: 500 });
  }
}
