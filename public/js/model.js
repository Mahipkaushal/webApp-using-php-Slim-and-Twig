

var getLoginScreen = function() {
    showOverlayLoader();
    $.ajax({
<<<<<<< HEAD
        url: $baseUrl + '/auth/login',
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
=======
       url: $baseUrl + '/auth/login',
       type: 'GET',
       dataType: 'html',
       beforeSend: function() {
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
            showOverlayLoader();
        },
        complete: function() {
            hideOverlayLoader();
<<<<<<< HEAD
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
=======
       },
       success: function(html) {
            $(document).find('div[name="content"]').html(html);
       }
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
    });
}