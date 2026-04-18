<?php
/*
Template Name: Шаблон Portfolio
Template Post Type: post, page, portfolio
*/


get_header(); ?>

    <!-- ****** Gallery Area Start ****** -->
    <section class="uza-portfolio-area section-padding-80">

        <!-- Portfolio Menu -->
         <?php 
         $terms = get_terms( [
                'taxonomy' => 'taxonomy',
                'hide_empty' => false,
            ] );
         ?>
        <div class="portfolio-menu text-center mb-80">
            <button class="btn active" data-filter="*">All Portfolio</button>
            <?php foreach ($terms as $term) { ?>
                <button class="btn" data-filter=".<?php echo $term->slug ?>"><?php echo $term->name ?></button>
            <?php }?>
        </div>

        <div class="container-fluid">
            <div class="row uza-portfolio">
                <?php 
                global $post;
                $args = array(
                    'post_type' => 'portfolio'
                );
                $query = new WP_Query;
                $portfolio_posts = $query->query($args);
                
                foreach( $portfolio_posts as $post ){
                    $term_list = wp_get_post_terms( $post->ID, 'taxonomy', array('fields' => 'all') );
                    $the_content = apply_filters( 'the_content', $post->post_content );
                    $str_20 = substr($the_content,0, 100);
                    $url = get_post_permalink( $post->ID );
                    ?>
                    <!-- Single Portfolio Item -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item 
                    <?php if(!empty($term_list)) {echo $term_list[0]->slug; } ?>">
                        <div class="single-portfolio-slide">
                            <?php if(has_post_thumbnail()) {?>
                                <?php the_post_thumbnail(); ?>
                            <?php }?>
                            <!-- Overlay Effect -->
                            <div class="overlay-effect">
                                <h4>
                                    <?php the_title(); ?>
                                </h4>
                                <p><?php echo $str_20;?></p>
                            </div>
                            <!-- View More -->
                            <div class="view-more-btn">
                                <a href="<?php echo $url; ?>"><i class="arrow_right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>

            </div>

            <div class="row">
                <div class="col-12 text-center mt-30">
                    <a  href="#" data-number="1"  data-taxonomy="" data-term="" data-posttype="portfolio" class="btn more-post uza-btn btn-3">Load More</a>
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
                <!-- Newsletter Form -->
                 <div class="col-12 col-md-6 col-lg-5">
                    <div class="nl-form mb-80">
                <?php 
                    portfolio_print_contact_form_7();
                ?>
                    </div>
                </div>
            </div>
            <!-- Border Bottom -->
            <div class="border-line"></div>
        </div>
    </section>
    <!-- ***** Newsletter Area End ***** -->

<?php get_footer(); ?>
