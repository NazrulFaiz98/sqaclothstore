
jQuery(document).ready(function() {
	$ = jQuery;
	
	const MDCText = mdc.textField.MDCTextField;
	const textField = [].map.call(
		document.querySelectorAll('.mdc-text-field'),
		function(el) {
			return new MDCText(el);
		}
	);
	const MDCRipple = mdc.ripple.MDCRipple;
	const buttonRipple = [].map.call(
		document.querySelectorAll('.mdc-button'),
		function(el) {
			return new MDCRipple(el);
		}
	);
	const MDCSwitch = mdc.switchControl.MDCSwitch;
	const switchControl = [].map.call(
		document.querySelectorAll('.mdc-switch'),
		function(el) {
			return new MDCSwitch(el);
		}
	);
	// add select2 for multiselect.
	if ($(document).find('.wps-defaut-multiselect').length > 0) {
		$(document)
		.find('.wps-defaut-multiselect')
		.select2();
	}
	// Add class in plugin submenu
	$("a[href='admin.php?page=woo_refund_and_exchange_lite_menu']").addClass('submenu-font-size-fix');
	
	$('.wps-password-hidden').click(function() {
		if ($('.wps-form__password').attr('type') == 'text') {
			$('.wps-form__password').attr('type', 'password');
		} else {
			$('.wps-form__password').attr('type', 'text');
		}
	});
	$('.wps_rma_order_statues').select2();

	// Make setting object in js
	var output_setting = [];
	function make_register_setting_obj() {
		let on_setting = [];
		$.each( $('.add_more_rma_policies'), function() {
			var fun = $( this ).children( '.wps_rma_on_functionality' ).val();
			var set = $( this ).children( '.wps_rma_settings' ).val();
			var myObj = new Object();
			myObj.name = fun;
			myObj.value = set;
			on_setting.push( myObj );
		});
		on_setting.forEach(function(item) {
			var existing = output_setting.filter(function(v, i) {
				return v.name == item.name;
			});
			if (existing.length) {
				var existingIndex = output_setting.indexOf(existing[0]);
				output_setting[existingIndex].value = output_setting[existingIndex].value.concat(item.value);
			} else {
				if (typeof item.value == 'string')
				item.value = [item.value];
				output_setting.push(item);
			}
		});
	}
	make_register_setting_obj();
	// Function to show correct setting respective selected setting.
	function show_correct_field(){
		$.each( $('.wps_rma_settings'), function() {
			if( $( this ).val() == '' ) {
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_max_number_days' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions1' ).show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions2' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_tax_handling' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).next().hide();
			} else if( $( this ).val() == 'wps_rma_maximum_days' ) {
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_max_number_days' ).show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions1' ).show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions2' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_tax_handling' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).next().hide();
			} else if ( $( this ).val() == 'wps_rma_order_status' ) {
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).next().show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_tax_handling' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions1' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions2' ).show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_max_number_days' ).hide();
			} else if ( $( this ).val() == 'wps_rma_tax_handling' ) {
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_tax_handling' ).show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).next().hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_max_number_days' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions1' ).hide();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions_label' ).show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_settings_label' ).show();
				$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions2' ).show();
			}
		});
	}
	show_correct_field();
	// show correct setting respective selected setting and if remove if setting already is exist and also show an alert.
	$(document).on( 'change', '.wps_rma_settings, .wps_rma_on_functionality', function() {
		var current_fun = $( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_on_functionality' ).val();
		var current_set = $( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_settings' ).val();;
		var current_set_obj = $( this );
		if( current_set != '' && current_set != null ) {
			output_setting.forEach(function(item) {
				if( current_fun == item.name && item.value != null &&  $.inArray( current_set, item.value ) != -1 ) {
					alert(wrael_admin_param.wps_policy_already_exist);
					current_set_obj.parent( '.add_more_rma_policies' ).remove();
				}
			});
		}
	
		if( current_set_obj.val() == '' ) {
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_max_number_days' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions1' ).show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions2' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_tax_handling' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).next().hide();
		} else if( current_set_obj.val() == 'wps_rma_maximum_days' ) {
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_max_number_days' ).show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions1' ).show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions2' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_tax_handling' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).next().hide();
		} else if ( current_set_obj.val() == 'wps_rma_order_status' ) {
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).next().show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_tax_handling' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions1' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions2' ).show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_max_number_days' ).hide();
		} else if ( current_set_obj.val() == 'wps_rma_tax_handling' ) {
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_tax_handling' ).show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_order_statues' ).next().hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_max_number_days' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions1' ).hide();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions2' ).show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_conditions_label' ).show();
			$( this ).parent( '.add_more_rma_policies' ).children( '.wps_rma_settings_label' ).show();
		}
		output_setting = [];
		make_register_setting_obj();
	});
	// Remove due to empty field.
	$(document).on( 'submit', '#save_policies_setting_form', function(e) {
		$.each( $(".wps_rma_settings"), function() {
			if( $( this ).val() == '' ) {
				$( this ).parent( '.add_more_rma_policies' ).remove();
			}
		});
	});

	// Replace function.
	function escapeRegExp(string){
		return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
	}		
	/* Define function to find and replace specified term with replacement string */
	function replaceAll(str, term, replacement) {
			return str.replace(new RegExp(escapeRegExp(term), 'g'), replacement);
	}
	// Add extra row setting and do the useful functionality.
	$(document).on( 'click', '#wps_rma_add_more', function() {
		var pro_act = wrael_admin_param.check_pro_active;
		var wps_rma_get_current_i = $('.add_more_rma_policies').last().children( '.wps_rma_get_current_i' ).val();
		wps_rma_get_current_i = parseInt( wps_rma_get_current_i ) + 1;
		var append_html = $( '#add_more_rma_policies_clone' ).html();
		append_html = replaceAll( append_html, 'wps_rma_setting[1]', 'wps_rma_setting['+ wps_rma_get_current_i +']' );
		append_html = replaceAll( append_html, 'wps_rma_order_statues1', 'wps_rma_order_statues' );
		if( pro_act ) {
			append_html = show_correct_field_pro( append_html );
		}
		$('#div_add_more_rma_policies').append( '<div class="add_more_rma_policies">' +append_html + '<input type="button" value="X" class="rma_policy_delete"></div>' );
		$('.add_more_rma_policies').last().children( '.wps_rma_get_current_i' ).val( wps_rma_get_current_i );
		$('.wps_rma_order_statues').select2();
		if( pro_act ) {
			wps_rma_do_something();
		}
		show_correct_field();
		make_register_setting_obj();
	});
	// Delete selected row.
	$(document).on( 'click', '.rma_policy_delete', function() {
		$(this).parent( '.add_more_rma_policies' ).remove();
		show_correct_field();
		make_register_setting_obj();
	});
	// Refund Request Accept functionality
	$( '.wps_rma_return_loader' ).hide(); // Hide the loader in the refund request metabox
	$( document ).on( 'click', '#wps_rma_accept_return', function(){
			$( '#wps_rma_return_package' ).hide();
			$( '.wps_rma_return_loader' ).show();
			var orderid = $( this ).data( 'orderid' );
			var date   = $( this ).data( 'date' );
			var data = {
				action:'wps_rma_return_req_approve',
				orderid:orderid,
				date:date,
				security_check	: wrael_admin_param.wps_rma_nonce
			};
			$.ajax(
				{
					url: wrael_admin_param.ajaxurl,
					type: 'POST',
					data: data,
					dataType :'json',
					success: function(response) {
						$( '.wps_rma_return_loader' ).hide();
						$( '.refund-actions .cancel-action' ).hide();
						window.location.reload();
					}
				}
			);
		}
	);
	// Refund Request Cancel Functionality
	$( document ).on( 'click', '#wps_rma_cancel_return', function(){
		$( '.wps_rma_return_loader' ).show();
		var orderid = $( this ).data( 'orderid' );
		var date = $( this ).data( 'date' );
		var data = {
			action:'wps_rma_return_req_cancel',
			orderid:orderid,
			date:date,
			security_check	:	wrael_admin_param.wps_rma_nonce
		};
		$.ajax(
			{
				url: wrael_admin_param.ajaxurl,
				type: 'POST',
				data: data,
				dataType :'json',
				success: function(response){
					$( '.wps_rma_return_loader' ).hide();
					window.location.reload();
				}
		});
	});
	// Refund Amount functionality
	$( document ).on( 'click', '#wps_rma_left_amount', function(){
		$( this ).attr( 'disabled','disabled' );
		var order_id = $( this ).data( 'orderid' );
		var refund_method = $( this ).data( 'refund_method' );
		var refund_amount = $( '.wps_rma_total_amount_for_refund' ).val();
		$( '.wps_rma_return_loader' ).show();
		var data = {
			action:'wps_rma_refund_amount',
			order_id:order_id,
			refund_method:refund_method,
			refund_amount:refund_amount,
			security_check	:wrael_admin_param.wps_rma_nonce	
		};
		$.ajax({
			url: wrael_admin_param.ajaxurl, 
			type: 'POST',  
			data: data,
			dataType :'json',	
			success: function(response) {
				$( '.wps_rma_return_loader' ).show();
				if ( response.refund_method == '' || response.refund_method == 'manual_method' ) {
					$( 'html, body' ).animate(
						{
							scrollTop: $( '#order_shipping_line_items' ).offset().top
						},
						2000
					);
					
					$( 'div.wc-order-refund-items' ).slideDown();
					$( 'div.wc-order-data-row-toggle' ).not( 'div.wc-order-refund-items' ).slideUp();
					$( '#woocommerce-order-items' ).find( 'div.refund' ).show();
					$( 'div.wc-order-totals-items' ).slideUp();
	
					var refund_reason = $( '#wps_rma_refund_reason' ).val();
					$( '#refund_amount' ).val( refund_amount );
					$( '#refund_reason' ).val( refund_reason );
		
					var total = accounting.unformat( refund_amount, woocommerce_admin.mon_decimal_point );
		
					$( 'button .wc-order-refund-amount .amount' ).text(
						accounting.formatMoney(
							total,
							{
								symbol:    woocommerce_admin_meta_boxes.currency_format_symbol,
								decimal:   woocommerce_admin_meta_boxes.currency_format_decimal_sep,
								thousand:  woocommerce_admin_meta_boxes.currency_format_thousand_sep,
								precision: woocommerce_admin_meta_boxes.currency_format_num_decimals,
								format:    woocommerce_admin_meta_boxes.currency_format
							}
						)
					);
				} else {
					window.location.reload();
				}
			}
		});
	});
	// Manage Stock functionality start
	$( document ).on( 'click', '#wps_rma_stock_back', function(){
		$( this ).attr( 'disabled','disabled' );
		var order_id = $( this ).data( 'orderid' );
		var type = $( this ).data( 'type' );
		var data = {
			action   : 'wps_rma_manage_stock' ,
			order_id : order_id ,
			type     : type,
			security_check : wrael_admin_param.wps_rma_nonce
		};
		$.ajax({
			url: wrael_admin_param.ajaxurl,
			type: 'POST',
			data: data,
			dataType :'json',
			success: function(response) {
				$( this ).removeAttr( 'disabled' );
				if (response.result) {
					$( '#post' ).prepend( '<div class="updated notice notice-success is-dismissible" id="message"><p>' + response.msg + '</p><button class="notice-dismiss" type="button"><span class="screen-reader-text">Dismiss this notice.</span></button></div>' );
					$( 'html, body' ).animate(
						{
							scrollTop: $( 'body' ).offset().top
						},
						2000,
						'linear',
						function(){
							window.setTimeout(
								function() {
									window.location.reload();
								},
								1000
							);
						}
					);
				} else {
					$( '#post' ).prepend( '<div id="messege" class="notice notice-error is-dismissible" id="message"><p>' + response.msg + '</p><button class="notice-dismiss" type="button"><span class="screen-reader-text">Dismiss this notice.</span></button></div>' );
					$( 'html, body' ).animate(
						{
							scrollTop: jQuer$( 'body' ).offset().top
						},
						2000,
						'linear',
						function(){
						}
					);
				}
			}
		});
	});
	// Regenerate Api Secret key
	$( document ).on( 'click', '#wps_rma_generate_key_setting', function(e){
		e.preventDefault();
		var data = {
			action:'wps_rma_api_secret_key',
			security_check	: wrael_admin_param.wps_rma_nonce
		};
		$.ajax(
		{
			url: wrael_admin_param.ajaxurl,
			type: 'POST',
			data: data,
			dataType :'json',
			success: function(response) {
				window.location.reload();
			}
		});
	});
	// pro setting tag
	setTimeout(function(){
		jQuery('.wps_rma_pro_class').parents('.wps-form-group').addClass('wps_rma_pro_class_wrap');
	},1)

	$('#wps_wrma_ship_products').select2();
	if ( $( '#wps_enable_ship_setting' ).is( ':checked' ) ) {
		$('#add_fee').show();
	}else{
	$('#add_fee').hide();
	}
	$('#wps_enable_ship_setting').on( 'change' , function(){
	if ( $( '#wps_enable_ship_setting' ).is( ':checked' ) ) {
		$('#add_fee').show();
	}else{
		$('#add_fee').hide();
	}
	});


	// Integration tab setting code start
	$( '.wps_rma_shipping_label_setting' ).show();
	$( '.wps_rma_shipping_setting' ).hide();
	$( '.wps_rma_shiprocket_setting').hide();
	$( '.show_returnship_label' ).addClass('shipClass');
	$('.wps_wrma_return_loader').hide();
	$('.wps_wrma_returnship_loader').hide();
	$( '.wps_rma_shiprocket_setting').hide();

	$( document ).on( 'click', '.show_returnship_label', function() {
		$( '.wps_rma_shipping_label_setting' ).show();
	  $( '.show_returnship_label' ).addClass('shipClass');
	  $( '.show_shipintegration' ).removeClass('shipClass');
	  $( '.show_shiprocketintegration' ).removeClass('shipClass');
		$( '.wps_rma_shipping_setting' ).hide();
		$( '.wps_rma_shiprocket_setting').hide();
	  });
	  $( document ).on( 'click', '.show_shipintegration', function() {
		  $( '.wps_rma_shipping_setting' ).show();
		$( '.show_shipintegration' ).addClass('shipClass');
		$( '.show_returnship_label' ).removeClass('shipClass');
		$( '.show_shiprocketintegration' ).removeClass('shipClass');
		  $( '.wps_rma_shipping_label_setting' ).hide();
		  $( '.wps_rma_shiprocket_setting').hide();
	  });
	  
	  $( document ).on( 'click', '.show_shiprocketintegration', function() {
		$( '.wps_rma_shiprocket_setting' ).show();
	  $( '.show_shiprocketintegration' ).addClass('shipClass');
	  $( '.show_returnship_label' ).removeClass('shipClass');
	  $( '.show_shipintegration' ).removeClass('shipClass');
		$( '.wps_rma_shipping_label_setting' ).hide();
		$( '.wps_rma_shipping_setting').hide();
	  });
	  
	  $(".button_wps_rma_pro_class").parent('button').prop( "disabled", true );
	  $(".button_wps_rma_pro_div").css( "background-color", 'rgba(0,0,0,.12)' );

	// PRO popup start
	$('.wps_rma_pro_class_wrap label,.wps_rma_pro_div label').attr('for', '');

	$(document).on('click', '.wps_rma_pro_class_wrap,.wps_rma_pro_div', function() {
		$('.wps-rma__popup-for-pro-shadow').show();
		$('.wps-rma__popup-for-pro').addClass('active-pro');
	})

	$(document).on('click', '.wps-rma__popup-for-pro-close', function() {
		$('.wps-rma__popup-for-pro-shadow').hide();
		$('.wps-rma__popup-for-pro').removeClass('active-pro');
	})

	$(document).on('click', '.wps-rma__popup-for-pro-shadow', function() {
		$(this).hide();
		$('.wps-rma__popup-for-pro').removeClass('active-pro');
	})

	$(document).on('click', '.wps_go_pro_link', function(e) {
		e.preventDefault();
		$('.wps-rma__popup-for-pro-shadow').show();
		$('.wps-rma__popup-for-pro').addClass('active-pro');
	})
	$('.button_wps_rma_pro_div').css('pointer-events','none');

	if ( $( '.wps_rma_date_time_picker1' ).length > 0 ) {
		$( '.wps_rma_date_time_picker1' ).timepicker({
			showPeriod: true,
		    showLeadingZero: true,
	    });
	}
	if ( $( '.wps_rma_date_time_picker2' ).length > 0 ) {
		$( '.wps_rma_date_time_picker2' ).timepicker({
			showPeriod: true,
		    showLeadingZero: true,
	    });
	}
});
