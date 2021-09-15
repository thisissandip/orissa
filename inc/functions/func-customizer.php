<?php
/**
 * Orissa theme Customizer
 */

 global $wp_customize;

 function register_orissa_customizer_sections($wp_customize){
        /**
		 * Add excerpt or full text selector to customizer
		 */
        $wp_customize->add_section('orissa-theme-excerpt-settings', 
        array(
            'title'    => esc_html__( 'Excerpt Settings', 'orissa' ),
            'priority' => 120,
        ));

        $wp_customize->add_setting(
            'orissa_display_excerpt_or_full_post',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => 'excerpt',
                'sanitize_callback' => function( $value ) {
                    return 'excerpt' === $value || 'full' === $value ? $value : 'excerpt';
                },
            )
        );

        $wp_customize->add_control(
            'orissa_display_excerpt_or_full_post',
            array(
                'type'    => 'radio',
                'section' => 'orissa-theme-excerpt-settings',
                'label'   => esc_html__( 'On Archive Pages, posts show:', 'orissa' ),
                'choices' => array(
                    'excerpt' => esc_html__( 'Summary', 'orissa' ),
                    'full'    => esc_html__( 'Full text', 'orissa' ),
                ),
            )
        );

        //Color Options

        // header
        $wp_customize->add_setting( 'header_textcolor' , array(
            'default'     => "#000000",
            'transport'   => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
            'label'        => __( 'Header Color', 'orissa' ),
            'section'    => 'colors',
        ) ) );

         // link
        $wp_customize->add_setting( 'link_textcolor' , array(
            'default'     => "#cf8eff",
            'transport'   => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_textcolor', array(
            'label'        => __( 'Link Color', 'orissa' ),
            'section'    => 'colors',
        ) ) );

        // buttons

        $wp_customize->add_setting( 'button_bgcolor' , array(
            'default'     => "#cf8eff",
            'transport'   => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_bgcolor', array(
            'label'        => __( 'Button Color', 'orissa' ),
            'section'    => 'colors',
        ) ) );
 }

add_action( 'customize_register', 'register_orissa_customizer_sections' );

function mytheme_customize_css()
{
    ?>
<style type="text/css">
h1,
h2,
h3,
h4,
h5,
h6 {
    color: #<?php echo get_theme_mod('header_textcolor', "#000000");
    ?>;
}

a {
    color: <?php echo get_theme_mod('link_textcolor', "#000000");
    ?>;
}

button,
.button,
.faux-button,
.wp-block-button__link,
:root .wp-block-file__button,
input[type='button'],
input[type='reset'],
input[type='submit'],
:root .woocommerce #respond input#submit,
:root .woocommerce a.button,
:root .woocommerce button.button,
:root .woocommerce input.button {
    background: <?php echo get_theme_mod('button_bgcolor', "#000000");
    ?> !important;
}
</style>
<?php
}
add_action( 'wp_head', 'mytheme_customize_css');