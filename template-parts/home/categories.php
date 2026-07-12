<?php
/**
 * Template part for displaying the categories grid section on the homepage.
 *
 * @package Astra Child
 * @since 1.0.0
 */
?>

<section id="collections" class="bollu-section">

    <div class="categories-grid">
        <?php
        $categories = get_bollu_categories();
        if ( ! empty( $categories ) ) :
            $categories = array_slice( $categories, 0, 6 );
            $index = 0;
            foreach ( $categories as $cat ) :
                $card_class = ( $index < 2 ) ? 'category-card card-rect' : 'category-card card-square';
                ?>
                <div class="<?php echo esc_attr( $card_class ); ?>">
                    <div class="category-card-image" style="background-image: url('<?php echo esc_url( $cat['image'] ); ?>');"></div>
                    <div class="category-card-content">
                        <h3 class="category-card-title"><?php echo esc_html( $cat['name'] ); ?></h3>
                        <a href="<?php echo esc_url( $cat['url'] ); ?>" class="category-card-link">تصفح المعرض</a>
                    </div>
                </div>
                <?php
                $index++;
            endforeach;
        else :
            echo '<p style="text-align:center; width:100%;">لم يتم العثور على أي أقسام بعد.</p>';
        endif;
        ?>
    </div>
</section>
