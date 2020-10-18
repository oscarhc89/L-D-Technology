<?php
// phpcs:disable WordPress.Security.NonceVerification -- nonce is checked before the include statement in the main plugin file

// phpcs:ignore PHPCS_SecurityAudit.BadFunctions.FilesystemFunctions.ErrFilesystem, WordPress.Security.ValidatedSanitizedInput.MissingUnslash, ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized -- input is being checked for validity by the is_uploaded_file function
if (isset($_FILES['json_file']['tmp_name']) && is_uploaded_file($_FILES['json_file']['tmp_name'])) {
	// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents, PHPCS_SecurityAudit.BadFunctions.FilesystemFunctions.ErrFilesystem, WordPress.Security.ValidatedSanitizedInput.MissingUnslash, ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized -- not a remote URL; file input was checked above
	$switchOptions = json_decode(file_get_contents($_FILES['json_file']['tmp_name']), true);
	if (is_array($switchOptions)) {
	
		// Also update in jsonExport.php
		$otherOptions = array(
			'ds_et_icon_picker',
			'ds_header_bg',
			'ds_header_bg_repeat',
			'ds_header_bg_position',
			'ds_header_bg_size',
			'ds_btt_button_icon_size',
			'ds_btt_button_position_right',
			'ds_btt_button_position_bottom',
			'ds_btt_button_curved_edge',
			'ds_btt_button_straight_edge',
			'ds_btt_button_color',
			'ds_btt_button_icon_color',
			'ds_btt_button_color_hover',
			'ds_btt_button_icon_color_hover',
			'ds_archve-header-bg',
			'ds_archve-header-padding',
			'ds_archve-header-color',
			'ds_archve-separator-color',
			'ds_archve-separator-margin-top',
			'ds_archve-separator-margin-bottom',
			'ds_archve-separator-height',
			'ds_archve-separator-width'
		);
		
		// First, delete all existing switches
		foreach ($_POST as $optionName => $optionValue) {
			if ($optionName != 'swtch-license-key' && substr($optionName, 0, 6) == 'swtch-') {
				unset($_POST[$optionName]);
			}
		}
		foreach ($otherOptions as $optionName) {
			delete_option($optionName);
		}
		
		// Now add in the switches we're importing
		if (isset($switchOptions['et'])) {
			foreach ($switchOptions['et'] as $optionName => $optionValue) {
				if ($optionName != 'swtch-license-key' && $optionValue != 'false') {
				$_POST['swtch-'.$optionName] = $optionValue;
			}
		}
		}
		if (isset($switchOptions['other'])) {
			foreach ($switchOptions['other'] as $optionName => $optionValue) {
				if (in_array($optionName, $otherOptions)) {
					if ( 'ds_header_bg' === $optionName || 'ds_archve-header-bg' === $optionName ) {
						$optionValue = esc_url_raw( $optionValue );
					} else {
						$optionValue = sanitize_text_field( $optionValue );
					}
					update_option($optionName, $optionValue);
				}
			}
		}
		
	}
	
	// phpcs:ignore PHPCS_SecurityAudit.BadFunctions.FilesystemFunctions.ErrFilesystem, WordPress.Security.ValidatedSanitizedInput.MissingUnslash, ET.Sniffs.ValidatedSanitizedInput.InputNotSanitized -- file input was checked in enclosing if statement
	unlink($_FILES['json_file']['tmp_name']);
}


// phpcs:enable WordPress.Security.NonceVerification
