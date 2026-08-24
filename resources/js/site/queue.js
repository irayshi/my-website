/**
 * Queue (antrian) page entry point.
 */

import { queueBoard, statusToneClasses } from "../data/queue.js";
import { emptyState } from "../components/emptyState.js";
import { refreshIcons } from "../lib/icons.js";
import {
  setupMobileMenu,
  setupStickyHeader,
  setHtml,
  setText,
} from "../lib/dom.js";

/* ---------- Sub-renderers ---------- */

function renderSummary() {
  const busy = queueBoard.developers.filter((d) => d.current).length;
  const waiting = queueBoard.active.filter((i) => i.status === "Menunggu").length;

  setHtml(
    "#queue-summary",
    [
      ["Developer Aktif", busy],
      ["Antrian Aktif", queueBoard.active.length],
      ["Menunggu", waiting],
    ]
      .map(
        ([label, value]) => `
          <div class="surface-card rounded-full px-4 py-2 text-sm">
            <span class="font-semibold text-white">${value}</span>
            <span class="ml-1 text-zinc-500">${label}</span>
          </div>
        `,
      )
      .join(""),
  );
}

function renderDevelopers() {
  setText("#developer-count", `${queueBoard.developers.length} orang`);

  setHtml(
    "#developer-list",
    queueBoard.developers
      .map((developer) => {
        const current = developer.current;
        const label =
          current.type === "queue"
            ? `<span class="font-semibold text-crimson">antrian #${current.queueNumber}</span>`
            : `<span class="font-semibold text-zinc-400">proyek internal</span>`;

        return `
          <article class="surface-card rounded-2xl p-5">
            <div class="flex items-center gap-3">
              <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-crimson/10 font-display font-bold text-crimson">
                ${developer.name.charAt(0)}
              </div>
              <div class="min-w-0">
                <h3 class="truncate font-semibold">${developer.name}</h3>
                <p class="truncate text-xs text-zinc-400">${developer.role}</p>
              </div>
            </div>

            <div class="mt-4 border-t border-white/10 pt-4 text-sm">
              <div class="flex items-start gap-2">
                <span class="mt-1.5 h-2 w-2 shrink-0 animate-pulse rounded-full bg-blue-400"></span>
                <p class="text-zinc-300">Mengerjakan ${label} - ${current.projectName}</p>
              </div>
            </div>
          </article>
        `;
      })
      .join(""),
  );
}

function queueItem(item) {
  const tone = statusToneClasses[item.statusTone] ?? "bg-zinc-500/10 text-zinc-400";

  return `
    <article class="surface-card queue-card rounded-2xl p-5">
      <div class="flex items-center gap-4">
        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-crimson/10 font-display font-bold text-crimson">
          #${item.queueNumber}
        </div>
        <div class="min-w-0 flex-1">
          <h3 class="truncate font-semibold">${item.clientName}</h3>
          <p class="truncate text-sm text-zinc-400">${item.projectName}</p>
          <p class="mt-1 truncate text-xs text-zinc-600">${item.estimate}</p>
        </div>
        <span class="shrink-0 rounded-full px-3 py-1.5 text-xs font-semibold ${tone}">
          ${item.status}
        </span>
      </div>
    </article>
  `;
}

function completedItem(item) {
  return `
    <article class="surface-card queue-card rounded-2xl p-5">
      <div class="flex items-center gap-4">
        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-green-500/10 text-green-400">
          <i data-lucide="circle-check" class="h-5 w-5"></i>
        </div>
        <div class="min-w-0 flex-1">
          <h3 class="truncate font-semibold">${item.clientName}</h3>
          <p class="truncate text-sm text-zinc-400">${item.projectName}</p>
          <p class="truncate text-xs text-zinc-500">Selesai ${item.completedAt}</p>
        </div>
        <div class="flex shrink-0 items-center gap-0.5" aria-label="Rating ${item.rating} dari 5">
          ${stars(item.rating)}
        </div>
      </div>
    </article>
  `;
}

function stars(count) {
  return Array.from(
    { length: count },
    () => '<i data-lucide="star" class="h-3.5 w-3.5 fill-amber-500 text-amber-500"></i>',
  ).join("");
}

function matchesSearch(item, term) {
  if (!term) return true;
  return [item.clientName, item.projectName, item.status, item.completedAt]
    .filter(Boolean)
    .some((v) => v.toLowerCase().includes(term));
}

/* ---------- Top-level renderers ---------- */

function renderQueue(term = "") {
  const filtered = queueBoard.active.filter((i) => matchesSearch(i, term));
  setText("#active-count", `(${filtered.length})`);

  const html = filtered.length
    ? filtered.map(queueItem).join("")
    : emptyState("Tidak ada antrian ditemukan", "Coba gunakan kata kunci lain atau kosongkan pencarian.", "search-x");

  setHtml("#queue-list", html);
}

function renderCompleted(term = "") {
  const filtered = queueBoard.completed.filter((i) => matchesSearch(i, term));
  const html = filtered.length
    ? filtered.map(completedItem).join("")
    : emptyState("Belum ada proyek selesai", "Hasil selesai akan muncul di sini.", "package-open");

  setHtml("#completed-list", html);
}

/* ---------- Wiring ---------- */

function setupSearch() {
  const input = document.querySelector("#queue-search");
  if (!input) return;

  input.addEventListener("input", () => {
    const term = input.value.trim().toLowerCase();
    renderQueue(term);
    renderCompleted(term);
    refreshIcons();
  });
}

function init() {
  renderSummary();
  renderDevelopers();
  renderQueue();
  renderCompleted();
  setupSearch();

  setupMobileMenu("#menu-toggle", "#mobile-menu");
  setupStickyHeader("#site-header", [
    "bg-[#0d0d0f]/85",
    "backdrop-blur-xl",
    "border-b",
    "border-white/10",
  ]);

  refreshIcons();
}

document.addEventListener("DOMContentLoaded", init);