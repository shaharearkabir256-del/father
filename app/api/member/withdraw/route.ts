import { db } from '@/lib/firebase';
import { collection, addDoc, Timestamp, doc, updateDoc, increment } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const { userId, amount, method, accountNumber } = body;

    if (!userId || !amount || !method || !accountNumber) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    const withdrawAmount = parseFloat(amount);
    const charge = 50;
    const totalDebit = withdrawAmount + charge;

    // Create withdrawal request
    const docRef = await addDoc(collection(db, 'withdrawals'), {
      userId,
      amount: withdrawAmount,
      method,
      accountNumber,
      charge,
      totalDebit,
      status: 'pending',
      createdAt: Timestamp.now(),
      updatedAt: Timestamp.now()
    });

    // Update member balance
    const balanceRef = doc(db, 'memberBalance', userId);
    await updateDoc(balanceRef, {
      cashWallet: increment(-totalDebit)
    });

    return NextResponse.json({
      withdrawalId: docRef.id,
      success: true,
      message: 'উইথড্র অনুরোধ সফল'
    });
  } catch (error) {
    console.error('Error processing withdrawal:', error);
    return NextResponse.json({ error: 'Failed to process withdrawal' }, { status: 500 });
  }
}
