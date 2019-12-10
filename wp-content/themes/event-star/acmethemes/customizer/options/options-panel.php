<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'event-star-options', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Theme Options', 'event-star' ),
    'description'    => esc_html__( 'Customize your awesome site with theme options ', 'event-star' )
) );

/*
* file for header breadcrumb options
*/
require event_star_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require event_star_file_directory('acmethemes/customizer/options/search.php');

/*
* file for social options
*/
require event_star_file_directory('acmethemes/customizer/options/social-options.php');

/*
* file for date text
*/
require event_star_file_directory('acmethemes/customizer/options/date-text.php');