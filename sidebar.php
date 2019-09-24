<aside id="sidebar" role="complementary">
<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
<ul class="xoxo">
<?php dynamic_sidebar( 'primary-widget-area' ); ?>
</ul>
<?php endif; ?>
</aside>
  <?php
if( have_rows('home_page_blocks') ): while ( have_rows('home_page_blocks') ) : the_row(); ?>
  <?php 
    $image = get_sub_field('home_page_section_image'); 
    $size_full = 'homepage-thumb-full';
    $size_half = 'homepage-thumb-half';
    $full_thumb = $image['sizes'][ $size_full ];
    $half_thumb = $image['sizes'][ $size_half ];
  ?>


  
  <div class="section <?php the_sub_field('home_page_section_width'); ?>"><div class="item">
    <div class="meta bottom bit-2">
      <?php the_sub_field('home_page_section_description'); ?>
      <a class="primary-button" href="<?php the_sub_field('home_page_section_block'); ?>">Learn More</a>
    </div>

  </div></div>
  <?php endwhile; else : echo (' no rows found '); endif;?>