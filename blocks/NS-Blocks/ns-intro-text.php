

<?php

/**
 * Newspace Intro Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-intro-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-intro';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


?>

<section class="full-width-section intro-text-ns">  
        <div class="ns-intro-text-inner">

         <div class="ns-intro-text__item">
            <h2><?php the_field('title'); ?></h2>
            <div class="ns-it-line"></div>
         </div>
        

         <?php if( have_rows('add_a_paragraph') ): ?>

            <div class="ns-intro-text__item">

                    <?php while ( have_rows('add_a_paragraph') ) : the_row(); ?>

                      <p><?php the_sub_field('paragraph'); ?></p>

                    <?php endwhile; ?>

                </div>


            <?php endif; ?>
        </div>

</section>