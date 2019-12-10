<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'event-star-feature-panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Featured Section Options', 'event-star' ),
    'description'    => esc_html__( 'Customize your awesome site feature section ', 'event-star' )
) );

/*
* file for feature section enable
*/
require event_star_file_directory('acmethemes/customizer/feature-section/feature-enable.php');

/*
* file for feature slider category
*/
require event_star_file_directory('acmethemes/customizer/feature-section/feature-slider.php');

/*
* file for feature info
*/
require event_star_file_directory('acmethemes/customizer/feature-section/feature-info.php');