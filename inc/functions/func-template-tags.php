<?php

/**
 * Template tags for Orissa
 *
 * @package Orissa
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function orissa_posted_on_and_author() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf($time_string,
        esc_attr(get_the_date('c')),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date('c')),
        esc_html(get_the_modified_date())
    );

    $posted_on = '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>';

    $author = '<div class="author">By <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></div>';

    echo '<div class="posted-on"> Posted on - ' . $posted_on . '</div><div class="author-container"> ' . $author . '</div>';
}

/**
 * Prints HTML with meta information for the current post-date/time and author for single.
 */
function orissa_posted_on_and_author_for_single() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf($time_string,
        esc_attr(get_the_date('c')),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date('c')),
        esc_html(get_the_modified_date())
    );

    $author_id = get_the_author_meta('ID');
    $author_gravatar_url = get_avatar_url($author_id, array('size' => 60));
    $author_name = get_the_author_meta('display_name', $author_id);

    if ($author_gravatar_url) {
        $author_avatar = '<img class="post-author-avatar" src="' . $author_gravatar_url . ' " alt=' . $author_name . '>';
    }

    $posted_on = '<div class="post-posted-on">' . $time_string . '</div>';

    $author = '<div class="author"> By <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' .
    esc_html(get_the_author()) . '</a> - </div>';

    echo '<div class="post-meta-info"> '. $author .$posted_on . '</div>';
}

/**
 * Excerpt Filters
 */

function orissa_theme_custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'orissa_theme_custom_excerpt_length', 999);

function orissa_theme_custom_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'orissa_theme_custom_excerpt_more');

/**
 * Post Thumbnails
 */

function orissa_post_thumbnail() {

    if (is_singular()): ?>

<figure class="post-thumbnail">
    <?php
// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
    the_post_thumbnail('post-thumbnail', array('loading' => false));
    ?>
    <?php if (wp_get_attachment_caption(get_post_thumbnail_id())): ?>
    <figcaption class="wp-caption-text"><?php echo wp_kses_post(wp_get_attachment_caption(get_post_thumbnail_id())); ?>
    </figcaption>
    <?php endif;?>
</figure><!-- .post-thumbnail -->

<?php else: ?>

<figure class="post-thumbnail">
    <a class="post-thumbnail-inner alignwide" href="<?php the_permalink();?>" aria-hidden="true" tabindex="-1">
        <?php the_post_thumbnail('post-thumbnail');?>
    </a>
    <?php if (wp_get_attachment_caption(get_post_thumbnail_id())): ?>
    <figcaption class="wp-caption-text"><?php echo wp_kses_post(wp_get_attachment_caption(get_post_thumbnail_id())); ?>
    </figcaption>
    <?php endif;?>
</figure>

<?php endif;
}

/**
 * Singular Pagination
 */

function orissa_prev_next_pagination() {?>

<div class="pagination-container">
    <div class="prev-link">
        <?php previous_post_link("Prev : %link");?>
    </div>
    <div class="next-link">
        <?php next_post_link("Next : %link");?>
    </div>
</div>

<?php
}

/**
 * Numbered Pagination
 */

function orissa_numbered_pagination() {

    $allowed_tags = [
        "span" => [
            "class" => [],
        ],
        "a" => [
            "href" => [],
            "class" => [],
        ],
    ];

    $args = [
        "before_page_number" => '<span class="orissa-page-number">',
        "after_page_number" => '</span>',
        "prev_text" => "Prev",
        "next_text" => "Next"
    ];

    printf("<div class='orissa-pagination-wrapper'><nav class='orissa-pagination'>%s</nav></div>", wp_kses(paginate_links($args), $allowed_tags));
}

/**
*  Load More Button Pagination
*/

function orissa_load_more_pagination(){
    printf("<div class='orissa-pagination-wrapper'>
    <button type='button' id='load-more-post-btn'>Load More</button>
    </div>");
}

function orissa_load_more(){
    $next_page_num = $_POST["current_page"] + 1;
    $query = new WP_Query([
        "posts_per_page" => 6,
        "paged" => $next_page_num
    ]);

    if($query->have_posts()):
        ob_start();

        while($query->have_posts()) : $query->the_post();

        get_template_part("template-parts/components/blog/blog-card");

        endwhile;

        wp_send_json_success(ob_get_clean() );

    else:

        wp_send_json_error( "No more posts" );
        
    endif;
}

add_action( "wp_ajax_nopriv_orissa_load_more_posts", "orissa_load_more" );
add_action( "wp_ajax_orissa_load_more_posts", "orissa_load_more" );