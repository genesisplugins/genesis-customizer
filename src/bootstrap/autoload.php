<?php

namespace GenesisPlugins\GenesisCustomizer;

spl_autoload_register( __NAMESPACE__ . '\autoload_register' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $class_name
 *
 * @return null|string
 */
function autoload_register( $class_name ) {
	if ( 0 !== strpos( $class_name, __NAMESPACE__ ) ) {
		return null;
	}

	$search    = [ __NAMESPACE__, '\\', '-', '_', ];
	$replace   = [ '', '-', '', '-', ];
	$file_name = strtolower( str_replace( $search, $replace, $class_name ) );
	$file      = _get_path() . 'src/classes/class-' . $file_name . '.php';

	if ( file_exists( $file ) ) {
		require $file;
	}

	return $file;
}

add_action( 'genesis_customizer_setup', __NAMESPACE__ . '\load_files', 5 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_files() {
	$files = apply_filters( 'genesis_customizer_files', [
		'functions/theme-support',
		'functions/updater',
		'functions/shortcodes',
		'functions/template',
		'functions/widget-areas',
		'functions/scripts',
		'functions/styles',
		'functions/custom-header',
		'admin/hero-settings',
		'admin/child-theme-compat',
		'admin/upgrade-notice',
		'structure/header',
		'structure/menus',
		'structure/hero',
		'structure/content',
		'structure/footer',
		'structure/wrap',
		'structure/layout',
		'structure/archive',
		'structure/single',
		'structure/comments',
		'compat/simple-social-icons',
		'customizer/customizer',
		'customizer/kirki',
		'customizer/scripts',
		'customizer/styles',
		'customizer/panels',
		'customizer/sections',
		'customizer/fields',
		'customizer/output',
		'modules/responsive-css',
		'modules/additional-js',
	] );

	foreach ( $files as $file ) {
		$filename = _get_path() . 'src/' . $file . '.php';

		if ( file_exists( $filename ) ) {
			require_once $filename;
		}
	}
}
