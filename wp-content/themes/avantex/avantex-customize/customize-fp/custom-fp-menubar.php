<?php
/**
 * Custom Menu Bar section
 *
 * @package avantex
 */

/** Section for "Menu Bar". */
	$wp_customize->add_section(
		'avantex-menubar-section',
		array(
			'title'       => __( 'Menu Bar settings', 'avantex' ),
			'priority'    => 2,
			'panel'       => 'avantex-options-panel',
			'description' => __( 'Settings to Display Menubar Additional features.', 'avantex' ),
		)
	);

	/** Menu Bar Settings Start */
		// Container Size.
		$wp_customize->add_setting(
			'avantex-menu-size',
			array(
				'default'           => 'container',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex-menu-size-control',
				array(
					'label'       => __( 'Menu size', 'avantex' ),
					'description' => esc_html__( 'Choose size of menu.', 'avantex' ),
					'section'     => 'avantex-menubar-section',
					'settings'    => 'avantex-menu-size',
					'choices'     => array(
						'container'           => __( 'Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'container-full'      => __( 'Full Container', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'container-fluid p-0' => __( 'fluid', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					),
				)
			)
		);
		/** Selective refresh menubar */
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'avantex-menu-size',
				array(
					'selector' => '.sr-menubar',
				)
			);
		}
		// Sticky.
		$wp_customize->add_setting(
			'avantex-menu-sticky',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Text_Radio_Button_Custom_Control(
				$wp_customize,
				'avantex-menu-sticky-control',
				array(
					'label'       => __( 'Menu Sticky', 'avantex' ),
					'description' => __( 'Choose sticky setting of menu.', 'avantex' ),
					'section'     => 'avantex-menubar-section',
					'settings'    => 'avantex-menu-sticky',
					'choices'     => array(
						''                     => __( 'Default', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
						'avantex-header-inner' => __( 'Sticky', 'avantex' ), // Required. Setting for this particular radio button choice and the text to display.
					),
				)
			)
		);

		/** Setting to Enable/Disable Search Icon */
		$wp_customize->add_setting(
			'avantex-searchicon-show',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'avantex-searchicon-show-control',
				array(
					'label'    => ( 'Search Icon Show' ),
					'section'  => 'avantex-menubar-section',
					'settings' => 'avantex-searchicon-show',
				)
			)
		);
