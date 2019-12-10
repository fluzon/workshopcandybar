<?php
/*active callback function for excerpt*/
if ( !function_exists('event_star_active_callback_content_from_excerpt') ) :
	function event_star_active_callback_content_from_excerpt() {
		$event_star_customizer_all_values = event_star_get_theme_options();
		if( 'excerpt' == $event_star_customizer_all_values['event-star-blog-archive-content-from'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for blog layout options*/
$wp_customize->add_section( 'event-star-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Blog/Archive Layout', 'event-star' ),
    'panel'          => 'event-star-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-blog-archive-img-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-blog-archive-img-size'],
    'sanitize_callback' => 'event_star_sanitize_select'
) );
$choices = event_star_get_image_sizes_options(1);
$wp_customize->add_control( 'event_star_theme_options[event-star-blog-archive-img-size]', array(
    'choices'  	    => $choices,
    'label'		    => esc_html__( 'Blog/Archive Feature Image Size', 'event-star' ),
    'section'       => 'event-star-design-blog-layout-option',
    'settings'      => 'event_star_theme_options[event-star-blog-archive-img-size]',
    'type'	  	    => 'select'
) );

/*blog content from*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-blog-archive-content-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-blog-archive-content-from'],
	'sanitize_callback' => 'event_star_sanitize_select'
) );
$choices = event_star_blog_archive_content_from();
$wp_customize->add_control( 'event_star_theme_options[event-star-blog-archive-content-from]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Blog/Archive Content From', 'event-star' ),
	'section'       => 'event-star-design-blog-layout-option',
	'settings'      => 'event_star_theme_options[event-star-blog-archive-content-from]',
	'type'	  	    => 'select'
) );

/*Excerpt Length*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-blog-archive-excerpt-length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['event-star-blog-archive-excerpt-length'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-blog-archive-excerpt-length]', array(
	'label'		        => esc_html__( 'Except Length', 'event-star' ),
	'section'           => 'event-star-design-blog-layout-option',
	'settings'          => 'event_star_theme_options[event-star-blog-archive-excerpt-length]',
	'type'	  	        => 'number',
	'active_callback'   => 'event_star_active_callback_content_from_excerpt'
) );

/*Read More Text*/
$wp_customize->add_setting( 'event_star_theme_options[event-star-blog-archive-more-text]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['event-star-blog-archive-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'event_star_theme_options[event-star-blog-archive-more-text]', array(
    'label'		=> esc_html__( 'Read More Text', 'event-star' ),
    'section'   => 'event-star-design-blog-layout-option',
    'settings'  => 'event_star_theme_options[event-star-blog-archive-more-text]',
    'type'	  	=> 'text'
) );