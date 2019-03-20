<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'init', __NAMESPACE__ . '\child_theme_generator' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function child_theme_generator() {
	$generator = new Child_Theme_Generator();
	$generator->boot();
}
