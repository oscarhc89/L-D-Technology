<?php
/*
This file contains code copied from Divi by Elegant Themes - see ../functions.php for full credit
This file modified by Jonathan Hall, Ben Hussenet, Stephen James, Dominika Rauk and Anna Kurowska
Last modified 2020-09-08
*/
function ds_divi_switch_divi_slap_add_tab($tabs){
    $tabs["swtch_tab"] = esc_html__("Divi Switch","divi-switch");
    return $tabs;
}

add_filter('et_epanel_tab_names','ds_divi_switch_divi_slap_add_tab');


function ds_divi_switch_slap_item_query($post_type){

    // Query the post type provided (et_pb_layout, nav_menu_item)
    $items = new WP_Query( array(
        'post_type'   => $post_type,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_status' => 'publish',
        'cache_results'  => false
    ));

    // Setup the empty array for the query results
    $list_items = array(); 

    // Here we check if the query returned any results
    if($items->have_posts()) {

        // Dropdowns have an empty option to disable the switch
        $list_items[''] = esc_html__('(Disabled)', 'divi-switch');

        // The query returned results so we now add these results to the array
        while( $items->have_posts() ) {
            $items->the_post();
			$itemId = (string) get_the_ID();
			$itemTitle = the_title( '', '', false );
			if (empty($itemTitle)) {
				$itemTitle = '#'.$itemId;
			}
            $list_items['P'.$itemId] = $itemTitle;
        }

    } else {

        // No results returned from the query so we will define a default option so the dropdowns are not empty and thus look broken
        $list_items[''] = esc_html__('No Items', 'divi-switch');
    }

    return $list_items;
}


// Create Subtabs

function ds_divi_switch_slap_add_tab_content($layout_data){

    // Call the item query function and retrieve the Library Layout Items
    $library_layouts = ds_divi_switch_slap_item_query('et_pb_layout');

    // Call the item query function and retrieve the pages
    $pages = ds_divi_switch_slap_item_query('page');

    // Start defining the settings fields
    $layout_data[] = [
        "name" => "wrap-swtch_tab",
        "type" => "contenttab-wrapstart",
    ];

    //Start of Sub tabs
    $layout_data[] = [
        "type" => "subnavtab-start",
    ];

    $isActivated = DiviSwitch::isActivated();

    // Sub tabs

    if ($isActivated) {
        $layout_data[] = [
            "name" => "swtch_tab-1",
            "type" => "subnav-tab",
            "desc" => esc_html__("Header","divi-switch"),
        ];
        $layout_data[] = [
            "name" => "swtch_tab-2",
            "type" => "subnav-tab",
            "desc" => esc_html__("Footer","divi-switch"),
        ];
        $layout_data[] = [
            "name" => "swtch_tab-3",
            "type" => "subnav-tab",
            "desc" => esc_html__("Main Content","divi-switch"),
        ];
        $layout_data[] = [
            "name" => "swtch_tab-4",
            "type" => "subnav-tab",
            "desc" => esc_html__("Mobile","divi-switch"),
        ];
        /*$layout_data[] = [
            "name" => "swtch_tab-5",
            "type" => "subnav-tab",
            "desc" => esc_html__("Modules","divi-switch"),
        ];*/
        $layout_data[] = [
            "name" => "swtch_tab-6",
            "type" => "subnav-tab",
            "desc" => esc_html__("Posts","divi-switch"),
        ];
        $layout_data[] = [
            "name" => "swtch_tab-7",
            "type" => "subnav-tab",
            "desc" => esc_html__("Archives","divi-switch"),
        ];
        $layout_data[] = [
            "name" => "swtch_tab-8",
            "type" => "subnav-tab",
            "desc" => esc_html__("Integration","divi-switch"),
        ];
        $layout_data[] = [
            "name" => "swtch_tab-9",
            "type" => "subnav-tab",
            "desc" => esc_html__("Advanced","divi-switch"),
        ];
        $layout_data[] = [
            "name" => "swtch_tab-10",
            "type" => "subnav-tab",
            "desc" => esc_html__("Import/Export","divi-switch"),
        ];
    }
    $layout_data[] = [
        "name" => "swtch_tab-11",
        "type" => "subnav-tab",
        "desc" => esc_html__("About &amp; License Key","divi-switch"),
        ];

    //End of Sub tabs
    $layout_data[] = [
        "type" => "subnavtab-end",
    ];

    if ($isActivated) {

        // TAB ONE -------------------SETTINGS TYPES-----------------------------
        $layout_data[] = ["name" => "swtch_tab-1","type" => "subcontent-start",];
        
        $layout_data[] = [
            "name" => esc_html__('Remove main header underline', 'divi-switch'),
            "id" => "swtch-header-1",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('By defaut divi uses box-shadow to create a line separating the header from the content. This option removes that functionality', 'divi-switch'),
    ];
        $layout_data[] = [
            "name" => esc_html__('App style menu', 'divi-switch'),
            "id" => "swtch-header-2",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Make better room of the header space on mobile with this app style menu hack.', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__('Make phone number click to call', 'divi-switch'),
            "id" => "swtch-header-3",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('When users click on your number from a mobile, it\'ll automatically dial the number for them.', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__('Open social links in new tab', 'divi-switch'),
            "id" => "swtch-header-4",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Open social icons in a new tab to stop people closing your website when using them.', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__('Center align top header items', 'divi-switch'),
            "id" => "swtch-header-5",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Move top header items into center alignment, rather than the default left / right.', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__('Different logo on scroll', 'divi-switch'),
            "id" => "swtch-header-6",
            "type" => "upload",
            "button_text" => esc_html__( "Upload logo", "divi-switch" ),
            "desc" => esc_html__('Have a different logo on scroll.', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__("Burger menu text", "divi-switch"),
            "id" => "swtch-header-7",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__("Choose a word to place before burger icon.", "divi-switch"),
        ];
        /*$layout_data[] = [
            "name" => esc_html__("Burger menu text formatting", "divi-switch"),
            "id" => "swtch-header-8",
            "type" => "select",
            "options" => '',
            "desc" => esc_html__("Choose how you would like your burger icon text to be formatted.", "divi-switch"),
        ];*/
        $layout_data[] = [
            "name" => esc_html__('Page specific logo', 'divi-switch'),
            "id" => "swtch-header-9",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Enable specific logos on individual pages. Logo is set on each page in meta box.', 'divi-switch'),
        ];

        $layout_data[] = [
            "name" => esc_html__('Replace fullscreen menu with a layout', 'divi-switch'),
            "id" => "swtch-header-10",
            "type" => "select",
            "options" => $library_layouts,
            "desc" => esc_html__( "Replaces the fullscreen menu with a library layout.", "divi-switch" ),
            "et_save_values" => true,
        ];

        $layout_data[] = [
            "name" => esc_html__( "Transparent header for the homepage", "divi-switch" ),
            "id" => "swtch-header-11",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__( "Create a transparent Divi Primary & Secondary Menu only for the homepage.", "divi-switch" ),
        ];

        $layout_data[] = [
            "name" => esc_html__( "Transparent header for all pages", "divi-switch" ),
            "id" => "swtch-header-12",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__( "Create a transparent Divi Primary & Secondary Menu globally.", "divi-switch" ),
        ];

        $layout_data[] = [
            "name" => esc_html__( "Menu hover effect", "divi-switch" ),
            "id" => "swtch-header-hover-switch",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__( "Enable or disable menu hover effect for standard Divi Menu. This setting won't work for menu created with Divi module or menu in full-screen, slide-in or mobile style.", "divi-switch" ),
        ];

        $layout_data[] = [
            "name" => esc_html__("Keep hover style on active link", "divi-switch"),
            "id" => "swtch-header-hover-active_item",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__("Hover style will be displayed on the menu item that is currently active.", "divi-switch"),
        ];
        $layout_data[] = [
            "name" => esc_html__("Menu hover style", "divi-switch"),
            "id" => "swtch-header-hover-type",
            "type" => "select",
            "options" => array(
                'none' => 'None',
                'style_1' => 'Style 1',
                'style_2' => 'Style 2',
                'style_3' => 'Style 3',
                'style_4' => 'Style 4',
                'style_5' => 'Style 5',
                'style_6' => 'Style 6',
                'style_7' => 'Style 7',
            ),
            "desc" => esc_html__("Choose style for the menu hover. Switch \"Menu hover effect\" must be enabled in the order this to work. ", "divi-switch"),
            "et_save_values" => true,
        ];

        $layout_data[] = [
            "name" => esc_html__("Menu hover border height", "divi-switch"),
            "id" => "swtch-header_border_height",
            "type" => "select",
            'std' => '2',
            "options" => array(
                '1' => '1px',
                '2' => '2px',
                '3' => '3px',
                '4' => '4px',
                '5' => '5px',
                '6' => '6px',
                '7' => '7px',
                '8' => '8px'
            ),
            "desc" => esc_html__('Choose a border with for the menu hover style', 'divi-switch'),
            "et_save_values" => true,
        ];


	// Color Pallette
	$layout_data[] = [
		"name" => esc_html__("Menu hover accent color", 'divi-switch'),
		"id" => "swtch-header-hover-color",
		"type" => "et_color_palette",
		"items_amount" => 1,
		"std"          => "#000000",
		"desc" => esc_html__("Choose a color for the menu hover style", "divi-switch"),
	];



	$layout_data[] = [
            "type" => "clearfix",    // SPACING
        ];

        /**
		Various commented out switches were removed from here, see Git history to restore if needed.
		Note that variable $library_menus was also removed from further up in this function and may
		be required by the removed code.
		**/

        // Select Dropdown

        $layout_data[] = ["name" => "swtch_tab-1","type" => "subcontent-end",];
        // END TAB ONE --------------------------------------------

        // TAB TWO -------------------SETTINGS TYPES-----------------------------
        $layout_data[] = ["name" => "swtch_tab-2","type" => "subcontent-start",];

        $layout_data[] = [
            "name" => esc_html__('Remove bullet points from footer', 'divi-switch'),
            "id" => "swtch-footer-1",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Remove the footer bullets and reposition the links properly.', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__('Hide bottom footer', 'divi-switch'),
            "id" => "swtch-footer-2",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Remove the bottom footer, the one with the ET links.', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__('Stop the footer floating on empty pages', 'divi-switch'),
            "id" => "swtch-footer-3",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Pages with little or no content show the bottom footer in the center of the page. Not any more.', 'divi-switch'),
        ];

        $layout_data[] = [
            "name" => esc_html__('Replace footer widgets with layout', 'divi-switch'),
            "id" => "swtch-footer-4",
            "type" => "select",
            "options" => $library_layouts,
            "desc" => esc_html__( "Replace the footer widget area with a library layout. To replace the entire footer, select your layout here and enable the 'Hide Bottom Footer' option too. In order for the footer layout styling to work correctly, the Builder > Advanced > Static CSS File Generation option must be disabled.", "divi-switch" ),
            "et_save_values" => true,
        ];

        $layout_data[] = ["name" => "swtch_tab-2","type" => "subcontent-end",];
        // END TAB TWO --------------------------------------------
        
        // TAB THREE -------------------SETTINGS TYPES-----------------------------
        $layout_data[] = ["name" => "swtch_tab-3","type" => "subcontent-start",];

        $layout_data[] = [
            "name" => esc_html__('Remove the dividing sidebar line', 'divi-switch'),
            "id" => "swtch-main-1",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Get rid of the thin grey line that separates the sidebar from the main content.', 'divi-switch'),
        ];
        
        $layout_data[] = [
            "name" => esc_html__('Global preloader', 'divi-switch'),
            "id" => "swtch-main-2",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__( "Show a cool loading screen while your page objects load.", "divi-switch" ), esc_html__(' ', 'divi-switch'),
        ];
		
        $layout_data[] = [
            "name" => esc_html__('Global preloader transition type', 'divi-switch'),
            "id" => "swtch-main-2-1",
            "type" => "select",
            "options" => array(
                'fade' => esc_html__('Fade out', 'divi-switch'),
                'rotate' =>  esc_html__('Rotate out', 'divi-switch'),
                'round' => esc_html__('Round out', 'divi-switch'),
                'slide-l' => esc_html__('Slide left', 'divi-switch'),
                'slide-r' =>  esc_html__('Slide right', 'divi-switch'),
                'slide-u' => esc_html__('Slide up', 'divi-switch'),
                'slide-d' =>  esc_html__('Slide down', 'divi-switch'),
                'slide-ul' => esc_html__('Slide up left', 'divi-switch'),
                'slide-ur' => esc_html__('Slide up right', 'divi-switch'),
                'slide-dl' => esc_html__('Slide down left', 'divi-switch'),
                'slide-dr' => esc_html__('Slide down right', 'divi-switch'),
                'hinge-bl' => esc_html__('Bottom left hinge', 'divi-switch'),
                'hinge-tl' => esc_html__('Top left hinge', 'divi-switch'),
                'hinge-br' => esc_html__('Bottom right hinge', 'divi-switch'),
                'hinge-tr' => esc_html__('Top right hinge', 'divi-switch'),
            ),
            "desc" => esc_html__( "Set the default transition of the preloader.", "divi-switch" ),
            "et_save_values" => true,
        ];

        $layout_data[] = [
            "name" => esc_html__('Global preloader icon', 'divi-switch'),
            "id" => "swtch-main-2-2",
            "type" => "select",
            "options" => array(
                'audio' => esc_html__('Audio', 'divi-switch'),
                'ball-triangle' => esc_html__('Ball triangle', 'divi-switch'),
                'bars' => esc_html__('Bars', 'divi-switch'),
                'circles' =>  esc_html__('Circles', 'divi-switch'),
                'grid' => esc_html__('Grid', 'divi-switch'),
                'hearts' => esc_html__('Hearts', 'divi-switch'),
                'oval' => esc_html__('Oval', 'divi-switch'),
                'puff' => esc_html__('Puff', 'divi-switch'),
                'rings' => esc_html__('Rings', 'divi-switch'),
                'spinning-circles' => esc_html__('Spinning circles', 'divi-switch'),
                'three-dots' => esc_html__('Three dots', 'divi-switch'),
            ),
            "desc" => esc_html__( "Set the loader icon.", "divi-switch" ),
            "et_save_values" => true,
        ];
		
		$layout_data[] = [
            "name" => esc_html__('Global preloader foreground/background colors', 'divi-switch'),
            "id" => "swtch-main-2-4",
            "type" => "et_color_palette",
            "items_amount" => 2,
            "std"  => '#000000|#FFFFFF',
            "desc" => esc_html__('Set the foreground and background color of the global preloader.', 'divi-switch'),
        ];
        
        $layout_data[] = [
            "name" => esc_html__('Portfolio image aspect ratio', 'divi-switch'),
            "id" => "swtch-main-3",
            "type" => "select",
            "options" => array(
                '' => esc_html__('(Default)', 'divi-switch'),
                'square' => esc_html__('Square', 'divi-switch'),
                'book' => esc_html__('Book', 'divi-switch'),
                'cinema' => esc_html__('Cinema', 'divi-switch'),
            ),
            "desc" => esc_html__( "Set the aspect ratio of images in the portfolio grid.", "divi-switch" ),
            "et_save_values" => true,
        ];
        
        $layout_data[] = [
            "name" => esc_html__('Stop gallery images opening a lightbox', 'divi-switch'),
            "id" => "swtch-main-4",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Stop the gallery opening up the lightbox when clicked.', 'divi-switch'),
        ];
        
        $layout_data[] = [
            "name" => esc_html__('Slider animation - slide description', 'divi-switch'),
            "id" => "swtch-main-5",
            "type" => "select",
            "options" => array(
                '' => esc_html__('(Default)', 'divi-switch'),
                'fadeLeft' => esc_html__('Fly in from left', 'divi-switch'),
                'fadeRight' => esc_html__('Fly in from right', 'divi-switch'),
                'flipInX' => esc_html__('Flip on X axis', 'divi-switch'),
                'flipInY' => esc_html__('Flip on Y axis', 'divi-switch'),
            ),
            "desc" => esc_html__( "Set the default transition of the slide description.", "divi-switch" ),
            "et_save_values" => true,
        ];
        
        $layout_data[] = [
            "name" => esc_html__('Slider animation - image & video', 'divi-switch'),
            "id" => "swtch-main-6",
            "type" => "select",
            "options" => array(
                '' => esc_html__('(Default)', 'divi-switch'),
                'fadeLeft' => esc_html__('Fly in from left', 'divi-switch'),
                'fadeRight' => esc_html__('Fly in from right', 'divi-switch'),
                'flipInX' => esc_html__('Flip on X axis', 'divi-switch'),
                'flipInY' => esc_html__('Flip on Y axis', 'divi-switch'),
            ),
            "desc" => esc_html__( "Set the default transition of the slide image and video.", "divi-switch" ),
            "et_save_values" => true,
        ];

        $layout_data[] = [
            "name" => esc_html__('Remove the Projects post type', 'divi-switch'),
            "id" => "swtch-main-7",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('This unregisters the project post type', 'divi-switch'),
        ];

        $layout_data[] = [
            "name" => "Show custom maintenance page",
            "id" => "swtch-main-10",
            "type" => "checkbox",
            "std" => "on",
            "desc" => esc_html__( "If a page is selected in the custom maintenance page setting, this setting enables or disables maintenance mode. This setting has no effect if the custom maintenance page setting is disabled.", "swtch" ),
        ];
		
        $layout_data[] = [
        "name" => "Custom maintenance page",
        "id" => "swtch-main-8",
        "type" => "select",
        "options" => $pages,
        "desc" => esc_html__( "Select a page to be displayed as a maintenance page when the \"Show custom maintenance page\" setting is enabled.", "swtch" ),
        "et_save_values" => true,
		'std' => ''
    ];



        $layout_data[] = [
        "name" => esc_html__('Custom 404 page', 'divi-switch'),
        "id" => "swtch-main-9",
        "type" => "select",
        "options" => $pages,
        "desc" => esc_html__( "Select a page to be displayed when a 404 Not Found error occurs.", "divi-switch" ),
        "et_save_values" => true,
    ];

        
        $layout_data[] = ["name" => "swtch_tab-3","type" => "subcontent-end",];
        // END TAB THREE --------------------------------------------

        // TAB FOUR -------------------SETTINGS TYPES-----------------------------
        $layout_data[] = ["name" => "swtch_tab-4","type" => "subcontent-start",];

        $layout_data[] = [
            "name" => esc_html__("Change breakpoint - 1406px", "divi-switch"),
            "id" => "swtch-mobile-1",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__('Enter a number (without \'px\') to change the pixel value of this breakpoint', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__("Change breakpoint - 1099px", "divi-switch"),
            "id" => "swtch-mobile-2",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__('Enter a number (without \'px\') to change the pixel value of this breakpoint', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__("Change breakpoint - 981px", "divi-switch"),
            "id" => "swtch-mobile-3",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__('Enter a number (without \'px\') to change the pixel value of this breakpoint', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__("Change breakpoint - 801px", "divi-switch"),
            "id" => "swtch-mobile-4",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__('Enter a number (without \'px\') to change the pixel value of this breakpoint', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__("Change breakpoint - 768px", "divi-switch"),
            "id" => "swtch-mobile-5",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__('Enter a number (without \'px\') to change the pixel value of this breakpoint', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__("Change breakpoint - 480px", "divi-switch"),
            "id" => "swtch-mobile-6",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__('Enter a number (without \'px\') to change the pixel value of this breakpoint', 'divi-switch'),
        ];
        $layout_data[] = [
            "name" => esc_html__("Change breakpoint - 381px", "divi-switch"),
            "id" => "swtch-mobile-7",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__('Enter a number (without \'px\') to change the pixel value of this breakpoint', 'divi-switch'),
        ];
        
        $layout_data[] = [
            "name" => esc_html__('Collapse submenu items in the mobile menu', 'divi-switch'),
            "id" => "swtch-mobile-8",
            "type" => "checkbox",
            "std" => "off",
            "desc" => sprintf( esc_html__('By default, submenu items are nested under their parent link in the mobile menu. This switch collapses submenu items until you click the parent link. NOTE: Set top level urls to \'#\' if using collapsible menus. Code provided by %sElegant Themes%s', 'divi-switch' ), '<a href=\'https://www.elegantthemes.com/blog/community/divi-mobile-menu-hack-collapsing-nested-sub-menu-items\'>','</a>'  ),
        ];

        $layout_data[] = [
            "name" => esc_html__("Show text on mobile menu", "divi-switch"),
            "id" => "swtch-mobile-9",
            "type" => "text",
            'std' => '',
            "desc" => esc_html__('Change the default Select Page text when using a centered header style.', 'divi-switch'),
        ];
        
        $layout_data[] = ["name" => "swtch_tab-4","type" => "subcontent-end",];
        // END TAB FOUR --------------------------------------------

        // TAB SIX -------------------SETTINGS TYPES-----------------------------
        $layout_data[] = ["name" => "swtch_tab-6","type" => "subcontent-start",];

        $layout_data[] = [
            "name" => esc_html__('Add comments in toggle', 'divi-switch'),
            "id" => "swtch-posts-1",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Move the comments into a toggle so they are hidden by default.', 'divi-switch'),
        ];
        
        $layout_data[] = ["name" => "swtch_tab-6","type" => "subcontent-end",];
        // END TAB SIX --------------------------------------------

        // TAB SEVEN -------------------SETTINGS TYPES-----------------------------
        $layout_data[] = ["name" => "swtch_tab-7","type" => "subcontent-start",];

        $layout_data[] = [
            "name" => esc_html__('Add category title to top of category pages', 'divi-switch'),
            "id" => "swtch-archve-1",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Add category title to top of category pages - can be customised within the customizer.', 'divi-switch'),
        ];

        $layout_data[] = [
            "name" => esc_html__('Remove sidebar', 'divi-switch'),
            "id" => "swtch-archve-2",
            "type" => "checkbox",
            "std" => "off",
            "desc" =>  esc_html__('Removes the sidebar and seperator line on archive pages', 'divi-switch'),
        ];

        $layout_data[] = [
            "name" => esc_html__('Add "Read More" link under posts', 'divi-switch'),
            "id" => "swtch-archve-3",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Adds a simple read more link under each post.', 'divi-switch'),
        ];

        $layout_data[] = [
            "name" => esc_html__('Add separator line under posts', 'divi-switch'),
            "id" => "swtch-archve-4",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Adds a separator line under each post. This can be further customized within the customizer.', 'divi-switch'),
        ];
        
        $layout_data[] = ["name" => "swtch_tab-7","type" => "subcontent-end",];
        // END TAB SEVEN --------------------------------------------

        // TAB EIGHT -------------------SETTINGS TYPES-----------------------------
        $layout_data[] = ["name" => "swtch_tab-8","type" => "subcontent-start",];

        $layout_data[] = [
            "name" => esc_html__('Insert layout before main content', 'divi-switch'),
            "id" => "swtch-integration-1",
            "type" => "select",
            "options" => $library_layouts,
            "desc" => esc_html__( "Insert layout before main content under navigation.", "divi-switch" ),
            "et_save_values" => true,
        ];
        $layout_data[] = [
            "name" => esc_html__('Insert layout after main content', 'divi-switch'),
            "id" => "swtch-integration-2",
            "type" => "select",
            "options" => $library_layouts,
            "desc" => esc_html__( "Insert layout after main content above footer.", "divi-switch" ),
            "et_save_values" => true,
        ];
        $layout_data[] = [
            "name" => esc_html__('Insert layout before post content', 'divi-switch'),
            "id" => "swtch-integration-3",
            "type" => "select",
            "options" => $library_layouts,
            "desc" => esc_html__( "Insert layout before post content below navigation.", "divi-switch" ),
            "et_save_values" => true,
        ];

        $layout_data[] = ["name" => "swtch_tab-8","type" => "subcontent-end",];
        // END TAB EIGHT --------------------------------------------


        // TAB NINE -------------------SETTINGS TYPES-----------------------------
        $layout_data[] = ["name" => "swtch_tab-9","type" => "subcontent-start",];

        /*$layout_data[] = [
            "name" => "Remove WordPress, Plugin & Theme Update Prompts",
            "id" => "swtch-advncd-1",
            "type" => "checkbox",
            "std" => "off",
            "desc" => "Removes the update count from the WordPress Dashboard",
        ];*/
        $layout_data[] = [
            "name" => esc_html__('Enable SVG uploads', 'divi-switch'),
            "id" => "swtch-advncd-2",
            "type" => "checkbox",
            "std" => "off",
            "desc" => esc_html__('Allows SVG files to be uploaded which WordPress blocks by default.', 'divi-switch'),
        ];

        $layout_data[] = [
            "name" => esc_html__('Enable Divi Shortcodes', 'divi-switch'),
            "id" => "swtch-advncd-3",
            "type" => "checkbox",
            "std" => "off",
            "desc" => "Allows you to display any divi library template as a shortcode. It adds a new column to the Divi Library from where you can just copy the shortcode.",
        ];

        $layout_data[] = ["name" => "swtch_tab-9","type" => "subcontent-end",];
        // END TAB NINE --------------------------------------------

        $layout_data[] = ["name" => "swtch_tab-10","type" => "subcontent-start",];
        $layout_data[] = [
            "name" => esc_html__('Import/Export Options', 'divi-switch'),
            "id" => "swtch-export-json",
            "type"          => "callback_function",
            "function_name" => 'divi_switch_json_ui',
			'desc' => esc_html__('Click Export to download a JSON file containing your Divi Switch settings. Select a previously exported file and click Import to import the settings.', 'divi-switch')
        ];
        
		if ( file_exists(__DIR__.'/pro/plugin-export.php') ) {
			include_once(__DIR__.'/pro/plugin-export.php');
			$layout_data = array_merge($layout_data, DiviSwitchPluginExport::getDiviOptions());
		}


        $layout_data[] = ["name" => "swtch_tab-10","type" => "subcontent-end",];

    } // End options that are only visible when plugin license key is activated

    $layout_data[] = ["name" => "swtch_tab-11","type" => "subcontent-start",];
    $layout_data[] = [
        "name" => "",
        "id" => "swtch-about",
        "type"          => "callback_function",
        "function_name" => 'ds_divi_switch_credit',
        "desc" => "",
    ];
    $layout_data[] = [
        "name" => esc_html__("License key", "divi-switch"),
        "id" => "swtch-license-key",
        "type" => "password",
        'std' => '',
        "desc" => esc_html__("Enter your license key for Divi Switch.",'divi-switch')
    ];
    $layout_data[] = [
        "name" => "",
        "id" => "swtch-activate-button",
        "type"          => "callback_function",
        "function_name" => 'divi_switch_activate_button',
        "desc" => "",
    ];

    $layout_data[] = ["name" => "swtch_tab-11","type" => "subcontent-end",];

    $layout_data[] = [
        "name" => "wrap-swtch_tab",
        "type" => "contenttab-wrapend",
    ];

    return $layout_data;
}
add_filter('et_epanel_layout_data','ds_divi_switch_slap_add_tab_content');

function divi_switch_json_ui() {
?>
    <input type="file" name="json_file">
    <button name="divi_switch_action" class="et-button" value="jsonImport"><?php echo esc_html__('Import', 'divi-switch');?></button>
    <button name="divi_switch_action" class="et-button" value="jsonExport"><?php echo esc_html__('Export', 'divi-switch');?></button>
<?php
}

function divi_switch_activate_button() {
    $isActivated = DiviSwitch::isActivated();
?>
    <button name="divi_switch_action" class="et-button" value="<?php echo($isActivated ? 'deactivate' : 'activate'); ?>"><?php echo($isActivated ? 'Deactivate' : 'Activate'); ?></button>
<?php
}