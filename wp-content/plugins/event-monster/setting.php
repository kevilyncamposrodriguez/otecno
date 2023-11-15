<?php // js
wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'awl-em-bootstrap-js', EM_PLUGIN_URL . 'js/bootstrap.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-bootstrap-slider-js', EM_PLUGIN_URL . 'js/bootstrap-slider.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-bootstrap-select-js', EM_PLUGIN_URL . 'js/bootstrap-select.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-forms-bootstrap-colorpicker-js', EM_PLUGIN_URL . 'js/forms-bootstrap-colorpicker.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-bootstrap-colorpicker-js', EM_PLUGIN_URL . 'js/bootstrap-colorpicker.js', array( 'jquery' ), '', true );
// css
wp_enqueue_style( 'awl-em-bootstrap-css', EM_PLUGIN_URL . 'css/bootstrap.css' );
wp_enqueue_style( 'awl-em-styles-css', EM_PLUGIN_URL . 'css/styles.css' );
wp_enqueue_style( 'awl-em-style-css', EM_PLUGIN_URL . 'css/style.css' );
wp_enqueue_style( 'awl-em-font-awesome-css', EM_PLUGIN_URL . 'css/font-awesome.css' );
wp_enqueue_style( 'awl-em-css', EM_PLUGIN_URL . 'css/event_monster.css' );
wp_enqueue_style( 'awl-em-bootstrap-select-css', EM_PLUGIN_URL . 'css/bootstrap-select.min.css' );
wp_enqueue_style( 'awl-em-bootstrap-colorpicker-css', EM_PLUGIN_URL . 'css/bootstrap-colorpicker.css' );

wp_enqueue_script( 'thickbox' );
wp_register_script( 'em-image-upload', EM_PLUGIN_URL . 'js/em-image-upload.js', array( 'jquery', 'media-upload', 'thickbox' ) );
wp_enqueue_script( 'em-image-upload' );
wp_enqueue_style( 'thickbox' );

$em_common_settings = unserialize( base64_decode( get_option( 'awl_em_common_settings' ) ) );
?>
<div class="module-wrapper masonry-item col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<section class="module module-headings">
		<div class="module-inner">
			<div class="module-heading">
				<h3 class="module-title"><?php esc_html_e( 'Settings', 'event-monster' ); ?></h3>
				<ul class="actions list-inline">
					<li><a class="collapse-module" data-toggle="collapse" href="#content-5" aria-expanded="false" aria-controls="content-5"><span aria-hidden="true" class="icon arrow_carrot-up"></span></a></li>
					<li><a class="close-module" href="#"><span aria-hidden="true" class="icon icon_close"></span></a></li>
				</ul>
			</div>
			<form class="module-content collapse in" id="content-5" name="content-5">
				<div class="module-content-inner no-padding-bottom">
					<div role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-tabs-theme-3  em_input_zindex" role="tablist">
							<li role="presentation"><a href="#co-settings-1" aria-controls="co-settings-1" role="tab" data-toggle="tab"><i class="fa fa-cogs"></i><br><span class="hidden-xs hidden-sm"><?php esc_html_e( 'Common Settings', 'event-monster' ); ?></span></a></li>
							<li role="presentation"  class="active"><a href="#email-2" aria-controls="email-2" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i><br><span class="hidden-xs hidden-sm"><?php esc_html_e( 'Email', 'event-monster' ); ?></span></a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<!-- co-settings-1 -->
							<div role="tabpanel" class="tab-pane" id="co-settings-1">
								<div class="container">
									<div class="em_setting_spacing">
										<h2 class="em_spacing_sm"><?php esc_html_e( 'Font Settings', 'event-monster' ); ?></h2>
										<div class="em_spacing_md">
											<?php
											if ( isset( $em_common_settings['em_main_font_size'] ) ) {
												$em_main_font_size = $em_common_settings['em_main_font_size'];
											} else {
												$em_main_font_size = '24';
											}
											?>
											<label class="label-control col-sm-3"><?php esc_html_e( 'Heading Font Size( px )', 'event-monster' ); ?></label>
											<div class="col-sm-10">
												<div class="range-slider">
													<input id="em_main_font_size" name="em_main_font_size" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_main_font_size ); ?>" min="0" max="40">
													<span class="range-slider__value">0</span>
												</div>
											</div>
										</div>
										<div class="em_spacing_md">
											<?php
											if ( isset( $em_common_settings['em_sub_font_size'] ) ) {
												$em_sub_font_size = $em_common_settings['em_sub_font_size'];
											} else {
												$em_sub_font_size = '18';
											}
											?>
											<label class="label-control col-sm-3"><?php esc_html_e( 'Sub Heading Font Size( px )', 'event-monster' ); ?></label>
											<div class="col-sm-10">
												<div class="range-slider">
													<input id="em_sub_font_size" name="em_sub_font_size" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_sub_font_size ); ?>" min="0" max="28">
													<span class="range-slider__value">0</span>
												</div>
											</div>
										</div>
										<div class="em_spacing_md">
											<?php
											if ( isset( $em_common_settings['em_nrml_font_size'] ) ) {
												$em_nrml_font_size = $em_common_settings['em_nrml_font_size'];
											} else {
												$em_nrml_font_size = '16';
											}
											?>
											<label class="label-control col-sm-3"><?php esc_html_e( 'Text Font Size( px )', 'event-monster' ); ?></label>
											<div class="col-sm-10">
												<div class="range-slider">
													<input id="em_nrml_font_size" name="em_nrml_font_size" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_nrml_font_size ); ?>" min="0" max="20">
													<span class="range-slider__value">0</span>
												</div>
											</div>
										</div>
										<!--Registration Form Filds label Settings-->
										<h2 class="em_spacing_sm"><?php esc_html_e( 'Registration Form Fields label Settings', 'event-monster' ); ?></h2>
										
										<?php
										if ( isset( $em_common_settings['em_form_heading_one'] ) ) {
											$em_form_heading_one = $em_common_settings['em_form_heading_one'];
										} else {
											$em_form_heading_one = 'Book Ticket Now';
										}
										?>
										<div class="form-group">
											<label for="em_form_heading_one" class="cols-sm-2 control-label"><?php esc_html_e( 'Form Field Heading', 'event-monster' ); ?></label>
											<div class="cols-sm-10">
												<div class="input-group">
													<span class="input-group-addon em_setting_email"><i class="fa fa-edit fa" aria-hidden="true"></i></span>
													<input type="text" class="payment_email form-control em_input_zindex" value="<?php echo esc_html( $em_form_heading_one ); ?>" name="em_form_heading_one" id="em_form_heading_one" />
												</div>
											</div>
										</div>
										
										<?php
										if ( isset( $em_common_settings['em_form_sub_heading'] ) ) {
											$em_form_sub_heading = $em_common_settings['em_form_sub_heading'];
										} else {
											$em_form_sub_heading = 'Fill in the form below to get instant access:';
										}
										?>
										<div class="form-group">
											<label for="em_form_sub_heading" class="cols-sm-2 control-label"><?php esc_html_e( 'Form Field Sub Heading', 'event-monster' ); ?></label>
											<div class="cols-sm-10">
												<div class="input-group">
													<span class="input-group-addon em_setting_email"><i class="fa fa-edit fa" aria-hidden="true"></i></span>
													<input type="text" class="payment_email form-control em_input_zindex" value="<?php echo esc_html( $em_form_sub_heading ); ?>" name="em_form_sub_heading" id="em_form_sub_heading" />
												</div>
											</div>
										</div>
										
										<?php
										if ( isset( $em_common_settings['em_form_first_name_field'] ) ) {
											$em_form_first_name_field = $em_common_settings['em_form_first_name_field'];
										} else {
											$em_form_first_name_field = 'First Name';
										}
										?>
										<div class="form-group">
											<label for="em_form_first_name_field" class="cols-sm-2 control-label"><?php esc_html_e( 'First Name Field label', 'event-monster' ); ?></label>
											<div class="cols-sm-10">
												<div class="input-group">
													<span class="input-group-addon em_setting_email"><i class="fa fa-edit fa" aria-hidden="true"></i></span>
													<input type="text" class="payment_email form-control em_input_zindex" value="<?php echo esc_html( $em_form_first_name_field ); ?>" name="em_form_first_name_field" id="em_form_first_name_field" />
												</div>
											</div>
										</div>
										
										<?php
										if ( isset( $em_common_settings['em_form_last_name_field'] ) ) {
											$em_form_last_name_field = $em_common_settings['em_form_last_name_field'];
										} else {
											$em_form_last_name_field = 'Last Name';
										}
										?>
										<div class="form-group">
											<label for="em_form_last_name_field" class="cols-sm-2 control-label"><?php esc_html_e( 'Last Name Field label', 'event-monster' ); ?></label>
											<div class="cols-sm-10">
												<div class="input-group">
													<span class="input-group-addon em_setting_email"><i class="fa fa-edit fa" aria-hidden="true"></i></span>
													<input type="text" class="payment_email form-control em_input_zindex" value="<?php echo esc_html( $em_form_last_name_field ); ?>" name="em_form_last_name_field" id="em_form_last_name_field" />
												</div>
											</div>
										</div>
										
										<?php
										if ( isset( $em_common_settings['em_form_email_field'] ) ) {
											$em_form_email_field = $em_common_settings['em_form_email_field'];
										} else {
											$em_form_email_field = 'Email';
										}
										?>
										<div class="form-group">
											<label for="em_form_email_field" class="cols-sm-2 control-label"><?php esc_html_e( 'Email Field label', 'event-monster' ); ?></label>
											<div class="cols-sm-10">
												<div class="input-group">
													<span class="input-group-addon em_setting_email"><i class="fa fa-edit fa" aria-hidden="true"></i></span>
													<input type="text" class="payment_email form-control em_input_zindex" value="<?php echo esc_html( $em_form_email_field ); ?>" name="em_form_email_field" id="em_form_email_field" />
												</div>
											</div>
										</div>
										
										<?php
										if ( isset( $em_common_settings['em_form_phone_field'] ) ) {
											$em_form_phone_field = $em_common_settings['em_form_phone_field'];
										} else {
											$em_form_phone_field = 'Phone';
										}
										?>
										<div class="form-group">
											<label for="em_form_phone_field" class="cols-sm-2 control-label"><?php esc_html_e( 'Phone Field label', 'event-monster' ); ?></label>
											<div class="cols-sm-10">
												<div class="input-group">
													<span class="input-group-addon em_setting_email"><i class="fa fa-edit fa" aria-hidden="true"></i></span>
													<input type="text" class="payment_email form-control em_input_zindex" value="<?php echo esc_attr( $em_form_phone_field ); ?>" name="em_form_phone_field" id="em_form_phone_field" />
												</div>
											</div>
										</div>
										
										<?php
										if ( isset( $em_common_settings['em_form_sucsess_msg_field'] ) ) {
											$em_form_sucsess_msg_field = $em_common_settings['em_form_sucsess_msg_field'];
										} else {
											$em_form_sucsess_msg_field = 'Your Booking has been completed!!';
										}
										?>
										<div class="form-group">
											<label for="em_form_sucsess_msg_field" class="cols-sm-2 control-label"><?php esc_html_e( 'Booking Success Message', 'event-monster' ); ?></label>
											<div class="cols-sm-10">
												<div class="input-group">
													<span class="input-group-addon em_setting_email"><i class="fa fa-edit fa" aria-hidden="true"></i></span>
													<textarea class="payment_email form-control em_input_zindex" name="em_form_sucsess_msg_field" id="em_form_sucsess_msg_field" /><?php echo esc_html( $em_form_sucsess_msg_field ); ?></textarea>
												</div>
											</div>
										</div>
										
										<?php
										if ( isset( $em_common_settings['em_booking_full_msg'] ) ) {
											$em_booking_full_msg = $em_common_settings['em_booking_full_msg'];
										} else {
											$em_booking_full_msg = 'All Tickets are Booked!!';
										}
										?>
										<div class="form-group">
											<label for="em_booking_full_msg" class="cols-sm-2 control-label"><?php esc_html_e( 'Booking Full Message', 'event-monster' ); ?></label>
											<div class="cols-sm-10">
												<div class="input-group">
													<span class="input-group-addon em_setting_email"><i class="fa fa-edit fa" aria-hidden="true"></i></span>
													<textarea class="payment_email form-control em_input_zindex" name="em_booking_full_msg" id="em_booking_full_msg" /><?php echo esc_html( $em_booking_full_msg ); ?></textarea>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<!-- email-2 -->
							<div role="tabpanel" class="tab-pane active" id="email-2">
								<div class="container">
									<div class="">
										<div class="em_setting_spacing">
											<?php
											if ( isset( $em_common_settings['em_notification_client'] ) ) {
												$em_notification_client = $em_common_settings['em_notification_client'];
											} else {
												$em_notification_client = 'on';
											}
											?>
											<label for="" class="cols-sm-2 control-label"><?php esc_html_e( 'Enable Auto Notification For Client', 'event-monster' ); ?></label>
											<div class="switch-field">
												<input type="radio" id="noty_on_client" name="em_notification_client" value="on" 
												<?php
												if ( $em_notification_client == 'on' ) {
													echo 'checked=checked';}
												?>
												 />
												<label for="noty_on_client"><?php esc_html_e( 'ON', 'event-monster' ); ?></label>
												<input type="radio" id="noty_off_client" name="em_notification_client" value="off" 
												<?php
												if ( $em_notification_client == 'off' ) {
													echo 'checked=checked';}
												?>
												 />
												<label for="noty_off_client"><?php esc_html_e( 'OFF', 'event-monster' ); ?></label>
											</div>
											<div class="client_email_setting">
												<div class="form-group">
													<?php
													if ( isset( $em_common_settings['em_notification_sub_client'] ) ) {
														$em_notification_sub_client = $em_common_settings['em_notification_sub_client'];
													} else {
														$em_notification_sub_client = 'Your Booking Details';
													}
													?>
													<label for="em_notification_sub_client" class="cols-sm-2 control-label"><?php esc_html_e( 'Auto Notification Mail Subject For Client', 'event-monster' ); ?></label>
													<div class="cols-sm-10">
														<div class="input-group">
															<span class="input-group-addon em_setting_email"><i class="fa fa-user fa" aria-hidden="true"></i></span>
															<input type="text" class="payment_email form-control em_input_zindex" value="<?php echo esc_html( $em_notification_sub_client ); ?>" name="em_notification_sub_client" id="em_notification_sub_client"  placeholder="<?php esc_html_e( 'Enter Subject', 'event-monster' ); ?>"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<?php
													if ( isset( $em_common_settings['em_notification_msg_client'] ) ) {
														$em_notification_msg_client = $em_common_settings['em_notification_msg_client'];
													} else {
														$em_notification_msg_client = 'Your ticket (s) booked successfully. Details below';
													}
													?>
													<label for="em_notification_msg_client" class="cols-sm-2 control-label"><?php esc_html_e( 'Auto Notification Mail Message For Client', 'event-monster' ); ?></label>
													<div class="cols-sm-10">
														<div class="input-group">
															<span class="input-group-addon em_setting_email"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
															<textarea type="text" class="payment_email form-control em_input_zindex" name="em_notification_msg_client" id="em_notification_msg_client"  placeholder="<?php esc_html_e( 'Enter Message', 'event-monster' ); ?>"><?php echo esc_html( $em_notification_msg_client ); ?></textarea>
														</div>
													</div>
												</div>
											</div>
											<?php
											if ( isset( $em_common_settings['em_notification_admin'] ) ) {
												$em_notification_admin = $em_common_settings['em_notification_admin'];
											} else {
												$em_notification_admin = 'on';
											}
											?>
											<label for="" class="cols-sm-2 control-label"><?php esc_html_e( 'Enable Auto Notification For Admin', 'event-monster' ); ?></label>
											<div class="switch-field">
												<input type="radio" id="noty_on_admin" name="em_notification_admin" value="on" 
												<?php
												if ( $em_notification_admin == 'on' ) {
													echo 'checked=checked';}
												?>
												 />
												<label for="noty_on_admin"><?php esc_html_e( 'ON', 'event-monster' ); ?></label>
												<input type="radio" id="noty_off_admin" name="em_notification_admin" value="off" 
												<?php
												if ( $em_notification_admin == 'off' ) {
													echo 'checked=checked';}
												?>
												 />
												<label for="noty_off_admin"><?php esc_html_e( 'OFF', 'event-monster' ); ?></label>
											</div>
											<div class="admin_email_setting">
												<div class="form-group">
													<?php
													if ( isset( $em_common_settings['em_notification_sub_admin'] ) ) {
														$em_notification_sub_admin = $em_common_settings['em_notification_sub_admin'];
													} else {
														$em_notification_sub_admin = '';
													}
													?>
													<label for="em_notification_sub_admin" class="cols-sm-2 control-label"><?php esc_html_e( 'Auto Notification Mail Subject For Admin', 'event-monster' ); ?></label>
													<div class="cols-sm-10">
														<div class="input-group">
															<span class="input-group-addon em_setting_email"><i class="fa fa-user fa" aria-hidden="true"></i></span>
															<input type="text" class="payment_email form-control em_input_zindex" value="<?php echo esc_attr( $em_notification_sub_admin ); ?>" name="em_notification_sub_admin" id="em_notification_sub_admin"  placeholder="<?php esc_html_e( 'Enter Subject', 'event-monster' ); ?>"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<?php
													if ( isset( $em_common_settings['em_notification_msg_admin'] ) ) {
														$em_notification_msg_admin = $em_common_settings['em_notification_msg_admin'];
													} else {
														$em_notification_msg_admin = 'on';
													}
													?>
													<label for="email" class="cols-sm-2 control-label"><?php esc_html_e( 'Auto Notification Mail Message For admin', 'event-monster' ); ?></label>
													<div class="cols-sm-10">
														<div class="input-group">
															<span class="input-group-addon em_setting_email"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
															<textarea type="text" class="payment_email form-control em_input_zindex" name="em_notification_msg_admin" id="em_notification_msg_admin"  placeholder="<?php esc_html_e( 'Enter Message', 'event-monster' ); ?>"><?php echo esc_html( $em_notification_msg_admin ); ?></textarea>
														</div>
													</div>
												</div>
											</div>
										<hr>
											<h3><?php esc_html_e( 'PHP Email', 'event-monster' ); ?></h3>
											<div class="notification_php">
												<div class="form-group">
													<?php
													if ( isset( $em_common_settings['em_php_email'] ) ) {
														$em_php_email = $em_common_settings['em_php_email'];
													} else {
														$em_php_email = '';
													}
													?>
													<label for="em_php_email" class="cols-sm-2 control-label"><?php esc_html_e( 'Email', 'event-monster' ); ?></label>
													<div class="cols-sm-10">
														<div class="input-group">
															<span class="input-group-addon em_setting_email"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></span>
															<input type="text" class="payment_email form-control" value="<?php echo esc_html( $em_php_email ); ?>" name="em_php_email" id="em_php_email"  placeholder="<?php esc_html_e( 'Enter Email', 'event-monster' ); ?>" />
														</div>
													</div>
												</div>
											</div>
										<hr>
											<h3 class="bg-theme-danger padding-sm"><?php esc_html_e( 'Event Cancellation', 'event-monster' ); ?></h3>
											<div class="col-md-10">
												<blockquote class="highlight-border highlight-border-danger">
													<div class="form-group no-overflow">
														<div class="form-group">
															<label class="label-control cols-sm-3"><?php esc_html_e( 'Event Cancellation Notification For Subscribers', 'event-monster' ); ?></label>
															<div class="cols-sm-9">
																<?php
																if ( isset( $em_common_settings['em_cncl_notifi_subscriber'] ) ) {
																	$em_cncl_notifi_subscriber = $em_common_settings['em_cncl_notifi_subscriber'];
																} else {
																	$em_cncl_notifi_subscriber = 'on';
																}
																?>
																<div class="switch-field switch-field-danger">
																	<input type="radio" id="em_cncl_notifi_subscriber_yes" name="em_cncl_notifi_subscriber" value="on" 
																	<?php
																	if ( $em_cncl_notifi_subscriber == 'on' ) {
																		echo 'checked=checked';}
																	?>
																	 />
																	<label for="em_cncl_notifi_subscriber_yes"><?php esc_html_e( 'ON', 'event-monster' ); ?></label>
																	<input type="radio" id="em_cncl_notifi_subscriber_no" name="em_cncl_notifi_subscriber" value="off" 
																	<?php
																	if ( $em_cncl_notifi_subscriber == 'off' ) {
																		echo 'checked=checked';}
																	?>
																	 />
																	<label for="em_cncl_notifi_subscriber_no"><?php esc_html_e( 'OFF', 'event-monster' ); ?></label>
																</div>
															</div>
														</div>
														<div id="em_canselation_settings_div">
															<div class="form-group">
																<label class="label-control cols-sm-3"><?php esc_html_e( 'Event Cancellation Subject', 'event-monster' ); ?></label>
																<div class="cols-sm-9">
																	<?php
																	if ( isset( $em_common_settings['em_cncl_notifi_sub'] ) ) {
																		$em_cncl_notifi_sub = $em_common_settings['em_cncl_notifi_sub'];
																	} else {
																		$em_cncl_notifi_sub = 'Event Canceled';
																	}
																	?>
																	<input type="text" id="em_cncl_notifi_sub" name="em_cncl_notifi_sub" value="<?php echo esc_html( $em_cncl_notifi_sub ); ?>" class="form-control em_input_width" placeholder="<?php esc_html_e( 'Type event cancellation subject', 'event-monster' ); ?>">
																</div>
															</div>
															<div class="form-group">
																<label class="label-control cols-sm-3"><?php esc_html_e( 'Event Cancellation Message', 'event-monster' ); ?></label>
																<div class="cols-sm-9">
																	<?php
																	if ( isset( $em_common_settings['em_cncl_notifi_msg'] ) ) {
																		$em_cncl_notifi_msg = $em_common_settings['em_cncl_notifi_msg'];
																	} else {
																		$em_cncl_notifi_msg = 'The event has been cancelled';
																	}
																	?>
																	<textarea id="em_cncl_notifi_msg" name="em_cncl_notifi_msg" class="form-control em_input_width" placeholder="<?php esc_html_e( 'Type event cancellation message', 'event-monster' ); ?>"><?php echo esc_html( $em_cncl_notifi_msg ); ?></textarea>
																</div>
															</div>
														</div>
														<div class="">
															<div class="form-group">
																<label class="label-control cols-sm-3"><?php esc_html_e( 'Select for Event Cancel', 'event-monster' ); ?></label>
																<div class="cols-sm-9">
																	<?php
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

																	?>
																	
																	<select id="em_id_for_cancellation" name="em_id_for_cancellation[]" class="kuchhbhi selectpicker show-tick form-control em_slid_tran" multiple>
																	
																	<?php
																	global $wpdb;
																	$titles = $wpdb->get_results(
																		"SELECT *
																		FROM $wpdb->posts
																		WHERE post_type = 'awl_event_monster'
																		AND post_author = 1
																		AND post_status IN ('publish')"
																	);
																	if ( count( $titles ) ) {
																		foreach ( $titles as $all_event_name ) {
																			$c_post_id    = $all_event_name->ID;
																			$c_post_title = $all_event_name->post_title;
																			?>
																			<option 
																			<?php
																			if ( in_array( $c_post_id, $em_id_for_cancellation ) ) {
																				echo "selected style='display:none;'";}
																			?>
																			 value="<?php echo esc_attr( $c_post_id ); ?>"><?php echo esc_html( $c_post_title ); ?></option>
																			<?php
																		}
																	}
																	?>
																	</select>
																	<input type="hidden" name="em_event name">
																</div>
															</div>
															
															<label class="event-cancellation-label cols-sm-3"><?php esc_html_e( 'Click For Cancel This Event', 'event-monster' ); ?></label>
															<div class="cols-sm-9">
																<input type="hidden" id="em_all_status" name="em_all_status" value="Canceled" >
																<button id="event-cancellation-btn" name="event-cancellation-btn" class="btn btn-danger-3d" type="button" onclick="EmCancle();"><i class="fa fa-ban"></i><?php esc_html_e( 'Cancel This Event', 'event-monster' ); ?></button>
																<div id="event-cancellation-msg" style="display: none; color:#f77b6b;">
																	<p style="font-size:16px;"><?php esc_html_e( 'Pleas wait, Cancellation is in proccess...', 'event-monster' ); ?><i class="fa fa-cog fa-spin fa-2x "></i></p>
																</div>
																<div id="event-cancellation-done-msg" class="alert alert-danger" style="display: none; color:#f77b6b;">
																	<p id="event-cancellation-done-msg-p" style="font-size:16px;"><?php esc_html_e( 'Your event has been Cancelled', 'event-monster' ); ?></p>
																</div>
															</div>
														</div>
													</div>
												</blockquote>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="text-center">
				<button class="btn btn-primary-3d" type="button" onclick="EmSaveSettings();"><i class="fa fa-save fa"></i><?php esc_html_e( 'Save Changes', 'event-monster' ); ?></button>
			</div>
		</div>
	</section>
</div>
<!--Loading Icon-->
<div id="em_setting_load" class="loader-wrapper loader-wrapper-4" style="display:none;">
	<div class="em_spinner"></div>
</div>
<?php
// save settings
if ( isset( $_POST['em_setting_action'] ) ) {
	
	if ( isset( $_POST['security'] ) ) {
			$em_save_nonce_value = sanitize_text_field( $_POST['security'] );
		} else {
			$em_save_nonce_value = '';
		}
	if ( wp_verify_nonce( $em_save_nonce_value, 'em_save_nonce' ) ) {
		$em_cncl_notifi_subscriber = sanitize_text_field( $_POST['em_cncl_notifi_subscriber'] );
		$em_cncl_notifi_sub        = sanitize_text_field( $_POST['em_cncl_notifi_sub'] );
		$em_cncl_notifi_msg        = sanitize_textarea_field( $_POST['em_cncl_notifi_msg'] );
		if ( isset( $_POST['em_id_for_cancellation'] ) ) {
			$em_id_for_cancellation = $_POST['em_id_for_cancellation'];
		} else {
			$em_id_for_cancellation = '';
		}
		$em_form_heading_one = sanitize_text_field( $_POST['em_form_heading_one'] );
		// $em_form_heading_one          = sanitize_text_field($_POST['em_form_heading_one']);
		$em_form_sub_heading        = sanitize_text_field( $_POST['em_form_sub_heading'] );
		$em_form_sucsess_msg_field  = sanitize_textarea_field( $_POST['em_form_sucsess_msg_field'] );
		$em_booking_full_msg        = sanitize_textarea_field( $_POST['em_booking_full_msg'] );
		$instructions_type          = '';
		$em_main_font_size          = sanitize_text_field( $_POST['em_main_font_size'] );
		$em_sub_font_size           = sanitize_text_field( $_POST['em_sub_font_size'] );
		$em_nrml_font_size          = sanitize_text_field( $_POST['em_nrml_font_size'] );
		$em_form_first_name_field   = sanitize_text_field( $_POST['em_form_first_name_field'] );
		$em_form_last_name_field    = sanitize_text_field( $_POST['em_form_last_name_field'] );
		$em_form_email_field        = sanitize_text_field( $_POST['em_form_email_field'] );
		$em_form_phone_field        = sanitize_text_field( $_POST['em_form_phone_field'] );
		$em_notification_client     = sanitize_text_field( $_POST['em_notification_client'] );
		$em_notification_sub_client = sanitize_text_field( $_POST['em_notification_sub_client'] );
		$em_notification_msg_client = sanitize_textarea_field( $_POST['em_notification_msg_client'] );
		$em_notification_admin      = sanitize_text_field( $_POST['em_notification_admin'] );
		$em_notification_sub_admin  = sanitize_text_field( $_POST['em_notification_sub_admin'] );
		$em_notification_msg_admin  = sanitize_textarea_field( $_POST['em_notification_msg_admin'] );
		$em_paypal                  = '';
		$email_carrier              = '';
		$em_php_email               = sanitize_email( $_POST['em_php_email'] );
		$email_tem_head             = '';
		$em_upload_image            = '';
		$logo_name                  = '';
		$cover_back_color           = '';
		$header_footer_back_color   = '';
		$header_footer_font_color   = '';
		$body_back_color            = '';
		$body_font_color            = '';
		$imp_instructions           = '';
		$footer_email               = '';
		$footer_phone               = '';
		$footer_website             = '';

		$emcommonsettings = array(
			'em_cncl_notifi_subscriber'  => $em_cncl_notifi_subscriber,
			'em_cncl_notifi_sub'         => $em_cncl_notifi_sub,
			'em_cncl_notifi_msg'         => $em_cncl_notifi_msg,
			'em_id_for_cancellation'     => $em_id_for_cancellation,
			'em_form_heading_one'        => $em_form_heading_one,
			'em_form_sub_heading'        => $em_form_sub_heading,
			'em_form_sucsess_msg_field'  => $em_form_sucsess_msg_field,
			'em_booking_full_msg'        => $em_booking_full_msg,
			'instructions_type'          => $instructions_type,
			'em_main_font_size'          => $em_main_font_size,
			'em_sub_font_size'           => $em_sub_font_size,
			'em_nrml_font_size'          => $em_nrml_font_size,
			'em_form_first_name_field'   => $em_form_first_name_field,
			'em_form_last_name_field'    => $em_form_last_name_field,
			'em_form_email_field'        => $em_form_email_field,
			'em_form_phone_field'        => $em_form_phone_field,
			'em_notification_client'     => $em_notification_client,
			'em_notification_sub_client' => $em_notification_sub_client,
			'em_notification_msg_client' => $em_notification_msg_client,
			'em_notification_admin'      => $em_notification_admin,
			'em_notification_sub_admin'  => $em_notification_sub_admin,
			'em_notification_msg_admin'  => $em_notification_msg_admin,
			'em_paypal'                  => $em_paypal,
			'email_carrier'              => $email_carrier,
			'em_php_email'               => $em_php_email,
			'email_tem_head'             => $email_tem_head,
			'em_upload_image'            => $em_upload_image,
			'logo_name'                  => $logo_name,
			'cover_back_color'           => $cover_back_color,
			'header_footer_back_color'   => $header_footer_back_color,
			'header_footer_font_color'   => $header_footer_font_color,
			'body_back_color'            => $body_back_color,
			'body_font_color'            => $body_font_color,
			'imp_instructions'           => $imp_instructions,
			'footer_email'               => $footer_email,
			'footer_phone'               => $footer_phone,
			'footer_website'             => $footer_website,
		);
		update_option( 'awl_em_common_settings', base64_encode( serialize( $emcommonsettings ) ) );
	}
} // end of save if

// event cancellation
if ( isset( $_POST['action'] ) ) {
	$action = $_POST['action'];
	global $wpdb;
	$bookings_table  = $wpdb->prefix . 'em_bookings';
	$attendees_table = $wpdb->prefix . 'em_attendees';
	// update all status
	if ( $action == 'event-cancellation' ) {
		$all_status         = $_POST['all_status'];
		$em_id_cancel       = $_POST['em_id_cancel'];
		$em_cancel_sub      = $_POST['em_cancel_sub'];
		$em_cancel_msg      = $_POST['em_cancel_msg'];
		$em_id_cancel_array = explode( ',', $em_id_cancel );
		$em_id_cancel_last  = end( $em_id_cancel_array );

		$em_common_settings = unserialize( base64_decode( get_option( 'awl_em_common_settings' ) ) );



		$event_monster_output_settings = unserialize( base64_decode( get_post_meta( $em_id_cancel_last, 'awl_em_settings_' . $em_id_cancel_last, true ) ) );

		if ( isset( $em_common_settings['em_cncl_notifi_subscriber'] ) ) {
			$em_cncl_notifi_subscriber = $em_common_settings['em_cncl_notifi_subscriber'];
		} else {
			$em_cncl_notifi_subscriber = 'on';
		}

		// get event date and time from settings
		$em_start_date = $event_monster_output_settings['em_start_date'];
		$em_end_date   = $event_monster_output_settings['em_end_date'];
		$em_start_time = $event_monster_output_settings['em_start_time'];
		$em_end_time   = $event_monster_output_settings['em_end_time'];
		$em_address    = $event_monster_output_settings['em_address'];

		$em_date_format    = get_option( 'date_format' );
		$em_time_format    = get_option( 'time_format' );
		$em_start_date_val = date( $em_date_format, strtotime( $em_start_date ) );
		$em_end_date_val   = date( $em_date_format, strtotime( $em_end_date ) );
		$em_start_time_val = date( $em_time_format, strtotime( $em_start_time ) );
		$em_end_time_val   = date( $em_time_format, strtotime( $em_end_time ) );

		$update_booking = $wpdb->query( "UPDATE `$bookings_table` SET `status` = '$all_status' WHERE `event_id` LIKE '$em_id_cancel_last';" );

		// send email cancellation to user
		$em_free_attendee_result = $wpdb->get_results( "SELECT * FROM `$attendees_table` WHERE `event_id` LIKE '$em_id_cancel_last'" );
		if ( $em_free_attendee_result ) {

			foreach ( $em_free_attendee_result as $single_row ) {

				$em_attendee_id        = $single_row->id;
				$em_attendee_email     = $single_row->email;
				$em_attendee_event_id  = $single_row->event_id;
				$em_attendee_ticket_id = $single_row->ticket_id;
				$em_attendee_fname     = $single_row->first_name;
				$em_attendee_lname     = $single_row->last_name;
				$em_attendee_name      = $em_attendee_fname . ' ' . $em_attendee_lname;

			}
			// get Booking date & time and booking type from booking table
			$em_booking_result = $wpdb->get_row( "SELECT * FROM `$bookings_table` WHERE `event_id` LIKE '$em_id_cancel_last' AND `attendees_id` LIKE '$em_attendee_id'" );
			if ( $em_booking_result ) {
				$em_booking_datetime = $em_booking_result->date_time;
				$em_booking_status   = $em_booking_result->status;
			}

			// email subject & body
			if ( $em_cncl_notifi_subscriber == 'on' ) {
				require 'event-cancellation.php';
			}
		}
	}
}

?>
<script>
function EmSaveSettings() {
	jQuery("#em_setting_load").show();
	jQuery.ajax({
		dataType : 'html',
		type: 'POST',
		url : location.href,
		cache: false,
		data : jQuery('#content-5').serialize() + '&em_setting_action=save_emsetting' + '&security=' + '<?php echo wp_create_nonce( 'em_save_nonce' ); ?>' ,
		complete : function() {  },
		success: function(data) {
			jQuery("#em_setting_load").hide();
		}
	});
}

// Event Cancellation
function EmCancle(){
	var all_status = jQuery("#em_all_status").val();
	var em_id_cancel = jQuery("#em_id_for_cancellation").val();
	var em_cancel_sub = jQuery("#em_cncl_notifi_sub").val();
	var em_cancel_msg = jQuery("#em_cncl_notifi_msg").val();
	var em_name_cancel = jQuery("#em_id_for_cancellation option:selected").text();
	if (confirm('Are you sure, You want to cancle '+ em_name_cancel )) {
		jQuery("#event-cancellation-btn").hide();
		jQuery("#event-cancellation-msg").show();
		var PostData = 'action=event-cancellation' + '&all_status=' + all_status + '&em_id_cancel=' + em_id_cancel + '&em_cancel_sub=' + em_cancel_sub + '&em_cancel_msg=' + em_cancel_msg ;
		jQuery.ajax({
			dataType : 'html',
			type: 'POST',
			url : location.href,
			cache: false,
			data : PostData,
			success: function(data) {
				jQuery("#event-cancellation-msg").hide();
				jQuery("#event-cancellation-done-msg").show();
				jQuery("#event-cancellation-done-msg-p").text( em_name_cancel +' has been Canceled!! Please save the changes by click "Save Changes" button');
			}
		});
	}
}

var em_notification_client = jQuery('input[name="em_notification_client"]:checked').val();
	if(em_notification_client == "on") {
		jQuery('.client_email_setting').show();
	}
	if(em_notification_client == "off") {
		jQuery('.client_email_setting').hide();
	}
	
var em_notification_admin = jQuery('input[name="em_notification_admin"]:checked').val();
	if(em_notification_admin == "on") {
		jQuery('.admin_email_setting').show();
	}
	if(em_notification_admin == "off") {
		jQuery('.admin_email_setting').hide();
	}
	
jQuery(document).ready(function() {
	//toggle button on/off
	jQuery('input[name="em_notification_client"]').change(function(){
		var em_notification_client = jQuery('input[name="em_notification_client"]:checked').val();
		
		if(em_notification_client == "on") {
			jQuery('.client_email_setting').show();
		}
		if(em_notification_client == "off") {
			jQuery('.client_email_setting').hide();
		}
	});
	
	jQuery('input[name="em_notification_admin"]').change(function(){
		var em_notification_admin = jQuery('input[name="em_notification_admin"]:checked').val();
		
		if(em_notification_admin == "on") {
			jQuery('.admin_email_setting').show();
		}
		if(em_notification_admin == "off") {
			jQuery('.admin_email_setting').hide();
		}
	});
});

//range slider
var rangeSlider = function(){
  var slider = jQuery('.range-slider'),
	  range = jQuery('.range-slider__range'),
	  value = jQuery('.range-slider__value');
	
  slider.each(function(){
	value.each(function(){
	  var value = jQuery(this).prev().attr('value');
	  jQuery(this).html(value);
	});

	range.on('input', function(){
	  jQuery(this).next(value).html(this.value);
	});
  });
};
rangeSlider();
</script>
