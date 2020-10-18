<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_sub_menu_overlap_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );
$divi_mobile_sub_menu_icon_close_color = $titan->getOption( 'divi_mobile_sub_menu_icon_close_color' );
$divi_mobile_sub_menu_close_icon_top = $titan->getOption( 'divi_mobile_sub_menu_close_icon_top' );
$divi_mobile_sub_menu_close_icon_left = $titan->getOption( 'divi_mobile_sub_menu_close_icon_left' );
$divi_mobile_sub_menu_close_font_size = $titan->getOption( 'divi_mobile_sub_menu_close_font_size' );
$set_mobile_sub_menu_side_max_width = $titan->getOption( 'set_mobile_sub_menu_side_max_width' );

$divi_mobile_sub_menu_icon = $titan->getOption( 'divi_mobile_sub_menu_icon' );
$divi_mobile_sub_menu_icon_dis =  sprintf('content: "\%s";', $divi_mobile_sub_menu_icon);

$divi_mobile_sub_menu_icon_close = $titan->getOption( 'divi_mobile_sub_menu_icon_close' );
$divi_mobile_sub_menu_icon_close_dis =  sprintf('content: "\%s" !important;', $divi_mobile_sub_menu_icon_close);

  $css_mobile = '<style id="divi-mobile-menu-submenu-inline-styles">';

  $css_mobile .= '

  #dm_nav .menu-wrap__inner .close-submenu::before {
    '.$divi_mobile_sub_menu_icon_close_dis.'
    color: '.$divi_mobile_sub_menu_icon_close_color.';
    margin-top: '.$divi_mobile_sub_menu_close_icon_top.'px;
    margin-left: '.$divi_mobile_sub_menu_close_icon_left.'px;
    font-size: '.$divi_mobile_sub_menu_close_font_size.'px;
  }

  #dm_nav .menu-wrap__inner .menu-item-has-children > a { background-color: transparent; position: relative; }
  #dm_nav .menu-wrap__inner .menu-item-has-children > a:after { font-family: "ETmodules"; text-align: center; speak: none; font-weight: normal; font-variant: normal; text-transform: none; -webkit-font-smoothing: antialiased; position: absolute; }
  #dm_nav .menu-wrap__inner .menu-item-has-children > a:after { font-size: 16px; '.$divi_mobile_sub_menu_icon_dis.' }

#dm_nav .menu-wrap__inner .sub-menu {
    -webkit-transform: translate3d(300%,0,0);
    transform: translate3d(300%,0,0);
  right: 0;
position: absolute;
z-index: 999999;
width: 100%;
max-width: '.$set_mobile_sub_menu_side_max_width.'px;
height: 100%;
padding: 2.5em 1.5em 0;
font-size: 1.15em;
-webkit-transition: -webkit-transform 0.4s;
transition: transform 0.4s;
-webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
transition-timing-function: cubic-bezier(0.7,0,0.3,1);
visibility: visible;
opacity: 1;
min-height: 100vh;
top: 0;
position: fixed;
}

#dm_nav .menu-wrap__inner .visible > ul.sub-menu {
    width: 100% !important;
    -webkit-transform: translate3d(0px,0,0);
    transform: translate3d(0px,0,0);
    -webkit-transition: -webkit-transform 0.8s;
    transition: transform 0.8s;
    -webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
    transition-timing-function: cubic-bezier(0.7,0,0.3,1);
}

.close-submenu{
  position: absolute;
left: 0;
top: 0;
width: 30px;
height: 30px;
}

#dm_nav .menu-wrap__inner .close-submenu::before {
  font-family: "ETmodules";
content: "\23";
position: absolute;
left: 0;
top: 0;
cursor:pointer;
}

.overlap-submenu.bc-expand-circle #dm_nav .menu-wrap__inner .visible > .sub-menu {
      transform: translate3d(0,0,0);
}

  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_sub_menu_overlap_css');