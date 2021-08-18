<?php get_header();?>

<main id="site-content">

    <?php

if (have_posts()):
    while (have_posts()):

        the_post();

        print(get_post_type());

        get_template_part('template-parts/content/content', "page");

        // Display related posts
        //get_template_part('parts/related-posts');

    endwhile;
endif;

?>

</main><!-- #site-content -->

<?php get_footer();?>