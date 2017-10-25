$( document ).ready(function(){
    
    $('#logout').click(function(){
        document.cookie = "access_token=" +localStorage["token"]; 
        firebase.auth().signOut();
    });
    
    });