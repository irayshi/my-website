import { impactStats } from "../../data/site.js";

export function renderImpactStats() {
  const container = document.querySelector("#impact-stats");
  if (!container) return;

  container.innerHTML = impactStats
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