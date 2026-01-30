import type { Metadata, Viewport } from "next"
import { Inter } from "next/font/google"
import "./globals.css"
import { AuthProvider } from "@/lib/auth-context"
import { CartProvider } from "@/lib/cart-context"
import { Toaster } from "@/components/ui/sonner"

const inter = Inter({ subsets: ["latin"], variable: "--font-inter" })

export const metadata: Metadata = {
  title: "Daily Income Bazar - Online Shopping & MLM Platform",
  description: "Daily Income Bazar - Your trusted online shopping destination with exciting MLM earning opportunities. Shop quality products and earn daily income.",
  keywords: "online shopping, MLM, daily income, e-commerce, Bangladesh",
}

export const viewport: Viewport = {
  themeColor: "#16a34a",
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="bn">
      <body className={`${inter.variable} font-sans antialiased`}>
        <AuthProvider>
          <CartProvider>
            {children}
            <Toaster position="top-right" />
          </CartProvider>
        </AuthProvider>
      </body>
    </html>
  )
}
