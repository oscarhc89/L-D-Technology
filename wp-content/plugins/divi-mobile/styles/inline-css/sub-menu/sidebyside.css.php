<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_sub_menu_overlap_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );
$divi_mobile_sub_menu_icon_close_color = $titan->getOption( 'divi_mobile_sub_menu_icon_close_color' );
$divi_mobile_sub_menu_close_icon_top = $titan->getOption( 'divi_mobile_sub_menu_close_icon_top' );
$divi_mobile_sub_menu_close_icon_left = $titan->getOption( 'divi_mobile_sub_menu_close_icon_left' );
$divi_mobile_sub_menu_close_font_size = $titan->getOption( 'divi_mobile_sub_menu_close_font_size' );
$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );
$divi_mobile_menu_space_top = $titan->getOption( 'divi_mobile_menu_space_top' );
$divi_mobile_sub_menu_space_top = $titan->getOption( 'divi_mobile_sub_menu_space_top' );

$divi_mobile_sub_menu_icon = $titan->getOption( 'divi_mobile_sub_menu_icon' );
$divi_mobile_sub_menu_icon_dis =  sprintf('content: "\%s";', $divi_mobile_sub_menu_icon);

$divi_mobile_sub_menu_icon_close = $titan->getOption( 'divi_mobile_sub_menu_icon_close' );
$divi_mobile_sub_menu_icon_close_dis =  sprintf('content: "\%s";', $divi_mobile_sub_menu_icon_close);

  $css_mobile = '<style id="divi-mobile-menu-submenu-inline-styles">';

  $css_mobile .= '

  .menu-wrap {
    padding: 0;
  }

  #dm-menu a {
        border-bottom: 1px solid rgba(0, 0, 0, 0.38);
  }

  body #dm_nav .menu-wrap__inner .sub-menu {
padding-top: '.$divi_mobile_sub_menu_space_top.'px !important;
border-top: '.$divi_mobile_menu_space_top.'px solid '.$divi_mobile_menu_bg_color.';
  }

#dm-menu {
width: 50%;
padding: 0 10px;
}

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
width: 50%;
right: 0;
position: absolute;
z-index: 999999;
height: 100%;
padding: 0 10px;
font-size: 1.15em;
visibility: invisible;
opacity: 0;
min-height: 100vh;
top: 0;
position: fixed;
-webkit-transform: translate3d(0px,0,0);
transform: translate3d(0px,0,0);
}

#dm_nav .menu-wrap__inner .visible > ul.sub-menu {
    width: 100% !important;
opacity: 1;
visibility: visible;
}


.overlap-submenu.bc-expand-circle #dm_nav .menu-wrap__inner .visible .sub-menu {
      transform: translate3d(0,0,0);
}

  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_sub_menu_overlap_css');