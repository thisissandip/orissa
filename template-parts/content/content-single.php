<?php
/**
 *  Template part for displaying posts
 *
 *
 * @package Orissa
 */

$term_lists = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'all'));
$tag_lists = wp_get_post_terms(get_the_ID(), 'tag', array('fields' => 'all'));

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>

    <header class="entry-header">
        <?php
        // post-categories
        if (!empty($term_lists) || is_array($term_lists)): ?>

        <div class="category-container">
            <?php foreach ($term_lists as $key => $term) {
                        $term_link = get_term_link($term);
                ?>

            <a class="category-term" href="<?php echo esc_url($term_link); ?>">
                <?php echo esc_html($term->name); ?>
            </a>

            <?php } ?>
        </div>

        <?php endif;

        // post title
        the_title('<h1 class="entry-title">', '</h1>');

        // posted on and author info
        orissa_posted_on_and_author_for_single();

        // post thumbnail
        orissa_post_thumbnail();

        ?>

    </header><!-- .entry-header -->


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

        <?php
        // post-tags
        if (!empty($tag_lists) || is_array($tag_lists)): ?>

        <div class="tag-container">
            <?php foreach ($tag_lists as $key => $term) {
                        $term_link = get_term_link($term);
                ?>

            <a class="tag-term" href="<?php echo esc_url($term_link); ?>">
                <?php echo esc_html($term->name); ?>
            </a>

            <?php } ?>
        </div>

        <?php endif; ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
        <?php orissa_prev_next_pagination();?>
    </footer><!-- .entry-footer -->


</article>