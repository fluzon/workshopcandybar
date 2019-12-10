<?php
/*adding sections for header title*/
$wp_customize->add_section( 'event-star-single-header-title', array(
	'priority'              => 20,
	'capability'            => 'edit_theme_options',
	'title'                 => esc_html__( 'Single Header Title', 'event-star' ),
	'panel'                 => 'event-star-single-post',
) );

/*header title*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-single-header-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-single-header-title'],
	'sanitize_callback'     => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-single-header-title]', array(
	'label'		            => esc_html__( 'Header Title', 'event-star' ),
	'section'               => 'event-star-single-header-title',
	'settings'              => 'event_star_theme_options[event-star-single-header-title]',
	'type'	  	            => 'text'
) );