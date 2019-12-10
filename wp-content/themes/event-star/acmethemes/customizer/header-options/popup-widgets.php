<?php
/*Title*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-popup-widget-title]', array(
	'label'		        => esc_html__( 'Main Title', 'event-star' ),
	'section'           => 'event-star-menu-options',
	'settings'          => 'event_star_theme_options[event-star-popup-widget-title]',
	'type'	  	        => 'text',
	'priority'	  	    => 1,
) );
$event_star_popup_widget_area = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
if ( ! empty( $event_star_popup_widget_area ) ) {
	$event_star_popup_widget_area->panel = 'event-star-header-panel';
	$event_star_popup_widget_area->title = esc_html__( 'Popup Widgets', 'event-star' );
	$event_star_popup_widget_area->priority = 999;

	$event_star_popup_widget_title = $wp_customize->get_control( 'event_star_theme_options[event-star-popup-widget-title]' );
	if ( ! empty( $event_star_popup_widget_title ) ) {
		$event_star_popup_widget_title->section  = 'sidebar-widgets-popup-widget-area';
		$event_star_popup_widget_title->priority = -1;
	}
}