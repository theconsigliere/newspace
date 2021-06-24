<?php

/**
 *  Author
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'author-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'author';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.

$authorName = get_field('author_name') ?: 'John Doe';
$authorDate = get_field('author_date');
$terms = get_field('author_category');


// Block preview
if( !empty( $block['data']['is_preview'] ) ) { ?>
    <img src="<?php echo get_theme_file_uri(); ?>/blocks/preview/Author.jpg" alt="">
<?php } 


?>


<section class="author__section   <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

        <div class="author__section_inner">

            <div class="author__item">
            
                    <?php 

                    $image = get_field('author_image') ?: 275;

                    if ( $image) { ?>

                    <div class="author__image">

                        <?php echo wp_get_attachment_image($image, 'full'); ?>

                    </div>

                    <?php } ?>


                <div class="author__desc">

                    <p class='uppercase'><?php echo esc_html( 'Written By' ); ?></p>
                    <h4><?php echo $authorName; ?></h4>
                    <h6><?php echo $authorDate; ?></h6>

                </div>
            </div>

            <div class="author__categories">

                <?php 
              
                if( $terms ): ?>
                   
                    <?php foreach( $terms as $term ): ?>

                        <a class='block-button' href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
                    <?php endforeach; ?>

                
                <?php endif; ?>

            </div>
            

        </div>
  


</section>