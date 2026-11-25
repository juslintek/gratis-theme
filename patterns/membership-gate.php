<?php
/**
 * Title: Membership — Content Gate
 * Slug: gratis/membership-gate
 * Categories: gratis-membership
 * Keywords: membership, login, gate, restricted, members only
 */
?>
<!-- wp:group {"backgroundColor":"surface","textColor":"contrast","className":"is-style-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|12","right":"var:preset|spacing|12","bottom":"var:preset|spacing|12","left":"var:preset|spacing|12"}},"border":{"radius":"var:custom|radius|xl"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group is-style-card has-contrast-color has-surface-background-color has-text-color has-background" style="border-radius:var(--wp--custom--radius--xl);padding-top:var(--wp--preset--spacing--12);padding-right:var(--wp--preset--spacing--12);padding-bottom:var(--wp--preset--spacing--12);padding-left:var(--wp--preset--spacing--12)">
<!-- wp:paragraph {"align":"center","fontSize":"4-xl"} --><p class="has-text-align-center has-4-xl-font-size">🔒</p><!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"contrast","fontSize":"2-xl","style":{"typography":{"fontWeight":"700"}}} --><h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-2-xl-font-size" style="font-weight:700"><?php esc_html_e( 'Members only content', 'gratis' ); ?></h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} --><p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'This content is available to members only. Sign in or create a free account to continue reading.', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|3","margin":{"top":"var:preset|spacing|4"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--4)">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/login/"><?php esc_html_e( 'Sign in', 'gratis' ); ?></a></div><!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} --><div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/register/"><?php esc_html_e( 'Create free account', 'gratis' ); ?></a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
