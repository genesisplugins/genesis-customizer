<?php

add_action( 'plugins_loaded', 'genesis_customizer_deactivate_plugin' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function genesis_customizer_deactivate_plugin() {
	if ( ! genesis_customizer_is_compatible() ) {
		if ( ! function_exists( 'deactivate_plugins' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		deactivate_plugins( plugin_dir_path( dirname( __DIR__ ) ) . 'genesis-customizer.php' );
	}
}

add_action( 'admin_notices', 'genesis_customizer_deactivation_notice' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function genesis_customizer_deactivation_notice() {
	if ( ! genesis_customizer_is_compatible() ) {
		printf(
			'<div class="notice notice-error"><p><b>%1$s</b> %2$s %3$s</p></div>',
			__( 'Genesis Customizer', 'genesis-customizer' ),
			genesis_customizer_deactivation_message(),
			__( 'to run and has been deactivated.', 'genesis-customizer' )
		);

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
	}
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return bool|string
 */
function genesis_customizer_deactivation_message() {
	if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
		return __( 'requires PHP version 5.6 or greater', 'genesis-customizer' );
	}

	if ( version_compare( get_bloginfo( 'version' ), '5.0.0', '<' ) ) {
		return __( 'requires WordPress version 5.0.0 or greater', 'genesis-customizer' );
	}

	if ( 'genesis' !== get_template() && 'Genesis' !== get_template() || 'genesis' === get_stylesheet() ) {
		return __( 'requires the Genesis Framework and an active child theme', 'genesis-customizer' );
	}

	$parent = wp_get_theme()->parent();
	$name   = (string) $parent;

	if ( ! $name || 'genesis' !== $name && 'Genesis' !== $name ) {
		return __( 'requires the Genesis Framework and an active child theme', 'genesis-customizer' );
	}

	if ( version_compare( $parent->Version, '2.9.1', '<' ) ) {
		return __( 'requires the Genesis Framework version 2.9.1', 'genesis-customizer' );
	}

	return false;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function genesis_customizer_is_compatible() {
	return genesis_customizer_deactivation_message() ? false : true;
}

// Return boolean value.
return genesis_customizer_is_compatible();
