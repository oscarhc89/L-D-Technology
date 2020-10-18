<?php
if ( ! defined( 'ABSPATH' ) ) exit;

    class DE_DM_options_interface
        {

            var $licence;

            function __construct()
                {

                    $this->licence          =   new DE_DM_LICENSE();

                    if (isset($_GET['page']) && ($_GET['page'] == 'de-dm-options'  ||  $_GET['page'] == 'divi-mobile-license')) // phpcs:ignore
                        {
                            add_action( 'init', array($this, 'options_update'), 1 );
                        }

                    add_action( 'admin_menu', array($this, 'admin_menu') );
                    add_action( 'network_admin_menu', array($this, 'network_admin_menu') );

                    if(!$this->licence->licence_key_verify())
                        {
                            add_action('admin_notices', array($this, 'admin_no_key_notices'));
                            add_action('network_admin_notices', array($this, 'admin_no_key_notices'));
                        }

                }

            function __destruct()
                {

                }

            function network_admin_menu()
                {
                    if(!$this->licence->licence_key_verify()) {

                        $hookID   = add_submenu_page('divi-engine', 'Divi Mobile License', 'Divi Mobile License', 'manage_options', 'de-dm-options', array($this, 'license_form_divi_mobile'));

                      }
                        else{
                        $hookID   = add_submenu_page('divi-engine', 'Divi Mobile License', 'Divi Mobile License', 'manage_options', 'de-dm-options', array($this, 'licence_deactivate_form'));

                    add_action('load-' . $hookID , array($this, 'load_dependencies'));
                    add_action('load-' . $hookID , array($this, 'admin_notices'));

                    add_action('admin_print_styles-' . $hookID , array($this, 'admin_print_styles'));
                    add_action('admin_print_scripts-' . $hookID , array($this, 'admin_print_scripts'));


                  }
                }

            function admin_menu()
                {

                    if(!$this->licence->licence_key_verify())
                        {
                            $hookID   = add_submenu_page('divi-engine', 'Divi Mobile License', 'Divi Mobile License', 'manage_options', 'divi-mobile-license', array($this, 'license_form_divi_mobile'));

                        }
                    else
                        {
                            $hookID   = add_submenu_page('divi-engine', 'Divi Mobile License', 'Divi Mobile License', 'manage_options', 'divi-mobile-license', array($this, 'licence_deactivate_form'));


                            add_action('load-' . $hookID , array($this, 'load_dependencies'));


                        }

                    add_action('load-' . $hookID , array($this, 'admin_notices'));

                    add_action('admin_print_styles-' . $hookID , array($this, 'admin_print_styles'));
                    add_action('admin_print_scripts-' . $hookID , array($this, 'admin_print_scripts'));

                }


            function options_interface()
                {

                    if(!$this->licence->licence_key_verify() && !is_multisite())
                        {
                            $this->license_form_divi_mobile();
                            return;
                        }

                    if(!$this->licence->licence_key_verify() && is_multisite())
                        {
                            $this->licence_multisite_require_nottice();
                            return;
                        }
                }

            function options_update()
                {

                    if (isset($_POST['slt_licence_form_submit'])) // phpcs:ignore
                        {
                            $this->licence_form_submit();
                            return;
                        }

                }

            function load_dependencies()
                {




                }

            function admin_notices()
                {
                    global $slt_form_submit_messages;

                    if($slt_form_submit_messages == '')
                        return;

                    $messages = $slt_form_submit_messages;


                    if(count($messages) > 0)
                        {
                            $messages_implode = implode("</p><p>", $messages);
                            ?> <div id='notice' class='updated error'><p><?php echo esc_html( $messages_implode ) ?></p></div> <?php
                        }

                }

            function admin_print_styles()
                {

                }

            function admin_print_scripts()
                {

                }


            function admin_no_key_notices()
                {
                    if ( !current_user_can('manage_options'))
                        return;

                    $screen = get_current_screen();

                    if( ! is_network_admin()   )
                        {
                            if(isset($screen->id) && $screen->id == 'divi-mobile-license')
                                return;

                            ?><div class="updated error"><p><?php echo esc_html( "Divi Mobile is inactive, please enter your", 'divi-mobile' ) ?> <a href="admin.php?page=divi-mobile-license"><?php echo esc_html( "License Key", 'divi-mobile' ) ?></a> to get updates</p></div><?php
                        }

                }

            function licence_form_submit()
                {
                    global $slt_form_submit_messages;

                    //check for de-activation
                    if (isset($_POST['slt_licence_form_submit']) && isset($_POST['slt_licence_deactivate']) && wp_verify_nonce($_POST['divi_mobile_license_nonce'],'divi_mobile_license')) // phpcs:ignore
                        {
                            global $slt_form_submit_messages;

                            $license_data = DE_DM_LICENSE::get_licence_data();
                            $license_key = $license_data['key'];

                            //build the request query
                            $args = array(
                                                'woo_sl_action'         => 'deactivate',
                                                'licence_key'           => $license_key,
                                                'product_unique_id'     => DE_DM_PRODUCT_ID,
                                                'domain'                => DE_DM_INSTANCE
                                            );
                            $request_uri    = DE_DM_APP_API_URL . '?' . http_build_query( $args , '', '&');
                            $data           = wp_remote_get( $request_uri );

                            //log if debug
                            If (defined('WP_DEBUG') &&  WP_DEBUG    === TRUE)
                                {
                                    DE_DMOBILE::log_data("------\nArguments:");
                                    DE_DMOBILE::log_data($args);

                                    DE_DMOBILE::log_data("\nResponse Body:");
                                    DE_DMOBILE::log_data($data['body']);
                                    DE_DMOBILE::log_data("\nResponse Server Response:");
                                    DE_DMOBILE::log_data($data['response']);
                                }

                            if(is_wp_error( $data ) || $data['response']['code'] != 200)
                                {
                                    $slt_form_submit_messages[] .= __('There was a problem connecting to ', 'divi-mobile') . DE_DM_APP_API_URL;
                                    return;
                                }

                            $response_block = json_decode($data['body']);
                            //retrieve the last message within the $response_block
                            $response_block = $response_block[count($response_block) - 1];
                            $response = $response_block->message;

                            if(isset($response_block->status))
                                {
                                    if($response_block->status == 'success' && $response_block->status_code == 's201')
                                        {
                                            //the license is active and the software is active
                                            $slt_form_submit_messages[] = $response_block->message;

                                            $license_data = DE_DM_LICENSE::get_licence_data();

                                            //save the license
                                            $license_data['key']          = '';
                                            $license_data['last_check']   = time();

                                            DE_DM_LICENSE::update_licence_data ( $license_data );
                                        }

                                    else //if message code is e104  force de-activation
                                            if ($response_block->status_code == 'e002' || $response_block->status_code == 'e104')
                                                {
                                                    $license_data = DE_DM_LICENSE::get_licence_data();

                                                    //save the license
                                                    $license_data['key']          = '';
                                                    $license_data['last_check']   = time();

                                                    DE_DM_LICENSE::update_licence_data ( $license_data );
                                                }
                                        else
                                        {
                                            $slt_form_submit_messages[] = __('There was a problem deactivating the licence: ', 'divi-mobile') . $response_block->message;

                                            return;
                                        }
                                }
                                else
                                {
                                    $slt_form_submit_messages[] = __('There was a problem with the data block received from ' . DE_DM_APP_API_URL, 'divi-mobile');
                                    return;
                                }

                            //redirect
                            $current_url    =   'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // phpcs:ignore

                            wp_redirect($current_url);
                            die();

                        }



                    if (isset($_POST['slt_licence_form_submit']) && wp_verify_nonce($_POST['divi_mobile_license_nonce'],'divi_mobile_license')) // phpcs:ignore
                        {

                            $license_key = isset($_POST['license_key'])? sanitize_key(trim($_POST['license_key'])) : ''; // phpcs:ignore

                            if($license_key == '')
                                {
                                    $slt_form_submit_messages[] = __("License Key can't be empty", 'divi-mobile');
                                    return;
                                }

                            //build the request query
                            $args = array(
                                                'woo_sl_action'         => 'activate',
                                                'licence_key'       => $license_key,
                                                'product_unique_id'        => DE_DM_PRODUCT_ID,
                                                'domain'          => DE_DM_INSTANCE
                                            );
                            $request_uri    = DE_DM_APP_API_URL . '?' . http_build_query( $args , '', '&');
                            $data           = wp_remote_get( $request_uri );

                            //log if debug
                            If (defined('WP_DEBUG') &&  WP_DEBUG    === TRUE)
                                {
                                    DE_DMOBILE::log_data("------\nArguments:");
                                    DE_DMOBILE::log_data($args);

                                    DE_DMOBILE::log_data("\nResponse Body:");
                                    DE_DMOBILE::log_data($data['body']);
                                    DE_DMOBILE::log_data("\nResponse Server Response:");
                                    DE_DMOBILE::log_data($data['response']);
                                }

                            if(is_wp_error( $data ) || $data['response']['code'] != 200)
                                {
                                    $slt_form_submit_messages[] .= __('There was a problem connecting to ', 'divi-mobile') . DE_DM_APP_API_URL;
                                    return;
                                }

                            $response_block = json_decode($data['body']);
                            //retrieve the last message within the $response_block
                            $response_block = $response_block[count($response_block) - 1];
                            $response = $response_block->message;

                            if(isset($response_block->status))
                                {
                                    if($response_block->status == 'success' && $response_block->status_code == 's100')
                                        {
                                            //the license is active and the software is active
                                            $slt_form_submit_messages[] = $response_block->message;

                                            $license_data = DE_DM_LICENSE::get_licence_data();

                                            //save the license
                                            $license_data['key']          = $license_key;
                                            $license_data['last_check']   = time();

                                            DE_DM_LICENSE::update_licence_data ( $license_data );

                                        }
                                        else
                                        {
                                            $slt_form_submit_messages[] = __('There was a problem activating the licence: ', 'divi-mobile') . $response_block->message;
                                            return;
                                        }
                                }
                                else
                                {
                                    $slt_form_submit_messages[] = __('There was a problem with the data block received from ' . DE_DM_APP_API_URL, 'divi-mobile');
                                    return;
                                }

                            //redirect
                            $current_url    =   'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // phpcs:ignore

                            wp_redirect($current_url);
                            die();
                        }

                }

            function license_form_divi_mobile()
                {
                    ?>
                        <div class="wrap">
                            <div id="icon-settings" class="icon32"></div>
                            <h2><?php esc_html_e( "Divi Mobile Software License", 'divi-mobile' ) ?><br />&nbsp;</h2>


                            <form id="form_data" name="form" method="post">
                                <div class="postbox">

                                        <?php wp_nonce_field('divi_mobile_license','divi_mobile_license_nonce'); ?>
                                        <input type="hidden" name="slt_licence_form_submit" value="true" />



                                         <div class="section section-text ">
                                            <h4 class="heading"><?php esc_html_e( "License Key", 'divi-mobile' ) ?></h4>
                                            <div class="option">
                                                <div class="controls">
                                                    <input type="text" value="" name="license_key" class="text-input">
                                                </div>
                                                <div class="explain"><?php esc_html_e( "Enter the License Key you got when bought this product. If you lost the key, you can always retrieve it from", 'divi-mobile' ) ?> <a href="http://diviengine.com/my-account/" target="_blank"><?php esc_html_e( "My Account", 'divi-mobile' ) ?></a><br />
                                                <?php esc_html_e( "More keys can be generate from", 'divi-mobile' ) ?> <a href="http://diviengine.com/my-account/" target="_blank"><?php esc_html_e( "My Account", 'divi-mobile' ) ?></a>
                                                </div>
                                            </div>
                                        </div>


                                </div>

                                <p class="submit">
                                    <input type="submit" name="Submit" class="button button-primary" value="<?php esc_html_e('Save', 'divi-mobile') ?>">
                                </p>
                            </form>
                        </div>
                    <?php

                }

            function licence_deactivate_form()
                {
                    $license_data = DE_DM_LICENSE::get_licence_data();

                    if(is_multisite())
                        {
                            ?>
                                <div class="wrap">
                                    <div id="icon-settings" class="icon32"></div>
                                    <h2><?php esc_html_e( "General Settings", 'divi-mobile' ) ?></h2>
                            <?php
                        }

                    ?>
                        <div id="form_data">
                        <h2 class="subtitle"><?php esc_html_e( "Divi Mobile Software License", 'divi-mobile' ) ?></h2>
                        <div class="postbox">
                            <form id="form_data" name="form" method="post">
                                <?php wp_nonce_field('divi_mobile_license','divi_mobile_license_nonce'); ?>
                                <input type="hidden" name="slt_licence_form_submit" value="true" />
                                <input type="hidden" name="slt_licence_deactivate" value="true" />

                                 <div class="section section-text ">
                                    <h4 class="heading"><?php esc_html_e( "License Key", 'divi-mobile' ) ?></h4>
                                    <div class="option">
                                        <div class="controls">
                                            <?php
                                                if($this->licence->is_local_instance())
                                                {
                                                ?>
                                                <p>Local instance, no key applied.</p>
                                                <?php
                                                }
                                                else {
                                                ?>
                                            <p><b><?php echo esc_html( substr($license_data['key'], 0, 20) ) ?>-xxxxxxxx-xxxxxxxx</b> &nbsp;&nbsp;&nbsp;<a class="button-secondary" title="Deactivate" href="javascript: void(0)" onclick="jQuery(this).closest('form').submit();">Deactivate</a></p>
                                            <?php } ?>
                                        </div>
                                        <div class="explain"><?php esc_html_e( "You can generate more keys from", 'divi-mobile' ) ?> <a href="http://diviengine.com/my-account/" target="_blank">My Account</a>
                                        </div>
                                    </div>
                                </div>
                             </form>
                        </div>
                        </div>
                    <?php

                    if(is_multisite())
                        {
                            ?>
                                </div>
                            <?php
                        }
                }

            function licence_multisite_require_nottice()
                {
                    ?>
                        <div class="wrap">
                            <div id="icon-settings" class="icon32"></div>
                            <h2><?php esc_html_e( "General Settings", 'divi-mobile' ) ?></h2>

                            <h2 class="subtitle"><?php esc_html_e( "Divi Mobile Software License", 'divi-mobile' ) ?></h2>
                            <div id="form_data">
                                <div class="postbox">
                                    <div class="section section-text ">
                                        <h4 class="heading"><?php esc_html_e( "License Key Required", 'divi-mobile' ) ?>!</h4>
                                        <div class="option">
                                            <div class="explain"><?php esc_html_e( "Enter the License Key you got when bought this product. If you lost the key, you can always retrieve it from", 'divi-mobile' ) ?> <a href="http://diviengine.com/my-account/" target="_blank"><?php esc_html_e( "My Account", 'divi-mobile' ) ?></a><br />
                                            <?php esc_html_e( "More keys can be generate from", 'divi-mobile' ) ?> <a href="http://diviengine.com/my-account/" target="_blank"><?php esc_html_e( "My Account", 'divi-mobile' ) ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php

                }


        }



?>
