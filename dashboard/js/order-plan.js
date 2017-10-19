$(document).ready(function(){
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
        localStorage["Username"] = user.email;
        localStorage["photoURL"] = user.photoURL;   
        document.cookie = "useremail=" + user.email;    
        document.cookie = "access_token=" +  localStorage["token"];       
        firebase.auth().currentUser.getToken(/* forceRefresh */ true).then(function(idToken) {
        localStorage["session_token"]= idToken;
        }).catch(function(error) {
        });
        }else{
           window.location.replace('https://tailormadetraffic.com/dashboard/subscription-login.php');
        }
        }); 


});
    