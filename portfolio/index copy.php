<?php
get_header(); ?>

	<div id="content-wrap" class="container clr">

		<div id="primary" class="content-area clr">

			<div id="content" class="site-content clr">

				<?php
				if ( have_posts() ) : ?>
						<div id="blog-entries" class="<?php oceanwp_blog_wrap_classes(); ?>">

							<?php
							while ( have_posts() ) :
								the_post();
								?>

								<?php
								// Get post entry content.
								get_template_part( 'partials/entry/layout', get_post_type() );
								?>

							<?php endwhile; ?>

						</div><!-- #blog-entries -->
                    <?php endif; ?>
			</div><!-- #content -->

		</div><!-- #primary -->

	</div><!-- #content-wrap -->

<?php get_footer(); ?>
