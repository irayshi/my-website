/**
 * Queue board data — live service board view on the antrian page.
 * Replace with API calls when the backend exposes `/api/queue`.
 */

export const queueBoard = {
  developers: [
    {
      name: "Irayshi",
      role: "Lead Fullstack Developer",
      current: { type: "queue", queueNumber: 1, projectName: "Website Company Profile" },
    },
    {
      name: "Reza Kurniawan",
      role: "Backend Developer",
      current: { type: "internal", projectName: "Internal: Refactor Design System" },
    },
  ],
  active: [
    {
      queueNumber: 1,
      clientName: "Budi Santoso",
      projectName: "Website Company Profile",
      status: "Diproses",
      statusTone: "blue",
      estimate: "5 hari lagi",
    },
    {
      queueNumber: 2,
      clientName: "Sarah Wijaya",
      projectName: "Redesign Aplikasi Mobile",
      status: "Menunggu",
      statusTone: "amber",
      estimate: "Estimasi mulai minggu depan",
    },
    {
      queueNumber: 3,
      clientName: "PT Maju Digital",
      projectName: "Platform E-commerce",
      status: "Menunggu",
      statusTone: "amber",
      estimate: "Menunggu slot developer",
    },
  ],
  completed: [
    {
      clientName: "CV Sukses Mandiri",
      projectName: "Landing Page Campaign",
      completedAt: "10 Agustus 2026",
      rating: 5,
    },
    {
      clientName: "Ruang Kopi Senja",
      projectName: "Website Menu & Reservasi",
      completedAt: "3 Agustus 2026",
      rating: 5,
    },
  ],
};

export const statusToneClasses = {
  blue: "bg-blue-500/10 text-blue-400",
  amber: "bg-amber-500/10 text-amber-400",
  green: "bg-green-500/10 text-green-400",
};