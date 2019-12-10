<?php
/**
 * Display Social Links
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('event_star_social_links') ) :

    function event_star_social_links( ) {

        global $event_star_customizer_all_values;
        $event_star_social_data = json_decode( $event_star_customizer_all_values['event-star-social-data'] );
        if( is_array( $event_star_social_data )){
            echo '<ul class="socials at-display-inline-block">';
	        foreach ( $event_star_social_data as $social_data ){
		        $icon = $social_data->icon;
		        $link = $social_data->link;
		        $checkbox = $social_data->checkbox;
		        echo '<li>';
		        echo '<a href="'.esc_url( $link ).'" target="'.($checkbox == 1? '_blank':'').'">';
		        echo '<i class="fa '.esc_attr( $icon ).'"></i>';
		        echo '</a>';
		        echo '</li>';
	        }
	        echo '</ul>';
        }
    }
endif;
add_action( 'event_star_action_social_links', 'event_star_social_links', 10 );

if ( !function_exists('event_star_newsnotice') ) :

	function event_star_newsnotice( ) {
		global $event_star_customizer_all_values;
		$event_star_newsnotice_cat = $event_star_customizer_all_values['event-star-newsnotice-cat'];
		if( 0 != $event_star_newsnotice_cat ){
			$recent_args = array(
				'numberposts'   => 5,
				'post_status'   => 'publish',
				'category'      => $event_star_newsnotice_cat
			);
			$recent_posts = wp_get_recent_posts( $recent_args );
			if ( !empty( $recent_posts ) ):
				if ( !empty( $event_star_customizer_all_values['event-star-newsnotice-title'] ) ){
					$bn_title = $event_star_customizer_all_values['event-star-newsnotice-title'];
				}
				else{
					$bn_title = esc_html__( 'Recent posts', 'event-star' );
				}
				?>
				<div class="top-header-latest-posts at-display-inline-block">
					<div class="bn-title at-display-inline-block">
						<?php echo esc_html( $bn_title ); ?>
					</div>
					<div class="news-notice-content at-display-inline-block">
						<?php foreach ($recent_posts as $recent): ?>
							<span class="news-content">
								<a href="<?php echo esc_url( get_permalink($recent["ID"]) ); ?>" title="<?php echo esc_attr($recent['post_title']); ?>">
									<?php echo esc_html( $recent['post_title'] ); ?>
								</a>
							</span>
						<?php endforeach; ?>
					</div>
				</div> <!-- .header-latest-posts -->
				<?php
			endif;
		}
	}
endif;
add_action( 'event_star_action_newsnotice', 'event_star_newsnotice', 10 );

if ( !function_exists('event_star_action_top_menu') ) :

	function event_star_action_top_menu( ) {
		echo "<div class='at-first-level-nav at-display-inline-block text-right'>";
		wp_nav_menu(
			array(
				'theme_location' => 'top-menu',
				'container' => false,
				'depth' => 1
			)
		);
		echo "</div>";
	}
endif;
add_action( 'event_star_action_top_menu', 'event_star_action_top_menu', 10 );