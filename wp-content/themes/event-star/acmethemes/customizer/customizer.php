<?php
/**
 * Event Star Theme Customizer.
 *
 * @package Acme Themes
 * @subpackage Event Star
 */


/*
* file for upgrade to pro
*/
require event_star_file_directory('acmethemes/customizer/customizer-pro/class-customize.php');

/*
* file for customizer core functions
*/
require event_star_file_directory('acmethemes/customizer/customizer-core.php');

/*
* file for customizer sanitization functions
*/
require event_star_file_directory('acmethemes/customizer/sanitize-functions.php');

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function event_star_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = event_star_get_theme_options();

    /*defaults options*/
    $defaults = event_star_get_default_theme_options();

    /*custom controls*/
    require event_star_file_directory('acmethemes/customizer/custom-controls.php');
	require event_star_file_directory('acmethemes/customizer/customizer-repeater/customizer-control-repeater.php');

    /*
     * file for feature panel of home page
     */
    require event_star_file_directory('acmethemes/customizer/feature-section/feature-panel.php');

    /*
    * file for header panel
    */
    require event_star_file_directory('acmethemes/customizer/header-options/header-panel.php');

    /*
    * file for customizer footer section
    */
    require event_star_file_directory('acmethemes/customizer/footer-options/footer-panel.php');

    /*
    * file for design/layout panel
    */
    require event_star_file_directory('acmethemes/customizer/design-options/design-panel.php');

	/*
   * file for single panel
   */
	require event_star_file_directory('acmethemes/customizer/single-posts/single-post-panel.php');

    /*
     * file for options panel
     */
    require event_star_file_directory('acmethemes/customizer/options/options-panel.php');

    /*sorting core and widget for ease of theme use*/
    $wp_customize->get_section( 'static_front_page' )->priority = 10;
    
    $event_star_home_section = $wp_customize->get_section( 'sidebar-widgets-event-star-home' );
    if ( ! empty( $event_star_home_section ) ) {
        $event_star_home_section->panel         = '';
        $event_star_home_section->title         = esc_html__( 'Home Main Content Area ', 'event-star' );
        $event_star_home_section->priority      = 80;
    }
}
add_action( 'customize_register', 'event_star_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function event_star_customize_preview_js() {
    wp_enqueue_script( 'event-star-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'event_star_customize_preview_js' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function event_star_customize_controls_scripts() {
    wp_enqueue_script( 'event-star-customizer-controls', get_template_directory_uri() . '/acmethemes/core/js/customizer-controls.js', array( 'customize-preview' ), '1.0.0', true );
	event_star_date_time_picker();
}
add_action( 'customize_controls_enqueue_scripts', 'event_star_customize_controls_scripts' );