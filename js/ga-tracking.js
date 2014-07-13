$(document).ready(function() {
    $(document).on('click', '.js_ga-tracking', function(e) {
        var track_label, track_action, track_category;
        track_label = $(this).data('track');
        track_action = $(this).data('track_action');
        track_category = $(this).data('track_category');
        ga_track_event(track_category, track_action, track_label);
    });
});


/* ga Tracking of user actions */
function ga_track_event(category, action, label, value, non_interaction) {
    if (typeof ga !== 'undefined') {
        if (label == '') {
            //_gaq.push(['_trackEvent', category, action]);
            ga('send', {
                'hitType': 'event', // Required.
                'eventCategory': category, // Required.
                'eventAction': action // Required.
            });            
            
        } else {
            if (typeof label === 'number')
                label = '' + label;
            if (typeof value === 'undefined')
                value = null;
            if (typeof non_interaction === 'undefined')
                non_interaction = false;

            ga('send', {
                'hitType': 'event', // Required.
                'eventCategory': category, // Required.
                'eventAction': action, // Required.
                'eventLabel': label,
                'eventValue': value,
                'non_interaction':non_interaction
            });

            //_gaq.push(['_trackEvent', category, action, label, value, non_interaction]);
        }
    }
}