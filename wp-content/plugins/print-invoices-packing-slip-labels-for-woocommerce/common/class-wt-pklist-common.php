<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.webtoffee.com
 * @since      4.1.0
 *
 * @package    Wf_Woocommerce_Packing_List
 * @subpackage Wf_Woocommerce_Packing_List/common
 */

if(!class_exists('Wt_Pklist_Common'))
{
class Wt_Pklist_Common
{
    /**
     * The ID of this plugin.
     *
     * @since    4.1.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    4.1.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;
    private static $instance = null;
    public static $modules = array(
        'wt_wc_product'
    );
    private static $hpos_enabled = null;
    private static $default_meta_values = array();
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        self::$default_meta_values = array(
            'wf_invoice_number' => 'XXX-1111-YYYY',
        );
    }

    public static function get_instance($plugin_name, $version)
    {
        if(self::$instance==null)
        {
            self::$instance=new Wt_Pklist_Common($plugin_name, $version);
        }
        return self::$instance;
    }

    public function load_common_modules(){
        if(!empty(self::$modules)){
            foreach(self::$modules as $c_module){
                $module_file    = plugin_dir_path( __FILE__ )."modules/".$c_module."/".$c_module.".php";
                if(file_exists($module_file)){
                    require_once $module_file;
                }
            }
        }
    }

    /**
     * Is WooCommerce HPOS enabled
     * 
     * @since   4.1.0
     * @static
     * @return  bool True when enabled otherwise false
     */
    public static function is_wc_hpos_enabled()
    {
        if(is_null(self::$hpos_enabled))
        {
            if(class_exists('Automattic\WooCommerce\Utilities\OrderUtil'))
            {
                self::$hpos_enabled = Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled();
            }else
            {
                self::$hpos_enabled = false;
            }
        }
        return self::$hpos_enabled;
    }

    /**
     * Get WC_Order object from the given value.
     * 
     * @since   4.1.0
     * @static
     * @param   int|WC_order    $order      Order id or order object
     * @return  WC_order        Order object
     */
    public static function get_order($order)
    {
        return (is_int($order) || (is_string($order) && 0 < absint($order)) ? wc_get_order(absint($order)) : $order);
    }

    
    /**
     * Get order id from the given value.
     * 
     * @since   4.1.0
     * @static
     * @param   int|WC_order    $order      Order id or order object
     * @return  int             Order id
     */
    public static function get_order_id($order)
    {
        return (is_int($order) || (is_string($order) && 0 < absint($order))) ? absint($order) : $order->get_id();
    }

    /**
     * To Check if the currenct order is refunded through the status change
     *
     * @param object $order
     * @return boolean
     */
    public static function is_this_refunded( $order ) {
        if(!is_null($order)){
            return "shop_order_refund" === $order->get_type();
        }
		return false;
	}

    /**
     * To get the parent order id of current refunded order
     *
     * @param object $order
     * @return void
     */
    public static function get_refunded_parent_id( $order ) {
        if(!is_null($order)){
            return $order->get_parent_id();
        }
        return 0;
	}

    public static function get_refunded_parent_order( $order ) {
		// only try if this is actually a refund
		if ( ! self::is_this_refunded( $order ) ) {
			return $order;
		}

		$parent_order_id = self::get_refunded_parent_id( $order );
        if(0 > $parent_order_id){
            $order = wc_get_order( $parent_order_id );
        }
		return $order;
	}

    /**
     * Get the order meta
     * @since 4.1.0.1 - [Fix] - Get meta value, if even ACF is active
     * @param object|string|int $order
     * @param string $meta_key
     * @param boolean $single
     * @param string $default
     * @return string|int|float|array
     */
    public static function get_order_meta($order, $meta_key, $single = false, $default = '')
    {    
        $order = self::get_order($order);
        if(is_null($order) && !$default)
        {
            return (isset(self::$default_meta_values[$meta_key]) ? self::$default_meta_values[$meta_key] : '');
        }
        $meta_value = '';
        $actual_meta_key = $meta_key;
        $meta_key = '_' === substr( $meta_key, 0, 1 ) ? ltrim($meta_key, '_') : $meta_key;
        if("order_currency" === $meta_key){
            $meta_key = 'currency';
        }
        

        // To get WC abstract properties
        if(true === self::is_wc_order_prop( $meta_key )){
            $function = 'get_' . $meta_key;
            if ( is_callable( array( $order, $function ) ) ) {
                return $order->{$function}();
            }
        }

        // To get other than WC abstract properties
        if ( empty($meta_value) && !self::is_wc_order_prop( $meta_key ) ) {
			$meta_value = $order->get_meta( $meta_key,$single );
		}

		// if meta_value is still empty then try prefixed with underscore (not when ACF is active!)
		if ( empty( $meta_value ) && '_' !== substr( $meta_key, 0, 1 ) && !self::is_wc_order_prop( "_{$meta_key}" ) && !class_exists('ACF') ) {
			$meta_value = $order->get_meta( "_{$meta_key}",$single );
		}
        
		// WC3.0 fallback to properties
		$property = str_replace('-', '_', sanitize_title( ltrim($meta_key, '_') ) );
		if ( empty( $meta_value ) && is_callable( array( $order, "get_{$property}" ) ) ) {
			$meta_value = $order->{"get_{$property}"}( 'view' );
		}

        // fallback to parent for refunds
		if ( empty( $meta_value ) && self::is_this_refunded( $order ) ) {
			$parent_order = self::get_refunded_parent_order( $order );
			if ( !self::is_wc_order_prop( $meta_key ) ) {
				$meta_value = $parent_order->get_meta( $meta_key,$single );
			}

			// WC3.0 fallback to properties
			if ( empty( $meta_value ) && is_callable( array( $parent_order, "get_{$property}" ) ) ) {
				$meta_value = $parent_order->{"get_{$property}"}( 'view' );
			}
		}

        if ( empty($meta_value) && !self::is_wc_order_prop( $meta_key ) ) {
			$meta_value = $order->get_meta( $actual_meta_key,$single );
		}
        return $meta_value;
    }

    /**
     * Update order meta.
     * HPOS and non-HPOS compatible
     * 
     * @since   4.1.0
     * @static
     * @param   int|WC_order    $order      Order id or order object
     * @param   string          $meta_key   Meta key
     * @param   mixed           $value      Value for meta
     */
    public static function update_order_meta($order, $meta_key, $value)
    {
        if(self::is_wc_hpos_enabled())
        {
            $order = self::get_order($order);
            $order->update_meta_data($meta_key, $value);

            /**
             *  if post and order table are not synchronized,
             *  then delete the meta key and meta value from the post meta table
             */ 
            if("yes" !== get_option( 'woocommerce_custom_orders_table_data_sync_enabled' )){
                $order_id = self::get_order_id($order);
                update_post_meta($order_id, $meta_key, $value);
            }
            $order->save();
        }else
        {
            $order = self::get_order($order);
            $order_id = self::get_order_id($order);
            update_post_meta($order_id, $meta_key, $value);
            $order->save();

            /**
             *  If the post and order table are not synchronized or HPOS is not enabled yet,
             *  then delete the meta key and meta value from the wc_order_meta table
             */
            if("yes" !== get_option( 'woocommerce_custom_orders_table_data_sync_enabled' )){
                self::add_meta_to_wc_order_table($order,$meta_key,$value);
            }
        }
    }

    /**
     * Delete order meta.
     * HPOS and non-HPOS compatible
     * 
     * @since   4.1.0
     * @static
     * @param   int|WC_order    $order      Order id or order object
     * @param   string          $meta_key   Meta key
     */
    public static function delete_order_meta($order, $meta_key)
    {
        if(self::is_wc_hpos_enabled())
        {
            $order = self::get_order($order);
            $order->delete_meta_data($meta_key);
            $order->save();

            delete_post_meta($order->get_id(), $meta_key); //fallback
        }else
        {
            $order_id = self::get_order_id($order);
            delete_post_meta($order_id, $meta_key);

            //fallback
            $order = wc_get_order($order_id);
            $order->delete_meta_data($meta_key);
            $order->save();
        }
    }

    /**
     * To delete all the row of given meta key from the order meta table, if WC HPOS is enabled
     *
     * @param string $meta_key
     * @return void
     */
    public static function delete_order_meta_by_key($meta_key){

        if(!empty($meta_key) && is_string($meta_key)){
            delete_post_meta_by_key( $meta_key );
            $delete_from_order_table = false;
            if(self::is_wc_hpos_enabled())
            {
                // post & order table are not synchronized
                if("yes" !== get_option( 'woocommerce_custom_orders_table_data_sync_enabled' )){
                    $delete_from_order_table = true;
                }
            }else
            {
                // Use post table enabled
                $delete_from_order_table = true;
            }

            if(true === $delete_from_order_table){
                global $wpdb;
                $table_name = $wpdb->prefix.'wc_orders_meta';
                if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name){
                    $del_order_meta_query = "DELETE FROM $table_name WHERE `meta_key` IN('".esc_sql($meta_key)."')";
                    $wpdb->query( $del_order_meta_query );
                }
            }
        }
    }

    /**
     * To Check if the given order is fully refunded through the status change only
     *
     * @param object $order
     * @return boolean
     */
    public static function is_fully_refunded($order){
        if(!is_null($order)){
            $all_refund_orders = $order->get_refunds();
            $number_of_refunds = count($all_refund_orders);
            $order_status = ( WC()->version < '2.7.0' ) ? $order->status : $order->get_status();
            if(1 === $number_of_refunds && "refunded" === $order_status){
                return true;
            }else{
                return false;
            }
        }
        return false;
	}

    /**
     * To check if the meta key is the WC abstract property
     *
     * @param string $key
     * @return boolean
     */
    public static function is_wc_order_prop( $meta_key ) {
		// Taken from WC class
		$order_props = array(
			// Abstract order props
			'parent_id',
			'status',
			'currency',
			'version',
			'prices_include_tax',
			'date_created',
			'date_modified',
			'discount_total',
			'discount_tax',
			'shipping_total',
			'shipping_tax',
			'cart_tax',
			'total',
			'total_tax',
			// Order props
			'customer_id',
			'order_key',
			'billing_first_name',
			'billing_last_name',
			'billing_company',
			'billing_address_1',
			'billing_address_2',
			'billing_city',
			'billing_state',
			'billing_postcode',
			'billing_country',
			'billing_email',
			'billing_phone',
			'shipping_first_name',
			'shipping_last_name',
			'shipping_company',
			'shipping_address_1',
			'shipping_address_2',
			'shipping_city',
			'shipping_state',
			'shipping_postcode',
			'shipping_country',
			'payment_method',
			'payment_method_title',
			'transaction_id',
			'customer_ip_address',
			'customer_user_agent',
			'created_via',
			'customer_note',
			'date_completed',
			'date_paid',
			'cart_hash',
		);

		if ( version_compare( WC()->version, '5.6' ) >= 0 ) {
			$order_props[] = 'shipping_phone';
		}
        
        $order_props = apply_filters('wt_pklist_add_wc_abstract_property',$order_props);
		return in_array($meta_key, $order_props);
	}

    public static function which_table_to_take(){
        if(self::is_wc_hpos_enabled()){
			if("yes" !== get_option( 'woocommerce_custom_orders_table_data_sync_enabled' )){
				$which_table = 'order_table';
			}else{
				$which_table = 'post_table';
			}
		}else{
			$which_table = "post_table";
		}
        return $which_table;
    }

    public static function meta_key_exists_in_wc_order_meta($order_id,$meta_key){
        global $wpdb;
        $table_name = $wpdb->prefix.'wc_orders_meta';
        $search = $wpdb->get_row($wpdb->prepare("SELECT `id` from $table_name WHERE `meta_key` IN (%s) AND `order_id` = %d",array($meta_key,$order_id)));
        if(!$search){
            return false;
        }else{
            return true;
        }
    }

    public static function add_meta_to_wc_order_table($order,$meta_key,$value){
        global $wpdb;
        $table_name = $wpdb->prefix.'wc_orders_meta';
        if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name){
            $order_id = self::get_order_id($order);
            if(self::meta_key_exists_in_wc_order_meta($order_id,$meta_key)){
                $update_data        = array('meta_value' => $value);
                $update_data_type   = array( '%s' );
                $update_where       = array(
                    'order_id'  => $order_id,
                    'meta_key'  => $meta_key
                );
                $update_where_type  = array('%d','%s');
                $wpdb->update($table_name,$update_data,$update_where,$update_data_type,$update_where_type);
            }else{
                $insert_data = array(
                    'order_id'      =>  $order_id,
                    'meta_key'      =>  $meta_key,
                    'meta_value'    =>  $value
                );
                $insert_data_type = array(
                    '%d','%s','%s'
                );
                $wpdb->insert($table_name,$insert_data,$insert_data_type);
            }
        }
    }

    /**
     * Is current admin page is HPOS enabled orders page
     * 
     * @since   4.1.0.1
     * @static
     * @return  bool    True when current page is HPOS orders page
     */
    public static function is_hpos_orders_page()
    {
        $basename = basename(parse_url($_SERVER['PHP_SELF'], PHP_URL_PATH));
        $page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : ''; 
        $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : ''; 
        return ('admin.php' === $basename && 'wc-orders' === $page && ('' === $action || '-1' === $action));
    }
    /**
     * Is current admin page is HPOS enabled order edit page
     * 
     * @since   4.1.0.1
     * @static
     * @return  bool    True when current page is HPOS order edit page
     */
    public static function is_hpos_order_edit_page()
    {
        $basename = basename(parse_url($_SERVER['PHP_SELF'], PHP_URL_PATH));
        $page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : ''; 
        $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : ''; 
        return ('admin.php' === $basename && 'wc-orders' === $page && 'edit' === $action);
    }
}
}