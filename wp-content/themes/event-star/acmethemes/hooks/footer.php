<?php
/**
 * Footer content
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_footer' ) ) :

    function event_star_footer() {

        global $event_star_customizer_all_values;
	    ?>
        <div class="clearfix"></div>
        <footer class="site-footer">
            <?php
            $footer_column = 0;
            if(is_active_sidebar('footer-col-one') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-two') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-three') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-four') ){
	            $footer_column++;
            }
            if( 0 !=$footer_column ) {
                ?>
                <div class="footer-columns at-fixed-width">
                    <div class="container">
                        <div class="row">
			                <?php
			                if ( 2 == $footer_column ){
				                $footer_top_col = 'col-sm-6 init-animate';
			                }
                            elseif ( 3 == $footer_column ){
				                $footer_top_col = 'col-sm-4 init-animate';
			                }
                            elseif ( 4 == $footer_column ){
				                $footer_top_col = 'col-sm-3 init-animate';
			                }
			                else{
				                $footer_top_col = 'col-sm-12 init-animate';
			                }
			                $footer_top_col .= ' zoomIn';
			                if (is_active_sidebar('footer-col-one')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-one'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-two')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-two'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-three')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-three'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-four')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-four'); ?>
                                </div>
			                <?php endif; ?>
                        </div>
                    </div><!-- bottom-->
                </div>
                <div class="clearfix"></div>
                <?php
            }
            ?>
            <div class="copy-right">
                <div class='container'>
                    <div class="row">
                        <div class="col-sm-6 init-animate">
                            <div class="footer-copyright text-left">
                                <?php
                                if( isset( $event_star_customizer_all_values['event-star-footer-copyright'] ) ): ?>
                                    <p class="at-display-inline-block">
                                        <?php echo wp_kses_post( $event_star_customizer_all_values['event-star-footer-copyright'] ); ?>
                                    </p>
                                <?php endif; ?>
                                <div class="site-info at-display-inline-block">por WOW Eventos
				                    <?php  //printf( esc_html__( '%1$s by %2$s', 'event-star' ), 'Event Star', '<a href="http://www.acmethemes.com/" rel="designer">Acme Themes</a>' ); ?>
                                </div><!-- .site-info -->
                            </div>
                        </div>
                        <div class="col-sm-6 init-animate">
                            <?php
                            $event_star_footer_copyright_beside_option = $event_star_customizer_all_values['event-star-footer-copyright-beside-option'];
                            if( 'hide' != $event_star_footer_copyright_beside_option ){
	                            if ( 'social' == $event_star_footer_copyright_beside_option ) {
		                            /**
		                             * Social Sharing
		                             * event_star_action_social_links
		                             * @since Event Star 1.0.0
		                             *
		                             * @hooked event_star_social_links -  10
		                             */
		                            echo "<div class='text-right'>";
		                            do_action('event_star_action_social_links');
		                            echo "</div>";
	                            }
	                            else{
		                            echo "<div class='at-first-level-nav text-right'>";
		                            wp_nav_menu(
			                            array(
				                            'theme_location' => 'footer-menu',
				                            'container' => false,
				                            'depth' => 1
                                        )
		                            );
		                            echo "</div>";
	                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <a href="#page" class="sm-up-container"><i class="fa fa-angle-up sm-up"></i></a>
            </div>
        </footer>
    <?php
    }
endif;
add_action( 'event_star_action_footer', 'event_star_footer', 10 );

/**
 * Page end
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_page_end' ) ) :

    function event_star_page_end() {
	    global $event_star_customizer_all_values;
	    $event_star_booking_form_title = $event_star_customizer_all_values['event-star-popup-widget-title'];
	    ?>
        <!-- Modal -->
        <div id="at-shortcode-bootstrap-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					    <?php
					    if( !empty( $event_star_booking_form_title ) ){
						    ?>
                            <h4 class="modal-title"><?php echo esc_html( $event_star_booking_form_title ); ?></h4>
						    <?php
					    }
					    ?>
                    </div>
				    <?php
				    if( is_active_sidebar( 'popup-widget-area' ) ) :
					    echo "<div class='modal-body'>";
					    dynamic_sidebar( 'popup-widget-area' );
					    echo "</div>";
				    endif;
				    ?>
                </div><!--.modal-content-->
            </div>
        </div><!--#at-shortcode-bootstrap-modal-->

        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'event_star_action_after', 'event_star_page_end', 10 );
