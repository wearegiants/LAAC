<?php Themewrangler::setup_page();get_header( 'child-page' /***Template Name: Child Page */); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part('templates/page', 'header' );?>

<div style="clear:both"></div>

<div class="page_content">
  <?php the_content(); ?>
  <?php get_template_part('templates/acf', 'gallery' ); ?>
</div>
<?php include('snippets/home_blocks.php'); ?>

<section class="page_closer">
<?php include('snippets/page_closer.php'); ?>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>