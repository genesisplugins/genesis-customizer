<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'genesis_customizer_setup', __NAMESPACE__ . '\autoload', 5 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {
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
		'admin/general',
		'admin/child-theme-compat',
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
