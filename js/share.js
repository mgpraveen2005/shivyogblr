// get the shares count, and the callback thing
var _sharecb = function(){};
_sharecb.shares = 0;
_sharecb.sharesset = function(){};
_sharecb.fb = function(){
    _sharecb.shares += parseInt(arguments[0].data[0].total_count);
    _sharecb.sharesset();
}
_sharecb.twit = function(){
    _sharecb.shares += parseInt(arguments[0].count);
    _sharecb.sharesset();
}
_sharecb.overallcount = function(){
    var str = arguments[0];
    _sharecb.shares = 0;
    for (var key in str){
        var value;
        if (key == "Facebook")
            value = str[key]["total_count"];
        else
            value = str[key];

        value = parseInt(value);
        if (value > 0)
            _sharecb.shares += value;
    }
    _sharecb.sharesset();
}



$(document).ready(function() {
    
	$(document).on('click', '.js_share-btn', function(event) {
        var width,
                height,
                url,
                shareurl ="http://www.sportskeeda.com" + document.location.pathname;
    var pagetitle = document.title.split(' | ')[0];
        switch ($(this).data('share-type')) {
            case 'twitter':
                width = 600;
                height = 300;
                url = "https://twitter.com/share?url="+shareurl+"&text="+encodeURIComponent(pagetitle)+"&related=sportskeeda&counturl="+shareurl;
                break;
            case 'fb':
                width = 600;
                height = 400;
                url = "https://facebook.com/sharer/sharer.php?u="+shareurl;
                break;
            case 'gplus':
                url = "https://plus.google.com/share?url="+shareurl;
                width = 515;
                height = 400;
                break;
            case 'stumbleupon':
                url = "http://www.stumbleupon.com/submit?url="+shareurl;
                width = 800;
                height = 500;
                break;
            case 'reddit':
                url = "http://www.reddit.com/submit?url=" + shareurl;
                width = 800;
                height = 500;
                break;                
            case 'mail':
                url = "mailto:?subject=sportskeeda.com - "+encodeURIComponent(pagetitle) + "&body="+shareurl;
                width = 800;
                height = 500;
        }
        var left = ($(window).width()) / 2,
                top = ($(window).height()) / 2,
                opts = 'status=1' +
                ',width=' + width +
                ',height=' + height +
                ',top=' + top +
                ',left=' + left;

        window.open(url, $(this).data('share-type'), opts);

        return false;
    });
    // track fb events
    
    window.fbAsyncInit = function(){
    // share
    FB.Event.subscribe('message.send', function() {
        ga_track_event("Share_btn", "Click", "FB");
    });
    
    // like
    FB.Event.subscribe('edge.create', function() {
        ga_track_event("Like_btn", "Click", "FB");
    });
    };  
    
    
    
    // get the share counts and set the respective callback
    (function(){
        var url = "http://www.sportskeeda.com" + document.location.pathname+"/";
        var api_urls = [
            'http://urls.api.twitter.com/1/urls/count.json?url='+url+'&callback=_sharecb.twit',
            'https://graph.facebook.com/fql?q=SELECT%20total_count%20FROM%20link_stat%20WHERE%20url%20=%20"'+url+'"&callback=_sharecb.fb'
            //'http://api.sharedcount.com/?url='+url+'&callback=_sharecb.overallcount'
                ];

        for(i = 0; i< api_urls.length; i++){
            $("body").append("<script src="+api_urls[i]+"></script>");
        }
    })();

    _sharecb.sharesset = function(){
        var visible_share_text = _sharecb.shares;
        if (_sharecb.shares > 5)
            $(".js_total-share-count").show();

        if (_sharecb.shares > 1000){
            // round off to nearest hundred and show it
            visible_share_text = Math.ceil(_sharecb.shares/100) / 10 + "K";
        }

        $(".js_total-share-count").html(visible_share_text);
    }    
});