<?php
/**
 * Title: Content — Alternating Image Text
 * Slug: gratis/alternating-sections
 * Categories: gratis-sections
 * Keywords: alternating, image, text, features, rows
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|12"},"margin":{"bottom":"var:preset|spacing|16"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="margin-bottom:var(--wp--preset--spacing--16)">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"aspectRatio":"4/3","scale":"cover","className":"is-style-shadow","style":{"border":{"radius":"var:custom|radius|xl"}}} -->
<figure class="wp-block-image has-custom-border is-style-shadow"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/feature-editor.svg' ) ); ?>" alt="<?php esc_attr_e( 'Visual block editor interface illustration', 'gratis' ); ?>" style="border-radius:var(--wp--custom--radius--xl);aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":2,"textColor":"contrast","fontSize":"2-xl","style":{"typography":{"fontWeight":"700"}}} --><h2 class="wp-block-heading has-contrast-color has-text-color has-2-xl-font-size" style="font-weight:700"><?php esc_html_e( 'Visual editing, zero overhead', 'gratis' ); ?></h2><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|3"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--3)"><?php esc_html_e( 'Edit your site visually with the native block editor. What you see is exactly what visitors see — no preview button needed.', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-check","fontSize":"sm","style":{"spacing":{"margin":{"top":"var:preset|spacing|4"}}}} -->
<ul class="wp-block-list is-style-check has-sm-font-size" style="margin-top:var(--wp--preset--spacing--4)"><!-- wp:list-item -->
<li><?php esc_html_e( 'True WYSIWYG editing', 'gratis' ); ?></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><?php esc_html_e( 'Inline style controls', 'gratis' ); ?></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><?php esc_html_e( 'Drag and drop blocks', 'gratis' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|12"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":2,"textColor":"contrast","fontSize":"2-xl","style":{"typography":{"fontWeight":"700"}}} --><h2 class="wp-block-heading has-contrast-color has-text-color has-2-xl-font-size" style="font-weight:700"><?php esc_html_e( 'Performance that speaks for itself', 'gratis' ); ?></h2><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|3"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--3)"><?php esc_html_e( 'Zero render-blocking resources. Per-block CSS loading. No jQuery. No emoji scripts. Just clean, fast HTML.', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-check","fontSize":"sm","style":{"spacing":{"margin":{"top":"var:preset|spacing|4"}}}} -->
<ul class="wp-block-list is-style-check has-sm-font-size" style="margin-top:var(--wp--preset--spacing--4)"><!-- wp:list-item -->
<li><?php esc_html_e( '100/100 PageSpeed', 'gratis' ); ?></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><?php esc_html_e( 'Zero frontend JS by default', 'gratis' ); ?></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><?php esc_html_e( 'stale-while-revalidate caching', 'gratis' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"aspectRatio":"4/3","scale":"cover","className":"is-style-shadow","style":{"border":{"radius":"var:custom|radius|xl"}}} -->
<figure class="wp-block-image has-custom-border is-style-shadow"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/feature-speed.svg' ) ); ?>" alt="<?php esc_attr_e( 'Core Web Vitals speed performance chart', 'gratis' ); ?>" style="border-radius:var(--wp--custom--radius--xl);aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
