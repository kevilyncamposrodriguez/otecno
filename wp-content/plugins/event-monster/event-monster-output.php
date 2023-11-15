<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( isset( $_POST['action'] ) ) {
	$id     = $em_id;
	$action = $_POST['action'];
	if ( $id == $em_id ) { ?>
		<div id="event-show-<?php echo esc_attr( $id ); ?>">
			<div class="inner-div-<?php echo esc_attr( $id ); ?>">
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

				<!--Event Monstor Main-->
					<div class="awl_em_main_div" style="padding-left:15px !important; padding-right:15px !important;">
						<!-- event logo-->
						<div class="em_display_logo">
							<?php if ( $em_upload_image ) { ?>
							<div class="em_display_logo_image row text-center">
								<img src="<?php echo esc_url( $em_upload_image ); ?>" id="" class="responsive em_display_banner_<?php echo esc_attr( $em_id ); ?>">
							</div>
							<?php } ?>
						</div>
						
						<!--event title-->
						<?php
						$em_title = get_the_title();
						if ( $em_title ) {
							?>
						<div id="event_heading" class="row ">
							<div class="col-md-12 em_well em_title_align">
								<p class="em_display_title_<?php echo esc_attr( $em_id ); ?>"><?php echo esc_html( $em_title ); ?></p>
							</div>
						</div>
						<?php } ?>
						
						<!--event discription-->
						<?php
						$em_desc = apply_filters('the_content', get_the_content()); 
						if($em_desc) { ?>
							<div class="row em_well">
								<div class="em_display_desc_<?php echo esc_attr( $em_id ); ?>"><?php echo $em_desc; ?></div>
							</div>
							<?php
						} ?>
						
						<!-- organizers -->
						<?php if ( $em_organizer ) { ?>
						<div class="row em_well">
							<?php if ( $em_organizer_heading ) { ?>
							<h2 class="em_main_font_size"><?php esc_html_e( $em_organizer_heading, 'event-monster' ); ?></h2>
							<hr class="em_hr">
							<?php } ?>
							<p class="em_nrml_font_size em_pop">
							<i class="fa fa-microphone" aria-hidden="true"></i>
							<?php for ( $i = 0; $i < $em_organizer; $i++ ) { ?>
								 | <a href="#event_heading" data-toggle="popover" data-html="true" data-placement="top" title="Organizer's Details" data-content="Name : <?php echo esc_html( $event_monster_output_settings['em_organizer_name'][ $i ] ); ?> <br>
										<?php
										if ( $event_monster_output_settings['em_organizer_phone'][ $i ] ) {
											?>
										Phone : <?php echo esc_attr( $event_monster_output_settings['em_organizer_phone'][ $i ] ); ?> <br>
											<?php
										} if ( $event_monster_output_settings['em_organizer_email'][ $i ] ) {
											?>
										Email : <?php echo esc_html( $event_monster_output_settings['em_organizer_email'][ $i ] ); ?> <br>
											<?php
										} if ( $event_monster_output_settings['em_organizer_website'][ $i ] ) {
											?>
										Website : <?php echo esc_url( $event_monster_output_settings['em_organizer_website'][ $i ] ); } ?>"><?php echo esc_html( $event_monster_output_settings['em_organizer_name'][ $i ] ); ?></a> 
							<?php } ?>
							</p>
						</div>
						<?php } ?>
						
						<!--event countdown-->
						<?php
						if ( $em_countdown == 'on' ) {
							$event_date_tstmp  = strtotime( date( 'Y-m-d H:i:s', strtotime( "$em_start_date $em_start_time" ) ) );
							$currnt_date_tstmp = strtotime( date( 'Y-m-d H:i:s' ) );
							if ( $event_date_tstmp > $currnt_date_tstmp ) {
								?>
						<div class="row em_well em_coundown">
							<div id="countdown9-<?php echo esc_attr( $em_id ); ?>" class="ClassyCountdownDemo"></div>
						</div>
								<?php
							}
						} ?>
						
						<!--event details-->
						<div class="row bg_gary em_details">
							<div class="col-md-6 em_detail em_well">
								<?php if ( $em_date_time_heading ) { ?>
								<h2 class="em_main_font_size"><?php esc_html_e( $em_date_time_heading, 'event-monster' ); ?></h2>
								<hr class="em_hr">
								<?php } ?>
								<p class="em_nrml_font_size"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo esc_attr( $em_start_date_val ); ?>
								<?php
								if ( $em_start_date_val != $em_end_date_val ) { ?>
									 - <?php echo esc_attr( $em_end_date_val ); 
								} ?></p>
								<p class="em_nrml_font_size"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo esc_attr( $em_start_time_val ); ?> - <?php echo esc_attr( $em_end_time_val ); ?></p>
							</div>
							<div class="col-md-6 em_detail em_well">
								<?php if ( $em_location_heading ) { ?>
								<h2 class="em_main_font_size"><?php esc_html_e( $em_location_heading, 'event-monster' ); ?></h2>
								<hr class="em_hr">
								<?php } ?>
								<p class="em_nrml_font_size"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo esc_html( $em_address ); ?></p>
								<?php if ( $em_venue_phone ) { ?>
								<p class="em_nrml_font_size"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_attr( $em_venue_phone ); ?></p>
									<?php
								}
								if ( $em_venue_email ) {
									?>
								<p class="em_nrml_font_size"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo esc_html( $em_venue_email ); ?></p>
								<?php } ?>
							</div>
						</div>
						
						<!--google map-->
						<?php if ( $em_map == 'on' ) { ?>
						<div class="row em_google_map">
							<?php echo stripslashes($em_map_code); ?>
						</div>
						<?php } ?>
						
						<!--registration form-->
						<?php
						if ( $em_accept_registration == 'yes' ) { ?>
							<div class="row em_well em_booking_field">
								<?php
								if ( $em_registration_type == 'external' ) { ?>
									<div class="em_reg_btn_align">
									<a href="<?php echo esc_url( $em_reg_btn_link ); ?>" target="<?php echo esc_attr( $em_reg_btn_link_tab ); ?>" id="em-book-ticket-ex" name="em-book-ticket-ex"><button class="<?php echo esc_attr( $em_button ); ?>  em_reg_btn_size"><?php echo esc_html( $em_reg_btn_txt ); ?></button></a>
									</div>
									<?php
								} ?>
								<!--Loading Icon-->
								<div id="em_input_load-<?php echo esc_attr( $em_id ); ?>" class="em-loader-wrapper" style="display: none;">
									<div id="em-loader"></div>
								</div>
								<?php
								if ( $em_registration_type == 'internal' ) { ?>
									<div class="em_reg_btn_align">
										<button type="button" class="<?php echo esc_attr( $em_button ); ?>  em_reg_btn_size" id="em-book-ticket-<?php echo esc_attr( $em_id ); ?>" name="em-book-ticket"><?php echo esc_html( $em_reg_btn_txt ); ?></button>
									</div>
										<!--Ticket Booking Form-->
										<?php
										$booked_tickets = 0;
										// calculation of remain tickets
										global $wpdb;
										$sum_booked_tickets_array = array();
										$booking_table            = $wpdb->prefix . 'em_bookings';
										$booked_results           = $wpdb->get_results( "SELECT * FROM `$booking_table` WHERE `event_id` = '$em_id'" );
										if ( $booked_results ) {
											$booked_tickets = count( $booked_results );
										}
										$em_tkt_quantities = $event_monster_output_settings['em_tkt_quantity'];
										?>
										<form id="em_tkt_book_form-<?php echo esc_attr( $em_id ); ?>" name="em_tkt_book_form">
											<div class="form-box form-box-<?php echo esc_attr( $em_id ); ?> text-center" id="form_box_div" name="form_box_div"  style="display:none;">
												<?php
												if ( ( $em_tkt_quantities - $booked_tickets ) == 0 ) { ?>
													<div class="form-bottom">
														<span class="booked_tickets" ><?php esc_html_e( $em_booking_full_msg, 'event-monster' ); ?></span>
													</div>
													<?php
												} else { ?>
													<div class="form-top">
														<div class="form-top-left">
															<h3  class="em_sub_font_size" ><?php esc_html_e( $em_form_heading_one, 'event-monster' ); ?></h3>
															<p class="em_nrml_font_size"><?php esc_html_e( $em_form_sub_heading, 'event-monster' ); ?></p>
														</div>
														<div class="form-top-right">
															<i class="form_close fa fa-close"></i>
														</div>
													</div>

													<div class="form-bottom">
														<div class="registration-form">
															<div class="form-group">
																<label class="sr-only" for="form-first-name-<?php echo esc_attr( $em_id ); ?>"><?php esc_html_e( $em_form_first_name_field, 'event-monster' ); ?></label>
																<input type="text" name="form-first-name" placeholder="<?php esc_html_e( $em_form_first_name_field, 'event-monster' ); ?>" class="form-first-name form-control em_tck_input" id="form-first-name-<?php echo esc_attr( $em_id ); ?>">
															</div>
															<div class="form-group">
																<label class="sr-only" for="form-last-name-<?php echo esc_attr( $em_id ); ?>"><?php esc_html_e( $em_form_last_name_field, 'event-monster' ); ?></label>
																<input type="text" name="form-last-name" placeholder="<?php esc_html_e( $em_form_last_name_field, 'event-monster' ); ?>" class="form-last-name form-control em_tck_input" id="form-last-name-<?php echo esc_attr( $em_id ); ?>">
															</div>
															<div class="form-group">
																<label class="sr-only" for="form-email-<?php echo esc_attr( $em_id ); ?>"><?php esc_html_e( $em_form_email_field, 'event-monster' ); ?></label>
																<input type="text" name="form-email" placeholder="<?php esc_html_e( $em_form_email_field, 'event-monster' ); ?>" class="form-email form-control em_tck_input" id="form-email-<?php echo esc_attr( $em_id ); ?>">
															</div>
															<div class="form-group">
																<label class="sr-only" for="form-phone-<?php echo esc_attr( $em_id ); ?>"><?php esc_html_e( $em_form_phone_field, 'event-monster' ); ?></label>
																<input type="text" name="form-phone" placeholder="<?php esc_html_e( $em_form_phone_field, 'event-monster' ); ?>" class="form-phone form-control em_tck_input" id="form-phone-<?php echo esc_attr( $em_id ); ?>">
															</div>
															<div class="em_reg_btn_align">
																<button type="button" class="<?php echo esc_attr( $em_button ); ?>  em_reg_btn_size" onclick="return ApplyCouponTicket_<?php echo esc_attr( $em_id ); ?>('bookticket', '<?php echo esc_attr( $em_id ); ?>');"><i class="fa fa-ticket"></i> <?php esc_html_e( 'Book', 'event-monster' ); ?></button>
															</div>
														</div>
													</div>
													<?php
												} ?>
											</div>
										</form>
										<div class="alert alert-info em_frm_success_msg-<?php echo esc_attr( $em_id ); ?>" style="display:none;">
											<i class="fa_sucsess_close fa fa-close"></i>
											<span><?php esc_html_e( $em_form_sucsess_msg_field, 'event-monster' ); ?></span>
										</div>
										<?php
										// save booking details
										if ( isset( $_POST['action'] ) ) {
											global $wpdb;
											$action = $_POST['action'];
											$id     = $_POST['id'];

											$booking_table   = $wpdb->prefix . 'em_bookings';
											$attendees_table = $wpdb->prefix . 'em_attendees';
											if ( $action == 'bookticket' && $id == $em_id ) {
												$em_tkt_ids             = array( '1' => 1 );
												$em_tkt_quantity        = 1;
												$coupon_id              = '';
												$em_attendee_first_name = sanitize_text_field( $_POST['form-first-name'] );
												$em_attendee_last_name  = sanitize_text_field( $_POST['form-last-name'] );
												$em_attendee_email      = sanitize_email( $_POST['form-email'] );
												$em_attendee_phone      = sanitize_text_field( $_POST['form-phone'] );

												// register attendee and get its id
												$em_attendees     = $wpdb->insert(
													$attendees_table,
													array(
														'event_id' => $em_id,
														'ticket_id' => serialize( $em_tkt_ids ),
														'first_name' => $em_attendee_first_name,
														'last_name' => $em_attendee_last_name,
														'email' => $em_attendee_email,
														'phone' => $em_attendee_phone,
														'extra' => '',
													)
												);
												$last_attendee_id = $wpdb->insert_id;

												// booking table data insert
												$grand_total_amount = 0;
												$em_bookings        = $wpdb->insert(
													$booking_table,
													array(
														'event_id' => $em_id,
														'ticket_id' => serialize( $em_tkt_ids ),
														'amount' => $grand_total_amount,
														'coupon_id' => $coupon_id,
														'attendees_id' => $last_attendee_id,
														'booking_type' => 'free',
														'payment_id' => '',
														'status' => 'compeleted',
														'extra' => '',
													)
												);
												$last_booking_id    = $wpdb->insert_id;

												// send email to user
												 $em_free_attendee_result = $wpdb->get_row( "SELECT * FROM `$attendees_table` WHERE `id` LIKE '$last_attendee_id'" );
												// $em_free_attendee_result;
												if ( $em_free_attendee_result ) {
													$em_attendee_email = $em_free_attendee_result->email;
													$em_attendee_fname = $em_free_attendee_result->first_name;
													$em_attendee_lname = $em_free_attendee_result->last_name;
													$em_attendee_name  = $em_attendee_fname . ' ' . $em_attendee_lname;
												}

												$em_free_booking = $wpdb->get_row( "SELECT * FROM `$booking_table` WHERE `id` LIKE '$last_booking_id' AND `status` LIKE 'compeleted'" );
												if ( $em_free_booking ) {
													$em_booking_status   = $em_free_booking->status;
													$em_booking_datetime = $em_free_booking->date_time;
												}

												// email subject & body
												$em_common_settings = unserialize( base64_decode( get_option( 'awl_em_common_settings' ) ) );
												if ( isset( $em_common_settings['em_notification_client'] ) ) {
													 $em_notification_client = $em_common_settings['em_notification_client'];
												} else {
													$em_notification_client = 'on';
												}
												if ( $em_notification_client == 'on' ) {
													require_once 'send-email.php';
												}
											}
										}
									} ?>
							</div>
				  <?php } ?>
						
						<!--Social icon-->
						<?php if ( $em_social == 'yes' ) { ?>
							<div class="row  em_well">
								<div class="col-md-12">
									<?php echo $em_share_btn; ?>
								</div>
							</div>
						<?php } ?>
					</div>
				<script>
				jQuery(document).ready(function() {
					//countdown
					jQuery('#countdown9-<?php echo esc_js( $em_id ); ?>').ClassyCountdown({
						end: '<?php echo strtotime( date( 'Y-m-d H:i:s', strtotime ( "$em_start_date $em_start_time" ) ) ); ?>',
						now: '<?php echo strtotime( date( 'Y-m-d H:i:s' ) ); ?>',
						labels: true,
						labelsOptions: {
							lang: {
								days: 'Days',
								hours: 'Hours',
								minutes: 'Minutes',
								seconds: 'Seconds'
							},
							style: 'font-size:0.5em; text-transform:uppercase;'
						},
						style: {
							element: "",
							textResponsive: .5,
							days: {
								gauge: {
									thickness: .05,
									bgColor: "rgb(209 209 209)",
									fgColor: "#1abc9c",
									
								},
								textCSS: 'font-size:25px; color:#34495e;'
							},
							hours: {
								gauge: {
									thickness: .05,
									bgColor: "rgb(209 209 209)",
									fgColor: "#1abc9c",
									
								},
								textCSS: 'font-size:25px; color:#34495e;'
							},
							minutes: {
								gauge: {
									thickness: .05,
									bgColor: "rgb(209 209 209)",
									fgColor: "#1abc9c",
								
								},
								textCSS: 'font-size:25px; color:#34495e;'
							},
							seconds: {
								gauge: {
									thickness: .05,
									bgColor: "rgb(209 209 209)",
									fgColor: "#1abc9c",
									
								},
								textCSS: 'font-size:25px; color:#34495e;'
							}
						},
						onEndCallback: function() {
							//console.log("Time out!");
							jQuery(".em_coundown").hide();
						}
					});
					
					//book ticket form
					jQuery("#em-book-ticket-<?php echo esc_js( $em_id ); ?>").click(function(){
						jQuery("#em-book-ticket-<?php echo esc_js( $em_id ); ?>").hide();
						jQuery("#em_tkt_book_form-<?php echo esc_js( $em_id ); ?>").trigger('reset');
						jQuery(".form-box-<?php echo esc_js( $em_id ); ?>").show();
					});
					
					jQuery(".form_close").click(function(){
						jQuery("#em-book-ticket-<?php echo esc_js( $em_id ); ?>").show();
						jQuery(".form-box-<?php echo esc_js( $em_id ); ?>").hide();
					});
					jQuery(".fa_sucsess_close").click(function(){
						jQuery("#em-book-ticket-<?php echo esc_js( $em_id ); ?>").show();
						jQuery(".em_frm_success_msg-<?php echo esc_js( $em_id ); ?>").hide();
					});

					//popover
					jQuery('[data-toggle="popover"]').popover();
				});
				// remove validate class on keypress
				jQuery("#form-first-name-<?php echo esc_js( $em_id ); ?>").keypress(function(){
					jQuery("#form-first-name-<?php echo esc_js( $em_id ); ?>").removeClass("hvr-wobble-horizontal require_field");
				});
				jQuery("#form-last-name-<?php echo esc_js( $em_id ); ?>").keypress(function() {
					jQuery("#form-last-name-<?php echo esc_js( $em_id ); ?>").removeClass("hvr-wobble-horizontal require_field");
				});
				jQuery("#form-email").keypress(function(){
					jQuery("#form-email-<?php echo esc_js( $em_id ); ?>").removeClass("hvr-wobble-horizontal require_field");
				});
				
			
				function ApplyCouponTicket_<?php echo esc_js( $em_id ); ?>(action,id) {
					if (action == "bookticket") {
						//form validator
						var fname = jQuery('#form-first-name-<?php echo esc_js( $em_id ); ?>').val();
						if(fname == "") {
							jQuery('#form-first-name-<?php echo esc_js( $em_id ); ?>').focus();
							jQuery("#form-first-name-<?php echo esc_js( $em_id ); ?>").addClass("hvr-wobble-horizontal require_field");
							return false;  
						}
						if (fname != "" && /^[a-zA-Z ]+$/.test(fname) == false) {
							jQuery('#form-first-name-<?php echo esc_js( $em_id ); ?>').focus();
							jQuery("#form-first-name-<?php echo esc_js( $em_id ); ?>").addClass("hvr-wobble-horizontal require_field");
							return false;
						}
						
						var lname = jQuery('#form-last-name-<?php echo esc_js( $em_id ); ?>').val();
						if(lname == "") {
							jQuery('#form-last-name-<?php echo esc_js( $em_id ); ?>').focus();
							 jQuery("#form-last-name-<?php echo esc_js( $em_id ); ?>").addClass("hvr-wobble-horizontal require_field");
							return false;
						}
						
						if (lname != "" && /^[a-zA-Z ]+$/.test(lname) == false) {
							jQuery('#form-last-name-<?php echo esc_js( $em_id ); ?>').focus();
							jQuery("#form-last-name-<?php echo esc_js( $em_id ); ?>").addClass("hvr-wobble-horizontal require_field");
							return false; 
						}
						
						// E-mail validation start:
						var form_email = jQuery('#form-email-<?php echo esc_js( $em_id ); ?>').val();
						if(form_email == "") {
							jQuery('#form-email-<?php echo esc_js( $em_id ); ?>').focus();
							jQuery("#form-email-<?php echo esc_js( $em_id ); ?>").addClass("hvr-wobble-horizontal require_field");
							return false;
						}
						
						// E-mail validation start:
						var checkmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						if(checkmail.test(form_email) == false){
							jQuery('#form-email-<?php echo esc_js( $em_id ); ?>').focus();
							jQuery("#form-email-<?php echo esc_js( $em_id ); ?>").addClass("hvr-wobble-horizontal require_field");
							return false;
						}
						
						// phone
						var form_phone = jQuery('#form-phone-<?php echo esc_js( $em_id ); ?>').val();
						if(form_phone){
							if(/^\d+$/.test(form_phone) == false) {
								jQuery('#form-phone-<?php echo esc_js( $em_id ); ?>').focus();
								jQuery("#form-phone-<?php echo esc_js( $em_id ); ?>").addClass("hvr-wobble-horizontal require_field");
								return false;
							}
						}
						
						jQuery( ".form-box-<?php echo esc_js( $em_id ); ?>" ).fadeOut( "slow", function() {
							jQuery("#em_input_load-<?php echo esc_js( $em_id ); ?>").show();
						});
						//die();
						//jQuery('#em_tkt_book_form').hide();
						jQuery.ajax({
							type: 'POST',
							url: location.href,
							data: jQuery('#em_tkt_book_form-<?php echo esc_js( $em_id ); ?>').serialize() + '&action=' + action + '&id=' + id,
							success: function(response) {
								jQuery('#ajax_resp').html(jQuery(response).find('div#ajax_form'));
								jQuery("#em_input_load-<?php echo esc_js( $em_id ); ?>").hide();
								jQuery(".form-box-<?php echo esc_js( $em_id ); ?>").hide();
								jQuery(".em_frm_success_msg-<?php echo esc_js( $em_id ); ?>").show();
							}
						});
					}
				}
				</script>
			</div>
		</div><!--//modal-->
		<?php
	}
}
?>
