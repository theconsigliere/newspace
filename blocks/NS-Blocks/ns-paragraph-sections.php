

<?php

/**
 * Newspace Paragraph Sections
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-para-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-para';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title');
$main = get_field('main_paragraph');
?>

<section class="full-width-section">  
        <div class="ns-para-inner">

        <?php if ($title) : ?>
            <div class="ns-para-item-left">
            <h5><?php echo $title; ?></h5>
            </div>
        <?php endif; ?>

      
        <?php if ($main) : ?>
            <div class="ns-para-item-right">
            <h4><?php echo $main; ?></h4>

            <?php if( have_rows('add_text') ): ?>
                    <div class="ns-p-text-area">
                        <?php while( have_rows('add_text') ) : the_row(); ?>
                            <p><?php the_sub_field('paragraph');?></p>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php if( have_rows('add_bullet_points') ): ?>
                    <ul class="ns-p-bullet-points">
                        <?php while( have_rows('add_bullet_points') ) : the_row(); ?>
                            <li>
                           <div class="pipe"></div>
                            <p><?php the_sub_field('bullet_point');?></p></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endif; ?>

          
            
        </div>

</section>