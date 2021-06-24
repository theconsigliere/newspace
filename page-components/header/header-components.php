

    <?php 

			// are there any rows within within our flexible content?
			if (have_rows('header_layouts', 'option')) :

				
				// loop through all the rows of flexible content
				while (have_rows('header_layouts', 'option')) : the_row();



					// Logo Middle
					if (get_row_layout() == 'logo_middle')
					get_template_part('page-components/header/logo', 'middle');


	
				endwhile; // close the loop of flexible content


			else :


			get_template_part('page-components/header/header', 'default');



			endif; // close flexible content conditional


	?>



