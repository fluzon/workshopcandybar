<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_set_global' ) ) :
    function event_star_set_global() {
        /*Getting saved values start*/
        $event_star_saved_theme_options = event_star_get_theme_options();
        $GLOBALS['event_star_customizer_all_values'] = $event_star_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'event_star_action_before_head', 'event_star_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_doctype' ) ) :
    function event_star_doctype() {
        ?><!DOCTYPE html><html <?php language_attributes(); ?>>
        <?php
    }
endif;
add_action( 'event_star_action_before_head', 'event_star_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_before_wp_head' ) ) :

    function event_star_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="//gmpg.org/xfn/11">
        <?php
    }
endif;
add_action( 'event_star_action_before_wp_head', 'event_star_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_body_class' ) ) :

    function event_star_body_class( $event_star_body_classes ) {

        global $event_star_customizer_all_values;
        $event_star_enable_animation = $event_star_customizer_all_values['event-star-enable-animation'];
        /*wow animation*/
        if( 1 != $event_star_enable_animation ){
            $event_star_body_classes[] = 'acme-animate';
        }
        $event_star_body_classes[] = event_star_sidebar_selection();

        return $event_star_body_classes;
    }
endif;
add_action( 'body_class', 'event_star_body_class', 10, 1 );

/**
 * Start site div
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_site_start' ) ) :

    function event_star_site_start() {
        ?>
        <div class="site" id="page">
        <?php
    }
endif;
add_action( 'event_star_action_before', 'event_star_site_start', 20 );

/**
 * Skip to content
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_skip_to_content' ) ) :

    function event_star_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'event-star' ); ?></a>
        <?php
    }
endif;
add_action( 'event_star_action_before_header', 'event_star_skip_to_content', 10 );

/**
 * Main header
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'event_star_header' ) ) :
    function event_star_header() {
        global $event_star_customizer_all_values;
        $event_star_enable_header_top = $event_star_customizer_all_values['event-star-enable-header-top'];
        if( 1 == $event_star_enable_header_top ){
            ?>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <?php
                                $event_star_header_top_menu_display_selection = $event_star_customizer_all_values['event-star-header-top-menu-display-selection'];
                                $event_star_header_top_news_display_selection = $event_star_customizer_all_values['event-star-header-top-news-display-selection'];
                                $event_star_header_top_social_display_selection = $event_star_customizer_all_values['event-star-header-top-social-display-selection'];

                                if( 'left' == $event_star_header_top_menu_display_selection ){
                                    do_action('event_star_action_top_menu');
                                }
                                if( 'left' == $event_star_header_top_social_display_selection ){
                                    do_action('event_star_action_social_links');
                                }
                                if( 'left' == $event_star_header_top_news_display_selection ){
                                    do_action('event_star_action_newsnotice');
                                }
                            ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php
                                if( 'right' == $event_star_header_top_menu_display_selection ){
                                    do_action('event_star_action_top_menu');
                                }
                                if( 'right' == $event_star_header_top_social_display_selection ){
                                    do_action('event_star_action_social_links');
                                }
                                if( 'right' == $event_star_header_top_news_display_selection ){
                                    do_action('event_star_action_newsnotice');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        $event_star_nav_class = '';
        $event_star_enable_sticky = $event_star_customizer_all_values['event-star-enable-sticky'];
        if( 1 == $event_star_enable_sticky ){
            $event_star_nav_class .= ' event-star-sticky';
        }
        ?>
        <div class="navbar at-navbar <?php echo $event_star_nav_class; ?>" id="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
                    <?php
                    $event_star_display_site_logo = $event_star_customizer_all_values['event-star-display-site-logo'];
	                $event_star_display_site_title = $event_star_customizer_all_values['event-star-display-site-title'];
	                $event_star_display_site_tagline = $event_star_customizer_all_values['event-star-display-site-tagline'];
	                
                    if( 1== $event_star_display_site_logo || 1 == $event_star_display_site_title || 1 == $event_star_display_site_tagline ):
                        if ( 1 == $event_star_display_site_logo && function_exists( 'the_custom_logo' ) ):
                            the_custom_logo();
                        endif;
                        if ( 1== $event_star_display_site_title  ):
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </p>
                            <?php endif;
                        endif;
                        if ( 1== $event_star_display_site_tagline  ):
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo esc_html( $description ); ?></p>
                            <?php endif;
                        endif;
                    endif;
                    ?>
                </div>
                <div class="search-woo desktop-only">
                    <?php
                    $event_star_menu_right_button_link_options = $event_star_customizer_all_values['event-star-menu-right-button-options'];
                    $event_star_button_title = $event_star_customizer_all_values['event-star-menu-right-button-title'];
                    $event_star_button_link = $event_star_customizer_all_values['event-star-menu-right-button-link'];
                    if( 'disable' != $event_star_menu_right_button_link_options ){
                        $event_star_button_title = !empty( $event_star_button_title )?$event_star_button_title:esc_html__('Event Booking','event-star');
                        if( 'booking' == $event_star_menu_right_button_link_options ){
                          ?>
                           <a class="featured-button btn btn-primary hidden-xs hidden-sm hidden-xs" href="#" data-toggle="modal" data-target="#at-shortcode-bootstrap-modal"><?php echo esc_html( $event_star_button_title ); ?></a>
                          <?php
                        }
                        else{
                        ?>
                            <a class="featured-button btn btn-primary hidden-xs hidden-sm hidden-xs" href="<?php echo esc_url( $event_star_button_link ); ?>"><?php echo esc_html( $event_star_button_title ); ?></a>
                        <?php
                        }
                    }
                    $event_star_enable_woo_cart = $event_star_customizer_all_values['event-star-enable-cart-icon'];

                    if( 1 == $event_star_enable_woo_cart && class_exists( 'WooCommerce' ) ) {
                        $cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();
                        ?>
                        <div class="cart-wrap">
                            <div class="acme-cart-views">
                                <a href="<?php echo esc_url( $cart_url ); ?>" class="cart-contents">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="cart-value"><?php echo wp_kses_post ( WC()->cart->cart_contents_count ); ?></span>
                                </a>
                            </div>
                            <?php the_widget( 'WC_Widget_Cart', '' ); ?>
                        </div>
                        <?php
                     }
                     ?>
                </div>

                <div class="main-navigation navbar-collapse collapse">
                    <?php
                    if( is_front_page() && !is_home() && has_nav_menu( 'one-page') ){
                        wp_nav_menu(
                            array(
                                'theme_location' => 'one-page',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'nav navbar-nav navbar-right acme-one-page',
                                'container' => false,
                            )
                        );
                    }
                    else{
                         wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'nav navbar-nav navbar-right acme-normal-page',
                                'container' => false
                            )
                        );
                    }
                   ?>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <?php
    }
endif;
add_action( 'event_star_action_header', 'event_star_header', 10 );