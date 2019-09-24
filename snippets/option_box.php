<?php 
while ( have_rows('option_box') ) : 
	the_row(); 
	$image = get_sub_field('option_box_image');
	$OptionBoxText = get_sub_field('option_box_page_link_text');
	$OptionBoxWidth = get_sub_field('option_box_section_width');
	$OptionBoxTitle = get_sub_field('option_box_title');
	$OptionBoxDescription = get_sub_field('option_box_description');
	$CleanOptionBoxTitle = preg_replace( array( '#<[^>]+>#' , '#\s+#' ) , ' ', $OptionBoxTitle ) ;
	
	if ( is_page('membership')) {
		$LinkURL = get_sub_field('custom_link');
		if ( empty( $LinkURL ) ) {
			$LinkURL = '#member-pop';
		}
		$LinkClasses = "primary-button popup-with-form";
	}
	else {
		$LinkURL = get_sub_field('option_box_page_link') ;
		if ( is_array( $LinkURL ) && !empty( $LinkURL )){
			$LinkURL = $LinkURL[0] ;
		}
		$LinkClasses = "primary-button";
	}
	?>
	<div class="option-box-frame divClickable" title="<?php echo esc_attr( $CleanOptionBoxTitle ) ; ?>" onclick="$('a',this).click();return false;">
	  <div class="centered desktop-8 tablet-6 mobile-3">
	    <div class="section <?php echo $OptionBoxWidth; ?>">
	      <div class="option-wrapper">
	        <?php 
	        if( !empty($image)):
	        	echo wp_get_attachment_image( $image['ID'] , 'homepage-thumb-square',false,array('class'=>'option-box img-responsive')) ;
	        endif;
	        ?>
	        <div class='h4like'><?php echo $OptionBoxTitle; ?></div>
	        <div class='h6like'><?php echo $OptionBoxDescription; ?></div>
	        <a class="<?php echo $LinkClasses; ?>" style="color:#094678;" href="<?php echo $LinkURL?>" title="<?php echo esc_attr( $CleanOptionBoxTitle ) ; ?>">
	            <?php echo $OptionBoxText; ?>
	        </a>
	      </div>
	    </div>
	  </div>
	</div>
	
	<?php 
endwhile; 
