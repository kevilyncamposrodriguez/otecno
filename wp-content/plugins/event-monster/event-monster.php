<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
Plugin Name: Event Monster
Plugin URI: https://awplife.com/wordpress-plugins/event-monster-premium/
Description: Event Monster For WordPress.
Version: 1.3.0
Author: A WP Life
Author URI: https://awplife.com/
Text Domain: event-monster
License: GPLv2 or later
Domain Path: /languages
 **/
// Create tables if not exist
// em_tickets
function pippin_get_image_id( $image_url ) {
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );
	return $attachment[0];
}

register_activation_hook( __FILE__, 'awl_em_tables_create' );
function awl_em_tables_create() {
	global $wpdb;
	$em_db_tables_charcter_collate = $wpdb->get_charset_collate();

	$em_ticket_table     = $wpdb->prefix . 'em_tickets';
	$em_ticket_table_sql = "
		CREATE TABLE IF NOT EXISTS `$em_ticket_table` (
		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
		  `desc` text CHARACTER SET utf8 NOT NULL,
		  `price` float NOT NULL,
		  `status` varchar(256) CHARACTER SET utf8 NOT NULL,
		  `extra` text NOT NULL
		) $em_db_tables_charcter_collate ;
	";
	$wpdb->query( $em_ticket_table_sql );

	// sample free ticket data
	$sample_free_ticket_sql = "INSERT INTO `$em_ticket_table` (`id`, `name`, `desc`, `price`, `status`, `extra`) VALUES (1, 'Free Ticket', 'This is a sample free ticket for the demo. You can modify it information ant any time. Free ticket cost will zero.', '0', 'available', '');";
	$wpdb->query( $sample_free_ticket_sql );

	// em_bookings
	$em_booking_table     = $wpdb->prefix . 'em_bookings';
	$em_booking_table_sql = "
		CREATE TABLE IF NOT EXISTS `$em_booking_table` (
		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		  `event_id` int(11) NOT NULL,
		  `ticket_id` text NOT NULL,
		  `amount` int(11) NOT NULL,
		  `coupon_id` int(11) NOT NULL,
		  `attendees_id` int(11) NOT NULL,
		  `booking_type` varchar(256) NOT NULL,
		  `payment_id` int(11) NOT NULL,
		  `status` varchar(256) NOT NULL,
		  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  `extra` text NOT NULL
		) $em_db_tables_charcter_collate ;
	";
	$wpdb->query( $em_booking_table_sql );

	// em_attendees
	$em_attendee_table     = $wpdb->prefix . 'em_attendees';
	$em_attendee_table_sql = "
		CREATE TABLE IF NOT EXISTS `$em_attendee_table` (
		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		  `event_id` int(11) NOT NULL,
		  `ticket_id` text NOT NULL,
		  `first_name` varchar(256) NOT NULL,
		  `last_name` varchar(256) NOT NULL,
		  `email` varchar(256) NOT NULL,
		  `phone` varchar(256) NOT NULL,
		  `extra` text NOT NULL
		) $em_db_tables_charcter_collate ;
	";
	$wpdb->query( $em_attendee_table_sql );

	// alter attendee table for ticket_id
	$check_ticket_id      = "SELECT `ticket_id` FROM `$em_attendee_table`;";
	$check_ticket_id_done = $wpdb->query( $check_ticket_id );
	if ( ! $check_ticket_id_done ) {
		$em_alter_attendee_table_sql = "ALTER TABLE `$em_attendee_table` ADD `ticket_id` TEXT NOT NULL AFTER `event_id`;";
		$wpdb->query( $em_alter_attendee_table_sql );
	}

	// Common Settings page settings
	$emdefaultsettings = array(
		// like button
		'em_form_heading_one'        => 'Book Ticket Now',
		'em_form_sub_heading'        => 'Fill in the form below to book tickets',
		'em_form_sucsess_msg_field'  => 'Your Booking is completed!!',
		'em_booking_full_msg'        => 'All Tickets are Booked!!',
		'like_url'                   => 'http://www.awplife.com',
		'em_main_font_size'          => 24,
		'em_sub_font_size'           => 18,
		'em_nrml_font_size'          => 16,
		'em_form_first_name_field'   => 'First Name',
		'em_form_last_name_field'    => 'Last Name',
		'em_form_email_field'        => 'Email',
		'em_form_phone_field'        => 'Phone',
		'email_carrier'              => 'php',
		'em_host_name'               => '',
		'em_email'                   => '',
		'em_password'                => '',
		'em_port'                    => '',
		'em_encription'              => 'ssl',
		'em_php_email'               => '',
		'em_notification_client'     => 'on',
		'em_notification_sub_client' => '',
		'em_notification_msg_client' => '',
		'em_notification_admin'      => 'on',
		'em_notification_sub_admin'  => '',
		'em_notification_msg_admin'  => '',
		'em_paypal'                  => 'paypal',
		'em_payment_mode'            => 'standerd_payment',
		'em_payment_email_id'        => '',
		'em_currency_code'           => 'USD',
		'em_reminder_email'          => '',
		'em_reminder_before_days'    => 2,
		'em_reminder_sub'            => '',
		'em_reminder_msg'            => '',
	);
	add_option( 'awl_em_common_settings', base64_encode( serialize( $emdefaultsettings ) ) );
}

if ( ! class_exists( 'Awl_Event_Monster' ) ) {
	class Awl_Event_Monster {
		public function __construct() {
			$this->_constants();
			$this->_hooks();
		}

		protected function _constants() {
			// Plugin Version
			define( 'EM_PLUGIN_VER', '1.3.0' );

			// Plugin Text Domain
			define( 'EM_TXTDM', 'event-monster' );

			// Plugin Name
			define( 'EM_PLUGIN_NAME', __( 'Event Monster', EM_TXTDM ) );

			// Plugin Slug
			define( 'EM_PLUGIN_SLUG', 'awl_event_monster' );

			// Plugin Directory Path
			define( 'EM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

			// Plugin Directory URL
			define( 'EM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

			define( 'EM_SECURE_KEY', md5( NONCE_KEY ) );
		} // end of constructor function

		protected function _hooks() {
			// Load text domain
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

			// add gallery menu item, change menu filter for multisite
			add_action( 'admin_menu', array( $this, 'event_monster_menu' ), 101 );

			// Create Event Monster Custom Post
			add_action( 'init', array( $this, 'Event_Monster' ) );

			// Add meta box to custom post
			add_action( 'add_meta_boxes', array( $this, 'admin_add_meta_box' ) );

			// loaded during admin init
			add_action( 'admin_init', array( $this, 'admin_add_meta_box' ) );

			add_action( 'wp_ajax_em_gallery', array( &$this, '_ajax_em_slide_responsive' ) );

			add_action( 'wp_ajax_em_spr_gallery', array( &$this, '_ajax_em_spr_slide' ) );

			add_action( 'save_post', array( &$this, '_awl_em_save_settings' ) );

			// Shortcode Compatibility in Text Widgets
			add_filter( 'widget_text', 'do_shortcode' );

			// add pfg cpt shortcode column - manage_{$post_type}_posts_columns
			add_filter( 'manage_awl_event_monster_posts_columns', array( &$this, 'set_awl_event_monster_shortcode_column_name' ) );

			// add pfg cpt shortcode column data - manage_{$post_type}_posts_custom_column
			add_action( 'manage_awl_event_monster_posts_custom_column', array( &$this, 'custom_awl_event_monster_shodrcode_data' ), 10, 2 );

		} // end of hook function


		// Event Monster cpt shortcode column before date columns
		public function set_awl_event_monster_shortcode_column_name( $defaults ) {
			$new = array();
			unset( $defaults['tags'] );   // remove it from the columns list

			foreach ( $defaults as $key => $value ) {
				if ( $key == 'date' ) {  // when we find the date column
					$new['awl_event_monster_shortcode'] = __( 'Shortcode', 'event-monster' );  // put the tags column before it
				}
				$new[ $key ] = $value;
			}
			return $new;
		}

		// Event Monster cpt shortcode column data
		public function custom_awl_event_monster_shodrcode_data( $column, $post_id ) {
			switch ( $column ) {
				case 'awl_event_monster_shortcode':
					echo "<input type='text' class='button button-primary' id='event-monster-shortcode-" . esc_attr( $post_id ) . "' value='[EM id=" . esc_attr( $post_id ) . "]' style='font-weight:bold; background-color:#32373C; color:#FFFFFF; text-align:center;' />";
					echo "<input type='button' class='button button-primary' onclick='return EVENTCopyShortcode" . esc_attr( $post_id ) . "();' readonly value='Copy' style='margin-left:4px;' />";
					echo "<span id='copy-msg-" . esc_attr( $post_id ) . "' class='button button-primary' style='display:none; background-color:#32CD32; color:#FFFFFF; margin-left:4px; border-radius: 4px;'>copied</span>";
					echo '<script>
						function EVENTCopyShortcode' . esc_attr( $post_id ) . "() {
							var copyText = document.getElementById('event-monster-shortcode-" . esc_attr( $post_id ) . "');
							copyText.select();
							document.execCommand('copy');
							
							//fade in and out copied message
							jQuery('#copy-msg-" . esc_attr( $post_id ) . "').fadeIn('1000', 'linear');
							jQuery('#copy-msg-" . esc_attr( $post_id ) . "').fadeOut(2500,'swing');
						}
						</script>
					";
					break;
			}
		}


		public function load_textdomain() {
			load_plugin_textdomain( 'event-monster', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		public function event_monster_menu() {
			$visitors   = add_submenu_page( 'edit.php?post_type=' . EM_PLUGIN_SLUG, __( 'Visitors / Attendee', 'event-monster' ), __( 'Visitors / Attendee', 'event-monster' ), 'administrator', 'em-visitors-page', array( $this, 'awl_em_visitors_page' ) );
			$setting    = add_submenu_page( 'edit.php?post_type=' . EM_PLUGIN_SLUG, __( 'Setting', 'event-monster' ), __( 'Setting', 'event-monster' ), 'administrator', 'em-setting-page', array( $this, 'awl_em_setting_page' ) );
			$doc_menu   = add_submenu_page( 'edit.php?post_type=' . EM_PLUGIN_SLUG, __( 'Docs', 'event-monster' ), __( 'Docs', 'event-monster' ), 'administrator', 'sr-doc-page', array( $this, 'awl_em_doc_page' ) );
			$theme_menu = add_submenu_page( 'edit.php?post_type=' . EM_PLUGIN_SLUG, __( 'Our Theme', 'event-monster' ), __( 'Our Theme', 'event-monster' ), 'administrator', 'sr-theme-page', array( $this, 'awl_em_theme_page' ) );
		}

		public function Event_Monster() {
			$labels = array(
				'name'               => _x( 'Event Monster', 'Post Type General Name', 'event-monster' ),
				'singular_name'      => _x( 'Event Monster', 'Post Type Singular Name', 'event-monster' ),
				'menu_name'          => __( 'Event Monster', 'event-monster' ),
				'name_admin_bar'     => __( 'Event Monster', 'event-monster' ),
				'parent_item_colon'  => __( 'Parent Item:', 'event-monster' ),
				'all_items'          => __( 'All Event', 'event-monster' ),
				'add_new_item'       => __( 'Add New Event', 'event-monster' ),
				'add_new'            => __( 'Add New Event', 'event-monster' ),
				'new_item'           => __( 'New Event', 'event-monster' ),
				'edit_item'          => __( 'Edit Event', 'event-monster' ),
				'update_item'        => __( 'Update Event', 'event-monster' ),
				'search_items'       => __( 'Search Event', 'event-monster' ),
				'not_found'          => __( 'Event Not found', 'event-monster' ),
				'not_found_in_trash' => __( 'Event Not found in Trash', 'event-monster' ),
			);
			$args   = array(
				'label'               => __( 'Event Monster', 'event-monster' ),
				'description'         => __( 'Custom Post Type For Event Monster', 'event-monster' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor' ),
				'taxonomies'          => array(),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 65,
				'menu_icon'           => EM_PLUGIN_URL . '/images/awp-life-event-monstor.png',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
			);
			register_post_type( 'awl_event_monster', $args );
		} // end of post type function

		public function admin_add_meta_box() {
			add_meta_box( __( 'Event Monster Setting Panel', 'event-monster' ), __( 'Event Monster Setting Panel', 'event-monster' ), array( &$this, 'em_image_upload' ), 'awl_event_monster', 'normal', 'default' );
			add_meta_box( __( 'Upgrade Event Monster Pro', 'event-monster' ), __( 'Upgrade Event Monster Pro', 'event-monster' ), array( &$this, 'em_upgrade_pro' ), 'awl_event_monster', 'side', 'default' );
			add_meta_box( __( 'Rate Our Plugin', 'event-monster' ), __( 'Rate Our Plugin', 'event-monster' ), array( &$this, 'em_rate_plugin' ), 'awl_event_monster', 'side', 'default' );
		}

		// meta upgrade pro
		public function em_upgrade_pro() { ?>
			<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'img/photo1.jpg' ); ?>"width="250" height="280">
			<a href="https://awplife.com/demo/event-monster-premium/" target="_new" class="button button-primary button-large" style="background: #496481; text-shadow: none; margin-top:10px"><span class="dashicons dashicons-search" style="line-height:1.4;" ></span> Live Demo</a>
			<a href="https://awplife.com/wordpress-plugins/event-monster-premium/" target="_new" class="button button-primary button-large" style="background: #496481; text-shadow: none; margin-top:10px"><span class="dashicons dashicons-unlock" style="line-height:1.4;" ></span> Upgrade Pro</a>
			<?php
		}
		// meta rate us
		public function em_rate_plugin() {
			?>
		<div style="text-align:center">
			<p>If you like our plugin then please <b>Rate us</b> on WordPress</p>
		</div>
		<div style="text-align:center">
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
		</div>
		<br>
		<div style="text-align:center">
			<a href="https://wordpress.org/support/plugin/event-monster/reviews/?filter=5" target="_new" class="button button-primary button-large" style="background: #496481; text-shadow: none;"><span class="dashicons dashicons-heart" style="line-height:1.4;" ></span> Please Rate Us</a>
		</div>	
		<?php }

		public function em_image_upload( $post ) {
			require_once 'event-setting.php';
		}//end em_image_upload()

		public function _ajax_em_slide_responsive() {
			echo esc_attr( $this->_em_ajax_callback_function( $_POST['EMslideId'] ) );
			die;
		}

		public function _ajax_em_spr_slide() {
			echo  esc_attr( $this->_em_spr_ajax_callback_function( $_POST['EMSPRslideId'] ) );
			die;
		}

		// event moster save settings
		public function _awl_em_save_settings( $post_id ) {
			if ( isset( $_POST['em_save_nonce'] ) ) {
				if ( isset( $_POST['em_save_nonce'] ) || wp_verify_nonce( $_POST['em_save_nonce'], 'em_save_settings' ) ) {

					$em_organizer_name    = array();
					$em_organizer_phone   = array();
					$em_organizer_email   = array();
					$em_organizer_website = array();

					$event_name_val = isset( $_POST['em_organizer_name'] ) ? (array) $_POST['em_organizer_name'] : array();
					$event_name_val = array_map( 'sanitize_text_field', $event_name_val );

					$i = 0;
					foreach ( $event_name_val as $event_name_v ) {

						$em_organizer_name[]    = sanitize_text_field( $_POST['em_organizer_name'][ $i ] );
						$em_organizer_phone[]   = sanitize_text_field( $_POST['em_organizer_phone'][ $i ] );
						$em_organizer_email[]   = sanitize_text_field( $_POST['em_organizer_email'][ $i ] );
						$em_organizer_website[] = sanitize_text_field( $_POST['em_organizer_website'][ $i ] );
						$i++;
					}

					$em_upload_image        = sanitize_text_field( $_POST['em_upload_image'] );
					$logo_size              = sanitize_text_field( $_POST['logo_size'] );
					$em_logo_size           = sanitize_text_field( $_POST['em_logo_size'] );
					$em_logo_coustom_height = sanitize_text_field( $_POST['em_logo_coustom_height'] );
					$em_logo_coustom_width  = sanitize_text_field( $_POST['em_logo_coustom_width'] );
					$em_logo_border         = sanitize_text_field( $_POST['em_logo_border'] );
					$em_logo_border_color   = sanitize_text_field( $_POST['em_logo_border_color'] );
					$em_title_size          = sanitize_text_field( $_POST['em_title_size'] );
					$em_title_color         = sanitize_text_field( $_POST['em_title_color'] );
					$em_title_align         = sanitize_text_field( $_POST['em_title_align'] );
					$em_date_time_heading   = sanitize_text_field( $_POST['em_date_time_heading'] );
					$em_start_date          = sanitize_text_field( $_POST['em_start_date'] );
					$em_end_date            = sanitize_text_field( $_POST['em_end_date'] );
					$em_start_time          = sanitize_text_field( $_POST['em_start_time'] );
					$em_end_time            = sanitize_text_field( $_POST['em_end_time'] );
					$em_organizer_heading   = sanitize_text_field( $_POST['em_organizer_heading'] );
					$em_organizer           = sanitize_text_field( $_POST['em_organizer'] );
					$em_countdown           = sanitize_text_field( $_POST['em_countdown'] );
					$em_location_heading    = sanitize_text_field( $_POST['em_location_heading'] );
					$em_address             = sanitize_text_field( $_POST['em_address'] );
					$em_venue_phone         = sanitize_text_field( $_POST['em_venue_phone'] );
					$em_venue_email         = sanitize_text_field( $_POST['em_venue_email'] );
					$em_map                 = sanitize_text_field( $_POST['em_map'] );
					$em_map_code            = $_POST['em_map_code'];
					$em_map_height          = sanitize_text_field( $_POST['em_map_height'] );
					$em_map_opacity         = sanitize_text_field( $_POST['em_map_opacity'] );
					$em_accept_registration = sanitize_text_field( $_POST['em_accept_registration'] );
					$em_registration_type   = sanitize_text_field( $_POST['em_registration_type'] );
					$em_tkt_quantity  		= sanitize_text_field( $_POST['em_tkt_quantity'] );
					$em_reg_btn_txt         = sanitize_text_field( $_POST['em_reg_btn_txt'] );
					$em_buttons_type        = sanitize_text_field( $_POST['em_buttons_type'] );
					$em_reg_btn_color       = sanitize_text_field( $_POST['em_reg_btn_color'] );
					$em_reg_btn_align       = sanitize_text_field( $_POST['em_reg_btn_align'] );
					$em_reg_btn_link        = sanitize_text_field( $_POST['em_reg_btn_link'] );
					$em_reg_btn_link_tab    = sanitize_text_field( $_POST['em_reg_btn_link_tab'] );
					$em_social              = sanitize_text_field( $_POST['em_social'] );
					$em_share_btn           = wp_kses_normalize_entities( $_POST['em_share_btn'] );
					$em_custom_css          = sanitize_text_field( $_POST['em_custom_css'] );

					$event_monster_settings = array(
						'em_upload_image'        => $em_upload_image,
						'logo_size'              => $logo_size,
						'em_logo_size'           => $em_logo_size,
						'em_logo_coustom_height' => $em_logo_coustom_height,
						'em_logo_coustom_width'  => $em_logo_coustom_width,
						'em_logo_border'         => $em_logo_border,
						'em_logo_border_color'   => $em_logo_border_color,
						'em_title_size'          => $em_title_size,
						'em_title_color'         => $em_title_color,
						'em_title_align'         => $em_title_align,
						'em_date_time_heading'   => $em_date_time_heading,
						'em_start_date'          => $em_start_date,
						'em_end_date'            => $em_end_date,
						'em_start_time'          => $em_start_time,
						'em_end_time'            => $em_end_time,
						'em_organizer_heading'   => $em_organizer_heading,
						'em_organizer'           => $em_organizer,
						'em_organizer_name'      => $em_organizer_name,
						'em_organizer_phone'     => $em_organizer_phone,
						'em_organizer_email'     => $em_organizer_email,
						'em_organizer_website'   => $em_organizer_website,
						'em_countdown'           => $em_countdown,
						'em_location_heading'    => $em_location_heading,
						'em_address'             => $em_address,
						'em_venue_phone'         => $em_venue_phone,
						'em_venue_email'         => $em_venue_email,
						'em_map'                 => $em_map,
						'em_map_code'            => $em_map_code,
						'em_map_height'          => $em_map_height,
						'em_map_opacity'         => $em_map_opacity,
						'em_accept_registration' => $em_accept_registration,
						'em_registration_type'   => $em_registration_type,
						'em_tkt_quantity'        => $em_tkt_quantity,
						'em_reg_btn_txt'         => $em_reg_btn_txt,
						'em_buttons_type'        => $em_buttons_type,
						'em_reg_btn_color'       => $em_reg_btn_color,
						'em_reg_btn_align'       => $em_reg_btn_align,
						'em_reg_btn_link'        => $em_reg_btn_link,
						'em_reg_btn_link_tab'    => $em_reg_btn_link_tab,
						'em_social'              => $em_social,
						'em_share_btn'           => $em_share_btn,
						'em_custom_css'          => $em_custom_css,

					);
					// update image title & description
					$awl_event_monster_shortcode_setting = 'awl_em_settings_' . $post_id;
					update_post_meta( $post_id, $awl_event_monster_shortcode_setting, base64_encode( serialize( $event_monster_settings ) ) );
				}
			}
		}//end _awl_em_save_settings()

		// visitors page
		public function awl_em_visitors_page() {
			require_once 'visitors.php';
		}

		// settings page
		public function awl_em_setting_page() {
			require_once 'setting.php';
		}

		// doc page
		public function awl_em_doc_page() {
			require_once 'docs.php';
		}

		// theme page
		public function awl_em_theme_page() {
			require_once 'our-theme/awp-theme.php';
		}
	}

	// register sf scripts
	function awplife_em_register_scripts() {

		// css & JS
		wp_register_script( 'em-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), '', true );
		wp_register_script( 'em-jquery-classycountdown-js', plugin_dir_url( __FILE__ ) . 'count/jquery.classycountdown.js', array( 'jquery' ), '', true );
		wp_register_script( 'em-jquery-throttle-js', plugin_dir_url( __FILE__ ) . 'count/jquery.throttle.js', array( 'jquery' ), '', true );
		wp_register_script( 'em-jquery-knob-js', plugin_dir_url( __FILE__ ) . 'count/jquery.knob.js', array( 'jquery' ), '', true );

		wp_register_style( 'em-bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/event-bootstrap.css' );
		wp_register_style( 'em-font-awesome-css', plugin_dir_url( __FILE__ ) . 'css/font-awesome.css' );
		wp_register_style( 'em-style-event-monster-css', plugin_dir_url( __FILE__ ) . 'css/style-event-monster.css' );
		wp_register_style( 'em-reg-form-elements-css', plugin_dir_url( __FILE__ ) . 'css/reg-form-elements.css' );
		wp_register_style( 'em-jquery-classycountdown-css', plugin_dir_url( __FILE__ ) . 'count/jquery.classycountdown.css' );
		wp_register_style( 'em-list-styles-css', plugin_dir_url( __FILE__ ) . 'css/em-list-styles.css' );
		wp_register_style( 'em-list-pe-icon-7-stroke-css', plugin_dir_url( __FILE__ ) . 'css/pe-icon-7-stroke.css' );

		// css & JS
	}
		add_action( 'wp_enqueue_scripts', 'awplife_em_register_scripts' );
		
	$awl_event_monster_object = new Awl_Event_Monster();
	require_once 'shortcode.php';

}
?>
