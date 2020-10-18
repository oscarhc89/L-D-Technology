<?php
/*
This file modified by Dominika Rauk and Jonathan Hall
Last modified 2020-08-28
 */

// phpcs:disable WordPress.Security.NonceVerification -- Nonce is verified in main plugin file before include
class DiviSwitchPluginExport {
	
	public static function getDiviOptions() {
		return array(
			[
				"name" => esc_html__("Export Plugin Name", "divi-switch"),
				"id" => "swtch-plugin-export-name",
				"type" => "text",
				'std' => '',
				"desc" => esc_html__('Enter the plugin name that should be displayed when the exported plugin is installed.', 'divi-switch'),
			],
			[
				"name" => esc_html__("Export Plugin Description", "divi-switch"),
				"id" => "swtch-plugin-export-desc",
				"type" => "text",
				'std' => '',
				"desc" => esc_html__('Enter the plugin description that should be displayed when the exported plugin is installed.', 'divi-switch'),
			],
			[
				"name" => esc_html__("Export Plugin Author", "divi-switch"),
				"id" => "swtch-plugin-export-author",
				"type" => "text",
				'std' => '',
				"desc" => esc_html__('Enter the plugin author that should be displayed when the exported plugin is installed.', 'divi-switch'),
			],
			[
				"name" => esc_html__("Export Plugin Author URL", "divi-switch"),
				"id" => "swtch-plugin-export-author-url",
				"type" => "text",
				'std' => '',
				"desc" => esc_html__('Enter a URL for the plugin author.', 'divi-switch'),
			],
			[
				"name" => esc_html__("Export Plugin Version", "divi-switch"),
				"id" => "swtch-plugin-export-version",
				"type" => "text",
				'std' => '1.0.0',
				"desc" => esc_html__('Enter the version number that should be displayed when the exported plugin is installed.', 'divi-switch'),
			],
			[
				"name" => "",
				"id" => "swtch-plugin-export",
				"type"          => "callback_function",
				"function_name" => array('DiviSwitchPluginExport', 'outputDiviOptionUi'),
				'desc' => ''
			]
		);
	}
	
	public static function outputDiviOptionUi() {
?>
	<p><?php echo esc_html__('Please save your switches before exporting a plugin.', 'divi-switch');?></p><br>
	<button name="divi_switch_action" class="et-button" value="proPluginExport"><?php echo esc_html__('Export Plugin', 'divi-switch');?></button>
<?php
	}
	
	public static function export() {
		$phpFiles = array('functions.php', 'includes/output/divi-style.css.php');
		$stringSub = array();
		
		
		$pluginName = isset($_POST['swtch-plugin-export-name']) ? sanitize_text_field( wp_unslash($_POST['swtch-plugin-export-name']) ) : '';
		if (empty($pluginName)) {
			$pluginClass = 'DiviSwitchCustom';
		} else {
			$stringSub['Divi Switch'] = $pluginName;
			$pluginClass = preg_replace('/[^a-z]/i', '', ucwords(trim($pluginName)));
		}
		$stringSub['DiviSwitch'] = $pluginClass;
		
		$pluginAuthor = isset($_POST['swtch-plugin-export-author']) ? sanitize_text_field( wp_unslash($_POST['swtch-plugin-export-author']) ) : '';

		if (!empty($pluginAuthor)) {
			$stringSub['Divi Space'] = $pluginAuthor;
			$stringSub['Aspen Grove Studios'] = $pluginAuthor;
		}
		
		$phpCode = '';
		foreach ($phpFiles as $i => $phpFile) {
			$phpFileContents = trim(file_get_contents(__DIR__.'/../../'.$phpFile));
			if ($i && substr($phpFileContents, 0, 5) == '<?php') {
				$phpFileContents = trim(substr($phpFileContents, 5));
			}
			if (substr($phpFileContents, -2) == '?>') {
				$phpFileContents = trim(substr($phpFileContents, -2));
			}
			$phpCode .= $phpFileContents."\n";
		}
		
		// Do string replacement throughout entire code
		$phpCode = str_replace(array_keys($stringSub), array_values($stringSub), $phpCode);
		
		$phpCode = self::processPhpDirectives($phpCode, array(
			'name' => $pluginName,
			'author' => $pluginAuthor
		));
		
		// Temporary debugging code
		// file_put_contents(__DIR__.'/../output/temp/plugin.php', $phpCode);
		
		$pluginZip = new ZipArchive();
		
		do {
			$pluginZipFilename = __DIR__.'/../output/temp/'.wp_rand().'.zip';
		} while (file_exists($pluginZipFilename));
		$pluginZip->open($pluginZipFilename, ZipArchive::CREATE);
		$pluginZip->addFile(__DIR__.'/../../license.txt', 'license.txt');
		$pluginZip->addFromString('plugin.php', $phpCode);
		
		if (file_exists(__DIR__.'/../output/style.css')) {
			$pluginZip->addFile(__DIR__.'/../output/style.css', 'includes/output/style.css');
		}
		if (file_exists(__DIR__.'/../output/script.js')) {
			$pluginZip->addFile(__DIR__.'/../output/script.js', 'includes/output/script.js');
		}
		$pluginZip->addGlob(__DIR__.'/../../images/*.svg', 0, array(
			'remove_all_path' => true,
			'add_path' => 'images/'
		));
		$pluginZip->close();
		
		header('Content-Type: application/zip');
		header('Content-Disposition: attachment; filename="'.$pluginClass.'.zip"');
		
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- outputting a zip file with appropriate HTTP headers
		echo et_()->WPFS()->get_contents($pluginZipFilename);
		unlink($pluginZipFilename);
	}

	private static function processPhpDirectives($phpCode, $pluginHeaderFields=null) {
		// Process code line-by-line
		$phpCode = explode("\n", trim($phpCode));
		$output = 'echo(\'';
		
		if ($pluginHeaderFields === null) {
			$inPluginHeader = false; // skip processing plugin header
		}
		
		foreach ($phpCode as $line) {
			if (!isset($inPluginHeader)) {
				// Plugin header has not yet been processed; we're looking for a comment as the start of header
				if (trim($line) == '/*') {
					$inPluginHeader = true;
				}
			} else if ($inPluginHeader) {
				if (trim($line) == '*/') {
					$inPluginHeader = false;
					$line .= "\n".'// Note: The credits in this file (and the accompanying license.txt file) are from the plugin that was used to generate this plugin. Some of the credits may not apply to this generated plugin.';
				} else {
					$colonPos = strpos($line, ':');
					if ($colonPos !== false) {
						$headerField = strtolower(trim(substr($line, 0, $colonPos)));
						switch ($headerField) {
							case 'plugin name':
								if (!empty($pluginHeaderFields['name'])) {
									$line = 'Plugin Name: '.$pluginHeaderFields['name'];
								}
								break;
							case 'description':
								$option = isset($_POST['swtch-plugin-export-desc']) ? sanitize_text_field( wp_unslash($_POST['swtch-plugin-export-desc']) ) : '';
								$line = empty($option) ? '' : 'Description: '.$option;
								break;
							case 'author':
								if (!empty($pluginHeaderFields['author'])) {
									$line = 'Author: '.$pluginHeaderFields['author'];
								}
								break;
							case 'author uri':
								$option = isset($_POST['swtch-plugin-export-author-url']) ? sanitize_text_field( wp_unslash($_POST['swtch-plugin-export-author-url']) ) : '';
								if (!empty($option)) {
									$line = 'Author URI: '.$option;
								}
								break;
							case 'version':
								$option = isset($_POST['swtch-plugin-export-version']) ? sanitize_text_field( wp_unslash($_POST['swtch-plugin-export-version']) ) : '';
								if (!empty($option)) {
									$line = 'Version: '.$option;
								}
								break;
							case 'license':
							case 'license uri':
								break;
							default:
								$line = '';
								
						}
					}
				}
			} else {
				// Process directives
				switch (strtolower(trim($line))) {
					case '/* dsx-include':
						$inInclude = true;
						continue 2;
					case '/dsx-include */':
						unset($inInclude);
						continue 2;
					case '/* dsx-exclude */':
						$inExclude = true;
						continue 2;
					case '/* /dsx-exclude */':
						unset($inExclude);
						continue 2;
					case '/* dsx-execute */':
					case '/* dsx-execute':
						$inExecute = true;
						$output .= '\');';
						continue 2;
					case '/* /dsx-execute */':
					case '/dsx-execute */':
						unset($inExecute);
						$output .= 'echo(\'';
						continue 2;
				}
				
				/** We had code here to strip comments from the plugin - the code was deleted by request from ETM. If needed, see git history. **/
				
				if (isset($inExclude)) {
					continue;
				} else if (isset($inInclude)) {
					$line = preg_replace_callback('/\^\((.*)\)\^/U', function($subExpression) {
						$subExpression = str_replace(array('\\\'', '\\\\'), array('\'', '\\'), $subExpression[1]);
						return '\'.('.$subExpression.').\'';
					}, str_replace(array('\\', '\''), array('\\\\', '\\\''), $line));
				}
			}
			
			if (strlen(trim($line))) {
				$output .= (isset($inExecute) || isset($inInclude) ? $line : str_replace(array('\\', '\''), array('\\\\', '\\\''), $line))."\n";
			}
		}
		
		$output .= '\');';
		
		do {
			$tempFile = __DIR__.'/../output/temp/'.wp_rand().'.php';
		} while (file_exists($tempFile));
		
		et_()->WPFS()->put_contents($tempFile, '<?php '.$output);
		
		ob_start();
		include($tempFile);
		$phpCode = ob_get_clean();
		unlink($tempFile);
		
		return $phpCode;
	}
}