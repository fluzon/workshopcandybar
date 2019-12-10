<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'event-star-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Front/Home Sidebar Layout', 'event-star' ),
    'panel'          => 'event-star-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-front-page-sidebar-layout'],
    'sanitize_callback' => 'event_star_sanitize_select'
) );
$choices = event_star_sidebar_layout();
$wp_customize->add_control( 'event_star_theme_options[event-star-front-page-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Front/Home Sidebar Layout', 'event-star' ),
    'section'           => 'event-star-front-page-sidebar-layout',
    'settings'          => 'event_star_theme_options[event-star-front-page-sidebar-layout]',
    'type'	  	        => 'select'
) );