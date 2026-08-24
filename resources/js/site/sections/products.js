import { products, whatsappLink } from "../../data/site.js";
import { renderFilterButtons } from "../../components/filters.js";
import { refreshIcons } from "../../lib/icons.js";
import { observeReveal } from "../../lib/dom.js";

const CATEGORIES = ["Semua", "Template", "UI Kit", "E-Book"];

function productCard(product) {
  return `
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
          <a class="crimson-pill inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold" href="${whatsappLink}" target="_blank" rel="noreferrer">
            <i data-lucide="shopping-bag" class="h-3.5 w-3.5"></i> Beli
          </a>
        </div>
      </div>
    </article>
  `;
}

function renderGrid(activeCategory) {
  const filtered =
    activeCategory === "Semua" ? products : products.filter((p) => p.category === activeCategory);
  const grid = document.querySelector("#products-grid");
  if (!grid) return;

  grid.innerHTML = filtered.map(productCard).join("");
  refreshIcons();
  observeReveal();
}

export function renderProducts(activeCategory = "Semua") {
  renderFilterButtons("#product-filters", CATEGORIES, activeCategory, renderProducts);
  renderGrid(activeCategory);
}