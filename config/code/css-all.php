<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'        => 'code',
		'settings'    => 'custom',
		'description' => esc_html__( 'Custom CSS placed in this section will apply to all screen sizes.', 'genesis-customizer' ),
		'default'     => '',
		'choices'     => [
			'language' => 'css',
		],
	],
];
