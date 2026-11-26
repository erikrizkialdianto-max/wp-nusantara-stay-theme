<?php
/**
 * Title: Journal: the latest story
 * Slug: nusantara-stay/journal-lead
 * Categories: nusantara-stay
 * Description: The latest story large, with a small photo beside it. Fills in by itself as you publish.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"nusantara-stay-jlead nusantara-stay-narrow","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull nusantara-stay-jlead nusantara-stay-narrow"><!-- wp:group {"align":"wide","className":"nusantara-stay-inner","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide nusantara-stay-inner"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-jlead__small"} -->
<figure class="wp-block-image size-large nusantara-stay-jlead__small"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-house-detail.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'A quiet corner of the garden villa', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:query {"queryId":21,"query":{"perPage":1,"pages":1,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","className":"nusantara-stay-jlead__query","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide nusantara-stay-jlead__query"><!-- wp:post-template {"className":"nusantara-stay-jlead__item"} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"2/3","className":"nusantara-stay-jlead__photo"} /-->
<!-- wp:group {"className":"nusantara-stay-jlead__text","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-jlead__text"><!-- wp:post-terms {"term":"category","className":"nusantara-stay-card2__kind"} /--><!-- wp:post-title {"isLink":true,"fontSize":"xx-large"} /--><!-- wp:post-date {"format":"j F Y"} /--><!-- wp:read-more {"content":"<?php echo esc_attr__( 'Read the story →', 'nusantara-stay' ); ?>","className":"nusantara-stay-jcards__more"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
