<?php

namespace SeoThemes\GenesisCustomizer;

return [
	[
		'type'     => 'slider',
		'settings' => 'content-sidebar-wrap-width',
		'label'    => __( 'Content Sidebar Wrap Width', 'genesis-customizer' ),
		'tooltip'  => __( 'The Content Sidebar Wrap width controls the maximum width of the main content area. The main content area consists of the content and sidebar.', 'genesis-customizer' ),
		'default'  => '1024',
		'choices'  => [
			'min'  => 512,
			'max'  => 1920,
			'step' => 32,
		],
		'output'   => [
			[
				'element'  => '.content-sidebar-wrap',
				'property' => 'max-width',
				'units'    => 'px',
			],
		],
	],
];
