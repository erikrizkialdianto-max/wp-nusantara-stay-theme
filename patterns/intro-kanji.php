<?php
/**
 * Title: Intro with a mark
 * Slug: nusantara-stay/intro-kanji
 * Categories: nusantara-stay, text
 * Description: A calm pause on the page colour: the small Nusantara Stay mark (a square with one rounded corner), then a centred heading and one short paragraph.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"nusantara-stay-intro-kanji","layout":{"type":"constrained","contentSize":"760px"}} -->
<section class="wp-block-group alignfull nusantara-stay-intro-kanji"><!-- wp:paragraph {"align":"center","className":"nusantara-stay-intro-kanji__mark"} -->
<p class="has-text-align-center nusantara-stay-intro-kanji__mark">✦</p>
<!-- /wp:paragraph --><!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php echo wp_kses_post( __( 'Warm hospitality, <em>quiet rooms.</em>', 'nusantara-stay' ) ); ?></h2>
<!-- /wp:heading --><!-- wp:paragraph {"align":"center","className":"nusantara-stay-intro-kanji__text","textColor":"ink-2"} -->
<p class="has-text-align-center nusantara-stay-intro-kanji__text has-ink-2-color has-text-color"><?php echo esc_html__( 'We welcome you with warm Indonesian hospitality, and keep six quiet rooms for those who want to stay a little longer.', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->
