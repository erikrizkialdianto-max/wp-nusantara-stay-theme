<?php
/**
 * Title: Sidebar
 * Slug: nusantara-stay/sidebar
 * Categories: nusantara-stay
 * Description: The journal sidebar: a short note about the house with a photo, search, topics, recent stories and opening hours. Used by the Journal with sidebar and Article with sidebar layouts.
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"aside","className":"nusantara-stay-aside","layout":{"type":"default"}} -->
<aside class="wp-block-group nusantara-stay-aside"><!-- wp:group {"className":"nusantara-stay-aside__about","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-aside__about"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-aside__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-aside__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-house-detail.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'A teapot and two cups on a garden stone', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:heading {"level":3,"className":"nusantara-stay-aside__title"} -->
<h3 class="wp-block-heading nusantara-stay-aside__title"><?php echo wp_kses_post( __( 'About <em>the house.</em>', 'nusantara-stay' ) ); ?></h3>
<!-- /wp:heading --><!-- wp:paragraph -->
<p><?php echo esc_html__( 'A garden villa in Ubud: six quiet rooms, a tropical garden and warm Indonesian hospitality.', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'nusantara-stay' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Search the journal', 'nusantara-stay' ); ?>","buttonText":"<?php echo esc_attr__( 'Search', 'nusantara-stay' ); ?>","buttonPosition":"no-button","className":"nusantara-stay-find nusantara-stay-aside__search"} /--><!-- wp:group {"className":"nusantara-stay-aside__block","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-aside__block"><!-- wp:heading {"level":3,"className":"nusantara-stay-aside__label"} -->
<h3 class="wp-block-heading nusantara-stay-aside__label"><?php echo esc_html__( 'Topics', 'nusantara-stay' ); ?></h3>
<!-- /wp:heading --><!-- wp:categories {"className":"nusantara-stay-aside__list"} /--></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-aside__block","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-aside__block"><!-- wp:heading {"level":3,"className":"nusantara-stay-aside__label"} -->
<h3 class="wp-block-heading nusantara-stay-aside__label"><?php echo esc_html__( 'Recent stories', 'nusantara-stay' ); ?></h3>
<!-- /wp:heading --><!-- wp:latest-posts {"postsToShow":4,"displayPostDate":true,"className":"nusantara-stay-aside__list nusantara-stay-aside__posts"} /--></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-aside__block","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-aside__block"><!-- wp:heading {"level":3,"className":"nusantara-stay-aside__label"} -->
<h3 class="wp-block-heading nusantara-stay-aside__label"><?php echo esc_html__( 'Opening hours', 'nusantara-stay' ); ?></h3>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-aside__hours"} -->
<p class="nusantara-stay-aside__hours"><?php echo wp_kses_post( __( 'Front desk open daily<br>Check-in 14:00 · Check-out 12:00', 'nusantara-stay' ) ); ?><br><a href="tel:626285175019595">+62 851-7501-9595</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></aside>
<!-- /wp:group -->
