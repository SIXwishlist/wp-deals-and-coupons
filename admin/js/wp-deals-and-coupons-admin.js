(function($) {
    'use strict';

    $(document).ready(function() {
        $('#scb-coupon-expire-date').datepicker();

        $('#scb-coupon-type').on('change', function() {

            if ($(this).val() == 'coupon') {
                $('#scb-coupon-deal-link-row').hide();
                $('#scb-coupon-code-row').show();

            } else {
                $('#scb-coupon-deal-link-row').show();
                $('#scb-coupon-code-row').hide();

            }
        });

        $('#scb_filter_by_coupon_type').on('change', function() {
		var vl=$(this).val();

            if (vl == 'coupon') {
            	$('#scb_filter_by_coupon_type_data').show();
                $('#scb_filter_by_coupon_type_data').attr('placeholder', 'Enter coupon code to search or leave blank');

            } else if(vl=='deal') {
            	$('#scb_filter_by_coupon_type_data').show();
                $('#scb_filter_by_coupon_type_data').attr('placeholder', 'Enter deal url to search or leave blank');


            }
            else
            {
            	 $('#scb_filter_by_coupon_type_data').hide();
            }
        });



        $('#scb-coupon-type').change();
    });


    //scb-coupon-type
})(jQuery);
