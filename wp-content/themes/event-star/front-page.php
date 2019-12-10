<?php
/**
 * The front-page template file.
 *
 * @package Acme Themes
 * @subpackage Event Star
 * @since Event Star 1.0.0
 */
get_header();

/**
 * event_star_action_front_page hook
 * @since Event Star 1.0.0
 *
 * @hooked event_star_featured_slider -  10
 * @hooked event_star_front_page -  20
 */
do_action( 'event_star_action_front_page' );

get_footer();