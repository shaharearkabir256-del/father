import { NextResponse } from 'next/server';

const sampleProducts = [
  { id: '1', name: 'Smartphone X-Pro', price: 35000, salePrice: 28999, category: 'electronics', img: 'https://images.unsplash.com/photo-1511707267537-b85faf00021e?w=500&h=500&fit=crop', rp: 500, description: 'High quality smartphone' },
  { id: '2', name: 'Wireless Earbuds', price: 5000, salePrice: 3999, category: 'electronics', img: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&h=500&fit=crop', rp: 100, description: 'Premium sound quality' },
  { id: '3', name: 'Premium Watch', price: 15000, salePrice: 11999, category: 'accessories', img: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&h=500&fit=crop', rp: 250, description: 'Stylish design' },
  { id: '4', name: 'Fitness Tracker', price: 8000, salePrice: 6499, category: 'health', img: 'https://images.unsplash.com/photo-1575311373937-040b8e1fd5b6?w=500&h=500&fit=crop', rp: 150, description: 'Track your health' },
  { id: '5', name: 'Portable Charger', price: 3000, salePrice: 2299, category: 'electronics', img: 'https://images.unsplash.com/photo-1609091839311-d5365f9ff1c5?w=500&h=500&fit=crop', rp: 50, description: '10000mAh battery' },
  { id: '6', name: 'Bluetooth Speaker', price: 6000, salePrice: 4799, category: 'electronics', img: 'https://images.unsplash.com/photo-1589003077984-894e133814c9?w=500&h=500&fit=crop', rp: 120, description: 'Waterproof speaker' },
];

export async function GET(
  request: Request,
  { params }: { params: Promise<{ id: string }> }
) {
  try {
    const { id } = await params;
    const product = sampleProducts.find(p => p.id === id);

    if (!product) {
      return NextResponse.json({ error: 'Product not found' }, { status: 404 });
    }

    return NextResponse.json(product);
  } catch (error) {
    console.error('Error fetching product:', error);
    return NextResponse.json({ error: 'Failed to fetch product' }, { status: 500 });
  }
}
