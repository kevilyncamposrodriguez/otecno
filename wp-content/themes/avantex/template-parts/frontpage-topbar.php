<?php
/**
 *
 * Topbar File.
 *
 * @package avantex
 */

?>
<!-- Topbar Start -->
<div class="header-top">
	<div class="container-fluid header-top-info ">
		<div class="row">
			<div class="topheader_bg">
				<div class="top_header_add sr-topbar">
					<ul>
						<?php
						$avantex_topbar_email = get_theme_mod( 'avantex-topbar-email', 'example@corpo.com' );
						$avantex_topbar_tel   = get_theme_mod( 'avantex-topbar-tel', '+00123456789' );
						?>
						<?php if ( ! empty( $avantex_topbar_email ) ) { ?>
						<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo esc_html( $avantex_topbar_email ); ?> </a>
						</li>
							<?php
						}
						if ( ! empty( $avantex_topbar_tel ) ) {
							?>
						<li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( $avantex_topbar_tel ); ?></li>
						<?php } ?>
					</ul>
				</div>

				<!-- Social Icon and button -->
				<div class="social_links_wrapper sr-social-icons">
					<?php if ( get_theme_mod( 'avantex-topbar-social-show', 1 ) === 1 ) { ?>
						<!-- Social Icons Start -->
						<ul class="social-icons square spin-icon text-end">
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
					<?php }; ?>
				</div>
				<!-- Button -->
				<?php
				if ( get_theme_mod( 'avantex-topbar-button-show', 1 ) === 1 ) {
					$avantex_topbar_btntxt  = get_theme_mod( 'avantex-topbar-button-text', 'Get Started' );
					$avantex_topbar_btnlink = get_theme_mod( 'avantex-topbar-btnlink' );
					?>
						<div class="header_btn header2_btn float_left">
							<a href="<?php echo esc_attr( $avantex_topbar_btnlink ); ?>"><?php echo esc_html( $avantex_topbar_btntxt ); ?></a>
						</div>
					<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- Topbar End -->
<?php

