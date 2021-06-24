<div class="footer__main">

<div class="footer__main_inner">
<?php

// COLUMN REPEATER
if( have_rows('footer_columns', 'option') ): ?>

  
    <?php while ( have_rows('footer_columns', 'option') ) : the_row(); ?>

        <div class="footer__column">
            <div class="footer__column_inner">

       <?php // FLEXIBLE CONTENT IN COLUMNS ?>

           <?php if (have_rows('footer_components')) : while (have_rows('footer_components')) : the_row();

                    // Footer Menu
                    if (get_row_layout() == 'footer_menu') : ?>

                        <div class="footer__menu">
                            <?php if (get_sub_field('menu_title')) : ?>
                                <h5><?php the_sub_field('menu_title'); ?></h5>
                            <?php endif; ?>

                            <?php  wp_nav_menu(
                                array(

                                    'container' => false,                          // remove nav container
                                    'container_class' => 'menu',                   // class of container (should you choose to use it)
                                    'menu' => get_sub_field('menu'), // nav name
                                    'menu_class' => 'footer__nav',       // adding custom nav class
                                //    'theme_location' => 'main-nav',                // where it's located in the theme

                                )
                                );  ?>
                        </div>
                        
                    <?php

                    //  Footer Socials
                    elseif (get_row_layout() == 'footer_socials') : ?>

                        <?php if (get_sub_field('social_title')) : ?>
                            <h4><?php the_sub_field('social_title'); ?></h4>
                        <?php endif; ?>

                     <?php get_template_part('page-components/header/header', 'socials'); ?>
                    
                    <?php

                    //  Footer Logos
                    elseif (get_row_layout() == 'footer_logo') : ?>
                    
                        <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url" title="<?php bloginfo('name'); ?>">
                            <?php echo wp_get_attachment_image(get_sub_field('logo'), 'full', "", array( "alt" => "Site Logo", "itemprop" => "logo", "class" => "footer-logo" )); ?>
                        </a>

                        
                    <?php    
                    //  Footer Contact
                    elseif (get_row_layout() == 'footer_contact_details') : ?>

                        <div class="footer__contact">
                            <?php if (get_sub_field('details_title')) : ?>
                                    <h5><?php the_sub_field('details_title'); ?></h5>
                                <?php endif; ?>

                            <?php get_template_part('page-components/footer/footer', 'contact-details'); ?>
                        </div>

                    <?php endif;
    
                endwhile; // close the loop of flexible content

            endif; ?>

        </div>
    </div>

    <?php   endwhile; 

 endif; ?>
</div>

</div>