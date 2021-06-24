<?php //</main>
// </section> ?>


        <?php // FOOTER NOTICES

        // Grab the select field data
        $footernotices = get_field('show_footer_notices', 'option');		
        // check the selection
        if($footernotices == 'yes') { ?>

        <div class="footer__notices">

                <?php get_template_part( 'page-components/footer/footer-notices' ); ?>

        </div>

        <?php   } ?>



<footer id="footer" class="footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">

        <?php   //Footer Main
             
        get_template_part( 'page-components/footer/footer-main' ); ?>




        <?php   // Footer Bottom
             
        get_template_part( 'page-components/footer/footer-bottom' ); ?>





        <div class="footer-background-ns-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="228.134" height="224.5" viewBox="0 0 228.134 224.5">
        <g id="Group_16" data-name="Group 16" transform="translate(0 0)">
        <g id="Group_15" data-name="Group 15">
        <path id="Path_1" data-name="Path 1" d="M492.427,332.939V458.283a2.914,2.914,0,0,1-2.921,2.9H443.9a2.914,2.914,0,0,1-2.921-2.9V355.513l-48.01-40.35v143.12a2.9,2.9,0,0,1-2.9,2.9H309.75a2.918,2.918,0,0,1-2.94-2.9V352.96a2.832,2.832,0,0,1,1.083-2.244l3.056-2.572a2.927,2.927,0,0,1,4.8,2.224V452.306l68.339-.019-.02-150.007a2.9,2.9,0,0,1,4.8-2.225l60,50.447a2.875,2.875,0,0,1,1.045,2.224v99.579l33.638-.019-.039-116.562L378.5,247.423l-105.3,88.553.019,122.307a2.9,2.9,0,0,1-2.921,2.9h-3.076a2.914,2.914,0,0,1-2.921-2.9V333.172a2.936,2.936,0,0,1,1.045-2.225l111.281-93.583a2.9,2.9,0,0,1,3.753.019L491.383,330.7A2.945,2.945,0,0,1,492.427,332.939Z" transform="translate(-264.293 -236.685)" fill="#1e1e1e"/>
        </g>
        </g>
        </svg>


        </div>



</footer>




<?php // all js scripts are loaded in library/functions.php 
?>




<?php wp_footer(); ?>



</div>

</div> <?php // locomotive scroll container ?>

</body>

</html> <!-- This is the end. My only friend. -->