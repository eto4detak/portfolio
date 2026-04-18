<?php 

// добавляем ajax в скрипт
add_action( 'wp_head', 'portfolio_ajax_data', 8 );
function portfolio_ajax_data(){
	$data = [
		'url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce('portfolio-ajax-nonce-more-posts')
	];
	?>
	<script id="myajax_data">
		window.portfolio_ajax = <?= wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) ?>
	</script>
	<?php
}


add_action( 'wp_footer', 'portfolio_insert_posts_javascript', 99 ); // для фронта
function portfolio_insert_posts_javascript() {
	?>
	<script>
	jQuery(document).ready(function($) {
        var data = {
            action: 'portfolio_more_posts',
            nonce_code : portfolio_ajax.nonce,
            paged: 1
        };
        var $divBlock = $('.uza-blog-area .container .row-content');
        var $divPortfolio = $('.container-fluid .uza-portfolio');

        $('a.btn.more-post').on('click', function() {   
         
            data.paged += 1;
            data.post_type = this.dataset.posttype;
            data.taxonomy = this.dataset.taxonomy;
            data.term = this.dataset.term;
            if(!data.post_type){
                data.post_type = 'post';
            }

            // 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()
            jQuery.post( portfolio_ajax.url, data, function(response) {
                var posts = JSON.parse(response);

                if(data.post_type == 'portfolio'){
                    $divPortfolio.isotope('layout');

                    posts.forEach((post) => {

                        var $items = $('<div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item '+ post.term +'">'+
                            '<div class="single-portfolio-slide">'+
                                '<img src="'+ post.urlImage +'" alt="">'+
                                '<!-- Overlay Effect -->'+
                                '<div class="overlay-effect">'+
                                    '<h4>'+ post.post_title +'</h4>'+
                                    '<p>'+ post.post_content.slice(0,100) +'</p>'+
                                '</div>'+
                                '<!-- View More -->'+
                                '<div class="view-more-btn">'+
                                    '<a href="'+ post.url +'"><i class="arrow_right"></i></a>'+
                                '</div>'+
                            '</div>'+
                        '</div>');

                        $divPortfolio.isotope( 'insert', $items );
                        $divPortfolio.isotope('layout');
                    });
                }
                

                if(data.post_type == 'post'){

                    posts.forEach((post) => {
                        var isoDate = new Date(post.post_date);
                        let imgUrl = 'style="background-image: url();">';
                        if(post.urlImage){
                            imgUrl = 'style="background-image: url('+ post.urlImage + ');">';
                        }
                        var innerBlock = '<div class="col-12 col-lg-4">' +
                            '<div class="single-blog-post bg-img mb-80" '+ imgUrl +
                                '<div class="post-content">' +
                                    '<span class="post-date"><span>' + isoDate.getDate() + '</span> ' 
                                    + isoDate.toLocaleString('default', { month: 'long' }) 
                                    + ', '+ isoDate.getFullYear() + '</span>' +
                                    '<a href="#" class="post-title">' + post.post_title + '</a>' +
                                    '<p>' + post.post_content.substring(0, 50) + '</p>' +
                                    '<a href="' + post.guid + '" class="read-more-btn">Read More <i class="arrow_carrot-2right"></i></a>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
                        $divBlock.append(innerBlock);

                    });
                }

               
            });

        });


	});
	</script>
	<?php
}

add_action( 'wp_ajax_portfolio_more_posts', 'portfolio_ajax_more_posts_callback' );
//add_action( 'wp_ajax_nopriv_portfolio_more_posts', 'portfolio_ajax_more_posts_callback' );
function portfolio_ajax_more_posts_callback() {

    if( ! wp_verify_nonce( $_POST['nonce_code'], 'portfolio-ajax-nonce-more-posts' ) ) die( 'Stop!');

    $ajax_posts = get_posts( array(
        'numberposts' => 10,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => $_POST['post_type'],
        'paged'   =>  $_POST['paged'],
        $_POST['taxonomy']   =>  $_POST['term'],
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );

    foreach ($ajax_posts as $key => $post) {
        $thumbnail = get_the_post_thumbnail_url( $post->ID );
        $post->urlImage = $thumbnail;

        $term_list = wp_get_post_terms( $post->ID, 'taxonomy', array('fields' => 'all') );
        $term = '';
        if(!empty($term_list)){
            $term = $term_list[0]->slug; 
        }
        $post->term = $term;

        $url = get_post_permalink( $post->ID );
        $post->url = $url;
    }

    echo JSON_encode($ajax_posts);

	// выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
	wp_die();
}

