$(document).ready(function() {
    $("img").unveil();
    /*$('body').click(function(){
     jQuery.sidr('close', 'sidr'); 
     });*/
    //Add Hover effect to menus
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn();
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
    });
});