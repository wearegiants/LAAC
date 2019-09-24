<?php 
while ( have_rows('page_closer') ) : 
	the_row(); ?>

	<div class="bit-1">
	  <div class="divider2"></div>
	  <div class="divider3"></div>
	
	  <?php 
	    $closerDesc = get_sub_field('page_closer_description'); 
	  ?>
	
	  <?php if( have_rows('custom_outro_links') ): 
	  	echo '<div class="links">'; ?> 
		  <h6><?php echo $closerDesc; ?></h6>
		  <?php 
		  while ( have_rows('custom_outro_links') ) : 
			  the_row(); 
			  if(get_sub_field('link_type') == "disable"): 
			  else: ?>
		  		  <a target="<?php the_sub_field('target'); ?>" class="primary-button-blue-gray"  href="<?php the_sub_field('link_url'); ?>"><?php if(get_sub_field('link_type') == "menu"){ echo '<i class="ss-icon ss-glyphish-outlined">page</i>'; } ?><?php the_sub_field('link_title'); ?></a>
		  	  <?php 
		  	  endif; 
		  endwhile; 
	  	echo '</div>'; 
	  else : 
	  ?>
		  <h6><?php echo $closerDesc; ?></h6>
		  <a target="<?php the_sub_field('target'); ?>" class="primary-button-blue-gray"  href="<?php the_sub_field('page_closer_link'); ?>"><?php the_sub_field('page_closer_link_text'); ?></a>
	<?php 
	endif; ?>
	</div>
<?php 
endwhile; 
