import { db } from '@/lib/firebase';
import { doc, updateDoc, getDoc, increment } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function PUT(
  request: Request,
  { params }: { params: { id: string } }
) {
  try {
    const body = await request.json();
    const docRef = doc(db, 'withdrawals', params.id);
    
    // Get withdrawal details
    const withdrawalSnap = await getDoc(docRef);
    const withdrawal = withdrawalSnap.data();

    // If approving, transfer the money back if rejected
    if (body.status === 'rejected' && withdrawal) {
      const balanceRef = doc(db, 'memberBalance', withdrawal.userId);
      await updateDoc(balanceRef, {
        cashWallet: increment(withdrawal.totalDebit)
      });
    }

    await updateDoc(docRef, {
      status: body.status,
      updatedAt: new Date()
    });

    return NextResponse.json({ success: true });
  } catch (error) {
    console.error('Error updating withdrawal:', error);
    return NextResponse.json({ error: 'Failed to update withdrawal' }, { status: 500 });
  }
}
