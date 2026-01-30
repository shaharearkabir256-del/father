import { NextResponse } from 'next/server';

export async function GET() {
  try {
    // Return empty orders array - in production use a real database
    return NextResponse.json([]);
  } catch (error) {
    console.error('Error fetching orders:', error);
    return NextResponse.json({ error: 'Failed to fetch orders' }, { status: 500 });
  }
}
