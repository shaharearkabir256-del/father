import { NextResponse } from 'next/server';

export async function GET() {
  try {
    // Return empty members array - in production use a real database
    return NextResponse.json([]);
  } catch (error) {
    console.error('Error fetching members:', error);
    return NextResponse.json({ error: 'Failed to fetch members' }, { status: 500 });
  }
}
