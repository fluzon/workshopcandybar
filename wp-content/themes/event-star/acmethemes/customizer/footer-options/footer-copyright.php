<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'event-star-footer-copyright-option', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Bottom Copyright Section', 'event-star' ),
    'panel'                 => 'event-star-footer-panel',
) );

/*copyright*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-footer-copyright]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['event-star-footer-copyright'],
    'sanitize_callback'     => 'wp_kses_post'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-footer-copyright]', array(
    'label'		            => esc_html__( 'Copyright Text', 'event-star' ),
    'section'               => 'event-star-footer-copyright-option',
    'settings'              => 'event_star_theme_options[event-star-footer-copyright]',
    'type'	  	            => 'text'
) );

/*footer copyright beside*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-footer-copyright-beside-option]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['event-star-footer-copyright-beside-option'],
	'sanitize_callback'     => 'event_star_sanitize_select'
) );
$choices = event_star_footer_copyright_beside_option();
$wp_customize->add_control( 'event_star_theme_options[event-star-footer-copyright-beside-option]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Footer Copyright Beside Option', 'event-star' ),
	'section'               => 'event-star-footer-copyright-option',
	'settings'              => 'event_star_theme_options[event-star-footer-copyright-beside-option]',
	'type'	  	            => 'select'
) );