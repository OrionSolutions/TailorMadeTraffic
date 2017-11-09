$(document).ready(function(){
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '1702836673094421',
          cookie     : true,  // enable cookies to allow the server to access 
                              // the session
          xfbml      : true,  // parse social plugins on this page
          version    : 'v2.8' // use graph api version 2.8
        });

        FB.api('https://graph.facebook.com/me/accounts?access_token='+localStorage['fb-token'], function(response) {
            console.log(response.data);
            console.log(response);
            var data  = response.data;
            
            for (i = 0; i <  response.data.length;i++) {
                //console.log(response.data[i]);
                $.each(response.data[i], function (i, field) {
                        console.log(i+ " : " +field );
                });
            }
                

            });
        };
      
        // Load the SDK asynchronously
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      
    
});
