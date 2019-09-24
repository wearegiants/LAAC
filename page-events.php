<?php Themewrangler::setup_page();get_header(/***Template Name: Events */); ?>


<header class="page-header header frame wide bgGray">
  <div class="meta bit-1 text-center">
    <div class="wrapper">
      <h1 class="title"><?php the_title(); ?></h1>
          <?php wp_nav_menu( array('theme_location'  => 'events','menu_class' => 'child-menu', 'container' => false, 'walker' => new clean_nav() ) ); ?>
    </div>
  </div>
</header>

<div id="events" class="page-content">
  <div class="frame narrow">
  <?php 
  // args
  $args = array(
    'numberposts'      => -1,
    'post_type'        => 'event',
    'posts_per_page'   => '10',
    //'meta_key'         => 'neighborhood',
    //'orderby'          => 'meta_value title',
    'order'            => 'ASC',
  );

  $the_query = new WP_Query( $args ); ?>
  <?php if( $the_query->have_posts() ): ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

  <?php 
  $EventDate = get_field('event_date') ;
  if ( strpos( $EventDate , "/" ) == 2 ) {
  	$DateFormat = "d/m/Y" ;
  }
  elseif ( strpos( $EventDate , "/" ) == 4 ) {
  	$DateFormat = "Y/m/d" ;
  }
  else {
  	$DateFormat = "Ymd" ;
  }
  $date = DateTime::createFromFormat( $DateFormat , $EventDate);
  if ( empty( $date )){
  	continue ;
  }
    $formatedDate = $date->format('M d ,Y');
  ?>

  <div class="post clearfix bit-2">
    <div class="frame sizer-item">
      <div class="bit-2">
        <div class="meta">
          <span class="time"><?php echo $formatedDate; ?></span>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <span class="time"><?php the_field('event_time'); ?></span>
        </div>
        <?php the_excerpt(); ?>
        <br>
        <?php if( get_field('readmore') ) {?>
        <a href="<?php the_permalink(); ?>" class="readmore">Learn More</a>
        <?php } ?>
      </div>
      <div class="bit-2">
        <?php 
          if ( has_post_thumbnail() ) {

            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
            $thumb_url = $thumb_url_array[0];

            echo '<div class="image"><a href="'.$thumb_url.'" class="lightbox"><span class="ss-icon ss-glyphish-outlined">zoom</span>';
            the_post_thumbnail( 'medium', array( 'class' => 'img-responsive' ) );
            echo '</a></div>';
          }
        ?>
      </div>
    </div>
  </div><!-- The Post -->

  <?php endwhile; ?>
  <?php endif; ?> 
  <?php wp_reset_query();?>
  </div><!-- Frame -->
</div><!-- Events-->

<?php get_footer();