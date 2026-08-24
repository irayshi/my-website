/**
 * DOM utility helpers used across site & admin views.
 */

/** Safer innerHTML wrapper — returns empty string if selector is missing. */
export function setHtml(selector, html) {
  const el = document.querySelector(selector);
  if (el) el.innerHTML = html;
}

/** Safer textContent wrapper. */
export function setText(selector, text) {
  const el = document.querySelector(selector);
  if (el) el.textContent = text;
}

/**
 * IntersectionObserver that adds `is-visible` once an element enters the viewport.
 * Unobserves after firing — reveal animations should run exactly once.
 */
export function observeReveal(selector = ".reveal", visibleClass = "is-visible", threshold = 0.14) {
  const targets = document.querySelectorAll(selector);
  if (!targets.length) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add(visibleClass);
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold },
  );

  targets.forEach((el) => observer.observe(el));
}

/**
 * Count-up effect for elements with `data-target` — animates from 0 to the target number.
 * Uses requestAnimationFrame and respects prefers-reduced-motion via no-op observers
 * (callers can decide to skip by not adding `.counter` to elements).
 */
export function observeCounters(selector = ".counter", threshold = 0.7) {
  const counters = document.querySelectorAll(selector);
  if (!counters.length) return;

  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const counter = entry.target;
        const target = Number(counter.dataset.target);

        if (prefersReduced || Number.isNaN(target)) {
          counter.textContent = target;
          observer.unobserve(counter);
          return;
        }

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
    { threshold },
  );

  counters.forEach((c) => observer.observe(c));
}

/**
 * Sticky header behaviour — toggles classes when window scrolls past a threshold.
 * `classesToToggle` is an array of class names that should be present when scrolled.
 */
export function setupStickyHeader(headerSelector, classesToToggle = [], threshold = 20) {
  const header = document.querySelector(headerSelector);
  if (!header) return;

  const update = () => {
    const scrolled = window.scrollY > threshold;
    classesToToggle.forEach((cls) => header.classList.toggle(cls, scrolled));
  };

  update();
  window.addEventListener("scroll", update, { passive: true });
}

/**
 * Mobile menu toggle — opens/closes a menu when a button is clicked, and closes
 * the menu whenever any of its anchor links is clicked.
 */
export function setupMobileMenu(toggleSelector, menuSelector) {
  const button = document.querySelector(toggleSelector);
  const menu = document.querySelector(menuSelector);
  if (!button || !menu) return;

  button.addEventListener("click", () => menu.classList.toggle("hidden"));

  menu.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => menu.classList.add("hidden"));
  });
}