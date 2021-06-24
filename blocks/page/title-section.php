

<?php

/**
 * Title Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'title-section';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title') ?: 'Enter your title';
$subtitle = get_field('sub_title') ?: 'Enter your sub title';
$desc = get_field('description') ?: 'Enter your description';
$position = get_field('position');

?>

<section class="full-width-section">  
        <div class="<?php echo $position; ?>">
            <div class="title_title__section">
                <h1><?php echo $title; ?></h1>

                <?php if ($subtitle) { ?>
                    <div class="sub_title__container">
                        <h4><?php echo $subtitle; ?></h4>
                    </div>
                <?php } ?>
            </div>
            <?php if ($desc) { ?>
                <p class='description'><?php echo $desc; ?></p>
         <?php } ?>
        </div>

</section>