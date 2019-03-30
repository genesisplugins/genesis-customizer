<?php

namespace SeoThemes\GenesisCustomizer;

return [
	[
		'type'     => 'select',
		'settings' => 'style',
		'label'    => __( 'Read More Style', 'genesis-customizer' ),
		'default'  => 'text',
		'choices'  => [
			'text'   => __( 'Text', 'genesis-customizer' ),
			'button' => __( 'Button', 'genesis-customizer' ),
			'hide'   => __( 'Hidden', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'text',
		'settings' => 'text',
		'label'    => __( 'Read More Text', 'genesis-customizer' ),
		'default'  => __( 'Read more', 'genesis-customizer' ),
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => 'hide',
				'operator' => '!==',
			],
		],
	],
];
