<?php
/*check for event-star-menu-right-button-options*/
if ( !function_exists('event_star_menu_right_button_if_not_disable') ) :
	function event_star_menu_right_button_if_not_disable() {
		$event_star_customizer_all_values = event_star_get_theme_options();
		if( 'disable' != $event_star_customizer_all_values['event-star-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('event_star_menu_right_button_if_booking') ) :
	function event_star_menu_right_button_if_booking() {
		$event_star_customizer_all_values = event_star_get_theme_options();
		if( 'booking' == $event_star_customizer_all_values['event-star-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('event_star_menu_right_button_if_link') ) :
	function event_star_menu_right_button_if_link() {
		$event_star_customizer_all_values = event_star_get_theme_options();
		if( 'link' == $event_star_customizer_all_values['event-star-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

/*Menu Section*/
$wp_customize->add_section( 'event-star-menu-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Menu Options', 'event-star' ),
    'panel'          => 'event-star-header-panel'
) );

/*enable sticky*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-enable-sticky]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-enable-sticky'],
    'sanitize_callback' => 'event_star_sanitize_checkbox'
) );

$wp_customize->add_control( 'event_star_theme_options[event-star-enable-sticky]', array(
    'label'		=> esc_html__( 'Enable Sticky Menu', 'event-star' ),
    'section'   => 'event-star-menu-options',
    'settings'  => 'event_star_theme_options[event-star-enable-sticky]',
    'type'	  	=> 'checkbox'
) );

if( event_star_is_woocommerce_active() ){
	/*enable cart*/
	$wp_customize->add_setting( 'event_star_theme_options[event-star-enable-cart-icon]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['event-star-enable-cart-icon'],
		'sanitize_callback' => 'event_star_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'event_star_theme_options[event-star-enable-cart-icon]', array(
		'label'		=> esc_html__( 'Enable Cart', 'event-star' ),
		'section'   => 'event-star-menu-options',
		'settings'  => 'event_star_theme_options[event-star-enable-cart-icon]',
		'type'	  	=> 'checkbox'
	) );
}

/*Button Right Message*/
$wp_customize->add_setting('event_star_theme_options[event-star-menu-right-button-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Event_Star_Customize_Message_Control(
		$wp_customize,
		'event_star_theme_options[event-star-menu-right-button-message]',
		array(
			'section'       => 'event-star-menu-options',
			'description'   => "<hr /><h2>".esc_html__('Special Button On Menu Right','event-star')."</h2>",
			'settings'      => 'event_star_theme_options[event-star-menu-right-button-message]',
			'type'	  	    => 'message'
		)
	)
);

/*Button Link Options*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-menu-right-button-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-menu-right-button-options'],
	'sanitize_callback' => 'event_star_sanitize_select'
) );
$choices = event_star_menu_right_button_link_options();
$wp_customize->add_control( 'event_star_theme_options[event-star-menu-right-button-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Button Options', 'event-star' ),
	'section'       => 'event-star-menu-options',
	'settings'      => 'event_star_theme_options[event-star-menu-right-button-options]',
	'type'	  	    => 'select'
) );

/*Button title*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-menu-right-button-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-menu-right-button-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-menu-right-button-title]', array(
	'label'		        => esc_html__( 'Button Title', 'event-star' ),
	'section'           => 'event-star-menu-options',
	'settings'          => 'event_star_theme_options[event-star-menu-right-button-title]',
	'type'	  	        => 'text',
	'active_callback'   => 'event_star_menu_right_button_if_not_disable'
) );

/*Button Right booking Message*/
$wp_customize->add_setting('event_star_theme_options[event-star-menu-right-button-booking-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));
$description = sprintf( esc_html__( 'Add Popup Widget from %1$s here%2$s ', 'event-star' ), '<a class="at-customizer" data-section="sidebar-widgets-popup-widget-area" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new Event_Star_Customize_Message_Control(
		$wp_customize,
		'event_star_theme_options[event-star-menu-right-button-booking-message]',
		array(
			'section'           => 'event-star-menu-options',
			'description'       => $description,
			'settings'          => 'event_star_theme_options[event-star-menu-right-button-booking-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'event_star_menu_right_button_if_booking'
		)
	)
);

/*Button link*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-menu-right-button-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-menu-right-button-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-menu-right-button-link]', array(
	'label'		        => esc_html__( 'Button Link', 'event-star' ),
	'section'           => 'event-star-menu-options',
	'settings'          => 'event_star_theme_options[event-star-menu-right-button-link]',
	'type'	  	        => 'url',
	'active_callback'   => 'event_star_menu_right_button_if_link'
) );