const adminState = {
  activeTab: "stats",
  charts: [],
};

const tabs = [
  { id: "stats", label: "Statistik", icon: "trending-up" },
  { id: "orders", label: "Antrian", icon: "list-ordered" },
  { id: "employees", label: "Karyawan", icon: "users" },
  { id: "products", label: "Produk", icon: "package" },
  { id: "services", label: "Jasa", icon: "wrench" },
  { id: "portfolio", label: "Portofolio", icon: "layout-grid" },
];

const summaryStats = [
  { label: "Total Kunjungan", value: "106", icon: "eye" },
  { label: "Kunjungan Hari Ini", value: "8", icon: "calendar" },
  { label: "Klik Kontak", value: "3", icon: "mouse-pointer-click" },
  { label: "Rasio Konversi", value: "2.8%", icon: "trending-up" },
];

const weeklyVisits = [
  { label: "12/08", value: 0 },
  { label: "13/08", value: 0 },
  { label: "14/08", value: 0 },
  { label: "15/08", value: 57 },
  { label: "16/08", value: 37 },
  { label: "17/08", value: 4 },
  { label: "18/08", value: 8 },
];

const hourlyTraffic = [
  { label: "00", value: 0 },
  { label: "04", value: 8 },
  { label: "08", value: 0 },
  { label: "12", value: 0 },
  { label: "16", value: 0 },
  { label: "20", value: 0 },
];

const topPages = [
  { path: "/", views: 71 },
  { path: "/antrian", views: 25 },
  { path: "/produk/2f79ee5a-d272-44ef-bc06-4882c8692410", views: 8 },
  { path: "/produk/does-not-exist", views: 2 },
];

const topReferrers = [
  { source: "direct / bookmark", count: 67 },
  { source: "instagram.com", count: 38 },
  { source: "google.com", count: 1 },
];

const orders = [
  { name: "Rafi Ahmad", service: "Fullstack Web App", status: "Discovery", budget: "Rp 12.000.000" },
  { name: "Nadia Putri", service: "UI/UX Design", status: "Proposal", budget: "Rp 5.500.000" },
  { name: "Bima Studio", service: "Code Audit", status: "Menunggu DP", budget: "Rp 3.000.000" },
];

const employees = [
  { name: "Irayshi", role: "Owner / Fullstack", status: "Aktif" },
  { name: "Alya", role: "UI Designer", status: "Freelance" },
  { name: "Dimas", role: "Backend Engineer", status: "Freelance" },
];

const products = [
  { title: "SaaS Dashboard Starter Kit", category: "Template", price: "Rp 450.000", stock: "Aktif" },
  { title: "Minimalist Portfolio UI Kit", category: "UI Kit", price: "Rp 250.000", stock: "Aktif" },
  { title: "React Architecture Masterclass", category: "E-Book", price: "Rp 180.000", stock: "Draft" },
];

const services = [
  { title: "Fullstack Web App Development", price: "Mulai Rp 8.000.000", requests: 12 },
  { title: "UI/UX Design & Prototyping", price: "Mulai Rp 4.500.000", requests: 8 },
  { title: "Code Audit & Performance Tuning", price: "Mulai Rp 3.000.000", requests: 5 },
];

const portfolio = [
  { title: "Nusantara Commerce Platform", category: "Fullstack", year: "2025" },
  { title: "Lumina Finance Mobile App", category: "Mobile", year: "2025" },
  { title: "Orbit Design System", category: "UI/UX", year: "2024" },
  { title: "Pulse Analytics Dashboard", category: "Fullstack", year: "2024" },
];

function createIcon(name, className = "h-4 w-4") {
  return `<i data-lucide="${name}" class="${className}"></i>`;
}

function renderTabs() {
  const tabContainer = document.querySelector("#admin-tabs");
  tabContainer.innerHTML = tabs
    .map((tab) => {
      const isActive = tab.id === adminState.activeTab;
      return `
        <button
          class="admin-tab ${isActive ? "active" : ""}"
          type="button"
          data-tab="${tab.id}"
          aria-selected="${isActive}"
        >
          ${createIcon(tab.icon)}
          ${tab.label}
        </button>
      `;
    })
    .join("");

  tabContainer.querySelectorAll("button").forEach((button) => {
    button.addEventListener("click", () => {
      adminState.activeTab = button.dataset.tab;
      renderDashboard();
    });
  });
}

function renderDashboard() {
  clearCharts();
  renderTabs();

  const content = document.querySelector("#admin-content");
  const renderers = {
    stats: renderStats,
    orders: () => renderTablePage("Antrian Layanan", "Daftar calon klien dan tahap proyek yang sedang berjalan.", orders),
    employees: () => renderTablePage("Karyawan", "Tim internal dan kolaborator yang membantu operasional.", employees),
    products: () => renderTablePage("Produk Digital", "Produk yang tampil di halaman toko dan status publish-nya.", products),
    services: () => renderTablePage("Jasa", "Paket layanan yang tersedia dan jumlah permintaan masuk.", services),
    portfolio: () => renderTablePage("Portofolio", "Karya yang ditampilkan di halaman utama.", portfolio),
  };

  content.innerHTML = renderers[adminState.activeTab]();
  refreshUi();

  if (adminState.activeTab === "stats") {
    renderCharts();
  }
}

function renderStats() {
  return `
    <div class="space-y-6">
      <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
        ${summaryStats
          .map(
            (stat) => `
              <article class="surface-card rounded-2xl p-6">
                <div class="flex items-center justify-between gap-3">
                  <span class="text-sm text-zinc-400">${stat.label}</span>
                  <span class="text-crimson">${createIcon(stat.icon, "h-5 w-5")}</span>
                </div>
                <div class="font-display mt-3 text-3xl font-extrabold">${stat.value}</div>
              </article>
            `,
          )
          .join("")}
      </div>

      <div class="grid gap-6 lg:grid-cols-2">
        ${renderChartCard("Kunjungan 7 Hari Terakhir", "weekly-visits-chart")}
        ${renderChartCard("Trafik per Jam (Hari Ini)", "hourly-traffic-chart")}
      </div>

      <div class="grid gap-6 lg:grid-cols-2">
        ${renderListCard("Halaman Populer", topPages, "path", "views")}
        ${renderListCard("Sumber Trafik", topReferrers, "source", "count")}
      </div>
    </div>
  `;
}

function renderChartCard(title, canvasId) {
  return `
    <article class="surface-card rounded-2xl p-6">
      <h2 class="mb-4 font-semibold">${title}</h2>
      <div class="h-[220px] min-w-0">
        <canvas id="${canvasId}" aria-label="${title}"></canvas>
      </div>
    </article>
  `;
}

function renderListCard(title, items, labelKey, valueKey) {
  return `
    <article class="surface-card rounded-2xl p-6">
      <h2 class="mb-4 font-semibold">${title}</h2>
      <div class="space-y-3">
        ${items
          .map(
            (item) => `
              <div class="flex items-center justify-between gap-4 text-sm">
                <span class="min-w-0 truncate font-mono text-zinc-300">${item[labelKey]}</span>
                <span class="shrink-0 text-zinc-400">${item[valueKey]}</span>
              </div>
            `,
          )
          .join("")}
      </div>
    </article>
  `;
}

function renderTablePage(title, description, rows) {
  const keys = Object.keys(rows[0] ?? {});

  return `
    <div class="space-y-6">
      <div class="surface-card rounded-2xl p-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
          <div>
            <h2 class="font-display text-2xl font-extrabold">${title}</h2>
            <p class="mt-1 text-sm text-zinc-400">${description}</p>
          </div>
          <button class="crimson-pill inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold" type="button">
            ${createIcon("plus")}
            Tambah
          </button>
        </div>
      </div>

      <div class="surface-card overflow-hidden rounded-2xl">
        <div class="overflow-x-auto">
          <table class="w-full min-w-[680px] text-left text-sm">
            <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-widest text-zinc-500">
              <tr>
                ${keys.map((key) => `<th class="px-5 py-4 font-semibold">${formatKey(key)}</th>`).join("")}
                <th class="px-5 py-4 text-right font-semibold">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-white/10">
              ${rows
                .map(
                  (row) => `
                    <tr class="transition hover:bg-white/5">
                      ${keys.map((key) => `<td class="px-5 py-4 text-zinc-300">${row[key]}</td>`).join("")}
                      <td class="px-5 py-4">
                        <div class="flex justify-end gap-2">
                          <button class="admin-icon-button" type="button" aria-label="Edit">${createIcon("pencil")}</button>
                          <button class="admin-icon-button hover:border-red-400 hover:text-red-400" type="button" aria-label="Hapus">${createIcon("trash-2")}</button>
                        </div>
                      </td>
                    </tr>
                  `,
                )
                .join("")}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  `;
}

function formatKey(key) {
  const labels = {
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

  return labels[key] ?? key;
}

function renderCharts() {
  const sharedOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: { display: false },
      tooltip: {
        backgroundColor: "#1a1a20",
        borderColor: "rgba(255,255,255,0.12)",
        borderWidth: 1,
        cornerRadius: 12,
        titleColor: "#fff",
        bodyColor: "#d4d4d8",
      },
    },
    scales: {
      x: {
        ticks: { color: "#666670", font: { size: 11 } },
        grid: { color: "rgba(255,255,255,0.06)", borderColor: "#666670" },
      },
      y: {
        beginAtZero: true,
        ticks: { color: "#666670", font: { size: 11 } },
        grid: { color: "rgba(255,255,255,0.06)", borderColor: "#666670" },
      },
    },
  };

  const weeklyCanvas = document.querySelector("#weekly-visits-chart");
  const hourlyCanvas = document.querySelector("#hourly-traffic-chart");

  if (weeklyCanvas) {
    const gradient = weeklyCanvas.getContext("2d").createLinearGradient(0, 0, 0, 220);
    gradient.addColorStop(0, "rgba(220,20,60,0.55)");
    gradient.addColorStop(1, "rgba(220,20,60,0)");

    adminState.charts.push(
      new Chart(weeklyCanvas, {
        type: "line",
        data: {
          labels: weeklyVisits.map((item) => item.label),
          datasets: [
            {
              data: weeklyVisits.map((item) => item.value),
              borderColor: "#dc143c",
              backgroundColor: gradient,
              borderWidth: 2,
              fill: true,
              tension: 0.45,
              pointRadius: 0,
            },
          ],
        },
        options: sharedOptions,
      }),
    );
  }

  if (hourlyCanvas) {
    adminState.charts.push(
      new Chart(hourlyCanvas, {
        type: "bar",
        data: {
          labels: hourlyTraffic.map((item) => item.label),
          datasets: [
            {
              data: hourlyTraffic.map((item) => item.value),
              backgroundColor: "#dc143c",
              borderRadius: 6,
              maxBarThickness: 18,
            },
          ],
        },
        options: sharedOptions,
      }),
    );
  }
}

function clearCharts() {
  adminState.charts.forEach((chart) => chart.destroy());
  adminState.charts = [];
}

function setupLogout() {
  document.querySelector("#logout-button").addEventListener("click", () => {
    alert("Demo statis: tombol keluar belum terhubung ke sistem login.");
  });
}

function refreshUi() {
  if (window.lucide) lucide.createIcons();
}

function init() {
  renderDashboard();
  setupLogout();
}

document.addEventListener("DOMContentLoaded", init);
