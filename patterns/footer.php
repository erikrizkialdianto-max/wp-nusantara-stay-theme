<?php
/**
 * Title: Footer
 * Slug: nusantara-stay/footer
 * Categories: footer
 * Description: The footer: newsletter note, Visit, Explore, Follow and the small print.
 * Inserter: no
 *
 * @package Nusantara Stay
 */

?>
<!-- wp:group {"align":"full","className":"nusantara-stay-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40"}}},"backgroundColor":"deep","textColor":"on-deep-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull nusantara-stay-footer has-on-deep-2-color has-deep-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:site-title {"level":0,"className":"nusantara-stay-footer__brand","textColor":"on-deep","fontSize":"x-large"} /--></div>
<!-- /wp:group -->
<!-- wp:columns {"align":"wide","className":"nusantara-stay-footer__cols","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide nusantara-stay-footer__cols" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:paragraph {"textColor":"on-deep","fontSize":"large","style":{"typography":{"fontWeight":"300"}}} -->
<p class="has-on-deep-color has-text-color has-large-font-size" style="font-weight:300"><?php echo esc_html__( 'Stay in the loop', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php echo esc_html__( 'Stories, events and special offers from the villa. Send us a note and we\'ll add you to the list.', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"on-deep","textColor":"deep"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-deep-color has-on-deep-background-color has-text-color has-background wp-element-button" href="mailto:hello@nusantarastay.com?subject=Newsletter"><?php echo esc_html__( 'Join the list', 'nusantara-stay' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"on-deep"} -->
<p class="has-on-deep-color has-text-color"><?php echo esc_html__( 'Visit', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small","style":{"typography":{"lineHeight":"1.9"}}} -->
<p class="has-small-font-size" style="line-height:1.9"><?php echo wp_kses_post( __( 'Jl. Raya Ubud No. 88<br>Ubud, Bali 80571, Indonesia', 'nusantara-stay' ) ); ?><br><a href="tel:626285175019595">+62 851-7501-9595</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"on-deep"} -->
<p class="has-on-deep-color has-text-color"><?php echo esc_html__( 'Explore', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small","style":{"typography":{"lineHeight":"1.9"}}} -->
<p class="has-small-font-size" style="line-height:1.9"><a href="#experience"><?php echo esc_html__( 'The villa', 'nusantara-stay' ); ?></a><br><a href="#rooms"><?php echo esc_html__( 'Rooms', 'nusantara-stay' ); ?></a><br><a href="#journal"><?php echo esc_html__( 'Journal', 'nusantara-stay' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"on-deep"} -->
<p class="has-on-deep-color has-text-color"><?php echo esc_html__( 'Follow', 'nusantara-stay' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small","style":{"typography":{"lineHeight":"1.9"}}} -->
<p class="has-small-font-size" style="line-height:1.9"><a href="https://www.instagram.com/nusantarastay/" target="_blank" rel="noopener noreferrer">Instagram</a><br><a href="https://www.facebook.com/nusantarastay/" target="_blank" rel="noopener noreferrer">Facebook</a><br><a href="https://www.tiktok.com/@nusantarastay" target="_blank" rel="noopener noreferrer">TikTok</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- wp:group {"align":"wide","className":"nusantara-stay-footer__base","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide nusantara-stay-footer__base" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">© <?php echo esc_html__( 'Nusantara Stay', 'nusantara-stay' ); ?> · <a href="/privacy-policy/"><?php echo esc_html__( 'Privacy', 'nusantara-stay' ); ?></a> · <a href="#"><?php echo esc_html__( 'Terms', 'nusantara-stay' ); ?></a></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size"><?php echo wp_kses_post( __( 'A hospitality theme by <a href="https://github.com">Erik Rizki Aldianto</a>', 'nusantara-stay' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
