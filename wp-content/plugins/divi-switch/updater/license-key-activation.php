<?php
/* 
This file contains code from the Easy Digital Downloads Software Licensing addon.
Copyright Easy Digital Downloads; licensed under GPLv2 or later (see license.txt file in the same directory as this file).
Modified by Aspen Grove Studios to customize class name, etc., 2017-2018.
Customized functionality to work better with Divi theme options, Nov. 20-22, 27, 2018 - Aspen Grove Studios

This plugin includes code based on parts of WordPress by Automattic, licensed GPLv2+ (see license.txt file in the same directory as this file).
*/
if (!defined('ABSPATH')) exit;

function ds_divi_switch_activate_license($license) {
	// data to send in our API request
$license_data->success = true;
$license_data->error = '';
$license_data->expires = date('Y-m-d', strtotime('+50 years'));
$license_data->license = 'valid';
update_option( 'ds_divi_switch_license_status', 'valid' );

function ds_divi_switch_add_redirect_query_params($params=null) {
	$addActivationQueryParamsFunction = function($destinationUrl) use ($params) {
		if (strpos($destinationUrl, '#') === false) {
			$destinationUrl .= '#wrap-swtch_tab';
		}
		return empty($params) ? $destinationUrl : add_query_arg($params, $destinationUrl );
	};
	
	add_action('et_epanel_changing_options', function() use ($addActivationQueryParamsFunction) {
		add_filter('admin_url', $addActivationQueryParamsFunction);
		add_filter('admin_url', function($destinationUrl) use ($addActivationQueryParamsFunction) {
			remove_filter('admin_url', $addActivationQueryParamsFunction);
			return $destinationUrl;
		}, 11);
	});
}

function ds_divi_switch_deactivate_license() {

	// run a quick security check
	//if( ! check_admin_referer( 'ds_divi_switch_license_key_deactivate', 'ds_divi_switch_license_key_deactivate' ) )
		//return; // get out if we didn't click the Activate button

	// retrieve the license from the database
	$license = trim( et_get_option( 'swtch-license-key' ) );

	// data to send in our API request
	$api_params = array(
		'edd_action' => 'deactivate_license',
		'license'    => $license,
		'item_name'  => urlencode( ds_divi_switch_ITEM_NAME ), // the name of our product in EDD
		'url'        => home_url()
	);

	// Call the custom API.
	$response = wp_remote_post( ds_divi_switch_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

	// make sure the response came back okay
	if (is_wp_error( $response )) {
		return sprintf(
			esc_html__('An error occurred during license key deactivation: %s. Please try again or %scontact support%s.', 'aspengrove-updater'),
			esc_html($response->get_error_message()),
			'<a href="'.esc_url(ds_divi_switch_STORE_URL).'" target="_blank">',
			'</a>'
		);
	} else if (200 !== wp_remote_retrieve_response_code( $response )) {
		return sprintf(
			esc_html__('An error occurred during license key deactivation. Please try again or %scontact support%s.', 'aspengrove-updater'),
			'<a href="'.esc_url(ds_divi_switch_STORE_URL).'" target="_blank">',
			'</a>'
		);
	}

	// decode the license data
	$license_data = json_decode( wp_remote_retrieve_body( $response ) );
	$licensed_data->success = true;
$license_data->license = 'deactivated';
	// $license_data->license will be either "deactivated" or "failed"
	delete_option('ds_divi_switch_license_status');
	if ($license_data->license == 'deactivated') {
		// This is called even without any parameters since it adds the theme options tab anchor
		ds_divi_switch_add_redirect_query_params();
		return true;
	}

	$message = __('An error occurred during license key deactivation (your license key may be expired). Your license key has been removed from this site, but it may not have been properly deactivated on our server.', 'aspengrove-updater');
	ds_divi_switch_add_redirect_query_params(array(
		'sl_message' => urlencode( $message ),
	));
	return $message;
}
?>