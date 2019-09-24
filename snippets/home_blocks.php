<?php 
while ( have_rows('home_page_blocks') ) : 
	the_row();

	$image = get_sub_field('home_page_section_image'); 
	$size_full = 'homepage-thumb-full';
	$size_half = 'homepage-thumb-half';
	$size_third = 'homepage-thumb-third';
	$full_thumb = !empty( $image['sizes'][ $size_full ] )  ?  $image['sizes'][ $size_full ] : '' ;
	$half_thumb = !empty( $image['sizes'][ $size_half ] ) ?  $image['sizes'][ $size_half ] : '' ;
	$third_thumb = !empty( $image['sizes'][ $size_third ] ) ? $image['sizes'][ $size_third ] : '' ;

	switch (get_sub_field('home_page_section_width') ) {
		case "bit-1":
		default:
			$itemWidth = 'full-width desktop-12 tablet-6 mobile-3';
			break ;
		case "bit-2":
			$itemWidth = 'half-width desktop-6 tablet-6 mobile-3' ;
			break ;
		case "bit-3":
			$itemWidth = 'thirds desktop-4 tablet-6 mobile-3' ;
			break ;
		case "bit-66":
			$itemWidth = 'two-thirds desktop-8 tablet-6 mobile-3' ;
			break ;
	}
?>
	<div class="home moded <?php echo $itemWidth; ?>">
	  <div class="section">
	      
	    <?php 
      	$LinkURL = get_sub_field('home_page_section_block');
      	if ( is_array( $LinkURL )){
      		if ( !empty( $LinkURL )){
      			$LinkURL = $LinkURL[0];
      		}
      		else {
      			$LinkURL='';
      		}
      	}
      	$BlockTitle = get_sub_field('home_page_section_title');
      	$BlockDescription = get_sub_field('home_page_section_description') ;
      	$BlockText = get_sub_field('home_page_section_block_text') ;
      	$CleanBlockTitle = preg_replace( array( '#<[^>]+>#' , '#\s+#' ) , ' ', $BlockTitle ) ;
      	if ( empty( $BlockTitle ) && empty( $BlockDescription )){
      		continue;
      	}
      	if( !empty( $BlockText )) { 
	      	?>
	    	<div class="item divClickable" style="background-image: url('<?php echo $image['url']?>');"  onclick="$('a',this).click();return false;" title="<?php echo $CleanBlockTitle; ?>">
			  <?php if( !empty( $BlockTitle ) ) { echo '<div class="overlay"></div>'; }?>
		      <div class="meta padder bottom>
		        <h2 class="title"><a class="title" href="<?php echo esc_attr( $LinkURL ) ; ?>"><?php echo $BlockTitle; ?></a></h2>
		        <p><?php echo $BlockDescription; ?></p>
		        <a class="primary-button" href="<?php echo esc_attr( $LinkURL ) ; ?>"><?php echo $BlockText; ?></a>
		      </div>
	    	</div>
	    <?php 
      	} 
      	else { ?>
	    	<div class="item" style="background-image: url('<?php echo $image['url']?>');">
			  <?php if( !empty( $BlockTitle ) ) { echo '<div class="overlay"></div>'; }?>
		      <div class="meta padder bottom">
		        <h2 class="title"><span class="title"><?php echo $BlockTitle; ?></span></h2>
		        <p><?php echo $BlockDescription; ?></p>
		      </div>
	    	</div>
	    <?php 
	    }?>
	  </div>
	</div>
<?php 
endwhile; ?>

<?php if(is_page('press')){?>
<?php if( have_rows('press_links') ): ?>

<div id="press-links">
<?php while ( have_rows('press_links') ) : the_row(); ?>
  <div class="press-group frame narrow centered">
    <h3 class="title"><?php the_sub_field('press_label'); ?></h3>
    <ul class="frame">
      <?php while ( have_rows('press_bank_links') ) : the_row(); ?>

      <?php 
        $image = get_sub_field('press_image');
        $url = $image['url'];
        $alt = $image['alt'];
        $size = 'full';
        $thumb = $image['sizes'][ $size ];
      ?>

      <li class="bit-3 sizer-item">
        <?php if( get_sub_field('press_image') ){ ?>
        <a href="<?php the_sub_field('press_url'); ?>" target="blank"><img class="img-responsive" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" /></a>
        <?php } else { ?>
        <a href="<?php the_sub_field('press_url'); ?>" target="blank"><img class="img-responsive" src="http://dummyimage.com/300x100/ffffff/a3a3a3&text=<?php the_sub_field('press_title'); ?>" ?></a>
        <?php } ?>
      </li>


      <?php endwhile; ?>
    </ul>
  </div>
<?php endwhile; ?>
</div>

<?php endif; ?>
<?php } ?>