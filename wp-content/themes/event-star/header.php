<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Event Star
 */

/**
 * event_star_action_before_head hook
 * @since Event Star 1.0.0
 *
 * @hooked event_star_set_global -  0
 * @hooked event_star_doctype -  10
 */
do_action( 'event_star_action_before_head' );?>
	<head>

		<?php
		/**
		 * event_star_action_before_wp_head hook
		 * @since Event Star 1.0.0
		 *
		 * @hooked event_star_before_wp_head -  10
		 */
		do_action( 'event_star_action_before_wp_head' );

		wp_head();
		?>

	</head>
<body <?php body_class();?>>

<?php
/**
 * event_star_action_before hook
 * @since Event Star 1.0.0
 *
 * @hooked event_star_site_start - 20
 */
do_action( 'event_star_action_before' );

/**
 * event_star_action_before_header hook
 * @since Event Star 1.0.0
 *
 * @hooked event_star_skip_to_content - 10
 */
do_action( 'event_star_action_before_header' );

/**
 * event_star_action_header hook
 * @since Event Star 1.0.0
 *
 * @hooked event_star_header - 10
 */
do_action( 'event_star_action_header' );

/**
 * event_star_action_after_header hook
 * @since Event Star 1.0.0
 *
 * @hooked null
 */
do_action( 'event_star_action_after_header' );

/**
 * event_star_action_before_content hook
 * @since Event Star 1.0.0
 *
 * @hooked null
 */
do_action( 'event_star_action_before_content' );