$( document ).ready(function(){

    firebase.auth().onAuthStateChanged(function(user) {
        if (localStorage["Selection"]==0) {
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
                window.location.replace('dashboard.php');
            }, 2500); 
            }
            }else{
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
                 window.location.replace('register.php');
            }, 2500);  
            }  
            }
        }); 

});