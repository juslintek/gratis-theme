<?php
/**
 * GRATIS Theme — functions.php
 * Performance hooks only. Zero bloat.
 */

// ── Setup ─────────────────────────────────────────────────────────────────────
add_action('after_setup_theme', function () {
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', ['comment-list','comment-form','search-form','gallery','caption','style','script']);
    add_theme_support('post-thumbnails');
    add_image_size('gratis-card', 640, 360, true);
    add_image_size('gratis-card-2x', 1280, 720, true);
    add_theme_support('title-tag');
    load_theme_textdomain('gratis', get_template_directory() . '/languages');
});

// ── OG Meta fallback ──────────────────────────────────────────────────────────
add_action('wp_head', function () {
    // Defer Open Graph / Twitter Card output to the Gratis SEO plugin when it is
    // active, so the document never emits duplicate og:/twitter: tags. The
    // `gratis_theme_emit_meta` filter overrides this (default: emit only when
    // Gratis SEO is absent).
    $emit_meta = ! class_exists('\Gratis\SEO\MetaTags');
    if (! apply_filters('gratis_theme_emit_meta', $emit_meta)) {
        return;
    }

    // Open Graph
    $title = wp_get_document_title();
    $desc  = (string) get_bloginfo('description');
    $url   = is_singular() ? (string) get_permalink() : home_url('/');
    if (is_singular()) {
        $post = get_post();
        if ($post instanceof WP_Post) {
            $excerpt = trim((string) $post->post_excerpt);
            $trimmed = wp_trim_words(wp_strip_all_tags((string) $post->post_content), 30);
            $desc    = '' !== $excerpt ? wp_strip_all_tags($excerpt) : ('' !== trim($trimmed) ? $trimmed : $desc);
        }
    }
    $site_name = (string) get_bloginfo('name');
    if ('' === $site_name) {
        $site_name = 'GRATIS';
    }
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    if ('' !== $desc) {
        echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    }
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    if ('' !== $desc) {
        echo '<meta name="twitter:description" content="' . esc_attr($desc) . '">' . "\n";
    }
}, 1);

// ── Gratis Cache Integration ──────────────────────────────────────────────────
require_once get_template_directory() . '/inc/cache-integration.php';



// Fix Lithuanian quote conversion via output buffer (locale-safe)
add_action('template_redirect', function () {
    ob_start(function ($html) {
        return str_replace(
            ["\xe2\x80\x9e", '&#8222;', '&bdquo;'],
            ["\xe2\x80\x9c", '&#8220;', '&ldquo;'],
            $html
        );
    });
});

// ── WooCommerce cleanup ───────────────────────────────────────────────────
add_action('init', function () {
    // Remove WC breadcrumbs from injecting above content
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    // Remove WC page title (we have our own in template)
    add_filter('woocommerce_show_page_title', '__return_false');
});

// ── SEO fixes ─────────────────────────────────────────────────────────────
// Guard front page against accidental WooCommerce noindex while respecting
// Settings -> Reading (blog_public), Gratis SEO per-post noindex/nofollow, and
// WooCommerce cart/checkout/account/endpoint pages.
add_filter('wp_robots', function ($robots) {
    if (! is_front_page() && ! is_home()) {
        return $robots;
    }
    if (! function_exists('wc_page_no_robots') || empty($robots['noindex'])) {
        return $robots;
    }
    if ('0' === (string) get_option('blog_public', '1')) {
        return $robots;
    }
    if (
        (function_exists('is_cart') && is_cart())
        || (function_exists('is_checkout') && is_checkout())
        || (function_exists('is_account_page') && is_account_page())
        || (function_exists('is_wc_endpoint_url') && is_wc_endpoint_url())
    ) {
        return $robots;
    }
    $post_id = (int) get_queried_object_id();
    if ($post_id > 0 && (get_post_meta($post_id, '_gratis_seo_noindex', true) || get_post_meta($post_id, '_gratis_seo_nofollow', true))) {
        return $robots;
    }
    unset($robots['noindex']);
    return $robots;
}, 999);

// Add meta description fallback only when Gratis SEO is not active.
add_action('wp_head', function () {
    $emit_meta = ! class_exists('\Gratis\SEO\MetaTags');
    if (! apply_filters('gratis_theme_emit_meta', $emit_meta)) {
        return;
    }
    if (is_front_page() || is_singular()) {
        $post_id = (int) get_queried_object_id();
        $desc    = $post_id ? (string) get_post_meta($post_id, '_gratis_seo_desc', true) : '';
        if ('' === $desc && is_front_page()) {
            $desc = (string) get_bloginfo('description');
        } elseif ('' === $desc) {
            $desc = (string) (get_the_excerpt() ?: get_bloginfo('description'));
        }
        $clean = trim(wp_strip_all_tags($desc));
        if ('' !== $clean) {
            echo '<meta name="description" content="' . esc_attr($clean) . '">' . PHP_EOL;
        }
    }
}, 2);

// Fix H1 in site-title — demote to span when on front page (hero has the real H1)
add_filter('the_title', function ($title) {
    return $title;
});

// Cache headers for static assets
add_action('send_headers', function () {
    if (!is_admin()) {
        header('Vary: Accept-Encoding');
    }
});

// ── Enqueue search + notifications + animations ───────────────────────────
add_action('wp_enqueue_scripts', function () {
    $v = '1.0.3';
    wp_enqueue_style('gratis-components', get_template_directory_uri() . '/assets/css/components.css', [], $v);
    wp_enqueue_style('gratis-animations', get_template_directory_uri() . '/assets/css/animations.css', [], $v);
    wp_enqueue_script('gratis-search', get_template_directory_uri() . '/assets/js/search.js', [], $v, true);
    wp_enqueue_script('gratis-notifications', get_template_directory_uri() . '/assets/js/notifications.js', [], $v, true);
    wp_enqueue_script('gratis-animations', get_template_directory_uri() . '/assets/js/animations.js', [], $v, true);
    wp_localize_script('gratis-search', 'gratisSearch', [
        'restUrl' => rest_url('wp/v2/'),
        'nonce'   => wp_create_nonce('wp_rest'),
    ]);
});

// ── Dequeue classic theme styles not needed for FSE ───────────────────────────
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('classic-theme-styles');
}, 100);

// Remove emoji — saves ~15KB JS + DNS lookup
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// Remove block library CSS on pages with no blocks
add_action('wp_enqueue_scripts', function () {
    if (!is_singular() || !has_blocks()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
    }
}, 100);

// ── Cache-Control headers ─────────────────────────────────────────────────────
add_action('send_headers', function () {
    if (is_user_logged_in() || is_admin()) {
        return;
    }
    // Aggressive caching for anonymous visitors
    // stale-while-revalidate: serve stale instantly, fetch fresh in background
    // stale-if-error: serve stale for 7 days if origin is down
    header('Cache-Control: public, max-age=3600, stale-while-revalidate=86400, stale-if-error=604800');
    header('Vary: Accept-Encoding');
});

// ── Cache-Tag headers (for CDN tag-based purging) ─────────────────────────────
add_action('send_headers', function () {
    if (is_user_logged_in() || is_admin() || !is_singular()) {
        return;
    }
    $tags = [];
    $post = get_queried_object();
    if ($post instanceof WP_Post) {
        $tags[] = 'post-' . $post->ID;
        $tags[] = 'type-' . $post->post_type;
        foreach (get_post_taxonomies($post) as $tax) {
            foreach (wp_get_post_terms($post->ID, $tax, ['fields' => 'ids']) as $tid) {
                $tags[] = 'term-' . $tid;
            }
        }
    }
    if ($tags) {
        header('Cache-Tag: ' . implode(',', $tags));
        header('Surrogate-Key: ' . implode(' ', $tags)); // Fastly/Cloudflare format
    }
});

// ── Preconnect hints ──────────────────────────────────────────────────────────
add_action('wp_head', function () {
    // Preconnect to self for font/asset preloading
    echo '<link rel="preconnect" href="' . esc_url(home_url()) . '">' . "\n";
    // DNS prefetch for common third-party services (only if used)
    // echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
}, 1);

// ── Block styles registration ─────────────────────────────────────────────────
add_action('init', function () {
    // Button variants
    register_block_style('core/button', ['name' => 'outline',   'label' => __('Outline', 'gratis')]);
    register_block_style('core/button', ['name' => 'ghost',     'label' => __('Ghost', 'gratis')]);
    register_block_style('core/button', ['name' => 'pill',      'label' => __('Pill', 'gratis')]);
    register_block_style('core/button', ['name' => 'icon-only', 'label' => __('Icon Only', 'gratis')]);

    // Image variants
    register_block_style('core/image', ['name' => 'rounded',    'label' => __('Rounded', 'gratis')]);
    register_block_style('core/image', ['name' => 'shadow',     'label' => __('Shadow', 'gratis')]);
    register_block_style('core/image', ['name' => 'border',     'label' => __('Border', 'gratis')]);

    // Group/section variants
    register_block_style('core/group', ['name' => 'card',       'label' => __('Card', 'gratis')]);
    register_block_style('core/group', ['name' => 'card-dark',  'label' => __('Card Dark', 'gratis')]);
    register_block_style('core/group', ['name' => 'glass',      'label' => __('Glass', 'gratis')]);
    register_block_style('core/group', ['name' => 'bordered',   'label' => __('Bordered', 'gratis')]);

    // Separator variants
    register_block_style('core/separator', ['name' => 'thick',  'label' => __('Thick', 'gratis')]);
    register_block_style('core/separator', ['name' => 'dotted', 'label' => __('Dotted', 'gratis')]);

    // Quote variants
    register_block_style('core/quote', ['name' => 'large',      'label' => __('Large', 'gratis')]);
    register_block_style('core/quote', ['name' => 'plain',      'label' => __('Plain', 'gratis')]);

    // List variants
    register_block_style('core/list', ['name' => 'check',       'label' => __('Checkmarks', 'gratis')]);
    register_block_style('core/list', ['name' => 'no-disc',     'label' => __('No Bullet', 'gratis')]);
});

// ── Pattern categories ────────────────────────────────────────────────────────
add_action('init', function () {
    $categories = [
        'gratis-heroes'       => __('Heroes', 'gratis'),
        'gratis-sections'     => __('Sections', 'gratis'),
        'gratis-cards'        => __('Cards', 'gratis'),
        'gratis-cta'          => __('Call to Action', 'gratis'),
        'gratis-features'     => __('Features', 'gratis'),
        'gratis-pricing'      => __('Pricing', 'gratis'),
        'gratis-team'         => __('Team', 'gratis'),
        'gratis-testimonials' => __('Testimonials', 'gratis'),
        'gratis-stats'        => __('Stats', 'gratis'),
        'gratis-faq'          => __('FAQ', 'gratis'),
        'gratis-forms'        => __('Forms', 'gratis'),
        'gratis-navigation'   => __('Navigation', 'gratis'),
        'gratis-footer'       => __('Footer', 'gratis'),
        'gratis-blog'         => __('Blog', 'gratis'),
        'gratis-portfolio'    => __('Portfolio', 'gratis'),
        'gratis-woocommerce'  => __('WooCommerce', 'gratis'),
        'gratis-membership'   => __('Membership', 'gratis'),
        'gratis-about'        => __('About', 'gratis'),
        'gratis-contact'      => __('Contact', 'gratis'),
    ];
    foreach ($categories as $slug => $label) {
        register_block_pattern_category($slug, ['label' => $label]);
    }
});

// ── Inline critical CSS ───────────────────────────────────────────────────────
add_action('wp_head', function () {
    // Minimal above-fold CSS — layout stability, no FOUC
    echo '<style id="gratis-critical">
:root{--gratis-header-h:64px}
[id]{scroll-margin-top:80px}
*,::before,::after{box-sizing:border-box}
body{margin:0;-webkit-font-smoothing:antialiased}
img,video{max-width:100%;height:auto}
.gratis-header{height:var(--gratis-header-h);z-index:var(--wp--custom--z-index--sticky)}

/* ── Post content styles (dark theme) ── */
.wp-block-post-content{color:#ffffff}
.wp-block-post-content p{color:rgba(255,255,255,0.75);line-height:1.8;font-size:16px}
.wp-block-post-content h1,.wp-block-post-content h2,.wp-block-post-content h3,
.wp-block-post-content h4,.wp-block-post-content h5,.wp-block-post-content h6{color:#ffffff}
.wp-block-post-content a:not(.wp-block-button__link){color:#60a5fa}
.wp-block-post-content a:not(.wp-block-button__link):hover{color:#93c5fd}
.wp-block-post-content pre{background:#0a0c10;border:1px solid rgba(255,255,255,0.1);border-radius:12px;padding:24px 28px;overflow-x:auto;font-size:14px;line-height:1.7;margin:24px 0;position:relative}
.wp-block-post-content pre code{background:none;border:none;padding:0;color:#e2e8f0;font-family:Consolas,monospace}
.wp-block-post-content code{background:#1e2433;color:#60a5fa;border:1px solid rgba(96,165,250,0.2);border-radius:5px;padding:2px 7px;font-size:0.875em;font-family:Consolas,monospace}
/* Syntax highlight colors */
.wp-block-post-content pre .token.keyword,.wp-block-post-content pre .hljs-keyword{color:#c792ea}
.wp-block-post-content pre .token.string,.wp-block-post-content pre .hljs-string{color:#c3e88d}
.wp-block-post-content pre .token.comment,.wp-block-post-content pre .hljs-comment{color:#546e7a;font-style:italic}
.wp-block-post-content pre{padding:20px;overflow-x:auto}
.wp-block-post-content code{padding:2px 6px;font-size:0.9em}
.wp-block-post-content ul,.wp-block-post-content ol{color:rgba(255,255,255,0.75)}
.wp-block-post-content strong{color:#ffffff}
.wp-block-post-content blockquote{border-left:3px solid #2563eb;padding-left:20px;color:rgba(255,255,255,0.6);font-style:italic}
/* Docs page overflow fix */
.wp-block-post-content [style*="grid-template-columns:220px 1fr"]{overflow:hidden}
.wp-block-post-content [style*="grid-template-columns:220px 1fr"] > div:last-child{min-width:0;overflow:hidden} /* docs-overflow */
/* WooCommerce dark theme */
.woocommerce-page .woocommerce,.woocommerce{color:#ffffff}
.woocommerce .price,.woocommerce-Price-amount{color:#60a5fa!important}
.woocommerce .button,.woocommerce button.button{background:#2563eb;color:#fff;border-radius:8px}
/* Archive/blog dark */
.wp-block-query-title{color:#ffffff!important}

/* ── Accessibility fixes ── */
/* Contrast: WCAG AA requires 4.5:1 ratio for normal text */
/* rgba(255,255,255,0.4) on #161a20 = ~2.8:1 FAIL → use 0.65 = ~4.6:1 PASS */
/* These selectors target the dim author role text in testimonials */
.gratis-bell-item time{color:#6b7280!important}
/* Fix any inline rgba(255,255,255,0.4) contrast failures */
[style*="rgba(255,255,255,0.4)"]{color:rgba(255,255,255,0.65)!important}
[style*="rgba(255,255,255,0.25)"]{color:rgba(255,255,255,0.5)!important}
[style*="rgba(255,255,255,0.3)"]{color:rgba(255,255,255,0.55)!important}
/* Touch targets: min 44x44px */
.gratis-toast-close{min-width:44px;min-height:44px;display:flex;align-items:center;justify-content:center}
.gratis-bell{min-width:44px;min-height:44px}
.wp-block-navigation-item__content{padding:8px 4px!important;min-height:44px;display:flex;align-items:center}
/* Skip link */
.gratis-skip-link{position:absolute;top:-100px;left:0;background:#2563eb;color:#fff;padding:8px 16px;z-index:99999;border-radius:0 0 8px 0;font-weight:600;text-decoration:none}
.gratis-skip-link:focus{top:0}

/* ── Global resets ── */
html{background:#0d0f12}body{margin:0;padding:0;background:#0d0f12!important}
/* Kill only the top-level site-blocks gap (header→main gap) */
.wp-site-blocks{--wp--style--block-gap:0px}
/* Kill ALL WP block gaps that cause white strips */
/* Kill gaps between top-level page sections only */
.wp-block-post-content.is-layout-flow>.wp-block-group+.wp-block-group{margin-block-start:0!important}
.entry-content.is-layout-flow>.wp-block-group+.wp-block-group{margin-block-start:0!important}
.wp-site-blocks{padding-top:0!important;padding-bottom:0!important;row-gap:0!important}
.wp-site-blocks>*+*{margin-block-start:0!important}
body>.wp-site-blocks>header+*{margin-top:0!important}
main.wp-block-group{margin-top:0!important}
/* Kill ALL gaps between header and content */
.wp-block-template-part+*{margin-block-start:0!important}
header.wp-block-template-part{display:contents}
/* The main block after header gets 2rem gap from WP — kill it */
:where(.wp-site-blocks)>main{margin-block-start:0!important}
:where(.wp-site-blocks)>*+main{margin-block-start:0!important}
.wp-site-blocks>main.wp-block-group{margin-top:0!important;margin-block-start:0!important}
.wp-block-post-content{margin-top:0!important}
/* Nav fallback — hide page list link text overflow */
.gratis-header .wp-block-page-list a{
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:200px
}
/* Header dark background — WP strips rgba from inline styles */
.gratis-header{
  background:rgba(13,15,18,0.95)!important;
  backdrop-filter:blur(12px)!important;
  -webkit-backdrop-filter:blur(12px)!important;
  border-bottom:1px solid rgba(255,255,255,0.08)!important;
  position:sticky!important;
  top:0!important;
  z-index:1000!important;
}
.gratis-header .wp-block-site-title a{color:#ffffff!important;text-decoration:none!important}
.gratis-header .wp-block-navigation a{color:rgba(255,255,255,0.75)!important}
.gratis-header .wp-block-navigation a:hover{color:#ffffff!important}
.wp-site-blocks{padding:0!important}
.entry-content,.wp-block-post-content{padding:0!important}
/* Hide site tagline in header */
.gratis-header .wp-block-site-tagline{display:none!important}
/* Hero headline override — WP strips clamp() from inline styles */
.gratis-hero h1{
  font-size:clamp(2.5rem,2rem + 2.5vw,5rem)!important;
  font-weight:800!important;
  line-height:1.05!important;
  letter-spacing:-0.03em!important;
}
/* Button style variants */
.wp-block-button.is-style-outline .wp-block-button__link{background:transparent;border:2px solid currentColor;color:var(--wp--preset--color--primary)}
.wp-block-button.is-style-ghost .wp-block-button__link{background:transparent;color:var(--wp--preset--color--primary)}
.wp-block-button.is-style-pill .wp-block-button__link{border-radius:var(--wp--custom--radius--full)}
/* Card group & column styles */
.wp-block-group.is-style-card{background:var(--wp--preset--color--base);border:1px solid var(--wp--preset--color--border);border-radius:var(--wp--custom--radius--lg);box-shadow:var(--wp--preset--shadow--sm)}
.wp-block-group.is-style-card-dark{background:var(--wp--preset--color--base-dark);color:var(--wp--preset--color--base);border-radius:var(--wp--custom--radius--lg)}
.wp-block-group.is-style-glass{background:rgba(255,255,255,0.7);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.3);border-radius:var(--wp--custom--radius--lg)}
.wp-block-group.is-style-bordered,.wp-block-column.is-style-bordered{background:#131720;border:1px solid rgba(255,255,255,0.10);border-radius:14px;transition:border-color 180ms ease,transform 180ms ease,background-color 180ms ease}
.wp-block-column.is-style-bordered:hover{border-color:rgba(52,211,153,0.42);background:#171d29;transform:translateY(-2px)}
/* Hero ambient radial glow */
.gratis-hero-section{background:radial-gradient(ellipse 80% 55% at 50% -10%,rgba(52,211,153,0.16),transparent 65%),radial-gradient(ellipse 60% 45% at 80% 20%,rgba(56,189,248,0.10),transparent 60%),#0d0f12!important}
.gratis-hero-section .wp-block-cover__background{background:transparent!important}
/* Modern comparison & data tables */
.wp-block-table{overflow-x:auto}
.wp-block-table table{border-collapse:separate;border-spacing:0;width:100%;background:#131720;border:1px solid rgba(255,255,255,0.10);border-radius:14px;overflow:hidden}
.wp-block-table th{background:#181e2b;color:#f8fafc;font-weight:700;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.06em;padding:14px 18px;border:none;border-bottom:1px solid rgba(255,255,255,0.10);text-align:left}
.wp-block-table td{padding:14px 18px;border:none;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.82)}
.wp-block-table tr:last-child td{border-bottom:none}
.wp-block-table tbody tr:hover td{background:rgba(255,255,255,0.03)}
.wp-block-table td strong{color:#34d399}
/* Share bar spacing inside content */
.gratis-share{margin:2rem 0 0;padding-top:1.5rem;border-top:1px solid rgba(255,255,255,0.08)}
/* Button hover polish */
.wp-block-button__link{transition:transform 150ms ease,box-shadow 150ms ease,border-color 150ms ease,background-color 150ms ease}
.wp-block-button__link:hover{transform:translateY(-1px)}
/* Downloads & plugin catalog cards */
.gratis-catalog-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(310px,1fr));gap:18px;margin:1.5rem 0 2.5rem}
.gratis-catalog-card{display:flex;flex-direction:column;justify-content:space-between;background:#131720;border:1px solid rgba(255,255,255,0.10);border-radius:14px;padding:22px;transition:border-color 180ms ease,transform 180ms ease,background-color 180ms ease}
.gratis-catalog-card:hover{border-color:rgba(52,211,153,0.45);background:#171d29;transform:translateY(-2px)}
.gratis-catalog-head{display:flex;align-items:center;justify-content:space-between;gap:10px;margin-bottom:8px}
.gratis-catalog-title{font-size:1.05rem;font-weight:700;color:#ffffff;margin:0}
.gratis-catalog-ver{font-size:0.75rem;font-weight:600;color:#34d399;background:rgba(52,211,153,0.12);border:1px solid rgba(52,211,153,0.25);padding:2px 8px;border-radius:999px;white-space:nowrap}
.gratis-catalog-desc{font-size:0.9rem;line-height:1.55;color:rgba(255,255,255,0.74);margin:0 0 16px;flex:1}
.gratis-catalog-actions{display:flex;flex-wrap:wrap;gap:8px;align-items:center}
.gratis-dl-btn{display:inline-flex;align-items:center;gap:6px;padding:8px 14px;border-radius:8px;font-size:0.84rem;font-weight:600;text-decoration:none!important;background:#22c55e;color:#052e16!important;transition:background-color 150ms ease}
.gratis-dl-btn:hover{background:#4ade80;color:#052e16!important}
.gratis-ghost-btn{display:inline-flex;align-items:center;gap:5px;padding:7px 12px;border-radius:8px;font-size:0.84rem;font-weight:600;text-decoration:none!important;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.12);color:#e2e8f0!important;transition:border-color 150ms ease,background-color 150ms ease}
.gratis-ghost-btn:hover{border-color:rgba(255,255,255,0.3);background:rgba(255,255,255,0.1);color:#ffffff!important}
.gratis-cat-heading{font-size:1.35rem;font-weight:700;color:#ffffff;margin:2.5rem 0 0.5rem;padding-bottom:0.5rem;border-bottom:1px solid rgba(255,255,255,0.08)}
.gratis-page-wrap{max-width:1180px;margin:0 auto;padding:56px 24px 80px}
/* Screen reader utility (needed when wp-block-library is dequeued on non-singular pages) */
.screen-reader-text{border:0;clip:rect(1px,1px,1px,1px);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;word-wrap:normal!important}
/* Reviews aggregate rating high contrast on dark card */
.gratis-aggregate-rating{display:inline-flex;align-items:center;gap:10px;flex-wrap:wrap;justify-content:center}
.gratis-aggregate-rating-text{color:#e2e8f0!important;font-size:1rem;font-weight:600}
/* Dark-mode plugin showcase widgets (Kanban board, Booking, Learn, Events, Community) */
.gratis-board{display:grid!important;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px!important}
.gratis-board-col{min-width:0!important;background:#131720!important;color:#f8fafc!important;border:1px solid rgba(255,255,255,0.10)!important;border-radius:12px!important;padding:16px!important}
.gratis-board-col h3{color:#f8fafc!important;font-weight:700!important;font-size:0.9rem!important;text-transform:uppercase;letter-spacing:0.05em;padding-bottom:10px;border-bottom:1px solid rgba(255,255,255,0.08)}
.gratis-board-col .gratis-card{background:#1b2232!important;color:#f8fafc!important;border:1px solid rgba(255,255,255,0.10)!important;border-radius:10px!important;padding:12px!important}
.gratis-board-col .gratis-card strong{color:#ffffff!important;display:block;margin-bottom:6px;font-size:0.92rem}
.gratis-board-col .gratis-card span,.gratis-board-col .gratis-card-priority{display:inline-block;margin-left:0!important;padding:2px 8px;border-radius:999px;background:rgba(52,211,153,0.14);color:#6ee7b7!important;font-size:0.75rem!important;font-weight:600}
.gratis-board-col .gratis-board-empty,.gratis-board-col p{color:rgba(255,255,255,0.58)!important}
.gratis-booking-form{display:flex;flex-direction:column;gap:18px}
.gratis-booking-row{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px}
.gratis-booking-field{display:flex;flex-direction:column;gap:8px}
.gratis-booking-field label,.gratis-booking-label{font-size:0.85rem;font-weight:600;color:#e2e8f0}
.gratis-booking-field select,.gratis-booking-field input{background:#131720;color:#ffffff;border:1px solid rgba(255,255,255,0.16);border-radius:8px;padding:10px 12px;font-size:0.95rem}
.gratis-booking-slots{display:flex;flex-wrap:wrap;gap:8px}
.gratis-booking-slot{background:#131720;color:#e2e8f0;border:1px solid rgba(255,255,255,0.16);border-radius:8px;padding:8px 14px;font-size:0.88rem;font-weight:600;cursor:pointer;transition:all 150ms ease}
.gratis-booking-slot:hover{border-color:#34d399;color:#ffffff}
.gratis-booking-slot.is-selected{background:#22c55e;border-color:#22c55e;color:#052e16}
.gratis-booking-submit{align-self:flex-start;background:#22c55e;color:#052e16;border:none;border-radius:8px;padding:12px 22px;font-size:0.95rem;font-weight:700;cursor:pointer;transition:background-color 150ms ease}
.gratis-booking-submit:hover{background:#4ade80}
.gratis-booking-status{margin:0;font-size:0.9rem;min-height:1.4em}
.gratis-booking-status.is-success{color:#34d399}
.gratis-booking-status.is-error{color:#f87171}
.gratis-course-catalog{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:18px}
.gratis-course-card{background:#131720;border:1px solid rgba(255,255,255,0.10);border-radius:12px;padding:20px;display:flex;flex-direction:column;gap:12px}
.gratis-course-card__head{display:flex;align-items:flex-start;justify-content:space-between;gap:10px}
.gratis-course-card__title{margin:0;font-size:1.08rem;font-weight:700;line-height:1.3}
.gratis-course-card__title a{color:#ffffff!important;text-decoration:none}
.gratis-course-card__title a:hover{color:#34d399!important}
.gratis-course-card__count{font-size:0.75rem;font-weight:600;color:#34d399;background:rgba(52,211,153,0.12);border:1px solid rgba(52,211,153,0.25);padding:2px 8px;border-radius:999px;white-space:nowrap}
.gratis-course-card__desc{margin:0;color:rgba(255,255,255,0.74);font-size:0.9rem;line-height:1.55}
.gratis-course-outline{margin:0;padding-left:20px;display:flex;flex-direction:column;gap:6px;color:rgba(255,255,255,0.78);font-size:0.88rem}
.gratis-course-outline a{color:#93c5fd!important;text-decoration:none}
.gratis-course-outline a:hover{text-decoration:underline}
.gratis-events-list{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:16px;list-style:none;padding:0;margin:0}
.gratis-events-list li,.gratis-event-item{background:#131720;border:1px solid rgba(255,255,255,0.10);border-radius:12px;padding:18px;display:flex;flex-direction:column;gap:6px}
.gratis-events-list a,.gratis-event-item a{color:#ffffff!important;font-weight:700;text-decoration:none;font-size:1rem}
.gratis-events-list a:hover,.gratis-event-item a:hover{color:#34d399!important}
.gratis-activity-feed{display:flex;flex-direction:column;gap:4px}
.gratis-activity-item{padding:14px 16px!important;background:#131720;border:1px solid rgba(255,255,255,0.08)!important;border-radius:10px;margin-bottom:8px;color:rgba(255,255,255,0.85)}
.gratis-activity-item strong{color:#ffffff}
.gratis-activity-item small{color:#94a3b8!important;margin-left:6px}
/* Compact sleek cookie banner */
#gratis-consent{padding:14px 20px!important;background:rgba(17,20,28,0.96)!important;backdrop-filter:blur(12px);border-top:1px solid rgba(255,255,255,0.12)!important}
/* Image styles */
.wp-block-image.is-style-rounded img{border-radius:var(--wp--custom--radius--full)}
.wp-block-image.is-style-shadow img{box-shadow:var(--wp--preset--shadow--lg)}
.wp-block-image.is-style-border img{border:4px solid var(--wp--preset--color--border)}
/* List styles */
.wp-block-list.is-style-check{list-style:none;padding-left:0}
.wp-block-list.is-style-check li::before{content:"✓ ";color:var(--wp--preset--color--success);font-weight:700}
.wp-block-list.is-style-no-disc{list-style:none;padding-left:0}
/* Separator styles */
.wp-block-separator.is-style-thick{border-width:3px}
.wp-block-separator.is-style-dotted{border-style:dotted}

/* ── RESPONSIVE / MOBILE ─────────────────────────────────────────────── */
@media(max-width:768px){
  /* Force all inline grids to stack on mobile */
  [style*="grid-template-columns"]{grid-template-columns:1fr!important}
  [style*="display:grid"]{gap:16px!important}
  /* Fix inline flex rows to wrap */
  [style*="display:flex"][style*="gap"]{flex-wrap:wrap!important}
  /* Reduce padding on mobile */
  [style*="padding:80px"]{padding:48px 16px!important}
  [style*="padding-top:80px"]{padding-top:48px!important;padding-bottom:48px!important}
  [style*="padding:100px"]{padding:48px 16px!important}
  [style*="padding:120px"]{padding:64px 16px!important}
  [style*="padding-top:120px"]{padding-top:64px!important}
  /* Fix hero headline on mobile */
  .gratis-hero h1{font-size:clamp(2rem,1.5rem+3vw,3.5rem)!important}
  /* Fix constrained layout padding */
  .has-global-padding{padding-left:16px!important;padding-right:16px!important}
  .is-layout-constrained>:where(:not(.alignleft):not(.alignright):not(.alignfull)){margin-left:16px!important;margin-right:16px!important}
  /* Fix nav on mobile */
  .gratis-header .wp-block-navigation{font-size:13px!important}
  /* Fix docs sidebar */
  [style*="grid-template-columns:240px 1fr"]{grid-template-columns:1fr!important}
  [style*="grid-template-columns:220px 1fr"]{grid-template-columns:1fr!important}
  [style*="position:sticky"]{position:static!important}
  /* Fix pricing cards */
  [style*="grid-template-columns:repeat(auto-fit,minmax(280px"]{grid-template-columns:1fr!important}
  /* Fix comparison table */
  table{font-size:12px!important}
  table th,table td{padding:8px 6px!important}
  /* Fix buttons row */
  .wp-block-buttons{flex-wrap:wrap!important}
  .wp-block-button{width:100%}
  .wp-block-button__link{width:100%;text-align:center!important}
  /* Fix pattern gallery cards */
  [style*="grid-template-columns:repeat(auto-fill,minmax(340px"]{grid-template-columns:1fr!important}
  /* Fix contact form grid */
  [style*="grid-template-columns:1fr 1fr"]{grid-template-columns:1fr!important}
  /* Fix about page grid */
  [style*="grid-template-columns:1fr 1fr"]{grid-template-columns:1fr!important}
  /* Fix stats row */
  [style*="grid-template-columns:repeat(4,1fr)"]{grid-template-columns:repeat(2,1fr)!important}
  /* Fix bell panel */
  .gratis-bell-panel{right:-100px!important;width:280px!important}
  /* Fix toast width */
  #gratis-toasts{max-width:calc(100vw - 32px)!important;left:16px!important}
}
@media(max-width:480px){
  .gratis-header .wp-block-site-title{font-size:18px!important}
  [style*="grid-template-columns:repeat(2,1fr)"]{grid-template-columns:1fr!important}
  [style*="font-size:clamp(3rem"]{font-size:2rem!important}
  [style*="font-size:clamp(2.5rem"]{font-size:1.75rem!important}
}
</style>' . "\n";
}, 2);

// ── Remove Gutenberg block patterns from core/remote (keep only ours) ─────────
add_filter('should_load_remote_block_patterns', '__return_false');

// Output gap fix AFTER WP global styles (priority 999)
add_action('wp_head', function () {
    echo '<style id="gratis-gap-fix">
html{background:#0d0f12!important}
body{background:#0d0f12!important}
.wp-site-blocks{--wp--style--block-gap:0px!important}
.gratis-howto-box{background:#1B2336!important;border:1px solid #334155!important}
.gratis-howto-box *{color:#ffffff!important}
.gratis-howto-box p{color:rgba(255,255,255,0.9)!important}
.gratis-howto-box a{color:#93C5FD!important;text-decoration:underline!important}

:where(.wp-site-blocks)>*{margin-block-start:0!important}
:where(.wp-site-blocks)>:first-child{margin-block-start:0!important}
</style>';
}, 999);

// ── Demo page showcase styles ─────────────────────────────────────────────────
add_action('wp_enqueue_scripts', function () {
    $load = false;
    if (is_page()) {
        // Load on demo child pages (parent ID 224) or the demo parent itself.
        $post = get_queried_object();
        $load = $post && ($post->post_parent === 224 || $post->ID === 224);
    } elseif (is_post_type_archive(['gratis_event', 'gratis_course']) || is_singular(['gratis_event', 'gratis_course'])) {
        // Also load on the Events/Courses archives and single views so their
        // card-grid templates can reuse the same .demo-* styling.
        $load = true;
    }
    if ($load) {
        wp_enqueue_style('gratis-demo-showcase', get_template_directory_uri() . '/assets/css/demo-showcase.css', ['gratis-components'], '1.0.0');
    }
});

// ── Task A: Blog post count in subtitle (P2-01) ───────────────────────────────
// Injects " — N articles" into the .blog-hero subtitle on home/archive pages.
add_action('wp_footer', function () {
    if (!is_home() && !is_archive()) {
        return;
    }
    $count = absint(wp_count_posts()->publish);
    echo '<script>(function(){var el=document.querySelector(".blog-hero p");if(el)el.textContent+=" \u2014 ' . absint($count) . ' articles";})()</script>' . "\n";
});

// ── Task D: Blog reading-time estimate (P2-05) ────────────────────────────────
// Uses render_block filter to append "N min read" after core/post-excerpt on archives.
add_filter('render_block', function ($html, $block) {
    if ('core/post-excerpt' !== $block['blockName']) {
        return $html;
    }
    // Only on blog/archive pages, not single posts
    if (!is_home() && !is_archive() && !is_category() && !is_tag()) {
        return $html;
    }
    global $post;
    if (!$post) {
        return $html;
    }
    $words   = str_word_count(wp_strip_all_tags($post->post_content));
    $minutes = max(1, (int) round($words / 200));
    /* translators: %d: estimated reading time in minutes. */
    $aria_label = sprintf(_n('%d minute read', '%d minute read', $minutes, 'gratis'), $minutes);
    /* translators: %d: estimated reading time in minutes. */
    $short_label = sprintf(_n('%d min read', '%d min read', $minutes, 'gratis'), $minutes);
    $rt_html     = '<p class="reading-time" aria-label="' . esc_attr($aria_label) . '" style="font-size:12px;color:rgba(255,255,255,0.45);margin:4px 0 0">'
        . '<span aria-hidden="true">⏱ </span>'
        . esc_html($short_label)
        . '</p>';
    return $html . $rt_html;
}, 10, 2);

// ── Task B: Events archive — show _start_date meta on cards (P2-03) ──────────
// Replaces the generic post-date with the event's _start_date meta on event archives.
add_filter('render_block', function ($html, $block) {
    if ('core/post-date' !== $block['blockName']) {
        return $html;
    }
    if (!is_post_type_archive('gratis_event') && !is_singular('gratis_event')) {
        return $html;
    }
    global $post;
    if (!$post) {
        return $html;
    }
    $start = get_post_meta($post->ID, '_start_date', true);
    if (!$start) {
        return $html; // fall back to post_date if no meta
    }
    $ts      = strtotime($start);
    $display = $ts ? date_i18n(get_option('date_format'), $ts) : esc_html($start);
    $iso     = $ts ? gmdate('c', $ts) : '';
    return '<div class="wp-block-post-date event-start-date" style="font-size:0.85rem;color:#94a3b8">'
        . '<time' . ($iso ? ' datetime="' . esc_attr($iso) . '"' : '') . '>'
        . '📅 ' . esc_html($display)
        . '</time></div>';
}, 10, 2);
