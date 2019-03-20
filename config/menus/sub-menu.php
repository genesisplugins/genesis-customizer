<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background' => __( 'Background', 'genesis-customizer' ),
			'link'       => __( 'Link', 'genesis-customizer' ),
			'link-hover' => __( 'Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background' => _get_color( 'white' ),
			'link'       => _get_color( 'text' ),
			'link-hover' => _get_color( 'accent' ),
		],
		'output'   => [
			[
				'choice'      => 'background',
				'element'     => '.sub-menu',
				'property'    => 'background-color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'link',
				'element'     => [
					'.menu .sub-menu',
					'.menu .sub-menu a',
				],
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'link-hover',
				'element'     => [
					'.menu .sub-menu a:hover',
					'.menu .sub-menu a:focus',
					'.menu .sub-menu .current-menu-item > a',
				],
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
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
				'element'     => '.sub-menu',
				'property'    => 'width',
				'units'       => 'px',
				'media_query' => _get_media_query(),
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
				'element'       => '.sub-menu .menu-item a',
				'property'      => 'padding',
				'value_pattern' => '$px',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => '.sub-menu .menu-item',
				'property'      => 'padding',
				'value_pattern' => '0px',
				'media_query'   => _get_media_query(),
			],
		],
	],
];
