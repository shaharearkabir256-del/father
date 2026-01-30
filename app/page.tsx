'use client';

import { useEffect, useState } from 'react';
import Link from 'next/link';
import { ArrowRight, ExternalLink, Menu, X } from 'lucide-react';

export default function Home() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [scrollY, setScrollY] = useState(0);

  useEffect(() => {
    const handleScroll = () => setScrollY(window.scrollY);
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const projects = [
    {
      id: 1,
      title: 'Echo Protocol',
      category: 'Web Design',
      image: 'https://images.unsplash.com/photo-1633356122544-f134ef2e00ae?w=800&h=600&fit=crop',
      description: 'Futuristic SaaS platform with immersive UI',
    },
    {
      id: 2,
      title: 'Void Studios',
      category: 'Branding',
      image: 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=600&fit=crop',
      description: 'Complete brand identity system',
    },
    {
      id: 3,
      title: 'Nexus AI',
      category: 'Development',
      image: 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&h=600&fit=crop',
      description: 'AI-powered analytics dashboard',
    },
    {
      id: 4,
      title: 'Quantum Labs',
      category: 'Full Service',
      image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop',
      description: 'Immersive digital experience',
    },
  ];

  const services = [
    { icon: '🎨', title: 'UI/UX Design', desc: 'Cutting-edge interfaces with glassmorphic elements' },
    { icon: '💻', title: 'Web Development', desc: 'High-performance Next.js applications' },
    { icon: '🎬', title: 'Motion Design', desc: 'Smooth animations and micro-interactions' },
    { icon: '📱', title: 'Mobile Apps', desc: 'Responsive and fluid mobile experiences' },
    { icon: '🎯', title: 'Branding', desc: 'Complete visual identity systems' },
    { icon: '✨', title: 'Creative Strategy', desc: 'Innovative digital solutions' },
  ];

  return (
    <div className="bg-gradient-to-b from-slate-950 via-purple-950 to-slate-950 min-h-screen text-white">
      {/* Navigation */}
      <nav className="fixed w-full top-0 z-50 glass">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
          <div className="text-2xl font-black bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">
            NEXUS
          </div>
          
          {/* Desktop Menu */}
          <div className="hidden md:flex items-center gap-8">
            <a href="#work" className="text-sm font-medium hover:text-purple-400 transition">WORK</a>
            <a href="#services" className="text-sm font-medium hover:text-purple-400 transition">SERVICES</a>
            <a href="#about" className="text-sm font-medium hover:text-purple-400 transition">ABOUT</a>
            <a href="#contact" className="text-sm font-medium hover:text-purple-400 transition">CONTACT</a>
            <button className="px-6 py-2 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full text-sm font-semibold hover:shadow-lg hover:neon-glow transition">
              Get Started
            </button>
          </div>

          {/* Mobile Menu Toggle */}
          <button onClick={() => setMobileMenuOpen(!mobileMenuOpen)} className="md:hidden">
            {mobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>

        {/* Mobile Menu */}
        {mobileMenuOpen && (
          <div className="md:hidden bg-slate-950/95 border-t border-white/10 p-4 space-y-4">
            <a href="#work" className="block text-sm font-medium hover:text-purple-400">WORK</a>
            <a href="#services" className="block text-sm font-medium hover:text-purple-400">SERVICES</a>
            <a href="#about" className="block text-sm font-medium hover:text-purple-400">ABOUT</a>
            <a href="#contact" className="block text-sm font-medium hover:text-purple-400">CONTACT</a>
          </div>
        )}
      </nav>

      {/* Hero Section */}
      <section className="min-h-screen flex items-center justify-center relative pt-20 overflow-hidden">
        {/* Parallax Background */}
        <div className="absolute inset-0 opacity-40">
          <div 
            className="absolute top-20 left-10 w-96 h-96 bg-purple-600 rounded-full blur-3xl"
            style={{ transform: `translateY(${scrollY * 0.5}px)` }}
          />
          <div 
            className="absolute bottom-20 right-10 w-96 h-96 bg-pink-600 rounded-full blur-3xl"
            style={{ transform: `translateY(${scrollY * -0.3}px)` }}
          />
        </div>

        <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
          <h1 className="text-6xl sm:text-7xl lg:text-8xl font-black mb-6 leading-tight">
            <span className="bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
              DIGITAL
            </span>
            <br />
            <span className="text-white">EXCELLENCE</span>
          </h1>
          
          <p className="text-xl text-slate-300 mb-12 max-w-2xl mx-auto">
            We craft immersive digital experiences with cutting-edge design and technology. Your vision, amplified.
          </p>

          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <button className="px-8 py-4 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full font-bold hover:shadow-xl hover:neon-glow transition transform hover:scale-105">
              Start Project <ArrowRight className="inline ml-2" size={20} />
            </button>
            <button className="px-8 py-4 border-2 border-cyan-400 text-cyan-400 rounded-full font-bold hover:bg-cyan-400/10 transition">
              View Work
            </button>
          </div>
        </div>

        {/* Scroll Indicator */}
        <div className="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
          <div className="w-6 h-10 border-2 border-white rounded-full flex items-start justify-center p-2">
            <div className="w-1 h-2 bg-white rounded-full animate-pulse" />
          </div>
        </div>
      </section>

      {/* Work Section */}
      <section id="work" className="py-20 px-4 sm:px-6 lg:px-8 relative">
        <div className="max-w-7xl mx-auto">
          <h2 className="text-5xl font-black mb-16">
            <span className="bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">
              FEATURED WORK
            </span>
          </h2>

          <div className="grid md:grid-cols-2 gap-8">
            {projects.map((project) => (
              <div
                key={project.id}
                className="group cursor-pointer"
              >
                <div className="glass overflow-hidden rounded-2xl transform transition-all duration-500 hover:scale-105 hover:neon-glow">
                  <div className="relative h-64 sm:h-80 overflow-hidden">
                    <img
                      src={project.image}
                      alt={project.title}
                      className="w-full h-full object-cover transform group-hover:scale-110 transition duration-500"
                    />
                    <div className="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300" />
                  </div>
                  <div className="p-6">
                    <span className="text-xs font-semibold text-cyan-400 uppercase">
                      {project.category}
                    </span>
                    <h3 className="text-2xl font-bold mt-2 mb-2">{project.title}</h3>
                    <p className="text-slate-400 mb-4">{project.description}</p>
                    <a href="#" className="inline-flex items-center text-purple-400 hover:text-pink-400 transition">
                      View Project <ExternalLink size={16} className="ml-2" />
                    </a>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Services Section */}
      <section id="services" className="py-20 px-4 sm:px-6 lg:px-8 relative">
        <div className="max-w-7xl mx-auto">
          <h2 className="text-5xl font-black mb-16 text-center">
            <span className="bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">
              SERVICES
            </span>
          </h2>

          <div className="grid md:grid-cols-3 gap-8">
            {services.map((service, i) => (
              <div
                key={i}
                className="glass p-8 rounded-2xl transform transition-all duration-500 hover:scale-105 hover:neon-glow hover:neon-cyan group"
              >
                <div className="text-5xl mb-4 transform group-hover:scale-125 transition duration-300">
                  {service.icon}
                </div>
                <h3 className="text-xl font-bold mb-3">{service.title}</h3>
                <p className="text-slate-400">{service.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* About Section */}
      <section id="about" className="py-20 px-4 sm:px-6 lg:px-8 relative">
        <div className="max-w-5xl mx-auto">
          <div className="glass p-12 rounded-3xl">
            <h2 className="text-4xl font-black mb-8">
              <span className="bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">
                ABOUT NEXUS
              </span>
            </h2>
            <p className="text-lg text-slate-300 mb-6 leading-relaxed">
              We are a collective of designers, developers, and visionaries obsessed with pushing digital boundaries. 
              Our work bridges the gap between imagination and reality through immersive experiences and innovative solutions.
            </p>
            <p className="text-lg text-slate-300 leading-relaxed">
              With over a decade of combined expertise, we've helped brands tell their stories through stunning design, 
              cutting-edge technology, and strategic thinking. Your success is our obsession.
            </p>
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section id="contact" className="py-20 px-4 sm:px-6 lg:px-8 relative">
        <div className="max-w-3xl mx-auto">
          <h2 className="text-4xl font-black mb-12 text-center">
            <span className="bg-gradient-to-r from-pink-400 to-cyan-400 bg-clip-text text-transparent">
              LET'S CREATE TOGETHER
            </span>
          </h2>

          <form className="glass p-12 rounded-3xl space-y-6">
            <div className="grid md:grid-cols-2 gap-6">
              <input
                type="text"
                placeholder="Your Name"
                className="bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-purple-400 transition"
              />
              <input
                type="email"
                placeholder="Your Email"
                className="bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-purple-400 transition"
              />
            </div>

            <input
              type="text"
              placeholder="Project Title"
              className="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-purple-400 transition"
            />

            <textarea
              placeholder="Tell us about your project..."
              rows={5}
              className="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-purple-400 transition resize-none"
            />

            <button
              type="submit"
              className="w-full py-3 bg-gradient-to-r from-purple-500 via-pink-500 to-cyan-500 rounded-lg font-bold hover:shadow-xl hover:neon-glow transition transform hover:scale-105"
            >
              Send Message
            </button>
          </form>
        </div>
      </section>

      {/* Footer */}
      <footer className="border-t border-white/10 py-12 px-4 sm:px-6 lg:px-8">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8">
          <div className="text-2xl font-black bg-gradient-to-r from-purple-400 to-cyan-400 bg-clip-text text-transparent">
            NEXUS
          </div>
          <p className="text-slate-400 text-sm">© 2024 Nexus Studio. All rights reserved.</p>
          <div className="flex gap-6">
            <a href="#" className="text-slate-400 hover:text-purple-400 transition">Twitter</a>
            <a href="#" className="text-slate-400 hover:text-purple-400 transition">LinkedIn</a>
            <a href="#" className="text-slate-400 hover:text-purple-400 transition">Instagram</a>
          </div>
        </div>
      </footer>
    </div>
  );
}
