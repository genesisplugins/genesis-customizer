<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'admin_init', __NAMESPACE__ . '\child_theme_compat' );
/**
 * Adds admin notice if requirements are not met.
 *
 * Themes can build in support for Genesis Customizer by either adding a
 * `genesis-customizer` tag to the stylesheet header comment and/or by
 * adding theme support for the `genesis-customizer` feature, e.g:
 *
 * `add_theme_support( 'genesis-customizer' );`
 *
 * @since 1.0.0
 *
 * @return void
 */

function child_theme_compat() {
	$tags    = wp_get_theme()->get( 'Tags' ) ?: [];
	$support = get_theme_support( _get_handle() );
	if ( ! in_array( _get_handle(), $tags ) && ! $support ) {
		add_action( 'admin_notices', __NAMESPACE__ . '\child_theme_notice' );
	}
}

/**
 * Displays the admin notice warning message.
 *
 * @since 1.0.0
 *
 * @return void
 */

function child_theme_notice() {
	printf(
		'<div class="notice notice-warning is-dismissible"><p><strong>%s</strong>%s<a href="%s">%s</a>%s</p></div>',
		_get_name(),
		__( ' is not supported by the active child theme and may not work as expected. Please install a compatible child theme, or use the ', 'genesis-customizer' ),
		admin_url( 'admin.php?page=generate-child-theme' ),
		__( 'Child Theme Generator', 'genesis-customizer' ),
		__( ' to create your own.', 'genesis-customizer' )
	);
}

