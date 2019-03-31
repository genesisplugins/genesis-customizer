<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background' => __( 'Sub Menu Background', 'genesis-customizer' ),
			'link'       => __( 'Sub Menu Link', 'genesis-customizer' ),
			'link-hover' => __( 'Sub Menu Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'               => _get_color( 'white' ),
			'link'                     => _get_color( 'text' ),
			'link-hover'               => _get_color( 'accent' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.desktop .sub-menu',
				'property' => 'background-color',
			],
			[
				'choice'   => 'link',
				'element'  => [
					'.desktop .sub-menu',
					'.desktop .sub-menu a',
				],
				'property' => 'color',
			],
			[
				'choice'   => 'link-hover',
				'element'  => [
					'.desktop .sub-menu a:hover',
					'.desktop .sub-menu a:focus',
					'.desktop .sub-menu .current-menu-item > a',
				],
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => '',
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.desktop .sub-menu a',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1233',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Width', 'genesis-customizer' ),
		'default'  => '200',
		'choices'  => [
			'min'  => 100,
			'max'  => 300,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.desktop .sub-menu',
				'property' => 'width',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-spacing',
		'label'    => __( 'Menu Item Spacing', 'genesis-customizer' ),
		'default'  => '6',
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.desktop .sub-menu .menu-item a',
				'property'      => 'padding',
				'value_pattern' => '$px',
			],
			[
				'element'       => '.desktop .sub-menu .menu-item',
				'property'      => 'padding',
				'value_pattern' => '0px',
			],
		],
	],
];
