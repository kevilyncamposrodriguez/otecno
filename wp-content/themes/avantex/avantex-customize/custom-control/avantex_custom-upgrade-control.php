<?php
/**
 * Customize Heading control class.
 *
 * @package avantex
 *
 * @see     WP_Customize_Control
 * @access  public
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Avantex Upgrade Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class Avantex_Custom_Upgrade_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'avantex_upgrade';
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$avantex_upgrade_link = 'https://wpfrank.com/wordpress-themes/avantex/';
			?>
			<div class="avantex-upgrade-pro-message simple-notice-custom-control" style="display:none">
				<h4 class="customize-control-title"><?php echo wp_kses_post( 'Upgrade to <a href="' . $avantex_upgrade_link . '" target="_blank" > AVANTEX Pro </a> to change/add more', 'avantex' ); ?><?php esc_html_e( ' and additionally get the other premium features.', 'avantex' ); ?></h4>
			</div>
			<?php
		}
	}
}
