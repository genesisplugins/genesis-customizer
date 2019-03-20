<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'toggle',
		'settings' => 'enable',
		'label'    => esc_html__( 'Enable Typekit', 'genesis-customizer' ),
		'default'  => true,
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'text',
		'settings' => 'kit',
		'label'    => esc_html__( 'Typekit ID', 'genesis-customizer' ),
		'default'  => 'cuj7tud',
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'        => 'repeater',
		'label'       => esc_html__( 'Typekit Fonts', 'genesis-customizer' ),
		'description' => esc_html__( 'Here you can add typekit fonts', 'genesis-customizer' ),
		'settings'    => 'fonts',
		'row_label'   => [
			'type'  => 'text',
			'value' => esc_html__( 'Typekit Font', 'genesis-customizer' ),
		],
		'default'     => [
			[
				'font_name'     => 'Museo Sans',
				'font_css_name' => 'museo-sans',
				'font_variants' => [ '300', '500', '700' ],
				'font_fallback' => 'sans-serif',
				'font_subsets'  => 'latin',
			],
		],
		'fields'      => [
			'font_name'     => [
				'type'  => 'text',
				'label' => esc_html__( 'Name', 'genesis-customizer' ),
			],
			'font_css_name' => [
				'type'  => 'text',
				'label' => esc_html__( 'CSS Name', 'genesis-customizer' ),
			],
			'font_variants' => [
				'type'     => 'select',
				'label'    => esc_html__( 'Variants', 'genesis-customizer' ),
				'multiple' => 18,
				'choices'  => [
					'100'       => '100',
					'100italic' => '100italic',
					'200'       => '200',
					'200italic' => '200italic',
					'300'       => '300',
					'300italic' => '300italic',
					'regular'   => 'regular',
					'italic'    => 'italic',
					'500'       => '500',
					'500italic' => '500italic',
					'600'       => '600',
					'600italic' => '600italic',
					'700'       => '700',
					'700italic' => '700italic',
					'800'       => '800',
					'800italic' => '800italic',
					'900'       => '900',
					'900italic' => '900italic',
				],
			],
			'font_fallback' => [
				'type'    => 'select',
				'label'   => esc_html__( 'Fallback', 'genesis-customizer' ),
				'choices' => [
					'sans-serif' => esc_html__( 'Helvetica, Arial, sans-serif', 'genesis-customizer' ),
					'serif'      => esc_html__( 'Georgia, serif', 'genesis-customizer' ),
					'monospace'  => esc_html__( 'Lucida Console, Monaco, monospace', 'genesis-customizer' ),
				],
			],
			'font_subsets'  => [
				'type'     => 'select',
				'label'    => esc_html__( 'Subsets', 'genesis-customizer' ),
				'multiple' => 7,
				'choices'  => [
					'cyrillic'     => esc_html__( 'Cyrillic', 'genesis-customizer' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'genesis-customizer' ),
					'devanagari'   => esc_html__( 'Devanagari', 'genesis-customizer' ),
					'greek'        => esc_html__( 'Greek', 'genesis-customizer' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'genesis-customizer' ),
					'khmer'        => esc_html__( 'Khmer', 'genesis-customizer' ),
					'latin'        => esc_html__( 'Latin', 'genesis-customizer' ),
				],
			],
		],
	],
];
