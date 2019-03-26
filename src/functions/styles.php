<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_main_styles' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_main_styles() {
	$handle     = _get_handle();
	$breakpoint = _get_value( 'general_breakpoints_global' );

	wp_register_style(
		$handle . '-all',
		_get_url() . 'assets/css/all.css',
		[],
		_get_asset_version( 'css/all.css' ),
		'all'
	);

	wp_register_style(
		$handle . '-mobile',
		_get_url() . 'assets/css/max-width-896px.css',
		[],
		_get_asset_version( 'css/max-width-896px.css' ),
		'(max-width:' . $breakpoint . 'px)'
	);

	wp_register_style(
		$handle . '-desktop',
		_get_url() . 'assets/css/min-width-896px.css',
		[],
		_get_asset_version( 'css/min-width-896px.css' ),
		'(min-width:' . $breakpoint . 'px)'
	);

	wp_enqueue_style( $handle . '-all' );
	wp_enqueue_style( $handle . '-mobile' );
	wp_enqueue_style( $handle . '-desktop' );
}


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_vendor_styles' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_vendor_styles() {
	$handle = _get_handle();
	$styles = apply_filters( 'genesis_customizer_stylesheets', [
		'woocommerce'         => 'WooCommerce',
		'elementor'           => 'Elementor\Plugin',
		'simple-social-icons' => 'Simple_Social_Icons_Widget',
	] );

	foreach ( $styles as $file => $class ) {
		if ( genesis_detect_plugin( [ 'classes' => [ $class ] ] ) ) {
			$style = $handle . '-' . $file;

			wp_register_style(
				$style,
				_get_url() . 'assets/css/' . $file . '.css',
				[],
				_get_asset_version( 'css/' . $file . '.css' )
			);

			wp_enqueue_style( $style );
		}
	}
}
