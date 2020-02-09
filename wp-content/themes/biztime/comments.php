<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Biztime
 * @since Biztime 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

 if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<div class="comments-heading">
			<h3>
				<?php
						$comments_number = get_comments_number();
						if ( 1 === $comments_number ) {
							/* translators: %s: post title */
							printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','biztime' ), get_the_title() );
						} else {
							printf(
								/* translators: 1: number of comments, 2: post title */
								esc_html(
									'%1$s Comment on &ldquo;%2$s&rdquo;',
									'%1$s Comments on &ldquo;%2$s&rdquo;',
									$comments_number,
									'comments title',
									'biztime'
								),
								esc_html (number_format_i18n( $comments_number ) ),
								get_the_title()
							);
						}
					?>
			</h3>
		</div>
		<?php the_comments_navigation(); ?>

	   
		<?php
			wp_list_comments( array(
				'style'       => '',
				'short_ping'  => true,
				'avatar_size' => 42,
				'callback' => 'biztime_comments',
			) );
		?>
		<!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'biztime' ) ) :
	?>
		<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'biztime' ); ?></p> 
	<?php endif; ?>
</div>

<div class="comment-respond"> 
	
   <?php
	comment_form( array(
		 'title_reply'  =>  __( 'Add Comment', 'biztime'  ), 
		'submit_button' => '<div class="form-group">'.
		  '<input  name="%1$s" type="submit" id="%2$s" class="add-btn contact-btn" value="Post Comment" /></div>'.
		'',
	) );
?>
   
</div>


<!-- .comments-area -->
