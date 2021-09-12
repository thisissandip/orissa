<?php
/**
 * Template part for Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Orissa
 */
?>

<div id="page-<?php the_ID();?>" <?php post_class();?>>

    <header class="entry-header">
        <?php

        // page title
        the_title('<h1 class="entry-title">', '</h1>');

        // post thumbnail
        orissa_post_thumbnail();

        ?>

    </header><!-- .entry-header -->


    <div class="entry-content">
        <?php
            the_content();
        ?>
    </div><!-- .entry-content -->


</div>