<?php
if ( ! defined( 'ABSPATH' ) ) exit;

include(DE_DM_PATH . '/titan-framework/titan-framework-embedder.php');
$titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$divi_mobile_header_style = $titan->getOption( 'divi_mobile_header_style' );

if ($divi_mobile_header_style == "1") {
divi_mobile_bottom_nav_head();
} else {

    add_action('wp_head', 'divi_mobile_bottom_nav_head', 99999999);

}


function divi_mobile_bottom_nav_head() {

  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );
  $set_mobile_menu_second_menu = $titan->getOption( 'set_mobile_menu_second_menu' );
  $set_mobile_menu = $titan->getOption( 'set_mobile_menu' );
  $set_mobile_menu_second = $titan->getOption( 'set_mobile_menu_second' );


if ($set_mobile_menu_second_menu == "bottom-nav") {
  if ($set_mobile_menu_second == "primary-menu") {
    $set_mobile_menu = "none";
  } else {
    $set_mobile_menu = $set_mobile_menu_second;
  }
} else {
  if ($set_mobile_menu == "primary-menu") {
    $set_mobile_menu = "none";
  } else {
    $set_mobile_menu = $set_mobile_menu;
  }
}


  ?>
  <div class="divi-mobile-menu bottom-navigation-menu">
  <div id="dm_nav">

    <nav class="bottom-navigation">
<?php
$menuClass = 'nav';
$primaryNav = wp_nav_menu( array( 'menu' => $set_mobile_menu, 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'dm-menu', 'echo' => false ) );
echo et_core_esc_wp( $primaryNav );
?>
    </nav>

  </div>
</div>
<?php


}

 ?>
