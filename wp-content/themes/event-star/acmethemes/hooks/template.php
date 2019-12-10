<?php
if ( ! function_exists( 'event_star_posts_navigation' ) ) :
	/**
	 * Post navigation
	 *
	 * @since Event Star 1.0.0
	 *
	 * @return void
	 */
	function event_star_posts_navigation() {
		the_posts_pagination();
	}
endif;
add_action( 'event_star_action_posts_navigation', 'event_star_posts_navigation' );