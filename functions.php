<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// 1. Theme setup and asset enqueuing
require_once get_stylesheet_directory() . '/inc/setup.php';

// 2. Custom header and certificate banner helper functions and hooks
require_once get_stylesheet_directory() . '/inc/header-functions.php';

// 3. WooCommerce custom helpers and categories queries
require_once get_stylesheet_directory() . '/inc/woocommerce.php';

// 4. Custom footer functions and copyright text override
require_once get_stylesheet_directory() . '/inc/footer-functions.php';

