<?php
/**
 * Title: About — Split with Image
 * Slug: gratis/about-split
 * Categories: gratis-about
 * Keywords: about, story, mission, image
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|16"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-shadow","style":{"border":{"radius":"var:custom|radius|xl"}}} -->
<figure class="wp-block-image has-custom-border is-style-shadow"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/team-collab.svg' ) ); ?>" alt="<?php esc_attr_e( 'Team members collaborating on the GRATIS project', 'gratis' ); ?>" style="border-radius:var(--wp--custom--radius--xl);aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"textColor":"primary","fontSize":"xs","style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.15em"}}} --><p class="has-primary-color has-text-color has-xs-font-size" style="font-weight:700;letter-spacing:0.15em;text-transform:uppercase"><?php esc_html_e( 'Our story', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"contrast","fontSize":"3-xl","style":{"typography":{"fontWeight":"800","lineHeight":"1.2"},"spacing":{"margin":{"top":"var:preset|spacing|3"}}}} --><h2 class="wp-block-heading has-contrast-color has-text-color has-3-xl-font-size" style="margin-top:var(--wp--preset--spacing--3);font-weight:800;line-height:1.2"><?php esc_html_e( 'We got tired of paying for things that should be free', 'gratis' ); ?></h2><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|4"}}}} --><p class="has-contrast-2-color has-text-color" style="margin-top:var(--wp--preset--spacing--4)"><?php esc_html_e( 'Every year, WordPress developers spend hundreds of dollars on themes that lock basic features behind paywalls. We built GRATIS to end that.', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"contrast-2"} --><p class="has-contrast-2-color has-text-color"><?php esc_html_e( 'GPL licensed. Community driven. No investors. No upsells. Just a great theme and a suite of 33+ plugins that respect your budget.', 'gratis' ); ?></p><!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|6"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--6)">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/docs/"><?php esc_html_e( 'Explore the plugins →', 'gratis' ); ?></a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"surface","textColor":"contrast","style":{"spacing":{"padding":{"top":"var:preset|spacing|12","bottom":"var:preset|spacing|12"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-color has-surface-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--12);padding-bottom:var(--wp--preset--spacing--12)">

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"contrast","fontSize":"xl","style":{"typography":{"fontWeight":"700"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} --><h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--10);font-weight:700"><?php esc_html_e( 'GRATIS by the numbers', 'gratis' ); ?></h2><!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|6"}}}} -->
<div class="wp-block-columns">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":3,"textColor":"primary","fontSize":"4-xl","style":{"typography":{"fontWeight":"800"}}} --><h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-4-xl-font-size" style="font-weight:800">33+</h3><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} --><p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'Plugins & components', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":3,"textColor":"primary","fontSize":"4-xl","style":{"typography":{"fontWeight":"800"}}} --><h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-4-xl-font-size" style="font-weight:800">22+</h3><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} --><p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'FSE patterns', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":3,"textColor":"primary","fontSize":"4-xl","style":{"typography":{"fontWeight":"800"}}} --><h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-4-xl-font-size" style="font-weight:800">GPL</h3><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} --><p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'Open source license', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":3,"textColor":"primary","fontSize":"4-xl","style":{"typography":{"fontWeight":"800"}}} --><h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-4-xl-font-size" style="font-weight:800">$0</h3><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} --><p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'Cost, forever', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":3,"textColor":"primary","fontSize":"4-xl","style":{"typography":{"fontWeight":"800"}}} --><h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-4-xl-font-size" style="font-weight:800">2024</h3><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} --><p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'Founded', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|16","bottom":"var:preset|spacing|16"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">

<!-- wp:heading {"textAlign":"center","level":2,"textColor":"contrast","fontSize":"2-xl","style":{"typography":{"fontWeight":"800"},"spacing":{"margin":{"bottom":"var:preset|spacing|12"}}}} --><h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-2-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--12);font-weight:800"><?php esc_html_e( 'Our journey', 'gratis' ); ?></h2><!-- /wp:heading -->

<!-- wp:group {"style":{"border":{"left":{"color":"var:preset|color|primary","width":"2px","style":"solid"}},"spacing":{"padding":{"left":"var:preset|spacing|8"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-style:solid;border-left-width:2px;padding-left:var(--wp--preset--spacing--8)">

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--10)">
<!-- wp:group {"backgroundColor":"primary","textColor":"base-dark","style":{"border":{"radius":"var:custom|radius|full"},"spacing":{"padding":{"top":"var:preset|spacing|1","right":"var:preset|spacing|3","bottom":"var:preset|spacing|1","left":"var:preset|spacing|3"}}},"layout":{"type":"constrained"}} --><div class="wp-block-group has-base-dark-color has-primary-background-color has-text-color has-background" style="border-radius:var(--wp--custom--radius--full);padding-top:var(--wp--preset--spacing--1);padding-right:var(--wp--preset--spacing--3);padding-bottom:var(--wp--preset--spacing--1);padding-left:var(--wp--preset--spacing--3)"><!-- wp:paragraph {"fontSize":"xs","style":{"typography":{"fontWeight":"700"}}} --><p class="has-xs-font-size" style="font-weight:700">2024 Q1</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|6"},"blockGap":"var:preset|spacing|1"}},"layout":{"type":"constrained"}} --><div class="wp-block-group" style="padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"md","style":{"typography":{"fontWeight":"700"}}} --><h3 class="wp-block-heading has-contrast-color has-text-color has-md-font-size" style="font-weight:700"><?php esc_html_e( 'Project founded', 'gratis' ); ?></h3><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} --><p class="has-contrast-2-color has-text-color has-sm-font-size"><?php esc_html_e( 'Frustration with paid theme ecosystems sparked GRATIS. First commit: a zero-dependency FSE theme with 100/100 PageSpeed out of the box.', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--10)">
<!-- wp:group {"backgroundColor":"primary","textColor":"base-dark","style":{"border":{"radius":"var:custom|radius|full"},"spacing":{"padding":{"top":"var:preset|spacing|1","right":"var:preset|spacing|3","bottom":"var:preset|spacing|1","left":"var:preset|spacing|3"}}},"layout":{"type":"constrained"}} --><div class="wp-block-group has-base-dark-color has-primary-background-color has-text-color has-background" style="border-radius:var(--wp--custom--radius--full);padding-top:var(--wp--preset--spacing--1);padding-right:var(--wp--preset--spacing--3);padding-bottom:var(--wp--preset--spacing--1);padding-left:var(--wp--preset--spacing--3)"><!-- wp:paragraph {"fontSize":"xs","style":{"typography":{"fontWeight":"700"}}} --><p class="has-xs-font-size" style="font-weight:700">2024 Q2</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|6"},"blockGap":"var:preset|spacing|1"}},"layout":{"type":"constrained"}} --><div class="wp-block-group" style="padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"md","style":{"typography":{"fontWeight":"700"}}} --><h3 class="wp-block-heading has-contrast-color has-text-color has-md-font-size" style="font-weight:700"><?php esc_html_e( 'Plugin suite grows to 10', 'gratis' ); ?></h3><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} --><p class="has-contrast-2-color has-text-color has-sm-font-size"><?php esc_html_e( 'Caching, SEO, security, and analytics plugins released. All free. All GPL. Community forks welcome.', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--10)">
<!-- wp:group {"backgroundColor":"primary","textColor":"base-dark","style":{"border":{"radius":"var:custom|radius|full"},"spacing":{"padding":{"top":"var:preset|spacing|1","right":"var:preset|spacing|3","bottom":"var:preset|spacing|1","left":"var:preset|spacing|3"}}},"layout":{"type":"constrained"}} --><div class="wp-block-group has-base-dark-color has-primary-background-color has-text-color has-background" style="border-radius:var(--wp--custom--radius--full);padding-top:var(--wp--preset--spacing--1);padding-right:var(--wp--preset--spacing--3);padding-bottom:var(--wp--preset--spacing--1);padding-left:var(--wp--preset--spacing--3)"><!-- wp:paragraph {"fontSize":"xs","style":{"typography":{"fontWeight":"700"}}} --><p class="has-xs-font-size" style="font-weight:700">2024 Q3</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|6"},"blockGap":"var:preset|spacing|1"}},"layout":{"type":"constrained"}} --><div class="wp-block-group" style="padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"md","style":{"typography":{"fontWeight":"700"}}} --><h3 class="wp-block-heading has-contrast-color has-text-color has-md-font-size" style="font-weight:700"><?php esc_html_e( 'AI integration shipped', 'gratis' ); ?></h3><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} --><p class="has-contrast-2-color has-text-color has-sm-font-size"><?php esc_html_e( 'gratis-builder gains a BYOM AI REST API — bring your own OpenAI, Ollama, or any compatible model endpoint. First AI-driven block pattern generator in a free theme.', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|4"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--4)">
<!-- wp:group {"backgroundColor":"primary","textColor":"base-dark","style":{"border":{"radius":"var:custom|radius|full"},"spacing":{"padding":{"top":"var:preset|spacing|1","right":"var:preset|spacing|3","bottom":"var:preset|spacing|1","left":"var:preset|spacing|3"}}},"layout":{"type":"constrained"}} --><div class="wp-block-group has-base-dark-color has-primary-background-color has-text-color has-background" style="border-radius:var(--wp--custom--radius--full);padding-top:var(--wp--preset--spacing--1);padding-right:var(--wp--preset--spacing--3);padding-bottom:var(--wp--preset--spacing--1);padding-left:var(--wp--preset--spacing--3)"><!-- wp:paragraph {"fontSize":"xs","style":{"typography":{"fontWeight":"700"}}} --><p class="has-xs-font-size" style="font-weight:700">2024 Q4+</p><!-- /wp:paragraph --></div><!-- /wp:group -->
<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|6"},"blockGap":"var:preset|spacing|1"}},"layout":{"type":"constrained"}} --><div class="wp-block-group" style="padding-left:var(--wp--preset--spacing--6)">
<!-- wp:heading {"level":3,"textColor":"contrast","fontSize":"md","style":{"typography":{"fontWeight":"700"}}} --><h3 class="wp-block-heading has-contrast-color has-text-color has-md-font-size" style="font-weight:700"><?php esc_html_e( '33 plugins — and counting', 'gratis' ); ?></h3><!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"sm"} --><p class="has-contrast-2-color has-text-color has-sm-font-size"><?php esc_html_e( 'Full suite: CRM, mail, analytics, compliance, popup, social, and more. Production-ready, deployed on FrankenPHP + SQLite. The ecosystem that premium suites charge $300/yr for — at $0.', 'gratis' ); ?></p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
