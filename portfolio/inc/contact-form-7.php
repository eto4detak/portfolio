<?php 

//# контакт форм 7 убрать тэги p
add_filter('wpcf7_autop_or_not', '__return_false');
//# заменить input на button
add_filter( 'wpcf7_form_elements', function ( $html ) {

	preg_match( '~<input([^>]+)type=["\']submit["\']([^>/]+)/?>~i', $html, $match );

	if( $match ){
		$input = $match[0];
		$attr = trim( $match[1] . $match[2] );

		preg_match( '/value=["\']([^"\']+)/', $input, $mm );
		$button_text = $mm[1];

		$html = str_replace( $input, "<button $attr>$button_text</button>", $html );
	}

	return $html;

} );


function portfolio_print_contact_form_7(){

    $my_posts = get_posts( array(
        'numberposts' => 1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'wpcf7_contact_form',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );

    global $post;

    foreach( $my_posts as $post ){
        setup_postdata( $post );
        $hash = get_post_meta( $post->ID, '_hash', true );
        $hash = substr( $hash, 0, 7 );
        $short = '[contact-form-7 id="'. $hash .'" ]';
        echo do_shortcode( $short );
        // формат вывода the_title() ...
    }

    wp_reset_postdata(); // сброс
}