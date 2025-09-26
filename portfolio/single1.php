<?php
get_header(); ?>
	<div id="content-wrapper" class="wrapper">
		<div class="section-gap clear">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();
					the_content();
					//get_template_part( 'template-parts/content', 'single' );

				//	the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->


		</div><!-- .section-gap -->
	</div><!-- #content-wrapper -->

<?php
get_footer();
