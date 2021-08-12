<?php

/**
 * Orissa theme supports
 *
 * @package orissa
 */

function orissa_theme_support() {

    /**
     * Add support for core custom logo
     * - also see fallback in inc/jetpack.php
     */
    add_theme_support('custom-logo', array(
        'height' => 150,
        'width' => 150,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Automatic feed
    add_theme_support('automatic-feed-links');

    // Custom background
    $defaults = array(
        'default-image' => '',
        'default-preset' => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
        'default-position-x' => 'left', // 'left', 'center', 'right'
        'default-position-y' => 'top', // 'top', 'center', 'bottom'
        'default-size' => 'cover', // 'auto', 'contain', 'cover'
        'default-repeat' => 'no-repeat', // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
        'default-attachment' => 'scroll', // 'scroll', 'fixed'
        'default-color' => 'FFFFFF',
        'wp-head-callback' => '_custom_background_cb',
    );
    add_theme_support('custom-background', $defaults);

    // Post thumbnails
    add_theme_support('post-thumbnails');

    /*
     * Add editor styles
     */
    add_editor_style();

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    // Make the theme translation ready
    load_theme_textdomain('orissa-theme', get_template_directory() . '/languages');

    // Alignwide and alignfull classes in the block editor
    add_theme_support('align-wide');

    // block styles support
    add_theme_support("wp-block-styles");

    // max content width
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1240;
    }

}

add_action("after_setup_theme", "orissa_theme_support");

?>