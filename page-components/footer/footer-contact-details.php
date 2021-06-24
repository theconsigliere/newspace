<?php

// check if the repeater field has rows of data
if( have_rows('details') ): ?>

    <div class="footer_contact__group">
        
        <?php while ( have_rows('details') ) : the_row(); ?>

            <div class="contact__item">

                <div class="contact__item_icon">
                    <?php the_sub_field('contact_icon'); ?>
                </div>

                <?php 
                $link = get_sub_field('contact_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>


            </div>


        <?php endwhile; ?>
        
    </div>

<?php endif; ?>