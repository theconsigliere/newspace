

<?php

/**
 * Newspace Page Navigator
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'page__navigator-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'page__navigator';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


?>




<section class="full-width-section <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>" data-block='<?php echo esc_attr($className); ?>'>  

        <div class="pn__inner">

        <div class="pn__small">

            <div class="box">
<div class="box__inner">

<?php 
                    $button = get_field('box');


                    if( $button ): 
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>

                        <h3 class='white box__title'><?php the_field('box_title'); ?></h3>
                        <a class="text-button-black" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
                    <?php endif; ?>
</div>

                    <div class="box-right">
                        <?php echo file_get_contents( get_stylesheet_directory_uri() . '/build/images/down-arrow.svg' ); ?>
                    </div>
                </div>
        
        </div>

        <div class="pn__large">

        <h5><?php the_field('title'); ?></h5>

        <?php if( have_rows('add_a_page') ): ?>
                    <div class="pn__page__group">
                        <?php while( have_rows('add_a_page') ) : the_row(); ?>

                        <div class="pn__page__link">

                        <div class="pn__page__image">
                            <?php echo wp_get_attachment_image( get_sub_field('image') , 'full'); ?>
                        </div>

                        <div class="pn__page__bottom">

                        <?php 
                            $button = get_field('box');


                            if( $button ): 
                                $button_url = $button['url'];
                                $button_title = $button['title'];
                                $button_target = $button['target'] ? $button['target'] : '_self';
                                ?>

                                <h6><?php the_sub_field('title'); ?></h6>
                                <div class="pn__underline"></div>
                                <a class="text-button-black" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
                            <?php endif; ?>
                        

                        </div>

                        </div>

                        <?php endwhile; ?>
                    </div>
             <?php endif; ?>
        
        </div>




          
        </div>

</section>

