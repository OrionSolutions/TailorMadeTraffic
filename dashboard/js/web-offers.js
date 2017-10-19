$(document).ready(function(){

    Subselector();
    loadVal();
    function checkURL (abc) {
        var string = abc.value;
        if (!~string.indexOf("http")) {
          string = "http://" + string;
        }
        abc.value = string;
        return abc
    }
      
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
    
    $("#platform-selection").change(function () {
                var premselector = $("#platform-selection").val();
                $("#section-accordion").html("");
                if (premselector == "Web Development") { 
                    var premselected = $("#platform-selected").val();
                    web_dev = '<label><span><i class="fa fa-chevron-down"></i></span>';
                    web_dev = web_dev + '<select name="platform-selection" id="platform-selection" class="web">';
                    web_dev = web_dev + '<option value="Basic Web Development">Basic Web Development</option>';
                    web_dev = web_dev + '<option value="Complete Web Development">Complete Web Development</option>';
                    web_dev = web_dev + '<option value="Advanced Web Development">Advanced Web Development</option>';
                    web_dev = web_dev + '</select></label>';
                    $('#platform-selected').html(web_dev);
                    if (premselected== "Basic Web Development") {$("#payment_direct1").val("£"+350+" (Development Fee)");}
                    if (premselected== "Complete Web Development") {$("#payment_direct1").val("£"+1500+" (Development Fee)");}  
                    if (premselected== "Advanced Web Development") {$("#payment_direct1").val("£"+500+" (Development Fee)");}

                    if (premselected== "Basic Web Development") {$("#payment_direct").val(350);}
                    if (premselected== "Complete Web Development") {$("#payment_direct").val(1500);}  
                    if (premselected== "Advanced Web Development") {$("#payment_direct").val(500);}

                }
                if (premselector== "Mobile Development") {
                    web_dev = '<label><span><i class="fa fa-chevron-down"></i></span>';
                    web_dev = web_dev + '<select name="platform-selected" id="platform-selected" class="web">';
                    web_dev = web_dev + '<option value="Android Development">Android Development</option>';
                    web_dev = web_dev + '<option value="IOS Development">IOS Development</option>';
                    web_dev = web_dev + '<option value="Advance Mobile App">Advanced Mobile Development</option>';
                    web_dev = web_dev + '<option value="Mobile Game Development">Mobile Game Development</option>';
                    web_dev = web_dev + '</select></label>';
                    var premselected = $("#platform-selected").val();
                    $('#platform-selected').html(web_dev);
                    if (premselected== "Android Development") {$("#payment_direct1").val("£"+400+" (Development Fee)");}
                    if (premselected== "IOS Development") {$("#payment_direct1").val("£"+800+" (Development Fee)");} 
                    if (premselected== "Advance Mobile App") {$("#payment_direct1").val(0);}
                    if (premselected== "Mobile Game Development") {$("#payment_direct1").val(0);}  

                    if (premselected== "Android Development") {$("#payment_direct").val(400);}
                    if (premselected== "IOS Development") {$("#payment_direct").val(800);} 
                    if (premselected== "Advance Mobile App") {$("#payment_direct").val(0);}
                    if (premselected== "Mobile Game Development") {$("#payment_direct").val(0);}  
                   // if (premselected== 3) {$("#payment_direct").val(0);} 
                }  
                loadVal();
            });

            
            $("#platform-selected").change(function () {
                var premselected = $("#platform-selected").val();
                var selector = $("#platform-selection").val();
                $("#section-accordion").html("");
            
                var headertoggle = '';
                var marketing = '';
                var objective = '';
                var title = '';
                var link = '';
                var footerToggle = '';
                var fullHTML = '';
                var redeclareJava = '';
            if(selector=="Web Development"){
                if (premselected== "Basic Web Development") {$("#payment_direct1").val("£"+350+" (Development Fee)");}
                if (premselected== "Complete Web Development") {$("#payment_direct1").val("£"+1500+" (Development Fee)");}  
                if (premselected== "Advanced Web Development") {$("#payment_direct1").val("£"+500+" (Development Fee)");}

                if (premselected== "Basic Web Development") {$("#payment_direct").val(350);}
                if (premselected== "Complete Web Development") {$("#payment_direct").val(1500);}  
                if (premselected== "Advanced Web Development") {$("#payment_direct").val(500);}
            }
            if(selector=="Mobile Development"){
                if (premselected== "Android Development") {$("#payment_direct1").val("£"+400+" (Development Fee)");}
                if (premselected== "IOS Development") {$("#payment_direct1").val("£"+800+" (Development Fee)");} 
                if (premselected== "Advance Mobile App") {$("#payment_direct1").val(0);}
                if (premselected== "Mobile Game Development") {$("#payment_direct1").val(0);}  

                if (premselected== "Android Development") {$("#payment_direct").val(400);}
                if (premselected== "IOS Development") {$("#payment_direct").val(800);} 
                if (premselected== "Advance Mobile App") {$("#payment_direct").val(0);}
                if (premselected== "Mobile Game Development") {$("#payment_direct").val(0);}  
            }

                    
                 
        });

       
            function Subselector(){
                var platFormselector = $("#platform-selection").val();
                if (platFormselector == "Web Development") { 
    
                    web_dev = '<label><span><i class="fa fa-chevron-down"></i></span>';
                    web_dev = web_dev + '<select name="platform-selected" id="platform-selected" class="web">';
                    web_dev = web_dev + '<option value="Basic Web Development">Basic Web Development</option>';
                    web_dev = web_dev + '<option value="Complete Web Development">Complete Web Development</option>';
                    web_dev = web_dev + '<option value="Advanced Web Development">Advanced Web Development</option>';
                    web_dev = web_dev + '</select></label>';
                    $('#platform-selected').html(web_dev);
                    
                }    
    
                if (platFormselector== "Mobile Development") {
                   
                     
                    web_dev = '<label><span><i class="fa fa-chevron-down"></i></span>';
                    web_dev = web_dev + '<select name="platform-selected" id="platform-selected" class="web">';
                    web_dev = web_dev + '<option value="Android Development">Android Development</option>';
                    web_dev = web_dev + '<option value="IOS Development">IOS Development</option>';
                    web_dev = web_dev + '<option value="Advance Mobile App">Advanced Mobile Development</option>';
                    web_dev = web_dev + '<option value="Mobile Game Development">Mobile Game Development</option>';
                    web_dev = web_dev + '</select></label>';
                    $('#platform-selected').html(web_dev);
                }
            }

            function loadVal(){
                var selector = $("#platform-selection").val();
                if(selector=="Web Development"){
                    var platFormselected = $("#platform-selected").val();
                    if (platFormselected== "Basic Web Development") { var x = 0; var counter = 1; $("#payment_direct1").val("£"+350+" (Development Fee)");}
                    if (platFormselected== "Complete Web Development") {var x=0;var counter = 5; $("#payment_direct1").val("£"+1500+" (Development Fee)");}  
                    if (platFormselected== "Advanced Web Development") {var x=0;var counter = 5; $("#payment_direct1").val("£"+500+" (Development Fee)");}
                
                    if (platFormselected== "Basic Web Development") {$("#payment_direct").val(350);}
                    if (platFormselected== "Complete Web Development") {$("#payment_direct").val(1500);}  
                    if (platFormselected== "Advanced Web Development") {$("#payment_direct").val(500);}
                }
                if(selector=="Mobile Development"){
                    var platFormselected = $("#platform-selected").val();
                    if (platFormselected== "Android Development") {$("#payment_direct1").val("£"+400+" (Development Fee)");}
                    if (platFormselected== "IOS Development") {$("#payment_direct1").val("£"+800+" (Development Fee)");} 
                    if (platFormselected== "Advanced Mobile App") {$("#payment_direct1").val(0);}
                    if (platFormselected== "Mobile Game Development") {$("#payment_direct1").val(0);}  

                    if (platFormselected== "Android Development") {$("#payment_direct").val(400);}
                    if (platFormselected== "IOS Development") {$("#payment_direct").val(800);} 
                    if (platFormselected== "Advanced Mobile App") {$("#payment_direct").val(0);}
                    if (platFormselected== "Mobile Game Development") {$("#payment_direct").val(0);} 
                }
              
            }
            

});