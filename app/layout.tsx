import type { Metadata, Viewport } from "next"
import { Inter } from "next/font/google"
import "./globals.css"

const inter = Inter({ subsets: ["latin"], variable: "--font-inter" })

export const metadata: Metadata = {
  title: "Daily Income Bazar - Online Shopping & MLM Platform",
  description: "Daily Income Bazar - Your trusted online shopping destination with exciting MLM earning opportunities.",
  keywords: "online shopping, MLM, daily income, e-commerce, Bangladesh",
}

export const viewport: Viewport = {
  themeColor: "#2563eb",
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="bn">
      <body className={`${inter.variable} font-sans antialiased bg-slate-50`}>
        {children}
      </body>
    </html>
  )
}
