<?php
/**
* Template Name: Who's Who
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper" role="main">

		<?php 
			$args = array(
				'post_type' 	=> 'whos-who',
				'order' 		=> 'ASC',
				'nopaging' 		=> false,
				'post_status'	=> 'publish',
				);
			$the_query = new WP_Query($args);
			?>

		<?php if (have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
			<div class="blocks blocks--2column">
				<?php 
					$image 		= get_field('bio_image');
					$bio_name 	= get_field('bio_name');
					$bio_number = get_field('bio_number');
					$bio_email	= get_field('bio_email'); ?>


					<p class="blocks__title"><?php the_title();?></p>

					<?php if ($image): ?> 
							<div class="blocks__image">
								<img src="<?php echo $image['url']; ?>"/>
							</div>
						<?php endif; ?>

					<div class="blocks__content">
						

							<?php if ($bio_name): ?>
								<p class="blocks__text bio_name"><?php echo $bio_name; ?></p>
							<?php endif; ?>

							<?php if($bio_number):?>
								<p class="blocks__text bio_number"><?php echo $bio_number;?></p>
							<?php endif; ?>

							<?php if($bio_email):?>
								<p class="blocks__text bio_email"><?php echo $bio_email;?></p>
							<?php endif; ?>

								<!-- Bio Text -->
							<?php the_content();?>
					</div>
				
			</div>
		<?php endwhile; endif ;?>

	</main><!-- .site-main -->



</div><!-- .content-area -->


<?php get_footer(); ?>
