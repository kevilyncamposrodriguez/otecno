<?php
/**
 * Custom general section
 *
 * @package avantex
 */

/** Section for "General Settings". */
	$wp_customize->add_section(
		'avantex-general-section',
		array(
			'title'       => __( 'General settings', 'avantex' ),
			'priority'    => 0,
			'panel'       => 'avantex-options-panel',
			'description' => __( 'General additional features of Avantex.', 'avantex' ),
		)
	);

	/** Setting to display wocommerce Shop/Cart */
		$wp_customize->add_setting(
			'avantex-woo-cart-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-woo-cart-show-control',
				array(
					'label'       => esc_html__( 'Woocommerce/Cart Icon in Menu', 'avantex' ),
					'description' => esc_html__( 'Requires a screen refresh after publishing Woocommerce icon on/off.', 'avantex' ),
					'section'     => 'avantex-general-section',
					'settings'    => 'avantex-woo-cart-show',
				)
			)
		);

		/** Setting to display Loading Icon/Page Loader */
		$wp_customize->add_setting(
			'avantex-loader-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-loader-show-control',
				array(
					'label'    => esc_html__( 'Loading Icon/Page Loader', 'avantex' ),
					'section'  => 'avantex-general-section',
					'settings' => 'avantex-loader-show',
				)
			)
		);

		/** Setting to display Loading Icon/Page Loader */
		$wp_customize->add_setting(
			'avantex-scrolltop-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-scrolltop-show-control',
				array(
					'label'    => esc_html__( 'Scroll to top Icon', 'avantex' ),
					'section'  => 'avantex-general-section',
					'settings' => 'avantex-scrolltop-show',
				)
			)
		);

