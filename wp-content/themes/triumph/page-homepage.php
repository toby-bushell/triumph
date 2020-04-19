<?php
/**
* Template Name: Homepage
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper" role="main">

		<div class="single-item">
			<?php $images = get_field('slider-images');
				if ( $images ): ?>
					 <?php foreach( $images as $image ): ?>
					<div class="slider-content">

						<div class="slider-content-text">
							<h2 class="content-header"><?php echo $image['caption'];?></h2>
							<p><?php echo $image['description'];?></p>
						</div>

						<div class="slider-content-image" style="background-image: url(<?php echo $image['url'];?>)">
						 	<!-- <img src="<?php echo $image['url']; ?>"/> -->
						</div>

					</div>
				<?php endforeach; ?>
			<?php endif; ?>


		</div>

	<!-- Event Section -->

	<div class="section off-black">
		<h2 class="section-header"><?php the_field('events-header');?></h2>

		<!-- Query for homepage events, 3 next events after todays date -->
			<?php
				 $today = date('Ymd');
					$featured_posts = get_featured_posts();

					$args = array(
					'nopaging' 			=> false,
				'post__not_in'		=> $featured_posts['ids'],
					'post_status' 		=> 'publish',
					'posts_per_page' 	=> 3,
					'meta_query' 		=> array(
						array(
							'key' 		=> 'event-date',
							'compare'	=> '>=',
							'value' 	=> $today,

							)
						),
					'meta_key' 	=> 'event-date',
					'orderby'	=> 'meta_value',
					'order'		=> 'ASC',
				);

		$my_query = new WP_Query( $args );
		while($my_query->have_posts() ) : $my_query->the_post(); ?>

			<div class="col-md-4 ">
				<div class="event-3-grid">
						<div class="event-where">
							<p><?php echo get_field('event-location');?></p>
						</div>
								<?php $date = get_field('event-date');?>

						<div class="event-when">
								<!--Date Formatting -->
									<?php if($date):?>
                      <p><?php echo $date;?></p>
									<?php endif; ?>
						</div>
						<?php $date1 = get_field('event-to-date');
              if($date1): ?>	
                <div class="event-when--to event-dates-home">
										<p><?php echo $date1;?></p>
									</div>
							<?php endif; ?>

						<div class="event-description">
							<p><?php echo wp_trim_words (get_the_content('',FALSE,''), 25);?></p>
							<a href= "<?php the_permalink();?>">Read More</a>
						</div>
				</div>
			</div>

		<?php endwhile;?>
<?php wp_reset_query(); ?>
	</div>	<!-- END OF EVENT SECTION -->
			
			<?php

			if( have_rows('monthly_meetings') ):

				// loop through the rows of data
					while ( have_rows('monthly_meetings') ) : the_row(); ?>

						<div class="section off-black">
							<h2 class="section-header"><?php the_sub_field('meeting_place');?></h2>
								<div class="col-md-6 left-section-text">
									<h3 class="content-header"><?php the_sub_field('meeting_location');?></h3>
									<?php the_sub_field('meeting_place_information');?>
								</div>
								<div class="col-md-6">
										<?php
										$location = get_sub_field('meeting_map');
										if( !empty($location) ):?>
										<div class="acf-map">
											<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
										</div>
										<?php endif; ?>
								</div>
						</div>

					<?php endwhile;
				endif;

			?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<script>
	jQuery(document).ready(function(){
	  jQuery('.single-item').slick({

	  });
	});
</script>

<?php $key =  get_field('google_api_key', 'options'); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key;?>"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/styles.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/slick/slick.js"></script>
<?php get_footer(); ?>
