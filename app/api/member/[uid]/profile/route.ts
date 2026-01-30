import { db } from '@/lib/firebase';
import { doc, updateDoc } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function PUT(
  request: Request,
  { params }: { params: { uid: string } }
) {
  try {
    const body = await request.json();
    const docRef = doc(db, 'members', params.uid);

    await updateDoc(docRef, {
      ...body,
      updatedAt: new Date()
    });

    return NextResponse.json({ success: true });
  } catch (error) {
    console.error('Error updating profile:', error);
    return NextResponse.json({ error: 'Failed to update profile' }, { status: 500 });
  }
}
