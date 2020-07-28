<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nantes Sous Pression</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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