<?php
function article_blog_writer_comment($comment, $args, $depth){
    $str_class = empty($args['has_children']) ? '' : 'parent';
    $str_class .= ' single_comment_area';

    $gravatar_url = get_avatar_url( $comment->comment_author_email );

	if(!empty($comment->user_id)){
		$user_firstname = get_the_author_meta('user_firstname', $comment->user_id);
		$user_lastname = get_the_author_meta('user_lastname', $comment->user_id);
		$full_name = $user_firstname .' ' . $user_lastname;
	}
	if(empty($full_name)){
		$full_name = $comment->comment_author;
	}
	


    //var_dump($user);
//var_dump($comment);
// user_id
?>



    <li id="comment-<?php comment_ID(); ?>" <?php comment_class($str_class); ?>>
        <!-- Comment Content -->
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-content d-flex">

            <!-- Comment Author -->
            <div class="comment-author">
                
                <img src="<?php echo $gravatar_url ?>" alt="author">
            </div>
            <!-- Comment Meta -->
            <div class="comment-meta">
                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>" class="post-date"><?php comment_time('d F, Y'); ?></a>
                <h5><?php echo $full_name; ?></h5>
                <p><?php comment_text(); ?></p>
                <a href="#" class="like">Like</a>
				<?php comment_reply_link(
					array_merge(
						$args, array(
							'add_below' => 'div-comment',
							'depth' => $depth,
							'max_depth' => $args['max_depth'],
							'before' => '',
							'after' => ''
						)
					)
				); ?>
            </div>
        </div>
        <?php
}
?>

<div id="comments" class="comment_area mb-50 clearfix">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h5 class="title">
			<?php
				$mavix_insurance_comments_number = get_comments_number();
				if ( '1' === $mavix_insurance_comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One Comment', 'comments title', 'mavix-insurance' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Comments',
							'%1$s Comments',
							$mavix_insurance_comments_number,
							'comments title',
							'mavix-insurance'
						),
						number_format_i18n( $mavix_insurance_comments_number ),
						get_the_title()
					);
				}
			?>
		</h5>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'mavix-insurance' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'mavix-insurance' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'mavix-insurance' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
            wp_list_comments( array( 'callback' => 'article_blog_writer_comment', 'avatar_size' => 50, 'style' => 'ol' ));
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'mavix-insurance' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'mavix-insurance' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'mavix-insurance' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().
?>

<?php

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mavix-insurance' ); ?></p>
	<?php
	endif;

	
	?>

</div>
<div class="uza-contact-form">
	<?php 
	//comment_form();


	$defaults = [
	'fields'               => [
		'author' => '<div class="col-lg-6">
						<input type="text" id="author" name="author" class="form-control mb-30" placeholder="'. __( 'Name' ) .'">
					</div>',
		'email'  => '<div class="col-lg-6">
						<input type="email" name="email" class="form-control mb-30" placeholder="'. __( 'Email' ) .'" '. ' value="' . esc_attr(  $commenter['comment_author_email'] ) .'" >
					</div>',
		'cookies' => '',
	],
	'comment_field'        => '<div class="col-12">
									<textarea id="comment" name="comment" required="required" class="form-control mb-30" placeholder="'. _x( 'Comment', 'noun' ) .'"></textarea>
								</div>',
	'must_log_in'          => '<p class="must-log-in">' .
		 sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '
	 </p>',
	'logged_in_as'         => '<p class="logged-in-as">' .
		 sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '
	 </p>',
	'comment_notes_before' => '<div class="row">',
	'comment_notes_after'  => '</div>',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'class_container'      => 'comment-respond',
	'class_form'           => 'comment-form',
	'class_submit'         => 'submit',
	'name_submit'          => 'submit',
	'title_reply'          => __( 'Leave A Comment' ),
	'title_reply_to'       => __( 'Leave A Comment to %s' ),
	'title_reply_before'   => '<h2 class="mb-4">',
	'title_reply_after'    => '</h2>',
	'cancel_reply_before'  => ' <small>',
	'cancel_reply_after'   => '</small>',
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Post Comment' ),
	'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="btn uza-btn btn-3 mt-15">Post Comment</button>',
	'submit_field'         => '<div class="col-12">%1$s %2$s</div>',
	'format'               => 'xhtml',
];

comment_form( $defaults );
	?>
</div>

<!-- #comments -->
