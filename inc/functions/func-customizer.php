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

        /**
        * Add Color Options to customizer
        */

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

        $wp_customize->add_setting( 'button_color' , array(
            'default'     => "#cf8eff",
            'transport'   => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_color', array(
            'label'        => __( 'Button Color', 'orissa' ),
            'section'    => 'colors',
        ) ) );

               // Content text color

            $wp_customize->add_setting( 'content_text_color' , array(
                'default'     => "#000",
                'transport'   => 'refresh',
            ) );
    
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text_color', array(
                'label'        => __( 'Content Text Color', 'orissa' ),
                'section'    => 'colors',
            ) ) );

        // Nav and Search Bg color
        $wp_customize->add_setting( 'nav_search_bg_color' , array(
            'default'     => "#000",
            'transport'   => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_search_bg_color', array(
            'label'        => __( 'Navigation and Search Backgrounf Color', 'orissa' ),
            'section'    => 'colors',
        ) ) );

        /**
        * Option to hide Site Title and Tagline 
        */

        // Add "display_title" setting for displaying the site-title & tagline.
			$wp_customize->add_setting(
				'display_title',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => 'sanitize_checkbox',
				)
			);

        // Add control for the "display_title" setting.
			$wp_customize->add_control(
				'display_title',
				array(
					'type'    => 'checkbox',
					'section' => 'title_tagline',
					'label'   => esc_html__( 'Display Site Title', 'orissa' ),
				)
			);

        // Add "display_description" setting for displaying the site-title & tagline.
			$wp_customize->add_setting(
				'display_description',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => 'sanitize_checkbox',
				)
			);

        // Add control for the "display_description" setting.
			$wp_customize->add_control(
				'display_description',
				array(
					'type'    => 'checkbox',
					'section' => 'title_tagline',
					'label'   => esc_html__( 'Display Site Tagline', 'orissa' ),
				)
			);
        
       /**
        * Options for Pagination
        */

        $wp_customize->add_section('orissa-theme-pagination-settings', 
        array(
            'title'    => esc_html__( 'Pagination Settings', 'orissa' ),
            'priority' => 120,
        ));

        $wp_customize->add_setting(
            'orissa_pagination_type',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => 'load_more_pagination',
                'sanitize_callback' => function( $value ) {
                    return 'numbered_pagination' === $value || 'load_more_pagination' === $value ? $value : 'load_more_pagination';
                },
            )
        );

        $wp_customize->add_control(
            'orissa_pagination_type',
            array(
                'type'    => 'radio',
                'section' => 'orissa-theme-pagination-settings',
                'label'   => esc_html__( 'On Archive Pages, posts show:', 'orissa' ),
                'choices' => array(
                    'numbered_pagination' => esc_html__( 'Numbered Pagination', 'orissa' ),
                    'load_more_pagination'    => esc_html__( 'Dynamic Pagination - Load More button', 'orissa' ),
                ),
            )
        );
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

main {
    color: <?php echo get_theme_mod('content_text_color', "#000000");
    ?>;
}

.header-modal,
.search-modal {
    background: <?php echo get_theme_mod('nav_search_bg_color', "#000000");
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
:root .woocommerce input.button,
.wp-block-search .wp-block-search__button {
    background: <?php echo get_theme_mod('button_color', "#000000");
    ?>;
}
</style>
<?php
}
add_action( 'wp_head', 'mytheme_customize_css');

function sanitize_checkbox( $checked = null ) {
    return (bool) isset( $checked ) && true === $checked;
}