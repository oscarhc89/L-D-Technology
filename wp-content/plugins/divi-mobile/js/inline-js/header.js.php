<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_custom_header_js() {

?>
<script type="text/javascript">
jQuery(document).ready(function( $ ) {

  <?php
  $titan = TitanFramework::getInstance( 'divi-mobile-menu' );
  $divi_mobile_custom_header_search_icon_position = $titan->getOption( 'divi_mobile_custom_header_search_icon_position' );
  $divi_mobile_custom_header_logo_position = $titan->getOption( 'divi_mobile_custom_header_logo_position' );
  $divi_mobile_custom_header_cart_icon_position = $titan->getOption( 'divi_mobile_custom_header_cart_icon_position' );
  $divi_mobile_custom_header_search_icon_position = $titan->getOption( 'divi_mobile_custom_header_search_icon_position' );
  $divi_mobile_custom_header_fixed = $titan->getOption( 'divi_mobile_custom_header_fixed' );

?>
$("body").addClass("dm-ch-logo-pos-<?php echo esc_html( $divi_mobile_custom_header_logo_position ) ?>");
$("body").addClass("dm-ch-cart-icon-pos-<?php echo esc_html( $divi_mobile_custom_header_cart_icon_position ) ?>");
$("body").addClass("dm-ch-search-icon-pos-<?php echo esc_html( $divi_mobile_custom_header_search_icon_position ) ?>");
<?php

if ($divi_mobile_custom_header_search_icon_position == "right" || $divi_mobile_custom_header_search_icon_position == "left") {
  ?>
  $("body").addClass("dm-search-icon-header");

  $("#dm-header #et_top_search_mob #et_search_icon").on('touchstart click', function(event) {
          $("#dm-header #et_top_search_mob").addClass("active");
          setTimeout(
  function()
  {
  $("body").addClass("search-active");
}, 500);
  });


  $(document).on('touchstart click', ".search-active #et_top_search_mob #et_search_icon" , function(event){
    console.log("added");
    $( ".et-search-form" ).submit();
  });

  $("#dm-header #et_top_search_mob .close").on('touchstart click', function(event) {
          $("#dm-header #et_top_search_mob").removeClass("active");
          $("body").removeClass("search-active");
  });

  <?php
}

if ($divi_mobile_custom_header_fixed == "1") {
  ?>
  $("body").addClass("dm-fixed-scroll");
  <?php
} else {
  ?>
  $("body").addClass("dm-not-fixed-scroll");
  <?php
}
   ?>

function check_from_top(){
  var scroll = $(window).scrollTop();
  if (scroll >= 300) {
      $("#dm-header").addClass("fixed-header");
      $("body").addClass("dm-fixed-header");
  }
  else {
  $("#dm-header").removeClass("fixed-header");
  $("body").removeClass("dm-fixed-header");
  }

    if (scroll >= 50) {
      $(".dm-not-fixed-scroll #dm-header #et_top_search_mob").removeClass("active");
      $("body.dm-not-fixed-scroll").removeClass("search-active");
    }
}

check_from_top();

$(window).scroll(function() {
check_from_top();
});

});
</script>
<?php

}
add_action('wp_footer', 'divi_mobile_custom_header_js');

 ?>
