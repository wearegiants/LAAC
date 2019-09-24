<?php 
$images = get_field('gallery');

if( $images ): ?>
<div id="page-gallery" class="royalsliderArticle rsDefault">

    <?php 
    foreach( $images as $image ){
    	echo wp_get_attachment_image( $image['ID'] , 'homepage-thumb-half') ;
	}
	/*
	?>
            <img src="<?php echo $image['sizes']['homepage-thumb-half']; ?>" alt="<?php echo $image['alt']; ?>" />
    <?php endforeach; 
    */?>

</div>
<?php endif; ?>