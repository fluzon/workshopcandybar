<?php
/*customizing default colors section and adding new controls-setting too*/
$wp_customize->get_section( 'colors' )->panel = 'event-star-design-panel';
$wp_customize->get_section( 'background_image' )->priority = 40;

/*Primary color*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'event_star_theme_options[event-star-primary-color]',
        array(
            'label'		=> esc_html__( 'Primary Color', 'event-star' ),
            'section'   => 'colors',
            'settings'  => 'event_star_theme_options[event-star-primary-color]',
            'type'	  	=> 'color'
        ) )
);

/*Header TOP color*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-header-top-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-header-top-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'event_star_theme_options[event-star-header-top-bg-color]',
        array(
            'label'		=> esc_html__( 'Header Top Background Color', 'event-star' ),
            'description'=> esc_html__( 'Also used as secondary color', 'event-star' ),
            'section'   => 'colors',
            'settings'  => 'event_star_theme_options[event-star-header-top-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/* Footer Background Color*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-footer-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-footer-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'event_star_theme_options[event-star-footer-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Background Color', 'event-star' ),
            'section'   => 'colors',
            'settings'  => 'event_star_theme_options[event-star-footer-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/*Footer Bottom Background Color*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-footer-bottom-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-footer-bottom-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'event_star_theme_options[event-star-footer-bottom-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Bottom Background Color', 'event-star' ),
            'section'   => 'colors',
            'settings'  => 'event_star_theme_options[event-star-footer-bottom-bg-color]',
            'type'	  	=> 'color'
        )
    )
);