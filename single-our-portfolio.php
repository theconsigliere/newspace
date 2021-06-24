<?php // Edit the loop in /templates/single-loop. Or roll your own. ?>
<?php //get_template_part( 'templates/single', 'loop'); ?>



<?php // related posts function; uncomment below to use ?>
<?php // plate_related_posts(); ?>



<?php get_header(); ?>

<div id="article-post" class='article'>



<?php  if( have_rows('hero') ): ?>

    <section class="cs-article-hero" data-scroll data-scroll-id="hero">

        <?php while ( have_rows('hero') ) : the_row(); ?>


        <?php echo wp_get_attachment_image(get_sub_field('project_image'), 'full');   ?>


            <div class="hero-project-frame">
                  <div class="hpf--svg"> <?php echo file_get_contents( get_stylesheet_directory_uri() . '/build/images/box.svg' ); ?></div>
     
                <div class="hp-inner">

                    <h4 class="frame-subtitle white">
                         <?php echo esc_html( 'Our Portfolio' ); ?>
                    </h4>

                    <h1><?php the_sub_field('project_name'); ?></h1>

                </div>
            </div>

            <?php

            // Grab the select field data
            $lookbook = get_sub_field('add_lookbook_download');		


            // check the selection
            if($lookbook == 'yes') { ?>

                <?php if( have_rows('lookbook_download') ): ?>
                    <?php while( have_rows('lookbook_download') ): the_row(); 


                    $link = get_sub_field('lookbook_link');

                    if( $link ): 
                    $button_url = $link['url'];
                    ?>

                    <a class="lb-download" href="<?php echo esc_url( $button_url ); ?>" target="new">

                        <div class="look-book-download">
                            <div class="lb-content">
                                <div class="lb-c-inner">
                                    <h5><?php the_sub_field('title'); ?></h5>
                                    <p><?php the_sub_field('description'); ?></p>
                                </div>
                            </div>
                            <div class="lb-box">
                                <div class="round">
                                <span class="arrow arrow-bottom"></span>
                                </div>
                            </div>
                        </div>

                        </a>
                    <?php endif; ?>

                    <?php endwhile; ?>
                <?php endif; ?>

            <?php } ?>


            <?php endwhile; ?>

        </section>

<?php endif; ?>



    <?php if( have_rows('project_info_tabs') ): ?>

    <section class="cs__tabs">

        <div class="cs__tabs--inner">

            <?php while ( have_rows('project_info_tabs') ) : the_row(); ?>

                <div class="cs_tab">
                    <h6><?php the_sub_field('title'); ?></h6>
                    <p><?php the_sub_field('description'); ?></p>

                </div>

            <?php endwhile; ?>

        </div>

    </section>

    <?php endif; ?>

 

    <div class="container">

        <?php  if( have_rows('project_page_content') ): ?>

        <div class="article-content">

            <?php while ( have_rows('project_page_content') ) : the_row();

                    
            if( get_row_layout() == 'full-width_image' ): ?>

                <div class="blog-single cs-image-full">

                <?php echo wp_get_attachment_image(get_sub_field('image'), 'full'); ?>

                </div>


            <?php elseif( get_row_layout() == 'text_&_image_section' ):   ?>


                <section class="full-width-section">  
                        <div class="ns-intro-inner">

                            <div class="cs-stext-inner">

                            <?php $title = get_sub_field('section_title');
                                    // split the title into lines from acf title <br> formatting so we can add gsap

                                    $your_array = preg_split("/(\r\n|\n|\r)/", $title); ?>

                                    <h2 class='full-width__desc '>
                                    <?php foreach ($your_array as $variable) { ?>

                                
                                            <span class="text-holder">
                                            <span class='ns-i-title'>


                                            <?php  
                                         
                                                
                                                echo $variable; 
                                                
                                            ?>

                                            
                                            </span>
                                            
                                            </span>


                                        <?php }  ?>
                                    </h2>


                            
                                <?php if( have_rows('add_text_paragraph') ): ?>
                                    <div class="ns-text-text-area">
                                        <?php while( have_rows('add_text_paragraph') ) : the_row(); ?>
                                            <p><?php the_sub_field('paragraph');?></p>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>

                                <?php 
                                $button = get_sub_field('button');

                                if( $button ): 
                                    $button_url = $button['url'];
                                    $button_title = $button['title'];
                                    $button_target = $button['target'] ? $button['target'] : '_self';
                                    ?>
                                    <a class="text-button-black" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
                                <?php endif; ?>

                            </div>

                            <div class="cs-image-inner">
                                <div class="image-1">
                                    <?php echo wp_get_attachment_image( get_sub_field('image_one') , 'full'); ?>
                                </div>
                                <div class="image-2 ns-img-item">
                                    <?php echo wp_get_attachment_image( get_sub_field('image_two') , 'full'); ?>
                                </div>

                            </div>


                            
                        </div>

                </section>

          <?php elseif( get_row_layout() == 'cost_breakdown' ):   ?>

            

                <div class="cost_breakdown--section">


                    <div class="cb-images">
                        <div class="cb-image">
                            <?php echo wp_get_attachment_image( get_sub_field('image_one') , 'full'); ?>
                        </div>
                        <div class="cb-image">
                            <?php echo wp_get_attachment_image( get_sub_field('image_two') , 'full'); ?>
                        </div>

                    </div>

                    <div class="cb-item-section">

                        <div class="cb-g-t">
                        <h3><?php the_sub_field('title'); ?></h3>

<?php if( have_rows('cost_breakdown_group') ): ?>
        <div class="cb-t-full">
            <?php while ( have_rows('cost_breakdown_group') ) : the_row(); ?>

            <?php if( have_rows('cost_breakdown_items') ): ?>

                        <?php while ( have_rows('cost_breakdown_items') ) : the_row(); ?>

                        <div class="cb-t-item">

                        <div class="cb-t-icon">
                            <div class="cb-t-circle"></div>
                            <div class="cb-t-line"></div>
                        </div>

                        <div class="cb-t-text">
                            <h6><?php the_sub_field('cost_breakdown_title'); ?></h6>
                            <p><?php the_sub_field('cost_breakdown_description'); ?></p>
                        </div>

                        </div>
                        
                        <?php endwhile; ?>
                   
            <?php endif; ?>

            <div class="cb-t-item cb-t-total">
                <div class="cb-t-icon">
                    <div class="cb-t-circle"></div>
                </div>
                <div class="cb-t-text">
                        <h6><?php the_sub_field('cost_breakdown_total_title'); ?></h6>
                        <p><?php the_sub_field('cost_breakdown_total_description'); ?></p>
                </div>
            </div>


            <?php endwhile; ?>
        </div>
<?php endif; ?>
                        </div>


                    </div>

                   
                </div>
          



          <?php elseif( get_row_layout() == 'mitch_says' ):   ?>


            <article class="mitch-says-section">

            <div class="ms-s-inner">
            <div class="ms-image">
                        <?php echo wp_get_attachment_image( get_sub_field('image') , 'full'); ?>
                        </div>
                        <div class="ms-text-inner">
                            <h4><?php the_sub_field('title'); ?></h4>
                            <h2><?php the_sub_field('tagline'); ?></h2>
                            <p><?php the_sub_field('description'); ?></p>

                        </div>
            </div>

            </article>


        <?php endif; endwhile; ?>

            </div>
    

   <?php endif; ?>

    
    </div>



        <!-- add extra blog items -->





    </div>

</div>


<?php get_footer(); ?>