<?php
/**
 * Nusantara Stay by Erik Rizki Aldianto — theme functions.
 *
 * @package nusantara-stay
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/*
 * 4.0.0 The theme in parts. The free build ships this file alone; Nusantara Stay Pro adds inc/pro.php,
 * and the Kōshi demo network adds inc/demo.php and inc/legacy.php.
 */
/**
 * 1.0.0 The theme's own prefix. Nusantara Stay's classes, settings and script data use a clean prefix;
 * they are now "nusantara-stay". Pages, templates and settings saved before 1.0.0 are updated once per site.
 */
function nusantara_stay_prefix_upgrade() {
	if ( '1.0.0' === get_option( 'nusantara_stay_prefix' ) ) {
		return;
	}
	global $wpdb;
	update_option( 'nusantara_stay_prefix', '1.0.0', true );
	$old = 'z' . 'zp';
	// Saved pages, posts, templates, template parts, patterns, navigation and global styles.
	$wpdb->query( $wpdb->prepare( "UPDATE {$wpdb->posts} SET post_content = REPLACE( post_content, %s, %s ) WHERE post_content LIKE %s", $old . '-', 'nusantara-stay-', '%' . $wpdb->esc_like( $old . '-' ) . '%' ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery
	// Settings: renamed, and any stored value that mentions the old classes (serialized safely).
	$rows = $wpdb->get_results( $wpdb->prepare( "SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE %s OR option_value LIKE %s", $wpdb->esc_like( $old . '_' ) . '%', '%' . $wpdb->esc_like( $old ) . '%' ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery
	$swap = function ( $v ) use ( &$swap, $old ) {
		if ( is_string( $v ) ) {
			return str_replace( array( $old . '-', $old . '_', $old . 'Stay' ), array( 'nusantara-stay-', 'nusantara_stay_', 'nusantaraStay' ), $v );
		}
		if ( is_array( $v ) ) {
			return array_map( $swap, $v );
		}
		return $v;
	};
	foreach ( $rows as $row ) {
		$name = $row->option_name;
		if ( 0 === strpos( $name, '_transient' ) || 0 === strpos( $name, '_site_transient' ) ) {
			continue;
		}
		$value = get_option( $name );
		if ( 0 === strpos( $name, $old . '_' ) ) {
			if ( 0 === strpos( $name, $old . '_stay_weather_' ) && strlen( $name ) > 40 ) {
				delete_option( $name ); // An old weather cache: it refills by itself.
				continue;
			}
			$new = 'nusantara_stay_' . substr( $name, strlen( $old ) + 1 );
			if ( false === get_option( $new ) ) {
				update_option( $new, $swap( $value ) );
			}
			delete_option( $name );
		} else {
			$fixed = $swap( $value );
			if ( $fixed !== $value ) {
				update_option( $name, $fixed );
			}
		}
	}
	if ( function_exists( 'wp_clean_theme_json_cache' ) ) {
		wp_clean_theme_json_cache();
	}
	wp_cache_flush();
	do_action( 'litespeed_purge_all' );
}
add_action( 'init', 'nusantara_stay_prefix_upgrade', 1 );

foreach ( array( 'legacy', 'pro', 'contact', 'demo', 'stays' ) as $nusantara_stay_part ) {
	if ( file_exists( __DIR__ . '/inc/' . $nusantara_stay_part . '.php' ) ) {
		require_once __DIR__ . '/inc/' . $nusantara_stay_part . '.php';
	}
}

/**
 * Theme setup.
 */
function nusantara_stay_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'nusantara_stay_setup' );

/**
 * Front-end stylesheet and the small enhancement script.
 */
function nusantara_stay_enqueue() {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'nusantara-stay-style', get_stylesheet_uri(), array(), $version );
	wp_enqueue_script(
		'nusantara-stay',
		get_theme_file_uri( 'assets/js/nusantara-stay.js' ),
		array(),
		$version,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'nusantara_stay_enqueue' );

/**
 * Block styles shown in the editor's Styles panel.
 */
function nusantara_stay_block_styles() {
	foreach ( array( 'core/image', 'core/cover', 'core/group' ) as $block ) {
		register_block_style(
			$block,
			array(
				'name'  => 'nusantara-stay-corner',
				'label' => __( 'Signature corner', 'nusantara-stay' ),
			)
		);
	}

	$transitions = array(
		'nusantara-stay-fx-zoom'    => __( 'Slider: slow zoom', 'nusantara-stay' ),
		'nusantara-stay-fx-fade'    => __( 'Slider: fade', 'nusantara-stay' ),
		'nusantara-stay-fx-slide'   => __( 'Slider: slide', 'nusantara-stay' ),
		'nusantara-stay-fx-curtain' => __( 'Slider: curtain', 'nusantara-stay' ),
	);
	$grids = array(
		'nusantara-stay-grid-three'     => __( 'Gallery: three equal', 'nusantara-stay' ),
		'nusantara-stay-grid-tall'      => __( 'Gallery: tall and wide', 'nusantara-stay' ),
		'nusantara-stay-grid-staggered' => __( 'Gallery: staggered', 'nusantara-stay' ),
	);
	foreach ( $grids as $name => $label ) {
		register_block_style( 'core/columns', array( 'name' => $name, 'label' => $label ) );
	}

	$lines = array(
		'nusantara-stay-line-bowl'    => __( 'Line with a tea bowl', 'nusantara-stay' ),
		'nusantara-stay-line-amphora' => __( 'Line with an amphora', 'nusantara-stay' ),
	);
	foreach ( $lines as $name => $label ) {
		register_block_style( 'core/separator', array( 'name' => $name, 'label' => $label ) );
	}

	foreach ( $transitions as $name => $label ) {
		register_block_style(
			'core/group',
			array(
				'name'  => $name,
				'label' => $label,
			)
		);
	}
}
add_action( 'init', 'nusantara_stay_block_styles' );

/**
 * Pattern categories.
 */
function nusantara_stay_pattern_categories() {
	register_block_pattern_category( 'nusantara-stay', array( 'label' => __( 'Nusantara Stay', 'nusantara-stay' ) ) );
	register_block_pattern_category( 'nusantara-stay-hero', array( 'label' => __( 'Nusantara Stay: Heroes', 'nusantara-stay' ) ) );
	register_block_pattern_category( 'nusantara-stay-pages', array( 'label' => __( 'Nusantara Stay: Pages', 'nusantara-stay' ) ) );
}
add_action( 'init', 'nusantara_stay_pattern_categories' );

/**
 * Body class that switches the motion styles on.
 *
 * @param array $classes Body classes.
 * @return array
 */
function nusantara_stay_body_class( $classes ) {
	if ( (bool) get_option( 'nusantara_stay_stay_motion', true ) ) {
		$classes[] = 'nusantara-stay-motion';
	}
	// Demo sites: a small emblem beside the site name (header) and above it (footer).
	if ( function_exists( 'nusantara_stay_demo_current' ) && function_exists( 'nusantara_stay_demo_emblem' ) && nusantara_stay_demo_emblem( nusantara_stay_demo_current() ) ) {
		$classes[] = 'nusantara-stay-emblem-' . nusantara_stay_demo_current();
	}
	return $classes;
}
add_filter( 'body_class', 'nusantara_stay_body_class' );

/**
 * Interface words the front-end script needs (translatable).
 */
function nusantara_stay_ui_strings() {
	return array(
		'toTop'        => __( 'Back to top', 'nusantara-stay' ),
		'aTable'       => __( 'A table', 'nusantara-stay' ),
		'aRoom'        => __( 'A room', 'nusantara-stay' ),
		'opensBooking' => __( 'Opens the booking site', 'nusantara-stay' ),
		'close'        => __( 'Close', 'nusantara-stay' ),
		'menu'         => __( 'Menu', 'nusantara-stay' ),
		'explore'      => __( 'Explore', 'nusantara-stay' ),
		'closeMenu'    => __( 'Close menu', 'nusantara-stay' ),
		'today'        => __( 'Today', 'nusantara-stay' ),
		'wxClear'      => __( 'clear', 'nusantara-stay' ),
		'wxPartly'     => __( 'partly cloudy', 'nusantara-stay' ),
		'wxCloudy'     => __( 'cloudy', 'nusantara-stay' ),
		'wxFog'        => __( 'fog', 'nusantara-stay' ),
		'wxRain'       => __( 'light rain', 'nusantara-stay' ),
		'wxHeavyRain'  => __( 'rain', 'nusantara-stay' ),
		'wxStorm'      => __( 'storms', 'nusantara-stay' ),
		'wxSnow'       => __( 'snow', 'nusantara-stay' ),
		'wxCredit'     => __( 'Weather data: MET Norway', 'nusantara-stay' ),
	);
}

/**
 * Data for the front-end script.
 */
function nusantara_stay_script_data() {
	$data = array(
		'tz'      => wp_timezone_string(),
		'demo'    => function_exists( 'nusantara_stay_demo_visitor' ) ? nusantara_stay_demo_visitor() : '', // only a ?style= pick travels with links
		'i18n'    => nusantara_stay_ui_strings(),
		'totop'   => (bool) get_option( 'nusantara_stay_totop', true ),
		'ph'      => function_exists( 'nusantara_stay_placeholders_on' ) ? nusantara_stay_placeholders_on() : false,
		'roomUrl' => esc_url_raw( (string) get_option( 'nusantara_stay_room_url', '' ) ),
		'visit'   => ( get_page_by_path( 'visit' ) && 'publish' === get_post_status( get_page_by_path( 'visit' ) ) ) ? get_permalink( get_page_by_path( 'visit' ) ) : '',
	);
	$data = apply_filters( 'nusantara_stay_script_data', $data );
	wp_add_inline_script( 'nusantara-stay', 'window.nusantaraStay = ' . wp_json_encode( $data ) . ';', 'before' );
}
add_action( 'wp_enqueue_scripts', 'nusantara_stay_script_data', 20 );
/**
 * The Headings font the site owner picked in Styles › Typography, as --nusantara-stay-heading-font,
 * so display text such as the menu panel links follows it. Empty when unchanged.
 */
function nusantara_stay_heading_font_css() {
	// The heading font actually in use: theme default, colour style and the site's own choice, merged.
	$font = wp_get_global_styles( array( 'elements', 'heading', 'typography', 'fontFamily' ) );
	if ( ! is_string( $font ) || '' === $font ) {
		return '';
	}
	if ( 0 === strpos( $font, 'var:preset|font-family|' ) ) {
		$font = 'var(--wp--preset--font-family--' . sanitize_key( substr( $font, 23 ) ) . ')';
	} elseif ( preg_match( '/^var\(--wp--preset--font-family--([a-z0-9-]+)\)$/', $font, $m ) ) {
		$font = 'var(--wp--preset--font-family--' . $m[1] . ')';
	}
	if ( preg_match( '/[;{}<>]/', $font ) ) {
		return '';
	}
	return ':root{--nusantara-stay-heading-font:' . $font . ';}';
}
/**
 * The Maison font pairing (Bodoni Moda) sets its italic accents upright and its
 * small links in capitals. Kept here rather than in the style file, so Maison
 * stays a pure font pairing under Styles › Typography.
 */
function nusantara_stay_maison_css() {
	$families = wp_get_global_settings( array( 'typography', 'fontFamilies' ) );
	foreach ( array( 'custom', 'theme' ) as $origin ) {
		foreach ( isset( $families[ $origin ] ) ? (array) $families[ $origin ] : array() as $f ) {
			if ( isset( $f['slug'], $f['fontFamily'] ) && 'serif' === $f['slug'] ) {
				return false !== stripos( $f['fontFamily'], 'Bodoni' ) ? 'h1 em, h2 em, h3 em, h4 em { font-family: inherit; font-style: normal; font-weight: inherit; } .nusantara-stay-arrow a, .nusantara-stay-stack .nusantara-stay-arrow a { font-family: var(--wp--preset--font-family--serif); text-transform: uppercase; letter-spacing: 0.06em; font-size: 0.82rem; } .nusantara-stay-menu-panel .nusantara-stay-menu-panel__nav .wp-block-navigation-item__content { font-family: var(--wp--preset--font-family--serif); text-transform: uppercase; }' : '';
			}
		}
	}
	return '';
}
function nusantara_stay_heading_font_style() {
	wp_add_inline_style( 'nusantara-stay-style', ( function_exists( 'nusantara_stay_pattern_css' ) ? nusantara_stay_pattern_css() : '' ) . nusantara_stay_heading_font_css() . nusantara_stay_maison_css() );
}
add_filter( 'block_editor_settings_all', function ( $settings ) {
	$css = nusantara_stay_maison_css();
	if ( $css ) {
		$settings['styles'][] = array( 'css' => $css );
	}
	return $settings;
} );
add_action( 'wp_enqueue_scripts', 'nusantara_stay_heading_font_style', 20 );

/**
 * Open every section as a normal block in the editor.
 * WordPress 7 locks sections that come from a pattern to "content only", so
 * padding, colours and the line pattern stay hidden until "Edit pattern" is
 * pressed. Restaurant owners shouldn't need to know that step.
 *
 * @param array $settings Editor settings.
 * @return array
 */
function nusantara_stay_unlock_pattern_sections( $settings ) {
	$settings['disableContentOnlyForUnsyncedPatterns'] = true;
	return $settings;
}
add_filter( 'block_editor_settings_all', 'nusantara_stay_unlock_pattern_sections' );

/**
 * Stop iOS from turning postcodes and numbers into phone links.
 * Real phone numbers in the theme are written as tel: links, so they keep working.
 */
function nusantara_stay_format_detection() {
	echo '<meta name="format-detection" content="telephone=no, address=no">' . "\n";
}
add_action( 'wp_head', 'nusantara_stay_format_detection', 1 );

/**
 * Pattern markup from the theme file.
 *
 * @param string $slug Pattern file name.
 * @return string
 */
function nusantara_stay_pattern_markup( $slug ) {
	$file = get_theme_file_path( 'patterns/' . $slug . '.php' );
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return trim( (string) ob_get_clean() );
}

/**
 * Create the missing inner pages.
 *
 * @return int Pages created.
 */

/**
 * The published page that uses the Journal template, if any.
 *
 * @return int Page ID or 0.
 */
function nusantara_stay_journal_page() {
	$ids = get_posts( array( 'post_type' => 'page', 'post_status' => 'publish', 'meta_key' => '_wp_page_template', 'meta_value' => 'page-journal', 'fields' => 'ids', 'posts_per_page' => 1, 'orderby' => 'ID', 'order' => 'ASC' ) ); // phpcs:ignore WordPress.DB.SlowDBQuery
	return $ids ? (int) $ids[0] : 0;
}

/**
 * Where "Journal" links go: the site's posts page when it has one, else the Journal page.
 *
 * @return string URL or ''.
 */
function nusantara_stay_journal_url() {
	$posts = (int) get_option( 'page_for_posts' );
	if ( $posts && 'page' === get_option( 'show_on_front' ) && 'publish' === get_post_status( $posts ) ) {
		return get_permalink( $posts );
	}
	$page = nusantara_stay_journal_page();
	return $page ? get_permalink( $page ) : '';
}


/**
 * 3.11.1: links in the menu panel, header and footer follow the inner pages.
 * "#menu", "#rooms", "#offers" and "#visit" open the page of that name when it exists;
 * otherwise, away from the homepage, they go back to that section of the homepage.
 * In the menu panel, "Home" (#) leads to the homepage.
 *
 * @param string $html  Template part HTML.
 * @param array  $block Block.
 * @return string
 */
function nusantara_stay_page_links( $html, $block ) {
	$slug    = isset( $block['attrs']['slug'] ) ? (string) $block['attrs']['slug'] : '';
	$content = 'core/post-content' === $block['blockName'];
	if ( ( ! $content && ! preg_match( '/^(menu-panel|footer|header)/', $slug ) ) || false === strpos( $html, 'href="' ) ) {
		return $html;
	}
	static $map = null;
	if ( null === $map ) {
		$map   = array();
		$pages = array();
		foreach ( array( 'menu', 'rooms', 'events', 'offers', 'experiences', 'visit' ) as $p ) {
			$page = get_page_by_path( $p );
			if ( $page && 'publish' === $page->post_status ) {
				$pages[ $p ] = get_permalink( $page );
			}
		}
		if ( empty( $pages['rooms'] ) && ! empty( $pages['events'] ) ) {
			$pages['rooms'] = $pages['events']; // a café without rooms: the Rooms link opens Private events
		}
		if ( empty( $pages['experiences'] ) && ! empty( $pages['offers'] ) ) {
			$pages['experiences'] = $pages['offers']; // 3.19.0 sites made before the Experiences page keep a working link
		}
		foreach ( array( 'menu', 'rooms', 'events', 'offers', 'experiences', 'visit', 'bar', 'reserve', 'experience', 'house', 'room-cards' ) as $anchor ) {
			if ( isset( $pages[ $anchor ] ) ) {
				$map[ $anchor ] = $pages[ $anchor ];
			} elseif ( 'reserve' === $anchor && is_singular() && preg_match( '/nusantara-stay\/closing-|id="reserve"/', (string) get_post_field( 'post_content', get_queried_object_id() ) ) ) {
				continue; // this page has its own booking section
			} elseif ( ! is_front_page() ) {
				$map[ $anchor ] = home_url( '/#' . $anchor );
			}
		}
		$map['__events'] = empty( $pages['events'] ) || isset( $pages['rooms'] ) && $pages['rooms'] !== $pages['events'] ? '' : 'yes';
	}
	$html = preg_replace_callback(
		'/href="#([a-z-]+)"/',
		function ( $m ) use ( $map ) {
			return isset( $map[ $m[1] ] ) && '__events' !== $m[1] ? 'href="' . esc_url( $map[ $m[1] ] ) . '"' : $m[0];
		},
		$html
	);
	if ( $content ) {
		return str_replace( 'href="/"', 'href="' . esc_url( home_url( '/' ) ) . '"', $html ); // breadcrumbs on sites in a sub-folder
	}
	if ( 0 === strpos( $slug, 'menu-panel' ) ) {
		$html = preg_replace( '/(wp-block-navigation-item__content"\s+)href="#"/', '$1href="' . esc_url( home_url( '/' ) ) . '"', $html );		$html = nusantara_stay_menu_panel_journal( $html, isset( $map['visit'] ) ? $map['visit'] : '' );
	}
	if ( 'yes' === $map['__events'] && isset( $map['events'] ) ) {
		$html = str_replace( 'href="' . esc_url( $map['events'] ) . '">' . __( 'Rooms', 'nusantara-stay' ) . '</a>', 'href="' . esc_url( $map['events'] ) . '">' . __( 'Private events', 'nusantara-stay' ) . '</a>', $html );
		$html = str_replace( 'wp-block-navigation-item__label">' . __( 'Rooms', 'nusantara-stay' ) . '<', 'wp-block-navigation-item__label">' . __( 'Private events', 'nusantara-stay' ) . '<', $html );
	}
	return $html;
}
add_filter( 'render_block_core/template-part', 'nusantara_stay_page_links', 10, 2 );

/**
 * 3.11.9 The menu panel links to the Journal (the posts page, Settings › Reading).
 * "#journal" opens it; with no posts page the item is left out. Demo sites whose
 * saved menu panel predates the Journal get the item before "Find us".
 *
 * @param string $html  Menu panel HTML.
 * @param string $visit The Visit page URL, if any.
 * @return string
 */
function nusantara_stay_menu_panel_journal( $html, $visit = '' ) {
	$journal = nusantara_stay_journal_url();
	if ( false !== strpos( $html, 'href="#journal"' ) ) {
		if ( $journal ) {
			return str_replace( 'href="#journal"', 'href="' . esc_url( $journal ) . '"', $html );
		}
		return preg_replace( '#<li[^>]*>(?:(?!</li>).)*href="\#journal".*?</li>#s', '', $html );
	}
	if ( ! $journal || ! function_exists( 'nusantara_stay_demo_current' ) || ! nusantara_stay_demo_current() || false !== strpos( $html, 'href="' . esc_url( $journal ) . '"' ) ) {
		return $html;
	}
	$item = '<li class="wp-block-navigation-item wp-block-navigation-link"><a class="wp-block-navigation-item__content" href="' . esc_url( $journal ) . '"><span class="wp-block-navigation-item__label">' . esc_html__( 'Journal', 'nusantara-stay' ) . '</span></a></li>';
	foreach ( array_filter( array( $visit ? esc_url( $visit ) : '', '#visit' ) ) as $href ) {
		$at = strpos( $html, 'href="' . $href . '"' );
		if ( false !== $at ) {
			$li = strrpos( substr( $html, 0, $at ), '<li' );
			if ( false !== $li ) {
				return substr_replace( $html, $item, $li, 0 );
			}
		}
	}
	$end = strpos( $html, '</ul></nav>' );
	return false === $end ? $html : substr_replace( $html, $item, $end, 0 );
}

add_filter( 'render_block_core/post-content', 'nusantara_stay_page_links', 10, 2 );

/**
 * Links in template paragraphs (breadcrumbs, 404 paths, "nothing found") follow the pages too.
 *
 * @param string $html  Paragraph HTML.
 * @param array  $block Block.
 * @return string
 */
function nusantara_stay_template_links( $html, $block ) {
	if ( ! preg_match( '/nusantara-stay-ip-crumbs|nusantara-stay-j-paths|nusantara-stay-j-none__txt/', $html ) ) {
		return $html;
	}
	return nusantara_stay_page_links( $html, array( 'blockName' => 'core/post-content', 'attrs' => array() ) );
}
add_filter( 'render_block_core/paragraph', 'nusantara_stay_template_links', 10, 2 );

/**
 * "More from the journal" under an article leaves out the article itself.
 *
 * @param array    $query Query vars.
 * @param WP_Block $block Query block.
 * @return array
 */
function nusantara_stay_more_posts( $query, $block ) {
	// 4.0.1 The theme's story lists run in date order: a sticky post is not added on top (it would double the lead story).
	$query['ignore_sticky_posts'] = true;
	if ( is_singular( 'post' ) && isset( $block->context['queryId'] ) && 4 === (int) $block->context['queryId'] ) {
		$query['post__not_in'] = array_merge( isset( $query['post__not_in'] ) ? (array) $query['post__not_in'] : array(), array( get_queried_object_id() ) );
	}
	return $query;
}
add_filter( 'query_loop_block_query_vars', 'nusantara_stay_more_posts', 10, 2 );

/**
 * 3.11.4 Homepage arrow links ("See the full menu →", "All offers →"…) open the inner pages
 * once they exist, and the offer titles link to the Offers page.
 *
 * @param string $html  Block HTML.
 * @param array  $block Block.
 * @return string
 */
function nusantara_stay_front_links( $html, $block ) {
	if ( ! is_front_page() ) {
		return $html;
	}
	static $pages = null;
	if ( null === $pages ) {
		$pages = array();
		foreach ( array( 'menu', 'rooms', 'events', 'offers', 'experiences', 'visit' ) as $p ) {
			$page = get_page_by_path( $p );
			if ( $page && 'publish' === $page->post_status ) {
				$pages[ $p ] = get_permalink( $page );
			}
		}
		if ( empty( $pages['rooms'] ) && ! empty( $pages['events'] ) ) {
			$pages['rooms'] = $pages['events'];
		}
	}
	if ( ! $pages ) {
		return $html;
	}
	if ( in_array( $block['blockName'], array( 'core/paragraph', 'core/button' ), true ) && false !== strpos( $html, '→' ) ) {
		$html = preg_replace_callback(
			'/href="#(menu|rooms|offers|experiences|visit)?"([^>]*>)([^<]*→)/u',
			function ( $m ) use ( $pages ) {
				$target = $m[1];
				if ( '' === $target && false !== stripos( $m[3], 'menu' ) ) {
					$target = 'menu';
				}
				return ( $target && isset( $pages[ $target ] ) ) ? 'href="' . esc_url( $pages[ $target ] ) . '"' . $m[2] . $m[3] : $m[0];
			},
			$html
		);
	}
	if ( 'core/group' === $block['blockName'] && isset( $pages['offers'] ) && false !== strpos( $html, 'id="offers"' ) ) {
		$html = preg_replace( '#<h3 class="wp-block-heading">([^<]+)</h3>#', '<h3 class="wp-block-heading"><a href="' . esc_url( $pages['offers'] ) . '">$1</a></h3>', $html );
	}
	return $html;
}
add_filter( 'render_block', 'nusantara_stay_front_links', 30, 2 );

/* ---------------------------------------------------------------------------
 * 3.12.0 Header styles: Panel (the Menu button and panel), Classic (page links
 * in a row) and Centred (the name in the middle, links on both sides).
 * Settings › Reading › Header style. The links are the menu panel's own links,
 * so they are edited in one place (Template parts › Menu panel).
 * ------------------------------------------------------------------------- */

/**
 * The header style in use: panel, classic or centred.
 *
 * @return string
 */
function nusantara_stay_header_style() {
	$style = (string) get_option( 'nusantara_stay_header_style', '' );
	if ( '' === $style ) {
		return 'centred'; // 3.18.0: the default
	}
	return in_array( $style, array( 'classic', 'centred' ), true ) ? $style : 'panel';
}

/**
 * The menu panel's links (label => URL), without Home.
 *
 * @return array
 */
function nusantara_stay_header_links() {
	static $links = null;
	if ( null !== $links ) {
		return $links;
	}
	$links = array();
	$part  = function_exists( 'get_block_template' ) ? get_block_template( get_stylesheet() . '//menu-panel', 'wp_template_part' ) : null;
	if ( ! $part || empty( $part->content ) ) {
		return $links;
	}
	$find = function ( $blocks ) use ( &$find ) {
		foreach ( $blocks as $b ) {
			if ( 'core/pattern' === $b['blockName'] && ! empty( $b['attrs']['slug'] ) && class_exists( 'WP_Block_Patterns_Registry' ) ) {
				$pat = WP_Block_Patterns_Registry::get_instance()->get_registered( $b['attrs']['slug'] );
				$r   = $pat ? $find( parse_blocks( $pat['content'] ) ) : null;
				if ( $r ) {
					return $r;
				}
				continue;
			}
			if ( 'core/navigation' === $b['blockName'] && ! empty( $b['attrs']['className'] ) && false !== strpos( $b['attrs']['className'], 'nusantara-stay-menu-panel__nav' ) ) {
				return $b;
			}
			if ( ! empty( $b['innerBlocks'] ) ) {
				$r = $find( $b['innerBlocks'] );
				if ( $r ) {
					return $r;
				}
			}
		}
		return null;
	};
	$nav = $find( parse_blocks( $part->content ) );
	if ( ! $nav ) {
		return $links;
	}
	$journal = function_exists( 'nusantara_stay_journal_url' ) ? nusantara_stay_journal_url() : '';
	$subs    = array(); // 3.22.0 label => array( label => URL ) for sub-menus (shown as a dropdown)
	foreach ( ( function_exists( 'nusantara_stay_demo_rooms_submenu' ) ? nusantara_stay_demo_rooms_submenu( $nav['innerBlocks'] ) : $nav['innerBlocks'] ) as $item ) {
		if ( 'core/navigation-submenu' === $item['blockName'] && ! empty( $item['innerBlocks'] ) ) {
			$children = array();
			foreach ( $item['innerBlocks'] as $child ) {
				if ( ! empty( $child['attrs']['label'] ) && ! empty( $child['attrs']['url'] ) ) {
					$children[ wp_strip_all_tags( $child['attrs']['label'] ) ] = (string) $child['attrs']['url'];
				}
			}
			if ( $children && ! empty( $item['attrs']['label'] ) ) {
				$subs[ wp_strip_all_tags( $item['attrs']['label'] ) ] = $children;
			}
		}
		$label = isset( $item['attrs']['label'] ) ? wp_strip_all_tags( $item['attrs']['label'] ) : '';
		$url   = isset( $item['attrs']['url'] ) ? (string) $item['attrs']['url'] : '';
		if ( '' === $label || '' === $url || '#' === $url || '/' === $url || home_url( '/' ) === $url ) {
			continue; // Home: the name already links there
		}
		if ( in_array( $url, array( '#bar', '#offers' ), true ) ) {
			continue; // 3.14: five pages at most (the bar and offers live on the homepage)
		}
		if ( '#journal' === $url ) {
			if ( ! $journal ) {
				continue;
			}
			$url = $journal;
		}
		if ( '#visit' === $url && $journal && ! in_array( $journal, $links, true ) ) {
			$links[ __( 'Journal', 'nusantara-stay' ) ] = $journal; // menu panels saved before the Journal existed
		}
		$label           = 'The menu' === $label ? __( 'Menu', 'nusantara-stay' ) : ( 'Find us' === $label ? __( 'Visit', 'nusantara-stay' ) : $label );
		$links[ $label ] = isset( $subs[ $label ] ) ? array( 'url' => $url, 'children' => $subs[ $label ] ) : $url;
	}
	return $links;
}

/**
 * Classic and Centred: add the links and the style class to the header parts.
 * Runs before nusantara_stay_page_links, which turns #menu, #rooms… into page addresses.
 *
 * @param string $html  Template part HTML.
 * @param array  $block Block.
 * @return string
 */
function nusantara_stay_header_variant( $html, $block ) {
	$slug = isset( $block['attrs']['slug'] ) ? (string) $block['attrs']['slug'] : '';
	if ( ! in_array( $slug, array( 'header-panel', 'header-panel-solid' ), true ) || false === strpos( $html, 'nusantara-stay-header--panel' ) ) {
		return $html;
	}
	$style = nusantara_stay_header_style();
	if ( 'panel' === $style ) {
		return $html;
	}
	$links = nusantara_stay_header_links();
	if ( ! $links ) {
		return $html;
	}
	$here = untrailingslashit( strtok( home_url( add_query_arg( array() ) ), '?' ) );
	// 3.19.1 "#menu", "#rooms"… are page addresses by now, so the page you are on is marked (not only Journal).
	// A room counts as Rooms, a story as Journal.
	$also = array();
	if ( ( is_singular( 'post' ) || is_category() || is_tag() || is_date() || is_author() ) && function_exists( 'nusantara_stay_journal_url' ) && nusantara_stay_journal_url() ) {
		$also[] = untrailingslashit( nusantara_stay_journal_url() );
	}
	if ( is_page() && ! in_array( get_post_field( 'post_name', get_queried_object_id() ), array( 'rooms', 'menu', 'experiences', 'visit', 'journal' ), true ) && false !== strpos( (string) get_post_field( 'post_content', get_queried_object_id() ), 'nusantara-stay-gallery' ) ) {
		$rooms = get_page_by_path( 'rooms' );
		if ( $rooms ) {
			$also[] = untrailingslashit( get_permalink( $rooms ) );
		}
	}
	$item = function ( $label, $url ) use ( $here, $also ) {
		if ( 0 === strpos( $url, '#' ) ) {
			$slug = substr( $url, 1 );
			$page = $slug ? get_page_by_path( 'room' === $slug ? 'garden-suite' : $slug ) : null;
			if ( $page && 'publish' === $page->post_status ) {
				$url = get_permalink( $page );
			}
		}
		$u  = untrailingslashit( $url );
		$on = ( $u === $here || in_array( $u, $also, true ) ) ? ' aria-current="page"' : '';
		return '<a href="' . esc_url( $url ) . '"' . $on . '>' . esc_html( $label ) . '</a>';
	};
	$all = array();
	$n   = 0;
	foreach ( $links as $label => $url ) {
		if ( is_array( $url ) ) {
			// 3.22.0 A sub-menu: a quiet dropdown. Its first link is the parent page itself.
			$n++;
			$id    = 'nusantara-stay-dd-' . $n;
			$kids  = $item( sprintf( /* translators: %s: menu item, e.g. Rooms */ __( 'All %s', 'nusantara-stay' ), function_exists( 'mb_strtolower' ) ? mb_strtolower( $label ) : strtolower( $label ) ), $url['url'] );
			$kids  = str_replace( array( '<a ', ' aria-current="page"' ), array( '<a class="nusantara-stay-dd__all" ', '' ), $kids );
			foreach ( $url['children'] as $cl => $cu ) {
				$kids .= str_replace( ' aria-current="page"', '', $item( $cl, $cu ) );
			}
			$top   = $item( $label, $url['url'] );
			$on    = false !== strpos( $top, 'aria-current' ) || false !== strpos( $kids, 'aria-current' );
			$top   = preg_replace( '#^<a #', '<a class="nusantara-stay-dd__top" aria-haspopup="true" aria-expanded="false" aria-controls="' . $id . '"' . ( $on && false === strpos( $top, 'aria-current' ) ? ' aria-current="page"' : '' ) . ' ', $top );
			$top   = str_replace( '</a>', '<svg class="nusantara-stay-dd__chev" viewBox="0 0 10 6" aria-hidden="true" focusable="false"><path d="M1 1l4 4 4-4"/></svg></a>', $top );
			$all[] = '<div class="nusantara-stay-dd">' . $top . '<div class="nusantara-stay-dd__panel" id="' . $id . '">' . $kids . '</div></div>';
			continue;
		}
		$all[] = $item( $label, $url );
	}
	$nav  = function ( $items, $mod ) {
		return '<nav class="nusantara-stay-header-links nusantara-stay-header-links--' . $mod . '" aria-label="' . esc_attr__( 'Main', 'nusantara-stay' ) . '">' . implode( '', $items ) . '</nav>';
	};
	$html = preg_replace( '/class="wp-block-group nusantara-stay-header /', 'class="wp-block-group nusantara-stay-header nusantara-stay-header--' . $style . ' ', $html, 1 );
	if ( 'classic' === $style ) {
		return preg_replace( '/(<div class="wp-block-buttons nusantara-stay-book)/', $nav( $all, 'row' ) . '$1', $html, 1 );
	}
	$half = (int) ceil( count( $all ) / 2 );
	$html = preg_replace( '#(<p class="nusantara-stay-menu-toggle-wrap[^"]*">.*?</p>)#s', '$1' . $nav( array_slice( $all, 0, $half ), 'a' ), $html, 1 );
	// 1.0.0 Keyboard order follows what you see: Explore, the left links, the name in the middle, the right links, Book.
	// The name is placed in the middle by CSS (absolute), so moving it in the markup changes nothing on screen.
	$title = '';
	if ( preg_match( '#<(p|h1|div)[^>]*class="[^"]*wp-block-site-title[^"]*"[^>]*>.*?</\\1>#s', $html, $m ) ) {
		$title = $m[0];
		$html  = str_replace( $title, '', $html );
	}
	return preg_replace( '/(<div class="wp-block-buttons nusantara-stay-book)/', $title . $nav( array_slice( $all, $half ), 'b' ) . '$1', $html, 1 );
}
add_filter( 'render_block_core/template-part', 'nusantara_stay_header_variant', 5, 2 );

add_filter( 'body_class', function ( $classes ) {
	if ( ! get_option( 'nusantara_stay_float_book', true ) ) {
		$classes[] = 'nusantara-stay-no-float';
	}
	return $classes;
} );


/* ---------------------------------------------------------------------------
 * 3.14.0 Simple navigation: the panel button says "Explore" (the word "Menu"
 * only ever means the food menu), and the panel keeps five links:
 * Home, Menu, Rooms, Journal, Visit. Theme defaults only: links a site owner
 * renamed or added are left as they are.
 * ------------------------------------------------------------------------- */
function nusantara_stay_simple_nav( $html, $block ) {
	$slug = isset( $block['attrs']['slug'] ) ? (string) $block['attrs']['slug'] : '';
	if ( 0 === strpos( $slug, 'header' ) && false !== strpos( $html, 'nusantara-stay-menu-toggle' ) ) {
		$html = preg_replace(
			'#(<a class="nusantara-stay-menu-toggle"[^>]*>)\s*(?:Menu|' . preg_quote( __( 'Menu', 'nusantara-stay' ), '#' ) . ')\s*</a>#',
			'$1<span class="nusantara-stay-menu-toggle__label">' . esc_html__( 'Explore', 'nusantara-stay' ) . '</span></a>',
			$html
		);
		return $html;
	}
	if ( 0 !== strpos( $slug, 'menu-panel' ) ) {
		return $html;
	}
	$drop = array( 'The bar', 'Offers', __( 'The bar', 'nusantara-stay' ), __( 'Offers', 'nusantara-stay' ) );
	$html = preg_replace_callback(
		'#<li[^>]*wp-block-navigation-item[^>]*>\s*<a[^>]*href="\#(bar|offers)"[^>]*>\s*<span class="wp-block-navigation-item__label">([^<]*)</span>.*?</li>#s',
		function ( $m ) use ( $drop ) {
			return in_array( trim( $m[2] ), $drop, true ) ? '' : $m[0];
		},
		$html
	);
	$rename = array(
		'The menu' => __( 'Menu', 'nusantara-stay' ),
		'Find us'  => __( 'Visit', 'nusantara-stay' ),
	);
	foreach ( $rename as $from => $to ) {
		$html = str_replace( 'wp-block-navigation-item__label">' . $from . '<', 'wp-block-navigation-item__label">' . esc_html( $to ) . '<', $html );
	}
	return $html;
}
add_filter( 'render_block_core/template-part', 'nusantara_stay_simple_nav', 4, 2 );

/**
 * Links of the calm edition, wherever they sit (templates, patterns, page content):
 * "#room" opens the room page, "#journal" the Journal, "#menu", "#rooms" and "#visit" their pages.
 * "#book-table" and "#book-room" are resolved in the browser (assets/js, initBook).
 *
 * @param string $html  Block HTML.
 * @param array  $block Block.
 * @return string
 */
function nusantara_stay_calm_links( $html, $block ) {
	if ( false === strpos( $html, 'href="#' ) || ! in_array( $block['blockName'], array( 'core/paragraph', 'core/heading', 'core/button', 'core/image', 'core/navigation-link' ), true ) ) {
		return $html;
	}
	static $map = null;
	if ( null === $map ) {
		$map = array();
		foreach ( array( 'menu' => 'menu', 'rooms' => 'rooms', 'experiences' => 'experiences', 'visit' => 'visit', 'room' => 'garden-suite' ) as $anchor => $slug ) {
			$page = get_page_by_path( $slug );
			if ( $page && 'publish' === $page->post_status ) {
				$map[ $anchor ] = get_permalink( $page );
			}
		}
		if ( empty( $map['room'] ) && ! empty( $map['rooms'] ) ) {
			$map['room'] = $map['rooms'];
		}
		$journal = function_exists( 'nusantara_stay_journal_url' ) ? nusantara_stay_journal_url() : '';
		if ( $journal ) {
			$map['journal'] = $journal;
		}
		$map['home'] = home_url( '/' );
		$map += array(
			'menu'        => home_url( '/#experience' ),
			'rooms'       => home_url( '/#rooms' ),
			'room'        => home_url( '/#rooms' ),
			'experiences' => home_url( '/#house' ),
			'visit'       => home_url( '/#reserve' ),
			'journal'     => get_post_type_archive_link( 'post' ),
		);
	}
	return preg_replace_callback(
		'/href="#(home|menu|rooms|experiences|visit|room|journal)"/',
		function ( $m ) use ( $map ) {
			return isset( $map[ $m[1] ] ) ? 'href="' . esc_url( $map[ $m[1] ] ) . '"' : $m[0];
		},
		$html
	);
}
add_filter( 'render_block', 'nusantara_stay_calm_links', 10, 2 );


/** 3.18.0 The header style as a body class (the menu panel follows it). */
add_filter( 'body_class', function ( $classes ) {
	$classes[] = 'nusantara-stay-hdr-' . nusantara_stay_header_style();
	return $classes;
} );

/**
 * Is the site dressed for the night? True when the page colour is dark.
 *
 * @return bool
 */
function nusantara_stay_is_night() {
	static $night = null;
	if ( null !== $night ) {
		return $night;
	}
	$look = function_exists( 'nusantara_stay_demo_look' ) ? nusantara_stay_demo_look() : '';
	if ( $look ) {
		$night = 'night' === $look;
		return $night;
	}
	$night   = false;
	$palette = wp_get_global_settings( array( 'color', 'palette' ) );
	foreach ( array( 'custom', 'theme' ) as $origin ) {
		foreach ( isset( $palette[ $origin ] ) ? (array) $palette[ $origin ] : array() as $c ) {
			if ( isset( $c['slug'], $c['color'] ) && 'surface' === $c['slug'] && preg_match( '/^#([0-9a-f]{6})$/i', $c['color'], $m ) ) {
				$rgb   = array_map( 'hexdec', str_split( $m[1], 2 ) );
				$night = ( 0.2126 * $rgb[0] + 0.7152 * $rgb[1] + 0.0722 * $rgb[2] ) < 90;
				return $night;
			}
		}
	}
	return $night;
}

/**
 * Night: homepage photos swap to their night versions; the dining and room films become stills.
 *
 * @param string $html  Block HTML.
 * @param array  $block Block.
 * @return string
 */
function nusantara_stay_night_photos( $html, $block ) {
	if ( false === strpos( $html, 'k-' ) || ! nusantara_stay_is_night() ) {
		return $html;
	}
	static $have = null;
	if ( null === $have ) {
		$have = array();
		foreach ( array( 'hero-dining', 'hero-room', 'house', 'house-detail', 'kitchen', 'garden-wide', 'rooms' ) as $slot ) {
			if ( file_exists( get_theme_file_path( 'assets/images/n-' . $slot . '.jpg' ) ) ) {
				$have[] = $slot;
			}
		}
	}
	if ( ! $have ) {
		return $html;
	}
	$slots = implode( '|', array_map( 'preg_quote', $have ) );
	// Films: a still night photo in place of the video (the slider runs stills on its timer).
	$html = preg_replace_callback(
		'#<video class="wp-block-cover__video-background[^"]*"[^>]*src="([^"]*?)assets/video/k-(' . $slots . ')\.mp4"([^>]*)></video>#',
		function ( $m ) {
			$pos = preg_match( '/data-object-position="([^"]+)"/', $m[3], $p ) ? $p[1] : '50% 50%';
			return '<img class="wp-block-cover__image-background" alt="" src="' . esc_url( $m[1] . 'assets/images/n-' . $m[2] . '.jpg' ) . '" style="object-position:' . esc_attr( $pos ) . '" data-object-fit="cover" data-object-position="' . esc_attr( $pos ) . '"/>';
		},
		$html
	);
	return preg_replace( '#assets/images/k-(' . $slots . ')\.jpg#', 'assets/images/n-$1.jpg', $html );
}
add_filter( 'render_block', 'nusantara_stay_night_photos', 30, 2 );

add_filter( 'body_class', function ( $classes ) {
	if ( nusantara_stay_is_night() ) {
		$classes[] = 'nusantara-stay-night';
	}
	return $classes;
} );

/**
 * 5.1.0 The site name with a small line underneath: the site's tagline (Settings › General),
 * or "Garden villa · Ubud" on the Nusantara Stay demo.
 *
 * @param string $html Block HTML.
 * @return string
 */
function nusantara_stay_site_line( $html ) {
	$line = (string) get_bloginfo( 'description' );
	if ( function_exists( 'nusantara_stay_demo_current' ) && 'nusantara-stay' === nusantara_stay_demo_current() ) {
		$line = __( 'Garden villa · Ubud', 'nusantara-stay' );
	}
	if ( '' === trim( $line ) || false !== strpos( $html, 'nusantara-stay-site-line' ) ) {
		return $html;
	}
	return preg_replace( '#</(p|h1|div)>\s*$#', '<span class="nusantara-stay-site-line">' . esc_html( $line ) . '</span></$1>', $html, 1 );
}
add_filter( 'render_block_core/site-title', 'nusantara_stay_site_line' );
