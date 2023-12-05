(function( $ ) {
	'use strict';
	$(function() {
        var wt_pklist_setup_wizard = {
            Set:function(){
                wt_pklist_setup_wizard.wf_do_invoice_number_preview();
                $('.wt_form_wizard_next').on('click',function(){
                    var current_step_id = $(this).attr('data-wizard-step');
                    var next_step_id = $(this).attr('data-wizard-next-step');
                    var next_step_div = $(this).attr('data-target-class');
                    $('.'+next_step_div).hide();
                    $('.'+next_step_div+'[data-wizard-step="'+next_step_id+'"]').show();
                    $('.wt_form_wizard_progress_bar li').removeClass('stop_active');
                    $('.wt_form_wizard_progress_bar li.wt_form_wizard_progress_step_'+current_step_id).addClass('step_active');
                    $('.wt_form_wizard_progress_bar li.wt_form_wizard_progress_step_'+next_step_id).addClass('step_active stop_active');
                });

                $('.wt_form_wizard_prev').on('click',function(){
                    var current_step_id = $(this).attr('data-wizard-step');
                    var prev_step_id = $(this).attr('data-wizard-prev-step');
                    var prev_step_div = $(this).attr('data-target-class');
                    $('.'+prev_step_div).hide();
                    $('.'+prev_step_div+'[data-wizard-step="'+prev_step_id+'"]').show();

                    $('.wt_form_wizard_progress_bar li').removeClass('stop_active');
                    $('.wt_form_wizard_progress_bar li.wt_form_wizard_progress_step_'+current_step_id).removeClass('step_active');
                    $('.wt_form_wizard_progress_bar li.wt_form_wizard_progress_step_'+prev_step_id).addClass('step_active stop_active');
                });

                $('input[name="woocommerce_wf_invoice_number_prefix_pdf_fw"]').on('focus input keyup change',function(){
                    wt_pklist_setup_wizard.get_invoice_no_format();
                    wt_pklist_setup_wizard.wf_do_invoice_number_preview();
                });
                $('input[name="woocommerce_wf_invoice_number_postfix_pdf_fw"]').on('focus input keyup change',function(){
                    wt_pklist_setup_wizard.get_invoice_no_format();
                    wt_pklist_setup_wizard.wf_do_invoice_number_preview();
                });

                $('.choose_date_img').on('click',function(){
                    var target_id = $(this).attr('data-target-id');
                    $('.choose_date_drop_down').hide();
                    $('.choose_date_drop_down[data-target-id="'+target_id+'"]').show();
                });

                $('.choose_date_drop_down').on('click',function(){
                    var trgt_field = $(this).attr('data-target-id');
                    $('.wf_inv_num_frmt_hlp_fw').attr('data-wf-trget',trgt_field);
                    wf_popup.showPopup($('.wf_inv_num_frmt_hlp_fw'));
                    $(this).hide();
                });

                $('[name="woocommerce_wf_invoice_as_ordernumber_pdf_fw"]').on('change',function(){
                    wt_pklist_setup_wizard.get_invoice_no_format();
                    
                    wt_pklist_setup_wizard.wf_do_invoice_number_preview();
                });
                
                $('.wf_inv_num_frmt_fw_append_btn_tr').on('mouseover',function(){
                    var add_text_html = '<span class="dashicons dashicons-plus"></span>'+wf_pklist_params.msgs.add_date_string_text;
                    $('.choose_date_table').children().find('.date_format_add').html('');
                    $(this).children('.date_format_add').html(add_text_html);
                });

                $('.wf_inv_num_frmt_fw_append_btn_tr').on('click', function(){
                    var trgt_elm_name=$(this).parents('.wf_inv_num_frmt_hlp_fw').attr('data-wf-trget');
                    var trgt_elm=$('[name="'+trgt_elm_name+'"]');
                    var exst_vl=trgt_elm.val();
                    var cr_vl=$(this).children('td').children('.wf_inv_num_frmt_fw_append_btn').text();
                    if($('[name="wf_inv_num_frmt_data_val_pdf_fw"]:checked').length>0)
                    {
                        var data_val=$('[name="wf_inv_num_frmt_data_val_pdf_fw"]:checked').val();
                        const regex = /\[(.*?)\]/gm;
                        cr_vl=cr_vl.replace(regex, "[$1 data-val='"+data_val+"']");
                    }
                    trgt_elm.val(exst_vl+cr_vl);
                    wf_popup.hidePopup();
                    wt_pklist_setup_wizard.get_invoice_no_format();
                    wt_pklist_setup_wizard.wf_do_invoice_number_preview();
                });

                $('[name="woocommerce_wf_invoice_start_number_preview_pdf_fw"]').on('focus input keyup change',function(){
                    $('[name="woocommerce_wf_invoice_start_number_pdf_fw"]').val($(this).val());
                    $("#sample_current_invoice_number_pdf_fw").val($(this).val());
                    $(".wf_current_invoice_number_pdf_fw").val($(this).val()-1);
                    wt_pklist_setup_wizard.get_invoice_no_format();
                    wt_pklist_setup_wizard.wf_do_invoice_number_preview();
                });

                $('[name="woocommerce_wf_invoice_padding_number_pdf_fw"]').on('focus input keyup change',function(){
                    wt_pklist_setup_wizard.get_invoice_no_format();
                    
                    wt_pklist_setup_wizard.wf_do_invoice_number_preview();
                });

                $('.wt_form_wizard_submit').on('click',function(){
                    wt_pklist_setup_wizard.wt_wrap_wizard_form_submit('wt_form_wizard_submit');
                });
            },
            get_invoice_no_format:function(){
                var invoice_no_format = '[number]';
                if("" !== $('input[name="woocommerce_wf_invoice_number_prefix_pdf_fw"]').val().trim()){
                    invoice_no_format = '[prefix]'+invoice_no_format;
                }

                if("" !== $('input[name="woocommerce_wf_invoice_number_postfix_pdf_fw"]').val().trim()){
                    invoice_no_format = invoice_no_format+'[suffix]';
                }

                $('input[name="woocommerce_wf_invoice_number_format_pdf_fw"]').val(invoice_no_format);
            },
            wf_do_invoice_number_preview:function(){
                if(0 < $("#sample_invoice_number_pdf_fw").length){
                    var invoice_no = $("#sample_invoice_number_pdf_fw").val();
                    var number_ref=$('[name="woocommerce_wf_invoice_as_ordernumber_pdf_fw"] option:selected').val();
                    var invoice_start_no = $('#sample_current_invoice_number_pdf_fw').val();
                    var number_format=$('[name="woocommerce_wf_invoice_number_format_pdf_fw"]').val();
                    var prefix_val =$('[name="woocommerce_wf_invoice_number_prefix_pdf_fw"]').val();
                    var postfix_val =$('[name="woocommerce_wf_invoice_number_postfix_pdf_fw"]').val();
                    var number_len = $('[name="woocommerce_wf_invoice_padding_number_pdf_fw"]').val();
                    
                    if("No" === number_ref){
                        invoice_no = invoice_start_no;
                        $('.wc_custom_no_div').show();
                    }else{
                        $('.wc_custom_no_div').hide();
                    }
                    /* length change calculation */
                    var padded_invoice_number = "";
                    var invoice_no_length = invoice_no.length;
                    var padding_count = number_len - invoice_no_length;
                    if (padding_count > 0) {
                        for (var i = 0; i < padding_count; i++)
                        {
                            padded_invoice_number += '0';
                        }
                    }
                    invoice_no = padded_invoice_number+invoice_no;

                    if("[prefix][number][suffix]" === number_format){
                        invoice_no = prefix_val+invoice_no+postfix_val;
                    }else if("[prefix][number]" === number_format){
                        invoice_no = prefix_val+invoice_no;
                    }else if("[number][suffix]" === number_format){
                        invoice_no = invoice_no+postfix_val;
                    }
                    invoice_no = wt_pklist_setup_wizard.replace_date_val_invoice_number(invoice_no);

                    /* final preview */
                    $("#preview_invoice_number_pdf_fw").text(invoice_no);
                }
            },

            replace_date_val_invoice_number:function(invoice_no){
                invoice_no = invoice_no.replace(" data-val='order_date'","");
                const monthNames = ["January", "February", "March", "April", "May", "June",
                  "July", "August", "September", "October", "November", "December"
                ];
                const monthShortNamescaps = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                ];
                const daysShortNamescaps = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri",
                  "Sat"];
                var d = new Date();
                var full_year = d.getFullYear();
                var short_year = full_year.toString().substr(-2);
                invoice_no = invoice_no.replaceAll('[F]',monthNames[d.getMonth()]);
                invoice_no = invoice_no.replaceAll('[dS]',d.getDate()+'th');
                invoice_no = invoice_no.replaceAll('[M]',monthShortNamescaps[d.getMonth()]);
                invoice_no = invoice_no.replaceAll('[m]',("0" + (d.getMonth()+1)).slice(-2));
                invoice_no = invoice_no.replaceAll('[d]',("0" + d.getDate()).slice(-2));
                invoice_no = invoice_no.replaceAll('[y]',short_year);
                invoice_no = invoice_no.replaceAll('[Y]',full_year);
                invoice_no = invoice_no.replaceAll('[D]',daysShortNamescaps[d.getDay()]);
                invoice_no = invoice_no.replaceAll('[d/m/y]',("0" + d.getDate()).slice(-2)+'/'+("0" + (d.getMonth()+1)).slice(-2)+'/'+short_year);
                invoice_no = invoice_no.replaceAll('[d-m-Y]',("0" + d.getDate()).slice(-2)+'-'+("0" + (d.getMonth()+1)).slice(-2)+'-'+full_year);
                return invoice_no;
            },

            wt_wrap_wizard_form_submit:function(submit_btn_module){
                var invoice_skip = 0;
                if("wt_form_wizard_invoice_setup_skip" === submit_btn_module){
                    var invoice_skip = 1;
                }

                var elm = $('.wt_wrap_wizard_form');
                var data=elm.serialize();
                $.ajax({
                    url:wf_pklist_params.ajaxurl,
                    type:'POST',
                    dataType:'json',
                    data:data+'&action=wt_pklist_form_wizard_save&invoice_skip='+invoice_skip+'&_wpnonce='+wf_pklist_params.nonces.wf_packlist,
                    cache: false,
                    success:function(data)
				    {
                        if(true === data.status)
					    {
                            wf_popup.showPopup($('.wt_pklist_form_wizard_success'));

                            let url = window.location.href;    
                            if (url.indexOf('?') > -1){
                            url += '&complete_wizard=1'
                            } else {
                            url += '?complete_wizard=1'
                            }
                            
                            setTimeout(function () {
                                window.location.href = url; //will redirect to your blog page (an ex: blog.html)
                             }, 4000);
                        }
                    }
                });
            }


        };
        wt_pklist_setup_wizard.Set();
    });

})( jQuery );