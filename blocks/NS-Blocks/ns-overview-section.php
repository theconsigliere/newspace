

<?php

/**
 * Newspace Overview Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-overview-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-overview';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


?>

<section class="full-width-section <?php echo esc_attr($className); ?>">  
        <div class="ns-os-inner">

        <?php if( have_rows('left_images') ): ?>
                    <div class="ns-os-left-images">
                        <?php 
                        $counter = 0;
                        while( have_rows('left_images') ) : the_row(); ?>
                        <?php echo wp_get_attachment_image( get_sub_field('image') , 'full', '', array('class' => 'left_image' . $counter)); 
                        $counter++ ?>
                        <?php endwhile; ?>
                    </div>
        <?php endif; ?>

        <?php if( have_rows('right_images') ): ?>
                    <div class="ns-os-right-images">
                        <?php 
                        $counter = 0;
                        while( have_rows('right_images') ) : the_row(); ?>
                        <?php echo wp_get_attachment_image( get_sub_field('image') , 'full', '', array('class' => 'right_image' . $counter)); 
                        $counter++ ?>
                        <?php endwhile; ?>
                    </div>
        <?php endif; ?>

            <div class="ns-text-inner">

            <?php $title = get_field('title');
                    // split the title into lines from acf title <br> formatting so we can add gsap

                    $your_array = preg_split("/(\r\n|\n|\r)/", $title); ?>

                    <h2 class='full-width__desc '>
                    <?php foreach ($your_array as $variable) { ?>

                   
                            <span class="text-holder">
                            <span class='ns-i-title'>


                            
                          


                            <?php  
                            // check if the word new is in array
                             if (strpos($variable, 'new') !== false) { 

                                $new = "<span class='orange'>new</span>";
     
                                 echo str_replace("new", $new, $variable); ?>
                                  
                            <?php }  else {
                                
                                 echo $variable; 
                                
                            }?>

                            
                            </span>
                            
                            </span>


                        <?php }  ?>
                    </h2>


 

                <h6><?php the_field('subtitle'); ?></h6>

               
                <?php if( have_rows('add_text') ): ?>
                    <div class="ns-text-text-area">
                        <?php while( have_rows('add_text') ) : the_row(); ?>
                            <p><?php the_sub_field('description');?></p>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php 
                $button = get_field('button');

                if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                    ?>
                    <a class="text-button-black" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
                <?php endif; ?>

            </div>




            
        </div>

</section>