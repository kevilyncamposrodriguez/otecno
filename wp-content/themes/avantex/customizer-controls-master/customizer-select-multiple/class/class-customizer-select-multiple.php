<?php
/**
 * The multiple select customize control extends the WP_Customize_Control class.  This class allows
 * developers to create a `<select>` form field with the `multiple` attribute within the WordPress
 * theme customizer.
 *
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @package customizer-controls
 */

define( 'AVANTEX_MULTISELECT_VERSION', '1.0.0' );

/**
 * Multiple select customize control class.
 *
 * @access public
 */
class Avantex_Customizer_Select_Multiple extends WP_Customize_Control {
	/**
	 * The type of customize control being rendered.
	 *
	 * @var    string
	 */
	public $type = 'select-multiple';

	/**
	 * Custom classes to apply on select.
	 *
	 * @var string
	 */
	public $custom_class = '';

	/**
	 * Hestia_Select_Multiple constructor.
	 *
	 * @param WP_Customize_Manager $manager Customize manager object.
	 * @param string               $id Control id.
	 * @param array                $args Control arguments.
	 */
	public function __construct( WP_Customize_Manager $manager, $id, array $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( array_key_exists( 'custom_class', $args ) ) {
			$this->custom_class = esc_attr( $args['custom_class'] );
		}
	}

	/**
	 * Loads the framework scripts/styles.
	 *
	 * @since  1.1.40
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'customizer-select-multiple', get_template_directory_uri() . '/customizer-select-multiple/js/script-customizer-select-multiple.js', array( 'jquery', 'customize-base' ), AVANTEX_MULTISELECT_VERSION, true );

	}
	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.1.40
	 * @access public
	 * @return array
	 */
	public function json() {
		$json                 = parent::json();
		$json['choices']      = $this->choices;
		$json['link']         = $this->get_link();
		$json['value']        = (array) $this->value();
		$json['id']           = $this->id;
		$json['custom_class'] = $this->custom_class;

		return $json;
	}


	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.1.40
	 * @access public
	 * @return void
	 */
	public function content_template() {
	?>
		<#
		if ( ! data.choices ) {
			return;
		} #>

		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>

			<#
			var custom_class = ''
			if ( data.custom_class ) {
				custom_class = 'class='+data.custom_class
			} #>
			<select multiple="multiple" {{{ data.link }}} {{ custom_class }}>
				<# _.each( data.choices, function( label, choice ) {
					var selected = data.value.includes( choice.toString() ) ? 'selected="selected"' : ''
					#>
					<option value="{{ choice }}" {{ selected }} >{{ label }}</option>
				<# } ) #>
			</select>
		</label>
		<?php
	}
}
