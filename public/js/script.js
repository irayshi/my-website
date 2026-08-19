const marqueeItems = [
  "FULLSTACK DEVELOPMENT",
  "PRODUK DIGITAL",
  "UI/UX DESIGN",
  "ARSITEKTUR SISTEM",
  "PENGIRIMAN CEPAT",
  "DARI INDONESIA",
];

const workflow = [
  {
    no: "01",
    title: "Diskusi & Perencanaan",
    body: "Kita mulai dengan memahami kebutuhan, tujuan, dan lingkup proyekmu. Saya susun rencana serta estimasi yang jelas sebelum mulai.",
  },
  {
    no: "02",
    title: "Desain & Pengembangan",
    body: "Saya rancang antarmuka lalu membangun produk dengan kode yang bersih, sambil memberi update progres secara berkala.",
  },
  {
    no: "03",
    title: "Pengujian & Peluncuran",
    body: "Setelah diuji menyeluruh, produk diluncurkan. Saya bantu proses handover dan siap mendukung revisi setelahnya.",
  },
];

const skills = ["React", "FastAPI", "MongoDB", "Node.js", "TypeScript", "Tailwind CSS", "UI/UX Design", "Figma"];

const services = [
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

const products = [
  {
    category: "Template",
    title: "SaaS Dashboard Starter Kit (React)",
    description: "Boilerplate dashboard produksi-siap dengan auth, chart, dan komponen modular untuk mempercepat MVP kamu.",
    image: "https://images.unsplash.com/photo-1658953229625-aad99d7603b4?crop=entropy&cs=srgb&fm=jpg&q=85&w=1200",
    features: ["Auth JWT siap pakai", "20+ komponen UI", "Dark mode & responsif"],
    price: "Rp 450.000",
  },
  {
    category: "UI Kit",
    title: "Minimalist Portfolio Figma UI Kit",
    description: "Design system Figma lengkap dengan grid, tipografi, dan komponen kinetik untuk portofolio kelas dunia.",
    image: "https://images.unsplash.com/photo-1720962158883-b0f2021fb51e?crop=entropy&cs=srgb&fm=jpg&q=85&w=1200",
    features: ["Auto-layout & variants", "120+ komponen", "Style guide crimson"],
    price: "Rp 250.000",
  },
  {
    category: "E-Book",
    title: "E-Book: React Architecture Masterclass",
    description: "Panduan mendalam menyusun arsitektur React skala besar: state, folder structure, performa, dan testing.",
    image: "https://images.unsplash.com/photo-1720135885007-454165745e21?crop=entropy&cs=srgb&fm=jpg&q=85&w=1200",
    features: ["180+ halaman", "Studi kasus nyata", "Pola scalable"],
    price: "Rp 180.000",
  },
];

const portfolio = [
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

const impactStats = [
  { value: 45, suffix: "+", label: "Proyek Selesai" },
  { value: 99, suffix: "%", label: "Klien Puas" },
  { value: 12, suffix: "+", label: "Produk Digital" },
  { value: 24, prefix: "<", suffix: " Jam", label: "Respon Chat" },
];

const rupiahWhatsapp = "https://wa.me/6280000000000";

function icon(name, size = 16, classes = "") {
  return `<i data-lucide="${name}" class="h-${size / 4} w-${size / 4} ${classes}"></i>`;
}

function renderMarquee() {
  const html = [...marqueeItems, ...marqueeItems]
    .map(
      (item) => `
        <span class="marquee-item">
          <span class="font-display px-6 text-2xl font-bold text-white/90 sm:text-4xl">${item}</span>
          <span class="text-2xl text-crimson sm:text-4xl">*</span>
        </span>
      `,
    )
    .join("");

  document.querySelector("#marquee-track").innerHTML = html;
}

function renderWorkflow() {
  document.querySelector("#workflow-grid").innerHTML = workflow
    .map(
      (item) => `
        <article class="reveal bg-[#0d0d0f] p-9 transition-colors duration-300 hover:bg-[#141418]">
          <div class="font-display text-5xl font-extrabold text-white/10 transition-colors duration-300 hover:text-crimson">${item.no}</div>
          <h3 class="font-display mt-6 text-xl font-bold">${item.title}</h3>
          <p class="mt-4 text-sm leading-relaxed text-zinc-400">${item.body}</p>
        </article>
      `,
    )
    .join("");
}

function renderSkills() {
  document.querySelector("#skills-list").innerHTML = skills
    .map((skill) => `<span class="rounded-full border border-white/15 px-4 py-2 text-sm text-zinc-300">${skill}</span>`)
    .join("");

  document.querySelector("#about-stats").innerHTML = [
    ["5+", "Tahun Pengalaman"],
    ["45+", "Proyek Selesai"],
    ["30+", "Klien Bahagia"],
  ]
    .map(
      ([number, label]) => `
        <div>
          <div class="font-display text-3xl font-extrabold text-crimson">${number}</div>
          <div class="mt-1 text-xs text-zinc-600">${label}</div>
        </div>
      `,
    )
    .join("");
}

function renderServices() {
  document.querySelector("#services-grid").innerHTML = services
    .map(
      (service, index) => `
        <article class="surface-card reveal flex h-full flex-col rounded-2xl p-8">
          <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-crimson/10 text-crimson">
            <i data-lucide="${service.icon}" class="h-6 w-6"></i>
          </div>
          <h3 class="font-display text-xl font-bold">${service.title}</h3>
          <p class="mt-3 text-sm leading-relaxed text-zinc-400">${service.description}</p>
          <ul class="mt-6 flex-1 space-y-2.5">
            ${service.details
              .map(
                (detail) => `
                  <li class="flex items-start gap-2.5 text-sm text-zinc-300">
                    <i data-lucide="check" class="mt-0.5 h-4 w-4 shrink-0 text-crimson"></i>${detail}
                  </li>
                `,
              )
              .join("")}
          </ul>
          <div class="mt-7 flex items-center justify-between border-t border-white/10 pt-6">
            <span class="text-sm font-medium text-white">${service.price}</span>
            <a class="inline-flex items-center gap-1.5 text-sm font-semibold text-crimson transition-all hover:gap-2.5" href="${rupiahWhatsapp}" target="_blank" rel="noreferrer">
              Pesan Jasa <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
            </a>
          </div>
        </article>
      `,
    )
    .join("");
}

function renderFilterButtons(containerId, categories, activeCategory, onClick) {
  const container = document.querySelector(containerId);
  container.innerHTML = categories
    .map((category) => `<button class="filter-button ${category === activeCategory ? "active" : ""}" type="button" data-filter="${category}">${category}</button>`)
    .join("");

  container.querySelectorAll("button").forEach((button) => {
    button.addEventListener("click", () => onClick(button.dataset.filter));
  });
}

function renderProducts(activeCategory = "Semua") {
  const categories = ["Semua", "Template", "UI Kit", "E-Book"];
  renderFilterButtons("#product-filters", categories, activeCategory, renderProducts);

  const filtered = activeCategory === "Semua" ? products : products.filter((product) => product.category === activeCategory);
  document.querySelector("#products-grid").innerHTML = filtered
    .map(
      (product) => `
        <article class="surface-card reveal flex h-full flex-col overflow-hidden rounded-2xl">
          <div class="relative h-52 overflow-hidden">
            <img class="h-full w-full object-cover transition-transform duration-500 hover:scale-105" src="${product.image}" alt="${product.title}" />
            <span class="absolute left-4 top-4 rounded-full bg-crimson/90 px-3 py-1 text-xs font-medium text-white backdrop-blur-md">${product.category}</span>
          </div>
          <div class="flex flex-1 flex-col p-6">
            <h3 class="font-display text-lg font-bold">${product.title}</h3>
            <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-zinc-400">${product.description}</p>
            <ul class="mt-4 flex-1 space-y-2">
              ${product.features
                .map(
                  (feature) => `
                    <li class="flex items-center gap-2 text-xs text-zinc-300">
                      <i data-lucide="check" class="h-3.5 w-3.5 text-crimson"></i>${feature}
                    </li>
                  `,
                )
                .join("")}
            </ul>
            <div class="mt-6 flex items-center justify-between gap-4">
              <span class="font-display text-lg font-bold">${product.price}</span>
              <a class="crimson-pill inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold" href="${rupiahWhatsapp}" target="_blank" rel="noreferrer">
                <i data-lucide="shopping-bag" class="h-3.5 w-3.5"></i> Beli
              </a>
            </div>
          </div>
        </article>
      `,
    )
    .join("");

  refreshDynamicUi();
}

function renderPortfolio(activeCategory = "Semua") {
  const categories = ["Semua", "Fullstack", "Mobile", "UI/UX"];
  renderFilterButtons("#portfolio-filters", categories, activeCategory, renderPortfolio);

  const filtered = activeCategory === "Semua" ? portfolio : portfolio.filter((item) => item.category === activeCategory);
  document.querySelector("#portfolio-grid").innerHTML = filtered
    .map(
      (item) => `
        <article class="reveal ${item.wide ? "lg:col-span-4" : "lg:col-span-2"}">
          <a class="surface-card group relative block h-full overflow-hidden rounded-2xl text-left" href="#contact">
            <img class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" src="${item.image}" alt="${item.title}" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
            <div class="absolute inset-0 flex flex-col justify-end p-6">
              <div class="mb-2 flex items-center gap-2">
                <span class="overline">${item.category}</span>
                <span class="text-xs text-white/40">· ${item.year}</span>
              </div>
              <h3 class="font-display flex items-center gap-2 text-xl font-bold">
                ${item.title}
                <i data-lucide="arrow-up-right" class="h-5 w-5 -translate-x-2 opacity-0 transition-all group-hover:translate-x-0 group-hover:opacity-100"></i>
              </h3>
            </div>
          </a>
        </article>
      `,
    )
    .join("");

  refreshDynamicUi();
}

function renderImpactStats() {
  document.querySelector("#impact-stats").innerHTML = impactStats
    .map(
      (stat) => `
        <div class="reveal text-center">
          <div class="font-display text-4xl font-extrabold text-crimson sm:text-6xl">
            <span>${stat.prefix ?? ""}</span><span class="counter" data-target="${stat.value}">0</span><span>${stat.suffix ?? ""}</span>
          </div>
          <div class="mt-3 text-sm text-zinc-400">${stat.label}</div>
        </div>
      `,
    )
    .join("");
}

function setupMenu() {
  const button = document.querySelector("#menu-toggle");
  const menu = document.querySelector("#mobile-menu");

  button.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });

  menu.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => menu.classList.add("hidden"));
  });
}

function setupHeader() {
  const header = document.querySelector("#site-header");
  const updateHeader = () => {
    header.classList.toggle("bg-[#0d0d0f]/85", window.scrollY > 20);
    header.classList.toggle("backdrop-blur-xl", window.scrollY > 20);
    header.classList.toggle("border-b", window.scrollY > 20);
    header.classList.toggle("border-white/10", window.scrollY > 20);
  };

  updateHeader();
  window.addEventListener("scroll", updateHeader, { passive: true });
}

function setupRevealObserver() {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.14 },
  );

  document.querySelectorAll(".reveal").forEach((element) => observer.observe(element));
}

function setupCounters() {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const counter = entry.target;
        const target = Number(counter.dataset.target);
        let current = 0;
        const step = Math.max(1, Math.ceil(target / 45));

        const tick = () => {
          current = Math.min(target, current + step);
          counter.textContent = current;
          if (current < target) requestAnimationFrame(tick);
        };

        tick();
        observer.unobserve(counter);
      });
    },
    { threshold: 0.7 },
  );

  document.querySelectorAll(".counter").forEach((counter) => observer.observe(counter));
}

function refreshDynamicUi() {
  if (window.lucide) lucide.createIcons();
  setupRevealObserver();
}

function init() {
  renderMarquee();
  renderWorkflow();
  renderSkills();
  renderServices();
  renderProducts();
  renderPortfolio();
  renderImpactStats();
  setupMenu();
  setupHeader();
  refreshDynamicUi();
  setupCounters();
}

document.addEventListener("DOMContentLoaded", init);
