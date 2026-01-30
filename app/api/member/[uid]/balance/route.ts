import { NextResponse } from 'next/server';

export async function GET(
  request: Request,
  { params }: { params: Promise<{ uid: string }> }
) {
  try {
    const { uid } = await params;
    
    // Return sample balance data - in production use a real database
    return NextResponse.json({
      totalBalance: 5000,
      cashWallet: 2500,
      upgradeWallet: 1000,
      shoppingWallet: 1500,
      directIncome: 1000,
      dailyIncome: 500,
      generationIncome: 300,
      matchingIncome: 200,
      rewardPoints: 250,
      purchasePoints: 100
    });
  } catch (error) {
    console.error('Error fetching balance:', error);
    return NextResponse.json({ error: 'Failed to fetch balance' }, { status: 500 });
  }
}
