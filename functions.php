<?php
/**
 * Orissa theme functions
 *
 * @package orissa
 */

/**
 * Define constants for theme
 */

if (!defined("ORISSA_DIR_PATH")) {
    define("ORISSA_DIR_PATH", untrailingslashit((get_template_directory())));
}

if (!defined("ORISSA_DIR_URI")) {
    define("ORISSA_DIR_URI", untrailingslashit((get_template_directory_uri())));
}

/**
 * Enqueue scripts and styles.
 */

require ORISSA_DIR_PATH . "/inc/functions/func-enqueue.php";

/**
 * Theme Supports.
 */

require ORISSA_DIR_PATH . "/inc/functions/func-theme-support.php";

/**
 *  Menus.
 */

require ORISSA_DIR_PATH . "/inc/functions/func-menus.php";

/**
 *  Filters.
 */

function orissa_theme_custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'orissa_theme_custom_excerpt_length', 999);

function orissa_theme_custom_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'orissa_theme_custom_excerpt_more');