<?php Themewrangler::setup_page('update | not grid | default');get_header('update'/***Template Name: News */); ?>

<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=6'.'&paged='.$paged); 
?>

<?php get_template_part('templates/page', 'header' );?>

<div class="fs-row">
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<div class="fs-cell fs-lg-12 fs-md-6 fs-sm-3 fs-centered">
<?php include locate_template('snippets/news-post.php'); ?>
</div>
<?php endwhile; ?>
</div>

<hr class="invisible">

<nav>
    <?php previous_posts_link('&laquo; Newer') ?>
    <?php next_posts_link('Older &raquo;') ?>
</nav>

<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>

<hr class="invisible">

<?php get_footer(); ?>