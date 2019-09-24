<div <?php post_class('post'); ?>> 

  <?php $images = get_field('gallery'); if( $images ): ?>
  <div class="post-carousel carousel">
    <div class="post-slide slide first">
      <div class="post-centered">
        <h3 class="post-title"><?php the_title(); ?></h3>
        <span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
      </div>
      <img src="<?php echo $images[0]['sizes']['homepage-thumb-main']; ?>" alt="<?php echo $image['alt']; ?>" class="first img-responsive" />
    </div>
    <?php foreach( $images as $image ): ?>
    <div class="post-slide slide">
      <img src="<?php echo $image['sizes']['homepage-thumb-main']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php if( !$images ): ?>
  <header class="post-header text-center">
    <h3 class="post-title"><?php the_title(); ?></h3>
    <span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
  </header>
  <?php endif; ?>

  <?php if( get_field('media') ): ?>
  <div class="video"><?php the_field('media'); ?></div>
  <?php endif; ?>

  <div class="post-content fs-cell fs-lg-8 fs-md-5 fs-sm-3 fs-centered text-center"><?php the_content();?></div>
  <div class="post-share text-center">
    <span>Share:</span>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php bloginfo( 'siteurl' ) ?>/<?php the_permalink(); ?>" target="blank" class="ss-social ss-facebook"></a>
    <a href="https://twitter.com/home?status=<?php wp_title( ' | ', true, 'right' ); ?> <?php bloginfo( 'siteurl' ) ?><?php the_permalink(); ?>" target="blank" class="ss-social ss-twitter"></a>
  </div>
  
</div>

<hr class="post-divider">