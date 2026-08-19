const queueBoard = {
  developers: [
    {
      name: "Irayshi",
      role: "Lead Fullstack Developer",
      current: {
        type: "queue",
        queueNumber: 1,
        projectName: "Website Company Profile",
      },
    },
    {
      name: "Reza Kurniawan",
      role: "Backend Developer",
      current: {
        type: "internal",
        projectName: "Internal: Refactor Design System",
      },
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

const statusToneClasses = {
  blue: "bg-blue-500/10 text-blue-400",
  amber: "bg-amber-500/10 text-amber-400",
  green: "bg-green-500/10 text-green-400",
};

function renderHeaderBehavior() {
  const header = document.querySelector("#site-header");
  const updateHeader = () => {
    const scrolled = window.scrollY > 20;
    header.classList.toggle("bg-[#0d0d0f]/85", scrolled);
    header.classList.toggle("backdrop-blur-xl", scrolled);
    header.classList.toggle("border-b", scrolled);
    header.classList.toggle("border-white/10", scrolled);
  };

  updateHeader();
  window.addEventListener("scroll", updateHeader, { passive: true });
}

function setupMobileMenu() {
  const button = document.querySelector("#menu-toggle");
  const menu = document.querySelector("#mobile-menu");

  button.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });

  menu.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => menu.classList.add("hidden"));
  });
}

function renderSummary() {
  const busyDevelopers = queueBoard.developers.filter((developer) => developer.current).length;
  const waitingProjects = queueBoard.active.filter((item) => item.status === "Menunggu").length;

  document.querySelector("#queue-summary").innerHTML = [
    ["Developer Aktif", busyDevelopers],
    ["Antrian Aktif", queueBoard.active.length],
    ["Menunggu", waitingProjects],
  ]
    .map(
      ([label, value]) => `
        <div class="surface-card rounded-full px-4 py-2 text-sm">
          <span class="font-semibold text-white">${value}</span>
          <span class="ml-1 text-zinc-500">${label}</span>
        </div>
      `,
    )
    .join("");
}

function renderDevelopers() {
  document.querySelector("#developer-count").textContent = `${queueBoard.developers.length} orang`;
  document.querySelector("#developer-list").innerHTML = queueBoard.developers
    .map((developer) => {
      const current = developer.current;
      const currentLabel =
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
              <p class="text-zinc-300">Mengerjakan ${currentLabel} - ${current.projectName}</p>
            </div>
          </div>
        </article>
      `;
    })
    .join("");
}

function renderQueue(searchTerm = "") {
  const normalizedSearch = searchTerm.trim().toLowerCase();
  const filtered = queueBoard.active.filter((item) => {
    return [item.clientName, item.projectName, item.status].some((value) =>
      value.toLowerCase().includes(normalizedSearch),
    );
  });

  document.querySelector("#active-count").textContent = `(${filtered.length})`;
  document.querySelector("#queue-list").innerHTML = filtered.length
    ? filtered.map(renderQueueItem).join("")
    : renderEmptyState("Tidak ada antrian ditemukan", "Coba gunakan kata kunci lain atau kosongkan pencarian.");
}

function renderQueueItem(item) {
  const toneClass = statusToneClasses[item.statusTone] ?? "bg-zinc-500/10 text-zinc-400";

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
        <span class="shrink-0 rounded-full px-3 py-1.5 text-xs font-semibold ${toneClass}">
          ${item.status}
        </span>
      </div>
    </article>
  `;
}

function renderCompleted(searchTerm = "") {
  const normalizedSearch = searchTerm.trim().toLowerCase();
  const filtered = queueBoard.completed.filter((item) => {
    return [item.clientName, item.projectName, item.completedAt].some((value) =>
      value.toLowerCase().includes(normalizedSearch),
    );
  });

  document.querySelector("#completed-list").innerHTML = filtered.length
    ? filtered.map(renderCompletedItem).join("")
    : renderEmptyState("Belum ada proyek selesai", "Hasil selesai akan muncul di sini.");
}

function renderCompletedItem(item) {
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
          ${renderStars(item.rating)}
        </div>
      </div>
    </article>
  `;
}

function renderStars(count) {
  return Array.from({ length: count }, () => '<i data-lucide="star" class="h-3.5 w-3.5 fill-amber-500 text-amber-500"></i>').join("");
}

function renderEmptyState(title, body) {
  return `
    <div class="surface-card rounded-2xl p-6 text-center">
      <p class="font-semibold">${title}</p>
      <p class="mt-1 text-sm text-zinc-400">${body}</p>
    </div>
  `;
}

function setupSearch() {
  const searchInput = document.querySelector("#queue-search");

  searchInput.addEventListener("input", () => {
    renderQueue(searchInput.value);
    renderCompleted(searchInput.value);
    refreshIcons();
  });
}

function refreshIcons() {
  if (window.lucide) lucide.createIcons();
}

function init() {
  renderHeaderBehavior();
  setupMobileMenu();
  renderSummary();
  renderDevelopers();
  renderQueue();
  renderCompleted();
  setupSearch();
  refreshIcons();
}

document.addEventListener("DOMContentLoaded", init);
