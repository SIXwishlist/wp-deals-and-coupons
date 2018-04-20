(function($) {
    'use strict';

    $(document).ready(function() {

        $('.scb-coupon-terms-label').on('click', function() {

            $(this).parent().find('.scb-coupon-terms').toggle();


            $(this).parent().parent().find('.dashicons-arrow-up-alt2').toggle();
            if (!$(this).parent().find('.scb-coupon-terms').is(":hidden")) {
                $(this).hide();
            }



        });

        $('.scb-coupon-description >.dashicons-arrow-up-alt2').on('click', function() {

            $(this).toggle();
            $(this).parent().parent().find('.scb-coupon-terms-label').toggle();
            $(this).parent().parent().find('.scb-coupon-terms').toggle();




        });

        $('.scb-coupon-code').on('click', function() {


            scb_do_copycoupon($(this));


        });


        $('.scb-coupon-deal-link').on('click', function() {
            scb_do_copycoupon($($('.scb-coupon-deal-link').closest('.scb-right-col')[0]).find('.scb-coupon-code'));
             var win = window.open($(this).attr('href'), '_blank');
            win.focus();

            return false;
            var url = $(this).attr('href');
            return;
            $('#deal-dialog').dialog({
                modal: true,
                open: function(event, ui) {
                    scb_startTimer(5, document.querySelector('#deal-redirect-time'), function() {
                        var win = window.open(url, '_blank');
                        win.focus();
                        $('#deal-dialog').dialog('close')


                    });

                }
            })

            return false;
        });





    });



})(jQuery);

function scb_do_copycoupon(elm) {
    scb_copyToClipboard(jQuery(elm));
    jQuery(elm).html('Copied <span class="dashicons dashicons-yes" style="color:green;font-size: 18pt;"></span>');
    setTimeout(function(elm) {
        jQuery(elm).html(jQuery(elm).data('code'));
    }, 3000, jQuery(elm));
}

function scb_copyToClipboard(element) {
    var $temp = jQuery("<input>");
    jQuery("body").append($temp);
    $temp.val(jQuery(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

var intervalId;

function scb_startTimer(duration, display, callback) {
    var timer = duration,
        minutes, seconds;
    intervalId = setInterval(function() {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutesStr = minutes < 10 ? "0" + minutes : minutes;
        secondsStr = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = (minutes ? (minutesStr + ":") : "") + secondsStr;

        if (--timer < 0) {
            if (callback instanceof Function) {
                clearInterval(intervalId);
                callback()
            }
        }
    }, 1000);
}
