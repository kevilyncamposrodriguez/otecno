<?php
add_shortcode( 'EM', 'em_shortcode' );
function em_shortcode( $post_id ) {
	ob_start();
	// js
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'em-bootstrap-js' );
	wp_enqueue_script( 'em-jquery-classycountdown-js' );
	wp_enqueue_script( 'em-jquery-throttle-js' );
	wp_enqueue_script( 'em-jquery-knob-js' );

	// css
	wp_enqueue_style( 'em-bootstrap-css' );
	wp_enqueue_style( 'em-font-awesome-css' );
	wp_enqueue_style( 'em-style-event-monster-css' );
	wp_enqueue_style( 'em-reg-form-elements-css' );
	wp_enqueue_style( 'em-jquery-classycountdown-css' );
	wp_enqueue_style( 'em-list-styles-css' );
	wp_enqueue_style( 'em-list-pe-icon-7-stroke-css' );

	if ( isset( $post_id['id'] ) ) {
		$event_monster_output_settings = unserialize( base64_decode( get_post_meta( $post_id['id'], 'awl_em_settings_' . $post_id['id'], true ) ) );
		$em_id                         = $post_id['id'];
		$em_upload_image               = $event_monster_output_settings['em_upload_image'];
		$em_logo_size                  = $event_monster_output_settings['em_logo_size'];
		$logo_size                     = $event_monster_output_settings['logo_size'];
		$em_logo_coustom_width         = $event_monster_output_settings['em_logo_coustom_width'];
		$em_logo_coustom_height        = $event_monster_output_settings['em_logo_coustom_height'];
		$em_logo_border                = $event_monster_output_settings['em_logo_border'];
		$em_logo_border_color          = $event_monster_output_settings['em_logo_border_color'];
		$em_title_size                 = $event_monster_output_settings['em_title_size'];
		$em_title_color                = $event_monster_output_settings['em_title_color'];
		$em_title_align                = $event_monster_output_settings['em_title_align'];
		$em_start_date                 = $event_monster_output_settings['em_start_date'];
		$em_end_date                   = $event_monster_output_settings['em_end_date'];
		$em_start_time                 = $event_monster_output_settings['em_start_time'];
		$em_end_time                   = $event_monster_output_settings['em_end_time'];
		$em_address                    = $event_monster_output_settings['em_address'];
		$em_venue_phone                = $event_monster_output_settings['em_venue_phone'];
		$em_venue_email                = $event_monster_output_settings['em_venue_email'];
		$em_map                        = $event_monster_output_settings['em_map'];
		$em_map_code                   = $event_monster_output_settings['em_map_code'];
		$em_map_height                 = $event_monster_output_settings['em_map_height'];
		$em_map_opacity                = $event_monster_output_settings['em_map_opacity'];
		$em_accept_registration        = $event_monster_output_settings['em_accept_registration'];
		$em_registration_type          = $event_monster_output_settings['em_registration_type'];
		$em_reg_btn_txt                = $event_monster_output_settings['em_reg_btn_txt'];
		$em_buttons_type               = $event_monster_output_settings['em_buttons_type'];
		$em_reg_btn_align              = $event_monster_output_settings['em_reg_btn_align'];
		$em_custom_css                 = $event_monster_output_settings['em_custom_css'];

		$em_button = '';
		if ( $em_buttons_type == 'basic' ) {
			$em_button = 'btn btn-primary'; }
		if ( $em_buttons_type == 'large' ) {
			$em_button = 'btn btn-primary btn-lg'; }
		if ( $em_buttons_type == 'small' ) {
			$em_button = 'btn btn-primary btn-sm'; }
		if ( $em_buttons_type == 'extra_small' ) {
			$em_button = 'btn btn-primary btn-xs'; }

		$em_reg_btn_color    = $event_monster_output_settings['em_reg_btn_color'];
		$em_reg_btn_link     = $event_monster_output_settings['em_reg_btn_link'];
		$em_reg_btn_link_tab = $event_monster_output_settings['em_reg_btn_link_tab'];

		// social
		$em_social    = $event_monster_output_settings['em_social'];
		$em_share_btn = stripslashes( $event_monster_output_settings['em_share_btn'] );

		// organizers
		$em_organizer = $event_monster_output_settings['em_organizer'];

		// headings texts
		$em_organizer_heading = $event_monster_output_settings['em_organizer_heading'];
		$em_date_time_heading = $event_monster_output_settings['em_date_time_heading'];
		$em_location_heading  = $event_monster_output_settings['em_location_heading'];

		// countdown
		$em_countdown = $event_monster_output_settings['em_countdown'];

		// end of main sattings

		// common settings
		$em_common_settings        = unserialize( base64_decode( get_option( 'awl_em_common_settings' ) ) );
		$em_main_font_size         = $em_common_settings['em_main_font_size'];
		$em_sub_font_size          = $em_common_settings['em_sub_font_size'];
		$em_nrml_font_size         = $em_common_settings['em_nrml_font_size'];
		$em_form_first_name_field  = $em_common_settings['em_form_first_name_field'];
		$em_form_last_name_field   = $em_common_settings['em_form_last_name_field'];
		$em_form_email_field       = $em_common_settings['em_form_email_field'];
		$em_form_phone_field       = $em_common_settings['em_form_phone_field'];
		$em_form_heading_one       = $em_common_settings['em_form_heading_one'];
		$em_form_sub_heading       = $em_common_settings['em_form_sub_heading'];
		$em_form_sucsess_msg_field = $em_common_settings['em_form_sucsess_msg_field'];
		$em_booking_full_msg       = $em_common_settings['em_booking_full_msg'];

		$allslides = array( 'p'         => $em_id, 'post_type' => 'awl_event_monster', 'orderby'   => 'ASC', );
		$loop      = new WP_Query( $allslides );
		while ( $loop->have_posts() ) : $loop->the_post();

			// style event monstor
			require_once 'shortcode-css.php';
			// include event monstor output file
			require_once 'event-monster-single-output.php';
		endwhile;

	} else {
		
		$allslides = array( 'post_type' => 'awl_event_monster', 'orderby'   => 'ASC', );
		$loop      = new WP_Query( $allslides );
		
		// sorting event by upcomming dates
		$all_event_dates = array();
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				$event_id = get_the_ID();
				$event_monster_output_settings = unserialize(base64_decode(get_post_meta( get_the_ID(), 'awl_em_settings_'.get_the_ID(), true)));
				$em_id 					= $event_id;
				$em_start_date 			= $event_monster_output_settings['em_start_date'];
				$all_event_dates[$em_id] 	= $em_start_date;
			endwhile;
		}
		
		asort($all_event_dates);
		
		// remove past events
		foreach($all_event_dates as $key => $values){
			if(strtotime(date('Y-m-d')) > strtotime($values)){
				//remove past date event
				unset($all_event_dates[$key]);
			}
		}
		
		// sorted array of event ids
		$all_events_sorted_id_by_day = array();
		foreach($all_event_dates as $key => $values){
			$all_events_sorted_id_by_date[] = $key;
		}
		
		$allevents = array('post_type' => 'awl_event_monster', 'orderby' => 'post__in', 'post__in' => $all_events_sorted_id_by_date, 'posts_per_page' => 999,);
		$loop = new WP_Query( $allevents );
		
		if(!empty($all_events_sorted_id_by_date)) {
			// event list
			if ( $loop->have_posts() ) { ?>		
				<div id="em_setting_load" class="loader-wrapper loader-wrapper-4">
					<div class="em_spinner"></div>
				</div>
				<div class="module-wrapper masonry-item settings_page">  
					<section class="">
						<div class="module-inner">
							<div class="module-content collapse in" id="content-4">
								<div class="module-content-inner no-padding-bottom">
									<div class="panel-group-theme-1" id="accordion-4" role="tablist" aria-multiselectable="true">
										<?php
										$count = 1;
										while ( $loop->have_posts() ) :
											$loop->the_post();
											$post_id                       = get_the_ID();
											$event_monster_output_settings = unserialize( base64_decode( get_post_meta( get_the_ID(), 'awl_em_settings_' . get_the_ID(), true ) ) );
											// get settings from setting page
											$em_title               = get_the_title( $post_id );
											$em_id                  = $post_id;
											$em_upload_image        = $event_monster_output_settings['em_upload_image'];
											$em_logo_size           = $event_monster_output_settings['em_logo_size'];
											$logo_size              = $event_monster_output_settings['logo_size'];
											$em_logo_coustom_width  = $event_monster_output_settings['em_logo_coustom_width'];
											$em_logo_coustom_height = $event_monster_output_settings['em_logo_coustom_height'];
											$em_logo_border         = $event_monster_output_settings['em_logo_border'];
											$em_logo_border_color   = $event_monster_output_settings['em_logo_border_color'];
											$em_title_size          = $event_monster_output_settings['em_title_size'];
											$em_title_color         = $event_monster_output_settings['em_title_color'];
											$em_title_align         = $event_monster_output_settings['em_title_align'];
											$em_start_date          = $event_monster_output_settings['em_start_date'];
											$em_end_date            = $event_monster_output_settings['em_end_date'];
											$em_start_time          = $event_monster_output_settings['em_start_time'];
											$em_end_time            = $event_monster_output_settings['em_end_time'];
											$em_address             = $event_monster_output_settings['em_address'];
											$em_venue_phone         = $event_monster_output_settings['em_venue_phone'];
											$em_venue_email         = $event_monster_output_settings['em_venue_email'];
											$em_map                 = $event_monster_output_settings['em_map'];
											$em_map_code            = $event_monster_output_settings['em_map_code'];
											$em_map_height          = $event_monster_output_settings['em_map_height'];
											$em_map_opacity         = $event_monster_output_settings['em_map_opacity'];
											$em_accept_registration = $event_monster_output_settings['em_accept_registration'];
											$em_registration_type   = $event_monster_output_settings['em_registration_type'];
											$em_reg_btn_txt         = $event_monster_output_settings['em_reg_btn_txt'];
											$em_buttons_type        = $event_monster_output_settings['em_buttons_type'];
											$em_reg_btn_align       = $event_monster_output_settings['em_reg_btn_align'];
											$em_custom_css          = $event_monster_output_settings['em_custom_css'];

											$em_button = '';
											if ( $em_buttons_type == 'basic' ) {
												$em_button = 'btn btn-primary'; }
											if ( $em_buttons_type == 'large' ) {
												$em_button = 'btn btn-primary btn-lg'; }
											if ( $em_buttons_type == 'small' ) {
												$em_button = 'btn btn-primary btn-sm'; }
											if ( $em_buttons_type == 'extra_small' ) {
												$em_button = 'btn btn-primary btn-xs'; }

											$em_reg_btn_color    = $event_monster_output_settings['em_reg_btn_color'];
											$em_reg_btn_link     = $event_monster_output_settings['em_reg_btn_link'];
											$em_reg_btn_link_tab = $event_monster_output_settings['em_reg_btn_link_tab'];

											// social
											$em_social    = $event_monster_output_settings['em_social'];
											$em_share_btn = stripslashes( $event_monster_output_settings['em_share_btn'] );

											// organizers
											$em_organizer = $event_monster_output_settings['em_organizer'];

											// headings texts
											$em_organizer_heading = $event_monster_output_settings['em_organizer_heading'];
											$em_date_time_heading = $event_monster_output_settings['em_date_time_heading'];
											$em_location_heading  = $event_monster_output_settings['em_location_heading'];

											// countdown
											$em_countdown = $event_monster_output_settings['em_countdown'];

											// common settings
											$em_common_settings = unserialize( base64_decode( get_option( 'awl_em_common_settings' ) ) );

											if ( isset( $em_common_settings['em_id_for_cancellation'] ) ) {
												if ($em_id_for_cancellation = $em_common_settings['em_id_for_cancellation'] == "") 
												{
													$em_id_for_cancellation = array();
												} else {
													$em_id_for_cancellation = $em_common_settings['em_id_for_cancellation'];
												}
												
											} else {
													$em_id_for_cancellation = array();
												}

											$em_main_font_size        = $em_common_settings['em_main_font_size'];
											$em_sub_font_size         = $em_common_settings['em_sub_font_size'];
											$em_nrml_font_size        = $em_common_settings['em_nrml_font_size'];
											$em_form_first_name_field = $em_common_settings['em_form_first_name_field'];
											$em_form_last_name_field  = $em_common_settings['em_form_last_name_field'];
											$em_form_email_field      = $em_common_settings['em_form_email_field'];
											$em_form_phone_field      = $em_common_settings['em_form_phone_field'];

											if ( isset( $em_common_settings['em_form_heading_one'] ) ) {
												$em_form_heading_one = $em_common_settings['em_form_heading_one'];
											} else {
												$em_form_heading_one = '';
											}

											if ( isset( $em_common_settings['em_form_sub_heading'] ) ) {
												$em_form_sub_heading = $em_common_settings['em_form_sub_heading'];
											} else {
												$em_form_sub_heading = '';
											}
											if ( isset( $em_common_settings['em_form_sucsess_msg_field'] ) ) {
												$em_form_sucsess_msg_field = $em_common_settings['em_form_sucsess_msg_field'];
											} else {
												$em_form_sucsess_msg_field = '';
											}
											if ( isset( $em_common_settings['em_booking_full_msg'] ) ) {
												$em_booking_full_msg = $em_common_settings['em_booking_full_msg'];
											} else {
												$em_booking_full_msg = '';
											}
											if ( isset( $em_common_settings['em_cncl_notifi_msg'] ) ) {
												$em_cncl_notifi_msg = $em_common_settings['em_cncl_notifi_msg'];
											} else {
												$em_cncl_notifi_msg = '';
											}
											?>
										<!--event css-->
											<?php include 'shortcode-css.php'; ?>
										
										<figure class="panel panel-default event-pannel-1">
											<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingOne-<?php echo esc_attr( $count ); ?>"  data-toggle="collapse" data-parent="#accordion-4" href="#collapseOne-<?php echo esc_attr( $count ); ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo esc_attr( $count ); ?>">
												<a data-toggle="collapse" data-parent="#accordion-4" href="#collapseOne-<?php echo esc_attr( $count ); ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo esc_attr( $count ); ?>">
													<!--Event List Item -->
													<ul class="event-list">
														<li onclick="return SingleEvent<?php echo esc_attr( $em_id ); ?>('singleeventshow','<?php echo esc_attr( $em_id ); ?>');">
															<?php
															$time  = strtotime( $em_start_date );
															$day   = date( 'd', $time );
															$month = date( 'M', $time );
															?>
															<time class="
															<?php
															if ( ! $em_upload_image ) {
																?>
																 em_list_time <?php } ?>" >
																<span class="em-day"><?php echo esc_html( $day ); ?></span>
																<span class="em-month"><?php echo esc_html( $month ); ?></span>
															</time>
															<?php
															if ( $em_upload_image ) {
																// store the image ID in a var
																$em_list_image_id    = pippin_get_image_id( $em_upload_image );
																$em_list_image_thumb = wp_get_attachment_image_src( $em_list_image_id );
																?>
															<img src="<?php echo esc_url( $em_list_image_thumb[0] ); ?>" />
															<?php } ?>
															<div class="info">
															<?php if ( in_array( $em_id, $em_id_for_cancellation ) ) { ?>
																<div class="rubber_stamp"><?php esc_html_e("Cancelled"); ?></div>
																<?php } ?>
																<span class="title"><?php echo esc_html( $em_title ); ?></span>
																<!--<span class="btn btn-primary btn-square"> EVENT CANCELLED</span>-->
																<span class="desc"><i class="pe-7s-map-marker em_list_loc_icon"></i> <?php echo esc_html( $em_address ); ?></span>
																<?php
																// get WordPress date time format and timezone
																$timezone_setting_string = get_option( 'timezone_string' );
																if ( ! $timezone_setting_string ) {
																	date_default_timezone_set( 'Asia/Kolkata' );
																} else {
																	date_default_timezone_set( $timezone_setting_string );
																}
																$em_date_format    = get_option( 'date_format' );
																$em_time_format    = get_option( 'time_format' );
																$em_start_date_val = date( $em_date_format, strtotime( $em_start_date ) );
																$em_end_date_val   = date( $em_date_format, strtotime( $em_end_date ) );
																$em_start_time_val = date( $em_time_format, strtotime( $em_start_time ) );
																$em_end_time_val   = date( $em_time_format, strtotime( $em_end_time ) );
																?>
																<span class="em_desc_time"><i class="pe-7s-clock em_list_time_icon"></i> <?php echo esc_attr( $em_start_time_val . ' - ' . $em_end_time_val ); ?></span>
															</div>
														</li>
													</ul>
												</a>
											</div>
											<div id="collapseOne-<?php echo esc_attr( $count ); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne-<?php echo esc_attr( $count ); ?>">
												<?php if ( in_array( $em_id, $em_id_for_cancellation ) ) { ?>
													<div class="panel-body">
														<div class="col-md-12 em_well em_title_align">
															<span><?php echo esc_html( $em_cncl_notifi_msg ); ?></span>
														</div>
													</div>
													<?php } else { ?>
													<div class="panel-body" id="event-show-<?php echo esc_attr( $em_id ); ?>">
														<div id="single_load_<?php echo esc_attr( $em_id ); ?>" class="loader-wrapper loader-wrapper-4" style="display: none; padding:50px;">
															<div class="em_spinner"></div>
														</div>
													</div>
												<?php } ?>
											</div>
											<?php include 'event-monster-output.php'; ?>
										</figure>
										<script>
										jQuery( document ).ready(function() {
											jQuery('#em_setting_load').hide();
											jQuery(".module-wrapper").css("opacity", 1);
										});
										function SingleEvent<?php echo esc_js( $em_id ); ?>(action, id) {
											jQuery("#single_load_<?php echo esc_js( $em_id ); ?>").show();
											if (action == "singleeventshow") {
												jQuery.ajax({
													type: 'POST',
													url: location.href,
													data: '&action=' + action + "&id=" + id,
													success: function(response) {
														jQuery("#event-show-"+id ).show();
														jQuery('#event-show-'+id ).html(jQuery(response).find('div.inner-div-'+id));
														jQuery("#single_load_<?php echo esc_js( $em_id ); ?>").hide();
													}
												});
											}
										}
										</script>
											<?php
											// include event monstor output file
											$count++;
										endwhile;
										?>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<?php
			}
		}
	}
	wp_reset_query();
	return ob_get_clean();
}
?>
