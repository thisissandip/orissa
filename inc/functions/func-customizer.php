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
 }

add_action( 'customize_register', 'register_orissa_customizer_sections' );
?>