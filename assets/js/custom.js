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

        // Toggle Drawer Menu
        $('.bollu-hamburger-btn, .bollu-drawer-overlay, .bollu-drawer-close').on('click', function(e) {
            e.preventDefault();
            $('.bollu-drawer-menu').toggleClass('is-active');
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

        // Run check on load and scroll
        $(window).on('scroll resize', checkScroll);
        setTimeout(checkScroll, 100);
    });

})(jQuery);
