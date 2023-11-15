<?php
/** Fetch styling colors.
 *
 * @package avantex
 */

function avantex_get_styling_css() {
	ob_start();
	$avantex_primary_color = get_theme_mod( 'avantex-styling-primary-color' );
	if ( ! empty( $avantex_primary_color ) ) {
		?>
	:root,::after,::before {
		--thm-primary: <?php echo esc_html( $avantex_primary_color ); ?>;
	}
		<?php
	}
	$avantex_dark_color = get_theme_mod( 'avantex-styling-dark-color' );
	if ( ! empty( $avantex_dark_color ) ) {
		?>
	:root,::after,::before {
		--thm-black: <?php echo esc_html( $avantex_dark_color ); ?>;
	}
		<?php
	}
	$avantex_links_color = get_theme_mod( 'avantex-styling-links-color' );
	if ( ! empty( $avantex_links_color ) ) {
		?>
	:root,::after,::before {
		--thm-gray: <?php echo esc_html( $avantex_links_color ); ?>;
	}
		<?php
	}
	$avantex_text_color = get_theme_mod( 'avantex-styling-text-color' );
	if ( ! empty( $avantex_text_color ) ) {
		?>
	:root,::after,::before {
		--thm-text: <?php echo esc_html( $avantex_text_color ); ?>;
	}
		<?php
	}
	$avantex_base_color = get_theme_mod( 'avantex-styling-base-color' );
	if ( ! empty( $avantex_base_color ) ) {
		?>
	:root,::after,::before {
		--thm-base: <?php echo esc_html( $avantex_base_color ); ?>;
	}
		<?php
	}
	$avantex_light_color = get_theme_mod( 'avantex-styling-light-color' );
	if ( ! empty( $avantex_light_color ) ) {
		?>
	:root,::after,::before {
		--thm-light: <?php echo esc_html( $avantex_light_color ); ?>;
	}
		<?php
	}
	$avantex_title_overlay = get_theme_mod( 'avantex_title_overlay' );
	if ( ! empty( $avantex_title_overlay ) ) {
		?>
	.page-title-module:before {
		background-color: <?php echo esc_html( $avantex_title_overlay ); ?>;
	}
		<?php
	}
	$avantex_color_style_css = ob_get_clean();
	return $avantex_color_style_css;
}
