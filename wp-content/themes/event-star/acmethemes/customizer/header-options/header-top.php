<?php
/*check if enable header top*/
if ( !function_exists('event_star_is_enable_header_top') ) :
	function event_star_is_enable_header_top() {
		$event_star_customizer_all_values = event_star_get_theme_options();
		if( 1 == $event_star_customizer_all_values['event-star-enable-header-top'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for header options*/
$wp_customize->add_section( 'event-star-header-top-option', array(
    'priority'                  => 10,
    'capability'                => 'edit_theme_options',
    'title'                     => esc_html__( 'Header Top', 'event-star' ),
    'panel'                     => 'event-star-header-panel',
) );

/*header top enable*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-enable-header-top]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['event-star-enable-header-top'],
    'sanitize_callback'         => 'event_star_sanitize_checkbox',
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-enable-header-top]', array(
    'label'		                => esc_html__( 'Enable Header Top Options', 'event-star' ),
    'section'                   => 'event-star-header-top-option',
    'settings'                  => 'event_star_theme_options[event-star-enable-header-top]',
    'type'	  	                => 'checkbox'
) );

/*header top message*/
$wp_customize->add_setting('event_star_theme_options[event-star-header-top-message]', array(
	'capability'		        => 'edit_theme_options',
	'sanitize_callback'         => 'wp_kses_post'
));

$wp_customize->add_control(
	new Event_Star_Customize_Message_Control(
		$wp_customize,
		'event_star_theme_options[event-star-header-top-message]',
		array(
			'section'           => 'event-star-header-top-option',
			'description'       => "<hr /><h2>".esc_html__('Display Different Element on Top Right or Left','event-star')."</h2>",
			'settings'          => 'event_star_theme_options[event-star-header-top-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'event_star_is_enable_header_top'
		)
	)
);

/*Top Menu Display*/
$choices = event_star_header_top_display_selection();
$wp_customize->add_setting( 'event_star_theme_options[event-star-header-top-menu-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['event-star-header-top-menu-display-selection'],
	'sanitize_callback'         => 'event_star_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Menu Items from %1$s here%2$s and select Menu Location : Top Menu ( Support First Level Only ) ', 'event-star' ), '<a class="at-customizer button button-primary" data-panel="nav_menus" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'event_star_theme_options[event-star-header-top-menu-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Top Menu Display', 'event-star' ),
	'description'		        => $description,
	'section'                   => 'event-star-header-top-option',
	'settings'                  => 'event_star_theme_options[event-star-header-top-menu-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'event_star_is_enable_header_top'
) );

/*News/Notice display*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-header-top-news-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['event-star-header-top-news-display-selection'],
	'sanitize_callback'         => 'event_star_sanitize_select'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-header-top-news-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'News/Notice Display', 'event-star' ),
	'section'                   => 'event-star-header-top-option',
	'settings'                  => 'event_star_theme_options[event-star-header-top-news-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'event_star_is_enable_header_top'
) );

/*Social Display*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-header-top-social-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['event-star-header-top-social-display-selection'],
	'sanitize_callback'         => 'event_star_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Social Items from %1$s here%2$s ', 'event-star' ), '<a class="at-customizer button button-primary" data-section="event-star-social-options" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'event_star_theme_options[event-star-header-top-social-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Social Display', 'event-star' ),
	'description'               => $description,
	'section'                   => 'event-star-header-top-option',
	'settings'                  => 'event_star_theme_options[event-star-header-top-social-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'event_star_is_enable_header_top'
) );

/*header top message*/
$wp_customize->add_setting('event_star_theme_options[event-star-header-top-newsnotice-message]', array(
	'capability'		        => 'edit_theme_options',
	'sanitize_callback'         => 'wp_kses_post'
));

$wp_customize->add_control(
	new Event_Star_Customize_Message_Control(
		$wp_customize,
		'event_star_theme_options[event-star-header-top-newsnotice-message]',
		array(
			'section'           => 'event-star-header-top-option',
			'description'       => "<hr />",
			'settings'          => 'event_star_theme_options[event-star-header-top-newsnotice-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'event_star_is_enable_header_top'
		)
	)
);

/*News title*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-newsnotice-title]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['event-star-newsnotice-title'],
    'sanitize_callback'         => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-newsnotice-title]', array(
    'label'		                => esc_html__( 'News/Notice/Announcement Title', 'event-star' ),
    'section'                   => 'event-star-header-top-option',
    'settings'                  => 'event_star_theme_options[event-star-newsnotice-title]',
    'type'	  	                => 'text',
    'active_callback'           => 'event_star_is_enable_header_top'
) );

/* News cat selection */
$wp_customize->add_setting( 'event_star_theme_options[event-star-newsnotice-cat]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['event-star-newsnotice-cat'],
    'sanitize_callback'         => 'event_star_sanitize_number'
) );

$wp_customize->add_control(
    new Event_Star_Customize_Category_Dropdown_Control(
        $wp_customize,
        'event_star_theme_options[event-star-newsnotice-cat]',
        array(
            'label'		        => esc_html__( 'Select Category News/Notice/Announcement', 'event-star' ),
            'section'           => 'event-star-header-top-option',
            'settings'          => 'event_star_theme_options[event-star-newsnotice-cat]',
            'type'	  	        => 'category_dropdown',
            'active_callback'   => 'event_star_is_enable_header_top'
        )
    )
);