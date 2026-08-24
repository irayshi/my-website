import { marqueeItems } from "../../data/site.js";

export function renderMarquee() {
  const track = document.querySelector("#marquee-track");
  if (!track) return;

  track.innerHTML = [...marqueeItems, ...marqueeItems]
    .map(
      (item) => `
        <span class="marquee-item">
          <span class="font-display px-6 text-2xl font-bold text-white/90 sm:text-4xl">${item}</span>
          <span class="text-2xl text-crimson sm:text-4xl">*</span>
        </span>
      `,
    )
    .join("");
}