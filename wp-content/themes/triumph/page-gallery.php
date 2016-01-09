<?php
/**
* Template Name: Gallery
*/

get_header(); ?>
<link href="<?php bloginfo('template_directory');?>/css/lightbox.min.css" rel="stylesheet">
<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper" role="main">
	<h1 class="content-header gallery--header-tweak"><?php the_title();?></h1>
		
		<?php 
			$args = array(
				'post_type' 	=>	'gallery',
				'order'			=>	'DESC',
				'nopaging'		=>	false,
				'post_status'	=>	'publish',
				);
		$the_query = new WP_Query($args);
		?>
<ul class="gallery">
		<?php if (have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?> 
			

		<?php $images = get_field('gallery');
			if ($images): ?>

			<?php $image1= $images[0]; ?>
				
					<a href="<?php echo the_permalink(); ?>">
						<li class="gallery__image-wrapper">
							
								<div class="gallery__image fit-parent" style="background-image: url(<?php echo $image1['url'];?>)"/>
							
							<p class="gallery__title"><?php the_title();?></p>
						</li>
					</a>
				
		
			<?php endif; ?>

<?php endwhile; endif;?>

	</ul>


<!-- 		<?php $images = get_field('gallery');
			if ($images): ?>
			
				<ul class="gallery">
					<?php foreach ($images as $image): ?>
						<li class="gallery__image-wrapper">
							<a href="<?php echo $image['url']; ?>" data-lightbox="triumph-gallery" data-title="<?php echo $image['caption']; ?>">
								<img class="gallery__image" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt']; ?>"/>
							</a>
						
						</li>
					<?php endforeach ; ?>
				</ul>
		
			<?php endif; ?>
 -->


	</main>
</div><!-- .content-area -->
<script src="<?php bloginfo('template_directory');?>/js/lightbox.min.js"></script>

<?php get_footer(); ?>
