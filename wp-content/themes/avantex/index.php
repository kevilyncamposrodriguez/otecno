<?php
/**
 * Index Page
 *
 * @package avantex
 */

get_header();
?>
	<!--Page Title-->
	<?php get_template_part( 'template-parts/title', 'module' ); ?>
	<!--/ Page Title-->
	<!-- Blog & Sidebar Section index.php -->
	<section id="index-section" class="site-content">
		<?php $blog_container_class = get_theme_mod( 'avantex-blogs-land-size', 'container' ); ?>
		<div class="<?php echo esc_attr( $blog_container_class ); ?>" style="margin-top:;">
			<div class="row">

				<?php $sidebar_position = get_theme_mod( 'avantex-blogs-land-sidebar', 'sidebarright' ); ?>
				<?php
				if ( ! is_active_sidebar( 'avantex_blogwidget' ) ) {
					$sidebar_position = 'sidebarnone';
				}
				?>
				<!--Sidebar Left -->
				<?php if ( $sidebar_position === 'sidebarleft' ) { ?>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="sidebar space-left">
							<?php get_sidebar( 'avantex_blogwidget' ); ?>
						</div>
					</div>
				<?php } ?>
				<!--/Sidebar Left-->

				<!-- Classes for sidebar None -->
				<?php
				if ( $sidebar_position === 'sidebarnone' ) {
					$div_classes = 'col-md-12 col-sm-12 col-xs-12';
				} else {
					$div_classes = 'col-md-8 col-sm-8 col-xs-12';
				}
				?>

				<!--Blog Posts index-->
				<div class="<?php echo esc_attr( $div_classes ); ?>">
					<div class="blog">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', get_post_type() );
							endwhile;
								// post pagination.

							$posts_pagination = get_the_posts_pagination(
								array(
									'mid_size'  => 1,
									'prev_text' => '<<',
									'next_text' => '>>',
								)
							);
							echo $posts_pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped during generation.
						else :
							get_template_part( 'template-parts/content-none', get_post_type() );
						endif;
						wp_reset_postdata();
						?>

					</div>
				</div>
				<!--/Blog Posts-->

				<!--Sidebar Right-->
				<?php if ( $sidebar_position === 'sidebarright' ) { ?>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="sidebar space-left">
							<?php get_sidebar( 'avantex_blogwidget' ); ?>
						</div>
					</div>
				<?php } ?>
				<!--/Sidebar Right-->


			</div>
		</div>
	</section>
	<!-- End of Blog & Sidebar Section -->
	<?php
	get_template_part( 'template-parts/footer-menus-widgets' );
	get_footer();
