import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { Zap, Shield, Code2, Globe } from "lucide-react"

const features = [
  {
    icon: Zap,
    title: "Unified Provider API",
    description: "Switch between AI providers by changing a single line of code. Seamless integration.",
  },
  {
    icon: Code2,
    title: "Generative UI",
    description: "Create dynamic, AI-powered user interfaces that amaze your users with intelligent responses.",
  },
  {
    icon: Globe,
    title: "Framework-agnostic",
    description: "Build with React, Next.js, Vue, Nuxt, SvelteKit, and more. Works everywhere.",
  },
  {
    icon: Shield,
    title: "Streaming AI Responses",
    description: "Don't let your users wait for AI responses. Send them instantly with real-time streaming.",
  },
]

export function FeaturesSection() {
  return (
    <section id="features" className="border-y border-border/40 bg-card/30 px-6 py-24">
      <div className="mx-auto max-w-7xl">
        <div className="mb-16 text-center">
          <h2 className="mb-4 text-3xl font-bold tracking-tight md:text-4xl">
            Everything you need to build AI apps
          </h2>
          <p className="mx-auto max-w-2xl text-lg text-muted-foreground">
            From the creators of the most powerful AI platform. Get all the tools you need to build AI-powered products.
          </p>
        </div>

        <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
          {features.map((feature) => (
            <Card key={feature.title} className="border-border/50 bg-background/50 backdrop-blur-sm">
              <CardHeader>
                <div className="mb-2 flex h-10 w-10 items-center justify-center rounded-lg bg-primary/10">
                  <feature.icon className="h-5 w-5 text-primary" />
                </div>
                <CardTitle className="text-lg">{feature.title}</CardTitle>
              </CardHeader>
              <CardContent>
                <CardDescription className="text-muted-foreground">{feature.description}</CardDescription>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>
    </section>
  )
}
