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
                    <a href="tel:+9647709588489" class="contact-link">+964 770 958 8489</a>
                    <span class="divider">|</span>
                    <a href="mailto:info@kezanelite.com" class="contact-link">info@kezanelite.com</a>
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

        <!-- Slide-out Side Panel (Bollu.ru Style) -->
        <nav id="mobile-menu" class="side-panel side-mobile-menu">
            <div class="side-panel-overlay"></div>
            <div class="side-panel-inner">

                <!-- Panel Header with Close Button -->
                <header class="side-panel-header">
                    <div class="side-panel-header-inner">
                        <button class="side-panel-close" aria-label="إغلاق القائمة">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                </header>

                <!-- Scrollable Panel Content -->
                <div class="side-panel-content">

                    <!-- Navigation Menu -->
                    <div id="side-menu-container" class="side-menu-nav">
                        <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'primary',
                            'menu_id'         => 'side-panel-menu',
                            'menu_class'      => 'side-panel-menu-list',
                            'container'       => false,
                            'walker'          => class_exists( 'Kezan_Side_Menu_Walker' ) ? new Kezan_Side_Menu_Walker() : null,
                        ) );
                        ?>
                    </div>

                    <!-- Contact Section at Bottom -->
                    <div class="side-panel-contact">
                        <div class="side-panel-contact-rule"></div>
                        <div class="side-panel-contact-heading">KEZAN ELITE — THE HOUSE</div>
                        
                        <a class="side-panel-contact-row" href="tel:+9647709588489">
                            <span class="side-panel-contact-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </span>
                            <span>+964 770 958 8489</span>
                        </a>
                        
                        <a class="side-panel-contact-row" href="mailto:info@kezanelite.com">
                            <span class="side-panel-contact-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </span>
                            <span>info@kezanelite.com</span>
                        </a>
                        
                        <div class="side-panel-contact-row side-panel-contact-address">
                            <span class="side-panel-contact-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </span>
                            <span>بولشوي سافينسكي، 12، مبنى 8</span>
                        </div>
                        
                        <div class="side-panel-contact-city">موسكو · روسيا</div>
                    </div>

                </div>
            </div>
        </nav>

        <!-- Search Overlay -->
        <div class="bollu-search-overlay" id="bolluSearchOverlay">
            <div class="bollu-search-top-bar">
                <div class="bollu-search-container">
                    <form role="search" method="get" class="bollu-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <span class="bollu-search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </span>
                        <input type="search" class="bollu-search-input" placeholder="البحث عن المنتجات..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
                        <input type="hidden" name="post_type" value="product" />
                    </form>
                    <button class="bollu-search-close" id="bolluSearchClose" aria-label="Close Search">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
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
