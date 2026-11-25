<?php
/**
 * GRATIS Theme — functions.php
 *
 * @package Gratis
 */

defined('ABSPATH') || exit;

// ── Setup ─────────────────────────────────────────────────────────────────────
add_action('after_setup_theme', function () {
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style([
        'assets/css/theme.css',
        'assets/css/components.css',
        'assets/css/demo-showcase.css',
    ]);
    add_theme_support('responsive-embeds');
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('post-thumbnails');
    add_image_size('gratis-card', 640, 360, true);
    add_image_size('gratis-card-2x', 1280, 720, true);
    add_theme_support('title-tag');
    load_theme_textdomain('gratis', get_template_directory() . '/languages');
});

// ── Gratis Cache Integration ──────────────────────────────────────────────────
require_once get_template_directory() . '/inc/cache-integration.php';

// ── WooCommerce cleanup ───────────────────────────────────────────────────────
add_action('init', function () {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    add_filter('woocommerce_show_page_title', '__return_false');
});

// ── Styles & Scripts ──────────────────────────────────────────────────────────
add_action('wp_enqueue_scripts', function () {
    $v = wp_get_theme()->get('Version');
    if (!$v) {
        $v = '1.0.2';
    }

    wp_enqueue_style('gratis-theme-styles', get_template_directory_uri() . '/assets/css/theme.css', [], $v);
    wp_enqueue_style('gratis-components', get_template_directory_uri() . '/assets/css/components.css', ['gratis-theme-styles'], $v);
    wp_enqueue_style('gratis-demo-showcase', get_template_directory_uri() . '/assets/css/demo-showcase.css', ['gratis-components'], $v);
    wp_enqueue_style('gratis-animations', get_template_directory_uri() . '/assets/css/animations.css', ['gratis-components'], $v);

    wp_enqueue_script('gratis-search', get_template_directory_uri() . '/assets/js/search.js', [], $v, true);
    wp_enqueue_script('gratis-notifications', get_template_directory_uri() . '/assets/js/notifications.js', [], $v, true);
    wp_enqueue_script('gratis-animations', get_template_directory_uri() . '/assets/js/animations.js', [], $v, true);

    if (is_home() || is_archive()) {
        $published = wp_count_posts();
        $count     = isset($published->publish) ? absint($published->publish) : 0;
        /* translators: %d: number of published articles. */
        $suffix = wp_json_encode(sprintf(' — %d %s', $count, _n('article', 'articles', $count, 'gratis')));
        wp_add_inline_script(
            'gratis-animations',
            '(function(){var el=document.querySelector(".blog-hero p");if(el)el.textContent+=' . $suffix . ';})();'
        );
    }

    wp_localize_script('gratis-search', 'gratisSearch', [
        'restUrl' => rest_url('wp/v2/'),
        'nonce'   => wp_create_nonce('wp_rest'),
    ]);
});

// ── Dequeue classic theme styles not needed for FSE ───────────────────────────
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('classic-theme-styles');
}, 100);

// ── Block styles registration ─────────────────────────────────────────────────
add_action('init', function () {
    // Button variants.
    register_block_style('core/button', ['name' => 'outline',   'label' => __('Outline', 'gratis')]);
    register_block_style('core/button', ['name' => 'ghost',     'label' => __('Ghost', 'gratis')]);
    register_block_style('core/button', ['name' => 'pill',      'label' => __('Pill', 'gratis')]);
    register_block_style('core/button', ['name' => 'icon-only', 'label' => __('Icon Only', 'gratis')]);

    // Image variants.
    register_block_style('core/image', ['name' => 'rounded', 'label' => __('Rounded', 'gratis')]);
    register_block_style('core/image', ['name' => 'shadow',  'label' => __('Shadow', 'gratis')]);
    register_block_style('core/image', ['name' => 'border',  'label' => __('Border', 'gratis')]);

    // Group/section variants.
    register_block_style('core/group', ['name' => 'card',      'label' => __('Card', 'gratis')]);
    register_block_style('core/group', ['name' => 'card-dark', 'label' => __('Card Dark', 'gratis')]);
    register_block_style('core/group', ['name' => 'glass',     'label' => __('Glass', 'gratis')]);
    register_block_style('core/group', ['name' => 'bordered',  'label' => __('Bordered', 'gratis')]);

    // Separator variants.
    register_block_style('core/separator', ['name' => 'thick',  'label' => __('Thick', 'gratis')]);
    register_block_style('core/separator', ['name' => 'dotted', 'label' => __('Dotted', 'gratis')]);

    // Quote variants.
    register_block_style('core/quote', ['name' => 'large', 'label' => __('Large', 'gratis')]);
    register_block_style('core/quote', ['name' => 'plain', 'label' => __('Plain', 'gratis')]);

    // List variants.
    register_block_style('core/list', ['name' => 'check',   'label' => __('Checkmarks', 'gratis')]);
    register_block_style('core/list', ['name' => 'no-disc', 'label' => __('No Bullet', 'gratis')]);
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

// ── Blog reading-time estimate ────────────────────────────────────────────────
add_filter('render_block', function ($html, $block) {
    if ('core/post-excerpt' !== ($block['blockName'] ?? '')) {
        return $html;
    }
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
    $rt_html     = '<p class="reading-time" aria-label="' . esc_attr($aria_label) . '">'
        . '<span aria-hidden="true">⏱ </span>'
        . esc_html($short_label)
        . '</p>';
    return $html . $rt_html;
}, 10, 2);

// ── Events archive: show _start_date meta on cards ────────────────────────────
add_filter('render_block', function ($html, $block) {
    if ('core/post-date' !== ($block['blockName'] ?? '')) {
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
        return $html;
    }
    $ts      = strtotime($start);
    $display = $ts ? date_i18n(get_option('date_format'), $ts) : (string) $start;
    $iso     = $ts ? gmdate('c', $ts) : '';
    return '<div class="wp-block-post-date event-start-date">'
        . '<time' . ($iso ? ' datetime="' . esc_attr($iso) . '"' : '') . '>'
        . '📅 ' . esc_html($display)
        . '</time></div>';
}, 10, 2);
