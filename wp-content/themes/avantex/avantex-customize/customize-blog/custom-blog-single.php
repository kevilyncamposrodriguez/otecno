<?php
/**
 * Custom Blogs single Page section
 *
 * @package avantex
 */

/** Section for "Blogs single Page". */
	$wp_customize->add_section(
		'avantex-blog-single-section',
		array(
			'title'       => 'Single Blog settings',
			'priority'    => 3,
			'panel'       => 'avantex-options-panel',
			'description' => __( 'Settings for Blogs single Page.', 'avantex' ),
		)
	);
	/** Blogs single Page Settings Start */

	// Container Size.
		$wp_customize->add_setting(
			'avantex-blog-single-size',
			array(
				'default'           => 'container',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex-blog-single-size-control',
				array(
					'label'       => __( 'Single Blog size', 'avantex' ),
					'description' => esc_html__( 'Choose container size of Single Blog page.', 'avantex' ),
					'section'     => 'avantex-blog-single-section',
					'settings'    => 'avantex-blog-single-size',
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
			'avantex-blog-single-sidebar',
			array(
				'default'           => 'sidebarright',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex-blog-single-sidebar-control',
				array(
					'label'       => __( 'Single Blog Sidebar Position', 'avantex' ),
					'description' => esc_html__( 'Select sidebar visibility or position left or right.', 'avantex' ),
					'section'     => 'avantex-blog-single-section',
					'settings'    => 'avantex-blog-single-sidebar',
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
