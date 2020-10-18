<?php

function divi_mobile_sub_menu_overlap_js() {

?>
<script type="text/javascript">
(function($) {
$("body").addClass("overlap-submenu");

    function setup_collapsible_submenus() {
        var $menu = $('#dm_nav'),
            top_level_link = '.menu-wrap__inner .menu-item-has-children > a';

            $('.sub-menu').each(function(i, obj) {
                        $(this).append('<span class="close-submenu"></span>');
            });


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
      $(this).parent().toggleClass('visible');
  });
}


            }


               $(document).on('touchstart click', '.close-submenu', function() {
              $(this).closest(".menu-item").removeClass('visible');
            });


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
