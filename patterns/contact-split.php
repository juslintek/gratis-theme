<?php
/**
 * Title: Contact — Split Layout
 * Slug: gratis/contact-split
 * Categories: gratis-contact, gratis-forms
 * Keywords: contact, email, get in touch, support
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|16"}}}} -->
<div class="wp-block-columns">
<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%">
<!-- wp:heading {"level":2,"textColor":"contrast","fontSize":"3-xl","style":{"typography":{"fontWeight":"800"}}} --><h2 class="wp-block-heading has-contrast-color has-text-color has-3-xl-font-size" style="font-weight:800"><?php esc_html_e( 'Get in touch', 'gratis' ); ?></h2><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|4"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--4)"><?php esc_html_e( 'Have a question or want to work together? Reach out through any channel below and we will reply within one business day.', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|4","margin":{"top":"var:preset|spacing|8"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--8)">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"fontSize":"xl"} --><p class="has-xl-font-size">📧</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} --><p class="has-contrast-2-color has-text-color has-sm-font-size"><strong><?php esc_html_e( 'Email', 'gratis' ); ?></strong><br><a href="mailto:hello@example.com">hello@example.com</a></p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"fontSize":"xl"} --><p class="has-xl-font-size">📍</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} --><p class="has-contrast-2-color has-text-color has-sm-font-size"><strong><?php esc_html_e( 'Location', 'gratis' ); ?></strong><br><?php esc_html_e( 'Vilnius, Lithuania', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"backgroundColor":"surface","textColor":"contrast","className":"is-style-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|8","right":"var:preset|spacing|8","bottom":"var:preset|spacing|8","left":"var:preset|spacing|8"},"blockGap":"var:preset|spacing|4"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group is-style-card has-contrast-color has-surface-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl","style":{"typography":{"fontWeight":"700"}}} --><h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size" style="font-weight:700"><?php esc_html_e( 'Direct inquiry channels', 'gratis' ); ?></h3><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} --><p class="has-contrast-2-color has-text-color has-sm-font-size"><?php esc_html_e( 'Typical response time: under 24 hours (Monday–Friday, 09:00–17:00 EET).', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:list {"className":"is-style-check","textColor":"contrast-2","fontSize":"sm"} -->
<ul class="wp-block-list is-style-check has-contrast-2-color has-text-color has-sm-font-size"><!-- wp:list-item -->
<li><?php esc_html_e( 'General inquiries & custom theme work', 'gratis' ); ?></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><?php esc_html_e( 'Plugin support & bug reports', 'gratis' ); ?></li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li><?php esc_html_e( 'Agency & enterprise deployments', 'gratis' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|2"},"blockGap":"var:preset|spacing|3"}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--2)">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="mailto:hello@example.com"><?php esc_html_e( 'Send an Email →', 'gratis' ); ?></a></div><!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} --><div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/docs/"><?php esc_html_e( 'Browse Docs', 'gratis' ); ?></a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
