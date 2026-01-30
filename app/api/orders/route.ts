import { NextResponse } from 'next/server';

// Simulated order storage - in production use a real database
let orders: any[] = [];

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const { userId, items, shippingData, paymentMethod, totalAmount } = body;

    if (!items || !shippingData) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    const orderId = `ORD-${Date.now()}`;
    
    const order = {
      orderId,
      userId: userId || 'guest',
      items,
      shippingData,
      paymentMethod: paymentMethod || 'cash_on_delivery',
      totalAmount,
      status: 'pending',
      createdAt: new Date().toISOString()
    };

    orders.push(order);

    return NextResponse.json({
      orderId,
      success: true
    });
  } catch (error) {
    console.error('Error creating order:', error);
    return NextResponse.json({ error: 'Failed to create order' }, { status: 500 });
  }
}

export async function GET() {
  return NextResponse.json(orders);
}
