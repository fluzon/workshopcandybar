<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'event-star-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Enable Feature Section', 'event-star' ),
    'panel'          => 'event-star-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-enable-feature'],
    'sanitize_callback' => 'event_star_sanitize_checkbox'
) );

$wp_customize->add_control( 'event_star_theme_options[event-star-enable-feature]', array(
    'label'		        => esc_html__( 'Enable Feature Section', 'event-star' ),
    'description'	    => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Slider and Feature Column.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to enable it', 'event-star' ), '<br />','<b><a class="at-customizer" data-section="static_front_page"> ','</a></b>' ),
    'section'           => 'event-star-enable-feature',
    'settings'          => 'event_star_theme_options[event-star-enable-feature]',
    'type'	  	        => 'checkbox'
) );