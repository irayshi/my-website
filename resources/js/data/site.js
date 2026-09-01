/**
 * Site data — single source of truth for homepage/queue content.
 * These arrays are still hard-coded for now; replace with API calls
 * (e.g. `fetch('/api/...')`) when the backend is wired up.
 */

export const marqueeItems = [
  "FULLSTACK DEVELOPMENT",
  "PRODUK DIGITAL",
  "UI/UX DESIGN",
  "ARSITEKTUR SISTEM",
  "PENGIRIMAN CEPAT",
  "DARI INDONESIA",
];

export const skills = ["React", "FastAPI", "MongoDB", "Node.js", "TypeScript", "Tailwind CSS", "UI/UX Design", "Figma"];

export const aboutStats = [
  ["5+", "Tahun Pengalaman"],
  ["45+", "Proyek Selesai"],
  ["30+", "Klien Bahagia"],
];

export const services = [
  {
    icon: "layers",
    title: "Fullstack Web App Development",
    description: "Bangun aplikasi web end-to-end yang cepat, aman, dan skalabel dengan React, FastAPI, dan MongoDB.",
    details: ["Arsitektur & database", "Frontend kinetik responsif", "REST API teruji", "Deploy & handover"],
    price: "Mulai Rp 8.000.000",
  },
  {
    icon: "palette",
    title: "UI/UX Design & Prototyping",
    description: "Desain antarmuka berjiwa dengan riset, wireframe, design system, dan prototype interaktif high-fidelity.",
    details: ["Riset & wireframe", "Design system", "Prototype interaktif", "Handoff developer"],
    price: "Mulai Rp 4.500.000",
  },
  {
    icon: "gauge",
    title: "Code Audit & Performance Tuning",
    description: "Audit codebase, optimasi performa, dan perbaikan best-practice agar produk kamu ngebut & maintainable.",
    details: ["Audit menyeluruh", "Optimasi Core Web Vitals", "Refactor terarah", "Laporan & rekomendasi"],
    price: "Mulai Rp 3.000.000",
  },
];

export const products = [
  {
    category: "Template",
    title: "SaaS Dashboard Starter Kit (React)",
    description: "Boilerplate dashboard produksi-siap dengan auth, chart, dan komponen modular untuk mempercepat MVP kamu.",
    image:
      "https://images.unsplash.com/photo-1658953229625-aad99d7603b4?crop=entropy&cs=srgb&fm=jpg&q=85&w=1200",
    features: ["Auth JWT siap pakai", "20+ komponen UI", "Dark mode & responsif"],
    price: "Rp 450.000",
  },
  {
    category: "UI Kit",
    title: "Minimalist Portfolio Figma UI Kit",
    description: "Design system Figma lengkap dengan grid, tipografi, dan komponen kinetik untuk portofolio kelas dunia.",
    image:
      "https://images.unsplash.com/photo-1720962158883-b0f2021fb51e?crop=entropy&cs=srgb&fm=jpg&q=85&w=1200",
    features: ["Auto-layout & variants", "120+ komponen", "Style guide crimson"],
    price: "Rp 250.000",
  },
  {
    category: "E-Book",
    title: "E-Book: React Architecture Masterclass",
    description: "Panduan mendalam menyusun arsitektur React skala besar: state, folder structure, performa, dan testing.",
    image:
      "https://images.unsplash.com/photo-1720135885007-454165745e21?crop=entropy&cs=srgb&fm=jpg&q=85&w=1200",
    features: ["180+ halaman", "Studi kasus nyata", "Pola scalable"],
    price: "Rp 180.000",
  },
];

export const portfolio = [
  {
    category: "Fullstack",
    year: "2025",
    title: "Nusantara Commerce Platform",
    image: "https://images.unsplash.com/photo-1656231267330-f605c1c16a57?crop=entropy&cs=srgb&fm=jpg&q=85&w=1400",
    wide: true,
  },
  {
    category: "Mobile",
    year: "2025",
    title: "Lumina Finance Mobile App",
    image: "https://images.unsplash.com/photo-1706700392642-dee59f678a09?crop=entropy&cs=srgb&fm=jpg&q=85&w=1400",
  },
  {
    category: "UI/UX",
    year: "2024",
    title: "Orbit Design System",
    image: "https://images.unsplash.com/photo-1720962158883-b0f2021fb51e?crop=entropy&cs=srgb&fm=jpg&q=85&w=1400",
  },
  {
    category: "Fullstack",
    year: "2024",
    title: "Pulse Analytics Dashboard",
    image: "https://images.unsplash.com/photo-1720962158883-b0f2021fb51e?crop=entropy&cs=srgb&fm=jpg&q=85&w=1400",
  },
];

export const impactStats = [
  { value: 45, suffix: "+", label: "Proyek Selesai" },
  { value: 99, suffix: "%", label: "Klien Puas" },
  { value: 12, suffix: "+", label: "Produk Digital" },
  { value: 24, prefix: "<", suffix: " Jam", label: "Respon Chat" },
];

export const whatsappLink = "https://wa.me/6280000000000";
