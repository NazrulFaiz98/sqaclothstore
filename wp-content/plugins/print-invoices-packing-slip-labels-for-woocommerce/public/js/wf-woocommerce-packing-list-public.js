(function( $ ) {
	'use strict';
	$(function() {

	});
})( jQuery );


function wf_Confirm_Notice_for_Manually_Creating_Invoicenumbers(url,a)
{
	/*
	1 - invoice/proforma invoice number
	2 - invoice for free order
	3 - empty from address for invoice
	11 - creditnote number
	
	*/
	if((1 === a || "1" === a) || (2 === a || "2" === a) || (3 === a || "3" === a) || ("11" === a || 11 === a))
	{
		if("2" === a || 2 === a){
			var invoice_prompt = wf_pklist_params_public.msgs.invoice_number_prompt_free_order;
		}else if("11" === a || 11 === a){
			var invoice_prompt = wf_pklist_params_public.msgs.creditnote_number_prompt;
		}else if("3" === a || 3 === a){
			var invoice_prompt = wf_pklist_params_public.msgs.invoice_number_prompt_no_from_addr;
			alert(invoice_prompt);
			return false;
		}else{
			var msg_title=((1 === a || "1" === a) ? wf_pklist_params_public.msgs.invoice_title_prompt : a);
			var invoice_prompt = msg_title+' '+wf_pklist_params_public.msgs.invoice_number_prompt;
		}
		
		if(true === wf_pklist_params_public.msgs.pop_dont_show_again){
			url = url+'&wt_dont_show_again=1';
			window.open(url, "Print", "width=800, height=600");
			setTimeout(function () {
				window.location.reload(true);
			}, 1000);
		}else{
			if(confirm (invoice_prompt))
			{                         
				window.open(url, "Print", "width=800, height=600");
				setTimeout(function () {
					window.location.reload(true);
				}, 1000);
			} else {
				return false;
			}
		}
	}
	else
	{
		window.open(url, "Print", "width=800, height=600");     
		setTimeout(function () {
			window.location.reload(true);
		}, 1000);                      
	}
	return false;
}

jQuery(document).ready(function(){
	
});