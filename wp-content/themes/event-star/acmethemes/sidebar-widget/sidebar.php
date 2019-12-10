<?php
/**
 * Sanitize choices
 * @since Event Star 1.0.0
 * @param null
 * @return string $event_star_about_column_number
 *
 */
if ( ! function_exists( 'event_star_sanitize_choice_options' ) ) :
	function event_star_sanitize_choice_options( $value, $choices, $default ) {
		$input = wp_kses_post( $value );
		$output = array_key_exists( $input, $choices ) ? $input : $default;
		return $output;
	}
endif;

/**
 * Common functions for widgets
 *
 * @since Event Star 1.0.0
 *
 * @param null
 *
 * @return array $event_star_about_column_number
 *
 */
if ( ! function_exists( 'event_star_background_options' ) ) :
	function event_star_background_options() {
		$event_star_about_column_number = array(
			'default'   => esc_html__( 'Default', 'event-star' ),
			'gray'      => esc_html__( 'Gray', 'event-star' )
		);

		return apply_filters( 'event_star_background_options', $event_star_about_column_number );
	}
endif;

/**
 * Column Number
 *
 * @since Event Star 1.0.0
 *
 * @param null
 *
 * @return array $event_star_about_column_number
 *
 */
if ( ! function_exists( 'event_star_widget_column_number' ) ) :
	function event_star_widget_column_number() {
		$event_star_about_column_number = array(
			1 => esc_html__( '1', 'event-star' ),
			2 => esc_html__( '2', 'event-star' ),
			3 => esc_html__( '3', 'event-star' ),
			4 => esc_html__( '4', 'event-star' )
		);
		return apply_filters( 'event_star_widget_column_number', $event_star_about_column_number );
	}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function event_star_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'event-star' ),
        'id'            => 'event-star-sidebar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    if ( is_customize_preview() ) {
        $event_star_home_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'event-star' ), '<br />','<b><a class="at-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
    }
    else{
        $event_star_home_description = esc_html__( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'event-star' );
    }
    register_sidebar(array(
        'name'          => esc_html__('Home Main Content Area', 'event-star'),
        'id'            => 'event-star-home',
        'description'	=> $event_star_home_description,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title init-animate zoomIn"><span>',
        'after_title'   => '</span></h2>',
    ));

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'event-star' ),
		'id'            => 'event-star-sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar(array(
        'name'          => esc_html__('Footer Column One', 'event-star'),
        'id'            => 'footer-col-one',
        'description'   => esc_html__('Displays items on top footer section.', 'event-star'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Two', 'event-star'),
        'id'            => 'footer-col-two',
        'description'   => esc_html__('Displays items on top footer section.', 'event-star'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Three', 'event-star'),
        'id'            => 'footer-col-three',
        'description'   => esc_html__('Displays items on top footer section.', 'event-star'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Four', 'event-star'),
        'id'            => 'footer-col-four',
        'description'   => esc_html__('Displays items on top footer section.', 'event-star'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

	register_sidebar(array(
		'name'          => esc_html__('Popup Widget Area', 'event-star'),
		'id'            => 'popup-widget-area',
		'description'   => esc_html__('Displays items on Pop up', 'event-star'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));

    /*Widgets*/
	register_widget( 'Event_Star_About' );
	register_widget( 'Event_Star_Accordion' );
	register_widget( 'Event_Star_Posts_Col' );
	register_widget( 'Event_Star_Contact' );
	register_widget( 'Event_Star_Schedule' );
	register_widget( 'Event_Star_Gallery' );
	register_widget( 'Event_Star_Social' );
	register_widget( 'Event_Star_Team' );
	register_widget( 'Event_Star_Testimonial' );
	register_widget( 'Event_Star_Event' );
}
add_action( 'widgets_init', 'event_star_widgets_init' );

/* ajax callback for get_edit_post_link*/
add_action( 'wp_ajax_at_get_edit_post_link', 'event_star_get_edit_post_link' );
function event_star_get_edit_post_link(){
    if( isset( $_GET['id'] ) ){
	    $id = absint( $_GET['id'] );
	    if( get_edit_post_link( $id ) ){
		    ?>
            <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $id ) ); ?>">
			    <?php esc_html_e('Full Edit','event-star');?>
            </a>
		    <?php
	    }
	    else{
		    echo 0;
	    }
	    exit;
    }
}