<?php
/**
 * Class for adding Social Section Widget
 *
 * @package Acme Themes
 * @subpackage Event Star
 * @since 1.0.0
 */
if ( ! class_exists( 'Event_Star_Event' ) ) {

	class Event_Star_Event extends WP_Widget {
		/*defaults values for fields*/

		private function defaults(){
			/*defaults values for fields*/
			$defaults = array(
				'unique_id'         => '',
				'title'             => '',
				'event_title'       => '',
				'event_date'        => '',
				'button_one_text'   => esc_html__( 'Book Now', 'event-star' ),
				'button_one_url'    => '',
				'button_two_text'   => esc_html__( 'Learn More', 'event-star' ),
				'button_two_url'    => ''
			);
			return $defaults;
		}

		function __construct() {
			parent::__construct(
			        /*Base ID of your widget*/
			        'event_star_event',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Event Countdown', 'event-star'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show Social Section.', 'event-star' )
                    )
			);
		}

		/*Widget Backend*/
		public function form( $instance ) {
			$instance           = wp_parse_args( (array) $instance, $this->defaults() );
			/*default values*/
			$unique_id          = esc_attr( $instance[ 'unique_id' ] );
			$title              = esc_attr( $instance[ 'title' ] );
			$event_title        = esc_attr( $instance[ 'event_title' ] );
			$event_date         = esc_attr( $instance[ 'event_date' ] );
			$button_one_text    = esc_attr( $instance[ 'button_one_text' ] );
			$button_one_url     = esc_url( $instance[ 'button_one_url' ] );
			$button_two_text    = esc_attr( $instance[ 'button_two_text' ] );
			$button_two_url     = esc_url( $instance[ 'button_two_url' ] );
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'unique_id' ); ?>"><?php esc_html_e( 'Section ID', 'event-star' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'unique_id' ); ?>" name="<?php echo $this->get_field_name( 'unique_id' ); ?>" type="text" value="<?php echo $unique_id; ?>" />
				<br />
				<small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','event-star')?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'event-star' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
            <p>
                <label for="<?php echo $this->get_field_id( 'event_title' ); ?>"><?php esc_html_e( 'Event Title', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'event_title' ); ?>" name="<?php echo $this->get_field_name( 'event_title' ); ?>" type="text" value="<?php echo $event_title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'event_date' ); ?>"><?php esc_html_e( 'Event Date', 'event-star' ); ?></label>
                <input class="widefat at-date-picker" id="<?php echo $this->get_field_id( 'event_date' ); ?>" name="<?php echo $this->get_field_name( 'event_date' ); ?>" type="text" value="<?php echo $event_date; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_one_text' ); ?>"><?php esc_html_e( 'Extra Button Text', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_one_text' ); ?>" name="<?php echo $this->get_field_name( 'button_one_text' ); ?>" type="text" value="<?php echo $button_one_text; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_one_url' ); ?>"><?php esc_html_e( 'Button Link Url', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_one_url' ); ?>" name="<?php echo $this->get_field_name( 'button_one_url' ); ?>" type="text" value="<?php echo $button_one_url; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_two_text' ); ?>"><?php esc_html_e( 'Extra Button Text', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_two_text' ); ?>" name="<?php echo $this->get_field_name( 'button_two_text' ); ?>" type="text" value="<?php echo $button_two_text; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_two_url' ); ?>"><?php esc_html_e( 'Button Link Url', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_two_url' ); ?>" name="<?php echo $this->get_field_name( 'button_two_url' ); ?>" type="text" value="<?php echo $button_two_url; ?>" />
            </p>
			<?php
		}

		/**
		 * Function to Updating widget replacing old instances with new
		 *
		 * @access public
		 * @since 1.0.0
		 *
		 * @param array $new_instance new arrays value
		 * @param array $old_instance old arrays value
		 * @return array
		 *
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance[ 'unique_id' ]            = sanitize_key( $new_instance[ 'unique_id' ] );
			$instance[ 'title' ]                = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'event_title' ]          = sanitize_text_field( $new_instance[ 'event_title' ] );

			$instance[ 'event_date' ]           = event_star_is_valid_date_time( $new_instance[ 'event_date' ] );

			$instance[ 'button_one_text' ]      = sanitize_text_field( $new_instance[ 'button_one_text' ] );
			$instance[ 'button_one_url' ]       = esc_url_raw( $new_instance[ 'button_one_url' ] );
			$instance[ 'button_two_text' ]      = sanitize_text_field( $new_instance[ 'button_two_text' ] );
			$instance[ 'button_two_url' ]       = esc_url_raw( $new_instance[ 'button_two_url' ] );
			
			return $instance;
		}

		/**
		 * Function to Creating widget front-end. This is where the action happens
		 *
		 * @access public
		 * @since 1.0.0
		 *
		 * @param array $args widget setting
		 * @param array $instance saved values
		 * @return void
		 *
		 */
		public function widget($args, $instance) {
			$instance               = wp_parse_args( (array) $instance, $this->defaults());

			/*default values*/
			$unique_id              = !empty( $instance[ 'unique_id' ] ) ? esc_attr( $instance[ 'unique_id' ] ) : esc_attr( $this->id );
			$title                  = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$event_title            = esc_html( $instance[ 'event_title' ] );
			$event_date             = esc_html( $instance[ 'event_date' ] );
			$button_one_text        = esc_html( $instance[ 'button_one_text' ] );
			$button_one_url         = esc_url( $instance[ 'button_one_url' ] );
			$button_two_text        = esc_html( $instance[ 'button_two_text' ] );
			$button_two_url         = esc_url( $instance[ 'button_two_url' ] );

			global $event_star_customizer_all_values;
			$event_star_primary_color = esc_attr( $event_star_customizer_all_values['event-star-primary-color'] );

			echo $args['before_widget'];
			?>
			<section id="<?php echo $unique_id;?>" class="at-widgets at-event-count-down" style="background: <?php echo $event_star_primary_color;?>">
				<div class="container">
					<?php
					if( !empty( $title ) ) {
						echo $args['before_title'] .esc_html( $title ).$args['after_title'];
					}
					$animation1 = "init-animate zoomIn";
					?>
					<div class="row">
                        <div class="col-md-3 text-left <?php echo $animation1;?>">
	                        <?php
	                        if( !empty( $event_title ) ) {
		                        echo $event_title;
	                        }
	                        ?>
                        </div>
						<div class="col-md-6">
                            <?php
                            if( !empty( $event_date ) ){
	                            $date_time = event_star_date_time_array( $event_date );
	                            if( !empty( $date_time ) && is_array( $date_time ) ){
		                            global $event_star_customizer_all_values;
		                            $event_star_days_text = $event_star_customizer_all_values['event-star-days-text'];
		                            $event_star_hours_text = $event_star_customizer_all_values['event-star-hours-text'];
		                            $event_star_min_text = $event_star_customizer_all_values['event-star-min-text'];
		                            $event_star_second_text = $event_star_customizer_all_values['event-star-second-text'];

		                            ?>
                                    <section class="feature-event clearfix"
                                             data-year="<?php echo esc_attr( $date_time['year'] );?>"
                                             data-month="<?php echo esc_attr( $date_time['month'] );?>"
                                             data-day="<?php echo esc_attr( $date_time['day'] );?>"
                                             data-hour="<?php echo esc_attr( $date_time['hour']);?>"
                                             data-minutes="<?php echo esc_attr( $date_time['minutes'] );?>"
                                    >
                                        <div class="feature-col col-xs-3 <?php echo $animation1;?>">
                                            <span class="day countdown-time"></span>
                                            <span class="day-text countdown-label">
                                                <?php echo esc_html( $event_star_days_text );?>
                                            </span>
                                        </div>
                                        <div class="feature-col col-xs-3 <?php echo $animation1;?>">
                                            <span class="hour countdown-time"></span>
                                            <span class="hour-text countdown-label">
                                                <?php echo esc_html( $event_star_hours_text );?>
                                            </span>
                                        </div>
                                        <div class="feature-col col-xs-3 <?php echo $animation1;?>">
                                            <span class="min countdown-time"></span>
                                            <span class="min-text countdown-label">
                                                <?php echo esc_html( $event_star_min_text );?>
                                            </span>
                                        </div>
                                        <div class="feature-col col-xs-3 <?php echo $animation1;?>">
                                            <span class="sec countdown-time"></span>
                                            <span class="sec-text countdown-label">
                                                <?php echo esc_html( $event_star_second_text );?>
                                            </span>
                                        </div>
                                    </section>
		                            <?php
	                            }
                            }
                            ?>
                        </div>
						<div class="col-md-3 text-right at-btn-wrap <?php echo $animation1;?>">
                            <?php
                            if( !empty( $button_one_text ) ){
                                ?>
                                <a href="<?php echo $button_one_url; ?>" class="init-animate zoomIn btn btn-primary btn-reverse outline-outward banner-btn">
                                    <?php echo $button_one_text;?>
                                </a>
                                <?php
                            }
                            if( !empty( $button_two_text ) ){
                                ?>
                                <a href="<?php echo $button_two_url; ?>" class="init-animate zoomIn btn btn-primary btn-reverse outline-outward banner-btn">
	                                <?php echo $button_two_text;?>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
					</div>
				</div>
			</section>
			<?php
			echo $args['after_widget'];
		}
	} // Class Event_Star_Event ends here
}