

<?php

/**
 * Newspace Portfolio section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block__portfolio-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block__portfolio';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


?>



<section data-block="<?php echo esc_attr($className); ?>" class="full-width-section <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>" data-block='<?php echo esc_attr($className); ?>'>  


<div class="p__portfolio__inner">

<div class="portfolio__box">

        <div class="portfolio__text__group">

                <div class="portfolio__text__inner">
                <h4 class='b-portfolio__subtitle'><?php the_field('title'); ?></h4>
                  <h2 class='b-portfolio__title'><?php the_field('description'); ?></h2>

                  <?php 
                    $button = get_field('button');


                    if( $button ): 
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>

                        <a class="text-button-black b-portfolio__button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
                    <?php endif; ?>
                </div>


            <div class="portfolio__box-right">
            <?php echo file_get_contents( get_stylesheet_directory_uri() . '/build/images/ns-symbol.svg' ); ?>
            </div>


        </div>




</div>


</div>

</section>



