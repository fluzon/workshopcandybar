<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'event-star-search', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Search', 'event-star' ),
    'panel'             => 'event-star-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-search-placeholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-search-placeholder]', array(
    'label'		        => esc_html__( 'Search Placeholder', 'event-star' ),
    'section'           => 'event-star-search',
    'settings'          => 'event_star_theme_options[event-star-search-placeholder]',
    'type'	  	        => 'text'
) );