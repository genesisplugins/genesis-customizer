<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'        => 'code',
		'settings'    => 'additional',
		'description' => esc_html__( 'This section accepts vanilla JavaScript or jQuery and does not require opening and closing ', 'genesis-customizer' ) . '<kbd>&lt;script&gt;</kbd>' . __( 'tags.', 'genesis-customizer' ),
		'default'     => '',
		'choices'     => [
			'language' => 'javascript',
		],
	],
];
