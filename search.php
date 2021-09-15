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

    <div class="posts-container" data-page="<?php echo get_query_var( "paged" ) ? get_query_var( "paged" ) : 1 ?>"
        data-maxpage="<?php echo $wp_query->max_num_pages  ?>">
        <?php while (have_posts()) {
    the_post();
    // display blog cards
    get_template_part("template-parts/components/blog-card/blog-card");
}
    ?>
    </div>
    <?php
    if(get_theme_mod("orissa_pagination_type") === "numbered_pagination"){
        // numbered pagination
        orissa_numbered_pagination();
    }else if(get_theme_mod("orissa_pagination_type") === "load_more_pagination"){
        // load more pagination
        orissa_load_more_archive_pagination();
    }
    ?>
    <?php endif;?>

</main>

<?php get_footer();?>