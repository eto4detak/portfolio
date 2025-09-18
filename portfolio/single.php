<?php
get_header(); ?>

	<div id="content-wrap" class="container clr">

		<div id="primary" class="content-area clr">

			<div id="content" class="site-content clr">

				<?php
				if ( have_posts() ) : ?>
						<div id="blog-entries">

							<?php
							while ( have_posts() ) :
								the_post();

                                the_content();
                                 comments_template();
                               // comments_template( '/comments.php' );
								?>


							<?php endwhile; ?>

						</div><!-- #blog-entries -->
                    <?php endif; ?>
			</div><!-- #content -->

		</div><!-- #primary -->

	</div><!-- #content-wrap -->

<?php get_footer(); ?>
