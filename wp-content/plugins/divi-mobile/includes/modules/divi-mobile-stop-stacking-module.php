<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Divi_mobile_Stop_Stacking_Module extends ET_Builder_Module {
    function init() {
        $this->name            = esc_html__( 'Stop Module Stacking', 'et_builder' );
        $this->slug            = 'et_pb_dm_stop_stacking';
        $this->fb_support      = true;
    }


    function get_fields() {
      $fields = array(

                    'admin_label' => array(
                        'label'       => __( 'Admin Label', 'divi-bodyshop-woocommerce' ),
                        'type'        => 'text',
                        'toggle_slug'     => 'main_content',
                        'description' => __( 'This will change the label of the module in the builder for easy identification.', 'divi-bodyshop-woocommerce' ),
                    ),
      );

return $fields;
}



    function shortcode_callback($atts, $content = null, $function_name) {
        $module_class = ET_Builder_Element::add_module_order_class( '', $function_name );
        $module_class = trim($module_class);
        return '<div class="divi-mobile-stop-stacking ' . $module_class . '"></div>';
    }
    
}
new Divi_mobile_Stop_Stacking_Module;
