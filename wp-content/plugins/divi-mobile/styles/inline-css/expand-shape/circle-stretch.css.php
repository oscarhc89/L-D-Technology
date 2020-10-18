<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_circle_stretch_menu_inline_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );
$divi_mobile_menu__burger_menu_distance_edge = $titan->getOption( 'divi_mobile_menu__burger_menu_distance_edge' );
$divi_mobile_menu__burger_menu_distance_top = $titan->getOption( 'divi_mobile_menu__burger_menu_distance_top' );
$divi_mobile_menu__burger_menu_background_color = $titan->getOption( 'divi_mobile_menu__burger_menu_background_color' );

$divi_mobile_menu_icon_color = $titan->getOption( 'divi_mobile_menu_icon_color' );
$divi_mobile_menu_icon_color_hover = $titan->getOption( 'divi_mobile_menu_icon_color_hover' );
$divi_mobile_menu_icon_font_size = $titan->getOption( 'divi_mobile_menu_icon_font_size' );
$divi_mobile_menu_icon_dis_top = $titan->getOption( 'divi_mobile_menu_icon_dis_top' );
$divi_mobile_menu_icon_dis_right = $titan->getOption( 'divi_mobile_menu_icon_dis_right' );

$divi_mobile_menu__position = $titan->getOption( 'divi_mobile_menu__position' );

  $css_mobile = '<style id="divi-mobile-menu-expand-circle-stretch-inline-styles">';

  $css_mobile .= '

#dm_nav .bc-stretchy-nav.nav-is-visible ul .menu-item a::after {
  color: '.$divi_mobile_menu_icon_color.' !important;
  font-size: '.$divi_mobile_menu_icon_font_size.'px !important;
  margin-top: '.$divi_mobile_menu_icon_dis_top.'px;
  margin-right: '.$divi_mobile_menu_icon_dis_right.'px;
}

.bc-stretchy-nav.nav-is-visible ul .menu-item a:hover::after {
  color: '.$divi_mobile_menu_icon_color_hover.' !important;
}

.bc-stretchy-nav .stretchy-nav-bg {
  background-color: '.$divi_mobile_menu__burger_menu_background_color.';
}

.bc-stretchy-nav.nav-is-visible .stretchy-nav-bg {
  background-color: '.$divi_mobile_menu_bg_color.';
}

.bc-stretchy-nav {
'.$divi_mobile_menu__position.': '.$divi_mobile_menu__burger_menu_distance_edge.'px;
top: '.$divi_mobile_menu__burger_menu_distance_top.'px;
}

body .hamburger {
  right: 0;
  top: 0;
}

#open-button{
    background-color: transparent;
  }

#dm_nav li ul.sub-menu {
    display: none !important;
  }

  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_circle_stretch_menu_inline_css');