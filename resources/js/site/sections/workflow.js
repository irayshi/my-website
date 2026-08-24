import { workflow } from "../../data/site.js";

export function renderWorkflow() {
  const grid = document.querySelector("#workflow-grid");
  if (!grid) return;

  grid.innerHTML = workflow
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