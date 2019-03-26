<?php

namespace GenesisPlugins\GenesisCustomizer;

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
 * @return bool
 */
function child_theme_compat() {
	$handle  = _get_handle();
	$tags    = wp_get_theme()->get( 'Tags' ) ?: [];
	$support = get_theme_support( $handle );

	if ( in_array( $handle, $tags ) || $support ) {
		return true;
	}

	return false;
}
