

<?php

/**
 * Newspace Gallery Slider Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-gallery-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-gallery-slider';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
// if( !empty($block['align']) ) {
//     $className .= ' align' . $block['align'];
// }


?>

<section class="full-width-section <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>" data-block='<?php echo esc_attr($className); ?>'>  
        <div class="ns-gallery--slider-inner">

        <?php if( have_rows('gallery_item') ): ?>
                <div class="gallery-slider-parent">
                   
                        <?php while( have_rows('gallery_item') ) : the_row(); ?>

                        <div class="ns--gallery--slider--item">
                         <?php echo wp_get_attachment_image( get_sub_field('image') , 'full'); ?>
                        </div>

                        <?php endwhile; ?>
                   
                </div>

        <?php endif; ?>
 
        </div>

</section>