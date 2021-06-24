<?php

/**
 *  Hero Video
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-video-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'video-hero-header';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Block preview
if( !empty( $block['data']['is_preview'] ) ) { ?>
    <img src="<?php echo get_theme_file_uri(); ?>/blocks/preview/Hero Video.jpg" alt="">
<?php } 

// Load values and assign defaults.
$iframe = get_field('hero_video') ?: "https://player.vimeo.com/video/340438724";
$color = get_field('video_colour') ?: '#0000001A';
$title = get_field('video_title') ?: 'Enter your title';
$videoImage = get_field('video_image');


?>


<div class="<?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>">

    <div class="video-hero-image embed-container">

        <?php

        // Use preg_match to find iframe src.
        preg_match('/src="(.+?)"/', $iframe, $matches);
        $src = $matches[1];

        // Add extra parameters to src and replcae HTML.
        $params = array(
            'controls'  => 0,
            'hd'        => 1,
            'autohide'  => 1,
            'autoplay' => 1,
            'loop' => 1,
            // mutes vimeo
            'background' => 1,
            // mutes youtube
            'mute' => 1
        );
        $new_src = add_query_arg($params, $src);
        $iframe = str_replace($src, $new_src, $iframe);

        // Add extra attributes to iframe HTML.
        $attributes = 'frameborder="0"';
        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

        // Display customized HTML.
        echo $iframe;
        ?>
                <div class="video-overlay" style="background-color:<?php echo $color; ?>"></div>
     </div>

            <div class="video-hero-text">
                <?php echo wp_get_attachment_image( $videoImage , 'full', '', array('class'=>'video__logo')); ?>
                <h1 class='white zero'><?php echo $title; ?></h1>
            </div>


</div>