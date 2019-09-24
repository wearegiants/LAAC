<?php $images = get_field('image_slider'); ?>

<div id="section_home" class="section home moded top desktop-12 tablet-6 mobile-3">
  <div class="section_home_content"><div class="padder"><?php the_content(); ?></div></div>
  <div class="flexslider">
    <ul class="slides">
      <?php foreach( $images as $image ): ?>
      <li class="slider item top" style="background-image: url('<?php echo $image['url']?>');"></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
