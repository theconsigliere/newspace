
<div class="footer__notice_inner">
<?php

// COLUMN REPEATER
if( have_rows('footer_notices', 'option') ): ?>

  
    <?php while ( have_rows('footer_notices', 'option') ) : the_row(); ?>



       <?php // FLEXIBLE CONTENT IN COLUMNS ?>

           <?php if (have_rows('footer_notice_item')) : while (have_rows('footer_notice_item')) : the_row();

                    // Footer Menu
                    if (get_row_layout() == 'title_desc') : ?>

                        <?php 
                            $link = get_sub_field('button');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                         <a class="footer__notice_item" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">

<div class="ft-inner">
<div class="footer__n-t">
                            <?php if (get_sub_field('title')) : ?>
                                <h5><?php the_sub_field('title'); ?></h5>
                            <?php endif; ?>

                            <?php if (get_sub_field('desc')) : ?>
                                <p><?php the_sub_field('desc'); ?></p>
                            <?php endif; ?>
                            </div>

                            <div class="footer__n-icon">
                           
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 476.213 476.213" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                                    <polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5 
                                        345.606,368.713 476.213,238.106 "/>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    </svg>

                            </div>
</div>

                   
                        </a>

                        <?php endif; ?>
                        
                

                    <?php endif;
    
                endwhile; // close the loop of flexible content

            endif; ?>

  

    <?php   endwhile; 

 endif; ?>
</div>
