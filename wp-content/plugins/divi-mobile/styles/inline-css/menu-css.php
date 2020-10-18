<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_menu_css() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_bg_color = $titan->getOption( 'divi_mobile_menu_bg_color' );
$divi_mobile_menu_text_color = $titan->getOption( 'divi_mobile_menu_text_color' );
$divi_mobile_menu_text_color_hover = $titan->getOption( 'divi_mobile_menu_text_color_hover' );
$divi_mobile_active_menu_text_color = $titan->getOption( 'divi_mobile_active_menu_text_color' );
$divi_mobile_active_menu_text_color_hover = $titan->getOption( 'divi_mobile_active_menu_text_color_hover' );
$divi_mobile_menu_text_font_size = $titan->getOption( 'divi_mobile_menu_text_font_size' );
$divi_mobile_menu_text_padding = $titan->getOption( 'divi_mobile_menu_text_padding' );
$divi_mobile_menu_text_font_alignment = $titan->getOption( 'divi_mobile_menu_text_font_alignment' );
$divi_mobile_sub_menu_text_font_alignment = $titan->getOption( 'divi_mobile_sub_menu_text_font_alignment' );

$set_mobile_menu_side_appear = $titan->getOption( 'set_mobile_menu_side_appear' );
$set_mobile_menu_side_max_width = $titan->getOption( 'set_mobile_menu_side_max_width' );
$divi_mobile_menu_space_top = $titan->getOption( 'divi_mobile_menu_space_top' );
$divi_mobile_sub_menu_space_top = $titan->getOption( 'divi_mobile_sub_menu_space_top' );



$divi_mobile_sub_menu_open_rotation = $titan->getOption( 'divi_mobile_sub_menu_open_rotation' );

$set_mobile_menu_layout = $titan->getOption( 'set_mobile_menu_layout' );
$off_canvas_style = $titan->getOption( 'off_canvas_style' );

if ($set_mobile_menu_layout == "off-canvas") {

if ( $off_canvas_style == "side-slide" || $off_canvas_style == "top-side") {
  if ($set_mobile_menu_side_appear == "right") {
    $set_mobile_menu_side_appear_dis = "
    right: 0;
  	-webkit-transform: translate3d(".$set_mobile_menu_side_max_width."px,0,0);
  	transform: translate3d(".$set_mobile_menu_side_max_width."px,0,0);
    ";
  } else {
    $set_mobile_menu_side_appear_dis = "
    left: 0;
  	-webkit-transform: translate3d(-".$set_mobile_menu_side_max_width."px,0,0);
  	transform: translate3d(-".$set_mobile_menu_side_max_width."px,0,0);
    ";
  }
} else if ($off_canvas_style == "elastic") {

  if ($set_mobile_menu_side_appear == "right") {
    $set_mobile_menu_side_appear_dis = "right: 0;";
      } else {
        $set_mobile_menu_side_appear_dis = "left: 0;";
      }

} else {
    $set_mobile_menu_side_appear_dis = "";
}

} else {
    $set_mobile_menu_side_appear_dis = "";
  }


if ($divi_mobile_active_menu_text_color == "rgba(255,255,255,0)") {
  $divi_mobile_active_menu_text_color_dis = "";
} else {
  $divi_mobile_active_menu_text_color_dis = ".menu-wrap .current_page_item>a, .menu-wrap .current-menu-ancestor>a {color:" . $divi_mobile_active_menu_text_color . " !important;}";
}

if ($divi_mobile_active_menu_text_color_hover == "rgba(255,255,255,0)") {
  $divi_mobile_active_menu_text_color_hover_dis = "";
} else {
  $divi_mobile_active_menu_text_color_hover_dis = ".menu-wrap .current_page_item a:hover,.menu-wrap .current_page_item a:focus{color:" . $divi_mobile_active_menu_text_color_hover . ";}";
}


$divi_mobile_menu_text_font_array = $titan->getOption( 'divi_mobile_menu_text_font' );


/**
 *
 * get font css
 *
 */


if (!isset($divi_mobile_menu_text_font_array["font-family"]) || $divi_mobile_menu_text_font_array["font-family"] == "inherit") {$divi_mobile_menu_text_font_font_family = '';} else {$divi_mobile_menu_text_font_font_family = 'font-family:"'.$divi_mobile_menu_text_font_array["font-family"] .'";';}
if (!isset($divi_mobile_menu_text_font_array["font-size"]) || $divi_mobile_menu_text_font_array["font-size"] == "inherit") {$divi_mobile_menu_text_font_font_size = '';} else {$divi_mobile_menu_text_font_font_size = 'font-size:'.$divi_mobile_menu_text_font_array["font-size"] .';';}
if (!isset($divi_mobile_menu_text_font_array["font-weight"]) || $divi_mobile_menu_text_font_array["font-weight"] == "inherit") {$divi_mobile_menu_text_font_font_weight = '';} else {$divi_mobile_menu_text_font_font_weight = 'font-weight:'.$divi_mobile_menu_text_font_array["font-weight"] .';';}
if (!isset($divi_mobile_menu_text_font_array["font-style"]) || $divi_mobile_menu_text_font_array["font-style"] == "normal") {$divi_mobile_menu_text_font_font_style = '';} else {$divi_mobile_menu_text_font_font_style = 'font-style:'.$divi_mobile_menu_text_font_array["font-style"] .';';}
if (!isset($divi_mobile_menu_text_font_array["line-height"]) || $divi_mobile_menu_text_font_array["line-height"] == "1em") {$divi_mobile_menu_text_font_line_height = '';} else {$divi_mobile_menu_text_font_line_height = 'line-height:'.$divi_mobile_menu_text_font_array["line-height"] .';';}
if (!isset($divi_mobile_menu_text_font_array["letter-spacing"]) || $divi_mobile_menu_text_font_array["letter-spacing"] == "normal") {$divi_mobile_menu_text_font_letter_spacing = '';} else {$divi_mobile_menu_text_font_letter_spacing = 'letter-spacing:'.$divi_mobile_menu_text_font_array["letter-spacing"] .';';}
if (!isset($divi_mobile_menu_text_font_array["text-transform"]) || $divi_mobile_menu_text_font_array["text-transform"] == "none") {$divi_mobile_menu_text_font_text_transform = '';} else {$divi_mobile_menu_text_font_text_transform = 'text-transform:'.$divi_mobile_menu_text_font_array["text-transform"] .';';}
if (!isset($divi_mobile_menu_text_font_array["font-variant"]) || $divi_mobile_menu_text_font_array["font-variant"] == "normal") {$divi_mobile_menu_text_font_font_variant = '';} else {$divi_mobile_menu_text_font_font_variant = 'font-variant:'.$divi_mobile_menu_text_font_array["font-variant"] .';';}


if (!isset($divi_mobile_menu_text_font_array["text-shadow-location"])) {
$divi_mobile_menu_text_font_font_variant = '';
} else {

$textShadowLocation = $divi_mobile_menu_text_font_array["text-shadow-location"];
$textShadowDistance = ! empty( $divi_mobile_menu_text_font_array['text-shadow-distance'] ) ? $divi_mobile_menu_text_font_array['text-shadow-distance'] : '0px';
$textShadowBlur = ! empty( $divi_mobile_menu_text_font_array['text-shadow-blur'] ) ? $divi_mobile_menu_text_font_array['text-shadow-blur'] : '0px';
$textShadowColor = '#333333';
$textShadowOpacity = ! empty( $divi_mobile_menu_text_font_array['text-shadow-opacity'] ) ? $divi_mobile_menu_text_font_array['text-shadow-opacity'] : '1';


$textShadow = '';
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

$divi_mobile_menu_text_font_font_variant = 'text-shadow:'.$textShadow.'';

}

// if ($divi_mobile_menu_text_font_array["value"] == "inherit") {$divi_mobile_menu_text_font_value = '';} else {$divi_mobile_menu_text_font_value = '';}

  $css_mobile = '<style id="divi-mobile-menu-inline-styles">';

  $css_mobile .= '

#dm-menu li a {
  '.$divi_mobile_menu_text_font_font_family.'
  '.$divi_mobile_menu_text_font_font_size.'
  '.$divi_mobile_menu_text_font_font_weight.'
  '.$divi_mobile_menu_text_font_font_style.'
  '.$divi_mobile_menu_text_font_line_height.'
  '.$divi_mobile_menu_text_font_letter_spacing.'
  '.$divi_mobile_menu_text_font_text_transform.'
  '.$divi_mobile_menu_text_font_font_variant.';
}

  #dm-menu.nav li {
    text-align: '.$divi_mobile_menu_text_font_alignment.';
  }

  #dm-menu.nav li .sub-menu > li {
    text-align: '.$divi_mobile_sub_menu_text_font_alignment.' !important;
  }

  #dm_nav .menu-wrap__inner .menu-item-has-children > a:after {
        transform: rotate(0deg);
        transition: all 300ms ease 0ms;
  }

  #dm_nav .menu-wrap__inner .menu-item-has-children.visible > a:after {
        transform: rotate('.$divi_mobile_sub_menu_open_rotation.'deg);
  }

  .menu-wrap__inner {
    padding-top: '.$divi_mobile_menu_space_top.'px !important;
  }

  #dm_nav .menu-wrap__inner .sub-menu {
    padding-top: '.$divi_mobile_sub_menu_space_top.'px !important;
  }

.menu-wrap {
  background-color: '.$divi_mobile_menu_bg_color.';
  '.$set_mobile_menu_side_appear_dis.'
  max-width: '.$set_mobile_menu_side_max_width.'px;
}

#dm_nav .menu-wrap__inner .sub-menu {
'.$set_mobile_menu_side_appear_dis.'
}

.menu-wrap a {
  display: block;
	color: '.$divi_mobile_menu_text_color.';
  font-size: '.$divi_mobile_menu_text_font_size.'px;
  padding-top: '.$divi_mobile_menu_text_padding.'px !important;
  padding-bottom: '.$divi_mobile_menu_text_padding.'px !important;
}

.menu-wrap a:hover,
.menu-wrap a:focus {
	color: '.$divi_mobile_menu_text_color_hover.';
}

'.$divi_mobile_active_menu_text_color_dis.'

'.$divi_mobile_active_menu_text_color_hover_dis.'



#dm_nav .nav li li {
  padding: 0;
      line-height: 1em;
}

  ';



  $css_mobile .= '</style>';
  //minify it
  $css_mobile_min = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css_mobile );
  echo $css_mobile_min; // phpcs:ignore

}
add_action('wp_head', 'divi_mobile_menu_css');