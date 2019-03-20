<?php

return [
	[
		'type'     => 'radio',
		'settings' => 'css',
		'label'    => esc_html__( 'CSS Output', 'genesis-customizer' ),
		'default'  => 'expanded',
		'choices'  => [
			'expanded'   => esc_html__( 'Expanded', 'genesis-customizer' ),
			'nested'     => esc_html__( 'Nested', 'genesis-customizer' ),
			'compact'    => esc_html__( 'Compact', 'genesis-customizer' ),
			'compressed' => esc_html__( 'Compressed', 'genesis-customizer' ),
		],
	]
];
