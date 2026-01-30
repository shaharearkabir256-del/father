import { NextResponse } from 'next/server';

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const { email, password } = body;

    if (!email || !password) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    // In production, verify credentials against database
    // For demo, accept any valid-looking credentials
    if (email && password.length >= 6) {
      return NextResponse.json({
        success: true,
        user: {
          uid: `user-${Date.now()}`,
          email,
          displayName: email.split('@')[0]
        }
      });
    }

    return NextResponse.json({ error: 'Invalid credentials' }, { status: 401 });
  } catch (error) {
    console.error('Error during login:', error);
    return NextResponse.json({ error: 'Login failed' }, { status: 500 });
  }
}
