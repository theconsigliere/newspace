(function($){

    /**
     * List
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

        const lists = $( $block ).find('.list__item')

        console.log(lists)

        if (lists) {
            function showList(event) {

                // get individual list item
                let thisItem = event.target.closest('.list__item')

                // Show / hide desc

                const desc = thisItem.querySelector('.list__item_desc')
            
                //get a perfect slide down 
                
                if ( desc.offsetHeight > 0 ) {
                    // console.log('scrollUp')
                    desc.style.height = `0px`;
                } else {
                    // console.log('scrollDown')
                    desc.style.height = `${desc.scrollHeight}px`;
                }


                // get icon div
                const icon = thisItem.querySelector('.list__item_title').querySelector('.list__item_span')

                // toggle between down arrow and straight bullet point
                icon.children[0].classList.toggle('js_list__left')
                icon.children[1].classList.toggle('js_list__right')
            }


            lists.each( function() {
                $(this).on("click", showList)
            })
        }
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.list-section').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=list-section', initializeBlock );
    }

})(jQuery);


