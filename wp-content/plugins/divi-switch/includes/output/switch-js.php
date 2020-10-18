<?php
/*
This file contains code based on and/or copied from Divi by Elegant Themes - see ../../functions.php for full credit
This file modified by Jonathan Hall, Ben Hussenet, Anna Kurowska, Dominika Rauk and Stephen James
Last modified 2020-08-18
*/

echo "jQuery(document).ready(function($){";

// ----- CLICK TO CALL --------
if (et_get_option('swtch-header-3') == 'on') { ?>
    $unformattednum = $('#et-info-phone').text();
    $formattednum = $unformattednum.replace(/-|\s/g,"");
    $("#et-info-phone").wrapInner("<a href=tel:" + $formattednum + "></a>");
    <?php
}

// ----- Open Social Media Links In New Tab --------
if (et_get_option('swtch-header-4') == 'on') { ?>

    $('.et-social-icon a').attr('target','_blank');


<?php }

// ----- Different Logo On Scroll --------
$option = et_get_option('swtch-header-6');
// Re-written based on version of switch in DS 3.0.0
if (!empty($option)) { ?>
    // This switch contains code copied from WP and Divi Icons Pro by Aspen Grove Studios and modified
    var MO = window.MutationObserver ? window.MutationObserver : window.WebkitMutationObserver;
    if (MO) {
    var $header = $('#main-header');
    var $logo = $header.find('#logo');
    var logoOriginalSrc = $logo.attr('src');
    (new MO(function(events) {
    $logo.attr('src', $header.hasClass('et-fixed-header') ? '<?php echo(esc_url($option)); ?>' : logoOriginalSrc);
    })).observe($header[0], {attributes: true});
    }
    <?php
}

// ----- Collapsible submenus

if (et_get_option('swtch-mobile-8') == 'on') { ?>
    function ds_setup_collapsible_submenus() {
    var $menu = $('.et_mobile_menu'),
    top_level_link = '.et_mobile_menu .menu-item-has-children > a';

    $menu.find('a').each(function() {
    $(this).off('click');

    if ( $(this).is(top_level_link) ) {
    $(this).attr('href', '#');
    }

    if ( ! $(this).siblings('.sub-menu').length ) {
    $(this).on('click', function(event) {
    $(this).parents('.mobile_nav').trigger('click');
    });
    } else {
    $(this).on('click', function(event) {
    event.preventDefault();
    $(this).parent().toggleClass('visible');
    });
    }
    });
    }

    $(window).load(function() {
    setTimeout(function() {
    ds_setup_collapsible_submenus();
    }, 700);
    });

    <?php
}

if (et_get_option('swtch-main-2') == 'on') {
    ?>
    var $preloader = $('.ds_preloader');
    var preloaderTime = 0;
    var removePreloaderInterval = setInterval(function() {
    preloaderTime += 200;
    if ($preloader.css('opacity') == 0 || preloaderTime >= 4000) {
    clearInterval(removePreloaderInterval);
    $preloader.remove();
    }
    },200);
    <?php
}
// Stop the footer floating on empty pages

if (et_get_option('swtch-footer-3') == 'on') {
    ?>

    function stickyFooter(){
    var footer = $("footer:first");
	if ( footer.length ) {
    var position = footer.position();
    var height = $(window).height();
    height = height - position.top;
    height = height - footer.outerHeight();
    if (height > 0) {
    footer.css({'margin-top' : height+'px'});
    }
	}
    }
    stickyFooter();
    $(window).resize(function(){
    stickyFooter();
    });

    <?php
}

// ----- Header link styles

if (et_get_option('swtch-header-hover-switch') == 'on') {
    $hoverType = et_get_option('swtch-header-hover-type');
    $hoverCurrentItem = et_get_option('swtch-header-hover-active_item');
    $hoverHeight = et_get_option('swtch-header_border_height');
    ?>
    var menuItem = $('#top-menu > li > a');
    var menuItemBottomPadding = menuItem.innerHeight() - menuItem.height();
    var menuItemBorderHeight = <?php echo (double) $hoverHeight; ?>

    var menuItemOffset = (menuItemBottomPadding * 65) / 100;
    var menuItemBottomValue = Math.abs(menuItemBottomPadding - menuItemOffset + menuItemBorderHeight);

    <?php
    if (($hoverType == 'style_2') OR ($hoverType == 'style_4')) { ?>

        var css = "#top-menu > li:not(.menu-item-has-children) > a:before { top: " + ( - menuItemBottomValue ) + "px; }";
        css += "#top-menu > li:not(.menu-item-has-children) > a:after { bottom: " + ( menuItemBottomPadding - menuItemBottomValue ) + "px; }";

    <?php }

    if ($hoverType == 'style_5') { ?>

        var css = "#top-menu > li:not(.menu-item-has-children) > a:hover:before { top: " + ( - menuItemBottomValue) + "px; }";
        css += "#top-menu > li:not(.menu-item-has-children) > a:hover:after { bottom: " + ( menuItemBottomPadding - menuItemBottomValue ) + "px; }";

        <?php if ($hoverCurrentItem == 'on') { ?>

            css += "#top-menu > li:not(.menu-item-has-children).current-menu-item > a:before { top: " + ( - menuItemBottomValue ) + "px; }";
            css += "#top-menu > li:not(.menu-item-has-children).current_page_item > a:after { bottom: " +  ( menuItemBottomPadding - menuItemBottomValue ) + "px; }";

        <?php } ?>

    <?php }

    if ($hoverType == 'style_6') { ?>

        var menuItemBottomValue = Math.abs(menuItem.height() + menuItemBorderHeight);
        var menuItemHorizontalPosition = (menuItemBorderHeight + menuItemBorderHeight + 20);

        var css = "#top-menu > li:not(.menu-item-has-children) > a:hover:before { top: " + ( - menuItemBottomValue ) + "px; left: " + ( - menuItemHorizontalPosition ) + "px;  }";
        css += "#top-menu > li:not(.menu-item-has-children) > a:hover:after { bottom: " + ( menuItemBottomPadding - menuItemBottomValue ) + "px;  right: " + ( - menuItemHorizontalPosition ) + "px; }";

        <?php if ($hoverCurrentItem == 'on') { ?>

            css += "#top-menu >  li:not(.menu-item-has-children).current-menu-item > a:before { top: " + ( - menuItemBottomValue ) + "px; left: " + ( - menuItemHorizontalPosition ) + "px; }";
            css += "#top-menu > li:not(.menu-item-has-children).current-menu-item > a:after { bottom: " + ( menuItemBottomPadding - menuItemBottomValue ) + "px; right: " + ( - menuItemHorizontalPosition ) + "px; }";

        <?php } ?>

    <?php } ?>

    function ds_divi_switch_add_css(css) {
        var $style = jQuery('#ds-divi-switch-js-css');
        if (!$style.length) {
            $style = jQuery('<style id="ds-divi-switch-js-css">').appendTo('head');
        }
        $style.append(css);
    }

    if(typeof css !== 'undefined') {
        ds_divi_switch_add_css(css);
    }
    <?php
}

echo "});";
