<?php
  
  $title = get_sub_field('title');
  $make = get_sub_field('make');
  $model = get_sub_field('model');
  $wanted_by = get_sub_field('wanted_by');
  $email = get_sub_field('email');
  $description = get_sub_field('description');
?>
<div class="container--slim">
  <div class="blocks blocks--1column">
  
    <p class="blocks__title"><?php echo $title;?></p>
    
    <div class="blocks__content">

      <?php if($make) : ?>
        <p><span>Make:</span>
        <?php echo $make ?></p>
      <?php endif; ?> 

      <?php if($model) : ?>
        <p><span>Model:</span>
        <?php echo $model ?></p>
      <?php endif; ?> 
      
      <?php if($wanted_by) : ?>
        <p><span>Wanted by:</span>
        <?php echo $wanted_by ?></p>
      <?php endif; ?> 
      
      <?php if($email) : ?>
        <p><span>Email:</span>
        <?php echo $email ?></p>
      <?php endif; ?>
      
      <?php if($description) : ?>
        <p><span>Description:</span>
        <?php echo $description ?></p>
      <?php endif; ?> 

    </div>
  </div>
</div>