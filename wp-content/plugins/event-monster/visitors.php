<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// js
wp_enqueue_script( 'jquery', 'jquery-ui-core' );
wp_enqueue_script( 'em-bootstrap-js', EM_PLUGIN_URL . 'js/bootstrap.min.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-jquery-data-tables-js', EM_PLUGIN_URL . 'js/jquery-data-tables.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-table-jquery-js', EM_PLUGIN_URL . 'js/tables.js', array( 'jquery' ), '', true );
wp_enqueue_script( 'awl-em-visitor-ajax-js', EM_PLUGIN_URL . 'js/em-visitor-ajax.js', array( 'jquery' ), '', true );
// css
wp_enqueue_style( 'awl-em-bootstrap-css', EM_PLUGIN_URL . 'css/bootstrap.css' );
wp_enqueue_style( 'awl-em-styles-css', EM_PLUGIN_URL . 'css/styles.css' );
wp_enqueue_style( 'awl-em-jquery-data-tables-css', EM_PLUGIN_URL . 'css/jquery-data-tables.css' );
wp_enqueue_style( 'awl-em-jasny-bootstrap-css', EM_PLUGIN_URL . 'css/jquery-data-tables-bs3.css' );
wp_enqueue_style( 'awl-em-font-awesome-css', EM_PLUGIN_URL . 'css/font-awesome.css' );
wp_enqueue_style( 'awl-em-event_monster-css', EM_PLUGIN_URL . 'css/event_monster.css' );
wp_enqueue_style( 'awl-em-activities-css', EM_PLUGIN_URL . 'css/activities.css' );
?>
<div id="em_input_load" class="loader-wrapper loader-wrapper-4" style="display:none;">
	<div class="em_spinner"></div>
</div>
<div class="preload">
	<div id="masonry" class="">
		<div class="module-wrapper masonry-item col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<section class="module module-headings" id="em_load_bg">
				<div class="module-inner">
					<div class="module-heading row">
						<div class="col-md-6 ">
							<div class="col-md-4 text-center">
								<h3 class="module-title"><i class="fa fa-users" aria-hidden="true"></i> <?php esc_html_e( 'Visitors', 'event-monster' ); ?></h3>
							</div>
							<div class="col-md-8 text-center">
							</div>
						</div>
						<div class="col-md-6 text-right">
							<select name="select_event" id="select_event" onchange="EventVisitorShow('showvisitor');">
								<option value="all"><?php esc_html_e( 'All Event', 'event-monster' ); ?></option>
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
										$c_post_title = $all_event_name->post_title; ?>
										<option value="<?php echo esc_attr( $c_post_id ); ?>"><?php echo esc_html( $c_post_title ); ?></option>
										<?php
									}
								}
								?>
							</select>
							<button class="btn btn-success" id="downloa_visitor" name="downloa_visitor" onclick="return DownloadVisitorList();"><i class="fa fa-download"></i> <?php esc_html_e( 'Download All Vsitor List', 'event-monster' ); ?></button>
						</div>
					</div>
					<!--Finder for view-->
					<div class="modal" id="modal-view-visitor" tabindex="-1" role="dialog" aria-labelledby="modal-view-visitor-label" style="display:none;">
					</div>
					<div class="module-content collapse in" id="content-1">
						<div class="module-content-inner no-padding-bottom">
							<div class="table-responsive" id="em_visitor_table">
								<table id="datatables-1" class="table table-striped display">
									<thead>
										<tr>
											<th class="bg-theme padding-sm">#</th>
											<th class="bg-theme padding-sm"><?php esc_html_e( 'Name', 'event-monster' ); ?></th>
											<th class="bg-theme padding-sm"><?php esc_html_e( 'Email', 'event-monster' ); ?></th>
											<th class="bg-theme padding-sm"><?php esc_html_e( 'Event', 'event-monster' ); ?></th>
											<th class="bg-theme padding-sm"><?php esc_html_e( 'Mobile No.', 'event-monster' ); ?></th>
											<th class="text-center bg-theme padding-sm"><?php esc_html_e( 'Controls', 'event-monster' ); ?></th>
											<th class="text-center bg-theme padding-sm"><?php esc_html_e( 'Delete All', 'event-monster' ); ?></th>
										</tr>
									</thead>
									<tbody>
									<?php
										global $wpdb;
										$attendees_table           = $wpdb->prefix . 'em_attendees';
										$em_attendees_table_result = $wpdb->get_results( "SELECT * FROM `$attendees_table`" );
									if ( count( $em_attendees_table_result ) ) {
										$no = 1;
										foreach ( $em_attendees_table_result as $single_row ) {
											$attendee_id = $single_row->id;
											$event_id    = $single_row->event_id;
											$ticket_id   = $single_row->ticket_id;
											$first_name  = $single_row->first_name;
											$last_name   = $single_row->last_name;
											$email       = $single_row->email;
											$phone       = $single_row->phone;
											$extra       = $single_row->extra;
											?>
										<tr id="vst_record-<?php echo esc_attr( $attendee_id ); ?>">
											<td><?php echo esc_attr( $no ); ?></td>
											<td class="date truncate"><?php echo esc_html( $first_name . ' ' . $last_name ); ?></td>
											<td class="client truncate"><?php echo esc_html( $email ); ?></td>
											<?php $event_name = get_the_title( $event_id ); ?>
											<td class="client truncate"><?php echo esc_html( $event_name ); ?></td>
											<td class="total"><?php echo esc_attr( $phone ); ?></td>
											<td class="text-center">
												<button class="btn btn-info-alt btn-circle" data-toggle="modal" data-target="#modal-view-visitor" onclick="return ManageVisitor('viewvisitor', '<?php echo esc_attr( $attendee_id ); ?>');"><i class="fa fa-eye"></i></button>
												<button class="btn btn-danger-alt btn-circle" id="delete_visitor" name="delete_visitor" onclick="return ManageVisitor('deletevisitor', '<?php echo esc_attr( $attendee_id ); ?>', '<?php echo wp_create_nonce( 'em-delete-user-nonce' ); ?>');" ><i class="fa fa-trash-o"></i></button>
											</td>
											<td class="text-center">
												<input type="checkbox" class="em-checkbox" name="em-checkbox" id="ci" value="<?php echo esc_attr( $attendee_id ); ?>">
											</td>
										</tr>
											<?php
											$no++;
										}
									} ?>
									</tbody>
									<tfoot>
										<tr>
											<th class="bg-theme padding-sm">#</th>
											<th class="bg-theme padding-sm"><?php esc_html_e( 'Name', 'event-monster' ); ?></th>
											<th class="bg-theme padding-sm"><?php esc_html_e( 'Email', 'event-monster' ); ?></th>
											<th class="bg-theme padding-sm"><?php esc_html_e( 'Event', 'event-monster' ); ?></th>
											<th class="bg-theme padding-sm"><?php esc_html_e( 'Mobile No.', 'event-monster' ); ?></th>
											<th class="text-center bg-theme padding-sm"><?php esc_html_e( 'Controls', 'event-monster' ); ?></th>
											<th class="text-center bg-theme padding-sm">
											<button class="btn btn-success btn-sm " id="all_checked_visitor" name="all_checked_visitor" ><i class="fa fa-check-square-o" ></i> <?php esc_html_e( 'All', 'event-monster' ); ?> </button>
											<button class="btn btn-danger btn-sm" id="delete_all_checked_visitor" name="delete_all_checked_visitor" onclick="return ManageVisitor('deleteallvisitor', '-1', '<?php echo wp_create_nonce( 'em-delete-all-user-nonce' ); ?>');" ><i class="fa fa-trash-o"></i> <?php esc_html_e( 'All', 'event-monster' ); ?> </button></th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php
// inclue ajax prossesinf file
require_once 'em-ajax-prossesing/em-visitor-ajax.php';
?>
<script>
//download Attendees list
function DownloadVisitorList(){
	//get filter value
	var filter = jQuery('#select_event').val();
	
	//Ajax download user list code
	var DownloadallVisitorList = new XMLHttpRequest();
	//check object request & response
	DownloadallVisitorList.onreadystatechange = function() {
		if (DownloadallVisitorList.readyState == 4 && DownloadallVisitorList.status == 200) {
			if((DownloadallVisitorList.responseText.indexOf("file-created") >= 0)) {
				<?php
					$upload_dir      = wp_upload_dir();
					$create_file_url = $upload_dir['baseurl'] . '/visitors-list.csv';
				?>
				window.open('<?php echo esc_js( $create_file_url ); ?>', '_blank');
			}
		}

		if(DownloadallVisitorList.status == 404) {
			alert('File not found & object not responding.');
			return false;
		}
	};		
	//data post by object
	DownloadallVisitorList.open("POST", location.href, true);
	DownloadallVisitorList.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	DownloadallVisitorList.send('action=download-visitor-list&filter='+filter);
}

//event visitor show
function EventVisitorShow(action){
	jQuery("#em_input_load").show();
	jQuery("#em_visitor_table").css({
		"opacity": "0.27"
	});
	var select_event = jQuery('#select_event').val();
	jQuery.ajax({
		type: 'POST',
		url: location.href,
		data:'&select_event=' + select_event + '&action=' + action,
		success: function(response) {
			jQuery('#em_visitor_table').html(jQuery(response).find('div#em_visitor_table'));
			jQuery("#datatables-1").remove();
			jQuery("#datatables-1").DataTable();
			jQuery("#em_input_load").hide();
			jQuery("#em_visitor_table").css({
				"opacity": "1"
			});
		}
	});
}
</script>
