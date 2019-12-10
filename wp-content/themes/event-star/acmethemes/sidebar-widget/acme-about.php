<?php
/**
 * Class for adding About Section Widget
 *
 * @package Acme Themes
 * @subpackage Event Star
 * @since 1.0.0
 */
if ( ! class_exists( 'Event_Star_About' ) ) {

	class Event_Star_About extends WP_Widget {
		/*defaults values for fields*/
		private $defaults = array(
			'unique_id'             => '',
			'title'                 => '',
			'at_all_page_items'     => '',
			'column_number'         => 4,
			'background_options'    => 'default'
		);

		function __construct() {
			parent::__construct(
			        /*Base ID of your widget*/
			        'event_star_about',
                    /*Widget name will appear in UI*/
                    esc_html__( 'AT About/Service Section', 'event-star' ),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show Section with beautiful Icons.', 'event-star' )
                    )
			);
		}

		/*Widget Backend*/
		public function form( $instance ) {
			$instance           = wp_parse_args( (array) $instance, $this->defaults );
			/*default values*/
			$unique_id          = esc_attr( $instance['unique_id'] );
			$title              = esc_attr( $instance['title'] );
            $at_all_page_items  = $instance['at_all_page_items'];
			$column_number      = absint( $instance['column_number'] );
			$background_options = esc_attr( $instance['background_options'] );
			?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>"><?php esc_html_e( 'Section ID', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'unique_id' ) ); ?>" type="text" value="<?php echo $unique_id; ?>"/>
                <br/>
                <small><?php esc_html_e( 'Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.', 'event-star' ) ?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>"/>
            </p>

            <!--updated code-->
            <label><?php esc_html_e( 'Select Pages', 'event-star' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove. Please do not forget to add Icon and Excerpt on selected pages.', 'event-star' ); ?></small>
            <div class="at-repeater">
				<?php
				$total_repeater = 0;
				if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
					foreach ($at_all_page_items as $about){
						$repeater_id  = $this->get_field_id( 'at_all_page_items') .$total_repeater.'page_id';
						$repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$total_repeater.']['.'page_id'.']';
						?>
                        <div class="repeater-table">
                            <div class="at-repeater-top">
                                <div class="at-repeater-title-action">
                                    <button type="button" class="at-repeater-action">
                                        <span class="at-toggle-indicator" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="at-repeater-title">
                                    <h3><?php esc_html_e( 'Select Item', 'event-star' )?><span class="in-at-repeater-title"></span></h3>
                                </div>
                            </div>
                            <div class='at-repeater-inside hidden'>
								<?php
								/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
								$args = array(
									'selected'          => $about['page_id'],
									'name'              => $repeater_name,
									'id'                => $repeater_id,
									'class'             => 'widefat at-select',
									'show_option_none'  => esc_html__( 'Select Page', 'event-star'),
									'option_none_value' => 0 // string
								);
								wp_dropdown_pages( $args );
								?>
                                <div class="at-repeater-control-actions">
                                    <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','event-star');?></button> |
                                    <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','event-star');?></button>
                                    <?php
                                    if( get_edit_post_link( $about['page_id'] ) ){
	                                    ?>
                                        <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $about['page_id'] ) ); ?>">
		                                    <?php esc_html_e('Full Edit','event-star');?>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
						<?php
						$total_repeater = $total_repeater + 1;
					}
				}
				$coder_repeater_depth = 'coderRepeaterDepth_'.'0';
				$repeater_id  = $this->get_field_id( 'at_all_page_items') .$coder_repeater_depth.'page_id';
				$repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$coder_repeater_depth.']['.'page_id'.']';
				?>
                <script type="text/html" class="at-code-for-repeater">
                    <div class="repeater-table">
                        <div class="at-repeater-top">
                            <div class="at-repeater-title-action">
                                <button type="button" class="at-repeater-action">
                                    <span class="at-toggle-indicator" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="at-repeater-title">
                                <h3><?php esc_html_e( 'Select Item', 'event-star' )?><span class="in-at-repeater-title"></span></h3>
                            </div>
                        </div>
                        <div class='at-repeater-inside hidden'>
							<?php
							/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
							$args = array(
								'selected'         => '',
								'name'             => $repeater_name,
								'id'               => $repeater_id,
								'class'            => 'widefat at-select',
								'show_option_none' => esc_html__( 'Select Page', 'event-star'),
								'option_none_value'=> 0 // string
							);
							wp_dropdown_pages( $args );
							?>
                            <div class="at-repeater-control-actions">
                                <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','event-star');?></button> |
                                <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','event-star');?></button>
                            </div>
                        </div>
                    </div>
                </script>
				<?php
				/*most imp for repeater*/
				echo '<input class="at-total-repeater" type="hidden" value="'.$total_repeater.'">';
				$add_field = esc_html__('Add Item', 'event-star');
				echo '<span class="button-primary at-add-repeater" id="'.esc_attr( $coder_repeater_depth ).'">'.$add_field.'</span><br/>';
				?>
            </div>
            <!--updated code-->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'event-star' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>">
					<?php
					$event_star_about_column_numbers = event_star_widget_column_number();
					foreach ( $event_star_about_column_numbers as $key => $value ) {
						?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value ); ?></option>
						<?php
					}
					?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>"><?php esc_html_e( 'Background Options', 'event-star' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_options' ) ); ?>">
					<?php
					$event_star_background_options = event_star_background_options();
					foreach ( $event_star_background_options as $key => $value ) {
						?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $background_options ); ?>><?php echo esc_attr( $value ); ?></option>
						<?php
					}
					?>
                </select>
            </p>
			<?php
		}

		/**
		 * Function to Updating widget replacing old instances with new
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $new_instance new arrays value
		 * @param array $old_instance old arrays value
		 *
		 * @return array
		 *
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                  = $old_instance;
			$instance['unique_id']     = sanitize_key( $new_instance['unique_id'] );
			$instance['title']         = sanitize_text_field( $new_instance['title'] );

			/*updated code*/
			$page_ids = array();
			if( isset($new_instance['at_all_page_items'] )){
				$at_all_page_items    = $new_instance['at_all_page_items'];
				if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
					foreach ($at_all_page_items as $key=>$about ){
						$page_ids[$key]['page_id'] = event_star_sanitize_page( $about['page_id'] );
					}
				}
            }
			$instance['at_all_page_items'] = $page_ids;

			$event_star_widget_column_number    = event_star_widget_column_number();
			$instance[ 'column_number' ]        = event_star_sanitize_choice_options( $new_instance[ 'column_number' ], $event_star_widget_column_number, 4 );

			$event_star_widget_background_options   = event_star_background_options();
			$instance[ 'background_options' ]       = event_star_sanitize_choice_options( $new_instance[ 'background_options' ], $event_star_widget_background_options, 'default' );

			return $instance;
		}

		/**
		 * Function to Creating widget front-end. This is where the action happens
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $args widget setting
		 * @param array $instance saved values
		 *
		 * @return void
		 *
		 */
		public function widget( $args, $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->defaults );
			/*default values*/
			$unique_id              = ! empty( $instance['unique_id'] ) ? esc_attr( $instance['unique_id'] ) : esc_attr( $this->id );
			$title                  = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
            $at_all_page_items      = $instance['at_all_page_items'];
            $column_number          = absint( $instance['column_number'] );
            $background_options     = esc_attr( $instance['background_options'] );
            $bg_gray_class          = $background_options == 'gray'?'at-gray-bg':'';

            echo $args['before_widget'];
			?>
            <section id="<?php echo esc_attr( $unique_id ); ?>" class="at-widgets acme-abouts <?php echo $bg_gray_class;?>">
                <div class="container">
					<?php
					if ( ! empty( $title ) ) {
						echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
					}
					?>
                    <div class="row">
						<?php
						$post_in = array();
						if  ( is_array( $at_all_page_items ) && count( $at_all_page_items ) > 0 ){
							foreach ( $at_all_page_items as $about ){
								if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
									$post_in[] = $about['page_id'];
								}
							}
						}
						if( !empty( $post_in )) :
                            $event_star_post_in_page_args = array(
                                    'post__in'          => $post_in,
                                    'orderby'           => 'post__in',
                                    'posts_per_page'    => count( $post_in ),
                                    'post_type'         => 'page',
                                    'no_found_rows'     => true,
                                    'post_status'       => 'publish'
                            );
							$about_query = new WP_Query( $event_star_post_in_page_args );

							/*The Loop*/
							if ( $about_query->have_posts() ):
								$i = 1;
								while ( $about_query->have_posts() ):$about_query->the_post();

									if ( 1 == $column_number ) {
										$b_col = "col-sm-12";
									} elseif ( 2 == $column_number ) {
										$b_col = "col-sm-6";
									} elseif ( 3 == $column_number ) {
										$b_col = "col-sm-12 col-md-4";
									} else {
										$b_col = "col-sm-12 col-md-3";
									}

									$animation1 = "init-animate zoomIn";
									?>
                                    <div class="<?php echo esc_attr( $b_col ); ?> column">
                                        <div class="single-item <?php echo esc_attr( $animation1 ); ?>">
                                            <div class="icon clearfix">
												<?php
												$event_star_icon = get_post_meta( get_the_ID(), 'event-star-featured-icon', true );
												$event_star_icon = isset( $event_star_icon ) ? esc_attr( $event_star_icon ) : '';
												if ( ! empty ( $event_star_icon ) ) { ?>
                                                    <a href="<?php //the_permalink() ?>">
                                                        <i class="fa <?php echo esc_attr( $event_star_icon ); ?>"></i>
                                                    </a>
												<?php
												}
												else {
													echo '<a href="' . esc_url( get_the_permalink() ) . '"><i class="fa fa-suitcase"></i></a>';
												}
												?>
                                                <h3 class="title">
                                                    <a title="<?php the_title_attribute(); ?>" href="<?php //the_permalink(); ?>">
			                                            <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="content">
                                                <div class="details">
	                                                <?php the_excerpt(); ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
									<?php
									if ( 0 == $i % $column_number ) {
										echo "<div class='clearfix'></div>";
									}
									$i ++;
								endwhile;
							endif;
							wp_reset_postdata();
						endif;
						?>
                    </div>
                </div>
            </section>
			<?php
			echo $args['after_widget'];
		}
	} // Class Event_Star_About ends here
}
