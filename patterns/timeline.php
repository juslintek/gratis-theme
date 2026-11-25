<?php
/**
 * Title: Timeline — Vertical
 * Slug: gratis/timeline
 * Categories: gratis-sections
 * Keywords: timeline, history, steps, process, roadmap
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"contrast","fontSize":"3-xl","style":{"typography":{"fontWeight":"800"},"spacing":{"margin":{"bottom":"var:preset|spacing|12"}}}} --><h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-3-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--12);font-weight:800"><?php esc_html_e( 'How it works', 'gratis' ); ?></h2><!-- /wp:heading -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group">
<?php
$gratis_timeline_steps = [
	[ '01', __( 'Download the theme', 'gratis' ), __( 'Get GRATIS from GitHub. Zero account required. GPL-2.0-or-later licensed.', 'gratis' ) ],
	[ '02', __( 'Install on WordPress', 'gratis' ), __( 'Upload via Appearance → Themes or WP-CLI. Activates in seconds.', 'gratis' ) ],
	[ '03', __( 'Pick a pattern', 'gratis' ), __( 'Open the block editor, click +, browse 22 patterns. One click to insert.', 'gratis' ) ],
	[ '04', __( 'Customize & publish', 'gratis' ), __( 'Change colors, fonts, and content in the visual editor. What you see is what visitors get.', 'gratis' ) ],
];
foreach ( $gratis_timeline_steps as $gratis_step ) :
	?>
<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|12"},"margin":{"bottom":"var:preset|spacing|8"}},"border":{"left":{"color":"var:preset|color|border","width":"2px","style":"solid"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="border-left-color:var(--wp--preset--color--border);border-left-style:solid;border-left-width:2px;margin-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--12)">
<!-- wp:paragraph {"textColor":"primary","fontSize":"xs","style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.15em"}}} --><p class="has-primary-color has-text-color has-xs-font-size" style="font-weight:700;letter-spacing:0.15em;text-transform:uppercase"><?php echo esc_html( $gratis_step[0] ); ?></p><!-- /wp:paragraph -->
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"xl","style":{"typography":{"fontWeight":"700"}}} --><h3 class="wp-block-heading has-contrast-color has-text-color has-xl-font-size" style="font-weight:700"><?php echo esc_html( $gratis_step[1] ); ?></h3><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} --><p class="has-contrast-2-color has-text-color has-sm-font-size"><?php echo esc_html( $gratis_step[2] ); ?></p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
