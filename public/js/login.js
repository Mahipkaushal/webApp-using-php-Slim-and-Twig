var validateLoginForm = function() {
    $isValid = false;
    $username = $(document).find('input[name="username"]').val();
    $password = $(document).find('input[name="password"]').val();
    if($username.replace(/ /g,'').length <= 0) {
        alert("Please enter Username");
    } else if($password.replace(/ /g,'').length <= 0) {
        alert("Please enter Password");
    } else {
        $isValid = true;
    }

    return $isValid;
}

var sendLogin = function() {
<<<<<<< HEAD
    $remember = $('#remember_me').is(':checked');
=======
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
    $data = $('#form input[type="text"], #form input[type="password"], #form input[type="hidden"], #form input[type="checkbox"]:checked');
    $.ajax({
        url: $baseUrl + '/auth/login',
        type: 'POST',
        data: $data,
        dataType: 'json',
        success: function(json) {
            if(json['success']) {
<<<<<<< HEAD
                displayMessage(json['success'], 'success');
            }
            if(json['user']) {
                $username = json['user']['username'];
                $token = json['user']['token'];
                if($remember === true) {
                    saveInLocalStorage();
                    console.log(getUser());
                }
                setUpAjax();
                getHomeScreen();
            }
            if(json['error']) {
                displayMessage(json['error'], 'error');
=======
                alert(json['success']);
            }
            if(json['error']) {
                alert('Error-' + json['error']['code'] + ': ' + json['error']['message']);
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
            }
        } 
    });
}

var login = function() {
    if(validateLoginForm() === true) {
        sendLogin();
    }
}