<?php
/**
 * Custom columns of category with various options
 *
 * @package Acme Themes
 * @subpackage Event Star
 * @since 1.0.0
 */
if ( ! class_exists( 'Event_Star_Posts_Col' ) ) {
    /**
     * Class for adding widget
     *
     * @package Acme Themes
     * @subpackage Event_Star_Posts_Col
     * @since 1.0.0
     */
    class Event_Star_Posts_Col extends WP_Widget {

        /*defaults values for fields*/
        private $defaults = array(
	        'unique_id'                 => '',
	        'event_star_widget_title'   => '',
	        'post_advanced_option'      => 'recent',
	        'event_star_post_cat'       => -1,
	        'event_star_post_tag'       => -1,
            'post_number'               => 4,
            'column_number'             => 4,
            'display_type'              => 'column',
            'orderby'                   => 'date',
            'order'                     => 'DESC',
	        'enable_prev_next'          => 1,
	        'event_star_img_size'       => 'large',
	        'background_options'        => 'default'
        );

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'event_star_posts_col',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Posts Column', 'event-star'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show posts from selected category with advanced options', 'event-star' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance                   = wp_parse_args( (array) $instance, $this->defaults);
	        $unique_id                  = esc_attr( $instance[ 'unique_id' ] );
	        $event_star_widget_title    = esc_attr( $instance['event_star_widget_title'] );
	        $post_advanced_option       = esc_attr( $instance[ 'post_advanced_option' ] );
	        $event_star_post_cat        = esc_attr( $instance['event_star_post_cat'] );
	        $event_star_post_tag        = esc_attr( $instance['event_star_post_tag'] );
	        $post_number                = absint( $instance[ 'post_number' ] );
	        $column_number              = absint( $instance[ 'column_number' ] );
	        $display_type               = esc_attr( $instance[ 'display_type' ] );
	        $orderby                    = esc_attr( $instance[ 'orderby' ] );
	        $order                      = esc_attr( $instance[ 'order' ] );
	        $enable_prev_next           = esc_attr( $instance['enable_prev_next'] );
	        $event_star_img_size        = esc_attr( $instance['event_star_img_size'] );
	        $background_options         = esc_attr( $instance['background_options'] );

	        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'unique_id' ); ?>"><?php esc_html_e( 'Section ID', 'event-star' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'unique_id' ); ?>" name="<?php echo $this->get_field_name( 'unique_id' ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','event-star')?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'event_star_widget_title' ) ); ?>">
                    <?php esc_html_e( 'Title', 'event-star' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'event_star_widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'event_star_widget_title' ) ); ?>" type="text" value="<?php echo $event_star_widget_title; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_advanced_option' ) ); ?>"><?php esc_html_e( 'Show', 'event-star' ); ?></label>
                <select class="widefat at-post-advanced-option" id="<?php echo esc_attr( $this->get_field_id( 'post_advanced_option' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_advanced_option' ) ); ?>" >
			        <?php
			        $post_advanced_options = event_star_post_advanced_options();
			        foreach ( $post_advanced_options as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $post_advanced_option ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p class="post-cat post-select">
                <label for="<?php echo esc_attr( $this->get_field_id('event_star_post_cat') ); ?>">
                    <?php esc_html_e('Select Category', 'event-star'); ?>
                </label>
                <?php
                $event_star_dropown_cat = array(
	                'show_option_none'   => false,
	                'orderby'            => 'name',
                    'order'              => 'asc',
                    'show_count'         => 1,
                    'hide_empty'         => 1,
                    'echo'               => 1,
                    'selected'           => $event_star_post_cat,
                    'hierarchical'       => 1,
                    'name'               => $this->get_field_name('event_star_post_cat'),
                    'id'                 => $this->get_field_id('event_star_post_cat'),
                    'class'              => 'widefat',
                    'taxonomy'           => 'category',
                    'hide_if_empty'      => false,
                );
                wp_dropdown_categories( $event_star_dropown_cat );
                ?>
            </p>
            <p class="post-tag post-select">
                <label for="<?php echo esc_attr( $this->get_field_id('event_star_post_tag') ); ?>">
			        <?php esc_html_e('Select Tag', 'event-star'); ?>
                </label>
		        <?php
		        $event_star_dropown_cat = array(
			        'show_option_none'   => false,
			        'orderby'            => 'name',
			        'order'              => 'asc',
			        'show_count'         => 1,
			        'hide_empty'         => 1,
			        'echo'               => 1,
			        'selected'           => $event_star_post_tag,
			        'hierarchical'       => 1,
			        'name'               => $this->get_field_name('event_star_post_tag'),
			        'id'                 => $this->get_field_name('event_star_post_tag'),
			        'class'              => 'widefat',
			        'taxonomy'           => 'post_tag',
			        'hide_if_empty'      => false,
		        );
		        wp_dropdown_categories( $event_star_dropown_cat );
		        ?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>">
			        <?php esc_html_e( 'Number of posts to show', 'event-star' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" value="<?php echo $post_number; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'event-star' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>" >
			        <?php
			        $event_star_widget_column_numbers = event_star_widget_column_number();
			        foreach ( $event_star_widget_column_numbers as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>">
                    <?php esc_html_e( 'Display Type', 'event-star' ); ?>
                </label>
                <select class="widefat at-display-select" id="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_type' ) ); ?>" >
			        <?php
			        $event_star_widget_display_types = event_star_widget_display_type();
			        foreach ( $event_star_widget_display_types as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $display_type ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'event-star' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" >
			        <?php
			        $event_star_post_orderby = event_star_post_orderby();
			        foreach ( $event_star_post_orderby as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $orderby ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'event-star' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" >
			        <?php
			        $event_star_post_order = event_star_post_order();
			        foreach ( $event_star_post_order as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $order ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <hr /><!--view all link separate-->
            <p class="at-enable-prev-next">
                <input id="<?php echo esc_attr( $this->get_field_id( 'enable_prev_next' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'enable_prev_next' ) ); ?>" type="checkbox" <?php checked( 1 == $enable_prev_next ? $instance['enable_prev_next'] : 0); ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'enable_prev_next' ) ); ?>"><?php esc_html_e( 'Enable Prev - Next on Carousel Column', 'event-star' ); ?></label>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'event_star_img_size' ) ); ?>">
			        <?php esc_html_e( 'Normal Featured Post Image', 'event-star' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'event_star_img_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'event_star_img_size' ) ); ?>">
			        <?php
			        $event_star_image_sizes = event_star_get_image_sizes_options();
			        foreach( $event_star_image_sizes as $key => $event_star_column_array ){
				        echo ' <option value="'.esc_attr( $key ).'" '.selected( $event_star_img_size, $key, 0). '>'.esc_attr( $event_star_column_array ).'</option>';
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
            <p>
                <small><?php esc_html_e( 'Note: Some of the features only work in "Home main content area" due to minimum width in other areas.' ,'event-star'); ?></small>
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
            $instance = array();
	        $instance[ 'unique_id' ]                = sanitize_key( $new_instance[ 'unique_id' ] );
	        $instance[ 'event_star_widget_title' ]  = ( isset( $new_instance['event_star_widget_title'] ) ) ? sanitize_text_field( $new_instance['event_star_widget_title'] ) : '';
	        
	        $post_advanced_options                  = event_star_post_advanced_options();
	        $instance[ 'post_advanced_option' ]     = event_star_sanitize_choice_options( $new_instance[ 'post_advanced_option' ], $post_advanced_options, 'recent' );
	        
	        $instance[ 'event_star_post_cat' ]      = ( isset( $new_instance['event_star_post_cat'] ) ) ? esc_attr( $new_instance['event_star_post_cat'] ) : '';
	        $instance[ 'event_star_post_tag' ]      = ( isset( $new_instance['event_star_post_tag'] ) ) ? esc_attr( $new_instance['event_star_post_tag'] ) : '';
	        $instance[ 'post_number' ]              = absint( $new_instance[ 'post_number' ] );
	        $instance[ 'column_number' ]            = absint( $new_instance[ 'column_number' ] );
	        
	        $event_star_widget_display_types    = event_star_widget_display_type();
	        $instance[ 'display_type' ]         = event_star_sanitize_choice_options( $new_instance[ 'display_type' ], $event_star_widget_display_types, 'column' );

	        $event_star_post_orderby            = event_star_post_orderby();
	        $instance[ 'orderby' ]              = event_star_sanitize_choice_options( $new_instance[ 'orderby' ], $event_star_post_orderby, 'date' );

	        $event_star_post_order              = event_star_post_order();
	        $instance[ 'order' ]                = event_star_sanitize_choice_options( $new_instance[ 'order' ], $event_star_post_order, 'DESC' );

	        $instance[ 'enable_prev_next' ]     = isset($new_instance['enable_prev_next'])? 1 : 0;

	        $event_star_image_sizes             = event_star_get_image_sizes_options();
	        $instance[ 'event_star_img_size' ]  = event_star_sanitize_choice_options( $new_instance[ 'event_star_img_size' ], $event_star_image_sizes, 'post-thumbnail' );

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
            $instance                   = wp_parse_args( (array) $instance, $this->defaults);
	        $unique_id                  = !empty( $instance[ 'unique_id' ] ) ? esc_attr( $instance[ 'unique_id' ] ) : esc_attr( $this->id );
	        $event_star_post_cat        = esc_attr( $instance['event_star_post_cat'] );
	        $event_star_post_tag        = esc_attr( $instance['event_star_post_tag'] );
	        $event_star_widget_title    = !empty( $instance['event_star_widget_title'] ) ? esc_attr( $instance['event_star_widget_title'] ) : get_cat_name($event_star_post_cat);
	        $event_star_widget_title    = apply_filters( 'widget_title', $event_star_widget_title, $instance, $this->id_base );
	        $post_advanced_option       = esc_attr( $instance[ 'post_advanced_option' ] );
	        $post_number                = absint( $instance[ 'post_number' ] );
	        $column_number              = absint( $instance[ 'column_number' ] );
	        $display_type               = esc_attr( $instance[ 'display_type' ] );
	        $orderby                    = esc_attr( $instance[ 'orderby' ] );
	        $order                      = esc_attr( $instance[ 'order' ] );
	        $enable_prev_next           = esc_attr( $instance['enable_prev_next'] );
	        $event_star_img_size        = esc_attr( $instance['event_star_img_size'] );

	        $background_options     = esc_attr( $instance['background_options'] );
	        $bg_gray_class          = $background_options == 'gray'?'at-gray-bg':'';
            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 1.0.0
             *
             * @see WP_Query
             *
             */
	        $sticky = get_option( 'sticky_posts' );
	        $query_args = array(
		        'posts_per_page'        => $post_number,
		        'post_status'           => 'publish',
		        'post_type'             => 'post',
		        'no_found_rows'         => 1,
		        'order'                 => $order,
		        'ignore_sticky_posts'   => true,
		        'post__not_in'          => $sticky
	        );
	        switch ( $post_advanced_option ) {

		        case 'cat' :
			        $query_args['cat'] = $event_star_post_cat;
			        break;

		        case 'tag' :
			        $query_args['tag'] = $event_star_post_tag;
			        break;
	        }

	        switch ( $orderby ) {

                case 'ID' :
		        case 'author' :
		        case 'title' :
		        case 'date' :
		        case 'modified' :
		        case 'rand' :
		        case 'comment_count' :
		        case 'menu_order' :
			        $query_args['orderby']  = $orderby;
			        break;

		        default :
			        $query_args['orderby']  = 'date';
	        }

            $event_star_featured_query = new WP_Query( $query_args );

            if ($event_star_featured_query->have_posts()) :
                echo $args['before_widget']; 
            ?>
                <section id="<?php echo esc_attr( $unique_id ); ?>" class="at-widgets acme-col-posts <?php echo $bg_gray_class;?>">
                    <div class="container">
                        <?php
                        if ( !empty( $event_star_widget_title ) ){
                            if( -1 != $event_star_post_cat ){
                                echo "<div class='at-cat-color-wrap-".$event_star_post_cat."'>";
                            }
                            echo $args['before_title'];
                            echo $event_star_widget_title;
                            echo $args['after_title'];
                            if( -1 != $event_star_post_cat ){
                                echo "</div>";
                            }
                        }
                        $div_attr = 'class="featured-entries-col '.$display_type.'"';
                        if( 'carousel' == $display_type ){
                            $div_attr = 'class="featured-entries-col acme-slick-carausel" data-column="'.absint( $column_number ).'"';
                        }
                        if( 1 == $enable_prev_next && 'carousel' == $display_type ) {
	                        echo "<span class='at-action-wrapper'>";
	                        echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
	                        echo "</span>";/*.at-action-wrapper*/
                        }
                        ?>
                        <div id="<?php echo esc_attr( $unique_id );?>" <?php echo $div_attr;?>>
                            <?php
                            $event_star_featured_index = 1;
                            while ( $event_star_featured_query->have_posts() ) :$event_star_featured_query->the_post();
                            $thumb = $event_star_img_size;
                            $event_star_list_classes = 'single-list';
                            $event_star_words = 21;
                            if( 'carousel' != $display_type ){
                                if( 1 != $event_star_featured_index && $event_star_featured_index % $column_number == 1 ){
                                    echo "<div class='clearfix'></div>";
                                }
                                if( 1 == $column_number ){
                                    $event_star_list_classes .= " col-sm-12";
                                } 
                                elseif( 2 == $column_number ){
                                    $event_star_list_classes .= " col-sm-6";
                                } 
                                elseif( 3 == $column_number ){
                                    $event_star_list_classes .= " col-sm-12 col-md-4";
                                } 
                                else{
                                    $event_star_list_classes .= " col-sm-12 col-md-3";
                                }
                            } 
                            ?>
                                <div class="<?php echo esc_attr( $event_star_list_classes ); ?>">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('init-animate zoomIn'); ?>>
                                        <div class="content-wrapper">
                                            <div class="image-wrap">
                                                <?php
                                                $no_blog_image ='';
                                                if ( has_post_thumbnail() ) {
                                                    ?>
                                                    <!--post thumbnal options-->
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail( $thumb ); ?>
                                                        </a>
                                                    </div><!-- .post-thumb-->
                                                    <?php
                                                } 
                                                else{
                                                    $no_blog_image = 'no-image';
                                                } 
                                                ?>
                                            </div>
                                            <div class="entry-content <?php echo $no_blog_image?>">
                                                <header class="entry-header <?php echo $no_blog_image; ?>">
                                                    <div class="entry-meta">
                                                        <?php
                                                        event_star_cats_lists() 
                                                        ?>
                                                    </div><!-- .entry-meta -->
                                                </header><!-- .entry-header -->
                                                <div class="entry-header-title">
                                                    <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                                </div>
                                                <?php
                                                $excerpt = event_star_excerpt_words_count( absint( $event_star_words ) );
                                                echo '<div class="details">'.wp_kses_post( wpautop( $excerpt ) ).'</div>';
                                                if( !empty( $event_star_read_more_text ) ){
                                                    ?>
                                                    <a class="btn btn-primary" href="<?php the_permalink(); ?> ">
                                                        <?php echo esc_html( $event_star_read_more_text ); ?>
                                                    </a>
                                                    <?php
                                                } 
                                                ?>
                                            </div><!-- .entry-content -->
                                        </div>
                                    </article><!-- #post-## -->
                                </div><!--dynamic css-->
                                <?php
                                $event_star_featured_index++;
                                endwhile;
                                ?>
                        </div><!--featured entries-col-->
                    </div>
                </section>
                <?php
                echo $args['after_widget'];
                echo "<div class='clearfix'></div>";
                // Reset the global $the_post as this query will have stomped on it
            endif;
            wp_reset_postdata();
        }
    } // Class Event_Star_Posts_Col ends here
}