<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'event-star-feature-page', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Slider Selection', 'event-star' ),
    'panel'          => 'event-star-feature-panel'
) );

/* feature parent all-slides selection */
$slider_pages = array();
$slider_pages_obj = get_pages();
$slider_pages[''] = esc_html__('Select Slider Page','event-star');
foreach ($slider_pages_obj as $page) {
	$slider_pages[$page->ID] = $page->post_title;
}
$wp_customize->add_setting( 'event_star_theme_options[event-star-slides-data]', array(
	'sanitize_callback' => 'event_star_sanitize_slider_data',
	'default'           => $defaults['event-star-slides-data']
) );
$wp_customize->add_control(
	new Event_Star_Repeater_Control(
		$wp_customize,
		'event_star_theme_options[event-star-slides-data]',
		array(
			'label'                         => esc_html__('Slider Selection','event-star'),
			'description'                   => esc_html__('Select Page For Slider','event-star'),
			'section'                       => 'event-star-feature-page',
			'settings'                      => 'event_star_theme_options[event-star-slides-data]',
			'repeater_main_label'           => esc_html__('Select Slide of Slider','event-star'),
			'repeater_add_control_field'    => esc_html__('Add New Slide','event-star')
		),
		array(
			'selectpage' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Select Page For Slide', 'event-star' ),
				'options'     => $slider_pages
			),
			'event_date' => array(
				'type'        => 'date',
				'label'       => esc_html__( 'Event Date', 'event-star' ),
			),
			'button_1_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button One Text', 'event-star' ),
			),
			'button_1_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button One Link', 'event-star' ),
			),
			'button_2_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button Two Text', 'event-star' ),
			),
			'button_2_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button Two Link', 'event-star' ),
			)
		)
	)
);

/*enable animation*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-feature-slider-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-feature-slider-enable-animation'],
    'sanitize_callback' => 'event_star_sanitize_checkbox'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-feature-slider-enable-animation]', array(
    'label'		        => esc_html__( 'Enable Animation', 'event-star' ),
    'section'           => 'event-star-feature-page',
    'settings'          => 'event_star_theme_options[event-star-feature-slider-enable-animation]',
    'type'	  	        => 'checkbox'
) );

/*display-title*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-feature-slider-display-title]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-feature-slider-display-title'],
    'sanitize_callback' => 'event_star_sanitize_checkbox'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-feature-slider-display-title]', array(
    'label'		            => esc_html__( 'Display Title', 'event-star' ),
    'section'               => 'event-star-feature-page',
    'settings'              => 'event_star_theme_options[event-star-feature-slider-display-title]',
    'type'	  	            => 'checkbox'
) );

/*display-excerpt*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-feature-slider-display-excerpt]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-feature-slider-display-excerpt'],
	'sanitize_callback'     => 'event_star_sanitize_checkbox'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-feature-slider-display-excerpt]', array(
	'label'		            => esc_html__( 'Display Excerpt', 'event-star' ),
	'section'               => 'event-star-feature-page',
	'settings'              => 'event_star_theme_options[event-star-feature-slider-display-excerpt]',
	'type'	  	            => 'checkbox'
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-fs-image-display-options]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['event-star-fs-image-display-options'],
    'sanitize_callback'     => 'event_star_sanitize_select'
) );
$choices = event_star_fs_image_display_options();
$wp_customize->add_control( 'event_star_theme_options[event-star-fs-image-display-options]', array(
    'choices'  	            => $choices,
    'label'		            => esc_html__( 'Feature Slider Image Display Options', 'event-star' ),
    'section'               => 'event-star-feature-page',
    'settings'              => 'event_star_theme_options[event-star-fs-image-display-options]',
    'type'	  	            => 'radio'
) );

/*Slider Selection Text Align*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-feature-slider-text-align]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-feature-slider-text-align'],
	'sanitize_callback'     => 'event_star_sanitize_select',
) );
$choices = event_star_slider_text_align();
$wp_customize->add_control( 'event_star_theme_options[event-star-feature-slider-text-align]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Slider Text Align', 'event-star' ),
	'section'               => 'event-star-feature-page',
	'settings'              => 'event_star_theme_options[event-star-feature-slider-text-align]',
	'type'	  	            => 'select'
) );