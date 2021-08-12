<?php
/**
 * Orissa theme functions
 */

/**
 * Enqueue scripts and styles.
 */

function orissa_theme_scripts() {
    wp_register_style("orissa-theme-styles", get_stylesheet_uri(), [], filemtime(get_template_directory() . "/style.css"), "all");
    wp_enqueue_style('orissa-theme-styles');

    // register script
    wp_register_script("orissa-theme-script", get_template_directory_uri() . "/dist/js/main.js", ["jquery"], filemtime(get_template_directory() . "/assets/js/main.js"), true);
    wp_enqueue_script("orissa-theme-script");
}

add_action('wp_enqueue_scripts', 'orissa_theme_scripts');

/**
 * Gutenberg Editor Styles
 */
function orissa_editor_styles() {
    wp_enqueue_style('orissa-blocks-editor-style', get_template_directory_uri() . '/dist/css/editor-styles.css');
}
add_action('enqueue_block_editor_assets', 'orissa_editor_styles');