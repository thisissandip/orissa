<?php

/**
 * Orissa menus
 *
 * @package orissa
 */

function orissa_theme_register_menus() {
    register_nav_menus([
        "header-menu" => __("Header Menu"),
        "footer-menu" => __("Footer Menu"),
    ]);
}

add_action("init", "orissa_theme_register_menus");