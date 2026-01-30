import { NextResponse } from 'next/server';

// Simple in-memory user storage - in production use a real database
const users: Map<string, any> = new Map();

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const { email, password, displayName, phone, sponsorId } = body;

    if (!email || !password || !displayName) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    // Check if email already exists
    if (users.has(email)) {
      return NextResponse.json({ error: 'This email is already in use' }, { status: 400 });
    }

    // Create user
    const uid = `user-${Date.now()}`;
    const user = {
      uid,
      email,
      displayName,
      phone: phone || '',
      sponsorId: sponsorId || '',
      createdAt: new Date().toISOString(),
      status: 'active',
      level: 1
    };

    users.set(email, { ...user, password }); // In production, hash the password!

    return NextResponse.json({
      success: true,
      uid,
      email
    });
  } catch (error) {
    console.error('Error signing up:', error);
    return NextResponse.json({ error: 'Registration failed' }, { status: 400 });
  }
}
