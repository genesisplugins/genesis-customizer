<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'text',
		'settings' => 'text',
		'label'    => __( 'Text', 'genesis-customizer' ),
		'default'  => '',
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'            => __( 'Background', 'genesis-customizer' ),
			'background-active'     => __( 'Background Active', 'genesis-customizer' ),
			'menu-toggle-bar'       => __( 'Menu Toggle Bar', 'genesis-customizer' ),
			'text'                  => __( 'Text', 'genesis-customizer' ),
			'text-active'           => __( 'Text Active', 'genesis-customizer' ),
			'sub-background'        => __( 'Sub Menu Toggle Background', 'genesis-customizer' ),
			'sub-background-active' => __( 'Sub Menu Toggle Background Active', 'genesis-customizer' ),
			'sub-text'              => __( 'Sub Menu Toggle Icon', 'genesis-customizer' ),
			'sub-text-active'       => __( 'Sub Menu Toggle Text Active', 'genesis-customizer' ),
		],
		'default'  => [
			'background'            => _get_color( 'transparent' ),
			'background-active'     => _get_color( 'transparent' ),
			'menu-toggle-bar'       => _get_color( 'transparent' ),
			'text'                  => _get_color( 'heading' ),
			'text-active'           => _get_color( 'heading' ),
			'sub-background'        => _get_color( 'transparent' ),
			'sub-background-active' => _get_color( 'transparent' ),
			'sub-text'              => _get_color( 'heading' ),
			'sub-text-active'       => _get_color( 'heading' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => [
					'.menu-toggle',
					'.menu-toggle:hover',
					'.menu-toggle:focus',
				],
				'property' => 'background',
			],
			[
				'choice'   => 'background-active',
				'element'  => [
					'.menu-toggle.activated:hover',
					'.menu-toggle.activated:focus',
					'.menu-toggle.activated',
				],
				'property' => 'background',
			],
			[
				'choice'   => 'menu-toggle-bar',
				'element'  => '.has-logo-above-mobile .menu-toggle-bar',
				'property' => 'background',
			],
			[
				'choice'   => 'text',
				'element'  => [
					'.menu-toggle-icon',
					'.menu-toggle-icon:before',
					'.menu-toggle-icon:after',
				],
				'property' => 'background-color',
			],
			[
				'choice'   => 'text',
				'element'  => '.menu-toggle-text',
				'property' => 'color',
			],
			[
				'choice'   => 'text-active',
				'element'  => [
					'.menu-toggle.activated .menu-toggle-text',
				],
				'property' => 'color',
			],
			[
				'choice'   => 'text-active',
				'element'  => [
					'.menu-toggle.activated .menu-toggle-icon:before',
					'.menu-toggle.activated .menu-toggle-icon:after',
				],
				'property' => 'background-color',
			],
			[
				'choice'        => 'text-active',
				'element'       => [
					'.menu-toggle.activated .menu-toggle-icon',
				],
				'property'      => 'background-color',
				'value_pattern' => 'transparent',
			],
			[
				'choice'   => 'sub-background',
				'element'  => [
					'.sub-menu-toggle',
					'.sub-menu-toggle:hover',
					'.sub-menu-toggle:focus',
				],
				'property' => 'background',
			],
			[
				'choice'   => 'sub-background-active',
				'element'  => [
					'.sub-menu-toggle.activated:hover',
					'.sub-menu-toggle.activated:focus',
					'.sub-menu-toggle.activated',
				],
				'property' => 'background',
			],
			[
				'choice'        => 'sub-text',
				'element'       => '.sub-menu-toggle:before',
				'property'      => 'border-color',
				'value_pattern' => '$ transparent transparent',
			],

			[
				'choice'        => 'sub-text-active',
				'element'       => '.sub-menu-toggle.activated:before',
				'property'      => 'border-color',
				'value_pattern' => 'transparent transparent $',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Button Spacing', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.menu-toggle',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-toggle-bar-spacing',
		'label'    => __( 'Menu Toggle Bar Spacing', 'genesis-customizer' ),
		'default'  => '10',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.has-logo-above-mobile .menu-toggle-bar',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'checkbox',
		'settings' => 'icon',
		'label'    => __( 'Display menu toggle icon', 'genesis-customizer' ),
		'default'  => true,
	],
	[
		'type'     => 'checkbox',
		'settings' => 'icon-corners',
		'label'    => __( 'Round icon corners', 'genesis-customizer' ),
		'default'  => false,
		'output'   => [
			[
				'element'       => [
					'.menu-toggle-icon',
					'.menu-toggle-icon:before',
					'.menu-toggle-icon:after',
				],
				'property'      => 'border-radius',
				'value_pattern' => '5px',
				'exclude'       => [ false ],
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'icon' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'icon-size',
		'label'    => __( 'Icon Size', 'genesis-customizer' ),
		'default'  => '24',
		'choices'  => [
			'min'  => 12,
			'max'  => 120,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => [
					'.menu-toggle-icon',
					'.menu-toggle-icon:before',
					'.menu-toggle-icon:after',
				],
				'property' => 'width',
				'units'    => 'px',
			],
			[
				'element'       => '.menu-toggle-icon',
				'property'      => 'margin',
				'value_pattern' => 'calc(($px / 3)) 0',
			],
			[
				'element'       => '.menu-toggle-icon:before',
				'property'      => 'top',
				'value_pattern' => 'calc(-$px / 3)',
			],
			[
				'element'       => '.menu-toggle-icon:after',
				'property'      => 'bottom',
				'value_pattern' => 'calc(-$px / 3)',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'icon' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'icon-line-size',
		'label'    => __( 'Icon Line Size', 'genesis-customizer' ),
		'default'  => '3',
		'choices'  => [
			'min'  => 1,
			'max'  => 5,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => [
					'.menu-toggle-icon',
					'.menu-toggle-icon:before',
					'.menu-toggle-icon:after',
				],
				'property' => 'height',
				'units'    => 'px',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'icon' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
];
