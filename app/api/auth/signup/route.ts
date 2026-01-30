import { auth, db } from '@/lib/firebase';
import { createUserWithEmailAndPassword, updateProfile } from 'firebase/auth';
import { doc, setDoc, Timestamp } from 'firebase/firestore';
import { NextResponse } from 'next/server';

export async function POST(request: Request) {
  try {
    const body = await request.json();
    const { email, password, displayName, phone, sponsorId } = body;

    if (!email || !password || !displayName) {
      return NextResponse.json({ error: 'Missing required fields' }, { status: 400 });
    }

    // Create auth user
    const userCredential = await createUserWithEmailAndPassword(auth, email, password);
    const user = userCredential.user;

    // Update profile
    await updateProfile(user, {
      displayName: displayName
    });

    // Create member document in Firestore
    await setDoc(doc(db, 'members', user.uid), {
      uid: user.uid,
      email: user.email,
      displayName: displayName,
      phone: phone || '',
      sponsorId: sponsorId || '',
      createdAt: Timestamp.now(),
      updatedAt: Timestamp.now(),
      status: 'active',
      level: 1,
      joinDate: Timestamp.now()
    });

    // Create initial balance document
    await setDoc(doc(db, 'memberBalance', user.uid), {
      uid: user.uid,
      totalBalance: 0,
      cashWallet: 0,
      upgradeWallet: 0,
      shoppingWallet: 0,
      directIncome: 0,
      dailyIncome: 0,
      generationIncome: 0,
      matchingIncome: 0,
      rewardPoints: 0,
      purchasePoints: 0,
      createdAt: Timestamp.now(),
      updatedAt: Timestamp.now()
    });

    return NextResponse.json({
      success: true,
      uid: user.uid,
      email: user.email
    });
  } catch (error: unknown) {
    console.error('Error signing up:', error);
    
    let errorMessage = 'Registration failed';
    const firebaseError = error as { code?: string };
    if (firebaseError.code === 'auth/email-already-in-use') {
      errorMessage = 'This email is already in use';
    } else if (firebaseError.code === 'auth/weak-password') {
      errorMessage = 'Password must be at least 6 characters';
    } else if (firebaseError.code === 'auth/invalid-email') {
      errorMessage = 'Invalid email address';
    }

    return NextResponse.json({ error: errorMessage }, { status: 400 });
  }
}
