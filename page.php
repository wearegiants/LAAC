<?php Themewrangler::setup_page();get_header(); ?>

<?php get_template_part('templates/page', 'header' );?>

<section <?php post_class(); ?>>
  
  <div id="wrapper">
    <div id="wrap" class="row">
      <div class="desktop-12 bg-wrap">
        <div class="row">
          <?php  include('snippets/image_gallery.php'); ?>
          <section class="page_intro desktop-6 centered text-center"><?php include('snippets/page_intro.php'); ?></section>
          <?php include('snippets/option_box.php'); ?>
        </div>
      </div>
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