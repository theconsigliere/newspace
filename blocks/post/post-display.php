<?php

/**
 *  Post Display
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'post-display-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'post-display';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Load values and assign defaults.


$title = get_field('blogs_title') ?: 'Enter your title';
$terms = get_field('display_posts');
$number = get_field('number_posts');

?>


<section id="post-display  <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

    <div class="container">
        <?php 


        if ( $title) { ?>

        <div class="blog__title-section">
            <h3><?php echo $title; ?></h3>
        </div>

        <?php } ?>

        <?php 

      

        if( $terms ): ?>


        <!-- add extra blog items -->

        <div class="blog__holder">

            <?php
                    // organise our options into a data object
                    $args = array(
                        'posts_per_page' => $number,
                        'orderby' => 'rand',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'term',
                                'terms'    =>  $terms,
                            ),
                        ),
                    );
                    // a variable with our query and options
                    $query = new WP_Query( $args );
                    // do a loop with our new query code 

                  
                    
                    if ($query->have_posts()): while ($query->have_posts()): $query->the_post();  ?>


            <?php $post_id = get_the_ID(); ?>

            <div class="blog-item">
                <article class="blog-item__inner">

                    <div class="blog__image">
                        <?php echo wp_get_attachment_image( get_field('article_hero', $post_id), 'full'); ?>
                    </div>

                    <h4><?php the_field('article_title', $post_id ); ?></h4>
                    <p><?php the_field('article_date', $post_id); ?></p>
                    <!-- our inner element takes up the full width and height -->
                    <div class="byline">
                        <p><?php the_field('quote', $post_id); ?></p>
                    </div>


                    <a class="block-button" href="<?php the_permalink( $post ); ?>">Full Article</a>

                </article>
            </div>

            <?php endwhile; endif; ?>
        </div>

        <?php wp_reset_query(); ?>
        <?php endif; ?>
    </div>

</section>