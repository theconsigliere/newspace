<?php

// check if the repeater field has rows of data
if( have_rows('socials') ): ?>

    <div class="header_social_group">
        
        <?php while ( have_rows('socials') ) : the_row(); ?>

            <div class="social_item">

            <?php
                $link = get_sub_field('social_link');

                if( $link ): 
                    $link_url = $link['url'];  
                $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self'; ?>

                    <a href="<?php echo esc_url( $link_url ); ?>">
                        <div class="social_logo">
                            <p><?php the_sub_field('social_title'); ?></p>
                            <p class='social__title__link' target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></p>
                        </div>
                    </a>
                <?php endif; ?>
            </div>


        <?php endwhile; ?>
        
    </div>

<?php endif; ?>