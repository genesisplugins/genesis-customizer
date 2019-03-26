<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'        => 'radio-image',
		'settings'    => 'layout',
		'label'       => __( 'Desktop Layout', 'genesis-customizer' ),
		'default'     => 'has-logo-left',
		'collapsible' => true,
		'choices'     => [
			'has-logo-left'   => _get_url() . 'assets/img/logo-left.gif',
			'has-logo-center' => _get_url() . 'assets/img/logo-center.gif',
			'has-logo-right'  => _get_url() . 'assets/img/logo-right.gif',
			'has-logo-above'  => _get_url() . 'assets/img/logo-above.gif',
			'has-logo-side'   => _get_url() . 'assets/img/logo-side.gif',
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'radio-image',
		'settings' => 'mobile-layout',
		'label'    => __( 'Mobile Layout', 'genesis-customizer' ),
		'default'  => 'has-logo-left-mobile',
		'choices'  => [
			'has-logo-left-mobile'  => _get_url() . 'assets/img/mobile-layout-1.gif',
			'has-logo-above-mobile' => _get_url() . 'assets/img/mobile-layout-2.gif',
			'has-logo-right-mobile' => _get_url() . 'assets/img/mobile-layout-3.gif',
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-0',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip:', 'genesis-customizer' ),
			esc_html__( 'Menu not aligning correctly? Try adjusting the', 'genesis-customizer' ),
			esc_html__( 'Align Menu', 'genesis-customizer' ),
			esc_html__( 'setting in the', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_menus_primary"' ),
			esc_html__( 'Primary Menu Section', 'genesis-customizer' )
		),
	],
	[
		'type'      => 'multicolor',
		'settings'  => 'colors',
		'label'     => __( 'Colors', 'genesis-customizer' ),
		'transport' => 'refresh',
		'choices'   => [
			'background'    => __( 'Background', 'genesis-customizer' ),
			'border-top'    => __( 'Border Top', 'genesis-customizer' ),
			'border-bottom' => __( 'Border Bottom', 'genesis-customizer' ),
			'shadow'        => __( 'Shadow', 'genesis-customizer' ),
		],
		'default'   => [
			'background'    => _get_color( 'white' ),
			'border-top'    => _get_color( 'transparent' ),
			'border-bottom' => _get_color( 'transparent' ),
			'shadow'        => _get_color( 'shadow' ),
		],
		'output'    => [
			[
				'choice'   => 'background',
				'element'  => '.primary-header, .has-logo-side .site-header',
				'property' => 'background-color'
			],
			[
				'choice'   => 'border-top',
				'element'  => '.primary-header',
				'property' => 'border-top-color'
			],
			[
				'choice'   => 'border-bottom',
				'element'  => '.primary-header',
				'property' => 'border-bottom-color'
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-1',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong>%s<a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Transparent header colors override the Primary Header defaults. They can be customized from the ', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_header_transparent"' ),
			esc_html__( 'Transparent Header Section', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Header Width', 'genesis-customizer' ),
		'default'  => '300',
		'choices'  => [
			'min'  => 100,
			'max'  => 600,
			'step' => 1,
		],
		'output'   => [
			[
				'element'     => '.has-logo-side .site-header',
				'property'    => 'width',
				'units'       => 'px',
				'media_query' => _get_media_query(),
			],
			[
				'element'     => '.has-logo-side .site-container',
				'property'    => 'padding-left',
				'units'       => 'px',
				'media_query' => _get_media_query(),
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'layout' ),
				'value'    => 'has-logo-side',
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'wrap-width',
		'label'    => __( 'Container Width', 'genesis-customizer' ),
		'default'  => '1152',
		'choices'  => [
			'min'  => 256,
			'max'  => 1920,
			'step' => 32,
		],
		'output'   => [
			[
				'element'  => '.site-header .wrap',
				'property' => 'max-width',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'shadow',
		'label'    => __( 'Shadow Size', 'genesis-customizer' ),
		'default'  => '20',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	],
];
