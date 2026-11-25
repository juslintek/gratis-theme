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

GRATIS is a Full Site Editing (FSE) WordPress block theme built on theme.json v3 with 1:1 Gutenberg editor-to-frontend parity. Zero upsells. Zero locked features. GPL-2.0-or-later licensed.

Live Theme Demo: https://gratis.superglobalsdevelopment.com/demo/gratis-theme/
Documentation: https://gratis.superglobalsdevelopment.com/docs/gratis-theme/

**Features:**
* 22 block patterns across 19 registered pattern categories
* 17 custom block styles across buttons, groups, images, lists, quotes, and separators
* 4 Global Style Variations: Obsidian Dark, Daylight Light, Emerald Matrix, and Ocean Slate
* 18 FSE templates and 5 header/footer template parts
* 1:1 Gutenberg edit-mode and published frontend parity via shared editor-styles and theme.json v3 presets
* WooCommerce templates: shop archive, single product, cart, and checkout
* Instant REST API live search (200ms debounce, zero jQuery, ~7 KB total vanilla JS)
* Toast and bell notification API (GRATIS.toast and GRATIS.notify) with WooCommerce added_to_cart support
* Self-hosted OFL 1.1 fonts (Space Grotesk and DM Sans) and local GPL-2.0-or-later SVG illustrations
* Accessibility: skip links, 44x44px touch targets, keyboard navigation, prefers-reduced-motion support, and WCAG AA contrast

== Installation ==

1. Upload the `gratis-theme` (or `gratis`) folder to `/wp-content/themes/`, or upload `gratis-theme-1.0.2.zip` via Appearance -> Themes -> Add New -> Upload Theme.
2. Activate GRATIS in Appearance -> Themes.
3. Switch between Obsidian Dark, Daylight Light, Emerald Matrix, and Ocean Slate under Appearance -> Editor -> Styles.
4. Insert any of the 22 patterns from the block inserter Patterns tab.

== Frequently Asked Questions ==

= Is GRATIS really completely free? =

Yes. GPL-2.0-or-later licensed. No Pro version, no license keys, and no admin upsells. Every pattern, style variation, and template ships free forever.

= Do I need a third-party page builder? =

No. GRATIS uses the native WordPress block editor and Full Site Editing with shared editor-styles so the editor matches the published frontend.

= What PHP and WordPress versions are required? =

WordPress 6.5 or later (tested up to 7.1) and PHP 7.4 or later (PHP 8.1+ recommended).

= Can I use this for commercial and client sites? =

Yes. Under GPL-2.0-or-later you can modify and deploy GRATIS on unlimited personal and commercial client sites.

= How do I add live search? =

Add a Custom HTML block to any page or template with:
`<div class="gratis-search-wrap"><input type="search" class="gratis-search-input" placeholder="Search..."></div>`

= How do I use the notification system? =

Call `GRATIS.toast("Message", "success");` or `GRATIS.notify("Message", "info", "/url");` from JavaScript, and optionally place a `.gratis-bell` element in your header.

== Changelog ==

= 1.0.2 =
* Added 1:1 Gutenberg editor-to-frontend parity via add_theme_support('editor-styles'), shared theme.css/components.css/demo-showcase.css stylesheets, and normalized theme.json v3 tokens.
* Added 4 complete Global Style Variations (Obsidian Dark, Daylight Light, Emerald Matrix, Ocean Slate) and semantic custom.surface tokens.
* Implemented CSS for all 17 registered custom block styles across buttons, groups, images, lists, quotes, and separators.
* Canonicalized block markup across all 22 patterns, 18 templates, and 5 template parts to eliminate Gutenberg block recovery prompts.
* Bundled local GPL-2.0-or-later SVG illustrations in assets/images/ and removed all external image URLs.
* Hardened search.js and notifications.js with safe DOM construction (createElement + textContent) to prevent DOM XSS.
* Removed plugin-territory SEO meta and HTTP Cache-Control hooks from functions.php (handled by gratis-seo and gratis-cache) and completed full 'gratis' i18n escaping across all patterns.

= 1.0.1 =
* Added explicit GPL-2.0-or-later copyright header in style.css and packaged archive under the `gratis/` theme slug directory.
* Internationalized block style labels, pattern category labels, and reading-time strings under the `gratis` text domain.

= 1.0.0 =
* Initial release with 22 block patterns, WooCommerce templates, REST live search, toast notifications, dark style variation, and 5 header/footer template parts.

== Copyright ==

GRATIS WordPress Theme, Copyright (C) 2024-2026 Juslintek.
GRATIS is distributed under the terms of the GNU GPL v2 or later.

This theme bundles the following resources:

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

Bundled SVG illustrations (assets/images/*.svg)
Original vector artwork created by Juslintek for GRATIS Theme.
Files: assets/images/hero-abstract.svg, assets/images/team-collab.svg, assets/images/feature-editor.svg, assets/images/feature-speed.svg, assets/images/avatar-1.svg, assets/images/avatar-2.svg, assets/images/avatar-3.svg
Copyright (C) 2024-2026 Juslintek.
License: GPL-2.0-or-later — https://www.gnu.org/licenses/gpl-2.0.html

The SIL Open Font License (OFL 1.1) is GPL-compatible. All bundled fonts and
illustrations are self-hosted locally with no external CDN requests.

== Privacy ==

GRATIS does not collect any user data. No tracking. No analytics. No external calls.
All fonts and SVG illustrations are self-hosted locally — no requests are made to Google Fonts or any third-party CDN.
The live search feature queries your own WordPress REST API only.
GRATIS sets zero cookies and stores zero localStorage tracking data.
