<?php
/**
 * The header for our custom luxury Astra Child Theme.
 *
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @package Astra Child
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	<link rel="profile" href="https://gmpg.org/xfn/11"> 
	<?php
}
?>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content">
	<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div <?php echo wp_kses_post( astra_attr( 'site', array( 'id' => 'page', 'class' => 'hfeed site' ) ) ); ?>>
	<?php
	// Render the Certificate of Origin banner above header
	astra_header_before();
	?>

    <!-- Custom Luxury Header (Bollu.ru Style) -->
    <header id="masthead" class="site-header custom-bollu-header" role="banner">
        <!-- Sub-header (Top Navigation Bar) -->
        <div class="bollu-sub-header">
            <div class="bollu-sub-header-container">
                <!-- Left side: Menu links (SHOP, SAMPLE PAGE...) -->
                <div class="bollu-sub-menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu-sub',
                        'container'      => false,
                        'fallback_cb'    => 'astra_default_menu'
                    ) );
                    ?>
                </div>
                <!-- Right side: Contact Info -->
                <div class="bollu-sub-contact">
                    <a href="tel:+79938968078" class="contact-link">+7 (993) 896-80-78</a>
                    <span class="divider">|</span>
                    <a href="mailto:info@kizanelite.com" class="contact-link">info@kizanelite.com</a>
                </div>
            </div>
        </div>

        <!-- Main Header Bar -->
        <div class="bollu-main-header">
            <div class="bollu-main-header-container">
                <!-- Left side: Hamburger button + Logo next to it -->
                <div class="bollu-header-left">
                    <button class="bollu-hamburger-btn" aria-label="Open Menu">
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                    </button>
                    <div class="bollu-header-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                </div>
                <!-- Right side: Search minimal icon -->
                <div class="bollu-header-right">
                    <a href="#" class="bollu-search-trigger" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide-out Drawer Panel -->
        <div class="bollu-drawer-menu">
            <div class="bollu-drawer-overlay"></div>
            <div class="bollu-drawer-content">
                <button class="bollu-drawer-close" aria-label="Close Menu">&times;</button>
                <div class="bollu-drawer-logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" class="custom-logo" alt="kizanelite" />
                    <span class="custom-logo-text">kizanelite</span>
                </div>
                <div class="bollu-drawer-nav">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu-drawer',
                        'container'      => false,
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </header>

	<?php
	astra_header_after();

	astra_content_before();
	?>
	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>
