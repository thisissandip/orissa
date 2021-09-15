<?php 
/**
 * Footer Template
 * 
 * @package orissa
 */
?>

<?php get_template_part( 'template-parts/components/footer/footer-widgets' ); ?>

<footer id="site-footer" role="contentinfo" class="header-footer-group">

    <div class="section-inner">

        <div class="footer-credits">

            <p class="footer-copyright">&copy;
                <?php
            echo date_i18n(
                /* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
                _x( 'Y', 'copyright date format', 'orissa' )
            );
            ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </p><!-- .footer-copyright -->

            <p class="theme-by">
                <a href="<?php echo esc_url( __( 'http://sandipmondal.dev/', 'orissa' ) ); ?>">
                    <?php _e( 'Orissa Theme by Sandip Mondal', 'orissa' ); ?>
                </a>
            </p><!-- .theme-by -->

        </div><!-- .footer-credits -->

        <a class="to-the-top" href="#site-header">
            <span class="to-the-top-long">
                <?php
            /* translators: %s: HTML character for up arrow. */
            printf( __( 'To the top %s', 'orissa' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
            ?>
            </span>
            <span class="to-the-top-short">
                <?php
							/* translators: %s: HTML character for up arrow. */
							printf( __( 'Up %s', 'orissa' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
            </span><!-- .to-the-top-short -->
        </a><!-- .to-the-top -->

    </div><!-- .section-inner -->

</footer><!-- #site-footer -->

<?php wp_footer(); ?>