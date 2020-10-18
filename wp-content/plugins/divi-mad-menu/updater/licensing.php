<?php

/**
 * For further details please visit 
 * http://docs.easydigitaldownloads.com/article/383-automatic-upgrades-for-wordpress-plugins
 * 
 */

// This is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
define( 'DVMM_MADMENU_STORE_URL', 'https://divicio.us' );

// The download ID for the product in Easy Digital Downloads
define( 'DVMM_MADMENU_ITEM_ID', 47003 ); 

// The name of the product in Easy Digital Downloads
define( 'DVMM_MADMENU_ITEM_NAME', 'Divi MadMenu' );

// The name of the settings page for the license input to be displayed
define( 'DVMM_MADMENU_ADMIN_PAGE', 'dvmm_madmenu' );

// Load the Updater class
if( !class_exists( 'DVMM_MadMenu_Plugin_Updater' ) ) {
	include( dirname( __FILE__ ) . '/plugin-updater.php' );
}

function dvmm_madmenu_plugin_updater() {

	// retrieve the license key from the DB
	$license_key = trim( get_option( 'dvmm_madmenu_license_key' ) );

	// setup the updater
	$dvmm_updater = new DVMM_MadMenu_Plugin_Updater( DVMM_MADMENU_STORE_URL, DVMM_MADMENU_PLUGIN_MAIN_FILE,
		array(
			'version' => DVMM_MADMENU_VERSION,		// current version number
			'license' => $license_key,				// license key (used get_option above to retrieve from DB)
			'item_id' => DVMM_MADMENU_ITEM_ID,		// ID of the product
			'author'  => 'Ivan Chiurcci(Chi)',		// author of this plugin
			'beta'    => false,
		)
	);

}
add_action( 'admin_init', 'dvmm_madmenu_plugin_updater', 0 );

/**
 * Register Option
 */
function dvmm_madmenu_register_option() {
	// creates the settings in the options table
	register_setting('dvmm_madmenu_license', 'dvmm_madmenu_license_key', 'dvmm_sanitize_license' );
}
add_action('admin_init', 'dvmm_madmenu_register_option');

/**
 * Sanitize the license key
 */
function dvmm_sanitize_license( $new ) {
	$old = get_option( 'dvmm_madmenu_license_key' );
	if( $old && $old != $new ) {
		// new license has been entered, so must reactivate
		delete_option( 'dvmm_madmenu_license_status' );
	}
	return $new;
}

/**
 * Activate the license key.
 */
function dvmm_madmenu_activate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['dvmm_license_activate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'dvmm_madmenu_nonce', 'dvmm_madmenu_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'dvmm_madmenu_license_key' ) );


		// data to send in our API request
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			// 'item_name'  => urlencode( DVMM_MADMENU_ITEM_NAME ), // the name of our product in EDD
			'item_id'	 => DVMM_MADMENU_ITEM_ID, // the ID of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( DVMM_MADMENU_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( false === $license_data->success ) {

				switch( $license_data->error ) {

					case 'expired' :

						$message = sprintf(
							__( 'Your license key expired on %s.' ),
							date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
						);
						break;

					case 'disabled' :
					case 'revoked' :

						$message = __( 'Your license key has been disabled.' );
						break;

					case 'missing' :

						$message = __( 'Invalid license.' );
						break;

					case 'invalid' :
					case 'site_inactive' :

						$message = __( 'Your license is not active for this URL.' );
						break;

					case 'item_name_mismatch' :

						$message = sprintf( __( 'This appears to be an invalid license key for %s.' ), DVMM_MADMENU_ITEM_NAME );
						break;

					case 'no_activations_left':

						$message = __( 'Your license key has reached its activation limit.' );
						break;

					default :

						$message = __( 'An error occurred, please try again.' );
						break;
				}

			}

		}

		// Check if anything passed on a message constituting a failure
		if ( ! empty( $message ) ) {
			$base_url = admin_url( 'admin.php?page=' . DVMM_MADMENU_ADMIN_PAGE );
			$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();
		}

		// $license_data->license will be either "valid" or "invalid"

		update_option( 'dvmm_madmenu_license_status', $license_data->license );
		wp_redirect( admin_url( 'admin.php?page=' . DVMM_MADMENU_ADMIN_PAGE ) );
		exit();
	}
}
add_action('admin_init', 'dvmm_madmenu_activate_license');


/**
 * Deactivate the license key.
 * This will decrease the site count.
 */
function dvmm_madmenu_deactivate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['dvmm_license_deactivate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'dvmm_madmenu_nonce', 'dvmm_madmenu_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'dvmm_madmenu_license_key' ) );


		// data to send in our API request
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
			// 'item_name'  => urlencode( DVMM_MADMENU_ITEM_NAME ), // the name of our product in EDD
			'item_id'	 => DVMM_MADMENU_ITEM_ID, // the ID of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( DVMM_MADMENU_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

			$base_url = admin_url( 'admin.php?page=' . DVMM_MADMENU_ADMIN_PAGE );
			$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();
		}

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "deactivated" or "failed"
		if( $license_data->license == 'deactivated' ) {
			delete_option( 'dvmm_madmenu_license_status' );
		}

		wp_redirect( admin_url( 'admin.php?page=' . DVMM_MADMENU_ADMIN_PAGE ) );
		exit();

	}
}
add_action('admin_init', 'dvmm_madmenu_deactivate_license');


/************************************
* this illustrates how to check if
* a license key is still valid
* the updater does this for you,
* so this is only needed if you
* want to do something custom
*************************************/

function dvmm_madmenu_check_license() {

	global $wp_version;

	$license = trim( get_option( 'dvmm_madmenu_license_key' ) );

	$api_params = array(
		'edd_action' => 'check_license',
		'license' => $license,
		// 'item_name' => urlencode( DVMM_MADMENU_ITEM_NAME ),
		'item_id'	=> DVMM_MADMENU_ITEM_ID, // the ID of our product in EDD
		'url'       => home_url()
	);

	// Call the custom API.
	$response = wp_remote_post( DVMM_MADMENU_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

	if ( is_wp_error( $response ) )
		return false;

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );

	if( $license_data->license == 'valid' ) {
		echo 'valid'; exit;
		// this license is still valid
	} else {
		echo 'invalid'; exit;
		// this license is no longer valid
	}
}

/**
 * This is a means of catching errors from the activation method above 
 * and displaying it to the customer.
 */
function dvmm_madmenu_admin_notices() {
	if ( isset( $_GET['sl_activation'] ) && ! empty( $_GET['message'] ) ) {

		switch( $_GET['sl_activation'] ) {

			case 'false':
				$message = urldecode( $_GET['message'] );
				?>
				<div class="error">
					<p><?php echo $message; ?></p>
				</div>
				<?php
				break;

			case 'true':
			default:
				// Developers can put a custom success message here for when activation is successful if they way.
				break;

		}
	}
}
add_action( 'admin_notices', 'dvmm_madmenu_admin_notices' );

/**
 * The license activation template.
 * Adds the license activation form fields into 
 * the admin options page.
 * 
 */
function dvmm_madmenu_license_activation_template(){

	// get the license key and status
	$license = get_option( 'dvmm_madmenu_license_key' );
	$status  = get_option( 'dvmm_madmenu_license_status' );

	?>
	<div class="dvmm_content_box dvmm_updates_top">
		<div class="dvmm_option_title">
			<h3><?php _e('License Key'); ?></h3>
		</div>
		<div class="dvmm_option_content">
			<input id="dvmm_madmenu_license_key" name="dvmm_madmenu_license_key" type="password" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
		</div>
	</div>
	<div class="dvmm_updates_bottom">
	<?php if( false !== $license ) { ?>
		<div class="dvmm_option_title"><h3><?php _e('Activate License'); ?></h3></div>
		<div class="dvmm_option_content dvmm_activate_license">
			<?php if( $status !== false && $status == 'valid' ) { ?>
				<div class="dvmm_license_active"><?php _e('Active'); ?></div>
				<?php wp_nonce_field( 'dvmm_madmenu_nonce', 'dvmm_madmenu_nonce' ); ?>
				<input type="submit" class="button-secondary" name="dvmm_license_deactivate" value="<?php _e('Deactivate License'); ?>"/>
			<?php } else {
				wp_nonce_field( 'dvmm_madmenu_nonce', 'dvmm_madmenu_nonce' ); ?>
				<input type="submit" class="button-secondary" name="dvmm_license_activate" value="<?php _e('Activate License'); ?>"/>
			<?php } ?>
		</div>
	<?php } ?>
	</div>
	<?php
}
// add_action('dvmm_madmenu_render_update_option', 'dvmm_madmenu_license_activation_template');
