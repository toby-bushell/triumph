<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header section-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>
	<?php $featured_download = get_field('featured_download'); ?>

	<div class="article-wrapper">

		<?php if($featured_download) : 
			?>
			<a class="post-thumbnail" href="<?php echo $featured_download['url'];?>" download >
				<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</a>
			<?php else : ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</a>

		<?php endif; ?>


	<div class="entry-content">
			<?php
		/* CUSTOM FIELDS */

			$meeting_place = get_field('event-location');
			if ($meeting_place):?>
					<div class="event-where">
						<p><?php echo get_field('event-location');?></p>
					</div>
			<?php endif; ?>

		<?php if($featured_download) : 
				the_content('',FALSE,''); 

				$filesize_in_bytes = filesize( get_attached_file( $featured_download['id'] ) );
				$filesize = formatSizeUnits($filesize_in_bytes); ?>
					<a href= "<?php echo $featured_download['url'];?>" download>Download here (<?php echo $filesize; ?>)</a>

		<?php else : ?>

				<!--Date Formatting -->
				<?php $date = get_field('event-date');
					if($date):
						?>	<div class="event-when">
								<p><?php echo $date;?></p>
							</div>
					<?php endif; ?>

				<!--End Date Formatting -->
				<?php $date1 = get_field('event-to-date');
					if($date1):
						?>	<div class="event-when event-when--to">
								<p><?php echo $date1;?></p>
							</div>
					<?php endif;

			/* translators: %s: Name of current post */
			the_content('',FALSE,'');?>

			<?php
				if($date):?>
					<a href= "<?php the_permalink();?>">Read More</a>
				<?php endif;
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
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
		<?php endif; ?>
	</div>
</article><!-- #post-## -->
