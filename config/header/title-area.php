<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'site-title'       => __( 'Site Title', 'genesis-customizer' ),
			'site-title-hover' => __( 'Site Title Hover', 'genesis-customizer' ),
			'site-description' => __( 'Site Description', 'genesis-customizer' ),
		],
		'default'  => [
			'site-title'       => _get_color( 'heading' ),
			'site-title-hover' => _get_color( 'accent' ),
			'site-description' => _get_color( 'text' ),
		],
		'output'   => [
			[
				'choice'   => 'site-title',
				'element'  => '.title-area .site-title a',
				'property' => 'color',
			],
			[
				'choice'   => 'site-title-hover',
				'element'  => '.site-title a:hover, .site-title a:focus',
				'property' => 'color',
			],
			[
				'choice'   => 'site-description',
				'element'  => '.site-description',
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
		'label'    => __( 'Site Title Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'     => '',
			'font-size'       => '17px',
			'variant'         => '700',
			'line-height'     => '1.4',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
		],
		'output'   => [
			[
				'element' => '.site-title',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'site-description-typography',
		'label'    => __( 'Site Description Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'     => '',
			'font-size'       => _get_size( 'xs' ),
			'variant'         => '600',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
		],
		'output'   => [
			[
				'element' => '.site-description',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'vertical-spacing',
		'label'    => __( 'Vertical Spacing', 'genesis-customizer' ),
		'default'  => '20',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.title-area',
				'property' => 'margin-top',
				'units'    => 'px',
			],
			[
				'element'  => '.title-area',
				'property' => 'margin-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'horizontal-spacing',
		'label'    => __( 'Horizontal Spacing', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.title-area',
				'property' => 'margin-left',
				'units'    => 'px',
			],
			[
				'element'  => '.title-area',
				'property' => 'margin-right',
				'units'    => 'px',
			],
		],
	],
];
