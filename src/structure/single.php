<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'genesis_before', __NAMESPACE__ . '\single_setup', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function single_setup() {
	if ( ! is_singular() || genesis_is_blog_template() ) {
		return;
	}

	$post_types = _get_value( 'content_featured-image_enabled' );

	if ( ! is_array( $post_types ) ) {
		return;
	}

	foreach ( $post_types as $post_type ) {
		if ( is_singular( $post_type ) ) {
			$hook = _get_value( 'content_featured-image_position' );

			add_action( $hook, __NAMESPACE__ . '\display_featured_image' );
		}
	}

	$author_box_title = _get_value( 'content_author-box_title' );

	if ( '' !== $author_box_title ) {
		add_filter( 'genesis_author_box_title', __NAMESPACE__ . '\author_box_title' );
	}
}


/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function display_featured_image() {
	$img = genesis_get_image( [
		'format'  => 'html',
		'size'    => _get_value( 'content_featured-image_size' ),
		'context' => 'single',
		'attr'    => genesis_parse_attr( 'entry-image', [] ),
	] );

	if ( ! empty( $img ) ) {
		genesis_markup( [
			'open'    => '<div %s>',
			'close'   => '</div>',
			'content' => wp_make_content_images_responsive( $img ),
			'context' => 'featured-image',
		] );
	}
}


/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return string
 */
function author_box_title() {
	return _get_value( 'content_author-box_title' );
}


