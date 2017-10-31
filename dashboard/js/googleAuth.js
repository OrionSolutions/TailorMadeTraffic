$(document).ready(function(){
    var timeout=0;

    if(getCookie("access_token")==""){
        $('#myavatar').css("display", "none");
        $('.gmail').css("display", "none");
    }else{
        $('#myavatar').css("display", "table-cell");
        $('.gmail').css("display", "table-cell");
    }

    $('#auth').click(function(){
        timeout++;
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
            document.cookie = "access_token=" + token; 
        }).catch(function(error) {

        var errorCode = error.code;
        var errorMessage = error.message;
        var email = error.email;
        var credential = error.credential;
        });

    });
  
    firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
            localStorage["Username"] = user.email;
            localStorage["photoURL"] = user.photoURL;
            $('#myavatar').attr('src', localStorage["photoURL"]);   
            document.cookie = "useremail=" + user.email;    
            document.cookie = "displayname=" + user.displayName; 
            firebase.auth().currentUser.getToken(/* forceRefresh */  true).then(function(idToken) {
            localStorage["session_token"]= idToken;
            }).catch(function(error) {
            });
           // $('.preload').addClass("show");
                if(timeout==1){
                    location.reload();
                    timeout = 0;
                }
            }
        }); 


});

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}