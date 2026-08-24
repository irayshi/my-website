/**
 * Admin dashboard entry point.
 * Renders a tabbed UI with mock stats & table pages, using Chart.js for graphs.
 */

import {
  tabs,
  summaryStats,
  weeklyVisits,
  hourlyTraffic,
  topPages,
  topReferrers,
  orders,
  employees,
  products,
  services,
  portfolio,
  columnLabels,
} from "../data/admin.js";
import { icon, refreshIcons } from "../lib/icons.js";
import { setHtml } from "../lib/dom.js";

const state = {
  activeTab: "stats",
  charts: [],
};

/* ---------- Tab bar ---------- */

function renderTabs() {
  const container = document.querySelector("#admin-tabs");
  if (!container) return;

  container.innerHTML = tabs
    .map((tab) => {
      const active = tab.id === state.activeTab;
      return `
        <button
          class="admin-tab ${active ? "active" : ""}"
          type="button"
          data-tab="${tab.id}"
          aria-selected="${active}"
        >
          ${icon(tab.icon)}
          ${tab.label}
        </button>
      `;
    })
    .join("");

  container.querySelectorAll("button").forEach((button) => {
    button.addEventListener("click", () => {
      state.activeTab = button.dataset.tab;
      renderDashboard();
    });
  });
}

/* ---------- Page renderers ---------- */

function chartCard(title, canvasId) {
  return `
    <article class="surface-card rounded-2xl p-6">
      <h2 class="mb-4 font-semibold">${title}</h2>
      <div class="h-55 min-w-0">
        <canvas id="${canvasId}" aria-label="${title}"></canvas>
      </div>
    </article>
  `;
}

function listCard(title, items, labelKey, valueKey) {
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
                  <span class="text-crimson">${icon(stat.icon, "h-5 w-5")}</span>
                </div>
                <div class="font-display mt-3 text-3xl font-extrabold">${stat.value}</div>
              </article>
            `,
          )
          .join("")}
      </div>

      <div class="grid gap-6 lg:grid-cols-2">
        ${chartCard("Kunjungan 7 Hari Terakhir", "weekly-visits-chart")}
        ${chartCard("Trafik per Jam (Hari Ini)", "hourly-traffic-chart")}
      </div>

      <div class="grid gap-6 lg:grid-cols-2">
        ${listCard("Halaman Populer", topPages, "path", "views")}
        ${listCard("Sumber Trafik", topReferrers, "source", "count")}
      </div>
    </div>
  `;
}

function renderTablePage(title, description, rows) {
  if (!rows.length) {
    return `<div class="surface-card rounded-2xl p-6 text-center text-zinc-400">Belum ada data ${title.toLowerCase()}.</div>`;
  }

  const keys = Object.keys(rows[0]);

  return `
    <div class="space-y-6">
      <div class="surface-card rounded-2xl p-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
          <div>
            <h2 class="font-display text-2xl font-extrabold">${title}</h2>
            <p class="mt-1 text-sm text-zinc-400">${description}</p>
          </div>
          <button class="crimson-pill inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold" type="button">
            ${icon("plus")}
            Tambah
          </button>
        </div>
      </div>

      <div class="surface-card overflow-hidden rounded-2xl">
        <div class="overflow-x-auto">
          <table class="w-full min-w-170 text-left text-sm">
            <thead class="border-b border-white/10 bg-white/5 text-xs uppercase tracking-widest text-zinc-500">
              <tr>
                ${keys.map((key) => `<th class="px-5 py-4 font-semibold">${columnLabels[key] ?? key}</th>`).join("")}
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
                          <button class="admin-icon-button" type="button" aria-label="Edit">${icon("pencil")}</button>
                          <button class="admin-icon-button hover:border-red-400 hover:text-red-400" type="button" aria-label="Hapus">${icon("trash-2")}</button>
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

const PAGES = {
  stats: renderStats,
  orders: () => renderTablePage("Antrian Layanan", "Daftar calon klien dan tahap proyek yang sedang berjalan.", orders),
  employees: () => renderTablePage("Karyawan", "Tim internal dan kolaborator yang membantu operasional.", employees),
  products: () => renderTablePage("Produk Digital", "Produk yang tampil di halaman toko dan status publish-nya.", products),
  services: () => renderTablePage("Jasa", "Paket layanan yang tersedia dan jumlah permintaan masuk.", services),
  portfolio: () => renderTablePage("Portofolio", "Karya yang ditampilkan di halaman utama.", portfolio),
};

/* ---------- Charts ---------- */

const sharedChartOptions = {
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

function renderCharts() {
  const weeklyCanvas = document.querySelector("#weekly-visits-chart");
  if (weeklyCanvas && window.Chart) {
    const ctx = weeklyCanvas.getContext("2d");
    const gradient = ctx.createLinearGradient(0, 0, 0, 220);
    gradient.addColorStop(0, "rgba(220,20,60,0.55)");
    gradient.addColorStop(1, "rgba(220,20,60,0)");

    state.charts.push(
      new window.Chart(weeklyCanvas, {
        type: "line",
        data: {
          labels: weeklyVisits.map((v) => v.label),
          datasets: [
            {
              data: weeklyVisits.map((v) => v.value),
              borderColor: "#dc143c",
              backgroundColor: gradient,
              borderWidth: 2,
              fill: true,
              tension: 0.45,
              pointRadius: 0,
            },
          ],
        },
        options: sharedChartOptions,
      }),
    );
  }

  const hourlyCanvas = document.querySelector("#hourly-traffic-chart");
  if (hourlyCanvas && window.Chart) {
    state.charts.push(
      new window.Chart(hourlyCanvas, {
        type: "bar",
        data: {
          labels: hourlyTraffic.map((v) => v.label),
          datasets: [
            {
              data: hourlyTraffic.map((v) => v.value),
              backgroundColor: "#dc143c",
              borderRadius: 6,
              maxBarThickness: 18,
            },
          ],
        },
        options: sharedChartOptions,
      }),
    );
  }
}

function clearCharts() {
  state.charts.forEach((chart) => chart.destroy());
  state.charts = [];
}

/* ---------- Top-level render ---------- */

function renderDashboard() {
  clearCharts();
  renderTabs();

  const renderer = PAGES[state.activeTab] ?? renderStats;
  setHtml("#admin-content", renderer());
  refreshIcons();

  if (state.activeTab === "stats") renderCharts();
}

function setupLogout() {
  document.querySelector("#logout-button")?.addEventListener("click", () => {
    alert("Demo statis: tombol keluar belum terhubung ke sistem login.");
  });
}

function init() {
  renderDashboard();
  setupLogout();
}

document.addEventListener("DOMContentLoaded", init);
