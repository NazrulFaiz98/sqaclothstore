<?php
if (!defined('ABSPATH')) {
    exit;
}
$wf_admin_img_path=WF_PKLIST_PLUGIN_URL . 'admin/images';
$tab_items=array(
    "general"=>__("General", 'print-invoices-packing-slip-labels-for-woocommerce'),
);
$show_qrcode_placeholder = apply_filters('wt_pklist_show_qrcode_placeholder_in_template',false,$this->module_base);
if(!$show_qrcode_placeholder){
    $tab_items['qrcode_promote'] = '<div style="display:flex;">QR Code<img src="'.$wf_admin_img_path.'/promote_crown.png" style="width: 12px;height: 12px;background: #FFA800;padding: 5px;margin-left: 4px;border-radius: 25px;"></div>';
}
$tab_items = apply_filters('wt_pklist_add_additional_tab_item_into_module',$tab_items,$this->module_base,$this->module_id);
$pro_installed = true;
$pro_invoice_path = 'wt-woocommerce-invoice-addon/wt-woocommerce-invoice-addon.php';
if(!is_plugin_active($pro_invoice_path)){
    $pro_installed = false;
    $invoice_pro_feature_list = array(
        __("Multiple premium invoice templates to choose from","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Enable customers to Pay Later at checkout","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Collect payments with a payment link on the invoice","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Show different taxes in separate columns","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Add product meta fields & attributes to invoices","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Group products by category","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Sort order items in the product table ","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Show variation data for variable products","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Multiple display formats for bundled products","print-invoices-packing-slip-labels-for-woocommerce"),
        __("Generate packing slips and credit notes","print-invoices-packing-slip-labels-for-woocommerce"),
    );
    ?>
<style type="text/css">
.wf-tab-head{width: 66%;}
.wt_pro_addon_features_list_doc ul li:nth-child(n + 4){display: none;}
.wt_pro_addon_features_list_doc li{font-style: normal;font-weight: 500;font-size: 13px;line-height: 17px;color: #001A69;list-style: none;position: relative;padding-left: 49px;margin: 0 15px 15px 0;display: flex;align-items: center;}
.wt_pro_addon_features_list_doc li:before{content: '';position: absolute;height: 15px;width: 15px;background-image: url(<?php echo esc_url($wf_admin_img_path.'/tick.svg'); ?>);background-size: contain;background-repeat: no-repeat;background-position: center;left: 15px;}
.wt_pro_coupon_banner_wrapper_doc{padding: 1em 2em;background: #E5F5DE;border-left: 4px solid #6ABE45;border-radius: 0px 7px 0px 0px;}
.wt_pro_addon_widget_doc{border:1.3px solid #E8E8E8;margin-top: 1em;border-radius: 0px 7px 0px 0px;}
.wt_pro_coupon_banner_wrapper_doc p{margin: 0.3em 0;}
</style>
    <?php
}
?>
<div class="wt_wrap">
    <div class="wt_heading_section">
        <h2 class="wp-heading-inline">
        <?php _e('Settings','print-invoices-packing-slip-labels-for-woocommerce');?>: <?php _e('Invoice','print-invoices-packing-slip-labels-for-woocommerce');?>
        </h2>
         <?php
            //webtoffee branding
            include WF_PKLIST_PLUGIN_PATH.'/admin/views/admin-settings-branding.php';
        ?>
    </div>
    <?php
    if(false === $pro_installed){
        $sidebar_pro_link = 'https://www.webtoffee.com/product/woocommerce-pdf-invoices-packing-slips/?utm_source=free_plugin_sidebar&utm_medium=pdf_basic&utm_campaign=PDF_invoice&utm_content='.WF_PKLIST_VERSION;
    ?>
    <div style="position:relative;">
        <div class="wt_pro_addon_tile_doc" style="<?php echo is_rtl() ? 'left:0;' : 'right:0;'; ?>">
            <div class="wt_pro_coupon_banner_div">
                <div class="wt_pro_coupon_banner_wrapper_doc">
                    <p class="wt_pro_coupon_banner_div_title"><b><?php echo __("Exclusive for you!","print-invoices-packing-slip-labels-for-woocommerce"); ?></b></p>
                    <p>
                        <?php 
                        printf('%1$s <b>%2$s .<br> %3$s.</b>',
                            __("Our free plugin users are getting all of the premium PDF Invoices, Packing Slips, Delivery Notes, and Shipping Labels plugin add-ons at","print-invoices-packing-slip-labels-for-woocommerce"),
                            __("30% off","print-invoices-packing-slip-labels-for-woocommerce"),
                            __("Use the code PDFPRO30 at checkout","print-invoices-packing-slip-labels-for-woocommerce")); 
                        ?>
                    </p>
                    <p style="font-style: italic;">(<?php echo __("Coupon applicable for the first purchase only","print-invoices-packing-slip-labels-for-woocommerce"); ?>)</p>
                </div>
            </div>
            <div class="wt_pro_addon_widget_doc">
                <div class="wt_pro_addon_widget_wrapper_doc">
                    <p style="font-size:14px;"><?php _e("You are currently on the basic version of the invoice module. Checkout our premium features.","print-invoices-packing-slip-labels-for-woocommerce"); ?></p>
                </div>
                <div class="wt_pro_addon_features_list_doc">
                    <ul>
                        <?php
                            foreach($invoice_pro_feature_list as $p_feature){
                                ?>
                                <li><?php echo esc_html_e($p_feature); ?></li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="wt_pro_show_more_less_doc">
                    <a class="wt_pro_addon_show_more_doc"><p><? echo __("Show More","print-invoices-packing-slip-labels-for-woocommerce"); ?></p></a>
                    <a class="wt_pro_addon_show_less_doc"><p><? echo __("Show Less","print-invoices-packing-slip-labels-for-woocommerce"); ?></p></a>
                </div>
                <a class="wt_pro_addon_premium_link_div_doc" href="<?php echo esc_url($sidebar_pro_link); ?>" target="_blank">
                    <?php _e("Checkout Premium","print-invoices-packing-slip-labels-for-woocommerce"); ?> <span class="dashicons dashicons-arrow-right-alt"></span>
                </a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    
    <div class="nav-tab-wrapper wp-clearfix wf-tab-head">
    	<?php Wf_Woocommerce_Packing_List::generate_settings_tabhead($tab_items, 'module'); ?>
    </div>
    <div class="wf-tab-container">
    	<?php
    		foreach($tab_items as $target_id => $tab_item){
    			$settings_view=plugin_dir_path( __FILE__ ).$target_id.'.php';
                if(file_exists($settings_view))
                {
                    include $settings_view;
                }
    		}
    	?>
    	<!-- add additional tab view pages -->
    	<?php do_action('wt_pklist_add_additional_tab_content_into_module',$this->module_base,$this->module_id); ?>
        <?php do_action('wf_pklist_module_out_settings_form',array(
            'module_id'=>$this->module_base
        ));?>
    </div>
</div>