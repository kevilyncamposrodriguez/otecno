<?php
/**
 * Custom news Section.
 *
 * @package avantex
 */

/** Section for "news". */
	$wp_customize->add_section(
		'avantex-news-section',
		array(
			'title'       => __( 'News/Updates settings', 'avantex' ),
			'priority'    => apply_filters( 'avantex_section_priority', 10, 'avantex-news-section' ), // First parameter, 10, is the section default priority, second parameter, 'hestia_features', is secton id
			'panel'       => 'avantex-fpsections-panel',
			'description' => __( 'Settings to Display news and its Additional features.', 'avantex' ),
		)
	);

	/** Setting to display news */
	$wp_customize->add_setting(
		'avantex-news-show',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'avantex-news-show-control',
			array(
				'label'    => esc_html__( 'Show News on Frontpage', 'avantex' ),
				'section'  => 'avantex-news-section',
				'settings' => 'avantex-news-show',
			)
		)
	);
	/** Selective refresh Services */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex-news-show',
			array(
				'selector' => '.sr-news',
			)
		);
	}
	/** Check news Show Enabled Active callback. */
	function avantex_if_news_show_control_enabled( $control ) {
		if ( 1 === $control->manager->get_setting( 'avantex-news-show' )->value() ) {
			return true;
		} else {
			return false;
		}
	}
	// heading control.
	$wp_customize->add_setting(
		'avantex-news-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-news-notice-control',
			array(
				'label'           => __( 'News/Updates settings ', 'avantex' ),
				'settings'        => 'avantex-news-notice',
				'section'         => 'avantex-news-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_news_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** News section Title  */
	$wp_customize->add_setting(
		'avantex-news-title-tag',
		array(
			'default'           => esc_html__( 'News and Updates', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-news-title-tag-control',
			array(
				'label'           => __( 'News/Updates Title Tag', 'avantex' ),
				'section'         => 'avantex-news-section',
				'settings'        => 'avantex-news-title-tag',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_news_show_control_enabled( $control ) );
				},
			)
		)
	);
	/** News section Subtitle  */
	$wp_customize->add_setting(
		'avantex-news-title',
		array(
			'default'           => esc_html__( 'RECENT BLOG', 'avantex' ),
			'sanitize_callback' => array( $this, 'sanitize_custom_text' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'avantex-news-title-control',
			array(
				'label'           => __( 'News/Updates Title', 'avantex' ),
				'section'         => 'avantex-news-section',
				'settings'        => 'avantex-news-title',
				'type'            => 'text',
				'active_callback' => function( $control ) {
					return ( avantex_if_news_show_control_enabled( $control ) );
				},
			)
		)
	);
	// News Colors Controls heading control.
	$wp_customize->add_setting(
		'avantex-news-colors-notice',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_text_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Simple_Notice_Custom_control(
			$wp_customize,
			'avantex-news-colors-notice-control',
			array(
				'label'           => __( 'News Colors ', 'avantex' ),
				'settings'        => 'avantex-news-colors-notice',
				'section'         => 'avantex-news-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_news_show_control_enabled( $control ) );
				},
			)
		)
	);

	// News Title text Color.
	$wp_customize->add_setting(
		'avantex-news-title-color',
		array(
			// 'default'           => '#fffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-news-title-color-control',
			array(
				'label'           => __( 'News Title Color', 'avantex' ),
				'settings'        => 'avantex-news-title-color',
				'section'         => 'avantex-news-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_news_show_control_enabled( $control ) );
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
	// News description text Color.
	$wp_customize->add_setting(
		'avantex-news-description-color',
		array(
			// 'default'           => '#fffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control(
		new Avantex_Customizer_Alpha_Color_Control(
			$wp_customize,
			'avantex-news-description-color-control',
			array(
				'label'           => __( 'News tag Color', 'avantex' ),
				'settings'        => 'avantex-news-description-color',
				'section'         => 'avantex-news-section',
				'active_callback' => function( $control ) {
					return ( avantex_if_news_show_control_enabled( $control ) );
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
