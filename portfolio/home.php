<?php
global $template_name;
$template_name = 'Blog';
get_header(); ?>


    <!-- ***** Blog Area Start ***** -->
    <div class="uza-blog-area section-padding-80">
        <div class="container">
            <div class="row row-content">
                <?php while ( have_posts() ) : the_post();
                $content = get_the_content();
                $content = apply_filters( 'the_content', $content );
                $sub_content = mb_substr($content, 0 , 30);
                ?>
                    <!-- Single Blog Post -->
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-post bg-img mb-80" style="background-image: url(<?php the_post_thumbnail_url( 'thumbnail' ); ?>);">
                            <!-- Post Content -->
                            <div class="post-content">
                                <span class="post-date"><span><?php echo get_the_date('N'); ?></span> <?php echo get_the_date('F, Y'); ?></span>
                                <a href="#" class="post-title"><?php the_title(); ?></a>
                                <p><?php echo $sub_content; ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More <i class="arrow_carrot-2right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn more-post uza-btn btn-3">Load More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->

<?php get_footer(); ?>
