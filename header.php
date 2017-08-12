<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "col-" div.
 *
 * @package Maerquin_Alexandra
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title ><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
  <div class="main">

  <!-- brand header -->
  <div class="top-header">
		<img src="<?php bloginfo('template_directory'); ?>/img/rsv.png" class="img-responsive"> <!-- juiste pad invoeren -->
	</div>

  <!-- carousel -->
  <div id="carousel-example" class="carousel" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example" data-slide-to="1"></li>
      <li data-target="#carousel-example" data-slide-to="2"></li>
      <li data-target="#carousel-example" data-slide-to="3"></li>
      <li data-target="#carousel-example" data-slide-to="4"></li>
      <li data-target="#carousel-example" data-slide-to="5"></li>
      <li data-target="#carousel-example" data-slide-to="6"></li>
      <li data-target="#carousel-example" data-slide-to="7"></li>
    </ol>

    <div class="carousel-inner">
      <div class="item active">
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/slider1.jpg"></a>
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/slider2.jpg"></a>
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/slider3.jpg"></a>
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/slider4.jpg"></a>
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/slider5.jpg"></a>
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/slider6.jpg"></a>
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/slider7.jpg"></a>
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/slider8.jpg"></a>
        <div class="carousel-caption">
        </div>
      </div>
    </div>

    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>

  <!--- menu -->
  <!-- menu toggle for tablet and mobile -->
<nav class="navbar navbar-default megamenu">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- menu for pc -->
	<div id="main-navbar" class="collapse navbar-collapse">
    <ul>
    <?php
                   $locations = get_nav_menu_locations();
                   if ( isset( $locations[ 'mega_menu' ] ) ) {
                       $menu = get_term( $locations[ 'mega_menu' ], 'nav_menu' );
                       if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
                           foreach ( $items as $item ) {
                               echo "<li id=\"{$item->title}\">";
                                   echo "<a href=\"{$item->url}\">{$item->title}</a>";
                                   if ( is_active_sidebar( 'mega-menu-widget-area-' . $item->ID ) ) {
                                       echo "<div id=\"mega-menu-{$item->ID}\" class=\"mega-menu\">";
                                        dynamic_sidebar( 'mega-menu-widget-area-' . $item->ID
                                      );
                                       echo "</div>";
                                   }
                               echo "</li>";
                           }
                       }
                   }
               ?>
      <ul>
  </div>
</nav>
