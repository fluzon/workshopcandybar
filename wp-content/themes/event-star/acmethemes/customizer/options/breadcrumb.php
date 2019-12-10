<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'event-star-breadcrumb-options', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Breadcrumb Options', 'event-star' ),
    'panel'             => 'event-star-options'
) );

/*show breadcrumb*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-show-breadcrumb]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-show-breadcrumb'],
    'sanitize_callback' => 'event_star_sanitize_checkbox'
) );

$wp_customize->add_control( 'event_star_theme_options[event-star-show-breadcrumb]', array(
    'label'		        => esc_html__( 'Enable Breadcrumb', 'event-star' ),
    'section'           => 'event-star-breadcrumb-options',
    'settings'          => 'event_star_theme_options[event-star-show-breadcrumb]',
    'type'	  	        => 'checkbox'
) );