<?php
/**
 * Title: Two photos: big photo, centred title, small photo
 * Slug: nusantara-stay/stack-house
 * Categories: nusantara-stay, gallery
 * Description: One screen: a big photo on the left half; on the right a centred title, a small photo and the text under it. On phones the small photo is hidden.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"house","className":"nusantara-stay-stack","layout":{"type":"constrained"}} -->
<section id="house" class="wp-block-group alignfull nusantara-stay-stack"><!-- wp:group {"align":"wide","className":"nusantara-stay-inner","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide nusantara-stay-inner"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-stack__main"} -->
<figure class="wp-block-image size-large nusantara-stay-stack__main"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-house.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Stepping stones through the tropical garden to the villa entrance', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-stack__top","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-stack__top"><!-- wp:paragraph {"className":"nusantara-stay-eyebrow"} -->
<p class="nusantara-stay-eyebrow"><?php echo wp_kses_post( __( 'The house', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php echo wp_kses_post( __( 'A garden villa <em>in the heart of Bali.</em>', 'nusantara-stay' ) ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group --><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-stack__small"} -->
<figure class="wp-block-image size-large nusantara-stay-stack__small"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-house-detail.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'A teapot and two cups on a garden stone', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-stack__text","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-stack__text"><!-- wp:paragraph {"className":"nusantara-stay-stack__body"} -->
<p class="nusantara-stay-stack__body"><?php echo wp_kses_post( __( 'Minutes from the rice terraces, behind a wall of tropical greenery: a garden villa with six quiet rooms, each opening onto the garden. Come for the calm; stay for the mornings.', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"nusantara-stay-arrow"} -->
<p class="nusantara-stay-arrow"><a href="#reserve"><?php echo wp_kses_post( __( 'Plan your visit →', 'nusantara-stay' ) ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
