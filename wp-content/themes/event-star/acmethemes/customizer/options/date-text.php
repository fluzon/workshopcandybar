<?php
/*Booking Form*/
$wp_customize->add_section( 'event-star-date-countdown-text', array(
	'priority'          => 20,
	'capability'        => 'edit_theme_options',
	'title'             => esc_html__( 'Date Countdown Text', 'event-star' ),
	'panel'             => 'event-star-options'
) );

/*Days Text*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-days-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-days-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-days-text]', array(
	'label'		        => esc_html__( 'Days Text', 'event-star' ),
	'section'           => 'event-star-date-countdown-text',
	'settings'          => 'event_star_theme_options[event-star-days-text]',
	'type'	  	        => 'text'
) );

/*Hours Text*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-hours-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-hours-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-hours-text]', array(
	'label'		        => esc_html__( 'Hours Text', 'event-star' ),
	'section'           => 'event-star-date-countdown-text',
	'settings'          => 'event_star_theme_options[event-star-hours-text]',
	'type'	  	        => 'text'
) );

/*Mins Text*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-min-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-min-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-min-text]', array(
	'label'		        => esc_html__( 'Mins Text', 'event-star' ),
	'section'           => 'event-star-date-countdown-text',
	'settings'          => 'event_star_theme_options[event-star-min-text]',
	'type'	  	        => 'text'
) );

/*Second Text*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-second-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-second-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-second-text]', array(
	'label'		        => esc_html__( 'Second Text', 'event-star' ),
	'section'           => 'event-star-date-countdown-text',
	'settings'          => 'event_star_theme_options[event-star-second-text]',
	'type'	  	        => 'text'
) );

/*Expire Text*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-event-expire-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-event-expire-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-event-expire-text]', array(
	'label'		        => esc_html__( 'Event Expired Text', 'event-star' ),
	'section'           => 'event-star-date-countdown-text',
	'settings'          => 'event_star_theme_options[event-star-event-expire-text]',
	'type'	  	        => 'text'
) );