<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'        => 'code',
		'settings'    => 'custom',
		'description' => esc_html__( 'Custom CSS placed in this section will apply to mobile screen sizes only.', 'genesis-customizer' ),
		'default'     => '',
		'choices'     => [
			'language' => 'css',
		],
	],
];
