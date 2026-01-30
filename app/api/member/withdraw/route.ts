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
    const withdrawalId = `WD-${Date.now()}`;

    // In production, save to database and update balance

    return NextResponse.json({
      withdrawalId,
      success: true,
      message: 'উইথড্র অনুরোধ সফল'
    });
  } catch (error) {
    console.error('Error processing withdrawal:', error);
    return NextResponse.json({ error: 'Failed to process withdrawal' }, { status: 500 });
  }
}
