<?php
/**
 * Custom Color and Styling.
 *
 * @package avantex
 */

	/** Section for "Global Colors and styling". */
	$wp_customize->add_section(
		'avantex-styling-section',
		array(
			'title'       => __( 'Avantex Global Colors', 'avantex' ),
			'priority'    => 1,
			'description' => __( 'Global Settings For colors.', 'avantex' ),
		)
	);
	// heading control.
	$wp_customize->add_setting(
		'avantex-styling-note',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-styling-note-control',
			array(
				'label'    => __( 'Note: Every Frontpage section also have Individual color settings which overwrites these global colors if choosen, by default They are set to empty.', 'avantex' ),
				'settings' => 'avantex-styling-note',
				'section'  => 'avantex-styling-section',
			)
		)
	);
	// heading control.
	$wp_customize->add_setting(
		'avantex-styling-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-styling-notice-control',
			array(
				'label'    => __( 'Global Colors and Styling ', 'avantex' ),
				'settings' => 'avantex-styling-notice',
				'section'  => 'avantex-styling-section',
			)
		)
	);
	// Primary Color.
	$wp_customize->add_setting(
		'avantex-styling-primary-color',
		array(
			// 'default'           => '#3c72fc',
			'default'           => '#3c72fc',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-styling-primary-color-control',
			array(
				'label'       => __( 'Avantex Primary Color', 'avantex' ),
				'description' => esc_html__( 'Select Global Theme Color for whole theme', 'avantex' ),
				'settings'    => 'avantex-styling-primary-color',
				'section'     => 'avantex-styling-section',
				'input_attrs' => array(
					'resetalpha' => true,
					'palette'    => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				),
			)
		)
	);
	// Dark Color.
	$wp_customize->add_setting(
		'avantex-styling-dark-color',
		array(
			// 'default'           => '#0f0d1d',
			'default'           => '#0f0d1d',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-styling-dark-color-control',
			array(
				'label'       => __( 'Avantex Dark Color', 'avantex' ),
				'description' => esc_html__( 'Select Global Dark Color for whole theme', 'avantex' ),
				'settings'    => 'avantex-styling-dark-color',
				'section'     => 'avantex-styling-section',
				'input_attrs' => array(
					'resetalpha' => true,
					'palette'    => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				),
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-styling-upgrade-control',
			array(
				'settings' => 'avantex-styling-dark-color',
				'section'  => 'avantex-styling-section',
			)
		)
	);
	// Links Color.
	$wp_customize->add_setting(
		'avantex-styling-links-color',
		array(
			// 'default'           => '#726f84',
			'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-styling-links-color-control',
			array(
				'label'       => __( 'Avantex Links Color', 'avantex' ),
				'description' => esc_html__( 'Select Global Links Color for whole theme', 'avantex' ),
				'settings'    => 'avantex-styling-links-color',
				'section'     => 'avantex-styling-section',
				'input_attrs' => array(
					'resetalpha' => true,
					'palette'    => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				),
			)
		)
	);
	// Text Color.
	$wp_customize->add_setting(
		'avantex-styling-text-color',
		array(
			// 'default'           => '#726f84',
			'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-styling-text-color-control',
			array(
				'label'       => __( 'Avantex Text Color', 'avantex' ),
				'description' => esc_html__( 'Select Global Text Color for whole theme', 'avantex' ),
				'settings'    => 'avantex-styling-text-color',
				'section'     => 'avantex-styling-section',
				'input_attrs' => array(
					'resetalpha' => true,
					'palette'    => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				),
			)
		)
	);
	// Base Color.
	$wp_customize->add_setting(
		'avantex-styling-base-color',
		array(
			'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-styling-base-color-control',
			array(
				'label'       => __( 'Avantex Theme Base Color', 'avantex' ),
				'description' => esc_html__( 'Select Global Base Color for whole theme', 'avantex' ),
				'settings'    => 'avantex-styling-base-color',
				'section'     => 'avantex-styling-section',
				'input_attrs' => array(
					'resetalpha' => true,
					'palette'    => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				),
			)
		)
	);
	// Light Color.
	$wp_customize->add_setting(
		'avantex-styling-light-color',
		array(
			// 'default'           => '#f2f4f8',
			'default'           => '#f2f4f8',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-styling-light-color-control',
			array(
				'label'       => __( 'Avantex Theme Light Color', 'avantex' ),
				'description' => esc_html__( 'Select Global Light Color for whole theme', 'avantex' ),
				'settings'    => 'avantex-styling-light-color',
				'section'     => 'avantex-styling-section',
				'input_attrs' => array(
					'resetalpha' => true,
					'palette'    => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				),
			)
		)
	);
