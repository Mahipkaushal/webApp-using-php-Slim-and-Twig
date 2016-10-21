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
    $data = $('#form input[type="text"], #form input[type="password"], #form input[type="checkbox"]:checked');
    $.ajax({
        url: $baseUrl + '/login',
        type: 'POST',
        data: $data,
        dataType: 'json',
        success: function(json) {
            console.log(json);
        } 
    });
}
var login = function() {
    if(validateLoginForm() === true) {
        sendLogin();
    }
}