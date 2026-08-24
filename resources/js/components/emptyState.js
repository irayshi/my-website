/**
 * Renders an empty-state card with an optional icon.
 */
export function emptyState(title, body, iconName = "inbox") {
  return `
    <div class="surface-card rounded-2xl p-8 text-center">
      <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-crimson/10 text-crimson">
        <i data-lucide="${iconName}" class="h-6 w-6"></i>
      </div>
      <h2 class="mt-5 font-display text-xl font-bold">${title}</h2>
      <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-zinc-400">${body}</p>
    </div>
  `;
}