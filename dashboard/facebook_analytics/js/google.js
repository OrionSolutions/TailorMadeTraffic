

      //var user = firebase.auth().currentUser;
      var provider = new firebase.auth.GoogleAuthProvider();
      $('#myavatar').attr('src', localStorage["photoURL"]);
         function ShowSwa () {
       
         }
        firebase.auth().onAuthStateChanged(function(user) {
          if (user) {
            $('#userName').val(user.email);
              
          var url = "https://www.googleapis.com/oauth2/v3/tokeninfo?access_token="+localStorage["token"];
          $.getJSON( url, function( json ) {
            console.log("Session Active");
          }).fail(function(error){
            console.log("Session Expired");
            swal({
              title: 'Session Expired',
              text: "Relogin using your Google account.",
              type: 'error',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              buttonsStyling: false
            }).then(function () {
              swal(
                firebase.auth().signOut(),
                console.log("out")
              )
            }, function (dismiss) {
              // dismiss can be 'cancel', 'overlay',
              // 'close', and 'timer'
              if (dismiss === 'cancel') {
                swal(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
              }
            })
 
          });
            //photos = user.photoURL;
          } else {
            window.location.replace("login.php");
          }
        
        });