<?php
global $template_name;
$template_name = 'Portfolio';
$pred_post = get_previous_post();
$next_post = get_next_post();
 
get_header(); ?>

	<!-- ***** Portfolio Single Area Start ***** -->
    <section class="uza-portfolio-single-area section-padding-80">
        <div class="container">

			<?php
			global $post;
			while ( have_posts() ) : the_post();
			$term_list = wp_get_post_terms( $post->ID, 'taxonomy', array('fields' => 'all') );

			endwhile;
			?> 
            <div class="row justify-content-between align-items-end">
                <div class="col-12 col-md-6">
                    <div class="portfolio-details-text">
                        <h2><?php the_title(); ?></h2>
                        <h6><?php foreach ($term_list as $key => $term) {
							echo $term->name . ' ';
						} ?>
						</h6>
                        <p><?php the_content(); ?></p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="portfolio-meta">
                        <h6>Client: Clarence Ryan</h6>
                        <h6>Date: 07 DEC 2018</h6>
                        <h6>Location: United States</h6>
                        <h6>Author: Phillip Simon</h6>
                    </div>
                    <div class="portfolio-social-info d-flex align-items-center">
                        <p>Share:</p>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-feed" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="portfolio-thumbnail mt-80">
                        <img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="portfolio-pager mt-80 d-flex align-items-center justify-content-between">
						
                        <a href="<?php echo get_permalink( $pred_post ) ?>"><i class="arrow_left"></i> Previous Post</a>
                        <a href="<?php echo home_url(); ?>">Back to home</a>
                        <a href="<?php echo get_permalink( $next_post ) ?>">Next Post <i class="arrow_right"></i></a>
                    </div>
                </div>
            </div>	
        </div>
    </section>
    <!-- ***** Portfolio Single Area End ***** -->


<?php
get_footer();









