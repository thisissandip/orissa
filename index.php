<?php get_header();?>


<main id="site-content">

    <?php
if (have_posts()):
    // display blog page title only on the Blog page
    if (is_home() && !is_front_page()):
    ?>
    <header class="page-title">
        <div> <?php single_post_title()?></div>
    </header>
    <?php endif;?>

    <div class="posts-container">
        <?php
while (have_posts()) {
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

</main>
<!-- #site-content -->

<?php get_footer();?>