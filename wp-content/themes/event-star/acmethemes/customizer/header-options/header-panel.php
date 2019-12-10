<?php
/*adding header options panel*/
$wp_customize->add_panel( 'event-star-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Header Options', 'event-star' ),
    'description'    => esc_html__( 'Customize your awesome site header ', 'event-star' )
) );

/*
* file for header top options
*/
require event_star_file_directory('acmethemes/customizer/header-options/header-top.php');

/*
* file for header logo options
*/
require event_star_file_directory('acmethemes/customizer/header-options/header-logo.php');

/*
 * file for menu options
*/
require event_star_file_directory('acmethemes/customizer/header-options/menu-options.php');

/*
* file for booking form
*/
require event_star_file_directory('acmethemes/customizer/header-options/popup-widgets.php');

/*adding header image inside this panel*/
$wp_customize->get_section( 'header_image' )->panel = 'event-star-header-panel';
$wp_customize->get_section( 'header_image' )->description = esc_html__( 'Applied to header image of inner pages.', 'event-star' );

/* feature section height*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-header-height]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-header-height'],
    'sanitize_callback' => 'event_star_sanitize_number'
) );

$wp_customize->add_control( 'event_star_theme_options[event-star-header-height]', array(
    'type'              => 'range',
    'priority'          => 1,
    'section'           => 'header_image',
    'label'		        => esc_html__( 'Inner Page Header Section Height', 'event-star' ),
    'description'       => esc_html__( 'Control the height of Header section. The minimum height is 100px and maximium height is 500px', 'event-star' ),
    'input_attrs'       => array(
        'min'           => 100,
        'max'           => 500,
        'step'          => 1,
        'class'         => 'event-star-header-height',
        'style'         => 'color: #0a0',
    )
) );