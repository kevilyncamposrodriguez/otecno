<?php
/**
 * Modify Customizer Repeater Labels.
 *
 * @package avantex
 */

/**
 * Filter to modify input label in repeater control
 * You can filter by control id and input name.
 *
 * @param string $string Input label.
 * @param string $id Input id.
 * @param string $control Control name.
 * @modified 1.1.41
 *
 * @return string
 */
function avantex_repeater_labels( $string, $id, $control ) {
	// for Slider Repeater.
	if ( $id === 'avantex-slider-repeater-control' ) {
		if ( $control === 'customizer_repeater_title_control' ) {
			return esc_html__( 'Slide Title tag', 'avantex' );
		}
		if ( $control === 'customizer_repeater_subtitle_control' ) {
			return esc_html__( 'Slide title', 'avantex' );
		}
		if ( $control === 'customizer_repeater_text_control' ) {
			return esc_html__( 'Slide description', 'avantex' );
		}
		if ( $control === 'customizer_repeater_btntitle_control' ) {
			return esc_html__( 'Button Text', 'avantex' );
		}
		if ( $control === 'customizer_repeater_link_control' ) {
			return esc_html__( 'Button link', 'avantex' );
		}
	}
	// For Services Repeater
	if ( $id === 'avantex-services-repeater-control' ) {
		if ( $control === 'customizer_repeater_icon_control' ) {
			return esc_html__( 'Service Icon', 'avantex' );
		}
		if ( $control === 'customizer_repeater_title_control' ) {
			return esc_html__( 'Service title', 'avantex' );
		}
		if ( $control === 'customizer_repeater_subtitle_control' ) {
			return esc_html__( 'Service description', 'avantex' );
		}
		if ( $control === 'customizer_repeater_btntitle_control' ) {
			return esc_html__( 'Service Link Text', 'avantex' );
		}
		if ( $control === 'customizer_repeater_link_control' ) {
			return esc_html__( 'Service link', 'avantex' );
		}
	}
	// For Portfolio Repeater.
	if ( $id === 'avantex-portfolio-repeater-control' ) {
		if ( $control === 'customizer_repeater_image_control' ) {
			return esc_html__( 'Project Image', 'avantex' );
		} // This will not change because its using direct Html to display.
		if ( $control === 'customizer_repeater_title_control' ) {
			return esc_html__( 'Project tag', 'avantex' );
		}
		if ( $control === 'customizer_repeater_subtitle_control' ) {
			return esc_html__( 'Project title', 'avantex' );
		}
		if ( $control === 'customizer_repeater_link_control' ) {
			return esc_html__( 'Hyperlink', 'avantex' );
		}
	}
	// For Teams Customizer Repeater.
	if ( $id === 'avantex-team-repeater-control' ) {
		if ( $control === 'customizer_repeater_title_control' ) {
			return esc_html__( 'Members Position', 'avantex' );
		}
		if ( $control === 'customizer_repeater_subtitle_control' ) {
			return esc_html__( 'Members Name', 'avantex' );
		}
	}
	// For Testimonial Customizer Repeater.
	if ( $id === 'avantex-testimonial-repeater-control' ) {
		if ( $control === 'customizer_repeater_title_control' ) {
			return esc_html__( 'Review Title', 'avantex' );
		}
		if ( $control === 'customizer_repeater_subtitle_control' ) {
			return esc_html__( 'Review Text', 'avantex' );
		}
		if ( $control === 'customizer_repeater_btntitle_control' ) {
			return esc_html__( 'Client Name', 'avantex' );
		}
		if ( $control === 'customizer_repeater_shortcode_control' ) {
			return esc_html__( 'Client Designation', 'avantex' );
		}
	}
	// For Funfact Customizer Repeater.
	if ( $id === 'avantex-funfact-repeater-control' ) {
		if ( $control === 'customizer_repeater_subtitle_control' ) {
			return esc_html__( 'Numbers', 'avantex' );
		}
	}
	return $string;
}
	add_filter( 'repeater_input_labels_filter', 'avantex_repeater_labels', 10, 3 );
