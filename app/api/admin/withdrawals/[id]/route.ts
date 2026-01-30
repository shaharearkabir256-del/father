import { NextResponse } from 'next/server';

export async function PUT(
  request: Request,
  { params }: { params: Promise<{ id: string }> }
) {
  try {
    const { id } = await params;
    const body = await request.json();

    // In production, update the database
    console.log('Withdrawal update for:', id, body);

    return NextResponse.json({ success: true });
  } catch (error) {
    console.error('Error updating withdrawal:', error);
    return NextResponse.json({ error: 'Failed to update withdrawal' }, { status: 500 });
  }
}
