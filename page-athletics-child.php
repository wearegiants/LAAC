<?php Themewrangler::setup_page();get_header( 'child-athletics' /***Template Name: Athletics Child */); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<header class="page-header header row">
  <div class="meta desktop-12 text-center">
    <div class="wrapper">
      <h1 class="title"><?php the_title(); ?></h1>
      <?php include('snippets/athletics_nav.php'); ?>
    </div>
  </div>
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="desktop-12"><div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
  <?php endif; ?>
</header>

<div <?php post_class(); ?>>

  <div class="page_specific row">
    <?php include('snippets/image_slider.php'); ?>
  </div>

  <div class="wrapper">
    <div class="wrap row">
      <section class="page_intro desktop-6 centered">
        <?php the_content(); ?>
      </section>
      <br><br>
      <?php include('snippets/option_box.php'); ?>
      <?php include('snippets/home_blocks.php'); ?>
      
    </div>
  </div>

</div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>