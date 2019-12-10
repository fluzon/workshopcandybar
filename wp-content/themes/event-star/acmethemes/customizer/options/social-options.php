<?php
/*adding sections for header social options */
$wp_customize->add_section( 'event-star-social-options', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Social Options', 'event-star' ),
    'panel'                 => 'event-star-options'
) );

/*repeater social data*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-social-data]', array(
	'sanitize_callback'     => 'event_star_sanitize_social_data',
	'default'               => $defaults['event-star-social-data']
) );
$wp_customize->add_control(
	new Event_Star_Repeater_Control(
		$wp_customize,
		'event_star_theme_options[event-star-social-data]',
		array(
			'label'                         => esc_html__('Social Options Selection','event-star'),
			'description'                   => esc_html__('Select Social Icons and enter link','event-star'),
			'section'                       => 'event-star-social-options',
			'settings'                      => 'event_star_theme_options[event-star-social-data]',
			'repeater_main_label'           => esc_html__('Social Icon','event-star'),
			'repeater_add_control_field'    => esc_html__('Add New Icon','event-star')
		),
		array(
			'icon' => array(
				'type'        => 'icons',
				'label'       => esc_html__( 'Select Icon', 'event-star' ),
			),
			'link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Enter Link', 'event-star' ),
			),
			'checkbox' => array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open in New Window', 'event-star' ),
			)
		)
	)
);