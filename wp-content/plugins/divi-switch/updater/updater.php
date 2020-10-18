<?php
/* 
This file contains code from the Easy Digital Downloads Software Licensing addon.
Copyright Easy Digital Downloads; licensed under GPLv2 or later (see license.txt file in the same directory as this file).
Modified by Aspen Grove Studios to customize class name, etc., 2017-2018.
Customized functionality to work better with Divi theme options, Nov. 20-22, 27, 2018 - Aspen Grove Studios
*/

if (!defined('ABSPATH')) exit;

define( 'ds_divi_switch_STORE_URL', DiviSwitch::PLUGIN_STORE_URL );
define( 'ds_divi_switch_ITEM_NAME', DiviSwitch::PLUGIN_NAME ); // Needs to exactly match the download name in EDD
define( 'ds_divi_switch_PLUGIN_PAGE', 'admin.php?page=et_divi_options#wrap-swtch_tab' );

define('ds_divi_switch_BRAND_NAME', 'Divi Space');

if( !class_exists( 'ds_divi_switch_Plugin_Updater' ) ) {
	// load our custom updater
	include( dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php' );
}

// Load translations
load_plugin_textdomain('aspengrove-updater', false, plugin_basename(dirname(__FILE__).'/lang'));

function ds_divi_switch_updater() {

	// retrieve our license key from the DB
	$license_key = trim( et_get_option( 'swtch-license-key' ) );

	// setup the updater
	new ds_divi_switch_Plugin_Updater( ds_divi_switch_STORE_URL, DiviSwitch::PLUGIN_FILE, array(
			'version' 	=> DiviSwitch::PLUGIN_VERSION, // current version number
			'license' 	=> $license_key, 		// license key (used get_option above to retrieve from DB)
			'item_name' => ds_divi_switch_ITEM_NAME, 	// name of this plugin
			'author' 	=> ds_divi_switch_BRAND_NAME,  // author of this plugin
			'beta'		=> false
		)
	);
	
	// creates our settings in the options table
	//register_setting('ds_divi_switch_license', 'ds_divi_switch_license_key', 'ds_divi_switch_sanitize_license' );
}
add_action( 'admin_init', 'ds_divi_switch_updater', 0 );

function ds_divi_switch_deactivate_license_key() {
	require_once(dirname(__FILE__).'/license-key-activation.php');
	ds_divi_switch_deactivate_license();
}

function ds_divi_switch_has_license_key() {
	return (get_option('ds_divi_switch_license_status') === 'valid');
}

function ds_divi_switch_credit() {
	$status  = get_option( 'ds_divi_switch_license_status' );
	?>
		<div id="ds_divi_switch_credit">
			<div id="ds_divi_switch_credit_logo_container">
				<a href="https://divi.space/?utm_source=<?php echo(DiviSwitch::PLUGIN_SLUG); ?>&amp;utm_medium=plugin-credit-link&amp;utm_content=license-key-status" target="_blank">
					<img src="<?php echo(plugins_url('logo.png', __FILE__)); ?>" alt="<?php echo(ds_divi_switch_BRAND_NAME); ?>" />
				</a>
			</div>
			
			<div id="ds_divi_switch_credit_title">
				<?php echo(esc_html(ds_divi_switch_ITEM_NAME)); ?>
				<small>v<?php echo(DiviSwitch::PLUGIN_VERSION); ?></small>
			</div>
			
			
		</div>
		<?php
			if (!empty($_GET['sl_message']) && !defined('ds_divi_switch_ACTIVATION_ERROR')) {
				define('ds_divi_switch_ACTIVATION_ERROR', 
							$_GET['sl_message']
							.(empty($_GET['license_key']) ? '' : ' ('.$_GET['license_key'].')')
				);
			}
			if (defined('ds_divi_switch_ACTIVATION_ERROR')) {
				echo('<p id="ds_divi_switch_activation_error">'.esc_html(ds_divi_switch_ACTIVATION_ERROR).'</p>');
			}
		?>
	<?php
}

function ds_divi_switch_sanitize_license( $new ) {
	// Need to activate license here, only if submitted
	require_once(dirname(__FILE__).'/license-key-activation.php');
	ds_divi_switch_activate_license($new); // Always redirects
}