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


<?php get_footer(); ?>
