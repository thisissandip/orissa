<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @since Twenty Twenty-One 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$orissa_comment_count = get_comments_number();
?>

<div id="comments"
    class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

    <?php
	if ( have_comments() ) :
		;
		?>
    <h5 class="comments-title">
        <?php if ( '1' === $orissa_comment_count ) : ?>
        <?php esc_html_e( '1 comment', 'orissa' ); ?>
        <?php else : ?>
        <?php
				printf(
					/* translators: %s: Comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $orissa_comment_count, 'Comments title', 'orissa' ) ),
					esc_html( number_format_i18n( $orissa_comment_count ) )
				);
				?>
        <?php endif; ?>
    </h5><!-- .comments-title -->

    <ul class="comment-list">
        <?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ul',
					'short_ping'  => true,
					"callback"	=> "orissa_custom_comments"
				)
			);
			?>
    </ul><!-- .comment-list -->

    <?php
		the_comments_pagination(
			array(
				/* 'before_page_number' => esc_html__( 'Page', 'orissa' ) . ' ', */
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'<span class="nav-prev-text">%s</span>',
					esc_html__( 'View recent comments', 'orissa' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span>',
					esc_html__( 'View older comments', 'orissa' ),
				),
			)
		);
		?>

    <?php if ( ! comments_open() ) : ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'orissa' ); ?></p>
    <?php endif; ?>
    <?php endif; ?>

    <?php
	comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Leave a comment', 'orissa' ),
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h4>',
		)
	);
	?>

</div><!-- #comments -->