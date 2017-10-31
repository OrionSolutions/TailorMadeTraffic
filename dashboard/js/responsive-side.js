$(document).ready(function(){
    var $counter = 0;
    $('.avatar').on("click",function(){
       // $logout.addClass("display", "block");
    if($counter == 1){
        $('.user-options').removeClass("show");
        $counter = 0;
    }else{
       $('.user-options').addClass("show");
        $counter = $counter+1;
    }
        console.log( $counter );
    });

    


});