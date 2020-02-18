<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Acme Themes
 * @subpackage Event Star
 */

get_header();
global $event_star_customizer_all_values;


?>
<!-- desde aqui es codigo del nuevo header -->
<?php

while ( have_posts() ) : the_post();
?>
<div class="image-slider-wrapper home-fullscreen full-screen-bg">
                    <div class="featured-slider slick-initialized slick-slider" style="display: block;">
					                                <div class="slick-list draggable" style="height: 524px;"><div class="slick-track" style="opacity: 1; width: 1359px;"><div class="item slick-slide slick-current slick-active" style="background-image: url(&quot;<?php echo the_post_thumbnail_url( "full" ); ?>&quot;); background-repeat: no-repeat; background-size: cover; background-position: center center; width: 1359px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" data-slick-index="0" aria-hidden="false" tabindex="0">
							                                    <div class="slider-content text-center">
                                    <div class="container">
									                                                <div class="banner-title init-animate fadeInDown" style="visibility: visible; animation-name: fadeInDown;">Taller de Costos y Presupuestos</div>
										                                                <div class="image-slider-caption init-animate fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
											    <p>Herramientas claves para identificar y calcular los costos de tu emprendimiento</p>
                                            </div>
										                                        </div>
                                </div>
                            </div></div></div>
						                        </div><!--acme slick carousel-->
                    <div class="info-icon-box-wrapper"><div class="container primary-bg"><div class="row">            <div class="info-icon-box col-md-3 init-animate zoomIn" style="visibility: visible; animation-name: zoomIn;">
				                    <div class="info-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
					                    <div class="info-icon-details">
						<h6 class="icon-title">¿Cuándo?</h6><span class="icon-desc">1 Diciembre, 2019</span>                    </div>
					            </div>
			            <div class="info-icon-box col-md-3 init-animate zoomIn" style="visibility: visible; animation-name: zoomIn;">
				                    <div class="info-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
					                    <div class="info-icon-details">
						<h6 class="icon-title">¿Dónde?</h6><span class="icon-desc">Santiago de Chile</span>                    </div>
					            </div>
			            <div class="info-icon-box col-md-3 init-animate zoomIn" style="visibility: visible; animation-name: zoomIn;">
				                    <div class="info-icon">
                        <i class="fa fa-phone"></i>
                    </div>
					                    <div class="info-icon-details">
						<h6 class="icon-title">Teléfono</h6><span class="icon-desc">+569 7763.8860</span>                    </div>
					            </div>
			            <div class="info-icon-box col-md-3 init-animate zoomIn" style="visibility: visible; animation-name: zoomIn;">
				                    <div class="info-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
					                    <div class="info-icon-details">
						<h6 class="icon-title">Escríbenos</h6><span class="icon-desc">hola@eventoswow.cl</span>                    </div>
					            </div>
			</div></div></div>
    </div>
<!-- hasta aqui es codigo del nuevo header -->

<?php
endwhile; // End of the loop.
?>

<div id="content" class="site-content container clearfix">
	<?php
	$sidebar_layout = event_star_sidebar_selection(get_the_ID());
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
        while ( have_posts() ) : the_post();
		    get_template_part( 'template-parts/content', 'single' ); ?>
            <div class="clearfix"></div>
			<?php
            the_post_navigation();
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile; // End of the loop.
        ?>
		</main><!-- #main -->
	</div><!-- #primary -->
    <?php
    get_sidebar( 'left' );
    get_sidebar();
    if( 'both-sidebar' == $sidebar_layout ) {
	    echo '</div>';
    }
    ?>
</div><!-- #content -->
<?php get_footer();
