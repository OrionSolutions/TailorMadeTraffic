
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
        
            if (premselector == 1) { var x = 0; var counter = 1; $("#numcampaigns").val(1);$("#subamount").val(29);}
            if (premselector==2) {var x=0;var counter = 5; $("#numcampaigns").val(5);$("#subamount").val(59);}
            if (premselector==3) {var x=0;var counter = 10; $("#numcampaigns").val(10);$("#subamount").val(99);}
            if (premselector==4) {var x=0;var counter = 15; $("#numcampaigns").val(15);$("#subamount").val(99);}
            for (x = 1; x <=counter; x++) {
                headertoggle = '<li>';    
                headertoggle = headertoggle + '<a class="toggle" href="javascript:void(0);">Campaign '+x+'<i class="fa fa-angle-down"></i></a>';    
                if(x==1) {headertoggle = headertoggle + '<ul class="inner">';}else{headertoggle = headertoggle + '<ul class="inner no-show">';}
                headertoggle = headertoggle + '<li>';
                headertoggle = headertoggle + '<div class="one-half first">';    
                 marketing = '<label><span><i class="fa fa-chevron-down"></i></span>';
                 marketing = marketing + '<select class="selectbox" id="selectbox'+x+'">';
                 marketing = marketing + '<option value="0">[Select Campaign]</option>';
                 marketing = marketing + '<option value="1">Facebook</option>';
                 marketing = marketing + '<option value="2">Email Marketing</option>';
                 marketing = marketing + '<option value="3">Web Marketing</option>';
                 marketing = marketing + '</select></label>';
                 objective = '<label><span><i class="fa fa-chevron-down"></i></span>';
                 objective =objective + '<select class="selectbox" id="selectbox'+x+'">';
                 objective = objective + '<option value="0">[Select Campaign Objective]</option>';
                 objective = objective + '<option value="1">Facebook</option>';
                 objective = objective + '<option value="2">Email Marketing</option>';
                 objective = objective + '<option value="3">Web Marketing</option>';
                 objective = objective + '</select></label>';
                 objective = objective + '</div>';
                 objective = objective + '<div class="one-half last">';   
                 title = '<label><span><i class="fa fa-money"></i></span>';
                 title = title + '<input type="text" class="textbox" id="campaigntitle" name="campaigntitle" placeholder="Campaign Title" required>';
                 title = title + '</label>';
                 link = '<label><span><i class="fa fa-link"></i></span>';
                 link = link + '<input type="url" class="textbox" id="campaignlink" name="campaignlink" placeholder="Website URL" required>';
                 link = link + '</label>';
                footerToggle = footerToggle + '</div><div class="clear"></div></li></ul>';
                footerToggle = footerToggle + '</li>';
                footerToggle = footerToggle + '<div class="clear"></div>';
                fullHTML = headertoggle + marketing + objective + title + link + footerToggle;  
                $("#section-accordion").append(fullHTML);
            }   
                var redeclareJava = '<script type="text/javascript" src="js/subscribe.js"></script>'; 
                $("#section-accordion").append(redeclareJava);
        });