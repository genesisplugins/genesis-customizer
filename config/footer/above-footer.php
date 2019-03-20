<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'checkbox',
		'settings' => 'enabled',
		'label'    => __( 'Display Above Footer section', 'genesis-customizer' ),
		'default'  => true,
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'        => 'radio-image',
		'settings'    => 'layout',
		'label'       => __( 'Layout', 'genesis-customizer' ),
		'default'     => 'space-between',
		'collapsible' => true,
		'choices'     => [
			'space-between' => _get_url() . 'assets/img/above-header-full.gif',
			'flex-start'    => _get_url() . 'assets/img/above-header-left.gif',
			'center'        => _get_url() . 'assets/img/above-header-center.gif',
			'flex-end'      => _get_url() . 'assets/img/above-header-right.gif',
		],
		'output'      => [
			[
				'element'  => '.above-footer .wrap',
				'property' => 'justify-content',
			],
		],
		'required'    => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'      => 'multicolor',
		'settings'  => 'colors',
		'label'     => __( 'Colors', 'genesis-customizer' ),
		'transport' => 'refresh',
		'choices'   => [
			'left'        => __( 'Background Left', 'genesis-customizer' ),
			'right'       => __( 'Background Right', 'genesis-customizer' ),
			'text'        => __( 'Text', 'genesis-customizer' ),
			'headings'    => __( 'Headings', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'links-hover' => __( 'Links Hover', 'genesis-customizer' ),
			'border'      => __( 'Border', 'genesis-customizer' ),
		],
		'default'   => [
			'left'        => '',
			'right'       => '',
			'text'        => '',
			'headings'    => '',
			'links'       => '',
			'links-hover' => '',
			'border'      => _get_color( 'border' )
		],
		'output'    => [
			[
				'choice'   => 'text',
				'element'  => '.above-footer',
				'property' => 'color',
			],
			[
				'choice'   => 'headings',
				'element'  => [
					'.above-footer h1',
					'.above-footer h2',
					'.above-footer h3',
					'.above-footer h4',
					'.above-footer h5',
					'.above-footer h6',
				],
				'property' => 'color',
			],
			[
				'choice'   => 'links',
				'element'  => '.above-footer a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => '.above-footer a:hover, .above-footer a:focus',
				'property' => 'color',
			],
			[
				'choice'   => 'border',
				'element'  => '.above-footer',
				'property' => 'border-color',
			],
		],
		'required'  => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
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
		'settings' => 'angle',
		'label'    => __( 'Gradient Angle', 'genesis-customizer' ),
		'default'  => '135',
		'choices'  => [
			'min'  => 0,
			'max'  => 360,
			'step' => 1,
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
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Spacing', 'genesis-customizer' ),
		'default'  => '60',
		'choices'  => [
			'min'  => 0,
			'max'  => 300,
			'step' => 10,
		],
		'output'   => [
			[
				'element'  => '.above-footer',
				'property' => 'padding-top',
				'units'    => 'px',
			],
			[
				'element'  => '.above-footer',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
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
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'border-width',
		'label'    => __( 'Border Width', 'genesis-customizer' ),
		'default'  => [
			'border-top-width'    => '',
			'border-bottom-width' => '1px',
		],
		'choices'  => [
			'labels' => [
				'border-top-width'    => __( 'Border Top Width', 'genesis-customizer' ),
				'border-bottom-width' => __( 'Border Bottom Width', 'genesis-customizer' ),
			]
		],
		'output'   => [
			[
				'choice'  => 'border-top-width',
				'element' => '.above-footer',
			],
			[
				'choice'  => 'border-bottom-width',
				'element' => '.above-footer',
			],
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
		'type'     => 'custom',
		'settings' => 'divider-5',
		'default'  => '<hr>',
	],
	[
		'type'     => 'background',
		'settings' => 'background',
		'label'    => __( 'Background Image', 'genesis-customizer' ),
		'default'  => [
			'background-image'      => '',
			'background-repeat'     => '',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => '',
		],
		'output'   => [
			[
				'element' => '.above-footer',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
];
