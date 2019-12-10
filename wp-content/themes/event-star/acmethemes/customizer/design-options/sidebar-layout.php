<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'event-star-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Page/Post Sidebar Layout', 'event-star' ),
    'panel'          => 'event-star-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-single-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-single-sidebar-layout'],
    'sanitize_callback' => 'event_star_sanitize_select'
) );
$choices = event_star_sidebar_layout();
$wp_customize->add_control( 'event_star_theme_options[event-star-single-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Default Page/Post Sidebar Layout', 'event-star' ),
    'description'       => esc_html__( 'Single Page/Post Sidebar', 'event-star' ),
    'section'           => 'event-star-design-sidebar-layout-option',
    'settings'          => 'event_star_theme_options[event-star-single-sidebar-layout]',
    'type'	  	        => 'select'
) );