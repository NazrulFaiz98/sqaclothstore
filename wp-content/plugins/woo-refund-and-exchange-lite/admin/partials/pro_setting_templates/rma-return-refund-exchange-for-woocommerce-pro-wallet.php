<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the html field for general tab.
 *
 * @link       https://wpswings.com/
 * @since      1.0.0
 *
 * @package    woocommerce-rma-for-return-refund-and-exchange
 * @subpackage woocommerce-rma-for-return-refund-and-exchange/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $wrael_wps_rma_obj;
$mwr_wallet_settings =
// Wallet Setting register filter.
apply_filters( 'wps_rma_wallet_settings_array', array() );
?>
<!--  template file for admin settings. -->
<form action="" method="POST" class="wps-mwr-gen-section-form">
	<div class="mwr-secion-wrap">
		<?php
		$mwr_wallet_html = $wrael_wps_rma_obj->wps_rma_plug_generate_html( $mwr_wallet_settings );
		echo esc_html( $mwr_wallet_html );
		wp_nonce_field( 'admin_save_data', 'wps_tabs_nonce' );
		?>
	</div>
</form>
