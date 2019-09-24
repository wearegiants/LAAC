<?php Themewrangler::setup_page();get_header( 'child-page' /***Template Name: Event Child Page */); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<header class="page-header header row">
  <div class="meta desktop-12 text-center">
    <div class="wrapper">
      <h1 class="title"><?php the_title(); ?></h1>
      <?php wp_nav_menu( array('theme_location'  => 'events','menu_class' => 'child-menu', 'container' => false, 'walker' => new clean_nav() ) ); ?>
    </div>
  </div>
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="desktop-12"><div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
  <?php endif; ?>
</header>

<section <?php post_class(); ?>>

  <div id="wrapper">
    <div id="wrap" class="row">
      <div class="desktop-12 bg-wrap">
        <div class="row">
          <section class="page_intro desktop-6 centered text-center">
            <?php the_content(); ?>
            <div class="desktop-12 verticaldivider">
              <div class="divider2"></div>
            </div>
          </section>
          <?php include('snippets/option_box.php'); ?>
        </div>
      </div>
      <?php get_template_part('templates/acf', 'gallery' ); ?>
      <?php  include('snippets/home_blocks.php'); ?>
      <section class="page_closer"><?php include('snippets/page_closer.php'); ?></section>
    </div>
  </div>
</section>

<div id="member-pop" class="zoom-anim-dialog mfp-hide bit-3 centered">
  <div class="">
    <div class="popup-container">
      <?php echo do_shortcode( '[gravityform id=3 title=false description=false ajax=true]' ); ?>
    </div>
  </div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>