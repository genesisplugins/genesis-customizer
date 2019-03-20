<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'text'       => __( 'Text', 'genesis-customizer' ),
			'text-hover' => __( 'Text Hover', 'genesis-customizer' ),
			'background' => __( 'Button Background', 'genesis-customizer' ),
			'icon'       => __( 'Button Icon', 'genesis-customizer' ),
		],
		'default'  => [
			'text'       => '',
			'text-hover' => '',
			'background' => _get_color( 'heading' ),
			'icon'       => _get_color( 'white' ),
		],
		'output'   => [
			[
				'choice'   => 'text',
				'element'  => '.back-to-top',
				'property' => 'color',
			],
			[
				'choice'   => 'text-hover',
				'element'  => '.back-to-top:hover, .back-to-top:focus',
				'property' => 'color',
			],
			[
				'choice'   => 'background',
				'element'  => '.back-to-top-icon',
				'property' => 'background-color',
			],
			[
				'choice'   => 'icon',
				'element'  => '.back-to-top-icon svg',
				'property' => 'fill',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'checkbox',
		'settings' => 'enabled',
		'label'    => __( 'Show back to top link', 'genesis-customizer' ),
		'default'  => true,
	],
	[
		'type'     => 'select',
		'settings' => 'style',
		'label'    => __( 'Style', 'genesis-customizer' ),
		'default'  => [
			'text',
		],
		'choices'  => [
			'text'   => __( 'Text Link', 'genesis-customizer' ),
			'button' => __( 'Fixed Button', 'genesis-customizer' ),
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'text',
		'settings' => 'text',
		'label'    => __( 'Text', 'genesis-customizer' ),
		'default'  => __( 'Back to top', 'genesis-customizer' ),
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
			[
				'setting'  => _get_setting( 'style' ),
				'value'    => 'text',
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'size',
		'label'    => __( 'Button Size', 'genesis-customizer' ),
		'default'  => '30',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.back-to-top-icon',
				'property' => 'height',
				'units'    => 'px',
			],
			[
				'element'  => '.back-to-top-icon',
				'property' => 'width',
				'units'    => 'px',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
			[
				'setting'  => _get_setting( 'style' ),
				'value'    => 'button',
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'radius',
		'label'    => __( 'Border Radius', 'genesis-customizer' ),
		'default'  => '4',
		'choices'  => [
			'min'  => 0,
			'max'  => 300,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.back-to-top-icon',
				'property' => 'border-radius',
				'units'    => 'px',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
			[
				'setting'  => _get_setting( 'style' ),
				'value'    => 'button',
				'operator' => '===',
			],
		],
	],
];
