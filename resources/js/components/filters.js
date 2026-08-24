/**
 * Renders a row of filter buttons into a container and dispatches the
 * `onSelect(category)` callback when one is clicked.
 */
export function renderFilterButtons(containerSelector, categories, activeCategory, onSelect) {
  const container = document.querySelector(containerSelector);
  if (!container) return;

  container.innerHTML = categories
    .map(
      (category) =>
        `<button class="filter-button ${category === activeCategory ? "active" : ""}" type="button" data-filter="${category}">${category}</button>`,
    )
    .join("");

  container.querySelectorAll("button").forEach((button) => {
    button.addEventListener("click", () => onSelect(button.dataset.filter));
  });
}