<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	
	<div class="entry-content">
		<div class="single-featured-image">
			<?php twentysixteen_post_thumbnail(); ?>
		</div>
		<?php
		/* CUSTOM FIELDS */

			$meeting_place = get_field('event-location');
			if ($meeting_place):?>
					<div class="event-where">
						<p><?php echo get_field('event-location');?></p>
					</div>
			<?php endif; ?>
	
		
			<!--Date Formatting -->
			<?php $date = get_field('event-date');
				if($date):
					?>	<div class="event-when"><?php
							$event_date = DateTime::createFromFormat('Ymd', get_field('event-date')); ?>
							<p><?php echo $event_date->format('d F Y');?></p>
						</div>
				<?php endif; 
					
			the_content();?>

			<div class="gmaps-div">
				<?php $location = get_field('maps-single');

					if( !empty($location) ): ?>
						<div class="acf-map">	
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
					<?php endif; 

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
