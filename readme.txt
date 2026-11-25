=== GRATIS ===
Contributors: juslintek
Requires at least: 6.5
Tested up to: 7.1
Requires PHP: 7.4
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: full-site-editing, block-patterns, custom-colors, editor-style, rtl-language-support, wide-blocks, e-commerce, one-column

Everything premium themes charge for. Forever free.

== Description ==

GRATIS is a performance-first Full Site Editing (FSE) WordPress block theme. Zero upsells. Zero locked features. 22 block patterns. GPL-2.0-or-later licensed. Built for speed, accessibility, and Full Site Editing.

**Features:**
* 22 ready-to-use block patterns across 12 categories
* Full Site Editing — edit header, footer, and every template visually
* WooCommerce ready — shop, product, cart, and checkout templates included
* Live search — instant REST API powered search, zero dependencies
* Async notifications — toast system
* Dark theme with full color token system via theme.json v3
* 100/100 PageSpeed out of the box
* Zero render-blocking resources
* No jQuery on frontend
* stale-while-revalidate Cache-Control headers
* HTTP/3 ready
* Accessibility: skip links, keyboard navigation, WCAG AA contrast

== Frequently Asked Questions ==

= Is GRATIS really completely free? =

Yes. GPL-2.0-or-later licensed. No "Pro" version. No upsells. Every pattern, every feature, every future update — free forever.

= Do I need Elementor or a page builder? =

No. GRATIS uses the native WordPress block editor. You get the same visual editing experience without the 400KB JS overhead.

= What PHP version is required? =

PHP 7.4 minimum, PHP 8.4+ recommended.

= Can I use this for client sites? =

Yes. GPL license means you can use it commercially, modify it, and build sites with it.

= How do I add the live search? =

Add an HTML block to any page with:
`<div class="gratis-search-wrap"><input type="search" class="gratis-search-input" placeholder="Search..."></div>`

= How do I use the notification system? =

Call from any JavaScript: `GRATIS.toast("Message", "success");` or `GRATIS.notify("Message", "info", "/url");`

== Changelog ==

= 1.0.1 =
* Added explicit GPL-2.0-or-later copyright header in style.css and packaged archive under the `gratis/` theme slug directory.
* Internationalized block style labels, pattern category labels, and reading-time strings under the `gratis` text domain.

= 1.0.0 =
* Initial release
* 22 block patterns across 12 categories
* WooCommerce templates (shop, product, cart, checkout)
* Live search with REST API
* Async notifications (toast system)
* Dark color scheme (styles/dark.json)
* Full Site Editing templates (index, single, page, archive, 404, search)
* 3 header variants, 2 footer variants
* Performance: 100/100 PageSpeed, zero render-blocking resources

== Copyright ==

GRATIS WordPress Theme, Copyright (C) 2024-2026 Juslintek.
GRATIS is distributed under the terms of the GNU GPL v2 or later.

This theme bundles the following third-party resources:

Space Grotesk font
Copyright (C) 2020 The Space Grotesk Project Authors
(https://github.com/floriankarsten/space-grotesk)
License: SIL Open Font License, 1.1 — https://scripts.sil.org/OFL
Files: assets/fonts/space-grotesk-500.ttf, space-grotesk-600.ttf, space-grotesk-700.ttf

DM Sans font
Copyright (C) 2014-2021 Indian Type Foundry, Colophon Foundry, and Google LLC
(https://github.com/googlefonts/dm-fonts)
License: SIL Open Font License, 1.1 — https://scripts.sil.org/OFL
Files: assets/fonts/dm-sans-400.ttf, dm-sans-500.ttf, dm-sans-600.ttf, dm-sans-700.ttf

Theme screenshot (screenshot.png)
Created directly from the GRATIS theme default homepage template.
Copyright (C) 2024-2026 Juslintek.
License: GPL-2.0-or-later — https://www.gnu.org/licenses/gpl-2.0.html

The SIL Open Font License (OFL 1.1) is GPL-compatible. All bundled fonts are
self-hosted (no external font CDN requests). No JavaScript libraries or CSS
frameworks are bundled — frontend code is vanilla JS and theme.json only.

== Privacy ==

GRATIS does not collect any user data. No tracking. No analytics. No external calls.
All fonts are self-hosted locally — no requests are made to Google Fonts or any
other third-party font CDN.
The live search feature queries your own WordPress REST API only.
The notification system stores a single localStorage key (`gratis_welcomed`) to prevent repeat welcome toasts.
