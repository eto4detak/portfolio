<?php
        global $post;
        $my_posts = get_posts( array(
            'posts_per_page' => 5,
            'category'    => 0,
            'orderby'     => 'ID',
            'order'       => 'ASC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  =>'',
            'post_type'   => 'footer',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );
        //var_dump($my_posts);
?>
<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
   <!-- ***** Footer Area Start ***** -->
   <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">
                <?php
                   foreach( $my_posts as $post ){
                    setup_postdata( $post );
                    echo get_the_content();
                    //the_post();

                }

        wp_reset_postdata(); // сброс 

        ?>

        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <?php wp_footer(); ?>
</body>

</html>
