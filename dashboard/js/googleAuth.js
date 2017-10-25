$(document).ready(function(){
    $('#auth').click(function(){
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
        document.cookie = "access_token=" + localStorage["token"]; 
        });

    });

            console.log(localStorage["token"]);
  
    firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
            localStorage["Username"] = user.email;
            localStorage["photoURL"] = user.photoURL;   
            document.cookie = "useremail=" + user.email;    
            document.cookie = "displayname=" + user.displayName; 
            
           firebase.auth().currentUser.getToken(/* forceRefresh */  true).then(function(idToken) {
            localStorage["session_token"]= idToken;
            }).catch(function(error) {
            });

           // $('.preload').addClass("show");
            }
        }); 


});