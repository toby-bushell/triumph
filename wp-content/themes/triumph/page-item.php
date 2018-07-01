<?php
/**
* Template Name: For sale
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper margin-bottom" role="main">
    <div class="container--slim">
    <h1 class="content-header no-bottom-margin"><?php the_title();?></h1>

      <?php 
        $args = array(
          'post_type' 	=> 'items',
          'order' 		=> 'ASC',
          'nopaging' 		=> false,
          'post_status'	=> 'publish',
          );
        $the_query = new WP_Query($args);
        ?>

      <?php if (have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
        <div>
          <?php 
            $price 		= get_field('for_sale_price');
            $suffix 		= get_field('for_sale_price_suffix');
            $summary = get_field('for_sale_summary');
            $name	= get_field('for_sale_contact_name'); 
            $images	= get_field('for_sale_images'); 
          ?>
          
          <div class="blocks blocks--1column">

            <p class="blocks__title"><?php the_title();?></p>
            
            <?php if ($images): 
              ?> 
							<div class="blocks__image blocks__image--right">
								<img src="<?php echo $images[0]['sizes']['medium_large']; ?>" alt="<?php echo $images[0]['alt'] ?>"/>
							</div>
            <?php endif; ?>
            
            <div class="blocks__content">

              <p class="blocks__price">£<?php echo number_format($price) . ' ' .  $suffix  ?></p>
              <p class="blocks__seller"><?php echo $name ?></p>
              <p><?php echo $summary ?></p>

              <a href= "<?php the_permalink();?>" class="block-read-more" >Read More</a>

            </div>

          </div>

			</div>
      <?php endwhile; endif ;?>
    
    </div>

  </main><!-- .site-main -->

</div><!-- .content-area -->


<?php get_footer(); ?>
