<?php Themewrangler::setup_page();get_header( 'history'/***Template Name: History */); ?>

<?php
  $args = array(
    'post_type'      =>  'page',
    'posts_per_page' =>  -1,
    'post_parent'    => $post->ID,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
  );

  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query($args); 
  $counter = 1;
  $next_counter = 2;
?>

<div id="history_page">

  <ul id="history-nav">
    <li class="control"><a onClick="$('#history_slider').data('royalSlider').prev();"><i class="ss-icon ss-glyphish-outlined">left</i></a>
    <?php $paginationCount = 0; while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>
    <li><a data-rscount="<?php echo $paginationCount+1; ?>" class="bullet" id="button_<?php echo $paginationCount; ?>" onClick="$('#history_slider').data('royalSlider').goTo(<?php echo $paginationCount; ?>);"><?php the_title();?></a></li>
    <?php $paginationCount++; endwhile; ?> 
    <li class="control"><a onClick="$('#history_slider').data('royalSlider').next();"><i class="ss-icon ss-glyphish-outlined">right</i></a>
  </ul>

  <div id="history_slider" class="royalSlider rsDefault">
    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>

    <?php 
    
      if ( has_post_thumbnail() ) {
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
        $thumb_url = $thumb_url_array[0];
      } else {
        $thumb_url = '';
      }

      if( get_field('needs_columns') ) {
        $needsColumns = " needs-columns";
      } else {
        $needsColumns = " no-column text-center ";
      }

      if( get_field('hide_content') ) {
        $hidden   = "hide";
      } else {
        $hidden   = "";
      }

      if( get_field('light_background') ) {
        $bgColor   = "light";
      } else {
        $bgColor   = "";
      }

    ?>

    <div id="panel-<?php echo $counter; ?>" class="panel <?php echo $bgColor; ?> <?php echo $hidden; ?>" data-rscount="<?php echo $counter; ?>">
      <div class="row">
        <div class="cell">
          <div class="desktop-8 centered">
            <div class="desc<?php echo $needsColumns; ?>">
              <h3 class="panel-title"><?php the_title(); ?></h3>
              <div class="content"><?php the_content(); ?></div>
              <div class="desktop-3 centered">
                <!--
                <?php if( get_field('needs_columns') ) { ?>
                <button onClick="$('#history_slider').data('royalSlider').goTo(<?php echo $counter-1; ?>);"><?php the_sub_field('next_button_text'); ?></button>
                <?php } else { ?>
                <button onClick="$('#history_slider').data('royalSlider').goTo(<?php echo $counter-1; ?>);">Next</button>
                <?php } ?>
                -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg" style="background-image: url('<?php echo $thumb_url; ?>')"></div>
    </div>

    <?php $counter++; // add one per row ?> 
    <?php $next_counter++; // add one per row ?> 
    <?php endwhile; ?>

    <?php 
      $wp_query = null; 
      $wp_query = $temp;  // Reset
    ?>

  </div>
</div>

<?php get_footer('history'); ?>