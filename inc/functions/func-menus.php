<?php

/**
 * Orissa menus
 *
 * @package orissa
 */

function orissa_theme_register_menus() {
    register_nav_menus([
        "orissa-theme-header-menu" => esc_html__("Header Menu", "orissa-theme"),
        "orissa-theme-footer-menu" => esc_html__("Footer Menu", "orissa-theme"),
    ]);
}

add_action("init", "orissa_theme_register_menus");

class Orissa_Menu_Walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;

// if the item has childern (boolean) then add dropdown class
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
// if item is current/current_item_ancestor (boolean) then add active class
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
// get item ID
        $classes[] = 'menu-item-' . $item->ID;
// if depth is > 0 and the then item has children then (for ul submenu > li )
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-submenu';
        }
// join / implode the classes by applying filter nav_menu_css_class
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
// create class
        $class_names = ' class="' . esc_attr($class_names) . '"';

// filter the id
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

// append everything to the output
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

// For a Tags

// if the attributes are there. If they are then append them.
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

// If item/a tag has children
        $attributes .= ($args->walker->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

// Always append before and after arguments,
        // They are the text before and after Link markup
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
// Add the text before link, The title with filters (Title of Page/Post/Cat), text after link
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
// Always append before and after arguments, They are the text before and after Link markup
        $item_output .= "</a>";
        $item_output .= $args->after;

        // if depth is 0 (top level el) and it has children then add the below arrow icon
        $item_output .= ($args->walker->has_children) ? '<span class="nav-item-toggle-btn"><i class="fas fa-chevron-down"></i></span>' : '';

// then append the output with the walker nav menu start el filter to item output
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}