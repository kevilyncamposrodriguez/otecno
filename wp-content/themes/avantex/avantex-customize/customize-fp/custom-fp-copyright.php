<?php
/**
 * Custom Copyright section
 *
 * @package avantex
 */

/** Section for "Copyright". */
	$wp_customize->add_section(
		'avantex-copyright-section',
		array(
			'title'       => 'Copyright settings',
			'priority'    => 3,
			'panel'       => 'avantex-options-panel',
			'description' => __( 'Settings to Adjust Copyrights.', 'avantex' ),
		)
	);
	/** Copyright Settings Start */

	/** Setting Copyright Information */
	$wp_customize->add_setting(
		'avantex_copyright',
		array(
			'default'           => '<p>Copyright © Avantex 2022. Created By <a href="#"><b>WP Frank</b></a></p>',
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_TinyMCE_Custom_control(
			$wp_customize,
			'avantex_copyright_control',
			array(
				'label'       => __( 'Copyright Information', 'avantex' ),
				'description' => __( 'Edit Copyright Information Both way TEXT ot HTML.', 'avantex' ),
				'section'     => 'avantex-copyright-section',
				'settings'    => 'avantex_copyright',
				'input_attrs' => array(
					'toolbar1'     => 'bold italic bullist numlist alignleft aligncenter alignright link',
					'toolbar2'     => 'formatselect outdent indent | blockquote charmap',
					'mediaButtons' => true,
				),
			)
		)
	);
	/** Selective refresh copyright */
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'avantex_copyright',
			array(
				'selector' => '.sr-copyright',
			)
		);
	}
