<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// js
wp_enqueue_script( 'jquery', 'jquery-ui-core' );
wp_enqueue_script( 'awl-em-bootstrap-js', EM_PLUGIN_URL . 'js/bootstrap.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-holder-js', EM_PLUGIN_URL . 'js/holder.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-bootstrap-colorpicker-js', EM_PLUGIN_URL . 'js/bootstrap-colorpicker.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-forms-bootstrap-colorpicker-js', EM_PLUGIN_URL . 'js/forms-bootstrap-colorpicker.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-bootstrap-datepicker-js', EM_PLUGIN_URL . 'js/bootstrap-datepicker.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-forms-bootstrap-datepicker-js', EM_PLUGIN_URL . 'js/forms-bootstrap-datepicker.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-bootstrap-clockpicker-js', EM_PLUGIN_URL . 'js/bootstrap-clockpicker.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-forms-bootstrap-clockpicker-js', EM_PLUGIN_URL . 'js/forms-bootstrap-clockpicker.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-iconset-all.min-js', EM_PLUGIN_URL . 'js/iconset-all.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-bootstrap-iconpicker-js', EM_PLUGIN_URL . 'js/bootstrap-iconpicker.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-bootstrap-select-js', EM_PLUGIN_URL . 'js/bootstrap-select.min.js', array( 'jquery' ), '', true );

// css
wp_enqueue_style( 'awl-em-bootstrap-css', EM_PLUGIN_URL . 'css/bootstrap.css' );
wp_enqueue_style( 'awl-em-jasny-bootstrap-css', EM_PLUGIN_URL . 'css/jasny-bootstrap.css' );
wp_enqueue_style( 'awl-em-styles-css', EM_PLUGIN_URL . 'css/styles.css' );
wp_enqueue_style( 'awl-em-event_monster-css', EM_PLUGIN_URL . 'css/event_monster.css' );
wp_enqueue_style( 'awl-em-font-awesome-css', EM_PLUGIN_URL . 'css/font-awesome.css' );
wp_enqueue_style( 'awl-em-bootstrap-colorpicker-css', EM_PLUGIN_URL . 'css/bootstrap-colorpicker.css' );
wp_enqueue_style( 'awl-em-bootstrap-datepicker-css', EM_PLUGIN_URL . 'css/bootstrap-datepicker.css' );
wp_enqueue_style( 'awl-em-bootstrap-clockpicker-css', EM_PLUGIN_URL . 'css/bootstrap-clockpicker.css' );
wp_enqueue_style( 'awl-em-bootstrap-iconpicker-css', EM_PLUGIN_URL . 'css/bootstrap-iconpicker.min.css' );
wp_enqueue_style( 'awl-em-style-css', EM_PLUGIN_URL . 'css/style.css' );
wp_enqueue_style( 'awl-em-pe-icon-7-stroke-css', EM_PLUGIN_URL . 'css/pe-icon-7-stroke.css' );
wp_enqueue_style( 'awl-em-bootstrap-select-css', EM_PLUGIN_URL . 'css/bootstrap-select.min.css' );

// uplode button js and css
wp_enqueue_script( 'media-upload' );
wp_enqueue_script( 'awl-em-uploader-js', EM_PLUGIN_URL . 'js/awl-em-uploader.js', array( 'jquery' ) );
wp_enqueue_style( 'awl-em-uploader-css', EM_PLUGIN_URL . 'css/awl-em-uploader.css' );
wp_enqueue_media();
wp_enqueue_script( 'thickbox' );
wp_register_script( 'em-image-upload', EM_PLUGIN_URL . 'js/em-image-upload.js', array( 'jquery', 'media-upload', 'thickbox' ) );
wp_enqueue_script( 'em-image-upload' );
wp_enqueue_style( 'thickbox' );

$event_monster_settings = unserialize( base64_decode( get_post_meta( $post->ID, 'awl_em_settings_' . $post->ID, true ) ) );
?>
<!--get shortcode div-->
<div class="row">
	<div class="widget-wrapper col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<section id="show-shortcode" class="widget widget-xs widget-xs-a">
			<div class="widget-inner">
				<div class="chart-container">
					<span class="sparkline-line-mini pe-7s-angle-right-circle"></span>
				</div>
				<div class="info-container">
					<p class="title"><span class="figure"><?php esc_html_e( 'GET EVENT SHORTCODE', 'event-monster' ); ?></span></p>
				</div>
			</div>
		</section>
	</div>
</div>
<!--Event Monster Settings - Accordions-->
<!--1. Logo / Banner -->
<div class="module-wrapper masonry-item settings_page">
	<section class="">
		<div class="module-inner">
			<div class="module-heading">
				<ul class="actions list-inline">
					<li><a class="collapse-module" data-toggle="collapse" href="#content-4" aria-expanded="false" aria-controls="content-4"><span aria-hidden="true" class="icon arrow_carrot-up"></span></a></li>
					<li><a class="close-module" href="#"><span aria-hidden="true" class="icon icon_close"></span></a></li>
				</ul>
			</div>
			<div class="module-content collapse in" id="content-4">
				<div class="module-content-inner no-padding-bottom">
					<div class="panel-group panel-group-theme-1" id="accordion-4" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingOne-4"  data-toggle="collapse" data-parent="#accordion-4" href="#collapseOne-4" aria-expanded="true" aria-controls="collapseOne-4">
								<div class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion-4" href="#collapseOne-4" aria-expanded="true" aria-controls="collapseOne-4"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-photo"></i> <?php esc_html_e( 'Event Logo / Banner', 'event-monster' ); ?>
								</a>
								</div>
							</div>
							<div id="collapseOne-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne-4">
								<div class="panel-body">
									<!--1 Event Uploades-->
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( '1. Uplode Image/Video/Icon', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="col-sm-9">
														<?php
														if ( isset( $event_monster_settings['em_upload_image'] ) ) {
															$em_upload_image = $event_monster_settings['em_upload_image'];
														} else {
															$em_upload_image = '';
														}
														?>
														<!--logo image-->
														<div class="em_img_upld fileinput fileinput-new col-sm-6" data-provides="fileinput">
															<div class="thumbnail single-thumbnail">
																<?php if ( $em_upload_image ) { ?>
																<i name="remove-single-img" id="remove-single-img" class="fa fa-times em_slide_close" aria-hidden="true"></i>
																<?php } ?>
																<i name="remove-single-img" id="remove-single-img" class="fa fa-times em_slide_close" aria-hidden="true" style="display:none;"></i>
																<img id="upload_single_image_preview" name="upload_single_image_preview" src="
																<?php
																if ( $em_upload_image ) {
																	echo esc_url( $em_upload_image );
																} else {
																	echo esc_url( plugin_dir_url( __FILE__ ) . '/images/placeholder-840x630.png' ); }
																?>
																" alt="...">
																<img id="upload_single_image_preview2" name="upload_single_image_preview2" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/placeholder-840x630.png' ); ?>" alt="..." style="display:none;">
															</div>
															<input id="em_upload_image" type="hidden" size="36" name="em_upload_image" value="<?php echo esc_url( $em_upload_image ); ?>" />
															<input id="upload_image_button" class="btn btn-primary btn-file em-btn-uplode" type="button" value="<?php esc_html_e( 'Upload Image', 'event-monster' ); ?>" />
														</div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
									<!--1-2 Logo/Banner Size-->
									<div class="col-md-12 em_logo_size_section">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( '2. Logo/Banner Size', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="col-sm-3">
														<div class="control-group">
															<?php
															if ( isset( $event_monster_settings['logo_size'] ) ) {
																$logo_size = $event_monster_settings['logo_size'];
															} else {
																$logo_size = 'fixed';
															}
															?>
															<label class="label-control control control--radio"><?php esc_html_e( 'Fixed', 'event-monster' ); ?>
																<input type="radio" name="logo_size" id="logo_size" value="fixed" 
																<?php
																if ( $logo_size == 'fixed' ) {
																	echo 'checked=checked';}
																?>
																/>
																<div class="control__indicator"></div>
															</label>
															<label class="label-control control control--radio"><?php esc_html_e( 'Custom', 'event-monster' ); ?>
																<input type="radio" name="logo_size" id="logo_size" value="custom" 
																<?php
																if ( $logo_size == 'custom' ) {
																	echo 'checked=checked';}
																?>
																/>
																<div class="control__indicator"></div>
															</label>
														</div>
													</div>
													<!--Fixed-->
													<div class="col-sm-9">
														<div class="em_logo_size">
															<?php
															if ( isset( $event_monster_settings['em_logo_size'] ) ) {
																$em_logo_size = $event_monster_settings['em_logo_size'];
															} else {
																$em_logo_size = 'medium';
															}
															?>
															<div class="switch-field em_size_field">
															   <input type="radio" id="em_logo_sm" name="em_logo_size" value="small" 
															   <?php
																if ( $em_logo_size == 'small' ) {
																	echo 'checked=checked';}
																?>
																 />
															   <label for="em_logo_sm"><?php esc_html_e( 'S 25%', 'event-monster' ); ?></label>
															   <input type="radio" id="em_logo_md" name="em_logo_size" value="medium" 
															   <?php
																if ( $em_logo_size == 'medium' ) {
																	echo 'checked=checked';}
																?>
																 />
															   <label for="em_logo_md"><?php esc_html_e( 'M 50%', 'event-monster' ); ?></label>
															   <input type="radio" id="em_logo_lg" name="em_logo_size" value="large" 
															   <?php
																if ( $em_logo_size == 'large' ) {
																	echo 'checked=checked';}
																?>
																 />
															   <label for="em_logo_lg"><?php esc_html_e( 'L 75%', 'event-monster' ); ?></label>
															   <input type="radio" id="em_logo_xlg" name="em_logo_size" value="xlarge" 
															   <?php
																if ( $em_logo_size == 'xlarge' ) {
																	echo 'checked=checked';}
																?>
																 />
															   <label for="em_logo_xlg"><?php esc_html_e( 'XL 100%', 'event-monster' ); ?></label>
															</div>
															<i class="fa fa-info-circle em_info_icon em_icon_fix1" data-toggle="tooltip" data-placement="right" title="Select a fixed size for video" aria-hidden="true"></i>
														</div>
														<!--Custom-->
														<div class="form-group em_range_bar">
															<!--Logo Height-->
															<div class="em_spacing_md">
																<label class="label-control"><?php esc_html_e( 'Height ( px )', 'event-monster' ); ?></label>
																<div class="range-slider">
																	<?php
																	if ( isset( $event_monster_settings['em_logo_coustom_height'] ) ) {
																		$em_logo_coustom_height = $event_monster_settings['em_logo_coustom_height'];
																	} else {
																		$em_logo_coustom_height = '500';
																	}
																	?>
																	<input id="em_logo_coustom_height" name="em_logo_coustom_height" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_logo_coustom_height ); ?>" min="0" max="1000">
																	<span  class="range-slider__value">0</span>
																</div>
															</div>
															<!--Logo Width-->
															<label class="label-control"><?php esc_html_e( 'Width ( px )', 'event-monster' ); ?></label>
															<div class="range-slider">
																<?php
																if ( isset( $event_monster_settings['em_logo_coustom_width'] ) ) {
																	$em_logo_coustom_width = $event_monster_settings['em_logo_coustom_width'];
																} else {
																	$em_logo_coustom_width = '1000';
																}
																?>
																<input id="em_logo_coustom_width" name="em_logo_coustom_width" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_logo_coustom_width ); ?>" min="0" max="1500">
																<span class="range-slider__value">0</span>
															</div>
														</div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
									<!--1-3 Logo/Banner Border Setting-->
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( '3. Logo/Banner Border', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Logo/Banner Border ( px )', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<div class="range-slider">
																<?php
																if ( isset( $event_monster_settings['em_logo_border'] ) ) {
																	$em_logo_border = $event_monster_settings['em_logo_border'];
																} else {
																	$em_logo_border = '0';
																}
																?>
																<input id="em_logo_border" name="em_logo_border" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_logo_border ); ?>" min="0" max="10">
																<span class="range-slider__value">0</span>
															</div>
														</div>
													</div>
													<label class="label-control col-sm-3"><?php esc_html_e( 'Logo/Banner Border Color', 'event-monster' ); ?></label>
													<div class="col-sm-9">
														<div class="input-group" id="colorpicker1">
															<?php
															if ( isset( $event_monster_settings['em_logo_border_color'] ) ) {
																$em_logo_border_color = $event_monster_settings['em_logo_border_color'];
															} else {
																$em_logo_border_color = '#000000';
															}
															?>
															<input type="text" id="em_logo_border_color" name="em_logo_border_color" value="<?php echo esc_attr( $em_logo_border_color ); ?>" class="form-control">
															<span class="input-group-addon em_colorpicker"><i></i></span>
														</div>
													</div> 
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
						<!--2 Event Name-->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingTwo-4" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseTwo-4" aria-expanded="false" aria-controls="collapseTwo-4">
								<div class="panel-title">
								<a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseTwo-4" aria-expanded="false" aria-controls="collapseTwo-4"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-note"></i> <?php esc_html_e( 'Event Name', 'event-monster' ); ?>
								</a>
								</div>
							</div>
							<div id="collapseTwo-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo-4">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( 'Name/Title', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Name/Title Font Size ( px )', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<div class="range-slider">
																<?php
																if ( isset( $event_monster_settings['em_title_size'] ) ) {
																	$em_title_size = $event_monster_settings['em_title_size'];
																} else {
																	$em_title_size = '28';
																}
																?>
																<input id="em_title_size" name="em_title_size" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_title_size ); ?>" min="0" max="52">
																<span class="range-slider__value">0</span>
															</div>
														</div>
													</div>
													<div class="em_spacing_md">
													<label class="label-control col-sm-3"><?php esc_html_e( 'Name/Title Color', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<div class="input-group" id="colorpicker2">
																<?php
																if ( isset( $event_monster_settings['em_title_color'] ) ) {
																	$em_title_color = $event_monster_settings['em_title_color'];
																} else {
																	$em_title_color = '#40babd';
																}
																?>
																<input type="text" id="em_title_color" name="em_title_color" value="<?php echo esc_attr( $em_title_color ); ?>" class="form-control">
																<span class="input-group-addon em_colorpicker"><i></i></span>
															</div>
															<i class="fa fa-info-circle em_info_icon em_icon_fix2" data-toggle="tooltip" data-placement="top" title="Set size of your event title and color for title" aria-hidden="true"></i>
														</div>
													</div>
													<label class="label-control col-sm-3"><?php esc_html_e( 'Title Alignment', 'event-monster' ); ?></label>
													<div class="col-sm-9">
														<?php
														if ( isset( $event_monster_settings['em_title_align'] ) ) {
															$em_title_align = $event_monster_settings['em_title_align'];
														} else {
															$em_title_align = 'center';
														}
														?>
														<div class="switch-field em_size_field">
															<input type="radio" id="em_title_align_left" name="em_title_align" value="left" 
															<?php
															if ( $em_title_align == 'left' ) {
																echo 'checked=checked';}
															?>
															 />
															<label for="em_title_align_left"><?php esc_html_e( 'Left', 'event-monster' ); ?></label>
															<input type="radio" id="em_title_align_center" name="em_title_align" value="center" 
															<?php
															if ( $em_title_align == 'center' ) {
																echo 'checked=checked';}
															?>
															 />
															<label for="em_title_align_center"><?php esc_html_e( 'Center', 'event-monster' ); ?></label>
															<input type="radio" id="em_title_align_right" name="em_title_align" value="right" 
															<?php
															if ( $em_title_align == 'right' ) {
																echo 'checked=checked';}
															?>
															 />
															<label for="em_title_align_right"><?php esc_html_e( 'Right', 'event-monster' ); ?></label>
														</div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
						<!--Event Details-->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingFour-5" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseFour-5" aria-expanded="false" aria-controls="collapseFour-5">
								<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseFour-5" aria-expanded="false" aria-controls="collapseFour-5"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-date"></i> <?php esc_html_e( 'Event Details', 'event-monster' ); ?></a></h4>
							</div>
							<div id="collapseFour-5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour-5">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( '1. Event Dtate & Time', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Heading Text', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_date_time_heading'] ) ) {
																$em_date_time_heading = $event_monster_settings['em_date_time_heading'];
															} else {
																$em_date_time_heading = 'Dtate & Time';
															}
															?>
															<input type="text" id="em_date_time_heading" name="em_date_time_heading" value="<?php echo esc_html( $em_date_time_heading ); ?>" class="form-control" placeholder="Type Section Heading">
														</div>
													</div>
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Event Start & End Date', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<div class="input-daterange input-group input-group-icon-click" id="datepicker5">
																<?php
																$current_date = date( 'Y/m/d' );
																if ( isset( $event_monster_settings['em_start_date'] ) ) {
																	$em_start_date = $event_monster_settings['em_start_date'];
																} else {
																	$em_start_date = $current_date;
																}
																?>
																<input type="text" id="em_start_date" name="em_start_date" class="form-control em_input_zindex" name="start" value="<?php echo esc_attr( $em_start_date ); ?>">
																<span class="input-group-addon"><?php esc_html_e( 'to', 'event-monster' ); ?></span>
																<?php
																if ( isset( $event_monster_settings['em_end_date'] ) ) {
																	$em_end_date = $event_monster_settings['em_end_date'];
																} else {
																	$em_end_date = date( 'Y/m/d', strtotime( '+2 day' ) );
																}
																?>
																<input type="text" id="em_end_date" name="em_end_date" class="form-control em_input_zindex" name="end" value="<?php echo esc_attr( $em_end_date ); ?>">
																<i class="fa fa-info-circle em_info_icon em_icon_fix3" data-toggle="tooltip" data-placement="left" title="Set event startdate and end date" aria-hidden="true"></i>
															</div>
														</div>
													</div>
												</div>
												<label class="label-control col-sm-3"><?php esc_html_e( 'Event Start & End Time', 'event-monster' ); ?></label>
												<div class="form-group no-overflow">
													<div class="col-sm-6">
														<div class="input-group clockpicker">
														<?php
														if ( isset( $event_monster_settings['em_start_time'] ) ) {
															$em_start_time = $event_monster_settings['em_start_time'];
														} else {
															$em_start_time = '12:00';
														}
														?>
															<input type="text" id="em_start_time" name="em_start_time" class="form-control em_input_zindex" value="<?php echo esc_attr( $em_start_time ); ?>">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="input-group clockpicker">
														<?php
														if ( isset( $event_monster_settings['em_end_time'] ) ) {
															$em_end_time = $event_monster_settings['em_end_time'];
														} else {
															$em_end_time = '17:00';
														}
														?>
															<input type="text" id="em_end_time" name="em_end_time" class="form-control em_input_zindex" value="<?php echo esc_attr( $em_end_time ); ?>">
															<span class="input-group-addon">
																<i class="fa fa-clock-o"></i>
															</span>
														</div>
													</div>
													<i class="fa fa-info-circle em_info_icon em_icon_fix4" data-toggle="tooltip" data-placement="top" title="Set per day event start time and end time" aria-hidden="true"></i>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
									<!--Organizer-->
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( '2. Event Organizer ( s )', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Heading Text', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_organizer_heading'] ) ) {
																$em_organizer_heading = $event_monster_settings['em_organizer_heading'];
															} else {
																$em_organizer_heading = 'Organizers';
															}
															?>
															<input type="text" id="em_organizer_heading" name="em_organizer_heading" value="<?php echo esc_html( $em_organizer_heading ); ?>" class="form-control" placeholder="Type Section Heading">
														</div>
													</div>
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Organizer ( s )', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<select id="em_organizer" name="em_organizer" class="selectpicker show-tick form-control">
																<?php
																if ( isset( $event_monster_settings['em_organizer'] ) ) {
																	$em_organizer = $event_monster_settings['em_organizer'];
																} else {
																	$em_organizer = '2';
																}
																?>
																<option value="0" 
																<?php
																if ( $em_organizer == 0 ) {
																	echo 'selected=selected';}
																?>
																><?php esc_html_e( 'None', 'event-monster' ); ?></option>
																<option value="1" 
																<?php
																if ( $em_organizer == 1 ) {
																	echo 'selected=selected';}
																?>
																><?php esc_html_e( '1 Organizer', 'event-monster' ); ?></option>
																<option value="2" 
																<?php
																if ( $em_organizer == 2 ) {
																	echo 'selected=selected';}
																?>
																><?php esc_html_e( '2 Organizers', 'event-monster' ); ?></option>
															</select>
															<i class="fa fa-info-circle em_info_icon em_icon_fix5" data-toggle="tooltip" data-placement="right" title="Select how many organizer, you want to show for the event" aria-hidden="true"></i>
														</div>
													</div>
												</div>
												<div class="form-group no-overflow em_organizer_input">
													<div id="organizer1" style="display:none;">
														<div class="col-sm-3">1.</div>
														<?php
														if ( isset( $event_monster_settings['em_organizer_name'][0] ) ) {
															$em_organizer_name0 = $event_monster_settings['em_organizer_name'][0];
														} else {
															$em_organizer_name0 = 'Organizer 1';
														}
														?>
														<div class="col-sm-2"><input type="text" id="em_organizer_name[]" name="em_organizer_name[]" value="<?php echo esc_html( $em_organizer_name0 ); ?>" class="form-control" placeholder="<?php esc_html_e( 'Organizer Name', 'event-monster' ); ?>"/></div>
														<?php
														if ( isset( $event_monster_settings['em_organizer_phone'][0] ) ) {
															$em_organizer_phone0 = $event_monster_settings['em_organizer_phone'][0];
														} else {
															$em_organizer_phone0 = '+11234567890';
														}
														?>
														<div class="col-sm-2"><input type="text" id="em_organizer_phone[]" name="em_organizer_phone[]" value="<?php echo esc_attr( $em_organizer_phone0 ); ?>" class="form-control" placeholder="<?php esc_html_e( 'Organizer Phone', 'event-monster' ); ?>"/></div>
														<?php
														if ( isset( $event_monster_settings['em_organizer_email'][0] ) ) {
															$em_organizer_email0 = $event_monster_settings['em_organizer_email'][0];
														} else {
															$em_organizer_email0 = 'abc@gmail.com';
														}
														?>
														<div class="col-sm-2"><input type="text" id="em_organizer_email[]" name="em_organizer_email[]" value="<?php echo esc_html( $em_organizer_email0 ); ?>" class="form-control" placeholder="<?php esc_html_e( 'Organizer Email', 'event-monster' ); ?>"/></div>
														<?php
														if ( isset( $event_monster_settings['em_organizer_website'][0] ) ) {
															$em_organizer_website0 = $event_monster_settings['em_organizer_website'][0];
														} else {
															$em_organizer_website0 = 'https://abc.com';
														}
														?>
														<div class="col-sm-2"><input type="text" id="em_organizer_website[]" name="em_organizer_website[]" value="<?php echo esc_url( $em_organizer_website0 ); ?>" class="form-control" placeholder="<?php esc_html_e( 'Organizer Website', 'event-monster' ); ?>"/></div>
													</div>
													<div id="organizer2" style="display:none;">
														<div class="col-sm-3">2.</div>
														<?php
														if ( isset( $event_monster_settings['em_organizer_name'][1] ) ) {
															$em_organizer_name1 = $event_monster_settings['em_organizer_name'][1];
														} else {
															$em_organizer_name1 = 'Organizer 2';
														}
														?>
														<div class="col-sm-2"><input type="text" id="em_organizer_name[]" name="em_organizer_name[]" value="<?php echo esc_html( $em_organizer_name1 ); ?>" class="form-control" placeholder="<?php esc_html_e( 'Organizer Name', 'event-monster' ); ?>"/></div>
														<?php
														if ( isset( $event_monster_settings['em_organizer_phone'][1] ) ) {
															$em_organizer_phone1 = $event_monster_settings['em_organizer_phone'][1];
														} else {
															$em_organizer_phone1 = '+11234567890';
														}
														?>
														<div class="col-sm-2"><input type="text" id="em_organizer_phone[]" name="em_organizer_phone[]" value="<?php echo esc_attr( $em_organizer_phone1 ); ?>" class="form-control" placeholder="<?php esc_html_e( 'Organizer Phone', 'event-monster' ); ?>"/></div>
														<?php
														if ( isset( $event_monster_settings['em_organizer_email'][1] ) ) {
															$em_organizer_email1 = $event_monster_settings['em_organizer_email'][1];
														} else {
															$em_organizer_email1 = 'abc@gmail.com';
														}
														?>
														<div class="col-sm-2"><input type="text" id="em_organizer_email[]" name="em_organizer_email[]" value="<?php echo esc_html( $em_organizer_email1 ); ?>" class="form-control" placeholder="<?php esc_html_e( 'Organizer Email', 'event-monster' ); ?>"/></div>
														<?php
														if ( isset( $event_monster_settings['em_organizer_website'][1] ) ) {
															$em_organizer_website1 = $event_monster_settings['em_organizer_website'][1];
														} else {
															$em_organizer_website1 = 'https://abc.com';
														}
														?>
														<div class="col-sm-2"><input type="text" id="em_organizer_website[]" name="em_organizer_website[]" value="<?php echo esc_url( $em_organizer_website1 ); ?>" class="form-control" placeholder="<?php esc_html_e( 'Organizer Website', 'event-monster' ); ?>"/></div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
						<!--Event COUNTDOWN-->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingFourteen-15" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseFourteen-15" aria-expanded="false" aria-controls="collapseFourteen-15">
								<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseFourteen-15" aria-expanded="false" aria-controls="collapseFourteen-15"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-clock"></i> <?php esc_html_e( 'Event Countdown', 'event-monster' ); ?></a></h4>
							</div>
							<div id="collapseFourteen-15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFourteen-15">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( 'Event Countdown', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="em_spacing_sm">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Countdown', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_countdown'] ) ) {
																$em_countdown = $event_monster_settings['em_countdown'];
															} else {
																$em_countdown = 'off';
															}
															?>
															<div class="switch-field">
															  <input type="radio" id="em_countdown_on" name="em_countdown" value="on" 
															  <?php
																if ( $em_countdown == 'on' ) {
																	echo 'checked=checked';}
																?>
																 />
															  <label for="em_countdown_on"><?php esc_html_e( 'ON', 'event-monster' ); ?></label>
															  <input type="radio" id="em_countdown_off" name="em_countdown" value="off" 
															  <?php
																if ( $em_countdown == 'off' ) {
																	echo 'checked=checked';}
																?>
																 />
															  <label for="em_countdown_off"><?php esc_html_e( 'OFF', 'event-monster' ); ?></label>
															</div>
														</div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
						<!--Event Location/Address-->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingFive-6" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseFive-6" aria-expanded="false" aria-controls="collapseFive-6">
								<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseFive-6" aria-expanded="false" aria-controls="collapseFive-6"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-map-marker"></i> <?php esc_html_e( 'Event Venue', 'event-monster' ); ?></a></h4>
							</div>
							<div id="collapseFive-6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive-6">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( 'Event Location / Address', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Heading Text', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_location_heading'] ) ) {
																$em_location_heading = $event_monster_settings['em_location_heading'];
															} else {
																$em_location_heading = 'Venue';
															}
															?>
															<input type="text" id="em_location_heading" name="em_location_heading" value="<?php echo esc_html( $em_location_heading ); ?>" class="form-control em_input_width" placeholder="Type Section Heading">
														</div>
													</div>
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Event Location / Address', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_address'] ) ) {
																$em_address = $event_monster_settings['em_address'];
															} else {
																$em_address = 'Washington Square Park, New York, USA';
															}
															?>
															 <textarea id="em_address" name="em_address" class="form-control em_input_width" placeholder="<?php esc_html_e( 'Type event location / address here', 'event-monster' ); ?>"><?php echo esc_html( $em_address ); ?></textarea>
														</div>
													</div>
												</div>
												<div class="form-group no-overflow">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Phone', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_venue_phone'] ) ) {
																$em_venue_phone = $event_monster_settings['em_venue_phone'];
															} else {
																$em_venue_phone = '+11234567890';
															}
															?>
															 <input type="text" id="em_venue_phone" name="em_venue_phone" value="<?php echo esc_attr( $em_venue_phone ); ?>" class="form-control em_input_width" placeholder="<?php esc_html_e( 'Phone', 'event-monster' ); ?>"/>
														</div>
													</div>
												</div>
												<div class="form-group no-overflow">
													<div class="">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Email', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_venue_email'] ) ) {
																$em_venue_email = $event_monster_settings['em_venue_email'];
															} else {
																$em_venue_email = 'abc@gmail.com';
															}
															?>
															<input type="text" id="em_venue_email" name="em_venue_email" value="<?php echo esc_html( $em_venue_email ); ?>" class="form-control em_input_width" placeholder="<?php esc_html_e( 'Email', 'event-monster' ); ?>"/>
														</div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>	
						<!--Google Map-->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingSix-7" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseSix-7" aria-expanded="false" aria-controls="collapseSix-7">
								<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseSix-7" aria-expanded="false" aria-controls="collapseSix-7"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-map-2"></i> <?php esc_html_e( 'Event Google Map', 'event-monster' ); ?></a></h4>
							</div>
							<div id="collapseSix-7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix-7">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( 'Event Google Map', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Google Map', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_map'] ) ) {
																$em_map = $event_monster_settings['em_map'];
															} else {
																$em_map = 'on';
															}
															?>
															<div class="switch-field">
															  <input type="radio" id="em_map_on" name="em_map" value="on" 
															  <?php
																if ( $em_map == 'on' ) {
																	echo 'checked=checked';}
																?>
																 />
															  <label for="em_map_on"><?php esc_html_e( 'ON', 'event-monster' ); ?></label>
															  <input type="radio" id="em_map_off" name="em_map" value="off" 
															  <?php
																if ( $em_map == 'off' ) {
																	echo 'checked=checked';}
																?>
																 />
															  <label for="em_map_off"><?php esc_html_e( 'OFF', 'event-monster' ); ?></label>
															</div>
														</div>
													</div>
												</div>
												<div class="em_map_div">
													<div class="form-group no-overflow">
														<div class="em_spacing_md">
															<label class="label-control col-sm-3"><?php esc_html_e( 'Google Embed URL', 'event-monster' ); ?></label>
															<div class="col-sm-9">
																<?php
																if ( isset( $event_monster_settings['em_map_code'] ) ) {
																	$em_map_code = $event_monster_settings['em_map_code'];
																} else {
																	$em_map_code = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830931868!2d-74.11976364225498!3d40.69766374852945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1679397079964!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
																}
																?>
																<textarea id="em_map_code" name="em_map_code" class="form-control em_input_width" placeholder="<?php esc_html_e( 'Type event location/address here', 'event-monster' ); ?>"><?php echo stripslashes($em_map_code); ?></textarea>
																<p><a class="em_settings_ancer" href="http://awplife.com/how-to-get-google-maps-url/" target="_blank" ><?php esc_html_e( 'Click Here - How To Get Google Embed Code Or URL', 'event-monster' ); ?></a></p>
															</div>
														</div>
													</div>
													<div class="form-group no-overflow">
														<div class="em_spacing_md">
															<label class="label-control col-sm-3"><?php esc_html_e( 'Google Map Height ( px )', 'event-monster' ); ?></label>
															<div class="col-sm-9">
																<div class="range-slider">
																	<?php
																	if ( isset( $event_monster_settings['em_map_height'] ) ) {
																		$em_map_height = $event_monster_settings['em_map_height'];
																	} else {
																		$em_map_height = '300';
																	}
																	?>
																	<input id="em_map_height" name="em_map_height" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_map_height ); ?>" min="0" max="500">
																	<span class="range-slider__value">0</span>
																</div>
															</div>
														</div>
														<label class="label-control col-sm-3"><?php esc_html_e( 'Google Map Opacity (Transparency)', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<div class="range-slider">
																<?php
																if ( isset( $event_monster_settings['em_map_opacity'] ) ) {
																	$em_map_opacity = $event_monster_settings['em_map_opacity'];
																} else {
																	$em_map_opacity = '0.8';
																}
																?>
																<input id="em_map_opacity" name="em_map_opacity" class="range-slider__range" type="range" value="<?php echo esc_attr( $em_map_opacity ); ?>" min="0.2" step="0.1" max="1.0">
																<span class="range-slider__value">0</span>
															</div>
														</div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
						<!--Accept Event Registration-->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingEleven-12" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseEleven-12" aria-expanded="false" aria-controls="collapseEleven-12">
								<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseEleven-12" aria-expanded="false" aria-controls="collapseEleven-12"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-note2"></i> <?php esc_html_e( 'Accept Event Registration', 'event-monster' ); ?></a></h4>
							</div>
							<div id="collapseEleven-12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven-12">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( 'Accept Event Registration', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Accept Event Registration', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_accept_registration'] ) ) {
																$em_accept_registration = $event_monster_settings['em_accept_registration'];
															} else {
																$em_accept_registration = 'no';
															}
															?>
															<div class="switch-field">
																<input type="radio" id="em_accept_registration_yes" name="em_accept_registration" value="yes" 
																<?php
																if ( $em_accept_registration == 'yes' ) {
																	echo 'checked=checked';}
																?>
																 />
																<label for="em_accept_registration_yes"><?php esc_html_e( 'Yes', 'event-monster' ); ?></label>
																<input type="radio" id="em_accept_registration_no" name="em_accept_registration" value="no" 
																<?php
																if ( $em_accept_registration == 'no' ) {
																	echo 'checked=checked';}
																?>
																 />
																<label for="em_accept_registration_no"><?php esc_html_e( 'No', 'event-monster' ); ?></label>
															</div>
														</div>
													</div>
													<i class="fa fa-info-circle em_info_icon em_icon_fix9" data-toggle="tooltip" data-placement="right" title="Accept event registration if you want ticket booking for event" aria-hidden="true"></i>
													<div id="registration-form-set">
														<div class="em_spacing_md">
															<label class="label-control col-sm-3"><?php esc_html_e( 'Registration Type', 'event-monster' ); ?></label>
															<div class="col-sm-9 em_size_field">
																<?php
																if ( isset( $event_monster_settings['em_registration_type'] ) ) {
																	$em_registration_type = $event_monster_settings['em_registration_type'];
																} else {
																	$em_registration_type = 'internal';
																}
																?>
																<div class="switch-field">
																	<input type="radio" id="em_registration_type_in" name="em_registration_type" value="internal" 
																	<?php
																	if ( $em_registration_type == 'internal' ) {
																		echo 'checked=checked';}
																	?>
																	 />
																	<label for="em_registration_type_in"><?php esc_html_e( 'Internal', 'event-monster' ); ?></label>
																	<input type="radio" id="em_registration_type_ex" name="em_registration_type" value="external" 
																	<?php
																	if ( $em_registration_type == 'external' ) {
																		echo 'checked=checked';}
																	?>
																	 />
																	<label for="em_registration_type_ex"><?php esc_html_e( 'External', 'event-monster' ); ?></label>
																</div>
															</div>
															<i class="fa fa-info-circle em_info_icon em_icon_fix10" data-toggle="tooltip" data-placement="right" title="Internal - inbuilt payment system of event monstor. External - you can give the link where you want to redirect the users" aria-hidden="true"></i>
														</div>
														<!--Event Tickets-->
														<div class="em_spacing_md em_ticket">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Ticket Quantity', 'event-monster' ); ?></label>
															<div class="col-sm-4">
																<?php
																if ( isset( $event_monster_settings['em_tkt_quantity'] ) ) {
																	$em_tkt_quantity = $event_monster_settings['em_tkt_quantity'];
																} else {
																	$em_tkt_quantity = 10;
																} ?>
																
																<input type="number" id="em_tkt_quantity" name="em_tkt_quantity" class="form-control em_input_width" value="<?php echo esc_attr( $em_tkt_quantity ); ?>" placeholder="Total Tickets">
															</div>
															<div class="col-sm-5"></div>
														</div>
														<div class="em_spacing_md">
															<label class="label-control col-sm-3"><?php esc_html_e( 'Button Text', 'event-monster' ); ?></label>
															<div class="col-sm-4">
																<?php
																if ( isset( $event_monster_settings['em_reg_btn_txt'] ) ) {
																	$em_reg_btn_txt = $event_monster_settings['em_reg_btn_txt'];
																} else {
																	$em_reg_btn_txt = 'Registration';
																}
																?>
																<input type="text" id="em_reg_btn_txt" name="em_reg_btn_txt" value="<?php echo esc_html( $em_reg_btn_txt ); ?>" class="form-control em_input_width" placeholder="<?php esc_html_e( 'Button Text', 'event-monster' ); ?>"/>
															</div>
															<div class="col-sm-5"></div>
														</div>
														<div class="em_spacing_md">
															<label class="label-control col-sm-3"><?php esc_html_e( 'Select Button Type', 'event-monster' ); ?></label>
															<div class="col-sm-9">
																<?php
																if ( isset( $event_monster_settings['em_buttons_type'] ) ) {
																	$em_buttons_type = $event_monster_settings['em_buttons_type'];
																} else {
																	$em_buttons_type = 'square_basic';
																}
																?>
																<select id="em_buttons_type" name="em_buttons_type" class="selectpicker show-tick form-control">
																	<optgroup label="Basic Button" class="label-control">
																		<option value="basic" 
																		<?php
																		if ( $em_buttons_type == 'basic' ) {
																			echo 'selected=selected';}
																		?>
																		><?php esc_html_e( 'Basic', 'event-monster' ); ?></option>
																		<option value="large" 
																		<?php
																		if ( $em_buttons_type == 'large' ) {
																			echo 'selected=selected';}
																		?>
																		><?php esc_html_e( 'Large', 'event-monster' ); ?></option>
																		<option value="small" 
																		<?php
																		if ( $em_buttons_type == 'small' ) {
																			echo 'selected=selected';}
																		?>
																		><?php esc_html_e( 'Small', 'event-monster' ); ?></option>
																		<option value="extra_small" 
																		<?php
																		if ( $em_buttons_type == 'extra_small' ) {
																			echo 'selected=selected';}
																		?>
																		><?php esc_html_e( 'Extra Small', 'event-monster' ); ?></option>																	
																	</optgroup>
																</select>
																<i class="fa fa-info-circle em_info_icon em_icon_fix7" data-toggle="tooltip" data-placement="right" title="Set button type for registration button" aria-hidden="true"></i>
															</div>
														</div>
														<div class="em_spacing_md">
															<label class="label-control col-sm-3"><?php esc_html_e( 'Button Color', 'event-monster' ); ?></label>
															<div class="col-sm-9">
																<div class="input-group" id="colorpicker4">
																	<?php
																	if ( isset( $event_monster_settings['em_reg_btn_color'] ) ) {
																		$em_reg_btn_color = $event_monster_settings['em_reg_btn_color'];
																	} else {
																		$em_reg_btn_color = '#ff0034';
																	}
																	?>
																	<input type="text" id="em_reg_btn_color" name="em_reg_btn_color" value="<?php echo esc_attr( $em_reg_btn_color ); ?>" class="form-control">
																	<span class="input-group-addon em_colorpicker"><i></i></span>
																</div>
															</div>
														</div>
														<div class="em_spacing_md">
															<label class="label-control col-sm-3"><?php esc_html_e( 'Button Alignment', 'event-monster' ); ?></label>
															<div class="col-sm-9">
																<?php
																if ( isset( $event_monster_settings['em_reg_btn_align'] ) ) {
																	$em_reg_btn_align = $event_monster_settings['em_reg_btn_align'];
																} else {
																	$em_reg_btn_align = 'center';
																}
																?>
																<div class="switch-field em_size_field">
																	<input type="radio" id="em_reg_btn_align_left" name="em_reg_btn_align" value="left" 
																	<?php
																	if ( $em_reg_btn_align == 'left' ) {
																		echo 'checked=checked';} ?>  />
																	<label for="em_reg_btn_align_left"><?php esc_html_e( 'Left', 'event-monster' ); ?></label>
																	<input type="radio" id="em_reg_btn_align_center" name="em_reg_btn_align" value="center" 
																	<?php
																	if ( $em_reg_btn_align == 'center' ) {
																		echo 'checked=checked';}
																	?>
																	 />
																	<label for="em_reg_btn_align_center"><?php esc_html_e( 'Center', 'event-monster' ); ?></label>
																	<input type="radio" id="em_reg_btn_align_right" name="em_reg_btn_align" value="right" 
																	<?php
																	if ( $em_reg_btn_align == 'right' ) {
																		echo 'checked=checked';}
																	?>
																	 />
																	<label for="em_reg_btn_align_right"><?php esc_html_e( 'Right', 'event-monster' ); ?></label>
																</div>
															</div>
														</div>
														<div id="external-form">
															<div class="em_spacing_md">
																<label class="label-control col-sm-3"><?php esc_html_e( 'Button link', 'event-monster' ); ?></label>
																<div class="col-sm-4">
																	<?php
																	if ( isset( $event_monster_settings['em_reg_btn_link'] ) ) {
																		$em_reg_btn_link = $event_monster_settings['em_reg_btn_link'];
																	} else {
																		$em_reg_btn_link = 'http://awplife.com/';
																	}
																	?>
																	<input type="text" id="em_reg_btn_link" name="em_reg_btn_link" value="<?php echo esc_url( $em_reg_btn_link ); ?>" class="form-control em_input_width" placeholder="<?php esc_html_e( 'Registration Page Link', 'event-monster' ); ?>"/>
																</div>
																<div class="col-sm-5"></div>
															</div>
															<div class="em_spacing_md">
																<label class="label-control col-sm-3"><?php esc_html_e( 'Open Link Tab', 'event-monster' ); ?></label>
																<div class="col-sm-9 em_size_field">
																	<?php
																	if ( isset( $event_monster_settings['em_reg_btn_link_tab'] ) ) {
																		$em_reg_btn_link_tab = $event_monster_settings['em_reg_btn_link_tab'];
																	} else {
																		$em_reg_btn_link_tab = '_blank';
																	}
																	?>
																	<div class="switch-field">
																		<input type="radio" id="em_regi_btn_link_new" name="em_reg_btn_link_tab" value="_blank" 
																		<?php
																		if ( $em_reg_btn_link_tab == '_blank' ) {
																			echo 'checked=checked';}
																		?>
																		 />
																		<label for="em_regi_btn_link_new"><?php esc_html_e( 'New', 'event-monster' ); ?></label>
																		<input type="radio" id="em_regi_btn_link_same" name="em_reg_btn_link_tab" value="_self" 
																		<?php
																		if ( $em_reg_btn_link_tab == '_self' ) {
																			echo 'checked=checked';}
																		?>
																		 />
																		<label for="em_regi_btn_link_same"><?php esc_html_e( 'Same', 'event-monster' ); ?></label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
						<!--Event Social Media Icons-->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingNine-10" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseNine-10" aria-expanded="false" aria-controls="collapseNine-10">
								<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseNine-10" aria-expanded="false" aria-controls="collapseNine-10"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-share"></i> <?php esc_html_e( 'Event Social Media Icons', 'event-monster' ); ?></a></h4>
							</div>
							<div id="collapseNine-10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine-10">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( 'Event Social Media Icons', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="em_spacing_md">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Enable', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_social'] ) ) {
																$em_social = $event_monster_settings['em_social'];
															} else {
																$em_social = 'no';
															}
															?>
															<div class="switch-field">
															  <input type="radio" id="em_social_yes" name="em_social" value="yes" 
															  <?php
																if ( $em_social == 'yes' ) {
																	echo 'checked=checked';}
																?>
																 />
															  <label for="em_social_yes"><?php esc_html_e( 'Yes', 'event-monster' ); ?></label>
															  <input type="radio" id="em_social_no" name="em_social" value="no" 
															  <?php
																if ( $em_social == 'no' ) {
																	echo 'checked=checked';}
																?>
																 />
															  <label for="em_social_no"><?php esc_html_e( 'No', 'event-monster' ); ?></label>
															</div>
														</div>
													</div>
													<div id="em-social-div">
														<label class="label-control col-sm-3"><?php esc_html_e( 'Show Share Button', 'event-monster' ); ?></label>
														<div class="col-sm-9">
															<?php
															if ( isset( $event_monster_settings['em_share_btn'] ) ) {
																$em_share_btn = $event_monster_settings['em_share_btn']; } else {
																$em_share_btn = '
															<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58a429fae4acd1001475a29b&product=inline-share-buttons"></script>
															<div class="sharethis-inline-share-buttons"></div>';
																}
																?>
															<textarea id="em_share_btn" name="em_share_btn" class="form-control em_input_width" placeholder=""><?php echo esc_html( stripslashes( $em_share_btn ) ); ?></textarea>
															<p><a class="em_settings_ancer" href="http://awplife.com/how-to-show-social-share-icon/" target="_blank" ><?php esc_html_e( 'Click Here - How To Get Social Share Buttons Code', 'event-monster' ); ?></a></p>
														</div>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Event Custom CSS field -->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingTen-11" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseTwelve-13" aria-expanded="false" aria-controls="collapseTwelve-13">
								<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseTwelve-13" aria-expanded="false" aria-controls="collapseTwelve-13"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-pen"></i> <?php esc_html_e( 'Event Custom CSS', 'event-monster' ); ?></a></h4>
							</div>
							<div id="collapseTwelve-13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen-11">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( 'Event Custom CSS', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<label class="label-control col-sm-3"><?php esc_html_e( 'Apply coustom CSS', 'event-monster' ); ?></label>
													<div class="col-sm-9">
														<?php
														if ( isset( $event_monster_settings['em_custom_css'] ) ) {
															$em_custom_css = $event_monster_settings['em_custom_css'];
														} else {
															$em_custom_css = '';
														}
														?>
														<textarea id="em_custom_css" name="em_custom_css" class="form-control em_input_width" placeholder=""><?php echo $em_custom_css; ?></textarea>
													</div>
												</div>
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Upgrade To Pro -->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-theme-1 icon-right" role="tab" id="headingTen-12" class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseThrteen-14" aria-expanded="false" aria-controls="collapseThrteen-14">
								<h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-4" href="#collapseThrteen-14" aria-expanded="false" aria-controls="collapseThrteen-14"><i class="em_accordian_icon fa fa-chevron-down"></i><i class="pe-7s-angle-up-circle"></i> <?php esc_html_e( 'Upgrade To Pro', 'event-monster' ); ?></a></h4>
							</div>
							<div id="collapseThrteen-14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen-12">
								<div class="panel-body">
									<div class="col-md-12">
										<h3 class="bg-theme padding-sm"><?php esc_html_e( 'Upgrade Features', 'event-monster' ); ?></h3>
										<div class="col-md-10">
											<blockquote class="highlight-border">
												<div class="form-group no-overflow">
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/user-fraindly.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Beautiful User Interface
															</label>
															<p class="upgrade_details">
															Event Monster has a beautiful & user-friendly interface. Very easy to use, you can create your event in few minutes.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event-monstor-responsive.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Responsive Design
															</label>
															<p class="upgrade_details">
															Event Moster has responsive design, That means the event monster is fully compatible with all devices like  Large desktop, Small desktop, Laptops, Tablets, Phones
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event logo.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Event Banner Option Image / Video / Logo
															</label>
															<p class="upgrade_details">
															The Event Monster has three types off banner option like Image, Video, icon.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event booking.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Manage Bookings
															</label>
															<p class="upgrade_details">
															The Event monster manage the both free and paid bookings.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event-monstor-manage-tickets.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Manage Tickets
															</label>
															<p class="upgrade_details">
															You can create new tickets, set prices, update tickets, delete tickets in the event monster. You can also set quantity of tickets and maximum quantity for users.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event-monstor-inbuilt-payment.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Inbuilt & Secure Payment System
															</label>
															<p class="upgrade_details">
															The Event Monster has inbuilt payment system Like ‘PayPal’. The PayPal is secure and easy payment gateway that you all knows.event-monstor-inbuilt-payment
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event coupons.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Manage Coupons
															</label>
															<p class="upgrade_details">
															You can manage your coupons like add new coupons, edit coupons, delete coupons and you can set the type of a coupon in percentage or flat. You can set the start and expiry date of a coupon.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event gallery.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Masonry Gallery
															</label>
															<p class="upgrade_details">
															Event monster has beautiful and easy to built masonry gallery. In that, you can show your unlimited event imagesUntitled (38)
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event slider.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Slider for sponsors
															</label>
															<p class="upgrade_details">
															If you have sponsor for your event or you want to show sponsors for your event, you can show in a beautiful way in a carousel.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event map.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Google Map
															</label>
															<p class="upgrade_details">
															In google map of event monster, you can easily show your location on google map.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/unlimited colors.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Unlimited Colors
															<p class="upgrade_details">
															You can use unlimited color for design your event. also, you have font size option for managing the font’s size
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event mail.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Premium Quality Email Template
															</label>
															<p class="upgrade_details">
															Event Moster has the best and beautiful email template for showing booking status, details and notification of your event.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<label class="label-control col-sm-3"><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '/images/upgrade pro/event-monster-social-share.png' ); ?>" alt="..." width="170" height="120"></label>
														<div class="col-sm-9">
															<label class="label-control upgrade_details">
															Social Share
															</label>
															<p class="upgrade_details">
															You can show the many social icons for your event.
															</p>
														</div>
													</div>
													<hr>
													<div class="em_spacing_upgrade">
														<div class="col-sm-4">
															<a href="https://awplife.com/account/signup/event-monster-premium" target="_blank" class="btn btn-primary btn-block btn-lg"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Premium Version</a>
														</div>
														<div class="col-sm-4">
															<a href="https://awplife.com/demo/event-monster-premium/" target="_blank" class="btn btn-primary btn-block btn-lg"><i class="fa fa-desktop" aria-hidden="true"></i> Check Live Demo</a>
														</div>	
														<div class="col-sm-4">
															<a href="https://awplife.com/demo/event-monster-premium-admin-demo/" target="_blank" class="btn btn-primary btn-block btn-lg"><i class="fa fa-user" aria-hidden="true"></i> Try Admin Demo</a>
														</div>	
													</div>
												</div>												
											</blockquote>
										</div>
										<div class="col-md-2"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php
// syntax: wp_nonce_field( 'name_of_my_action', 'name_of_nonce_field' );
wp_nonce_field( 'em_save_settings', 'em_save_nonce' );
?>
<!-- get shortcode modal-->
<div class="modal" id="modal-show-shortcode" tabindex="-1" role="dialog" aria-labelledby="modal-new-short-code-label">
	<div class="modal-dialog" role="document" id="inner-modal">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modal-new-ticket-label"><?php esc_html_e( 'Copy Event Shortcode', 'event-monster' ); ?></h4>
			</div>
			<div class="modal-body text-center">
				<p><?php esc_html_e( 'Copy & Embed shortcode into any Page/ Post / Text Widget to display multiple events on site.', 'event-monster' ); ?><br></p>
				<input type="text" name="shortcode" id="shortcode" value="<?php echo '[EM]'; ?>" readonly style="height: 60px; text-align: center; font-size: 24px; width: 300px; border: 2px dashed;">
				<p><?php esc_html_e( 'Copy & Embed shortcode into any Page/ Post / Text Widget to display single event on site.', 'event-monster' ); ?><br></p>
				<input type="text" name="shortcode-list" id="shortcode-list" value="<?php echo '[EM id=' . esc_attr( $post->ID ) . ']'; ?>" readonly style="height: 60px; text-align: center; font-size: 24px; width: 300px; border: 2px dashed;">
				<button type="button" class="btn btn-success margin-top-md center-block" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> <?php esc_html_e( 'Close', 'event-monster' ); ?></button>
			</div>
		</div>
	</div>
</div>

<script>
<!--Hide/Show-->
//open get shortcode modal
jQuery( "#show-shortcode" ).click(function() {
	jQuery('#modal-show-shortcode').modal('show');
});

var logo_size = jQuery('input[name="logo_size"]:checked').val();
var logo_upd = jQuery('input[name="logo_upd"]:checked').val();
var em_map = jQuery('input[name="em_map"]:checked').val();
var em_paid = jQuery('input[name="em_paid"]:checked').val();
var em_sp = jQuery('input[name="em_sp"]:checked').val();
var em_accept_registration = jQuery('input[name="em_accept_registration"]:checked').val();
var em_registration_type = jQuery('input[name="em_registration_type"]:checked').val();
var em_social = jQuery('input[name="em_social"]:checked').val();
	
	if(em_social == "no") {
		jQuery('#em-social-div').hide();
	}
	if(em_social == "yes") {
		jQuery('#em-social-div').show();
	}
	
	if(em_accept_registration == "no") {
		jQuery('#registration-form-set').hide();
	}
	if(em_accept_registration == "yes") {
		jQuery('#registration-form-set').show();
	}
	
	if(em_registration_type == "internal") {
		jQuery('#external-form').hide();
		jQuery('.em_ticket').show();
		jQuery('.ticket_link').show();
	}
	if(em_registration_type == "external") {
		jQuery('#external-form').show();
		jQuery('.em_ticket').hide();
		jQuery('.ticket_link').hide();
	}
	
	if(em_paid == "paid") {
		jQuery('.test_me').show();
	}
	if(em_paid == "") {
		jQuery('.test_me').hide();
	}
	
	if(em_map == "on") {
		jQuery('.em_map_div').show();
	}
	if(em_map == "off") {
		jQuery('.em_map_div').hide();
	}
	if(logo_size == "fixed") {
		jQuery('.em_range_bar').hide();
		jQuery('.em_logo_size').show();
	}
	if(logo_size == "custom") {
		jQuery('.em_logo_size').hide();
		jQuery('.em_range_bar').show();
	}
	if(logo_upd == "image") {
		jQuery('.em_logo').hide();
		jQuery('.em_img_upld').show();
		jQuery('.em_video').hide();
		jQuery('.em_logo_size_section').show();
	}
	if(logo_upd == "logo") {
		jQuery('.em_img_upld').hide();
		jQuery('.em_logo').show();
		jQuery('.em_video').hide();
		jQuery('.em_logo_size_section').hide();
	}
	if(logo_upd == "video") {
		jQuery('.em_img_upld').hide();
		jQuery('.em_logo').hide();
		jQuery('.em_video').show();
		jQuery('.em_logo_size_section').show();
	}
//on change effect
jQuery(document).ready(function() {
	//accordion icon
	jQuery(function() {
		function toggleSign(e) {
			jQuery(e.target)
			.prev('.panel-heading')
			.find('i')
			.toggleClass('fa fa-chevron-down fa fa-chevron-up');
		}
		jQuery('#accordion-4').on('hidden.bs.collapse', toggleSign);
		jQuery('#accordion-4').on('shown.bs.collapse', toggleSign);
	})
	//toggle button on/off
	jQuery('input[name="logo_size"]').change(function(){
		var logo_size = jQuery('input[name="logo_size"]:checked').val();
		if(logo_size == "fixed") {
			jQuery('.em_range_bar').hide();
			jQuery('.em_logo_size').show();
		}
		if(logo_size == "custom") {
			jQuery('.em_logo_size').hide();
			jQuery('.em_range_bar').show();
		}
	});
	jQuery('input[name="logo_upd"]').change(function(){
		var logo_upd = jQuery('input[name="logo_upd"]:checked').val();
		if(logo_upd == "image") {
			jQuery('.em_logo').hide();
			jQuery('.em_img_upld').show();
			jQuery('.em_video').hide();
			jQuery('.em_logo_size_section').show();
		}
		if(logo_upd == "logo") {
			jQuery('.em_img_upld').hide();
			jQuery('.em_logo').show();
			jQuery('.em_video').hide();
			jQuery('.em_logo_size_section').hide();
		}
		if(logo_upd == "video") {
			jQuery('.em_img_upld').hide();
			jQuery('.em_logo').hide();
			jQuery('.em_video').show();
			jQuery('.em_logo_size_section').show();
		}
	});
	
	jQuery('input[name="em_map"]').change(function(){
		var em_map = jQuery('input[name="em_map"]:checked').val();
		if(em_map == "on") {
			jQuery('.em_map_div').show();
		}
		if(em_map == "off") {
			jQuery('.em_map_div').hide();
		}
	});
	
	jQuery('input[name="em_accept_registration"]').change(function(){
	var em_accept_registration = jQuery('input[name="em_accept_registration"]:checked').val();
		if(em_accept_registration == "no") {
			jQuery('#registration-form-set').hide();
		}
		if(em_accept_registration == "yes") {
			jQuery('#registration-form-set').show();
		}
	});
	jQuery('input[name="em_registration_type"]').change(function(){
	var em_registration_type = jQuery('input[name="em_registration_type"]:checked').val();
		if(em_registration_type == "internal") {
			jQuery('#external-form').hide();
			jQuery('.em_ticket').show();
			jQuery('.ticket_link').show();
		}
		if(em_registration_type == "external") {
			jQuery('#external-form').show();
			jQuery('.em_ticket').hide();
			jQuery('.ticket_link').hide();
		}
	});
	jQuery('input[name="em_social"]').change(function(){
	var em_social = jQuery('input[name="em_social"]:checked').val();
		
		if(em_social == "no") {
			jQuery('#em-social-div').hide();
		}
		if(em_social == "yes") {
			jQuery('#em-social-div').show();
		}
	});
	//Checkbox
	jQuery('input[name="em_paid"]').change(function(){
		var em_paid = jQuery('input[name="em_paid"]:checked').val();
		if(jQuery(this).is(":checked")) {
			jQuery('.test_me').show();
		}else{
			jQuery('.test_me').hide();
		}
	});
	
	//Selectbox
	jQuery('.selectpicker').selectpicker({
	  style: 'btn-info',
	  size: 4
	});
	
	// info tooltip
	jQuery('[data-toggle="tooltip"]').tooltip(); 
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
//organizers 
jQuery('#em_organizer').change(function(){
	var em_organizer = jQuery('#em_organizer').val();
	//alert('em_organizer');
	if(em_organizer == 0) {
		jQuery('#organizer1').hide();
		jQuery('#organizer2').hide();
	}
	if(em_organizer == 1) {
		jQuery('#organizer1').show();
		jQuery('#organizer2').hide();
	}
	if(em_organizer == 2) {
		jQuery('#organizer1').show();
		jQuery('#organizer2').show();
	}
});
var em_organizer = jQuery('#em_organizer').val();
if(em_organizer == 0) {
	jQuery('#organizer1').hide();
	jQuery('#organizer2').hide();
}	
if(em_organizer == 1) {
	jQuery('#organizer1').show();
	jQuery('#organizer2').hide();
}
if(em_organizer == 2) {
	jQuery('#organizer1').show();
	jQuery('#organizer2').show();
}
</script>
