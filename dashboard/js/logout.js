$( document ).ready(function(){
    
    $('#logout-google').click(function(){
        document.cookie = "access_token="; 
        firebase.auth().signOut().then(function() {
            window.location.replace('login.php')
          }).catch(function(error) {
            console.log(error);
        });
    });
    
}); 