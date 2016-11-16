var $overlay = '';
var $overlayLoader = '<div class="overlay_loader"><img src="images/tailmill_logo_white.png" alt="Loading..." /></div>';
var $username = '';
var $token = '';

var showOverlayLoader = function() {
    $overlay.html($overlayLoader);
    $overlay.fadeIn('fast');
}
var hideOverlayLoader = function() {
    $overlay.fadeOut('slow', function() {
        $overlay.html('');
    });
}

var setUpAjax = function() {
	$.ajaxSetup({
        cors: true,
        headers: {
            "X-Auth-Token": $token
        }
	});
}

var displayMessage = function($msg, $type) {
	if($type == 'error') {
		alert('Error: ' + $msg['code'] + '- ' + $msg['message']);
	} else if($type == 'success') {
		alert('Success! ' + $msg);
	} else {
		alert($msg);
	}
}

var setUsername = function() {
	$('header .header .user').html('Hi <span class="username">' + $username + '</span>!');
}

var removeUsername = function() {
	$('header .header .user').html('');
}