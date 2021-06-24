<?php

/**
 *  Gallery Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gallery__section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}



// Block preview

$title = get_field('gallery_title');
$images = get_field('gallery');


?>

<section class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

    <div class="container-wrap">

        <div class="container ">

            <?php if ( $title ) { ?>

            <div class="title-section">
                <h1><?php echo $title; ?></h1>

            </div>

            <?php } ?>


            <?php if (have_rows('add_gallery')) : ?>

            <div class="gallery-section-full js-gallery">

                <?php while (have_rows('add_gallery')) : the_row(); ?>

                <?php echo wp_get_attachment_image( get_sub_field('image_item'), 'full', "", array( "title" => get_sub_field('image_title'), 'data-description' => get_sub_field('image_description') ));   ?>

                <?php endwhile; ?>

            </div>

            <?php endif; ?>
        </div>

    </div>

    <div class="gallery-modal">
        <div class="gallery-modalInner">
            <button aria-label="Previous Photo" class="prev">←</button>
            <figure>
                <img src="<?php bloginfo('template_directory'); ?>/images/default-image.jpg"
                    alt="<?php the_title(); ?>" />
                <figcaption>
                    <h2></h2>
                    <p></p>
                </figcaption>
            </figure>
            <button class="next" aria-label="Next Photo">→</button>
        </div>
    </div>
    </div>



</section>