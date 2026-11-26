<?php
/**
 * Title: Header: menu panel, over the hero
 * Slug: nusantara-stay/header-panel
 * Categories: header
 * Description: Explore button, locations and Book over the hero photo; opens a split-screen menu panel.
 * Viewport width: 1440
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"className":"nusantara-stay-header nusantara-stay-header--panel nusantara-stay-header--overlay","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-header nusantara-stay-header--panel nusantara-stay-header--overlay"><!-- wp:group {"align":"full","className":"nusantara-stay-header__inner","style":{"spacing":{"padding":{"top":"20px","bottom":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull nusantara-stay-header__inner" style="padding-top:20px;padding-bottom:20px"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"className":"nusantara-stay-header__left","style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group nusantara-stay-header__left"><!-- wp:site-title {"level":0} /--><!-- wp:paragraph {"className":"nusantara-stay-menu-toggle-wrap"} -->
<p class="nusantara-stay-menu-toggle-wrap"><a class="nusantara-stay-menu-toggle" href="#nusantara-stay-menu"><span class="nusantara-stay-menu-toggle__label"><?php echo esc_html__( 'Explore', 'nusantara-stay' ); ?></span></a></p>
<!-- /wp:paragraph --><!-- wp:navigation {"className":"nusantara-stay-locations","overlayMenu":"never","openSubmenusOnClick":true,"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<!-- wp:navigation-submenu {"label":"<?php echo esc_attr__( 'Ubud', 'nusantara-stay' ); ?>","url":"#","kind":"custom"} -->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Ubud', 'nusantara-stay' ); ?>","url":"#","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Bali', 'nusantara-stay' ); ?>","url":"#","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Lombok', 'nusantara-stay' ); ?>","url":"#","kind":"custom"} /-->
<!-- /wp:navigation-submenu -->
<!-- /wp:navigation --></div>
<!-- /wp:group --><!-- wp:buttons {"className":"nusantara-stay-book"} -->
<div class="wp-block-buttons nusantara-stay-book"><!-- wp:button {"fontSize":"x-small"} -->
<div class="wp-block-button has-custom-font-size has-x-small-font-size"><a class="wp-block-button__link wp-element-button" href="#reserve"><?php echo esc_html__( 'Book your stay', 'nusantara-stay' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
