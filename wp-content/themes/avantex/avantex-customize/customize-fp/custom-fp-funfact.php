<?php
/**
 * Custom funfact Section.
 *
 * @package avantex
 */


/** Section for "funfact". */
	$wp_customize->add_section(
		'avantex-funfact-section',
		array(
			'title'       => __( 'Funfact settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-funfact-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display funfacts and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display funfact */
	$wp_customize->add_setting(
		'avantex-funfact-show',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-funfact-show-control',
			array(
				'label'    => esc_html__( 'Show Funfact on Frontpage', 'avantex' ),
				'section'  => 'avantex-funfact-section',
				'settings' => 'avantex-funfact-show',
			)
		)
	);
	/** Selective refresh funfact */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex-funfact-show',
			array(
				'selector' => '.sr-funfact',
			)
		);
	}
	/** Check funfact Show Enabled Active callback. */
	function avantex_if_funfact_show_control_enabled( $control ) {
		if ( 1 === $control->manager->get_setting( 'avantex-funfact-show' )->value() ) {
			return true;
		} else {
			return false;
		}
	}
	// heading control.
	$wp_customize->add_setting(
		'avantex-funfact-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-funfact-notice-control',
			array(
				'label'           => __( 'Funfact settings ', 'avantex' ),
				'settings'        => 'avantex-funfact-notice',
				'section'         => 'avantex-funfact-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_funfact_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Funfact Repeater Defaults. */
	$wp_customize->add_setting(
		'avantex-funfact-repeater',
		array(
			'sanitize_callback' => 'customizer_repeater_sanitize',
			'default'           => FUNFACT_DEFAULTS,
		)
	);
	/** Repeater Control */
	$wp_customize->add_control(
		new Avantex_Customizer_Repeater(
			$wp_customize,
			'avantex-funfact-repeater-control',
			array(
				'label'                                 => esc_html__( 'Manage Funfacts', 'avantex' ),
				'settings'                              => 'avantex-funfact-repeater',
				'section'                               => 'avantex-funfact-section',
				'add_field_label'                       => esc_html__( 'Add Funfact', 'avantex' ),
				'item_name'                             => esc_html__( 'Funfact', 'avantex' ),
				'priority'                              => 10,
				'customizer_repeater_image_control'     => false,
				'customizer_repeater_icon_control'      => true,
				'customizer_repeater_title_control'     => true,
				'customizer_repeater_subtitle_control'  => true,
				'customizer_repeater_btntitle_control'  => false,
				'customizer_repeater_text_control'      => false,
				'customizer_repeater_text2_control'     => false,
				'customizer_repeater_link_control'      => false,
				'customizer_repeater_link2_control'     => false,
				'customizer_repeater_shortcode_control' => false,
				'customizer_repeater_repeater_control'  => false,
				'customizer_repeater_color_control'     => false,
				'customizer_repeater_color2_control'    => false,
				'active_callback'                       => function( $control ) {
					return ( avantex_if_funfact_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-funfact-upgrade-control',
			array(
				'settings' => 'avantex-funfact-repeater',
				'section'  => 'avantex-funfact-section',
			)
		)
	);
	// Funfact Colors Controls heading control.
	$wp_customize->add_setting(
		'avantex-funfact-colors-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-funfact-colors-notice-control',
			array(
				'label'           => __( 'Funfact Colors ', 'avantex' ),
				'settings'        => 'avantex-funfact-colors-notice',
				'section'         => 'avantex-funfact-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_funfact_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-funfact-grid-upgrade-control',
			array(
				'settings' => 'avantex-funfact-colors-notice',
				'section'  => 'avantex-funfact-section',
			)
		)
	);
	// Funfact Title text Color.
	$wp_customize->add_setting(
		'avantex-funfact-title-color',
		array(
			// 'default'           => '#fffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-funfact-title-color-control',
			array(
				'label'           => __( 'Funfact Title Color', 'avantex' ),
				'settings'        => 'avantex-funfact-title-color',
				'section'         => 'avantex-funfact-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_funfact_show_control_enabled( $control ) );
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
	// Funfact description text Color.
	$wp_customize->add_setting(
		'avantex-funfact-numbers-color',
		array(
			// 'default'           => '#fffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-funfact-numbers-color-control',
			array(
				'label'           => __( 'Funfact Numbers Color', 'avantex' ),
				'settings'        => 'avantex-funfact-numbers-color',
				'section'         => 'avantex-funfact-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_funfact_show_control_enabled( $control ) );
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
	// Grid Column Layout.
	$wp_customize->add_setting(
		'avantex-funfact-grid',
		array(
			'default'           => 'col-lg-3',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Image_Radio_Button_Custom_Control(
			$wp_customize,
			'avantex-funfact-grid-control',
			array(
				'label'           => __( 'Funfact Grid Column Layout', 'avantex' ),
				'description'     => esc_html__( 'Select grid layout and number of Funfact inline display in section.', 'avantex' ),
				'section'         => 'avantex-funfact-section',
				'settings'        => 'avantex-funfact-grid',
				'choices'         => array(
					'col-lg-6' => array(  // Required.
						'image' => trailingslashit( get_template_directory_uri() ) . 'customizer-custom-controls-master/images/column-2.png', // Required.
						'name'  => __( '2-column', 'avantex' ), // Required.
					),
					'col-lg-4' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'customizer-custom-controls-master/images/column-3.png',
						'name'  => __( '3-column', 'avantex' ),
					),
					'col-lg-3' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'customizer-custom-controls-master/images/column-4.png',
						'name'  => __( '4-column', 'avantex' ),
					),
				),
				'active_callback' => function( $control ) {
					return ( avantex_if_funfact_show_control_enabled( $control ) );
				},
			)
		)
	);
