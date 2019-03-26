<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'      => 'radio',
		'settings'  => 'header-left',
		'label'     => __( 'Enable Header Left', 'genesis-customizer' ),
		'default'   => 'hide-mobile',
		'transport' => 'refresh',
		'choices'   => [
			'show'         => __( 'Desktop and Mobile', 'genesis-customizer' ),
			'hide-mobile'  => __( 'Desktop', 'genesis-customizer' ),
			'hide-desktop' => __( 'Mobile', 'genesis-customizer' ),
			'hide'         => __( 'None', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-1',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Edit the  ', 'genesis-customizer' ),
			esc_attr( '"sidebar-widgets-header-left-widget"' ),
			esc_html__( 'Header Left Widgets', 'genesis-customizer' )
		),
	],
	[
		'type'      => 'radio',
		'settings'  => 'header-right',
		'label'     => __( 'Enable Header Right', 'genesis-customizer' ),
		'default'   => 'hide-mobile',
		'transport' => 'refresh',
		'choices'   => [
			'show'         => __( 'Desktop and Mobile', 'genesis-customizer' ),
			'hide-mobile'  => __( 'Desktop', 'genesis-customizer' ),
			'hide-desktop' => __( 'Mobile', 'genesis-customizer' ),
			'hide'         => __( 'None', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-2',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Edit the  ', 'genesis-customizer' ),
			esc_attr( '"sidebar-widgets-header-right-widget"' ),
			esc_html__( 'Header Right Widgets', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'slider',
		'settings' => 'vertical-spacing',
		'label'    => __( 'Vertical Spacing', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.header-left, .header-right',
				'property' => 'margin-top',
				'units'    => 'px',
			],
			[
				'element'  => '.header-left, .header-right',
				'property' => 'margin-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'horizontal-spacing',
		'label'    => __( 'Horizontal Spacing', 'genesis-customizer' ),
		'default'  => '20',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.header-left, .header-right',
				'property' => 'margin-left',
				'units'    => 'px',
			],
			[
				'element'  => '.header-left, .header-right',
				'property' => 'margin-right',
				'units'    => 'px',
			],
		],
	],
];
