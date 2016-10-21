var $baseUrl = 'http://localhost/tailmill/app/expense'
var $overlay = '';
var $overlayLoader = '<div class="overlay_loader"><img src="images/tailmill_logo_white.png" alt="Loading..." /></div>';

var showOverlayLoader = function() {
    $overlay.html($overlayLoader);
    $overlay.fadeIn('fast');
}
var hideOverlayLoader = function() {    
    $overlay.fadeOut('slow', function() {
        $overlay.html('');
    });
}
$(document).ready(function() {
    $overlay = $(document).find('.overlay');    
    getLoginScreen();
});