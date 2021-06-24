<?php // Edit the loop in /templates/single-loop. Or roll your own. ?>
<?php //get_template_part( 'templates/single', 'loop'); ?>



<?php // related posts function; uncomment below to use ?>
<?php // plate_related_posts(); ?>



<?php get_header(); ?>

<div id="article-post" class='article'>

    <section class="article-hero">

        <?php echo wp_get_attachment_image(get_field('article_hero'), 'full');   ?>

    </section>

    <div class="article-title">

        <div class="blog-single">

            <?php
            if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>

            <h1><?php the_field('article_title'); ?></h1>

            <p><?php the_field('article_date'); ?></p>

        </div>

    </div>

    <div class="container">

        <?php

            // Check value exists.
            if( have_rows('article_content') ): ?>

        <div class="article-content">

            <?php while ( have_rows('article_content') ) : the_row();

                    
                    if( get_row_layout() == 'text' ): ?>

            <div class="blog-single">

                <p><?php the_sub_field('article_text'); ?></p>

            </div>


            <?php elseif( get_row_layout() == 'images' ):   ?>

            <div class="article-image-repeater">
                <?php if( have_rows('add_a_image') ):   while( have_rows('add_a_image') ) : the_row(); ?>

                <div class="article-image_container">

                    <?php echo wp_get_attachment_image(get_sub_field('article_image'), 'full');   ?>

                    <?php if ( get_sub_field('caption')) { ?>


                    <p><?php the_sub_field('caption') ?></p>

                    <?php  } ?>
                </div>


                <?php endwhile; endif; ?>

            </div>

            <?php endif; ?>


            <?php endwhile; ?>

        </div>

        <?php endif; ?>


        <?php if ( get_field('quote')) { ?>

        <section class="quote__section">
            <article class="container">
                <blockquote>
                    <h3><?php the_field('quote')?>
                    </h3>
                </blockquote>
            </article>

        </section>

        <?php } ?>



        <?php

       
        
        // check the selection
        if( get_field('show_author_section') == 'show') { ?>


        <?php if( have_rows('author_section') ):  while( have_rows('author_section') ): the_row(); ?>

        <section class="author__section  <?php echo esc_attr($className); ?>">

            <div class="author__section_inner blog-single">

                <div class="author__item">

                    <?php 

                        
                        if ( get_sub_field('author_image') ) { ?>

                    <div class="author__image">

                        <?php echo wp_get_attachment_image(get_sub_field('author_image'), 'full'); ?>

                    </div>

                    <?php } ?>


                    <div class="author__desc">

                        <p class='uppercase'><?php echo esc_html( 'Written By' ); ?></p>
                        <h4><?php the_sub_field('author_name'); ?></h4>
                        <h6><?php the_field('article_date'); ?></h6>

                    </div>
                </div>

                <div class="author__categories">

                    <?php 
                        $terms = get_sub_field('author_categories');
                        
                        if( $terms ): ?>

                    <?php foreach( $terms as $term ): ?>
                    <a class='block-button' href="<?php echo esc_url( get_term_link( $term ) ); ?>">View all
                        <?php echo esc_html( $term->name ); ?> posts</a>
                    <?php endforeach; ?>

                    <?php endif; ?>

                </div>

            </div>

        </section>

        <?php endwhile; endif; ?>

        <?php }  ?>




        <!-- add extra blog items -->

        <div class="blog__holder">

            <?php
            // organise our options into a data object
            $args = array(
                'posts_per_page' => 3,
                'orderby' => 'rand',
                // here we make sure to exclude the current 
                // post we’re looking at
                'post__not_in' => array($post->ID)
            );
            // a variable with our query and options
            $query = new WP_Query( $args );
            // do a loop with our new query code 
            if ($query->have_posts()): while ($query->have_posts()): $query->the_post(); ?>

            <div class="blog-item">
                <article class="blog-item__inner">

                    <div class="blog__image">
                        <?php echo wp_get_attachment_image( get_field('article_hero', $post->ID), 'full'); ?>
                    </div>

                    <h4><?php the_field('article_title', $post->ID); ?></h4>
                    <p><?php the_field('article_date', $post->ID); ?></p>
                    <!-- our inner element takes up the full width and height -->
                    <div class="byline">
                        <p><?php the_field('quote', $post->ID); ?></p>
                    </div>

                    <a class="block-button" href="<?php the_permalink( $post ); ?>">Full Article</a>

                </article>
            </div>

            <?php endwhile; endif; ?>
        </div>





    </div>

</div>


<?php get_footer(); ?>