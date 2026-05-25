<?php
/**
 * GRATIS Theme — Cache Manager Integration
 * Emits events when theme files change, registers cache namespaces.
 */

defined('ABSPATH') || exit;

add_action('after_setup_theme', function () {
    // Only integrate if cache-manager is active
    if (!class_exists('VLT\CacheManager\Plugin')) return;

    // Register theme cache namespaces
    add_action('gratis_cache_register_namespaces', function (array &$ns) {
        $ns = array_merge($ns, [
            'theme', 'theme.json', 'global-styles', 'patterns',
            'templates', 'template-parts', 'assets', 'fonts',
        ]);
    });

    // Provide theme debug metadata
    add_filter('gratis_cache_debug_meta', function (array $meta) {
        $themeDir = get_stylesheet_directory();
        $themeJson = $themeDir . '/theme.json';
        $meta['theme'] = [
            'name'            => get_stylesheet(),
            'version'         => wp_get_theme()->get('Version'),
            'theme_json_hash' => file_exists($themeJson) ? substr(md5_file($themeJson), 0, 8) : null,
            'patterns'        => count(glob($themeDir . '/patterns/*.php')),
            'templates'       => count(glob($themeDir . '/templates/*.html')),
            'parts'           => count(glob($themeDir . '/parts/*.html')),
            'last_modified'   => date('c', max(array_map('filemtime', array_merge(
                glob($themeDir . '/*.php') ?: [],
                glob($themeDir . '/*.json') ?: [],
                glob($themeDir . '/*.css') ?: []
            )) ?: [0])),
        ];
        return $meta;
    });

    // Hook into file change detection — purge theme namespaces when theme files change
    add_action('gratis_cache_files_changed', function (array $changed) {
        $themeDir = get_stylesheet_directory();
        $themeChanges = array_filter($changed, fn($path) => str_contains($path, basename($themeDir)));

        if (empty($themeChanges)) return;

        // Determine which namespaces to purge
        foreach ($themeChanges as $path) {
            if (str_contains($path, 'theme.json')) {
                do_action('gratis_cache_purge_namespace', 'theme.json');
                do_action('gratis_cache_purge_namespace', 'global-styles');
            } elseif (str_contains($path, '/patterns/')) {
                do_action('gratis_cache_purge_namespace', 'patterns');
            } elseif (str_contains($path, '/templates/')) {
                do_action('gratis_cache_purge_namespace', 'templates');
            } elseif (str_contains($path, '/parts/')) {
                do_action('gratis_cache_purge_namespace', 'template-parts');
            }
        }

        do_action('gratis_cache_purge_namespace', 'theme');
        do_action('gratis_cache_event', 'theme.files_changed', [
            'count' => count($themeChanges),
        ]);
    });
}, 20);
