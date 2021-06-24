<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="close-group">
            <span class="close">&times;</span>
        </div>
        <div class="modal-logo">

        <?php echo wp_get_attachment_image(get_field('logo', 'option'), 'full', "", array( "alt" => "Site Logo", "itemprop" => "logo" )); ?>

        </div>

        <h2><?php the_field('pop-up_title', 'option') ?></h2>
        <p><?php the_field('pop-up_text', 'option') ?></p>

  
        <div id="modal-link">
			<?php $link = get_field('pop-up_link', 'option');
			
			    if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>


    
            <a class="button"  href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

         
 <?php  endif; ?>

<div class="visually-hidden" id='modal-sider'>
<?php the_field('show_pop-up', 'option'); ?>
</div>

        </div><!-- #modal-link -->
  
    </div>

</div>