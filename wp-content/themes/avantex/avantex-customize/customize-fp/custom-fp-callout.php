<?php
/**
 * Custom callout Section.
 *
 * @package avantex
 */

/** Section for "callout". */
	$wp_customize->add_section(
		'avantex-callout-section',
		array(
			'title'       => __( 'Callout settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-callout-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display callout and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display callout */
	$wp_customize->add_setting(
		'avantex-callout-show',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-callout-show-control',
			array(
				'label'    => esc_html__( 'Show callout on Frontpage', 'avantex' ),
				'section'  => 'avantex-callout-section',
				'settings' => 'avantex-callout-show',
			)
		)
	);
	/** Selective refresh callout */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex-callout-show',
			array(
				'selector' => '.sr-callout',
			)
		);
	}
	/** Check callout Show Enabled Active callback. */
	function avantex_if_callout_show_control_enabled( $control ) {
		if ( 1 === $control->manager->get_setting( 'avantex-callout-show' )->value() ) {
			return true;
		} else {
			return false;
		}
	}
	// heading control.
	$wp_customize->add_setting(
		'avantex-callout-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-callout-notice-control',
			array(
				'label'           => __( 'Callout settings ', 'avantex' ),
				'settings'        => 'avantex-callout-notice',
				'section'         => 'avantex-callout-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Callout Image Control.
	$wp_customize->add_setting(
		'avantex-callout-image',
		array(
			'default'           => AVANTEX_COMPANION_PLUGIN_URL . 'inc/avantex/img/callout/callout-bg.jpg',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'avantex-callout-image_control',
			array(
				'label'           => __( 'Callout Background Image', 'avantex' ),
				'description'     => esc_html__( 'Choose Image for Callout Background. Best fit : 1920px X 1080px', 'avantex' ),
				'section'         => 'avantex-callout-section',
				'settings'        => 'avantex-callout-image',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
				},
				'button_labels'   => array( // Optional.
					'select'       => __( 'Select Image', 'avantex' ),
					'change'       => __( 'Change Image', 'avantex' ),
					'remove'       => __( 'Remove', 'avantex' ),
					'default'      => __( 'Default', 'avantex' ),
					'placeholder'  => __( 'No image selected', 'avantex' ),
					'frame_title'  => __( 'Select Image', 'avantex' ),
					'frame_button' => __( 'Choose Image', 'avantex' ),
				),
			)
		)
	);
	/** Callout section Title  */
	$wp_customize->add_setting(
		'avantex-callout-title',
		array(
			'default'           => esc_html__( 'Let us Create Something Magical Together', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-callout-title-control',
			array(
				'label'           => __( 'Callout Title', 'avantex' ),
				'section'         => 'avantex-callout-section',
				'settings'        => 'avantex-callout-title',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Callout section Subtitle. */
	$wp_customize->add_setting(
		'avantex-callout-subtitle',
		array(
			'default'           => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit!', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-callout-subtitle-control',
			array(
				'label'           => __( 'Callout Subtitle', 'avantex' ),
				'section'         => 'avantex-callout-section',
				'settings'        => 'avantex-callout-subtitle',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Callout Button Text Control.  */
	$wp_customize->add_setting(
		'avantex-callout-btn-text',
		array(
			'default'           => esc_html__( 'Purchase Now', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-callout-btn-text-control',
			array(
				'label'           => __( 'Callout Button Text', 'avantex' ),
				'section'         => 'avantex-callout-section',
				'settings'        => 'avantex-callout-btn-text',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Callout Button URL.
	$wp_customize->add_setting(
		'avantex-callout-btnlink',
		array(
			'default'           => '',
			'sanitize_callback' => array( $this, 'sanitize_custom_url' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-callout-btnlink-control',
			array(
				'label'           => 'Callout Button link',
				'section'         => 'avantex-callout-section',
				'settings'        => 'avantex-callout-btnlink',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
				},
				'input_attrs'     => array(
					'placeholder' => 'https://',
				),
			)
		)
	);
	// Callout overlay Control.
	$wp_customize->add_setting(
		'avantex-callout-overlay',
		array(
			'default'           => 'enable',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Text_Radio_Button_Custom_Control(
			$wp_customize,
			'avantex-callout-overlay-control',
			array(
				'label'           => __( 'Callout Overlay', 'avantex' ),
				'description'     => esc_html__( 'Toggle Overlay on Callout Image.', 'avantex' ),
				'settings'        => 'avantex-callout-overlay',
				'section'         => 'avantex-callout-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
				},
				'choices'         => array(
					'enable'  => __( 'Enable', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					'disable' => __( 'Disable', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
				),
			)
		)
	);
	// Colors heading control.
	$wp_customize->add_setting(
		'avantex-callout-color-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-callout-color-notice-control',
			array(
				'label'           => __( 'Callout Color Settings ', 'avantex' ),
				'settings'        => 'avantex-callout-color-notice',
				'section'         => 'avantex-callout-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-callout-colors-upgrade-control',
			array(
				'settings' => 'avantex-callout-color-notice',
				'section'  => 'avantex-callout-section',
			)
		)
	);
	// Callout Overlay Color.
	$wp_customize->add_setting(
		'avantex-callout-overlay-color',
		array(
			'default'           => 'rgba(15,13,29,0.65)',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-callout-overlay-color-control',
			array(
				'label'           => __( 'Callout Overlay Color', 'avantex' ),
				// 'description' => esc_html__( 'Sample color control with Alpha channel', 'avantex' ),
				'settings'        => 'avantex-callout-overlay-color',
				'section'         => 'avantex-callout-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
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
	// Callout Title text Color.
	$wp_customize->add_setting(
		'avantex-callout-title-color',
		array(
			// 'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-callout-title-color-control',
			array(
				'label'           => __( 'Callout Title text Color', 'avantex' ),
				'settings'        => 'avantex-callout-title-color',
				'section'         => 'avantex-callout-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
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
	// Callout description text Color.
	$wp_customize->add_setting(
		'avantex-callout-description-color',
		array(
			// 'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-callout-description-color-control',
			array(
				'label'           => __( 'Callout Subtitle text Color', 'avantex' ),
				'settings'        => 'avantex-callout-description-color',
				'section'         => 'avantex-callout-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
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
	// Callout Button text Color.
	$wp_customize->add_setting(
		'avantex-callout-btntxt-color',
		array(
			// 'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-callout-btntxt-color-control',
			array(
				'label'           => __( 'Button text Color', 'avantex' ),
				'settings'        => 'avantex-callout-btntxt-color',
				'section'         => 'avantex-callout-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_callout_show_control_enabled( $control ) );
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
