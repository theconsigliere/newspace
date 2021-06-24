<?php

/**
 *  Hero Full-Width
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
$className = 'hero-fullwidth';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}



// Load values and assign defaults.
$heroimage = get_field('hero_image') ?: '275';
$position = get_field('text_position') ?: 'middle_title';
$title = get_field('hero_title') ?: 'Enter your title';
$subtitle = get_field('hero_sub_title');
$desc = get_field('hero_desc');
$button = get_field('hero_button') ?: array('url' => '#', 'title' => 'Social', 'target' => 'button');

?>


<div class="full-width-hero <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>" data-scroll data-scroll-id="hero">
    <?php 

    if (!empty($heroimage)) : ?>

<div class="hero-img-overlay"></div>

    <?php echo wp_get_attachment_image( $heroimage, 'full'); ?>

   

    <?php endif; ?>

    <div class="full-width-text-group <?php echo $position; ?>">

        <?php   
        // split the title into lines from acf title <br> formatting so we can add gsap

        $your_array = preg_split("/(\r\n|\n|\r)/", $title); ?>

        <h1 class='full-width__desc '>
        <?php foreach ($your_array as $variable) { ?>
                <span class="text-holder"><span class='fw-title'><?php echo $variable; ?></span></span>
            <?php }  ?>
        </h1>

        <!-- <div class="underline"></div> -->

        <?php if ( $subtitle ) { ?>
        <h4><?php echo $subtitle; ?></h4>
        <?php } ?>
       
        <?php if ( $desc ) { ?>
        <p class='full-width__desc'><?php echo $desc; ?></p>
        <?php } ?>


        <?php 
        if( $button ): 
            $button_url = $button['url'];
            $button_title = $button['title'];
            $button_target = $button['target'] ? $button['target'] : '_self';
            ?>
            <a class="text-button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"> <?php echo esc_html( $button_title ); ?></a>
        <?php endif; ?>
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

</div>