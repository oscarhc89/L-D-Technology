( function( $ ) {

wp.customize( 'ds_et_icon_picker', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_et_icon_picker'>\
                            .mobile_menu_bar::before {content: '\\"+ to +"';}\
                            </style>",
            style_id = 'style#ds_et_icon_picker';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_header_bg', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_header_bg'>\
                            #main-header {background-image: url("+ to +");}\
                            </style>",
            style_id = 'style#ds_header_bg';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_header_bg_repeat', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_header_bg_repeat'>\
                            #main-header {background-repeat: "+ to +";}\
                            </style>",
            style_id = 'style#ds_header_bg_repeat';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_header_bg_position', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_header_bg_position'>\
                            #main-header {background-position: "+ to +";}\
                            </style>",
            style_id = 'style#ds_header_bg_position';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_header_bg_size', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_header_bg_size'>\
                            #main-header {background-size: "+ to +";}\
                            </style>",
            style_id = 'style#ds_header_bg_size';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_icon_size', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_icon_size'>\
                            .et_pb_scroll_top.et-pb-icon { font-size: " + to + "px; }\
                            </style>",
            style_id = 'style#ds_btt_button_icon_size';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_position_right', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_position_right'>\
                            .et_pb_scroll_top.et-pb-icon { right: " + to + "px; }\
                            </style>",
            style_id = 'style#ds_btt_button_position_right';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_position_bottom', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_position_bottom'>\
                            .et_pb_scroll_top.et-pb-icon { bottom: " + to + "px; }\
                            </style>",
            style_id = 'style#ds_btt_button_position_bottom';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_curved_edge', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_curved_edge'>\
                            .et_pb_scroll_top.et-pb-icon { border-bottom-left-radius: " + to + "px; border-top-left-radius: " + to + "px; }\
                            </style>",
            style_id = 'style#ds_btt_button_curved_edge';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_straight_edge', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_straight_edge'>\
                            .et_pb_scroll_top.et-pb-icon { border-bottom-right-radius: " + to + "px; border-top-right-radius: " + to + "px; }\
                            </style>",
            style_id = 'style#ds_btt_button_straight_edge';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_color', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_color'>\
        .et_pb_scroll_top.et-pb-icon { background-color: " + to + "; }\
        </style>",
        style_id = 'style#ds_btt_button_color';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_icon_color', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_icon_color'>\
        .et_pb_scroll_top.et-pb-icon { color: " + to + "; }\
        </style>",
        style_id = 'style#ds_btt_button_icon_color';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_color_hover', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_color_hover'>\
        .et_pb_scroll_top.et-pb-icon { transition: .4s ease all }\
        .et_pb_scroll_top.et-pb-icon:hover { background-color: " + to + "; }\
        </style>",
        style_id = 'style#ds_btt_button_color_hover';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_btt_button_icon_color_hover', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_btt_button_icon_color_hover'>\
        .et_pb_scroll_top.et-pb-icon { transition: .4s ease all }\
        .et_pb_scroll_top.et-pb-icon:hover { color: " + to + "; }\
        </style>",
        style_id = 'style#ds_btt_button_icon_color_hover';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );


wp.customize( 'ds_archve-header-bg', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_archve-header-bg'>\
        .ds_archive_header { background: " + to + "; }\
        </style>",
        style_id = 'style#ds_archve-header-bg';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_archve-header-padding', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_archve-header-padding'>\
        .ds_archive_header { padding: " + to + "; }\
        </style>",
        style_id = 'style#ds_archve-header-padding';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_archve-header-color', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_archve-header-color'>\
        .ds_archive_header h1 { color: " + to + "; }\
        </style>",
        style_id = 'style#ds_archve-header-color';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );


wp.customize( 'ds_archve-separator-color', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_archve-separator-color'>\
        .ds_post_separator { background-color: " + to + "; }\
        </style>",
        style_id = 'style#ds_archve-separator-color';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_archve-separator-margin-top', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_archve-separator-margin-top'>\
        .ds_post_separator { margin-top: " + to + "px; }\
        </style>",
        style_id = 'style#ds_archve-separator-margin-top';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_archve-separator-margin-bottom', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_archve-separator-margin-bottom'>\
        .ds_post_separator { margin-bottom: " + to + "px; }\
        </style>",
        style_id = 'style#ds_archve-separator-margin-bottom';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_archve-separator-height', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_archve-separator-height'>\
        .ds_post_separator { height: " + to + "px; }\
        </style>",
        style_id = 'style#ds_archve-separator-height';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );

wp.customize( 'ds_archve-separator-width', function( value ) {
    value.bind( function( to ) {
        var $ds_preview_content = "<style id='ds_archve-separator-width'>\
        .ds_post_separator { width: " + to + "%; }\
        </style>",
        style_id = 'style#ds_archve-separator-width';

        ds_switch_customizer_live_preview( style_id, $ds_preview_content );
    } );
} );



// Add and edit a <style> tag for each live preview. 
function ds_switch_customizer_live_preview( style_id, $ds_preview_content ) {
    if ( $( style_id ).length ) {
        if ( '' !== $ds_preview_content ) {
            $( style_id ).replaceWith( $ds_preview_content );
        } else {
            $( style_id ).remove();
        }
    } else {
        $( 'head' ).append( $ds_preview_content );
    }
}


} )( jQuery );