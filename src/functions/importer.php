<?php

namespace GenesisPlugins\GenesisCustomizer;

add_filter( 'merlin_import_files', __NAMESPACE__ . '\merlin_local_import_files' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function merlin_local_import_files() {
	$demos[] = [
		'import_file_name'             => 'Default',
		'local_import_file'            => _get_path() . 'assets/demo/default/content.xml',
		'local_import_widget_file'     => _get_path() . 'assets/demo/default/widgets.wie',
		'local_import_customizer_file' => _get_path() . 'assets/demo/default/customizer.dat',
		'import_preview_image_url'     => 'https://genesiscustomizer.test/wp-content/uploads/2019/03/mockup-1024x597.png',
		'import_notice'                => __( 'A special note for this import.', 'genesis-customizer' ),
		'preview_url'                  => 'https://genesiscustomizer.com',
	];
	$demos[] = [
		'import_file_name'             => 'Genesis Sample',
		'local_import_file'            => _get_path() . 'assets/demos/default/content.xml',
		'local_import_widget_file'     => _get_path() . 'assets/demos/default/widgets.wie',
		'local_import_customizer_file' => _get_path() . 'assets/demos/default/customizer.dat',
		'import_preview_image_url'     => 'https://genesiscustomizer.test/wp-content/uploads/2019/03/mockup-1024x597.png',
		'import_notice'                => __( 'A special note for this import.', 'genesis-customizer' ),
		'preview_url'                  => 'https://genesiscustomizer.com/pro',
	];

	return $demos;
}

add_filter( 'genesis_customizer_tgmpa_config', __NAMESPACE__ . '\add_tgmpa_config' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function add_tgmpa_config() {
	return [
		'id'           => _get_handle(),
		'default_path' => '',
		'menu'         => 'genesis-customizer-plugins',
		'parent_slug'  => 'genesis',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	];
}

add_filter( 'genesis_customizer_tgmpa_plugins', __NAMESPACE__ . '\add_tgmpa_plugins' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function add_tgmpa_plugins() {
	$plugins[] = [
		'name'     => 'Simple Social Icons',
		'slug'     => 'simple-social-icons',
		'required' => false,
	];

	return $plugins;
}
