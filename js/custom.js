$(document).ready(function() {
    //Add Hover effect to menus
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn();
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
    });

    $('.sy_date').datepicker();

    if ($('#js_reg_form').length) {
        $('#js_reg_form').on('change','.js_title', function(){
            var title = $(this).val();
            if(title == "Ms."){
                jQuery("input:radio[value=F]").prop("checked", true);
            } else if(title == "Mr.") {
                jQuery("input:radio[value=M]").prop("checked", true);
            }
        }).on('click', '.js_save', function(c) {
            c.preventDefault();
            jQuery("input, select").css('background', '#FFFFFF');
            if (jQuery.trim(jQuery("#dd_number").val()).length < 1) {
                jQuery("#dd_number").css('background', '#F7BE81').focus();
                return false;
            }
            if (jQuery.trim(jQuery("#dd_bank").val()).length < 1) {
                jQuery("#dd_bank").css('background', '#F7BE81').focus();
                return false;
            }
            if (jQuery.trim(jQuery("#dd_amount").val()).length < 1) {
                jQuery("#dd_amount").css('background', '#F7BE81').focus();
                return false;
            }
            if (jQuery("#category_id").val() === "0") {
                jQuery("#category_id").css('background', '#F7BE81').focus();
                return false;
            }
            if (jQuery.trim(jQuery("#dd_date").val()).length < 1) {
                jQuery("#dd_date").css('background', '#F7BE81').focus();
                return false;
            }
            var d = jQuery("#title").val();
            var a = jQuery("input:radio[name=gender]:checked").val();
            if ((d == "Mr." && a == "F") || (d == "Ms." && a == "M")) {
                alert("Title and Gender mismatch");
                return false
            }
            if (jQuery.trim(jQuery("#firstname").val()).length < 1) {
                jQuery("#firstname").css('background', '#F7BE81').focus();
                return false;
            }
            if (jQuery.trim(jQuery("#contact_no").val()).length < 1) {
                jQuery("#contact_no").css('background', '#F7BE81').focus();
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
            if (jQuery.trim(jQuery("#dob").val()).length < 1) {
                jQuery("#dob").css('background', '#F7BE81').focus();
                return false;
            }
            var dd_num = jQuery("#dd_number").val();
            if (!dd_num.match('^[0-9]{6}$')) {
                jQuery("#dd_number").css('background', '#F7BE81').focus();
                alert("DD Number must be 6 digit numerical");
                return false;
            }
            var pincode = jQuery("#pincode").val();
            if (!pincode.match('^[0-9]*$')) {
                jQuery("#pincode").css('background', '#F7BE81').focus();
                alert("Only numbers allowed for PIN Code");
                return false;
            }
            var mobile = jQuery("#contact_no").val();
            if (!mobile.match('^[0-9]*$')) {
                jQuery("#contact_no").css('background', '#F7BE81').focus();
                alert("Only numbers allowed for Mobile No");
                return false;
            }
            var cat_amt = jQuery("#category_id").find(':selected').data('amt');
            if (jQuery("#dd_amount").val() < parseInt(cat_amt)) {
                jQuery("#dd_amount").css('background', '#F7BE81').focus();
                alert("DD Amount is less than the Category");
                return false;
            }
            if (jQuery("#dd_amount").val() > (parseInt(cat_amt) + 100)) {
                jQuery("#dd_amount").css('background', '#F7BE81').focus();
                var r = confirm("DD Amount appears to be much higher than Category! Press OK to continue submission!");
                if (r == false)
                    return false;
            }
            jQuery("#js_reg_form").trigger("submit");
        });
    }

});