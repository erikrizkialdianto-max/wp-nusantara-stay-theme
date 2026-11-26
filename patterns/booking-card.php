<?php
/**
 * Title: Booking card on a photo
 * Slug: nusantara-stay/booking-card
 * Categories: nusantara-stay, call-to-action
 * Description: A paper card on a wide photo (or a calm sand band without a photo): a seal, a headline, a line, Book your stay and Book a room, and the phone number.
 * Viewport width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","anchor":"reserve","className":"nusantara-stay-booking nusantara-stay-booking--photo nusantara-stay-booking--under","layout":{"type":"constrained"}} -->
<section id="reserve" class="wp-block-group alignfull nusantara-stay-booking nusantara-stay-booking--photo nusantara-stay-booking--under"><!-- wp:group {"align":"wide","className":"nusantara-stay-inner","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide nusantara-stay-inner"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"nusantara-stay-booking__photo"} -->
<figure class="wp-block-image size-large nusantara-stay-booking__photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/k-suite-dusk.jpg' ) ); ?>" alt="<?php echo esc_attr__( 'The house lit at dusk over the garden', 'nusantara-stay' ); ?>"/></figure>
<!-- /wp:image --><!-- wp:group {"className":"nusantara-stay-booking__under","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-booking__under"><!-- wp:group {"className":"nusantara-stay-booking__words","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-booking__words"><!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php echo wp_kses_post( __( 'Your room <em>is waiting.</em>', 'nusantara-stay' ) ); ?></h2>
<!-- /wp:heading --><!-- wp:paragraph {"className":"nusantara-stay-booking__body"} -->
<p class="nusantara-stay-booking__body"><?php echo wp_kses_post( __( 'A night in the garden villa, with breakfast served on the veranda.', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --><!-- wp:group {"className":"nusantara-stay-booking__acts","layout":{"type":"default"}} -->
<div class="wp-block-group nusantara-stay-booking__acts"><!-- wp:buttons {"className":"nusantara-stay-booking__btns"} -->
<div class="wp-block-buttons nusantara-stay-booking__btns"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="tel:626285175019595"><?php echo wp_kses_post( __( 'Call to book', 'nusantara-stay' ) ); ?></a></div>
<!-- /wp:button --><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="mailto:hello@nusantarastay.com"><?php echo wp_kses_post( __( 'Write to us', 'nusantara-stay' ) ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --><!-- wp:paragraph {"className":"nusantara-stay-booking__contact"} -->
<p class="nusantara-stay-booking__contact"><?php echo wp_kses_post( __( 'or call +62 851-7501-9595', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
