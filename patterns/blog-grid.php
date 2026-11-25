<?php
/**
 * Title: Blog — Latest Posts Grid
 * Slug: gratis/blog-grid
 * Categories: gratis-blog
 * Keywords: blog, posts, grid, latest, news
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--10)">
<!-- wp:heading {"level":2,"textColor":"contrast","fontSize":"3-xl","style":{"typography":{"fontWeight":"800"}}} --><h2 class="wp-block-heading has-contrast-color has-text-color has-3-xl-font-size" style="font-weight:800"><?php esc_html_e( 'Latest posts', 'gratis' ); ?></h2><!-- /wp:heading -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-ghost"} --><div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="/blog/"><?php esc_html_e( 'View all posts →', 'gratis' ); ?></a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:query {"query":{"perPage":3,"postType":"post","order":"desc","orderBy":"date","inherit":false},"layout":{"type":"default"}} -->
<div class="wp-block-query">
<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"backgroundColor":"surface","textColor":"contrast","className":"is-style-card","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|6","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group is-style-card has-contrast-color has-surface-background-color has-text-color has-background" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--6);padding-left:0">
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"0"}}} /-->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|5","left":"var:preset|spacing|5"},"blockGap":"var:preset|spacing|2"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--5)">
<!-- wp:post-terms {"term":"category","textColor":"primary","fontSize":"xs","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.08em"}}} /-->
<!-- wp:post-title {"isLink":true,"textColor":"contrast","fontSize":"lg","style":{"typography":{"fontWeight":"700","lineHeight":"1.3"}}} /-->
<!-- wp:post-date {"textColor":"contrast-3","fontSize":"xs"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->
</div>
<!-- /wp:query -->
</div>
<!-- /wp:group -->
