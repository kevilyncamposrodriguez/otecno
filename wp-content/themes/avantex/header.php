<?php
/**
 *
 * Header File
 *
 * @package Avantex
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'home woocommerce' ); ?> >

<?php if ( get_theme_mod( 'avantex-loader-show' ) === 1 ) { ?>
	<!-- Page Loader/Loading animation -->
	<div id="avantex-loading">
		<div class="avantex-loader">
			<div class="avantex-loading-square"></div>
			<div class="avantex-loading-square"></div>
			<div class="avantex-loading-square"></div>
			<div class="avantex-loading-square"></div>
		</div>
	</div>
<?php } ?>
<?php wp_body_open(); ?>

<header id="site-header" class="header header-footer-group" role="banner">
	<?php $avantex_menu_size_class = get_theme_mod( 'avantex-menu-size', 'container' ); ?>
	<div class="<?php echo esc_attr( $avantex_menu_size_class ); ?>">
		<?php if ( get_theme_mod( 'avantex-topbar-show', 1 ) === 1 ) { ?>
			<!-- Topbar -->
			<?php get_template_part( 'template-parts/frontpage', 'topbar' ); ?>
		<?php } ?>

		<!-- Nav Menu -->
		<?php get_template_part( 'twenty', 'menu' ); ?>
	</div>
</header>
	<!-- Output the menu modal. -->
	<?php get_template_part( 'theme-menu/modal-menu' ); ?>
	<!-- Clear Fix for divs -->
	<div class="clearfix"></div>

	<?php
	// For section padding adjustments.
	if ( is_home() && is_front_page() ) {
		if ( current_user_can( 'manage_options' ) ) {
			$wrapper_padding = 'padding-top: 13rem;';
		} else {
			$wrapper_padding = 'padding-top: 11.5rem;';
		}
	} else {
		$wrapper_padding = '';
	}
	?>
<!-- Theme Container Wrapper  -->
<div class="theme-wrapper" style="<?php echo esc_attr( $wrapper_padding ); ?>">
<?php

