import { db } from '@/lib/firebase';
import { collection, addDoc, Timestamp, doc, updateDoc, increment } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const { userId, items, shippingData, paymentMethod, totalAmount } = body;

    if (!userId || !items || !shippingData) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    // Create order
    const docRef = await addDoc(collection(db, 'orders'), {
      userId,
      items,
      shippingData,
      paymentMethod,
      totalAmount,
      status: 'pending',
      createdAt: Timestamp.now(),
      updatedAt: Timestamp.now(),
      orderNumber: `ORD-${Date.now()}`
    });

    // Update user's order count
    const userRef = doc(db, 'members', userId);
    await updateDoc(userRef, {
      totalOrders: increment(1)
    });

    return NextResponse.json({
      orderId: docRef.id,
      success: true
    });
  } catch (error) {
    console.error('Error creating order:', error);
    return NextResponse.json({ error: 'Failed to create order' }, { status: 500 });
  }
}
