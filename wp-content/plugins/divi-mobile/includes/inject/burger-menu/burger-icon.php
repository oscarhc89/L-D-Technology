<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$titan = TitanFramework::getInstance( 'divi-mobile-menu' );


$divi_mobile_menu_style = $titan->getOption( 'divi_mobile_menu_style' );

$burger_menu = $titan->getOption( 'burger_menu' );
$set_mobile_menu = $titan->getOption( 'set_mobile_menu' );
$burger_menu_style = $titan->getOption( 'burger_menu_style' );
$divi_mobile_menu__burger_menu_text= $titan->getOption( 'divi_mobile_menu__burger_menu_text' );

if ($set_mobile_menu == "primary-menu") {
  $set_mobile_menu = "none";
} else {
  $set_mobile_menu = $set_mobile_menu;
}

if ($burger_menu_style == "reverse") {
  $burger_menu_style_dis = "-r";
}
else {
  $burger_menu_style_dis = "";
}

?>
<button id="open-button" class="hamburger menu-button <?php echo esc_html( $burger_menu ) ?><?php echo esc_html( $burger_menu_style_dis ) ?>" type="button">
  <?php
if (isset($divi_mobile_menu__burger_menu_text)) {
  ?>
<span class="menu-text"><?php echo esc_html( $divi_mobile_menu__burger_menu_text ) ?></span>
  <?php
}

if ($divi_mobile_menu_style == "three") {
 ?>
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
<?php
} else if ($divi_mobile_menu_style == "two") {
  ?>
 <span class="hamburger-box-two">
 <span class="hamburger-inner-two"></span>
 </span>
 <?php
} else if ($divi_mobile_menu_style == "three-dots") {
?>
<svg version="1.1" id="nav-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 18.1 18.1" style="enable-background:new 0 0 18.1 18.1;" xml:space="preserve">
<circle class="dots one" cx="2" cy="2" r="2"/>
<circle class="dots two" cx="16.1" cy="16.1" r="2"/>
<circle class="dots three" cx="2" cy="16.1" r="2"/>
<circle class="dots four" cx="9.1" cy="9.1" r="2"/>
<circle class="dots five" cx="16.1" cy="2" r="2"/>
</svg>
<?php
}
 ?>

</button>
<?php

 ?>
