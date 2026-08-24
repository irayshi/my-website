import { services, whatsappLink } from "../../data/site.js";

export function renderServices() {
  const grid = document.querySelector("#services-grid");
  if (!grid) return;

  grid.innerHTML = services
    .map(
      (service) => `
        <article class="surface-card reveal flex h-full flex-col rounded-2xl p-8">
          <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-crimson/10 text-crimson">
            <i data-lucide="${service.icon}" class="h-6 w-6"></i>
          </div>
          <h3 class="font-display text-xl font-bold">${service.title}</h3>
          <p class="mt-3 text-sm leading-relaxed text-zinc-400">${service.description}</p>
          <ul class="mt-6 flex-1 space-y-2.5">
            ${service.details
              .map(
                (detail) => `
                  <li class="flex items-start gap-2.5 text-sm text-zinc-300">
                    <i data-lucide="check" class="mt-0.5 h-4 w-4 shrink-0 text-crimson"></i>${detail}
                  </li>
                `,
              )
              .join("")}
          </ul>
          <div class="mt-7 flex items-center justify-between border-t border-white/10 pt-6">
            <span class="text-sm font-medium text-white">${service.price}</span>
            <a class="inline-flex items-center gap-1.5 text-sm font-semibold text-crimson transition-all hover:gap-2.5" href="${whatsappLink}" target="_blank" rel="noreferrer">
              Pesan Jasa <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
            </a>
          </div>
        </article>
      `,
    )
    .join("");
}