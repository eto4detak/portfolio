<?php
/*
Template Name: Шаблон Blog
Template Post Type: post, page, portfolio
*/

global $template_name;
$template_name = 'Blog';
get_header(); ?>


    <!-- ***** Blog Area Start ***** -->
    <div class="uza-blog-area section-padding-80">
        <div class="container">
            <div class="row">

            						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();
                    ?>
                                <!-- Single Blog Post -->
                                <div class="col-12 col-lg-4">
                                    <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/bg-img/8.jpg);">
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <span class="post-date"><span>23</span> August, 2018</span>
                                            <a href="#" class="post-title"><?php the_title(); ?></a>
                                            <p><?php the_content(); ?></p>
                                            <a href="#" class="read-more-btn">Read More <i class="arrow_carrot-2right"></i></a>
                                        </div>
                                    </div>
                                </div>
                    <?php
							endwhile;
						else :

							

						endif; ?>

            </div>
            
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn uza-btn btn-3">Load More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->


<?php get_footer(); ?>
