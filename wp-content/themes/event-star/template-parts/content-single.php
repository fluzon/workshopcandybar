<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Event Star
 */
$no_blog_image = '';
global $event_star_customizer_all_values;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('init-animate'); ?>>
	<div class="content-wrapper">
		<?php
		$sidebar_layout = event_star_sidebar_selection();
		$thumbnail = $event_star_customizer_all_values['event-star-single-img-size'];
		if( has_post_thumbnail() && 'disable' != $thumbnail):
			echo '<div class="image-wrap"><figure class="post-thumb">';
			the_post_thumbnail( $thumbnail );
			echo "</figure></div>";
		else:
			$no_blog_image = 'no-image';
		endif;
		?>
		<div class="entry-content <?php echo $no_blog_image?>">
			<?php
			if ( 'post' === get_post_type() && has_category() ) : ?>
                <header class="entry-header <?php echo $no_blog_image; ?>">
                    <div class="entry-meta">
						<?php
						event_star_cats_lists()
						?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->
			<?php
			endif; ?>
            <div class="entry-header-title">
				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            </div>
            <footer class="entry-footer">
				<?php event_star_entry_footer(); ?>
            </footer><!-- .entry-footer -->
			<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'event-star' ),
				'after'  => '</div>',
			) );
            ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->