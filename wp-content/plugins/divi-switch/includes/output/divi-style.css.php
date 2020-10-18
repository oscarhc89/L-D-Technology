<?php

function divi_switch_generate_css($file) {

// phpcs:disable WordPress.WP.AlternativeFunctions, WordPress.Security.NonceVerification -- this file is standalone and doesn't run in the context of WordPress
$origFile = get_template_directory().'/'.$file;
$newFile = substr($origFile, 0, -4).'.divi-switch-'.DS_SWITCH_VERSION.substr($origFile, -4);

$css = file_get_contents($origFile); // phpcs:ignore PHPCS_SecurityAudit.BadFunctions.FilesystemFunctions.WarnFilesystem -- not a remote file; file name is checked against fixed values

/* dsx-exclude */
if ( file_exists(__DIR__.'/options.php') ) {
	include(__DIR__.'/options.php');
}
/* /dsx-exclude */
/* dsx-execute
if ( file_exists(__DIR__.'/../options.php') ) {
	include(__DIR__.'/../options.php');
}
/dsx-execute */
/* dsx-execute */
if (empty($diviOptions)) {
/* /dsx-execute */
	file_put_contents($newFile, $css);
	return;
/* dsx-execute */
}
/* /dsx-execute */

$from = array();
$to = array();

/* dsx-execute */
$breakpoints = array(1406, 1099, 981, 801, 768, 480, 381);
foreach ($breakpoints as $i => $breakpoint) {
	$option = 'swtch-mobile-'.($i + 1);
	if (!empty($diviOptions[$option]) && is_numeric($diviOptions[$option])) {
		$optionValue = $diviOptions[$option];
/* /dsx-execute */
/* dsx-include
		$optionValue = '^($optionValue)^';
/dsx-include */
		$from[] = '(min-width:'.$breakpoint.'px)';
		$to[] = '(min-width:'.$optionValue.'px)';
		$from[] = '(max-width:'.($breakpoint - 1).'px)';
		$to[] = '(max-width:'.($optionValue - 1).'px)';
/* dsx-execute */
	}
}
/* /dsx-execute */

if (!empty($from)) {
	$css = str_ireplace($from, $to, $css);
}

/* dsx-exclude */
$switchCssFile = __DIR__.'/style.css';
/* /dsx-exclude */
/* dsx-include
$switchCssFile = __DIR__.'/includes/output/style.css';
/dsx-include */
if (file_exists($switchCssFile)) { // phpcs:ignore PHPCS_SecurityAudit.BadFunctions.FilesystemFunctions.WarnFilesystem
	$css .= "\n\n".file_get_contents($switchCssFile); // phpcs:ignore PHPCS_SecurityAudit.BadFunctions.FilesystemFunctions.WarnFilesystem
}

$css = '/*! The following theme stylesheet was modified by the Divi Switch plugin by Divi Space to implement user customization(s) - '.current_time('r').' */'."\n".$css;

file_put_contents($newFile, $css);
}
