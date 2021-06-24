(function($){

      /**
     * Slideshow Block
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */

  var initializeBlock = function( $block ) {
   
      $block.find(".slick-slider").slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        rows: 0
      });
  }

  // Initialize each block on page load (front end).
  $(document).ready(function(){
  
    $('.slideshow').each(function(){
      initializeBlock( $(this) );
  });
  });

  // Initialize dynamic block preview (editor).
  if( window.acf ) {
      window.acf.addAction( 'render_block_preview/type=slideshow', initializeBlock );
  }

})(jQuery);