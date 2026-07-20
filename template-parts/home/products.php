<?php
/**
 * Template part for displaying the products grid section on the homepage.
 *
 * @package Astra Child
 * @since 1.0.0
 */
?>

<section id="products" class="bollu-section alt-bg">

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
                    <a href="<?php the_permalink(); ?>" class="product-card-image-wrap">
                        <div class="product-card-image" style="background-image: url('<?php echo esc_url( $image_url ); ?>');"></div>
                        <?php if ( $product->is_on_sale() ) : ?>
                            <span class="product-badge-sale">خصم مميز</span>
                        <?php endif; ?>
                    </a>
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
