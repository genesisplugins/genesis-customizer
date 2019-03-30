<?php

namespace SeoThemes\GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'        => __( 'Background', 'genesis-customizer' ),
			'widget-background' => __( 'Widget Background', 'genesis-customizer' ),
			'widget-title'      => __( 'Widget Title', 'genesis-customizer' ),
		],
		'default'  => [
			'background'        => '',
			'widget-background' => _get_color( 'white' ),
			'widget-title'      => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.sidebar-primary',
				'property' => 'background-color',
			],
			[
				'choice'   => 'widget-background',
				'element'  => '.sidebar-primary .widget',
				'property' => 'background-color',
			],
			[
				'choice'   => 'widget-title',
				'element'  => '.sidebar-primary .widget-title',
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
			'font-size'      => _get_size( 's' ),
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.sidebar-primary',
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
		'settings' => 'widget-title-typography',
		'label'    => __( 'Widget Title Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => _get_size( 'l' ),
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.widget-title',
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
		'settings' => 'width',
		'label'    => __( 'Sidebar Width', 'genesis-customizer' ),
		'default'  => '364',
		'choices'  => [
			'min'  => 200,
			'max'  => 600,
			'step' => 1,
		],
		'output'   => [
			[
				'element'     => '.sidebar-primary',
				'property'    => 'width',
				'units'       => 'px',
				'media_query' => _get_media_query(),
			],
			[
				'element'         => '.sidebar-content .content, .content-sidebar .content, .center-content .content',
				'property'        => 'width',
				'value_pattern'   => 'calc(100% - $px - 3.2rem)',
				'pattern_replace' => [
					'widgetSpacing' => $prefix . '_widget_spacing',
				],
				'media_query'     => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'widget-spacing',
		'label'    => __( 'Widget Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.sidebar-primary .widget',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'kirki-box-shadow',
		'settings' => 'widget-box-shadow',
		'label'    => __( 'Widget Shadow', 'genesis-customizer' ),
		'default'  => '0px 3px 6px 0px rgba(0,10,20,0.01)',
		'output'   => [
			[
				'element'  => '.sidebar .widget',
				'property' => 'box-shadow',
			],
		],
	],
];
