$(document).ready(function(){
   
  $('#out').click(function(){
    fbLogoutUser();
     /* FB.logout(function(response) {
   
      });
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1702836673094421',
          cookie     : true,  // enable cookies to allow the server to access 
                              // the session
          xfbml      : true,  // parse social plugins on this page
          version    : 'v2.8' // use graph api version 2.8
        });
      }*/
    
});

function fbLogoutUser() {
  FB.getLoginStatus(function(response) {
      if (response && response.status === 'connected') {
          FB.logout(function(response) {
              document.location.reload();
          });
      }
  });
}

console.log(localStorage["token"]);



});