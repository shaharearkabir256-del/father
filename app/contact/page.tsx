'use client';

import { useState } from 'react';
import SiteHeader from '@/components/site-header';
import SiteFooter from '@/components/site-footer';
import { Button } from '@/components/ui/button';
import { Mail, Phone, MapPin, Clock, AlertCircle, CheckCircle } from 'lucide-react';

export default function ContactPage() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
  });
  const [submitted, setSubmitted] = useState(false);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>) => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    try {
      const response = await fetch('/api/contact', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
      });

      if (response.ok) {
        setSubmitted(true);
        setFormData({ name: '', email: '', phone: '', subject: '', message: '' });
        setTimeout(() => setSubmitted(false), 5000);
      } else {
        setError('বার্তা পাঠাতে ব্যর্থ হয়েছে, আবার চেষ্টা করুন');
      }
    } catch (err) {
      setError('একটি ত্রুটি ঘটেছে, আবার চেষ্টা করুন');
    } finally {
      setLoading(false);
    }
  };

  return (
    <>
      <SiteHeader />
      <main className="bg-white">
        {/* Hero */}
        <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16 md:py-24">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">আমাদের সাথে যোগাযোগ করুন</h1>
            <p className="text-lg md:text-xl text-blue-100">
              আমরা আপনার প্রতিটি প্রশ্ন এবং পরামর্শ শুনতে আগ্রহী
            </p>
          </div>
        </section>

        <div className="container mx-auto px-4 py-16 md:py-24">
          <div className="grid md:grid-cols-3 gap-8 mb-16">
            {/* Contact Info */}
            {[
              {
                icon: Phone,
                title: 'ফোন',
                content: '+880 1700-000000',
                desc: 'সোমবার - শুক্রবার, ৯:০০ AM - ৬:০০ PM'
              },
              {
                icon: Mail,
                title: 'ইমেইল',
                content: 'support@dib.com',
                desc: 'আমরা ২৪ ঘন্টায় উত্তর দিই'
              },
              {
                icon: MapPin,
                title: 'ঠিকানা',
                content: 'ঢাকা, বাংলাদেশ',
                desc: 'সোবহান সিটি, ৭ম তলা, গাউছিয়া এভিনিউ'
              }
            ].map((info, i) => (
              <div key={i} className="bg-slate-50 rounded-lg p-8 text-center">
                <info.icon className="h-12 w-12 text-blue-600 mx-auto mb-4" />
                <h3 className="text-xl font-bold text-slate-900 mb-2">{info.title}</h3>
                <p className="text-lg font-semibold text-slate-900 mb-2">{info.content}</p>
                <p className="text-slate-600 text-sm">{info.desc}</p>
              </div>
            ))}
          </div>

          <div className="grid md:grid-cols-2 gap-12">
            {/* Contact Form */}
            <div>
              <h2 className="text-2xl font-bold text-slate-900 mb-6">আমাদের কাছে বার্তা পাঠান</h2>
              
              {submitted && (
                <div className="bg-green-50 border border-green-200 rounded-lg p-4 mb-6 flex gap-3">
                  <CheckCircle className="h-5 w-5 text-green-600 flex-shrink-0 mt-0.5" />
                  <div>
                    <p className="text-green-800 font-semibold">বার্তা পাঠানো হয়েছে!</p>
                    <p className="text-green-700 text-sm">আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।</p>
                  </div>
                </div>
              )}

              {error && (
                <div className="bg-red-50 border border-red-200 rounded-lg p-4 mb-6 flex gap-3">
                  <AlertCircle className="h-5 w-5 text-red-600 flex-shrink-0 mt-0.5" />
                  <p className="text-red-800 text-sm">{error}</p>
                </div>
              )}

              <form onSubmit={handleSubmit} className="space-y-4">
                <div>
                  <label className="block text-sm font-semibold text-slate-700 mb-2">
                    নাম
                  </label>
                  <input
                    type="text"
                    name="name"
                    value={formData.name}
                    onChange={handleChange}
                    className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                  />
                </div>

                <div className="grid sm:grid-cols-2 gap-4">
                  <div>
                    <label className="block text-sm font-semibold text-slate-700 mb-2">
                      ইমেইল
                    </label>
                    <input
                      type="email"
                      name="email"
                      value={formData.email}
                      onChange={handleChange}
                      className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required
                    />
                  </div>
                  <div>
                    <label className="block text-sm font-semibold text-slate-700 mb-2">
                      ফোন
                    </label>
                    <input
                      type="tel"
                      name="phone"
                      value={formData.phone}
                      onChange={handleChange}
                      className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                  </div>
                </div>

                <div>
                  <label className="block text-sm font-semibold text-slate-700 mb-2">
                    বিষয়
                  </label>
                  <select
                    name="subject"
                    value={formData.subject}
                    onChange={handleChange}
                    className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                  >
                    <option value="">একটি বিষয় নির্বাচন করুন</option>
                    <option value="membership">সদস্যপদ সম্পর্কিত</option>
                    <option value="product">পণ্য সম্পর্কিত</option>
                    <option value="payment">পেমেন্ট সম্পর্কিত</option>
                    <option value="withdrawal">উইথড্রয়াল সম্পর্কিত</option>
                    <option value="other">অন্যান্য</option>
                  </select>
                </div>

                <div>
                  <label className="block text-sm font-semibold text-slate-700 mb-2">
                    বার্তা
                  </label>
                  <textarea
                    name="message"
                    value={formData.message}
                    onChange={handleChange}
                    className="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 h-32 resize-none"
                    required
                  ></textarea>
                </div>

                <Button
                  type="submit"
                  size="lg"
                  className="w-full"
                  disabled={loading}
                >
                  {loading ? 'পাঠাচ্ছে...' : 'বার্তা পাঠান'}
                </Button>
              </form>
            </div>

            {/* Business Hours */}
            <div>
              <h2 className="text-2xl font-bold text-slate-900 mb-6">ব্যবসায়িক সময়</h2>
              
              <div className="space-y-6">
                <div className="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6">
                  <div className="flex items-start gap-4">
                    <Clock className="h-6 w-6 text-blue-600 flex-shrink-0 mt-1" />
                    <div>
                      <h3 className="font-bold text-slate-900 mb-3">সপ্তাহের দিনগুলি</h3>
                      <p className="text-slate-700 mb-1"><strong>সোমবার - শুক্রবার:</strong> ৯:০০ AM - ৬:০০ PM</p>
                      <p className="text-slate-700"><strong>সপ্তাহান্তে:</strong> ১০:০০ AM - ৪:০০ PM</p>
                    </div>
                  </div>
                </div>

                <div className="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-6">
                  <h3 className="font-bold text-slate-900 mb-4">সাথে যোগাযোগ করুন</h3>
                  <div className="space-y-3">
                    <a href="https://www.facebook.com/dailyincomebazar" className="flex items-center gap-2 text-blue-600 hover:text-blue-700">
                      <span>📱 Facebook</span>
                    </a>
                    <a href="https://www.whatsapp.com" className="flex items-center gap-2 text-green-600 hover:text-green-700">
                      <span>💬 WhatsApp</span>
                    </a>
                    <a href="mailto:support@dib.com" className="flex items-center gap-2 text-red-600 hover:text-red-700">
                      <span>✉️ ইমেইল</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <SiteFooter />
    </>
  );
}
