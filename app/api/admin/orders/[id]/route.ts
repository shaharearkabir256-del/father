import { db } from '@/lib/firebase';
import { doc, updateDoc } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function PUT(
  request: Request,
  { params }: { params: { id: string } }
) {
  try {
    const body = await request.json();
    const docRef = doc(db, 'orders', params.id);
    
    await updateDoc(docRef, {
      status: body.status,
      updatedAt: new Date()
    });

    return NextResponse.json({ success: true });
  } catch (error) {
    console.error('Error updating order:', error);
    return NextResponse.json({ error: 'Failed to update order' }, { status: 500 });
  }
}
