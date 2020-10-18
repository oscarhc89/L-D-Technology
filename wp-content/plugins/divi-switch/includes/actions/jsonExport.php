<?php
$switchOptions = array();
$allOptions = get_option('et_divi');
foreach ($allOptions as $optionName => $optionValue) {
	if (substr($optionName, 0, 6) == 'swtch-' && $optionName != 'swtch-license-key') {
		if (!isset($switchOptions['et'])) {
			$switchOptions['et'] = array();
		}
		$switchOptions['et'][substr($optionName, 6)] = $optionValue;
	}
}

// Also update in jsonImport.php
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

foreach ($otherOptions as $optionName) {
	$optionValue = get_option($optionName, null);
	if ($optionValue !== null) {
		if (!isset($switchOptions['other'])) {
			$switchOptions['other'] = array();
		}
		$switchOptions['other'][$optionName] = $optionValue;
	}
}

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="DiviSwitch.json"');
echo(wp_json_encode($switchOptions));
exit;
