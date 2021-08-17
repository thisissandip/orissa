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
            <div class="post-card-img-wrapper">
                <?php
// display post thumbnail
if ($has_post_thumbnail) {
    the_post_thumbnail('', ['class' => 'img-responsive', 'title' => 'Feature image']);
} else {
    // if post does not have thumbnail, display fallback featured image
    ?>
                <img src="<?php echo ORISSA_DIR_URI . "/assets/imgs/default-fallback-image.webp" ?>"
                    class="img-responsive" title="Fallback Feature Image" />
                <?php
}
?>
            </div>
        </a>
    </header>

    <!-- update the size according to the size of featured img-->
    <div class="entry-card-info">
        <a href="<?php echo esc_url(get_permalink()) ?>">
            <div class="post-card-title"><?php the_title()?></div>
        </a>

        <div class="post-card-description"><?php the_excerpt()?></div>
    </div><!-- .entry-card-info -->

</article>