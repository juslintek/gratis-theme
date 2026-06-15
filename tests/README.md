# Gratis Theme — Tests

`validate-theme.php` is a standalone, dependency-free PHP CLI check (PHP stdlib only — no PHPUnit, WP-CLI, or Composer). Run it with `php tests/validate-theme.php`; it exits non-zero on failure, so it is safe to wire into CI.

It covers two static checks: (1) `php -l` syntax lint of every PHP file in the theme (all `patterns/*.php`, `functions.php`, `index.php`, `inc/*.php`, …; the `tests/` dir is excluded), and (2) `theme.json` validation — exists, parses as JSON, and has top-level `version` and `settings` (it also reports whether `styles` is present).

Full WordPress integration tests — `wp theme check`, WooCommerce template overrides, and style-variation (e.g. `styles/dark.json`) runtime loading — are **out of scope** here because they require a live WordPress test environment (WP-CLI + database, WooCommerce) that is not available in this setup.
