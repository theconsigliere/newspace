<?php

/**
 *  Socials
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'socials__section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'socials__section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Block preview
if( !empty( $block['data']['is_preview'] ) ) { ?>
    <img src="<?php echo get_theme_file_uri(); ?>/blocks/preview/Socials.jpg" alt="">
<?php } 

// Load values and assign defaults.

$socialGroup = 'socials_group';
$link = get_sub_field('social_title') ?: array('url' => '#', 'title' => 'Social', 'target' => 'button');
// icon below

?>


<section class="pre__footer_section  <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">


    <div class="social__buttons">
        <?php if (have_rows( $socialGroup )) : while (have_rows( $socialGroup )) : the_row(); 


            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>

        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo esc_html( $link_title ); ?>">
            <div class="social-item">
                <div class="social-logo">
                    <?php 
                        $icon = get_sub_field('social_icon') ?: '<i class="fab fa-twitter" aria-hidden="true"></i>';
                        echo $icon; ?>
                </div>
            </div>
        </a>

        <?php endif; ?>

        <?php endwhile; endif; ?>
    </div>


</section>