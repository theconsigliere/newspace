

<?php

/**
 * Newspace Map Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-map-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-map-section';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
// if( !empty($block['align']) ) {
//     $className .= ' align' . $block['align'];
// }


?>


<section class="full-width-section <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>">  


<div class="ns-map-inner">

    <div class="ns-map-contact-item">
        <h3> <?php the_field('title');?></h3>


        <?php if( have_rows('add_contact_details') ): ?>
            <div class="ns-map-details">
                        <?php while( have_rows('add_contact_details') ) : the_row(); ?>

                        <div class="ns-map-item">
                 
                     
                            <p class='tm_g-title'><?php the_sub_field('contact_type');?></p>
                     


                            <?php 
                                    $button = get_sub_field('contact_info');

                                    if( $button ): 
                                        $button_url = $button['url'];
                                        $button_title = $button['title'];
                                        $button_target = $button['target'] ? $button['target'] : '_self';
                                        ?>
                            <a class="p" href="<?php echo esc_url( $button_url ); ?>"
                                target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
                            <?php endif; ?>
                                        
                        </div>

                        <?php endwhile; ?>
                    </div>
             <?php endif; ?>

        </div>
    <div class="ns-map-map-item">
        <?php the_field('input_map');?>
    </div>
</div>

      

</section>