<?php
/**
 * Class for adding Accordion Section Widget
 *
 * @package Acme Themes
 * @subpackage Event Star
 * @since 1.0.0
 */
if ( ! class_exists( 'Event_Star_Accordion' ) ) {

    class Event_Star_Accordion extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'unique_id'             => '',
            'page_id'               => '',
            'title'                 => '',
            'at_all_page_items'     => '',
            'background_options'    => 'gray'
        );

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'event_star_accordion',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Accordion Section', 'event-star'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Suitable for FAQ and or other Accordion', 'event-star' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance               = wp_parse_args( (array) $instance, $this->defaults );
            /*default values*/
            $unique_id              = esc_attr( $instance[ 'unique_id' ] );
	        $page_id                = absint( $instance[ 'page_id' ] );
	        $title                  = esc_attr( $instance[ 'title' ] );
	        $at_all_page_items      = $instance['at_all_page_items'];
	        $background_options     = esc_attr( $instance['background_options'] );
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>"><?php esc_html_e( 'Section ID', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'unique_id' ) ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','event-star')?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select Page', 'event-star' ); ?></label>
                <br />
                <small><?php esc_html_e( 'Select page and its title and its content will display in the frontend.', 'event-star' ); ?></small>
		        <?php
		        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
		        $args = array(
			        'selected'              => $page_id,
			        'name'                  => $this->get_field_name( 'page_id' ),
			        'id'                    => $this->get_field_id( 'page_id' ),
			        'class'                 => 'widefat',
			        'show_option_none'      => esc_html__('Select Page','event-star'),
			        'option_none_value'     => 0 // string
		        );
		        wp_dropdown_pages( $args );
		        ?>
            </p>

            <!--updated code-->
            <label><?php esc_html_e( 'Select Pages', 'event-star' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove', 'event-star' ); ?></small>
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
						        'selected'          => '',
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
                            </div>
                        </div>
                    </div>

                </script>
		        <?php
		        /*most imp for repeater*/
		        echo '<input class="at-total-repeater" type="hidden" value="'.$total_repeater.'">';
		        $add_field = esc_html__('Add Item', 'event-star');
		        echo '<span class="button-primary at-add-repeater" id="'.$coder_repeater_depth.'">'.$add_field.'</span><br/>';
		        ?>
            </div>
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
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'unique_id' ]    = sanitize_key( $new_instance[ 'unique_id' ] );
	        $instance[ 'page_id' ]      = event_star_sanitize_page( $new_instance[ 'page_id' ] );
	        $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );

	        /*updated code*/
	        $page_ids = array();
	        if( isset($new_instance['at_all_page_items'] )){
		        $at_all_page_items    = $new_instance['at_all_page_items'];
		        if  ( is_array( $at_all_page_items ) && count( $at_all_page_items ) > 0 ){
			        foreach ($at_all_page_items as $key=>$about ){
				        $page_ids[$key]['page_id'] = event_star_sanitize_page( $about['page_id'] );
			        }
		        }
	        }
	        $instance['at_all_page_items'] = $page_ids;

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
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);

            /*default values*/
            $unique_id          = !empty( $instance[ 'unique_id' ] ) ? esc_attr( $instance[ 'unique_id' ] ) : esc_attr( $this->id );
	        $page_id            = absint( $instance[ 'page_id' ] );
	        $title              = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
	        $at_all_page_items  = $instance['at_all_page_items'];
	        $background_options = esc_attr( $instance['background_options'] );
	        $bg_gray_class      = $background_options == 'gray'?'at-gray-bg':'';

	        echo $args['before_widget'];
            ?>
            <section id="<?php echo esc_attr( $unique_id );?>" class="at-widgets acme-accordions <?php echo $bg_gray_class;?>">
                <div class="container">
	                <?php
	                if( !empty( $title ) ) {
		                echo $args['before_title'] .esc_html( $title ).$args['after_title'];
	                }
	                ?>
                    <div class="row">
                        <?php
                        $col= 'col-md-12';
                        $animation1 = "init-animate zoomIn";

                        if( !empty( $page_id )){
                            $col= 'col-md-6';
                        }
                        ?>

                        <div class="<?php echo $col;?>">
                            <div class="accordion-content">
	                            <?php
	                            $post_in = array();
	                            if  (is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
		                            foreach ( $at_all_page_items as $about ){
			                            if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
				                            $post_in[] = $about['page_id'];
			                            }
		                            }
	                            }
	                            if( !empty ( $post_in ) ) :
		                            $event_star_post_in_page_args = array(
			                            'post__in'          => $post_in,
			                            'orderby'           => 'post__in',
			                            'posts_per_page'    => count( $post_in ),
			                            'post_type'         => 'page',
			                            'no_found_rows'     => true,
			                            'post_status'       => 'publish'
		                            );
		                            $accordion_query = new WP_Query( $event_star_post_in_page_args );
		                            /*The Loop*/
		                            if ( $accordion_query->have_posts() ):
                                        $i=1;
			                            while( $accordion_query->have_posts() ):$accordion_query->the_post();
				                            $accordion_icon = $i!=1?'fa-plus':'fa-minus'
				                            ?>
                                            <div class="accordion-item <?php echo esc_attr( $animation1 );?>">
					                            <?php the_title( sprintf( '<h3 class="accordion-title"><a href="%s" rel="bookmark"><i class="accordion-icon fa '.$accordion_icon.'"></i>', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                                <div class="accordion-details">
						                            <?php the_excerpt();?>
                                                </div>
                                            </div>
				                            <?php
                                        $i++;
			                            endwhile;
		                            endif;
		                            wp_reset_postdata();
	                            endif;
	                            ?>
                            </div>
                        </div>
	                    <?php
	                    if( !empty ( $page_id ) ) :
		                    $event_star_post_in_page_args = array(
			                    'page_id'             => $page_id,
			                    'posts_per_page'      => 1,
			                    'post_type'           => 'page',
			                    'no_found_rows'       => true,
			                    'post_status'         => 'publish'
		                    );
		                    $service_query = new WP_Query( $event_star_post_in_page_args );
		                    /*The Loop*/
		                    if ( $service_query->have_posts() ):
			                    while( $service_query->have_posts() ):$service_query->the_post();
				                    ?>
                                    <div class="col-sm-6  <?php echo $animation1; ?>">
					                    <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                                        <div class="contact-page-content">
						                    <?php
						                    the_content();
						                    ?>
                                        </div>
                                    </div>
			                    <?php
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
    } // Class Event_Star_Accordion ends here
}