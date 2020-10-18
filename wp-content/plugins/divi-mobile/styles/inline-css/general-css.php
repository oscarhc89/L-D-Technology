<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_general_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_text_color = $titan->getOption( 'divi_mobile_menu_text_color' );
$divi_mobile_menu_text_color_hover = $titan->getOption( 'divi_mobile_menu_text_color_hover' );
$divi_mobile_menu_text_font_size = $titan->getOption( 'divi_mobile_menu_text_font_size' );
$divi_mobile_menu_text_padding = $titan->getOption( 'divi_mobile_menu_text_padding' );
$divi_mobile_menu_sub_menu_bg_color = $titan->getOption( 'divi_mobile_menu_sub_menu_bg_color' );
$divi_mobile_menu_sub_sub_menu_bg_color = $titan->getOption( 'divi_mobile_menu_sub_sub_menu_bg_color' );
$divi_mobile_sub_menu_text_color = $titan->getOption( 'divi_mobile_sub_menu_text_color' );
$divi_mobile_sub_menu_text_color_hover = $titan->getOption( 'divi_mobile_sub_menu_text_color_hover' );
$divi_mobile_sub_menu_text_font_size = $titan->getOption( 'divi_mobile_sub_menu_text_font_size' );
$divi_mobile_sub_menu_text_padding = $titan->getOption( 'divi_mobile_sub_menu_text_padding' );
$divi_mobile_sub_menu_icon_activate_color = $titan->getOption( 'divi_mobile_sub_menu_icon_activate_color' );
$divi_mobile_sub_menu_open_icon_top = $titan->getOption( 'divi_mobile_sub_menu_open_icon_top' );
$divi_mobile_sub_menu_open_icon_left = $titan->getOption( 'divi_mobile_sub_menu_open_icon_left' );
$divi_mobile_sub_menu_open_font_size = $titan->getOption( 'divi_mobile_sub_menu_open_font_size' );

$divi_mobile_menu__breakpoint = $titan->getOption( 'divi_mobile_menu__breakpoint' );
$divi_mobile_sub_menu_position = $titan->getOption( 'divi_mobile_sub_menu_position' );

$divi_mobile_custom_header_height = $titan->getOption( 'divi_mobile_custom_header_height' ); //

$divi_mobile_fixed_not = $titan->getOption( 'divi_mobile_fixed_not' );



$divi_mobile_header_style = $titan->getOption( 'divi_mobile_header_style' );

if ($divi_mobile_header_style == "") {
      $divi_mobile_header_style_dis = '
    #top-menu, .mobile_menu_bar, .et-l--header, #et-navigation, .dm-custom-header #main-header {
        display: none !important;
    }
    ';
} else {
$divi_mobile_header_style_dis = '
body .divi-mobile-menu {display: none !important;}
body .dm_tb_shortcode .divi-mobile-menu {display: initial !important;}
';
}


$divi_mobile_menu__breakpoint_min = $divi_mobile_menu__breakpoint + 1;

if ($divi_mobile_sub_menu_position == "far-right") {
  $divi_mobile_sub_menu_position_dis = "display: block;";
  $divi_mobile_sub_menu_open_icon_left_dis = 'right: '.$divi_mobile_sub_menu_open_icon_left.'px;';
  $divi_mobile_sub_menu_open_icon_top_dis = 'top: '.$divi_mobile_sub_menu_open_icon_top.'px;';
} else if ($divi_mobile_sub_menu_position == "after-text") {
  $divi_mobile_sub_menu_position_dis = "display: inline-block;";
  $divi_mobile_sub_menu_open_icon_left_dis = 'right: '.$divi_mobile_sub_menu_open_icon_left.'px;';
  $divi_mobile_sub_menu_open_icon_top_dis = 'top: '.$divi_mobile_sub_menu_open_icon_top.'px;';
}



$sub_menu_enable_border = $titan->getOption( 'sub_menu_enable_border' );

if ($sub_menu_enable_border == "1") {
  $sub_menu_enable_border_dis = "";
} else {
  $sub_menu_enable_border_dis = "#dm_nav .nav li ul {border-top:0;}";
}


if ($divi_mobile_fixed_not == "fixed") {
  $divi_mobile_fixed_not_dis = "fixed";
  $divi_mobile_fixed_not_height = "";
} else {
  $divi_mobile_fixed_not_dis = "absolute";
  $divi_mobile_fixed_not_height = "height: 100vh;";
}



if (isset($divi_mobile_menu_sub_sub_menu_bg_color) && $divi_mobile_menu_sub_sub_menu_bg_color !== "rgba(0, 0, 0, 0)") {
  $divi_mobile_menu_sub_sub_menu_bg_color_dis = '#dm_nav li ul.sub-menu ul.sub-menu { background-color: '.$divi_mobile_menu_sub_sub_menu_bg_color.'; }';
} else {
  $divi_mobile_menu_sub_sub_menu_bg_color_dis = '';
}



$divi_mobile_menu_text_font_array = $titan->getOption( 'divi_mobile_sub_menu_text_font' );


/**
 *
 * get font css
 *
 */

if (is_array($divi_mobile_menu_text_font_array)) {

if (isset($divi_mobile_menu_text_font_array["font-family"]) && $divi_mobile_menu_text_font_array["font-family"] == "inherit") {$divi_mobile_menu_text_font_font_family = '';} else {$divi_mobile_menu_text_font_font_family = 'font-family:"'.$divi_mobile_menu_text_font_array["font-family"] .'";';}
if (isset($divi_mobile_menu_text_font_array["font-size"]) && $divi_mobile_menu_text_font_array["font-size"] == "inherit") {$divi_mobile_menu_text_font_font_size = '';} else {$divi_mobile_menu_text_font_font_size = 'font-size:'.$divi_mobile_menu_text_font_array["font-size"] .';';}
if (isset($divi_mobile_menu_text_font_array["font-weight"]) && $divi_mobile_menu_text_font_array["font-weight"] == "inherit") {$divi_mobile_menu_text_font_font_weight = '';} else {$divi_mobile_menu_text_font_font_weight = 'font-weight:'.$divi_mobile_menu_text_font_array["font-weight"] .';';}
if (isset($divi_mobile_menu_text_font_array["font-style"]) && $divi_mobile_menu_text_font_array["font-style"] == "normal") {$divi_mobile_menu_text_font_font_style = '';} else {$divi_mobile_menu_text_font_font_style = 'font-style:'.$divi_mobile_menu_text_font_array["font-style"] .';';}
if (isset($divi_mobile_menu_text_font_array["line-height"]) && $divi_mobile_menu_text_font_array["line-height"] == "1em") {$divi_mobile_menu_text_font_line_height = '';} else {$divi_mobile_menu_text_font_line_height = 'line-height:'.$divi_mobile_menu_text_font_array["line-height"] .';';}
if (isset($divi_mobile_menu_text_font_array["letter-spacing"]) && $divi_mobile_menu_text_font_array["letter-spacing"] == "normal") {$divi_mobile_menu_text_font_letter_spacing = '';} else {$divi_mobile_menu_text_font_letter_spacing = 'letter-spacing:'.$divi_mobile_menu_text_font_array["letter-spacing"] .';';}
if (isset($divi_mobile_menu_text_font_array["text-transform"]) && $divi_mobile_menu_text_font_array["text-transform"] == "none") {$divi_mobile_menu_text_font_text_transform = '';} else {$divi_mobile_menu_text_font_text_transform = 'text-transform:'.$divi_mobile_menu_text_font_array["text-transform"] .';';}
if (isset($divi_mobile_menu_text_font_array["font-variant"]) && $divi_mobile_menu_text_font_array["font-variant"] == "normal") {$divi_mobile_menu_text_font_font_variant = '';} else {$divi_mobile_menu_text_font_font_variant = 'font-variant:'.$divi_mobile_menu_text_font_array["font-variant"] .';';}


$textShadowLocation = $divi_mobile_menu_text_font_array["text-shadow-location"];
$textShadowDistance = ! empty( $divi_mobile_menu_text_font_array['text-shadow-distance'] ) ? $divi_mobile_menu_text_font_array['text-shadow-distance'] : '0px';
$textShadowBlur = ! empty( $divi_mobile_menu_text_font_array['text-shadow-blur'] ) ? $divi_mobile_menu_text_font_array['text-shadow-blur'] : '0px';
$textShadowColor = '#333333';
$textShadowOpacity = ! empty( $divi_mobile_menu_text_font_array['text-shadow-opacity'] ) ? $divi_mobile_menu_text_font_array['text-shadow-opacity'] : '1';


$submenu_text = '  #dm_nav li ul.sub-menu a {
    '.$divi_mobile_menu_text_font_font_family.'
    '.$divi_mobile_menu_text_font_font_size.'
    '.$divi_mobile_menu_text_font_font_weight.'
    '.$divi_mobile_menu_text_font_font_style.'
    '.$divi_mobile_menu_text_font_line_height.'
    '.$divi_mobile_menu_text_font_letter_spacing.'
    '.$divi_mobile_menu_text_font_text_transform.'
    '.$divi_mobile_menu_text_font_font_variant.'
  }
  ';
} else {
  $submenu_text = "";
}

$textShadow = '';
if (isset($textShadowLocation)) {
  if ( $textShadowLocation != 'none' ) {
    if ( stripos( $textShadowLocation, 'left' ) !== false ) {
      $textShadow .= '-' . $textShadowDistance;
    } else if ( stripos( $textShadowLocation, 'right' ) !== false ) {
      $textShadow .= $textShadowDistance;
    } else {
      $textShadow .= '0';
    }
    $textShadow .= ' ';
    if ( stripos( $textShadowLocation, 'top' ) !== false ) {
      $textShadow .= '-' . $textShadowDistance;
    } else if ( stripos( $textShadowLocation, 'bottom' ) !== false ) {
      $textShadow .= $textShadowDistance;
    } else {
      $textShadow .= '0';
    }
    $textShadow .= ' ';
    $textShadow .= $textShadowBlur;
    $textShadow .= ' ';
  
    $textShadow .= '#333333';
  } else {
    $textShadow .= "";
  }
  } else {
    $textShadow .= "";
  }

$divi_mobile_menu_text_font_font_variant = 'text-shadow:'.$textShadow.'';








  $css_mobile = '<style id="divi-mobile-general-inline-styles">';

  $css_mobile .= '

  .et-db #et-boc .et-l #dm_nav .nav li ul {
position:relative;
  }

  .et-db #et-boc .et-l #dm_nav .nav li li ul {
    top: 0;
    left: 0;
}

  .et-db #et-boc .et-l #dm_nav .nav li li {
    padding: 0;
  }

  .dm_tb_shortcode ul,
  #dm-menu.nav li  {
    list-style: none !important;
  }


  #dm_nav a.menu-item-has-children{
     touch-action: none;
  }

  .menu-wrap__inner {
  	height: 0 !important;
  }

  body.show-menu .menu-wrap__inner {
    height: 100% !important;
    overflow-x: hidden;
  }

body .hamburger {
padding: 0;
}

#dm-header::-webkit-scrollbar {
  display: none;
}

#dm-header {
  -ms-overflow-style: none;
}

  #dm_nav .menu-wrap__inner .visible > ul.sub-menu {
      overflow-y: auto;
  }

 .show-menu #dm_nav .menu-wrap__inner .visible > .sub-menu {
display: block;
  }

  #dm_nav .menu-wrap__inner .visible > .sub-menu {
 display: none;
   }

  .divi-mobile-menu {
    padding-top: 0 !important;
    margin-top: 0 !important;
  }

  #et_search_icon:before {
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
    position: absolute;
    top: -3px;
    left: 0;
    font-size: 17px;
    content: "\55";
}

  .show-menu {
    overflow: hidden;
    position: relative;
    height: 100vh;
  }

  .scroll_section {
     overflow-y: auto;
     max-height: 80vh;
 }

  .divi-mobile-menu {
  z-index: 99999999999999999;
  position: relative;
  }

  body .menu-wrap {
         height: 100vh;
          top: 0;
        '.$divi_mobile_fixed_not_height.'
  }

  body .menu-wrap {
      width: 0 !important;
  }
  body.show-menu .menu-wrap {
      width: 100% !important;
  }

  body .menu-wrap, body .divi-mobile-menu .menu-button {
    position: '.$divi_mobile_fixed_not_dis.';
  }

  #dm-menu a {'.$divi_mobile_sub_menu_position_dis.'}

  #dm_nav .menu-wrap__inner .menu-item-has-children > a:after,
  .clickthrough {
    color: '.$divi_mobile_sub_menu_icon_activate_color.';
    font-size: '.$divi_mobile_sub_menu_open_font_size.'px !important;
    '.$divi_mobile_sub_menu_open_icon_left_dis.'
    '.$divi_mobile_sub_menu_open_icon_top_dis.'
  }

  .clickthrough {
    position: absolute;
    width: '.$divi_mobile_sub_menu_open_font_size.'px;
    height: '.$divi_mobile_sub_menu_open_font_size.'px;
    z-index: 9999999999999999999999;
  }

  '.$sub_menu_enable_border_dis.'
  #dm_nav li ul.sub-menu,
  .et-db #et-boc .et-l #dm_nav .nav li ul {
    background-color: '.$divi_mobile_menu_sub_menu_bg_color.';
  }
  
  '.$divi_mobile_menu_sub_sub_menu_bg_color_dis.'

  divi_mobile_menu_sub_sub_menu_bg_color
'.$submenu_text.'

  #dm_nav li ul.sub-menu a {
    color: '.$divi_mobile_sub_menu_text_color.';
    font-size: '.$divi_mobile_sub_menu_text_font_size.'px;
    padding-top: '.$divi_mobile_sub_menu_text_padding.'px;
    padding-bottom: '.$divi_mobile_sub_menu_text_padding.'px;
  }

  #dm_nav li ul.sub-menu a:hover {
    color: '.$divi_mobile_sub_menu_text_color_hover.';
  }

  .menu-wrap .et_pb_section, .et-db .menu-wrap #et-boc .et-l .et_pb_section {background-color: transparent;padding:0;}
  .menu-wrap .et_pb_row, .et-db .menu-wrap #et-boc .et-l .et_pb_row {width: 100%; max-width: 100%;padding: 0;}

  .et-db .menu-wrap #et-boc .et-l .et_pb_button_module_wrapper > a {
display: block;
  }

.close-submenu {
  cursor: pointer;
}

@media only screen and (max-width: '.$divi_mobile_menu__breakpoint.'px) {

'.$divi_mobile_header_style_dis.'

  .logo_container {
      min-height: 80px;
  }

  #et-top-navigation, .divi-mobile-menu {
      display: block !important;
  }
  body #et_mobile_nav_menu  {
    display: none !important;
  }
}

@media only screen and (min-width: '.$divi_mobile_menu__breakpoint_min.'px) {
.divi-mobile-menu, #dm-header {
  display: none !important;
}
body #top-menu, body #main-header  {
  display: block !important;
}
body #et_mobile_nav_menu  {
  display: none !important;
}
}

.slidein-minicart-active #dm-header {
    z-index: 999999999999999999999999;
}

.slidein-minicart-active #open-button {
    z-index: -1;
}


  ';



  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_general_css');