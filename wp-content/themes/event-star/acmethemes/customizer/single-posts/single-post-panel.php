<?php
/*ading theme options panel*/
$wp_customize->add_panel( 'event-star-single-post', array(
	'priority'       => 85,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Post Option', 'event-star' )
) );


/*
* file for entry meta
*/
require_once event_star_file_directory('acmethemes/customizer/single-posts/header-title.php');

/*
* file for feature-image
*/
require_once event_star_file_directory('acmethemes/customizer/single-posts/feature-image.php');