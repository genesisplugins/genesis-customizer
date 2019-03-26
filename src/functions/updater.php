<?php

namespace GenesisPlugins\GenesisCustomizer;

add_action( 'genesis_customizer_init', __NAMESPACE__ . '\run_updater' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function run_updater() {
	$genesis_customizer_updater = \Puc_v4_Factory::buildUpdateChecker(
		'https://github.com/genesisplugins/genesis-customizer',
		_get_path() . 'genesis-customizer.php',
		_get_handle()
	);

	$genesis_customizer_updater->setAuthentication( 'f0a1bb73c7bd598e49155c86160e76d3000bd4f2' );
	$genesis_customizer_updater->setBranch( 'master' );
}
