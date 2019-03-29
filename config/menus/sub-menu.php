<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'               => __( 'Sub Menu Background', 'genesis-customizer' ),
			'link'                     => __( 'Sub Menu Link', 'genesis-customizer' ),
			'link-hover'               => __( 'Sub Menu Link Hover', 'genesis-customizer' ),
			'toggle-background'        => __( 'Sub Menu Toggle Background', 'genesis-customizer' ),
			'toggle-background-active' => __( 'Sub Menu Toggle Background Active', 'genesis-customizer' ),
			'toggle-text'              => __( 'Sub Menu Toggle Icon', 'genesis-customizer' ),
			'toggle-text-active'       => __( 'Sub Menu Toggle Text Active', 'genesis-customizer' ),
			'toggle-border'            => __( 'Sub Menu Toggle Border', 'genesis-customizer' ),
			'toggle-border-active'     => __( 'Sub Menu Toggle Border Active', 'genesis-customizer' ),
		],
		'default'  => [
			'background'               => _get_color( 'white' ),
			'link'                     => _get_color( 'text' ),
			'link-hover'               => _get_color( 'accent' ),
			'toggle-background'        => _get_color( 'transparent' ),
			'toggle-background-active' => _get_color( 'transparent' ),
			'toggle-text'              => _get_color( 'heading' ),
			'toggle-text-active'       => _get_color( 'heading' ),
			'toggle-border'            => _get_color( 'transparent' ),
			'toggle-border-active'     => _get_color( 'transparent' ),
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
			[
				'choice'   => 'toggle-background',
				'element'  => [
					'.sub-menu-toggle',
					'.sub-menu-toggle:hover',
					'.sub-menu-toggle:focus',
				],
				'property' => 'background',
			],
			[
				'choice'   => 'toggle-background-active',
				'element'  => [
					'.sub-menu-toggle.activated:hover',
					'.sub-menu-toggle.activated:focus',
					'.sub-menu-toggle.activated',
				],
				'property' => 'background',
			],
			[
				'choice'        => 'toggle-text',
				'element'       => '.sub-menu-toggle:before',
				'property'      => 'border-color',
				'value_pattern' => '$ transparent transparent',
			],
			[
				'choice'        => 'toggle-text-active',
				'element'       => '.sub-menu-toggle.activated:before',
				'property'      => 'border-color',
				'value_pattern' => 'transparent transparent $',
			],
			[
				'choice'   => 'toggle-border',
				'element'  => '.sub-menu-toggle',
				'property' => 'border-color',
			],
			[
				'choice'   => 'toggle-border-active',
				'element'  => '.sub-menu-toggle.activated',
				'property' => 'border-color',
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
