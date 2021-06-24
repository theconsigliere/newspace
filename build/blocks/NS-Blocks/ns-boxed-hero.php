<?php

/**
 *  Newspace Boxed Hero
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-boxed-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-boxed';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
// if( !empty($block['align']) ) {
//     $className .= ' align' . $block['align'];
// }



// Load values and assign defaults.
$heroimage = get_field('hero_image') ?: '275';
$title = get_field('hero_title') ?: 'Enter your title';
$desc = get_field('hero_desc');

?>


<section class="cs-article-hero <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>"data-scroll data-scroll-id="hero" data-hero='<?php echo esc_attr($className); ?>'>


<?php 

if (!empty($heroimage)) : ?>


<?php echo wp_get_attachment_image( $heroimage, 'full'); ?>

<?php endif; ?>


    <div class="hero-project-frame">
        <div class="hpf--svg"> <?php echo file_get_contents( get_stylesheet_directory_uri() . '/build/images/box.svg' ); ?></div>
     
        <div class="hp-inner">


        <?php global $post;
        if ( $post->post_parent ) { ?>
            <a class='h4 frame-subtitle white 'href="<?php echo get_permalink( $post->post_parent ); ?>" >
            <?php echo get_the_title( $post->post_parent ); ?>
            </a>
        <?php }  else { ?>

            <a class='h4 frame-subtitle white 'href="<?php echo get_permalink( $post ); ?>" >
                 <?php echo get_the_title( $post ); ?>
            </a>
            
            
    <?php   } ?>

        <h1 class='frame-title'><?php echo $title; ?></h1>



        </div>
    </div>

    <?php

    // Grab the select field data
    $lookbook = get_field('add_lookbook_download');		


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

</section>