<?php
/**
 * Custom Top Bar section
 *
 * @package avantex
 */

/** Section for "Top Bar". */
	$wp_customize->add_section(
		'avantex-topbar-section',
		array(
			'title'       => 'Top Bar settings',
			'priority'    => 1,
			'panel'       => 'avantex-options-panel',
			'description' => __( 'Settings to Display Topbar and its Additional features.', 'avantex' ),
		)
	);
	/** Top Bar Settings Start */

	/** Setting to display Top Bar */
		$wp_customize->add_setting(
			'avantex-topbar-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-topbar-show-control',
				array(
					'label'    => esc_html__( 'Show Top Bar', 'avantex' ),
					'section'  => 'avantex-topbar-section',
					'settings' => 'avantex-topbar-show',
				)
			)
		);
		/** Selective refresh topbar */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'avantex-topbar-show',
				array(
					'selector' => '.sr-topbar',
				)
			);
		}
		/** Check Topbar Show Enabled Active callback. */
		function avantex_if_topbar_show_control_enabled( $control ) {
			if ( 1 === $control->manager->get_setting( 'avantex-topbar-show' )->value() ) {
				return true;
			} else {
				return false;
			}
		}

		// Topbar Settings  heading control.
		$wp_customize->add_setting(
			'avantex-topbar-notice',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'avantex-topbar-notice-control',
				array(
					'label'           => __( 'Top Bar Settings.', 'avantex' ),
					'settings'        => 'avantex-topbar-notice',
					'section'         => 'avantex-topbar-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control ) );
					},
				)
			)
		);
		/** Top Bar Email  */
		$wp_customize->add_setting(
			'avantex-topbar-email',
			array(
				'default'           => 'example@corpo.com',
				'sanitize_callback' => array( $this, 'sanitize_custom_email' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'avantex-topbar-email-control',
				array(
					'label'           => 'Site Email',
					'section'         => 'avantex-topbar-section',
					'settings'        => 'avantex-topbar-email',
					'type'            => 'text',
					'active_callback' => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control ) );
					},
				)
			)
		);

		/** Setting for Telephone Number */
		$wp_customize->add_setting(
			'avantex-topbar-tel',
			array(
				'default'           => '+00123456789',
				'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'avantex-topbar-tel-control',
				array(
					'label'           => 'Telephone/Callback',
					'section'         => 'avantex-topbar-section',
					'settings'        => 'avantex-topbar-tel',
					'type'            => 'text',
					'active_callback' => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Social Icons heading control.
		$wp_customize->add_setting(
			'avantex-topbar-social-notice',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'avantex-topbar-social-notice-control',
				array(
					'label'           => __( 'Social Icons Settings.', 'avantex' ),
					'settings'        => 'avantex-topbar-social-notice',
					'section'         => 'avantex-topbar-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control ) );
					},
				)
			)
		);
		/** Setting to display Social Icons */
		$wp_customize->add_setting(
			'avantex-topbar-social-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-topbar-social-show-control',
				array(
					'label'           => esc_html__( 'Show Social Icons at Topbar', 'avantex' ),
					'section'         => 'avantex-topbar-section',
					'settings'        => 'avantex-topbar-social-show',
					'active_callback' => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control ) );
					},
				)
			)
		);
		/** Selective refresh topbar */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'avantex-topbar-social-show',
				array(
					'selector' => '.sr-social-icons',
				)
			);
		}
		/** Check Topbar Show Enabled Active callback. */
		function avantex_if_topbar_social_show_control_enabled( $control ) {
			if ( 1 === $control->manager->get_setting( 'avantex-topbar-social-show' )->value() ) {
				return true;
			} else {
				return false;
			}
		}
		/** Settings for Images / Title / Description */
		// Carousel Images / Title / Description Fetch by Repeater.

		$wp_customize->add_setting(
			'avantex-topbar-social-repeater',
			array(
				'sanitize_callback' => 'customizer_repeater_sanitize',
				'transport'         => 'refresh',
				'default'           => TOPBAR_DEFAULTS,
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Repeater(
				$wp_customize,
				'avantex-topbar-social-repeater-control',
				array(
					'label'                                => esc_html__( 'Manage Topbar Social Icons', 'avantex' ),
					'settings'                             => 'avantex-topbar-social-repeater',
					'section'                              => 'avantex-topbar-section',
					'add_field_label'                      => esc_html__( 'Manage Social Icons', 'avantex' ),
					'item_name'                            => esc_html__( 'Social Icons', 'avantex' ),
					'priority'                             => 10,
					'customizer_repeater_image_control'    => false,
					'customizer_repeater_icon_control'     => false,
					'customizer_repeater_title_control'    => false,
					'customizer_repeater_btntitle_control' => false,
					'customizer_repeater_subtitle_control' => false,
					'customizer_repeater_text_control'     => false,
					'customizer_repeater_text2_control'    => false,
					'customizer_repeater_link_control'     => false,
					'customizer_repeater_link2_control'    => false,
					'customizer_repeater_shortcode_control' => false,
					'customizer_repeater_repeater_control' => true,
					'customizer_repeater_color_control'    => false,
					'customizer_repeater_color2_control'   => false,
					'active_callback'                      => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control )
						&&
						avantex_if_topbar_social_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Custom Upgrade Control.
		$wp_customize->add_control(
			new Avantex_Custom_Upgrade_Control(
				$wp_customize,
				'avantex-topbar-upgrade-control',
				array(
					'settings' => 'avantex-topbar-social-repeater',
					'section'  => 'avantex-topbar-section',
				)
			)
		);
		// Social Icons heading control.
		$wp_customize->add_setting(
			'avantex-topbar-button-notice',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'avantex-topbar-button-notice-control',
				array(
					'label'           => __( 'Button Settings.', 'avantex' ),
					'settings'        => 'avantex-topbar-button-notice',
					'section'         => 'avantex-topbar-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Button.
		$wp_customize->add_setting(
			'avantex-topbar-button-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-topbar-button-show-control',
				array(
					'label'           => esc_html__( 'Show Button', 'avantex' ),
					'section'         => 'avantex-topbar-section',
					'settings'        => 'avantex-topbar-button-show',
					'active_callback' => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Button Text.
		function avantex_ac_button_text( $control ) {
			if ( 1 === $control->manager->get_setting( 'avantex-topbar-button-show' )->value() ) {
				return true;
			} else {
				return false;
			}
		}
		// Setting for Button text.
		$wp_customize->add_setting(
			'avantex-topbar-button-text',
			array(
				'default'           => 'Get Started',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'avantex-topbar-button-text-control',
				array(
					'label'           => 'Button Text',
					'section'         => 'avantex-topbar-section',
					'settings'        => 'avantex-topbar-button-text',
					'type'            => 'text',
					'active_callback' => function( $control ) {
						return (
							avantex_if_topbar_show_control_enabled( $control )
							&&
							avantex_ac_button_text( $control )
						);
					},
					'input_attrs'     => array(
						'placeholder' => 'Get Started',
					),
				)
			)
		);
		// Callout Button URL.
		$wp_customize->add_setting(
			'avantex-topbar-btnlink',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_custom_url' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'avantex-topbar-btnlink-control',
				array(
					'label'           => 'Topbar Button link',
					'section'         => 'avantex-topbar-section',
					'settings'        => 'avantex-topbar-btnlink',
					'type'            => 'text',
					'active_callback' => function( $control ) {
						return ( avantex_if_topbar_show_control_enabled( $control )
						&&
						avantex_ac_button_text( $control )
						);
					},
					'input_attrs'     => array(
						'placeholder' => 'https://',
					),
				)
			)
		);
