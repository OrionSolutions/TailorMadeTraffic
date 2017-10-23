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




});