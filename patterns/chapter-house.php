<?php
/**
 * Title: Chapter: the house
 * Slug: nusantara-stay/chapter-house
 * Categories: nusantara-stay, text-image
 * Description: Half and half: a photo filling the left half to the edge, the label, headline, a short paragraph and a link in the right half.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"house","className":"nusantara-stay-ch","layout":{"type":"constrained"}} -->
<section id="house" class="wp-block-group alignfull nusantara-stay-ch"><!-- wp:group {"align":"wide","className":"nusantara-stay-inner","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide nusantara-stay-inner"><!-- wp:group {"className":"nusantara-stay-ch__media","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-ch__media"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-ch__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-ch__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-house.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Stepping stones through the tropical garden to the villa entrance', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-ch__text","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-ch__text"><!-- wp:paragraph {"className":"nusantara-stay-eyebrow"} -->
<p class="nusantara-stay-eyebrow"><?php echo wp_kses_post( __( 'The house', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php echo wp_kses_post( __( 'A garden villa <em>in the heart of Bali.</em>', 'nusantara-stay' ) ); ?></h2>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-chapter__body"} -->
<p class="nusantara-stay-chapter__body"><?php echo wp_kses_post( __( 'Minutes from the rice terraces, behind a wall of tropical greenery: a garden villa with six quiet rooms, each opening onto the garden. Come for the calm; stay for the mornings.', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"nusantara-stay-arrow"} -->
<p class="nusantara-stay-arrow"><a href="#visit"><?php echo wp_kses_post( __( 'Plan your visit →', 'nusantara-stay' ) ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
