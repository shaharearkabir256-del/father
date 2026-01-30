import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { Check } from "lucide-react"

const models = [
  {
    name: "NexusAI Pro",
    description: "Smartest model for complex tasks",
    features: ["Text and vision", "1M context length", "Advanced reasoning", "Code generation"],
  },
  {
    name: "NexusAI Standard",
    description: "Affordable model balancing speed and intelligence",
    features: ["Text and vision", "128K context length", "Fast responses", "General purpose"],
  },
  {
    name: "NexusAI Lite",
    description: "Fastest, most cost-effective model for low-latency tasks",
    features: ["Text and vision", "32K context length", "Ultra-fast", "Real-time apps"],
  },
]

export function ModelsSection() {
  return (
    <section id="models" className="px-6 py-24">
      <div className="mx-auto max-w-7xl">
        <div className="mb-16 text-center">
          <h2 className="mb-4 text-3xl font-bold tracking-tight md:text-4xl">Flagship Models</h2>
          <p className="text-lg text-muted-foreground">Our AI models</p>
          <p className="mx-auto mt-4 max-w-2xl text-muted-foreground">
            Powerful general purpose models for a variety of real-world tasks with a refreshed knowledge cutoff.
          </p>
        </div>

        <div className="grid gap-6 md:grid-cols-3">
          {models.map((model) => (
            <Card key={model.name} className="border-border/50 bg-card/50 backdrop-blur-sm">
              <CardHeader>
                <CardTitle className="text-xl">{model.name}</CardTitle>
                <CardDescription className="text-muted-foreground">{model.description}</CardDescription>
              </CardHeader>
              <CardContent>
                <ul className="space-y-3">
                  {model.features.map((feature) => (
                    <li key={feature} className="flex items-center gap-2 text-sm">
                      <Check className="h-4 w-4 text-primary" />
                      <span className="text-muted-foreground">{feature}</span>
                    </li>
                  ))}
                </ul>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>
    </section>
  )
}
