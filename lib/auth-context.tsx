"use client"

import { createContext, useContext, useEffect, useState, ReactNode } from "react"
import { 
  User,
  onAuthStateChanged,
  signInWithEmailAndPassword,
  createUserWithEmailAndPassword,
  signOut as firebaseSignOut
} from "firebase/auth"
import { doc, getDoc, setDoc, serverTimestamp } from "firebase/firestore"
import { auth, db } from "./firebase"

interface MemberProfile {
  fname: string
  lname: string
  email: string
  mobile: string
  address: string
  photo: string
  sponsorId: string
  position: "left" | "right"
  package: string
  club: string
  createdAt: Date
}

interface MemberBalance {
  cashWallet: number
  upgradeWallet: number
  shoppingWallet: number
  purchasePoints: number
  sponsorIncome: number
  dailyIncome: number
  generationIncome: number
  matchingIncome: number
}

interface AuthContextType {
  user: User | null
  profile: MemberProfile | null
  balance: MemberBalance | null
  loading: boolean
  signIn: (email: string, password: string) => Promise<void>
  signUp: (email: string, password: string, profileData: Partial<MemberProfile>) => Promise<void>
  signOut: () => Promise<void>
  refreshProfile: () => Promise<void>
}

const AuthContext = createContext<AuthContextType | null>(null)

export function AuthProvider({ children }: { children: ReactNode }) {
  const [user, setUser] = useState<User | null>(null)
  const [profile, setProfile] = useState<MemberProfile | null>(null)
  const [balance, setBalance] = useState<MemberBalance | null>(null)
  const [loading, setLoading] = useState(true)

  const fetchUserData = async (uid: string) => {
    try {
      const profileDoc = await getDoc(doc(db, "members", uid, "profile", "data"))
      const balanceDoc = await getDoc(doc(db, "members", uid, "balance", "data"))
      
      if (profileDoc.exists()) {
        setProfile(profileDoc.data() as MemberProfile)
      }
      if (balanceDoc.exists()) {
        setBalance(balanceDoc.data() as MemberBalance)
      }
    } catch (error) {
      console.error("Error fetching user data:", error)
    }
  }

  useEffect(() => {
    const unsubscribe = onAuthStateChanged(auth, async (user) => {
      setUser(user)
      if (user) {
        await fetchUserData(user.uid)
      } else {
        setProfile(null)
        setBalance(null)
      }
      setLoading(false)
    })

    return () => unsubscribe()
  }, [])

  const signIn = async (email: string, password: string) => {
    const result = await signInWithEmailAndPassword(auth, email, password)
    await fetchUserData(result.user.uid)
  }

  const signUp = async (email: string, password: string, profileData: Partial<MemberProfile>) => {
    const result = await createUserWithEmailAndPassword(auth, email, password)
    const uid = result.user.uid

    // Create profile
    await setDoc(doc(db, "members", uid, "profile", "data"), {
      ...profileData,
      email,
      createdAt: serverTimestamp(),
    })

    // Initialize balance
    await setDoc(doc(db, "members", uid, "balance", "data"), {
      cashWallet: 0,
      upgradeWallet: 0,
      shoppingWallet: 0,
      purchasePoints: 0,
      sponsorIncome: 0,
      dailyIncome: 0,
      generationIncome: 0,
      matchingIncome: 0,
    })

    // Create member document
    await setDoc(doc(db, "members", uid), {
      email,
      memberId: uid.substring(0, 8).toUpperCase(),
      createdAt: serverTimestamp(),
      isActive: true,
    })

    await fetchUserData(uid)
  }

  const signOut = async () => {
    await firebaseSignOut(auth)
    setProfile(null)
    setBalance(null)
  }

  const refreshProfile = async () => {
    if (user) {
      await fetchUserData(user.uid)
    }
  }

  return (
    <AuthContext.Provider value={{ user, profile, balance, loading, signIn, signUp, signOut, refreshProfile }}>
      {children}
    </AuthContext.Provider>
  )
}

export function useAuth() {
  const context = useContext(AuthContext)
  if (!context) {
    throw new Error("useAuth must be used within an AuthProvider")
  }
  return context
}
