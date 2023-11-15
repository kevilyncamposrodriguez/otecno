<?php
/**
 * Custom Title and Background.
 *
 * @package avantex
 */

	/** Section for "Page Title". */
	$wp_customize->add_section(
		'avantex-title-section',
		array(
			'title'       => __( 'Page/Blog Title settings', 'avantex' ),
			'priority'    => 6,
			'description' => __( 'Settings For title visibility and background..', 'avantex' ),
			'panel'       => 'avantex-options-panel',
		)
	);
	// heading control.
	$wp_customize->add_setting(
		'avantex-title-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-title-notice-control',
			array(
				'label'    => __( 'Title Section settings ', 'avantex' ),
				'settings' => 'avantex-title-notice',
				'section'  => 'avantex-title-section',
			)
		)
	);

	// Title Image Control.
	$wp_customize->add_setting(
		'avantex-title-image',
		array(
			'default'           => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/page-header.jpg',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'avantex-title-image_control',
			array(
				'label'         => __( 'Title Background Image', 'avantex' ),
				'description'   => esc_html__( 'Choose Image for Title Background. Best fit : (width 1920px) by (any desired height: default 731px)', 'avantex' ),
				'section'       => 'avantex-title-section',
				'settings'      => 'avantex-title-image',
				'button_labels' => array( // Optional.
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
	// TITLE Overlay Color.
		$wp_customize->add_setting(
			'avantex_title_overlay',
			array(
				'default'           => 'rgba(0,9,15,0.8)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex_title_overlay_control',
				array(
					'label'       => __( 'TITLE Overlay Color', 'avantex' ),
					// 'description' => esc_html__( 'Sample color control with Alpha channel','avantex' ),
					'settings'    => 'avantex_title_overlay',
					'section'     => 'avantex-title-section',
					'input_attrs' => array(
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
