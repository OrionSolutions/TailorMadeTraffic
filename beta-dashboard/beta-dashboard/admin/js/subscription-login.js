$( document ).ready(function(){



    $('#login_google').click(function(){                 
       // localStorage["Selection"]=1;                 
        var provider = new firebase.auth.GoogleAuthProvider();
            provider.setCustomParameters({
                prompt: 'select_account'
            });
        // [END createprovider]
        // [START addscopes] 
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

    firebase.auth().onAuthStateChanged(function(user) {
       // if (localStorage["Selection"]==1) {
           var ref = getUrlParameter('ref');
           ref.toString();
            if (user) {
            localStorage["Username"] = user.email;
            localStorage["photoURL"] = user.photoURL;  
            document.cookie = "useremail=" + user.email;    
            document.cookie = "access_token=" +  localStorage["token"];         
            firebase.auth().currentUser.getToken(/* forceRefresh */ true).then(function(idToken) {
            localStorage["session_token"]= idToken;
            }).catch(function(error) {
            });

            $('.preload').addClass("show");
            setTimeout(function() {
                if(ref=="subscription"){
                    window.location.replace('https://tailormadetraffic.com/dashboard/subscribe.php');
                }else if(ref=="order"){
                    window.location.replace('https://tailormadetraffic.com/dashboard/order-plan.php');
                }else{
                    window.location.replace('https://tailormadetraffic.com/subscription-login.php');
                }
            }, 2500); 
        
            }
          //  }
        }); 

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;
        
            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');
        
                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };

});