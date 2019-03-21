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
			__( 'or greater to run and has been deactivated.', 'genesis-customizer' )
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
 * @return bool
 */
function genesis_customizer_is_compatible() {
	return genesis_customizer_deactivation_message() ? false : true;
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
		return __( 'requires PHP version 5.6', 'genesis-customizer' );
	}

	if ( version_compare( get_bloginfo( 'version' ), '5.0.0', '<' ) ) {
		return __( 'requires WordPress version 5.0.0', 'genesis-customizer' );
	}

	if ( 'genesis' !== get_template() && 'Genesis' !== get_template() || wp_get_theme()->parent() && version_compare( wp_get_theme()->parent()->Version, '2.8.0', '<' ) ) {
		return __( 'requires Genesis version 2.8.0', 'genesis-customizer' );
	}

	return false;
}
