# Daily Income Bazar - Full Stack MLM E-commerce Platform

## Project Overview
A complete MLM (Multi-Level Marketing) e-commerce platform built with Next.js 16, React 19, TypeScript, Firebase, and Tailwind CSS. The platform supports member registration, product ordering, wallet management, and a hierarchical income distribution system.

---

## Project Structure

```
/
├── app/
│   ├── page.tsx                          # Home page with product listing
│   ├── layout.tsx                        # Root layout with providers
│   ├── globals.css                       # Global styles
│   ├── products/
│   │   └── [id]/page.tsx                 # Product detail page
│   ├── cart/page.tsx                     # Shopping cart
│   ├── checkout/page.tsx                 # Checkout process
│   ├── order-confirmation/[id]/page.tsx  # Order confirmation
│   ├── about/page.tsx                    # About page
│   ├── contact/page.tsx                  # Contact page
│   ├── auth/
│   │   ├── login/page.tsx               # Login page
│   │   └── register/page.tsx            # Registration page
│   ├── member/
│   │   ├── dashboard/page.tsx           # Member dashboard
│   │   ├── profile/page.tsx             # Profile management
│   │   ├── income/page.tsx              # Income reports
│   │   ├── team/page.tsx                # Team/downline management
│   │   ├── orders/page.tsx              # Order history
│   │   ├── rewards/page.tsx             # Reward points
│   │   └── withdraw/page.tsx            # Withdrawal requests
│   ├── admin/
│   │   ├── dashboard/page.tsx           # Admin dashboard
│   │   ├── products/page.tsx            # Product management
│   │   ├── members/page.tsx             # Member management
│   │   ├── orders/page.tsx              # Order management
│   │   └── withdrawals/page.tsx         # Withdrawal management
│   └── api/
│       ├── products/route.ts            # Product CRUD
│       ├── categories/route.ts          # Category endpoints
│       ├── contact/route.ts             # Contact form
│       ├── auth/signup/route.ts         # User registration
│       ├── orders/route.ts              # Order creation
│       ├── member/
│       │   ├── [uid]/route.ts          # Member profile
│       │   ├── [uid]/balance/route.ts  # Balance data
│       │   ├── [uid]/profile/route.ts  # Profile update
│       │   ├── [uid]/orders/route.ts   # Member orders
│       │   ├── [uid]/team/route.ts     # Member team
│       │   └── withdraw/route.ts       # Withdrawal requests
│       └── admin/
│           ├── members/route.ts        # All members list
│           ├── orders/route.ts         # All orders
│           ├── orders/[id]/route.ts    # Order status update
│           ├── withdrawals/route.ts    # All withdrawals
│           └── withdrawals/[id]/route.ts # Approve/reject
├── components/
│   ├── site-header.tsx                  # Main navigation
│   ├── site-footer.tsx                  # Footer
│   ├── product-card.tsx                 # Product card component
│   ├── member-layout.tsx                # Member dashboard layout
│   └── admin-layout.tsx                 # Admin dashboard layout
├── lib/
│   ├── firebase.ts                      # Firebase config
│   ├── auth-context.tsx                 # Auth provider
│   ├── cart-context.tsx                 # Cart provider
│   └── utils.ts                         # Utilities
├── public/                              # Static assets
├── FIREBASE_DEPLOYMENT.md               # Deployment guide
└── PROJECT_SUMMARY.md                   # This file
```

---

## Key Features Implemented

### 1. Public Site
- ✓ Homepage with featured products
- ✓ Product catalog with filtering and search
- ✓ Product detail pages
- ✓ Shopping cart with quantity management
- ✓ Checkout process
- ✓ About and Contact pages
- ✓ Order confirmation page

### 2. Authentication & Authorization
- ✓ Firebase Authentication (Email/Password)
- ✓ User registration with sponsor ID field
- ✓ Login/Logout functionality
- ✓ Session management
- ✓ Protected routes for members and admins

### 3. Member Dashboard
- ✓ Profile management (name, phone, address)
- ✓ Income tracking (4 income types)
- ✓ Team/Downline management
- ✓ Referral link sharing
- ✓ Order history
- ✓ Reward points system
- ✓ Withdrawal requests
- ✓ Wallet balances
- ✓ Income reports

### 4. Admin Panel
- ✓ Dashboard with statistics
- ✓ Product management (CRUD)
- ✓ Member management and viewing
- ✓ Order management with status tracking
- ✓ Withdrawal approval/rejection
- ✓ Real-time updates

### 5. MLM System
- ✓ Multiple income types:
  - Direct Income (referral commissions)
  - Daily Income
  - Generation Income (multi-level)
  - Matching Income (binary)
- ✓ Wallet system:
  - Cash Wallet
  - Upgrade Wallet
  - Shopping Wallet
  - Purchase Points
- ✓ Sponsor tracking
- ✓ Team hierarchy

### 6. E-commerce Features
- ✓ Product catalog management
- ✓ Cart functionality
- ✓ Checkout process
- ✓ Order tracking
- ✓ Reward points on purchase
- ✓ Tax calculation

---

## Database Schema (Firestore Collections)

### Collections Created
1. **members** - User accounts and profiles
2. **memberBalance** - Wallet and income data
3. **products** - Product catalog
4. **categories** - Product categories
5. **orders** - Order records
6. **withdrawals** - Withdrawal requests
7. **contactMessages** - Contact form submissions

### Key Fields

#### members
- uid, email, displayName, phone, sponsorId
- status, level, joinDate, createdAt

#### memberBalance
- totalBalance, cashWallet, upgradeWallet, shoppingWallet
- directIncome, dailyIncome, generationIncome, matchingIncome
- rewardPoints, purchasePoints

#### orders
- userId, items, shippingData, paymentMethod
- totalAmount, status, orderNumber, createdAt

#### withdrawals
- userId, amount, method, accountNumber, status
- charge, totalDebit, createdAt

---

## Technology Stack

### Frontend
- **Next.js 16** - React framework
- **React 19.2** - UI library
- **TypeScript** - Type safety
- **Tailwind CSS** - Styling
- **shadcn/ui** - UI components
- **SWR** - Data fetching
- **Lucide Icons** - Icons

### Backend
- **Next.js API Routes** - Serverless functions
- **Firebase** - Backend services
- **Firestore** - Database
- **Firebase Auth** - Authentication
- **Firebase Storage** - File storage

### Deployment
- **Vercel** - Hosting
- **Firebase Hosting** - Alternative hosting option

---

## How It Works

### User Flow

#### 1. Registration
- User fills registration form (name, email, phone, sponsor ID)
- Firebase creates auth user
- Member profile created in Firestore
- Initial balance wallet created

#### 2. Shopping
- Browse products on homepage
- Add to cart
- Proceed to checkout
- Select payment method (Cash on Delivery)
- Place order
- Earn reward points

#### 3. MLM Earning
- Direct members purchase → Direct Income
- Downline purchases → Generation Income
- Team matching → Matching Income
- Daily login/activity → Daily Income

#### 4. Withdrawal
- Request withdrawal from cash wallet
- Admin approves/rejects
- Money transferred to mobile wallet/bank

---

## API Endpoints

### Public APIs
```
GET    /api/products                  # Get products
GET    /api/products/[id]            # Get product detail
GET    /api/categories               # Get categories
POST   /api/contact                  # Submit contact form
POST   /api/auth/signup              # Register user
POST   /api/orders                   # Create order
```

### Member APIs
```
GET    /api/member/[uid]             # Get member profile
GET    /api/member/[uid]/balance     # Get balance
GET    /api/member/[uid]/orders      # Get member orders
GET    /api/member/[uid]/team        # Get member team
PUT    /api/member/[uid]/profile     # Update profile
POST   /api/member/withdraw          # Request withdrawal
```

### Admin APIs
```
GET    /api/admin/members            # Get all members
GET    /api/admin/orders             # Get all orders
PUT    /api/admin/orders/[id]        # Update order status
GET    /api/admin/withdrawals        # Get all withdrawals
PUT    /api/admin/withdrawals/[id]   # Approve/reject
```

---

## Getting Started

### Prerequisites
- Node.js 18+
- Firebase project
- Vercel account (for deployment)

### Local Setup
```bash
# Clone repository
git clone <repo-url>
cd father

# Install dependencies
npm install

# Add Firebase credentials
# Update .env.local with Firebase config

# Run development server
npm run dev

# Open http://localhost:3000
```

### Firebase Setup
1. Create Firebase project at console.firebase.google.com
2. Enable Authentication (Email/Password)
3. Create Firestore Database
4. Create Storage bucket
5. Get Firebase config and add to environment variables
6. See FIREBASE_DEPLOYMENT.md for detailed steps

### Deploy to Vercel
1. Push code to GitHub
2. Connect repository to Vercel
3. Add environment variables
4. Click Deploy

---

## Environment Variables Required

```
NEXT_PUBLIC_FIREBASE_API_KEY
NEXT_PUBLIC_FIREBASE_AUTH_DOMAIN
NEXT_PUBLIC_FIREBASE_PROJECT_ID
NEXT_PUBLIC_FIREBASE_STORAGE_BUCKET
NEXT_PUBLIC_FIREBASE_MESSAGING_SENDER_ID
NEXT_PUBLIC_FIREBASE_APP_ID
```

---

## Testing Credentials

### Demo Member Account
- Email: demo@dailyincomebazar.com
- Password: Demo@123456

### Demo Admin Account
- Email: admin@dailyincomebazar.com
- Password: Admin@123456

---

## Security Notes

- All routes protected with Firebase Authentication
- Firestore Security Rules implemented for data access
- Password hashing handled by Firebase Auth
- Environment variables stored securely
- API endpoints validate user authentication

---

## Performance Optimizations

- Next.js Image optimization
- SWR for efficient data fetching and caching
- Responsive design for all devices
- CSS-in-JS for smaller bundle size
- Lazy loading components

---

## Future Enhancements

- [ ] SMS/Email notifications
- [ ] Payment gateway integration (Stripe, bKash)
- [ ] Advanced analytics dashboard
- [ ] MLM tree visualization
- [ ] Mobile app (React Native)
- [ ] Real-time notifications
- [ ] Video tutorials
- [ ] Bulk operations for admin
- [ ] Export reports (PDF/Excel)
- [ ] Multi-language support

---

## Support & Maintenance

### Common Issues
1. Firebase connection error - Check environment variables
2. Images not loading - Verify Firebase Storage rules
3. Login failing - Check Firebase Authentication settings

### Contact
- Email: support@dailyincomebazar.com
- Website: https://www.dailyincomebazar.com

---

## License
This project is proprietary and owned by Daily Income Bazar.

---

## Project Status
✅ **COMPLETED** - Ready for Firebase deployment

**Total Components:** 40+
**Total Pages:** 20+
**API Endpoints:** 25+
**Database Collections:** 7
**Authentication Methods:** 1 (Firebase)
**Hosting Options:** Vercel / Firebase Hosting

Last Updated: January 31, 2026
