<?php
/**
 * Custom sponsors Section.
 *
 * @package avantex
 */

/** Section for Sponsors/Clients". */
	$wp_customize->add_section(
		'avantex-sponsors-section',
		array(
			'title'       => __( 'Sponsors/Clients settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-sponsors-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display sponsors and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display sponsors */
	$wp_customize->add_setting(
		'avantex-sponsors-show',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-sponsors-show-control',
			array(
				'label'    => esc_html__( 'Show Sponsors/Clients on Frontpage', 'avantex' ),
				'section'  => 'avantex-sponsors-section',
				'settings' => 'avantex-sponsors-show',
			)
		)
	);
	/** Selective refresh callout */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex-sponsors-show',
			array(
				'selector' => '.sr-sponsor',
			)
		);
	}
	/** Check sponsors Show Enabled Active callback. */
	function avantex_if_sponsors_show_control_enabled( $control ) {
		if ( 1 === $control->manager->get_setting( 'avantex-sponsors-show' )->value() ) {
			return true;
		} else {
			return false;
		}
	}
	// heading control.
	$wp_customize->add_setting(
		'avantex-sponsors-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-sponsors-notice-control',
			array(
				'label'           => __( 'Sponsors/Clients Section settings ', 'avantex' ),
				'settings'        => 'avantex-sponsors-notice',
				'section'         => 'avantex-sponsors-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Sponsors section SubTitle  */
	$wp_customize->add_setting(
		'avantex-sponsors-title-tag',
		array(
			'default'           => esc_html__( 'We are associated to', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-sponsors-title-tag-control',
			array(
				'label'           => __( 'Sponsors/Clients Title Tag', 'avantex' ),
				'section'         => 'avantex-sponsors-section',
				'settings'        => 'avantex-sponsors-title-tag',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Sponsors section Title  */
	$wp_customize->add_setting(
		'avantex-sponsors-title',
		array(
			'default'           => esc_html__( 'Our Clients', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-sponsors-title-control',
			array(
				'label'           => __( 'Sponsors/clients Title', 'avantex' ),
				'section'         => 'avantex-sponsors-section',
				'settings'        => 'avantex-sponsors-title',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
			)
		)
	);
	$wp_customize->add_setting(
		'avantex-sponsors-repeater',
		array(
			'sanitize_callback' => 'customizer_repeater_sanitize',
			'default'           => SPONSORS_DEFAULT,
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Repeater(
			$wp_customize,
			'avantex-sponsors-repeater-control',
			array(
				'label'                                 => esc_html__( 'Manage Clients/Sponsors', 'avantex' ),
				'settings'                              => 'avantex-sponsors-repeater',
				'section'                               => 'avantex-sponsors-section',
				'add_field_label'                       => esc_html__( 'Add Client/Sponsor', 'avantex' ),
				'item_name'                             => esc_html__( 'Client', 'avantex' ),
				'priority'                              => 10,
				'customizer_repeater_image_control'     => true,
				'customizer_repeater_icon_control'      => false,
				'customizer_repeater_title_control'     => true,
				'customizer_repeater_btntitle_control'  => false,
				'customizer_repeater_subtitle_control'  => false,
				'customizer_repeater_text_control'      => false,
				'customizer_repeater_text2_control'     => false,
				'customizer_repeater_link_control'      => true,
				'customizer_repeater_link2_control'     => false,
				'customizer_repeater_shortcode_control' => false,
				'customizer_repeater_repeater_control'  => false,
				'customizer_repeater_color_control'     => false,
				'customizer_repeater_color2_control'    => false,
				'active_callback'                       => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-sponsors-upgrade-control',
			array(
				'settings' => 'avantex-sponsors-repeater',
				'section'  => 'avantex-sponsors-section',
			)
		)
	);
	// Sponsor Slider Controls heading control.
	$wp_customize->add_setting(
		'avantex-sponsors-controls-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-sponsors-controls-notice-control',
			array(
				'label'           => __( 'Sponsor Slider Controls ', 'avantex' ),
				'settings'        => 'avantex-sponsors-controls-notice',
				'section'         => 'avantex-sponsors-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Sponsor Slider Autoplay Control.
	$wp_customize->add_setting(
		'avantex-sponsors-autoplay',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-sponsors-autoplay-control',
			array(
				'label'           => __( 'Toggle Slider Autoplay', 'avantex' ),
				'description'     => esc_html__( 'Toggle slider autoplay on/off.', 'avantex' ),
				'settings'        => 'avantex-sponsors-autoplay',
				'section'         => 'avantex-sponsors-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Sponsors Colors Controls heading control.
	$wp_customize->add_setting(
		'avantex-sponsors-colors-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-sponsors-colors-notice-control',
			array(
				'label'           => __( 'Sponsors/Clients Colors ', 'avantex' ),
				'settings'        => 'avantex-sponsors-colors-notice',
				'section'         => 'avantex-sponsors-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
			)
		)
	);

	// Sponsors Title text Color.
	$wp_customize->add_setting(
		'avantex-sponsors-title-color',
		array(
			// 'default'           => '#fffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-sponsors-title-color-control',
			array(
				'label'           => __( 'Sponsors/Clients Title Color', 'avantex' ),
				'settings'        => 'avantex-sponsors-title-color',
				'section'         => 'avantex-sponsors-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
				'input_attrs'     => array(
					'resetalpha' => false,
					'palette'    => array(
						'rgba(99,78,150,1)',
						'rgba(67,78,150,1)',
						'rgba(34,78,150,.7)',
						'rgba(3,78,150,1)',
						'rgba(7,110,230,.9)',
						'rgba(234,78,150,1)',
						'rgba(99,78,150,.5)',
						'rgba(190,120,120,.5)',
					),
				),
			)
		)
	);
	// Sponsors description text Color.
	$wp_customize->add_setting(
		'avantex-sponsors-description-color',
		array(
			// 'default'           => '#fffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-sponsors-description-color-control',
			array(
				'label'           => __( 'Sponsors/Clients tag Color', 'avantex' ),
				'settings'        => 'avantex-sponsors-description-color',
				'section'         => 'avantex-sponsors-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_sponsors_show_control_enabled( $control ) );
				},
				'input_attrs'     => array(
					'resetalpha' => false,
					'palette'    => array(
						'rgba(99,78,150,1)',
						'rgba(67,78,150,1)',
						'rgba(34,78,150,.7)',
						'rgba(3,78,150,1)',
						'rgba(7,110,230,.9)',
						'rgba(234,78,150,1)',
						'rgba(99,78,150,.5)',
						'rgba(190,120,120,.5)',
					),
				),
			)
		)
	);
