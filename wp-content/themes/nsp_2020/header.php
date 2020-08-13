<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <?php 
    if ($_SERVER['SERVER_NAME'] != 'www.nantes-sous-pression.com') {
      echo "<meta name=\"robots\" content=\"noindex\">";
    }
  ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon.png" type="image/x-icon"/>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon.png" type="image/x-icon"/>
  <title>Nantes Sous Pression</title>
  <?php wp_head(); ?>
</head>

<body <?php body_class('js-fixed-header'); ?>>
  <div id="main-wrapper" class="hfeed">
    <header id="header" class="header js-header-container">
      <div class="container header__wrapper">
      </div>
    </header>
    <div class="wrapper">
      <nav id="menu" class="active">
        <div class="menu-title">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="Retour à l'accueil">
            <img class="hide-mobile" src="<?php echo get_stylesheet_directory_uri();?>/img/Logo.png">
            <img class="hide-desktop" src="<?php echo get_stylesheet_directory_uri();?>/img/Logo-small.png">
          </a>
        </div>
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
      </nav>