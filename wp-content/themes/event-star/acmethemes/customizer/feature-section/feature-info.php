<?php
/*adding sections for feature info options */
$wp_customize->add_section( 'event-star-feature-info', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Info', 'event-star' ),
	'panel'          => 'event-star-feature-panel'
) );

/* basic info display options*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-feature-info-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-feature-info-display-options'],
	'sanitize_callback' => 'event_star_sanitize_select'
) );
$choices = event_star_feature_info_display_options();
$wp_customize->add_control( 'event_star_theme_options[event-star-feature-info-display-options]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Basic Info Display Options', 'event-star' ),
	'section'           => 'event-star-feature-info',
	'settings'          => 'event_star_theme_options[event-star-feature-info-display-options]',
	'type'	  	        => 'select',
) );

/* basic info number*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-feature-info-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-feature-info-number'],
	'sanitize_callback' => 'event_star_sanitize_select'
) );
$choices = event_star_feature_info_number();
$wp_customize->add_control( 'event_star_theme_options[event-star-feature-info-number]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Basic Info Number Display', 'event-star' ),
	'section'           => 'event-star-feature-info',
	'settings'          => 'event_star_theme_options[event-star-feature-info-number]',
	'type'	  	        => 'select',
) );

/*first info*/
$wp_customize->add_setting('event_star_theme_options[event-star-first-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Event_Star_Customize_Message_Control(
		$wp_customize,
		'event_star_theme_options[event-star-first-info-message]',
		array(
			'section'      => 'event-star-feature-info',
			'description'  => "<hr /><h2>".esc_html__('First Info','event-star')."</h2>",
			'settings'     => 'event_star_theme_options[event-star-first-info-message]',
			'type'	  	   => 'message',
		)
	)
);
$wp_customize->add_setting( 'event_star_theme_options[event-star-first-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-first-info-icon'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );

$wp_customize->add_control(
	new Event_Star_Customize_Icons_Control(
		$wp_customize,
		'event_star_theme_options[event-star-first-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'event-star' ),
			'section'       => 'event-star-feature-info',
			'settings'      => 'event_star_theme_options[event-star-first-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'event_star_theme_options[event-star-first-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-first-info-title'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-first-info-title]', array(
	'label'		            => esc_html__( 'Title', 'event-star' ),
	'section'               => 'event-star-feature-info',
	'settings'              => 'event_star_theme_options[event-star-first-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'event_star_theme_options[event-star-first-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-first-info-desc'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-first-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'event-star' ),
	'section'               => 'event-star-feature-info',
	'settings'              => 'event_star_theme_options[event-star-first-info-desc]',
	'type'	  	            => 'text'
) );

/*Second Info*/
$wp_customize->add_setting('event_star_theme_options[event-star-second-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Event_Star_Customize_Message_Control(
		$wp_customize,
		'event_star_theme_options[event-star-second-info-message]',
		array(
			'section'       => 'event-star-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Second Info','event-star')."</h2>",
			'settings'      => 'event_star_theme_options[event-star-second-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'event_star_theme_options[event-star-second-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-second-info-icon'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Event_Star_Customize_Icons_Control(
		$wp_customize,
		'event_star_theme_options[event-star-second-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'event-star' ),
			'section'       => 'event-star-feature-info',
			'settings'      => 'event_star_theme_options[event-star-second-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'event_star_theme_options[event-star-second-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-second-info-title'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-second-info-title]', array(
	'label'		            => esc_html__( 'Title', 'event-star' ),
	'section'               => 'event-star-feature-info',
	'settings'              => 'event_star_theme_options[event-star-second-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'event_star_theme_options[event-star-second-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-second-info-desc'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-second-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'event-star' ),
	'section'               => 'event-star-feature-info',
	'settings'              => 'event_star_theme_options[event-star-second-info-desc]',
	'type'	  	            => 'text'
) );

/*third info*/
$wp_customize->add_setting('event_star_theme_options[event-star-third-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Event_Star_Customize_Message_Control(
		$wp_customize,
		'event_star_theme_options[event-star-third-info-message]',
		array(
			'section'       => 'event-star-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Third Info','event-star')."</h2>",
			'settings'      => 'event_star_theme_options[event-star-third-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'event_star_theme_options[event-star-third-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-third-info-icon'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Event_Star_Customize_Icons_Control(
		$wp_customize,
		'event_star_theme_options[event-star-third-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'event-star' ),
			'section'       => 'event-star-feature-info',
			'settings'      => 'event_star_theme_options[event-star-third-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'event_star_theme_options[event-star-third-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-third-info-title'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-third-info-title]', array(
	'label'		            => esc_html__( 'Title', 'event-star' ),
	'section'               => 'event-star-feature-info',
	'settings'              => 'event_star_theme_options[event-star-third-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'event_star_theme_options[event-star-third-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-third-info-desc'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-third-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'event-star' ),
	'section'               => 'event-star-feature-info',
	'settings'              => 'event_star_theme_options[event-star-third-info-desc]',
	'type'	  	            => 'text'
) );

/*forth info*/
$wp_customize->add_setting('event_star_theme_options[event-star-forth-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Event_Star_Customize_Message_Control(
		$wp_customize,
		'event_star_theme_options[event-star-forth-info-message]',
		array(
			'section'       => 'event-star-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Forth Info','event-star')."</h2>",
			'settings'      => 'event_star_theme_options[event-star-forth-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'event_star_theme_options[event-star-forth-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-forth-info-icon'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Event_Star_Customize_Icons_Control(
		$wp_customize,
		'event_star_theme_options[event-star-forth-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'event-star' ),
			'section'       => 'event-star-feature-info',
			'settings'      => 'event_star_theme_options[event-star-forth-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'event_star_theme_options[event-star-forth-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-forth-info-title'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-forth-info-title]', array(
	'label'		            => esc_html__( 'Title', 'event-star' ),
	'section'               => 'event-star-feature-info',
	'settings'              => 'event_star_theme_options[event-star-forth-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'event_star_theme_options[event-star-forth-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-forth-info-desc'],
	'sanitize_callback'     => 'event_star_sanitize_allowed_html'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-forth-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'event-star' ),
	'section'               => 'event-star-feature-info',
	'settings'              => 'event_star_theme_options[event-star-forth-info-desc]',
	'type'	  	            => 'text'
) );