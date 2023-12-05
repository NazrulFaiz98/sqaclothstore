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

if ( ! class_exists( 'Wps_Rma_Policies_Settings' ) ) {
	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * Extend the setting in the RMA POLICIES TAB.
	 *
	 * @package    woocommerce-rma-for-return-refund-and-exchange
	 * @subpackage woocommerce-rma-for-return-refund-and-exchange/admin/partials
	 */
	class Wps_Rma_Policies_Settings {
		/**
		 * Undocumented variable
		 *
		 * @var string $rma_pro_activate as rma_pro_activate.
		 */
		public $rma_pro_activate = 'wps_rma_pro_class';

		/**
		 * Contruct of this file.
		 */
		public function __construct() {
			$pro_slug = 'woocommerce-rma-for-return-refund-and-exchange/mwb-woocommerce-rma.php';
			if ( function_exists( 'is_plugin_active' ) && is_plugin_active( $pro_slug ) ) {
				$this->rma_pro_activate = null;
			}
		}

		/**
		 * Extend the functionality.
		 *
		 * @param string $value .
		 */
		public function wps_rma_setting_extend_show_column1_set( $value ) {
			?>
			<option value="exchange" class="<?php echo esc_html( $this->rma_pro_activate ); ?>" <?php selected( 'exchange', $value ); ?> <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?>><?php esc_html_e( 'Exchange', 'woo-refund-and-exchange-lite' ); ?></option>
			<option value="cancel" class="<?php echo esc_html( $this->rma_pro_activate ); ?>" <?php selected( 'cancel', $value ); ?> <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?>><?php esc_html_e( 'Cancel', 'woo-refund-and-exchange-lite' ); ?></option>
			<?php
		}

		/**
		 * Extend the functionality.
		 */
		public function wps_rma_setting_extend_column1_set() {
			?>
			<option class="<?php echo esc_html( $this->rma_pro_activate ); ?>" value="exchange" <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?> ><?php esc_html_e( 'Exchange', 'woo-refund-and-exchange-lite' ); ?></option>
			<option class="<?php echo esc_html( $this->rma_pro_activate ); ?>" value="cancel" <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?> ><?php esc_html_e( 'Cancel', 'woo-refund-and-exchange-lite' ); ?></option>
			<?php
		}

		/**
		 * Extend the row policy.
		 */
		public function wps_rma_setting_extend_column3_set() {
			?>
			<option  class="<?php echo esc_html( $this->rma_pro_activate ); ?>" value="wps_rma_min_order" <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?> ><?php esc_html_e( 'Minimum Order', 'woo-refund-and-exchange-lite' ); ?></option>
			<option  class="<?php echo esc_html( $this->rma_pro_activate ); ?>" value="wps_rma_exclude_via_categories" <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?> ><?php esc_html_e( 'Exclude Categories', 'woo-refund-and-exchange-lite' ); ?></option>
			<option  class="<?php echo esc_html( $this->rma_pro_activate ); ?>" value="wps_rma_exclude_via_products" <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?> ><?php esc_html_e( 'Exclude Products', 'woo-refund-and-exchange-lite' ); ?></option>
			<?php
		}

		/**
		 *  Extend the row policy.
		 *
		 * @param string $value .
		 */
		public function wps_rma_setting_extend_show_column3_set( $value ) {
			?>
			<option class="<?php echo esc_html( $this->rma_pro_activate ); ?>" value="wps_rma_min_order" <?php selected( 'wps_rma_min_order', $value ); ?> <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?>><?php esc_html_e( 'Minimum Order', 'woo-refund-and-exchange-lite' ); ?></option>
			<option class="<?php echo esc_html( $this->rma_pro_activate ); ?>" value="wps_rma_exclude_via_categories" <?php selected( 'wps_rma_exclude_via_categories', $value ); ?> <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?>><?php esc_html_e( 'Exclude Categories', 'woo-refund-and-exchange-lite' ); ?></option>
			<option class="<?php echo esc_html( $this->rma_pro_activate ); ?>" value="wps_rma_exclude_via_products" <?php selected( 'wps_rma_exclude_via_products', $value ); ?> <?php echo ( ! empty( $this->rma_pro_activate ) ) ? 'disabled' : ''; ?>><?php esc_html_e( 'Exclude Products', 'woo-refund-and-exchange-lite' ); ?></option>
			<?php
		}

		/**
		 *  Extend the settings.
		 *
		 * @param string $value .
		 * @param string $count .
		 */
		public function wps_rma_setting_extend_show_column5_set( $value, $count ) {
			$all_cat  = get_terms( 'product_cat' );
			$cat_name = array();
			if ( $all_cat ) {
				foreach ( $all_cat as $cat ) {
					$cat_name[ $cat->term_id ] = $cat->name;
				}
			}
			$all_products_ids = get_posts(
				array(
					'post_type'   => 'product',
					'numberposts' => -1,
					'post_status' => 'publish',
					'fields'      => 'ids',
				)
			);
			?>
			<select name="wps_rma_setting[<?php echo esc_html( $count ); ?>][row_ex_cate][]" class="wps_rma_ex_cate" multiple>   
				<?php
				foreach ( $cat_name as $key => $cat_name ) {
					?>
				<option value="<?php echo esc_html( $key ); ?>"
						<?php
						if ( isset( $value['row_ex_cate'] ) && ! empty( $value['row_ex_cate'] ) ) {
							echo in_array( $key, $value['row_ex_cate'] ) ? 'selected' : '';
						}
						?>
					>
						<?php echo esc_html( $cat_name ); ?>
					</option>
						<?php
				}
				?>
			</select>
			<select name="wps_rma_setting[<?php echo esc_html( $count ); ?>][row_ex_prod][]" class="wps_rma_ex_prod" multiple>   
				<?php
				foreach ( $all_products_ids as $key => $product_id ) {
					$product = wc_get_product( $product_id );
					?>
					<option value="<?php echo esc_html( $product_id ); ?>"
						<?php
						if ( isset( $value['row_ex_prod'] ) && ! empty( $value['row_ex_prod'] ) ) {
							echo in_array( $product_id, $value['row_ex_prod'] ) ? 'selected' : '';
						}
						?>
						>
						<?php echo wp_kses_post( '(' . $product_id . ') ' . $product->get_title() ); ?>
					</option>
				<?php } ?>
			</select>

			<?php
		}

		/**
		 *  Extend the settings.
		 */
		public function wps_rma_setting_extend_column5_set() {
			$all_cat  = get_terms( 'product_cat' );
			$cat_name = array();
			if ( $all_cat ) {
				foreach ( $all_cat as $cat ) {
					$cat_name[ $cat->term_id ] = $cat->name;
				}
			}
			$all_products_ids = get_posts(
				array(
					'post_type'   => 'product',
					'numberposts' => -1,
					'post_status' => 'publish',
					'fields'      => 'ids',
				)
			);
			?>
			<select name="wps_rma_setting[1][row_ex_cate][]" class="wps_rma_ex_cate1" multiple>   
			<?php
			foreach ( $cat_name as $key => $cat_name ) {
				echo '<option value="' . esc_html( $key ) . '">' . esc_html( $cat_name ) . '</option>';
			}
			?>
			</select>
			<select name="wps_rma_setting[1][row_ex_prod][]" class="wps_rma_ex_prod1" multiple>   
			<?php
			foreach ( $all_products_ids as $key => $product_id ) {
				$product = wc_get_product( $product_id );
				?>
				<option value="<?php echo esc_html( $product_id ); ?>"
				>
					<?php echo wp_kses_post( '(' . $product_id . ') ' . $product->get_title() ); ?>
				</option>
				<?php } ?>
			</select>
			<?php
		}

		/**
		 * Register the global shipping html.
		 *
		 * @param [type] $order_id .
		 * @return void
		 */
		public function wps_rma_global_shipping_fee_set( $order_id ) {
			$return_datas = wps_rma_get_meta_data( $order_id, 'wps_rma_return_product', true );
			$readonly     = '';
			if ( isset( $return_datas ) && ! empty( $return_datas ) ) {
				foreach ( $return_datas as $key => $return_data ) {
					if ( 'complete' === $return_data['status'] ) {
						$readonly = 'readonly="readonly"';
					}
				}
			}
			$wps_fee_cost = wps_rma_get_meta_data( $order_id, 'ex_ship_amount1', true );
			if ( isset( $wps_fee_cost ) && ! empty( $wps_fee_cost ) ) {
				$flag = false;
				?>
				<p><?php esc_html_e( 'This Fees amount is deducted from Refund amount', 'woo-refund-and-exchange-lite' ); ?></p>
				<div id="wps_wrma_add_fee">
					<?php
					foreach ( $wps_fee_cost as $name_key => $name_value ) {
						if ( ! empty( $name_value ) ) {
							$flag = true;
							?>
							<div class="wps_wrma_add_new_ex_fee_div">
							<input type="text" name="wps_wrma_ship_name" class="wps_wrma_add_new_ex_fee_name" value="<?php echo esc_html( $name_key ); ?>" readonly>
							<input type="number" class="wps_wrma_add_new_ex_fee" name="wps_wrma_new_ship_cost[]" data-name="<?php echo esc_html( $name_key ); ?>" value="<?php echo esc_html( $name_value ); ?>" <?php echo esc_html( $readonly ); ?>>
							</div>
							<?php
						}
					}
					if ( $flag ) {
						?>
					<input type="button" class="save_ship_ex_cost" name="save_ship_cost" data-orderid="<?php echo esc_html( $order_id ); ?>" data-date="<?php echo esc_html( $order_id ); ?>" value="<?php esc_html_e( 'Save', 'woo-refund-and-exchange-lite' ); ?>">
						<?php
					}
					?>
				</div>
				<?php
			}
		}
	}
}
