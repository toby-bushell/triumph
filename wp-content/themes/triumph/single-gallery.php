<?php
/**
* Template Name: Single Gallery Page
*/

get_header(); ?>
<link href="<?php bloginfo('template_directory');?>/css/lightbox.min.css" rel="stylesheet">
<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper" role="main">
	<h1 class="content-header gallery--header-tweak"><?php the_title();?></h1>
		<p class="gallery--header-tweak">Click an image for a larger view!</p>
	
<ul class="gallery">

		
		<?php $images = get_field('gallery');
			if ($images): ?>

				<?php foreach ($images as $image): ?>		
						<li class="gallery__image-wrapper">
							<a href="<?php echo $image['url'];?>" data-lightbox="triumph-gallery" data-title="<?php echo $image['caption'];?>">
								<img class="gallery__image" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt']; ?>"/>
							</a>
							
						</li>
					
				<?php endforeach;?>
		
			<?php endif; ?>

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
