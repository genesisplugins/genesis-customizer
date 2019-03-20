<?php

namespace GenesisPlugins\GenesisCustomizer;

//* Unregister content/sidebar/sidebar layout setting
genesis_unregister_layout( 'content-sidebar-sidebar' );

//* Unregister sidebar/sidebar/content layout setting
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister sidebar/content/sidebar layout setting
genesis_unregister_layout( 'sidebar-content-sidebar' );


genesis_register_layout( 'center-content', [
	'label' => __( 'Center Content', 'genesis-customizer' ),
	'img'   => _get_url() . 'assets/img/center-content.gif',
] );
