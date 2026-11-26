<?php
/**
 * Title: Announcement bar
 * Slug: nusantara-stay/announcement
 * Categories: banner
 * Description: Opening hours, Book a room and the phone number above the header.
 * Inserter: no
 *
 * @package Nusantara Stay
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"8px","bottom":"8px"}}},"backgroundColor":"surface-2","textColor":"ink-2","fontSize":"x-small","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-ink-2-color has-surface-2-background-color has-text-color has-background has-x-small-font-size" style="padding-top:8px;padding-bottom:8px"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"className":"nusantara-stay-annc-hours"} -->
<p class="nusantara-stay-annc-hours"><?php echo esc_html__( 'Front desk open daily · Check-in from 14:00', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="#reserve"><?php echo esc_html__( 'Book a room', 'nusantara-stay' ); ?></a> · <a href="tel:626285175019595">+62 851-7501-9595</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
