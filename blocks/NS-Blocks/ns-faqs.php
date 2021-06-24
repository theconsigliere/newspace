<?php

/**
 *  Newspace FAQ Page
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-faq-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-faq';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
// if( !empty($block['align']) ) {
//     $className .= ' align' . $block['align'];
// }


?>


<section data-block='<?php echo esc_attr($className); ?>' class="full-width-section <?php echo esc_attr($className); ?>"
    id="<?php echo esc_attr($id); ?>">

    <div class="ns-h">
        <div class="ns-h-inner">
            <h2><?php the_field('title'); ?></h2>

            <div class="ns-faq-text-group">
                <h4><?php the_field('subtitle');?></h4>
                <p><?php the_field('description');?></p>
            </div>
        </div>
    </div>

    <div class="ns-faq-main">

        <nav class="ns-faq-main-nav">

            <?php // FAQ Navigation

         if( have_rows('section_group') ): ?>



            <ul class="ns-nav-faqs">


                <?php while( have_rows('section_group') ): the_row(); ?>

                <li class='top-level'>

                    <details>

                        <summary class='faq-tl-link'><?php the_sub_field('section_title')?></summary>


                        <ul class="submenu-faq-item">

                            <?php if( have_rows('faq_item') ): ?>


                            <li class="ns-faq-item-link">

                                <?php while( have_rows('faq_item') ): the_row(); ?>

                                <a href='#<?php echo sanitize_title(get_sub_field('title')); ?>'
                                    class="faq-sm-link"><?php the_sub_field('title'); ?></a>

                                <?php endwhile; ?>

                            </li>


                            <?php endif; ?>

                        </ul>

                    </details>


                    <?php endwhile; ?>



            </ul>

            <?php endif; ?>

        </nav>

        <?php // FAQ Q&A's?>

        <div class="faq-qa">
            <?php if( have_rows('section_group') ): ?>

            <div class="faq-qa-inner">

                <?php while( have_rows('section_group') ): the_row(); ?>


                <?php if( have_rows('faq_item') ): ?>



                <?php while( have_rows('faq_item') ): the_row(); ?>

                <div class="faq-qa-item" id='<?php echo sanitize_title(get_sub_field('title')); ?>'>
                        <div class="faq-qa-item-inner">
                            <p><?php the_sub_field('section_title')?></p>
                            <h3><?php the_sub_field('title'); ?></h3>
                            <p><?php the_sub_field('description'); ?></p>
                        </div>

                </div>

                <?php endwhile; ?>



                <?php endif; ?>


                <?php endwhile; ?>
            </div>

            <?php endif; ?>
        </div>

    </div>







</section>