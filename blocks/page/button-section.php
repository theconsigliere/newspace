<?php

/**
 *  Button Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'button-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'button-section';
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
$background = get_field('button_colour') ?: '#fff';
$title = get_field('button_title') ?: 'Enter your title';
$desc = get_field('button_desc') ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
$button = get_sub_field('button_button') ?: array('url' => '#', 'title' => 'button', 'target' => 'button');
$buttonStyle = get_sub_field('button_style') ?: 'main-button';

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> full-width-section" style='background: <?php echo $background; ?>'>
    <div class="container">

        <div class="title-section button__title">
            <h1><?php echo $title; ?></h1>

            <?php if ( $desc ) { ?>

                    <p><?php echo $desc; ?></p>

            <?php } ?>


        </div>


        <?php if (have_rows('button_button_group')) : ?>

            <div class="button-button">

                <?php while (have_rows('button_button_group')) : the_row(); ?>

                <?php
                

                    if( $button ): 
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>
                        <a class="<?php echo $buttonStyle; ?>" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
                    <?php endif; ?>


                <?php endwhile; ?>

            </div>

        <?php endif; ?>

  
        </div>

    </div>
</section>