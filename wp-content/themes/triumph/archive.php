<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php

$year     = get_query_var('year');
$month     = get_query_var('monthnum');
$month_padded = sprintf("%02d", $month);

$end_year = $year;

	if ($month_padded === '12' ){
		$next_month = '01';
		$end_year = $year + 1;
	}else {
		$next_month = $month + 1;
		$padded_next_month = sprintf("%02d",$next_month);
	}


$first_day = '01';


$current_date = $year . $month_padded . $first_day;
$end_date = $end_year . $padded_next_month .$first_day;


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main blog-page" role="main">


				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					?>
				</header><!-- .page-header -->


							<?php
							// Start the loop.


								 $today = $current_date;
									$args = array(
									'paged'					 => $paged,

									'meta_query' 		=> array(
										array(
											'key' 		=> 'event-date',
											'compare'	=> '>',
											'value' 	=> $today,
											),
											array(
												'key'		=>	'event-date',
												'compare' => '<',
												'value' => $end_date,
 											)
										),
									'meta_key' 	=> 'event-date',
									'orderby'	=> 'meta_value',
									'order'		=> 'ASC',
								);


						$my_query = new WP_Query( $args );

						while($my_query->have_posts() ) : $my_query->the_post();



								/*
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


			?>


		</main><!-- .site-main -->
	</div><!-- .content-area -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
