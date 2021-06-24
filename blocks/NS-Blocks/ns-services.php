<?php

/**
 *  Newspace Slideshow
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}



?>

<section data-block='<?php echo esc_attr($className); ?>' class="<?php echo esc_attr($className); ?>">
    <div class="ns-wrapper">
        <div class="types__inner">

            <?php if (have_rows('services_slider')) : ?>
            <div class="types__bg">
                <?php while (have_rows('services_slider')) : the_row(); ?>

                <?php if( get_sub_field('image') ): ?>
                <div class="types__img" style="background-image: url('<?php the_sub_field('image'); ?>');"
                    data-title='<?php echo sanitize_title( get_sub_field('title') ); ?>'></div>
                <?php endif; ?>

                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <?php if (have_rows('services_slider')) : ?>
            <div class="types__list">
                <?php while (have_rows('services_slider')) : the_row(); ?>

                <?php               
                $button =  get_sub_field('button');

                if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';      
                ?>

                <a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"
                    class="card types__card" data-title='<?php echo sanitize_title( get_sub_field('title') ); ?>'>

                    <div class="card__bg" style="background-image: url('<?php the_sub_field('image'); ?>');">
                        <div class="card__mask"></div>
                    </div>
                    <div class="card__content">
                        <h3 class="slider__item-heading js-heading"> <?php the_sub_field('title'); ?> </h3>
                        <button class="text-button">
                            <p><?php echo esc_html( $button_title ); ?></p>
                        </button>

                    </div>


                </a>

                <?php endif; ?>



                <?php endwhile; ?>
            </div>
            <?php endif; ?>



        </div>

    </div>

</section>