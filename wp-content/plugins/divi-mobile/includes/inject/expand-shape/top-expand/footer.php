<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function divi_mobile_menu_js() {
?>


<script>
(function() {

	var bodyEl = document.body,
		content = document.getElementById( 'et-main-area' ),
		openbtn = document.getElementById( 'open-button' ),
		closebtn = document.getElementById( 'close-button' ),
		isOpen = false;

	function init() {
		initEvents();
	}

	function initEvents() {
		openbtn.addEventListener( 'click', toggleMenu );
		if( closebtn ) {
			closebtn.addEventListener( 'click', toggleMenu );
		}

		// close the menu element if the target it´s not the menu element or one of its descendants..
		content.addEventListener( 'click', function(ev) {
			var target = ev.target;
			if( isOpen && target !== openbtn ) {
				toggleMenu();
			}
		} );
	}

	function toggleMenu() {
		if( isOpen ) {
			classie.remove( bodyEl, 'show-menu' );
				classie.remove( openbtn, 'is-active' );
		}
		else {
			classie.add( bodyEl, 'show-menu' );
				classie.add( openbtn, 'is-active' );
		}
		isOpen = !isOpen;
	}

	init();

})();
</script>

<script>

var btn = document.getElementById( 'open-button' );
var nav = document.getElementById('dm_nav');

btn.addEventListener('click', function() {
    nav.classList.toggle('active');
});

jQuery(document).ready(function( $ ) {
$("body").addClass("bc-expand-top");
});
</script>

<?php
}
add_action('wp_footer', 'divi_mobile_menu_js');
 ?>
