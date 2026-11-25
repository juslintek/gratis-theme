<?php
/**
 * Title: Product Landing — Gratis Suite
 * Slug: gratis-theme/landing-product
 * Categories: gratis-sections, gratis-heroes, featured
 * Keywords: landing, product, ecosystem, hero, features, plugins
 * Description: Full product landing page for the free, open-source Gratis WordPress suite.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-bottom:0">

<!-- wp:cover {"dimRatio":90,"overlayColor":"base-dark","isUserOverlayColor":true,"minHeight":50,"minHeightUnit":"vh","align":"full","className":"gratis-hero-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}}} -->
<div class="wp-block-cover alignfull gratis-hero-section" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16);min-height:50vh"><span aria-hidden="true" class="wp-block-cover__background has-base-dark-background-color has-background-dim-90 has-background-dim"></span><div class="wp-block-cover__inner-container">

<!-- wp:group {"layout":{"type":"constrained","contentSize":"860px"}} -->
<div class="wp-block-group">

<!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"xs","style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.12em"},"spacing":{"margin":{"bottom":"var:preset|spacing|3"}}}} -->
<p class="has-text-align-center has-primary-color has-text-color has-xs-font-size" style="margin-bottom:var(--wp--preset--spacing--3);font-weight:700;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Free & Open Source WordPress Ecosystem', 'gratis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"textColor":"contrast","fontSize":"5-xl","style":{"typography":{"fontWeight":"800","lineHeight":"1.1"},"spacing":{"margin":{"bottom":"var:preset|spacing|6"}}}} -->
<h1 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-5-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--6);font-weight:800;line-height:1.1"><?php esc_html_e( 'Everything premium plugins charge for.', 'gratis' ); ?><br><mark style="background:linear-gradient(120deg, #34d399 0%, #38bdf8 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text"><?php esc_html_e( 'Forever free.', 'gratis' ); ?></mark></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-2","fontSize":"lg","style":{"typography":{"lineHeight":"1.65"},"spacing":{"margin":{"bottom":"var:preset|spacing|8"}}}} -->
<p class="has-text-align-center has-contrast-2-color has-text-color has-lg-font-size" style="margin-bottom:var(--wp--preset--spacing--8);line-height:1.65"><?php esc_html_e( '33 standalone GPL-2.0 WordPress plugins and a Full Site Editing block theme covering performance, security, SEO, forms, commerce, backups, and AI tooling. No Pro tier, no nag screens, no phoning home.', 'gratis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|4"}}} -->
<div class="wp-block-buttons">
<!-- wp:button {"fontSize":"md","style":{"typography":{"fontWeight":"600"},"spacing":{"padding":{"top":"var:preset|spacing|4","right":"var:preset|spacing|8","bottom":"var:preset|spacing|4","left":"var:preset|spacing|8"}},"border":{"radius":"var:custom|radius|md"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-md-font-size has-custom-font-size wp-element-button" href="/downloads/" style="border-radius:var(--wp--custom--radius--md);padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--8);font-weight:600"><?php esc_html_e( 'Download Free ZIPs →', 'gratis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline","fontSize":"md","style":{"typography":{"fontWeight":"600"},"spacing":{"padding":{"top":"var:preset|spacing|4","right":"var:preset|spacing|8","bottom":"var:preset|spacing|4","left":"var:preset|spacing|8"}},"border":{"radius":"var:custom|radius|md"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-md-font-size has-custom-font-size wp-element-button" href="/demo/" style="border-radius:var(--wp--custom--radius--md);padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--8);font-weight:600"><?php esc_html_e( 'Explore Live Demos', 'gratis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline","fontSize":"md","style":{"typography":{"fontWeight":"600"},"spacing":{"padding":{"top":"var:preset|spacing|4","right":"var:preset|spacing|6","bottom":"var:preset|spacing|4","left":"var:preset|spacing|6"}},"border":{"radius":"var:custom|radius|md"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-md-font-size has-custom-font-size wp-element-button" href="https://github.com/juslintek?tab=repositories&amp;q=gratis" style="border-radius:var(--wp--custom--radius--md);padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--6);font-weight:600"><?php esc_html_e( 'View on GitHub', 'gratis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-3","fontSize":"sm","style":{"spacing":{"margin":{"top":"var:preset|spacing|4"}}}} -->
<p class="has-text-align-center has-contrast-3-color has-text-color has-sm-font-size" style="margin-top:var(--wp--preset--spacing--4)"><?php esc_html_e( 'No credit card. No license keys. Public GitHub source. GPL-2.0-or-later licensed.', 'gratis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="gratis-hero-preview" style="max-width:760px;margin:2.5rem auto 0;border-radius:12px;overflow:hidden;background:#0d1117;border:1px solid rgba(255,255,255,0.14);box-shadow:0 24px 64px rgba(0,0,0,0.65),0 0 0 1px rgba(52,211,153,0.08)">
  <div style="display:flex;align-items:center;gap:8px;padding:10px 16px;background:#161b22;border-bottom:1px solid rgba(255,255,255,0.08)">
    <span aria-hidden="true" style="width:12px;height:12px;border-radius:50%;background:#ef4444;display:inline-block"></span>
    <span aria-hidden="true" style="width:12px;height:12px;border-radius:50%;background:#f59e0b;display:inline-block"></span>
    <span aria-hidden="true" style="width:12px;height:12px;border-radius:50%;background:#22c55e;display:inline-block"></span>
    <span style="margin-left:8px;font-size:12px;color:#cbd5e1;font-family:monospace">wp-cli &mdash; Gratis Suite</span>
  </div>
  <pre style="margin:0;padding:20px 24px;font-family:ui-monospace,SFMono-Regular,Menlo,Consolas,monospace;font-size:12.5px;line-height:1.75;color:#cbd5e1;overflow-x:auto"><code><span style="color:#22c55e">$</span> wp plugin activate gratis-cache gratis-security gratis-seo gratis-builder
<span style="color:#86efac">Success:</span> Activated 4 of 4 plugins.

<span style="color:#22c55e">$</span> wp gratis-cache status
<span style="color:#60a5fa">Backends:</span>
  Volatile: <span style="color:#22c55e">redis</span>
  Persistent: <span style="color:#22c55e">sqlite</span>
  Serializer: <span style="color:#22c55e">igbinary</span>

<span style="color:#22c55e">$</span> wp gratis-security audit
headers_enabled    HTTP Security Headers       <span style="color:#22c55e">PASS</span>   8  Security response headers are active
request_monitoring WAF Request Inspection      <span style="color:#22c55e">PASS</span>  10  WAF inspection active (mode: monitor)
<span style="color:#fbbf24">Score: 92/100 (Grade A)</span></code></pre>
</div>
<!-- /wp:html -->

</div>
<!-- /wp:group -->

</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|6","bottom":"var:preset|spacing|6"}},"border":{"bottom":{"color":"var:preset|color|border","width":"1px","style":"solid"},"top":{"color":"var:preset|color|border","width":"1px","style":"solid"}}},"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--border);border-top-style:solid;border-top-width:1px;border-bottom-color:var(--wp--preset--color--border);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6)">

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"align":"center","textColor":"contrast-2","fontSize":"sm","style":{"typography":{"fontWeight":"600"}}} -->
<p class="has-text-align-center has-contrast-2-color has-text-color has-sm-font-size" style="font-weight:600"><?php esc_html_e( '33 GPL-2.0 Plugins · 22 Theme Patterns + 8 Builder Patterns · Zero jQuery · 90+ WP-CLI Commands · $0 Forever', 'gratis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"anchor":"plugins","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" id="plugins" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"contrast","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|3"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--3)"><?php esc_html_e( 'One ecosystem. Every job covered.', 'gratis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-2","fontSize":"md","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|12"}}}} -->
<p class="has-text-align-center has-contrast-2-color has-text-color has-md-font-size" style="margin-bottom:var(--wp--preset--spacing--12)"><?php esc_html_e( 'Use one plugin or install the full suite. Each module works standalone with consistent admin UI, REST APIs, and WP-CLI support.', 'gratis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-columns">

<!-- wp:column {"className":"is-style-bordered","style":{"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column is-style-bordered" style="padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( 'Speed & Scaling', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo wp_kses_post( __( '<strong>Gratis Cache, CDN, DB, Media.</strong> Object cache auto-detection (Redis, Memcached, SQLite, APCu), request tracing, asset rewriting, SQLite drop-in tooling, and organized media folders.', 'gratis' ) ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-bordered","style":{"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column is-style-bordered" style="padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( 'Security & Privacy', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo wp_kses_post( __( '<strong>Gratis Security, Backup, Comply, Access.</strong> Request guard, malware quarantine, file integrity monitoring, TOTP 2FA, stream-first backups with restore, and GDPR Consent Mode v2.', 'gratis' ) ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-bordered","style":{"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column is-style-bordered" style="padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( 'SEO & Growth', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo wp_kses_post( __( '<strong>Gratis SEO, Analytics, Mail, Popup, Social, Reviews, Notify, Affiliate.</strong> Meta tags, JSON-LD, XML sitemaps, cookie-free analytics, encrypted SMTP, popups, and AggregateRating schema.', 'gratis' ) ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|6"},"margin":{"top":"var:preset|spacing|6"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--6)">

<!-- wp:column {"className":"is-style-bordered","style":{"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column is-style-bordered" style="padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( 'Theme, Builder & Content', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo wp_kses_post( __( '<strong>Gratis Theme, Builder, Learn, Tables, Translate.</strong> FSE block theme with 22 patterns, Gutenberg sidebar &amp; REST block API, LMS courses, sortable data tables, and multilingual hreflang support.', 'gratis' ) ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-bordered","style":{"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column is-style-bordered" style="padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( 'Commerce & Business', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo wp_kses_post( __( '<strong>Gratis Commerce, Forms, CRM, Booking, Events, Invoice, Project, Community.</strong> Stripe Checkout &amp; WooCommerce enhancements, conditional forms, CRM broadcasts, appointments, and Kanban boards.', 'gratis' ) ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-bordered","style":{"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column is-style-bordered" style="padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( 'AI & Developer Ops', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo wp_kses_post( __( '<strong>Gratis AI, Automation, DevTools, Fleet, Installer.</strong> Bring-your-own-model AI with encrypted keys, trigger/action workflows, debug bar &amp; migrations, multi-site fleet tools, and suite installer.', 'gratis' ) ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"},"blockGap":"var:preset|spacing|4"}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--10)">
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/features/"><?php esc_html_e( 'Browse All 33 Plugins', 'gratis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/docs/"><?php esc_html_e( 'Read Full Documentation', 'gratis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<!-- wp:group {"anchor":"compare","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}},"border":{"top":{"color":"var:preset|color|border","width":"1px","style":"solid"}}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignfull" id="compare" style="border-top-color:var(--wp--preset--color--border);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"contrast","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--10)"><?php esc_html_e( 'Why teams switch to Gratis', 'gratis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:table {"fontSize":"sm"} -->
<figure class="wp-block-table has-sm-font-size"><table class="has-fixed-layout"><thead><tr><th><?php esc_html_e( 'Capability', 'gratis' ); ?></th><th><?php esc_html_e( 'Typical Paid Plugin Stack', 'gratis' ); ?></th><th><?php esc_html_e( 'Gratis Suite', 'gratis' ); ?></th></tr></thead><tbody><tr><td><?php esc_html_e( 'Annual license renewals', 'gratis' ); ?></td><td><?php esc_html_e( '$300–$1,000+ / year per site', 'gratis' ); ?></td><td><strong><?php esc_html_e( '$0 forever (GPL-2.0-or-later)', 'gratis' ); ?></strong></td></tr><tr><td><?php esc_html_e( 'Upsell banners & locked tabs', 'gratis' ); ?></td><td><?php esc_html_e( 'Common across freemium plugins', 'gratis' ); ?></td><td><strong><?php esc_html_e( 'Zero upsells, zero locked features', 'gratis' ); ?></strong></td></tr><tr><td><?php esc_html_e( 'Telemetry & third-party tracking', 'gratis' ); ?></td><td><?php esc_html_e( 'Opt-out or third-party scripts', 'gratis' ); ?></td><td><strong><?php esc_html_e( 'Self-hosted, zero phone-home', 'gratis' ); ?></strong></td></tr><tr><td><?php esc_html_e( 'Object cache, request tracing & SQLite', 'gratis' ); ?></td><td><?php esc_html_e( 'Separate tools or enterprise tiers', 'gratis' ); ?></td><td><strong><?php esc_html_e( 'Included in Gratis Cache + DB', 'gratis' ); ?></strong></td></tr><tr><td><?php esc_html_e( 'Security headers, FIM & 2FA', 'gratis' ); ?></td><td><?php esc_html_e( 'Paid add-ons', 'gratis' ); ?></td><td><strong><?php esc_html_e( 'Included in Gratis Security', 'gratis' ); ?></strong></td></tr><tr><td><?php esc_html_e( 'WP-CLI & REST API automation', 'gratis' ); ?></td><td><?php esc_html_e( 'Partial or missing', 'gratis' ); ?></td><td><strong><?php esc_html_e( 'Consistent across the suite', 'gratis' ); ?></strong></td></tr></tbody></table></figure>
<!-- /wp:table -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"surface","textColor":"contrast","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained","contentSize":"960px"}} -->
<div class="wp-block-group alignfull has-contrast-color has-surface-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"contrast","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|4"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--4)"><?php esc_html_e( '100% Free Forever. No Pro Tier.', 'gratis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"contrast-2","fontSize":"md","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
<p class="has-text-align-center has-contrast-2-color has-text-color has-md-font-size" style="margin-bottom:var(--wp--preset--spacing--10)"><?php esc_html_e( 'Every plugin, pattern, CLI command, and update ships unlocked under GPL-2.0-or-later. Choose how you want to install:', 'gratis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-columns">

<!-- wp:column {"style":{"border":{"radius":"var:custom|radius|lg","width":"2px","color":"var:preset|color|primary","style":"solid"},"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--primary);border-style:solid;border-width:2px;border-radius:var(--wp--custom--radius--lg);padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( '1. Suite Hub (Recommended)', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo wp_kses_post( __( 'Install <strong>Gratis Installer</strong> to browse every module, check environment health, and activate only the plugins your site needs.', 'gratis' ) ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"radius":"var:custom|radius|lg","width":"1px","color":"var:preset|color|border","style":"solid"},"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--border);border-style:solid;border-width:1px;border-radius:var(--wp--custom--radius--lg);padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( '2. Standalone ZIPs', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo wp_kses_post( __( 'Need only caching, SEO, security, or consent? <a href="/downloads/">Download any individual plugin ZIP</a> and upload it via <em>Plugins &rarr; Add New</em>.', 'gratis' ) ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"radius":"var:custom|radius|lg","width":"1px","color":"var:preset|color|border","style":"solid"},"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|6","bottom":"var:preset|spacing|8","left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--border);border-style:solid;border-width:1px;border-radius:var(--wp--custom--radius--lg);padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl"} -->
<h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size"><?php esc_html_e( '3. WP-CLI & Git', 'gratis' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} -->
<p class="has-contrast-2-color has-text-color has-sm-font-size"><?php esc_html_e( 'Automate across staging and agency fleets with WP-CLI, Docker FrankenPHP parity images, and repeatable deployment scripts.', 'gratis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"contrast","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|6"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--6)"><?php esc_html_e( 'Get started in 30 seconds', 'gratis' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:code {"fontSize":"sm","style":{"spacing":{"padding":{"top":"var:preset|spacing|6","right":"var:preset|spacing|6","bottom":"var:preset|spacing|6","left":"var:preset|spacing|6"}}}} -->
<pre class="wp-block-code has-sm-font-size" style="padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)"><code>wp plugin install gratis-cache-*.zip gratis-security-*.zip gratis-seo-*.zip --activate
wp theme install gratis-theme-*.zip --activate
wp gratis-cache dropin install
wp gratis-cache status</code></pre>
<!-- /wp:code -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|8"},"blockGap":"var:preset|spacing|4"}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--8)">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/downloads/"><?php esc_html_e( 'Download All ZIPs', 'gratis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/docs/"><?php esc_html_e( 'Read Quick Start Guide', 'gratis' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/demo/"><?php esc_html_e( 'Try Live Demos', 'gratis' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
