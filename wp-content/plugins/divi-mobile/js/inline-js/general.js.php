<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_general_js() {

?>
<script type="text/javascript">
jQuery(document).ready(function( $ ) {

<?php
$titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$divi_mobile_menu__position = $titan->getOption( 'divi_mobile_menu__position' );
$set_mobile_menu_layout = $titan->getOption( 'set_mobile_menu_layout' );
$off_canvas_style = $titan->getOption( 'off_canvas_style' );
$expand_shape_style = $titan->getOption( 'expand_shape_style' );
$set_mobile_menu_side_appear = $titan->getOption( 'set_mobile_menu_side_appear' );
$divi_mobile_custom_header = $titan->getOption( 'divi_mobile_custom_header' );

if ($divi_mobile_custom_header == "enabled") {
?>
$("body").addClass("dm-custom-header");
<?php
}
?>
$("body").addClass("dm-bm-pos-<?php echo esc_html( $divi_mobile_menu__position ) ?>");
$("body").addClass("dm-<?php echo esc_html( $set_mobile_menu_layout ) ?>");
$("body").addClass("dm-<?php echo esc_html( $off_canvas_style ) ?>");
$("body").addClass("dm-<?php echo esc_html( $expand_shape_style ) ?>");
$("body").addClass("dm-menuside-<?php echo esc_html( $set_mobile_menu_side_appear ) ?>");

$(".menu-item").click(function(){
if ($(this).hasClass("anchorpoint")) {
$('#open-button').trigger('click');
}
if ( $(this).find('a[href*="#"]').not('[href="#"]').not('[href="#0"]').length ) {
    var target = $(this).find('a[href*="#"]');
    var target_link = target.attr('href');
    $('html, body').animate({
        scrollTop: $(target_link).offset().top
    }, 1000);
}

});

});
</script>
<?php

}
add_action('wp_footer', 'divi_mobile_general_js');

 ?>
