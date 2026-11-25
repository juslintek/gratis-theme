<?php
/**
 * Title: Hero — Minimal
 * Slug: gratis/hero-minimal
 * Categories: gratis-heroes
 * Keywords: hero, minimal, clean, simple
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|24","bottom":"var:preset|spacing|24"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--24)">
<!-- wp:heading {"textAlign":"center","level":1,"textColor":"contrast","fontSize":"5-xl","style":{"typography":{"fontWeight":"800","letterSpacing":"-0.03em","lineHeight":"1.05"}}} --><h1 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-5-xl-font-size" style="font-weight:800;letter-spacing:-0.03em;line-height:1.05"><?php esc_html_e( 'Your headline', 'gratis' ); ?><br><?php esc_html_e( 'goes here', 'gratis' ); ?></h1><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","textColor":"contrast-2","fontSize":"xl","style":{"spacing":{"margin":{"top":"var:preset|spacing|5"}}}} --><p class="has-text-align-center has-contrast-2-color has-text-color has-xl-font-size" style="margin-top:var(--wp--preset--spacing--5)"><?php esc_html_e( 'A short description that explains what you do and why it matters. Keep it under two sentences.', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|8"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--8)">
<!-- wp:button {"className":"is-style-pill","style":{"spacing":{"padding":{"top":"var:preset|spacing|4","right":"var:preset|spacing|10","bottom":"var:preset|spacing|4","left":"var:preset|spacing|10"}}}} --><div class="wp-block-button is-style-pill"><a class="wp-block-button__link wp-element-button" href="/downloads/" style="padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--10)"><?php esc_html_e( 'Get started free', 'gratis' ); ?></a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
