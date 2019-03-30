<?php

namespace GenesisCustomizer;

add_action( 'plugins_loaded', __NAMESPACE__ . '\add_init_hook', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_init_hook() {
	do_action( 'genesis_customizer_init' );
}

add_action( 'genesis_setup', __NAMESPACE__ . '\add_setup_hook', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_setup_hook() {
	do_action( 'genesis_customizer_setup' );
}

add_action( 'genesis_customizer_init', __NAMESPACE__ . '\load_textdomain' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_textdomain() {
	load_plugin_textdomain( _get_handle() );
}
