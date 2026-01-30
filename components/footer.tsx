import Link from "next/link"
import { Sparkles } from "lucide-react"

const footerLinks = {
  Product: ["Features", "Pricing", "API", "Documentation"],
  Company: ["About", "Blog", "Careers", "Contact"],
  Resources: ["Community", "Help Center", "Status", "Terms of Service"],
  Legal: ["Privacy Policy", "Terms of Use", "Cookie Policy", "Security"],
}

export function Footer() {
  return (
    <footer className="border-t border-border/40 bg-card/30 px-6 py-16">
      <div className="mx-auto max-w-7xl">
        <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-5">
          <div className="lg:col-span-1">
            <div className="flex items-center gap-2 mb-4">
              <Sparkles className="h-6 w-6" />
              <span className="text-xl font-semibold">NexusAI</span>
            </div>
            <p className="text-sm text-muted-foreground">
              The fastest and most powerful platform for building AI products.
            </p>
          </div>

          {Object.entries(footerLinks).map(([category, links]) => (
            <div key={category}>
              <h3 className="mb-4 text-sm font-semibold">{category}</h3>
              <ul className="space-y-3">
                {links.map((link) => (
                  <li key={link}>
                    <Link
                      href="#"
                      className="text-sm text-muted-foreground transition-colors hover:text-foreground"
                    >
                      {link}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>

        <div className="mt-12 border-t border-border/40 pt-8">
          <p className="text-center text-sm text-muted-foreground">
            &copy; {new Date().getFullYear()} NexusAI. All rights reserved.
          </p>
        </div>
      </div>
    </footer>
  )
}
