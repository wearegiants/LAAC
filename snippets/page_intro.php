<?php if( have_rows('page_introduction') ): while ( have_rows('page_introduction') ) : the_row(); ?>


  <h5><?php the_sub_field('page_introduction_title'); ?></h5>
  <div class="divider" ></div>
  
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div><?php the_content(); ?></div>
  <?php endwhile; endif; ?>

  <?php if( have_rows('custom_intro_links') ):  while ( have_rows('custom_intro_links') ) : the_row(); ?>
  <?php if(get_sub_field('link_type') == "disable"): ?>
  <span class="primary-button-blue-gray" style="cursor: auto;"><?php the_sub_field('link_title'); ?></span>
  <?php else: ?>
  <a class="primary-button-blue-gray"  href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_title'); ?></a>
  <?php endif; ?>
  
  <?php endwhile; else : ?>
  
  <div>
    <?php if( get_sub_field('page_introduction_link_text') ): ?><a class="left-button" href="<?php the_sub_field('page_introduction_link'); ?>"><?php the_sub_field('page_introduction_link_text'); ?></a><?php endif; ?>
    <?php if( get_sub_field('page_introduction_link_text_2') ): ?><a class="right-button" style="color:#094678;" href="<?php the_sub_field('page_introduction_link_2'); ?>"><?php the_sub_field('page_introduction_link_text_2'); ?></a><?php endif; ?>
  </div>

  <?php endif; ?>

  <div class="bit-1 verticaldivider">
    <div class="divider2"></div>
  </div>


<?php endwhile; else : endif;?>
