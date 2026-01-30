import { NextResponse } from 'next/server';

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const { name, email, phone, message } = body;

    if (!name || !email || !message) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    // In production, save to database or send email
    console.log('Contact message received:', { name, email, phone, message });

    return NextResponse.json({
      success: true,
      message: 'Your message has been sent successfully'
    });
  } catch (error) {
    console.error('Error sending contact message:', error);
    return NextResponse.json({ error: 'Failed to send message' }, { status: 500 });
  }
}
