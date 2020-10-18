<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function divi_mobile_bottom_nav_menu_js() {
?>

<script>
jQuery(document).ready(function($){
var bottom_height = $(".bottom-navigation-menu").outerHeight();
$("#et-main-area").attr('style',  'padding-bottom:'+ bottom_height + 'px');

});
</script>

<?php
}
add_action('wp_footer', 'divi_mobile_bottom_nav_menu_js');
 ?>
