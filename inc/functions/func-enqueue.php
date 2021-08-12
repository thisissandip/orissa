<?php

/**
 * Enqueue scripts and styles.
 */

function orissa_theme_scripts() {
    wp_register_style("orissa-theme-styles", get_stylesheet_uri(), [], filemtime(ORISSA_DIR_PATH . "/style.css"), "all");
    wp_enqueue_style('orissa-theme-styles');

    // register script
    wp_register_script("orissa-theme-script", ORISSA_DIR_URI . "/dist/js/main.js", ["jquery"], filemtime(ORISSA_DIR_PATH . "/assets/js/main.js"), true);
    wp_enqueue_script("orissa-theme-script");
}

add_action('wp_enqueue_scripts', 'orissa_theme_scripts');

/**
 * Gutenberg Editor Styles
 */
function orissa_editor_styles() {
    wp_enqueue_style('orissa-blocks-editor-style', ORISSA_DIR_URI . '/dist/css/editor-styles.css');
}
add_action('enqueue_block_editor_assets', 'orissa_editor_styles');