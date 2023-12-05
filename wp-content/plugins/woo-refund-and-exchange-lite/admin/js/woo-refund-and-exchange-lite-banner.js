jQuery( document ).ready(
    function($){
        $( document ).on(
            'click',
            '#dismiss-banner',
            function(e){
                e.preventDefault();
                var data = {
                    action:'wps_rma_dismiss_notice_banner',
                    wps_nonce:wrael_banner_param.wps_rma_nonce
                };
                $.ajax(
                    {
                        url: wrael_banner_param.ajaxurl,
                        type: "POST",
                        data: data,
                        success: function(response)
                        {
                            window.location.reload();
                        }
                    }
                );
            }
        );
    }
 );
 