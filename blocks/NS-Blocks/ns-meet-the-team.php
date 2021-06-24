

<?php

/**
 * Newspace Meet the Team
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ns-meet-the-team-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ns-meet-the-team';

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


?>


<section class="full-width-section <?php echo esc_attr($className); ?>"  id="<?php echo esc_attr($id); ?>">  

    <div class="ns-m-title-inner">
        <div class="mns__item">
            <h4><?php the_field('title'); ?></h4>
        </div>
        
        <div class="mns__item">
            <p><?php the_field('desc');?></p>

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

    <div class="mt__image">
            <?php echo wp_get_attachment_image( get_field('team_image') , 'full'); ?>
    </div>

      

</section>