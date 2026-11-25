<?php
/**
 * Title: Hero — Split Image
 * Slug: gratis/hero-split
 * Categories: gratis-heroes
 * Keywords: hero, split, image, two column
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|16"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"textColor":"primary","fontSize":"xs","style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.15em"}}} --><p class="has-primary-color has-text-color has-xs-font-size" style="font-weight:700;letter-spacing:0.15em;text-transform:uppercase"><?php esc_html_e( 'Built for WordPress', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"contrast","fontSize":"4-xl","style":{"typography":{"fontWeight":"800","lineHeight":"1.1","letterSpacing":"-0.025em"},"spacing":{"margin":{"top":"var:preset|spacing|3"}}}} --><h1 class="wp-block-heading has-contrast-color has-text-color has-4-xl-font-size" style="margin-top:var(--wp--preset--spacing--3);font-weight:800;letter-spacing:-0.025em;line-height:1.1"><?php esc_html_e( 'Build faster.', 'gratis' ); ?><br><?php esc_html_e( 'Pay nothing.', 'gratis' ); ?></h1><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"lg","style":{"spacing":{"margin":{"top":"var:preset|spacing|4"}}}} --><p class="has-contrast-2-color has-text-color has-lg-font-size" style="margin-top:var(--wp--preset--spacing--4)"><?php esc_html_e( 'GRATIS gives you every feature premium themes lock behind paywalls. Full site editing, 22+ patterns, performance-first architecture.', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|6"},"blockGap":"var:preset|spacing|3"}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--6)">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/downloads/"><?php esc_html_e( 'Download free', 'gratis' ); ?></a></div><!-- /wp:button -->
<!-- wp:button {"className":"is-style-ghost"} --><div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="/demo/gratis-theme/"><?php esc_html_e( 'See demo →', 'gratis' ); ?></a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"aspectRatio":"4/3","scale":"cover","className":"is-style-shadow","style":{"border":{"radius":"var:custom|radius|xl"}}} -->
<figure class="wp-block-image has-custom-border is-style-shadow"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-abstract.svg' ) ); ?>" alt="<?php esc_attr_e( 'GRATIS theme layout preview illustration', 'gratis' ); ?>" style="border-radius:var(--wp--custom--radius--xl);aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
