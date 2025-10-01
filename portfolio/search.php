<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Article Blog Writer
 */
get_header(); ?>

    <div id="skip-content" class="container">
        <div class="row">
            <div id="primary" class="content-area col-md-12 <?php echo esc_attr( is_active_sidebar('sidebar') ? 'col-lg-9' : 'col-lg-12' ); ?>">
                <main id="main" class="site-main module-border-wrap mb-4">
                    <div class="row">
                        <?php if (have_posts()) { ?>
                            <header class="page-header">
                                <h4 class="page-title">
                                    <?php
                                        /* translators: %s: search query. */
                                        printf(esc_html__('Search Results for: %s', 'article-blog-writer'), '<span>' . get_search_query() . '</span>');
                                    ?>
                                </h4>
                            </header>
                            <?php
                            /* Start the Loop */
                            while (have_posts()) : the_post();

                                
                                $article_blog_writer_post_page_title =  get_theme_mod( 'article_blog_writer_post_page_title', 1 );
                                $article_blog_writer_post_page_meta =  get_theme_mod( 'article_blog_writer_post_page_meta', 1 );
                                $article_blog_writer_post_page_thumb =  get_theme_mod( 'article_blog_writer_post_page_thumb', 1 );
                                $article_blog_writer_post_page_content =  get_theme_mod( 'article_blog_writer_post_page_content', 1 );
                                ?>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
                                        <?php if ($article_blog_writer_post_page_thumb == 1 ) {?>
                                            <?php if ( has_post_thumbnail() ) { ?>
                                                <img class="mb-50" src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="">
                                            <?php }?>
                                        <?php }?>
                                        <?php if ($article_blog_writer_post_page_meta == 1 ) {?>
                                            <div class="meta-info-box my-2">
                                                <span class="entry-author"><?php esc_html_e('BY','article-blog-writer'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                                                <span class="ms-2"><?php echo esc_html(get_the_date()); ?></span>
                                            </div>
                                        <?php }?>
                                        <div class="post-summery">
                                            <?php if ($article_blog_writer_post_page_title == 1 ) {?>
                                                <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
                                            <?php }?>
                                            <?php if ($article_blog_writer_post_page_content == 1 ) {?>
                                                <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('article_blog_writer_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('article_blog_writer_post_page_excerpt_suffix','[...]')); ?></p>
                                            <?php }?>
                                            <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','article-blog-writer'); ?></a>
                                        </div>
                                    </article>
                                </div>
                        <?php

                            endwhile;

                            // if( get_theme_mod('article_blog_writer_post_page_pagination',1) == 1){ 
                            //     the_posts_navigation();
                            // }

                        }else {

                            //get_template_part('template-parts/content', 'none');

                        } ?>
                    </div>
                </main>
            </div>
        </div>
    </div>

<?php get_footer();