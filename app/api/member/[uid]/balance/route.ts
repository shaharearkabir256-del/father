import { db } from '@/lib/firebase';
import { doc, getDoc } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function GET(
  request: Request,
  { params }: { params: { uid: string } }
) {
  try {
    const docRef = doc(db, 'memberBalance', params.uid);
    const docSnap = await getDoc(docRef);

    if (!docSnap.exists()) {
      // Return default balance for new member
      return NextResponse.json({
        totalBalance: 0,
        cashWallet: 0,
        upgradeWallet: 0,
        shoppingWallet: 0,
        directIncome: 0,
        dailyIncome: 0,
        generationIncome: 0,
        matchingIncome: 0,
        rewardPoints: 0,
        purchasePoints: 0
      });
    }

    return NextResponse.json(docSnap.data());
  } catch (error) {
    console.error('Error fetching balance:', error);
    return NextResponse.json({ error: 'Failed to fetch balance' }, { status: 500 });
  }
}
