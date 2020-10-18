<?php
/*
See ../functions.php for credits
This file modified by Jonathan Hall, Ben Hussenet, Anna Kurowska, Dominika Rauk, and Carl Wuensche
Last modified 2020-03-28

*/
if ( ! function_exists( 'ds_customizer_panel' ) ) {
    function ds_customizer_panel($wp_customize) {
        // --------------- One Panel, All Plugins ---------------
        $wp_customize->add_panel( 'divi_space_parent', array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'title'          => __('Divi Space Settings', 'divi-switch'),
            'description'    => __('Advanced customizations for Divi Space products', 'divi-switch'),
        ));
    }
}
add_action( 'customize_register', 'ds_customizer_panel' );

function ds_switch_customizer($wp_customize){
    // Divi Switch Section 
    $wp_customize->add_section( 'ds_switch_section', array(
        'capability'     => 'edit_theme_options',
        'panel' => 'divi_space_parent',
        'title'          => __( 'Divi Switch', 'divi-switch' ),
    ));

// Let's make an Icon Picker!
	class DS_Icon_Select extends WP_Customize_Control {
		private $icons = false;

		public function __construct( $manager, $id, $args = array(), $options = array() ) {
		  $this->icons = $this->get_icons();
		  parent::__construct( $manager, $id, $args );
		}
		public function render_content() {
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<select class="ds_icon_select" <?php $this->link(); ?>>
			<?php
            foreach ( $this->icons as $before_code=>$val ) {
			  $before_code = et_core_intentionally_unescaped( $before_code, 'fixed_string' );
			  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
              printf('<option value="%s" %s>%s</option>', $before_code, selected($this->value(), $before_code, false), $val);
            }
          	?>
			</select>
			<div class="ds_icon_select_grid">
				<?php
            foreach ( $this->icons as $before_code=>$val ) {
			  $before_code = et_core_intentionally_unescaped( $before_code, 'fixed_string' );
			  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
              printf('<div data-icon="%s" %s>%s</div>', $before_code, selected($this->value(), $before_code, false), $val);
            }
          	?>

			</div>

			<style>
				.ds_icon_select {
					display:none;
                    font-family: 'ETmodules';
				}
				.ds_icon_select_grid {
				    width: 100%;
				    height: 200px;
				    border-radius: 4px;
				    border: none;
				    box-shadow: none;
				    background: #F4F4F4;
				    padding: 3px;
				    font-size: 11px;
				    overflow-y: scroll;
				    overflow-x: hidden;
				     display: flex;
				  	flex-direction: row;
				  	flex-wrap: wrap;
				  	box-sizing: border-box;
				}
				.ds_icon_select_grid div {
					flex:1;
					flex-basis: 10%;
					padding: 5px;
					margin: 3px;
					text-align: center;
					vertical-align: middle;
					cursor: pointer;
                    font-family: 'ETmodules';
				}
				.ds_icon_select_grid div.selected {
					border-radius: 4px;
					background: #E0DEDE;
				}
			</style>
			<script>
				jQuery(function() {
			    	var currentIcon = jQuery(".ds_icon_select").val();
                    jQuery(".ds_icon_select_grid div[data-icon='"+currentIcon+"']").addClass('selected');
				});
                jQuery(".ds_icon_select_grid div").on("click", function(e) {
                    jQuery(".ds_icon_select_grid div").removeClass('selected');
                    jQuery(this).addClass('selected');
                    jQuery(".ds_icon_select").val(jQuery(this).data("icon")).trigger('change');
			});
			</script>
		</label>
		<?php
		}
		private function get_icons() {
			/* populate with a list of icons you want to show */
			  $icons = array(
					"21"  => "&#x21;",
					"22"  => "&#x22;",
					"23"  => "&#x23;",
					"24"  => "&#x24;",
					"25"  => "&#x25;",
					"26"  => "&#x26;",
					"27"  => "&#x27;",
					"28"  => "&#x28;",
					"29"  => "&#x29;",
					"2a"  => "&#x2a;",
					"2b"  => "&#x2b;",
					"2c"  => "&#x2c;",
					"2d"  => "&#x2d;",
					"2e"  => "&#x2e;",
					"2f"  => "&#x2f;",
					"30"  => "&#x30;",
					"31"  => "&#x31;",
					"32"  => "&#x32;",
					"33"  => "&#x33;",
					"34"  => "&#x34;",
					"35"  => "&#x35;",
					"36"  => "&#x36;",
					"37"  => "&#x37;",
					"38"  => "&#x38;",
					"39"  => "&#x39;",
					"3a"  => "&#x3a;",
					"3b"  => "&#x3b;",
					"3c"  => "&#x3c;",
					"3d"  => "&#x3d;",
					"3e"  => "&#x3e;",
					"3f"  => "&#x3f;",
					"40"  => "&#x40;",
					"41"  => "&#x41;",
					"42"  => "&#x42;",
					"43"  => "&#x43;",
					"44"  => "&#x44;",
					"45"  => "&#x45;",
					"46"  => "&#x46;",
					"47"  => "&#x47;",
					"48"  => "&#x48;",
					"49"  => "&#x49;",
					"4a"  => "&#x4a;",
					"4b"  => "&#x4b;",
					"4c"  => "&#x4c;",
					"4d"  => "&#x4d;",
					"4e"  => "&#x4e;",
					"4f"  => "&#x4f;",
					"50"  => "&#x50;",
					"51"  => "&#x51;",
					"52"  => "&#x52;",
					"53"  => "&#x53;",
					"54"  => "&#x54;",
					"55"  => "&#x55;",
					"56"  => "&#x56;",
					"57"  => "&#x57;",
					"58"  => "&#x58;",
					"59"  => "&#x59;",
					"5a"  => "&#x5a;",
					"5b"  => "&#x5b;",
					"5c"  => "&#x5c;",
					"5d"  => "&#x5d;",
					"5e"  => "&#x5e;",
					"5f"  => "&#x5f;",
					"60"  => "&#x60;",
					"61"  => "&#x61;",
					"62"  => "&#x62;",
					"63"  => "&#x63;",
					"64"  => "&#x64;",
					"65"  => "&#x65;",
					"66"  => "&#x66;",
					"67"  => "&#x67;",
					"68"  => "&#x68;",
					"69"  => "&#x69;",
					"6a"  => "&#x6a;",
					"6b"  => "&#x6b;",
					"6c"  => "&#x6c;",
					"6d"  => "&#x6d;",
					"6e"  => "&#x6e;",
					"6f"  => "&#x6f;",
					"70"  => "&#x70;",
					"71"  => "&#x71;",
					"72"  => "&#x72;",
					"73"  => "&#x73;",
					"74"  => "&#x74;",
					"75"  => "&#x75;",
					"76"  => "&#x76;",
					"77"  => "&#x77;",
					"78"  => "&#x78;",
					"79"  => "&#x79;",
					"7a"  => "&#x7a;",
					"7b"  => "&#x7b;",
					"7c"  => "&#x7c;",
					"7d"  => "&#x7d;",
					"7e"  => "&#x7e;",
					"e000"  => "&#xe000;",
					"e001"  => "&#xe001;",
					"e002"  => "&#xe002;",
					"e003"  => "&#xe003;",
					"e004"  => "&#xe004;",
					"e005"  => "&#xe005;",
					"e006"  => "&#xe006;",
					"e007"  => "&#xe007;",
					"e008"  => "&#xe008;",
					"e009"  => "&#xe009;",
					"e00a"  => "&#xe00a;",
					"e00b"  => "&#xe00b;",
					"e00c"  => "&#xe00c;",
					"e00d"  => "&#xe00d;",
					"e00e"  => "&#xe00e;",
					"e00f"  => "&#xe00f;",
					"e010"  => "&#xe010;",
					"e011"  => "&#xe011;",
					"e012"  => "&#xe012;",
					"e013"  => "&#xe013;",
					"e014"  => "&#xe014;",
					"e015"  => "&#xe015;",
					"e016"  => "&#xe016;",
					"e017"  => "&#xe017;",
					"e018"  => "&#xe018;",
					"e019"  => "&#xe019;",
					"e01a"  => "&#xe01a;",
					"e01b"  => "&#xe01b;",
					"e01c"  => "&#xe01c;",
					"e01d"  => "&#xe01d;",
					"e01e"  => "&#xe01e;",
					"e01f"  => "&#xe01f;",
					"e020"  => "&#xe020;",
					"e021"  => "&#xe021;",
					"e022"  => "&#xe022;",
					"e023"  => "&#xe023;",
					"e024"  => "&#xe024;",
					"e025"  => "&#xe025;",
					"e026"  => "&#xe026;",
					"e027"  => "&#xe027;",
					"e028"  => "&#xe028;",
					"e029"  => "&#xe029;",
					"e02a"  => "&#xe02a;",
					"e02b"  => "&#xe02b;",
					"e02c"  => "&#xe02c;",
					"e02d"  => "&#xe02d;",
					"e02e"  => "&#xe02e;",
					"e02f"  => "&#xe02f;",
					"e030"  => "&#xe030;",
					"e103"  => "&#xe103;",
					"e0ee"  => "&#xe0ee;",
					"e0ef"  => "&#xe0ef;",
					"e0e8"  => "&#xe0e8;",
					"e0ea"  => "&#xe0ea;",
					"e101"  => "&#xe101;",
					"e107"  => "&#xe107;",
					"e108"  => "&#xe108;",
					"e102"  => "&#xe102;",
					"e106"  => "&#xe106;",
					"e0eb"  => "&#xe0eb;",
					"e105"  => "&#xe105;",
					"e0ed"  => "&#xe0ed;",
					"e100"  => "&#xe100;",
					"e104"  => "&#xe104;",
					"e0e9"  => "&#xe0e9;",
					"e109"  => "&#xe109;",
					"e0ec"  => "&#xe0ec;",
					"e0fe"  => "&#xe0fe;",
					"e0f6"  => "&#xe0f6;",
					"e0fb"  => "&#xe0fb;",
					"e0e2"  => "&#xe0e2;",
					"e0e3"  => "&#xe0e3;",
					"e0f5"  => "&#xe0f5;",
					"e0e1"  => "&#xe0e1;",
					"e0ff"  => "&#xe0ff;",
					"e0f8"  => "&#xe0f8;",
					"e0fa"  => "&#xe0fa;",
					"e0e7"  => "&#xe0e7;",
					"e0fd"  => "&#xe0fd;",
					"e0e4"  => "&#xe0e4;",
					"e0e5"  => "&#xe0e5;",
					"e0f7"  => "&#xe0f7;",
					"e0e0"  => "&#xe0e0;",
					"e0fc"  => "&#xe0fc;",
					"e0f9"  => "&#xe0f9;",
					"e0dd"  => "&#xe0dd;",
					"e0f1"  => "&#xe0f1;",
					"e0dc"  => "&#xe0dc;",
					"e0f3"  => "&#xe0f3;",
					"e0d8"  => "&#xe0d8;",
					"e0db"  => "&#xe0db;",
					"e0f0"  => "&#xe0f0;",
					"e0df"  => "&#xe0df;",
					"e0f2"  => "&#xe0f2;",
					"e0f4"  => "&#xe0f4;",
					"e0d9"  => "&#xe0d9;",
					"e0da"  => "&#xe0da;",
					"e0de"  => "&#xe0de;",
					"e0e6"  => "&#xe0e6;",
				);
				return $icons;
			}
	}
	
	// Icon example

	$wp_customize->add_setting( 'ds_et_icon_picker',
	array(
	  'default'    => 'none',
	  'type'       => 'option',
	  'capability' => 'edit_theme_options',
	  'transport'  => 'postMessage',
	  'sanitize_callback' => 'sanitize_text_field'
	)
  );

  $wp_customize->add_control( new DS_Icon_Select( $wp_customize, 'ds_et_icon_picker', 
	array(
	  'label'    => __( 'Custom Mobile Menu Icon' , 'divi-switch'),
	  'section'  => 'ds_switch_section',
	  'settings' => 'ds_et_icon_picker',
	) )
  );

  	// Header Background Image
	$wp_customize->add_setting( 'ds_header_bg',
		array(
		  'type'       => 'option',
		  'capability' => 'edit_theme_options',
		  'transport'  => 'postMessage',
		  'sanitize_callback' => 'esc_url_raw'
		)
	);
  	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'ds_header_bg', 
		array(
			'label'      => __( 'Header Background Image' , 'divi-switch'),
			'section'    => 'ds_switch_section',
			'settings'   => 'ds_header_bg',
		) ) 
	);

	// Header Background Image Repeat
	$wp_customize->add_setting( 'ds_header_bg_repeat', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 30,
		// wp-includes/class-wp-customize-manager.php
		'sanitize_callback' => function ( $value, $setting ) {
			if ( ! in_array( $value, array( 'default', 'repeat', 'no-repeat', 'repeat-y', 'repeat-X'  ) ) ) {
				return new WP_Error( 'invalid_value', __( 'Invalid value for Header Background Image Repeat.', 'divi-switch' ) );
			}
			return $value;
		}
    ) );
	$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'ds_header_bg_repeat', array(
		'label'	      => __( 'Header Background Image Repeat', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'    => 'select',
	    'choices' => array(
	        'default' => '',
	        'repeat' => esc_html__('Repeat', 'divi-switch'),
	        'no-repeat' => esc_html__('No Repeat', 'divi-switch'),
	        'repeat-y' => esc_html__('Repeat Y', 'divi-switch'),
	        'repeat-X' => esc_html__('Repeat X', 'divi-switch'),
	    ),
    )));

    // Header Background Image Position
	$wp_customize->add_setting( 'ds_header_bg_position', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 30,
		// wp-includes/class-wp-customize-manager.php
		'sanitize_callback' => function ( $value, $setting ) {
			if ( ! in_array( $value, array( 'default', 'left top', 'left center', 'left bottom', 'right top', 'right center', 'right bottom', 'center top', 'center center', 'center bottom'  ) ) ) {
				return new WP_Error( 'invalid_value', __( 'Invalid value for Header Background Image Position.', 'divi-switch' ) );
			}
			return $value;
		}
    ) );
	$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'ds_header_bg_position', array(
		'label'	      => __( 'Header Background Image Position', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'    => 'select',
	    'choices' => array(
	        'default' => '',
	        'left top' => esc_html__('Left Top', 'divi-switch'),
	        'left center' => esc_html__('Left Center', 'divi-switch'),
	        'left bottom' => esc_html__('Left Bottom', 'divi-switch'),
	        'right top' => esc_html__('Right Top', 'divi-switch'),
	        'right center' => esc_html__('Right Center', 'divi-switch'),
	        'right bottom' => esc_html__('Right Bottom', 'divi-switch'),
	        'center top' => esc_html__('Center Top', 'divi-switch'),
	        'center center' => esc_html__('Center Center', 'divi-switch'),
	        'center bottom' => esc_html__('Center Bottom', 'divi-switch'),
	    ),
    )));

    // Header Background Image Size
	$wp_customize->add_setting( 'ds_header_bg_size', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 30,
		// wp-includes/class-wp-customize-manager.php
		'sanitize_callback' => function ( $value, $setting ) {
			if ( ! in_array( $value, array( 'default', 'auto', 'cover', 'contain' ) ) ) {
				return new WP_Error( 'invalid_value', __( 'Invalid value for Header Background Image Size.', 'divi-switch' ) );
			}
			return $value;
		}
    ) );
	$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'ds_header_bg_size', array(
		'label'	      => __( 'Header Background Image Size', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'    => 'select',
	    'choices' => array(
	        'default' => '',
	        'auto' => esc_html__('Auto', 'divi-switch'),
	        'cover' => esc_html__('Cover', 'divi-switch'),
	        'contain' =>  esc_html__('Contain', 'divi-switch'),
	    ),
    )));

	// Back To Top Button Icon Size
	$wp_customize->add_setting( 'ds_btt_button_icon_size', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 30,
		'sanitize_callback' => 'absint'
    ) );
    
    // Back To Top Button Icon Size
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_btt_button_icon_size', array(
		'label'	      => __( 'Back To Top Icon Size', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 14,
			'max'  => 80,
			'step' => 2,
		),
    )));
    

	// Back To Top Button Position right
	$wp_customize->add_setting( 'ds_btt_button_position_right', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 0,
		'sanitize_callback' => 'absint'
    ) );
    
    // Back To Top Button Position right
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_btt_button_position_right', array(
		'label'	      => __( 'Back To Top Position Right', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 2,
		),
    )));
    
	// Back To Top Button Position Bottom
	$wp_customize->add_setting( 'ds_btt_button_position_bottom', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 125,
		'sanitize_callback' => 'absint'
    ) );
    
    // Back To Top Button Position Bottom
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_btt_button_position_bottom', array(
		'label'	      => __( 'Back To Top Position Bottom', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 350,
			'step' => 2,
		),
    )));
    
	// Back To Top Button Curved Edge Radius
	$wp_customize->add_setting( 'ds_btt_button_curved_edge', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 5,
		'sanitize_callback' => 'absint'
    ) );
    
    // Back To Top Button Curved Edge Radius
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_btt_button_curved_edge', array(
		'label'	      => __( 'Back To Top Button Left Edge Radius', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 2,
		),
    )));
    
	// Back To Top Button Straight Edge Radius
	$wp_customize->add_setting( 'ds_btt_button_straight_edge', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 0,
		'sanitize_callback' => 'absint'
    ) );
    
    // Back To Top Button Straight Edge Radius
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_btt_button_straight_edge', array(
		'label'	      => __( 'Back To Top Button Right Edge Radius', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 2,
		),
    )));
    
    // Back To Top Button Background Color
	$wp_customize->add_setting( 'ds_btt_button_color', array(
		'default'	    => 'rgba(0,0,0,.4)',
		'type'          => 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'sanitize_callback' => 'et_sanitize_alpha_color',
	) );
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_btt_button_color', array(
		'label'		=> __( 'Back To Top Button Background Color', 'divi-switch' ),
		'section'	=> 'ds_switch_section',
		'settings'	=> 'ds_btt_button_color',
    ) ) );

    // Back To Top Button Background Color Hover
    $wp_customize->add_setting( 'ds_btt_button_color_hover', array(
        'default'	    => 'rgba(0,0,0,.4)',
        'type'          => 'option',
        'capability'	=> 'edit_theme_options',
        'transport'		=> 'postMessage',
        'sanitize_callback' => 'et_sanitize_alpha_color',
    ) );
    $wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_btt_button_color_hover', array(
        'label'		=> __( 'Back To Top Button Background Color Hover', 'divi-switch' ),
        'section'	=> 'ds_switch_section',
        'settings'	=> 'ds_btt_button_color_hover',
    ) ) );

    // Back To Top Icon Color
	$wp_customize->add_setting( 'ds_btt_button_icon_color', array(
		'default'	    => '#ffffff',
		'type'          => 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'sanitize_callback' => 'et_sanitize_alpha_color',
	) );
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_btt_button_icon_color', array(
		'label'		=> __( 'Back To Top Button Icon color', 'divi-switch' ),
		'section'	=> 'ds_switch_section',
		'settings'	=> 'ds_btt_button_icon_color',
    ) ) );

    // Back To Top Icon Color Hover
	$wp_customize->add_setting( 'ds_btt_button_icon_color_hover', array(
		'default'	    => '#ffffff',
		'type'          => 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'sanitize_callback' => 'et_sanitize_alpha_color',
	) );
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_btt_button_icon_color_hover', array(
		'label'		=> __( 'Back To Top Button Icon Color Hover', 'divi-switch' ),
		'section'	=> 'ds_switch_section',
		'settings'	=> 'ds_btt_button_icon_color_hover',
	) ) );

	// Archive Title Background
	$wp_customize->add_setting( 'ds_archve-header-bg', array(
		'default'	    => '#ffffff',
		'type'          => 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'sanitize_callback' => 'et_sanitize_alpha_color',
    ) );
    $wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_archve-header-bg', array(
		'label'		=> __( 'Archive Header Background Color', 'divi-switch' ),
		'section'	=> 'ds_switch_section',
		'settings'	=> 'ds_archve-header-bg',
	) ) );

	// Archive Title Padding
	$wp_customize->add_setting( 'ds_archve-header-padding', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 30,
		'sanitize_callback' => 'absint'
    ) );
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_archve-header-padding', array(
		'label'	      => __( 'Archive Title Padding', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 2,
		),
    )));

    // Archive Title Background
	$wp_customize->add_setting( 'ds_archve-header-color', array(
		'default'	    => '#333333',
		'type'          => 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'sanitize_callback' => 'et_sanitize_alpha_color',
    ) );
    $wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_archve-header-color', array(
		'label'		=> __( 'Archive Header Text Color', 'divi-switch' ),
		'section'	=> 'ds_switch_section',
		'settings'	=> 'ds_archve-header-color',
	) ) );

	// Archive Post Separator Color
	$wp_customize->add_setting( 'ds_archve-separator-color', array(
		'default'	    => 'rgba(0,0,0,.4)',
		'type'          => 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		'sanitize_callback' => 'et_sanitize_alpha_color',
	) );
	$wp_customize->add_control( new ET_Divi_Customize_Color_Alpha_Control( $wp_customize, 'ds_archve-separator-color', array(
		'label'		=> __( 'Archive Post Separator Color', 'divi-switch' ),
		'section'	=> 'ds_switch_section',
		'settings'	=> 'ds_archve-separator-color',
    ) ) );

    // Archive Post Separator Margin Top
	$wp_customize->add_setting( 'ds_archve-separator-margin-top', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 10,
		'sanitize_callback' => 'absint'
    ) );
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_archve-separator-margin-top', array(
		'label'	      => __( 'Archive Post Separator Margin Top', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
    )));

    // Archive Post Separator Margin Bottom
	$wp_customize->add_setting( 'ds_archve-separator-margin-bottom', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 10,
		'sanitize_callback' => 'absint'
    ) );
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_archve-separator-margin-bottom', array(
		'label'	      => __( 'Archive Post Separator Margin Bottom', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
    )));

    // Archive Post Separator Height
	$wp_customize->add_setting( 'ds_archve-separator-height', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 1,
		'sanitize_callback' => 'absint'
    ) );
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_archve-separator-height', array(
		'label'	      => __( 'Archive Post Separator Height', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
    )));

    // Archive Post Separator Width
	$wp_customize->add_setting( 'ds_archve-separator-width', array(
		'type'          => 'option',
		'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage',
        'default'     => 100,
		'sanitize_callback' => 'absint'
    ) );
	$wp_customize->add_control( new ET_Divi_Range_Option ( $wp_customize, 'ds_archve-separator-width', array(
		'label'	      => __( 'Archive Post Separator Width', 'divi-switch' ),
		'section'     => 'ds_switch_section',
        'type'        => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
    )));
}

add_action( 'customize_register', 'ds_switch_customizer' );






