"use client"

import { Button } from "@/components/ui/button"
import { ArrowRight, Sparkles } from "lucide-react"

export function HeroSection() {
  return (
    <section className="relative flex min-h-screen flex-col items-center justify-center px-6 pt-20">
      <div className="absolute inset-0 -z-10 overflow-hidden">
        <div className="absolute left-1/2 top-1/2 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-primary/5 blur-3xl" />
      </div>

      <div className="mx-auto max-w-4xl text-center">
        <div className="mb-6 inline-flex items-center gap-2 rounded-full border border-border bg-card px-4 py-2 text-sm">
          <Sparkles className="h-4 w-4 text-primary" />
          <span className="text-muted-foreground">Introducing NexusAI 2.0</span>
        </div>

        <h1 className="mb-6 text-balance text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl lg:text-7xl">
          The fastest and most powerful{" "}
          <span className="text-muted-foreground">platform for building AI products</span>
        </h1>

        <p className="mx-auto mb-10 max-w-2xl text-pretty text-lg text-muted-foreground md:text-xl">
          Build transformative AI experiences powered by industry-leading models and tools. 
          Create, deploy, and scale with confidence.
        </p>

        <div className="flex flex-col items-center gap-4 sm:flex-row sm:justify-center">
          <Button size="lg" className="gap-2">
            Start building <ArrowRight className="h-4 w-4" />
          </Button>
          <Button size="lg" variant="outline">
            View API pricing
          </Button>
        </div>

        <div className="mt-20">
          <p className="mb-8 text-sm text-muted-foreground">Trusted by industry leaders</p>
          <div className="flex flex-wrap items-center justify-center gap-8 opacity-60 md:gap-12">
            <span className="text-lg font-semibold tracking-wide">Vercel</span>
            <span className="text-lg font-semibold tracking-wide">Stripe</span>
            <span className="text-lg font-semibold tracking-wide">Notion</span>
            <span className="text-lg font-semibold tracking-wide">Linear</span>
            <span className="text-lg font-semibold tracking-wide">Figma</span>
          </div>
        </div>
      </div>
    </section>
  )
}
