<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>

</head>

<body <?php body_class('js-fixed-header'); ?>>
  <div id="main-wrapper" class="hfeed">
    <header id="header" class="header js-header-container">
      <div class="container header__wrapper">
        <div id="branding" class="header__logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home" aria-label="Retour à l'accueil">NSP</a>
        </div>
        <nav id="menu" class="header__menu js-menu">
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </nav>
      </div>
    </header>
    <div id="content-wrapper" class="page-container">
