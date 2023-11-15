<?php
/**
 * Custom Blogs Landing Page section
 *
 * @package avantex
 */

/** Section for "Blogs Landing Page". */
	$wp_customize->add_section(
		'avantex-blogs-land-section',
		array(
			'title'       => 'Page settings',
			'priority'    => 3,
			'panel'       => 'avantex-options-panel',
			'description' => __( 'Settings for Blogs Landing Page.', 'avantex' ),
		)
	);
	/** Blogs Landing Page Settings Start */

	// Container Size.
		$wp_customize->add_setting(
			'avantex-blogs-land-size',
			array(
				'default'           => 'container',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex-blogs-land-size-control',
				array(
					'label'       => __( 'Landing Page/Blogs size', 'avantex' ),
					'description' => esc_html__( 'Choose container size of all blogs landing page.', 'avantex' ),
					'section'     => 'avantex-blogs-land-section',
					'settings'    => 'avantex-blogs-land-size',
					'choices'     => array(
						'container'           => __( 'Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'container-full'      => __( 'Full Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'container-fluid' => __( 'fluid', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					),
				)
			)
		);
		// Sidebar Position.
		$wp_customize->add_setting(
			'avantex-blogs-land-sidebar',
			array(
				'default'           => 'sidebarright',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex-blogs-land-sidebar-control',
				array(
					'label'       => __( 'Page Sidebar Position', 'avantex' ),
					'description' => esc_html__( 'Select sidebar visibility or position left or right.', 'avantex' ),
					'section'     => 'avantex-blogs-land-section',
					'settings'    => 'avantex-blogs-land-sidebar',
					'choices'     => array(
						'sidebarleft'  => array(  // Required.
							'image' => trailingslashit( get_template_directory_uri() ) . 'customizer-custom-controls-master/images/sidebar-left-2.png', // Required.
							'name'  => __( 'Left Sidebar', 'avantex' ), // Required.
						),
						'sidebarnone'  => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'customizer-custom-controls-master/images/sidebar-none-2.png',
							'name'  => __( 'No Sidebar', 'avantex' ),
						),
						'sidebarright' => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'customizer-custom-controls-master/images/sidebar-right-2.png',
							'name'  => __( 'Right Sidebar', 'avantex' ),
						),
					),
				)
			)
		);
