<?php
/**
 * Title: Glimpses of the house
 * Slug: nusantara-stay/journal-glimpses
 * Categories: nusantara-stay, gallery
 * Description: A centred title, your Instagram handle and four portrait photos. Swap the photos for your own (or a feed block from an Instagram plugin).
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"nusantara-stay-glimpse nusantara-stay-narrow","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull nusantara-stay-glimpse nusantara-stay-narrow"><!-- wp:group {"align":"wide","className":"nusantara-stay-inner","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide nusantara-stay-inner"><!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php echo wp_kses_post( __( 'Glimpses of <em>the house.</em>', 'nusantara-stay' ) ); ?></h2>
<!-- /wp:heading --><!-- wp:paragraph {"align":"center","className":"nusantara-stay-glimpse__handle"} -->
<p class="has-text-align-center nusantara-stay-glimpse__handle"><?php echo wp_kses_post( __( '@nusantara-stay.house', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:group {"className":"nusantara-stay-glimpse__grid","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-glimpse__grid"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-glimpse__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-glimpse__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-kitchen.jpg' ) ); ?>" alt="<?php echo esc_attr__( '', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-glimpse__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-glimpse__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-house-detail.jpg' ) ); ?>" alt="<?php echo esc_attr__( '', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-glimpse__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-glimpse__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-garden-wide.jpg' ) ); ?>" alt="<?php echo esc_attr__( '', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-glimpse__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-glimpse__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-rooms.jpg' ) ); ?>" alt="<?php echo esc_attr__( '', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
