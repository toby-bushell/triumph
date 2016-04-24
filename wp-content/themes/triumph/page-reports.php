<?php
/**
* Template Name: Reports
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper blog-page margin-bottom" role="main">
		<?php
			$args = array(
				'post_type' 	=> 'reports',
				'order' 		=> 'DESC',
				'nopaging' 		=> false,
				'post_status'	=> 'publish',
				);
			$the_query = new WP_Query($args);
			?>

		<?php if (have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
			<?php /*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );

		// End the loop.
		endwhile; wp_reset_query();

		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => __( 'Previous page', 'twentysixteen' ),
			'next_text'          => __( 'Next page', 'twentysixteen' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
		) );

	// If no content, include the "No posts found" template.
	else :
		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

			</div>


	</main><!-- .site-main -->



</div><!-- .content-area -->


<?php get_footer(); ?>
