<?php
/**
 * Footer-related hooks and functions
 *
 * @package Astra Child
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter the Astra footer copyright text to remove the "Powered by Astra" credit.
 */
function astra_child_custom_footer_copyright_text( $default_text ) {
    // Return custom copyright text without Astra branding
    return 'Copyright [copyright] [current_year] [site_title]';
}
add_filter( 'astra_get_option_footer-copyright-editor', 'astra_child_custom_footer_copyright_text' );
add_filter( 'astra_get_option_footer-sml-section-1-credit', 'astra_child_custom_footer_copyright_text' );
add_filter( 'astra_get_option_footer-sml-section-2-credit', 'astra_child_custom_footer_copyright_text' );
