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
        <?php previous_post_link();?>
    </div>
    <div class="next-link">
        <?php next_post_link();?>
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
    ];

    printf("<nav class='orissa-pagination'>%s</nav>", wp_kses(paginate_links($args), $allowed_tags));
}