<div class='logo_middle' itemscope itemtype="https://schema.org/Organization">



    <div class="logo_middle_nav">

        <button class="menu_toggle"></button>

    
    </div>


    <div class="logo_middle_logo">
       
            <div class='logo-group'>

                <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"
                title="<?php bloginfo('name'); ?>" class='logo-container'>  <?php echo wp_get_attachment_image(get_sub_field('logo'), 'full', "", array( "alt" => "Site Logo", "itemprop" => "logo", "id" => "logo" )); ?></a>
                  
                <?php
                // check we're on the front page
                if(is_front_page()) { ?>

                        <div class="line-holder">
                        <div class="homepage-line"></div>
                        </div>

                <?php } ?>

            </div>

        
    </div>

  

    <div class="logo_middle_socials">

    <?php 

        $button = get_sub_field('button');


        if( $button ): 
            $button_url = $button['url'];
            $button_title = $button['title'];
            $button_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a class="main-button h-top-button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
        <?php endif; ?>
    
    </div>

   


</div>

<?php // Fullscreen nav menu  ?>


<section class="fullscreen-nav fullscreen-nav-js js-nav-hide">
    <div class="fn-nav-inner">

<div class="fn-nav-inner-top-layer">


        <div class="fullscreen-column image-column">
            <div class="inner-fs-column image-fc js-fc-image-area">

            <div class="fc-image-area-mask">
                <?php echo wp_get_attachment_image(get_field('default_menu_image', 'option'), 'full'); ?>
            </div>

            
            </div>
        </div>


        <div class="fullscreen-column fc-menu-group">
            <div class="inner-fs-column fc-menu-group-inner">

            <div class="fs-menu-lower">


            <div class="fs-menu-lower-inner">
            <?php if (have_rows('add_a_menu_item', 'option')) :  ?>
                        

                        <?php while (have_rows('add_a_menu_item', 'option')) : the_row(); ?>
 
                    
 
                     <?php   // Menu Item 
                     if (get_row_layout() == 'menu_link'): ?>
 
                      <?php 
                      
                      $enabled = get_sub_field('sub_menu'); 
                      $image = get_sub_field('menu_item_image');  
                      
                      ?>
 
 
 
                         <?php if ( $enabled === 'enable'): ?>
 
                             
                            
 
                                 <div class="fc_menu-item fc-menu-has-children" data-image="<?php echo $image; ?>">
 
 
                                     <?php 
                                     $link = get_sub_field('menu_item');
                                     if( $link ): 
                                         $link_url = $link['url'];
                                         $link_title = $link['title'];
                                         $link_target = $link['target'] ? $link['target'] : '_self';
                                         ?>
                                         <a class="button-menu-item" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                         <?php echo esc_html( $link_title ); ?>
                                         
                                         <span class="fc-round-outer-plus">
                                         </span>
                                         </a>
                                     <?php endif; ?>
 
                                 
 
                                     <?php if( have_rows('sub_menu_items') ): ?>
 
 
                                         <div class="fc_sub-menu">
 
                                         
                                                <div class="fc_sub-menu-inner">
                                                <?php  while( have_rows('sub_menu_items') ) : the_row(); ?>
                                                
                                                <?php 
                                                    $link = get_sub_field('sub_menu_item');
                                                    if( $link ): 
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                                        ?>
                                                        <a class="button-sub-menu-item" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                    <?php endif; ?>

                                                


                                                <?php  endwhile; ?>
                                                </div>
 
                                         </div>
 
                                     <?php  endif; ?>
 
                                     
                                        <div class="fc-underline">
                                            <div class="fc-underline-inner"></div>
                                        </div>
                                 </div>
 
                           
                                 
 
                         <?php else: ?>
 
                        
 
                         <div class="fc_menu-item" data-image="<?php the_sub_field('menu_item_image'); ?>">
 
 
                             <?php 
                             $singleLink = get_sub_field('menu_item');
                             if( $singleLink ): 
                                 $singleLink_url = $singleLink['url'];
                                 $singleLink_title = $singleLink['title'];
                                 $singleLink_target = $singleLink['target'] ? $singleLink['target'] : '_self';
                                 ?>
                                 <a class="button-menu-item" href="<?php echo esc_url( $singleLink_url ); ?>" target="<?php echo esc_attr( $singleLink_target ); ?>"><?php echo esc_html( $singleLink_title ); ?></a>
                             <?php endif; ?>
 
 
                             <div class="fc-underline">
                                 <div class="fc-underline-inner"></div>
                             </div>
                          </div>
 
                     
 
 
 
                         <?php endif; ?>
                     
                    
 
 
 
                     <?php   // Blog Item
                     elseif (get_row_layout() == 'blog_item'): ?>
 
 
                     <div class="fc_menu-item" data-image="<?php the_sub_field('blog_link_item_image'); ?>">
 
 
                             <?php 
                             $blog = get_sub_field('blog_link_item');
                             if( $blog ): 
                                 $blog_url = $blog['url'];
                                 $blog_title = $blog['title'];
                                 $blog_target = $blog['target'] ? $blog['target'] : '_self';
                                 ?>
                                 <a class="button-menu-item" href="<?php echo esc_url( $blog_url ); ?>" target="<?php echo esc_attr( $blog_target ); ?>"><?php echo esc_html( $blog_title ); ?>
                                 
                                 <span class="fc-n-holder">
                                 <span class="fc-number">
                                
                                
                                <?php
 
                                // GET NUMBER OF POSTS 
 
                                 $posttype = sanitize_title($blog_title);
 
                                 // The Query
                                 $query = new WP_Query( array('post_type' => $posttype) );
                                 $total = $query->found_posts; ?>
                                
                                <?php echo $total ?>
                                </span>
                                 </span>
                                 </a>
                             <?php endif; ?>
 
 
                             <div class="fc-underline">
                                            <div class="fc-underline-inner"></div>
                                        </div>
                     </div>
 
 
                     
                     <?php endif; ?>
 
             <?php endwhile;  ?>
 
 
         
         <?php endif; ?>
</div>


        <?php if( have_rows('add_social_link', 'option') ): ?>


            <div class="social-menu">


                <?php  while( have_rows('add_social_link', 'option') ) : the_row(); ?>

                <?php 
                    $link = get_sub_field('social');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="button-social-menu-item" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>

                


                <?php  endwhile; ?>

            </div>

            <?php  endif; ?>

        </div>

        </div>
        </div>



        </div> <!-- fn-nav-layer-inner -->

        </div>
    </section>