<?php

/**
 *  Basic Hero
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-fullwidth';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}



// Load values and assign defaults.
$heroimage = get_field('hero_image');

?>


<div class="full-width-hero basic-hero <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>" data-scroll data-scroll-id="hero">
   
    <?php 

    if (!empty($heroimage)) :  
        
        echo wp_get_attachment_image( $heroimage, 'full'); 
    
    endif; ?>


</div>