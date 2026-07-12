<?php
/**
 * General theme setup and asset enqueuing
 *
 * @package Astra Child
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue styles and scripts
 */
function astra_child_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    // Google Fonts for Luxury Aesthetic (Outfit for headers, Inter for body, Tajawal for Arabic)
    wp_enqueue_style( 'luxury-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@300;400;500;600;700&family=Tajawal:wght@300;400;500;700&display=swap', array(), null );

    // Custom CSS for child theme
    wp_enqueue_style( 'astra-child-custom-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', array( 'parent-style' ), filemtime( get_stylesheet_directory() . '/assets/css/custom.css' ), 'all' );

    // Custom JS for child theme
    wp_enqueue_script( 'astra-child-custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/js/custom.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles', 9999 );
