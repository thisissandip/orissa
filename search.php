<?php
/**
 * Search result page.
 */

get_header();

global $wp_query;

?>

<main id="site-content">
    <header class="search-result-header">
        <h1 class="search-result-header__title">
            <?php _e( 'Search', 'locale' ); ?>: "<?php the_search_query(); ?>"
        </h1>
        <p>We found <?php echo $wp_query->found_posts; ?> results for your search.</p>
    </header><!-- .entry-header -->

    <?php if (have_posts()): ?>

    <div class="posts-container">
        <?php while (have_posts()) {
    the_post();
    // display blog cards
    get_template_part("template-parts/components/blog/blog-card");
}
    // load more pagination
    //orissa_load_more_pagination();

    // numbered pagination
    orissa_numbered_pagination();
    ?>
    </div>
    <?php endif;?>

</main>

<?php get_footer();?>