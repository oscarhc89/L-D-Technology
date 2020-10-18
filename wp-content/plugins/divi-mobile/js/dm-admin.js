jQuery(document).ready(function ($) {

   $(window).on('load', function () {


      var divi_mobile_mobile_preview = $("#customize-control-divi-mobile-menu_divi_mobile_mobile_preview select").val();

      var layout_style = $("#customize-control-divi-mobile-menu_set_mobile_menu_layout select").val();
      var expand_layout = $("#customize-control-divi-mobile-menu_expand_shape_style select").val();
      var off_canvas_layout = $("#customize-control-divi-mobile-menu_off_canvas_style select").val();

      var header_logo_position = $("#customize-control-divi-mobile-menu_divi_mobile_custom_header_logo_position select").val();
      var header_cart_icon_position = $("#customize-control-divi-mobile-menu_divi_mobile_custom_header_cart_icon_position select").val();
      var header_search_icon_position = $("#customize-control-divi-mobile-menu_divi_mobile_custom_header_search_icon_position select").val();


      $("iframe").contents().find("body").addClass("dm-ch-logo-pos-" + header_logo_position);
      $("iframe").contents().find("body").addClass("dm-ch-cart-icon-pos-" + header_cart_icon_position);
      $("iframe").contents().find("body").addClass("dm-ch-search-icon-pos-" + header_search_icon_position);

      $("body").addClass(divi_mobile_mobile_preview);
      $("body").addClass(layout_style);
      $("body").addClass(off_canvas_layout);
      $("body").addClass(expand_layout);

   });


   $(document).on("click", "#accordion-panel-divi-mobile-menu_divi-mobile", function () {
      $("body").addClass("editing-dm");
   });
   $(document).on("click", ".customize-panel-back", function () {
      $("body").removeClass("editing-dm");
   });


   $(document).on('change', '#customize-control-divi-mobile-menu_set_mobile_menu_layout select', function () {
      $("body").removeClass("off-canvas");
      $("body").removeClass("expand-shape");
      $("body").removeClass("bottom-nav");
      $("body").removeClass("circle-stretch");
      $("body").addClass(this.value);


      var layout_style = $("#customize-control-divi-mobile-menu_set_mobile_menu_layout select").val();
      var expand_layout = $("#customize-control-divi-mobile-menu_expand_shape_style select").val();
      if (layout_style === "expand-shape") {
         $("body").addClass("expand-shape");
         if (expand_layout === "circle-stretch") {
            $("body").addClass("circle-stretch");
         }
      }
   });

   $(document).on('change', '#customize-control-divi-mobile-menu_expand_shape_style select', function () {
      $("body").removeClass("circle-stretch");
      $("body").addClass(this.value);
   });


   $(document).on('change', '#customize-control-divi-mobile-menu_divi_mobile_mobile_preview select', function () {
      $("body").removeClass("dm-mobile");
      $("body").removeClass("dm-tablet");
      $("body").removeClass("dm-desktop");
      $("body").addClass(this.value);

   });


});
