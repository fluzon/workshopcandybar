<?php
/**
 * Display default slider
 *
 * @since Event Star 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('event_star_default_slider') ) :
    function event_star_default_slider(){
        global $event_star_customizer_all_values;
        $bg_image_style = '';
        if ( get_header_image() ) :
            $bg_image_style .= 'background-image:url(' . esc_url( get_header_image() ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        else:
            $bg_image_style .= 'background-image:url(' . esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        endif; // End header image check.

        $text_align = 'text-left';
        $animation1 = 'init-animate';
        $animation2 = 'init-animate';
        ?>
        <div class="image-slider-wrapper home-fullscreen ">
            <div class="featured-slider">
                <div class="item" style="<?php echo $bg_image_style; ?>">
                    <div class="slider-content <?php echo $text_align;?>">
                        <div class="container">
                            <div class="banner-title <?php echo $animation1;?>">
                                <?php esc_html_e('Event Star','event-star' );?>
                            </div>
                            <div class="image-slider-caption <?php echo $animation2;?>">
                                <?php esc_html_e('The modern Event WordPress Theme','event-star' );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
endif;

/**
 * Featured Slider display
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'event_star_feature_slider' ) ) :

    function event_star_feature_slider( ){
        global $event_star_customizer_all_values;

        $event_star_slides_data = json_decode( $event_star_customizer_all_values['event-star-slides-data'] );
	    $event_star_feature_slider_text_align = $event_star_customizer_all_values['event-star-feature-slider-text-align'];

        $event_star_feature_slider_enable_animation = $event_star_customizer_all_values['event-star-feature-slider-enable-animation'];
        $event_star_feature_slider_image_only = $event_star_customizer_all_values['event-star-feature-slider-display-title'];
        $event_star_feature_slider_image_excerpt = $event_star_customizer_all_values['event-star-feature-slider-display-excerpt'];
        $event_star_fs_image_display_options = $event_star_customizer_all_values['event-star-fs-image-display-options'];

	    $post_in = array();
	    $slides_other_data = array();
	    if( is_array( $event_star_slides_data ) ){
		    foreach ( $event_star_slides_data as $slides_data ){
			    if( isset( $slides_data->selectpage ) && !empty( $slides_data->selectpage ) ){
				    $post_in[] = $slides_data->selectpage;
				    $slides_other_data[$slides_data->selectpage] = array(
				           'event-date'     =>$slides_data->event_date,
				           'button-1-text'  =>$slides_data->button_1_text,
				           'button-1-link'  =>$slides_data->button_1_link,
				           'button-2-text'  =>$slides_data->button_2_text,
				           'button-2-link'  =>$slides_data->button_2_link
                    );
			    }
		    }
	    }

	    if( !empty( $post_in )) :
		    $event_star_child_page_args = array(
			    'post__in'          => $post_in,
			    'orderby'           => 'post__in',
			    'posts_per_page'    => count( $post_in ),
			    'post_type'         => 'page',
			    'no_found_rows'     => true,
			    'post_status'       => 'publish'
		    );
		    $slider_query = new WP_Query( $event_star_child_page_args );
		    /*The Loop*/
		    if ( $slider_query->have_posts() ):
			    ?>
                <div class="image-slider-wrapper home-fullscreen <?php echo esc_attr( $event_star_fs_image_display_options ); ?>">
                    <div class="featured-slider">
					    <?php
					    $slider_index = 1;
					    $text_align = '';
					    $animation1 = '';
					    $animation2 = '';
					    $animation3 = '';
					    $animation4 = '';

					    $bg_image_style = '';
					    if( 'alternate' != $event_star_feature_slider_text_align ){
						    $text_align = $event_star_feature_slider_text_align;
					    }
					    if( 1 == $event_star_feature_slider_enable_animation ){
						    $animation1 = 'init-animate fadeInDown';
						    $animation2 = 'init-animate fadeInDown';
						    $animation3 = 'init-animate fadeInDown';
						    $animation4 = 'init-animate fadeInDown';
						    $animation5 = 'init-animate fadeInDown';
					    }
					    while( $slider_query->have_posts() ):$slider_query->the_post();

						    if( 'alternate' == $event_star_feature_slider_text_align ){
							    if( 1 == $slider_index ){
								    $text_align = 'text-left';
							    }
                                elseif ( 2 == $slider_index ){
								    $text_align = 'text-center';
							    }
							    else{
								    $text_align = 'text-right';
							    }
						    }
						    if (has_post_thumbnail()) {
							    $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
						    }
						    else {
							    $image_url[0] = get_template_directory_uri().'/assets/img/default-image.jpg';
						    }
						    if( 'full-screen-bg' == $event_star_fs_image_display_options ){
							    $bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
						    }
						    $slides_single_data = $slides_other_data[get_the_ID()];
						    ?>
                            <div class="item" style="<?php echo $bg_image_style; ?>">
							    <?php
							    if( 'responsive-img' == $event_star_fs_image_display_options ){
								    echo '<img src="'.esc_url( $image_url[0] ).'"/>';
							    }
							    ?>
                                <div class="slider-content <?php echo esc_attr( $text_align );?>">
                                    <div class="container">
									    <?php
									    if( 1 == $event_star_feature_slider_image_only ){
										    ?>
                                            <div class="banner-title <?php echo esc_attr( $animation1 );?>"><?php the_title()?></div>
										    <?php
									    }
									    if( 1 == $event_star_feature_slider_image_excerpt ){
										    ?>
                                            <div class="image-slider-caption <?php echo esc_attr( $animation2 );?>">
											    <?php the_excerpt(); ?>
                                            </div>
										    <?php
									    }
									    if( !empty( $slides_single_data['event-date'] ) ){
										    $date_time = event_star_date_time_array( $slides_single_data['event-date'] );
										    if( !empty( $date_time ) && is_array( $date_time ) ){
											    $event_star_days_text = $event_star_customizer_all_values['event-star-days-text'];
											    $event_star_hours_text = $event_star_customizer_all_values['event-star-hours-text'];
											    $event_star_min_text = $event_star_customizer_all_values['event-star-min-text'];
											    $event_star_second_text = $event_star_customizer_all_values['event-star-second-text'];
											    ?>
                                                <section class="feature-event clearfix <?php echo esc_attr( $animation3 );?>"
                                                         data-year="<?php echo esc_attr( $date_time['year'] );?>"
                                                         data-month="<?php echo esc_attr( $date_time['month'] );?>"
                                                         data-day="<?php echo esc_attr( $date_time['day'] );?>"
                                                         data-hour="<?php echo esc_attr( $date_time['hour']);?>"
                                                         data-minutes="<?php echo esc_attr( $date_time['minutes'] );?>"
                                                >
                                                    <div class="feature-col col-xs-3">
                                                        <span class="day countdown-time"></span>
                                                        <?php
                                                        if( !empty( $event_star_days_text ) ){
                                                            ?>
                                                            <span class="day-text countdown-label">
                                                                <?php
                                                                echo esc_html( $event_star_days_text );
                                                                ?>
                                                            </span>
	                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="feature-col col-xs-3">
                                                        <span class="hour countdown-time"></span>
	                                                    <?php
	                                                    if( !empty( $event_star_hours_text ) ){
		                                                    ?>
                                                            <span class="hour-text countdown-label">
                                                                <?php
                                                                echo esc_html( $event_star_hours_text );
                                                                ?>
                                                            </span>
		                                                    <?php
	                                                    }
	                                                    ?>
                                                    </div>
                                                    <div class="feature-col col-xs-3">
                                                        <span class="min countdown-time"></span>
	                                                    <?php
	                                                    if( !empty( $event_star_min_text ) ){
		                                                    ?>
                                                            <span class="min-text countdown-label">
                                                                <?php
                                                                echo esc_html( $event_star_min_text );
                                                                ?>
                                                            </span>
		                                                    <?php
	                                                    }
	                                                    ?>
                                                    </div>
                                                    <div class="feature-col col-xs-3">
                                                        <span class="sec countdown-time"></span>
	                                                    <?php
	                                                    if( !empty( $event_star_second_text ) ){
		                                                    ?>
                                                            <span class="sec-text countdown-label">
                                                                <?php
                                                                echo esc_html( $event_star_second_text );
                                                                ?>
                                                            </span>
		                                                    <?php
	                                                    }
	                                                    ?>
                                                    </div>
                                                </section>
											    <?php
										    }
									    }
									    if( !empty( $slides_single_data['button-1-text'] ) ){
										    ?>
                                            <a href="<?php echo esc_url( $slides_single_data['button-1-link'] );?>" class="<?php echo esc_attr( $animation4 );?> btn btn-primary btn-reverse outline-outward banner-btn">
											    <?php echo esc_html( $slides_single_data['button-1-text'] ); ?>
                                            </a>
										    <?php
									    }
									    if( !empty( $slides_single_data['button-2-text'] ) ){
										    ?>
                                            <a href="<?php echo esc_url( $slides_single_data['button-2-link'] );?>" class="<?php echo esc_attr( $animation5 );?> btn btn-primary outline-outward banner-btn">
											    <?php echo esc_html( $slides_single_data['button-2-text'] ); ?>
                                            </a>
										    <?php
									    }
									    ?>
                                    </div>
                                </div>
                            </div>
						    <?php
						    $slider_index ++;
						    if( 3 < $slider_index ){
							    $slider_index = 1;
						    }
					    endwhile;
					    ?>
                    </div><!--acme slick carousel-->
                    <?php
                    $event_star_feature_info_display_options = $event_star_customizer_all_values['event-star-feature-info-display-options'];
                    if( 'absolute' == $event_star_feature_info_display_options ){
	                    do_action( 'event_star_action_feature_info' );
                    }
                    ?>
                </div><!--.image slider wrapper-->
			    <?php
		    else:
			    event_star_default_slider();
		    endif;
	    else:
		    event_star_default_slider();
        endif;
	    wp_reset_postdata();
    }
endif;
add_action( 'event_star_action_feature_slider', 'event_star_feature_slider', 0 );