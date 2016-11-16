<<<<<<< HEAD
=======
var $overlay = '';
var $overlayLoader = '<div class="overlay_loader"><img src="images/tailmill_logo_white.png" alt="Loading..." /></div>';
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729

$(document).ready(function() {
    $overlay = $(document).find('.overlay');
    checkLocalStorage();
    $user = getUser();
    if($user === false) {
    	getLoginScreen();
    } else {
    	$username = $user.username;
    	$token = $user.token;
        setUpAjax();
    	getHomeScreen();
    }
});