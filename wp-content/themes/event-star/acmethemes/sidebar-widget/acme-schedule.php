<?php
/**
 * Class for adding Schedule Section Widget
 *
 * @package Acme Themes
 * @subpackage Event Star
 * @since 1.0.0
 */
if ( ! class_exists( 'Event_Star_Schedule' ) ) {

    class Event_Star_Schedule extends WP_Widget {
        /*defaults values for fields*/

        private function defaults(){
            /*defaults values for fields*/
            $defaults = array(
                'unique_id'             => '',
                'title'                 => '',
                'at_all_page_items'     => '',
                'read_more_text'        => esc_html__( 'Read More', 'event-star' ),
                'background_options'    => 'gray'
            );
            return $defaults;
        }

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'event_star_schedule',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Schedule Section', 'event-star'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show Schedule Section.', 'event-star' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance               = wp_parse_args( (array) $instance, $this->defaults() );
            /*default values*/
            $unique_id              = esc_attr( $instance[ 'unique_id' ] );
            $title                  = esc_attr( $instance[ 'title' ] );
            $at_all_page_items      = $instance['at_all_page_items'];
            $read_more_text         = esc_attr( $instance[ 'read_more_text' ] );
	        $background_options     = esc_attr( $instance['background_options'] );
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

            <!--updated code-->
            <label><?php esc_html_e( 'Enter Tab Tile and Select Pages', 'event-star' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove. Please do not forget to add Icon and Excerpt  on selected pages.', 'event-star' ); ?></small>
            <div class="at-repeater">
		        <?php
		        $total_repeater = 0;
		        if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
			        foreach ($at_all_page_items as $tab_title){
				        $select_page_id  = $this->get_field_id( 'at_all_page_items') .$total_repeater.'page_id';
				        $select_page_name  = $this->get_field_name( 'at_all_page_items' ).'['.$total_repeater.']['.'page_id'.']';

				        $tab_title_id  = $this->get_field_id( 'at_all_page_items') .$total_repeater.'tab_title';
				        $tab_title_name  = $this->get_field_name( 'at_all_page_items' ).'['.$total_repeater.']['.'tab_title'.']';
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
                                <p>
                                    <label for="<?php echo esc_attr( $tab_title_id ); ?>"><?php esc_html_e("Tab Title",'event-star'); ?></label>
                                    <input id="<?php echo esc_attr( $tab_title_id ); ?>" name="<?php echo esc_attr( $tab_title_name );?>" type="text" value="<?php echo $tab_title['tab_title']?>"/>
                                </p>
                                <?php
						        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
						        $args = array(
							        'selected'              => $tab_title['page_id'],
							        'name'                  => $select_page_name,
							        'id'                    => $select_page_id,
							        'class'                 => 'widefat at-select',
							        'show_option_none'      => esc_html__( 'Select Page', 'event-star'),
							        'option_none_value'     => 0 // string
						        );
						        wp_dropdown_pages( $args );
						        ?>
                                <div class="at-repeater-control-actions">
                                    <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','event-star');?></button> |
                                    <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','event-star');?></button>
                                    <a class="button button-link at-postid alignright" target="_blank" data-href="<?php echo admin_url( 'post.php?post=POSTID&action=edit' ); ?>" href="<?php echo admin_url( 'post.php?post='.$tab_title['page_id'].'&action=edit' ); ?>"><?php esc_html_e('Full Edit','event-star');?></a>
                                </div>
                            </div>
                        </div>
				        <?php
				        $total_repeater = $total_repeater + 1;
			        }
		        }
		        $coder_repeater_depth = 'coderRepeaterDepth_'.'0';
		        $select_page_id  = $this->get_field_id( 'at_all_page_items') .$coder_repeater_depth.'page_id';
		        $select_page_name  = $this->get_field_name( 'at_all_page_items' ).'['.$coder_repeater_depth.']['.'page_id'.']';

		        $tab_title_id  = $this->get_field_id( 'at_all_page_items') .$coder_repeater_depth.'tab_title';
		        $tab_title_name  = $this->get_field_name( 'at_all_page_items' ).'['.$coder_repeater_depth.']['.'tab_title'.']';

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
                            <p>
                                <label for="<?php echo $tab_title_id; ?>"><?php esc_html_e("Tab Title",'event-star'); ?></label>
                                <input id="<?php echo $tab_title_id; ?>" name="<?php echo $tab_title_name;?>" type="text"/>
                            </p>

                            <?php
					        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
					        $args = array(
						        'selected'              => '',
						        'name'                  => $select_page_name,
						        'id'                    => $select_page_id,
						        'class'                 => 'widefat at-select',
						        'show_option_none'      => esc_html__( 'Select Page', 'event-star'),
						        'option_none_value'     => 0 // string
					        );
					        wp_dropdown_pages( $args );
					        ?>
                            <div class="at-repeater-control-actions">
                                <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','event-star');?></button> |
                                <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','event-star');?></button>
                                <a class="button button-link at-postid alignright hidden" target="_blank" data-href="<?php echo admin_url( 'post.php?post=POSTID&action=edit' ); ?>" href=""><?php esc_html_e('Full Edit','event-star');?></a>
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
            <!--updated code-->

            <p>
                <label for="<?php echo $this->get_field_id( 'read_more_text' ); ?>"><?php esc_html_e( 'Read More Text', 'event-star' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'read_more_text' ); ?>" name="<?php echo $this->get_field_name( 'read_more_text' ); ?>" type="text" value="<?php echo $read_more_text; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'background_options' ); ?>"><?php esc_html_e( 'Background Options', 'event-star' ); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'background_options' ); ?>" name="<?php echo $this->get_field_name( 'background_options' ); ?>">
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
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'unique_id' ]        = sanitize_key( $new_instance[ 'unique_id' ] );
            $instance[ 'title' ]            = sanitize_text_field( $new_instance[ 'title' ] );

	        /*updated code*/
	        $page_ids = array();
	        if( isset($new_instance['at_all_page_items'] )){
		        $at_all_page_items    = $new_instance['at_all_page_items'];
		        if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
			        foreach ( $at_all_page_items as $index=>$tab_titles ){
				        foreach ( $tab_titles as $key=>$value ){
					        if( 'page_id' ==$key ){
						        $page_ids[$index][$key] = event_star_sanitize_page( $value );
					        }
					        else{
						        $page_ids[$index][$key] = sanitize_text_field( $value );
					        }
				        }
			        }
		        }
	        }
	        $instance['at_all_page_items'] = $page_ids;

            $instance[ 'read_more_text' ]       = sanitize_text_field( $new_instance[ 'read_more_text' ] );

	        $event_star_widget_background_options   = event_star_background_options();
	        $instance[ 'background_options' ]       = event_star_sanitize_choice_options( $new_instance[ 'background_options' ], $event_star_widget_background_options, 'default' );

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
            $at_all_page_items      = $instance['at_all_page_items'];
            $read_more_text         = esc_html( $instance[ 'read_more_text' ] );
	        $background_options     = esc_attr( $instance['background_options'] );
	        $bg_gray_class          = $background_options == 'gray'?'at-gray-bg':'';

            echo $args['before_widget'];
            ?>
            <section id="<?php echo $unique_id;?>" class="at-widgets at-schedule <?php echo $bg_gray_class;?>">
                <div class="container">
	                <?php
	                if( !empty( $title ) ) {
		                echo $args['before_title'] .esc_html( $title ).$args['after_title'];
	                }
	                ?>
                    <div class="row">
                        <?php
                        $post_in = array();
                        if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
	                        foreach ( $at_all_page_items as $about ){
		                        if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
			                        $post_in[] = $about['page_id'];
			                        if( isset( $about['tab_title'] ) && !empty( $about['tab_title'] ) ){
				                        $tab_title[$about['page_id']] = $about['tab_title'];
			                        }
		                        }
	                        }
                        }
                        if( !empty( $post_in ) ):
	                        $event_star_post_in_page_args = array(
		                        'post__in'         => $post_in,
		                        'orderby'             => 'post__in',
		                        'posts_per_page'      => count( $post_in ),
		                        'post_type'           => 'page',
		                        'no_found_rows'       => true,
		                        'post_status'         => 'publish'
	                        );
	                        $schedule_query = new WP_Query( $event_star_post_in_page_args );
	                        $animation1 = "init-animate zoomIn";
	                        /*The Loop*/
                            if ( $schedule_query->have_posts() ):
	                            echo "<div class='col-md-3 schedule-title-wrapper ".$animation1."'>";
	                            $i=0;
	                            while( $schedule_query->have_posts() ):$schedule_query->the_post();
	                                $active = ( $i == 0?'active':'' );
		                            $tab_final_title = isset( $tab_title[get_the_ID()] )?$tab_title[get_the_ID()]:'';
		                            ?>
                                    <div class="schedule-title <?php echo $active;?>">
                                        <a href="#" data-id="atdp-<?php echo esc_attr( get_the_ID() );?>">
	                                        <?php echo esc_html( $tab_final_title ); ?>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                    <?php
		                            $i++;
                                endwhile;
	                            echo "</div>";
	                            echo "<div class='col-md-9 schedule-content-wrapper ".$animation1."'>";
	                            $i=0;
	                            while( $schedule_query->have_posts() ):$schedule_query->the_post();
		                            $active = ( $i == 0 ? 'active' : '')
		                            ?>
                                    <div class="schedule-item-content <?php echo $active;?>" data-id="atdp-<?php echo esc_attr( get_the_ID() );?>">
                                        <div class="content-wrapper">
                                            <div class="entry-header-title">
		                                        <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                            </div>
	                                        <?php
	                                        the_excerpt();
	                                        if( !empty( $read_more_text ) ){
		                                        ?>
                                                <a class="btn btn-primary" href="<?php the_permalink(); ?> ">
			                                        <?php echo esc_html( $read_more_text ); ?>
                                                </a>
		                                        <?php
	                                        }
	                                        ?>
                                        </div>
                                    </div>
		                            <?php
		                            $i++;
	                            endwhile;
	                            echo "</div>";

                            else:
                                /*do nothing for now*/
                            endif;
                        endif;
                        wp_reset_postdata();
                    ?>
                    </div>
                </div>
            </section>
            <?php
            echo $args['after_widget'];
        }
    } // Class Event_Star_Schedule ends here
}