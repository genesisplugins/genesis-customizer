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
				'choice'   => 'background',
				'element'  => '.mobile .nav-primary',
				'property' => 'background-color',
			],
			[
				'choice'   => 'overlay',
				'element'  => '.menu-overlay',
				'property' => 'background-color',
			],
			[
				'choice'   => 'links',
				'element'  => '.mobile .menu-primary a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => [
					'.mobile .menu-primary a:hover',
					'.mobile .menu-primary a:focus',
				],
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
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'            => 'custom',
		'settings'        => 'tip-1',
		'default'         => sprintf(
			'<p>%s <strong>%s</strong>%s </p><a href="%s" target="_blank" class="button-primary">%s</a>',
			esc_html__( 'More options available in', 'genesis-customizer' ),
			esc_html__( 'Genesis Customizer Pro', 'genesis-customizer' ),
			esc_html__( '!', 'genesis-customizer' ),
			esc_url( 'https://genesiscustomizer.com/pro' ),
			esc_html__( 'Go Pro →', 'genesis-customizer' )
		),
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	],
];
