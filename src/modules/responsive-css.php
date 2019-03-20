<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'wp_ajax_dynamic_css', __NAMESPACE__ . '\dynamic_css' );
add_action( 'wp_ajax_nopriv_dynamic_css', __NAMESPACE__ . '\dynamic_css' );
/**
 * Load the dynamic CSS with ajax.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dynamic_css() {
	$nonce = $_REQUEST['wpnonce'];

	if ( ! wp_verify_nonce( $nonce, 'dynamic-css-nonce' ) ) {
		die( __( 'Invalid nonce.', 'genesis-customizer' ) );

	} else {
		require_once __DIR__ . '/dynamic-css.php';
	}

	exit;
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\responsive_css_output' );
/**
 * Outputs Additional JS to site footer.
 *
 * @since  1.0.0
 *
 * @return void
 */
function responsive_css_output() {
	$handle  = _get_handle();
	$all     = _get_value( 'code_css-all_custom' );
	$mobile  = _get_value( 'code_css-mobile_custom' );
	$desktop = _get_value( 'code_css-desktop_custom' );

	if ( is_customize_preview() ) {
		$css = $all;
		$css .= sprintf(
			'@media %s{%s}',
			responsive_css_mq( 'mobile' ),
			$mobile
		);
		$css .= sprintf(
			'@media %s{%s}',
			responsive_css_mq( 'desktop' ),
			$desktop
		);
		wp_register_style( $handle . '-responsive-css', false );
		wp_enqueue_style( $handle . '-responsive-css' );
		wp_add_inline_style( $handle . '-responsive-css', $css );

	} else {
		wp_enqueue_style(
			$handle . '-responsive-css-all',
			admin_url( 'admin-ajax.php' ) . '?action=dynamic_css&wpnonce=' . wp_create_nonce( 'dynamic-css-nonce' ) . '&size=all',
			[],
			'1.0.0',
			responsive_css_mq( 'all' )
		);
		wp_enqueue_style(
			$handle . '-responsive-css-mobile',
			admin_url( 'admin-ajax.php' ) . '?action=dynamic_css&wpnonce=' . wp_create_nonce( 'dynamic-css-nonce' ) . '&size=mobile',
			[],
			'1.0.0',
			responsive_css_mq( 'mobile' )
		);
		wp_enqueue_style(
			$handle . '-responsive-css-desktop',
			admin_url( 'admin-ajax.php' ) . '?action=dynamic_css&wpnonce=' . wp_create_nonce( 'dynamic-css-nonce' ) . '&size=desktop',
			[],
			'1.0.0',
			responsive_css_mq( 'desktop' )
		);
	}
}

/**
 * Returns a media query string.
 *
 * @since 1.0.0
 *
 * @param $size
 *
 * @return string
 */
function responsive_css_mq( $size = 'all' ) {
	$breakpoint = _get_value( 'general_breakpoints_global' );

	if ( 'mobile' === $size ) {
		return '(max-width:' . $breakpoint . 'px)';

	} else if ( 'desktop' === $size ) {
		return '(min-width:' . $breakpoint . 'px)';

	} else {
		return 'all';
	}
}
