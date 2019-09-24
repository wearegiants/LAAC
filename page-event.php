<?php Themewrangler::setup_page();get_header(/***Template Name: Event Page */); ?>

<header class="page-header header">
<div class="meta bit-1 text-center">
  <div class="wrapper">
    <h1 class="title"><?php the_title(); ?></h1>
          <?php wp_nav_menu( array('theme_location'  => 'events','menu_class' => 'child-menu', 'container' => false, 'walker' => new clean_nav() ) ); ?>

  </div>
</div>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="bit-1"><div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
<?php endif; ?>
</header>

<section <?php post_class(); ?>>
  
  <div id="wrapper">
    <div id="wrap frame wide">
      <section class="page_intro"><?php include('snippets/page_intro.php'); ?></section>
      <?php include('snippets/option_box.php'); ?>
      <?php  include('snippets/home_blocks.php'); ?>
      <section class="page_closer"><?php include('snippets/page_closer.php'); ?></section>
    </div>
  </div>

</section>

<?php if ( is_page('weddings')) { ?>

<div id="member-pop" class="zoom-anim-dialog mfp-hide bit-3 centered">
  <div class="">
    <div class="popup-container">
      <?php echo do_shortcode( '[gravityform id=2 title=false description=false ajax=true]' ); ?>
    </div>
  </div>
</div>

<?php } ?>


<?php get_footer(); ?>