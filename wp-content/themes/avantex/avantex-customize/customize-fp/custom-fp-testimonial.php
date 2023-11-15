<?php
/**
 * Custom testimonial Section.
 *
 * @package avantex
 */


/** Section for "testimonial". */
	$wp_customize->add_section(
		'avantex-testimonial-section',
		array(
			'title'       => __( 'Testimonial settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-testimonial-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display testimonials and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display testimonial */
	$wp_customize->add_setting(
		'avantex-testimonial-show',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-testimonial-show-control',
			array(
				'label'    => esc_html__( 'Show Testimonial on Frontpage', 'avantex' ),
				'section'  => 'avantex-testimonial-section',
				'settings' => 'avantex-testimonial-show',
			)
		)
	);
	/** Selective refresh callout */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex-testimonial-show',
			array(
				'selector' => '.sr-testimonial',
			)
		);
	}
	/** Check testimonial Show Enabled Active callback. */
	function avantex_if_testimonial_show_control_enabled( $control ) {
		if ( 1 === $control->manager->get_setting( 'avantex-testimonial-show' )->value() ) {
			return true;
		} else {
			return false;
		}
	}
	// heading control.
	$wp_customize->add_setting(
		'avantex-testimonial-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-testimonial-notice-control',
			array(
				'label'           => __( 'Testimonial settings ', 'avantex' ),
				'settings'        => 'avantex-testimonial-notice',
				'section'         => 'avantex-testimonial-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Testimonial section Title  */
	$wp_customize->add_setting(
		'avantex-testimonial-title-tag',
		array(
			'default'           => esc_html__( 'Happy Customers!', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-testimonial-title-tag-control',
			array(
				'label'           => __( 'Testimonial Title Tag', 'avantex' ),
				'section'         => 'avantex-testimonial-section',
				'settings'        => 'avantex-testimonial-title-tag',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Testimonial section Subtitle  */
	$wp_customize->add_setting(
		'avantex-testimonial-title',
		array(
			'default'           => esc_html__( 'CUSTOMER FEEDBACKS ABOUT US', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-testimonial-title-control',
			array(
				'label'           => __( 'Testimonial Title', 'avantex' ),
				'section'         => 'avantex-testimonial-section',
				'settings'        => 'avantex-testimonial-title',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
				},
			)
		)
	);

	/** Repeater Defaults. */
	$wp_customize->add_setting(
		'avantex-testimonial-repeater',
		array(
			'sanitize_callback' => 'customizer_repeater_sanitize',
			'default'           => TESTIMONIAL_DEFAULTS,
		)
	);
	/** Repeater Control */
	$wp_customize->add_control(
		new Avantex_Customizer_Repeater(
			$wp_customize,
			'avantex-testimonial-repeater-control',
			array(
				'label'                                 => esc_html__( 'Manage Testimonials', 'avantex' ),
				'settings'                              => 'avantex-testimonial-repeater',
				'section'                               => 'avantex-testimonial-section',
				'add_field_label'                       => esc_html__( 'Add Testimonial', 'avantex' ),
				'item_name'                             => esc_html__( 'Review', 'avantex' ),
				'priority'                              => 10,
				'customizer_repeater_image_control'     => true,
				'customizer_repeater_icon_control'      => false,
				'customizer_repeater_title_control'     => true,
				'customizer_repeater_subtitle_control'  => true,
				'customizer_repeater_btntitle_control'  => true,
				'customizer_repeater_text_control'      => false,
				'customizer_repeater_text2_control'     => false,
				'customizer_repeater_link_control'      => false,
				'customizer_repeater_link2_control'     => false,
				'customizer_repeater_shortcode_control' => true,
				'customizer_repeater_repeater_control'  => false,
				'customizer_repeater_color_control'     => false,
				'customizer_repeater_color2_control'    => false,
				'active_callback'                       => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-testimonial-upgrade-control',
			array(
				'settings' => 'avantex-testimonial-repeater',
				'section'  => 'avantex-testimonial-section',
			)
		)
	);
	/**
	 * Filter to modify input type in repeater control
	 * You can filter by control id and input name.
	 *
	 * @param string $string Input label.
	 * @param string $id Input id.
	 * @param string $control Control name.
	 * @modified 1.1.41
	 *
	 * @return string
	 */
	function avantex_repeater_input_types( $string, $id, $control ) {
		if ( $id === 'avantex-testimonial-repeater-control' ) { // here is the id of the control you want to change.
			if ( $control === 'customizer_repeater_subtitle_control' ) { // Here is the input you want to change.
				return 'textarea';
			}
		}
		return $string;
	}
	add_filter( 'customizer_repeater_input_types_filter', 'avantex_repeater_input_types', 10, 3 );

	// Testimonial Colors Controls heading control.
	$wp_customize->add_setting(
		'avantex-testimonial-colors-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-testimonial-colors-notice-control',
			array(
				'label'           => __( 'Testimonial Colors ', 'avantex' ),
				'settings'        => 'avantex-testimonial-colors-notice',
				'section'         => 'avantex-testimonial-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-testimonial-colors-upgrade-control',
			array(
				'settings' => 'avantex-testimonial-colors-notice',
				'section'  => 'avantex-testimonial-section',
			)
		)
	);
	// Testimonial Title text Color.
	$wp_customize->add_setting(
		'avantex-testimonial-title-color',
		array(
			// 'default'           => '#000000',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-testimonial-title-color-control',
			array(
				'label'           => __( 'Testimonial Title text Color', 'avantex' ),
				'settings'        => 'avantex-testimonial-title-color',
				'section'         => 'avantex-testimonial-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
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
	// Testimonial Title-tag text Color.
	$wp_customize->add_setting(
		'avantex-testimonial-description-color',
		array(
			// 'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-testimonial-description-color-control',
			array(
				'label'           => __( 'Testimonial Title-tag text Color', 'avantex' ),
				'settings'        => 'avantex-testimonial-description-color',
				'section'         => 'avantex-testimonial-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
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
	// Testimonial Review title Color.
	$wp_customize->add_setting(
		'avantex-testimonial-review-title-color',
		array(
			// 'default'           => '#000000',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-testimonial-review-title-color-control',
			array(
				'label'           => __( 'Review Title Color', 'avantex' ),
				'settings'        => 'avantex-testimonial-review-title-color',
				'section'         => 'avantex-testimonial-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
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
	// Testimonial Review text Color.
	$wp_customize->add_setting(
		'avantex-testimonial-review-color',
		array(
			// 'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-testimonial-review-color-control',
			array(
				'label'           => __( 'Review text Color', 'avantex' ),
				'settings'        => 'avantex-testimonial-review-color',
				'section'         => 'avantex-testimonial-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
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
	// Testimonial Client Name Color.
	$wp_customize->add_setting(
		'avantex-testimonial-client-color',
		array(
			// 'default'           => '#3c72fc',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-testimonial-client-color-control',
			array(
				'label'           => __( 'Client Name Color', 'avantex' ),
				'settings'        => 'avantex-testimonial-client-color',
				'section'         => 'avantex-testimonial-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
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
	// Testimonial Client Designation  Color.
	$wp_customize->add_setting(
		'avantex-testimonial-client-desig-color',
		array(
			// 'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-testimonial-client-desig-color-control',
			array(
				'label'           => __( 'Client Designation Color', 'avantex' ),
				'settings'        => 'avantex-testimonial-client-desig-color',
				'section'         => 'avantex-testimonial-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_testimonial_show_control_enabled( $control ) );
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
