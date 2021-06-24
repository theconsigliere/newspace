

<?php

/**
 * Newspace welcome scroll section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'welcome__scroll-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'welcome__scroll';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}


?>



<section class="full-width-section <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>" data-block='<?php echo esc_attr($className); ?>'>  

<?php

// Check value exists.
if( have_rows('add_a_slide') ): ?>

<div class="welcome__scroll__parent">

        <div class="welcome__scroll__info"></div>

 <?php   // Loop through rows.
    while ( have_rows('add_a_slide') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'scroll_slide_title' ): ?>

        <div class="ws__box  ws__box__slide__title"  data-colour='<?php the_sub_field('background_colour'); ?>'>
            <div class="ws__box__inner">

            <div class="welcome__title__choice">
                    
                    <div class="welcome__symbol">
                    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/build/images/ns-symbol.svg' ); ?>
                    </div>

                    <?php $title = get_sub_field('title');
                    // split the title into lines from acf title <br> formatting so we can add gsap

                    $your_array = preg_split("/(\r\n|\n|\r)/", $title); ?>

                    <h2 class='h1 ws__title' style='color:<?php the_sub_field('text_colour'); ?>'>
                    <?php foreach ($your_array as $variable) { ?>

                   
                          
                          

                            <?php  
                            // check if the word new is in array
                             if (strpos($variable, 'new') !== false) { 

                                $new = "<span class='orange'>new</span>";
     
                                 echo str_replace("new", $new, $variable); ?>
                                  
                            <?php }  else {
                                
                                 echo $variable; 
                                
                            }?>

                            
                        
                            
                         


                        <?php }  ?>
                    </h2>

                <?php 
                    $button = get_sub_field('button');


                    if( $button ): 
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>

                        <h6 class='pn__page__title'><?php the_sub_field('title'); ?></h6>
                        <div class="pn__underline"></div>
                        <a class="text-button text-button-<?php the_sub_field('text_colour'); ?> " href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
                    <?php endif; ?>

                    <div class="pipe">
                        <div class="pipe-inner"></div>
                    </div>
                </div>

   

            </div>
        </div>


       <?php // Case: Download layout.
        elseif( get_row_layout() == 'scroll_slide_description' ):  ?>
           
        <div class="ws__box ws__box__slide__desc" data-colour='<?php the_sub_field('background_colour'); ?>'>
            <div class="ws__box__inner">

            <div class="welcome__title__choice">
                    
                 <div class="welcome__symbol welcome__symbol__desc">
                    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/build/images/ns-symbol.svg' ); ?>
                </div>

            <h3 class='welcome__slide_desc' style='color:<?php the_sub_field('text_colour'); ?>'><?php the_sub_field('description'); ?></h3>

                <div class="pipe">
                        <div class="pipe-inner"></div>
                    </div>
                </div>

            </div>
        
        </div>
      <?php  endif; 

    // End loop.
    endwhile; ?>

</div>
<?php endif; ?>



</section>



