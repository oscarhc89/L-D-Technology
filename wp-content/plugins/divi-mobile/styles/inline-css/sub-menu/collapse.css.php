<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_sub_menu_collapse_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );
$divi_mobile_sub_menu_icon_close_color = $titan->getOption( 'divi_mobile_sub_menu_icon_close_color' );
$divi_mobile_sub_menu_close_icon_top = $titan->getOption( 'divi_mobile_sub_menu_close_icon_top' );
$divi_mobile_sub_menu_close_icon_left = $titan->getOption( 'divi_mobile_sub_menu_close_icon_left' );
$divi_mobile_sub_menu_close_font_size = $titan->getOption( 'divi_mobile_sub_menu_close_font_size' );

$divi_mobile_sub_menu_icon = $titan->getOption( 'divi_mobile_sub_menu_icon' );
$divi_mobile_sub_menu_icon_dis =  sprintf('content: "\%s";', $divi_mobile_sub_menu_icon);

$divi_mobile_sub_menu_icon_close = $titan->getOption( 'divi_mobile_sub_menu_icon_close' );
$divi_mobile_sub_menu_icon_close_dis =  sprintf('content: "\%s" !important;', $divi_mobile_sub_menu_icon_close);



  $css_mobile = '<style id="divi-mobile-menu-submenu-inline-styles">';

  $css_mobile .= '

  body #dm_nav .menu-wrap__inner .sub-menu {
      right: auto !important;
      -webkit-transform: translate3d(0px,0,0) !important;
      transform: translate3d(0px,0,0) !important;
          z-index: 1000;
          top: 0;
          left: 0;
  }


    #dm_nav .menu-wrap__inner .menu-item-has-children.visible > a:after {
      '.$divi_mobile_sub_menu_icon_close_dis.'
      color: '.$divi_mobile_sub_menu_icon_close_color.';
      margin-top: '.$divi_mobile_sub_menu_close_icon_top.'px;
      margin-left: '.$divi_mobile_sub_menu_close_icon_left.'px;
      font-size: '.$divi_mobile_sub_menu_close_font_size.'px;
    }

  #dm_nav .menu-wrap__inner .menu-item-has-children > a { background-color: transparent; position: relative; }
  #dm_nav .menu-wrap__inner .menu-item-has-children > a:after { font-family: "ETmodules"; text-align: center; speak: none; font-weight: normal; font-variant: normal; text-transform: none; -webkit-font-smoothing: antialiased; position: absolute; }
  #dm_nav .menu-wrap__inner .menu-item-has-children > a:after { font-size: 16px; '.$divi_mobile_sub_menu_icon_dis.' }
  #dm_nav .menu-wrap__inner .menu-item-has-children.visible > a:after { content: "\4d"; }
  #dm_nav .menu-wrap__inner ul.sub-menu { display: none !important; visibility: hidden !important;  transition: all 1.5s ease-in-out;}
  #dm_nav .menu-wrap__inner .visible > ul.sub-menu { display: block !important; visibility: visible !important;    opacity: 1;    width: 100%; }

  #dm_nav .menu-wrap__inner .visible > ul.sub-menu {
      width: 100% !important;
      position: relative;
  }
.open-icon {
      position: absolute;
      top: 0;
      right: 0;
      width: 40px;
      height: 47px;
      z-index: 20;
  }
.open-icon:after {
    cursor: pointer;
font-family: "ETmodules";
text-align: center;
speak: none;
font-weight: normal;
font-variant: normal;
text-transform: none;
-webkit-font-smoothing: antialiased;
position: absolute;
    font-size: 23px;
    content: "\4c";
    top: 13px;
    right: 10px;
    color: #26c9b7;
}
  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_sub_menu_collapse_css');