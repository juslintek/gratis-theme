<?php
/**
 * Title: FAQ — Accordion
 * Slug: gratis/faq
 * Categories: gratis-faq
 * Keywords: faq, accordion, questions, answers
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|16"}}}} -->
<div class="wp-block-columns">
<!-- wp:column {"width":"35%"} -->
<div class="wp-block-column" style="flex-basis:35%">
<!-- wp:heading {"level":2,"textColor":"contrast","fontSize":"3-xl","style":{"typography":{"fontWeight":"800"}}} --><h2 class="wp-block-heading has-contrast-color has-text-color has-3-xl-font-size" style="font-weight:800"><?php esc_html_e( 'Frequently asked questions', 'gratis' ); ?></h2><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|4"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--4)"><?php echo wp_kses( __( 'Can\'t find the answer? <a href="/contact/">Contact us</a> and we\'ll get back to you.', 'gratis' ), array( 'a' => array( 'href' => array() ) ) ); ?></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|border","width":"1px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|5"}}}} -->
<details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5)"><summary><strong><?php esc_html_e( 'Is GRATIS really completely free?', 'gratis' ); ?></strong></summary>
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|3"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--3)"><?php esc_html_e( 'Yes. GPL-2.0-or-later licensed. No "Pro" version. No upsells. Every pattern, every plugin, and every future update ships free forever.', 'gratis' ); ?></p><!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|border","width":"1px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|5"}}}} -->
<details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5)"><summary><strong><?php esc_html_e( 'Do I need Elementor or a third-party page builder?', 'gratis' ); ?></strong></summary>
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|3"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--3)"><?php esc_html_e( 'No. GRATIS uses the native WordPress block editor and pairs optionally with GRATIS Builder for extra patterns and REST API tooling — without heavy third-party JS overhead.', 'gratis' ); ?></p><!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"style":{"border":{"bottom":{"color":"var:preset|color|border","width":"1px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|5"}}}} -->
<details class="wp-block-details" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-style:solid;border-bottom-width:1px;padding-top:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5)"><summary><strong><?php esc_html_e( 'What PHP version is required?', 'gratis' ); ?></strong></summary>
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|3"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--3)"><?php esc_html_e( 'The theme runs on PHP 7.4+ and the full Gratis plugin suite requires PHP 8.1+ (PHP 8.4+ recommended).', 'gratis' ); ?></p><!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
<!-- wp:details {"style":{"spacing":{"padding":{"top":"var:preset|spacing|5","bottom":"var:preset|spacing|5"}}}} -->
<details class="wp-block-details" style="padding-top:var(--wp--preset--spacing--5);padding-bottom:var(--wp--preset--spacing--5)"><summary><strong><?php esc_html_e( 'Can I use this for client sites?', 'gratis' ); ?></strong></summary>
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|3"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--3)"><?php esc_html_e( 'Yes. The GPL-2.0-or-later license lets you use the theme and plugins on unlimited personal and commercial client sites with no seat fees.', 'gratis' ); ?></p><!-- /wp:paragraph -->
</details>
<!-- /wp:details -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
