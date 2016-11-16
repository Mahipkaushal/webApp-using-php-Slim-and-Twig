
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