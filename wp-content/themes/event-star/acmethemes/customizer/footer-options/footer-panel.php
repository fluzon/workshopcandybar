<?php
/*adding footer options panel*/
$wp_customize->add_panel( 'event-star-footer-panel', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Footer Options', 'event-star' ),
    'description'    => esc_html__( 'Customize your awesome site footer ', 'event-star' )
) );

/*
* file for footer logo options
*/
require event_star_file_directory('acmethemes/customizer/footer-options/footer-copyright.php');