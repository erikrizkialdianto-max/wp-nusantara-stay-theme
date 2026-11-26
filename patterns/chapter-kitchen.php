<?php
/**
 * Title: Chapter: text and a tall photo
 * Slug: nusantara-stay/chapter-kitchen
 * Categories: nusantara-stay, text
 * Description: One screen: label, headline, a short paragraph and a link beside a tall 2:3 photo touching the right margin.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"experience","className":"nusantara-stay-ch nusantara-stay-ch--right","layout":{"type":"constrained"}} -->
<section id="experience" class="wp-block-group alignfull nusantara-stay-ch nusantara-stay-ch--right"><!-- wp:group {"align":"wide","className":"nusantara-stay-inner","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide nusantara-stay-inner"><!-- wp:group {"className":"nusantara-stay-ch__media","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-ch__media"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-ch__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-ch__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-kitchen.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'A quiet corner of the garden villa', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-ch__text","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-ch__text"><!-- wp:paragraph {"className":"nusantara-stay-eyebrow"} -->
<p class="nusantara-stay-eyebrow"><?php echo wp_kses_post( __( 'The experience', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php echo wp_kses_post( __( 'Days that slow down, <em>mornings that linger.</em>', 'nusantara-stay' ) ); ?></h2>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-chapter__body"} -->
<p class="nusantara-stay-chapter__body"><?php echo wp_kses_post( __( 'Breakfast on the veranda, afternoons by the pool, and evenings under the stars. Ask us about the best local spots nearby.', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"nusantara-stay-arrow"} -->
<p class="nusantara-stay-arrow"><a href="#reserve"><?php echo wp_kses_post( __( 'Book your stay →', 'nusantara-stay' ) ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
