<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$divi_mobile_custom_header_logo = $titan->getOption( 'divi_mobile_custom_header_logo' );
$inject_above_header = $titan->getOption( 'inject_above_header' );


 ?>
<header id="dm-header">
  <?php

  if (isset($inject_above_header)) {
  if ($inject_above_header !== "") {
    ?>
    <div class="dm-above-layout">
    <?php
  echo do_shortcode('[et_pb_section global_module="'.$inject_above_header.'"][/et_pb_section]');
  ?> </div> <?php
  }
  }

  ?>

<div class="dm-header-cont">

<div class="dm-branding">
  <?php

  $imageSrc = $divi_mobile_custom_header_logo; // For the default value
          if ( is_numeric( $divi_mobile_custom_header_logo ) ) {
              $imageAttachment = wp_get_attachment_image_src( $divi_mobile_custom_header_logo, 'full' );
              $imageSrc = $imageAttachment[0];
          }

if ($imageSrc != "") {
  $logo = $imageSrc;
} else {

  $logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && ! empty( $user_logo )
    ? $user_logo
    : '';

  }

$last3chars = substr($logo, -3);

if ($last3chars == "svg") {
  $last3chars_dis = "svg-logo";
} else {
  $last3chars_dis = "normal-logo";
}

   ?>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <img class="<?php echo esc_html( $last3chars_dis ) ?>" src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="dm-logo" />
  </a>
</div>
<?php       if ($divi_mobile_custom_header_search_icon_position == "left" || $divi_mobile_custom_header_search_icon_position == "right") { ?>
<div class="dm-search">
  <div id="et_top_search_mob">
    <span id="et_search_icon"></span>
<div class="dm-search-box" style="opacity: 0;">
      <form role="search" method="get" class="et-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <?php
        printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
          esc_attr__( 'Search &hellip;', 'Divi' ),
          get_search_query(),
          esc_attr__( 'Search for:', 'Divi' )
        );
      ?>
      </form>
      <span class="close"></span>
  </div>
  </div>
</div>
<?php } ?>
<?php
if ($divi_mobile_custom_header_cart_icon_position == "left" || $divi_mobile_custom_header_cart_icon_position == "right") {
 ?>
<div class="dm-cart">
<?php 				et_show_cart_total( array(
          'no_text' => true,
        ) ); ?>
</div>
<?php } ?>
</div>
</header>
<?php
 ?>
