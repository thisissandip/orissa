<?php
/**
 * Template for blog card preview
 *
 * @package Orissa
 */

$has_post_thumbnail = get_the_post_thumbnail(get_the_ID());
?>

<article id="post-<?php the_ID()?>" <?php post_class('post-preview-card')?>>
    <header class="post-card__header">
        <?php
        // display post thumbnail
        if ($has_post_thumbnail): ?>
        <a href="<?php echo esc_url(get_permalink()) ?>">
            <?php the_post_thumbnail('', ['class' => 'img-responsive', 'title' => wp_kses_post(get_the_title())]);?>
        </a>
    </header>
    <?php endif;?>

    <div class="post-card__info">
        <div class="post-card__title">
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php the_title()?>
            </a>
        </div>
        <div class="post-card__description">
            <?php 
            if(get_theme_mod( "orissa_display_excerpt_or_full_post" ) === "excerpt" )
            {
                the_excerpt();
            } else if(get_theme_mod( "orissa_display_excerpt_or_full_post" ) === "full")  {
                the_content();
            }
            ?></div>
        <?php orissa_posted_on_and_author()?>

    </div><!-- .entry-card-info -->

</article>