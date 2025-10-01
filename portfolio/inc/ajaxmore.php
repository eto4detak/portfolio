<?php 

// добавляем myajax в скрипт
add_action( 'wp_head', 'myajax_data', 8 );
function myajax_data(){
	$data = [
		'url' => admin_url( 'admin-ajax.php' ),
	];
	?>
	<script id="myajax_data">
		window.myajax = <?= wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) ?>
	</script>
	<?php
}


add_action( 'wp_footer', 'my_action_javascript', 99 ); // для фронта
function my_action_javascript() {
	?>
	<script>
	jQuery(document).ready(function($) {
        var data = {
            action: 'my_action',
            paged: 1
        };
        var divBlock = $('.uza-blog-area .container .row-content');

        $('a.btn.more-post').on('click', function() {
            data.paged += 1;

            // 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()
            jQuery.post( myajax.url, data, function(response) {
                var posts = JSON.parse(response);


                posts.forEach((post) => {
                    var isoDate = new Date(post.post_date);

                    var innerBlock = '<div class="col-12 col-lg-4">' +
                        '<div class="single-blog-post bg-img mb-80" style="background-image: url(' +  post.urlImage + ');">' +
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
                    divBlock.append(innerBlock);

                });
               
            });

        });


	});
	</script>
	<?php
}

add_action( 'wp_ajax_my_action', 'my_action_callback' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback' );
function my_action_callback() {
	$whatever = intval( $_POST['whatever'] );

    $ajax_posts = get_posts( array(
        'numberposts' => 10,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'paged'   =>  $_POST['paged'],
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );

    foreach ($ajax_posts as $key => $post) {
        $thumbnail = get_the_post_thumbnail_url( $post->ID );
        $post->urlImage = $thumbnail;
    }

    echo JSON_encode($ajax_posts);

	// выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
	wp_die();
}

