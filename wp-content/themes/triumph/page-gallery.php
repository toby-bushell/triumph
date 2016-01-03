<?php
/**
* Template Name: Gallery
*/

get_header(); ?>
<link href="<?php bloginfo('template_directory');?>/css/lightbox.min.css" rel="stylesheet">
<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper" role="main">

		<?php $images = get_field('gallery');
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



	</main>
</div><!-- .content-area -->
<script src="<?php bloginfo('template_directory');?>/js/lightbox.min.js"></script>

<?php get_footer(); ?>
