<?php
/**
* Template Name: Standard
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper" role="main">
		<?php if (have_posts() ) : while ( have_posts () ) : the_post(); ?>

			<h1 class="content-header"><?php the_title();?></h1>

			<?php the_content();?>

		<?php endwhile; endif;?>	 
		

	</main><!-- .site-main -->



</div><!-- .content-area -->


<?php get_footer(); ?>
