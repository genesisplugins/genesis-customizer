<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'        => 'slider',
		'settings'    => 'border-radius',
		'label'       => __( 'Element Border Radius', 'genesis-customizer' ),
		'description' => __( 'Controls the border radius for common page elements such as entries, breadcrumbs, widgets, comments etc.', 'genesis-customizer' ),
		'default'     => '2',
		'choices'     => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'      => [
			[
				'element'  => [
					'.archive-description',
					'.entry',
					'.breadcrumb',
					'.author-box',
					'.after-entry',
					'.entry-comments',
					'.comment-respond',
					'.pagination',
					'.widget',
				],
				'property' => 'border-radius',
				'units'    => 'px',
			],
			[
				'element'       => '.featured-image-first .no-spacing img',
				'property'      => 'border-radius',
				'value_pattern' => '$px $px 0 0',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'        => 'kirki-box-shadow',
		'settings'    => 'box-shadow',
		'label'       => __( 'Element Drop Shadow', 'genesis-customizer' ),
		'description' => __( 'Controls the drop shadow for common page elements such as entries, breadcrumbs, widgets, comments etc.', 'genesis-customizer' ),
		'default'     => '0px 3px 6px 0px rgba(0,10,20,0.01)',
		'output'      => [
			[
				'element'  => [
					'.archive-description',
					'.entry',
					'.breadcrumb',
					'.author-box',
					'.after-entry',
					'.entry-comments',
					'.comment-respond',
					'.pagination'
				],
				'property' => 'box-shadow',
			],
		],
	],
];
