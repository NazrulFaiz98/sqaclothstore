<?php
/**
 * Returnship Label Template.
 *
 * @package    woocommerce-rma-for-return-refund-and-exchange
 * @subpackage woocommerce-rma-for-return-refund-and-exchange/admin/partials
 */

$rma_pro_activate = 'wps_rma_pro_div';
if ( function_exists( 'wps_rma_pro_active' ) && wps_rma_pro_active() ) {
	$rma_pro_activate = null;
}
?>
<h4>
	<input type="button" class="show_returnship_label wps-rma-admin__button" value="ReturnShip Label" />
	<input class="show_shipintegration wps-rma-admin__button" type="button" value="Ship Integration" />
	<input class="show_shiprocketintegration wps-rma-admin__button" type="button" value="ShipRocket Integration" />
	<?php
	// Extend the integration button.
	do_action( 'wps_rma_extend_more_integration_button' );
	?>
</h4>
<div class="<?php echo esc_html( $rma_pro_activate ); ?>">
<div class="wps_table wps_rma_shipping_label_setting">
	<form enctype="multipart/form-data" action="" id="mainform" method="post">
		<h4 id="wrma_mail_setting" class="wps_wrma_basic_setting wps_wrma_slide_active"><?php esc_html_e( 'Return Ship Setting', 'woo-refund-and-exchange-lite' ); ?></h4>
		<div id="wrma_mail_setting_wrapper">
			<table class="form-table wps_wrma_notification_section">
				<tr valign="top">
					<th class="titledesc wps-form-group__label">
						<label for="wps_wrma_enable_return_ship_label"><?php esc_html_e( 'Enable Shiping Label', 'woo-refund-and-exchange-lite' ); ?></label>
					</th>
					<td>
						<div class="wps-form-group">
							<div class="wps-form-group__control">
								<div>
									<div class="mdc-switch">
										<div class="mdc-switch__track"></div>
											<div class="mdc-switch__thumb-underlay">
												<div class="mdc-switch__thumb"></div>
												<input name="wps_wrma_enable_return_ship_label" type="checkbox" id="wps_wrma_enable_return_ship_label" value="on" class="mdc-switch__native-control wrael-radio-switch-class" role="switch" aria-checked="
												"
												<?php
												$wps_wrma_enable_return_ship_label = get_option( 'wps_wrma_enable_return_ship_label', 'no' );
												if ( 'on' === $wps_wrma_enable_return_ship_label ) {
													?>
													checked="checked"
													<?php
												}
												?>
												>
											</div>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr valign="top">
					<th class="titledesc wps-form-group__label">
						<label for="wps_wrma_enable_return_ship_station_label"><?php esc_html_e( 'Enable ShipEngine Shiping Label', 'woo-refund-and-exchange-lite' ); ?></label>
					</th>
					<td>
						<div class="wps-form-group">
							<div class="wps-form-group__control">
								<div>
									<div class="mdc-switch">
										<div class="mdc-switch__track"></div>
											<div class="mdc-switch__thumb-underlay">
												<div class="mdc-switch__thumb"></div>
												<input name="wps_wrma_enable_return_ship_station_label" type="checkbox" id="wps_wrma_enable_return_ship_station_label" value="on" class="mdc-switch__native-control wrael-radio-switch-class" role="switch" aria-checked="
												"
												<?php
												$wps_wrma_enable_return_ship_station_label = get_option( 'wps_wrma_enable_return_ship_station_label', 'no' );
												if ( 'on' === $wps_wrma_enable_return_ship_station_label ) {
													?>
													checked="checked"
													<?php
												}
												?>
												>
											</div>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr valign="top">
					<th class="titledesc wps-form-group__label">
						<label for="wps_wrma_enable_ss_return_ship_station_label"><?php esc_html_e( 'Enable ShipStation Shiping Label', 'woo-refund-and-exchange-lite' ); ?></label>
					</th>
					<td>
						<div class="wps-form-group">
							<div class="wps-form-group__control">
								<div>
									<div class="mdc-switch">
										<div class="mdc-switch__track"></div>
											<div class="mdc-switch__thumb-underlay">
												<div class="mdc-switch__thumb"></div>
												<input name="wps_wrma_enable_ss_return_ship_station_label" type="checkbox" id="wps_wrma_enable_return_ship_station_label" value="on" class="mdc-switch__native-control wrael-radio-switch-class" role="switch" aria-checked="
												"
												<?php
												$wps_wrma_enable_ss_return_ship_station_label = get_option( 'wps_wrma_enable_ss_return_ship_station_label', 'no' );
												if ( 'on' === $wps_wrma_enable_ss_return_ship_station_label ) {
													?>
													checked="checked"
													<?php
												}
												?>
												>
											</div>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<h6>
		<?php
			$woo_email_url = admin_url() . 'admin.php?page=wc-settings&tab=email&section=wps_rma_returnship_email';
			/* translators: %s: search term */
			printf( esc_html__( 'To Configure Returnship Related Email %s.', 'woo-refund-and-exchange-lite' ), '<a class="button_' . esc_attr( $rma_pro_activate ) . '" href="' . esc_html( $woo_email_url ) . '">Click Here</a>' );
		?>
		</h6>
		<p class="submit">
			<input type="submit" value="<?php esc_html_e( 'Save Settings', 'woo-refund-and-exchange-lite' ); ?>" class="wps-rma-save-button wps-rma-admin__button <?php echo 'button_' . esc_attr( $rma_pro_activate ); ?>" name="wps_wrma_noti_save_return_slip">
		</p>
	</form>
</div>
<div class='wps_table wps_rma_shipping_setting'>
	<form enctype='multipart/form-data' action='' id='' method='post'>
		<!-- wrapper div -->
		<div class='wps_wrma_accordion'>
			<div class="wps_wrma_accord_sec_wrap">
				<h4 id="wrma_shipstation_heading" class="wps_wrma_basic_setting wps_wrma_slide_active">
					<?php esc_html_e( 'ShipEngine Configuration', 'woo-refund-and-exchange-lite' ); ?>
				</h4>
				<div class='wps_wrma_validate_form_wrapper'>
					<!-- loader -->
					<div class="wps_wrma_return_loader">
						<img src="<?php echo esc_html( home_url() ); ?>/wp-admin/images/spinner-2x.gif">
					</div>
					<?php

						$wps_wrma_connected_account = get_option( ' wps_wrma_connected_ship_station_account ', '' );
						$wps_wrma_api_key = get_option( ' wps_wrma_validated_ship_station_api_key ', '' );
						$carrier_object = get_option( ' carrier_object ', '' );
						$wps_wrma_validated_html = sprintf( '%s %s', 'Connected Account : ', $wps_wrma_connected_account );
						$wps_wrma_hide_form = '';
					if ( ! empty( $wps_wrma_connected_account ) || ! empty( $wps_wrma_api_key ) ) {

						$wps_wrma_hide_form = 'wps_wrma_show_connected';
						?>

							<!-- Connected form start -->
							<div class="wps_wrma_ship_station_validated-wrap">
								<div class="wps_wrma_ship_station_validated">
									<p class="wps_wrma_ship_station_account_html " >

									<?php echo wp_kses_post( $wps_wrma_validated_html ); ?>
									</p>
									<div class="wps_wrma_logout_wrap">
										<a href='javascript:void(0)' class='wps_wrma_logout' ><?php esc_html_e( 'Log Out', 'woo-refund-and-exchange-lite' ); ?>
										</a>
									</div>
								</div> 
							</div>
							<!-- Connected form ends -->

							<?php
							/* List carriers starts */

							$wps_wrma_refund_class = new Rma_Return_Refund_Exchange_For_Woocommerce_Pro_Admin( 'rma-return-refund-exchange-for-woocommerce-pro', '5.0.0' );
							$wps_wrma_refund_class->wps_wrma_list_carriers_html();

							/* List carriers ends */
					}
					?>
					<!-- Validation form start -->
					<div class="wps_wrma_ship_station <?php echo esc_html( $wps_wrma_hide_form ); ?> ">

						<!-- input form -->
						<label for='wps_wrma_validate_id' ><?php esc_html_e( ' Enter Your API Key', 'woo-refund-and-exchange-lite' ); ?></label>
						<span class="wps_wrma_input-wrap">
							<input type='text' id='wps_wrma_validate_id' class="wps_wrma_validate_field" placeholder='Enter Your API Key' >
						</span>

						<span class='wps_wrma_notify_error'></span>

						<p class='submit'>
							<a href='javascript:void(0)' class='wps_wrma_validate_api_key wps-rma-admin__button <?php echo 'button_' . esc_attr( $rma_pro_activate ); ?>' ><?php esc_html_e( 'Validate Account', 'woo-refund-and-exchange-lite' ); ?>
							</a>
						</p>
					</div>
					<!-- Validation form ends -->
				</div>
			</div>
		</div>
		<!-- wrapper div -->
		<div class='wps_wrma_accordion'>
			<div class="wps_wrma_accord_sec_wrap">
				<h4 id="wrma_shipstation_main_heading" class="wps_wrma_basic_setting wps_wrma_slide_active">
					<?php esc_html_e( 'Shipstation Configuration', 'woo-refund-and-exchange-lite' ); ?>
				</h4>
				<div class='wps_wrma_ship_validate_form_wrapper'>
					<!-- loader -->
					<div class="wps_wrma_returnship_loader">
						<img src="<?php echo esc_html( home_url() ); ?>/wp-admin/images/spinner-2x.gif">
					</div>
					<?php
						$wps_wrma_connected_account = get_option( ' wps_wrma_validated_real_ship_station_api_key ', '' );
						$wps_wrma_api_key = get_option( ' wps_wrma_validated_real_ship_station_api_key ', '' );
						$wps_wrma_secret_key = get_option( ' wps_wrma_validated_real_ship_station_secret_key ', '' );
						$carrier_object = get_option( ' carrier_object ', '' );
						$wps_wrma_validated_html = sprintf( '%s %s', 'Connected Account : ', $wps_wrma_connected_account );
						$wps_wrma_hide_ship_form = '';
					if ( ! empty( $wps_wrma_secret_key ) || ! empty( $wps_wrma_api_key ) ) {

						$wps_wrma_hide_ship_form = 'wps_wrma_show_connected';
						?>

							<!-- Connected form start -->
							<div class="wps_wrma_ship_station_validated-wrap">
								<div class="wps_wrma_ship_station_validated">
									<p class="wps_wrma_ship_station_account_html " >

									<?php echo esc_html( $wps_wrma_validated_html ); ?>
									</p>
									<div class="wps_wrma_logout_wrap">
										<a href='javascript:void(0)' class='wps_wrma_shipstation_logout' ><?php esc_html_e( 'Log Out', 'woo-refund-and-exchange-lite' ); ?>
										</a>
									</div>
								</div> 
							</div>
							<!-- Connected form ends -->

							<?php

							/* List carriers starts */

							$wps_wrma_refund_class = new Rma_Return_Refund_Exchange_For_Woocommerce_Pro_Admin( 'rma-return-refund-exchange-for-woocommerce-pro', '5.0.0' );
							$wps_wrma_refund_class->wps_wrma_list_shipstation_carriers_html();

							/* List carriers ends */
					}
					?>

					<!-- Validation form start -->
					<div class="wps_wrma_ship_station <?php echo esc_html( $wps_wrma_hide_ship_form ); ?> ">
						<div class="wps-wrma-validation__wrap">
							<!-- input form -->
							<label for='wps_wrma_validate_api_id' ><?php esc_html_e( ' Enter Your API Key ', 'woo-refund-and-exchange-lite' ); ?></label>
							<span class="wps_wrma_input-wrap">
								<input type='text' id='wps_wrma_validate_ship_api_id' class="wps_wrma_validate_api_id_field" placeholder='Enter your Shipstation Api key' >
							</span>
						</div>
						<br>
						<div class="wps-wrma-validation__wrap">
							<label for='wps_wrma_validate_secret_id' ><?php esc_html_e( ' Enter Your Secret Key ', 'woo-refund-and-exchange-lite' ); ?></label>
							<span class="wps_wrma_input-wrap">
								<input type='text' id='wps_wrma_validate_secret_id' class="wps_wrma_validate_secret_id_field" placeholder='Enter your Shipstation Secret key' >	
							</span>
						</div>
						<span class='wps_wrma_notify_error'></span>

						<p class='submit'>
							<a href='javascript:void(0)' class='wps_wrma_ship_validate_api_key wps-rma-admin__button <?php echo 'button_' . esc_attr( $rma_pro_activate ); ?>' ><?php esc_html_e( 'Validate Account', 'woo-refund-and-exchange-lite' ); ?>
							</a>
						</p>
					</div>
					<!-- Validation form ends -->
				</div>
			</div>
		</div>
		<div class="wps_wrma_accordion">
			<div class="wps_wrma_accord_sec_wrap">
				<h4 id="wps_wrma_shipstation_details_heading" class="wps_wrma_basic_setting wps_wrma_slide_active">
					<?php esc_html_e( 'Ship Integration Details', 'woo-refund-and-exchange-lite' ); ?>
				</h4>
				<div class="wps_wrma_shipstation_details_wrapper">
					<table>
						<tbody>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_name"><?php esc_html_e( 'Name', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_ship_station_name = get_option( 'wps_wrma_ship_station_name', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_ship_station_name ); ?>" id="wps_wrma_ship_station_name" name="wps_wrma_ship_station_name">
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_comp_name"><?php esc_html_e( 'Company Name', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_ship_station_comp_name = get_option( 'wps_wrma_ship_station_comp_name', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_ship_station_comp_name ); ?>" id="wps_wrma_ship_station_comp_name" name="wps_wrma_ship_station_comp_name">
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_addr1"><?php esc_html_e( 'Address', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_ship_station_addr1 = get_option( 'wps_wrma_ship_station_addr1', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_ship_station_addr1 ); ?>" id="wps_wrma_ship_station_addr1" name="wps_wrma_ship_station_addr1">
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_city"><?php esc_html_e( 'City', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_ship_station_city = get_option( 'wps_wrma_ship_station_city', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_ship_station_city ); ?>"  id="wps_wrma_ship_station_city" name="wps_wrma_ship_station_city">
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_postcode"><?php esc_html_e( 'Postcode/ZIP', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_ship_station_postcode = get_option( 'wps_wrma_ship_station_postcode', false );
									?>
									<input type="tel" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_ship_station_postcode ); ?>" id="wps_wrma_ship_station_postcode" name="wps_wrma_ship_station_postcode">
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_country"><?php esc_html_e( 'Country', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_country = get_option( 'wps_wrma_ship_station_country', true );
									global $woocommerce;
									$countries_obj = new WC_Countries();
									$countries     = $countries_obj->__get( 'countries' );
									$count_arr     = array( 'US', 'CA', 'AU', 'GB' );
									?>
									<select id="wps_wrma_ship_station_country" name="wps_wrma_ship_station_country"> 
									<?php
									foreach ( $countries as $ckey => $cvalue ) {
										if ( in_array( $ckey, $count_arr ) ) {
											$select = 0;
											if ( $wps_country == $ckey ) {
												$select = 1;
											}
											?>
											<option value="<?php echo esc_html( $ckey ); ?>" <?php echo esc_html( selected( 1, $select ) ); ?>><?php echo esc_html( $cvalue ); ?></option>
											<?php
										}
									}
									?>
									</select>
								</td>
							</tr>
							<tr valign="top" class="wps_wrma_ship_station_state">
								<?php
								$states    = WC()->countries->get_states();
								$wps_state = get_option( 'wps_wrma_ship_station_state', '' );
								if ( ! empty( $wps_country ) && isset( $wps_state ) && ! empty( $wps_state ) ) {
									?>
									<th class="titledesc" scope="row">
										<label for="wps_wrma_ship_station_state"><?php esc_html_e( 'State', 'woo-refund-and-exchange-lite' ); ?></label>
									</th>
									<td class="forminp forminp-text">
										<select id="wps_wrma_ship_station_state" name="wps_wrma_ship_station_state"> 
										<?php
										foreach ( $states as $s_key => $s_value ) {
											if ( $wps_country == $s_key ) {
												if ( ! empty( $s_value ) && ! empty( $wps_state ) ) {
													foreach ( $s_value as $s_key1 => $s_value1 ) {
														$select = 0;
														if ( $wps_state == $s_key1 ) {
															$select = 1;
														}
														?>
														<option value="<?php echo esc_html( $s_key1 ); ?>" <?php echo esc_html( selected( 1, $select ) ); ?>><?php echo esc_html( $s_value1 ); ?></option>
														<?php
													}
												}
											}
										}
										?>
										</select>
								</td>
							<?php	} ?>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_phone"><?php esc_html_e( 'Phone', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_ship_station_phone = get_option( 'wps_wrma_ship_station_phone', false );
									?>
									<input type="tel" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_ship_station_phone ); ?>"  id="wps_wrma_ship_station_phone" name="wps_wrma_ship_station_phone">
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_weight"><?php esc_html_e( 'Weight Unit', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_ship_station_weight = get_option( 'wps_wrma_ship_station_weight', 'kilogram' );
									?>
									<select id="wps_wrma_ship_station_weight" name="wps_wrma_ship_station_weight">
										<option value="ounce" <?php echo ( 'ounce' === $wps_wrma_ship_station_weight ) ? 'selected' : ''; ?> ><?php esc_html_e( 'Ounce', 'woo-refund-and-exchange-lite' ); ?></option>
										<option value="pound" <?php echo ( 'pound' === $wps_wrma_ship_station_weight ) ? 'selected' : ''; ?> ><?php esc_html_e( 'Pound', 'woo-refund-and-exchange-lite' ); ?></option>
										<option value="gram" <?php echo ( 'gram' === $wps_wrma_ship_station_weight ) ? 'selected' : ''; ?> ><?php esc_html_e( 'Gram', 'woo-refund-and-exchange-lite' ); ?></option>
										<option value="kilogram" <?php echo ( 'kilogram' === $wps_wrma_ship_station_weight ) ? 'selected' : ''; ?> ><?php esc_html_e( 'Kilogram', 'woo-refund-and-exchange-lite' ); ?></option>
									</select>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_ship_station_dimension"><?php esc_html_e( 'Dimensions Unit', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_ship_station_dimension = get_option( 'wps_wrma_ship_station_dimension', 'centimeter' );

									?>
									<select id="wps_wrma_ship_station_dimension" name="wps_wrma_ship_station_dimension">
										<option value="inch" <?php echo ( 'inch' === $wps_wrma_ship_station_dimension ) ? 'selected' : ''; ?> ><?php esc_html_e( 'Inch', 'woo-refund-and-exchange-lite' ); ?></option>
										<option value="centimeter" <?php echo ( 'centimeter' === $wps_wrma_ship_station_dimension ) ? 'selected' : ''; ?> ><?php esc_html_e( 'Centimeter', 'woo-refund-and-exchange-lite' ); ?></option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<p class="submit">
			<button class="wps_wrma_save_shipstation wps-wrma-save-button wps-rma-admin__button <?php echo 'button_' . esc_attr( $rma_pro_activate ); ?>" name="wps_wrma_save_shipstation" ><?php esc_html_e( 'Save Settings', 'woo-refund-and-exchange-lite' ); ?>
			</button>
		</p>
	</form>
</div>

<?php

// new setting start.
?>

<div class='wps_table wps_rma_shiprocket_setting'>
	<form enctype='multipart/form-data' action='' id='' method='post'>
		<!-- wrapper div -->
		<div class='wps_wrma_accordion'>
			<div class="wps_wrma_accord_sec_wrap">
				<h4 id="wrma_shiprocket_heading" class="wps_wrma_basic_setting wps_wrma_slide_active">
					<?php esc_html_e( 'ShipRocket Configuration', 'woo-refund-and-exchange-lite' ); ?>
				</h4>
				<div class='wps_wrma_validate_form_wrapper'>
					<!-- loader -->
					<div class="wps_wrma_return_loader">
						<img src="<?php echo esc_html( home_url() ); ?>/wp-admin/images/spinner-2x.gif">
					</div>
					<?php

						$wps_wrma_shiprocket_mail = get_option( ' wps_wrma_shiprocket_mail ', '' );
						$wps_wrma_shiprocket_pwd = get_option( ' wps_wrma_shiprocket_pwd ', '' );
						$wps_wrma_shiprocket_channel_id = get_option( 'wps_wrma_shiprocket_channel_id', '' );
						$wps_wrma_shiprocket_channel_name = get_option( 'wps_wrma_shiprocket_channel_name', '' );

					?>
					<!-- Validation form start -->
					<div class="wps_wrma_ship_station <?php echo esc_html( $wps_wrma_hide_form ); ?> ">

						<div class="wps-wrma-validation__wrap">
						<!-- input form -->
						<label for='wps_wrma_shiprocket_mail' ><?php esc_html_e( ' Enter Your API User Email', 'woo-refund-and-exchange-lite' ); ?></label>

							<span class="wps_wrma_input-wrap">
								<input type='email' id='wps_wrma_shiprocket_mail' class="wps_wrma_shiprocket_mail_field" placeholder='Enter Your API User Email' value = "<?php echo esc_attr( $wps_wrma_shiprocket_mail ); ?>" required>
							</span>

						<span class='wps_wrma_notify_error'></span>
						</div>
						<br>
						<div class="wps-wrma-validation__wrap">

							<label for='wps_wrma_shiprocket_pwd' ><?php esc_html_e( ' Enter Your API User Password ', 'woo-refund-and-exchange-lite' ); ?></label>

							<span class="wps_wrma_input-wrap">
								<input type='password' id='wps_wrma_shiprocket_pwd' class="wps_wrma_shiprocket_pwd_field" placeholder='Enter Your API User Password ' value = "<?php echo esc_attr( $wps_wrma_shiprocket_pwd ); ?>" required>	
							</span>

							<span class='wps_wrma_notify_error'></span>
						</div>
						<span></span>
						<br>
						<h6>
							<?php
							$woo_shiprocket_url = 'https://app.shiprocket.in/api-user';
							/* translators: %s: search term */
							printf( esc_html__( 'To Get Api Details For Shiprocket %s.', 'woo-refund-and-exchange-lite' ), '<a href="' . esc_html( $woo_shiprocket_url ) . '" target="_blank">Click Here</a> Shiprocket Dashboard' );
							?>
						</h6>
						<br>
						<p class='submit'>
							<a href='javascript:void(0)' class='wps_wrma_validate_shiprocket_key wps-rma-admin__button <?php echo 'button_' . esc_attr( $rma_pro_activate ); ?>' ><?php esc_html_e( 'Validate Account', 'woo-refund-and-exchange-lite' ); ?>
							</a>
						</p>
						<div class="wps-wrma-validation__wrap">

							<label for='wps_wrma_shiprocket_channel_id' ><?php esc_html_e( ' Enter Your Shiprocket Channel Id ', 'woo-refund-and-exchange-lite' ); ?></label>

							<span class="wps_wrma_input-wrap">
								<input type='number' id='wps_wrma_shiprocket_channel_id' class="wps_wrma_shiprocket_channel_id_field" placeholder='Enter Your Shiprocket Channel Id ' value = "<?php echo esc_attr( $wps_wrma_shiprocket_channel_id ); ?>" required >
							</span>	

						</div>	
						<br>
						<div class="wps-wrma-validation__wrap">

							<label for='wps_wrma_shiprocket_channel_name' ><?php esc_html_e( ' Enter Your Shiprocket Channel Name ', 'woo-refund-and-exchange-lite' ); ?></label>

							<span class="wps_wrma_input-wrap">
								<input type='text' id='wps_wrma_shiprocket_channel_name' class="wps_wrma_shiprocket_channel_name_field" placeholder='Enter Your Shiprocket Channel Name ' value = "<?php echo esc_attr( $wps_wrma_shiprocket_channel_name ); ?>" required>
							</span>	

						</div>
						<br>	
						<h6>
							<?php
							$woo_shiprocket_channel_url = 'https://app.shiprocket.in/seller/channels';
							/* translators: %s: search term */
							printf( esc_html__( 'To Get Channel Details Form Shiprocket %s.', 'woo-refund-and-exchange-lite' ), '<a href="' . esc_html( $woo_shiprocket_channel_url ) . '" target="_blank">Click Here</a> Shiprocket Dashboard' );
							?>
						</h6>
					</div>
					<!-- Validation form ends -->
				</div>
			</div>

			<!-- new setting  -->
			<div class="wps_wrma_accord_sec_wrap">
				<h4 id="wps_wrma_shiprocket_details_heading" class="wps_wrma_basic_setting wps_wrma_slide_active">
					<?php esc_html_e( 'Ship Rocket Warehouse Address', 'woo-refund-and-exchange-lite' ); ?>
				</h4>
				<div class="wps_wrma_shipstation_details_wrapper">
					<table>
						<tbody>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_admin_firstname"><?php esc_html_e( 'Admin First Name', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_admin_firstname = get_option( 'wps_wrma_shiprocket_admin_firstname', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_admin_firstname ); ?>" id="wps_wrma_shiprocket_admin_firstname" name="wps_wrma_shiprocket_admin_firstname" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_admin_lastname"><?php esc_html_e( 'Admin Last Name', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_admin_lastname = get_option( 'wps_wrma_shiprocket_admin_lastname', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_admin_lastname ); ?>" id="wps_wrma_shiprocket_admin_lastname" name="wps_wrma_shiprocket_admin_lastname" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_addr1"><?php esc_html_e( 'Address 1', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_addr1 = get_option( 'wps_wrma_shiprocket_addr1', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_addr1 ); ?>" id="wps_wrma_shiprocket_addr1" name="wps_wrma_shiprocket_addr1" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_addr2"><?php esc_html_e( 'Address 2', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_addr2 = get_option( 'wps_wrma_shiprocket_addr2', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_addr2 ); ?>" id="wps_wrma_shiprocket_addr2" name="wps_wrma_shiprocket_addr2" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_city"><?php esc_html_e( 'City', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_city = get_option( 'wps_wrma_shiprocket_city', false );
									?>
									<input type="text" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_city ); ?>"  id="wps_wrma_shiprocket_city" name="wps_wrma_shiprocket_city" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_postcode"><?php esc_html_e( 'Postcode', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_postcode = get_option( 'wps_wrma_shiprocket_postcode', false );
									?>
									<input type="tel" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_postcode ); ?>" id="wps_wrma_shiprocket_postcode" name="wps_wrma_shiprocket_postcode" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_country"><?php esc_html_e( 'Country', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_country = get_option( 'wps_wrma_shiprocket_country', false );
									?>
									<input type="tel" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_country ); ?>" id="wps_wrma_shiprocket_country" name="wps_wrma_shiprocket_country" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_state"><?php esc_html_e( 'State', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_state = get_option( 'wps_wrma_shiprocket_state', false );
									?>
									<input type="tel" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_state ); ?>" id="wps_wrma_shiprocket_state" name="wps_wrma_shiprocket_state" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_phone"><?php esc_html_e( 'Phone', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_phone = get_option( 'wps_wrma_shiprocket_phone', false );
									?>
									<input type="tel" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_phone ); ?>"  id="wps_wrma_shiprocket_phone" name="wps_wrma_shiprocket_phone" required>
								</td>
							</tr>
							<tr valign="top">
								<th class="titledesc" scope="row">
									<label for="wps_wrma_shiprocket_email"><?php esc_html_e( 'E-Mail', 'woo-refund-and-exchange-lite' ); ?></label>
								</th>
								<td class="forminp forminp-text">
									<?php
									$wps_wrma_shiprocket_email = get_option( 'wps_wrma_shiprocket_email', false );
									?>
									<input type="email" placeholder=""class="input-text" value="<?php echo esc_html( $wps_wrma_shiprocket_email ); ?>"  id="wps_wrma_shiprocket_email" name="wps_wrma_shiprocket_email" required>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<!-- new setting -->
		</div>
		<p class="submit">
			<button class="wps_wrma_save_shiprocket wps-wrma-save-button wps-rma-admin__button <?php echo 'button_' . esc_attr( $rma_pro_activate ); ?>" name="wps_wrma_save_shiprocket" ><?php esc_html_e( 'Save Settings', 'woo-refund-and-exchange-lite' ); ?>
			</button>
		</p>
	</form>
</div>
</div>
<?php
// Extend the integration field.
do_action( 'wps_rma_extend_more_integration_content' );
