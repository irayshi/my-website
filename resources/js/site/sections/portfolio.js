import { portfolio } from "../../data/site.js";
import { renderFilterButtons } from "../../components/filters.js";
import { refreshIcons } from "../../lib/icons.js";
import { observeReveal } from "../../lib/dom.js";

const CATEGORIES = ["Semua", "Fullstack", "Mobile", "UI/UX"];

function portfolioCard(item) {
  return `
    <article class="reveal ${item.wide ? "lg:col-span-4" : "lg:col-span-2"}">
      <a class="surface-card group relative block h-full overflow-hidden rounded-2xl text-left" href="#contact">
        <img class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" src="${item.image}" alt="${item.title}" />
        <div class="absolute inset-0 bg-linear-to-t from-black/90 via-black/30 to-transparent"></div>
        <div class="absolute inset-0 flex flex-col justify-end p-6">
          <div class="mb-2 flex items-center gap-2">
            <span class="tagline">${item.category}</span>
            <span class="text-xs text-white/40">· ${item.year}</span>
          </div>
          <h3 class="font-display flex items-center gap-2 text-xl font-bold">
            ${item.title}
            <i data-lucide="arrow-up-right" class="h-5 w-5 -translate-x-2 opacity-0 transition-all group-hover:translate-x-0 group-hover:opacity-100"></i>
          </h3>
        </div>
      </a>
    </article>
  `;
}

function renderGrid(activeCategory) {
  const filtered =
    activeCategory === "Semua" ? portfolio : portfolio.filter((item) => item.category === activeCategory);
  const grid = document.querySelector("#portfolio-grid");
  if (!grid) return;

  grid.innerHTML = filtered.map(portfolioCard).join("");
  refreshIcons();
  observeReveal();
}

export function renderPortfolio(activeCategory = "Semua") {
  renderFilterButtons("#portfolio-filters", CATEGORIES, activeCategory, renderPortfolio);
  renderGrid(activeCategory);
}
