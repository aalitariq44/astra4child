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

        // Run check on load and scroll
        $(window).on('scroll resize', checkScroll);
        setTimeout(checkScroll, 100);
    });

})(jQuery);
