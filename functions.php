<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Enqueue styles and scripts
 */
function astra_child_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    // Google Fonts for Luxury Aesthetic (Outfit for headers, Inter for body)
    wp_enqueue_style( 'luxury-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@300;400;500;600;700&display=swap', array(), null );

    // Custom CSS for child theme
    wp_enqueue_style( 'astra-child-custom-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', array( 'parent-style' ), '1.0.0', 'all' );

    // Custom JS for child theme
    wp_enqueue_script( 'astra-child-custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles', 15 );

/**
 * Helper function to retrieve categories with images
 */
function get_bollu_categories() {
    $terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'exclude'    => array( get_option( 'default_product_cat' ) ), // Exclude Uncategorized
    ]);

    $categories = [];
    if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
        foreach ( $terms as $term ) {
            $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
            $image_url = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src();
            $categories[] = [
                'id'          => $term->term_id,
                'name'        => $term->name,
                'slug'        => $term->slug,
                'description' => $term->description,
                'url'         => get_term_link( $term ),
                'image'       => $image_url,
            ];
        }
    }
    return $categories;
}

/**
 * Render the Bollu-style Certificate of Origin banner before header
 */
function astra_child_certificate_banner() {
    if ( ! is_front_page() ) {
        return;
    }
    ?>
    <div class="bollu-top-certificate-banner is-closed">
        <div class="bollu-top-bar-dark">
            <button class="bollu-toggle-btn" aria-controls="bollu-certificate-main" aria-expanded="false">
                <span class="bollu-top-bar-text">The Original</span>
                <span class="bollu-toggle-icon">▼</span>
            </button>
        </div>
        <div id="bollu-certificate-main" class="bollu-certificate-main" style="display: none;">
            <div class="bollu-cert-container">
                <div class="bollu-cert-logo-section">
                    <div class="bollu-cert-shield-gold">
                        <span class="gold-b">B</span>
                    </div>
                    <div class="bollu-cert-text-block">
                        <span class="cert-subtitle">CERTIFICATE OF ORIGIN</span>
                        <h3 class="cert-title">The Original by BOLLU</h3>
                        <span class="cert-tagline">FURNITURE AS ART</span>
                    </div>
                </div>
                <div class="bollu-cert-features-section">
                    <div class="cert-feature-col">
                        <div class="cert-feature-icon-wrap">
                            <span class="gold-check">✓</span>
                        </div>
                        <div class="cert-feature-text">
                            <h4>OFFICIAL COLLECTION</h4>
                            <p>التشكيلات الأصلية تُعرض فقط وحصرياً على موقعنا الرسمي.</p>
                        </div>
                    </div>
                    <div class="cert-feature-col">
                        <div class="cert-feature-icon-wrap">
                            <span class="gold-check">✓</span>
                        </div>
                        <div class="cert-feature-text">
                            <h4>DIRECT FROM THE MAISON</h4>
                            <p>نحن لا نتعامل مع الوسطاء أو المنصات الخارجية لضمان الجودة.</p>
                        </div>
                    </div>
                    <div class="cert-feature-col">
                        <div class="cert-feature-icon-wrap">
                            <span class="gold-check">✓</span>
                        </div>
                        <div class="cert-feature-text">
                            <h4>HAND-PAINTED ORIGINALS</h4>
                            <p>يتم توثيق أصالة الخامات والتفاصيل الفنية من خلال موقعنا.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
add_action( 'astra_header_before', 'astra_child_certificate_banner' );

/**
 * Override default custom logo with custom SVG & Site Title
 */
function astra_child_custom_logo_override( $html ) {
    $logo_url = get_stylesheet_directory_uri() . '/assets/images/logo.svg';
    $site_url = home_url( '/' );
    
    $html = sprintf(
        '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">' .
        '<img src="%2$s" class="custom-logo" alt="%3$s" itemprop="logo" />' .
        '<span class="custom-logo-text">%3$s</span>' .
        '</a>',
        esc_url( $site_url ),
        esc_url( $logo_url ),
        esc_attr( 'kizanelite' )
    );
    
    return $html;
}
add_filter( 'get_custom_logo', 'astra_child_custom_logo_override' );
add_filter( 'theme_mod_custom_logo', function( $value ) {
    return 28; // Return dummy attachment ID to force custom logo output
} );
add_filter( 'pre_option_ast-site-logo', function( $value ) {
    return 28; // Return dummy attachment ID to force Astra custom logo
} );
