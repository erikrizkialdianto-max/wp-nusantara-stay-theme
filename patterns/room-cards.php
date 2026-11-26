<?php
/**
 * Title: Rooms: intro and cards
 * Slug: nusantara-stay/room-cards
 * Categories: nusantara-stay, gallery
 * Description: The rooms in one section: label, headline, a short paragraph and a link over faint ripples, then portrait cards that scroll sideways, three at a time, with dashes to page through. Add or remove cards as groups.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"rooms","className":"nusantara-stay-cards nusantara-stay-cards--intro nusantara-stay-narrow","layout":{"type":"constrained"}} -->
<section id="rooms" class="wp-block-group alignfull nusantara-stay-cards nusantara-stay-cards--intro nusantara-stay-narrow"><!-- wp:group {"align":"wide","className":"nusantara-stay-inner","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide nusantara-stay-inner"><!-- wp:group {"className":"nusantara-stay-cards__intro","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-cards__intro"><!-- wp:group {"className":"nusantara-stay-cards__intro-head","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-cards__intro-head"><!-- wp:paragraph {"className":"nusantara-stay-eyebrow"} -->
<p class="nusantara-stay-eyebrow"><?php echo wp_kses_post( __( 'The rooms', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php echo wp_kses_post( __( 'Six quiet rooms, <em>the garden at your door.</em>', 'nusantara-stay' ) ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-cards__intro-text","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-cards__intro-text"><!-- wp:paragraph {"className":"nusantara-stay-chapter__body"} -->
<p class="nusantara-stay-chapter__body"><?php echo wp_kses_post( __( 'Six rooms in natural wood and linen, each with a private garden terrace. Breakfast is served on the veranda, with the garden still cool in the morning mist.', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"nusantara-stay-arrow"} -->
<p class="nusantara-stay-arrow"><a href="#rooms"><?php echo wp_kses_post( __( 'See the six rooms →', 'nusantara-stay' ) ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-cards__track","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-cards__track"><!-- wp:group {"className":"nusantara-stay-card2 nusantara-stay-card2--room","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2 nusantara-stay-card2--room"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-card2__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-card2__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-room-garden.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Garden Room', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-card2__head","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2__head"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo wp_kses_post( __( 'Garden Room', 'nusantara-stay' ) ); ?></h3>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-card2__price"} -->
<p class="nusantara-stay-card2__price"><?php echo wp_kses_post( __( 'from <span>Rp 380.000</span>', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:paragraph {"className":"nusantara-stay-card2__meta"} -->
<p class="nusantara-stay-card2__meta"><?php echo wp_kses_post( __( '28 m² · 2 guests · Garden view', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-card2 nusantara-stay-card2--room","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2 nusantara-stay-card2--room"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-card2__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-card2__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-room-hinoki.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Garden Suite', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-card2__head","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2__head"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo wp_kses_post( __( 'Garden Suite', 'nusantara-stay' ) ); ?></h3>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-card2__price"} -->
<p class="nusantara-stay-card2__price"><?php echo wp_kses_post( __( 'from <span>Rp 620.000</span>', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:paragraph {"className":"nusantara-stay-card2__meta"} -->
<p class="nusantara-stay-card2__meta"><?php echo wp_kses_post( __( '42 m² · 2 guests · Garden terrace', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-card2 nusantara-stay-card2--room","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2 nusantara-stay-card2--room"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-card2__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-card2__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-room-veranda.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Veranda Room', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-card2__head","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2__head"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo wp_kses_post( __( 'Veranda Room', 'nusantara-stay' ) ); ?></h3>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-card2__price"} -->
<p class="nusantara-stay-card2__price"><?php echo wp_kses_post( __( 'from <span>Rp 440.000</span>', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:paragraph {"className":"nusantara-stay-card2__meta"} -->
<p class="nusantara-stay-card2__meta"><?php echo wp_kses_post( __( '32 m² · 2 guests · Private veranda', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-card2 nusantara-stay-card2--room","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2 nusantara-stay-card2--room"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-card2__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-card2__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-room-terrace.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Terrace Room', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-card2__head","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2__head"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo wp_kses_post( __( 'Terrace Room', 'nusantara-stay' ) ); ?></h3>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-card2__price"} -->
<p class="nusantara-stay-card2__price"><?php echo wp_kses_post( __( 'from <span>Rp 420.000</span>', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:paragraph {"className":"nusantara-stay-card2__meta"} -->
<p class="nusantara-stay-card2__meta"><?php echo wp_kses_post( __( '30 m² · 2 guests · Upstairs terrace', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-card2 nusantara-stay-card2--room","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2 nusantara-stay-card2--room"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-card2__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-card2__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-room-lantern.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Lantern Room', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-card2__head","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2__head"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo wp_kses_post( __( 'Lantern Room', 'nusantara-stay' ) ); ?></h3>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-card2__price"} -->
<p class="nusantara-stay-card2__price"><?php echo wp_kses_post( __( 'from <span>Rp 360.000</span>', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:paragraph {"className":"nusantara-stay-card2__meta"} -->
<p class="nusantara-stay-card2__meta"><?php echo wp_kses_post( __( '26 m² · 2 guests · Round window', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-card2 nusantara-stay-card2--room","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2 nusantara-stay-card2--room"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-card2__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-card2__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-room-moon.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Moon-viewing Suite', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-card2__head","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-card2__head"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo wp_kses_post( __( 'Moon-viewing Suite', 'nusantara-stay' ) ); ?></h3>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-card2__price"} -->
<p class="nusantara-stay-card2__price"><?php echo wp_kses_post( __( 'from <span>Rp 680.000</span>', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:paragraph {"className":"nusantara-stay-card2__meta"} -->
<p class="nusantara-stay-card2__meta"><?php echo wp_kses_post( __( '48 m² · 3 guests · Window seat', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
