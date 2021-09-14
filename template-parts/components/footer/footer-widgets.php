<?php
/**
 * Displays the footer widget area.
 *
 */

if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>

<aside class="widget-area">
    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
</aside><!-- .widget-area -->

<?php endif; ?>