<?php
$site_title = get_bloginfo('name');
$site_description = get_bloginfo('description');
?>

<nav>
    <!-- header-title -->
    <div class="header-title">


        <?php if (has_custom_logo()): ?>
        <div class="site-logo">
            <?php the_custom_logo();?>
        </div>
        <?php else: ?>
        <div class="site-info">
            <?php if ($site_title): ?>
            <div class="site-title">
                <?php echo wp_kses_post($site_title); ?></div>
            <?php endif;?>

            <?php if ($site_description): ?>
            <div class="site-description"> <?php echo wp_kses_post($site_description); ?></div>
            <?php endif;?>
        </div>
        <?php endif;?>




    </div>
    <!-- header-title end -->
    <!-- header-menu -->
    <div class="header-menu">
        <ul>
            <a href="#">
                <li>Hello</li>
            </a>
            <a href="#">
                <li>Hello</li>
            </a>
            <a href="#">
                <li>Hello</li>
            </a>
        </ul>
    </div>
    <!-- header-menu end-->
</nav>