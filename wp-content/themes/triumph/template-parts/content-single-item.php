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
    <?php 
    $price 		= get_field('for_sale_price');
    $suffix 		= get_field('for_sale_price_suffix');
    $description = get_field('for_sale_description');
    $summary = get_field('for_sale_summary');
    $email	= get_field('for_sale_contact_email'); 
    $name	= get_field('for_sale_contact_name'); 
    $images	= get_field('for_sale_images'); 
    ?>

	<div class="single-post items-single">
    <div class="container--slim">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <div class="items-single__wrapper">
        <div class="single-post__summary">
          <?php if($price) :?>
            <p class="blocks__price">£<?php echo number_format($price) . ' ' .  $suffix  ?></p>
          <?php endif; ?>
          <?php if($name) :?>
            <p class="blocks__seller"><?php echo $name ?></p>
          <?php endif; ?>
          <?php if($email) :
            $subject = 'Enquiry for: ' . get_the_title();
            ?>

          <p class="blocks__email"><a href="mailto:<?php echo $email ?>?subject=<?php echo $subject; ?> "><?php echo $email;?></a>
          <?php endif; ?>
          
          <h3>Summary</h3>
          <p><?php echo $summary ?></p>
        </div>

        <?php if ($images): ?>
          <div class="single-featured-image">
            <img src="<?php echo $images[0]['sizes']['medium_large']; ?>" alt="<?php echo $images[0]['alt'] ?>"/>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  
  <div class="single-post__full">
    <div class="container--slim">
      <h3>More info</h3>
      <?php echo $description ?>


      <ul class="gallery">
        <?php 
          if ($images): ?>

            <link href="<?php bloginfo('template_directory');?>/css/lightbox.min.css" rel="stylesheet">
            <script src="<?php bloginfo('template_directory');?>/js/lightbox.min.js"></script>  

            <?php foreach ($images as $image): ?>		
                <li class="gallery__image-wrapper">
                  <a href="<?php echo $image['url'];?>" data-lightbox="triumph-gallery" data-title="<?php echo $image['caption'];?>">
                    <img class="gallery__image" src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt']; ?>"/>
                  </a>
                </li>
              
            <?php endforeach;?>


          <?php endif; ?>

        </ul>
    </div>
  </div>
	

</article><!-- #post-## -->
