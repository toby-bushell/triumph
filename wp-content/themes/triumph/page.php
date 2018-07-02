<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
    <?php
    
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>

      <div class="container--slim">
        <?php the_title( '<h1 class="content-header">', '</h1>' ); ?>
        <?php the_content(); ?>
      </div>


      <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
      }
      
      get_template_part( 'template-parts/content', 'page-builder' );


			// End of the loop.
		endwhile;
		?>
    
    

	</main><!-- .site-main -->



</div><!-- .content-area -->


<?php get_footer(); ?>
