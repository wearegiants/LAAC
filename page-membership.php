<?php Themewrangler::setup_page();get_header(/***Template Name: Membership */); ?>
<?php get_template_part('templates/page', 'header' );?>

<section <?php post_class(); ?>>

  <article class="content"><?php the_content(); ?></article>
  
  <div class="wrapper">
    <div class="wrap row">
      <section class="page_intro desktop-6 centered text-center"><?php include('snippets/page_intro.php'); ?></section>
      <?php include('snippets/option_box.php'); ?>
      <?php include('snippets/home_blocks.php'); ?>
      <section class="page_closer"><?php include('snippets/page_closer.php'); ?></section>
    </div>
  </div>

  <div id="member-pop" class="zoom-anim-dialog mfp-hide bit-3 centered">
    <div class="">
      <div class="popup-container">
        <?php echo do_shortcode( '[gravityform id=1 title=false description=false ajax=true]' ); ?>
      </div>
    </div>
  </div>

  <div id="executive-pop" class="zoom-anim-dialog mfp-hide bit-66 centered">
    <div class="">
      <div class="popup-container">
        <?php the_field('executive_field'); ?>
      </div>
    </div>
  </div>

  <div id="associate-pop" class="zoom-anim-dialog mfp-hide bit-66 centered">
    <div class="">
      <div class="popup-container">
        <?php the_field('associate_field'); ?>
      </div>
    </div>
  </div>

  <div id="junior-pop" class="zoom-anim-dialog mfp-hide bit-66 centered">
    <div class="">
      <div class="popup-container">
        <?php the_field('junior_field'); ?>
      </div>
    </div>
  </div>

</section>


<?php get_footer(); ?>