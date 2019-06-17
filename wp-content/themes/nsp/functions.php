<?php
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
  wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/assets/js/swiper.min.js', array(), '4.5.0', true);
  wp_enqueue_script('featherlight', get_stylesheet_directory_uri() . '/assets/js/featherlight.min.js', array(), '1.7.13', true);
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

    // On crée un tableau pour y stocker les catégories uniques
    $aQuestionsCategories = [];

    // Pour chaque question
    foreach($aQuestions as $oQuestion) {

      // On récupère la catégorie
      $aQuestionCategories = get_the_terms($oQuestion->ID, 'faq_cat');


      // On stocke les catégories dans le tableau
      foreach ($aQuestionCategories as $oCategory) {
        array_push($aQuestionsCategories, $oCategory->slug);
      }
    }
    // On reduit le tableau en ne gardant que les catégories uniques
    $aQuestionsCategories = array_unique($aQuestionsCategories);
    $wikiLogo = get_field('logo_wiki_u_color','options');
    // On crée le DOM de la FAQ
    $faq = '<section id="faq" class="faq__wrapper content-section content-section--watched js-parallax-item js-faq js-watch-section-entry" data-image-src="'.get_stylesheet_directory_uri().'/img/connected-dots-bg-blanc.svg" data-horizontal-pos="right" data-offset="200">';
      $faq .= '<div class="container">';
      $faq .= '<h2 class="faq__title section-title section-title--faq">'.__('FAQ','wiki-university').'</h2>';
      $faq .= '<div class="faq__header">';
        $faq .= '<img class="faq__header-logo" src="'.wp_get_attachment_url($wikiLogo).'" alt="" />';
        $faq .= '<div class="btn-container btn-container--centered">';
          $faq .= '<a href="'.get_permalink(138).'" class="btn btn--small btn--primary">'.__('Poser une question sur le projet','wiki-university').'</a>';
          $faq .= '<p class="faq__header-legend">'.__('Vous pouvez également chercher des réponses parmi les thématiques ci-dessous :','wiki-university').'</p>';
        $faq .= '</div>';
      $faq .= '</div>';
      $faq .= '<ul class="faq__nav-container">';

        // On set un compteur à zero pour capter la première catégorie
        $i = 0;

        // Pour chaque catégorie
        foreach ($aQuestionsCategories as $category) {

          // On recupère l'objet de la catégorie avec son slug
          $oCategory = get_term_by('slug', $category, 'faq_cat');

          // On ajoute la classe active à la première
          if ($i === 0) {
            $faq .= '<li class="faq__nav-item active js-faq-container-toggle" data-cat="'.$oCategory->slug.'"><a href="#" class="faq__nav-link">'.$oCategory->name.'</a></li>';
            $i++;
          } else {
            $faq .= '<li class="faq__nav-item js-faq-container-toggle" data-cat="'.$oCategory->slug.'"><a href="#" class="faq__nav-link">'.$oCategory->name.'</a></li>';
          }
        }
      $faq .= '</ul>'; // Fin nav FAQ

      //
      $faq .= '<div class="faq__questions-container">';

      // On set un compteur à zero pour capter le premier groupe de question
      $i = 0;

      // Pour chaque catégorie
      foreach ($aQuestionsCategories as $category) {

        // On recupère l'objet de la catégorie avec son slug
        $oCategory = get_term_by('slug', $category, 'faq_cat');
        $categoryThumbnailID = get_field('faq_cat_thumbnail','faq_cat_'.$oCategory->term_id);

        // On ajoute la classe active à la première
        if ($i == 0) {
          $faq .= '<div class="faq__category-container active js-category-container" data-cat="'.$category.'">';
          $i++;
        } else {
          $faq .= '<div class="faq__category-container js-category-container" data-cat="'.$category.'">';
        }
            $faq .= '<div class="faq__thumbnail-container">';
              if (isset($categoryThumbnailID) && !empty($categoryThumbnailID)) {
                $faq .= wp_get_attachment_image($categoryThumbnailID,'large');
              }
            $faq .= '</div>';
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
          $faq .= '</div>'; // Fin category container
      }

      $faq .= '</div>'; // Fin Quesiton container
      $faq .= '</div>'; //fin .container
    $faq .= '</section>'; // Fin FAQ

    // on renvoie la FAQ
    return $faq;
  }
}
add_shortcode('faq', 'faq');
