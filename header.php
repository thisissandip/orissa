<?php
/**
 * Header for orissa theme
 *
 * @package orissa
 */
?>

<!DOCTYPE html>

<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php
if (function_exists('wp_body_open')) {
    wp_body_open();
}
?>

    <header id="site-header">
        <?php get_template_part("template-parts/header/navigation")?>
    </header>