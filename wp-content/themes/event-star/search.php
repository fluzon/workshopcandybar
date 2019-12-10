<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'event-star' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php
			if( 1 == $event_star_customizer_all_values['event-star-show-breadcrumb'] ){
				event_star_breadcrumbs();
			}
			?>
		</header><!-- .entry-header -->
	</div>
</div>
<div id="content" class="site-content container clearfix">
	<?php
	$sidebar_layout = event_star_sidebar_selection(get_the_ID());
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			/**
			 * event_star_action_posts_navigation hook
			 * @since Event Star 1.0.0
			 *
			 * @hooked event_star_posts_navigation - 10
			 */
			do_action( 'event_star_action_posts_navigation' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
    <?php
    get_sidebar( 'left' );
    get_sidebar();
    if( 'both-sidebar' == $sidebar_layout ) {
	    echo '</div>';
    }
    ?>
</div><!-- #content -->
<?php get_footer();