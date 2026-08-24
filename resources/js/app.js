/**
 * Vite entry — loads CSS bundle and per-page JS modules.
 * Page-specific code lives under ./site/ and ./admin/ and only runs when its
 * target element exists in the DOM, so importing all of them is safe.
 */

import "./../css/app.css";

import "./site/home.js";
import "./site/queue.js";
import "./admin/dashboard.js";