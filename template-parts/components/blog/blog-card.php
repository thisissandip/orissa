<?php
/**
 * Template for blog card preview
 *
 * @package Orissa
 */

$has_post_thumbnail = get_the_post_thumbnail(get_the_ID());
?>

<article id="post-<?php the_ID()?>" <?php post_class('post-preview-card')?>>
    <header class="entry-header">
        <a href="<?php echo esc_url(get_permalink()) ?>">

            <?php
// display post thumbnail
if ($has_post_thumbnail) {
    the_post_thumbnail('', ['class' => 'img-responsive', 'title' => wp_kses_post(get_the_title())]);
} else {
    // if post does not have thumbnail, display fallback featured image
    ?>
            <img src="<?php echo ORISSA_DIR_URI . "/assets/imgs/default-fallback-image.webp" ?>" class="img-responsive"
                title="<?php echo wp_kses_post(get_the_title()) ?>" />
            <div class="post-feature-img-overlay"></div>
            <?php
}
?>
        </a>
    </header>

    <!-- update the size according to the size of featured img-->
    <div class="entry-card-info">
        <div class="post-card-title">
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php the_title()?>
            </a>
        </div>

        <div class="post-card-description"><?php the_excerpt()?></div>

        <?php orissa_posted_on_and_author()?>

    </div><!-- .entry-card-info -->

</article>