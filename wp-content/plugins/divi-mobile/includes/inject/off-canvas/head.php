<?php
if ( ! defined( 'ABSPATH' ) ) exit;

include(DE_DM_PATH . '/titan-framework/titan-framework-embedder.php');
$titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$divi_mobile_header_style = $titan->getOption( 'divi_mobile_header_style' );


if ($divi_mobile_header_style == "1") {
  divi_mobile_offscreen_head();
} else {
  add_action('wp_head', 'divi_mobile_offscreen_head', 99999999);
}

function divi_mobile_offscreen_head() {

  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );
  $burger_menu = $titan->getOption( 'burger_menu' );
  $set_mobile_menu = $titan->getOption( 'set_mobile_menu' );
  $burger_menu_style = $titan->getOption( 'burger_menu_style' );
  $inject_head = $titan->getOption( 'inject_head' );
  $inject_footer = $titan->getOption( 'inject_footer' );
  $divi_mobile_custom_header_cart_icon_position = $titan->getOption( 'divi_mobile_custom_header_cart_icon_position' );
  $divi_mobile_custom_header_search_icon_position = $titan->getOption( 'divi_mobile_custom_header_search_icon_position' );

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
  <div class="divi-mobile-menu">
  <div id="dm_nav" class="menu-wrap">
    <div class="menu-wrap__inner">
      <div class="scroll_section">
      <?php
      // if search icon is set to inside menu
      if ($divi_mobile_custom_header_search_icon_position == "inside-left" || $divi_mobile_custom_header_search_icon_position == "inside-right") {
        ?>
        <div class="dm-search">
          <div id="et_top_search_mob">
            <span id="et_search_icon"></span>

              <form role="search" method="get" class="et-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php
                printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
                  esc_attr__( 'Search &hellip;', 'Divi' ),
                  get_search_query(),
                  esc_attr__( 'Search for:', 'Divi' )
                );
              ?>
              </form>
          </div>
        </div>
        <?php
      }
       ?>

<?php
// if cart icon is set to inside menu
if ($divi_mobile_custom_header_cart_icon_position == "inside-left" || $divi_mobile_custom_header_cart_icon_position == "inside-right") {
  ?>
  <div class="dm-cart">
  <?php 				et_show_cart_total( array(
            'no_text' => true,
          ) ); ?>
  </div>
  <?php
}
 ?>

<?php
if (isset($inject_head)) {
if ($inject_head !== "") {
echo do_shortcode('[et_pb_section global_module="'.$inject_head.'"][/et_pb_section]');

// retrieve the styles for the modules
$internal_style = ET_Builder_Element::get_style();
// reset all the attributes after we retrieved styles
ET_Builder_Element::clean_internal_modules_styles( false );
$et_pb_rendering_column_content = false;

// append styles
if ( $internal_style ) {

  $cleaned_styles = str_replace("#page-container","", $internal_style);

  printf(
    '<style type="text/css" class="dm_inner_styles">
      %1$s
    </style>',
    et_core_esc_previously( $cleaned_styles )
        );

}
}
}
 ?>
    <nav class="menu-top">
    </nav>
    <nav class="menu-side">
<?php
$menuClass = 'nav';
$primaryNav = wp_nav_menu( array( 'menu' => $set_mobile_menu, 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'dm-menu', 'echo' => false ) );
echo et_core_esc_wp( $primaryNav );
?>
    </nav>
    <?php

    if (isset($inject_footer)) {
    if ($inject_footer !== "") {
    echo do_shortcode('[et_pb_section global_module="'.$inject_footer.'"][/et_pb_section]');

    // retrieve the styles for the modules
    $internal_style = ET_Builder_Element::get_style();
    // reset all the attributes after we retrieved styles
    ET_Builder_Element::clean_internal_modules_styles( false );
    $et_pb_rendering_column_content = false;

    // append styles
    if ( $internal_style ) {

      $cleaned_styles = str_replace("#page-container","", $internal_style);

      printf(
        '<style type="text/css" class="dm_inner_styles">
          %1$s
        </style>',
        et_core_esc_previously( $cleaned_styles )
            );

    }

    }
    }
     ?>
  </div>
  </div>
  </div>

<?php include(DE_DM_PATH . '/includes/inject/burger-menu/burger-icon.php'); ?>

<?php
$divi_mobile_custom_header = $titan->getOption( 'divi_mobile_custom_header' );
if ($divi_mobile_custom_header == "enabled") {
include(DE_DM_PATH . '/includes/inject/header/header.php');
}
 ?>

</div>
  <?php



}




 ?>
