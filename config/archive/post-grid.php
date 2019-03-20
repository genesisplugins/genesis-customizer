<?php

namespace GenesisPlugins\GenesisCustomizer;

return [
	[
		'type'     => 'select',
		'settings' => 'columns',
		'label'    => __( 'Grid Layout', 'genesis-customizer' ),
		'default'  => 'has-1-columns',
		'choices'  => [
			'has-1-columns' => __( '1 Column', 'genesis-customizer' ),
			'has-2-columns' => __( '2 Column', 'genesis-customizer' ),
			'has-3-columns' => __( '3 Column', 'genesis-customizer' ),
			'has-4-columns' => __( '4 Column', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'checkbox',
		'settings' => 'masonry',
		'label'    => __( 'Enable masonry layout', 'genesis-customizer' ),
		'default'  => true,
	],
	[
		'type'     => 'checkbox',
		'settings' => 'featured-image-spacing',
		'label'    => __( 'Remove featured image spacing', 'genesis-customizer' ),
		'default'  => false,
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'sortable',
		'settings' => 'order',
		'label'    => __( 'Content', 'genesis-customizer' ),
		'default'  => [
			'entry-title',
			'post-info',
			'featured-image',
			'entry-content',
			'post-meta',
		],
		'choices'  => [
			'entry-title'    => __( 'Entry Title', 'genesis-customizer' ),
			'post-info'      => __( 'Post Info', 'genesis-customizer' ),
			'featured-image' => __( 'Featured Image', 'genesis-customizer' ),
			'entry-content'  => __( 'Entry Content', 'genesis-customizer' ),
			'post-meta'      => __( 'Post Meta', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'generic',
		'settings' => 'post-info',
		'label'    => __( 'Post Info', 'genesis-customizer' ),
		'default'  => '[post_date] by [post_author_posts_link] [post_comments] [post_edit]',
		'choices'  => [
			'element' => 'textarea',
			'rows'    => '2',
		],
	],
	[
		'type'     => 'generic',
		'settings' => 'post-meta',
		'label'    => __( 'Post Meta', 'genesis-customizer' ),
		'default'  => '[post_categories before="Filed Under: "] [post_tags before="Tagged: "]',
		'choices'  => [
			'element' => 'textarea',
			'rows'    => '2',
		],
	],
];
