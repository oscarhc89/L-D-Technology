<?php
/*
 * This file contains code based on and/or copied from Divi by Elegant Themes - see ../../functions.php for full credit
 * This file modified by Jonathan Hall, Ben Hussenet, Stephen James, Anna Kurowska, and Dominika Rauk
 * Last modified 2020-08-14
 *
 */

$ds_color_dark = get_option('ds_default_color_dark', '#303030');
$ds_color_light = get_option('ds_default_color_light', '#F1F1F1');

if (et_get_option('swtch-header-1') == 'on') { ?>
    #main-header,
    #main-header.et-fixed-header { box-shadow: none; }
    <?php
}

if (et_get_option('swtch-header-2') == 'on') { ?>

    @media only screen and (min-width: 980px) {

    #et_mobile_nav_menu {
    display: block;
    }

    #top-menu-nav {
    display: none;
    }

    .et_mobile_menu li li {
    padding-left: 2%;
    }

    #main-header .et_mobile_menu li ul, .et_pb_fullwidth_menu .et_mobile_menu li ul {
    padding-left: 0px;
    }

    .et_mobile_menu li a {
    padding: 1.5% 2.5%;
    }

    .et_mobile_menu {
    padding: 0;
    }

    #mobile_menu {
    overflow-y: auto;
    }
    }

    .mobile_menu_bar {
    z-index: 9999;
    }

    .et_header_style_centered #main-header #et-top-navigation #top-menu-nav,
    .et_header_style_split #main-header #et-top-navigation #top-menu .menu-item
    {
    display:none;
    }

    .et_header_style_centered #et_mobile_nav_menu {
    float: none;
    }

    .et_pb_menu--style-inline_centered_logo.et_pb_menu .et_pb_menu__menu nav ul li:not(.et_pb_menu__logo-slot) {
    display:none;
    }

    .et_pb_menu--style-left_aligned.et_pb_menu .et_pb_menu__menu {
    display:none;
    }

    .et_pb_menu--style-centered.et_pb_menu .et_pb_menu__menu {
    display:none;
    }

    .et_pb_menu .et_mobile_nav_menu {
    display:block;
    }

    .et_pb_menu.et_pb_menu--style-left_aligned .et_mobile_nav_menu {
    margin: 9px 0px;
    }


    <?php
}

if (et_get_option('swtch-header-5') == 'on') { ?>
    #et-info { text-align: center;width: 100%; }
    <?php
}

if (!empty(et_get_option('swtch-header-7'))) { ?>
    .ds_select_page_dark .mobile_menu_bar:after {
    content: "<?php echo esc_html(et_get_option('swtch-header-7')); ?> ";
    color: #ffffff;
    }
    <?php
}

if (et_get_option('swtch-footer-1') == 'on') { ?>
    #footer-widgets .footer-widget li:before {display: none!important;}
    #footer-widgets .footer-widget li {padding: 0 0 10px 0px;}
    .et-l--footer ul {  list-style-type: none; padding-left: 0px; }
    <?php
}

if (et_get_option('swtch-footer-2') == 'on') { ?>
    #footer-bottom { display: none; }
    <?php
}


$option = et_get_option('swtch-footer-4');
if (!empty($option)) {
    ?>
    #main-footer .et_pb_section { background-color: transparent; }
    #footer-widgets { display: none; }
    <?php
}

if (et_get_option('swtch-main-1') == 'on') { ?>
    #main-content .container:before { width: 0; }
    <?php
}
// - Homepage preloader
if (et_get_option('swtch-main-2') == 'on') {
    $transitionType = et_get_option('swtch-main-2-1');
    $colors = explode('|', et_get_option('swtch-main-2-4'));

    ?>

    .ds_preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: <?php echo(empty($colors[1]) ? '#010101' : esc_html($colors[1])); ?>;
    z-index: 999999;
    text-align: center;
    -webkit-animation: ds_preload_transition 1400ms linear forwards;
    -o-animation: ds_preload_transition 1400ms linear forwards;
    animation: ds_preload_transition 1400ms linear forwards;
    animation-delay: 2000ms;
    }

    /* SPINNER */
    .ds_spinner {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    }
    .ds_spinner.spinner_stroke {
    stroke:<?php echo(empty($colors[0]) ? '#fff' : esc_html($colors[0])); ?> !important;
    }
    .ds_spinner.spinner_fill {
    fill: <?php echo(empty($colors[0]) ? '#fff' : esc_html($colors[0])); ?>  !important;
    }

    <?php if (et_get_option('swtch-main-2-2') == 'spinning-circles') { ?>
        .spinner_spinning_circles {
        stroke:<?php echo(empty($colors[0]) ? '#fff' : esc_html($colors[0])); ?> !important;
        }
        .spinner_spinning_circles circle {
        fill: <?php echo(empty($colors[0]) ? '#fff' : esc_html($colors[0])); ?>  !important;
        }
    <?php } ?>

    <?php
    for ($i = 1; $i >= 0; --$i) {
        ?>
        @<?php if ($i) echo('-webkit-'); ?>keyframes ds_preload_transition {
        <?php
        switch ($transitionType) {
            case 'slide-l': ?>
                0% { left: 0; display: block; opacity: 1; }
                99% { left: -100%; display: block; opacity: 1; }
                100% { left: -100%; display: none; opacity: 0; }
                <?php break;
            case 'slide-r': ?>
                0% { left: 0; display: block; opacity: 1; }
                99% { left: 100%; display: block; opacity: 1; }
                100% { left: 100%; display: none; opacity: 0; }
                <?php break;
            case 'slide-u': ?>
                0% { top: 0; display: block; opacity: 1; }
                99% { top: -100%; display: block; opacity: 1; }
                100% { top: -100%; display: none; opacity: 0; }
                <?php break;
            case 'slide-d': ?>
                0% { top: 0; display: block; opacity: 1; }
                99% { top: 100%; display: block; opacity: 1; }
                100% { top: 100%; display: none; opacity: 0; }
                <?php break;
            case 'slide-ul': ?>
                0% { left: 0; top: 0; display: block; opacity: 1; }
                99% { left: -100%; top: -100%; display: block; opacity: 1; }
                100% { left: -100%; top: -100%; display: none; opacity: 0; }
                <?php break;
            case 'slide-ur': ?>
                0% { left: 0; top: 0; display: block; opacity: 1; }
                99% { left: 100%; top: -100%; display: block; opacity: 1; }
                100% { left: 100%; top: -100%; display: none; opacity: 0; }
                <?php break;
            case 'slide-dl': ?>
                0% { left: 0; top: 0; display: block; opacity: 1; }
                99% { left: -100%; top: 100%; display: block; opacity: 1; }
                100% { left: -100%; top: 100%; display: none; opacity: 0; }
                <?php break;
            case 'slide-dr': ?>
                0% { left: 0; top: 0; display: block; opacity: 1; }
                99% { left: 100%; top: 100%; display: block; opacity: 1; }
                100% { left: 100%; top: 100%; display: none; opacity: 0; }
                <?php break;
            case 'rotate': ?>
                0% { display: block; opacity: 1; -webkit-transform: rotate(0deg) scale(1); transform: rotate(0deg) scale(1); }
                99% { display: block; opacity: 0; -webkit-transform: rotate(360deg) scale(0.1); transform: rotate(360deg) scale(0.1); }
                100% { display: none; opacity: 0; -webkit-transform: rotate(360deg) scale(0.1); transform: rotate(360deg) scale(0.1); }
                <?php break;
            case 'round': ?>
                0% { display: block; opacity: 1; border-radius: 0; -webkit-transform: scale(1); transform: scale(1); }
                99% { display: block; opacity: 0; border-radius: 100%; -webkit-transform: scale(0.2); transform: scale(0.2); }
                100% { display: none; opacity: 0; border-radius: 100%; -webkit-transform: scale(0.2); transform: scale(0.2); }
                <?php break;
            case 'hinge-bl': ?>
                0% { display: block; -webkit-transform: rotate(0deg); transform: rotate(0deg); -webkit-transform-origin: left bottom; transform-origin: left bottom; opacity: 1; }
                99% { display: block; -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-transform-origin: left bottom; transform-origin: left bottom; opacity: 1; }
                100% { display: block; -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-transform-origin: left bottom; transform-origin: left bottom; opacity: 0; }
                <?php break;
            case 'hinge-tl': ?>
                0% { display: block; -webkit-transform: rotate(0deg); transform: rotate(0deg); -webkit-transform-origin: left top; transform-origin: left top; opacity: 1; }
                99% { display: block; -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-transform-origin: left top; transform-origin: left top; opacity: 1; }
                100% { display: block; -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-transform-origin: left top; transform-origin: left top; opacity: 0; }
                <?php break;
            case 'hinge-br': ?>
                0% { display: block; -webkit-transform: rotate(0deg); transform: rotate(0deg); -webkit-transform-origin: right bottom; transform-origin: right bottom; opacity: 1; }
                99% { display: block; -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-transform-origin: right bottom; transform-origin: right bottom; opacity: 1; }
                100% { display: block; -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-transform-origin: right bottom; transform-origin: right bottom; opacity: 0; }
                <?php break;
            case 'hinge-tr': ?>
                0% { display: block; -webkit-transform: rotate(0deg); transform: rotate(0deg); -webkit-transform-origin: right top; transform-origin: right top; opacity: 1; }
                99% { display: block; -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-transform-origin: right top; transform-origin: right top; opacity: 1; }
                100% { display: block; -webkit-transform: rotate(90deg); transform: rotate(90deg); -webkit-transform-origin: right top; transform-origin: right top; opacity: 0; }
                <?php break;
            default: ?>
                0% { display: block; opacity: 1; }
                99% { display: block; opacity: 0; }
                100% { display: none; opacity: 0; }
            <?php } ?>
        }

        <?php
    }
}// - Homepage preloader

if (et_get_option('swtch-header-hover-switch') == 'on') {
    $hoverType = et_get_option('swtch-header-hover-type');
    $hoverCurrentItem = et_get_option('swtch-header-hover-active_item');
    $hoverHeight = et_get_option('swtch-header_border_height');

    // If border height is larger than 11px set default height for fixed menu
    if ($hoverHeight >= 11) {
        $fixedMenuHoverHeight = 4;
    } else {
        $fixedMenuHoverHeight = $hoverHeight;
    }

    ?>

    <?php if ($hoverType == 'style_1') { ?>

        #top-menu > li > a:before {
        bottom: 0;
        left:0;
        display: block;
        height: <?php echo (double) $hoverHeight ?>px;
        width: 0%;
        content: "";
        background-color: <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        position: absolute;
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
        }
        #top-menu > li > a:hover:before {
        width: 100%;
        }

        .et_vertical_nav #top-menu > li > a:before {
        bottom: 10px;
        }

        .et-fixed-header #top-menu > li > a:before {
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }

        <?php if ($hoverCurrentItem == 'on') { ?>
            #top-menu > li.current-menu-item > a:before, #top-menu > li.current_page_item > a:before  {
            width: 100%;
            }
        <?php } ?>
    <?php } ?>

    <?php if ($hoverType == 'style_2') { ?>

        #top-menu > li:not(.menu-item-has-children) > a:before,
        #top-menu > li:not(.menu-item-has-children) > a:after {
        height: <?php echo (double) $hoverHeight ?>px;
        position: absolute;
        content: '';
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
        background-color: <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        width: 0;
        }

        #top-menu > li:not(.menu-item-has-children) > a:before {
        left: 0;
        }
        #top-menu > li:not(.menu-item-has-children) > a:after {
        right: 0 !important;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:before {
        top: -12px;
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:after {
        bottom: 8px;
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }

        #top-menu > li:not(.menu-item-has-children) > a:hover:before,
        #top-menu > li:not(.menu-item-has-children) > a:hover:after {
        width: 100%;
        }

        <?php if ($hoverCurrentItem == 'on') { ?>
            #top-menu >  li:not(.menu-item-has-children).current-menu-item > a:before,
            #top-menu > li:not(.menu-item-has-children).current-menu-item > a:after {
            width: 100%;
            }
        <?php } ?>
    <?php } ?>

    <?php if ($hoverType == 'style_3') { ?>

        #top-menu > li > a:before {
        bottom: 5px;
        left:0;
        display: block;
        height: <?php echo (double) $hoverHeight ?>px;
        width: 100%;
        opacity: 0;
        content: "";
        background-color: <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        position: absolute;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        }
        #top-menu > li > a:hover:before {
        opacity: 1;
        bottom: 15%;
        }

        .et-fixed-header #top-menu > li > a:before {
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }

        <?php if ($hoverCurrentItem == 'on') { ?>
            #top-menu > li.current-menu-item > a:before {
            opacity: 1;
            bottom: 15%;
            }
        <?php } ?>
    <?php } ?>

    <?php if ($hoverType == 'style_4') { ?>

        #top-menu > li:not(.menu-item-has-children) > a:before,
        #top-menu > li:not(.menu-item-has-children) > a:after {
        height: <?php echo (double) $hoverHeight ?>px;
        position: absolute;
        content: '';
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
        background-color: <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        width: 100%;
        opacity: 0;
        }

        #top-menu > li:not(.menu-item-has-children) > a:before {
        left: 0;
        }
        #top-menu > li:not(.menu-item-has-children) > a:after {
        right: 0 !important;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:before {
        top: -12px;
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:after {
        bottom: 8px;
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }

        #top-menu > li:not(.menu-item-has-children) > a:hover:before,
        #top-menu > li:not(.menu-item-has-children) > a:hover:after {
        opacity: 1;
        }

        <?php if ($hoverCurrentItem == 'on') { ?>
            #top-menu >  li.current-menu-item > a:before,
            #top-menu > li.current-menu-item > a:after {
            opacity: 1 !important;
            }
        <?php } ?>

    <?php } ?>
    <?php if ($hoverType == 'style_5') { ?>

        #top-menu > li:not(.menu-item-has-children) > a:before,
        #top-menu > li:not(.menu-item-has-children) > a:after {
        height: <?php echo (double) $hoverHeight ?>px;
        position: absolute;
        content: '';
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
        background-color: <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        width: 100%;
        opacity: 0;
        }

        #top-menu > li:not(.menu-item-has-children) > a:before {
        top: 30%;
        left: 0;
        }
        #top-menu > li:not(.menu-item-has-children) > a:after {
        bottom: 70%;
        right: 0 !important;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:before {
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }
        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:hover:before {
        top: -12px;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:after {
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }
        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:hover:after {
        bottom:  8px;
        }

        #top-menu > li:not(.menu-item-has-children) > a:hover:before,
        #top-menu > li:not(.menu-item-has-children) > a:hover:after {
        opacity: 1;
        }

        <?php if ($hoverCurrentItem == 'on') { ?>
            #top-menu > li:not(.menu-item-has-children).current-menu-item > a:before,
            #top-menu > li:not(.menu-item-has-children).current_page_item > a:after  {
            opacity: 1 !important;
            }
            .et-fixed-header #top-menu > li:not(.menu-item-has-children).current-menu-item > a:before {
            top: -10px;
            }
            .et-fixed-header #top-menu > li:not(.menu-item-has-children).current-menu-item > a:after {
            bottom: 8px;
            }
        <?php } ?>
    <?php } ?>

    <?php if ($hoverType == 'style_6') { ?>

        #top-menu > li:not(.menu-item-has-children) > a:before,
        #top-menu > li:not(.menu-item-has-children) > a:after {
        height: 14px;
        width: 14px;
        position: absolute;
        content: '';
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
        opacity: 0;
        }

        #top-menu > li:not(.menu-item-has-children) > a:before {
        border-left: <?php echo (double) $hoverHeight ?>px solid <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        border-top: <?php echo (double) $hoverHeight ?>px solid <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        top: 0;
        left: -15px;
        -webkit-transform: translate(100%, 50%);
        transform: translate(100%, 50%);
        }
        #top-menu > li:not(.menu-item-has-children) > a:after {
        bottom: 65%;
        right: -17px;
        border-right: <?php echo (double) $hoverHeight ?>px solid <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        border-bottom: <?php echo (double) $hoverHeight ?>px solid <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        -webkit-transform: translate(-100%, -50%);
        transform: translate(-100%, -50%);
        }

        #top-menu > li:not(.menu-item-has-children) > a:hover:before,
        #top-menu > li:not(.menu-item-has-children) > a:hover:after {
        opacity: 1;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:before {
        border-left-width: <?php echo (double) $fixedMenuHoverHeight ?>px;
        border-top-width: <?php echo (double) $fixedMenuHoverHeight ?>px;
        top: -15px;
        left: -25px;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:after {
        border-right-width: <?php echo (double) $fixedMenuHoverHeight ?>px;
        border-bottom-width: <?php echo (double) $fixedMenuHoverHeight ?>px;
        bottom: 0;
        right: 0;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:hover:after {
        bottom: 2px;
        right: -25px;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:before {
        top: 0;
        left: 0;
        }

        .et-fixed-header #top-menu > li:not(.menu-item-has-children) > a:hover:before {
        top: -20px;
        left: -30px;
        }

        <?php if ($hoverCurrentItem == 'on') { ?>
            #top-menu >  li:not(.menu-item-has-children).current-menu-item > a:before,
            #top-menu > li:not(.menu-item-has-children).current-menu-item > a:after {
            opacity: 1 !important;
            }

            .et-fixed-header #top-menu > li:not(.menu-item-has-children).current-menu-item > a:before {
            top: -20px;
            left: -30px;
            }

            .et-fixed-header #top-menu > li:not(.menu-item-has-children).current-menu-item > a:after {
            bottom: 0;
            right: -30px;
            }
        <?php } ?>
    <?php } ?>

    <?php if ($hoverType == 'style_7') { ?>

        #top-menu > li:not(.menu-item-has-children) > a:before {
        left: 20%;
        right: 20%;
        top: 7px;
        content: '';
        border-left: 10px solid <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        border-right: 10px solid <?php echo et_sanitize_alpha_color( et_get_option('swtch-header-hover-color') ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- color is sanitized ?>;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        height: <?php echo (double) $hoverHeight ?>px;
        opacity: 0;
        position: absolute;
        -webkit-transition: all 0.35s ease;
        transition: all 0.35s ease;
        }

        #top-menu > li:not(.menu-item-has-children) > a:hover:before {
        left: -15px;
        right: -15px;
        opacity: 1;
        }

        .et_vertical_nav #top-menu > li > a:hover:before {
        right:  15px;
        }

        .et-fixed-header  #top-menu > li:not(.menu-item-has-children) > a:before {
        height: <?php echo (double) $fixedMenuHoverHeight ?>px;
        }

        <?php if ($hoverCurrentItem == 'on') { ?>
            #top-menu >  li.current-menu-item > a:before,
            #top-menu > li.current_page_item > a:before  {
            left: -15px;
            right: -15px;
            opacity: 1 !important;
            }

            .et_vertical_nav #top-menu > li.current_page_item > a:before {
            right:  15px;
            }
        <?php } ?>
    <?php } ?>

<?php }

$option = et_get_option('swtch-main-3');
if (!empty($option)) {
    switch ($option) {
        case 'square':
            ?>
            .et_portfolio_image { padding-top: 100%; }
            .et_portfolio_image img { position: absolute; height: 100%; top: 0; left: 0; right: 0; bottom: 0; object-fit: cover; }
            <?php
            break;
        case 'book':
            ?>
            .et_portfolio_image { padding-top: 150%; }
            .et_portfolio_image img { position: absolute; height: 100%; top: 0; left: 0; right: 0; bottom: 0; object-fit: cover; }
            <?php
            break;
        case 'cinema':
            ?>
            .et_portfolio_image { padding-top: 60%; }
            .et_portfolio_image img { position: absolute; height: 100%; top: 0; left: 0; right: 0; bottom: 0; object-fit: cover; }
            <?php
            break;
    }
}

if (et_get_option('swtch-main-4') == 'on') { ?>
    .et_pb_gallery_image a { pointer-events: none; cursor: default; }
    <?php
}

$option = et_get_option('swtch-main-5');
if (ctype_alpha($option)) { // checking for alphabetic value for security reasons
    ?>
    .et-pb-active-slide .et_pb_slide_description { -webkit-animation-name: <?php echo esc_html($option); ?>; animation-name: <?php echo esc_html($option); ?>; }
    <?php
}

$option = et_get_option('swtch-main-6');
if (ctype_alpha($option)) { // checking for alphabetic value for security reasons
    ?>
    .et-pb-active-slide .et_pb_slide_image, .et-pb-active-slide .et_pb_slide_video { -webkit-animation-name: <?php echo esc_html($option); ?>; animation-name: <?php echo esc_html($option); ?>; }
    <?php
}

$option = et_get_option('swtch-header-7');
if (!empty($option)) { ?>

    .mobile_menu_bar:after {
    content: "<?php echo esc_html($option); ?> ";
    margin-top: -3px;
    }

    .et_header_style_slide .mobile_menu_bar:after  {
    content: "\4d";
    margin-top: 0;
    }

    .mobile_menu_bar {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: row-reverse;
    }

    .et_header_style_centered .mobile_menu_bar {
    justify-content: center;
    }

    .et_header_style_fullscreen .mobile_menu_bar.et_pb_header_toggle {
    display: flex;
    width: auto;
    }

    <?php
}

if (et_get_option('swtch-header-11') == 'on') { ?>
    .home #main-header:not(.et-fixed-header) {
    background-color: transparent;
    box-shadow: none;
    }

    .home #top-header:not(.et-fixed-header) {
    background-color: transparent!important;
    }

    .home #page-container {
    padding-top: 0px!important;
    }
    <?php
}

if (et_get_option('swtch-header-12') == 'on') { ?>
    #main-header:not(.et-fixed-header) {
    background-color: transparent;
    box-shadow: none;
    }

    #top-header:not(.et-fixed-header) {
    background-color: transparent!important;
    }

    #page-container {
    padding-top: 0px!important;
    }
    <?php
}

if (et_get_option('swtch-header-13') == 'on') { ?>
    @keyframes divi-switch-fadein {
    from { opacity: 0; }
    to { opacity: 1; }
    }
    @media only screen and ( min-width: 480px )  { /* fixed only for deviced > 480px, feel free to change the value */
    .divi-switch-fixed-header{
    z-index: 999; /* display at the top */
    position: fixed;
    width: 100%;
    top: 0;
    -webkit-animation: divi-switch-fadein 1s ease-in;
    -moz-animation: divi-switch-fadein 1s ease-in;
    animation: divi-switch-fadein 1s ease-in;
    }
    }
    @media only screen and ( min-width: 782px )  {
    .admin-bar .divi-switch-fixed-header {
    top: 32px;
    }}

    <?php
}


if (et_get_option('swtch-mobile-8') == 'on') { ?>
    .et_pb_menu .et_mobile_menu .menu-item-has-children > a, #main-header .et_mobile_menu .menu-item-has-children > a {
    background-color: transparent;
    position: relative;
    }
    .et_pb_menu .et_mobile_menu .menu-item-has-children > a:after, #main-header .et_mobile_menu .menu-item-has-children > a:after {
    font-family: 'ETmodules';
    text-align: center;
    speak: none;
    font-weight: 600;
    font-variant: normal;
    text-transform: none;
    -webkit-font-smoothing: antialiased;
    position: absolute;
    font-size: 18px;
    content: '\4c';
    top: 11px;
    right: 13px;
    }

    .et_pb_menu .et_mobile_menu .menu-item-has-children.visible > a:after, #main-header .et_mobile_menu .menu-item-has-children.visible > a:after {
    content: '\4d';
    }
    .et_pb_menu .et_mobile_menu ul.sub-menu, #main-header .et_mobile_menu ul.sub-menu {
    display: none !important;
    visibility: hidden !important;
    transition: all 1.5s ease-in-out;
    }
    .et_pb_menu .et_mobile_menu .visible > ul.sub-menu, #main-header .et_mobile_menu .visible > ul.sub-menu {
    display: block !important;
    visibility: visible !important;
    }
    <?php
}

if (et_get_option('swtch-archve-4') == 'on') { ?>
    .ds_post_separator {
    width: 100%;
    height: 1px;
    background-color: #e2e2e2;
    margin:10px auto;
    display:block;
    }
    <?php
}

$option = get_option('ds_et_icon_picker');
if (!empty($option)) {
    ?>
    .mobile_menu_bar::before {
    content: "\<?php echo esc_html($option); ?>";
    }
    <?php
}

$option = get_option('ds_header_bg');
if (!empty($option)) {
    ?>
    #main-header {
    background-image: url("<?php echo esc_html($option); ?>");
    }
    <?php
}

$option = get_option('ds_header_bg_repeat');
if (!empty($option)) {
    ?>
    #main-header {
    background-repeat: <?php echo esc_html($option); ?>;
    }
    <?php
}

$option = get_option('ds_header_bg_position');
if (!empty($option)) {
    ?>
    #main-header {
    background-position: <?php echo esc_html($option); ?>;
    }
    <?php
}

$option = get_option('ds_header_bg_size');
if (!empty($option)) {
    ?>
    #main-header {
    background-size: <?php echo esc_html($option); ?>;
    }
    <?php
}

$option = get_option('ds_btt_button_icon_size');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon { font-size: <?php echo (int)$option; ?>px; }
    <?php
}

$option = get_option('ds_btt_button_position_right');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon { right: <?php echo (int)$option; ?>px; }
    <?php
}

$option = get_option('ds_btt_button_position_bottom');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon { bottom: <?php echo (int)$option; ?>px; }
    <?php
}

$option = get_option('ds_btt_button_curved_edge');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon { border-bottom-left-radius: <?php echo (int)$option; ?>px; border-top-left-radius: <?php echo (int)$option; ?>px; }
    <?php
}

$option = get_option('ds_btt_button_straight_edge');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon { border-bottom-right-radius: <?php echo (int)$option; ?>px; border-top-right-radius: <?php echo (int)$option; ?>px; }
    <?php
}

$option = get_option('ds_btt_button_color');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon { background-color: <?php echo esc_html($option); ?>; }
    <?php
}

$option = get_option('ds_btt_button_icon_color');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon { color: <?php echo esc_html($option); ?>; }
    <?php
}

$option = get_option('ds_btt_button_color_hover');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon:hover { background-color: <?php echo esc_html($option); ?>; }
    <?php
}

$option = get_option('ds_btt_button_icon_color_hover');
if (!empty($option)) {
    ?>
    .et_pb_scroll_top.et-pb-icon:hover { color: <?php echo esc_html($option); ?>; }
    <?php
}

$option = get_option('ds_archve-header-bg');
if (!empty($option)) {
    ?>
    .ds_archive_header { background-color: <?php echo esc_html($option); ?>; }
    <?php
}

$option = get_option('ds_archve-header-padding');
if (!empty($option)) {
    ?>
    .ds_archive_header { padding: <?php echo (int)$option; ?>px; }
    <?php
}

$option = get_option('ds_archve-header-color');
if (!empty($option)) {
    ?>
    .ds_archive_header h1 { color: <?php echo esc_html($option); ?>; }
<?php }

if (et_get_option('swtch-posts-1') == 'on') {
    ?>
    .ds_comments_toggle, .ds_toggle_content {
    margin-top: 30px;
    }
    .ds_toggle_content  {
    display: none;
    }
    .ds_toggle_content #comment-wrap {
    padding-top: 0;
    }
<?php }

?>

    /* Other styles */

    ul.ds-mega-menu {
    max-height: 80vh;
    overflow-y: auto;
    width: 100% !important;
    padding: 0 !important;
    border-top: 0 !important;
    }
    ul.ds-mega-menu li {
    float: none !important;
    width: 100% !important;
    clear: none;
    }

    #ds-mega-menu-items {
    display: none;
    }
<?php


