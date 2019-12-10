<?php
/**
 * Dynamic css
 * @since Event Star 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'event_star_dynamic_css' ) ) :

    function event_star_dynamic_css() {

        global $event_star_customizer_all_values;
        /*Color options */
        $event_star_header_height = esc_attr( $event_star_customizer_all_values['event-star-header-height'] );
        $event_star_primary_color = esc_attr( $event_star_customizer_all_values['event-star-primary-color'] );
        $event_star_header_top_bg_color = esc_attr( $event_star_customizer_all_values['event-star-header-top-bg-color'] );
        $event_star_footer_bg_color = esc_attr( $event_star_customizer_all_values['event-star-footer-bg-color'] );
        $event_star_footer_bottom_bg_color = esc_attr( $event_star_customizer_all_values['event-star-footer-bottom-bg-color'] );

        /*animation*/
        $event_star_enable_animation = $event_star_customizer_all_values['event-star-enable-animation'];

        $custom_css = '';
        /*animation*/
        if( 1 == $event_star_enable_animation ){
            $custom_css .= "
             .init-animate {
                visibility: visible !important;
             }
             ";
        }
        /*background*/
        $bg_image_url ='';
        if( get_header_image() ){
            $bg_image_url = esc_url( get_header_image() );
        }
        $custom_css .= "
              .inner-main-title {
                background-image:url('{$bg_image_url}');
                background-repeat:no-repeat;
                background-size:cover;
                background-attachment:fixed; 
                background-position: center;
                height: {$event_star_header_height}px;
            }";

        /*color*/
        $custom_css .= "
            .top-header{
                background-color: {$event_star_header_top_bg_color};
            }";
        $custom_css .= "
            .site-footer{
                background-color: {$event_star_footer_bg_color};
            }";
        $custom_css .= "
            .copy-right{
                background-color: {$event_star_footer_bottom_bg_color};
            }";
        $custom_css .= "
	        .site-title,
	        .site-title a,
	        .site-description,
	        .site-description a,
            a:hover,
            a:active,
            a:focus,
            .widget li a:hover,
            .posted-on a:hover,
            .author.vcard a:hover,
            .cat-links a:hover,
            .comments-link a:hover,
            .edit-link a:hover,
            .tags-links a:hover,
            .byline a:hover,
            .main-navigation .acme-normal-page .current_page_item a,
            .main-navigation .acme-normal-page .current-menu-item a,
            .main-navigation .active a,
            .main-navigation .navbar-nav >li a:hover,
            .team-item h3 a:hover,
            .news-notice-content .news-content a:hover,
            .single-item .fa,
			 .at-social .socials li a,
			 .primary-color,
			 article.post .entry-header .cat-links a,
			 #event-star-breadcrumbs a:hover,
			 .woocommerce .star-rating,
            .woocommerce ul.products li.product .star-rating,
            .woocommerce p.stars a,
            .woocommerce ul.products li.product .price,
            .woocommerce ul.products li.product .price ins .amount,
            .woocommerce a.button.add_to_cart_button:hover,
            .woocommerce a.added_to_cart:hover,
            .woocommerce a.button.product_type_grouped:hover,
            .woocommerce a.button.product_type_external:hover,
            .woocommerce .cart .button:hover,
            .woocommerce .cart input.button:hover,
            .woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce .woocommerce-info .button:hover,
			.woocommerce .widget_shopping_cart_content .buttons a.button:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a,
			.woocommerce-message::before{
                color: {$event_star_primary_color};
            }";

        /*background color*/
        $custom_css .= "
            .navbar .navbar-toggle:hover,
            .main-navigation .current_page_ancestor > a:before,
            .comment-form .form-submit input,
            .btn-primary,
            .wpcf7-form input.wpcf7-submit,
            .wpcf7-form input.wpcf7-submit:hover,
            i.slick-arrow:hover,
            .sm-up-container,
            .btn-primary.btn-reverse:before,
            #at-shortcode-bootstrap-modal .modal-header,
            .primary-bg,
            .schedule-title-wrapper .schedule-title.active a,
			.schedule-title-wrapper .schedule-title.active a i,
			.schedule-title-wrapper .schedule-title:hover a,
			.team-item:hover,
			.at-event-count-down,
			.navigation.pagination .nav-links .page-numbers.current,
			.navigation.pagination .nav-links a.page-numbers:hover,
			.widget-title::after,
			.woocommerce .product .onsale,
			.woocommerce a.button.add_to_cart_button,
			.woocommerce a.added_to_cart,
			.woocommerce a.button.product_type_grouped,
			.woocommerce a.button.product_type_external,
			.woocommerce .single-product #respond input#submit.alt,
			.woocommerce .single-product a.button.alt,
			.woocommerce .single-product button.button.alt,
			.woocommerce .single-product input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce .widget_shopping_cart_content .buttons a.button,
			.woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
			.woocommerce .cart .button,
			.woocommerce .cart input.button,
			.woocommerce input.button:disabled,
			.woocommerce input.button:disabled[disabled],
			.woocommerce input.button:disabled:hover,
			.woocommerce input.button:disabled[disabled]:hover,
			 .woocommerce nav.woocommerce-pagination ul li a:focus,
			 .woocommerce nav.woocommerce-pagination ul li a:hover,
			 .woocommerce nav.woocommerce-pagination ul li span.current,
			 .woocommerce a.button.wc-forward,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
			 .navbar .cart-wrap .acme-cart-views a span{
                background-color: {$event_star_primary_color};
                color:#fff;
            }";

        /*borders*/
	    $custom_css .= "
            .woocommerce .cart .button,
            .woocommerce .cart input.button,
            .woocommerce a.button.add_to_cart_button,
            .woocommerce a.added_to_cart,
            .woocommerce a.button.product_type_grouped,
            .woocommerce a.button.product_type_external,
            .woocommerce .cart .button,
            .woocommerce .cart input.button
            .woocommerce .single-product #respond input#submit.alt,
			.woocommerce .single-product a.button.alt,
			.woocommerce .single-product button.button.alt,
			.woocommerce .single-product input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce .widget_shopping_cart_content .buttons a.button,
			.woocommerce div.product .woocommerce-tabs ul.tabs:before{
                border: 1px solid {$event_star_primary_color};
            }";
        $custom_css .= "
            .blog article.sticky{
                border-bottom: 2px solid {$event_star_primary_color};
            }";
        wp_add_inline_style( 'event-star-style', $custom_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'event_star_dynamic_css', 99 );
