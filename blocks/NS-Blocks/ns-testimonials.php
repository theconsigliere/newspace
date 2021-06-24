

<?php

/**
 * Newspace Testimonial Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-testimonial';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
// if( !empty($block['align']) ) {
//     $className .= ' align' . $block['align'];
// }


?>




<section data-block="<?php echo esc_attr($className); ?>" class="full-width-section <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>">  

        <div class="ns-testimonials-inner">
            <div class="title__choice">
                <h6><?php the_field('subtitle'); ?></h6>
                <div class="text-holder">
                    <h3><?php the_field('Title'); ?></h3>
                </div>

                <div class="pipe">
                    <div class="pipe-inner"></div>
                </div>
            </div>


            <?php if( have_rows('add_testimonial') ): ?>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php while( have_rows('add_testimonial') ) : the_row(); ?>

                        <div class="testimonial__item swiper-slide">

                            <h6 class="testimonial__quote"><?php the_sub_field('quote');?></h6>
                            <p class="testimonial__name"><?php the_sub_field('name');?></p>
                            <p class="testimonial__company"><?php the_sub_field('company');?></p> 
                        </div>

                        <?php endwhile; ?>
                    </div>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div> -->

                        <!-- If we need scrollbar -->
                       <!-- <div class="swiper-scrollbar"></div> -->

                </div>

             <?php endif; ?>
          
        </div>

</section>

