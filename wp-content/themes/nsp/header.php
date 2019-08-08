<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <?php wp_head(); ?>
</head>

<body <?php body_class('js-fixed-header'); ?>>
  <div id="main-wrapper" class="hfeed">
    <header id="header" class="header js-header-container">
      <div class="container header__wrapper">
<!--         <div id="branding" class="header__logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home" aria-label="Retour à l'accueil"></a>
        </div> -->
<!--         <nav id="menu" class="header__menu js-menu">
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </nav> -->
      </div>
    </header>
    <div class="wrapper">
      <nav id="menu" class="active">
        <div class="menu-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="Retour à l'accueil"><h1>NANTES SOUS PRESSION</h1></a>
        </div>
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
      </nav>
