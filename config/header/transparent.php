<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'radio',
		'settings' => 'enabled',
		'label'    => __( 'Enable On', 'genesis-customizer' ),
		'default'  => 'no-transparent-header',
		'choices'  => [
			'has-transparent-header'         => __( 'Desktop and Mobile', 'genesis-customizer' ),
			'has-transparent-header-desktop' => __( 'Desktop', 'genesis-customizer' ),
			'has-transparent-header-mobile'  => __( 'Mobile', 'genesis-customizer' ),
			'no-transparent-header'          => __( 'None', 'genesis-customizer' ),
		],
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
			'background'               => __( 'Background', 'genesis-customizer' ),
			'site-title'               => __( 'Site Title', 'genesis-customizer' ),
			'site-description'         => __( 'Site Description', 'genesis-customizer' ),
			'text'                     => __( 'Text', 'genesis-customizer' ),
			'links'                    => __( 'Links', 'genesis-customizer' ),
			'links-hover'              => __( 'Links Hover', 'genesis-customizer' ),
			'above-header-background'  => __( 'Above Header Background', 'genesis-customizer' ),
			'above-header-text'        => __( 'Above Header Text', 'genesis-customizer' ),
			'nav-secondary-background' => __( 'Secondary Menu Background', 'genesis-customizer' ),
			'nav-secondary-text'       => __( 'Secondary Menu Text', 'genesis-customizer' ),
		],
		'default'  => [
			'background'               => _get_color( 'transparent' ),
			'site-title'               => _get_color( 'white' ),
			'site-description'         => _get_color( 'white' ),
			'text'                     => _get_color( 'white' ),
			'links'                    => _get_color( 'white' ),
			'links-hover'              => _get_color( 'accent' ),
			'above-header-background'  => _get_color( 'transparent' ),
			'above-header-text'        => _get_color( 'white' ),
			'nav-secondary-background' => _get_color( 'transparent' ),
			'nav-secondary-text'       => _get_color( 'white' ),
		],
		'output'   => [
			/**
			 * Desktop
			 */
			[
				'choice'      => 'background',
				'element'     => '.has-transparent-header-desktop .primary-header',
				'property'    => 'background-color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'site-title',
				'element'     => '.has-transparent-header-desktop .site-title a',
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'site-description',
				'element'     => '.has-transparent-header-desktop .site-description',
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'text',
				'element'     => '.has-transparent-header-desktop .primary-header',
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'links',
				'element'     => '.has-transparent-header-desktop .site-header a',
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'links-hover',
				'element'     => [
					'.has-transparent-header-desktop .site-header a:hover',
					'.has-transparent-header-desktop .site-header a:focus',
					'.has-transparent-header-desktop .current-menu-item > a',
				],
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'above-header-background',
				'element'     => '.has-transparent-header-desktop .above-header',
				'property'    => 'background-color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'above-header-text',
				'element'     => '.has-transparent-header-desktop .above-header',
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'nav-secondary-background',
				'element'     => '.has-transparent-header-desktop .nav-secondary',
				'property'    => 'background-color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'nav-secondary-text',
				'element'     => '.has-transparent-header-desktop .nav-secondary',
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			/**
			 * Mobile
			 */
			[
				'choice'      => 'background',
				'element'     => '.has-transparent-header-mobile .primary-header',
				'property'    => 'background-color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'site-title',
				'element'     => '.has-transparent-header-mobile .site-title a',
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'site-description',
				'element'     => '.has-transparent-header-mobile .site-description',
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'text',
				'element'     => '.has-transparent-header-mobile .primary-header',
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'links',
				'element'     => '.has-transparent-header-mobile .site-header a',
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'links-hover',
				'element'     => [
					'.has-transparent-header-mobile .site-header a:hover',
					'.has-transparent-header-mobile .site-header a:focus',
					'.has-transparent-header-mobile .current-menu-item > a',
				],
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'above-header-background',
				'element'     => '.has-transparent-header-mobile .above-header',
				'property'    => 'background-color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'above-header-text',
				'element'     => '.has-transparent-header-mobile .above-header',
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'nav-secondary-background',
				'element'     => '.has-transparent-header-mobile .nav-secondary',
				'property'    => 'background-color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'nav-secondary-text',
				'element'     => '.has-transparent-header-mobile .nav-secondary',
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
			/**
			 * Both
			 */
			/**
			 * Desktop
			 */
			[
				'choice'   => 'background',
				'element'  => '.has-transparent-header .primary-header',
				'property' => 'background-color',
			],
			[
				'choice'   => 'site-title',
				'element'  => '.has-transparent-header .site-title a',
				'property' => 'color',
			],
			[
				'choice'   => 'site-description',
				'element'  => '.has-transparent-header .site-description',
				'property' => 'color',
			],
			[
				'choice'   => 'text',
				'element'  => '.has-transparent-header .primary-header',
				'property' => 'color',
			],
			[
				'choice'   => 'links',
				'element'  => '.has-transparent-header .site-header a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => [
					'.has-transparent-header .site-header a:hover',
					'.has-transparent-header .site-header a:focus',
					'.has-transparent-header .current-menu-item > a',
				],
				'property' => 'color',
			],
			[
				'choice'   => 'above-header-background',
				'element'  => '.has-transparent-header .above-header',
				'property' => 'background-color',
			],
			[
				'choice'   => 'above-header-text',
				'element'  => '.has-transparent-header .above-header',
				'property' => 'color',
			],
			[
				'choice'   => 'nav-secondary-background',
				'element'  => '.has-transparent-header .nav-secondary',
				'property' => 'background-color',
			],
			[
				'choice'   => 'nav-secondary-text',
				'element'  => '.has-transparent-header .nav-secondary',
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'checkbox',
		'settings' => 'different-logo',
		'label'    => __( 'Use different logo for transparent header', 'genesis-customizer' ),
		'default'  => false,
	],
	[
		'type'     => 'image',
		'settings' => 'logo',
		'label'    => __( 'Logo', 'genesis-customizer' ),
		'default'  => '',
		'choices'  => [
			'save_as' => 'id',
		],
		'required' => [
			[
				'setting'  => _get_setting( 'different-logo' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
];
