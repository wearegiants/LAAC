<header class="page-header header row">

  <div class="meta desktop-12 text-center">
    <div class="wrapper">
      <h1 class="title"><?php the_title(); ?></h1>
      <?php $children = get_pages('child_of='.$post->ID);?>
      <?php if( count( $children ) != 1 ) { ?>
        <ul id="menu-athletics" class="child-menu no-children clearfix">
          <?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
        </ul>
      <?php }?>
    </div>
  </div>

  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="desktop-12">
    <div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')">
      <?php if(is_page('hotel')) {?> 
        <div class="bit-2" id="picker-wrapper">
          <?php get_template_part('snippets/date', 'picker' ); ?>
        </div>
      <?php } ?>
    </div>
  </div>
  <?php endif; ?>
</header>