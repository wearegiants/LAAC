<?php 
if( get_field('image_slider') ):
?>
	<div id="section_home" class="section desktop-12 wide">
	  <div class="royalslider rsDefault">
	      <?php 
		  $images = get_field('image_slider');
	      foreach( $images as $image ) :
	      	echo wp_get_attachment_image( $image['ID'] , "full",false,array('class'=>'rsimg')) ;
	      endforeach; 
	      ?>
	  </div>
	</div>
<?php 
	//<div class="meta"><p class="caption"><?php echo $image['caption']; ? ></p></div>
endif; 