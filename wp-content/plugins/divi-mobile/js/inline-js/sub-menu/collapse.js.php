<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_sub_menu_collapse_js() {
$titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$disable_parent_clickthrough = $titan->getOption( 'disable_parent_clickthrough' );

?>
<script type="text/javascript">
(function($) {

 // $( ".menu-wrap .nav > li" ).each(function() {
//    if ($(this).hasClass("current-menu-ancestor")) {
 //        $( this ).addClass( "visible" );
//  }
// });

$("body").addClass("collapse-submenu");

    function dm_setup_collapsible_submenus() {
        var $menu = $('#dm_nav'),
            top_level_link = '.menu-wrap__inner .menu-item-has-children > a';



        $menu.find('a').each(function() {
            $(this).off('touchstart click');

              <?php if ($disable_parent_clickthrough == 1){ ?>
            if ( $(this).is(top_level_link) ) {
                $(this).attr('href', '#');
            }
            <?php } ?>

            if ( ! $(this).siblings('.sub-menu').length ) {
                $(this).on('touchstart click', function(event) {
                // $("#dm-menu.nav li").removeClass('visible');
                    $(this).parents('.mobile_nav').trigger('click');
                });
            } else {

if ($(window).width() < 980) {
              var touchmoved;
              $(this).on('touchend', function(e){
                console.log('touched');
                  if(touchmoved != true){
                      event.preventDefault();
                      $(this).parent().siblings().removeClass('visible');
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
      $(this).parent().siblings().removeClass('visible');
      $(this).parent().toggleClass('visible');
  });
}





            }
        });
    }

    $(window).load(function() {
        setTimeout(function() {
            dm_setup_collapsible_submenus();
        }, 700);
    });

})(jQuery);
</script>
<?php

}
add_action('wp_footer', 'divi_mobile_sub_menu_collapse_js');

 ?>
