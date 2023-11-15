<?php
/**
 * Custom Slider Section.
 *
 * @package avantex
 */

		$wp_customize->add_section(
			'avantex-slider-section',
			array(
				'title'       => 'Slider Settings',
				'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-slider-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
				'panel'       => 'avantex-fpsections-panel',
				'description' => __( 'Settings to Display Carousel and its Additional features.', 'avantex' ),
			)
		);

		/** Setting to display Slider */
		$wp_customize->add_setting(
			'avantex-slider-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-slider-show-control',
				array(
					'label'    => esc_html__( 'Show Slider on Frontpage', 'avantex' ),
					'section'  => 'avantex-slider-section',
					'settings' => 'avantex-slider-show',
				)
			)
		);
		/** Selective refresh */
		// $wp_customize->get_setting( 'avantex-slider-show' )->transport = 'postMessage';
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'avantex-slider-show',
				array(
					'selector' => '.sr-slider',
				)
			);
		}
		/** Check Topbar Show Enabled Active callback. */
		function avantex_if_slider_show_control_enabled( $control ) {
			if ( 1 === $control->manager->get_setting( 'avantex-slider-show' )->value() ) {
				return true;
			} else {
				return false;
			}
		}
		// heading control.
		$wp_customize->add_setting(
			'avantex_slider_notice',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'avantex_slider_notice_control',
				array(
					'label'           => __( 'Slider Image settings ', 'avantex' ),
					'settings'        => 'avantex_slider_notice',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
					},
				)
			)
		);

		/** Settings for Images / Title / Description */
		// Carousel Images / Title / Description Fetch by Repeater.

		$wp_customize->add_setting(
			'avantex-slider-repeater',
			array(
				'sanitize_callback' => 'customizer_repeater_sanitize',
				'default'           => SLIDER_DEFAULTS,
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Repeater(
				$wp_customize,
				'avantex-slider-repeater-control',
				array(
					'label'                                => esc_html__( 'Manage Carousel Images', 'avantex' ),
					'settings'                             => 'avantex-slider-repeater',
					'section'                              => 'avantex-slider-section',
					'add_field_label'                      => __( 'Add More Image', 'avantex' ),
					'item_name'                            => __( 'Set Image Title/Description/Button', 'avantex' ),
					'priority'                             => 10,
					'customizer_repeater_image_control'    => true,
					'customizer_repeater_icon_control'     => false,
					'customizer_repeater_title_control'    => true,
					'customizer_repeater_btntitle_control' => true,
					'customizer_repeater_subtitle_control' => true,
					'customizer_repeater_text_control'     => true,
					'customizer_repeater_text2_control'    => false,
					'customizer_repeater_link_control'     => true,
					'customizer_repeater_link2_control'    => false,
					'customizer_repeater_shortcode_control' => false,
					'customizer_repeater_repeater_control' => false,
					'customizer_repeater_color_control'    => false,
					'customizer_repeater_color2_control'   => false,
					'active_callback'                      => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Custom Upgrade Control.
		$wp_customize->add_control(
			new Avantex_Custom_Upgrade_Control(
				$wp_customize,
				'avantex-slider-upgrade-control',
				array(
					'settings' => 'avantex-slider-repeater',
					'section'  => 'avantex-slider-section',
				)
			)
		);
		// heading control.
		$wp_customize->add_setting(
			'avantex_slider_options_notice',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'avantex_slider_options_notice_control',
				array(
					'label'           => __( 'Slider Control settings ', 'avantex' ),
					'settings'        => 'avantex_slider_options_notice',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Slider Prev/Next button Control.
		$wp_customize->add_setting(
			'avantex_slider_prevnext',
			array(
				'default'           => 'true',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex_slider_prevnext_control',
				array(
					'label'           => __( 'Prev/Next Controls', 'avantex' ),
					'description'     => esc_html__( 'Toggle Show/Hide sliders prev/next controls.', 'avantex' ),
					'settings'        => 'avantex_slider_prevnext',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
					},
					'choices'         => array(
						'true'  => __( 'Show', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'false' => __( 'Hide', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					),
				)
			)
		);
		// Slider overlay Control.
		$wp_customize->add_setting(
			'avantex_slider_overlay',
			array(
				'default'           => 'itembf',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex_slider_overlay_control',
				array(
					'label'           => __( 'Slider Overlay', 'avantex' ),
					'description'     => esc_html__( 'Toggle Overlay on Slider Image.', 'avantex' ),
					'settings'        => 'avantex_slider_overlay',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
					},
					'choices'         => array(
						'itembf' => __( 'Enable', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						''       => __( 'Disable', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					),
				)
			)
		);
		/** Check Topbar Show Enabled Active callback. */
		function avantex_if_slider_overlay_control_enabled( $control ) {
			if ( 'itembf' === $control->manager->get_setting( 'avantex_slider_overlay' )->value() ) {
				return true;
			} else {
				return false;
			}
		}
		// Slider Overlay Color.
		$wp_customize->add_setting(
			'avantex_slider_overlay_color',
			array(
				'default'           => 'rgba(0,0,0,0.6)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex_slider_overlay_color_control',
				array(
					'label'           => __( 'Slider Overlay Color', 'avantex' ),
					// 'description' => esc_html__( 'Sample color control with Alpha channel', 'avantex' ),
					'settings'        => 'avantex_slider_overlay_color',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) && avantex_if_slider_overlay_control_enabled( $control ) );
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
		// Slider Autoplay Control.
		$wp_customize->add_setting(
			'avantex_slider_autoplay',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex_slider_autoplay-control',
				array(
					'label'           => __( 'Toggle Slider Autoplay', 'avantex' ),
					'description'     => esc_html__( 'Toggle slider autoplay on/off. Also display additional controls', 'avantex' ),
					'settings'        => 'avantex_slider_autoplay',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
					},

				)
			)
		);
		/** Check slider autoplay Enabled Active callback. */
		function avantex_if_slider_autoplay_control_enabled( $control ) {
			if ( 1 === $control->manager->get_setting( 'avantex_slider_autoplay' )->value() ) {
				return true;
			} else {
				return false;
			}
		}
		// Slider loop Control.
		$wp_customize->add_setting(
			'avantex_slider_loop',
			array(
				'default'           => 'true',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex_slider_loop_control',
				array(
					'label'           => __( 'Loop Slides', 'avantex' ),
					'description'     => esc_html__( 'Toggle slider loop of images on/off while autoplay is on. ', 'avantex' ),
					'settings'        => 'avantex_slider_loop',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) && avantex_if_slider_autoplay_control_enabled( $control ) );
					},
					'choices'         => array(
						'true'  => __( 'On', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'false' => __( 'Off', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					),
				)
			)
		);
		// Slider Pause on Hover Control.
		$wp_customize->add_setting(
			'avantex_slider_pauseonhover',
			array(
				'default'           => 'true',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex_slider_pauseonhover_control',
				array(
					'label'           => __( 'Slider Pause on Hover', 'avantex' ),
					'description'     => esc_html__( 'Toggle Pause Slider on Mouse Hover.', 'avantex' ),
					'settings'        => 'avantex_slider_pauseonhover',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) && avantex_if_slider_autoplay_control_enabled( $control ) );
					},
					'choices'         => array(
						'true'  => __( 'On', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'false' => __( 'Off', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					),
				)
			)
		);
		// Slider Autoplay Speed.
		$wp_customize->add_setting(
			'avantex_slider_speed',
			array(
				'default'           => 3000,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Slider_Custom_Control(
				$wp_customize,
				'avantex_slider_speed_control',
				array(
					'label'           => esc_html__( 'Slider Autoplay Speed (ms)', 'avantex' ),
					'settings'        => 'avantex_slider_speed',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) && avantex_if_slider_autoplay_control_enabled( $control ) );
					},
					'input_attrs'     => array(
						'min'  => 1000, // Required. Minimum value for the slider.
						'max'  => 20000, // Required. Maximum value for the slider.
						'step' => 100, // Required. The size of each interval or step the slider takes between the minimum and maximum values.
					),
				)
			)
		);
		// heading control.
		$wp_customize->add_setting(
			'avantex_slider_colors_notice',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'avantex_slider_colors_notice_control',
				array(
					'label'           => __( 'Slider Color settings ', 'avantex' ),
					'settings'        => 'avantex_slider_colors_notice',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Custom Upgrade Control.
		$wp_customize->add_control(
			new Avantex_Custom_Upgrade_Control(
				$wp_customize,
				'avantex-slider-color-upgrade-control',
				array(
					'settings' => 'avantex_slider_colors_notice',
					'section'  => 'avantex-slider-section',
				)
			)
		);
		// Slider Title Tag text Color.
		$wp_customize->add_setting(
			'avantex_slider_titletag_color',
			array(
				// 'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex_slider_titletag_color_control',
				array(
					'label'           => __( 'Slider Title Tag text Color', 'avantex' ),
					'settings'        => 'avantex_slider_titletag_color',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
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

		// Slider Title text Color.
		$wp_customize->add_setting(
			'avantex_slider_title_color',
			array(
				// 'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex_slider_title_color_control',
				array(
					'label'           => __( 'Slider Title text Color', 'avantex' ),
					'settings'        => 'avantex_slider_title_color',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
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
		// Slider description text Color.
		$wp_customize->add_setting(
			'avantex_slider_description_color',
			array(
				// 'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex_slider_description_color_control',
				array(
					'label'           => __( 'Slider Description text Color', 'avantex' ),
					'settings'        => 'avantex_slider_description_color',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
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
		// Slider button text Color.
		$wp_customize->add_setting(
			'avantex_slider_btntext_color',
			array(
				// 'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex_slider_btntext_color_control',
				array(
					'label'           => __( 'Slider Button text Color', 'avantex' ),
					'settings'        => 'avantex_slider_btntext_color',
					'section'         => 'avantex-slider-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_slider_show_control_enabled( $control ) );
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
