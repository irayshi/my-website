import { refreshIcons } from "../lib/icons.js";
import { setupMobileMenu, setupStickyHeader } from "../lib/dom.js";

function init() {
  const search = document.querySelector("#queue-search");
  if (!search) return;
  search.addEventListener("input", () => {
    const term = search.value.trim().toLowerCase();
    document.querySelectorAll("[data-queue-item]").forEach((item) => item.classList.toggle("hidden", !item.dataset.search.includes(term)));
  });
  setupMobileMenu("#menu-toggle", "#mobile-menu");
  setupStickyHeader("#site-header", ["bg-[#0d0d0f]/85", "backdrop-blur-xl", "border-b", "border-white/10"]);
  refreshIcons();
}
document.addEventListener("DOMContentLoaded", init);
