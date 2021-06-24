<?php
/*
 Template Name: Our Portfolio Template

*/
?>



<?php get_header(); ?>


<div id="content">

    <section class="portfolio-our-projects-m">
        <div class="inner-pp-section">

            <div class="pp-title-block pp__item">
                <div class="pp-title-inner" data-scroll>
                    <?php 
                    
                    $title = get_field('title');
                    $subtitle = get_field('subtitle');
                    $desc = get_field('description');
                    $select = get_field('show_project_slider');
                    
                    if ($title) : ?>
                    <div class="pp-title-lt">
                        <h1><?php echo $title; ?></h1>
                        <h6><?php echo $subtitle; ?></h6>
                    </div>
                    <?php endif; ?>

                    <?php if ($desc): ?>
                    <div class="pp-title-rt">
                        <p><?php echo $desc; ?></p>
                    </div>
                    <?php endif; ?>

                    <?php 
                    $button = get_field('button');


                    if( $button ): 
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>

                        <a class="text-button text-button-black " href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
                    <?php endif; ?>

                </div>

            </div>

        

            <?php if ($select == 'yes') :?>




            <?php
                            // organise our options into a data object
                            $args = array(
                               
                               'post_type' => 'our-portfolio',
                               'post_status' => 'publish',
                               'posts_per_page' => -1, 
                               'orderby' => 'title', 
                               'order' => 'ASC',
                               'cat' => 'home',
                      
                            );

                            //Set up a counter
                            $counter = 0;

                            // a variable with our query and options
                            $query = new WP_Query( $args );
                            // do a loop with our new query code 

                        
                            
                            if ($query->have_posts()): while ($query->have_posts()): $query->the_post();  ?>


            <?php $post_id = get_the_ID(); ?>



            <div class="blog-item  pp-item-block pp__item">

                <article class="pp-item-block__inner" data-scroll>

                    <?php  if( have_rows('hero', $post_id) ): ?>

                    <?php while ( have_rows('hero', $post_id) ) : the_row(); ?>

                    <a href="<?php the_permalink( $post ); ?>">

                        <div class="blog__image">
                            <?php echo wp_get_attachment_image( get_sub_field('project_image', $post_id), 'full', '', array('class' => 'pp-t_image' )); ?>
                        </div>

                        <h3 class='ppt__title'><?php the_sub_field('project_name', $post_id); ?></h3>

                        <?php if( have_rows('project_info_tabs', $post_id) ): ?>

                            <div class="ppt_cat-group">
                   
                                <?php while ( have_rows('project_info_tabs', $post_id) ) : the_row(); ?>

                                    <div class="pp_cat-title">
                                        <p class='black'><?php the_sub_field('title', $post_id); ?></p>
                                        <p><?php the_sub_field('description', $post_id); ?></p>
                                    </div>

                                <?php endwhile; ?>
                                </div>
                          

                        <?php endif; ?>

                 

                    </a>

                    <?php endwhile; ?>
                    <?php endif; ?>





                </article>
            </div>

            <?php endwhile; endif; ?>
        </div>

        <?php wp_reset_query(); ?>
        <?php endif; ?>




    </section>


    </main>

</div>

</div>


</main>
</section>





<?php // all js scripts are loaded in library/functions.php 
?>
<div class="bottom-bar">
<p class='p__scroll__disclaimer'><?php the_field('scroll_disclaimer'); ?>
                   <span class="sd_arrow">  <?php echo file_get_contents( get_stylesheet_directory_uri() . '/build/images/down-arrow.svg' ); ?></span>
</p>
<div class="progress-bar">
    <div class="pb-outer">
        <div class="inner-pb"></div>
    </div>
</div>
</div>


<!-- <div class="portfolio__slides--numbers">
<p><span class='psn__current'>1</span> / <span class='psn__length'>6</span> </p>
</div> -->



<?php wp_footer(); ?>




</div>

</div> <?php // locomotive scroll container ?>

</body>

</html> <!-- This is the end. My only friend. -->