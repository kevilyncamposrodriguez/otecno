<?php
/**
 *
 * Footer File.
 *
 * @package Aveantex
 */

?>
		<!-- Footer Section -->
		<footer id="footer" class="footer theme-dark">
			<div class="footer-shape"></div>
			<!-- Footer Widgets -->
			<div class="container site-footer">
				<div class="row">
					<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
						<?php get_sidebar( 'avantex_fwidget_1' ); ?>
					</div>

					<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
						<?php get_sidebar( 'avantex_fwidget_2' ); ?>
					</div>

					<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
					<?php get_sidebar( 'avantex_fwidget_3' ); ?>
					</div>

				</div>
			</div>
			<!-- /Footer Widgets -->
			<?php get_template_part( 'theme-menu/inc/footer-menus-widgets' ); ?>


			<!-- Footer Copyrights -->
			<div class="footer-copyrights">
				<div class="container">
					<div class="row">

						<div class="col-xl-12 col-lg-12 col-md-12 ">

							<ul class="social-icons text-center sr-social-icons">
								<?php
								$avantex_topbar_social_callout = get_theme_mod( 'avantex-topbar-social-repeater', TOPBAR_DEFAULTS );
									/*This returns a json so we have to decode it*/
								$avantex_topbar_social_decoded = json_decode( $avantex_topbar_social_callout );
								foreach ( $avantex_topbar_social_decoded as $avantex_topbar_member ) {
									if ( ! empty( $avantex_topbar_member->social_repeater ) ) {
										$avantex_topbar_social_repeater = json_decode( html_entity_decode( $avantex_topbar_member->social_repeater ) );
										foreach ( $avantex_topbar_social_repeater as $avantex_iconsdata ) {
											$avantex_icons_link = $avantex_iconsdata->link;
											$avantex_icons_data = $avantex_iconsdata->icon;
											?>
											<li> 
												<a href="<?php echo esc_url( $avantex_icons_link ); ?>" target="_blank" class="<?php echo esc_html( $avantex_icons_data ); ?>"></a>
											</li>
											<?php
										}
									}
								}
								?>
							</ul>
							<div class="site-info sr-copyright text-center">
								<?php echo wp_kses_post( get_theme_mod( 'avantex_copyright', 'Copyright © Avantex 2023. Created By <a href="#"><b>WP Frank</b></a>' ) ); ?>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- /Footer Copyrights -->

		</footer>
		<!-- End of Footer Section -->

	</div> <!-- Theme Container Wrapper End -->
	<?php if ( get_theme_mod( 'avantex-scrolltop-show' ) === 1 ) { ?>
		<!-- Scroll To Top -->
			<a href="#" class="page-scroll-up" style="display: inline;"><i class="fa fa-chevron-up"></i></a>
		<!-- /Scroll To Top -->
	<?php } ?>

<?php wp_footer(); ?> 
</body>
</html>
