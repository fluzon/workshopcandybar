<?php
/*active callback function for front-page-header*/
if ( !function_exists('event_star_active_callback_front_page_header') ) :
    function event_star_active_callback_front_page_header() {
        $event_star_customizer_all_values = event_star_get_theme_options();
        if( 1 != $event_star_customizer_all_values['event-star-hide-front-page-content'] ){
            return true;
        }
        return false;
    }
endif;

/*adding sections for front page content */
$wp_customize->add_section( 'event-star-front-page-content', array(
    'priority'          => 10,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Front Page Content Options', 'event-star' ),
    'panel'             => 'event-star-design-panel'

) );

/*hide front page content*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-hide-front-page-content]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-hide-front-page-content'],
    'sanitize_callback' => 'event_star_sanitize_checkbox',
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-hide-front-page-content]', array(
    'label'		        => esc_html__( 'Hide Front Page Content', 'event-star' ),
    'description'       => esc_html__( 'You may want to hide front page content and want to show only Feature section and Home Widgets. Check this to hide front page content.', 'event-star' ),
    'section'           => 'event-star-front-page-content',
    'settings'          => 'event_star_theme_options[event-star-hide-front-page-content]',
    'type'	  	        => 'checkbox'
) );

/*hide front page header*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-hide-front-page-header]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-hide-front-page-header'],
    'sanitize_callback' => 'event_star_sanitize_checkbox',
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-hide-front-page-header]', array(
    'label'		        => esc_html__( 'Hide Front Page Header', 'event-star' ),
    'description'       => esc_html__( 'You may want to hide front page header and want to show only Feature section and Home Widgets. Check this to hide front page Header.', 'event-star' ),
    'section'           => 'event-star-front-page-content',
    'settings'          => 'event_star_theme_options[event-star-hide-front-page-header]',
    'type'	  	        => 'checkbox',
    'active_callback'   => 'event_star_active_callback_front_page_header'
) );