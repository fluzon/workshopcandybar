<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Acme Themes
 * @subpackage Event Star
 */
get_header();
global $event_star_customizer_all_values;
?>
<div class="wrapper inner-main-title">
	<div class="container">
		<header class="entry-header init-animate">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'event-star' ); ?></h1>
			<?php
			if( 1 == $event_star_customizer_all_values['event-star-show-breadcrumb'] ){
				event_star_breadcrumbs();
			}
			?>
		</header>
	</div>
</div>
<div id="content" class="site-content container clearfix">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'event-star' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php get_footer();