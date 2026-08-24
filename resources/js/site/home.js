/**
 * Homepage entry point.
 * Each section has its own module under ./sections/.
 */

import { renderMarquee } from "./sections/marquee.js";
import { renderWorkflow } from "./sections/workflow.js";
import { renderSkills } from "./sections/skills.js";
import { renderServices } from "./sections/services.js";
import { renderProducts } from "./sections/products.js";
import { renderPortfolio } from "./sections/portfolio.js";
import { renderImpactStats } from "./sections/impactStats.js";

import { refreshIcons } from "../lib/icons.js";
import {
  setupMobileMenu,
  setupStickyHeader,
  observeReveal,
  observeCounters,
} from "../lib/dom.js";

function init() {
  renderMarquee();
  renderWorkflow();
  renderSkills();
  renderServices();
  renderProducts();
  renderPortfolio();
  renderImpactStats();

  setupMobileMenu("#menu-toggle", "#mobile-menu");
  setupStickyHeader("#site-header", [
    "bg-[#0d0d0f]/85",
    "backdrop-blur-xl",
    "border-b",
    "border-white/10",
  ]);

  refreshIcons();
  observeReveal();
  observeCounters();
}

document.addEventListener("DOMContentLoaded", init);