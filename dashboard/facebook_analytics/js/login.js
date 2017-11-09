$( document ).ready(function(){

    $('#login_google').click(function(){
        localStorage["Selection"]=0;
        var provider = new firebase.auth.GoogleAuthProvider();
        provider.setCustomParameters({
            prompt: 'select_account'
        });
    // [END createprovider]
    // [START addscopes] 
   
    provider.addScope('https://www.googleapis.com/auth/analytics');
    provider.addScope('https://www.googleapis.com/auth/analytics.readonly');
    // [START signin]
        firebase.auth().signInWithPopup(provider).then(function(result) {
        var token = result.credential.accessToken;
        localStorage["token"] = token;
        }).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        var email = error.email;
        var credential = error.credential;
        });

        
    });

    $('#register_google').click(function(){                    
    localStorage["Selection"]=1;                 
    var provider = new firebase.auth.GoogleAuthProvider();
        provider.setCustomParameters({
            prompt: 'select_account'
        });
    // [END createprovider]
    // [START addscopes] 
    provider.addScope('https://www.googleapis.com/auth/analytics.readonly');
    provider.addScope('https://www.googleapis.com/auth/analytics');
    
    // [START signin]

  firebase.auth().signInWithPopup(provider).then(function(result) {
        var token = result.credential.accessToken;
        localStorage["token"] = token;
        }).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        var email = error.email;
        var credential = error.credential;
        }); 

    });


    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
          // Logged into your app and Facebook.
          testAPI();
        } else {
          // The person is not logged into your app or we are unable to tell.
          document.getElementById('status').innerHTML = 'Please log ' +
            'into this app.';
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
          document.getElementById('status').innerHTML =
            'Thanks for logging in, ' + response.name + '!';
        });
      }

});