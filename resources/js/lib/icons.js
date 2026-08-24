/**
 * Icon helpers — central place for lucide icon markup so views stay readable.
 */

export function icon(name, classes = "h-4 w-4") {
  return `<i data-lucide="${name}" class="${classes}"></i>`;
}

/**
 * Re-render all <i data-lucide="..."> nodes into SVG.
 * Call this after injecting HTML that contains icons.
 */
export function refreshIcons() {
  if (window.lucide) window.lucide.createIcons();
}