<?php
/**
 * Custom about Section.
 *
 * @package avantex
 */

/** Section for "about". */
	$wp_customize->add_section(
		'avantex-about-section',
		array(
			'title'       => __( 'About settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-about-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display About Section and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display about */
	$wp_customize->add_setting(
		'avantex-about-show',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-about-show-control',
			array(
				'label'    => esc_html__( 'Show About on Frontpage', 'avantex' ),
				'section'  => 'avantex-about-section',
				'settings' => 'avantex-about-show',
			)
		)
	);

	/** Setting to display about on template */
	$wp_customize->add_setting(
		'avantex-about-show-template',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-about-show-template-control',
			array(
				'label'    => esc_html__( 'Display on About-us Template', 'avantex' ),
				'section'  => 'avantex-about-section',
				'settings' => 'avantex-about-show-template',
			)
		)
	);

	// /** Selective refresh about */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex-about-show',
			array(
				'selector' => '.sr-about',
			)
		);
	}
	/** Check about Show Enabled Active callback. */
	function avantex_if_about_show_control_enabled( $control ) {
		if ( 1 === $control->manager->get_setting( 'avantex-about-show' )->value() || 1 === $control->manager->get_setting( 'avantex-about-show-template' )->value() ) {
			return true;
		} else {
			return false;
		}
	}
	// heading control.
	$wp_customize->add_setting(
		'avantex-about-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-about-notice-control',
			array(
				'label'           => __( 'About settings ', 'avantex' ),
				'settings'        => 'avantex-about-notice',
				'section'         => 'avantex-about-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_about_show_control_enabled( $control ) );
				},
			)
		)
	);
	// About Image Control.
	$wp_customize->add_setting(
		'avantex-about-image',
		array(
			'default'           => ABOUT_IMAGE,
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'avantex-about-image_control',
			array(
				'label'           => __( 'About Image', 'avantex' ),
				'description'     => esc_html__( 'Choose Image for About.', 'avantex' ),
				'section'         => 'avantex-about-section',
				'settings'        => 'avantex-about-image',
				'active_callback' => function( $control ) {
					return ( avantex_if_about_show_control_enabled( $control ) );
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
	/** About section Title  */
	$wp_customize->add_setting(
		'avantex-about-title',
		array(
			'default'           => esc_html__( ABOUT_TITLE, 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-about-title-control',
			array(
				'label'           => __( 'About Title', 'avantex' ),
				'section'         => 'avantex-about-section',
				'settings'        => 'avantex-about-title',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_about_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** About section Subtitle. */
	$wp_customize->add_setting(
		'avantex-about-subtitle',
		array(
			'default'           => esc_html__( 'We are Avantex', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-about-subtitle-control',
			array(
				'label'           => __( ABOUT_TITLE_TAG, 'avantex' ),
				'section'         => 'avantex-about-section',
				'settings'        => 'avantex-about-subtitle',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_about_show_control_enabled( $control ) );
				},
			)
		)
	);

	/** Setting About Information */
	$wp_customize->add_setting(
		'avantex-about-info',
		array(
			'default'           => ABOUT_TEXT,
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_TinyMCE_Custom_control(
			$wp_customize,
			'avantex-about-info-control',
			array(
				'label'           => __( 'About Information', 'avantex' ),
				'description'     => __( 'Edit About Information Both way TEXT ot HTML.', 'avantex' ),
				'section'         => 'avantex-about-section',
				'settings'        => 'avantex-about-info',
				'input_attrs'     => array(
					'toolbar1'     => 'bold italic bullist numlist alignleft aligncenter alignright link alignjustify',
					'toolbar2'     => 'formatselect outdent indent | blockquote charmap',
					'mediaButtons' => true,
				),
				'active_callback' => function( $control ) {
					return ( avantex_if_about_show_control_enabled( $control ) );
				},
			)
		)
	);
