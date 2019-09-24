<?php Themewrangler::setup_page();get_header( 'athletics-page' /***Template Name: Athletic Classes */); ?>

<header class="page-header header">
  <div class="meta desktop-12 text-center">
    <div class="wrapper">
      <h1 class="title"><?php the_title(); ?></h1>
      <?php include('snippets/athletics_nav.php'); ?>
    </div>
  </div>
</header>

<div <?php post_class(); ?>>

  <article class="content">
    <?php the_content(); ?>
  </article>
  
  <div class="page_specific row">
    <?php include('snippets/image_slider.php'); ?>
  </div>

  <div class="wrapper">
    <div class="wrap row">
      <section class="page_intro desktop-6 centered text-center">
        <?php include('snippets/page_intro.php'); ?>
      </section>
      <?php include('snippets/option_box.php'); ?>
      <?php include('snippets/home_blocks.php'); ?>
      <section class="page_closer">
        <?php include('snippets/page_closer.php'); ?>
      </section>
    </div>
  </div>

</div>


<?php get_footer(); ?>