<?php

namespace GenesisPlugins\GenesisCustomizer;

add_filter( 'body_class', __NAMESPACE__ . '\archive_body_classes', 100, 1 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $classes
 *
 * @return array
 */
function archive_body_classes( $classes ) {
	if ( ! is_home() && ! is_archive() && ! genesis_is_blog_template() ) {
		return $classes;
	}

	$classes[] = 'archive';
	$classes   = array_diff( $classes, [ 'page' ] );
	$classes[] = _get_value( 'archive_post-grid_columns' );

	return $classes;
}

add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\read_more_text' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return string
 */
function read_more_text() {
	$style = _get_value( 'archive_read-more_style' );

	if ( $style === 'hide' ) {
		return '';
	}

	$style = 'button' === $style ? 'button small' : '';

	$text = _get_value( 'archive_read-more_text' );

	return sprintf( '&hellip; <a href="%s" class="more-link %s">%s</a>',
		get_the_permalink(),
		$style,
		genesis_a11y_more_link( $text )
	);
}

add_filter( 'genesis_post_info', __NAMESPACE__ . '\post_info' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return string
 */
function post_info() {
	$text = _get_value( 'archive_post-grid_post-info' );

	return do_shortcode( $text );
}

add_filter( 'genesis_post_meta', __NAMESPACE__ . '\post_meta' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return string
 */
function post_meta() {
	$text = _get_value( 'archive_post-grid_post-meta' );

	return do_shortcode( $text );
}

add_filter( 'genesis_attr_content', __NAMESPACE__ . '\masonry_layout' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function masonry_layout( $atts ) {
	$masonry = _get_value( 'archive_post-grid_masonry' );

	if ( $masonry ) {
		$atts['class'] .= ' masonry';
	}

	return $atts;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return mixed
 */
function featured_image_first( $atts ) {
	$order = _get_value( 'archive_post-grid_order' );

	if ( isset( $order[0] ) && 'featured-image' === $order[0] ) {
		$atts['class'] .= ' featured-image-first';
	}

	return $atts;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function featured_image_spacing( $atts ) {
	$spacing = _get_value( 'archive_post-grid_featured-image-spacing' );

	if ( $spacing ) {
		$atts['class'] .= ' no-spacing';
	}

	return $atts;
}

add_filter( 'genesis_attr_archive-pagination', __NAMESPACE__ . '\pagination_alignment' );
add_filter( 'genesis_attr_entry-pagination', __NAMESPACE__ . '\pagination_alignment' );
add_filter( 'genesis_attr_adjacent-entry-pagination', __NAMESPACE__ . '\pagination_alignment' );
add_filter( 'genesis_attr_comments-pagination', __NAMESPACE__ . '\pagination_alignment' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return mixed
 */
function pagination_alignment( $atts ) {
	$align = _get_value( 'archive_pagination_alignment' );

	$atts['class'] .= ' align-' . $align;

	return $atts;
}

add_filter( 'genesis_prev_link_text', __NAMESPACE__ . '\previous_link_text' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return mixed
 */
function previous_link_text() {
	return _get_value( 'archive_pagination_previous' );
}

add_filter( 'genesis_next_link_text', __NAMESPACE__ . '\next_link_text' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return mixed
 */
function next_link_text() {
	return _get_value( 'archive_pagination_next' );
}
