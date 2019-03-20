<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'  => __( 'Background', 'genesis-customizer' ),
			'overlay'     => __( 'Overlay', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'links-hover' => __( 'Links Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'  => _get_color( 'white' ),
			'overlay'     => _get_color( 'overlay' ),
			'links'       => _get_color( 'text' ),
			'links-hover' => _get_color( 'text' ),
		],
		'output'   => [
			[
				'choice'      => 'background',
				'element'     => '.mobile .nav-primary',
				'property'    => 'background-color',
			],
			[
				'choice'   => 'overlay',
				'element'  => '.menu-overlay',
				'property' => 'background-color',
			],
			[
				'choice'      => 'links',
				'element'     => '.mobile .menu-primary a',
				'property'    => 'color',
			],
			[
				'choice'      => 'links-hover',
				'element'     => [
					'.mobile .menu-primary a:hover',
					'.mobile .menu-primary a:focus',
				],
				'property'    => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'radio',
		'settings' => 'animation',
		'label'    => __( 'Animation', 'genesis-customizer' ),
		'default'  => 'has-mobile-menu-top',
		'choices'  => [
			'has-mobile-menu-top'    => __( 'Slide down from top', 'genesis-customizer' ),
			'has-mobile-menu-left'   => __( 'Slide in from left', 'genesis-customizer' ),
			'has-mobile-menu-right'  => __( 'Slide in from right', 'genesis-customizer' ),
			'has-mobile-menu-center' => __( 'Fade in from center', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Width', 'genesis-customizer' ),
		'default'  => '90',
		'choices'  => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'     => [
					'.mobile.has-mobile-menu-left .nav-primary',
					'.mobile.has-mobile-menu-right .nav-primary',
				],
				'property'    => 'width',
				'units'       => 'vw',
			],
			[
				'element'       => [
					'.mobile.has-mobile-menu-right .nav-primary.visible',
				],
				'property'      => 'transform',
				'value_pattern' => 'translateX(calc(100vw - $vw))',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'animation' ),
				'value'    => 'has-mobile-menu-top',
				'operator' => '!==',
			],
			[
				'setting'  => _get_setting( 'animation' ),
				'value'    => 'has-mobile-menu-center',
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
		'type'     => 'select',
		'settings' => 'alignment',
		'label'    => __( 'Menu Item Alignment', 'genesis-customizer' ),
		'default'  => 'space-between',
		'choices'  => [
			'flex-start'    => __( 'Left', 'genesis-customizer' ),
			'center'        => __( 'Center', 'genesis-customizer' ),
			'flex-end'      => __( 'Right', 'genesis-customizer' ),
			'space-between' => __( 'Full', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'breakpoint',
		'label'    => esc_html__( 'Menu Breakpoint', 'genesis-customizer' ),
		'tooltip'  => __( 'Select the screen size at which the mobile menu should be shown.', 'genesis-customizer' ),
		'default'  => _get_breakpoint(),
		'choices'  => [
			'min'  => 0,
			'max'  => 1920,
			'step' => 16,
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-spacing',
		'label'    => __( 'Menu Item Spacing', 'genesis-customizer' ),
		'default'  => '10',
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.mobile .menu-primary a',
				'property'      => 'padding',
				'value_pattern' => '$px 0',
			],
			[
				'element'       => '.mobile-menu',
				'property'      => 'padding',
				'value_pattern' => '$px 0',
			],
		],
	],
];
