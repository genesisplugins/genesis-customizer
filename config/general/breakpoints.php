<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'slider',
		'settings' => 'global',
		'label'    => esc_html__( 'Global Breakpoint', 'genesis-customizer' ),
		'tooltip'  => __( 'Select the screen size at which the global media query should change.', 'genesis-customizer' ),
		'default'  => _get_breakpoint(),
		'choices'  => [
			'min'  => 256,
			'max'  => 1920,
			'step' => 16,
		],
	],
];
