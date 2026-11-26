<?php
/**
 * Title: Hero: photo, edge to edge
 * Slug: nusantara-stay/hero-photo
 * Categories: nusantara-stay-hero, featured, banner
 * Description: One large photo edge to edge. The headline is read by screen readers and search engines; swap the photo for your own.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"nusantara-stay-hero-frame nusantara-stay-hero-frame--bleed","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull nusantara-stay-hero-frame nusantara-stay-hero-frame--bleed"><!-- wp:group {"className":"nusantara-stay-hero-photo","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-hero-photo"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/k-hero-dining.jpg' ) ); ?>","alt":"<?php echo esc_attr__( 'A bright villa room opening onto a tropical garden', 'nusantara-stay' ); ?>","dimRatio":100,"customGradient":"linear-gradient(180deg,rgba(28,26,24,0.42) 0%,rgba(28,26,24,0) 24%,rgba(28,26,24,0) 45%,rgba(28,26,24,0.66) 100%)","minHeight":100,"minHeightUnit":"%","contentPosition":"bottom left","isDark":true,"focalPoint":{"x":0.62,"y":0.5},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left" style="min-height:100%"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(180deg,rgba(28,26,24,0.42) 0%,rgba(28,26,24,0) 24%,rgba(28,26,24,0) 45%,rgba(28,26,24,0.66) 100%)"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'A bright villa room opening onto a tropical garden', 'nusantara-stay' ); ?>" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-hero-dining.jpg' ) ); ?>" style="object-position:62% 50%" data-object-fit="cover" data-object-position="62% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"nusantara-stay-slide__label"} -->
<p class="nusantara-stay-slide__label"><?php echo esc_html__( 'The villa', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph --><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group alignwide"><!-- wp:heading {"fontSize":"display","style":{"typography":{"fontWeight":"300"}},"level":1} -->
<h1 class="wp-block-heading has-display-font-size" style="font-weight:300"><?php echo wp_kses_post( __( 'Quiet mornings, <em>beautiful stays.</em>', 'nusantara-stay' ) ); ?></h1>
<!-- /wp:heading --><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"ink","backgroundColor":"surface"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-ink-color has-text-color has-surface-background-color has-background wp-element-button" href="#reserve"><?php echo esc_html__( 'Book your stay', 'nusantara-stay' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-hero-under","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-hero-under"><!-- wp:paragraph {"className":"nusantara-stay-hero-under__line"} -->
<p class="nusantara-stay-hero-under__line"><?php echo wp_kses_post( __( 'A garden villa with six quiet rooms · <em>Ubud, Bali</em>', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:buttons {"className":"nusantara-stay-hero-under__btns"} -->
<div class="wp-block-buttons nusantara-stay-hero-under__btns"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#reserve"><?php echo wp_kses_post( __( 'Book a room', 'nusantara-stay' ) ); ?></a></div>
<!-- /wp:button --><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#rooms"><?php echo wp_kses_post( __( 'See the rooms', 'nusantara-stay' ) ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
