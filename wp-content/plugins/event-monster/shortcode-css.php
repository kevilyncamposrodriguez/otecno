<style>
/* logo */
.em_display_banner_<?php echo esc_html( $em_id ); ?> {
	border:<?php echo esc_attr( $em_logo_border ); ?>px solid <?php echo esc_attr( $em_logo_border_color ); ?>;
	<?php if ( $logo_size == 'fixed' ) { ?>
		<?php if ( $em_logo_size == 'small' ) { ?>
		width:25%;
		height:25%;
		<?php } ?>
		<?php if ( $em_logo_size == 'medium' ) { ?>
		width:50%;
		height:50%;
		<?php } ?>
		<?php if ( $em_logo_size == 'large' ) { ?>
		width:75%;
		height:75%;
		<?php } ?>
		<?php if ( $em_logo_size == 'xlarge' ) { ?>
		width:100%;
		height:100%;
		<?php } ?>
	<?php } ?>
	<?php if ( $logo_size == 'custom' ) { ?>
		width:<?php echo esc_attr( $em_logo_coustom_width ); ?>px;
		height:<?php echo esc_attr( $em_logo_coustom_height ); ?>px !important;
	<?php } ?>
}

/* title */
.em_display_title_<?php echo esc_html( $em_id ); ?>  {
	font-size:<?php echo esc_attr( $em_title_size ); ?>px;
	color:<?php echo esc_attr( $em_title_color ); ?>;
}
.em_title_align {
	text-align: <?php echo esc_attr( $em_title_align ); ?>
}
/* venue */
.em_display_venue_<?php echo esc_html( $em_id ); ?>  {

}
/* map */
.em_display_map__<?php echo esc_html( $em_id ); ?>  {
	opacity:<?php echo esc_attr( $em_map_opacity ); ?>;
}

/* event books */
.em_reg_btn_size {
	<?php if ( $em_buttons_type == 'basic' || $em_buttons_type == 'large' || $em_buttons_type == 'small' || $em_buttons_type == 'extra_small' ) { ?>
		background: <?php echo esc_attr( $em_reg_btn_color ); ?> !important;
		border: 1px solid <?php echo esc_attr( $em_reg_btn_color ); ?> !important;
	<?php } ?>
}
.em_reg_btn_size:hover {
	background: <?php echo esc_attr( $em_reg_btn_color ); ?> !important;
	color:#FFFFFF !important;
	<?php if ( $em_buttons_type == '3d_basic' || $em_buttons_type == '3d_large' || $em_buttons_type == '3d_small' || $em_buttons_type == '3d_extra_small' ) { ?>
	box-shadow: 0 4px 0 #010101 !important;
	<?php } ?>
}
.em_reg_btn_align {
	text-align: <?php echo esc_attr( $em_reg_btn_align ); ?>
}
/* book button */
.em_pop div {
	max-width: 100% !important;
}
/* --- main title font size --- */
.em_main_font_size {
	font-size: <?php echo esc_attr( $em_main_font_size ); ?>px !important;
}
/* --- subtitle font size --- */
.em_sub_font_size {
	font-size: <?php echo esc_attr( $em_sub_font_size ); ?>px !important;
}
/* --- normal font size ( P ) --- */
.em_nrml_font_size {
	font-size: <?php echo esc_attr( $em_nrml_font_size ); ?>px !important;
}
/* --- Event Monseter total color--- */

/* button type for paypal payment button - PayPal- api */
.em_button_type {
}
/* popup color */
.popover-content {
	color: #000000;
}
<?php echo $em_custom_css; ?>
</style>
