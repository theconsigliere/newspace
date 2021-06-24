

<?php

/**
 * Our Team Grid
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-team-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-team-grid';

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
        <div class="ns-ot-grid-inner">

    

            <?php if( have_rows('add_a_team_member') ): ?>
                    <div class="ns-ot-grid-item-inner">
                        <?php while( have_rows('add_a_team_member') ) : the_row(); ?>

                        <figure class="grid__item">
                            <div class="grid__item-img">
                               <?php echo wp_get_attachment_image( get_sub_field('team_member_photo') , 'full'); ?>
                            </div>
					
                        <h4 class="grid__item-title"><?php the_sub_field('team_member_name');?></h4>

                        <div class="grid-line-title">
                            <div class="gl-inner-line"></div>
                            <p class='tm_g-title'><?php the_sub_field('team_member_job_title');?></p>
                        </div>
                        
                        <p class="grid__item-desc"><?php the_sub_field('team_member_description');?></p>
                            
					</figure>

                        <?php endwhile; ?>
                    </div>
             <?php endif; ?>
         

          
            
        </div>

</section>