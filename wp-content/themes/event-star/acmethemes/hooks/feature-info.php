<?php
/**
 * Display Feature Columns
 * @since Event Star 1.0.0
 *
 * @return void
 *
 */
if ( !function_exists('event_star_feature_info') ) :
	function event_star_feature_info() {
		global $event_star_customizer_all_values;
		$event_star_feature_info_number = $event_star_customizer_all_values['event-star-feature-info-number'];
		echo '<div class="info-icon-box-wrapper"><div class="container primary-bg">';
		$column = $number = $event_star_feature_info_number;

		$event_star_basic_info_data = array();

		$event_star_first_info_icon = $event_star_customizer_all_values['event-star-first-info-icon'] ;
		$event_star_first_info_title = $event_star_customizer_all_values['event-star-first-info-title'];
		$event_star_first_info_desc = $event_star_customizer_all_values['event-star-first-info-desc'];
		$event_star_basic_info_data[] = array(
			"icon"  => $event_star_first_info_icon,
			"title" => $event_star_first_info_title,
			"desc"  => $event_star_first_info_desc
		);

		$event_star_second_info_icon = $event_star_customizer_all_values['event-star-second-info-icon'] ;
		$event_star_second_info_title = $event_star_customizer_all_values['event-star-second-info-title'];
		$event_star_second_info_desc = $event_star_customizer_all_values['event-star-second-info-desc'];
		$event_star_basic_info_data[] = array(
			"icon"  => $event_star_second_info_icon,
			"title" => $event_star_second_info_title,
			"desc"  => $event_star_second_info_desc
		);

		$event_star_third_info_icon = $event_star_customizer_all_values['event-star-third-info-icon'] ;
		$event_star_third_info_title = $event_star_customizer_all_values['event-star-third-info-title'];
		$event_star_third_info_desc = $event_star_customizer_all_values['event-star-third-info-desc'];
		$event_star_basic_info_data[] = array(
			"icon"  => $event_star_third_info_icon,
			"title" => $event_star_third_info_title,
			"desc"  => $event_star_third_info_desc
		);

		$event_star_forth_info_icon = $event_star_customizer_all_values['event-star-forth-info-icon'] ;
		$event_star_forth_info_title = $event_star_customizer_all_values['event-star-forth-info-title'];
		$event_star_forth_info_desc = $event_star_customizer_all_values['event-star-forth-info-desc'];
		$event_star_basic_info_data[] = array(
			"icon"  => $event_star_forth_info_icon,
			"title" => $event_star_forth_info_title,
			"desc"  => $event_star_forth_info_desc
		);

		if( $column == 1 ){
			$col= "col-md-12";
		}
        elseif( $column == 2 ){
			$col= "col-md-6";
		}
        elseif( $column == 3 ){
			$col= "col-md-4";
		}
		else{
			$col= "col-md-3";
		}

		$col .= " init-animate zoomIn";

		$i=0;
		echo "<div class='row'>";
		foreach ( $event_star_basic_info_data as $base_basic_info_data) {
			if( $i >= $number ){
				break;
			}
			?>
            <div class="info-icon-box <?php echo esc_attr( $col );?>">
				<?php
				if( !empty( $base_basic_info_data['icon'])){
					?>
                    <div class="info-icon">
                        <i class="fa <?php echo esc_attr( $base_basic_info_data['icon'] );?>"></i>
                    </div>
					<?php
				}
				if( !empty( $base_basic_info_data['title']) || !empty( $base_basic_info_data['desc']) ){
					?>
                    <div class="info-icon-details">
						<?php
						if( !empty( $base_basic_info_data['title']) ){
							echo '<h6 class="icon-title">'.esc_html( $base_basic_info_data['title'] ).'</h6>';
						}
						if( !empty( $base_basic_info_data['desc']) ){
							echo '<span class="icon-desc">'.wp_kses_post( $base_basic_info_data['desc'] ).'</span>';
						}
						?>
                    </div>
					<?php
				}
				?>
            </div>
			<?php
			$i++;
		}
		echo "</div>";/*row*/
		echo "</div></div>";/*container/infowrapper*/
	}
endif;
add_action( 'event_star_action_feature_info', 'event_star_feature_info', 20 );