<?php

/**
 *  Slideshow
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slideshow-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slideshow';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Block preview
if( !empty( $block['data']['is_example'] ) ) { ?>
    <img src="<?php echo get_theme_file_uri(); ?>/blocks/preview/Slideshow.jpg" alt="">
<?php } 

// Load values and assign defaults.
$imageTitle = get_sub_field('s_title') ?: 'Enter your title';


?>

<section class='slider__section  <?php echo esc_attr($className); ?>' id="<?php echo esc_attr($id); ?>">
    <div class="container-wrap">

        <?php if (have_rows('slider_group')) : ?>

            <div class="slick-slider">

                <?php while (have_rows('slider_group')) : the_row(); ?>
                    <div class="swiper-slide carousel-cell">

                        <?php echo wp_get_attachment_image( get_sub_field('s_image'), 'full');   ?>

                        <div class="swiper-slide__content">
                            <h1 class='white'><?php echo $imageTitle; ?></h1>
                        </div>
            
                    </div>
                <?php endwhile; ?>

            </div>

        <?php endif; ?>

    </div>


</section>


