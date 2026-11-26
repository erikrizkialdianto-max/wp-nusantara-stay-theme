<?php
/**
 * Title: Menu panel
 * Slug: nusantara-stay/menu-panel
 * Categories: header
 * Description: The panel that opens from the Explore button: five large links, Book, opening hours and one photo.
 * Viewport width: 1440
 * Inserter: no
 */
?>
<!-- wp:group {"anchor":"nusantara-stay-menu","className":"nusantara-stay-menu-panel","backgroundColor":"surface","textColor":"ink","layout":{"type":"default"}} -->
<div id="nusantara-stay-menu" class="wp-block-group nusantara-stay-menu-panel has-ink-color has-text-color has-surface-background-color has-background"><!-- wp:columns {"className":"nusantara-stay-menu-panel__cols","isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"left":"0"}}}} -->
<div class="wp-block-columns nusantara-stay-menu-panel__cols"><!-- wp:column {"className":"nusantara-stay-menu-panel__left","width":"42%"} -->
<div class="wp-block-column nusantara-stay-menu-panel__left" style="flex-basis:42%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"nusantara-stay-menu-panel__top","style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group nusantara-stay-menu-panel__top"><!-- wp:site-title {"level":0} /--><!-- wp:paragraph {"className":"nusantara-stay-menu-close-wrap"} -->
<p class="nusantara-stay-menu-close-wrap"><a class="nusantara-stay-menu-close" href="#"><?php echo esc_html__( 'Close', 'nusantara-stay' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:buttons {"className":"nusantara-stay-book nusantara-stay-book--panel"} -->
<div class="wp-block-buttons nusantara-stay-book nusantara-stay-book--panel"><!-- wp:button {"className":"is-style-outline","fontSize":"x-small"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-x-small-font-size"><a class="wp-block-button__link wp-element-button" href="#reserve"><?php echo esc_html__( 'Book your stay', 'nusantara-stay' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-menu-panel__links","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-menu-panel__links"><!-- wp:navigation {"className":"nusantara-stay-menu-panel__nav","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.2rem"}}} -->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Home', 'nusantara-stay' ); ?>","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'The villa', 'nusantara-stay' ); ?>","url":"#experience","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Rooms', 'nusantara-stay' ); ?>","url":"#rooms","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Journal', 'nusantara-stay' ); ?>","url":"#journal","kind":"custom","isTopLevelLink":true} /--><!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Visit', 'nusantara-stay' ); ?>","url":"#reserve","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group --><!-- wp:paragraph {"className":"nusantara-stay-menu-panel__foot","textColor":"ink-2","fontSize":"small"} -->
<p class="nusantara-stay-menu-panel__foot has-ink-2-color has-text-color has-small-font-size"><?php echo esc_html__( 'Front desk open daily', 'nusantara-stay' ); ?> · <a href="tel:626285175019595">+62 851-7501-9595</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --><!-- wp:column {"className":"nusantara-stay-menu-panel__right nusantara-stay-menu-panel__photo"} -->
<div class="wp-block-column nusantara-stay-menu-panel__right nusantara-stay-menu-panel__photo"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-garden-wide.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'Morning light in a quiet corner', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->