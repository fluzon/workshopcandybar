<?php
/*adding sections for design options panel*/
$wp_customize->add_section( 'event-star-animation', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Animation', 'event-star' ),
    'panel'          => 'event-star-design-panel'
) );

/*enable disable animation*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-enable-animation'],
    'sanitize_callback' => 'event_star_sanitize_checkbox'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-enable-animation]', array(
    'label'		        => esc_html__( 'Disable animation', 'event-star' ),
    'description'       => esc_html__( 'Check this to disable overall site animation effect provided by theme', 'event-star' ),
    'section'           => 'event-star-animation',
    'settings'          => 'event_star_theme_options[event-star-enable-animation]',
    'type'	  	        => 'checkbox'
) );