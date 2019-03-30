<?php

namespace GenesisCustomizer;

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
		'src/utilities/*',
		'src/functions/*',
		'src/structure/*',
		'src/compat/*',
		'src/customizer/*',
	] );

	foreach ( $files as $file ) {
		foreach ( glob( _get_path() . $file . '.php' ) as $file_name ) {
			if ( file_exists( $file_name ) ) {
				require_once $file_name;
			}
		}
	}

	if ( is_admin() ) {
		foreach ( glob( _get_path() . 'src/admin/*.php' ) as $file_name ) {
			if ( file_exists( $file_name ) ) {
				require_once $file_name;
			}
		}
	}
}
