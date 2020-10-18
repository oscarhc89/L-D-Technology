<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_topside_inline_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$set_mobile_menu_side_max_width = $titan->getOption( 'set_mobile_menu_side_max_width' );



  $css_mobile = '<style id="divi-mobile-menu-topside-inline-styles">';

  $css_mobile .= '

  body.show-menu .menu-button {
  	-webkit-transform: translate3d(-'.$set_mobile_menu_side_max_width.'px,60px,0);
  	transform: translate3d(-'.$set_mobile_menu_side_max_width.'px,60px,0);
  }

  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_topside_inline_css');