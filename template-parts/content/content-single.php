<?php
/**
 *  Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Orissa
 */

$term_lists = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'all'));
?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>

    <header class="entry-header alignwide">
        <?php
the_title('<h1 class="entry-title">', '</h1>');
if (!empty($term_lists) || is_array($term_lists)) {
    foreach ($term_lists as $key => $term) {
        $term_link = get_term_link($term);
        ?>
        <a class="taxonomy-term" href="<?php echo esc_url($term_link) ?>">
            <?php echo esc_html($term->name); ?>
        </a>
        <?php
}
}

orissa_post_thumbnail();

?>

    </header><!-- .entry-header -->

</article>

<div class="entry-content">
    <?php
the_content();

wp_link_pages(
    array(
        'before' => '<div class="page-links" aria-label="' . esc_attr__('Page', 'orissa') . '">' . esc_html__("Pages: ", "orissaa"),
        'after' => '</div>',
    )
);
?>
</div><!-- .entry-content -->

<footer class="entry-footer default-max-width">
    <?php orissa_prev_next_pagination();?>
</footer><!-- .entry-footer -->