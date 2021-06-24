<div class='container-wrap' id="inner-header" class="wrap">

<?php // updated with proper markup and wrapping div for organization 
?>
<div id="bloginfo" itemscope itemtype="https://schema.org/Organization">

    <?php
    /*
        * You can use text or a logo (or both) in your header. If you use both, 
        * try placing them in a single link element for better accessibility.
        */
    ?>
    <?php if (has_custom_logo()) { ?>

    <div id="logo" itemprop="logo">
        <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"
            title="<?php bloginfo('name'); ?>"><?php the_custom_logo(); ?></a>
    </div>

    <div id="site-title" class="site-title" itemprop="name">
        <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"
            title="<?php bloginfo('name'); ?>">
            <?php bloginfo('name'); ?>
        </a>
    </div>

    <?php } else { ?>

    <div id="logo" itemprop="logo">
        <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"
            title="<?php bloginfo('name'); ?>">
            <img src="<?php echo get_theme_file_uri(); ?>/library/images/Dirty-Martini-Logo.png"
                itemprop="logo" alt="site logo" />
        </a>
    </div>

    <div id="site-title" class="site-title" itemprop="name">
        <a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"
            title="<?php bloginfo('name'); ?>">
            <h3><?php bloginfo('name'); ?></h3>
        </a>
    </div>

    <?php } ?>

    </div>

<nav class="header-nav primary-menu default-menu" role="navigation" itemscope
    itemtype="https://schema.org/SiteNavigationElement"
    aria-label="<?php _e('Primary Menu ', 'dmtheme'); ?>">

    <?php // added primary menu marker for accessibility 
    ?>
    <h2 class="screen-reader-text"><?php _e('Primary Menu', 'dmtheme'); ?></h2>

    <?php // see all default args here: https://developer.wordpress.org/reference/functions/wp_nav_menu/ 
    ?>

    <?php wp_nav_menu(
        array(

            'container' => false,                          // remove nav container
            'container_class' => 'menu',                   // class of container (should you choose to use it)
            'menu' => __('The Main Menu', 'dmtheme'), // nav name
            'menu_class' => 'nav top-nav main-menu',       // adding custom nav class
            'theme_location' => 'main-nav',                // where it's located in the theme

        )
    ); ?>


</nav>



<div class="menu_toggle default_menu_toggle"></div>

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