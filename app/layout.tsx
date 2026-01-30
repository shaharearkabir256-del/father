import type { Metadata, Viewport } from "next"
import { Inter } from "next/font/google"
import "./globals.css"

const inter = Inter({ subsets: ["latin"], variable: "--font-inter" })

export const metadata: Metadata = {
  title: "Nexus Studio - Creative Digital Agency",
  description: "Ultra-modern creative digital agency specializing in web design, branding, and digital experiences.",
  keywords: "creative agency, web design, branding, digital experience",
}

export const viewport: Viewport = {
  themeColor: "#0a0e27",
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en">
      <body className={`${inter.variable} font-sans antialiased bg-slate-950 text-slate-50 overflow-x-hidden`}>
        {children}
      </body>
    </html>
  )
}
