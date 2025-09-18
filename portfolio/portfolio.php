<?php
/*
Template Name: Шаблон Portfolio
Template Post Type: post, page, portfolio
*/


get_header(); ?>

    <!-- ****** Gallery Area Start ****** -->
    <section class="uza-portfolio-area section-padding-80">

        <!-- Portfolio Menu -->
        <div class="portfolio-menu text-center mb-80">
            <button class="btn active" data-filter="*">All Portfolio</button>
            <button class="btn" data-filter=".ux-ui-design">UX/UI Design</button>
            <button class="btn" data-filter=".market-analytics">Market Analytics</button>
            <button class="btn" data-filter=".marketing-social">Marketing Social</button>
        </div>

        <div class="container-fluid">
            <div class="row uza-portfolio">
                <?php 

                $args = array(
                    'post_type' => 'portfolio'
                );
                $query = new WP_Query;
                $portfolio_posts = $query->query($args);
                
                foreach( $portfolio_posts as $my_post ){
                    $term_list = wp_get_post_terms( $my_post->ID, 'taxonomy', array('fields' => 'all') );
                    $id = get_post_thumbnail_id( $my_post->ID);
                    $post = get_post( $my_post->ID ); // specific post
                    $the_content = apply_filters( 'the_content', $post->post_content );
                    ?>
                    <!-- Single Portfolio Item -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item 
                    <?php if(!empty($term_list)) {echo $term_list[0]->slug; } ?>">
                        <div class="single-portfolio-slide">
                            <img src="<?php  echo wp_get_attachment_url( $id); ?>" alt="">
                            <!-- Overlay Effect -->
                            <div class="overlay-effect">
                                <h4><?php
                                if(!empty($term_list)) {echo $term_list[0]->name; }
                                 ?></h4>
                                <p><?php echo $the_content;?></p>
                            </div>
                            <!-- View More -->
                            <div class="view-more-btn">
                                <a href="#"><i class="arrow_right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    //echo '<p>'. $my_post->post_title .'</p>';

                }

                ?>

            </div>

            <div class="row">
                <div class="col-12 text-center mt-30">
                    <a href="#" class="btn uza-btn btn-3">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Gallery Area End ****** -->

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
                    <?php echo do_shortcode( '[contact-form-7 id="ea19526" title="Контактная форма 1"]' ); ?>
                    </div>
                </div>

            </div>
            <!-- Border Bottom -->
            <div class="border-line"></div>
        </div>
    </section>
    <!-- ***** Newsletter Area End ***** -->

<?php get_footer(); ?>
