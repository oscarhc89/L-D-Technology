<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function divi_mobile_custom_header_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$divi_mobile_menu__burger_menu_distance_edge = $titan->getOption( 'divi_mobile_menu__burger_menu_distance_edge' );

$divi_mobile_menu__breakpoint = $titan->getOption( 'divi_mobile_menu__breakpoint' ); //
$divi_mobile_custom_header_height = $titan->getOption( 'divi_mobile_custom_header_height' ); //
$divi_mobile_custom_header_logo_height = $titan->getOption( 'divi_mobile_custom_header_logo_height' ); //
$divi_mobile_custom_header_logo_max_width = $titan->getOption( 'divi_mobile_custom_header_logo_max_width' ); //
$divi_mobile_custom_header_bg_color = $titan->getOption( 'divi_mobile_custom_header_bg_color' ); //
$divi_mobile_custom_header_fixed = $titan->getOption( 'divi_mobile_custom_header_fixed' ); //
$divi_mobile_custom_header_height_scroll = $titan->getOption( 'divi_mobile_custom_header_height_scroll' ); //
$divi_mobile_custom_header_bg_color_scroll = $titan->getOption( 'divi_mobile_custom_header_bg_color_scroll' ); //
$divi_mobile_custom_header_logo_height_scroll = $titan->getOption( 'divi_mobile_custom_header_logo_height_scroll' ); //
$divi_mobile_custom_header_hamburger_top_scroll = $titan->getOption( 'divi_mobile_custom_header_hamburger_top_scroll' );
$divi_mobile_custom_header_cart_top_scroll = $titan->getOption( 'divi_mobile_custom_header_cart_top_scroll' );
$divi_mobile_custom_header_search_top_scroll = $titan->getOption( 'divi_mobile_custom_header_search_top_scroll' );
$divi_mobile_custom_header_logo_position = $titan->getOption( 'divi_mobile_custom_header_logo_position' ); //
$divi_mobile_custom_header_cart_icon_position = $titan->getOption( 'divi_mobile_custom_header_cart_icon_position' );//
$divi_mobile_custom_header_cart_icon_color = $titan->getOption( 'divi_mobile_custom_header_cart_icon_color' ); //
$divi_mobile_custom_header_cart_icon_font_size = $titan->getOption( 'divi_mobile_custom_header_cart_icon_font_size' ); //
$divi_mobile_custom_header_cart_icon_position_edge = $titan->getOption( 'divi_mobile_custom_header_cart_icon_position_edge' ); //
$divi_mobile_custom_header_cart_icon_position_top = $titan->getOption( 'divi_mobile_custom_header_cart_icon_position_top' ); //
$divi_mobile_custom_header_search_icon_position = $titan->getOption( 'divi_mobile_custom_header_search_icon_position' ); //
$divi_mobile_custom_header_search_icon_color = $titan->getOption( 'divi_mobile_custom_header_search_icon_color' ); //
$divi_mobile_custom_header_search_icon_font_size = $titan->getOption( 'divi_mobile_custom_header_search_icon_font_size' ); //
$divi_mobile_custom_header_search_icon_position_edge = $titan->getOption( 'divi_mobile_custom_header_search_icon_position_edge' ); //
$divi_mobile_custom_header_search_icon_position_top = $titan->getOption( 'divi_mobile_custom_header_search_icon_position_top' ); //

$divi_mobile_custom_header_search_text_color = $titan->getOption( 'divi_mobile_custom_header_search_text_color' );
$divi_mobile_custom_header_search_text_font_size = $titan->getOption( 'divi_mobile_custom_header_search_text_font_size' );

$divi_mobile_custom_header_search_icon_close_color = $titan->getOption( 'divi_mobile_custom_header_search_icon_close_color' );
$divi_mobile_custom_header_search_icon_close_font_size = $titan->getOption( 'divi_mobile_custom_header_search_icon_close_font_size' );



$divi_mobile_custom_header_logo_position_edge = $titan->getOption( 'divi_mobile_custom_header_logo_position_edge' ); //
$divi_mobile_custom_header_logo_position_top = $titan->getOption( 'divi_mobile_custom_header_logo_position_top' ); //


$divi_mobile_menu_header_shadow_horizontal = $titan->getOption( 'divi_mobile_menu_header_shadow_horizontal' );
$divi_mobile_menu_header_shadow_vetical = $titan->getOption( 'divi_mobile_menu_header_shadow_vetical' );
$divi_mobile_menu_header_shadow_blur_radius = $titan->getOption( 'divi_mobile_menu_header_shadow_blur_radius' );
$divi_mobile_menu_header_shadow_spread_radius = $titan->getOption( 'divi_mobile_menu_header_shadow_spread_radius' );
$divi_mobile_menu_header_shadow_colour = $titan->getOption( 'divi_mobile_menu_header_shadow_colour' );


$searchbox_size = $divi_mobile_custom_header_search_icon_font_size + 20;


$dis_box_shadow = '
-webkit-box-shadow: '.$divi_mobile_menu_header_shadow_horizontal.'px '.$divi_mobile_menu_header_shadow_vetical.'px '.$divi_mobile_menu_header_shadow_blur_radius.'px '.$divi_mobile_menu_header_shadow_spread_radius.'px '.$divi_mobile_menu_header_shadow_colour.';
-moz-box-shadow: '.$divi_mobile_menu_header_shadow_horizontal.'px '.$divi_mobile_menu_header_shadow_vetical.'px '.$divi_mobile_menu_header_shadow_blur_radius.'px '.$divi_mobile_menu_header_shadow_spread_radius.'px '.$divi_mobile_menu_header_shadow_colour.';
box-shadow: '.$divi_mobile_menu_header_shadow_horizontal.'px '.$divi_mobile_menu_header_shadow_vetical.'px '.$divi_mobile_menu_header_shadow_blur_radius.'px '.$divi_mobile_menu_header_shadow_spread_radius.'px '.$divi_mobile_menu_header_shadow_colour.';
';

if ($divi_mobile_custom_header_cart_icon_position == "left" || $divi_mobile_custom_header_cart_icon_position == "inside-left") {
  $divi_mobile_custom_header_cart_icon_position_dis = "left";
} else if ($divi_mobile_custom_header_cart_icon_position == "right" || $divi_mobile_custom_header_cart_icon_position == "inside-right") {
  $divi_mobile_custom_header_cart_icon_position_dis = "right";
} else {
  $divi_mobile_custom_header_cart_icon_position_dis = "left";
}

if ($divi_mobile_custom_header_search_icon_position == "left" || $divi_mobile_custom_header_search_icon_position == "inside-left") {
  $divi_mobile_custom_header_search_icon_position_dis = "left";
} else if ($divi_mobile_custom_header_search_icon_position == "right" || $divi_mobile_custom_header_search_icon_position == "inside-right") {
  $divi_mobile_custom_header_search_icon_position_dis = "right";
}
else {
  $divi_mobile_custom_header_search_icon_position_dis = "left";
}

if ($divi_mobile_custom_header_fixed == "enabled") {
  $divi_mobile_custom_header_fixed_dis = "position: fixed;";
} else {
    $divi_mobile_custom_header_fixed_dis = "position: absolute;";
}


if ($divi_mobile_custom_header_logo_position == "left"){
  $divi_mobile_custom_header_logo_position_dis = 'float: left;position: relative;
  left: '.$divi_mobile_custom_header_logo_position_edge.'px;
  top: '.$divi_mobile_custom_header_logo_position_top.'px;
  ';
  $divi_mobile_custom_header_logo_position_dis_float = 'float: left;position: relative;';
}
else if ($divi_mobile_custom_header_logo_position == "right") {
  $divi_mobile_custom_header_logo_position_dis = 'float: right;position: relative;
  right: '.$divi_mobile_custom_header_logo_position_edge.'px;
  top: '.$divi_mobile_custom_header_logo_position_top.'px;
  ';
  $divi_mobile_custom_header_logo_position_dis_float = 'float: right;position: relative;';
} else {
$divi_mobile_custom_header_logo_position_dis  = '
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  ';
  $divi_mobile_custom_header_logo_position_dis_float = 'position: relative;';
}


if(strpos($divi_mobile_custom_header_bg_color, "#") !== false){
$divi_mobile_custom_header_height_dis = '.dm-custom-header #page-container {
padding-top: '.$divi_mobile_custom_header_height.'px !important;
}';
} else {
  $divi_mobile_custom_header_height_dis = "";
}

  $css_mobile = '<style id="divi-mobile-custom-header-inline-styles">';

  $css_mobile .= '

#dm-header {
  '.$divi_mobile_custom_header_fixed_dis.'
  background-color: '.$divi_mobile_custom_header_bg_color.';
top: 0;
width: 100%;
display: block;
z-index: 9999;
	-webkit-transition: background-color 0.4s, color 0.4s, transform 0.4s, opacity 0.4s ease-in-out;
	-moz-transition: background-color 0.4s, color 0.4s, transform 0.4s, opacity 0.4s ease-in-out;
	transition: background-color 0.4s, color 0.4s, transform 0.4s, opacity 0.4s ease-in-out;
  display: flex;
flex-direction: column;
justify-content: center;
'.$dis_box_shadow.'
-webkit-transition: all 0.2s;
transition: all 0.2s;
}

.dm-header-cont {
height: '.$divi_mobile_custom_header_height.'px;
}





 body .divi-mobile-menu .menu-button {
  '.$divi_mobile_custom_header_fixed_dis.'
}


#main-header {
  display: none !important;
}

#dm-header.fixed-header {
background-color: '.$divi_mobile_custom_header_bg_color_scroll.';
}

.fixed-header .dm-header-cont {
height: '.$divi_mobile_custom_header_height_scroll.'px;
}

#dm-header.fixed-header #dm-logo {
  max-height: '.$divi_mobile_custom_header_logo_height_scroll.'px;
  max-height: '.$divi_mobile_custom_header_logo_height_scroll.'px;
}

.dm-fixed-header .hamburger {
  top: '.$divi_mobile_custom_header_hamburger_top_scroll.'px;
}

.dm-fixed-header .dm-cart {
  top: '.$divi_mobile_custom_header_cart_top_scroll.'px;
}

.dm-fixed-header .dm-search {
  top: '.$divi_mobile_custom_header_search_top_scroll.'px;
}





.dm-branding {
  '.$divi_mobile_custom_header_logo_position_dis.'
height: 100%;
}

#dm-header .flex-div {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.dm-branding a {
height: 100%;
'.$divi_mobile_custom_header_logo_position_dis_float.'
display: flex;
flex-direction: column;
justify-content: center;
}

#dm-logo {
  max-height: '.$divi_mobile_custom_header_logo_height.'px;
  max-width: '.$divi_mobile_custom_header_logo_max_width.'px;
}

#dm-logo.svg-logo {
  width: 100%;
  height: 100%;
}

.dm-cart {
  display: block;
position: absolute;
'.$divi_mobile_custom_header_cart_icon_position_dis.': '.$divi_mobile_custom_header_cart_icon_position_edge.'px;
width: 50px;
margin-top: '.$divi_mobile_custom_header_cart_icon_position_top.'px;
}

.dm-cart .et-cart-info span:before {
  color: '.$divi_mobile_custom_header_cart_icon_color.';
  font-size: '.$divi_mobile_custom_header_cart_icon_font_size.'px;
}

.dm-search {
  width: '.$searchbox_size.'px;
  display: block;
max-width: 200px;
position: absolute;
'.$divi_mobile_custom_header_search_icon_position_dis.': '.$divi_mobile_custom_header_search_icon_position_edge.'px;
margin-top: '.$divi_mobile_custom_header_search_icon_position_top.'px;
    z-index: 99999;
}




.dm-search .et-search-form input,
.dm-search .et-search-form input::-webkit-input-placeholder {
  color: '.$divi_mobile_custom_header_search_text_color.';
  font-size: '.$divi_mobile_custom_header_search_text_font_size.'px;
}


.dm-search #et_search_icon:before {
    position: relative;
  top: 0 !important;
  color: '.$divi_mobile_custom_header_search_icon_color.';
  font-size: '.$divi_mobile_custom_header_search_icon_font_size.'px;
}

.dm-search .et-search-form input {
    position: relative;
}

.dm-search form.et-search-form{
  width: 100%;
  margin: 0;
  left: auto;
  right: auto;
  bottom: auto;
  position: relative;
}


.et_hide_search_icon #dm-header #et_top_search_mob {
  display: block !important;
}

.et_header_style_centered .dm-search #et_top_search_mob, .et_vertical_nav.et_header_style_centered #main-header .dm-search #et_top_search_mob {
      display: block !important;
}

#dm-header #et_top_search_mob {
  float: none !important;
  margin: 3px 0 0 22px;
    display: block;
  text-align: center;
  white-space: nowrap;
  margin: 0 10px;
  opacity: 1;
      width: 100%;
      height: '.$divi_mobile_custom_header_height.'px;
}



#dm-header #et_top_search_mob #et_search_icon {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: auto;
  cursor: pointer;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 13px;
  font-weight: 500;
  display: inline-block;
  margin: 0;
  left: 0;
}

.dm-search-box {
  position: absolute;
  left: 30px;
  top: 50%;
  display: -ms-inline-flexbox;
  display: inline-flex;
  width: 100%;
  padding: 0;
  overflow: hidden;
  transform: translateY(-50%);
}



.dm-search .et-search-form input {
  width: 100%;
  height: 100%;
  background: none;
  padding: 0 0 0 10px;
  line-height: 1.5;
  position: relative;
  top: 0;
  text-overflow: ellipsis;
  right: auto;
  left: 0;
}

.menu-wrap__inner #et_top_search_mob {
  width: 100% !important;
}

.menu-wrap__inner .dm-search {
      max-width: 90%;
}

.menu-wrap__inner #et_search_icon {
  right: 0;
    position: absolute;
}


@media only screen and (max-width: '.$divi_mobile_menu__breakpoint.'px) {

'.$divi_mobile_custom_header_height_dis.'

  .dm-search-icon-header .dm-search-box .close:before {
    color: '. $divi_mobile_custom_header_search_icon_close_color .' !important;
    font-size: '. $divi_mobile_custom_header_search_icon_close_font_size .'px !important;
  }

  #dm-header {
    overflow: visible !important;
  }

  .dm-search-box {
    transform: translateY(0) !important;
  }


  .dm-search-icon-header .dm-search-box {
    position: fixed !important;
display: block !important;
width: 100%;
left: 0;
right: 0;
padding: 10px 0;
    background-color: '.$divi_mobile_custom_header_bg_color.';
    top: -200px;
    opacity: 0;
  	-webkit-transition: all 0.5s;
  	-moz-transition: all 0.5s;
  	transition: all 0.5s;
  }

  .dm-search-box .close {
    display: none;
  }

  .dm-search-icon-header .dm-search-box .close {
    display: block;
  }

.dm-search-icon-header .active .dm-search-box {
  top: '.$divi_mobile_custom_header_height.'px;
  opacity: 1 !important;
}

.dm-fixed-header.dm-search-icon-header .active .dm-search-box {
  top: '.$divi_mobile_custom_header_height_scroll.'px;
  opacity: 1 !important;
}

.dm-search-icon-header .dm-search-box .close {
position: absolute;
top: 10px;
right: 10px;
z-index: 99999;
}

.dm-search-icon-header .dm-search-box .close:before {
  text-shadow: 0 0;
      font-family: ETmodules!important;
      font-weight: 400;
      font-style: normal;
      font-variant: normal;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      line-height: 1;
      text-transform: none;
      speak: none;
      font-size: 22px;
      content: "\4d";
      color: #000000;
}

}

  ';



  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_custom_header_css');