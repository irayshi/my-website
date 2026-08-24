import { skills, aboutStats } from "../../data/site.js";
import { setHtml } from "../../lib/dom.js";

export function renderSkills() {
  setHtml(
    "#skills-list",
    skills
      .map((skill) => `<span class="rounded-full border border-white/15 px-4 py-2 text-sm text-zinc-300">${skill}</span>`)
      .join(""),
  );

  setHtml(
    "#about-stats",
    aboutStats
      .map(
        ([number, label]) => `
          <div>
            <div class="font-display text-3xl font-extrabold text-crimson">${number}</div>
            <div class="mt-1 text-xs text-zinc-600">${label}</div>
          </div>
        `,
      )
      .join(""),
  );
}