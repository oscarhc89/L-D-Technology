<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_fullscreen_menu_inline_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );
$divi_mobile_menu__burger_menu_distance_edge = $titan->getOption( 'divi_mobile_menu__burger_menu_distance_edge' );
$divi_mobile_menu__burger_menu_distance_top = $titan->getOption( 'divi_mobile_menu__burger_menu_distance_top' );



  $css_mobile = '<style id="divi-mobile-menu-fullscreen-inline-styles">';

  $css_mobile .= '

#dm_nav .nav li li {
  text-align: center;
}

.menu-wrap__inner {
  background-color: '.$divi_mobile_menu_bg_color.';
}

  body .menu-wrap {
    width:100%;
    background-color:transparent;
  }

.overlap-submenu.bc-expand-circle #dm_nav .menu-wrap__inner .sub-menu {
  width: 100vw;
transform: translate3d(100vw,0,0);
}

.collapse-submenu #dm_nav .menu-wrap__inner .visible > ul.sub-menu {
transition: none;
}

  .cd-overlay-nav span {
    background-color: '.$divi_mobile_menu_bg_color.';
  }

body .hamburger {
right: '.$divi_mobile_menu__burger_menu_distance_edge.'px;
top: '.$divi_mobile_menu__burger_menu_distance_top.'px;
  }

  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_fullscreen_menu_inline_css');