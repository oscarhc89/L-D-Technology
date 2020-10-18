<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_sub_menu_overlap_js() {

?>
<script type="text/javascript">
(function($) {
$("body").addClass("sidebyside-submenu");

$(".menu-wrap__inner .menu-item-has-children:first").addClass("visible");

    function setup_collapsible_submenus() {
        var $menu = $('#dm_nav'),
            top_level_link = '.menu-wrap__inner .menu-item-has-children > a';


        $menu.find('a').each(function() {


            $(this).off('touchstart click');

            if ( $(this).is(top_level_link) ) {
                $(this).attr('href', '#');
            }

            if ( ! $(this).siblings('.sub-menu').length ) {
                $(this).on('touchstart click', function(event) {
                    $(this).parents('.mobile_nav').trigger('click');
                });
            } else {

if ($(window).width() < 980) {
              var touchmoved;
              $(this).on('touchend', function(e){
                console.log('touched');
                  if(touchmoved != true){
                      event.preventDefault();
                      $(".menu-wrap__inner .menu-item-has-children").removeClass("visible");
                      $(this).parent().toggleClass('visible');
                  }
              }).on('touchmove', function(e){
                  touchmoved = true;
              }).on('touchstart', function(){
                  touchmoved = false;
              });
} else {
  $(this).on('touchstart click', function(event) {
      event.preventDefault();
      $(".menu-wrap__inner .menu-item-has-children").removeClass("visible");
      $(this).parent().toggleClass('visible');
  });
}

            }



        });
    }

    $(window).load(function() {
        setTimeout(function() {
            setup_collapsible_submenus();
        }, 700);
    });

})(jQuery);
</script>
<?php

}
add_action('wp_footer', 'divi_mobile_sub_menu_overlap_js');

 ?>
