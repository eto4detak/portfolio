<?php
get_header(); ?>
    <!-- ***** Blog Details Area Start ***** -->
    <section class="blog-details-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-details-content">
                        <!-- Post Details Text -->
                        <div class="post-details-text">

                            <div class="row justify-content-center">

								<?php
								while ( have_posts() ) : the_post();

									?> 
									<div class="col-12 col-lg-10">
										<div class="post-content text-center mb-50">
											<a href="#" class="post-date"><span><?php echo get_the_date('N'); ?></span> <?php echo get_the_date('F, Y'); ?></a>
											<h2><?php the_title(); ?></h2>
										</div>
									</div>
									<div class="col-12">
										<img class="mb-50" src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="">
									</div>
									<div class="col-12 col-lg-10">
										<?php the_content(); ?>
										<?php 
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
										?>
									</div>
									
									
									<?php
									
									//get_template_part( 'template-parts/content', 'single' );

								//	the_post_navigation();

									// If comments are open or we have at least one comment, load up the comment template.



								endwhile; // End of the loop.
								?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Details Area End ***** -->

	    <!-- ***** Newsletter Area Start ***** -->
    <section class="uza-newsletter-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Newsletter Content -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="nl-content mb-80">
                        <h2>Subscribe to our Newsletter</h2>
                        <p>Subscribe our newsletter gor get notification about new updates, etc...</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5">
                    <div class="nl-form mb-80">
                    <?php echo do_shortcode( '[contact-form-7 id="8a2cfe9" title="form for footer"]' ); ?>
                    </div>
                </div>

            </div>
            <!-- Border Bottom -->
            <div class="border-line"></div>
        </div>
    </section>
    <!-- ***** Newsletter Area End ***** -->
<?php
get_footer();









