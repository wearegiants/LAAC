<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?php wp_title(' | ', true, 'right'); ?></title>
<meta name="description" content="<?php bloginfo( 'description' ) ?>">
<link rel="shortcut icon" href="/assets/img/favicon.ico">

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

</head>

<body <?php if ( wp_is_mobile() ) { echo 'class="shifter"';}?> >
<?php get_template_part("snippets/header","skiptocontent"); ?>

<?php if ( wp_is_mobile() ) { ?>
<div id="wrapper" class="shifter-page">
<div id="header-wrap" class="mobile gridlock gridlock-fluid">
  <span class="shifter-handle">Menu</span>
  <div class="row">
    <header id="header" class="main-header text-center desktop-12 tablet-6 mobile-3">
      <div class="padder">
        <div class="row">
          <div class="desktop-3 tablet-3 mobile-1 centered"><a href="/" class="logo"><img class="logo" src="/assets/img/laac_white.png" alt="<?php bloginfo( 'sitename' ) ?>">&nbsp;</a></div>
          
          <?php 
            $menuParameters = array(
              'container'       => false,
              'echo'            => false,
              'items_wrap'      => '%3$s',
              'depth'           => 0,
              'theme_location'  => 'primary-navigation'
            );
          ?>
          <nav id="main-nav" class="desktop-12 tablet-6 mobile-3 centered text-center"><?php echo strip_tags( wp_nav_menu( $menuParameters ), "<a>") ; ?></nav>
        </div>
      </div>
    </header>
  </div>
</div>
  
<?php } else { ?>
<div id="wrapper">

<div id="header-wrap" class="gridlock gridlock-fluid"><div class="row">
  <header id="header" class="main-header text-center desktop-12 tablet-6 mobile-3">
    <div class="padder">
      <div class="row">
        <div class="desktop-1 tablet-2 mobile-1"><a href="/" class="logo" title='LAAC Home Page'><img class="logo" src="/assets/img/laac_white.png" alt="<?php bloginfo( 'sitename' ) ?>">&nbsp;</a></div>
        <?php 
          $menuParameters = array(
            'container'       => false,
            'echo'            => false,
            'items_wrap'      => '%3$s',
            'depth'           => 0,
            'theme_location'  => 'primary-navigation'
          );
        ?>
        <nav id="main-nav" class="desktop-10 tablet-4 mobile-2 text-center"><?php echo strip_tags( wp_nav_menu( $menuParameters ), "<a>") ; ?></nav>
        <?php get_template_part("snippets/header","socialmedia"); ?>
      </div>
    </div>
  </header><!--Header-->
</div></div>

<?php } ?>
<script src="https://static.triptease.io/paperboy/01DG2RA7C0HS8870TYT.js?hotelKey=e31bcf7641434e09989b61959342df1d" defer></script>
  <section id="content" role="main" <?php body_class(); ?>>
    <div class="wrap gridlock gridlock-fluid">

