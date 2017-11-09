$(document).ready(function(){
  

  $('#fb-auth').on("click",function(){
    FB.login(function(response) {
      // handle the response
    }, {
      scope: 'read_insights', 
      return_scopes: true
    });
  });

// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      
       //alert(localStorage['auth']);
      // $('.auth-banner').addClass("hide");
      // Logged into your app and Facebook.
      testAPI();
      if (response.status === 'connected') {
        console.log("BOLS = "+response.authResponse.accessToken);
        localStorage['fb-token'] = response.authResponse.accessToken;
      }

    } else {
      // The person is not logged into your app or we are unable to tell.
      console.log("No user is offline");
      localStorage['auth'] = 0;
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  function logout(){
    FB.logout(function(response) {
   // Person is now logged out
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1702836673094421',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });


  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
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

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      
    });
  }

});