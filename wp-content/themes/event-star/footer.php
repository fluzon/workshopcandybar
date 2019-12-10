<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Event Star
 */

/**
 * event_star_action_after_content hook
 * @since Event Star 1.0.0
 *
 * @hooked null
 */
do_action( 'event_star_action_after_content' );

/**
 * event_star_action_before_footer hook
 * @since Event Star 1.0.0
 *
 * @hooked null
 */
do_action( 'event_star_action_before_footer' );

/**
 * event_star_action_footer hook
 * @since Event Star 1.0.0
 *
 * @hooked event_star_footer - 10
 */
do_action( 'event_star_action_footer' );

/**
 * event_star_action_after_footer hook
 * @since Event Star 1.0.0
 *
 * @hooked null
 */
do_action( 'event_star_action_after_footer' );

/**
 * event_star_action_after hook
 * @since Event Star 1.0.0
 *
 * @hooked event_star_page_end - 10
 */
do_action( 'event_star_action_after' );

wp_footer();
?>
</body>
</html>