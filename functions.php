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