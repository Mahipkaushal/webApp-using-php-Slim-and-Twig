var getLoginScreen = function() {
    showOverlayLoader();
    /*$.ajax({
       url: $baseUrl + '/login',
       type: 'GET',
       dataType: 'html',
       beforeSend: function() {
            showOverlayLoader();
       },
       complete: function() {
            hideOverlayLoader();
       },
       success: function(html) {
            $(document).find('div[name="content"]').html(html);
       }
    });*/
}