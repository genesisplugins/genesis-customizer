<?php

namespace GenesisPlugins\GenesisCustomizer;

$transition_elements = array_merge(
	_get_elements( 'button', false, true ),
	_get_elements( 'input', false, true ),
	[
		'a',
		'.above-header',
		'.site-header',
		'.title-area',
		'.primary-header',
		'.nav-primary',
		'.nav-secondary',
		'.menu-overlay',
		'.header-search.full-screen',
		'.scroll-to-top-icon',
	]
);

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
					'.pagination',
				],
				'property' => 'box-shadow',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-34874',
		'default'  => '<hr>',
	],
	[
		'type'        => 'slider',
		'settings'    => 'transition-duration',
		'label'       => __( 'Transitions', 'genesis-customizer' ),
		'description' => '<br>' . __( 'Duration', 'genesis-customizer' ),
		'default'     => '0.2',
		'choices'     => [
			'min'  => 0,
			'max'  => 5,
			'step' => 0.01,
		],
		'output'      => [
			[
				'element'       => array_merge(
					_get_elements( 'button', false, true ),
					_get_elements( 'input', false, true ),
					[
						'.above-header',
						'.site-header',
						'.nav-secondary',
						'.menu-overlay',
						'.header-search.full-screen',
					]
				),
				'property'      => 'transition-property',
				'value_pattern' => 'all',
			],
			[
				'element'  => $transition_elements,
				'property' => 'transition-duration',
				'units'    => 's',
			],
		],
	],
	[
		'type'        => 'slider',
		'settings'    => 'transition-delay',
		'description' => __( 'Delay', 'genesis-customizer' ),
		'default'     => '0',
		'choices'     => [
			'min'  => 0,
			'max'  => 5,
			'step' => 0.01,
		],
		'output'      => [
			[
				'element'  => $transition_elements,
				'property' => 'transition-delay',
				'units'    => 's',
			],
		],
	],
	[
		'type'        => 'select',
		'settings'    => 'transition-function',
		'description' => __( 'Function', 'genesis-customizer' ),
		'default'     => 'ease',
		'choices'     => [
			'ease'        => __( 'Ease', 'genesis-customizer' ),
			'ease-in'     => __( 'Ease in', 'genesis-customizer' ),
			'ease-in-out' => __( 'Ease in out', 'genesis-customizer' ),
			'ease-out'    => __( 'Ease out', 'genesis-customizer' ),
			'linear'      => __( 'Linear', 'genesis-customizer' ),
			'step-end'    => __( 'Step end', 'genesis-customizer' ),
			'step-middle' => __( 'Step middle', 'genesis-customizer' ),
			'step-start'  => __( 'Step start', 'genesis-customizer' ),
		],
		'output'      => [
			[
				'element'  => $transition_elements,
				'property' => 'transition-timing-function',
			],
		],
	],
];
