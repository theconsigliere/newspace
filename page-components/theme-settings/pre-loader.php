<div class="centered_pre__loader">


    <div class="pl-text-zone">

        <div class="ttl-holder">
            <h2 class='pl-master-title'>

                <span class="pl-title-group">
                    <?php

                        if( have_rows('text_repeater', 'option') ): ?>
                    <?php while( have_rows('text_repeater', 'option') ) : the_row(); ?>

                    <span class='pl--title'><?php the_sub_field('title'); ?></span>

                    <?php endwhile; ?>
                    <?php endif; ?>

                    <span class="last-pl--title">new</span>

                </span><span class="pl-title-space">space</span>
            </h2>
        </div>

        <div class="text-holder">
            <h6 class='pl-text-b'>Architecture</h6>
        </div>


    </div>


    <div class="pl__logo-mark">
        <?php echo file_get_contents( get_stylesheet_directory_uri() . '/build/images/ns-symbol.svg' ); ?>

    </div>


</div>