$(document).ready(function() {
    //Add Hover effect to menus
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn();
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
    });

    $('.sy_date').datepicker();

    $('.sy_date').on('changeDate', function(ev) {
        if (ev.viewMode === 'days') {
            $('.datepicker.dropdown-menu').hide();
        }
    }).on('keydown', function(event) {
        if (event.which == 9) {
            $('.datepicker.dropdown-menu').hide();
        }
    });

    if ($('#js_reg_form').length) {
        var def_pay_type = $('.js_payment_type').val();
        if (def_pay_type == "dd") {
            jQuery(".js_dd_fields").show();
        } else {
            jQuery(".js_dd_fields").hide();
        }
        $('#js_reg_form').on('change', '.js_payment_type', function() {
            var payment_type = $(this).val();
            if (payment_type == "dd") {
                jQuery(".js_dd_fields").show();
            } else {
                jQuery(".js_dd_fields").hide();
            }
        }).on('change', '.js_title', function() {
            var title = $(this).val();
            if (title == "Ms.") {
                jQuery("input:radio[value=F]").prop("checked", true);
            } else if (title == "Mr.") {
                jQuery("input:radio[value=M]").prop("checked", true);
            }
        }).on('click', '.js_save', function(c) {
            c.preventDefault();
            jQuery("input, select").css('background', '#FFFFFF');
            var pay_type = $('.js_payment_type').val();
            if (pay_type == 'dd') {
                if (jQuery.trim(jQuery("#dd_number").val()).length < 1) {
                    jQuery("#dd_number").css('background', '#F7BE81').focus();
                    return false;
                }
                if (jQuery.trim(jQuery("#dd_bank").val()).length < 1) {
                    jQuery("#dd_bank").css('background', '#F7BE81').focus();
                    return false;
                }
                if (jQuery.trim(jQuery("#dd_date").val()).length < 1) {
                    jQuery("#dd_date").css('background', '#F7BE81').focus();
                    return false;
                }
                var dd_num = jQuery("#dd_number").val();
                if (!dd_num.match('^[0-9]{6}$')) {
                    jQuery("#dd_number").css('background', '#F7BE81').focus();
                    alert("DD Number must be 6 digit numerical");
                    return false;
                }
            }
            if (jQuery.trim(jQuery("#dd_amount").val()).length < 1) {
                jQuery("#dd_amount").css('background', '#F7BE81').focus();
                return false;
            }
            if (jQuery("#category_id").val() === "0") {
                jQuery("#category_id").css('background', '#F7BE81').focus();
                return false;
            }

            var d = jQuery("#title").val();
            var a = jQuery("input:radio[name=gender]:checked").val();
            if ((d == "Mr." && a == "F") || (d == "Ms." && a == "M")) {
                alert("Title and Gender mismatch");
                return false;
            }
            if (jQuery.trim(jQuery("#firstname").val()).length < 1) {
                jQuery("#firstname").css('background', '#F7BE81').focus();
                return false;
            }
            if (jQuery.trim(jQuery("#contact_no").val()).length < 1) {
                jQuery("#contact_no").css('background', '#F7BE81').focus();
                return false;
            }
            var mobile = jQuery("#contact_no").val();
            if (!mobile.match('^[0-9]*$')) {
                jQuery("#contact_no").css('background', '#F7BE81').focus();
                alert("Only numbers allowed for Mobile No");
                return false;
            }
            if (jQuery.trim(jQuery("#city").val()).length < 1) {
                jQuery("#city").css('background', '#F7BE81').focus();
                return false;
            }
            if (jQuery.trim(jQuery("#country").val()).length < 1) {
                jQuery("#country").css('background', '#F7BE81').focus();
                return false;
            }
            var cat_amt = jQuery("#category_id").find(':selected').data('amt');
            if (jQuery("#dd_amount").val() < parseInt(cat_amt)) {
                jQuery("#dd_amount").css('background', '#F7BE81').focus();
                alert("Amount is less than the Category");
                return false;
            }
            if (jQuery("#dd_amount").val() > (parseInt(cat_amt) + 100)) {
                jQuery("#dd_amount").css('background', '#F7BE81').focus();
                var r = confirm("Amount appears to be much higher than Category! Press OK to continue submission!");
                if (r == false)
                    return false;
            }
            jQuery("#js_reg_form").trigger("submit");
        });
    }

    if ($('#js_src_results').length) {
        $('#js_src_box').on('click', '.js_src_find', function() {
            var name, email, mobile, reg_no;
            name = $('#js_src_name').val().trim();
            email = $('#js_src_email').val().trim();
            mobile = $('#js_src_mobile').val().trim();
            reg_no = $('#js_src_reg_no').val().trim();
            if (name.length || email.length || mobile.length || reg_no.length) {
                $.ajax({
                    type: "POST",
                    url: "/admin/ajax/registrations",
                    data: {
                        name: name, email: email, mobile: mobile, reg_no: reg_no
                    },
                    success: function(data) {
                        $('#js_src_results').html(data);
                    },
                    error: function(e) {
                    }
                });
            }
        });
    }

});