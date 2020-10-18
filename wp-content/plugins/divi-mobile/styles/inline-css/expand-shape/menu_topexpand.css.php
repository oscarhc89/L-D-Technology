<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_top_expand_menu_inline_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );

 
$divi_mobile_menu__burger_menu_background_color = $titan->getOption( 'divi_mobile_menu__burger_menu_background_color' );
$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );



  $css_mobile = '<style id="divi-mobile-menu-expand-top-inline-styles">';

  $css_mobile .= '

  .overlap-submenu.bc-expand-top #dm_nav .menu-wrap__inner .sub-menu {
    width: 100vw;
  transform: translate3d(100vw,0,0);
  }

  .collapse-submenu #dm_nav .menu-wrap__inner .visible > ul.sub-menu {
  transition: none;
  }

  .show-menu .menu-wrap {
  height: 100vh;
  }

  .menu-wrap {
    background-color: '.$divi_mobile_menu__burger_menu_background_color.';
  }

  .show-menu .menu-wrap {
    background-color: '.$divi_mobile_menu_bg_color.';
  }


  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_top_expand_menu_inline_css');