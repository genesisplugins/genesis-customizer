<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\kirki_setup', 20 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function kirki_setup() {
//	add_filter( 'kirki/dynamic_css/method', '__return_true' );
	add_filter( 'kirki_telemetry', '__return_false' );
//	add_filter( 'kirki_output_inline_styles', '__return_false' );
//	add_filter( 'kirki_gutenberg_' . _get_handle() . '_dynamic_css', function () {
	//return file_get_contents( WP_CONTENT_DIR . '/uploads/kirki-css/styles.css' );
//	} );
}

add_action( 'genesis_setup', __NAMESPACE__ . '\add_kirki_config', 20 );
/**
 * Adds the theme's Kirki config.
 *
 * @since  1.2.0
 *
 * @link   https://aristath.github.io/kirki/docs/getting-started/config.html
 *
 * @return void
 */
function add_kirki_config() {
	$handle = _get_handle();
	\Kirki::add_config( $handle, [
		'capability'        => 'edit_theme_options',
		'gutenberg_support' => true,
		'disable_output'    => false,
		'remove_loader'     => true,
	] );
}

add_filter( 'kirki_config', __NAMESPACE__ . '\disable_kirki_loader' );
/**
 * Remove Kirki loader icon.
 *
 * @param array $config the configuration array
 *
 * @return array
 */
function disable_kirki_loader( $config ) {
	return wp_parse_args( [
		'disable_loader' => true,
	], $config );
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_register' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $wp_customize
 *
 * @return void
 */
function customize_register( $wp_customize ) {
	$handle = _get_handle();

	$wp_customize->register_section_type( __NAMESPACE__ . '\Link_Section' );
	$wp_customize->register_section_type( __NAMESPACE__ . '\Hidden_Section' );

	$wp_customize->add_section(
		new Link_Section(
			$wp_customize,
			$handle . '_pro',
			array(
				'title'      => __( 'Upgrade to Genesis Customizer Pro', 'genesis-customizer' ),
				'priority'   => 0,
				'type'       => 'genesis-customizer-link',
				'button_url' => 'https://genesiscustomizer.com/',
			)
		)
	);

	$wp_customize->add_section(
		new Hidden_Section(
			$wp_customize,
			$handle,
			array(
				'panel'    => $handle,
				'title'    => $handle,
				'priority' => 0,
				'type'     => 'genesis-customizer-hidden',
			)
		)
	);

}

add_action( 'genesis_customizer_setup', __NAMESPACE__ . '\go_pro', 15 );
/**
 * Workaround.
 *
 * @since 1.0.0
 *
 * @return void
 */
function go_pro() {
	$handle = _get_handle();
	$title  = _get_name();

	\Kirki::add_panel( $handle, [
		'title'    => $title,
		'priority' => 1,
	] );

	\Kirki::add_field( $handle, [
		'section'  => $handle,
		'settings' => $handle,
		'type'     => 'hidden',
	] );

	if ( ! function_exists( 'genesis_customizer_pro' ) ) {
		\Kirki::add_field( $handle . '_pro', [
			'section'  => $handle . '_pro',
			'settings' => $handle . '_pro',
			'type'     => 'hidden',
		] );
	}
}

add_action( 'genesis_customizer_setup', __NAMESPACE__ . '\add_misc_fields', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_misc_fields() {
	$handle = _get_handle();

	\Kirki::add_field( $handle, [
		'type'     => 'custom',
		'section'  => 'title_tagline',
		'settings' => $handle . '_logo_divider-1',
		'priority' => 8,
		'default'  => '<hr>',
	] );

	\Kirki::add_field( $handle, [
		'type'     => 'slider',
		'section'  => 'title_tagline',
		'settings' => $handle . '_logo_width',
		'label'    => __( 'Logo Width', 'genesis-customizer' ),
		'priority' => 8,
		'default'  => '200',
		'choices'  => [
			'min'  => 0,
			'max'  => 600,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.custom-logo',
				'property' => 'width',
				'units'    => 'px',
			],
		],
	] );

	\Kirki::add_field( $handle, [
		'type'     => 'slider',
		'section'  => 'title_tagline',
		'settings' => $handle . '_logo_spacing',
		'label'    => __( 'Logo Spacing', 'genesis-customizer' ),
		'priority' => 8,
		'default'  => '16',
		'choices'  => [
			'min'  => - 20,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.custom-logo',
				'property'      => 'margin',
				'value_pattern' => '$px 0',
			],
		],
	] );

	\Kirki::add_field( $handle, [
		'type'     => 'custom',
		'section'  => 'title_tagline',
		'settings' => $handle . '_logo_divider-2',
		'priority' => 8,
		'default'  => '<hr>',
	] );
}
