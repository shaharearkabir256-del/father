import { db } from '@/lib/firebase';
import { collection, query, where, getDocs } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function GET(
  request: Request,
  { params }: { params: { uid: string } }
) {
  try {
    // Get team members where sponsorId matches the user's UID
    const q = query(collection(db, 'members'), where('sponsorId', '==', params.uid));
    const querySnapshot = await getDocs(q);
    const teamMembers = querySnapshot.docs.map(doc => ({
      id: doc.id,
      ...doc.data()
    }));

    return NextResponse.json(teamMembers);
  } catch (error) {
    console.error('Error fetching team:', error);
    return NextResponse.json({ error: 'Failed to fetch team' }, { status: 500 });
  }
}
