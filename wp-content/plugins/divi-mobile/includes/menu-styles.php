<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_menu_styles() {
include(DE_DM_PATH . '/titan-framework/titan-framework-embedder.php');
$titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$check_mobile_menu_layout = $titan->getOption( 'set_mobile_menu_layout' );
$set_mobile_menu_second_menu = $titan->getOption( 'set_mobile_menu_second_menu' );
$sub_menu_style = $titan->getOption( 'sub_menu_style' );
  $expand_shape_style = $titan->getOption( 'expand_shape_style' );

  $divi_mobile_header_style = $titan->getOption( 'divi_mobile_header_style' );
// BURGER MENU

    include(DE_DM_PATH . '/js/inline-js/general.js.php');
    include(DE_DM_PATH . '/includes/inject/burger-menu/footer.php');
    include(DE_DM_PATH . '/styles/inline-css/burger-menu-css.php');
    include(DE_DM_PATH . '/styles/inline-css/menu-css.php');
    include(DE_DM_PATH . '/styles/inline-css/general-css.php');
    wp_enqueue_style( 'divi-mobile-burger-styles', DE_DM_URL . '/styles/burger-menu-styles.min.css' , array(), DE_DM_VERSION, 'all' );
    wp_enqueue_script( 'divi-mobile-classie-js', DE_DM_URL . '/js/classie.js', array('jquery'), DE_DM_VERSION, true );


    $divi_mobile_custom_header = $titan->getOption( 'divi_mobile_custom_header' );
    if ($divi_mobile_custom_header == "enabled") {
    include(DE_DM_PATH . '/styles/inline-css/header/header-css.php');
    include(DE_DM_PATH . '/js/inline-js/header.js.php');
    }

// Menu appear from outside screen
if ($check_mobile_menu_layout == "off-canvas") {

if ($divi_mobile_header_style == "" || (!isset($divi_mobile_header_style)) ){
    include(DE_DM_PATH . '/includes/inject/off-canvas/head.php');
  }

  function divi_mobile_offcanvas_enqueue() {
    include(DE_DM_PATH . '/titan-framework/titan-framework-embedder.php');
    $titan = TitanFramework::getInstance( 'divi-mobile-menu' );
    $off_canvas_style = $titan->getOption( 'off_canvas_style' );

    if ($off_canvas_style == "top-side") {
      // include(DE_DM_PATH . '/styles/inline-css/off-canvas/top-side.css.php');
      wp_enqueue_style( 'divi-mobile-offcanvas-top-side', DE_DM_URL . '/styles/off-canvas/menu_topside.css' , array(), DE_DM_VERSION, 'all' );
    } else if ($off_canvas_style == "side-slide") {
      wp_enqueue_style( 'divi-mobile-offcanvas-slide-in', DE_DM_URL . '/styles/off-canvas/menu_sideslide.css' , array(), DE_DM_VERSION, 'all' );
    } else if ($off_canvas_style == "elastic") {
      include(DE_DM_PATH . '/styles/inline-css/off-canvas/menu_elastic.css.php');
      wp_enqueue_style( 'divi-mobile-offcanvas-elastic-css', DE_DM_URL . '/styles/off-canvas/menu_elastic.css' , array(), DE_DM_VERSION, 'all' );
    } else if ($off_canvas_style == "full-screen") {
      include(DE_DM_PATH . '/styles/inline-css/off-canvas/full-screen.css.php');
      wp_enqueue_style( 'divi-mobile-offcanvas-fullscreen', DE_DM_URL . '/styles/off-canvas/menu_fullscreen.css' , array(), DE_DM_VERSION, 'all' );
    }
    // else if ($off_canvas_style == "circle-expand") {
    //   wp_enqueue_style( 'divi-mobile-offcanvas-circle-expand', DE_DM_URL . '/styles/off-canvas/menu_circle_expand.css' , array(), DE_DM_VERSION, 'all' );
    // }

  }
  add_action( 'wp_enqueue_scripts', 'divi_mobile_offcanvas_enqueue' );

}
// Menu expand from shape
else if ($check_mobile_menu_layout == "expand-shape") {


  $expand_shape_style = $titan->getOption( 'expand_shape_style' );


  if ($expand_shape_style == "top-expand") {
    include(DE_DM_PATH . '/includes/inject/expand-shape/top-expand/footer.php');
    if ($divi_mobile_header_style == "" || (!isset($divi_mobile_header_style)) ){
    include(DE_DM_PATH . '/includes/inject/expand-shape/top-expand/head.php');
  }
      include(DE_DM_PATH . '/styles/inline-css/expand-shape/menu_topexpand.css.php');
  }
  else if ($expand_shape_style == "circle-expand") {
    if ($divi_mobile_header_style == "" || (!isset($divi_mobile_header_style)) ){
      include(DE_DM_PATH . '/includes/inject/expand-shape/circle-expand/head.php');
    }
      include(DE_DM_PATH . '/includes/inject/expand-shape/circle-expand/footer.php');
        include(DE_DM_PATH . '/styles/inline-css/expand-shape/circle-expand.css.php');
  }
  else if ($expand_shape_style == "circle-stretch") {
    if ($divi_mobile_header_style == "" || (!isset($divi_mobile_header_style)) ){
      include(DE_DM_PATH . '/includes/inject/expand-shape/circle-stretch/head.php');
    }
      include(DE_DM_PATH . '/includes/inject/expand-shape/circle-stretch/footer.php');
      include(DE_DM_PATH . '/styles/inline-css/expand-shape/circle-stretch.css.php');
  }

  function divi_mobile_expand_circle_enqueue() {
    include(DE_DM_PATH . '/titan-framework/titan-framework-embedder.php');
    $titan = TitanFramework::getInstance( 'divi-mobile-menu' );
    $expand_shape_style = $titan->getOption( 'expand_shape_style' );

    if ($expand_shape_style == "top-expand") {
      wp_enqueue_style( 'divi-mobile-expand-shape-top', DE_DM_URL . '/styles/expand-shape/menu_topexpand.css' , array(), DE_DM_VERSION, 'all' );
    }
    else if ($expand_shape_style == "circle-expand") {
    wp_enqueue_script( 'divi-mobile-expand-shape-circle-modenizer-js', DE_DM_URL . '/js/modernizr.2.8.3.js', array('jquery'), DE_DM_VERSION, false );
    wp_enqueue_script( 'divi-mobile-expand-shape-circle-velocity-js', DE_DM_URL . '/js/velocity.min.js', array('jquery'), DE_DM_VERSION, true );
    wp_enqueue_style( 'divi-mobile-expand-shape-circle-css', DE_DM_URL . '/styles/expand-shape/circle-expand.css' , array(), DE_DM_VERSION, 'all' );
    }
    else if ($expand_shape_style == "circle-stretch") {
    wp_enqueue_script( 'divi-mobile-expand-shape-circle-modenizer-js', DE_DM_URL . '/js/modernizr.2.8.3.js', array('jquery'), DE_DM_VERSION, false );
      wp_enqueue_style( 'divi-mobile-expand-shape-circle-stretch-css', DE_DM_URL . '/styles/expand-shape/circle-stretch.css' , array(), DE_DM_VERSION, 'all' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'divi_mobile_expand_circle_enqueue' );



}
// Bottom Nav Menu
else if ($check_mobile_menu_layout == "bottom-nav") {

$bottom_nav_style = $titan->getOption( 'bottom_nav_style' );


  if ($bottom_nav_style == "simple") {
    if ($divi_mobile_header_style == "" || (!isset($divi_mobile_header_style)) ){
      include(DE_DM_PATH . '/includes/inject/bottom-nav/simple/head.php');
    }
      include(DE_DM_PATH . '/includes/inject/bottom-nav/simple/footer.php');
      include(DE_DM_PATH . '/styles/inline-css/bottom-nav/simple.css.php');
      wp_enqueue_style( 'divi-mobile-bottom-nav-icons-css', DE_DM_URL . '/styles/bottom-navigation/icons.css' , array(), DE_DM_VERSION, 'all' );
  }

}
else {
  // code...
}

if ($set_mobile_menu_second_menu == "bottom-nav") {
  if ($divi_mobile_header_style == "" || (!isset($divi_mobile_header_style)) ){
  include(DE_DM_PATH . '/includes/inject/bottom-nav/simple/head.php');
}
  include(DE_DM_PATH . '/includes/inject/bottom-nav/simple/footer.php');
  include(DE_DM_PATH . '/styles/inline-css/bottom-nav/simple.css.php');
  wp_enqueue_style( 'divi-mobile-bottom-nav-icons-css', DE_DM_URL . '/styles/bottom-navigation/icons.css' , array(), DE_DM_VERSION, 'all' );

} else {

}

if ($sub_menu_style == "collapse") {
include(DE_DM_PATH . '/styles/inline-css/sub-menu/collapse.css.php');
include(DE_DM_PATH . '/js/inline-js/sub-menu/collapse.js.php');
// include(DE_DM_PATH . '/js/inline-js/sub-menu/collapse-clickthrough.js.php');
} else if ($sub_menu_style == "overlap-slide") {
include(DE_DM_PATH . '/styles/inline-css/sub-menu/overlap.css.php');
include(DE_DM_PATH . '/js/inline-js/sub-menu/overlap.js.php');
} else if ($sub_menu_style == "side-by-side") {
include(DE_DM_PATH . '/styles/inline-css/sub-menu/sidebyside.css.php');
include(DE_DM_PATH . '/js/inline-js/sub-menu/sidebyside.js.php');
}



}
add_action( 'tf_create_options', 'divi_mobile_menu_styles' );