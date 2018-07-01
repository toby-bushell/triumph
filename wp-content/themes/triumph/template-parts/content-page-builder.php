<?php

// check if the flexible content field has rows of data
if( have_rows('options') ):

     // loop through the rows of data
    while ( have_rows('options') ) : the_row();

        if( get_row_layout() == 'layout_wanted' ):

            // check if the nested repeater field has rows of data
            if( have_rows('wanted_block') ):

              // loop through the rows of data
              while ( have_rows('wanted_block') ) : the_row();
  
              get_template_part( 'template-parts/page-builder/content', 'wanted' );
   
            endwhile;
    
          endif;

        endif;

    endwhile;

endif;

?>