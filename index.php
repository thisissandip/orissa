<?php get_header();
global $wp_query; 
?>


<main id="site-content">

    <?php if (have_posts()):
    // display blog page title only on the Blog page
    if (is_home() && !is_front_page()):
    ?>
    <header class="page-title">
        <h1><?php single_post_title()?></h1>
    </header>

    <?php
    // display author title only on the author page
elseif (is_author() && !is_front_page()): ?>
    <header class="page-title">
        <div class="author-title"> Author:</div>
        <div class="author-name"> <?php the_author()?> </div>
    </header>

    <?php
// display category title only on the category page
elseif (is_category() && !is_front_page()): ?>
    <header class="page-title">
        <div class="category-title"> Category: </div>
        <div class="category-name"><?php the_category(" , ")?> </div>
    </header>

    <?php endif;?>

    <div class="posts-container" data-page="<?php echo get_query_var( "paged" ) ? get_query_var( "paged" ) : 1 ?>"
        data-maxpage="<?php echo $wp_query->max_num_pages  ?>">
        <?php while (have_posts()) {
    the_post();
    // display blog cards
    get_template_part("template-parts/components/blog-card/blog-card");
} ?>
    </div>
    <?php
    if(get_theme_mod("orissa_pagination_type") === "numbered_pagination"){
        // numbered pagination
        orissa_numbered_pagination();
    }else if(get_theme_mod("orissa_pagination_type") === "load_more_pagination"){
        // load more pagination
        orissa_load_more_pagination();
    }

?>

    <?php else:
    // If no content, include the "No posts found" template.
    get_template_part("template-parts/content/content-none");
endif;?>


</main>
<!-- #site-content -->

<?php get_footer();?>