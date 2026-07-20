/**
 * Custom JavaScript for Astra Child Theme (Bollu.ru Style)
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 800);
            }
        });

        // Simple reveal on scroll
        var $revealElements = $('.category-card, .product-card, .showcase-content, .section-header');
        
        function checkScroll() {
            var triggerPoint = $(window).height() * 0.9;
            $revealElements.each(function() {
                var elementTop = $(this).offset().top;
                var scrollTop = $(window).scrollTop();
                
                if (elementTop - scrollTop < triggerPoint) {
                    $(this).css({
                        'opacity': '1',
                        'transform': 'translateY(0)',
                        'transition': 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)'
                    });
                }
            });
        }

        // Initialize transition styles for elements
        $revealElements.css({
            'opacity': '0',
            'transform': 'translateY(30px)'
        });

        // Toggle Certificate Banner
        $('.bollu-toggle-btn').on('click', function(e) {
            e.preventDefault();
            var $banner = $('.bollu-top-certificate-banner');
            var $main = $('.bollu-certificate-main');
            
            $main.slideToggle(300);
            $banner.toggleClass('is-closed');
            
            // Update aria-expanded attribute
            var expanded = $banner.hasClass('is-closed') ? 'false' : 'true';
            $(this).attr('aria-expanded', expanded);
        });

        // ===== Side Panel (Bollu.ru Style) =====
        var $sidePanel = $('#mobile-menu');
        var $sidePanelOverlay = $sidePanel.find('.side-panel-overlay');
        var $sidePanelClose = $sidePanel.find('.side-panel-close');

        // Open side panel
        $('.bollu-hamburger-btn').on('click', function(e) {
            e.preventDefault();
            $sidePanel.addClass('is-active');
            $('body').addClass('side-panel-open');
        });

        // Close side panel
        function closeSidePanel() {
            $sidePanel.removeClass('is-active');
            $('body').removeClass('side-panel-open');
        }

        $sidePanelClose.on('click', function(e) {
            e.preventDefault();
            closeSidePanel();
        });

        $sidePanelOverlay.on('click', function(e) {
            closeSidePanel();
        });

        // Close on Escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $sidePanel.hasClass('is-active')) {
                closeSidePanel();
            }
        });

        // ===== Submenu Accordion Toggles =====
        // Dynamically inject toggle buttons for menu items with children (and page_item_has_children)
        $sidePanel.find('.menu-item-has-children, .page_item_has_children').each(function() {
            var $item = $(this);
            // Only add toggle if not already present
            if (!$item.find('> .side-menu-toggle').length) {
                var $toggle = $('<button class="side-menu-toggle" aria-label="Toggle submenu"></button>');
                $item.append($toggle);
            }
        });

        // Handle submenu toggle click
        $sidePanel.on('click', '.side-menu-toggle', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var $toggle = $(this);
            var $subMenu = $toggle.siblings('.sub-menu, .children');
            
            $toggle.toggleClass('is-open');
            $subMenu.toggleClass('is-open');
            
            // Slide animation
            if ($subMenu.hasClass('is-open')) {
                $subMenu.stop().slideDown(250);
            } else {
                $subMenu.stop().slideUp(200);
            }
        });

        // Toggle Search Overlay
        var $searchOverlay = $('#bolluSearchOverlay');
        var $searchInput = $searchOverlay.find('.bollu-search-input');

        $('.bollu-search-trigger').on('click', function(e) {
            e.preventDefault();
            $searchOverlay.addClass('is-active');
            $('body').addClass('bollu-search-open');
            setTimeout(function() {
                $searchInput.focus();
            }, 300); // Focus input after transition completes
        });

        // Close Search Overlay
        $('.bollu-search-close').on('click', function(e) {
            e.preventDefault();
            closeSearchOverlay();
        });

        // Close on clicking outside the container (on the overlay background)
        $searchOverlay.on('click', function(e) {
            if ($(e.target).is($searchOverlay)) {
                closeSearchOverlay();
            }
        });

        // Close on Escape key press
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $searchOverlay.hasClass('is-active')) {
                closeSearchOverlay();
            }
        });

        function closeSearchOverlay() {
            $searchOverlay.removeClass('is-active');
            $('body').removeClass('bollu-search-open');
            $searchInput.val(''); // Optional: clear input on close
        }

        // Make entire product card clickable
        $(document).on('click', '.product-card, ul.products li.product', function(e) {
            // If user clicked directly on an <a> link or interactive button, let standard behavior handle it
            if ($(e.target).is('a, button, input, select') || $(e.target).closest('a, button, input, select').length > 0) {
                return;
            }

            var $link = $(this).find('a[href]').first();
            if ($link.length) {
                var href = $link.attr('href');
                if (href && href !== '#') {
                    if (e.ctrlKey || e.metaKey || e.which === 2) {
                        window.open(href, '_blank');
                    } else {
                        window.location.href = href;
                    }
                }
            }
        });

        // Run check on load and scroll
        $(window).on('scroll resize', checkScroll);
        setTimeout(checkScroll, 100);
    });

})(jQuery);
