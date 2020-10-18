<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_burger_menu_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );

// GENERAL
$divi_mobile_menu__burger_menu_distance_edge = $titan->getOption( 'divi_mobile_menu__burger_menu_distance_edge' );
$divi_mobile_menu__burger_menu_distance_top = $titan->getOption( 'divi_mobile_menu__burger_menu_distance_top' );
$divi_mobile_menu__burger_menu_opacity_hover = $titan->getOption( 'divi_mobile_menu__burger_menu_opacity_hover' );
$divi_mobile_menu__burger_menu_header_height = $titan->getOption( 'divi_mobile_menu__burger_menu_header_height' );
$divi_mobile_menu_style = $titan->getOption( 'divi_mobile_menu_style' );

  // BURGER MENU
  $divi_mobile_menu_burger_colour_closed = $titan->getOption( 'divi_mobile_menu_burger_colour_closed' );
  $divi_mobile_menu_burger_colour_open = $titan->getOption( 'divi_mobile_menu_burger_colour_open' );
  $divi_mobile_menu__burger_menu_postion = $titan->getOption( 'divi_mobile_menu__burger_menu_postion' );
  $divi_mobile_menu__burger_menu_postion_top = $titan->getOption( 'divi_mobile_menu__burger_menu_postion_top' );
  $divi_mobile_menu__burdivi_mobile_menu__positionger_menu_line_width = $titan->getOption( 'divi_mobile_menu__burger_menu_line_width' );
  $divi_mobile_menu__burger_menu_line_width = $titan->getOption( 'divi_mobile_menu__burger_menu_line_width' );
  $divi_mobile_menu__burger_menu_line_height = $titan->getOption( 'divi_mobile_menu__burger_menu_line_height' );
  $divi_mobile_menu__burger_menu_line_border_radius = $titan->getOption( 'divi_mobile_menu__burger_menu_line_border_radius' );
  $divi_mobile_menu__burger_menu_line_spacing = $titan->getOption( 'divi_mobile_menu__burger_menu_line_spacing' );


  // BURGER MENU BACKGOUND
    $divi_mobile_menu__burger_menu_background_color = $titan->getOption( 'divi_mobile_menu__burger_menu_background_color' );
    $divi_mobile_menu__burger_menu_background_size_width = $titan->getOption( 'divi_mobile_menu__burger_menu_background_size_width' );
    $divi_mobile_menu__burger_menu_background_size_height = $titan->getOption( 'divi_mobile_menu__burger_menu_background_size_height' );
    $divi_mobile_menu__burger_menu_background_border_radius = $titan->getOption( 'divi_mobile_menu__burger_menu_background_border_radius' );


//T TEXT
$divi_mobile_menu__burger_menu_text_top = $titan->getOption( 'divi_mobile_menu__burger_menu_text_top' );
$divi_mobile_menu__burger_menu_text_teft = $titan->getOption( 'divi_mobile_menu__burger_menu_text_teft' );
$divi_mobile_menu__burger_menu_text_font_size = $titan->getOption( 'divi_mobile_menu__burger_menu_text_font_size' );
$divi_mobile_menu__burger_menu_text_color = $titan->getOption( 'divi_mobile_menu__burger_menu_text_color' );


  $divi_mobile_menu_icon_color = $titan->getOption( 'divi_mobile_menu_icon_color' );
  $divi_mobile_menu_icon_color_hover = $titan->getOption( 'divi_mobile_menu_icon_color_hover' );
  $divi_mobile_menu_text_color = $titan->getOption( 'divi_mobile_menu_text_color' );
  $divi_mobile_menu_text_color_hover = $titan->getOption( 'divi_mobile_menu_text_color_hover' );

// TEXT
  $divi_mobile_menu_text_font_size = $titan->getOption( 'divi_mobile_menu_text_font_size' );
// ICON
  $divi_mobile_menu_icon_font_size = $titan->getOption( 'divi_mobile_menu_icon_font_size' );
  $divi_mobile_menu_icon_dis_top = $titan->getOption( 'divi_mobile_menu_icon_dis_top' );
  $divi_mobile_menu_icon_dis_right = $titan->getOption( 'divi_mobile_menu_icon_dis_right' );



$divi_mobile_menu_background_box_shadow_horizontal = $titan->getOption( 'divi_mobile_menu_background_box_shadow_horizontal' );
$divi_mobile_menu_background_box_shadow_vetical = $titan->getOption( 'divi_mobile_menu_background_box_shadow_vetical' );
$divi_mobile_menu_background_box_shadow_blur_radius = $titan->getOption( 'divi_mobile_menu_background_box_shadow_blur_radius' );
$divi_mobile_menu_background_box_shadow_spread_radius = $titan->getOption( 'divi_mobile_menu_background_box_shadow_spread_radius' );
$divi_mobile_menu_background_box_shadow_colour = $titan->getOption( 'divi_mobile_menu_background_box_shadow_colour' );

$divi_mobile_menu__position = $titan->getOption( 'divi_mobile_menu__position' );



$dis_box_shadow = '
-webkit-box-shadow: '.$divi_mobile_menu_background_box_shadow_horizontal.'px '.$divi_mobile_menu_background_box_shadow_vetical.'px '.$divi_mobile_menu_background_box_shadow_blur_radius.'px '.$divi_mobile_menu_background_box_shadow_spread_radius.'px '.$divi_mobile_menu_background_box_shadow_colour.';
-moz-box-shadow: '.$divi_mobile_menu_background_box_shadow_horizontal.'px '.$divi_mobile_menu_background_box_shadow_vetical.'px '.$divi_mobile_menu_background_box_shadow_blur_radius.'px '.$divi_mobile_menu_background_box_shadow_spread_radius.'px '.$divi_mobile_menu_background_box_shadow_colour.';
box-shadow: '.$divi_mobile_menu_background_box_shadow_horizontal.'px '.$divi_mobile_menu_background_box_shadow_vetical.'px '.$divi_mobile_menu_background_box_shadow_blur_radius.'px '.$divi_mobile_menu_background_box_shadow_spread_radius.'px '.$divi_mobile_menu_background_box_shadow_colour.';
';



if ($divi_mobile_menu_style == "three-dots") {
 $divi_mobile_menu_style_css = '
 #nav-icon {
   width: '.$divi_mobile_menu__burger_menu_line_width.'px;
   position:  absolute;
   left: '.$divi_mobile_menu__burger_menu_postion.'px;
   top: '.$divi_mobile_menu__burger_menu_postion_top.'px;
   z-index: 999998;
   -webkit-transform: rotate(225deg); /* WebKit */
 -moz-transform: rotate(225deg); /* Mozilla */
 -o-transform: rotate(225deg); /* Opera */
 -ms-transform: rotate(225deg); /* Internet Explorer */
   transform: rotate(225deg);  /* CSS3 */
   -webkit-transition: all 0.5s;
   -moz-transition: all 0.5s;
   transition: all 0.5s;
 }

  #nav-icon .dots {
    fill:'.$divi_mobile_menu_burger_colour_closed.';
  }

   .show-menu #nav-icon .dots {
    fill:'.$divi_mobile_menu_burger_colour_open.';
  }

 .show-menu #nav-icon {
   -webkit-transform: rotate(0deg); /* WebKit */
 -moz-transform: rotate(0deg); /* Mozilla */
 -o-transform: rotate(0deg); /* Opera */
 -ms-transform: rotate(0deg); /* Internet Explorer */
   transform: rotate(0deg);  /* CSS3 */
 }

 #nav-icon .one, #nav-icon .two {
   opacity: 0;
 }

 .show-menu #nav-icon .one, .show-menu #nav-icon .two {
   opacity: 1;
 }
 ';
} else if ($divi_mobile_menu_style == "three") {
  $divi_mobile_menu_style_css = '
  .hamburger-box {
    left: '.$divi_mobile_menu__burger_menu_postion.'px;
    top: '.$divi_mobile_menu__burger_menu_postion_top.'px;
  }
  .hamburger-inner, .hamburger-inner::before, .hamburger-inner::after {
    background-color:'.$divi_mobile_menu_burger_colour_closed.';
  }

  .hamburger.is-active .hamburger-inner, .hamburger.is-active .hamburger-inner::before, .hamburger.is-active .hamburger-inner::after {
    background-color:'.$divi_mobile_menu_burger_colour_open.';
  }
  .hamburger-inner, .hamburger-inner::before, .hamburger-inner::after {
      width: '.$divi_mobile_menu__burger_menu_line_width.'px;
      height: '.$divi_mobile_menu__burger_menu_line_height.'px;
      border-radius: '.$divi_mobile_menu__burger_menu_line_border_radius.'px;
  }

  .hamburger-inner::before {
  top: -'.$divi_mobile_menu__burger_menu_line_spacing.'px;
  }
  .hamburger-inner::after {
  bottom: -'.$divi_mobile_menu__burger_menu_line_spacing.'px;
  }
  ';
} else if ($divi_mobile_menu_style == "two") {

  $divi_mobile_menu_style_css = '
  .hamburger-box-two {
    left: '.$divi_mobile_menu__burger_menu_postion.'px;
    top: '.$divi_mobile_menu__burger_menu_postion_top.'px;
  }

  .hamburger-inner-two::before, .hamburger-inner-two::after {
    content: "";
width: 15px;
height: 2px;
position: absolute;
background: #1a1a1a;
transition: all 250ms ease-out;
    width: '.$divi_mobile_menu__burger_menu_line_width.'px;
    height: '.$divi_mobile_menu__burger_menu_line_height.'px;
    border-radius: '.$divi_mobile_menu__burger_menu_line_border_radius.'px;
background-color:'.$divi_mobile_menu_burger_colour_closed.';
top: 50%;
  }


.hamburger-inner-two::before  {
transform: translateY(-'.$divi_mobile_menu__burger_menu_line_spacing.'px);
}

.hamburger-inner-two::after {
transform: translateY('.$divi_mobile_menu__burger_menu_line_spacing.'px);
}

  .hamburger.is-active .hamburger-inner-two::before {
    background-color:'.$divi_mobile_menu_burger_colour_open.';
  transform: translateY(0) rotate(45deg);
    }

  .hamburger.is-active .hamburger-inner-two::after {
    background-color:'.$divi_mobile_menu_burger_colour_open.';
  transform: translateY(0) rotate(-45deg);
  }


  ';
}



  $css_mobile = '<style id="divi-mobile-burger-menu-inline-styles">';

  $css_mobile .= '

'.$divi_mobile_menu_style_css.'

.menu-wrap::before {
      background-color: '.$divi_mobile_menu__burger_menu_background_color.';
}



.hamburger {
  background-color:'.$divi_mobile_menu__burger_menu_background_color.';
  width:'.$divi_mobile_menu__burger_menu_background_size_width.'px;
  height:'.$divi_mobile_menu__burger_menu_background_size_height.'px;
  border-radius:'.$divi_mobile_menu__burger_menu_background_border_radius.'px;
  '.$divi_mobile_menu__position.': '.$divi_mobile_menu__burger_menu_distance_edge.'px;
  top: '.$divi_mobile_menu__burger_menu_distance_top.'px;
  '.$dis_box_shadow.'
}

.menu-button:hover {
	opacity: '.$divi_mobile_menu__burger_menu_opacity_hover.';
}

#et-top-navigation{
  min-height: '.$divi_mobile_menu__burger_menu_header_height.'px;
}

.menu-text {
  position: absolute;
  top: '.$divi_mobile_menu__burger_menu_text_top.'px;
  left: '.$divi_mobile_menu__burger_menu_text_teft.'px;
  font-size: '.$divi_mobile_menu__burger_menu_text_font_size.'px;
  color: '.$divi_mobile_menu__burger_menu_text_color.';
}

  ';



  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_burger_menu_css');