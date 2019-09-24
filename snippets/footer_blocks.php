<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('category_name=video&showposts=1&post_type=post'.'&paged='.$paged); 
?>

<div id="footer-upper" class="gridlock gridlock-fluid">
  <div class="row">

    <div class="desktop-3 tablet-6 mobile-3" id="book-a-room">
      <div class="padder">
        <div class="meta sizer-item">
          <div class='h4like'>Book a Room</div>
          <div style='font-size:17px; padding-top:5px;'>When will you be joining us?</div>
          <?php get_template_part('snippets/date', 'picker' ); ?>
          <?php get_template_part('snippets/date', 'pickerjs' ); ?>
          <a class="primary-button-blue" href="/hotel">View Rooms</a>
        </div>
      </div>
    </div><!-- Book a Room -->

    <div class="desktop-3 tablet-3 mobile-3" id="twitter-feed">
      <div class="padder">
        <div class="meta sizer-item">
          <h4>Latest Club Updates</h4>
          <div class="tweet"></div>
          <div class="tweet-footer">
            <a href="http://twitter.com/laac">Follow us at @laac</a>
          </div>
        </div>
      </div>
    </div>

    <div class="desktop-6 tablet-3 mobile-3" id="featured-post">
      <div class="padder">
        <div class="meta sizer-item">
          <?php 
            // Video Stuff
            while ($wp_query->have_posts()) : $wp_query->the_post(); 
            $iframe = get_field('media');
            preg_match('/src="(.+?)"/', $iframe, $matches);
            $src = $matches[1];
            $params = array(
              'controls'    => 0,
              'showinfo'    => 0,
              'rel'         => 0
            );
            $new_src = add_query_arg($params, $src);
            $iframe = str_replace($src, $new_src, $iframe);
            $attributes = 'frameborder="0"';
            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
          ?>
          <div id="player"><?php echo $iframe; ?></div>
          <?php 
            endwhile;
            $wp_query = null; 
            $wp_query = $temp;  // Reset
          ?>
        </div>
      </div>
    </div><!-- Book a Room -->
    
  </div>
</div>