<?php get_header();?>


<main id="site-content">

    <?php if (have_posts()):
    // display blog page title only on the Blog page
    if (is_home() && !is_front_page()):
    ?>
    <header class="page-title">
        <?php single_post_title()?>
    </header>

    <?php
    // display author title only on the author page
elseif (is_author() && !is_front_page()): ?>
    <header class="page-title">
        <div class="author-title"> Author: </div>
        <div class="author-name"><?php the_author()?> </div>
    </header>

    <?php
// display category  title only on the category page
elseif (is_category() && !is_front_page()): ?>
    <header class="page-title">
        <div class="category-title"> Category: </div>
        <div class="category-name"><?php the_category()?> </div>
    </header>

    <?php endif;?>

    <div class="posts-container">
        <?php while (have_posts()) {
    the_post();
    // display blog cards
    get_template_part("template-parts/components/blog/blog-card");
}
?>
    </div>
    <?php else:
    // If no content, include the "No posts found" template.
    get_template_part("template-parts/content/content-none");
endif;?>

    <?php orissa_numbered_pagination();?>

</main>
<!-- #site-content -->

<?php get_footer();?>