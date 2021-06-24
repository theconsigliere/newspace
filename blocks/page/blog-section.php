<?php

/**
 *  Blog Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blog-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Load values and assign defaults.
$title = get_field('b_title') ?: 'Enter your title';


?>

<section id="<?php echo esc_attr($id); ?>" class="column-section container-wrap">

    <div class="title-section">
        <h2><?php echo $title; ?></h2>
    </div>

    <div class="no-padding-section container-wrap">

        <?php
        $cat_id = get_field('category');
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'posts_per_page' => 12,
            'paged' => $paged, 'post_type' => 'post',
            'category_name' => $cat_id
        );

        $postslist = new WP_Query($args); 
        
        $found_posts = $postslist->found_posts; 

        // SHOW MORE THAN 4 POSTS
    //----------------------------------------------------
        if ($found_posts > 4 ):  ?>

        <div class="row row-wrap">

            <?php  if ($postslist->have_posts()) : while ($postslist->have_posts()) : $postslist->the_post(); ?>

            <div class="column column-25">

                <article class="blog-item">

                    <div class="l-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="byline">
                        <h6><?php foreach((get_the_category()) as $category){ echo $category->name ; }	?></h6>
                        <h6><?php the_date(); ?></h6>
                    </div>
                    <?php the_title('<h3><a href="' . get_the_permalink() . '">', '</a></h3>'); ?>
                    <!-- only output first 55 words -->
                    <p><?php echo wp_trim_words(get_the_excerpt(), 32); ?></p>

                </article>

            </div>

            <?php // Restore original post data.
            wp_reset_postdata(); ?>

            <?php endwhile; else: endif; ?>

        </div>

    </div>

    <?php else:
              // SHOW  3 POSTS
    //----------------------------------------------------
    ?>

    <div class="row">

        <?php  if ($postslist->have_posts()) : while ($postslist->have_posts()) : $postslist->the_post(); ?>


        <div class="column">

            <article class="blog-item">
                <div class="card__item_image">
                    <?php the_post_thumbnail('full'); ?>
                </div>

                <div class="byline">
                    <h6><?php foreach((get_the_category()) as $category){ echo $category->name ; }	?></h6>
                    <h6><?php the_date(); ?></h6>
                </div>


                <?php the_title('<h3><a href="' . get_the_permalink() . '">', '</a></h3>'); ?>
                <!-- only output first 55 words -->
                <p><?php echo wp_trim_words(get_the_excerpt(), 32); ?></p>

            </article>

        </div>

        <?php // Restore original post data.
wp_reset_postdata(); ?>

        <?php endwhile; else: endif; ?>

    </div>

    </div>



    <?php endif; ?>




</section>