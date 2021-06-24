<?php

/**
 *  Hero Image Side / Text Side
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-textside-imageside';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Block preview
if( !empty( $block['data']['is_preview'] ) ) { ?>
    <img src="<?php echo get_theme_file_uri(); ?>/blocks/preview/Hero text-image.jpg" alt="">
<?php } 

// Load values and assign defaults.
$column = 'hero_column';
$flexibleContent = 'hero_item';
$titleSection = 'hero_title_section';
$imageSection = 'hero_image_section';
$subtitle = get_sub_field('hero_sub_title') ?: 'Lorem ipsum dolor sit amet';
$title = get_sub_field('hero_title') ?: 'Enter your title';
$desc = get_sub_field('hero_desc') ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
$link = get_sub_field('hero_button') ?: array('url' => '#', 'title' => 'Social', 'target' => 'button');
$heroimage = get_sub_field('hero_imageside');


?>


<div class="<?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>">


    <?php

    // COLUMN REPEATER
    if( have_rows( $column ) ): ?>

    
        <?php while ( have_rows( $column ) ) : the_row(); ?>

           
        <?php // FLEXIBLE CONTENT IN COLUMNS ?>

            <?php if (have_rows($flexibleContent)) : while (have_rows($flexibleContent)) : the_row();

                        // Title Section
                        if (get_row_layout() == $titleSection ) : ?>

                            <div class="hero__column">

                                <div class="hero__text">
                                    <div class="hero__text_inner">

                                    <?php if ( $subtitle ) { ?>
                                        <h6 class='js_textside__sub_title uppercase font-bold-title sub_title'><span class='hero-line'></span><?php echo $subtitle; ?></h6>
                                        <?php } ?>
        
                                        <h1 class='js_textside__title'><?php echo $title; ?></h1>
                                        <!-- <div class="underline"></div> -->
                                    
                                        <?php if ( $desc ) { ?>
                                        <p class='full-width__desc js_textside__desc'><?php echo $desc; ?></p>
                                        <?php } ?>
                                       
                            
                                        <?php 
                                       
                                        if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                            <a class="main-button js_textside__button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            
                        <?php

                        //  Image Section
                        elseif (get_row_layout() == $imageSection ) : ?>

                        <div class="hero__column js_hero__imageside">
                       
                            <?php 
                            
                            $heroimage = get_sub_field('hero_imageside');

                            if (!empty($heroimage)) : ?>
                            
                                <?php echo wp_get_attachment_image( $heroimage, 'full', '', array('class'=>'js_hero__imageside_image')); ?>
                            <?php endif; ?>

                        </div>

                        <?php endif;
        
                    endwhile; endif; 

            
     
    // END REPEATER

         endwhile;  endif; ?>


</div>