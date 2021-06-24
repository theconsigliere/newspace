<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php html_schema(); ?> <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>

    <?php /**
     * updated with non-blocking order
     * see here: https://csswizardry.com/2018/11/css-and-network-performance/
     * 
     * In short, place any js here that doesn't need to act on css before any css to
     * speed up page loads.
     */
    ?>

    <?php // drop Google Analytics here 
    ?>
    <?php // end analytics 
    ?>

    <?php // See everything you need to know about the <head> here: https://github.com/joshbuchea/HEAD 
    ?>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php // favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) 
    ?>
    <link rel="icon" href="<?php echo get_theme_file_uri(); ?>/favicon.png">
    <!--[if IE]>
            <link rel="shortcut icon" href="<?php echo get_theme_file_uri(); ?>/favicon.ico">
        <![endif]-->

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri(); ?>/library/images/apple-touch-icon.png">

    <!-- Safari Pinned Tab Icon -->
    <link rel="mask-icon" href="<?php echo get_theme_file_uri(); ?>/library/images/icon.svg" color="#0088cc">

    <?php // updated pingback. Thanks @HardeepAsrani https://github.com/HardeepAsrani 
    ?>
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>


    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<svg id="header-fader"></svg>
<script src='<?php echo get_theme_file_uri(); ?>/library/js/page-transitions/min/fade-min.js' ></script>

    <?php // PRE-LOADER 

    // Grab the select field data
    $activated = get_field('loading_activate', 'option');		
    // check the selection
    if($activated == 'yes') {  if ( is_front_page() ) { ?>

        <div class="pre_loader">



            <?php    get_template_part( 'page-components/theme-settings/pre-loader' ); 
            
    
            ?>

        </div>

    <?php }  } ?>



        <header class="header" id="header" role="banner" itemscope itemtype="https://schema.org/WPHeader">

        <?php // HEADER TOP BAR ?>

            <?php
            // Grab the select field data
            $activate = get_field('activate_header_bar', 'option');		
            // check the selection
            if($activate == 'yes') { ?>

                <div class="header-top-bar">
           
                    <?php get_template_part( 'page-components/theme-settings/announcement-bar' ); ?>

                </div>

             <?php   } ?>




             <?php 
             
             
             // Header Template Loop
             
             get_template_part( 'page-components/header/header-components' ); ?>

        </header>



        <div class="modal-group">

            <?php
            // check we're on the front page
            if(is_front_page()) {
            // grab the select field data
            $active = get_field('active', 'option');		
            // check the selection
            if($active == 'yes') {
            // get the modal code
            get_template_part( 'page-components/theme-settings/modal' );
            } 
            }
            ?>

        </div>

        <div class="page-cover"></div>

  
        <div class="locomotive-scroll-container">
        
        <?php   //  <main data-barba='wrapper' class='page-in-full'>
         //   <section data-barba='container'> ?>