import { db } from '@/lib/firebase';
import { collection, addDoc, Timestamp } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const { name, email, phone, subject, message } = body;

    if (!name || !email || !subject || !message) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    const docRef = await addDoc(collection(db, 'contactMessages'), {
      name,
      email,
      phone: phone || '',
      subject,
      message,
      status: 'new',
      createdAt: Timestamp.now(),
      replied: false
    });

    return NextResponse.json({
      id: docRef.id,
      success: true,
      message: 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে'
    });
  } catch (error) {
    console.error('Error sending contact message:', error);
    return NextResponse.json({ error: 'Failed to send message' }, { status: 500 });
  }
}
