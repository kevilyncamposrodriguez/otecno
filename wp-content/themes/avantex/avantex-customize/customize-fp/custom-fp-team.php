<?php
/**
 * Custom team Section.
 *
 * @package avantex
 */

/** Section for "team". */
	$wp_customize->add_section(
		'avantex-team-section',
		array(
			'title'       => __( 'Team settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-team-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display team and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display team */
	$wp_customize->add_setting(
		'avantex-team-show',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-team-show-control',
			array(
				'label'    => esc_html__( 'Show Team on Frontpage', 'avantex' ),
				'section'  => 'avantex-team-section',
				'settings' => 'avantex-team-show',
			)
		)
	);
	/** Selective refresh callout */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex-team-show',
			array(
				'selector' => '.sr-team',
			)
		);
	}
	/** Check team Show Enabled Active callback. */
	function avantex_if_team_show_control_enabled( $control ) {
		if ( 1 === $control->manager->get_setting( 'avantex-team-show' )->value() ) {
			return true;
		} else {
			return false;
		}
	}
	// heading control.
	$wp_customize->add_setting(
		'avantex-team-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-team-notice-control',
			array(
				'label'           => __( 'Team settings ', 'avantex' ),
				'settings'        => 'avantex-team-notice',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Team section Title  */
	$wp_customize->add_setting(
		'avantex-team-title-tag',
		array(
			'default'           => esc_html__( 'Our Team', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-team-title-tag-control',
			array(
				'label'           => __( 'Team Title Tag', 'avantex' ),
				'section'         => 'avantex-team-section',
				'settings'        => 'avantex-team-title-tag',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** Team section Subtitle  */
	$wp_customize->add_setting(
		'avantex-team-title',
		array(
			'default'           => esc_html__( 'Meet the Team', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-team-title-control',
			array(
				'label'           => __( 'Team Title', 'avantex' ),
				'section'         => 'avantex-team-section',
				'settings'        => 'avantex-team-title',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
			)
		)
	);

	/** Settings for Images / Title / Description */
	// Carousel Images / Title / Description Fetch by Repeater.

	$wp_customize->add_setting(
		'avantex-team-repeater',
		array(
			'sanitize_callback' => 'customizer_repeater_sanitize',
			'default'           => TEAM_DEFAULTS,
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Repeater(
			$wp_customize,
			'avantex-team-repeater-control',
			array(
				'label'                                 => esc_html__( 'Manage Team', 'avantex' ),
				'settings'                              => 'avantex-team-repeater',
				'section'                               => 'avantex-team-section',
				'add_field_label'                       => esc_html__( 'Add Team Member', 'avantex' ),
				'item_name'                             => esc_html__( 'Team Member', 'avantex' ),
				'priority'                              => 10,
				'customizer_repeater_image_control'     => true,
				'customizer_repeater_icon_control'      => false,
				'customizer_repeater_title_control'     => true,
				'customizer_repeater_btntitle_control'  => false,
				'customizer_repeater_subtitle_control'  => true,
				'customizer_repeater_text_control'      => false,
				'customizer_repeater_text2_control'     => false,
				'customizer_repeater_link_control'      => false,
				'customizer_repeater_link2_control'     => false,
				'customizer_repeater_shortcode_control' => false,
				'customizer_repeater_repeater_control'  => true,
				'customizer_repeater_color_control'     => false,
				'customizer_repeater_color2_control'    => false,
				'active_callback'                       => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-team-upgrade-control',
			array(
				'settings' => 'avantex-team-repeater',
				'section'  => 'avantex-team-section',
			)
		)
	);
	// Container Size.
	$wp_customize->add_setting(
		'avantex-team-size',
		array(
			'default'           => 'container-fluid',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Text_Radio_Button_Custom_Control(
			$wp_customize,
			'avantex-team-size-control',
			array(
				'label'           => __( 'Team Section size', 'avantex' ),
				'description'     => esc_html__( 'Choose container size of Team section.', 'avantex' ),
				'section'         => 'avantex-team-section',
				'settings'        => 'avantex-team-size',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
				'choices'         => array(
					'container'       => __( 'Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					'container-full'  => __( 'Full Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					'container-fluid' => __( 'fluid', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
				),
			)
		)
	);
	// Team Slider Controls heading control.
	$wp_customize->add_setting(
		'avantex-team-controls-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-team-controls-notice-control',
			array(
				'label'           => __( 'Team Slider Controls ', 'avantex' ),
				'settings'        => 'avantex-team-controls-notice',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Slider Prev/Next button Control.
	$wp_customize->add_setting(
		'avantex-team-prevnext',
		array(
			'default'           => 'true',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Text_Radio_Button_Custom_Control(
			$wp_customize,
			'avantex-team-prevnext-control',
			array(
				'label'           => __( 'Prev/Next Controls', 'avantex' ),
				'description'     => esc_html__( 'Toggle Show/Hide sliders prev/next controls.(Note: On-hover only).', 'avantex' ),
				'settings'        => 'avantex-team-prevnext',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
				'choices'         => array(
					'true'  => __( 'Show', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					'false' => __( 'Hide', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
				),
			)
		)
	);
	// Team Slider Autoplay Control.
	$wp_customize->add_setting(
		'avantex-team-autoplay',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-team-autoplay-control',
			array(
				'label'           => __( 'Toggle Slider Autoplay', 'avantex' ),
				'description'     => esc_html__( 'Toggle slider autoplay on/off.', 'avantex' ),
				'settings'        => 'avantex-team-autoplay',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Team Colors Controls heading control.
	$wp_customize->add_setting(
		'avantex-team-colors-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-team-colors-notice-control',
			array(
				'label'           => __( 'Team Colors ', 'avantex' ),
				'settings'        => 'avantex-team-colors-notice',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
				},
			)
		)
	);
	// Custom Upgrade Control.
	$wp_customize->add_control(
		new Avantex_Custom_Upgrade_Control(
			$wp_customize,
			'avantex-team-colors-upgrade-control',
			array(
				'settings' => 'avantex-team-colors-notice',
				'section'  => 'avantex-team-section',
			)
		)
	);
	// Team Title text Color.
	$wp_customize->add_setting(
		'avantex-team-title-color',
		array(
			// 'default'           => '#0f0d1d',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-team-title-color-control',
			array(
				'label'           => __( 'Team Title text Color', 'avantex' ),
				'settings'        => 'avantex-team-title-color',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
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
	// Team description text Color.
	$wp_customize->add_setting(
		'avantex-team-description-color',
		array(
			// 'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-team-description-color-control',
			array(
				'label'           => __( 'Team Title-tag text Color', 'avantex' ),
				'settings'        => 'avantex-team-description-color',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
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
	// Team Members Position text Color.
	$wp_customize->add_setting(
		'avantex-team-position-color',
		array(
			// 'default'           => '#726f84',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex_team_position_color_control',
			array(
				'label'           => __( 'Members Position text Color', 'avantex' ),
				'settings'        => 'avantex-team-position-color',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
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
	// Team Member title text Color.
	$wp_customize->add_setting(
		'avantex-team-member-title-color',
		array(
			// 'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-team-member-title-color-control',
			array(
				'label'           => __( 'Members Name text Color', 'avantex' ),
				'settings'        => 'avantex-team-member-title-color',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
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
	// Team Project Icons Color.
	$wp_customize->add_setting(
		'avantex-team-icons-color',
		array(
			// 'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-team-icons-color-control',
			array(
				'label'           => __( 'Social Icons Color', 'avantex' ),
				'settings'        => 'avantex-team-icons-color',
				'section'         => 'avantex-team-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_team_show_control_enabled( $control ) );
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
