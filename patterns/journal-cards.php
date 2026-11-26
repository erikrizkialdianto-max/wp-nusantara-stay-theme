<?php
/**
 * Title: From the journal: three portrait cards
 * Slug: nusantara-stay/journal-cards
 * Categories: nusantara-stay
 * Description: A centred heading and the three latest stories as portrait cards. Fills in by itself as you publish.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"journal","className":"nusantara-stay-jcards nusantara-stay-narrow","layout":{"type":"constrained"}} -->
<section id="journal" class="wp-block-group alignfull nusantara-stay-jcards nusantara-stay-narrow"><!-- wp:group {"align":"wide","className":"nusantara-stay-inner","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide nusantara-stay-inner"><!-- wp:group {"className":"nusantara-stay-cards__intro nusantara-stay-jcards__intro","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-cards__intro nusantara-stay-jcards__intro"><!-- wp:group {"className":"nusantara-stay-cards__intro-head","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-cards__intro-head"><!-- wp:paragraph {"className":"nusantara-stay-eyebrow"} -->
<p class="nusantara-stay-eyebrow"><?php echo wp_kses_post( __( 'The journal', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php echo wp_kses_post( __( 'From <em>the journal.</em>', 'nusantara-stay' ) ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-cards__intro-text","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-cards__intro-text"><!-- wp:paragraph {"className":"nusantara-stay-chapter__body"} -->
<p class="nusantara-stay-chapter__body"><?php echo wp_kses_post( __( 'Stories from the villa, the garden and the island, written as the seasons turn.', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"nusantara-stay-arrow"} -->
<p class="nusantara-stay-arrow"><a href="#journal"><?php echo wp_kses_post( __( 'All stories →', 'nusantara-stay' ) ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --><!-- wp:query {"queryId":11,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"className":"nusantara-stay-jcards__query","layout":{"type":"default"}} -->
<div class="wp-block-query nusantara-stay-jcards__query"><!-- wp:post-template {"className":"nusantara-stay-jcards__grid"} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/5"} /-->
<!-- wp:post-terms {"term":"category","className":"nusantara-stay-card2__kind"} /-->
<!-- wp:post-title {"isLink":true,"level":3} /-->
<!-- wp:post-date {"format":"j F Y"} /-->
<!-- wp:read-more {"content":"<?php echo esc_attr__( 'Read the story', 'nusantara-stay' ); ?>","className":"nusantara-stay-jcards__more"} /-->
<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php echo wp_kses_post( __( 'No stories yet: they will appear here as soon as you publish your first post.', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
