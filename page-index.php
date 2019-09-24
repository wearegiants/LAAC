<?php Themewrangler::setup_page();get_header( 'homepage' /***Template Name: Front Page */); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="home row">
<?php include('snippets/home_image_slider.php'); ?><!-- Splash -->
<?php include('snippets/home_blocks.php'); ?>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>