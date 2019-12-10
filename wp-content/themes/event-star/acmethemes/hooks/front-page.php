<?php
/**
 * Front page hook for all WordPress Conditions
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_featured_slider' ) ) :

    function event_star_featured_slider() {
        global $event_star_customizer_all_values;

        $event_star_enable_feature = $event_star_customizer_all_values['event-star-enable-feature'];
        if( is_front_page() && 1 == $event_star_enable_feature && !is_home() ) :
	        $event_star_feature_info_display_options = $event_star_customizer_all_values['event-star-feature-info-display-options'];
            if( 'above' == $event_star_feature_info_display_options ){
	            do_action( 'event_star_action_feature_info' );
            }
	        do_action( 'event_star_action_feature_slider' );
	        if( 'below' == $event_star_feature_info_display_options ){
		        do_action( 'event_star_action_feature_info' );
	        }
        endif;
    }
endif;
add_action( 'event_star_action_front_page', 'event_star_featured_slider', 10 );

if ( ! function_exists( 'event_star_front_page' ) ) :

    function event_star_front_page() {
        global $event_star_customizer_all_values;

        $event_star_hide_front_page_content = $event_star_customizer_all_values['event-star-hide-front-page-content'];

        /*show widget in front page, now user are not force to use front page*/
        if( is_active_sidebar( 'event-star-home' ) && !is_home() ){
            dynamic_sidebar( 'event-star-home' );
        }
        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        else {
            if( 1 != $event_star_hide_front_page_content ){
                include( get_page_template() );
            }
        }
    }
endif;
add_action( 'event_star_action_front_page', 'event_star_front_page', 20 );