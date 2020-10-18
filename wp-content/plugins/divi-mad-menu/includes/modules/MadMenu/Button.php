<?php

// Die if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

/**
 * Button(s).
 * 
 * Generates the button(s).
 *
 * @since   1.0.0 
 * 
 */
class DVMM_Menu_CTA_Button {

    /**
     * Returns instance of the class.
     * 
     * @since   1.0.0
     * 
     */
	public static function instance( ) {

		static $instance;
        return $instance ? $instance : $instance = new self( );
        
	}

    /**
     * Constructor.
     * 
     */ 
	private function __construct( ) {

    }

	/**
	 * Fields.
	 * 
	 * @since	v1.0.0 
	 * 
	 * @param	object	$module			Module.
	 * @param	string	$button_name	Rendered button name. Must be either 'button_one' or 'button_two'.
	 * @param	string	$button_label	Rendered button label. Eg. 'Button One' or 'Button Two'.
	 */
	public function get_fields( $module, $button_name = 'button', $button_label = 'Button' ) {

        $fields = array(
			"dvmm_enable_{$button_name}" => array(
				'label'           => sprintf( esc_html__( 'Enable %1$s', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Add the button element to the header.', 'dvmm-divi-mad-menu' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dvmm-divi-mad-menu' ),
					'off' => esc_html__( 'No', 'dvmm-divi-mad-menu' ),
				),
                'affects'   => array(
					// normal
					"dvmm_{$button_name}_font",
					"dvmm_{$button_name}_text_color",
					"dvmm_{$button_name}_font_size",
					"dvmm_{$button_name}_letter_spacing",
					"dvmm_{$button_name}_line_height",

					// text shadow fields do not get hidden, apparently there is a bug, so, disable them for now
					// https://github.com/elegantthemes/create-divi-extension/issues/372
					// "dvmm_{$button_name}_text_shadow_style",
					// "dvmm_{$button_name}_text_shadow_horizontal_length",
					// "dvmm_{$button_name}_text_shadow_vertical_length",
					// "dvmm_{$button_name}_text_shadow_blur_strength",
					// "dvmm_{$button_name}_text_shadow_color",
					// fixed
					"dvmm_{$button_name}_f_font",
					"dvmm_{$button_name}_f_text_color",
					"dvmm_{$button_name}_f_font_size",
					"dvmm_{$button_name}_f_letter_spacing",
					"dvmm_{$button_name}_f_line_height",
					// "dvmm_{$button_name}_f_text_shadow_style",
					// "dvmm_{$button_name}_f_text_shadow_horizontal_length",
					// "dvmm_{$button_name}_f_text_shadow_vertical_length",
					// "dvmm_{$button_name}_f_text_shadow_blur_strength",
					// "dvmm_{$button_name}_f_text_shadow_color",
					
					"border_radii_dvmm_{$button_name}",
					"border_radii_dvmm_{$button_name}_f",
				),
				'default'       => 'off',
				'tab_slug'      => 'general',
				'toggle_slug'	=> 'header_elements',
			),
			"dvmm_show_{$button_name}" => array(
				'label'           => sprintf( esc_html__( 'Show %1$s', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Set the Button element responsive visibility.', 'dvmm-divi-mad-menu' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dvmm-divi-mad-menu' ),
					'off' => esc_html__( 'No', 'dvmm-divi-mad-menu' ),
				),
				'default'           => 'on',
				'tab_slug'          => 'custom_css',
				'toggle_slug'       => 'visibility',
			),
			"dvmm_{$button_name}_order" => array(
				'label'			=> sprintf( esc_html__( '%1$s Order', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'	=> esc_html__( 'Here you can set the element order. Element order is set relatively to other enabled elements, a higher order number moves the element closer to the right hand side of the header.', 'dvmm-divi-mad-menu' ),
				'type'				=> 'range',
                'mobile_options'	=> true,
                'responsive'		=> true,
				'option_category'	=> 'layout',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'range_settings'   	=> array(
					'min'       => 0,
					'max'       => 25,
					'step'      => 1,
					'min_limit' => 0,
					'max_limit' => 25,
				),
				'validate_unit' 	=> false,
				// 'unitless'        	=> true,
				'default'           => '0',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'general_layout',
            ),
			"dvmm_{$button_name}_text" 	=> array(
				'label'            	=> sprintf( esc_html__( '%1$s Text', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'      	=> esc_html__( 'Input your desired button text.', 'dvmm-divi-mad-menu' ),
				'type'             	=> 'text',
				'option_category'  	=> 'basic_option',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'default'       	=> '',
				'mobile_options'   	=> true,
				'hover'            	=> 'tabs',
				'dynamic_content'  	=> 'text',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> $button_name,
			),
			"dvmm_{$button_name}_enable_icon" => array(
				'label'            	=> sprintf( esc_html__( 'Enable %1$s Icon', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Enable the icon for the button.', 'dvmm-divi-mad-menu' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}"	=> 'on',
				),
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dvmm-divi-mad-menu' ),
					'off' => esc_html__( 'No', 'dvmm-divi-mad-menu' ),
				),
				'default'       => 'off',
				'tab_slug'		=> 'general',
				'toggle_slug'	=> $button_name,
			),
            "dvmm_{$button_name}_icon_type" => array(
				'label'            	=> sprintf( esc_html__( '%1$s Icon Type', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'       => esc_html__( 'Select a font icon or upload your own image icon for the button.', 'dvmm-divi-mad-menu' ),
				'type'            	=> 'select',
				'option_category'	=> 'basic_option',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on'
				),
				'options'         	=> array(
					'font_icon'			=> esc_html__( 'Font Icon', 'dvmm-divi-mad-menu' ),
					'image_icon'		=> esc_html__( 'Image Icon', 'dvmm-divi-mad-menu' ),
				),
				'default'         	=> 'font_icon',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> $button_name,
            ),
			"dvmm_{$button_name}_icon"  => array(
				'label'           => sprintf( esc_html__( '%1$s Icon', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Select a font icon for the button.', 'dvmm-divi-mad-menu' ),
				'type'            => 'select_icon',
				'mobile_options'  => true,
				'option_category' => 'configuration',
				'show_if'		  => array(
					"dvmm_enable_{$button_name}" => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
                    "dvmm_{$button_name}_icon_type" => 'font_icon',
				),
				// 'class'           => array( 'et-pb-font-icon' ),
				'default'		  => '%%20%%',
				'allow_empty' 	  => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => $button_name,
            ),
			"dvmm_{$button_name}_img" => array(
				'label'             => sprintf( esc_html__( '%1$s Image', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'       => esc_html__( 'Upload an image icon for the button.', 'dvmm-divi-mad-menu' ),
				'type'				=> 'upload',
				'mobile_options'    => true,
				'hover'             => 'tabs',
				'option_category'	=> 'configuration',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}"    => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
                    "dvmm_{$button_name}_icon_type" => 'image_icon',
				),
				'upload_button_text'=> esc_attr__( 'Upload an image', 'dvmm-divi-mad-menu' ),
				'choose_text'       => esc_attr__( 'Choose an Image', 'dvmm-divi-mad-menu' ),
				'update_text'       => esc_attr__( 'Set As Icon', 'dvmm-divi-mad-menu' ),
				// 'dynamic_content'   => 'image',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> $button_name,
			),
			"dvmm_{$button_name}_use_fixed_img" => array(
				'label'				=> esc_html__( 'Use Fixed Header Image', 'dvmm-divi-mad-menu' ),
				'description'		=> esc_html__( 'Use a different image icon for the fixed header button.', 'dvmm-divi-mad-menu' ),
				'type'				=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}"    => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
                    "dvmm_{$button_name}_icon_type" => 'image_icon',
					'dvmm_enable_fixed_header' 	    => 'on',
				),
				'options'         	=> array(
					'on'  => esc_html__( 'Yes', 'dvmm-divi-mad-menu' ),
					'off' => esc_html__( 'No', 'dvmm-divi-mad-menu' ),
				),
				'default'			=> 'off',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> $button_name,
			),
			"dvmm_{$button_name}_img_f" => array(
				'label'             => sprintf( esc_html__( '%1$s Image (Fixed)', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'       => esc_html__( 'Upload an image icon for the fixed header button.', 'dvmm-divi-mad-menu' ),
				'type'				=> 'upload',
				'mobile_options'    => true,
				'hover'             => 'tabs',
				'option_category'	=> 'basic_option',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}"    => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
                    "dvmm_{$button_name}_icon_type" => 'image_icon',
                    'dvmm_enable_fixed_header' 	    => 'on',
                    "dvmm_{$button_name}_use_fixed_img" => 'on',
				),
				'upload_button_text'=> esc_attr__( 'Upload an image', 'dvmm-divi-mad-menu' ),
				'choose_text'       => esc_attr__( 'Choose an Image', 'dvmm-divi-mad-menu' ),
				'update_text'       => esc_attr__( 'Set As Icon', 'dvmm-divi-mad-menu' ),
				// 'dynamic_content'   => 'image',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> $button_name,
			),
			"dvmm_{$button_name}_icon_placement" => array(
				'label'            	=> sprintf( esc_html__( '%1$s Icon Placement', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'       => esc_html__( 'Choose where the button icon should be displayed within the button relatively to the button text.', 'dvmm-divi-mad-menu' ),
				'type'            	=> 'select',
				'mobile_options'  	=> true,
				'responsive'      	=> true,
				'option_category'	=> 'basic_option',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on'
				),
				'options'         	=> array(
					'column-reverse' => esc_html__( 'Above', 'dvmm-divi-mad-menu' ),
					'row'			 => esc_html__( 'Right', 'dvmm-divi-mad-menu' ),
					'column'		 => esc_html__( 'Below', 'dvmm-divi-mad-menu' ),
					'row-reverse'	 => esc_html__( 'Left', 'dvmm-divi-mad-menu' ),
				),
				'default'         	=> 'row',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> $button_name,
			),
			"dvmm_{$button_name}_show_icon" => array(
				'label'            	=> sprintf( esc_html__( '%1$s Icon Visibility', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Set the button icon visibility for each device.', 'dvmm-divi-mad-menu' ),
				'type'            => 'yes_no_button',
				'mobile_options'  => true,
				'responsive'      => true,
				'option_category' => 'layout',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}"	=> 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
				),
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dvmm-divi-mad-menu' ),
					'off' => esc_html__( 'No', 'dvmm-divi-mad-menu' ),
				),
				'default'       => 'on',
				'tab_slug'		=> 'general',
				'toggle_slug'	=> $button_name,
			),
			"dvmm_{$button_name}_url" => array(
				'label'             => sprintf( esc_html__( '%1$s Link URL', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'       => esc_html__( 'Input the destination URL for the button.', 'dvmm-divi-mad-menu' ),
				'type'              => 'text',
				'option_category'   => 'basic_option',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'dynamic_content'   => 'url',
				'tab_slug'         	=> 'general',
				'toggle_slug'       => $button_name,
			),
			"dvmm_{$button_name}_url_new_window" => array(
				'label'             => sprintf( esc_html__( '%1$s Link Target', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'       => esc_html__( 'Here you can choose whether or not the button link opens in a new window', 'dvmm-divi-mad-menu' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'options'           => array(
					'off' => esc_html__( 'In The Same Window', 'dvmm-divi-mad-menu' ),
					'on'  => esc_html__( 'In The New Tab', 'dvmm-divi-mad-menu' ),
				),
				'default_on_front'  => 'off',
				'tab_slug'         	=> 'general',
				'toggle_slug'       => $button_name,
			),
			"dvmm_{$button_name}_rel" => array(
				'label'           => sprintf( esc_html__( '%1$s Relationship', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => et_get_safe_localization( __( "Specify the value of your link's <em>rel</em> attribute. The <em>rel</em> attribute specifies the relationship between the current document and the linked document.<br><strong>Tip:</strong> Search engines can use this attribute to get more information about a link.", 'dvmm-divi-mad-menu' ) ),
				'type'            => 'multiple_checkboxes',
				'option_category' => 'configuration',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'options'         => array(
					'bookmark',
					'external',
					'nofollow',
					'noreferrer',
					'noopener',
				),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'shortcut_index'  => $button_name,
			),
			"dvmm_{$button_name}_img_alt" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Image Alt Text', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Define the HTML ALT text for the button here.', 'dvmm-divi-mad-menu' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}"    => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
                    "dvmm_{$button_name}_icon_type" => 'image_icon',
				),
				'dynamic_content' 	=> 'text',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
			),
			"dvmm_{$button_name}_margin" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Margin', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_margin',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           	=> 'tabs',
				'default'           => '0px|5px|0px|5px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => "{$button_name}_design",
			),
			"dvmm_{$button_name}_margin_f" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Margin (Fixed)', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_margin',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" => 'on',
					'dvmm_enable_fixed_header'	 => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           	=> 'tabs',
				// 'default'           => '0px|5px|0px|5px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => "{$button_name}_design_f",
			),
			"dvmm_{$button_name}_padding" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Padding', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_padding',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           	=> 'tabs',
				'default'           => '10px|10px|10px|10px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => "{$button_name}_design",
			),
			"dvmm_{$button_name}_padding_f" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Padding (Fixed)', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_padding',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" => 'on',
					'dvmm_enable_fixed_header'   => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           	=> 'tabs',
				// 'default'           => '10px|10px|10px|10px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => "{$button_name}_design_f",
			),
			"dvmm_{$button_name}_text_margin" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Text Margin', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_margin',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           	=> 'tabs',
				'default'           => '0px|0px|0px|0px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => "{$button_name}_design",
			),
			"dvmm_{$button_name}_text_margin_f" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Text Margin (Fixed)', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_margin',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" => 'on',
					'dvmm_enable_fixed_header'	 => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           	=> 'tabs',
				// 'default'           => '0px|0px|0px|0px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => "{$button_name}_design_f",
			),
			"dvmm_{$button_name}_icon_size" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Icon Size', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Here you can control the size of the button icon.', 'dvmm-divi-mad-menu' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           	=> 'tabs',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" 	  => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
					"dvmm_{$button_name}_icon_type"   => 'font_icon',
				),
				'allowed_units'     => array( 'px' ),
				'default_unit'      => 'px',
				// 'validate_unit' 	=> false,
				'default'           => '',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => "{$button_name}_design",
			),
			"dvmm_{$button_name}_icon_size_f" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Icon Size (Fixed)', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     	=> esc_html__( 'Here you can control the size of the fixed header button icon.', 'dvmm-divi-mad-menu' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           	=> 'tabs',
				'show_if'			=> array(
					"dvmm_enable_{$button_name}" 	  => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
					"dvmm_{$button_name}_icon_type"   => 'font_icon',
					'dvmm_enable_fixed_header' 		  => 'on',
				),
				'allowed_units'     => array( 'px' ),
				'default_unit'      => 'px',
				// 'validate_unit' 	=> false,
				'default'           => '',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => "{$button_name}_design_f",
			),
			"dvmm_{$button_name}_icon_color" => array(
				'label'           => sprintf( esc_html__( '%1$s Icon Color', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Set the button icon color.', 'dvmm-divi-mad-menu' ),
				'type'            => 'color-alpha',
				'option_category' => 'basic_option',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" 	  => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
					"dvmm_{$button_name}_icon_type"   => 'font_icon',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'custom_color'    => true,
				'default'         => '#666666',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => "{$button_name}_design",
			),
			"dvmm_{$button_name}_icon_color_f" => array(
				'label'           => sprintf( esc_html__( '%1$s Icon Color (Fixed)', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Set the fixed header button icon color.', 'dvmm-divi-mad-menu' ),
				'type'            => 'color-alpha',
				'option_category' => 'basic_option',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" 	  => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
					"dvmm_{$button_name}_icon_type"   => 'font_icon',
					'dvmm_enable_fixed_header' 		  => 'on',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'custom_color'    => true,
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => "{$button_name}_design_f",
			),
			"dvmm_{$button_name}_bg_color" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Background Color', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Set the button background color.', 'dvmm-divi-mad-menu' ),
				'type'            => 'color-alpha',
				'option_category' => 'basic_option',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" => 'on',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'custom_color'    => true,
				'default'         => 'rgba(0,0,0,0)',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => "{$button_name}_design",
			),
			"dvmm_{$button_name}_bg_color_f" => array(
				'label'           	=> sprintf( esc_html__( '%1$s Background Color (Fixed)', 'dvmm-divi-mad-menu' ), $button_label ),
				'description'     => esc_html__( 'Set the fixed header button background color.', 'dvmm-divi-mad-menu' ),
				'type'            => 'color-alpha',
				'option_category' => 'basic_option',
				'show_if'         => array(
					"dvmm_enable_{$button_name}" => 'on',
					'dvmm_enable_fixed_header'   => 'on',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'custom_color'    => true,
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => "{$button_name}_design_f",
			),
		);

		/**
		 * Add the element column layout fields.
		 * 
		 * dvmm_{$button_name}_col_width
		 * dvmm_{$button_name}_col_width_f
		 * dvmm_{$button_name}_col_max_width
		 * dvmm_{$button_name}_col_max_width_f
		 */
		$element_column_layout_fields = $module->helpers()->add_element_column_layout_fields( 
			array(
				'element_name' 	=> "{$button_label}",
				'element_slug' 	=> "{$button_name}",
				'tab_slug'		=> 'advanced',
				'toggle_slug'	=> 'elements_layout',
				'sub_toggle'	=> "{$button_name}",
			)
		);

		/**
		 * Add the element column design fields.
		 * 
		 * dvmm_{$button_name}_col_bg_color
		 * dvmm_{$button_name}_col_bg_color_f
		 */
		$element_column_design_fields = $module->helpers()->add_element_column_design_fields( 
			array(
				'element_name' 	=> "{$button_label}",
				'element_slug' 	=> "{$button_name}",
				'tab_slug'		=> 'advanced',
				'toggle_slug'	=> "{$button_name}_design",
			)
		);

		/**
		 * Add the element alignment fields.
		 * 
		 * dvmm_{$button_name}_vertical_alignment
		 * dvmm_{$button_name}_vertical_alignment_f
		 * dvmm_{$button_name}_horizontal_alignment
		 * dvmm_{$button_name}_horizontal_alignment_f
		 */
		$element_fields = $module->helpers()->add_element_alignment_fields( 
			array(
				'element_name' 		 => "{$button_label}",
				'element_slug' 		 => "{$button_name}", /* required, do not change */
				'setting_base' 		 => "{$button_name}",
				'vertical_options' 	 => "general",
				'horizontal_options' => "general",
				'tab_slug'			 => 'advanced',
				'toggle_slug'		 => 'elements_layout',
				'sub_toggle'		 => "{$button_name}",
			)
		);

		/**
		 * Add the element warning fields.
		 * 
		 * dvmm_{$button_label}_disabled__layout
		 * dvmm_{$button_label}_disabled__layout_f
		 */
		$element_warning_fields = $module->helpers()->add_element_warning_fields( 
			array(
				'element_name' 	=> "{$button_label}",
				'element_slug' 	=> "{$button_name}",
				// 'tab_slug'		=> 'advanced',
				// 'toggle_slug'	=> 'elements_layout',
			)
		);

		// merge fields arrays
		$fields = array_merge(
			$element_fields,
			$element_column_layout_fields,
			$element_column_design_fields,
			$element_warning_fields,
			$fields
		);

        return $fields;
    }

    /**
	 * Advanced fields.
	 * 
	 * @since v1.0.0 
	 */
	public function get_advanced_fields_config() {
        
        // module class
        $this->main_css_element = '%%order_class%%';
        
        $dvmm_menu_inner_container  = "{$this->main_css_element} .dvmm_menu_inner_container";

		// advanced fields
        $advanced_fields = array();

        return $advanced_fields;

	}

	/**
	 * Manage the button wrapper data attributes.
	 * 
	 * Adds attributes both for the normal and fixed header
	 * if fixed header is enabled and there are fixed header specific data attributes defined.
	 * 
	 * @since   v1.0.0
	 * 
	 * @param	object	$module				Module object.
	 * @param	array	$processed_props	Processed props.
	 * @param	string	$button_name		Button name ('button_one' or 'button_two').
	 * 
	 * @return	array						Menu CTA button wrapper data attributes.
	 */
	public function wrapper_data_attributes( $module, $processed_props = array(), $button_name ){

		/**
		 * Props
		 */
		$_is_fixed_enabled = $processed_props['is_fixed_enabled'];
		
		/**
		 * Data attributes
		 */
		// button wrapper data attributes array
		$button_wrap_data_attributes = [];

		// FIXED HEADER
		if( $_is_fixed_enabled === true ){
			
		}

		return $button_wrap_data_attributes;
	}

	/**
	 * Manage the button data attributes (the <a></a> tag data attributes).
	 * 
	 * Adds attributes both for the normal and fixed header
	 * if fixed header is enabled and there are fixed header specific data attributes defined.
	 * 
	 * @since   v1.0.0
	 * 
	 * @param	object	$module				Module object.
	 * @param	array	$processed_props	Processed props.
	 * @param	string	$button_name		Button name ('button_one' or 'button_two').
	 * 
	 * @return	array						Menu CTA button wrapper data attributes.
	 */
	public function button_data_attributes( $module, $render_slug, $processed_props = array(), $button_name ){

		/**
		 * Props
		 */
		$_is_fixed_enabled = $processed_props['is_fixed_enabled'];
		
		/**
		 * Data attributes
		 */
		// button wrapper data attributes array
		$button_data_attributes = [];

		// FIXED HEADER
		if( $_is_fixed_enabled === true ){

		}

		return $button_data_attributes;
	}

	/**
	 * Manage the button wrapper classes.
	 * 
	 * @since   v1.0.0
	 * 
	 * @param	object	$module				Module object.
	 * @param	array	$processed_props	Processed props.
	 * @param	string	$button_name		Button name ('button_one' or 'button_two').
	 * 
	 * @return	array						Menu CTA button wrapper CSS classes.
	 */
	public function button_wrap_classes( $module, $processed_props, $button_name ){

		// PROPS
		$_is_fixed_enabled 	= $processed_props['is_fixed_enabled'];
		$use_fixed_img 		= $module->props["dvmm_{$button_name}_use_fixed_img"];

		// button wrapper classes array
		$button_wrap_classes = ["dvmm_element", "dvmm_button__wrap", "dvmm_{$button_name}__wrap"];

		// Maybe hide this element when search form appears
		$search_hide_elems_class = $module->helpers()->maybe_hide_element_when_search_opens($module->props, $button_name);

		// add fixed header button image class if fixed image is enabled
		if( $_is_fixed_enabled === true && $use_fixed_img === 'on' ){
			$use_fixed_img_class = 'dvmm_fixed_image_enabled';
			$button_wrap_classes[] = $use_fixed_img_class;
		}

		// add to button wrapper classes array
		$button_wrap_classes[] = $search_hide_elems_class;

		return $button_wrap_classes;
	}

    /**
     * Manage the button classes.
	 * Manages the CSS classes of the button(s).
     * 
     * @since   v1.0.0
     * 
	 * @param	object	$module				Module object.
	 * @param	array	$processed_props	Processed props.
	 * @param	string	$button_name		Button name ('button_one' or 'button_two').
	 * 
     * @return	array						Menu button CSS classes.
     */
	public function button_classes( $module, $processed_props, $button_name ){

		/**
		 * Processed props
		 */
		$_is_fixed_enabled 	= $processed_props['is_fixed_enabled'];

		// Button classes
		$button_classes = ["dvmm_button", "dvmm_{$button_name}"];

		// FIXED
		if( $_is_fixed_enabled === true ){

		}

		return $button_classes;
	}

	/**
	 * Botton(s) CSS styles.
	 * 
	 * @since	v1.0.0
	 * 
	 * @param	object	$module				Module object.
	 * @param	string	$render_slug		Module slug.
	 * @param	string	$processed_props	Processed props.
	 * @param	string	$button_name		Button name ('button_one' or 'button_two').
	 */
	public function css( $module, $render_slug, $processed_props, $button_name ){

		/**
		 * Processed props
		 */
		$_is_fixed_enabled 	= $processed_props['is_fixed_enabled'];
		$enable_icon	= isset($processed_props['_enable_icon']) ? $processed_props['_enable_icon'] : '';
		$icon_type		= isset($processed_props['_icon_type']) ? $processed_props['_icon_type'] : '';
		$_icon_desktop 	= isset($processed_props['_icon']) ? $processed_props['_icon'] : '';
		$_icon_tablet 	= isset($processed_props['_icon_tablet']) ? $processed_props['_icon_tablet'] : '';
		$_icon_phone 	= isset($processed_props['_icon_phone']) ? $processed_props['_icon_phone'] : '';

		/**
		 * Selectors
		 */
		$dvmm_menu_inner_container 	= "{$module->main_css_element} .dvmm_menu_inner_container";
		$dvmm_button__wrap 			= "{$module->main_css_element} .dvmm_{$button_name}__wrap";
		$dvmm_button 				= "{$module->main_css_element} .dvmm_{$button_name}";

		// Button visibility
		$module->helpers()->declare_element_responsive_visibility_css( 
			$module->props, 
			"dvmm_show_{$button_name}",
			"{$dvmm_button__wrap}",
			$render_slug
		);

		// Button order (range)
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_order",
			'selector' 			=> $dvmm_button__wrap,
			'property' 			=> 'order',
			'additional_css'	=> '',
			'field_type'		=> '', // don't set for 'range' field type
			'priority'			=> ''
		));

		// Button column width
		$module->helpers()->declare_element_column_width_css( $module->props, $render_slug, array( 
			'setting' 		=> "dvmm_{$button_name}_col_width",
			'setting_fixed'	=> "dvmm_{$button_name}_col_width_f",
			'selector' 		=> array(
				'normal'	=> "{$module->main_css_element} .dvmm_{$button_name}__wrap",
				'fixed'		=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}__wrap",
			),
		));

		// Button column max-width
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_col_max_width",
			'setting_fixed'		=> "dvmm_{$button_name}_col_max_width_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'	=> "{$module->main_css_element} .dvmm_{$button_name}__wrap",
				'fixed'		=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}__wrap",
			),
			'property' 			=> 'max-width',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));

		// Button column background color
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_col_bg_color",
			'setting_fixed'		=> "dvmm_{$button_name}_col_bg_color_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$module->main_css_element} .dvmm_{$button_name}__wrap",
				'normal_hover'	=> "{$module->main_css_element} .dvmm_{$button_name}__wrap:hover",
				'fixed'			=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}__wrap",
				'fixed_hover'	=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}__wrap:hover",
			),
			'property' 			=> 'background-color',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));

		// Button vertical alignment
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_vertical_alignment",
			'setting_fixed'		=> "dvmm_{$button_name}_vertical_alignment_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'	=> "{$module->main_css_element} .dvmm_{$button_name}__wrap",
				'fixed'		=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}__wrap",
			),
			'property' 			=> 'align-items',
			'additional_css'	=> '',
			'field_type'		=> 'select',
			'priority'			=> ''
		));

		// Button horizontal alignment
		$module->helpers()->declare_element_content_horizontal_alignment_css( $module->props, $render_slug, array( 
			'setting' 		=> "dvmm_{$button_name}_horizontal_alignment",
			'setting_fixed'	=> "dvmm_{$button_name}_horizontal_alignment_f",
			'selector' 		=> array(
				'normal'			=> "{$module->main_css_element} .dvmm_{$button_name}__wrap", // container
				'normal_stretch'	=> "{$module->main_css_element} .dvmm_{$button_name}__wrap .dvmm_{$button_name}", // item(content)
				'fixed'				=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}__wrap",
				'fixed_stretch'		=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}__wrap .dvmm_{$button_name}",
			),
		));

		// Button icon position
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array(
			'setting' 			=> "dvmm_{$button_name}_icon_placement",
			'selector' 			=> $dvmm_button,
			'property' 			=> 'flex-flow',
			'additional_css'	=> '',
			'field_type'		=> 'select',
			'priority'			=> ''
		));

		// Button icon visibility
		$module->helpers()->declare_element_responsive_visibility_css( 
			$module->props, 
			"dvmm_{$button_name}_show_icon",
			"{$dvmm_button__wrap} .dvmm_button_icon",
			$render_slug
		);

		/**
		 * Declare the button font icon CSS
		 * if the icon enabled and the 'font_icon' type selected.
		 */
		if($enable_icon === 'on' && $icon_type === 'font_icon'){

			// Desktop
			$icon_desktop = $_icon_desktop !== '' ? sprintf(
				'content: "%1$s"',
				// process icon for CSS by adding 'true'(boolean)
				esc_attr( $module->helpers()->process_font_icon( $_icon_desktop, true ) )
			) : '';

			// Tablet icon
			$icon_tablet = $_icon_tablet !== '' ? sprintf(
				'content: "%1$s"',
				esc_attr( $module->helpers()->process_font_icon( $_icon_tablet, true ) )
			) : '';

			// Phone icon
			$icon_phone = $_icon_phone !== '' ? sprintf(
				'content: "%1$s"',
				esc_attr( $module->helpers()->process_font_icon( $_icon_phone, true ) )
			) : '';

			/**
			 * Declare the button icon 'content' property CSS 
			 */
			// Declare responsive styles.
			et_pb_responsive_options()->declare_responsive_css(
				array(
					'desktop' 	=> $icon_desktop,
					'tablet' 	=> $icon_tablet,
					'phone' 	=> $icon_phone,
				),
				"{$dvmm_button__wrap} .dvmm_button_icon.dvmm_icon_type--font_icon:after",
				$render_slug
			);
		} // END button font icon CSS
		// Button margin
		$module->helpers()->generate_responsive_css__spacing( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_margin",
			'setting_fixed'		=> "dvmm_{$button_name}_margin_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$module->main_css_element} .dvmm_{$button_name}",
				'normal_hover'	=> "{$module->main_css_element} .dvmm_{$button_name}:hover",
				'fixed'			=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}",
				'fixed_hover'	=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}:hover",
			),
			'property' 			=> 'margin',
			'additional_css'	=> '',
			'field_type'		=> 'custom_margin',
			'priority'			=> ''
		));
		// Button padding
		$module->helpers()->generate_responsive_css__spacing( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_padding",
			'setting_fixed'		=> "dvmm_{$button_name}_padding_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$module->main_css_element} .dvmm_{$button_name}",
				'normal_hover'	=> "{$module->main_css_element} .dvmm_{$button_name}:hover",
				'fixed'			=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}",
				'fixed_hover'	=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}:hover",
			),
			'property' 			=> 'padding',
			'additional_css'	=> '',
			'field_type'		=> 'custom_padding',
			'priority'			=> ''
		));
		// Button Text margin
		$module->helpers()->generate_responsive_css__spacing( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_text_margin",
			'setting_fixed'		=> "dvmm_{$button_name}_text_margin_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$module->main_css_element} .dvmm_{$button_name} .dvmm_button_text",
				'normal_hover'	=> "{$module->main_css_element} .dvmm_{$button_name}:hover .dvmm_button_text",
				'fixed'			=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name} .dvmm_button_text",
				'fixed_hover'	=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}:hover .dvmm_button_text",
			),
			'property' 			=> 'margin',
			'additional_css'	=> '',
			'field_type'		=> 'custom_margin',
			'priority'			=> ''
		));
		// Button icon size
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_icon_size",
			'setting_fixed'		=> "dvmm_{$button_name}_icon_size_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$module->main_css_element} .dvmm_{$button_name} .dvmm_button_icon",
				'normal_hover'	=> "{$module->main_css_element} .dvmm_{$button_name}:hover .dvmm_button_icon",
				'fixed'			=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name} .dvmm_button_icon",
				'fixed_hover'	=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}:hover .dvmm_button_icon",
			),
			'property' 			=> 'font-size',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));
		// Button icon color
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_icon_color",
			'setting_fixed'		=> "dvmm_{$button_name}_icon_color_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$module->main_css_element} .dvmm_{$button_name} .dvmm_button_icon",
				'normal_hover'	=> "{$module->main_css_element} .dvmm_{$button_name}:hover .dvmm_button_icon",
				'fixed'			=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name} .dvmm_button_icon",
				'fixed_hover'	=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}:hover .dvmm_button_icon",
			),
			'property' 			=> 'color',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));
		// Button background color
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> "dvmm_{$button_name}_bg_color",
			'setting_fixed'		=> "dvmm_{$button_name}_bg_color_f",
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$module->main_css_element} .dvmm_{$button_name}",
				'normal_hover'	=> "{$module->main_css_element} .dvmm_{$button_name}:hover",
				'fixed'			=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}",
				'fixed_hover'	=> "{$module->main_css_element} .dvmm_fixed .dvmm_{$button_name}:hover",
			),
			'property' 			=> 'background-color',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));

		/**
		 * Transitions. Do we need to declare for buttons separately?
		 */
		// $module->helpers()->declare_responsive_transition_styles($module, $render_slug, array(
		// 	'properties' 	 => array('all'),
		// 	'selector'		 => "{$this->main_css_element} .dvmm_button",
		// 	'additional_css' => '',
		// ));

	}
    
    /**
	 * Render CTA button(s).
	 *
	 * @since v1.0.0
	 * 
	 * @param	object	$module				Module object.
	 * @param	array	$processed_props	Processed props.
	 * @param	string	$render_slug		Module slug.
	 * @param	string	$button_name		Rendered button('button_one' or 'button_two').
	 *
	 * @return string
	 */
	public function render( $module, $processed_props, $render_slug, $button_name ) {

		// return empty if this element is disabled or not visible
        if ( ! $module->helpers()->maybe_render_element( $module->props, $button_name ) ) {
			return '';
		}

		/**
		 * Props
		 */
		// button relationship
		$button_rel	= $module->props["dvmm_{$button_name}_rel"];

		// multi view
		$multi_view	= et_pb_multi_view_options( $module );

		// enable button icon
		$enable_icon = $module->props["dvmm_{$button_name}_enable_icon"];

		// selected icon type
		$icon_type = $module->props["dvmm_{$button_name}_icon_type"];

		// button link target
		$link_target = '';

		/**
		 * Processed props
		 */
		$_is_fixed_enabled 	= $processed_props['is_fixed_enabled'];

		// module class
		$this->main_css_element = '%%order_class%%';
		
		// icon values
		$_icons			= et_pb_responsive_options()->get_property_values( $module->props, "dvmm_{$button_name}_icon" );
		$_icon			= isset( $_icons['desktop'] ) ? $_icons['desktop'] : '';
		$_icon_tablet	= isset( $_icons['tablet'] ) ? $_icons['tablet'] : '';
		$_icon_phone	= isset( $_icons['phone'] ) ? $_icons['phone'] : '';
		$_is_any_icon_set	= ('' !== $_icon || '' !== $_icon_tablet || '' !== $_icon_phone) ? true : false;
        
		// Background layout data attributes.
		$data_background_layout = et_pb_background_layout_options()->get_background_layout_attrs( $module->props );

		// Background layout class names.
		$background_layout_class_names = et_pb_background_layout_options()->get_background_layout_class( $module->props );
		$module->add_classname( $background_layout_class_names );

		// Module classnames
		// $module->remove_classname( 'et_pb_module' ); // Why ?!

		/**
		 * PROPCESSED PROPS(NORMAL)
		 */
		$_processed_props = array(
			'_enable_icon'		=> $enable_icon,
			'_icon_type'		=> $icon_type,
			'_icon'         	=> $_icon,
			'_icon_tablet'  	=> $_icon_tablet,
			'_icon_phone'   	=> $_icon_phone,
			'_is_any_icon_set' 	=> $_is_any_icon_set,
		);

		// FIXED HEADER
		if( $_is_fixed_enabled === true ){

			/**
			 * PROPCESSED PROPS(FIXED)
			 */
			$_processed_props_f = array(

			);

			// merge processed props with 'fixed' processed props
			$_processed_props = array_merge( $_processed_props, $_processed_props_f );

		}

		/**
		 * BUTTON TEXT
		 */
		// button text
		$button_text = $multi_view->render_element( array(
			// 'tag'	  => 'span',
			'content' => "{{dvmm_{$button_name}_text}}",
			'attrs'	  => array(
				'class' => 'dvmm_button_text',
			),
			'required'	=> array(
				"dvmm_enable_{$button_name}" => 'on',
				"dvmm_{$button_name}_text"	 => '__not_empty'
			),
			'hover_selector' => "{$this->main_css_element} .dvmm_{$button_name}",
		) );
		// END BUTTON TEXT

		/**
		 * BUTTON ICON/IMAGE
		 */
		// button image (normal)
		$img_alt             	= $module->props["dvmm_{$button_name}_img_alt"];
		$button_url            	= trim( $module->props["dvmm_{$button_name}_url"] );
		$button_url_new_window 	= $module->props["dvmm_{$button_name}_url_new_window"];
		$img_html = $multi_view->render_element( array(
			'tag'            => 'img',
			'attrs'          => array(
				'src' => "{{dvmm_{$button_name}_img}}",
				'alt' => $img_alt,
			),
			'classes'		 => array(
				'dvmm_button_img' => array(
					"dvmm_enable_{$button_name}" => 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
                    "dvmm_{$button_name}_icon_type" => 'image_icon',
				)
			),
			'required'       => array(
                "dvmm_enable_{$button_name}" 	=> 'on',
				"dvmm_{$button_name}_enable_icon" => 'on',
				"dvmm_{$button_name}_icon_type" => 'image_icon',
				"dvmm_{$button_name}_img"		=> '__not_empty'
            ),
			'hover_selector' => "{$this->main_css_element} .dvmm_{$button_name}",
		) );

		// button image (fixed)
		$img_html_f = $multi_view->render_element( array(
			'tag'            => 'img',
			'attrs'          => array(
				'src' => "{{dvmm_{$button_name}_img_f}}",
				'alt' => $img_alt,
			),
			'classes'		 => array(
				'dvmm_button_img__fixed' => array(
					"dvmm_enable_{$button_name}" 	=> 'on',
					"dvmm_{$button_name}_enable_icon" => 'on',
					"dvmm_enable_fixed_header" 		=> 'on',
					"dvmm_{$button_name}_use_fixed_img" => 'on',
                    "dvmm_{$button_name}_icon_type" 	=> 'image_icon',
				)
			),
			'required'       => array(
				"dvmm_enable_{$button_name}" 		=> 'on',
				"dvmm_{$button_name}_enable_icon" 	=> 'on',
				"dvmm_enable_fixed_header" 			=> 'on',
				"dvmm_{$button_name}_use_fixed_img" => 'on',
				"dvmm_{$button_name}_icon_type" 	=> 'image_icon',
				"dvmm_{$button_name}_img_f"			=> '__not_empty'
			),
			'hover_selector' => "{$this->main_css_element} .dvmm_{$button_name}",
		) );

		// check if the button image icon fields have any values (for desktop, hover, tablet and phone)
		// render button image icon <img /> tag conditionally (NORMAL)
		$img_values = $module->helpers()->get_property_values_all( $module->props, "dvmm_{$button_name}_img", '', false );
		if($img_values['responsive'] === 'off'){
			$_img_html = ($img_values['desktop'] === '' && $img_values['hover'] === '') ? '' : $img_html;
		} else {
			$_img_html = $img_html;
		}

		// render button image icon <img /> tag conditionally (FIXED)
		$img_values_f = $module->helpers()->get_property_values_all( $module->props, "dvmm_{$button_name}_img_f", '', false );
		if($img_values_f['responsive'] === 'off'){
			$_img_html_f = ($img_values_f['desktop'] === '' && $img_values_f['hover'] === '') ? '' : $img_html_f;
		} else {
			$_img_html_f = $img_html_f;
		}

		// button icon container
		$dvmm_button_icon_container = $enable_icon === 'on' ? sprintf(
				'<span class="dvmm_button_icon dvmm_icon_type--%1$s">
					%2$s
					%3$s
				</span>',
				esc_attr( $icon_type ),
				et_core_esc_previously( $_img_html ),
				et_core_esc_previously( $_img_html_f )
			) : '';

		/**
		 * Don't render empty icon container if the icon is enabled and
		 * the 'image_icon' type is selected but no image icons set/uploaded.
		 * 
		 * @todo this is a TEMPORARY condition, need a better/cleaner way to do this.
		 * 
		 */
		if( $enable_icon === 'on' && $icon_type === 'image_icon' ){
			$dvmm_button_icon_container = $_img_html === '' && $_img_html_f === '' ? '' : $dvmm_button_icon_container;
		}
		// END BUTTON ICON/IMAGE

		if ( ! empty( $button_url ) ) {
			$link_target = ( 'on' === $button_url_new_window ) ? 'target="_blank"' : '';
		}

		// merge all processed props
		$processed_props = array_merge( $processed_props, $_processed_props );

		// get the button wrapper classes
		$button_wrap_classes = implode(' ', $this->button_wrap_classes( $module, $processed_props, $button_name ) );

		// get the button wrapper data attributes (for both normal and fixed headers)
		$button_wrap_data_attrs = implode(' ', $this->wrapper_data_attributes( $module, $processed_props, $button_name ) );

		// get the button data attributes (for both normal and fixed headers)
		$button_data_attrs = implode(' ', $this->button_data_attributes( $module, $render_slug, $processed_props, $button_name ) );

		// get button classes (for both normal and fixed headers)
		$button_classes = $this->button_classes( $module, $processed_props, $button_name );

		// add button CSS
		$this->css( $module, $render_slug, $processed_props, $button_name );

		// Render output
		$output = sprintf(
			'<div class="%1$s" %2$s>
				<a href="%3$s" %4$s %5$s class="%6$s" %7$s>
					%8$s
					%9$s
				</a>
			</div>',
			esc_attr( $button_wrap_classes ),
			et_core_esc_previously( $button_wrap_data_attrs ),
			esc_url( $button_url ),
			et_core_intentionally_unescaped( $link_target, 'fixed_string' ),
			et_core_esc_previously( $module->get_rel_attributes( $button_rel ) ),
			esc_attr( implode( ' ', array_unique( $button_classes ) ) ),
			et_core_esc_previously( $button_data_attrs ),
			et_core_esc_previously( $button_text ),
			et_core_esc_previously( $dvmm_button_icon_container )
		);

		return $output;
	}
}

/**
 * Intstantiates the DVMM_Menu_CTA_Button class.
 * 
 * @since   1.0.0
 * 
 * @return  Instance of the DVMM_Menu_CTA_Button class.
 * 
 */
function dvmm_menu_cta_button_class_instance( ) {
	return DVMM_Menu_CTA_Button::instance( );
}