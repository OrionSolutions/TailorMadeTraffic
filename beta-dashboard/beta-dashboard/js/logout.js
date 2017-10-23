$( document ).ready(function(){
    
    $('#logout').click(function(){
        firebase.auth().signOut();
    });
    
    });