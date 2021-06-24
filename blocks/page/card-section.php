<?php

/**
 *  Card Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'card-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'card-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Block preview
if( !empty( $block['data']['is_preview'] ) ) { ?>
    <img src="<?php echo get_theme_file_uri(); ?>/blocks/preview/Button.jpg" alt="">
<?php } 

// Load values and assign defaults.
$subtitle = get_field('card_title') ?: 'Enter your title';
$position = get_field('card_position') ?: 'middle__title';
$link = get_sub_field('card_button') ?: array('url' => '#', 'title' => 'button', 'target' => 'button');
// card image below
$cardTitle = get_sub_field('card_title') ?: 'Enter your title';
$cardDesc = get_sub_field('card_desc') ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

?>




<section id="<?php echo esc_attr($id); ?>" class='<?php echo esc_attr($className); ?> card-section'>


    <div class="full-width-section">


        <?php 

    
        if ( $subtitle) { ?>

            <div class="title-section <?php echo $position; ?>">
                <h1><?php echo $subtitle; ?></h1>
            </div>

        <?php } ?>

        <div class="container">


            <div class="row">

                <?php if (have_rows('card_item')) : while (have_rows('card_item')) : the_row(); ?>


                <div class="column">
                    <div class="card__item">
                        <div class="card__item_image">

                        <?php

                        $cardPic = get_sub_field('card_image') ?: 275;
                        
                        if ( $cardPic ) { ?>

                            <?php echo wp_get_attachment_image( $cardPic , 'full'); ?>

                            <?php } ?>

                        </div>

                        <div class="card_item__text">
                            <h3><?php echo $cardTitle ?></h3>
                            <p><?php echo $cardDesc; ?></p>

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


                <?php endwhile;
        endif; ?>
            </div>


        </div>


    </div>



</section>