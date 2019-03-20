<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'radio',
		'settings' => 'enabled',
		'label'    => __( 'Enable on', 'genesis-customizer' ),
		'default'  => 'hide-mobile',
		'choices'  => [
			'show'         => __( 'Desktop and Mobile', 'genesis-customizer' ),
			'hide-mobile'  => __( 'Desktop', 'genesis-customizer' ),
			'hide-desktop' => __( 'Mobile', 'genesis-customizer' ),
			'hide'         => __( 'None', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => 'none',
				'operator' => '!==',
			],
		],
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
				'element'  => '.above-header .wrap',
				'property' => 'justify-content',
			],
		],
		'required'    => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => 'none',
				'operator' => '!==',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => 'none',
				'operator' => '!==',
			],
		],
	],
	[
		'type'     => 'multicolor',
		'settings' => 'color',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'  => __( 'Background', 'genesis-customizer' ),
			'text'        => __( 'Text', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'links-hover' => __( 'Links Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'  => _get_color( 'heading' ),
			'text'        => _get_color( 'border' ),
			'links'       => _get_color( 'border' ),
			'links-hover' => _get_color( 'white' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.above-header',
				'property' => 'background-color',
			],
			[
				'choice'   => 'text',
				'element'  => '.above-header',
				'property' => 'color',
			],
			[
				'choice'   => 'links',
				'element'  => '.above-header a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => '.above-header a:hover, .footer-widgets a:focus',
				'property' => 'color',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => 'none',
				'operator' => '!==',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'mobile'  => _get_size( 's' ),
			'desktop' => '',
		],
		'choices'  => [
			'labels' => [
				'mobile'  => __( 'Font Size Mobile', 'genesis-customizer' ),
				'desktop' => __( 'Font Size Desktop', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'choice'   => 'mobile',
				'element'  => '.above-header, .above-header a',
				'property' => 'font-size',
			],
			[
				'choice'      => 'desktop',
				'element'     => '.above-header, .above-header a',
				'property'    => 'font-size',
				'media_query' => _get_media_query(),
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => 'none',
				'operator' => '!==',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'height',
		'label'    => __( 'Height', 'genesis-customizer' ),
		'default'  => '40',
		'choices'  => [
			'min'  => 20,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.above-header',
				'property' => 'height',
				'units'    => 'px',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => 'none',
				'operator' => '!==',
			],
		],
	],
];
