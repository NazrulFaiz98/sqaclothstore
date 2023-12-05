<?php
/**
 * Global Shipping.
 *
 * @package    woocommerce-rma-for-return-refund-and-exchange
 * @subpackage woocommerce-rma-for-return-refund-and-exchange/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$rma_pro_activate = 'wps_rma_pro_div';
if ( function_exists( 'wps_rma_pro_active' ) && wps_rma_pro_active() ) {
	$rma_pro_activate = null;
}
?>
<div id="wps_ship_setting" class="<?php echo esc_html( $rma_pro_activate ); ?>">
	<?php $get_wps_rnx_global_shipping = get_option( 'wps_wrma_shipping_global_data', array() ); ?>

	<form action="" method="post">
		<input type="hidden" name="get_nonce" value="<?php echo esc_html( wp_create_nonce( 'create_form_nonce' ) ); ?>">
		<table>
			<tr class="wps__enable-global-shipping wps__enable-shipping">
				<th class="titledesc wps-form-group__label">
					<label for="wps_ship_pro_cb"><?php esc_html_e( 'Enable Global Shipping', 'woo-refund-and-exchange-lite' ); ?></label>
				</th>
				<td class="wps-d-block">
					<div class="wps-form-group">
						<div class="wps-form-group__control">
							<div>
								<div class="mdc-switch">
									<div class="mdc-switch__track"></div>
										<div class="mdc-switch__thumb-underlay">
											<div class="mdc-switch__thumb"></div>
											<input name="wps_enable_ship_setting" type="checkbox" id="wps_enable_ship_setting" value="on" class="mdc-switch__native-control wrael-radio-switch-class" role="switch" aria-checked="
											"
											<?php
											if ( isset( $get_wps_rnx_global_shipping['enable'] ) && 'on' === $get_wps_rnx_global_shipping['enable'] ) {
												echo checked( 'on', $get_wps_rnx_global_shipping['enable'] );}
											?>
											>
										</div>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="wps-d-block">
					<?php
					if ( isset( $get_wps_rnx_global_shipping['fee_name'] ) && ! empty( $get_wps_rnx_global_shipping['fee_name'] ) ) {
						unset( $get_wps_rnx_global_shipping['enable'] );
						$wps_fee_name = $get_wps_rnx_global_shipping['fee_name'];
						$wps_fee_cost = $get_wps_rnx_global_shipping['fee_cost'];

						if ( is_array( $get_wps_rnx_global_shipping ) && ! empty( $get_wps_rnx_global_shipping ) ) {

							if ( is_array( $wps_fee_name ) && ! empty( $wps_fee_name ) ) {
								foreach ( $wps_fee_name as $name_key => $name_value ) {
									if ( ! empty( $name_value ) && ! empty( $wps_fee_cost[ $name_key ] ) ) {
										?>
										<tr id="add_fee_div">
											<td>
												<input type="text" name="add_ship_fee_name[]" id="add_ship_fee_name" value="<?php echo esc_html( $name_value ); ?>" data-attr="<?php echo esc_html( $name_key ); ?>">

											</td>
											<td>
												<input type="text" name="add_ship_fee_cost[]" id="add_ship_fee_cost" value="<?php echo esc_html( $wps_fee_cost[ $name_key ] ); ?>" data-attr="<?php echo esc_html( $name_key ); ?>">
											</td>
											<td>
												<input type="button" class="button wps_wrma_global_ship_fee_rem" value="Remove">
											</td>
										</tr>
										<?php
									}
								}
							}
						}
					}
					?>
					<div class="add_fee_div1">
						<tr class="add_fee_tr" valign="top">
							<td class="forminp" id="add_fee_button"><fieldset>
								<div >
									<input type="button" id="add_fee" name="add_fee" class="button wps-rma-admin__button" value="<?php esc_html_e( 'Add fee', 'woo-refund-and-exchange-lite' ); ?>">
								</div>
							</fieldset></td>
						</tr>
					</div>
				</td>
			</tr>
			<tr class="wps__enable-shipping">
				<th class="titledesc wps-form-group__label">
					<label for="wps_ship_pro_cb"><?php esc_html_e( 'Enable Product Category Based Shipping', 'woo-refund-and-exchange-lite' ); ?></label>
				</th>
				<td>
					<div class="wps-form-group">
						<div class="wps-form-group__control">
							<div>
								<div class="mdc-switch">
									<div class="mdc-switch__track"></div>
										<div class="mdc-switch__thumb-underlay">
											<div class="mdc-switch__thumb"></div>
											<input name="wps_ship_pro_cb" type="checkbox" id="wps_ship_pro_cb" value="on" class="mdc-switch__native-control wrael-radio-switch-class" role="switch" aria-checked="
											"
											<?php
											if ( isset( $get_wps_rnx_global_shipping['pro_cb'] ) && 'on' === $get_wps_rnx_global_shipping['pro_cb'] ) {
												echo checked( 'on', $get_wps_rnx_global_shipping['pro_cb'] );}
											?>
											>
										</div>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<tr class="select_product_for_ship wps__enable-shipping">	
				<th class="titledesc" ><label><?php esc_html_e( 'Select Product Categories', 'woo-refund-and-exchange-lite' ); ?></label></th>
				<td><select name="wps_wrma_ship_products[]" id="wps_wrma_ship_products" class="wps_wrma_products" multiple>
					<?php
					$args               = array(
						'orderby'    => 'title',
						'order'      => 'ASC',
						'hide_empty' => true,
						'fields'     => 'id=>name',
					);
					$product_categories = get_terms( 'product_cat' );
					$count              = count( $product_categories );
					if ( $count > 0 ) {
						foreach ( $product_categories as $categry ) {
							?>
							<option value="<?php echo esc_html( $categry->term_id ); ?>"
							<?php
							if ( isset( $get_wps_rnx_global_shipping['ship_pro'] ) && is_array( $get_wps_rnx_global_shipping['ship_pro'] ) ) {
								if ( in_array( $categry->term_id, $get_wps_rnx_global_shipping['ship_pro'] ) ) {
									echo 'selected'; }
							}
							?>
							><?php echo esc_html( $categry->name ); ?></option>
							<?php
						}
					}
					?>
				</select></td>
			</tr>
		</table>
		<input type="submit" id="save_ship_setting" name="save_ship_setting" value="<?php esc_html_e( 'Save Settings', 'woo-refund-and-exchange-lite' ); ?>" class="wps-rma-admin__button <?php echo 'button_' . esc_attr( $rma_pro_activate ); ?>" >
	</form>
</div>
