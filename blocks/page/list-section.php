<?php

/**
 *  List Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'list-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'list-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Block preview
if( !empty( $block['data']['is_preview'] ) ) { ?>
        <img src="<?php echo get_theme_file_uri(); ?>/blocks/preview/List.jpg" alt="">
<?php } 

// Load values and assign defaults.
$listTitleText = get_sub_field('title') ?: 'Enter your title';
$listTitleDesc = get_sub_field('description') ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
$listListTitle = get_sub_field('list_list_title') ?: 'Enter your list title';
$listTitle = get_sub_field('list_title') ?: 'Enter your list title';
$listDesc = get_sub_field('list_description') ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

?>


<section class="full-width-section  <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">

<?php // print_r($block['data']['list_column']); ?>

    <div class="container">

        <div class='list__column_group'>

            <?php if (have_rows('list_column')) : ?>

                    
                    <?php while (have_rows('list_column')) : the_row(); 

                        // Title Text Section
                        if (get_row_layout() == 'title_text_section') : ?>

                            <div class="list__column">

                                <div class="list__title_text">
                                    <h2><?php echo $listTitleText; ?></h2>
                                    <p><?php echo $listTitleDesc; ?></p>
                                </div>

                            </div>


                        <?php // List Section
                        elseif (get_row_layout() == 'list_list_section') : ?>

                            <div class="list__column">

                            
                                    <h3 class='list__master_title'><?php echo $listListTitle; ?></h3>

                                    <?php if (have_rows('list_item')) : while (have_rows('list_item')) : the_row(); ?>

                                    <div class="list__item">

                                        <div class="list__item_title">
                                            <div class="list__item_span">
                                                <span class="list__left"></span>                                          
                                                <span class="list__right"></span>   
                                            </div>
                                            <h6><?php echo $listTitle ?></h6>
                                        </div>

                                        <div class="list__item_desc">
                                            <p><?php echo $listDesc; ?></p>
                                        </div>

                                    </div>    

                                    <?php endwhile; endif; ?>


                            </div>    


                        <?php endif; ?>

                    <?php endwhile; ?>
            
            
            <?php endif; ?>

        </div>

    </div>

</section>