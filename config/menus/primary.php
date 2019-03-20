<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'link'       => __( 'Link', 'genesis-customizer' ),
			'link-hover' => __( 'Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'link'       => _get_color( 'text' ),
			'link-hover' => _get_color( 'accent' ),
		],
		'output'   => [
			[
				'choice'   => 'link',
				'element'  => '.menu-primary a',
				'property' => 'color',
			],
			[
				'choice'   => 'link-hover',
				'element'  => [
					'.menu-primary a:hover',
					'.menu-primary a:focus',
					'.menu-primary .current-menu-item > a'
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
				'element' => '.desktop .menu-primary a',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'      => 'select',
		'settings'  => 'alignment',
		'label'     => __( 'Align Menu', 'genesis-customizer' ),
		'default'   => 'flex-right-desktop',
		'transport' => 'refresh',
		'choices'   => [
			'flex-left-desktop'   => __( 'Left', 'genesis-customizer' ),
			'flex-center-desktop' => __( 'Center', 'genesis-customizer' ),
			'flex-right-desktop'  => __( 'Right', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-vertical-spacing',
		'label'    => __( 'Menu Item Vertical Spacing', 'genesis-customizer' ),
		'default'  => '10',
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.desktop .menu-primary a',
				'property'      => 'padding',
				'value_pattern' => '$px 0',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-horizontal-spacing',
		'label'    => __( 'Menu Item Horizontal Spacing', 'genesis-customizer' ),
		'default'  => '10',
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.desktop .menu-primary .menu-item',
				'property'      => 'padding',
				'value_pattern' => '0 $px',
			],
		],
	],
];
