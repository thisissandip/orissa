<?php

function orissa_theme_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Footer', 'orissa' ),
        'id'            => 'footer-sidebar',
        'description'   => __( 'Orissa theme footer widget area', 'orissa' ),
        'before_widget' => '<div id="%1$s" class="widget footer-widget-area %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'orissa_theme_sidebars' );