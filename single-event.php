<?php Themewrangler::setup_page();get_header(); ?>

 <?php 
    $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
    //$formatedDate = $date->format('M d ,Y');
    $formatedDate = DateTime::createFromFormat('M d  ,Y', $date);

  ?>

<div class="page">

  <header class="page-header header">
    <div class="meta bit-1 text-center">
      <div class="wrapper">
        <h1 class="title"><?php the_title(); ?></h1>
        <?php wp_nav_menu( array('theme_location'  => 'events','menu_class' => 'child-menu', 'container' => false, 'walker' => new clean_nav() ) ); ?>
      </div>
    </div>
    <?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <div class="bit-1"><div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div></div>
    <?php endif; ?>
  </header>

  <section <?php post_class(); ?>>
    <div id="wrapper">
      <div id="wrap" class="frame wide">
        <section class="page_content">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div style="margin-bottom:30px;"><?php the_content(); ?></div>
          <?php endwhile; endif; ?>
        </section>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>