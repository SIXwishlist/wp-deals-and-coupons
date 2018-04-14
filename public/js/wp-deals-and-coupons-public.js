(function($) {
    'use strict';

    $(document).ready(function() {

        $('.scb-coupon-terms-label').on('click', function() {

          $(this).parent().find('.scb-coupon-terms').toggle();


				$(this).parent().parent().find('.dashicons-arrow-up-alt2').toggle();
				if(!$(this).parent().find('.scb-coupon-terms').is(":hidden"))
				{
					$(this).hide();
				}



        });

         $('.scb-coupon-description >.dashicons-arrow-up-alt2').on('click', function() {

          $(this).toggle();
		$(this).parent().parent().find('.scb-coupon-terms-label').toggle();
		$(this).parent().parent().find('.scb-coupon-terms').toggle();




        });

          $('.scb-coupon-code').on('click', function() {

        copyToClipboard($(this)) ;
        $(this).html('Copied <span class="dashicons dashicons-yes" style="color:green;font-size: 18pt;"></span>');
        setTimeout(function(elm){
					$(elm).html($(elm).data('code'));
        },3000,$(this));


        });


    });



})(jQuery);

function copyToClipboard(element) {
  var $temp = jQuery("<input>");
  jQuery("body").append($temp);
  $temp.val(jQuery(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}