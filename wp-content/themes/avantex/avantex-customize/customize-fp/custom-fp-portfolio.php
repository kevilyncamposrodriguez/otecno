<?php
/**
 * Custom portfolio Section.
 *
 * @package avantex
 */

/** Section for "portfolio". */
	$wp_customize->add_section(
		'avantex-portfolio-section',
		array(
			'title'       => __( 'Portfolio settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-portfolio-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display portfolio and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display portfolio */
	$wp_customize->add_setting(
		'avantex-portfolio-show',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-portfolio-show-control',
			array(
				'label'    => esc_html__( 'Show Portfolio on Frontpage', 'avantex' ),
				'section'  => 'avantex-portfolio-section',
				'settings' => 'avantex-portfolio-show',
			)
		)
	);
	/** Selective refresh Services */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex-portfolio-show',
			array(
				'selector' => '.sr-portfolio',
			)
		);
	}
	/** Check portfolio Show Enabled Active callback. */
	function avantex_if_portfolio_show_control_enabled( $control ) {
		if ( 1 === $control->manager->get_setting( 'avantex-portfolio-show' )->value() ) {
			return true;
		} else {
			return false;
		}
	}
	// heading control.
	$wp_customize->add_setting(
		'avantex-portfolio-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-portfolio-notice-control',
			array(
				'label'           => __( 'Portfolio settings ', 'avantex' ),
				'settings'        => 'avantex-portfolio-notice',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Portfolio section Title  */
	$wp_customize->add_setting(
		'avantex-portfolio-title',
		array(
			'default'           => esc_html__( 'OUR RECENT PROJECTS', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-portfolio-title-control',
			array(
				'label'           => __( 'Title', 'avantex' ),
				'section'         => 'avantex-portfolio-section',
				'settings'        => 'avantex-portfolio-title',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Portfolio section Subtitle  */
	$wp_customize->add_setting(
		'avantex-portfolio-subtitle',
		array(
			'default'           => esc_html__( 'Checkout what we are doing!', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-portfolio-subtitle-control',
			array(
				'label'           => __( 'Subtitle', 'avantex' ),
				'section'         => 'avantex-portfolio-section',
				'settings'        => 'avantex-portfolio-subtitle',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
			)
		)
	);

	/** Settings for Images / Title / Description */
	// Carousel Images / Title / Description Fetch by Repeater.

	$wp_customize->add_setting(
		'avantex-portfolio-repeater',
		array(
			'sanitize_callback' => 'customizer_repeater_sanitize',
			'default'           => PORTFOLIO_DEFAULTS,
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Repeater(
			$wp_customize,
			'avantex-portfolio-repeater-control',
			array(
				'label'                                 => esc_html__( 'Manage Portfolio', 'avantex' ),
				'settings'                              => 'avantex-portfolio-repeater',
				'section'                               => 'avantex-portfolio-section',
				'add_field_label'                       => esc_html__( 'Add Project', 'avantex' ),
				'item_name'                             => esc_html__( 'Project', 'avantex' ),
				'priority'                              => 10,
				'customizer_repeater_image_control'     => true,
				'customizer_repeater_icon_control'      => false,
				'customizer_repeater_title_control'     => true,
				'customizer_repeater_btntitle_control'  => false,
				'customizer_repeater_subtitle_control'  => true,
				'customizer_repeater_text_control'      => false,
				'customizer_repeater_text2_control'     => false,
				'customizer_repeater_link_control'      => true,
				'customizer_repeater_link2_control'     => false,
				'customizer_repeater_shortcode_control' => false,
				'customizer_repeater_repeater_control'  => false,
				'customizer_repeater_color_control'     => false,
				'customizer_repeater_color2_control'    => false,
				'active_callback'                       => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-portfolio-upgrade-control',
			array(
				'settings' => 'avantex-portfolio-repeater',
				'section'  => 'avantex-portfolio-section',
			)
		)
	);
	// Container Size.
	$wp_customize->add_setting(
		'avantex-portfolio-size',
		array(
			'default'           => 'container-fluid',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Text_Radio_Button_Custom_Control(
			$wp_customize,
			'avantex-portfolio-size-control',
			array(
				'label'           => __( 'Portfolio Section size', 'avantex' ),
				'description'     => esc_html__( 'Choose container size of Portfolio section.', 'avantex' ),
				'section'         => 'avantex-portfolio-section',
				'settings'        => 'avantex-portfolio-size',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
				'choices'         => array(
					'container'       => __( 'Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					'container-full'  => __( 'Full Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					'container-fluid' => __( 'fluid', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
				),
			)
		)
	);
	// Portfolio Slider Controls heading control.
	$wp_customize->add_setting(
		'avantex-portfolio-controls-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-portfolio-controls-notice-control',
			array(
				'label'           => __( 'Portfolio Slider Controls ', 'avantex' ),
				'settings'        => 'avantex-portfolio-controls-notice',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Slider Prev/Next button Control.
	$wp_customize->add_setting(
		'avantex-portfolio-prevnext',
		array(
			'default'           => 'true',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Text_Radio_Button_Custom_Control(
			$wp_customize,
			'avantex-portfolio-prevnext-control',
			array(
				'label'           => __( 'Prev/Next Controls', 'avantex' ),
				'description'     => esc_html__( 'Toggle Show/Hide sliders prev/next controls.(Note: On-hover only).', 'avantex' ),
				'settings'        => 'avantex-portfolio-prevnext',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
				'choices'         => array(
					'true'  => __( 'Show', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					'false' => __( 'Hide', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
				),
			)
		)
	);
	// Portfolio Slider Autoplay Control.
	$wp_customize->add_setting(
		'avantex-portfolio-autoplay',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-portfolio-autoplay-control',
			array(
				'label'           => __( 'Toggle Slider Autoplay', 'avantex' ),
				'description'     => esc_html__( 'Toggle slider autoplay on/off.', 'avantex' ),
				'settings'        => 'avantex-portfolio-autoplay',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Portfolio colors heading control.
	$wp_customize->add_setting(
		'avantex-portfolio-colors-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-portfolio-colors-notice-control',
			array(
				'label'           => __( 'Portfolio Colors ', 'avantex' ),
				'settings'        => 'avantex-portfolio-colors-notice',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-portfolio-colors-upgrade-control',
			array(
				'settings' => 'avantex-portfolio-colors-notice',
				'section'  => 'avantex-portfolio-section',
			)
		)
	);

	// Portfolio Title text Color.
	$wp_customize->add_setting(
		'avantex-portfolio-title-color',
		array(
			// 'default'           => '#0f0d1d',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-portfolio-title-color-control',
			array(
				'label'           => __( 'Portfolio Title text Color', 'avantex' ),
				'settings'        => 'avantex-portfolio-title-color',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
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
	
	// Portfolio description text Color.
	$wp_customize->add_setting(
		'avantex-portfolio-description-color',
		array(
			// 'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-portfolio-description-color-control',
			array(
				'label'           => __( 'Portfolio Subtitle text Color', 'avantex' ),
				'settings'        => 'avantex-portfolio-description-color',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
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
	// Portfolio Project tag text Color.
	$wp_customize->add_setting(
		'avantex-portfolio-tag-color',
		array(
			// 'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-portfolio-tag-color-control',
			array(
				'label'           => __( 'Project tag text Color', 'avantex' ),
				'settings'        => 'avantex-portfolio-tag-color',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
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
	// Portfolio Project title text Color.
	$wp_customize->add_setting(
		'avantex-portfolio-project-title-color',
		array(
			// 'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-portfolio-project-title-color-control',
			array(
				'label'           => __( 'Project title text Color', 'avantex' ),
				'settings'        => 'avantex-portfolio-project-title-color',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
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
	// Portfolio Project Icons Color.
	$wp_customize->add_setting(
		'avantex-portfolio-icons-color',
		array(
			// 'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-portfolio-icons-color-control',
			array(
				'label'           => __( 'Project Icons Color', 'avantex' ),
				'settings'        => 'avantex-portfolio-icons-color',
				'section'         => 'avantex-portfolio-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_portfolio_show_control_enabled( $control ) );
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
