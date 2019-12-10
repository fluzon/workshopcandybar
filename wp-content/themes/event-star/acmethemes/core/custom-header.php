<?php
/**
 * Set up the WordPress core custom header feature.
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Acme Themes
 * @subpackage Event Star
 * @return void
 */
function event_star_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'event_star_custom_header_args', array(
		'default-image'      => get_template_directory_uri() . '/assets/img/audience.jpg',
		'width'              => 1920,
		'height'             => 1280,
		'flex-height'        => true,
		'flex-width'         => true,
		'header-text'        => false
	) ) );
	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/img/audience.jpg',
			'thumbnail_url' => '%s/assets/img/audience.jpg',
			'description'   => esc_html__( 'Default Header Image', 'event-star' ),
		),
	) );
}
add_action( 'after_setup_theme', 'event_star_custom_header_setup' );