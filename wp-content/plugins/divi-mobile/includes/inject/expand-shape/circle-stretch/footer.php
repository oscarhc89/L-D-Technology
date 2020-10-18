<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function divi_mobile_menu_js() {
?>

<script>
jQuery(document).ready(function( $ ) {

$("body").addClass("bc-expand-circle-stretch");

if( $('.bc-stretchy-nav').length > 0 ) {
	var stretchyNavs = $('.bc-stretchy-nav');

	stretchyNavs.each(function(){
		var stretchyNav = $(this),
			stretchyNavTrigger = stretchyNav.find('.menu-button');

		stretchyNavTrigger.on('click', function(event){
			event.preventDefault();
			stretchyNav.toggleClass('nav-is-visible');
		});
	});

	$(document).on('click', function(event){
		( !$(event.target).is('.menu-button') && !$(event.target).is('.menu-button span') ) && stretchyNavs.removeClass('nav-is-visible');
	});
}

});
</script>

<?php
}
add_action('wp_footer', 'divi_mobile_menu_js');
 ?>
