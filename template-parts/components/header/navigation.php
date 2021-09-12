<?php
$site_title = get_bloginfo('name');
$site_description = get_bloginfo('description');
?>

<div class="navbar">

    <div class="orissa-nav-menu-icon">
        <i class="fas fa-bars"></i>
    </div>

    <div class="header-title">

        <?php if (has_custom_logo()): ?>
        <div class="site-logo">
            <?php the_custom_logo();?>
        </div>

        <?php else: ?>
        <div class="site-info">
            <?php if ($site_title): ?>
            <div class="site-title">
                <?php
$home_link_contents = '<a href="' . esc_url(home_url('/')) . '" rel="home">' . wp_kses_post($site_title) . '</a>';
echo $home_link_contents;
?>
            </div>
            <?php endif;?>
        </div>

        <?php endif;?>

    </div>

    <div class="orissa-search-icon">
        <i class="fas fa-search"></i>
    </div>

    <!-- header-menu end-->
    <div class="header-modal">

        <div class="header-modal-content">
            <div class="orissa-theme-menu-close"><i class="fas fa-times"></i></div>
            <div class="header-modal-title">
                <div class="site-info">
                    <?php if ($site_title): ?>
                    <div class="modal-site-title">
                        <?php
$home_link_contents = '<a href="' . esc_url(home_url('/')) . '" rel="home">' . wp_kses_post($site_title) . '</a>';
echo $home_link_contents;
?>
                        <?php endif;?>

                    </div>
                </div>
            </div>
            <!-- menu -->
            <?php
if (has_nav_menu('orissa-theme-header-menu')) {
    wp_nav_menu(array(
        'theme_location' => 'orissa-theme-header-menu',
        'menu_class' => 'main-menu',
        'container' => 'nav',
        'container_class' => 'header__main-nav',
        'walker' => new Orissa_Menu_Walker(),
    ));
}
?>
            <!-- menu end -->
        </div>
    </div>
    <!-- header-modal end -->

    <div class="search-modal">
        <?php get_search_form()?>
        <div class="orissa-theme-search-close"><i class="fas fa-times"></i></div>
    </div>

    <div class="search-modal-overlay"></div>


    <!-- search-modal end-->


</div>