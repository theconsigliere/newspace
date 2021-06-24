<div class='logo_left inner' itemscope itemtype="https://schema.org/Organization">



    <div class="logo_left_logo">
        
            <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"
                title="<?php bloginfo('name'); ?>">
                <?php echo wp_get_attachment_image(get_sub_field('logo'), 'full', "", array( "alt" => "Site Logo", "itemprop" => "logo", "id" => "logo" )); ?>
            </a>

            <?php /*
                <div id="site-title" class="site-title" itemprop="name">
                    <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"
                        title="<?php bloginfo('name'); ?>">
                        <h3><?php bloginfo('name'); ?></h3>
                    </a>
                </div>

        */ ?>
      
    </div>


    <div class="logo_left_nav">

        <nav class="header-nav primary-menu" role="navigation" itemscope  itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php _e('Primary Menu ', 'dmtheme'); ?>">

            <?php // added primary menu marker for accessibility  ?>

            <h2 class="screen-reader-text"><?php _e('Primary Menu', 'dmtheme'); ?></h2>


            <?php  wp_nav_menu(
                array(

                    'container' => false,                          // remove nav container
                    'container_class' => 'menu',                   // class of container (should you choose to use it)
                    'menu' => get_sub_field('menu'), // nav name
                    'menu_class' => 'nav top-nav main-menu',       // adding custom nav class
                //    'theme_location' => 'main-nav',                // where it's located in the theme

                )
            );  ?>


        </nav>

        <div class="menu_toggle">
        </div>

        <div class="mobile-sidebar">
            <div class="mobile-sidebar-inner">

                <div class="mobile-sidebar-top">
                <?php  wp_nav_menu(

                        array(

                            'container' => false,                          // remove nav container
                            'container_class' => 'menu',                   // class of container (should you choose to use it)
                            'menu' => get_sub_field('menu'), // nav name
                            'menu_class' => 'mobile-nav',       // adding custom nav class
                        //    'theme_location' => 'main-nav',                // where it's located in the theme

                        )
                    );  ?>


                </div>
        

                <?php if ( have_rows('socials') ) {  ?>

                    <div class="mobile-sidebar-bottom">

                        <?php   get_template_part('page-components/header/header', 'socials');  ?>

                    </div>

              <?php  } ?>

              
            
            </div>
        </div>


    
    </div>

    <?php if ( have_rows('socials') ) {  ?>

    <div class="logo_left_socials">

		<?php get_template_part('page-components/header/header', 'socials'); ?>
    
    </div>

    <?php } ?>


</div>


