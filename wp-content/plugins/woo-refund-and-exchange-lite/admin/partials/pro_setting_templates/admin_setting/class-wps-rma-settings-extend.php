<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link  https://wpswings.com/
 * @since 1.0.0
 *
 * @package    woocommerce-rma-for-return-refund-and-exchange
 * @subpackage woocommerce-rma-for-return-refund-and-exchange/admin/partials
 */

if ( ! class_exists( 'Wps_Rma_Settings_Extend' ) ) {
	/**
	 * The admin-specific functionality of the plugin.
	 * Register the settings.
	 *
	 * @package    woocommerce-rma-for-return-refund-and-exchange
	 * @subpackage woocommerce-rma-for-return-refund-and-exchange/admin/partials
	 */
	class Wps_Rma_Settings_Extend {
		/**
		 * Undocumented variable
		 *
		 * @var string $rma_pro_activate as rma_pro_activate.
		 */
		public $rma_pro_activate = 'wps_rma_pro_class';
		/**
		 * Contruct function.
		 */
		public function __construct() {
			$pro_slug = 'woocommerce-rma-for-return-refund-and-exchange/mwb-woocommerce-rma.php';
			if ( function_exists( 'is_plugin_active' ) && is_plugin_active( $pro_slug ) ) {
				$this->rma_pro_activate = null;
			}
		}
		/**
		 * Extend the general setting.
		 *
		 * @param array $wps_rma_settings_general .
		 */
		public function wps_rma_general_setting_extend_set( $wps_rma_settings_general ) {

			$status                     = wc_get_order_statuses();
			$none_status                = array( 'wc-none' => 'Order Created Date' );
			$t_s                        = array_merge( $none_status, $status );
			$wps_rma_settings_general[] = array(
				'title'   => esc_html__( 'Enable Exchange', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_exchange_enable',
				'value'   => get_option( 'wps_rma_exchange_enable' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_general[] = array(
				'title'       => esc_html__( 'Enable Cancel', 'woo-refund-and-exchange-lite' ),
				'type'        => 'radio-switch',
				'id'          => 'wps_rma_cancel_enable',
				'value'       => get_option( 'wps_rma_cancel_enable' ),
				'class'       => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'placeholder' => '',
				'options'     => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_general[] = array(
				'title'   => esc_html__( 'Enable wallet', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_wallet_enable',
				'value'   => get_option( 'wps_rma_wallet_enable' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_general[] = array(
				'title'   => esc_html__( 'Enable Single Refund and Exchange Request Per Order', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_single_refund_exchange',
				'value'   => get_option( 'wps_rma_single_refund_exchange' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_general[] = array(
				'title'   => esc_html__( 'Enable Refund & Exchange For Exchange Approved Order', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_exchange_app_check',
				'value'   => get_option( 'wps_rma_exchange_app_check' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_general[] = array(
				'title'   => esc_html__( 'Show Sidebar For Refund,Exchange & Cancel Form', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_show_sidebar',
				'value'   => get_option( 'wps_rma_show_sidebar' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_general[] = array(
				'title'   => esc_html__( 'Hide Refund,Exchange,Cancel Button For COD When Processing', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_hide_rec',
				'value'   => get_option( 'wps_rma_hide_rec' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_general[] = array(
				'title'   => esc_html__( 'Guest Feature via Phone Number', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_guest_phone',
				'value'   => get_option( 'wps_rma_guest_phone' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_general[] = array(
				'title' => esc_html__( 'Refund,Exchange,Cancel Functionality Start From Order Status Date', 'woo-refund-and-exchange-lite' ),
				'type'  => 'select',
				'id'    => 'wps_rma_order_status_start',
				'value' => get_option( 'wps_rma_order_status_start' ),
				'class' => 'mwr-select-class ' . $this->rma_pro_activate,
				'options' => $t_s,
			);
			$wps_rma_settings_general[] = array(
				'title' => esc_html__( 'Guest Form Shortcode', 'woo-refund-and-exchange-lite' ),
				'type'  => 'text',
				'id'    => 'wps_rma_guest_form',
				'value' => '[Wps_Rma_Guest_Form]',
				'attr'  => 'readonly',
				'class' => 'mwr-select-class ' . $this->rma_pro_activate,
			);
			$wps_rma_settings_general[] = array(
				'title' => esc_html__( 'Enable To Reset The License On Deactivation Of The Plugin.', 'woo-refund-and-exchange-lite' ),
				'type'  => 'radio-switch',
				'description'  => '',
				'id'    => 'mwr_radio_reset_license',
				'value' => get_option( 'mwr_radio_reset_license' ),
				'class' => 'mwr-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no' => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			return $wps_rma_settings_general;
		}

		/**
		 * Extend the refund setting.
		 *
		 * @param array $wps_rma_settings_refund .
		 */
		public function wps_rma_refund_setting_extend_set( $wps_rma_settings_refund ) {
			$wps_rma_settings_refund[] =
			array(
				'title'   => esc_html__( 'Enable To Refund on Sales Item', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_refund_on_sale',
				'value'   => get_option( 'wps_rma_refund_on_sale' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_refund[] = array(
				'title'   => esc_html__( 'Deduct Coupon Amount During Refund', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_refund_deduct_coupon',
				'value'   => get_option( 'wps_rma_refund_deduct_coupon' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_refund[] =
			array(
				'title'   => esc_html__( 'Enable Auto Accept Refund Request', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_refund_auto',
				'value'   => get_option( 'wps_rma_refund_auto' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_refund[] = array(
				'title'   => esc_html__( 'Enable To Block Customer Refund Request Mail', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_block_refund_req_email',
				'value'   => get_option( 'wps_rma_block_refund_req_email' ),
				'class'   => 'wrael-number-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_refund[] = array(
				'title'   => esc_html__( 'Enable To Auto Restock When Refund Request Accepted', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_auto_refund_stock',
				'value'   => get_option( 'wps_rma_auto_refund_stock' ),
				'class'   => 'wrael-number-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			return $wps_rma_settings_refund;
		}

		/**
		 * Extend the refund appearance setting.
		 *
		 * @param array $refund_app_setting_extend .
		 */
		public function wps_rma_refund_appearance_setting_extend_set( $refund_app_setting_extend ) {
			$refund_app_setting_extend[] = array(
				'title'       => esc_html__( 'Reason of Refund Placeholder', 'woo-refund-and-exchange-lite' ),
				'type'        => 'text',
				'id'          => 'wps_rma_refund_reason_placeholder',
				'value'       => get_option( 'wps_rma_refund_reason_placeholder' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Enter Reason of Refund Placeholder Text', 'woo-refund-and-exchange-lite' ),
			);
			$refund_app_setting_extend[] = array(
				'title'       => esc_html__( 'Refund Request Form Shipping Fee Description', 'woo-refund-and-exchange-lite' ),
				'type'        => 'text',
				'id'          => 'wps_rma_refund_shipping_descr',
				'value'       => empty( get_option( 'wps_rma_refund_shipping_descr' ) ) ? esc_html__( 'This Extra Shipping Fee Will be Deducted from Total Amount When the Refund Request is approved', 'woo-refund-and-exchange-lite' ) : get_option( 'wps_rma_refund_shipping_descr' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Change Shipping Fee Description on Refund Request Form', 'woo-refund-and-exchange-lite' ),
			);
			$refund_app_setting_extend[] = array(
				'title'   => esc_html__( 'Enable Refund Note On Product Page', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_refund_note',
				'value'   => get_option( 'wps_rma_refund_note' ),
				'class'   => 'wrael-number-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$refund_app_setting_extend[] = array(
				'title'       => esc_html__( 'Refund Note on Product Page', 'woo-refund-and-exchange-lite' ),
				'type'        => 'text',
				'id'          => 'wps_rma_refund_note_text',
				'value'       => get_option( 'wps_rma_refund_note_text' ),
				'class'       => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Enter the Product Notes', 'woo-refund-and-exchange-lite' ),
			);
			return $refund_app_setting_extend;
		}

		/**
		 * Register the exchange setting.
		 *
		 * @param array $wps_rma_settings_exchange .
		 */
		public function wps_rma_exchange_settings_array_set( $wps_rma_settings_exchange ) {
			$button_view = array(
				'order-page' => esc_html__( 'Order Page', 'woo-refund-and-exchange-lite' ),
				'My account' => esc_html__( 'Order View Page', 'woo-refund-and-exchange-lite' ),
				'Checkout'   => esc_html__( 'Thank You Page', 'woo-refund-and-exchange-lite' ),
			);
			$pages       = get_pages();
			$get_pages   = array( '' => esc_html__( 'Default', 'woo-refund-and-exchange-lite' ) );
			foreach ( $pages as $page ) {
				$get_pages[ $page->ID ] = $page->post_title;
			}
			$wps_rma_settings_exchange = array(
				array(
					'title'       => esc_html__( 'Select Pages To Hide Exchange Button', 'woo-refund-and-exchange-lite' ),
					'type'        => 'multiselect',
					'description' => '',
					'id'          => 'wps_rma_exchange_button_pages',
					'value'       => get_option( 'wps_rma_exchange_button_pages' ),
					'class'       => 'wrael-multiselect-class wps-defaut-multiselect ' . $this->rma_pro_activate,
					'placeholder' => '',
					'options'     => $button_view,
				),
				array(
					'title'   => esc_html__( 'Enable Exchange Request With Same Product Or Its Variations', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_exchange_same_product',
					'value'   => get_option( 'wps_rma_exchange_same_product' ),
					'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'   => esc_html__( 'Enable to show Manage Stock Button', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_exchange_manage_stock',
					'value'   => get_option( 'wps_rma_exchange_manage_stock' ),
					'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'   => esc_html__( 'Enable Attachment', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_exchange_attachment',
					'value'   => get_option( 'wps_rma_exchange_attachment' ),
					'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'       => esc_html__( 'Attachement Limit', 'woo-refund-and-exchange-lite' ),
					'type'        => 'number',
					'description' => esc_html__( 'By default, It will take 5. If not given any.', 'woo-refund-and-exchange-lite' ),
					'id'          => 'wps_rma_exchange_attachment_limit',
					'value'       => get_option( 'wps_rma_exchange_attachment_limit' ),
					'class'       => 'wrael-number-class ' . $this->rma_pro_activate,
					'min'         => '0',
					'max'         => '15',
					'placeholder' => 'Enter the attachment limit',
				),
				array(
					'title'   => esc_html__( 'Enable to Exchange on Sales Item', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_exchange_on_sale',
					'value'   => get_option( 'wps_rma_exchange_on_sale' ),
					'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'   => esc_html__( 'Deduct Coupon Amount During Exchange', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_exchange_deduct_coupon',
					'value'   => get_option( 'wps_rma_exchange_deduct_coupon' ),
					'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'   => esc_html__( 'Enable To Block Customer Exchange Request Mail', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_block_exchange_req_email',
					'value'   => get_option( 'wps_rma_block_exchange_req_email' ),
					'class'   => 'wrael-number-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'   => esc_html__( 'Enable To Auto Restock When Exchange Request Accepted', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_auto_exchange_stock',
					'value'   => get_option( 'wps_rma_auto_exchange_stock' ),
					'class'   => 'wrael-number-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'   => esc_html__( 'Show Add-To-Cart Button', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_remove_add_to_cart',
					'value'   => get_option( 'wps_rma_remove_add_to_cart' ),
					'class'   => 'wrael-number-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
			);
			$wps_rma_settings_exchange =
			// To extend the refund setting.
			apply_filters( 'wps_rma_exchange_setting_extend', $wps_rma_settings_exchange );
			$wps_rma_settings_exchange[] = array(
				'type' => 'breaker',
				'id'   => 'Appearance',
				'name' => 'Appearance',
			);
			$wps_rma_settings_exchange[] = array(
				'title'       => esc_html__( 'Exchange Button Text', 'woo-refund-and-exchange-lite' ),
				'type'        => 'text',
				'id'          => 'wps_rma_exchange_button_text',
				'value'       => get_option( 'wps_rma_exchange_button_text' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Enter Exchange Button Text', 'woo-refund-and-exchange-lite' ),
			);
			$wps_rma_settings_exchange[] = array(
				'title'   => esc_html__( 'Enable Exchange Reason Description', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_exchange_description',
				'value'   => get_option( 'wps_rma_exchange_description' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_exchange[] = array(
				'title'       => esc_html__( 'Predefined Exchange Reason', 'woo-refund-and-exchange-lite' ),
				'type'        => 'textarea',
				'id'          => 'wps_rma_exchange_reasons',
				'value'       => get_option( 'wps_rma_exchange_reasons' ),
				'class'       => 'wrael-textarea-class ' . $this->rma_pro_activate,
				'rows'        => '2',
				'cols'        => '80',
				'placeholder' => esc_html__( 'Enter the multiple reason separated by comma', 'woo-refund-and-exchange-lite' ),
			);
			$wps_rma_settings_exchange[] = array(
				'title'   => esc_html__( 'Enable Exchange Rules', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_exchange_rules',
				'value'   => get_option( 'wps_rma_exchange_rules' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_exchange[] = array(
				'title'       => esc_html__( 'Exchange Rules Editor', 'woo-refund-and-exchange-lite' ),
				'type'        => 'wp_editor',
				'id'          => 'wps_rma_exchange_rules_editor',
				'value'       => get_option( 'wps_rma_exchange_rules_editor' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Write the Refund Rules( HTML + CSS )', 'woo-refund-and-exchange-lite' ),
			);
			if ( function_exists( 'vc_lean_map' ) ) {
				$wps_rma_settings_exchange[] = array(
					'title'       => esc_html__( 'Select The Page To Redirect', 'woo-refund-and-exchange-lite' ),
					'type'        => 'select',
					'description' => '',
					'id'          => 'wps_rma_exchange_page',
					'value'       => get_option( 'wps_rma_exchange_page' ),
					'class'       => 'wrael-textarea-class ' . $this->rma_pro_activate,
					'options'     => $get_pages,
				);
			}
			$wps_rma_settings_exchange[] = array(
				'title'       => esc_html__( 'Reason Of Exchange Placeholder', 'woo-refund-and-exchange-lite' ),
				'type'        => 'text',
				'id'          => 'wps_rma_exchange_reason_placeholder',
				'value'       => get_option( 'wps_rma_exchange_reason_placeholder' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Enter Reason of Exchange Placeholder Text', 'woo-refund-and-exchange-lite' ),
			);
			$wps_rma_settings_exchange[] = array(
				'title'       => esc_html__( 'Exchange Request Form Shipping Fee Description', 'woo-refund-and-exchange-lite' ),
				'type'        => 'text',
				'id'          => 'wps_rma_exchange_shipping_descr',
				'value'       => empty( get_option( 'wps_rma_exchange_shipping_descr' ) ) ? esc_html__( 'This Extra Shipping Fee Will be Deducted from Total Amount When the Exchange Request is approved', 'woo-refund-and-exchange-lite' ) : get_option( 'wps_rma_exchange_shipping_descr' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Change Shipping Fee Description on Exchange Request Form', 'woo-refund-and-exchange-lite' ),
			);
			$wps_rma_settings_exchange[] = array(
				'title'   => esc_html__( 'Enable Exchange Note on Product Page', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_exchange_note',
				'value'   => get_option( 'wps_rma_exchange_note' ),
				'class'   => 'wrael-number-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			$wps_rma_settings_exchange[] = array(
				'title'   => esc_html__( 'Exchange Note On Product Page', 'woo-refund-and-exchange-lite' ),
				'type'    => 'text',
				'id'      => 'wps_rma_exchange_note_text',
				'value'   => get_option( 'wps_rma_exchange_note_text' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Enter the Product Notes', 'woo-refund-and-exchange-lite' ),
			);
			$wps_rma_settings_exchange[] = array(
				'title'       => esc_html__( 'Exchange With Same Product Text', 'woo-refund-and-exchange-lite' ),
				'type'        => 'text',
				'id'          => 'wps_rma_exchange_same_product_text',
				'value'       => empty( get_option( 'wps_rma_exchange_same_product_text' ) ) ? esc_html__( 'Click on the product(s) to exchange with selected product(s) or its variation(s).', 'woo-refund-and-exchange-lite' ) : get_option( 'wps_rma_exchange_same_product_text' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Add text to display on Exchange form to Exchanging with the same product(s) and it\'s variation(s).', 'woo-refund-and-exchange-lite' ),
			);
			$wps_rma_settings_exchange[] = array(
				'title'       => esc_html__( 'Exchange Form Wrapper Class', 'woo-refund-and-exchange-lite' ),
				'type'        => 'text',
				'id'          => 'wps_wrma_exchange_form_wrapper_class',
				'value'       => get_option( 'wps_wrma_exchange_form_wrapper_class' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'placeholder' => esc_html__( 'Enter Exchange Form Wrapper Class', 'woo-refund-and-exchange-lite' ),
			);
			$wps_rma_settings_exchange[] = array(
				'title'       => esc_html__( 'Exchange Form Custom CSS', 'woo-refund-and-exchange-lite' ),
				'type'        => 'textarea',
				'id'          => 'wps_rma_exchange_form_css',
				'value'       => get_option( 'wps_rma_exchange_form_css' ),
				'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
				'rows'        => '5',
				'cols'        => '80',
				'placeholder' => esc_html__( 'Write the Exchange form CSS', 'woo-refund-and-exchange-lite' ),
			);
			$wps_rma_settings_exchange   =
			// To extend Refund Apperance setting.
			apply_filters( 'wps_rma_exchange_appearance_setting_extend', $wps_rma_settings_exchange );
			$wps_rma_settings_exchange[] = array(
				'type'        => 'button',
				'id'          => 'wps_rma_save_exchange_setting',
				'button_text' => esc_html__( 'Save Setting', 'woo-refund-and-exchange-lite' ),
				'class'       => 'wrael-button-class button_' . $this->rma_pro_activate,
			);
			return $wps_rma_settings_exchange;
		}

		/**
		 * Register the cancel setting.
		 *
		 * @param array $wps_rma_settings_cancel .
		 */
		public function wps_rma_cancel_settings_array_set( $wps_rma_settings_cancel ) {
			$button_view = array(
				'order-page' => esc_html__( 'Order Page', 'woo-refund-and-exchange-lite' ),
				'My account' => esc_html__( 'Order View Page', 'woo-refund-and-exchange-lite' ),
				'Checkout'   => esc_html__( 'Thank You Page', 'woo-refund-and-exchange-lite' ),
			);
			$pages       = get_pages();
			$get_pages   = array( '' => esc_html__( 'Default', 'woo-refund-and-exchange-lite' ) );
			foreach ( $pages as $page ) {
				$get_pages[ $page->ID ] = $page->post_title;
			}
			$wps_rma_settings_cancel = array(
				array(
					'title'   => esc_html__( 'Enable Cancel Order\'s Product', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_cancel_product',
					'value'   => get_option( 'wps_rma_cancel_product' ),
					'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'       => esc_html__( 'Select Pages To Hide Cancel Button', 'woo-refund-and-exchange-lite' ),
					'type'        => 'multiselect',
					'description' => '',
					'id'          => 'wps_rma_cancel_button_pages',
					'value'       => get_option( 'wps_rma_cancel_button_pages' ),
					'class'       => 'wrael-multiselect-class wps-defaut-multiselect ' . $this->rma_pro_activate,
					'placeholder' => '',
					'options'     => $button_view,
				),
				array(
					'type' => 'breaker',
					'id'   => 'Appearance',
					'name' => 'Appearance',
				),
				array(
					'title'       => esc_html__( 'Cancel Order Button Text', 'woo-refund-and-exchange-lite' ),
					'type'        => 'text',
					'id'          => 'wps_rma_cancel_button_text',
					'value'       => get_option( 'wps_rma_cancel_button_text' ),
					'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
					'placeholder' => esc_html__( 'Enter Cancel Button Text', 'woo-refund-and-exchange-lite' ),
				),
				array(
					'title'       => esc_html__( 'Cancel Product Button Text', 'woo-refund-and-exchange-lite' ),
					'type'        => 'text',
					'id'          => 'wps_rma_cancel_prod_button_text',
					'value'       => get_option( 'wps_rma_cancel_prod_button_text' ),
					'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
					'placeholder' => esc_html__( 'Enter Cancel Button Text', 'woo-refund-and-exchange-lite' ),
				),
				array(
					'title'       => esc_html__( 'Cancel Form Wrapper Class', 'woo-refund-and-exchange-lite' ),
					'type'        => 'text',
					'id'          => 'wps_wrma_cancel_form_wrapper_class',
					'value'       => get_option( 'wps_wrma_cancel_form_wrapper_class' ),
					'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
					'placeholder' => esc_html__( 'Enter Cancel Form Wrapper Class', 'woo-refund-and-exchange-lite' ),
				),
				array(
					'title'       => esc_html__( 'Cancel Form Custom CSS', 'woo-refund-and-exchange-lite' ),
					'type'        => 'textarea',
					'id'          => 'wps_rma_cancel_form_css',
					'value'       => get_option( 'wps_rma_cancel_form_css' ),
					'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
					'rows'        => '5',
					'cols'        => '80',
					'placeholder' => esc_html__( 'Write the Cancel form CSS', 'woo-refund-and-exchange-lite' ),
				),
			);
			if ( function_exists( 'vc_lean_map' ) ) {
				$wps_rma_settings_cancel[] = array(
					'title'       => esc_html__( 'Select The Page To Redirect', 'woo-refund-and-exchange-lite' ),
					'type'        => 'select',
					'description' => '',
					'id'          => 'wps_rma_cancel_page',
					'value'       => get_option( 'wps_rma_cancel_page' ),
					'class'       => 'wrael-textarea-class ' . $this->rma_pro_activate,
					'options'     => $get_pages,
				);
			}
			$wps_rma_settings_cancel[] = array(
				'type'        => 'button',
				'id'          => 'wps_rma_save_cancel_setting',
				'button_text' => esc_html__( 'Save Setting', 'woo-refund-and-exchange-lite' ),
				'class'       => 'wrael-button-class button_' . $this->rma_pro_activate,
			);
			return $wps_rma_settings_cancel;
		}

		/**
		 * Register the wallet setting.
		 *
		 * @param array $wps_rma_settings_wallet .
		 */
		public function wps_rma_wallet_settings_array_set( $wps_rma_settings_wallet ) {
			$wps_rma_settings_wallet = array(
				array(
					'title'       => esc_html__( 'Enable To Use Wallet System For WooCommerce Plugin', 'woo-refund-and-exchange-lite' ),
					'type'        => 'radio-switch',
					'id'          => 'wps_rma_wallet_plugin',
					'value'       => get_option( 'wps_rma_wallet_plugin' ),
					'description' => esc_html__( 'All The Wallet Amount Will Be Migrate Into Wallet System For WooCommerce Plugin For Every Users.', 'woo-refund-and-exchange-lite' ),
					'show_link'   => true,
					'class'       => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options'     => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'   => esc_html__( 'Enable To Select Refund Method For The Customer', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_refund_method',
					'value'   => get_option( 'wps_rma_refund_method' ),
					'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'   => esc_html__( 'Cancel Order Amount to Wallet', 'woo-refund-and-exchange-lite' ),
					'type'    => 'radio-switch',
					'id'      => 'wps_rma_cancel_order_wallet',
					'value'   => get_option( 'wps_rma_cancel_order_wallet' ),
					'description' => esc_html__( 'This Feature is not Applicable For COD Order', 'woo-refund-and-exchange-lite' ),
					'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
					'options' => array(
						'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
						'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
					),
				),
				array(
					'title'       => esc_html__( 'Wallet Coupon Prefix', 'woo-refund-and-exchange-lite' ),
					'type'        => 'text',
					'id'          => 'wps_rma_wallet_prefix',
					'value'       => empty( get_option( 'wps_rma_wallet_prefix' ) ) ? 'wps' : get_option( 'wps_rma_wallet_prefix' ),
					'class'       => 'wrael-text-class ' . $this->rma_pro_activate,
					'placeholder' => esc_html__( 'Please Enter the Wallet Coupon Prefix', 'woo-refund-and-exchange-lite' ),
				),
				array(
					'title' => esc_html__( 'Wallet Shortcode', 'woo-refund-and-exchange-lite' ),
					'type'  => 'text',
					'id'    => 'wps_rma_wallet_shorcode',
					'value' => '[Wps_Rma_Customer_Wallet]',
					'attr'  => 'readonly',
					'class' => 'wrael-text-class ' . $this->rma_pro_activate,
				),
				array(
					'type'        => 'button',
					'id'          => 'wps_rma_save_wallet_setting',
					'button_text' => esc_html__( 'Save Setting', 'woo-refund-and-exchange-lite' ),
					'class'       => 'wrael-button-class button_' . $this->rma_pro_activate,
				),
			);
			return $wps_rma_settings_wallet;
		}

		/**
		 * Extend Order Message setting.
		 *
		 * @param array $order_msg_setting_array .
		 */
		public function wps_rma_order_message_setting_extend_set( $order_msg_setting_array ) {
			$order_msg_setting_array[] = array(
				'title'   => esc_html__( 'Enable To Block Mail', 'woo-refund-and-exchange-lite' ),
				'type'    => 'radio-switch',
				'id'      => 'wps_rma_order_email',
				'value'   => get_option( 'wps_rma_order_email' ),
				'class'   => 'wrael-radio-switch-class ' . $this->rma_pro_activate,
				'options' => array(
					'yes' => esc_html__( 'YES', 'woo-refund-and-exchange-lite' ),
					'no'  => esc_html__( 'NO', 'woo-refund-and-exchange-lite' ),
				),
			);
			return $order_msg_setting_array;
		}
	}
}
