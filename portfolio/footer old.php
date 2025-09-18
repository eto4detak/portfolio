<?php
        global $post;
        $my_posts = get_posts( array(
            'posts_per_page' => 5,
            'category'    => 0,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  =>'',
            'post_type'   => 'footer',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );
?>
<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
   <!-- ***** Footer Area Start ***** -->
   <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">
                
            <?php  $items = wp_get_nav_menu_items( 'footer1', [] ); ?>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title"> <?php if(!empty($items[0])) echo $items[0]->title; ?></h4>

                        <!-- Footer Content -->
                        <div class="footer-content mb-15">
                            <h3><?php if(!empty($items[1])) echo $items[1]->title; ?></h3>
                            <p><?php if(!empty($items[2])) echo $items[2]->title; ?><br><?php if(!empty($items[3])) echo $items[3]->title; ?></p>
                        </div>
                        <p class="mb-0"><?php if(!empty($items[4])) echo $items[4]->title; ?><br>
                        <?php if(!empty($items[5])) echo $items[5]->title; ?></p>
                    </div>
                </div>

                <?php  $items = wp_get_nav_menu_items( 'footer2', [] ); ?>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title"><?php if(!empty($items[0])) echo $items[0]->title; ?></h4>

                        <!-- Nav -->
                        <nav>
                            <ul class="our-link">
                                <li><a href="<?php if(!empty($items[1])) echo $items[1]->guid; ?>"><?php if(!empty($items[1])) echo $items[1]->title; ?></a></li>
                                <li><a href="<?php if(!empty($items[2])) echo $items[2]->guid; ?>"><?php if(!empty($items[2])) echo $items[2]->title; ?></a></li>
                                <li><a href="<?php if(!empty($items[3])) echo $items[3]->guid; ?>"><?php if(!empty($items[3])) echo $items[3]->title; ?></a></li>
                                <li><a href="<?php if(!empty($items[4])) echo $items[4]->guid; ?>"><?php if(!empty($items[4])) echo $items[4]->title; ?></a></li>
                                <li><a href="<?php if(!empty($items[5])) echo $items[5]->guid; ?>"><?php if(!empty($items[5])) echo $items[5]->title; ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <?php  $items = wp_get_nav_menu_items( 'footer3', [] ); ?>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title"><?php if(!empty($items[0])) echo $items[0]->title; ?></h4>

                        <!-- Nav -->
                        <nav>
                            <ul class="our-link">
                            <li><a href="<?php if(!empty($items[1])) echo $items[1]->guid; ?>"><?php if(!empty($items[1])) echo $items[1]->title; ?></a></li>
                                <li><a href="<?php if(!empty($items[2])) echo $items[2]->guid; ?>"><?php if(!empty($items[2])) echo $items[2]->title; ?></a></li>
                                <li><a href="<?php if(!empty($items[3])) echo $items[3]->guid; ?>"><?php if(!empty($items[3])) echo $items[3]->title; ?></a></li>
                                <li><a href="<?php if(!empty($items[4])) echo $items[4]->guid; ?>"><?php if(!empty($items[4])) echo $items[4]->title; ?></a></li>
                                <li><a href="<?php if(!empty($items[5])) echo $items[5]->guid; ?>"><?php if(!empty($items[5])) echo $items[5]->title; ?></a></li>

                            </ul>
                        </nav>
                    </div>
                </div>

                <?php  $items = wp_get_nav_menu_items( 'footer4', [] ); ?>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title"><?php if(!empty($items[0])) echo $items[0]->title; ?></h4>
                        <p><?php if(!empty($items[1])) echo $items[1]->title; ?></p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text mb-30">
                            <p><?php if(!empty($items[2])) echo $items[2]->title; ?>
                            <a href="<?php if(!empty($items[3])) echo $items[3]->guid; ?>"><?php if(!empty($items[3])) echo $items[3]->title; ?></a></p>
                        </div>

                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <?php  $items = wp_get_nav_menu_items( 'footer5', [] ); ?>
 <div class="row" style="margin-bottom: 30px;">
                
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>
<?php if(!empty($items[0])) echo $items[0]->title; ?><i class="fa fa-heart-o" aria-hidden="true"></i>
  by <a href="<?php if(!empty($items[1])) echo $items[1]->guid; ?>" target="_blank"><?php if(!empty($items[1])) echo $items[1]->title; ?></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>

        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <?php wp_footer(); ?>
</body>

</html>
