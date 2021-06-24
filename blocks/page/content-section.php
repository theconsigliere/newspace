<?php

/**
 *  Content Section
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'content-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Load values and assign defaults.
$contentArea = get_field('content_area') ?: '<h1>Enter your title</h1>';

?>

<section class='<?php echo esc_attr($className); ?>' id="<?php echo esc_attr($id); ?>">

    <div class="content-section">

        <?php echo $contentArea; ?>

    </div>
    
</section>