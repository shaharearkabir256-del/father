import { db } from '@/lib/firebase';
import { collection, getDocs } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function GET() {
  try {
    const querySnapshot = await getDocs(collection(db, 'withdrawals'));
    const withdrawals = querySnapshot.docs.map(doc => ({
      id: doc.id,
      ...doc.data()
    }));

    return NextResponse.json(withdrawals);
  } catch (error) {
    console.error('Error fetching withdrawals:', error);
    return NextResponse.json({ error: 'Failed to fetch withdrawals' }, { status: 500 });
  }
}
