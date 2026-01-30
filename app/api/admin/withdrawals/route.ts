import { NextResponse } from 'next/server';

export async function GET() {
  try {
    // Return empty withdrawals array - in production use a real database
    return NextResponse.json([]);
  } catch (error) {
    console.error('Error fetching withdrawals:', error);
    return NextResponse.json({ error: 'Failed to fetch withdrawals' }, { status: 500 });
  }
}
