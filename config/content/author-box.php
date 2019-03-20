<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background' => __( 'Background', 'genesis-customizer' ),
		],
		'default'  => [
			'background' => _get_color( 'white' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.author-box',
				'property' => 'background-color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'text',
		'settings' => 'title',
		'label'    => __( 'Title', 'genesis-customizer' ),
		'default'  => '',
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.author-box',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
];
