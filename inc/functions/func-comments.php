<?php
if( ! function_exists( 'orissa_custom_comments' ) ):
function orissa_custom_comments($comment, $args, $depth) {
    ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div class="comment-body">

        <div class="comment-meta commentmetadata">
            <div class="comment-authorimg">
                <?php echo get_avatar($comment,$size='60'); ?>
            </div>
            <div class="comment-authorname-and-date">
                <div>
                    <strong> <a href="<?php echo get_comment_author_link() ?>">
                            <?php echo get_comment_author() ?></a></strong>
                </div>
                <div class="comment-date-time">
                    <?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'orissa'), get_comment_date(),  get_comment_time()) ?>
                </div>
            </div>
        </div>


        <div class="comment-data">
            <?php if ($comment->comment_approved == '0') : ?>
            <em><?php esc_html_e('Your comment is awaiting moderation.','5balloons_theme') ?></em>
            <br />
            <?php endif; ?>
            <p> <?php comment_text() ?></p>

            <div class="reply">

                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>

        <?php
        }
endif;

/**
 * Reverse the comments and display the recent one's first
 */

if (!function_exists('orissa_reverse_comments')) {
    function orissa_reverse_comments($comments) {
        return array_reverse($comments);
    }   
}
add_filter ('comments_array', 'orissa_reverse_comments');