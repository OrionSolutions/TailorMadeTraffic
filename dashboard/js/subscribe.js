function checkURL(abc) {
    var string = abc.value;
    if (!~string.indexOf("http")) {
      string = "https://" + string;
    }
    abc.value = string;
    return abc
}
$(document).ready(function(){
    loadSubamount();
    loadChannel();
    /*firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
        localStorage["Username"] = user.email;
        localStorage["photoURL"] = user.photoURL;   
        document.cookie = "useremail=" + user.email;    
        document.cookie = "access_token=" +  localStorage["token"];       
        firebase.auth().currentUser.getToken(/* forceRefresh true).then(function(idToken) {
        localStorage["session_token"]= idToken;
        }).catch(function(error) {
        });
        }else{
            window.location.replace('https://tailormadetraffic.com/dashboard/subscription-login.php');
        }
        
    }); */
    

      
    $('.toggle').click(function (e) {
          e.preventDefault();
        var $this = $(this);
        if ($this.next().hasClass('show')) {
            $this.next().removeClass('show');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('li .inner').removeClass('show');
            $this.parent().parent().find('li .inner').slideUp(350);
            $this.next().toggleClass('show');
            $this.next().slideToggle(350);
        }
    });

    $("#premiumselection").change(function () {
                var premselector = $("#premiumselection").val();
                $("#section-accordion").html("");
            
                var headertoggle = '';
                var marketing = '';
                var objective = '';
                var title = '';
                var link = '';
                var footerToggle = '';
                var fullHTML = '';
                var redeclareJava = '';

                if (premselector=="Basic Advertising") { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount").val(39);}
                if (premselector=="Advance Advertising") {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount").val(69);}
                if (premselector=="Package Advertising") {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount").val(99);}
                if (premselector=="Custom Advertising") {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount").val(99);}

                if (premselector=="Basic Advertising") { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount1").val("£"+39+" (Management Fee)");}
                if (premselector=="Advance Advertising") {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount1").val("£"+69+" (Management Fee)");}
                if (premselector=="Package Advertising") {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount1").val("£"+99+" (Management Fee)");}
                if (premselector=="Custom Advertising") {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount1").val("£"+99+" (Management Fee)");}
               

                if (premselector=="Facebook or Google Basic Advertising") { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount").val(29);}
                if (premselector=="Advanced Facebook or Google Marketing") {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount").val(59);}
                if (premselector=="Premium Facebook or Google Advertising") {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount").val(89);}
                if (premselector=="Custom Budget") {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount").val(99);}

                if (premselector=="Facebook or Google Basic Advertising") { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount1").val("£"+29+" (Management Fee)");}
                if (premselector=="Advanced Facebook or Google Marketing") {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount1").val("£"+59+" (Management Fee)");}
                if (premselector=="Premium Facebook or Google Advertising") {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount1").val("£"+89+" (Management Fee)");}
                if (premselector=="Custom Budget") {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount1").val("£"+99+" (Management Fee)");}
               


                channelItems = channelItems + '<select name="premiumselection" class="selectbox" id="premiumselection">';
                channelItems = channelItems + '<option value="Facebook or Google Basic Advertising"> Facebook or Google Basic Advertising </option>';
                channelItems = channelItems + '<option value="Advanced Facebook or Google Marketing"> Advanced Facebook or Google Marketing </option>';
                channelItems = channelItems + '<option value="Premium Facebook or Google Advertising"> Premium Facebook or Google Advertising </option>';
                channelItems = channelItems + '<option value="Custom Budget"> Custom Budget </option>';
                channelItems = channelItems + '</select>'


                    var redeclareJava = '<script type="text/javascript" src="js/subscribe.js"></script>'; 
                    $("#section-accordion").append(redeclareJava);
    });


            $("#channelitems").change(function () {
                var channelChoice = $("#channelitems").val();
                 loadSubamount();
                if(channelChoice=="Single Channel"){
                    $("#channelTitle").css("display","block");
                    var channelItems = '<label><span><i class="fa fa-chevron-down"></i></span>';
                    channelItems = channelItems + '<select name="premiumselection" class="selectbox" id="premiumselection">';
                    channelItems = channelItems + '<option value="Facebook or Google Basic Advertising"> Facebook or Google Basic Advertising </option>';
                    channelItems = channelItems + '<option value="Advanced Facebook or Google Marketing"> Advanced Facebook or Google Marketing </option>';
                    channelItems = channelItems + '<option value="Premium Facebook or Google Advertising"> Premium Facebook or Google Advertising </option>';
                    channelItems = channelItems + '<option value="Custom Budget"> Custom Budget </option>';
                    channelItems = channelItems + '</select>'
                    channelItems = channelItems + '</label>'
    
                    $("#premiumselection").html(channelItems);
                    var redeclareJava = '<script type="text/javascript" src="js/subscribe.js"></script>'; 
                    $("#section-accordion").append(redeclareJava);
                }else{
                    $("#channelTitle").css("display","none");
                    var channelItems = '<label><span><i class="fa fa-chevron-down"></i></span>';
                    channelItems = channelItems + '<select name="premiumselection" class="selectbox" id="premiumselection">';
                    channelItems = channelItems + '<option value="Basic Advertising"> Basic Advertising </option>';
                    channelItems = channelItems + '<option value="Advance Advertising"> Advanced Advertising </option>';
                    channelItems = channelItems + '<option value="Package Advertising"> Package Advertising </option>';
                    channelItems = channelItems + '<option value="Custom Advertising"> Custom Advertising </option>';
                    channelItems = channelItems + '</select>'
                    channelItems = channelItems + '</label>'
    
                    $("#premiumselection").html(channelItems);
                    var redeclareJava = '<script type="text/javascript" src="js/subscribe.js"></script>'; 
                    $("#section-accordion").append(redeclareJava);
                }

            });



            function loadChannel(){
                var channelItems = '<label><span><i class="fa fa-chevron-down"></i></span>';
                channelItems = channelItems + '<select name="premiumselection" class="selectbox" id="premiumselection">';
                channelItems = channelItems + '<option value="Facebook or Google Basic Advertising"> Facebook or Google Basic Advertising </option>';
                channelItems = channelItems + '<option value="Advanced Facebook or Google Marketing"> Advanced Facebook or Google Marketing </option>';
                channelItems = channelItems + '<option value="Premium Facebook or Google Advertising"> Premium Facebook or Google Advertising </option>';
                channelItems = channelItems + '<option value="Custom Budget"> Custom Budget </option>';
                channelItems = channelItems + '</select>'
                channelItems = channelItems + '</label>'

                $("#premiumselection").html(channelItems);
            }

            function loadSubamount(){
                var premselector = $("#premiumselection").val();
                if (premselector=="Basic Advertising") { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount").val(39);}
                if (premselector=="Advance Advertising") {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount").val(69);}
                if (premselector=="Package Advertising") {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount").val(99);}
                if (premselector=="Custom Advertising") {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount").val(99);}

                if (premselector=="Basic Advertising") { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount1").val("£"+39+" (Management Fee)");}
                if (premselector=="Advance Advertising") {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount1").val("£"+59+" (Management Fee)");}
                if (premselector=="Package Advertising") {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount1").val("£"+99+" (Management Fee)");}
                if (premselector=="Custom Advertising") {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount1").val("£"+99+" (Management Fee)");}
            
                if (premselector=="Facebook or Google Basic Advertising") { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount").val(29);}
                if (premselector=="Advanced Facebook or Google Marketing") {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount").val(59);}
                if (premselector=="Premium Facebook or Google Advertising") {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount").val(89);}
                if (premselector=="Custom Budget") {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount").val(99);}

                if (premselector=="Facebook or Google Basic Advertising") { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount1").val("£"+29+" (Management Fee)");}
                if (premselector=="Advanced Facebook or Google Marketing") {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount1").val("£"+59+" (Management Fee)");}
                if (premselector=="Premium Facebook or Google Advertising") {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount1").val("£"+89+" (Management Fee)");}
                if (premselector=="Custom Budget") {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount1").val("£"+99+" (Management Fee)");}
            }

});
