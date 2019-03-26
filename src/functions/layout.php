<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'genesis_customizer_setup', __NAMESPACE__ . '\setup_layouts', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_layouts() {
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );

	genesis_register_layout( 'center-content', [
		'label' => __( 'Center Content', 'genesis-customizer' ),
		'img'   => _get_url() . 'assets/img/center-content.gif',
	] );
}
