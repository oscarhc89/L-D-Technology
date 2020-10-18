<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_elastic_menu_inline_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );
$set_mobile_menu_side_appear = $titan->getOption( 'set_mobile_menu_side_appear' );


if ($set_mobile_menu_side_appear == "right") {
  $set_mobile_menu_side_appear_dis = "
.menu-wrap__inner:after {left: 0;}
.menu-wrap__inner {
  -webkit-transform: translate(100%, 0);
  transform: translate(100%, 0);
}
  ";
    } else {
      $set_mobile_menu_side_appear_dis = "
    .menu-wrap__inner:after {right: 0;}
    .menu-wrap__inner {
      -webkit-transform: translate(-100%, 0);
      transform: translate(-100%, 0);
    }
    ";
    }

  $css_mobile = '<style id="divi-mobile-menu-elastic-inline-styles">';

  $css_mobile .= '

  '.$set_mobile_menu_side_appear_dis.'

  body .menu-wrap {
    background-color: transparent !important;
     -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
  }

  .menu-wrap.active .menu-wrap__inner, .menu-wrap__inner:after {
    background-color: '.$divi_mobile_menu_bg_color.';
  }

  ';


  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_elastic_menu_inline_css');