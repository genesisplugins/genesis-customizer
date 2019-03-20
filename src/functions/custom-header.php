<?php

namespace GenesisPlugins\GenesisCustomizer;

/**
 * Custom header image callback.
 *
 * Loads custom header or featured image depending on what is set on a per
 * page basis. If a featured image is set for a page, it will override
 * the default header image. It also gets the image for custom post
 * types by looking for a page with the same slug as the CPT e.g
 * the Portfolio CPT archive will pull the featured image from
 * a page with the slug of 'portfolio', if the page exists.
 *
 * @since  1.0.0
 *
 * @return string
 */
function custom_header() {
	$id      = '';
	$custom  = _get_value( 'header_hero-section_background' );
	$default = isset( $custom['background-image'] ) ? $custom['background-image'] : get_theme_support( 'custom-header', 'default_image' );

	if ( class_exists( 'WooCommerce' ) && is_shop() ) {
		$id = wc_get_page_id( 'shop' );

	} elseif ( is_post_type_archive() ) {
		$id = get_page_by_path( get_query_var( 'post_type' ) );
		$id = $id && has_post_thumbnail( $id ) ? $id : false;

	} elseif ( is_category() ) {
		$id = get_page_by_title( 'category-' . get_query_var( 'category_name' ), OBJECT, 'attachment' );

	} elseif ( is_tag() ) {
		$id = get_page_by_title( 'tag-' . get_query_var( 'tag' ), OBJECT, 'attachment' );

	} elseif ( is_tax() ) {
		$id = get_page_by_title( 'term-' . get_query_var( 'term' ), OBJECT, 'attachment' );

	} elseif ( is_front_page() ) {
		$id = get_option( 'page_on_front' );

	} elseif ( 'posts' === get_option( 'show_on_front' ) && is_home() ) {
		$id = get_option( 'page_for_posts' );

	} elseif ( is_search() ) {
		$id = get_page_by_path( 'search' );

	} elseif ( is_404() ) {
		$id = get_page_by_path( 'error' );

	} elseif ( is_singular() ) {
		$id = get_the_id();
	}

	if ( is_object( $id ) ) {
		$url = wp_get_attachment_image_url( $id->ID, 'hero-section' );

	} elseif ( $id ) {
		$url = get_the_post_thumbnail_url( $id, 'hero-section' );

	} else {
		$url = $default;
	}

	$settings = get_post_meta( $id, '_hero_section', true );

	if ( ! $url || 'site_default' === $settings ) {
		$url = $default;

	} elseif ( 'none' === $settings ) {
		$url = false;
	}

	if ( $url && $url !== $default ) {
		$selector = get_theme_support( 'custom-header', 'header-selector' );
		$value    = 'no_image' === $settings ? 'none' : 'url(%s)';

		return printf( '<style type="text/css">' . esc_attr( $selector ) . '{background-image:' . $value . '}</style>' . "\n", esc_url( $url ) );
	} else {
		return '';
	}
}
