<?php
/** Customization Home
 *
 * @package avantex
 */

/**
 * Customizer class for Custom theme settings
 */
class Avantex_Customize {
	/**
	 * Constructor to Action hook to register with customizer.
	 * */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_customize_sections' ) );
	}
	/** Function to add Customized sections.
	 *
	 * @param string $wp_customize parameter to bound custom hooks to wp theme customizer.
	 */
	public function register_customize_sections( $wp_customize ) {
		/**
		* Add settings to sections.
		*/
		$this->avantex_theme_customization( $wp_customize );
	}

	/**
	 * Sanitize Inputs Options
	 *
	 * @param string $input passed output to be sanitized.
	 */
	public function sanitize_custom_option( $input ) {
		return ( 'No' === $input ) ? 'No' : 'Yes';
	}

	/**
	 * Sanitize Inputs Options
	 *
	 * @param string $input passed output to be sanitized.
	 */
	public function sanitize_custom_text( $input ) {
		return filter_var( $input, FILTER_SANITIZE_STRING );
	}

	/**
	 * Sanitize Inputs Options
	 *
	 * @param string $input passed output to be sanitized.
	 */
	public function sanitize_custom_url( $input ) {
		return filter_var( $input, FILTER_SANITIZE_URL );
	}

	/**
	 * Sanitize Inputs Options
	 *
	 * @param string $input passed output to be sanitized.
	 */
	public function sanitize_custom_email( $input ) {
		return filter_var( $input, FILTER_SANITIZE_EMAIL );
	}

	/**
	 * Sanitize Inputs Options
	 *
	 * @param string $color passed output to be sanitized.
	 */
	public function sanitize_custom_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
		}

		// 3 or 6 hex digits, or the empty string.
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
		}
	}

	/** Customization Start
	 *
	 * @param string $wp_customize parameter to bound custom hooks to wp theme customizer.
	 */
	private function avantex_theme_customization( $wp_customize ) {

		/**
			 * Selective Refresh Site Title & Description.
			 * */
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'avantex_customize_partial_blogname',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'avantex_customize_partial_blogdescription',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'custom_logo',
			array(
				'selector'            => '.header-titles [class*=site-]:not(.site-description)',
				'render_callback'     => 'avantex_customize_partial_site_logo',
				'container_inclusive' => true,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'retina_logo',
			array(
				'selector'        => '.header-titles [class*=site-]:not(.site-description)',
				'render_callback' => 'avantex_customize_partial_site_logo',
			)
		);
			/**
			 * PARTIAL REFRESH FUNCTIONS
			 * */
		if ( ! function_exists( 'avantex_customize_partial_blogname' ) ) {
			/**
			 * Render the site title for the selective refresh partial.
			 *
			 * @since Twenty Twenty 1.0
			 */
			function avantex_customize_partial_blogname() {
				bloginfo( 'name' );
			}
		}

		if ( ! function_exists( 'avantex_customize_partial_blogdescription' ) ) {
			/**
			 * Render the site description for the selective refresh partial.
			 *
			 * @since Twenty Twenty 1.0
			 */
			function avantex_customize_partial_blogdescription() {
				bloginfo( 'description' );
			}
		}

		if ( ! function_exists( 'avantex_customize_partial_site_logo' ) ) {
			/**
			 * Render the site logo for the selective refresh partial.
			 *
			 * Doing it this way so we don't have issues with `render_callback`'s arguments.
			 *
			 * @since Twenty Twenty 1.0
			 */
			function avantex_customize_partial_site_logo() {
				avantex_site_logo();
			}
		}

		require_once ABSPATH . 'wp-admin/includes/plugin.php';
		if ( is_plugin_active( 'avantex-companion/avantex-companion.php' ) ) {
			/** Panel for "Frontpage Sections". */
			$wp_customize->add_panel(
				'avantex-fpsections-panel',
				array(
					'title'       => 'Avantex Frontpage Sections',
					'priority'    => 2,
					'description' => __( 'You can Reorder theme Sections by drag and drop', 'avantex' ),
				)
			);

			// Sections for Frontpage panel sections.
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-slider.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-about.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-service.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-portfolio.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-callout.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-team.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-testimonial.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-funfact.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-news.php';
			require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-sponsors.php';
			// Title - in Theme Options Panel.
			require get_template_directory() . '/avantex-customize/custom-title.php';

		}

		/** Panel for "Theme Options". */
		$wp_customize->add_panel(
			'avantex-options-panel',
			array(
				'title'       => 'Avantex Theme Options',
				'priority'    => 3,
				'description' => __( 'Leave Blank if you dont want to display any setting.', 'avantex' ),
			)
		);

		// Sections for Theme options Panel .
		require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-topbar.php';
		require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-menubar.php';
		require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-copyright.php';
		require get_template_directory() . '/avantex-customize/customize-blog/custom-blog.php';
		require get_template_directory() . '/avantex-customize/customize-blog/custom-blog-single.php';
		require get_template_directory() . '/avantex-customize/customize-fp/custom-fp-general.php';
		// Repeater Labels modification call.
		require get_template_directory() . '/avantex-customize/customize-fp/repeater_labels.php';
		// Panel Color and Styling.
		require get_template_directory() . '/avantex-customize/custom-styling-colors/custom-color-styling.php';

		/**
		 * End Customization
		 */
	}
}
