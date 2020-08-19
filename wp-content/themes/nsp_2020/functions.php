<?php

// #### ##    ## #### ########
//  ##  ###   ##  ##     ##
//  ##  ####  ##  ##     ##
//  ##  ## ## ##  ##     ##
//  ##  ##  ####  ##     ##
//  ##  ##   ###  ##     ##
// #### ##    ## ####    ##

add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
  load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', array( 'search-form' ) );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}

add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts() {
  wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
  wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'blankslate_footer_scripts' );
function blankslate_footer_scripts() {
?>
  <script>
    jQuery(document).ready(function($) {
      var deviceAgent = navigator.userAgent.toLowerCase();
      if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios");
        $("html").addClass("mobile");
      }
      if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");
      } else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
      } else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
      } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
      } else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
      }
    });
  </script>
  <?php
}

function assets_enqueue() {
  /*
  * Add JavaScript.
  * wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
  */
  // wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/assets/js/swiper.min.js', array(), '4.5.0', true);
  // wp_enqueue_script('featherlight', get_stylesheet_directory_uri() . '/assets/js/featherlight.min.js', array(), '1.7.13', true);
  wp_enqueue_script('nsp', get_stylesheet_directory_uri() . '/script.js', array(), '1.0', true);
  // wp_enqueue_script('asset',  get_stylesheet_directory_uri() . '/assets/js/asset.js', array(), '1.0', true);
  /*
  * Add assets css CSS
  * wp_enqueue_style($handle, $src, $deps, $ver, $media);
  */
  // wp_enqueue_style('asset', get_stylesheet_directory_uri() . '/assets/css/asset.css', array(), '1.0', 'all');
  // Add css files depending on site
}
add_action('wp_enqueue_scripts', 'assets_enqueue');

//    ###     ######  ######## ####  #######  ##    ##  ######        ##
//   ## ##   ##    ##    ##     ##  ##     ## ###   ## ##    ##      ##
//  ##   ##  ##          ##     ##  ##     ## ####  ## ##           ##
// ##     ## ##          ##     ##  ##     ## ## ## ##  ######     ##
// ######### ##          ##     ##  ##     ## ##  ####       ##   ##
// ##     ## ##    ##    ##     ##  ##     ## ##   ### ##    ##  ##
// ##     ##  ######     ##    ####  #######  ##    ##  ######  ##
// ######## #### ##       ######## ######## ########   ######        ##
// ##        ##  ##          ##    ##       ##     ## ##    ##      ##
// ##        ##  ##          ##    ##       ##     ## ##           ##
// ######    ##  ##          ##    ######   ########   ######     ##
// ##        ##  ##          ##    ##       ##   ##         ##   ##
// ##        ##  ##          ##    ##       ##    ##  ##    ##  ##
// ##       #### ########    ##    ######## ##     ##  ######  ##
// ##     ## ######## ##       ########  ######## ########   ######
// ##     ## ##       ##       ##     ## ##       ##     ## ##    ##
// ##     ## ##       ##       ##     ## ##       ##     ## ##
// ######### ######   ##       ########  ######   ########   ######
// ##     ## ##       ##       ##        ##       ##   ##         ##
// ##     ## ##       ##       ##        ##       ##    ##  ##    ##
// ##     ## ######## ######## ##        ######## ##     ##  ######

add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) { $sep = '|'; return $sep; }

add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
  if ( $title == '' ) {
    return '...';
  } else {
    return $title;
  }
}

add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
  if ( ! is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
  }
}

add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
  if ( ! is_admin() ) {
    global $post;
    return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
  }
}

add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
  unset( $sizes['medium_large'] );
  return $sizes;
}

add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
  register_sidebar( array(
    'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}

add_action( 'wp_head', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}

add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}

function blankslate_custom_pings( $comment ) {
?>
    <li <?php comment_class(); ?> id="li-comment-
      <?php comment_ID(); ?>">
        <?php echo comment_author_link(); ?>
    </li>
    <?php
}

add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
  if ( ! is_admin() ) {
    global $id;
    $get_comments = get_comments( 'status=approve&post_id=' . $id );
    $comments_by_type = separate_comments( $get_comments );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}

// Autorisation SVG
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function normalize ($string) {
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj', 'd'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r',
    );

    return strtr($string, $table);
}

/**
 * Remove ancient Custom Fields Metabox because it's slow and most often useless anymore
 * ref: https://core.trac.wordpress.org/ticket/33885
 */
function jb_remove_post_custom_fields_now() {
	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		remove_meta_box( 'postcustom' , $post_type , 'normal' );
	}
}
add_action( 'admin_menu' , 'jb_remove_post_custom_fields_now' );

//    ###     ######  ########     #######  ########  ######## ####  #######  ##    ##  ######     ########     ###     ######   ########
//   ## ##   ##    ## ##          ##     ## ##     ##    ##     ##  ##     ## ###   ## ##    ##    ##     ##   ## ##   ##    ##  ##
//  ##   ##  ##       ##          ##     ## ##     ##    ##     ##  ##     ## ####  ## ##          ##     ##  ##   ##  ##        ##
// ##     ## ##       ######      ##     ## ########     ##     ##  ##     ## ## ## ##  ######     ########  ##     ## ##   #### ######
// ######### ##       ##          ##     ## ##           ##     ##  ##     ## ##  ####       ##    ##        ######### ##    ##  ##
// ##     ## ##    ## ##          ##     ## ##           ##     ##  ##     ## ##   ### ##    ##    ##        ##     ## ##    ##  ##
// ##     ##  ######  ##           #######  ##           ##    ####  #######  ##    ##  ######     ##        ##     ##  ######   ########

if( function_exists('acf_add_options_page') ) {

  // Page parente par défaut
	acf_add_options_page(array(
		'page_title' 	=> 'Nantes Sous Pression',
		'menu_title'	=> 'NSP',
		'menu_slug' 	=> 'theme-general-options',
		'capability'	=> 'edit_posts',
    'icon_url' => 'dashicons-welcome-learn-more',
    'position' => 25,
		'redirect'		=> true
	));
  // Sous page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Réglages',
		'menu_title'	=> 'Réglages',
		'parent_slug'	=> 'theme-general-options',
	));
	// Sous page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Intro',
		'menu_title'	=> 'Intro',
		'parent_slug'	=> 'theme-general-options',
	));
  // Sous page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact',
		'menu_title'	=> 'Contact',
		'parent_slug'	=> 'theme-general-options',
	));
	// Sous page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-options',
	));
  // Sous page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Réseaux sociaux',
		'menu_title'	=> 'Réseaux sociaux',
		'parent_slug'	=> 'theme-general-options',
	));
}


//  ######  ########  ########
// ##    ## ##     ##    ##
// ##       ##     ##    ##
// ##       ########     ##
// ##       ##           ##
// ##    ## ##           ##
//  ######  ##           ##

function cptui_register_my_cpts() {

	/**
	 * Post Type: Événements.
	 */

	$labels = array(
		"name" => __( "Événements", "nsp" ),
		"singular_name" => __( "Événement", "nsp" ),
		"menu_name" => __( "Événements", "nsp" ),
		"all_items" => __( "Tous les événements", "nsp" ),
		"add_new" => __( "Ajouter un événement", "nsp" ),
		"add_new_item" => __( "Ajouter un nouvel événement", "nsp" ),
		"edit_item" => __( "Modifier l'événement", "nsp" ),
		"new_item" => __( "Nouvel événement", "nsp" ),
		"view_item" => __( "Voir l'événement", "nsp" ),
		"view_items" => __( "Voir les événements", "nsp" ),
		"search_items" => __( "Recherche un événement", "nsp" ),
		"featured_image" => __( "Vignette de l'événement", "nsp" ),
		"set_featured_image" => __( "Définir la vignette", "nsp" ),
		"remove_featured_image" => __( "Supprimer la vignette", "nsp" ),
		"use_featured_image" => __( "Définir comme vignette", "nsp" ),
	);

	$args = array(
		"label" => __( "Événements", "nsp" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "events", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "events", $args );

	/**
	 * Post Type: Partenaires.
	 */

	$labels = array(
		"name" => __( "Partenaires", "nsp" ),
		"singular_name" => __( "Partenaire", "nsp" ),
		"menu_name" => __( "Partenaires", "nsp" ),
		"all_items" => __( "Tous les partenaires", "nsp" ),
		"add_new" => __( "Ajouter un partenaire", "nsp" ),
		"add_new_item" => __( "Ajouter un nouveau partenaire", "nsp" ),
		"edit_item" => __( "Modifier le partenaire", "nsp" ),
		"new_item" => __( "Nouveau partenaire", "nsp" ),
		"view_item" => __( "Voir le partenaire", "nsp" ),
		"view_items" => __( "Voir les partenaires", "nsp" ),
		"search_items" => __( "Rechercher unpartenaire", "nsp" ),
		"featured_image" => __( "Logo partenaire", "nsp" ),
		"set_featured_image" => __( "Définir le logo partenaire", "nsp" ),
		"remove_featured_image" => __( "Supprimer le logo partenaire", "nsp" ),
		"use_featured_image" => __( "Définir comme logo partenaire", "nsp" ),
	);

	$args = array(
		"label" => __( "Partenaires", "nsp" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "partners", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);

	register_post_type( "partners", $args );

	/**
	 * Post Type: Participants.
	 */

	$labels = array(
		"name" => __( "Participants", "nsp" ),
		"singular_name" => __( "Participant", "nsp" ),
		"menu_name" => __( "Participants", "nsp" ),
		"all_items" => __( "Tous les participants", "nsp" ),
		"add_new" => __( "Ajouter un participant", "nsp" ),
		"add_new_item" => __( "Ajouter un nouveau participant", "nsp" ),
		"edit_item" => __( "Modifier le participant", "nsp" ),
		"new_item" => __( "Nouveau participant", "nsp" ),
		"view_item" => __( "Voir le participant", "nsp" ),
		"view_items" => __( "Voir les participants", "nsp" ),
		"search_items" => __( "Rechercher un participant", "nsp" ),
		"featured_image" => __( "Logo du particiapant", "nsp" ),
		"set_featured_image" => __( "Définir le logo du participant", "nsp" ),
		"remove_featured_image" => __( "Supprimer le logo du participant", "nsp" ),
		"use_featured_image" => __( "Définir comme logo du participant", "nsp" ),
	);

	$args = array(
		"label" => __( "Participants", "nsp" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "participants", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "participants", $args );

  /**
	 * Post Type: FAQs.
	 */

	$labels = array(
		"name" => __( "FAQs", "nsp" ),
		"singular_name" => __( "FAQ", "nsp" ),
		"menu_name" => __( "Faqs", "nsp" ),
		"all_items" => __( "Faqs", "nsp" ),
		"add_new" => __( "Ajouter", "nsp" ),
		"add_new_item" => __( "Ajouter une nouvelle FAQ", "nsp" ),
		"edit_item" => __( "Modifier FAQ", "nsp" ),
		"new_item" => __( "Nouvelle FAQ", "nsp" ),
		"view_item" => __( "Voir FAQ", "nsp" ),
		"view_items" => __( "voir FAQs", "nsp" ),
		"search_items" => __( "Rechercher une FAQ", "nsp" ),
		"not_found" => __( "Introuvable", "nsp" ),
		"not_found_in_trash" => __( "Introuvable dans la corbeille", "nsp" ),
		"featured_image" => __( "Image liée à la FAQ", "nsp" ),
		"set_featured_image" => __( "Lier une image", "nsp" ),
		"remove_featured_image" => __( "Supprimer l'image liée", "nsp" ),
		"use_featured_image" => __( "Utiliser en tant qu'image liée", "nsp" ),
		"archives" => __( "Archives", "nsp" ),
		"insert_into_item" => __( "Ajouter dans la FAQ", "nsp" ),
		"items_list" => __( "Liste FAQ", "nsp" ),
		"attributes" => __( "Attributs FAQ", "nsp" ),
		"name_admin_bar" => __( "FAQ", "nsp" ),
	);

	$args = array(
		"label" => __( "FAQs", "nsp" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "faq", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 30,
		"menu_icon" => "dashicons-excerpt-view",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "faq", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


// ########    ###    ##     ##  #######  ##    ##  #######  ##     ## #### ########  ######
//    ##      ## ##    ##   ##  ##     ## ###   ## ##     ## ###   ###  ##  ##       ##    ##
//    ##     ##   ##    ## ##   ##     ## ####  ## ##     ## #### ####  ##  ##       ##
//    ##    ##     ##    ###    ##     ## ## ## ## ##     ## ## ### ##  ##  ######    ######
//    ##    #########   ## ##   ##     ## ##  #### ##     ## ##     ##  ##  ##             ##
//    ##    ##     ##  ##   ##  ##     ## ##   ### ##     ## ##     ##  ##  ##       ##    ##
//    ##    ##     ## ##     ##  #######  ##    ##  #######  ##     ## #### ########  ######

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Catégories de participants.
	 */

	$labels = array(
		"name" => __( "Catégories de participants", "nsp" ),
		"singular_name" => __( "Catégories de participant", "nsp" ),
		"menu_name" => __( "Catégories", "nsp" ),
		"all_items" => __( "Toutes les catégories", "nsp" ),
		"edit_item" => __( "Modifier la catégorie", "nsp" ),
		"view_item" => __( "Voir la catégorie", "nsp" ),
		"update_item" => __( "Mettre à jour le nom de la catégorie", "nsp" ),
		"add_new_item" => __( "Ajouter une nouvelle catégorie", "nsp" ),
		"new_item_name" => __( "Nom de la nouvelle catégorie", "nsp" ),
		"parent_item" => __( "Catégorie parente", "nsp" ),
		"search_items" => __( "Recherche de catégorie", "nsp" ),
		"popular_items" => __( "Catégorie populaire", "nsp" ),
		"separate_items_with_commas" => __( "Séparer les catégorie par des virgules", "nsp" ),
		"add_or_remove_items" => __( "Ajouter ou supprimer des catégories", "nsp" ),
		"choose_from_most_used" => __( "Choisir parmi les plus utilisées", "nsp" ),
		"not_found" => __( "Non trouvée", "nsp" ),
		"items_list_navigation" => __( "Navigation de la liste des sélections", "nsp" ),
		"items_list" => __( "Liste des catégories", "nsp" ),
	);

	$args = array(
		"label" => __( "Catégories de participants", "nsp" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'participants_cat', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "participants_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "participants_cat", array( "participants" ), $args );

	/**
	 * Taxonomy: Catégories d'événements.
	 */

	$labels = array(
		"name" => __( "Catégories d'événements", "nsp" ),
		"singular_name" => __( "Catégorie d'événement", "nsp" ),
		"menu_name" => __( "Catégories", "nsp" ),
		"all_items" => __( "Toutes les catégories", "nsp" ),
		"edit_item" => __( "Modifier la catégorie", "nsp" ),
		"view_item" => __( "Voir la catégorie", "nsp" ),
		"update_item" => __( "Mettre à jour le nom de la catégorie", "nsp" ),
		"add_new_item" => __( "Ajouter une nouvelle catégorie", "nsp" ),
		"new_item_name" => __( "Nom de la nouvelle catégorie", "nsp" ),
		"parent_item" => __( "Catégorie parente", "nsp" ),
		"search_items" => __( "Recherche de catégorie", "nsp" ),
		"popular_items" => __( "Catégorie populaire", "nsp" ),
		"separate_items_with_commas" => __( "Séparer les catégories par des virgules", "nsp" ),
		"add_or_remove_items" => __( "Ajouter ou supprimer des catégories", "nsp" ),
		"choose_from_most_used" => __( "Choisir parmi les plus utilisées", "nsp" ),
		"not_found" => __( "Non trouvée", "nsp" ),
		"items_list_navigation" => __( "Navigation de la liste des catégories", "nsp" ),
		"items_list" => __( "Liste des catégories", "nsp" ),
	);

	$args = array(
		"label" => __( "Catégories d'événements", "nsp" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'event_cat', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "event_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "event_cat", array( "events" ), $args );

  /**
	 * Taxonomy: Catégories de FAQ.
	 */


}
add_action( 'init', 'cptui_register_my_taxes' );



//  ######  ##     ##  #######  ########  ########  ######   #######  ########  ########  ######
// ##    ## ##     ## ##     ## ##     ##    ##    ##    ## ##     ## ##     ## ##       ##    ##
// ##       ##     ## ##     ## ##     ##    ##    ##       ##     ## ##     ## ##       ##
//  ######  ######### ##     ## ########     ##    ##       ##     ## ##     ## ######    ######
//       ## ##     ## ##     ## ##   ##      ##    ##       ##     ## ##     ## ##             ##
// ##    ## ##     ## ##     ## ##    ##     ##    ##    ## ##     ## ##     ## ##       ##    ##
//  ######  ##     ##  #######  ##     ##    ##     ######   #######  ########  ########  ######

function faq() {

  // On recupère toutes les questions
  $q = new WP_Query(
    [
      'post_type'      => 'faq',
      'posts_per_page' => -1,
      'orderby'        => 'title',
      'order'          => 'ASC',
    ]
  );

  $aQuestions = [];

  // S'il y a des quesstions
  if ($q->have_posts()) {

    // On rempli le tableau de questions
    $aQuestions = $q->posts;

    // On crée le DOM de la FAQ
    $faq = '<section id="faq" class="faq__wrapper content-section content-section--watched js-parallax-item js-faq js-watch-section-entry" data-image-src="'.get_stylesheet_directory_uri().'/img/connected-dots-bg-blanc.svg" data-horizontal-pos="right" data-offset="200">';
      $faq .= '<div class="container">';
        //
        $faq .= '<div class="faq__questions-container">';
          // On set un compteur à zero pour capter le premier groupe de question
          $i = 0;
          $faq .= '<div class="faq__questions-list-container">';

            // Pour chaque questions
            $i = 0;
            foreach($aQuestions as $oQuestion) {
              if ($i == 0) {
                $active = 'active';
              } else {
                $active = '';
              }
              // On récupère le tableau de catégorie associées
              $oQuestionCat = get_the_terms($oQuestion->ID, 'faq_cat');
              // Si la question fait partie de la catégorie en cours on l'affiche
              if (has_term($category,'faq_cat',$oQuestion )) {
                // On crée le DOM de la question
                $faq .= '<div class="faq__question js-question '.$active.'">';
                  $faq .= '<h3 class="faq__question-title js-question-title"><a href="#" class="js-question-toggle">'.$oQuestion->post_title.'</a></h3>';
                  $faq .= '<div class="faq__question-content js-question-content '.$active.'">'.apply_filters('the_content',$oQuestion->post_content).'</div>';
                $faq .= '</div>';
              }
              $i++;
            }
          $faq .= '</div>'; // Fin questions list container
        $faq .= '</div>'; // Fin Quesiton container
      $faq .= '</div>'; //fin .container
    $faq .= '</section>'; // Fin FAQ

    // on renvoie la FAQ
    return $faq;
  }
}
add_shortcode('faq', 'faq');
