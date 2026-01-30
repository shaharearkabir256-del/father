import { db } from '@/lib/firebase';
import { collection, query, where, getDocs } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function GET(
  request: Request,
  { params }: { params: { uid: string } }
) {
  try {
    const q = query(collection(db, 'orders'), where('userId', '==', params.uid));
    const querySnapshot = await getDocs(q);
    const orders = querySnapshot.docs.map(doc => ({
      id: doc.id,
      ...doc.data()
    }));

    return NextResponse.json(orders);
  } catch (error) {
    console.error('Error fetching orders:', error);
    return NextResponse.json({ error: 'Failed to fetch orders' }, { status: 500 });
  }
}
