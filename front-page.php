<?php
/**
 * The template for displaying the custom luxury homepage.
 *
 * @package Astra Child
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();

// 1. Fetch Hero Background Image (Nano Banana Pendant Lamp - SKU: 'nano-prod-3')
$hero_image = '';
$hero_query = new WP_Query([
    'post_type'      => 'product',
    'posts_per_page' => 1,
    'meta_query'     => [
        [
            'key'     => '_sku',
            'value'   => 'nano-prod-3',
            'compare' => '='
        ]
    ]
]);
if ( $hero_query->have_posts() ) {
    while ( $hero_query->have_posts() ) {
        $hero_query->the_post();
        $hero_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    }
    wp_reset_postdata();
}
if ( empty( $hero_image ) ) {
    $hero_image = get_stylesheet_directory_uri() . '/assets/images/hero-fallback.jpg'; // Fallback
}

// 2. Fetch Split Showcase Image (Art Object Sculpture - SKU: 'nano-prod-6')
$showcase_image = '';
$showcase_query = new WP_Query([
    'post_type'      => 'product',
    'posts_per_page' => 1,
    'meta_query'     => [
        [
            'key'     => '_sku',
            'value'   => 'nano-prod-6',
            'compare' => '='
        ]
    ]
]);
if ( $showcase_query->have_posts() ) {
    while ( $showcase_query->have_posts() ) {
        $showcase_query->the_post();
        $showcase_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    }
    wp_reset_postdata();
}
?>

<!-- Hero Section -->
<section class="bollu-hero" style="background-image: url('<?php echo esc_url( $hero_image ); ?>');">
    <div class="bollu-hero-content">
        <span class="bollu-hero-tagline">BOLLU & NANO BANANA</span>
        <h1>مجموعة نانو بانانا الفنية<br>الأثاث كـ فن وتصميم راقٍ</h1>
        <p>تصاميم قطع أثاث وتحف فنية فريدة، مخصصة ومصنوعة يدوياً بمواد ممتازة لتمنح مساحتك الخاصة فخامة لا تُنسى.</p>
        <a href="#collections" class="bollu-btn-gold">استكشف المجموعة</a>
    </div>
</section>

<!-- 6 Categories Section -->
<section id="collections" class="bollu-section">
    <div class="section-header">
        <span class="section-subtitle">المجموعات الفنية</span>
        <h2 class="section-title">أقسام المعرض</h2>
    </div>

    <div class="categories-grid">
        <?php
        $categories = get_bollu_categories();
        if ( ! empty( $categories ) ) :
            foreach ( $categories as $cat ) :
                ?>
                <div class="category-card">
                    <div class="category-card-image" style="background-image: url('<?php echo esc_url( $cat['image'] ); ?>');"></div>
                    <div class="category-card-content">
                        <h3 class="category-card-title"><?php echo esc_html( $cat['name'] ); ?></h3>
                        <a href="<?php echo esc_url( $cat['url'] ); ?>" class="category-card-link">تصفح المعرض</a>
                    </div>
                </div>
                <?php
            endforeach;
        else :
            echo '<p style="text-align:center; width:100%;">لم يتم العثور على أي أقسام بعد.</p>';
        endif;
        ?>
    </div>
</section>

<!-- Split Gallery Showcase Section -->
<section class="bollu-showcase">
    <div class="showcase-half">
        <div class="showcase-image" style="background-image: url('<?php echo esc_url( $showcase_image ); ?>');"></div>
    </div>
    <div class="showcase-half">
        <div class="showcase-content">
            <span class="section-subtitle">الفلسفة والتصميم</span>
            <h3>تصنيع يدوي مخصص وفوق العادة</h3>
            <p>كل قطعة في تشكيلة نانو بانانا تجسد التناغم المثالي بين الفن والوظيفة العملية. ندمج النحاس المصقول والرخام الأسود والمخمل الزمردي لصنع قطع تعيش معك كتحف فنية خالدة.</p>
            <div>
                <a href="#products" class="bollu-btn-gold">شاهد كافة المنتجات</a>
            </div>
        </div>
    </div>
</section>

<!-- 10 Products Section -->
<section id="products" class="bollu-section alt-bg">
    <div class="section-header">
        <span class="section-subtitle">متجر التحف الفنية</span>
        <h2 class="section-title">التشكيلة الحالية</h2>
    </div>

    <div class="products-grid">
        <?php
        $product_query = new WP_Query([
            'post_type'      => 'product',
            'posts_per_page' => 10,
            'post_status'    => 'publish'
        ]);

        if ( $product_query->have_posts() ) :
            while ( $product_query->have_posts() ) : $product_query->the_post();
                global $product;
                if ( ! is_object( $product ) ) {
                    $product = wc_get_product( get_the_ID() );
                }
                
                $post_id = get_the_ID();
                $image_url = get_the_post_thumbnail_url( $post_id, 'woocommerce_thumbnail' );
                $regular_price = $product->get_regular_price();
                $sale_price = $product->get_sale_price();
                
                // Get primary product category name
                $terms = get_the_terms( $post_id, 'product_cat' );
                $cat_name = ! empty( $terms ) ? $terms[0]->name : 'تحفة فنية';
                ?>
                <div class="product-card">
                    <div class="product-card-image-wrap">
                        <div class="product-card-image" style="background-image: url('<?php echo esc_url( $image_url ); ?>');"></div>
                        <?php if ( $product->is_on_sale() ) : ?>
                            <span class="product-badge-sale">خصم مميز</span>
                        <?php endif; ?>
                    </div>
                    <div class="product-card-info">
                        <span class="product-card-category"><?php echo esc_html( $cat_name ); ?></span>
                        <h3 class="product-card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="product-card-price">
                            <?php if ( $product->is_on_sale() && ! empty( $regular_price ) ) : ?>
                                <span class="price-regular">$<?php echo esc_html( $regular_price ); ?></span>
                                <span class="price-sale">$<?php echo esc_html( $sale_price ); ?></span>
                            <?php else : ?>
                                <span class="price-sale">$<?php echo esc_html( $product->get_price() ); ?></span>
                            <?php endif; ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="product-card-btn">تفاصيل القطعة</a>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p style="text-align:center; width:100%;">لم يتم العثور على أي منتجات بعد.</p>';
        endif;
        ?>
    </div>
</section>

<?php
get_footer();
