<?php

/**
 *  Image Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Block preview
if( !empty( $block['data']['is_preview'] ) ) { ?>
    <img src="<?php echo get_theme_file_uri(); ?>/blocks/preview/image-section.jpg" alt="">
<?php } 


// Load values and assign defaults.
$background = get_field('background_colour') ?: '#fff'; 
$repeater = 'image_image_group';
$flexibleContent = 'image_item';
$textLayout = 'text_section';
$imageLayout = 'image_section';
$imageTitle = get_sub_field('image_title');
$imageDesc = get_sub_field('desc');
$link = get_sub_field('button') ?: array('url' => '#', 'title' => 'button', 'target' => 'button');
// image variable below
$imageTitleTwo = get_sub_field('image_image_title');
$imageDescTwo = get_sub_field('image_image_desc');



?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>   image__section" style="background: <?php echo $background; ?>">

    <div class="container">
        
        <div class="row image-sections__js">
            <?php if (have_rows( $repeater )) : ?>
           
                    <?php while (have_rows( $repeater )) : the_row(); ?>

                        <?php if (have_rows( $flexibleContent )) :   while (have_rows( $flexibleContent )) : the_row();

                            // Text Section
                            if (get_row_layout() == $textLayout ) : ?>

                            <div class="image__item">
                                <div class="image__text">
                                    <div class="image__text_inner">

    
                                        <h1><?php echo $imageTitle; ?></h1>
                                        <!-- <div class="underline"></div> -->
                                    
                                        <?php if ( $imageDesc ) { ?>
                                        <p class='full-width__desc'><?php echo $imageDesc; ?></p>
                                        <?php } ?>


                                        <?php 
                                       
                                        if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                            <a class="main-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                           </div>
                                
                            <?php

                            //  Image Section
                            elseif (get_row_layout() == $imageLayout ) : ?>

                                <div class="image__item_image">

                              
                                <?php  $image = get_sub_field('image_image') ?: 275; 
                                 echo wp_get_attachment_image( $image , 'full'); ?>
                              
                                    <?php 
                                    

                                    if ( $imageTitleTwo ) { ?>

                                    <div class="image__item_desc">

                                            
                                            <h4><?php echo $imageTitleTwo; ?></h4>


                                        <?php if ( $imageDescTwo ) { ?>
                                            
                                            <p><?php echo $imageDescTwo; ?></p>

                                        <?php  } ?>
                                            
                                    </div>

                                    <?php  } ?>
                                </div>


                            <?php endif; endwhile; ?>
                            
                            
                            <?php endif; ?>



                    <?php endwhile; ?>

              

            <?php endif; ?>
        </div>
    </div>

</section>
