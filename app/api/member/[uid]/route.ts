import { NextResponse } from 'next/server';

// Sample member data - in production use a real database
const sampleMember = {
  uid: 'sample-user',
  displayName: 'Demo User',
  email: 'demo@example.com',
  phone: '+880 1700-000000',
  status: 'active',
  level: 1,
  joinDate: new Date().toISOString()
};

export async function GET(
  request: Request,
  { params }: { params: Promise<{ uid: string }> }
) {
  try {
    const { uid } = await params;
    
    return NextResponse.json({
      id: uid,
      ...sampleMember,
      uid
    });
  } catch (error) {
    console.error('Error fetching member:', error);
    return NextResponse.json({ error: 'Failed to fetch member' }, { status: 500 });
  }
}
