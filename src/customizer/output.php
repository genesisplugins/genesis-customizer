<?php

namespace GenesisPlugins\GenesisCustomizer;

/**
 * Build a background-gradient style for CSS
 *
 * @param $color_1      hex color value
 * @param $color_2      hex color value
 *
 * @return string       CSS definition
 */
function build_gradients( $angle, $color_1, $color_2 ) {
	$styles = 'background:' . $color_1 . ';';
	$styles .= 'background:-moz-linear-gradient(' . $angle . 'deg,' . $color_1 . ' 0%,' . $color_2 . ' 100%);';
	$styles .= 'background:-webkit-linear-gradient(' . $angle . 'deg,' . $color_1 . ' 0%,' . $color_2 . ' 100%);';
	$styles .= 'background:linear-gradient(' . $angle . 'deg,' . $color_1 . ' 0%,' . $color_2 . ' 100%);';
	$styles .= "filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='" . $color_1 . "', endColorstr='" . $color_2 . "',GradientType=0);";

	return $styles;
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_gradients', 999 );
/**
 * Build & enqueue the complete CSS for headers.
 *
 * @return void
 */
function enqueue_gradients() {
	$css = '';

	// Header shadow.
	$shadow_color = _get_value( 'header_primary_colors' )['shadow'];
	$shadow_size  = _get_value( 'header_primary_shadow' );

	$css .= '.primary-header{box-shadow: 0 0 ' . $shadow_size . 'px 0 ' . $shadow_color . '}';

	// Buttons.
	$button_colors = _get_value( 'base_buttons_colors' );
	$button_angle  = _get_value( 'base_buttons_angle' );

	$css .= _get_elements( 'button' ) . '{' . build_gradients( $button_angle, $button_colors['left'], $button_colors['right'] ) . '}';
	$css .= _get_elements( 'button', 'hover' ) . '{' . build_gradients( $button_angle, $button_colors['left-hover'], $button_colors['right-hover'] ) . '}';

	// Hero.
	$hero_colors = _get_value( 'hero_settings_colors' );
	$hero_angle  = _get_value( 'hero_settings_angle' );

	$css .= '.hero-section:before{' . build_gradients( $hero_angle, $hero_colors['left'], $hero_colors['right'] ) . '}';

	// Site Footer.
	$site_footer_colors = _get_value( 'footer_site-footer_colors' );
	$site_footer_angle  = _get_value( 'footer_site-footer_angle' );

	$css .= '.site-footer:before{' . build_gradients( $site_footer_angle, $site_footer_colors['left'], $site_footer_colors['right'] ) . '}';

	// Above Footer.
	$above_footer_colors = _get_value( 'footer_above-footer_colors' );
	$above_footer_angle  = _get_value( 'footer_above-footer_angle' );

	$css .= '.above-footer:before{' . build_gradients( $above_footer_angle, $above_footer_colors['left'], $above_footer_colors['right'] ) . '}';

	// Print CSS.
	wp_add_inline_style( _get_handle(), $css );
}
