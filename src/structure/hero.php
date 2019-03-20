<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'genesis_meta', __NAMESPACE__ . '\hero_init' );
/**
 * Initialize class.
 *
 * @since 3.3.0
 *
 * @return void
 */
function hero_init() {
	add_theme_support( 'hero-section' );
	add_post_type_support( 'page', 'excerpt' );
	add_filter( 'body_class', __NAMESPACE__ . '\hero_body_class' );

	$settings = _get_value( 'hero_hero-section_enable' );

	if ( hero_enabled( $settings ) ) {
		hero_setup();
	}
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $classes
 *
 * @return array
 */
function hero_body_class( $classes ) {
	$settings = _get_value( 'hero_hero-section_enable' );

	if ( hero_enabled( $settings ) ) {
		$classes[] = 'has-hero-section';

	} else {
		$classes[] = 'no-hero-section';
	}

	return $classes;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $settings
 *
 * @return bool|string
 */
function hero_enabled( $settings ) {
	$has = false;

	if ( in_array( 'archive', $settings ) && ( is_archive() || is_search() || is_home() || is_date() || class_exists( 'WooCommerce' ) && is_shop() || is_post_type_archive() || genesis_is_blog_template() ) ) {
		$has = 'archive';

	} elseif ( in_array( 'post', $settings ) && ( is_singular() && ! is_page() ) ) {
		$has = 'post';

	} elseif ( in_array( 'page', $settings ) && ( is_singular( 'page' ) && ! genesis_is_blog_template() ) ) {
		$has = 'page';

	}

	if ( ! current_theme_supports( 'hero-section' ) ) {
		$has = false;
	}

	if ( is_singular() && 'none' === get_post_meta( get_the_ID(), '_hero_section', true ) ) {
		$has = false;
	}

	return $has;
}

/**
 * Sets up hero section.
 *
 * @since  1.5.0
 *
 * @return void
 */
function hero_setup() {
	if ( is_admin() ) {
		return;
	}

	if ( is_singular() && ! genesis_is_blog_template() ) {
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}

	$breadcrumbs = _get_value( 'hero_hero-section_breadcrumbs' );

	if ( $breadcrumbs ) {
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
		add_action( 'genesis_customizer_hero_section', 'genesis_do_breadcrumbs', 30 );
	}

	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
	remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_open', 5, 3 );
	remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_close', 15, 3 );
	remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
	remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
	remove_action( 'genesis_before_loop', 'genesis_do_search_title' );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	add_filter( 'woocommerce_show_page_title', '__return_null' );
	add_filter( 'genesis_search_title_output', '__return_false' );

	add_action( 'genesis_customizer_hero_section', 'genesis_do_posts_page_heading' );
	add_action( 'genesis_customizer_hero_section', 'genesis_do_date_archive_title' );
	add_action( 'genesis_customizer_hero_section', 'genesis_do_taxonomy_title_description' );
	add_action( 'genesis_customizer_hero_section', 'genesis_do_author_title_description' );
	add_action( 'genesis_customizer_hero_section', 'genesis_do_cpt_archive_title_description' );
	add_action( 'genesis_customizer_hero_section', __NAMESPACE__ . '\hero_title', 10 );
	add_action( 'genesis_customizer_hero_section', __NAMESPACE__ . '\hero_excerpt', 20 );
	add_action( 'be_title_toggle_remove', __NAMESPACE__ . '\hero_title_toggle' );
	add_action( 'genesis_before_content', __NAMESPACE__ . '\hero_remove_404_title' );
	add_action( 'genesis_before_content_sidebar_wrap', __NAMESPACE__ . '\hero_display' );
}

/**
 * Remove default title of 404 pages.
 *
 * @since  1.0.0
 *
 * @return void
 */
function hero_remove_404_title() {
	if ( is_404() ) {
		add_filter( 'genesis_markup_entry-title_open', '__return_false' );
		add_filter( 'genesis_markup_entry-title_content', '__return_false' );
		add_filter( 'genesis_markup_entry-title_close', '__return_false' );
	}
}

/**
 * Integrate with Genesis Title Toggle plugin.
 *
 * @since  1.0.0
 *
 * @author Bill Erickson
 * @link   http://billerickson.net/code/genesis-title-toggle-theme-integration
 *
 * @return void
 */
function hero_title_toggle() {
	remove_action( 'genesis_customizer_hero_section', __NAMESPACE__ . '\hero_title', 10 );
	remove_action( 'genesis_customizer_hero_section', __NAMESPACE__ . '\hero_excerpt', 20 );
}

/**
 * Display title in hero section.
 *
 * @since  1.0.0
 *
 * @return void
 */
function hero_title() {
	if ( class_exists( 'WooCommerce' ) && is_shop() ) {
		genesis_markup(
			[
				'open'    => '<h1 %s>',
				'close'   => '</h1>',
				'content' => get_the_title( wc_get_page_id( 'shop' ) ),
				'context' => 'entry-title',
			]
		);

	} elseif ( is_home() && 'posts' === get_option( 'show_on_front' ) ) {
		genesis_markup(
			[
				'open'    => '<h1 %s>',
				'close'   => '</h1>',
				'content' => apply_filters( 'genesis_customizer_latest_posts_title', esc_html( 'Latest Posts' ) ),
				'context' => 'entry-title',
			]
		);

	} elseif ( is_404() ) {
		genesis_markup(
			[
				'open'    => '<h1 %s>',
				'close'   => '</h1>',
				'content' => apply_filters( 'genesis_404_entry_title', esc_html( 'Not found, error 404' ) ),
				// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- Parent theme prefix.
				'context' => 'entry-title',
			]
		);

	} elseif ( is_search() ) {
		genesis_markup(
			[
				'open'    => '<h1 %s>',
				'close'   => '</h1>',
				'content' => apply_filters( 'genesis_search_title_text', esc_html( 'Search results for: ' ) . get_search_query() ),
				// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- Parent theme prefix.
				'context' => 'entry-title',
			]
		);

	} elseif ( genesis_is_blog_template() ) {
		do_action( 'genesis_archive_title_descriptions', get_the_title(), '', 'posts-page-description' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- Parent theme prefix.

	} elseif ( is_singular() ) {
		genesis_do_post_title();
	}
}

/**
 * Display page excerpt.
 *
 * @since  1.0.0
 *
 * @return void
 */
function hero_excerpt() {
	if ( class_exists( 'WooCommerce' ) && is_shop() ) {
		woocommerce_result_count();

	} elseif ( is_home() && 'posts' === get_option( 'show_on_front' ) ) {
		printf( '<p class="entry-subtitle" itemprop="description">%s</p>', apply_filters( 'genesis_customizer_latest_posts_excerpt', esc_html( 'Showing the latest posts' ) ) );

	} elseif ( is_search() ) {
		$id = get_page_by_path( 'search' );

		if ( has_excerpt( $id ) ) {
			printf( '<p class="entry-subtitle" itemprop="description">%s</p>', do_shortcode( get_the_excerpt( $id ) ) );
		}

	} elseif ( is_404() ) {
		$id = get_page_by_path( 'error' );

		if ( has_excerpt( $id ) ) {
			printf( '<p class="entry-subtitle" itemprop="description">%s</p>', do_shortcode( get_the_excerpt( $id ) ) );
		}

	} elseif ( ( is_singular() ) && ! is_singular( 'product' ) && has_excerpt() ) {
		printf( '<p class="entry-subtitle" itemprop="description">%s</p>', do_shortcode( get_the_excerpt() ) );
	}
}

add_filter( 'genesis_attr_entry', __NAMESPACE__ . '\hero_entry_attr' );
/**
 * Adds attributes to hero section markup.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return array
 */
function hero_entry_attr( $atts ) {
	if ( is_singular() ) {
		$atts['itemref'] = 'hero-section';
	}

	return $atts;
}

add_filter( 'genesis_attr_hero-section', __NAMESPACE__ . '\hero_section_attr' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return array
 */
function hero_section_attr( $atts ) {
	$atts['id']   = 'hero-section';
	$atts['role'] = 'banner';

	return $atts;
}

/**
 * Display the hero section.
 *
 * @since  1.0.0
 *
 * @return void
 */
function hero_display() {
	genesis_markup( [
		'open'    => '<section %s><div class="wrap">',
		'context' => 'hero-section',
	] );

	do_action( 'genesis_customizer_hero_section' );

	genesis_markup( [
		'close'   => '</div></section>',
		'context' => 'hero-section',
	] );
}
