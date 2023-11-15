<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( isset( $_POST['action'] ) ) {
	$action = $_POST['action'];
	$nonce = $_POST['nonce'];
	global $wpdb;
	$attendees_table = $wpdb->prefix . 'em_attendees';
	if ( $action == 'deletevisitor' && wp_verify_nonce( $nonce, 'em-delete-user-nonce' )) {
		$id = $_POST['id'];
		if ( $wpdb->query( $wpdb->prepare( "DELETE FROM `$attendees_table` WHERE id = %d ", $id ) ) ) {
			echo 'Record has been deleted';
		}
	}

	// View visitors
	if ( $action == 'viewvisitor' ) {
		$id    = $_POST['id'];
		$em_view_visitors_result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `$attendees_table` WHERE id = %d ", $id ) );
		if ( count( $em_view_visitors_result ) ) {
			foreach ( $em_view_visitors_result as $single_row ) {
				$attendee_id = $single_row->id;
				$event_id    = $single_row->event_id;
				$ticket_id   = $single_row->ticket_id;
				$first_name  = $single_row->first_name;
				$last_name   = $single_row->last_name;
				$email       = $single_row->email;
				$phone       = $single_row->phone;
				$extra       = $single_row->extra;
				?>
			<!-- model form -->
			<div class="modal" id="modal-view-visitor" tabindex="-1" role="dialog" aria-labelledby="modal-view-visitor-label">
				<div class="modal-dialog" role="document" id="inner-modal">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modal-new-visitor-label"><?php esc_html_e( 'View Visitor / Attendee', 'event-monster' ); ?></h4>
						</div>
						<div class="modal-body">
							<form id="em_visitor_form" name="em_visitor_form">
								<div id="" class="view activities-view">
									<div class="sidebar">
										<div class="module-wrapper">
											<div class="module">
												<ul class="list-unstyled filter-list">
													<li class="active"><a href="#"><?php esc_html_e( 'Name', 'event-monster' ); ?></a></li>
													<li><a href="#"><?php echo esc_html( $first_name . ' ' . $last_name ); ?></a></li>
													<li class="active"><a href="#"><?php esc_html_e( 'Email', 'event-monster' ); ?></a></li>
													<li><a href="#"><?php echo esc_html( $email ); ?></a></li>
													<?php if ( $phone ) { ?>
													<li class="active"><a href="#"><?php esc_html_e( 'Phone', 'event-monster' ); ?></a></li>
													<li><a href="#"><?php echo esc_attr( $phone ); ?></a></li>
													<?php } ?>
													<li class="active"><a href="#"><?php esc_html_e( 'Event', 'event-monster' ); ?></a></li>
													<?php $event_name = get_the_title( $event_id ); ?>
													<li><a href="#"><?php echo esc_html( $event_name ); ?></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<button type="button" class="btn btn-success margin-top-md center-block" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> <?php esc_html_e( 'Close', 'event-monster' ); ?></button>
							</form>
						</div>
					</div>
				</div>
			</div><!--//modal-->
				<?php
			}
		}
	}

	if ( $action == 'deleteallvisitor' && wp_verify_nonce( $nonce, 'em-delete-all-user-nonce' ) ) {
		$ids   = explode( ',', $_POST['id'] );
		$count = count( $ids );
		if ( is_array( $ids ) ) {
			foreach ( $ids as $id ) {
				if ( $wpdb->query( $wpdb->prepare( "DELETE FROM `$attendees_table` WHERE id = %d ", $id ) ) ) {
					echo 'Record has been deleted';
				}
			}
		}
	}

	// download user list
	if ( $action == 'download-visitor-list' ) {
		$filter           = $_POST['filter'];
		$upload_dir       = wp_upload_dir();
		$create_file_path = $upload_dir['basedir'];
		// file create and open
		if ( $visitors_list_file = fopen( $create_file_path . '/visitors-list.csv', 'w' ) ) {
			// fetch all visitor form database
			$first_line_to_write = "#, First Name, Last Name, Email, Phone, Event \n";
			fwrite( $visitors_list_file, $first_line_to_write );
			if ( $filter == 'all' ) {
				$visitors_searh_query_result = $wpdb->get_results( "SELECT * FROM `$attendees_table`" );
			} else {
				$visitors_searh_query_result = $wpdb->get_results( "SELECT * FROM `$attendees_table` WHERE `event_id` = '$filter'" );
			}

			if ( count( $visitors_searh_query_result ) ) {
				$no = 1;
				foreach ( $visitors_searh_query_result as $single_visitor ) {
					$id         = $single_visitor->id;
					$first_name = $single_visitor->first_name;
					$last_name  = $single_visitor->last_name;
					$email      = $single_visitor->email;
					$phone      = $single_visitor->phone;
					// get event name
					$event_id     = $single_visitor->event_id;
					$event_name   = get_the_title( $event_id );
					$txt_to_write = "$no, $first_name, $last_name, $email, $phone, $event_name \n";
					fwrite( $visitors_list_file, $txt_to_write );
					$no++;
				}
			}
			fclose( $visitors_list_file );
			echo 'file-created.';
		} else {
			echo 'File not created.';
		}
	}

	// show visitors list
	if ( $action == 'showvisitor' ) {
		$select_visitors_by_event = $_POST['select_event'];

		if ( $select_visitors_by_event == 'all' ) {
			?>
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
								<button class="btn btn-danger-alt btn-circle" id="delete_visitor" name="delete_visitor" onclick="return ManageVisitor('deletevisitor', '<?php echo esc_attr( $attendee_id ); ?>', '<?php echo wp_create_nonce( 'em-delete-user-nonce' ); ?>');" ><i class="fa fa-trash-o"></i></button>
							</td>
							<td class="text-center">
								<input type="checkbox" id="ci" value="<?php echo esc_attr( $attendee_id ); ?>">
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
							<button class="btn btn-success btn-sm" id="all_checked_visitor" name="all_checked_visitor" ><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php esc_html_e( 'All', 'event-monster' ); ?> </button>
							<button class="btn btn-danger btn-sm" id="delete_all_checked_visitor" name="delete_all_checked_visitor" onclick="return ManageVisitor('deleteallvisitor', '-1', '<?php echo wp_create_nonce( 'em-delete-all-user-nonce' ); ?>');" ><i class="fa fa-trash-o"></i> <?php esc_html_e( 'All', 'event-monster' ); ?> </button></th>
						</tr>
					</tfoot>
				</table>
			</div>
			<?php
		} else {
			$visitors_searh_query_result = $wpdb->get_results( "SELECT * FROM `$attendees_table` WHERE `event_id` LIKE '$select_visitors_by_event'" );
			if ( count( $visitors_searh_query_result ) ) {
				$no = 1;
				?>
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
							$em_attendees_table_result = $wpdb->get_results( "SELECT * FROM `$attendees_table` WHERE `event_id` LIKE '$select_visitors_by_event'" );
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
									$extra       = $single_row->extra; ?>
							<tr id="vst_record-<?php echo esc_attr( $attendee_id ); ?>">
								<td><?php echo esc_attr( $no ); ?></td>
								<td class="date truncate"><?php echo esc_html( $first_name . ' ' . $last_name ); ?></td>
								<td class="client truncate"><?php echo esc_html( $email ); ?></td>
									<?php $event_name = get_the_title( $event_id ); ?>
								<td class="client truncate"><?php echo esc_html( $event_name ); ?></td>
								<td class="total"><?php echo esc_attr( $phone ); ?></td>
								<td class="text-center">
									<button class="btn btn-danger-alt btn-circle" id="delete_visitor" name="delete_visitor" onclick="return ManageVisitor('deletevisitor', '<?php echo esc_attr( $attendee_id ); ?>', '<?php echo wp_create_nonce( 'em-delete-user-nonce' ); ?>');" ><i class="fa fa-trash-o"></i></button>
								</td>
								<td class="text-center">
									<input type="checkbox" class="em-checkbox" name="em-checkbox" id="ci" value="<?php echo esc_attr( $attendee_id ); ?>">
								</td>
							</tr>
									<?php
									$no++;
								}
							} else {
								?>
								<tr>
								<p class="text-center"><?php esc_html_e( 'No visitor found!!', 'event-monster' ); ?></p>
								</tr>
								<?php
							}
							?>
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
								<button class="btn btn-success btn-sm" id="all_checked_visitor" name="all_checked_visitor" ><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php esc_html_e( 'All', 'event-monster' ); ?> </button>
								<button class="btn btn-danger btn-sm" id="delete_all_checked_visitor" name="delete_all_checked_visitor" onclick="return ManageVisitor('deleteallvisitor', '-1', '<?php echo wp_create_nonce( 'em-delete-all-user-nonce' ); ?>');" ><i class="fa fa-trash-o"></i> <?php esc_html_e( 'All', 'event-monster' ); ?> </button></th>
							</tr>
						</tfoot>
					</table>
				</div> 
				<?php
			} else {
				?>
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
								<button class="btn btn-success btn-sm" id="all_checked_visitor" name="all_checked_visitor" ><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php esc_html_e( 'All', 'event-monster' ); ?> </button>
								<button class="btn btn-danger btn-sm" id="delete_all_checked_visitor" name="delete_all_checked_visitor" onclick="return ManageVisitor('deleteallvisitor', '-1', '<?php echo wp_create_nonce( 'em-delete-all-user-nonce' ); ?>');" ><i class="fa fa-trash-o"></i> <?php esc_html_e( 'All', 'event-monster' ); ?> </button></th>
							</tr>
						</tfoot>
					</table>
				</div> 
				<?php
			}
		}
	} // end show visitors
} // end if isset action
