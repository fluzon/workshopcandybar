<?php
/*adding sections for feature image selection*/
$wp_customize->add_section( 'event-star-single-feature-image', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Image Option', 'event-star' ),
    'panel'          => 'event-star-single-post'
) );

/*single image size*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-single-img-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-single-img-size'],
	'sanitize_callback' => 'event_star_sanitize_select'
) );
$choices = event_star_get_image_sizes_options(1);
$wp_customize->add_control( 'event_star_theme_options[event-star-single-img-size]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Image Size', 'event-star' ),
	'section'   => 'event-star-single-feature-image',
	'settings'  => 'event_star_theme_options[event-star-single-img-size]',
	'type'	  	=> 'select'
) );