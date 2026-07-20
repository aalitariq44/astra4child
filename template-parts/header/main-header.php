<?php
/**
 * Template part for displaying the main header navigation and drawer menu.
 *
 * @package Astra Child
 * @since 1.0.0
 */
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
                <a href="mailto:info@kezanelite.com" class="contact-link">info@kezanelite.com</a>
                <span class="divider">|</span>
                <a href="tel:+9647709588489" class="contact-link">+964 770 958 8489</a>
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
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" class="custom-logo" alt="kezanelite" />
                <span class="custom-logo-text">kezanelite</span>
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
