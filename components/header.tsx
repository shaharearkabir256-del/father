"use client"

import Link from "next/link"
import { Button } from "@/components/ui/button"
import { Menu, X, Sparkles } from "lucide-react"
import { useState } from "react"

export function Header() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false)

  return (
    <header className="fixed top-0 left-0 right-0 z-50 border-b border-border/40 bg-background/80 backdrop-blur-md">
      <nav className="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
        <div className="flex items-center gap-2">
          <Sparkles className="h-6 w-6 text-foreground" />
          <span className="text-xl font-semibold tracking-tight">NexusAI</span>
        </div>

        <div className="hidden items-center gap-8 md:flex">
          <Link href="#features" className="text-sm text-muted-foreground transition-colors hover:text-foreground">
            Features
          </Link>
          <Link href="#models" className="text-sm text-muted-foreground transition-colors hover:text-foreground">
            Models
          </Link>
          <Link href="#pricing" className="text-sm text-muted-foreground transition-colors hover:text-foreground">
            Pricing
          </Link>
          <Link href="#docs" className="text-sm text-muted-foreground transition-colors hover:text-foreground">
            Documentation
          </Link>
        </div>

        <div className="hidden items-center gap-4 md:flex">
          <Button variant="ghost" size="sm">
            Log in
          </Button>
          <Button size="sm">
            Get Started
          </Button>
        </div>

        <button
          className="md:hidden"
          onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
          aria-label="Toggle menu"
        >
          {mobileMenuOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
        </button>
      </nav>

      {mobileMenuOpen && (
        <div className="border-t border-border/40 bg-background px-6 py-4 md:hidden">
          <div className="flex flex-col gap-4">
            <Link href="#features" className="text-sm text-muted-foreground">Features</Link>
            <Link href="#models" className="text-sm text-muted-foreground">Models</Link>
            <Link href="#pricing" className="text-sm text-muted-foreground">Pricing</Link>
            <Link href="#docs" className="text-sm text-muted-foreground">Documentation</Link>
            <div className="flex gap-4 pt-4">
              <Button variant="ghost" size="sm" className="flex-1">Log in</Button>
              <Button size="sm" className="flex-1">Get Started</Button>
            </div>
          </div>
        </div>
      )}
    </header>
  )
}
