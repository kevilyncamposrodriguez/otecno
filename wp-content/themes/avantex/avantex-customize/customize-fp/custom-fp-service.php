<?php
/**
 * Custom Services Section.
 *
 * @package avantex
 */


/** Section for "Services". */
	$wp_customize->add_section(
		'avantex-services-section',
		array(
			'title'       => __( 'Services settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-services-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display Services and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display Services */
		$wp_customize->add_setting(
			'avantex-services-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-services-show-control',
				array(
					'label'    => esc_html__( 'Show Services on Frontpage', 'avantex' ),
					'section'  => 'avantex-services-section',
					'settings' => 'avantex-services-show',
				)
			)
		);
		/** Selective refresh Services */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'avantex-services-show',
				array(
					'selector' => '.sr-services',
				)
			);
		}
		/** Check Services Show Enabled Active callback. */
		function avantex_if_services_show_control_enabled( $control ) {
			if ( 1 === $control->manager->get_setting( 'avantex-services-show' )->value() ) {
				return true;
			} else {
				return false;
			}
		}

		// Services Colors Controls heading control.
		$wp_customize->add_setting(
			'avantex-services-settings-notice',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'avantex-services-settings-notice-control',
				array(
					'label'           => __( 'Services Settings ', 'avantex' ),
					'settings'        => 'avantex-services-settings-notice',
					'section'         => 'avantex-services-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
					},
				)
			)
		);

		/** Services section Title  */
		$wp_customize->add_setting(
			'avantex-services-title',
			array(
				'default'           => esc_html__( 'What we Offer', 'avantex' ),
				'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'avantex-services-title-control',
				array(
					'label'           => __( 'Title', 'avantex' ),
					'section'         => 'avantex-services-section',
					'settings'        => 'avantex-services-title',
					'type'            => 'text',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
					},
				)
			)
		);
		/** Services section Subtitle  */
		$wp_customize->add_setting(
			'avantex-services-subtitle',
			array(
				'default'           => esc_html__( 'The best business services we are offering!', 'avantex' ),
				'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'avantex-services-subtitle-control',
				array(
					'label'           => __( 'Subtitle', 'avantex' ),
					'section'         => 'avantex-services-section',
					'settings'        => 'avantex-services-subtitle',
					'type'            => 'text',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
					},
				)
			)
		);

		/** Settings for Images / Title / Description */
		// Carousel Images / Title / Description Fetch by Repeater.
		$wp_customize->add_setting(
			'avantex-services-repeater',
			array(
				'sanitize_callback' => 'customizer_repeater_sanitize',
				'default'           => SERVICES_DEFAULTS,
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Repeater(
				$wp_customize,
				'avantex-services-repeater-control',
				array(
					'label'                                => esc_html__( 'Manage Services', 'avantex' ),
					'settings'                             => 'avantex-services-repeater',
					'section'                              => 'avantex-services-section',
					'add_field_label'                      => esc_html__( 'Add Service', 'avantex' ),
					'item_name'                            => esc_html__( 'Service', 'avantex' ),
					'priority'                             => 10,
					'customizer_repeater_image_control'    => true,
					'customizer_repeater_icon_control'     => true,
					'customizer_repeater_title_control'    => true,
					'customizer_repeater_btntitle_control' => true,
					'customizer_repeater_subtitle_control' => true,
					'customizer_repeater_text_control'     => false,
					'customizer_repeater_text2_control'    => false,
					'customizer_repeater_link_control'     => true,
					'customizer_repeater_link2_control'    => false,
					'customizer_repeater_shortcode_control' => false,
					'customizer_repeater_repeater_control' => false,
					'customizer_repeater_color_control'    => false,
					'customizer_repeater_color2_control'   => false,
					'active_callback'                      => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Custom Upgrade Control.
		$wp_customize->add_control(
			new Avantex_Custom_Upgrade_Control(
				$wp_customize,
				'avantex-services-upgrade-control',
				array(
					'settings' => 'avantex-services-repeater',
					'section'  => 'avantex-services-section',
				)
			)
		);
		// Container Size.
		$wp_customize->add_setting(
			'avantex-services-size',
			array(
				'default'           => 'container',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex-services-size-control',
				array(
					'label'           => __( 'Services Section size', 'avantex' ),
					'description'     => esc_html__( 'Choose container size of services section.', 'avantex' ),
					'section'         => 'avantex-services-section',
					'settings'        => 'avantex-services-size',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
					},
					'choices'         => array(
						'container'       => __( 'Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'container-full'  => __( 'Full Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'container-fluid' => __( 'Fluid', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					),
				)
			)
		);

		// Grid Column Layout.
		$wp_customize->add_setting(
			'avantex-services-grid',
			array(
				'default'           => 'col-lg-4',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex-services-grid-control',
				array(
					'label'           => __( 'Services Grid Column Layout', 'avantex' ),
					'description'     => esc_html__( 'Select grid layout and number of services inline display in section.', 'avantex' ),
					'section'         => 'avantex-services-section',
					'settings'        => 'avantex-services-grid',
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
						return ( avantex_if_services_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Custom Upgrade Control.
		$wp_customize->add_control(
			new Avantex_Custom_Upgrade_Control(
				$wp_customize,
				'avantex-services-grid-upgrade-control',
				array(
					'section'  => 'avantex-services-section',
					'settings' => 'avantex-services-grid',
				)
			)
		);
		// Services Image Control.
		$wp_customize->add_setting(
			'avantex-services-image',
			array(
				'default'           => get_template_directory_uri() . '/assets/images/service-shape.png',
				'transport'         => 'refresh',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'avantex-services-image_control',
				array(
					'label'           => __( 'Services Background Image', 'avantex' ),
					'description'     => esc_html__( 'Choose Image for Services Background. Best fit : Width 1920px', 'avantex' ),
					'section'         => 'avantex-services-section',
					'settings'        => 'avantex-services-image',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
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
		// Services background opacity.
		$wp_customize->add_setting(
			'avantex-services-background-opacity',
			array(
				'default'           => 30,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Slider_Custom_Control(
				$wp_customize,
				'avantex-services-background-opacity_control',
				array(
					'label'           => esc_html__( 'Background Image Opacity (%)', 'avantex' ),
					'section'         => 'avantex-services-section',
					'settings'        => 'avantex-services-background-opacity',
					'input_attrs'     => array(
						'min'  => 0, // Required. Minimum value for the slider
						'max'  => 100, // Required. Maximum value for the slider
						'step' => 5, // Required. The size of each interval or step the slider takes between the minimum and maximum values
					),
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Services Colors Controls heading control.
		$wp_customize->add_setting(
			'avantex-services-colors-notice',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Simple_Notice_Custom_control(
				$wp_customize,
				'avantex-services-colors-notice-control',
				array(
					'label'           => __( 'Services Colors ', 'avantex' ),
					'settings'        => 'avantex-services-colors-notice',
					'section'         => 'avantex-services-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
					},
				)
			)
		);
		// Custom Upgrade Control.
		$wp_customize->add_control(
			new Avantex_Custom_Upgrade_Control(
				$wp_customize,
				'avantex-services-color-upgrade-control',
				array(
					'settings' => 'avantex-services-colors-notice',
					'section'  => 'avantex-services-section',
				)
			)
		);
		// Services Title text Color.
		$wp_customize->add_setting(
			'avantex-services-title-color',
			array(
				// 'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex-services-title-color-control',
				array(
					'label'           => __( 'Services Section Title Color', 'avantex' ),
					'settings'        => 'avantex-services-title-color',
					'section'         => 'avantex-services-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
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
		// Services Description text Color.
		$wp_customize->add_setting(
			'avantex-services-description-color',
			array(
				// 'default'        => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex-services-description-color-control',
				array(
					'label'           => __( 'Services Section Description Color', 'avantex' ),
					'settings'        => 'avantex-services-description-color',
					'section'         => 'avantex-services-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
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
		// Individual Service Title text Color.
		$wp_customize->add_setting(
			'avantex-service-title-color',
			array(
				// 'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex-service-title-color-control',
				array(
					'label'           => __( 'Service Title Color', 'avantex' ),
					'settings'        => 'avantex-service-title-color',
					'section'         => 'avantex-services-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
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
		// Services Detail text Color.
		$wp_customize->add_setting(
			'avantex-service-details-color',
			array(
				// 'default'        => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex-service-details-color-control',
				array(
					'label'           => __( 'Service Detail Color', 'avantex' ),
					'settings'        => 'avantex-service-details-color',
					'section'         => 'avantex-services-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
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
		// Services Link Color.
		$wp_customize->add_setting(
			'avantex-service-link-color',
			array(
				// 'default'        => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex-service-link-color-control',
				array(
					'label'           => __( 'Service Link Color', 'avantex' ),
					'settings'        => 'avantex-service-link-color',
					'section'         => 'avantex-services-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
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
		// Services Icon Color.
		$wp_customize->add_setting(
			'avantex-service-icon-color',
			array(
				// 'default'        => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Avantex_Customizer_Alpha_Color_Control(
				$wp_customize,
				'avantex-service-icon-color-control',
				array(
					'label'           => __( 'Service Icon Color', 'avantex' ),
					'settings'        => 'avantex-service-icon-color',
					'section'         => 'avantex-services-section',
					'active_callback' => function( $control ) {
						return ( avantex_if_services_show_control_enabled( $control ) );
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
