<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_simple_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_bottom_nav_icon_color = $titan->getOption( 'divi_mobile_menu_bottom_nav_icon_color' );
$divi_mobile_menu_bottom_nav_icon_color_hover = $titan->getOption( 'divi_mobile_menu_bottom_nav_icon_color_hover' );
$divi_mobile_menu_bottom_nav_icon_font_size = $titan->getOption( 'divi_mobile_menu_bottom_nav_icon_font_size' );

$divi_mobile_menu_bottom_nav_active_icon_color = $titan->getOption( 'divi_mobile_menu_bottom_nav_active_icon_color' );
$divi_mobile_menu_bottom_nav_text_color = $titan->getOption( 'divi_mobile_menu_bottom_nav_text_color' );
$divi_mobile_menu_bottom_nav_active_text_color = $titan->getOption( 'divi_mobile_menu_bottom_nav_active_text_color' );
$divi_mobile_menu_bottom_nav_text_color_hover = $titan->getOption( 'divi_mobile_menu_bottom_nav_text_color_hover' );
$divi_mobile_menu_bottom_nav_text_font_size = $titan->getOption( 'divi_mobile_menu_bottom_nav_text_font_size' );




  $css_mobile = '<style id="divi-mobile-menu-bottom-nav-inline-styles">';

  $css_mobile .= '
  body .bottom-navigation-menu ul li {
      margin: 0 !important;
  }
.bottom-navigation-menu ul a::after {
  color: '.$divi_mobile_menu_bottom_nav_icon_color.';
  font-size: '.$divi_mobile_menu_bottom_nav_icon_font_size.'px;
}

.bottom-navigation-menu ul a:hover::after {
  color: '.$divi_mobile_menu_bottom_nav_icon_color_hover.';
}

.bottom-navigation-menu ul .current-menu-item a::after {
  color: '.$divi_mobile_menu_bottom_nav_active_icon_color.';
}

.bottom-navigation-menu ul a {
  color: '.$divi_mobile_menu_bottom_nav_text_color.';
}

.bottom-navigation-menu ul .current-menu-item a {
  color: '.$divi_mobile_menu_bottom_nav_active_text_color.';
}

.bottom-navigation-menu ul a:hover {
  color: '.$divi_mobile_menu_bottom_nav_text_color_hover.';
}

.bottom-navigation-menu ul a {
font-size: '.$divi_mobile_menu_bottom_nav_text_font_size.'px;
}

  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_simple_css');