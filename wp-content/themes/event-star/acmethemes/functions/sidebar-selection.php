<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('event_star_sidebar_selection') ) :
	function event_star_sidebar_selection( ) {
		wp_reset_postdata();
		$event_star_customizer_all_values = event_star_get_theme_options();
		global $post;
		if(
			isset( $event_star_customizer_all_values['event-star-single-sidebar-layout'] ) &&
			(
				'left-sidebar' == $event_star_customizer_all_values['event-star-single-sidebar-layout'] ||
				'both-sidebar' == $event_star_customizer_all_values['event-star-single-sidebar-layout'] ||
				'middle-col' == $event_star_customizer_all_values['event-star-single-sidebar-layout'] ||
				'no-sidebar' == $event_star_customizer_all_values['event-star-single-sidebar-layout']
			)
		){
			$event_star_body_global_class = $event_star_customizer_all_values['event-star-single-sidebar-layout'];
		}
		else{
			$event_star_body_global_class= 'right-sidebar';
		}

		if ( event_star_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'event_star_sidebar_layout', true );
				$event_star_wc_single_product_sidebar_layout = $event_star_customizer_all_values['event-star-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$event_star_body_classes = $post_class;
					} else {
						$event_star_body_classes = $event_star_wc_single_product_sidebar_layout;
					}
				}
				else{
					$event_star_body_classes = $event_star_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $event_star_customizer_all_values['event-star-wc-shop-archive-sidebar-layout'] ) ){
					$event_star_archive_sidebar_layout = $event_star_customizer_all_values['event-star-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $event_star_archive_sidebar_layout ||
						'left-sidebar' == $event_star_archive_sidebar_layout ||
						'both-sidebar' == $event_star_archive_sidebar_layout ||
						'middle-col' == $event_star_archive_sidebar_layout ||
						'no-sidebar' == $event_star_archive_sidebar_layout
					){
						$event_star_body_classes = $event_star_archive_sidebar_layout;
					}
					else{
						$event_star_body_classes = $event_star_body_global_class;
					}
				}
				else{
					$event_star_body_classes= $event_star_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $event_star_customizer_all_values['event-star-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $event_star_customizer_all_values['event-star-front-page-sidebar-layout'] ||
					'left-sidebar' == $event_star_customizer_all_values['event-star-front-page-sidebar-layout'] ||
					'both-sidebar' == $event_star_customizer_all_values['event-star-front-page-sidebar-layout'] ||
					'middle-col' == $event_star_customizer_all_values['event-star-front-page-sidebar-layout'] ||
					'no-sidebar' == $event_star_customizer_all_values['event-star-front-page-sidebar-layout']
				){
					$event_star_body_classes = $event_star_customizer_all_values['event-star-front-page-sidebar-layout'];
				}
				else{
					$event_star_body_classes = $event_star_body_global_class;
				}
			}
			else{
				$event_star_body_classes= $event_star_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'event_star_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$event_star_body_classes = $post_class;
				} else {
					$event_star_body_classes = $event_star_body_global_class;
				}
			}
			else{
				$event_star_body_classes = $event_star_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $event_star_customizer_all_values['event-star-archive-sidebar-layout'] ) ){
				$event_star_archive_sidebar_layout = $event_star_customizer_all_values['event-star-archive-sidebar-layout'];
				if(
					'right-sidebar' == $event_star_archive_sidebar_layout ||
					'left-sidebar' == $event_star_archive_sidebar_layout ||
					'both-sidebar' == $event_star_archive_sidebar_layout ||
					'middle-col' == $event_star_archive_sidebar_layout ||
					'no-sidebar' == $event_star_archive_sidebar_layout
				){
					$event_star_body_classes = $event_star_archive_sidebar_layout;
				}
				else{
					$event_star_body_classes = $event_star_body_global_class;
				}
			}
			else{
				$event_star_body_classes= $event_star_body_global_class;
			}
		}
		else {
			$event_star_body_classes = $event_star_body_global_class;
		}
		return $event_star_body_classes;
	}
endif;