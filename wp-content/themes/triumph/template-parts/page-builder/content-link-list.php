<?php 

$title = get_sub_field('list_name'); ?>
<div class="block-wrapper">
  <div class="container--slim">

    <div class="blocks blocks--2column">
      <p class="blocks__title"><?php echo $title; ?></p>
      <div class="blocks__content blocks--links">

        <?php if( have_rows('link_item') ):
        
          // loop through the rows of data
          while ( have_rows('link_item') ) : the_row(); 
            $linkTitle = get_sub_field('link')['title'];
            $linkURL = get_sub_field('link')['url'];
            $linkTarget = get_sub_field('link')['target'];
          ?>

            <a href="<?php echo $linkURL; ?>" 
              target="<?php echo $linkTarget; ?>"
              >
              <?php echo $linkTitle; ?>
            </a>

          <?php endwhile; 
          endif; ?>
          
      </div>
    </div>
  </div>
</div>

