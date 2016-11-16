

var getLoginScreen = function() {
    showOverlayLoader();
    $.ajax({
        url: $baseUrl + '/auth/login',
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
            showOverlayLoader();
        },
        complete: function() {
            hideOverlayLoader();
        },
        success: function(json) {
            if(json['html']) {
                $(document).find('div[name="container"]').html(json['html']);                
            }
        }
    });
}
var getHomeScreen = function() {
    showOverlayLoader();
    $.ajax({
        url: $baseUrl + '/expense/home',
        type: 'GET',
        dataType: 'json',
        beforeSend: function(request) {
            showOverlayLoader();
        },
        complete: function() {
            hideOverlayLoader();
        },
        success: function(json) {
            if(json['html']) {
                $(document).find('div[name="container"]').html(json['html']);
                setUsername();
            }
            if(json['error']) {
                displayMessage(json['error'], 'error');
            }
        }
    });
}

var logout= function() {
    $.ajax({
        url: $baseUrl + '/expense/logout',
        type: 'GET',
        dataType: 'json',
        complete: function() {
            $username = '';
            $token = '';
            clearLocalStorage();
            setUpAjax();
            removeUsername();
            getLoginScreen();
        },
        success: function(json) {
            if(json['success']) {
                displayMessage(json['success'], 'success');
            }
        }
    });
}