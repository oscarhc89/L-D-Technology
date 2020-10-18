<?php

// Die if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

/**
 * Shopping Cart.
 * 
 * Generates the shopping cart icon.
 *
 * @since   1.0.0 
 * 
 */
class DVMM_Menu_Shopping_Cart {

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
	 * @param	object	$module		Module.
	 * 
	 */
	public function get_fields( $module ) {
        $fields = array(
			'dvmm_enable_cart' => array(
				'label'           => esc_html__( 'Enable Cart', 'dvmm-divi-mad-menu' ),
				'description'     => esc_html__( 'Add the shopping cart element to the header.', 'dvmm-divi-mad-menu' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dvmm-divi-mad-menu' ),
					'off' => esc_html__( 'No', 'dvmm-divi-mad-menu' ),
				),
				'affects'		=> array(
					'border_radii_dvmm_cart_btn',
					'border_radii_dvmm_cart_btn_f',
				),
				'default'       => 'off',
				'tab_slug'      => 'general',
				'toggle_slug'	=> 'header_elements',
			),
			'dvmm_show_cart_icon' => array(
				'label'           => esc_html__( 'Show Cart', 'dvmm-divi-mad-menu' ),
				'description'     => esc_html__( 'Set the Cart element responsive visibility.', 'dvmm-divi-mad-menu' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'show_if'			=> array(
					'dvmm_enable_cart' => 'on',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dvmm-divi-mad-menu' ),
					'off' => esc_html__( 'No', 'dvmm-divi-mad-menu' ),
				),
				'default'         => 'on',
				'tab_slug'          => 'custom_css',
				'toggle_slug'       => 'visibility',
			),
			'dvmm_cart_order' => array(
				'label'			=> esc_html__( 'Cart Order', 'dvmm-divi-mad-menu' ),
				'description'	=> esc_html__( 'Here you can set the element order. Element order is set relatively to other enabled elements, a higher order number moves the element closer to the right hand side of the header.', 'dvmm-divi-mad-menu' ),
				'type'				=> 'range',
                'mobile_options'	=> true,
                'responsive'		=> true,
				'option_category'	=> 'layout',
				'show_if'			=> array(
					'dvmm_enable_cart' => 'on',
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
			'dvmm_cart_icon_image' => array(
				'label'           	=> esc_html__( 'Cart Icon/Image', 'dvmm-divi-mad-menu' ),
				'description'       => esc_html__( 'Use either the default font icon or upload a custom image icon for the cart.', 'dvmm-divi-mad-menu' ),
				'type'            	=> 'select',
				'option_category'	=> 'basic_option',
				'show_if'         => array(
					'dvmm_enable_cart' => 'on',
				),
				'options'         	=> array(
					'icon'		=> esc_html__( 'Icon', 'dvmm-divi-mad-menu' ),
					'image'		=> esc_html__( 'Image', 'dvmm-divi-mad-menu' ),
				),
				'default'         	=> 'icon',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> 'cart',
			),
			'dvmm_cart_img' => array(
				'label'             => esc_html__( 'Cart Image', 'dvmm-divi-mad-menu' ),
				'description'       => esc_html__( 'Upload an image to use as a cart icon.', 'dvmm-divi-mad-menu' ),
				'type'				=> 'upload',
				'option_category'	=> 'basic_option',
				'show_if'			=> array(
					'dvmm_enable_cart' 		=> 'on',
					'dvmm_cart_icon_image' 	=> 'image',
				),
				'mobile_options'    => true,
				'hover'             => 'tabs',
				'upload_button_text'=> esc_attr__( 'Upload an image', 'dvmm-divi-mad-menu' ),
				'choose_text'       => esc_attr__( 'Choose an Image', 'dvmm-divi-mad-menu' ),
				'update_text'       => esc_attr__( 'Set As Cart Icon', 'dvmm-divi-mad-menu' ),
				// 'dynamic_content'   => 'image',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> 'cart',
			),
			'dvmm_use_fixed_cart_img' => array(
				'label'				=> esc_html__( 'Use Fixed Header Cart Image', 'dvmm-divi-mad-menu' ),
				'description'		=> esc_html__( 'Use a different image for the fixed header.', 'dvmm-divi-mad-menu' ),
				'type'				=> 'yes_no_button',
				'option_category' 	=> 'configuration',
				'show_if'			=> array(
					'dvmm_enable_cart' 			=> 'on',
					'dvmm_cart_icon_image' 		=> 'image',
					'dvmm_enable_fixed_header' 	=> 'on',
				),
				'options'         	=> array(
					'on'  => esc_html__( 'Yes', 'dvmm-divi-mad-menu' ),
					'off' => esc_html__( 'No', 'dvmm-divi-mad-menu' ),
				),
				'default'			=> 'off',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> 'cart',
			),
			'dvmm_cart_img_f' => array(
				'label'             => esc_html__( 'Cart Image (Fixed)', 'dvmm-divi-mad-menu' ),
				'description'       => esc_html__( 'Upload the fixed header cart image.', 'dvmm-divi-mad-menu' ),
				'type'				=> 'upload',
				'option_category'	=> 'basic_option',
				'show_if'			=> array(
					'dvmm_enable_cart' 		=> 'on',
					'dvmm_cart_icon_image' 	=> 'image',
					'dvmm_enable_fixed_header' 	=> 'on',
					'dvmm_use_fixed_cart_img'	=> 'on',
				),
				'mobile_options'    => true,
				'hover'             => 'tabs',
				'upload_button_text'=> esc_attr__( 'Upload an image', 'dvmm-divi-mad-menu' ),
				'choose_text'       => esc_attr__( 'Choose an Image', 'dvmm-divi-mad-menu' ),
				'update_text'       => esc_attr__( 'Set As Cart Icon', 'dvmm-divi-mad-menu' ),
				'dynamic_content'   => 'image',
				'tab_slug'         	=> 'general',
				'toggle_slug'      	=> 'cart',
			),
			'dvmm_cart_btn_margin' => array(
				'label'             => esc_html__( 'Cart Margin', 'dvmm-divi-mad-menu' ),
				'description'     	=> esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_margin',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					'dvmm_enable_cart' => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           => 'tabs',
				'default'           => '0px|5px|0px|5px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'cart_design',
			),
			'dvmm_cart_btn_margin_f' => array(
				'label'             => esc_html__( 'Cart Margin (Fixed)', 'dvmm-divi-mad-menu' ),
				'description'     	=> esc_html__( 'Margin adds extra space to the outside of the element, increasing the distance between the element and other items on the page.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_margin',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					'dvmm_enable_fixed_header' 	=> 'on',
					'dvmm_enable_cart' 			=> 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           => 'tabs',
				// 'default'           => '0px|5px|0px|5px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'cart_design_f',
			),
			'dvmm_cart_btn_padding' => array(
				'label'             => esc_html__( 'Cart Padding', 'dvmm-divi-mad-menu' ),
				'description'     	=> esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_padding',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					'dvmm_enable_cart' => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           => 'tabs',
				'default'           => '20px|20px|20px|20px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'cart_design',
			),
			'dvmm_cart_btn_padding_f' => array(
				'label'             => esc_html__( 'Cart Padding (Fixed)', 'dvmm-divi-mad-menu' ),
				'description'     	=> esc_html__( 'Padding adds extra space to the inside of the element, increasing the distance between the edge of the element and its inner contents.', 'dvmm-divi-mad-menu' ),
				'type'              => 'custom_padding',
				'option_category' 	=> 'layout',
				'show_if'         => array(
					'dvmm_enable_fixed_header' => 'on',
					'dvmm_enable_cart' => 'on',
				),
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           => 'tabs',
				// 'default'           => '20px|20px|20px|20px|false|false',
				'default_unit'      => 'px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'cart_design_f',
			),
			'dvmm_cart_icon_size' => array(
				'label'             => esc_html__( 'Cart Icon Size', 'dvmm-divi-mad-menu' ),
				'description'     	=> esc_html__( 'Here you can control the size of the cart icon.', 'dvmm-divi-mad-menu' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           => 'tabs',
				'show_if'			=> array(
					'dvmm_enable_cart'	=> 'on',
					'dvmm_cart_icon_image' => 'icon',
				),
				'allowed_units'     => array( 'px' ),
				'default_unit'      => 'px',
				// 'validate_unit' 	=> false,
				'default'           => '18px',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'cart_design',
			),
			'dvmm_cart_icon_size_f' => array(
				'label'             => esc_html__( 'Cart Icon Size (Fixed)', 'dvmm-divi-mad-menu' ),
				'description'     	=> esc_html__( 'Here you can control the size of the fixed header cart icon.', 'dvmm-divi-mad-menu' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'mobile_options'    => true,
				'responsive'        => true,
				'hover'           => 'tabs',
				'show_if'			=> array(
					'dvmm_enable_cart'	=> 'on',
					'dvmm_cart_icon_image' => 'icon',
					'dvmm_enable_fixed_header' => 'on',
				),
				'allowed_units'     => array( 'px' ),
				'default_unit'      => 'px',
				// 'validate_unit' 	=> false,
				'default'           => '',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'cart_design_f',
			),
			'dvmm_cart_icon_color' => array(
				'label'           => esc_html__( 'Cart Icon Color', 'dvmm-divi-mad-menu' ),
				'description'     => esc_html__( 'Set the cart icon color.', 'dvmm-divi-mad-menu' ),
				'type'            => 'color-alpha',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'dvmm_enable_cart'	=> 'on',
					'dvmm_cart_icon_image' => 'icon',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'custom_color'    => true,
				'default'         => '#666666',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'cart_design',
			),
			'dvmm_cart_icon_color_f' => array(
				'label'           => esc_html__( 'Cart Icon Color (Fixed)', 'dvmm-divi-mad-menu' ),
				'description'     => esc_html__( 'Set the fixed header cart icon color.', 'dvmm-divi-mad-menu' ),
				'type'            => 'color-alpha',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'dvmm_enable_cart'	=> 'on',
					'dvmm_cart_icon_image' => 'icon',
					'dvmm_enable_fixed_header' => 'on',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'custom_color'    => true,
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'cart_design_f',
			),
			'dvmm_cart_btn_background_color' => array(
				'label'           => esc_html__( 'Cart Background Color', 'dvmm-divi-mad-menu' ),
				'description'     => esc_html__( 'Set the cart button background color.', 'dvmm-divi-mad-menu' ),
				'type'            => 'color-alpha',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'dvmm_enable_cart'	=> 'on',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'custom_color'    => true,
				'default'         => 'rgba(0,0,0,0)',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'cart_design',
			),
			'dvmm_cart_btn_background_color_f' => array(
				'label'           => esc_html__( 'Cart Background Color (Fixed)', 'dvmm-divi-mad-menu' ),
				'description'     => esc_html__( 'Set the fixed header cart button background color.', 'dvmm-divi-mad-menu' ),
				'type'            => 'color-alpha',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'dvmm_enable_cart'	=> 'on',
					'dvmm_enable_fixed_header' => 'on',
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
				'custom_color'    => true,
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'cart_design_f',
			),
		);

		/**
		 * Add the element column layout fields.
		 * 
		 * dvmm_cart_col_width
		 * dvmm_cart_col_width_f
		 * dvmm_cart_col_max_width
		 * dvmm_cart_col_max_width_f
		 */
		$element_column_layout_fields = $module->helpers()->add_element_column_layout_fields( 
			array(
				'element_name' 	=> "Cart",
				'element_slug' 	=> "cart",
				'tab_slug'		=> 'advanced',
				'toggle_slug'	=> 'elements_layout',
				'sub_toggle'	=> 'cart',
			)
		);

		/**
		 * Add the element column design fields.
		 * 
		 * dvmm_cart_col_bg_color
		 * dvmm_cart_col_bg_color_f
		 */
		$element_column_design_fields = $module->helpers()->add_element_column_design_fields( 
			array(
				'element_name' 	=> "Cart",
				'element_slug' 	=> "cart",
				'tab_slug'		=> 'advanced',
				'toggle_slug'	=> 'cart_design',
			)
		);

		/**
		 * Add the element alignment fields.
		 * 
		 * dvmm_cart_vertical_alignment
		 * dvmm_cart_vertical_alignment_f
		 * dvmm_cart_horizontal_alignment
		 * dvmm_cart_horizontal_alignment_f
		 */
		$element_fields = $module->helpers()->add_element_alignment_fields( 
			array(
				'element_name' 		 => "Cart",
				'element_slug' 		 => "cart", /* required, do not change */
				'setting_base' 		 => "cart",
				'vertical_options' 	 => "general",
				'horizontal_options' => "general",
				'tab_slug'			 => 'advanced',
				'toggle_slug'		 => 'elements_layout',
				'sub_toggle'		 => 'cart',
			)
		);

		/**
		 * Add the element warning fields.
		 * 
		 * dvmm_cart_disabled__layout
		 * dvmm_cart_disabled__layout_f
		 */
		$element_warning_fields = $module->helpers()->add_element_warning_fields( 
			array(
				'element_name' 	=> "Cart",
				'element_slug' 	=> "cart",
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
	 */
	public function get_advanced_fields_config() {
        
        // module class
		$this->main_css_element = '%%order_class%%';

		// advanced fields
        $advanced_fields = array();

        return $advanced_fields;

	}

	/**
	 * Custom CSS fields.
	 *
	 * @since v1.0.0
	 *
	 * @param	object	$module		Module object.
	 * 
	 * @return array
	 */
    public function get_custom_css_fields_config( $module ) {

		// selectors
		$dvmm_menu_inner_container = "{$module->main_css_element} .dvmm_menu_inner_container";

		$custom_css_fields = array(
			'dvmm_cart_css' => array(
				'label'    => esc_html__( 'Cart', 'dvmm-divi-mad-menu' ),
				'selector' => "{$dvmm_menu_inner_container} .dvmm_cart__button",
				'show_if'         => array(
					'dvmm_enable_cart'	=> 'on',
				),
			),
			'dvmm_cart_css_f' => array(
				'label'    => esc_html__( 'Cart (Fixed)', 'dvmm-divi-mad-menu' ),
				'selector' => "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_cart__button",
				'show_if'         => array(
					'dvmm_enable_cart'	=> 'on',
					'dvmm_enable_fixed_header' => 'on',
				),
			),
		);

		return $custom_css_fields;
    }

	/**
	 * Manage the shopping cart wrapper classes.
	 * Manages the CSS classes of the .dvmm_cart_button__wrap.
	 * 
	 * @since   v1.0.0
	 * 
	 * @param	object	$module				Module object.
     * @param   array	$processed_props	Processed props.
	 * 
	 * @return	array				Menu shopping cart button wrapper CSS classes.
	 */
	public function manage_cart_wrap_classes( $module, $processed_props ){

		// props
		$is_fixed_enabled = $processed_props['is_fixed_enabled'];
		$use_fixed_cart_img = $module->props['dvmm_use_fixed_cart_img'];
		
		$cart_hide_class = '';

		// menu cart button wrapper classes array (.dvmm_cart_button__wrap)
		$cart_wrap_classes = ['dvmm_element', 'dvmm_cart_button__wrap'];

		// Maybe hide this element when search form appears
		$search_hide_elems_class = $module->helpers()->maybe_hide_element_when_search_opens($module->props, 'cart');

		// add fixed header cart image class if enabled
		if( $is_fixed_enabled === true && $use_fixed_cart_img === 'on' ){
			$use_fixed_cart_img_class = 'dvmm_fixed_image_enabled';
			$cart_wrap_classes[] = $use_fixed_cart_img_class;
		}

		// add to cart button wrapper classes array
		$cart_wrap_classes[] = $cart_hide_class;
		$cart_wrap_classes[] = $search_hide_elems_class;

		return $cart_wrap_classes;
	}

    /**
     * Manage the shopping cart classes.
	 * Manages the CSS classes of the .dvmm_cart__button.
     * 
     * @since   v1.0.0
     * 
	 * @param   object	$module             Module object.
	 * 
     * @return	array	Menu shopping cart button CSS classes.
     */
	public function manage_cart_classes( $module ){

		$cart_icon_image = $module->props['dvmm_cart_icon_image'];

		// menu cart button classes array (.dvmm_cart__button)
		$cart_classes = ['dvmm_icon', 'dvmm_cart__button'];

		// cart icon/image class
		$cart_icon_image_class = $cart_icon_image === 'image' ? "dvmm_cart--image" : "dvmm_cart--icon";

		// add to cart button classes array
		$cart_classes[] = $cart_icon_image_class;

		return $cart_classes;
	}

	/**
	 * Cart CSS styles.
	 * 
	 * @since	v1.0.0
	 * 
	 * @param	object	$module			Module object.
	 * @param	string	$render_slug	Module slug.
	 */
	public function css( $module, $render_slug ){

		// SELECTORS
		$dvmm_menu_inner_container 	= "{$module->main_css_element} .dvmm_menu_inner_container";
		$dvmm_cart_button__wrap 	= "{$module->main_css_element} .dvmm_cart_button__wrap";

		// Cart visibility
		$module->helpers()->declare_element_responsive_visibility_css( 
			$module->props, 
			"dvmm_show_cart_icon",
			"{$dvmm_cart_button__wrap}",
			$render_slug
		);

		// Cart order (range)
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_order',
			'selector' 			=> $dvmm_cart_button__wrap,
			'property' 			=> 'order',
			'additional_css'	=> '',
			'field_type'		=> '', // don't set for 'range' field type
			'priority'			=> ''
		));

		// Cart column width
		$module->helpers()->declare_element_column_width_css( $module->props, $render_slug, array( 
			'setting' 		=> 'dvmm_cart_col_width',
			'setting_fixed'	=> 'dvmm_cart_col_width_f',
			'selector' 		=> array(
				'normal'	=> "{$module->main_css_element} .dvmm_cart_button__wrap",
				'fixed'		=> "{$module->main_css_element} .dvmm_fixed .dvmm_cart_button__wrap",
			),
		));

		// Cart column max-width
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_col_max_width',
			'setting_fixed'		=> 'dvmm_cart_col_max_width_f',
			'default'			=> '',
			'selector' 			=> array(
				'normal'	=> "{$module->main_css_element} .dvmm_cart_button__wrap",
				'fixed'		=> "{$module->main_css_element} .dvmm_fixed .dvmm_cart_button__wrap",
			),
			'property' 			=> 'max-width',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));

		// Cart column background color
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_col_bg_color',
			'setting_fixed'		=> 'dvmm_cart_col_bg_color_f',
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$module->main_css_element} .dvmm_cart_button__wrap",
				'normal_hover'	=> "{$module->main_css_element} .dvmm_cart_button__wrap:hover",
				'fixed'			=> "{$module->main_css_element} .dvmm_fixed .dvmm_cart_button__wrap",
				'fixed_hover'	=> "{$module->main_css_element} .dvmm_fixed .dvmm_cart_button__wrap:hover",
			),
			'property' 			=> 'background-color',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));

		// Cart vertical alignment
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_vertical_alignment',
			'setting_fixed'		=> 'dvmm_cart_vertical_alignment_f',
			'default'			=> '',
			'selector' 			=> array(
				'normal'	=> "{$module->main_css_element} .dvmm_cart_button__wrap",
				'fixed'		=> "{$module->main_css_element} .dvmm_fixed .dvmm_cart_button__wrap",
			),
			'property' 			=> 'align-items',
			'additional_css'	=> '',
			'field_type'		=> 'select',
			'priority'			=> ''
		));

		// Cart horizontal alignment
		$module->helpers()->declare_element_content_horizontal_alignment_css( $module->props, $render_slug, array( 
			'setting' 		=> 'dvmm_cart_horizontal_alignment',
			'setting_fixed'	=> 'dvmm_cart_horizontal_alignment_f',
			'selector' 		=> array(
				'normal'			=> "{$module->main_css_element} .dvmm_cart_button__wrap", // container
				'normal_stretch'	=> "{$module->main_css_element} .dvmm_cart_button__wrap .dvmm_cart__button", // item(content)
				'fixed'				=> "{$module->main_css_element} .dvmm_fixed .dvmm_cart_button__wrap",
				'fixed_stretch'		=> "{$module->main_css_element} .dvmm_fixed .dvmm_cart_button__wrap .dvmm_cart__button",
			),
		));

		// Cart button margin
		$module->helpers()->generate_responsive_css__spacing( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_btn_margin',
			'setting_fixed'		=> 'dvmm_cart_btn_margin_f',
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$dvmm_menu_inner_container} .dvmm_cart__button",
				'normal_hover'	=> "{$dvmm_menu_inner_container} .dvmm_cart__button:hover",
				'fixed'			=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_cart__button",
				'fixed_hover'	=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_cart__button:hover",
			),
			'property' 			=> 'margin',
			'additional_css'	=> '',
			'field_type'		=> 'custom_margin',
			'priority'			=> ''
		));	
		// Cart button padding
		$module->helpers()->generate_responsive_css__spacing( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_btn_padding',
			'setting_fixed'		=> 'dvmm_cart_btn_padding_f',
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$dvmm_menu_inner_container} .dvmm_cart__button",
				'normal_hover'	=> "{$dvmm_menu_inner_container} .dvmm_cart__button:hover",
				'fixed'			=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_cart__button",
				'fixed_hover'	=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_cart__button:hover",
			),
			'property' 			=> 'padding',
			'additional_css'	=> '',
			'field_type'		=> 'custom_padding',
			'priority'			=> ''
		));
		// Cart icon size
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_icon_size',
			'setting_fixed'		=> 'dvmm_cart_icon_size_f',
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$dvmm_menu_inner_container} .dvmm_icon.dvmm_cart__button",
				'normal_hover'	=> "{$dvmm_menu_inner_container} .dvmm_icon.dvmm_cart__button:hover",
				'fixed'			=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_icon.dvmm_cart__button",
				'fixed_hover'	=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_icon.dvmm_cart__button:hover",
			),
			'property' 			=> 'font-size',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));
		// Cart icon color
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_icon_color',
			'setting_fixed'		=> 'dvmm_cart_icon_color_f',
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$dvmm_menu_inner_container} .dvmm_icon.dvmm_cart__button",
				'normal_hover'	=> "{$dvmm_menu_inner_container} .dvmm_icon.dvmm_cart__button:hover",
				'fixed'			=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_icon.dvmm_cart__button",
				'fixed_hover'	=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_icon.dvmm_cart__button:hover",
			),
			'property' 			=> 'color',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));
		// Cart button background color
		$module->helpers()->generate_responsive_css( $module->props, $render_slug, array( 
			'setting' 			=> 'dvmm_cart_btn_background_color',
			'setting_fixed'		=> 'dvmm_cart_btn_background_color_f',
			'default'			=> '',
			'selector' 			=> array(
				'normal'		=> "{$dvmm_menu_inner_container} .dvmm_cart__button",
				'normal_hover'	=> "{$dvmm_menu_inner_container} .dvmm_cart__button:hover",
				'fixed'			=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_cart__button",
				'fixed_hover'	=> "{$dvmm_menu_inner_container}.dvmm_fixed .dvmm_cart__button:hover",
			),
			'property' 			=> 'background-color',
			'additional_css'	=> '',
			'field_type'		=> '',
			'priority'			=> ''
		));
	}
    
    /**
	 * Render shopping cart button.
	 *
	 * @since v1.0.0
	 *
	 * @param   object      $module             Module object.
     * @param   array       $processed_props	Processed props.
     * @param   string      $render_slug        Module slug.
	 * 
	 * @return string							Cart button HTML.
	 */
	public function render_cart( $module, $processed_props, $render_slug ) {

		// return empty if this element is disabled or not visible
        if ( ! $module->helpers()->maybe_render_element( $module->props, 'cart' ) ) {
			return '';
		}

		// return empty if WooCommerce is not activated or WooCommerce cart does not exist
		if ( ! class_exists( 'woocommerce' ) || ! WC()->cart ) {
			return '';
		}

		// get cart url
		$url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();

		// show cart on front end even if WooCommerce is not activated (WILL BE USED LATER)
		// if ( ! class_exists( 'woocommerce' ) || ! WC()->cart ) {
		// 	$url = "#";
		// } else {
		// 	$url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();
		// }

		// get cart button wrapper classes (.dvmm_cart_button__wrap)
		$cart_wrap_classes = implode(' ', $this->manage_cart_wrap_classes( $module, $processed_props ) );
        
        // get cart button classes (.dvmm_cart__button)
		$cart_classes = implode(' ', $this->manage_cart_classes( $module ) );

		// normal header cart image icon
		$multi_view	= et_pb_multi_view_options( $module );
		$cart_img_html = $multi_view->render_element( array(
			'tag'            => 'img',
			'attrs'          => array(
				'src' => '{{dvmm_cart_img}}',
			),
			'classes'		 => array(
				'dvmm_cart_img' => array(
					'dvmm_enable_cart' 	 	=> 'on',
					'dvmm_cart_icon_image' 	=> 'image',
				)
			),
			'required'       => array(
				'dvmm_enable_cart' 	 	=> 'on',
				'dvmm_cart_icon_image' 	=> 'image',
			),
			'hover_selector' => '%%order_class%% .dvmm_menu_inner_container .dvmm_cart__button',
		) );

		// fixed header cart image icon
		$multi_view_f = et_pb_multi_view_options( $module );
		$cart_img_html .= $multi_view_f->render_element( array(
			'tag'            => 'img',
			'attrs'          => array(
				'src' => '{{dvmm_cart_img_f}}',
			),
			'classes'		 => array(
				'dvmm_cart_img__fixed' 	=> array(
					'dvmm_enable_fixed_header' 	=> 'on',
					'dvmm_cart_icon_image' 		=> 'image',
					'dvmm_use_fixed_cart_img' 	=> 'on',
				)
			),
			'required'       => array(
				'dvmm_enable_cart' 	 		=> 'on',
				'dvmm_enable_fixed_header' 	=> 'on',
				'dvmm_cart_icon_image' 		=> 'image',
				'dvmm_use_fixed_cart_img' 	=> 'on',
			),
			'hover_selector' => '%%order_class%% .dvmm_menu_inner_container .dvmm_cart__button',
		) );

		$output = sprintf(
			'<div class="%1$s">
				<a href="%2$s" class="%3$s">%4$s</a>
			</div>',
            esc_attr( $cart_wrap_classes ),
            esc_url( $url ),
            esc_attr( $cart_classes ),
			et_core_esc_previously( $cart_img_html )
        );
        
		return $output;
	}
}

/**
 * Intstantiates the DVMM_Menu_Shopping_Cart class.
 * 
 * @since   1.0.0
 * 
 * @return  Instance of the DVMM_Menu_Shopping_Cart class.
 * 
 */
function dvmm_menu_shopping_cart_class_instance( ) {
	return DVMM_Menu_Shopping_Cart::instance( );
}

