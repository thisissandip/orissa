<?php get_header();?>


<main id="site-content">

    <?php

if (have_posts()):
    while (have_posts()):

        the_post();

        the_title();

        // get_template_part('template-parts/content/content', get_post_type());

    endwhile;
endif;

?>

</main><!-- #site-content -->

<?php get_footer();?>