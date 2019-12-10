<?php
/*Site Logo*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-display-site-logo]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-display-site-logo'],
	'sanitize_callback' => 'event_star_sanitize_checkbox'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-display-site-logo]', array(
	'label'		=> esc_html__( 'Display Logo', 'event-star' ),
	'section'   => 'title_tagline',
	'settings'  => 'event_star_theme_options[event-star-display-site-logo]',
	'type'	  	=> 'checkbox'
) );

/*Site Title*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-display-site-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-display-site-title'],
	'sanitize_callback' => 'event_star_sanitize_checkbox'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-display-site-title]', array(
	'label'		=> esc_html__( 'Display Site Title', 'event-star' ),
	'section'   => 'title_tagline',
	'settings'  => 'event_star_theme_options[event-star-display-site-title]',
	'type'	  	=> 'checkbox'
) );

/*Site Tagline*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-display-site-tagline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-display-site-tagline'],
	'sanitize_callback' => 'event_star_sanitize_checkbox'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-display-site-tagline]', array(
	'label'		=> esc_html__( 'Display Site Tagline', 'event-star' ),
	'section'   => 'title_tagline',
	'settings'  => 'event_star_theme_options[event-star-display-site-tagline]',
	'type'	  	=> 'checkbox'
) );