<div class="header-top-bar" style='background-color:<?php the_field('header_colour', 'option'); ?>'>

    <div class="container">
        <div class="row header-info-top">

            <?php if (have_rows('header_info', 'option')) : while (have_rows('header_info', 'option')) : the_row(); 

                $link = get_sub_field('page_title_link', 'option');

                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        ?>

            <a href="<?php echo esc_url( $link_url ); ?>" target="new">
                
                    <h6 class=' header-info-item' style='color:<?php the_field('header_colour_text', 'option'); ?>'><?php echo esc_html( $link_title ); ?></h6>
                
            </a>

            <?php endif; ?>

            <?php endwhile; endif; ?>

        </div>

    </div>

</div>