# Firebase Deployment Guide - Daily Income Bazar

## Prerequisites
- Firebase Project created at https://console.firebase.google.com
- Node.js installed locally
- Firebase CLI installed: `npm install -g firebase-tools`

## Setup Steps

### 1. Create Firebase Project
1. Go to https://console.firebase.google.com
2. Click "Create Project"
3. Choose a project name (e.g., "daily-income-bazar")
4. Enable Google Analytics if desired
5. Click "Create Project"

### 2. Enable Services
In Firebase Console:
1. Go to "Build" > "Authentication" > Click "Get Started"
2. Enable "Email/Password" authentication
3. Go to "Build" > "Firestore Database" > Click "Create Database"
   - Choose "Start in production mode"
   - Select region (e.g., "asia-southeast1" for Bangladesh)
4. Go to "Build" > "Storage" > Click "Get Started"
   - Choose "Start in production mode"

### 3. Get Firebase Config
1. Go to Project Settings (gear icon)
2. Scroll to "Your apps" section
3. Click the web icon (</>) to register web app
4. Copy the config object
5. Extract values for environment variables:
   - apiKey → NEXT_PUBLIC_FIREBASE_API_KEY
   - authDomain → NEXT_PUBLIC_FIREBASE_AUTH_DOMAIN
   - projectId → NEXT_PUBLIC_FIREBASE_PROJECT_ID
   - storageBucket → NEXT_PUBLIC_FIREBASE_STORAGE_BUCKET
   - messagingSenderId → NEXT_PUBLIC_FIREBASE_MESSAGING_SENDER_ID
   - appId → NEXT_PUBLIC_FIREBASE_APP_ID

### 4. Deploy to Vercel
1. Push code to GitHub repository
2. Go to https://vercel.com
3. Click "New Project"
4. Import your GitHub repository
5. Add environment variables (from Firebase config)
6. Click "Deploy"

### 5. Configure Firestore Security Rules
Go to Firebase Console > Firestore Database > Rules

Replace with:
```javascript
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    // Members can read/write their own data
    match /members/{userId} {
      allow read, write: if request.auth.uid == userId;
    }
    
    match /memberBalance/{userId} {
      allow read, write: if request.auth.uid == userId;
    }
    
    // Products are publicly readable
    match /products/{document=**} {
      allow read: if true;
    }
    
    match /categories/{document=**} {
      allow read: if true;
    }
    
    // Orders - read/write own orders only
    match /orders/{orderId} {
      allow read, write: if request.auth.uid == resource.data.userId;
      allow create: if request.auth.uid == request.resource.data.userId;
    }
    
    // Contact messages
    match /contactMessages/{document=**} {
      allow create: if true;
    }
    
    // Admin panel - implement proper auth
    match /admin/{document=**} {
      allow read, write: if false; // Implement proper admin check
    }
  }
}
```

### 6. Create Sample Data (Optional)
```javascript
// Add to Firestore via console:

// Categories
- id: "electronics"
  name: "ইলেকট্রনিক্স"

- id: "fashion"
  name: "ফ্যাশন"

// Products
- name: "স্মার্ট ওয়াচ"
  price: 5000
  category: "electronics"
  rp: 500
  img: "https://..."
```

## Maintenance

### Monitoring
- Firebase Console > Analytics
- Firebase Console > Realtime Database / Firestore
- Vercel Analytics Dashboard

### Scaling
For high traffic:
1. Enable Firestore backup
2. Set up Cloud CDN in Firebase Console
3. Monitor and adjust Firestore indexes

## Testing
1. Create test account at https://your-site.vercel.app/auth/register
2. Test product browsing
3. Test cart and checkout
4. Verify Firestore data creation

## Troubleshooting

### No Environment Variables
- Check Vercel project settings > Environment Variables
- Re-add all NEXT_PUBLIC_* variables

### Firebase Connection Error
- Verify Firebase config in .env.local
- Check Firestore security rules
- Ensure Firebase project is active

### Images Not Loading
- Verify Firebase Storage is enabled
- Check storage security rules
- Ensure image URLs are correct

## Contact & Support
- Email: support@dib.com
- WhatsApp: Contact support team
