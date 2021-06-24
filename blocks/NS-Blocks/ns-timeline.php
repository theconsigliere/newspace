<?php

/**
 *  Timeline
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'timeline-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'timeline';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
// if( !empty($block['align']) ) {
//     $className .= ' align' . $block['align'];
// }

?>

<section data-block='<?php echo esc_attr($className); ?>' class="timeline-section <?php echo esc_attr($className); ?>"
    id="<?php echo esc_attr($id); ?>">


    <div class="ck-container">



        <?php if (have_rows('cases')) : ?>

        <div class="scroll-tab">
            <div class="st-title">
                <h4 class=''><?php the_field('title'); ?></h4>
            </div>

            <?php while (have_rows('cases')) : the_row(); ?>

            <a class="scroll--menu_item" href='#<?php the_sub_field('menu_ID'); ?>'
                data-link='<?php the_sub_field('menu_ID'); ?>' data-color='<?php the_sub_field('case_colour'); ?>'>
                <div class="circle">
                    <div class="inner-circle"></div>
                </div>
                <h5 class='inter timeline__label'><?php the_sub_field('case_title'); ?></h5>
                <div class="pipe">
                    <div class="inner-pipe"></div>
                </div>
            </a>

            <?php endwhile; ?>
        </div>
        <?php endif; ?>


        <?php if (have_rows('cases')) : 
           
           $index = 01;
            
            ?>

        <div class="ck-stage-container">

            <?php while (have_rows('cases')) : the_row(); ?>


            <div class="ck-stage" id='<?php the_sub_field('menu_ID'); ?>'>

                <div class="scroll-text-box case__item">
                    <div class="case__number big-h1">0<?php echo $index++; ?>
                    </div>
                  <div class="case_details">
                  <div class="case__title">
                        <h2><?php the_sub_field('case_title'); ?></h2>
                    </div>
                    <div class="case__desc">
                        <p><?php the_sub_field('case_desc'); ?></p>
                    </div>
                  </div>
                </div>





            </div>



            <?php endwhile; ?>

        </div>

        <?php endif; ?>

    </div>

</section>