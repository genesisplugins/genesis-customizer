<?php

namespace GenesisPlugins\GenesisCustomizer;

unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );
unregister_sidebar( 'header-right' );

add_action( 'genesis_setup', __NAMESPACE__ . '\register_widget_areas', 20 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_widget_areas() {
	$widget_areas = [
		'above-header'        => [
			'name'        => __( 'Above Header', 'genesis-customizer' ),
			'description' => __( 'This is the Above Header widget area.', 'genesis-customizer' ),
		],
		'header-left-widget'  => [
			'name'        => __( 'Header Left', 'genesis-customizer' ),
			'description' => __( 'This is the Header Left widget area. It typically appears next to the site title or logo. This widget area is not suitable to display every type of widget, and works best with a custom menu, a search form, or possibly a text widget.', 'genesis-customizer' ),
		],
		'header-right-widget' => [
			'name'        => __( 'Header Right', 'genesis-customizer' ),
			'description' => __( 'This is the Header Right widget area. It typically appears next to the site title or logo. This widget area is not suitable to display every type of widget, and works best with a custom menu, a search form, or possibly a text widget.', 'genesis-customizer' ),
		],
		'after-entry'         => [
			'name'        => __( 'After Entry', 'genesis-customizer' ),
			'description' => __( 'Widgets in this widget area will display after single entries.', 'genesis-customizer' ),
		],
		'sidebar'             => [
			'name'        => __( 'Primary Sidebar', 'genesis-customizer' ),
			'description' => __( 'This is the sidebar widget area if you are using a two column site layout option.', 'genesis-customizer' ),
		],
		'above-footer'        => [
			'name'        => __( 'Above Footer', 'genesis-customizer' ),
			'description' => __( 'This is the Above Footer widget area.', 'genesis-customizer' ),
		]
	];

	foreach ( $widget_areas as $id => $args ) {
		genesis_register_sidebar( [
			'id'          => $id,
			'name'        => $args['name'],
			'description' => $args['description'],
		] );
	}
}

add_action( 'genesis_before_header_wrap', __NAMESPACE__ . '\above_header' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function above_header() {
	$enabled = _get_value( 'header_above-header_enabled' );

	if ( 'hide' === $enabled ) {
		return;
	}

	genesis_widget_area( 'above-header', [
		'before' => sprintf( '<div class="above-header widget-area %s"><div class="wrap">', $enabled ),
		'after'  => '</div></div>',
	] );
}


add_action( 'genesis_before_title_area', __NAMESPACE__ . '\header_left', 5 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function header_left() {
	$enabled = _get_value( 'header_widget-areas_header-left' );

	if ( 'hide' === $enabled ) {
		return;
	}

	genesis_widget_area( 'header-left-widget', [
		'before' => '<div class="header-left widget-area ' . $enabled . '">',
		'after'  => '</div>',
	] );
}

add_action( 'genesis_after_title_area', __NAMESPACE__ . '\header_right', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function header_right() {
	$enabled = _get_value( 'header_widget-areas_header-right' );

	if ( 'hide' === $enabled ) {
		return;
	}

	genesis_widget_area( 'header-right-widget', [
		'before' => '<div class="header-right widget-area ' . $enabled . '">',
		'after'  => '</div>',
	] );
}

add_action( 'genesis_after_entry', __NAMESPACE__ . '\after_entry', 9 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function after_entry() {
	if ( ! is_single() ) {
		return;
	}

	genesis_widget_area( 'after-entry', array(
		'before' => '<div class="after-entry widget-area">',
		'after'  => '</div>',
	) );
}

add_action( 'genesis_footer', __NAMESPACE__ . '\above_footer', 11 );
/**
 * Display the Above Footer widget area.
 *
 * @since 1.1.0
 *
 * @return void
 */
function above_footer() {
	$enabled = _get_value( 'footer_above-footer_enabled' );

	if ( ! $enabled ) {
		return;
	}

	genesis_widget_area( 'above-footer', array(
		'before' => '<div class="above-footer widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

/**
 * Display the Footer Credits widget area.
 *
 * @since 1.1.0
 *
 * @return void
 */
function display_footer_credits() {
	genesis_widget_area( 'footer-credits', array(
		'before' => '',
		'after'  => '',
	) );
}

add_action( 'genesis_setup', __NAMESPACE__ . '\register_footer_widgets', 20 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_footer_widgets() {
	$setting = _get_value( 'footer_footer-widgets_columns' );
	$columns = count( explode( '-', $setting ) );
	$count   = is_customize_preview() ? 4 : $columns;

	for ( $i = 1; $i <= $count; $i ++ ) {
		genesis_register_sidebar( [
			'id'          => 'footer-' . $i,
			'name'        => __( 'Footer ', 'genesis-customizer' ) . $i,
			'description' => __( 'This is the Footer ', 'genesis-customizer' ) . $i . __( ' widget area.', 'genesis-customizer' ),
		] );
	}
}

add_action( 'genesis_footer', __NAMESPACE__ . '\display_footer_widgets', 12 );
/**
 * Display footer widgets widget areas.
 *
 * @var $widget_areas Number of footer widget areas.
 */
function display_footer_widgets() {
	if ( ! is_active_sidebar( 'footer-1' ) ) {
		return;
	}

	$settings = _get_value( 'footer_footer-widgets_columns' );

	if ( '0' === $settings ) {
		return;
	}

	genesis_markup( [
		'open'    => '<div %s>' . genesis_get_structural_wrap( 'footer-widgets', 'open' ),
		'context' => 'footer-widgets',
	] );

	$widgets = explode( '-', $settings );
	$count   = 1;
	$width   = [
		'12' => 'full-width',
		'9'  => 'three-fourths',
		'8'  => 'two-thirds',
		'6'  => 'one-half',
		'4'  => 'one-third',
		'3'  => 'one-fourth',
	];

	foreach ( $widgets as $widget ) {
		$first = $count === 1 ? ' first' : '';
		genesis_widget_area( "footer-$count", [
			'before' => sprintf( '<div class="footer-widgets-area footer-widgets-%s %s%s">', $count, $width[ $widget ], $first ),
			'after'  => '</div>',
		] );
		$count ++;
	}

	genesis_markup( [
		'close'   => genesis_get_structural_wrap( 'footer-widgets', 'close' ) . '</div>',
		'context' => 'footer-widgets',
	] );
}

add_action( 'genesis_setup', __NAMESPACE__ . '\register_footer_credits', 20 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_footer_credits() {
	$footer_credits = _get_value( 'footer_footer-credits_type' );

	if ( 'widget' === $footer_credits || is_customize_preview() ) {
		genesis_register_sidebar( [
			'id'          => 'footer-credits',
			'name'        => __( 'Footer Credits', 'genesis-customizer' ),
			'description' => __( 'This is the Footer Credits widget area.', 'genesis-customizer' ),
		] );
	}
}
