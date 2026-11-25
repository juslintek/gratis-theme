# Agent Guidance for Gratis Theme

## Visual interpretation tooling

- For browser/UI/visual-parity work, prefer `mcp-for-page-builders` first: https://github.com/juslintek/mcp-for-page-builders
- If `mcp-for-page-builders` is unavailable, use **PinchTab** as the fallback.

---

## Project context

GRATIS (`gratis`, `v1.0.2`) is a Full Site Editing (FSE) WordPress block theme with **22 block patterns** across **19 registered categories**, **17 custom block styles**, **4 Global Style Variations** (`dark.json`, `light.json`, `emerald.json`, `ocean.json`), **18 FSE templates**, and **5 template parts** (`parts/*.html`), powered by `theme.json` v3 and 1:1 Gutenberg editor-to-frontend parity (`editor-styles`).

### Key focus areas for agents

- **1:1 Editor Parity** — Confirm `theme.css`, `components.css`, and `demo-showcase.css` match across Gutenberg Edit Mode and Published Frontend with zero "Attempt Block Recovery" prompts
- **4 Style Variations** — Test patterns and contrast across Obsidian Dark, Daylight Light, Emerald Matrix, and Ocean Slate
- **17 Block Styles & 22 Patterns** — Verify all registered block styles and canonical pattern markup
- **WooCommerce & CPT Templates** — Product catalog, single product, cart, checkout, docs, events, and courses
- **Typography, Spacing & A11y** — Fluid `theme.json` v3 tokens, self-hosted OFL fonts, WCAG AA contrast, and `prefers-reduced-motion`

### When to use mcp-for-page-builders

- Audit pattern rendering and Gutenberg iframe parity across browsers
- Check accessibility (contrast, keyboard nav, semantic HTML)
- Verify Lighthouse metrics on pattern and demo pages
- Test color scheme changes across all 4 style variations
- Validate component alignment and spacing

---

## Related

- `https://gratis.superglobalsdevelopment.com/demo/gratis-theme/` — Dedicated Live Theme Demo
- `https://gratis.superglobalsdevelopment.com/docs/gratis-theme/` — Dedicated Theme Documentation
- `https://gratis.superglobalsdevelopment.com/` — Gratis Suite website
- `mcp-for-page-builders` — Visual auditing MCP for page builders
