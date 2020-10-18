<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function divi_mobile_sub_menu_collapse_clickthrough_js() {
$titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$disable_parent_clickthrough = $titan->getOption( 'disable_parent_clickthrough' );

?>
<script type="text/javascript">
(function($) {

    function setup_collapsible_submenus() {
        var $menu = $('#dm_nav'),
            top_level_link = '.menu-wrap__inner .menu-item-has-children > a';

    $menu.find('.menu-item-has-children').each(function() {
      $(this).append( "<p class='open-icon'></p>" );
  });

  $menu.find('.open-icon').each(function() {
    if ( ! $(this).siblings('.sub-menu').length ) {
        $(this).on('touchstart click', function(event) {
            event.preventDefault();
            $(this).parents('.mobile_nav').trigger('click');
        });
    } else {
        $(this).on('touchstart click', function(event) {
            event.preventDefault();
            $(this).parent().toggleClass('visible');
        });
    }
        });

        // $menu.find('a').each(function() {
        //     $(this).off('click');
        //
        //     if ( ! $(this).siblings('.sub-menu').length ) {
        //         $(this).on('click', function(event) {
        //             $(this).parents('.mobile_nav').trigger('click');
        //         });
        //     } else {
        //         $(this).on('click', function(event) {
        //         });
        //     }
        // });

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
add_action('wp_footer', 'divi_mobile_sub_menu_collapse_clickthrough_js');

 ?>
