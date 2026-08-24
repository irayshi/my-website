/**
 * Admin dashboard data — currently mock data, swap with API calls later.
 */

export const tabs = [
  { id: "stats", label: "Statistik", icon: "trending-up" },
  { id: "orders", label: "Antrian", icon: "list-ordered" },
  { id: "employees", label: "Karyawan", icon: "users" },
  { id: "products", label: "Produk", icon: "package" },
  { id: "services", label: "Jasa", icon: "wrench" },
  { id: "portfolio", label: "Portofolio", icon: "layout-grid" },
];

export const summaryStats = [
  { label: "Total Kunjungan", value: "106", icon: "eye" },
  { label: "Kunjungan Hari Ini", value: "8", icon: "calendar" },
  { label: "Klik Kontak", value: "3", icon: "mouse-pointer-click" },
  { label: "Rasio Konversi", value: "2.8%", icon: "trending-up" },
];

export const weeklyVisits = [
  { label: "12/08", value: 0 },
  { label: "13/08", value: 0 },
  { label: "14/08", value: 0 },
  { label: "15/08", value: 57 },
  { label: "16/08", value: 37 },
  { label: "17/08", value: 4 },
  { label: "18/08", value: 8 },
];

export const hourlyTraffic = [
  { label: "00", value: 0 },
  { label: "04", value: 8 },
  { label: "08", value: 0 },
  { label: "12", value: 0 },
  { label: "16", value: 0 },
  { label: "20", value: 0 },
];

export const topPages = [
  { path: "/", views: 71 },
  { path: "/antrian", views: 25 },
  { path: "/produk/2f79ee5a-d272-44ef-bc06-4882c8692410", views: 8 },
  { path: "/produk/does-not-exist", views: 2 },
];

export const topReferrers = [
  { source: "direct / bookmark", count: 67 },
  { source: "instagram.com", count: 38 },
  { source: "google.com", count: 1 },
];

export const orders = [
  { name: "Rafi Ahmad", service: "Fullstack Web App", status: "Discovery", budget: "Rp 12.000.000" },
  { name: "Nadia Putri", service: "UI/UX Design", status: "Proposal", budget: "Rp 5.500.000" },
  { name: "Bima Studio", service: "Code Audit", status: "Menunggu DP", budget: "Rp 3.000.000" },
];

export const employees = [
  { name: "Irayshi", role: "Owner / Fullstack", status: "Aktif" },
  { name: "Alya", role: "UI Designer", status: "Freelance" },
  { name: "Dimas", role: "Backend Engineer", status: "Freelance" },
];

export const products = [
  { title: "SaaS Dashboard Starter Kit", category: "Template", price: "Rp 450.000", stock: "Aktif" },
  { title: "Minimalist Portfolio UI Kit", category: "UI Kit", price: "Rp 250.000", stock: "Aktif" },
  { title: "React Architecture Masterclass", category: "E-Book", price: "Rp 180.000", stock: "Draft" },
];

export const services = [
  { title: "Fullstack Web App Development", price: "Mulai Rp 8.000.000", requests: 12 },
  { title: "UI/UX Design & Prototyping", price: "Mulai Rp 4.500.000", requests: 8 },
  { title: "Code Audit & Performance Tuning", price: "Mulai Rp 3.000.000", requests: 5 },
];

export const portfolio = [
  { title: "Nusantara Commerce Platform", category: "Fullstack", year: "2025" },
  { title: "Lumina Finance Mobile App", category: "Mobile", year: "2025" },
  { title: "Orbit Design System", category: "UI/UX", year: "2024" },
  { title: "Pulse Analytics Dashboard", category: "Fullstack", year: "2024" },
];

export const columnLabels = {
  name: "Nama",
  service: "Layanan",
  status: "Status",
  budget: "Budget",
  role: "Peran",
  title: "Judul",
  category: "Kategori",
  price: "Harga",
  stock: "Status",
  requests: "Permintaan",
  year: "Tahun",
};